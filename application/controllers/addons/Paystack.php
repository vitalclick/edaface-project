<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paystack extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      // Your own constructor code
      $this->load->database();
      $this->load->library('session');
      $this->load->model('addons/paystack_model');

      if (!$this->session->userdata('cart_items')) {
          $this->session->set_userdata('cart_items', array());
      }
  }

  public function payment_settings($param1 = "") {
    if ($this->session->userdata('admin_login') != true) {
      redirect(site_url('login'), 'refresh');
    }
    $this->paystack_model->update_paystack_settings();
    redirect(site_url('admin/payment_settings'), 'refresh');

  }

  // PAYPAL CHECKOUT ACTIONS
    public function paystack_payment($user_id = "", $amount_paid = "", $payment_request_from = "", $reference = "") {
        if($this->paystack_model->check_payment($reference)){
          $this->crud_model->enrol_student($user_id);
          $this->crud_model->course_purchase($user_id, 'paystack', $amount_paid);
          $this->email_model->course_purchase_notification($user_id, 'paystack', $amount_paid);
          $this->session->set_flashdata('flash_message', get_phrase('payment_successfully_done'));
        }else{
          $this->session->set_flashdata('error_message', site_phrase('your_payment_has_not_been_successful'));
          redirect(site_url('home'), 'refresh');
        }

        if($payment_request_from == 'mobile'):
            $course_id = $this->session->userdata('cart_items');
            redirect('home/payment_success_mobile/'.$course_id[0].'/'.$user_id.'/paid', 'refresh');
        else:
            $this->session->set_userdata('cart_items', array());
            redirect('home/my_courses', 'refresh');
        endif;

    }

    // PAYPAL CHECKOUT ACTIONS
    public function bundle_paystack_payment($user_id = "", $amount_paid = "", $payment_request_from = "", $reference = "") {

      $this->load->model('addons/course_bundle_model');
      if($this->paystack_model->check_payment($reference)){
        $this->course_bundle_model->bundle_purchase('paystack', $amount_paid, null, null);
        $this->email_model->bundle_purchase_notification($user_id, 'paystack', $amount_paid);
      }else{
        $this->session->set_flashdata('error_message', site_phrase('your_payment_has_not_been_successful'));
        redirect(site_url('bundle_details/'.$this->session->userdata('checkout_bundle_id')), 'refresh');
      }
      $this->session->set_userdata('checkout_bundle_price', null);
      $this->session->set_userdata('checkout_bundle_id', null);

      if($payment_request_from == 'from_web'):
        $this->session->set_flashdata('flash_message', site_phrase('payment_successfully_done'));
        redirect('home/my_bundles', 'refresh');
      else:
          //for mobile
      endif;
        
    }

}