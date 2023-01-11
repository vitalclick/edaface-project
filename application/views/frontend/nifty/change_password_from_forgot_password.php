<div class="container">
  <div class="row justify-content-center mt-10 mb-10">
    <div class="col-md-12 col-lg-8">
      <!-- Signup Form -->
      <form action="<?php echo site_url('login/change_password/'.$verification_code); ?>" method="post" class="js-validate card border w-md-85 w-lg-100 mx-md-auto">
        <div class="card-header text-center py-4 px-5 px-md-6">
          <h4 class="mb-0 text-center w-100"><?php echo site_phrase('change_your_password'); ?></h4>
        </div>

        <div class="card-body p-md-6">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <!-- Form Group -->
              <div class="js-form-message form-group">
                <label for="new_password"><?php echo site_phrase('new_password'); ?></label>
	              <div class="input-group mb-3">
	              	<div class="input-group-prepend">
	                	<span class="input-group-text bg-white" for="new_password"><i class="fas fa-lock"></i></span>
	                </div>
	                <input type="password" class="form-control" placeholder="<?php echo site_phrase('enter_your_new_password'); ?>" aria-label="<?php echo site_phrase('new_password'); ?>" aria-describedby="<?php echo site_phrase('new_password'); ?>" name="new_password" id="new_password" required>
	              </div>
              </div>
              <div class="js-form-message form-group">
                <label for="confirm_password"><?php echo site_phrase('confirm_password'); ?></label>
	              <div class="input-group">
	              	<div class="input-group-prepend">
	                	<span class="input-group-text bg-white" for="confirm_password"><i class="fas fa-lock"></i></span>
	                </div>
	                <input type="password" class="form-control" placeholder="<?php echo site_phrase('confirm_password'); ?>" aria-label="<?php echo site_phrase('confirm_password'); ?>" aria-describedby="<?php echo site_phrase('confirm_password'); ?>" name="confirm_password" id="confirm_password" required>
	              </div>
              </div>
              <!-- End Form Group -->

            </div>
          </div>

          <div class="row align-items-center">
            <div class="col-sm-7 mb-3 mb-sm-0">
              <p class="font-size-1 text-muted mb-0"><a class="font-weight-bold" href="<?= site_url('login'); ?>"><?php echo site_phrase('back_to_login'); ?></a></p>
            </div>
            <div class="col-sm-5 text-sm-right">
              <button type="submit" class="btn btn-sm btn-primary"><?php echo site_phrase('continue'); ?></button>
            </div>
          </div>
        </div>
      </form>
      <!-- End Signup Form -->
    </div>
  </div>
</div>