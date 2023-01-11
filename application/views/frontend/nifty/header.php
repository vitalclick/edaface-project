<?php
$user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
?>
<!-- ========== HEADER ========== -->
<header id="header" class="header left-aligned-navbar">

  <div class="header-section bg-light">
    <div id="logoAndNav" class="container mt-lg-n2">
      <!-- Nav -->
      <nav class="js-mega-menu navbar navbar-expand-lg">
        <div class="navbar-nav-wrap">
          <!-- Logo -->
          <a class="navbar-brand navbar-nav-wrap-brand" href="<?= site_url('home'); ?>" aria-label="Front">
            <img src="<?= base_url().'uploads/system/'.get_frontend_settings('dark_logo'); ?>" alt="logo">
          </a>
          <!-- End Logo -->

          <!-- Secondary Content -->
          <div class="navbar-nav-wrap-content">
            <!-- Search Classic -->
            <div class="hs-unfold d-lg-none d-inline-block position-static">
              <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-icon rounded-circle mr-1" href="javascript:;"
                 data-hs-unfold-options='{
                  "target": "#searchClassic",
                  "type": "css-animation",
                  "animationIn": "slideInUp"
                 }'>
                <i class="fas fa-search"></i>
              </a>

              <!--For mobile-->
              <div id="searchClassic" class="hs-unfold-content dropdown-menu w-100 shadow border-0 rounded-0 px-3 mt-0">
                <form action="<?= site_url('home/search'); ?>" method="get" class="input-group input-group-sm input-group-merge">
                  <input name="query" type="text" class="form-control" placeholder="<?= site_phrase('search_for_courses'); ?>" aria-label="What do you want to learn?">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <button type="submit"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- End Search Classic -->

            <!-- Login Button for mobile-->
            <?php if($this->session->userdata('user_login') != '1' && $this->session->userdata('admin_login') != '1'): ?>
              <div class="d-inline-block ml-auto">
                <a href="<?= site_url('home/login'); ?>" class="btn btn-sm btn-primary d-none d-lg-inline-block"><?= site_phrase('sign_in'); ?></a>
                <a href="<?= site_url('home/sign_up'); ?>" class="btn btn-sm btn-success d-none d-lg-inline-block"><?= site_phrase('sign_up'); ?></a>

                <a href="<?= site_url('home/login'); ?>" class="btn btn-xs btn-icon rounded-circle d-lg-none">
                  <i class="fas fa-sign-in-alt"></i>
                </a>
                <a href="<?= site_url('home/sign_up'); ?>" class="btn btn-xs btn-icon rounded-circle d-lg-none">
                  <i class="fas fa-user-plus"></i>
                </a>
              </div>
            <?php endif; ?>
            <!-- End Login Button -->

            <?php if($this->session->userdata('user_login') == '1' || $this->session->userdata('admin_login') == '1'):
                if($this->session->userdata('role') == 'User'){
                  $manage_profile_url =  site_url('home/profile/user_profile');
                }else{
                  $manage_profile_url =  site_url('admin/manage_profile');
                } ?>
              <!-- Account -->
              <div class="hs-unfold">
                <a class="js-hs-unfold-invoker rounded-circle py-5 px-1 ml-2 mt-0" href="javascript:;"
                   data-hs-unfold-options='{
                    "target": "#accountDropdown",
                    "type": "css-animation",
                    "event": "hover",
                    "duration": 50,
                    "delay": 0,
                    "hideOnScroll": "true"
                   }'>
                  <span class="avatar-xs avatar-circle">
                    <img class="rounded-circle" width="40" height="40" src="<?= $this->user_model->get_user_image_url($user_details['id']); ?>" alt="Image Description">
                  </span>
                </a>

                <div id="accountDropdown" class="hs-unfold-content dropdown-menu dropdown-menu-sm-right dropdown-menu-no-border-on-mobile p-0 mt-3 min-w-245">
                  <div class="card ">
                    <!-- Header -->
                    <div class="card-header p-4">
                      <a class="media align-items-center" href="<?= $manage_profile_url; ?>">
                        <div class="avatar mr-3">
                          <img class="avatar-img" src="<?= $this->user_model->get_user_image_url($user_details['id']); ?>" alt="Image Description">
                        </div>
                        <div class="media-body">
                          <span class="d-block font-weight-bold"><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></span>
                          <span class="d-block small text-muted"><?php echo $user_details['email']; ?></span>
                        </div>
                      </a>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body py-3">
                      <?php if($this->session->userdata('user_login') == '1'): ?>
                        <a class="dropdown-item px-0" href="<?= site_url('home/my_courses'); ?>">
                          <span class="dropdown-item-icon">
                            <i class="fas fa-tasks"></i>
                          </span>
                          <?= site_phrase('my_courses'); ?>
                        </a>
                        <a class="dropdown-item px-0" href="<?= site_url('home/my_wishlist'); ?>">
                          <span class="dropdown-item-icon">
                            <i class="fas fa-heart"></i>
                          </span>
                          <?= site_phrase('my_wishlist'); ?>
                        </a>
                        <a class="dropdown-item px-0" href="<?= site_url('home/my_messages'); ?>">
                          <span class="dropdown-item-icon">
                            <i class="fas fa-comments"></i>
                          </span>
                          <?= site_phrase('messages'); ?>
                        </a>
                        <a class="dropdown-item px-0" href="<?= site_url('home/purchase_history'); ?>">
                          <span class="dropdown-item-icon">
                            <i class="fas fa-credit-card"></i>
                          </span>
                          <?= site_phrase('purchase_history'); ?>
                        </a>
                      <?php endif; ?>
                      <a class="dropdown-item px-0" href="<?= $manage_profile_url; ?>">
                        <span class="dropdown-item-icon">
                          <i class="fas fa-user"></i>
                        </span>
                        <?= site_phrase('profile'); ?>
                      </a>
                      <?php if (addon_status('customer_support')) : ?>
                        <a class="dropdown-item px-0" href="<?php echo site_url('addons/customer_support/user_tickets'); ?>">
                          <span class="dropdown-item-icon">
                            <i class="fas fa-life-ring"></i>
                          </span>
                          <?= site_phrase('support'); ?>
                        </a>
                      <?php endif; ?>
                      
                      <div class="dropdown-divider"></div>

                      <a class="dropdown-item px-0" href="<?= site_url('login/logout'); ?>">
                        <span class="dropdown-item-icon">
                          <i class="fas fa-power-off"></i>
                        </span>
                        <?= site_phrase('sign_out'); ?>
                      </a>
                    </div>
                    <!-- End Body -->
                  </div>
                </div>
              </div>
              <!-- End Account -->
              <?php endif; ?>
          </div>
          <!-- End Secondary Content -->

          <!-- Responsive Toggle Button -->
          <button type="button" class="navbar-toggler navbar-nav-wrap-navbar-toggler btn btn-icon btn-sm rounded-circle"
                  aria-label="Toggle navigation"
                  aria-expanded="false"
                  aria-controls="navBar"
                  data-toggle="collapse"
                  data-target="#navBar">
            <span class="navbar-toggler-default">
              <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z"/>
              </svg>
            </span>
            <span class="navbar-toggler-toggled">
              <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
              </svg>
            </span>
          </button>
          <!-- End Responsive Toggle Button -->

          <!-- Navigation -->
          <div id="navBar" class="navbar-nav-wrap-navbar collapse navbar-collapse">
            <ul class="navbar-nav">
              <!-- Courses -->
              <li class="hs-has-sub-menu navbar-nav-item">
                <a id="coursesMegaMenu" class="hs-mega-menu-invoker nav-link" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="coursesSubMenu">
                  <i class="fa fa-th font-size-1 mr-1"></i>
                  <?php echo site_phrase('courses'); ?>
                </a>

                <!-- Courses - Submenu -->
                <div id="coursesSubMenu" class="hs-sub-menu dropdown-menu min-w-270 pb-0" aria-labelledby="coursesMegaMenu">
                  <!-- Development -->
                  <?php $categories = $this->crud_model->get_categories()->result_array();
                  foreach ($categories as $key => $category):?>
                    <div class="hs-has-sub-menu">
                      <a id="navLinkCoursesDevelopment" onclick="category_show_in_mobile_device('<?= $category['slug']; ?>');" href="javascript:;" class="hs-mega-menu-invoker dropdown-item dropdown-item-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuCoursesDevelopment">
                        <span class="min-w-4rem text-center opacity-lg mr-1">
                          <i class="<?= $category['font_awesome_class']; ?> font-size-1 mr-1"></i>
                        </span>
                        <?= $category['name']; ?>
                      </a>

                      

                      <div id="navSubmenuCoursesDevelopment min-w-270" class="hs-sub-menu dropdown-menu" aria-labelledby="navLinkCoursesDevelopment">
                        <?php $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                        foreach ($sub_categories as $sub_category): ?>
                          <a class="dropdown-item" href="<?= site_url('home/courses?category='.$sub_category['slug']); ?>"><?= $sub_category['name']; ?></a>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <!-- End Development -->
                  <?php endforeach; ?>

                  <div class="dropdown-divider my-3"></div>

                  <div class="px-4 mb-3">
                    <a class="btn btn-block btn-sm btn-outline-primary transition-3d-hover" href="<?= site_url('home/courses'); ?>"><?= site_phrase('all_courses'); ?></a>
                  </div>

                  <?php if(addon_status('course_bundle')): ?>
                    <div class="mb-0 pb-0">
                      <a class="btn btn-block btn-primary rounded-0" href="<?= site_url('course_bundles'); ?>">
                        <i class="fas fa-cubes mr-2"></i><?= site_phrase('course_bundles'); ?>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
                <!-- End Courses - Submenu -->
              </li>
              <!-- End Courses -->

              <!-- Search Form for web-->
              
              <li class="head-mid-align d-none d-lg-inline-block navbar-nav-item flex-grow-1">
              <h3>The School of Cryptocurrencies</h3>
              </li>
             
              <!-- End Search Form -->

              <div class="d-inline-block">
                <?php if($this->session->userdata('user_login') == '1'): ?>
                  <a href="<?= site_url('home/my_courses'); ?>" class="btn btn-sm btn-outline-primary mr-2 p-2"><?= site_phrase('my_courses'); ?></a>
                  <a href="<?= site_url('user'); ?>" class="btn btn-sm btn-outline-primary mr-3 p-2"><?= site_phrase('instructor'); ?></a>
                <?php elseif($this->session->userdata('role') == 'Admin'): ?>
                  <a href="<?= site_url('admin'); ?>" class="btn btn-sm btn-outline-primary mr-5 p-2"><?= site_phrase('administrator'); ?></a>
                <?php endif; ?>
              </div>

              <!--wishlist menu-->
              <?php if($this->session->userdata('user_login') == '1'):?>
                <li class="hs-has-mega-menu navbar-nav-item" data-hs-mega-menu-item-options='{ "desktop": { "position": "right", "maxWidth": "260px" } }'>
                  <!-- wishlist -->
                  <a id="docsMegaMenu" class="hs-mega-menu-invoker nav-link text-primary py-6" href="javascript:;" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-heart"></i>
                      <b><span class="wishlist-number" id="wishlist-item-number"><?php echo sizeof($this->crud_model->getWishLists()); ?></span></b>
                  </a>
                  <div class="hs-mega-menu dropdown-menu mt-0 min-w-350" id="wishlist_menue_items" aria-labelledby="docsMegaMenu">
                    <?php include "wishlist_items.php"; ?>
                  </div>
                </li>
              <?php endif; ?>


              <!--Cart menu-->
              <?php if($this->session->userdata('admin_login') != '1'):?>
                <li class="hs-has-mega-menu navbar-nav-item" data-hs-mega-menu-item-options='{ "desktop": { "position": "right", "maxWidth": "900px" } }'>
                  <!-- cart -->
                  <a id="demosMegaMenu" class="hs-mega-menu-invoker nav-link text-primary font-size-1 py-6" href="javascript:;" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shopping-cart"></i>
                    <b><span class="cart-number" id="cart-item-number"><?php echo sizeof($this->session->userdata('cart_items')); ?></span></b>
                  </a>
                  <div class="hs-mega-menu dropdown-menu w-100" id="cart_menue_items" aria-labelledby="demosMegaMenu">
                    <?php include "cart_items.php"; ?>
                  </div>
                </li>
              <?php endif; ?>
            </ul>
          </div>
          <!-- End Navigation -->
        </div>
      </nav>
      <!-- End Nav -->
    </div>
  </div>
</header>
<!-- ========== END HEADER ========== -->

<script type="text/javascript">
  function category_show_in_mobile_device(slug){
    if($( window ).width() > 991){
      window.location.replace('<?php echo site_url('home/courses?category='); ?>'+slug);
    }
  }
</script>