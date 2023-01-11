<div class="container">
  <div class="row justify-content-center mt-10 mb-10">
    <div class="col-md-12 col-lg-8">
      <!-- Signup Form -->
      <form action="javascript:;" method="post" class="js-validate card border w-md-85 w-lg-100 mx-md-auto">
        <div class="card-header text-center py-4 px-5 px-md-6">
          <h4 class="mb-0 text-center w-100"><?php echo site_phrase('verify_your_email_address'); ?></h4>
        </div>

        <div class="card-body p-md-6">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <div class="text-center w-100"><?php echo site_phrase('enter_the_code_from_your_email'); ?></div>
              <small class="text-center"><?php echo site_phrase('let_us_know_that_this_email_address_belongs_to_you'); ?> <?php echo site_phrase('Enter_the_code_from_the_email_sent_to').' '.$this->session->userdata('register_email'); ?>.</small>

              <!-- Form Group -->
              <div class="js-form-message form-group mt-4">
                <label for="verification_code" class="input-label"><?php echo site_phrase('verification_code'); ?></label>
                <input type="text" class="form-control" name="email" id="verification_code" placeholder="<?php echo site_phrase('your_verification_code'); ?>" aria-label="<?php echo site_phrase('your_verification_code'); ?>" required
                       data-msg="<?php echo site_phrase('enter_email_verification_code'); ?>">
              </div>
              <a href="javascript:;" class="text-left p-1" id="resend_mail_button" onclick="resend_verification_code()">
                <div class="float-left"><?= site_phrase('resend_mail') ?></div>
                <div id="resend_mail_loader" class="float-left pl-2"></div>
              </a>
              <!-- End Form Group -->
            </div>

          </div>

          <div class="row align-items-center">
            <div class="col-md-12 text-sm-right text-right">
              <button type="submit" class="btn btn-sm btn-primary" onclick="continue_verify()"><?php echo site_phrase('continue'); ?></button>
            </div>
          </div>
        </div>
      </form>
      <!-- End Signup Form -->
    </div>
  </div>
</div>

<script type="text/javascript">
  function continue_verify() {
    var email = '<?= $this->session->userdata('register_email'); ?>';
    var verification_code = $('#verification_code').val();
    $.ajax({
      type: 'post',
      url: '<?php echo site_url('login/verify_email_address/'); ?>',
      data: {verification_code : verification_code, email : email},
      success: function(response){
        window.location.replace('<?= site_url('home/login'); ?>');
      }
    });
  }
  
  function resend_verification_code() {
    $("#resend_mail_loader").html('<img src="<?= base_url('assets/global/gif/page-loader-3.gif'); ?>" style="width: 25px;">');
    var email = '<?= $this->session->userdata('register_email'); ?>';
    $.ajax({
      type: 'post',
      url: '<?php echo site_url('login/resend_verification_code/'); ?>',
      data: {email : email},
      success: function(response){
        toastr.success('<?php echo site_phrase('mail_successfully_sent_to_your_inbox');?>');
        $("#resend_mail_loader").html('');
      }
    });
  }
</script>