<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<div class="container">
  <div class="row justify-content-center mt-10 mb-10">
    <div class="col-md-12 col-lg-8">
      <!-- Signup Form -->
      <form action="<?php echo site_url('login/forgot_password/frontend'); ?>" method="post" class="js-validate card border w-md-85 w-lg-100 mx-md-auto">
        <div class="card-header text-center py-4 px-5 px-md-6">
          <h4 class="mb-0 text-center w-100"><?php echo site_phrase('forgot_password'); ?></h4>
        </div>

        <div class="card-body p-md-6">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <!-- Form Group -->
              <div class="js-form-message form-group">
                <label for="emailAddress" class="input-label"><?php echo site_phrase('email_address'); ?></label>
                <input type="email" class="form-control" name="email" id="emailAddress" placeholder="<?php echo site_phrase('your_email_address'); ?>" aria-label="<?php echo site_phrase('your_email_address'); ?>" required
                       data-msg="<?php echo site_phrase('please_enter_a_valid_email_address'); ?>">
              </div>
              <!-- End Form Group -->
            </div>

            <?php if(get_frontend_settings('recaptcha_status')): ?>
              <div class="col-sm-12 mb-3">
                <div class="js-form-message form-group">
                  <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                </div>
              </div>
            <?php endif; ?>
          </div>

          <div class="row align-items-center">
            <div class="col-sm-7 mb-3 mb-sm-0">
              <p class="font-size-1 text-muted mb-0"><a class="font-weight-bold" href="<?= site_url('login'); ?>"><?php echo site_phrase('sign_in'); ?></a></p>
            </div>
            <div class="col-sm-5 text-sm-right">
              <button type="submit" class="btn btn-sm btn-primary"><?php echo site_phrase('send_mail'); ?></button>
            </div>
          </div>
        </div>
      </form>
      <!-- End Signup Form -->
    </div>
  </div>
</div>