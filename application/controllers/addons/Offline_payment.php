<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Offline_payment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->database();
		$this->load->library('session');
		$this->load->model('addons/offline_payment_model');
		// $this->load->library('stripe');
		/*cache control*/

		if (!$this->session->userdata('cart_items')) {
			$this->session->set_userdata('cart_items', array());
		}
	}

	public function pending($param1 = "", $id = "", $user_id = "", $amount_paid = "")
	{
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'approve') :

			//add purchase course in cart
			$cart_item = json_decode($this->offline_payment_model->offline_payment_all_data($id)->row('course_id'));

			$this->session->set_userdata('cart_items', $cart_item);

			// check already enrolled student
			foreach ($cart_item as $purchased_course) {
				$already_enrolled = $this->db->get_where('enrol', array('user_id' => $user_id, 'course_id' => $purchased_course))->num_rows();
				if (addon_status('offline_payment') == 1 && $already_enrolled > 0) :
					$this->session->set_flashdata('error_message', get_phrase('the_request_was_already_approved'));
					redirect(site_url('addons/offline_payment/pending'), 'refresh');
				endif;
			}

			//insert value
			$this->crud_model->enrol_student($user_id);
			$this->crud_model->course_purchase($user_id, 'offline', $amount_paid);
			$this->email_model->course_purchase_notification($user_id, 'offline', $amount_paid);

			$this->offline_payment_model->approve_offline_payment($id);
			$this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
			redirect(site_url('addons/offline_payment/pending'), 'refresh');
		elseif ($param1 == 'suspended') :
			$this->offline_payment_model->suspended_offline_payment($id);
			$this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
			redirect(site_url('addons/offline_payment/pending'), 'refresh');
		elseif ($param1 == 'delete') :
			$this->offline_payment_model->delete_offline_payment($id);
			$this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
			redirect(site_url('addons/offline_payment/pending'), 'refresh');
		endif;


		$page_data['page_name'] = 'offline_payment_pending';
		$page_data['offline_payments'] = $this->offline_payment_model->offline_payment_pending()->result_array();
		$page_data['page_title'] = get_phrase('pending_payment_request');
		$this->load->view('backend/index', $page_data);
	}

	public function approve($param1 = "", $id = "", $user_id = "", $amount_paid = "")
	{
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'delete') :
			$this->offline_payment_model->delete_offline_payment($id);
			$this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
			redirect(site_url('addons/offline_payment/approve'), 'refresh');
		endif;


		$page_data['page_name'] = 'offline_payment_approve';
		$page_data['offline_payments'] = $this->offline_payment_model->offline_payment_approve()->result_array();
		$page_data['page_title'] = get_phrase('accepted_payment_request');
		$this->load->view('backend/index', $page_data);
	}

	public function suspended($param1 = "", $id = "", $user_id = "", $amount_paid = "")
	{
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'approve') :
			//add purchase course in cart
			$cart_item = json_decode($this->offline_payment_model->offline_payment_all_data($id)->row('course_id'));

			$this->session->set_userdata('cart_items', $cart_item);

			// check already enrolled student
			foreach ($cart_item as $purchased_course) {
				$already_enrolled = $this->db->get_where('enrol', array('user_id' => $user_id, 'course_id' => $purchased_course))->num_rows();
				if (addon_status('offline_payment') == 1 && $already_enrolled > 0) :
					$this->session->set_flashdata('error_message', get_phrase('the_request_was_already_approved'));
					redirect(site_url('addons/offline_payment/pending'), 'refresh');
				endif;
			}

			//insert value
			$this->crud_model->enrol_student($user_id);
			$this->crud_model->course_purchase($user_id, 'offline', $amount_paid);
			$this->email_model->course_purchase_notification($user_id, 'offline', $amount_paid);

			$this->offline_payment_model->approve_offline_payment($id);
			$this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
			redirect(site_url('addons/offline_payment/suspended'), 'refresh');
		elseif ($param1 == 'delete') :
			$this->offline_payment_model->delete_offline_payment($id);
			$this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
			redirect(site_url('addons/offline_payment/suspended'), 'refresh');
		endif;


		$page_data['page_name'] = 'offline_payment_suspended';
		$page_data['offline_payments'] = $this->offline_payment_model->offline_payment_suspended()->result_array();
		$page_data['page_title'] = get_phrase('suspended_payment_request');
		$this->load->view('backend/index', $page_data);
	}

	//Offline checkout
	public function attach_payment_document($payment_request_mobile = "")
	{
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		$status = "error";
		$course_id = $this->session->userdata('cart_items');
		$file_extension = pathinfo($_FILES['payment_document']['name'], PATHINFO_EXTENSION);
		if ($file_extension == 'jpg' || $file_extension == 'pdf' || $file_extension == 'txt' || $file_extension == 'png' || $file_extension == 'docx') :
			if ($this->session->userdata('total_price_of_checking_out') > 0) :
				$this->offline_payment_model->attach_payment_document($file_extension);
				$this->session->set_flashdata('flash_message', get_phrase('your_document_will_be_reviewd'));
				$status = "pending";
			else :
				$this->session->set_flashdata('error_message', get_phrase('session_timed_out') . ' ! ' . get_phrase('please_try_again'));
			endif;
		else :
			$this->session->set_flashdata('error_message', get_phrase('this_type_of_file_does_not_have_permissions') . '. ' . get_phrase('there_are_permissions_for') . ' jpg, pdf, txt, png, docx ' . get_phrase('extension'));
			redirect(site_url('home/shopping_cart'), 'refresh');
		endif;

		if ($payment_request_mobile) {
			$user_id = $this->session->userdata('user_id');
			redirect('home/payment_success_mobile/' . $course_id[0] . '/' . $user_id . '/' . $status, 'refresh');
		} else {
			redirect(site_url('home/purchase_history'), 'refresh');
		}
	}
}
