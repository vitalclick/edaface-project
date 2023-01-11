<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date    : 20 April, 2020
*  Academy
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class Jitsi_liveclass extends CI_Controller{

    protected $unique_identifier = "jitsi-live-class";
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        /*ADDON SPECIFIC MODELS*/
        $this->load->model('addons/jitsi_liveclass_model','jitsi_liveclass_model');

        // CHECK IF THE ADDON IS ACTIVE OR NOT
        $this->check_addon_status();
    }

    function send_joining_mail($course_id = ""){
        $enrollments = $this->crud_model->enrol_history($course_id)->result_array();
        foreach($enrollments as $enrollment){
            $student_email = $this->user_model->get_user($enrollment['user_id'])->row('email');
            $this->email_model->live_class_invitation_mail($student_email);
        }
        echo 'success';
    }

    // JOIN TO LIVE CLASS
    public function join($course_id = "", $bundle_id = "") {
        // CHECK USER OR ADMIN LOGIN STATUS
        $this->is_logged_in();

        // check if course id is empty
        if (empty($course_id) || $this->crud_model->get_course_by_id($course_id)->num_rows() == 0) {
            $this->session->set_flashdata('error_message', get_phrase('invalid_course'));
            redirect(site_url('home/my_courses'), 'refresh');
        }

        // CHECK THE COURSE PURCHASE STATUS
        $this->check_purchase($course_id, $bundle_id);

        // LOAD LIVE CLASS VIEW
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
        $page_data['course_details']      = $course_details;
        $page_data['instructor_details']  = $this->user_model->get_all_user($course_details['user_id'])->row_array();
        $page_data['logged_user_details'] = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();


        if($this->session->userdata('user_id') == $course_details['user_id'] && !$this->session->userdata('jitsi_meeting_id') || $this->session->userdata('role_id') == 1 && !$this->session->userdata('jitsi_meeting_id')){

            $jitsi_meeting_id = random(50).get_settings('system_title');
            $this->session->set_userdata('jitsi_meeting_id', $jitsi_meeting_id);

            $this->db->where('course_id', $course_id);
            $this->db->update('jitsi_live_class', array('jitsi_meeting_id' => $jitsi_meeting_id));
        }

        if($this->session->userdata('user_id') == $course_details['user_id'] && isset($_GET['live_class_subject']) && !empty($_GET['live_class_subject']) || $this->session->userdata('role_id') == 1 && isset($_GET['live_class_subject']) && !empty($_GET['live_class_subject'])){
            $this->db->where('course_id', $course_id);
            $this->db->update('jitsi_live_class', array('class_topic' => htmlspecialchars($_GET['live_class_subject'])));
        }

        $page_data['live_class_details']  = $this->jitsi_liveclass_model->get_live_class_details($course_id);

        $this->load->view('lessons/jitsi_live_class', $page_data);
    }


    // CHECK USER LOGGID IN OR NOT
    public function is_logged_in() {
        if ($this->session->userdata('user_login') != 1 && $this->session->userdata('admin_login') != 1){
            redirect('home', 'refresh');
        }
    }
    // CHECK WHETHER USER BELONGS TO THIS COURSE
    public function check_purchase($course_id = "", $bundle_id = "") {
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
        if ($this->session->userdata('role_id') != 1 && $course_details['user_id'] != $this->session->userdata('user_id')) {


            if (!is_purchased($course_id)) {


                if(addon_status('course_bundle')){
                    if(get_bundle_validity($bundle_id, $this->session->userdata('user_id')) == 'valid'){
                        return true;
                    }else{
                        redirect(site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']), 'refresh');
                    }
                }else{
                    redirect(site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']), 'refresh');
                }


            }else{
                return true;
            }
        }else {
            return true;
        }
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
}
