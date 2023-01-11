<?php $jitsi_live_class = $this->db->get_where('jitsi_live_class', array('course_id' => $course_id)); ?>
<div class="row">
    <div class="col-md-7">
        <h3 class="mb-3"><?php echo get_phrase('jitsi_live_class'); ?></h3>
        <div class="form-group row mb-3">
            <label class="col-md-4 col-form-label" for="live_class_schedule_date"><?php echo get_phrase('live_class_schedule').' ('.get_phrase('date').')'; ?></label>
            <div class="col-md-6">
                <input type="text" name="jitsi_live_class_schedule_date" class="form-control date" id="live_class_schedule_date" data-toggle="date-picker" data-single-date-picker="true" value="<?php echo empty($jitsi_live_class->row('date')) ? date('m/d/Y', strtotime(date('m/d/Y'))) : date('m/d/Y', $jitsi_live_class->row('date')); ?>">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-md-4 col-form-label" for="live_class_schedule_time"><?php echo get_phrase('live_class_schedule').' ('.get_phrase('time').')'; ?></label>
            <div class="col-md-6">
                <input type="text" name="jitsi_live_class_schedule_time" id="live_class_schedule_time" class="form-control" data-toggle="timepicker" value="<?php echo date('h:i:s A', $jitsi_live_class->row('time')); ?>">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-md-4 col-form-label" for="note_to_students"><?php echo get_phrase('note_to_students'); ?></label>
            <div class="col-md-6">
                <textarea class="form-control" name="jitsi_note_to_students" id="note_to_students" rows="5"><?php echo $jitsi_live_class->row('note_to_students'); ?></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-4 col-form-label" for="jitsi_meeting_password"><?php echo get_phrase('jitsi_meeting_password'); ?></label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="jitsi_meeting_password" name = "jitsi_meeting_password" placeholder="<?php echo get_phrase('enter_meeting_password'); ?>" value="<?php echo $jitsi_live_class->row('jitsi_meeting_password'); ?>">
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <?php if($jitsi_live_class->num_rows() <= 0 || empty($jitsi_live_class->row('jitsi_meeting_password'))): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo get_phrase('make_sure_you_save_the_live_class_password_before_starting_the_class'); ?>
            </div>
        <?php endif; ?>
        <div class="alert alert-success text-center" role="alert">
            <h4 class="alert-heading"><?php echo get_phrase('course_enrolment_details'); ?></h4>
            <p>
                <?php
                $number_of_enrolments = $this->crud_model->enrol_history($course_id)->num_rows();
                echo get_phrase('number_of_enrolment').' : <strong>'.$number_of_enrolments.'</strong>';
                ?>
            </p>
            <hr>
            <div class="form-group text-left">
                <label for="live_class_subjec"><?php echo get_phrase('enter_your_class_topic'); ?></label>
                <input type="text" class="form-control" name="live_class_subject" id="live_class_subject">
            </div>
            
            <p class="mb-1 d-hidden" id="jitsi_live_alert_message">
                <textarea name="jitsi_live_alert_message" rows="4" id="jitsi_live_alert_message_box" placeholder="<?php echo get_phrase('enter_your_message'); ?>" class="form-control" rows="3">Started your live video class. Join early. Live video class: <?php echo site_url('addons/jitsi_liveclass/join/'.$course_id); ?></textarea>
            </p>

            <p class="mb-0 text-left">
                <input type="checkbox" onchange="$('#jitsi_live_alert_message').toggle()" name="jitsi_live_alert_mail" value="1" id="jitsi_alert_mail">
                <label for="jitsi_alert_mail"><?php echo get_phrase('send_a_mail_to_students_to_join_this_live_class'); ?></label>
            </p>

            <div class="mt-2">
                <button onclick="start_live_video_class(this)" type="button" class="btn btn-danger mb-1 px-4" <?php if($jitsi_live_class->num_rows() <= 0 || empty($jitsi_live_class->row('jitsi_meeting_password')))echo 'disabled'; ?>>
                    <?php echo get_phrase('start_live_video_class'); ?>
                    <i class="mdi mdi-arrow-right ml-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    'use strict';

    function start_live_video_class(e){
        var live_class_subject = $('#live_class_subject').val();
        var jitsi_alert_mail = $('#jitsi_alert_mail').prop('checked');
        var jitsi_live_alert_message = $('#jitsi_live_alert_message_box').val();
        if(live_class_subject != ""){
            if(jitsi_alert_mail == true){
                $(e).html('<?php echo get_phrase('sending_mail'); ?>...');
                if(jitsi_live_alert_message != ""){
                    $.ajax({
                        type: 'post',
                        url: '<?php echo site_url('addons/jitsi_liveclass/send_joining_mail/'.$course_id);?>',
                        data: {jitsi_live_alert_message: jitsi_live_alert_message},
                        success: function(response)
                        {
                            if(response == 'success'){
                                $(e).html('<?php echo get_phrase('start_live_video_class'); ?><i class="mdi mdi-arrow-right ml-1"></i>');
                                var redirect_live_url = '<?php echo site_url('addons/jitsi_liveclass/join/'.$course_id.'?live_class_subject='); ?>'+live_class_subject;
                                window.open(redirect_live_url, '_blank');
                            }
                        }
                    });
                }else{
                    error_notify('<?php echo get_phrase('the_message_field_is_empty'); ?>');
                }
            }else{
                var redirect_live_url = '<?php echo site_url('addons/jitsi_liveclass/join/'.$course_id.'?live_class_subject='); ?>'+live_class_subject;
                window.open(redirect_live_url, '_blank');
            }
        }else{
            error_notify('<?php echo get_phrase('enter_your_class_topic'); ?>');
        }
    }
</script>