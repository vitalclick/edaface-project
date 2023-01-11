<?php
  $social_links = json_decode($user_details['social_links'], true);
?>
<!-- Hero Section -->
<div class="container">
  <div class="bg-primary rounded mt-4" style="background: url(<?= base_url('assets/frontend/nifty/img/biography-life-story-writer-memoir-history-512.png'); ?>) right bottom no-repeat; background-size: contain;">
      <div class="py-4 px-6">
        <h2 class="display-4 text-white"><?php echo site_phrase('user_profile'); ?></h2>
      </div>
  </div>
</div>

<?php include "profile_menus.php"; ?>

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
                  <a class="nav-link active" href="<?= site_url('home/profile/user_profile'); ?>">
                    <i class="fas fa-id-card nav-icon"></i>
                    <?= site_phrase('personal_info'); ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('home/profile/user_credentials'); ?>">
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
          <h5 class="card-title"><?= site_phrase('basic_info'); ?></h5>
        </div>

        <!-- Body -->
        <div class="card-body">
          <form action="<?php echo site_url('home/update_profile/update_basics'); ?>" method="post">
            <!-- Form Group -->
            <div class="row form-group">
              <label for="firstNameLabel" class="col-sm-3 col-form-label input-label"><?= site_phrase('name'); ?> </label>

              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control" name="first_name" id="firstNameLabel" placeholder="<?= site_phrase('first_name'); ?>" aria-label="Clarice" value="<?= $user_details['first_name']; ?>">
                  <input type="text" class="form-control" name="last_name" id="lastNameLabel" placeholder="<?= site_phrase('last_name'); ?>" aria-label="Boone" value="<?= $user_details['last_name']; ?>">
                </div>
              </div>
            </div>
            <!-- End Form Group -->


            <div class="row form-group">
              <label class="col-sm-3 col-form-label input-label" for="title"><?= site_phrase('title'); ?></label>

              <div class="col-sm-9">
                <?php if($user_details['is_instructor'] > 0): ?>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name = "title" placeholder="<?php echo site_phrase('short_title_about_yourself'); ?>"><?php echo $user_details['title']; ?></textarea>
                    </div>
                    
                <?php endif; ?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-3 col-form-label input-label" for="skills"><?= site_phrase('skills'); ?></label>

              <div class="col-sm-9">
                <?php if($user_details['is_instructor'] > 0): ?>
                    <div class="form-group mb-3">
                        <input type="text" class=" tagify" id = "skills" name="skills" data-role="tagsinput" style="width: 100%;" value="<?php echo $user_details['skills'];  ?>"/>
                        <small class="text-muted"><?php echo get_phrase('write_your_skill_and_click_the_enter_button'); ?></small>
                    </div>
                    
                <?php endif; ?>
              </div>
            </div>



            <!-- Form Group -->
            <div class="row form-group">
              <label class="col-sm-3 col-form-label input-label"><?= site_phrase('biography'); ?></label>

              <div class="col-sm-9">
                <!-- Quill -->
                <div class="quill-custom" onclick="$('#hidden_text_area').val($('.ql-editor').html())">
                  <div class="js-quill height-200" data-hs-quill-options='{
                     "placeholder": "Type your message...",
                      "modules": {
                        "toolbar": [
                          ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                        ]
                      }
                     }' id="ssssasd" onkeyup="$('#hidden_text_area').val($('.ql-editor').html())"><?php echo $user_details['biography']; ?>
                  </div>
                  <textarea class="form-control hidden" id="hidden_text_area" name="biography" rows="8"><?php echo $user_details['biography']; ?></textarea>
                </div>
                <!-- End Quill -->
              </div>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div class="row form-group">
              <label for="twitter_link" class="col-sm-3 col-form-label input-label"><?= site_phrase('twitter_link'); ?> </label>

              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control" maxlength="60" id="twitter_link" name = "twitter_link" placeholder="<?php echo site_phrase('twitter_link'); ?>" value="<?php echo $social_links['twitter']; ?>">
                </div>
              </div>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div class="row form-group">
              <label for="facebook_link" class="col-sm-3 col-form-label input-label"><?= site_phrase('facebook_link'); ?> </label>

              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control" maxlength="60" id="facebook_link" name = "facebook_link" placeholder="<?php echo site_phrase('facebook_link'); ?>" value="<?php echo $social_links['facebook']; ?>">
                </div>
              </div>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div class="row form-group">
              <label for="linkedin_link" class="col-sm-3 col-form-label input-label"><?= site_phrase('linkedin_link'); ?> </label>

              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control" maxlength="60" id="linkedin_link" name = "linkedin_link" placeholder="<?php echo site_phrase('linkedin_link'); ?>" value="<?php echo $social_links['linkedin']; ?>">
                </div>
              </div>
            </div>
            <!-- End Form Group -->
            <button type="submit" class="btn btn-primary float-right"><?= site_phrase('save_changes'); ?></button>
          </form>
        </div>
        <!-- End Body -->
      </div>
      <!-- End Card -->
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Content Section -->

