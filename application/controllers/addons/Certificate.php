<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date    : 3 November, 2019
*  Academy
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class Certificate extends CI_Controller
{

    protected $unique_identifier = "certificate";
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        /*ADDON SPECIFIC MODELS*/
        $this->load->model('addons/Certificate_model','certificate_model');

        // CHECK IF THE ADDON IS ACTIVE OR NOT
        $this->check_addon_status();
    }

    function position($param1 = ""){
        $certificate_text_positions = htmlspecialchars($this->input->post('text_positions', false));
        if($param1 == 'save'){
            $this->db->where('key', 'certificate-text-positons');
            $row = $this->db->get('settings');
            if($row->num_rows() > 0){
                $this->db->where('key', 'certificate-text-positons');
                $this->db->update('settings', array('value' => $certificate_text_positions));
            }else{
                $this->db->insert('settings', array('key' => 'certificate-text-positons','value' => $certificate_text_positions));
            }
            return true;
        }else{
            $this->load->view('backend/admin/certificate_text_position.php');
        }
    }

    // AJAX CALL FUNCTION FOR CHECKING IF THE STUDENT IS ABLE TO DOWNLOAD THE CERTIFICATE
    function check_certificate_eligibility($course_id) {
        if (certificate_eligibility($course_id)) {
            echo 1;
        }else{
            $user_id = $this->session->userdata('user_id');
            $course_progress = $this->crud_model->get_watch_histories($user_id, $course_id)->row('course_progress');
            if ($course_progress >= 100) {
                $this->certificate_model->check_certificate_eligibility($course_id, $user_id);
                echo 1;
            }else{
                echo 0;
            }
        }
    }


    //GENERATE CERTIFICATE
    public function generate_certificate($certificate_identifier = "") {
        $page_data['certificate_identifier'] = $certificate_identifier;
        $this->load->view('certificate/index', $page_data);
    }

    public function download($certificate_identifier = "") {
        if ( !empty($certificate_identifier) && file_exists('uploads/certificates/'.$certificate_identifier.'.jpg')) {
            $certificate = $certificate_identifier.'.jpg';
            $this->load->helper('download');
            $data = file_get_contents('uploads/certificates/'.$certificate);
            force_download($certificate, $data);
            $this->session->set_flashdata('flash_message', get_phrase('downloaded'));
            redirect(site_url('home' . $message_thread_code), 'refresh');
        }else{
            $this->session->set_flashdata('error_message', get_phrase('invalid_certificate'));
            redirect(site_url('home' . $message_thread_code), 'refresh');
        }

    }

    // CERTIFICATE SETTINGS
    public function settings($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'text_update') {
            $this->certificate_model->update_certificate_template_text();
        }
        if ($param1 == 'template_update') {
            $this->certificate_model->update_certificate_template();
        }
        $page_data['page_name'] = 'certificate_settings';
        $page_data['page_title'] = get_phrase('certificate_settings');
        $this->load->view('backend/index.php', $page_data);
    }


    // CHECK IF THE ADDON IS ACTIVE OR NOT. IF NOT REDIRECT TO DASHBOARD
    public function check_addon_status() {
        $checker = array('unique_identifier' => $this->unique_identifier);
        $this->db->where($checker);
        $addon_details = $this->db->get('addons')->row_array();
        if ($addon_details['status']) {
            return true;
        }else{
            redirect(site_url(), 'refresh');
        }
    }

    // GET CERTIFICATE URL AJAX
    public function get_certificate_url() {
        $user_id   = $this->input->post('user_id');
        $course_id = $this->input->post('course_id');
        $certificate_link = $this->certificate_model->get_certificate_url($user_id, $course_id);
        echo $certificate_link;
    }

    public function send_course_completion_mail() {
        $user_id   = $this->input->post('user_id');
        $course_id = $this->input->post('course_id');
        $this->email_model->notify_on_certificate_generate($user_id, $course_id);
    }
}
