<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Offline_payment_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	//Offline checkout User panel
	public function attach_payment_document($file_extension = "")
	{
		$total_amount = $this->session->userdata('total_price_of_checking_out');
		$user_id = $this->session->userdata('user_id');
		$curse_id = json_encode($this->session->userdata('cart_items'));

		$data['user_id'] = $user_id;
		$data['amount'] = $total_amount;
		$data['course_id'] = $curse_id;
		$data['document_image'] = rand(6000, 10000000) . '.' . $file_extension;
		$data['timestamp'] = strtotime(date('H:i'));
		$data['status'] = 0;

		$this->db->insert('offline_payment', $data);
		move_uploaded_file($_FILES['payment_document']['tmp_name'], 'uploads/payment_document/' . $data['document_image']);

		$this->session->set_userdata('cart_items', array());
	}

	//User panel
	public function pending_offline_payment($user_id = "")
	{
		if ($user_id > 0) {
			$this->db->where('user_id', $user_id);
		}
		$this->db->where('status', 0);
		return $this->db->get('offline_payment');
	}

	//Admin panel
	public function offline_payment_all_data($offline_payment_id = "")
	{
		if ($offline_payment_id > 0) {
			$this->db->where('id', $offline_payment_id);
		}
		return $this->db->get('offline_payment');
	}
	public function offline_payment_pending($offline_payment_id = "")
	{
		if ($offline_payment_id > 0) {
			$this->db->where('id', $offline_payment_id);
		}
		$this->db->order_by('id', 'ASC');
		$this->db->where('status', 0);
		return $this->db->get('offline_payment');
	}
	public function offline_payment_approve($offline_payment_id = "")
	{
		if ($offline_payment_id > 0) {
			$this->db->where('id', $offline_payment_id);
		}
		$this->db->order_by('id', 'ASC');
		$this->db->where('status', 1);
		return $this->db->get('offline_payment');
	}
	public function offline_payment_suspended($offline_payment_id = "")
	{
		if ($offline_payment_id > 0) {
			$this->db->where('id', $offline_payment_id);
		}
		$this->db->order_by('id', 'ASC');
		$this->db->where('status', 2);
		return $this->db->get('offline_payment');
	}


	public function approve_offline_payment($param1 = "")
	{
		$this->db->where('id', $param1);
		$this->db->update('offline_payment', array('status' => 1));
	}
	public function suspended_offline_payment($param1 = "")
	{
		$this->db->where('id', $param1);
		$this->db->update('offline_payment', array('status' => 2));
	}
	public function delete_offline_payment($param1 = "")
	{
		$this->db->where('id', $param1);
		$this->db->delete('offline_payment');
	}



	// CHECK WHETHER A COURSE IS IN OFFLINE PAYMENT TABLE AS PENDING STATUS
	public function get_course_status($user_id = "", $course_id = "")
	{
		$offline_payment_courses = $this->db->get_where('offline_payment', array('user_id' => $user_id))->result_array();
		foreach ($offline_payment_courses as $row) {
			$course_ids = json_decode($row['course_id'], true);
			if (in_array($course_id, $course_ids)) {
				if ($row['status'] == 0) {
					return "pending";
				} elseif ($row['status'] == 1) {
					return "approved";
				}
			}
		}
		return false;
	}
}
