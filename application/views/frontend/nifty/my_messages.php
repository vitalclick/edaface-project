<?php
    $instructor_list = $this->user_model->get_instructor_list()->result_array();
    if(!isset($message_thread_code)) $message_thread_code = null;
?>
<!-- Hero Section -->
<div class="container">
  <div class="bg-primary rounded mt-4" style="background: url(<?= base_url('assets/frontend/nifty/img/message.png'); ?>) right bottom no-repeat;  background-size: contain;">
      <div class="py-4 px-6">
        <h2 class="display-4 text-white"><?php echo site_phrase('my_messages'); ?></h2>
      </div>
  </div>
</div>
<!-- End Hero Section -->

<?php include "profile_menus.php"; ?>

<div class="container pb-10">
  <div class="row no-gutters align-items-stretch">
    <div class="col-lg-5">
      <div class="message-sender-list-box">
        <button class="btn btn-outline-primary mb-2" type="button" id="NewMessage" onclick="NewMessage(event)"><?= site_phrase('compose'); ?></button>
          <ul class="message-sender-list">
          <?php
          $current_user = $this->session->userdata('user_id');
          $this->db->where('sender', $current_user);
          $this->db->or_where('receiver', $current_user);
          $message_threads = $this->db->get('message_thread')->result_array();
          foreach ($message_threads as $row):
            // defining the user to show
            if ($row['sender'] == $current_user)
            $user_to_show_id = $row['receiver'];
            if ($row['receiver'] == $current_user)
            $user_to_show_id = $row['sender'];
            $last_messages_details =  $this->crud_model->get_last_message_by_message_thread_code($row['message_thread_code'])->row_array();
            ?>
            <a href="<?php echo site_url('home/my_messages/read_message/'.$row['message_thread_code']); ?>">
              <li class="<?php if($row['message_thread_code'] == $message_thread_code) echo 'active'; ?>">
                <div class="message-sender-wrap">
                  <div class="message-sender-head clearfix">
                    <div class="message-sender-info d-inline-block">
                      <div class="sender-image d-inline-block">
                        <img src="<?php echo $this->user_model->get_user_image_url($user_to_show_id);?>" alt="" class="img-fluid">
                      </div>
                      <div class="sender-name d-inline-block">
                        <?php
                        $user_to_show_details = $this->user_model->get_all_user($user_to_show_id)->row_array();
                        echo $user_to_show_details['first_name'].' '.$user_to_show_details['last_name'];
                        ?>
                      </div>
                    </div>
                    <div class="message-time d-inline-block float-right"><?php echo date('D, d-M-Y', $last_messages_details['timestamp']); ?></div>
                  </div>
                  <div class="message-sender-body">
                    <?php echo $last_messages_details['message']; ?>
                  </div>
                </div>
              </li>
            </a>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="message-details-box" id = "toggle-1">
        <?php include 'inner_messages.php'; ?>
      </div>
      <div class="message-details-box hidden" id = "toggle-2">
        <div class="new-message-details">
          <div class="message-header">
            <div class="sender-info">
              <span class="d-inline-block">
                  <i class="far fa-user"></i>
              </span>
              <span class="d-inline-block"><?php echo site_phrase('new_message'); ?></span>
            </div>
          </div>
          <form class="" action="<?php echo site_url('home/my_messages/send_new'); ?>" method="post">
            <div class="message-body">
              <div class="form-group">
                <select class="js-custom-select" data-hs-select2-options='{ "placeholder": "<?= site_phrase('select_instructor'); ?>" }' name = "receiver">
                  <?php foreach ($instructor_list as $instructor):
                    if ($instructor['id'] == $this->session->userdata('user_id'))
                        continue;
                    ?>
                    <option value="<?php echo $instructor['id']; ?>"><?php echo $instructor['first_name'].' '.$instructor['last_name']; ?></option>
                  <?php endforeach; ?>
                </select>
                <!-- Select -->
              </div>
              <div class="form-group">
                <textarea name="message" class="form-control text-success"></textarea>
              </div>
              <button type="submit" class="btn btn-success float-right"><?php echo site_phrase('send'); ?></button>
              <button type="button" class="btn btn-secondary" onclick = "CancelNewMessage(event)">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>