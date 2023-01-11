<?php
  $social_links = json_decode($user_details['social_links'], true);
?>
<!-- Hero Section -->
<div class="container">
  <div class="bg-primary rounded mt-4" style="background: url(<?= base_url('assets/frontend/nifty/img/secure-icon-png-27.png'); ?>) right bottom no-repeat; background-size: contain;">
      <div class="py-4 px-6">
        <h2 class="display-4 text-white"><?php echo site_phrase('user_profile'); ?></h2>
      </div>
  </div>
</div>
<!-- End Hero Section -->
<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                  <li class="mb-4"><a href="<?php echo site_url('home/my_courses'); ?>"><?php echo site_phrase('all_courses'); ?></a></li>
                  <li class="mb-4"><a href="<?php echo site_url('home/my_wishlist'); ?>"><?php echo site_phrase('wishlists'); ?></a></li>
                  <li class="mb-4"><a href="<?php echo site_url('home/my_messages'); ?>"><?php echo site_phrase('my_messages'); ?></a></li>
                  <li class="mb-4"><a href="<?php echo site_url('home/purchase_history'); ?>"><?php echo site_phrase('purchase_history'); ?></a></li>
                  <li class="mb-4 active"><a href="<?php echo site_url('home/profile/user_profile'); ?>"><?php echo site_phrase('user_profile'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Content Section -->
<div class="container space-1 space-top-lg-0">
  <div class="row">
    <div class="col-lg-3">
      <!-- Navbar -->
      <div class="navbar-expand-lg navbar-expand-lg-collapse-block navbar-light">
        <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
          <!-- Card -->
          <div class="card mb-5">
            <div class="card-body">
              <!-- Avatar -->
              <div class="d-none d-lg-block text-center mb-5">
                <div class="avatar avatar-xxl avatar-circle mb-3">
                  <img class="avatar-img" src="<?= $this->user_model->get_user_image_url($user_details['id']); ?>" alt="Image Description">
                  <img class="avatar-status avatar-lg-status" src="<?= base_url('assets/frontend/nifty/svg/illustrations/top-vendor.svg'); ?>" alt="Image Description" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('verified_user'); ?>">
                </div>

                <h4 class="card-title"><?= $user_details['first_name'].' '.$user_details['last_name']; ?></h4>
                <p class="card-text font-size-1"><?= $user_details['email']; ?></p>
              </div>
              <!-- End Avatar -->

              <h6 class="text-cap small"><?= site_phrase('account'); ?></h6>

              <!-- List -->
              <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                <li class="nav-item">
                  <a class="nav-link " href="<?= site_url('home/profile/user_profile'); ?>">
                    <i class="fas fa-id-card nav-icon"></i>
                    <?= site_phrase('personal_info'); ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="<?= site_url('home/profile/user_credentials'); ?>">
                    <i class="fas fa-shield-alt nav-icon"></i>
                    <?= site_phrase('login'); ?> &amp; <?= site_phrase('security'); ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('home/profile/user_photo'); ?>">
                    <i class="fas fa-camera nav-icon"></i>
					<?= site_phrase('photo'); ?>
                  </a>
                </li>
              </ul>
              <!-- End List -->

              <h6 class="text-cap small"><?= site_phrase('shopping'); ?></h6>

              <!-- List -->
              <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('home/shopping_cart'); ?>">
                    <i class="fas fa-shopping-cart nav-icon"></i>
                    <?= site_phrase('cart'); ?>
                    <span class="badge badge-soft-navy badge-pill nav-link-badge"><?php echo sizeof($this->session->userdata('cart_items')); ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('home/my_wishlist'); ?>">
                    <i class="fas fa-heart nav-icon"></i>
                    <?= site_phrase('wishlist'); ?>
                    <span class="badge badge-soft-navy badge-pill nav-link-badge"><?php echo sizeof($this->crud_model->getWishLists()); ?></span>
                  </a>
                </li>
              </ul>
              <!-- End List -->
            </div>
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Navbar -->
    </div>

    <div class="col-lg-9">
		<!-- Card -->
		<div class="card mb-3 mb-lg-5">
	        <div class="card-header">
	          <h5 class="card-title"><?= site_phrase('account_credentials'); ?></h5>
	        </div>
	        <!-- Body -->
	        <div class="card-body">
	        	<form action="<?php echo site_url('home/update_profile/update_credentials'); ?>" method="post">
                <div class="content-box">
                    <div class="email-group">
                        <div class="form-group">
                            <label for="email"><?php echo site_phrase('email'); ?>:</label>
                            <input type="email" class="form-control" name = "email" id="email" placeholder="<?php echo site_phrase('email'); ?>" value="<?php echo $user_details['email']; ?>">
                        </div>
                    </div>
                    <div class="password-group">
                        <div class="form-group">
                            <label for="password"><?php echo site_phrase('password'); ?>:</label>
                            <input type="password" class="form-control" id="current_password" name = "current_password" placeholder="<?php echo site_phrase('enter_current_password'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name = "new_password" placeholder="<?php echo site_phrase('enter_new_password'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name = "confirm_password" placeholder="<?php echo site_phrase('re-type_your_password'); ?>">
                        </div>
                    </div>
                </div>
                <div class="content-update-box">
                    <button type="submit" class="btn btn-primary float-right"><?php echo site_phrase('save_change'); ?></button>
                </div>
            </form>
	        </div>
	        <!-- End Body -->
        </div>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Content Section -->