<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jitsi_liveclass_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function update_live_class($course_id) {
        if (!empty($this->input->post('jitsi_live_class_schedule_date')) && !empty($this->input->post('jitsi_live_class_schedule_time'))) {
            $data['date']                  = strtotime($this->input->post('jitsi_live_class_schedule_date'));
            $data['time']                  = strtotime($this->input->post('jitsi_live_class_schedule_time'));
            $data['jitsi_meeting_password'] = $this->input->post('jitsi_meeting_password');
            $data['note_to_students']      = $this->input->post('jitsi_note_to_students');
            $data['course_id']             = $course_id;
            $data['class_topic']             = 'Live class';
            $previous_data = $this->db->get_where('jitsi_live_class', array('course_id' => $course_id))->num_rows();
            if ($previous_data > 0) {
                $this->db->where('course_id', $course_id);
                $this->db->update('jitsi_live_class', $data);
            }else{
                $this->db->insert('jitsi_live_class', $data);
            }
        }
    }

    public function update_settings() {
        if (empty($this->input->post('zoom_api_key')) || empty($this->input->post('zoom_secret_key'))) {
            $this->session->set_flashdata('error_message', get_phrase('nothing_can_be_empty'));
            redirect(site_url('addons/liveclass/settings'), 'refresh');
        }
        $data['value'] = $this->input->post('zoom_api_key');
        $this->db->where('key', 'zoom_api_key');
        $this->db->update('settings', $data);

        $data['value'] = $this->input->post('zoom_secret_key');
        $this->db->where('key', 'zoom_secret_key');
        $this->db->update('settings', $data);

        $this->session->set_flashdata('flash_message', get_phrase('zoom_account_has_been_updated'));
        redirect(site_url('addons/liveclass/settings'), 'refresh');
    }

    public function get_live_class_details($course_id = "") {
        return $this->db->get_where('jitsi_live_class', array('course_id' => $course_id))->row_array();
    }
}
