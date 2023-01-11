<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<div class="container">
  <div class="row justify-content-center mt-10 mb-10">
    <div class="col-md-12 col-lg-8">
      <!-- Signup Form -->
      <form action="<?php echo site_url('login/register'); ?>" method="post" class="js-validate card border w-md-85 w-lg-100 mx-md-auto">

        <?php if(get_settings('fb_social_login')):
            include "facebook_login.php";
        endif; ?>

        <div class="card-header text-center py-4 px-5 px-md-6">
          <h4 class="mb-0 text-center w-100"><?php echo site_phrase('sign_up'); ?></h4>
        </div>

        <div class="card-body p-md-6">
          <div class="row">
            <div class="col-sm-6 mb-3">
              <!-- Form Group -->
              <div class="js-form-message form-group">
                <label for="firstName" class="input-label"><?php echo site_phrase('first_name'); ?></label>
                <input type="text" class="form-control" name="first_name" id="firstName" placeholder="<?php echo site_phrase('your_first_name'); ?>" aria-label="<?php echo site_phrase('your_first_name'); ?>" required
                       data-msg="<?php echo site_phrase('please_enter_first_your_name'); ?>">
              </div>
              <!-- End Form Group -->
            </div>

            <div class="col-sm-6 mb-3">
              <!-- Form Group -->
              <div class="js-form-message form-group">
                <label for="lastName" class="input-label"><?php echo site_phrase('last_name'); ?></label>
                <input type="text" class="form-control" name="last_name" id="lastName" placeholder="<?php echo site_phrase('your_last_name'); ?>" aria-label="<?php echo site_phrase('your_last_name'); ?>" required
                       data-msg="<?php echo site_phrase('please_enter_last_your_name'); ?>">
              </div>
              <!-- End Form Group -->
            </div>

            <div class="col-sm-12 mb-3">
              <!-- Form Group -->
              <div class="js-form-message form-group">
                <label for="emailAddress" class="input-label"><?php echo site_phrase('email_address'); ?></label>
                <input type="email" class="form-control" name="email" id="emailAddress" placeholder="<?php echo site_phrase('your_email_address'); ?>" aria-label="<?php echo site_phrase('your_email_address'); ?>" required
                       data-msg="<?php echo site_phrase('please_enter_a_valid_email_address'); ?>">
              </div>
              <!-- End Form Group -->
            </div>

            <div class="col-sm-12 mb-3">
              <!-- Form Group -->
              <div class="js-form-message form-group">
                <label for="password" class="input-label"><?php echo site_phrase('password'); ?></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="*********" aria-label="*********" required>
              </div>
              <!-- End Form Group -->
            </div>

          </div>

          <!-- Checkbox -->
          <div class="js-form-message mb-5">
            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
              <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox" required
                     data-msg="<?php echo site_phrase('please_accept_our_terms_and_conditions'); ?>.">
              <label class="custom-control-label" for="termsCheckbox">
                <small>
                  <?php echo site_phrase('i_agree_to_the'); ?>
                  <a class="link-underline" href="<?php echo site_url('home/terms_and_condition'); ?>"><?php echo site_phrase('terms_and_conditions'); ?></a>
                </small>
              </label>
            </div>
          </div>
          <!-- End Checkbox -->

          <?php if(get_frontend_settings('recaptcha_status')): ?>
            <div class="row">
              <div class="col-sm-12 mb-3">
                <div class="js-form-message form-group">
                  <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <div class="row align-items-center">
            <div class="col-sm-7 mb-3 mb-sm-0">
              <p class="font-size-1 text-muted mb-0"><?php echo site_phrase('already_have_an_account'); ?>? <a class="font-weight-bold" href="login"><?php echo site_phrase('log_in'); ?></a></p>
            </div>
            <div class="col-sm-5 text-sm-right">
              <button type="submit" class="btn btn-sm btn-primary"><?php echo site_phrase('sign_up'); ?></button>
            </div>
          </div>
        </div>
      </form>
      <!-- End Signup Form -->
    </div>
  </div>
</div>