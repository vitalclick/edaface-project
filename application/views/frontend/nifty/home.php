<!-- Hero Section -->
<div class="container space-2">
  <div class="row justify-content-lg-between align-items-lg-center">
    <div class="col-sm-10 col-lg-5 mb-7 mb-lg-0">
      <img class="img-fluid" src="<?= base_url('uploads/system/'.get_frontend_settings('banner_image')); ?>" alt="Image Description">
    </div>

    <div class="col-lg-6">
      <div class="mb-5">
        <h1 class="display-4 mb-3">
          <?= site_phrase(get_frontend_settings('banner_title')); ?>
          <br>
          <span class="text-primary font-weight-bold">
            <span class="js-text-animation"></span>
          </span>
        </h1>
        <p class="lead"><?= site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
        
      </div>
    </div>
  </div>
</div>








<!--Featured Topics Section -->
<div class="container mb-5">
  <!-- top courses -->
  <div class="w-md-80 text-center mx-md-auto mb-5 pb-5">
    <h2><?php echo site_phrase('top_courses'); ?></h2>
  </div>
  <div class="row mb-5">
    <?php
      $top_courses = $this->crud_model->get_top_courses()->result_array();
      foreach ($top_courses as $top_course):
        $course_wise_sub_category = $this->crud_model->get_category_details_by_id($top_course['sub_category_id'])->row_array();
        $user_details = $this->user_model->get_all_user($top_course['user_id'])->row_array();

        $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
        $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
        if ($number_of_ratings > 0) {
          $average_ceil_rating = ceil($total_rating / $number_of_ratings);
        }else {
          $average_ceil_rating = 0;
        }

        $is_wishlist_item = $this->crud_model->is_added_to_wishlist($top_course['id']);
        if(in_array($top_course['id'], $this->session->userdata('cart_items'))){
          $is_cart_item = true;
        }else{
          $is_cart_item = false;
        }
      ?>
      <article class="col-md-6 col-lg-4 mb-5">
        <!-- Article -->
        <div class="card border h-100">
          <div class="card-img-top position-relative">
            <a href="<?php echo site_url('home/course/'.rawurlencode(slugify($top_course['title'])).'/'.$top_course['id']); ?>">
              <img class="card-img-top opacity-9" src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="Image Description">
            </a>

            <?php if(!is_purchased($top_course['id'])): ?>
              <div class="position-absolute top-0 left-0 mt-3 ml-3">
                <i id="wishlist-heart-<?= $top_course['id']; ?>" class="fas fa-heart wishlist-heart <?php if($is_wishlist_item == true) echo 'wishlist-heart-checked'; ?>" data-toggle="tooltip" data-placement="top" title="<?php if($is_wishlist_item == true){echo site_phrase('remove_from_wishlist'); }else{echo site_phrase('add_to_wishlist'); } ?>" onclick="handleWishList(this, '<?= $top_course['id']; ?>')"></i>
              </div>
            <?php endif; ?>

            <?php if(is_purchased($top_course['id'])): ?>
              <div class="position-absolute top-0 right-0 mt-3 mr-3">
                <a href="<?= site_url('home/my_courses'); ?>">
                  <i class="fas fa-check-circle text-info" data-toggle="tooltip" data-placement="top" title="<?=site_phrase('already_purchased'); ?>"></i>
                </a>
              </div>
            <?php elseif($top_course['is_free_course'] != 1): ?>
              <div class="position-absolute top-0 right-0 mt-3 mr-3">
                <i id="cart-plus-<?= $top_course['id']; ?>" class="fas fa-cart-plus cart-plus <?php if($is_cart_item == true) echo 'cart-plus-checked'; ?>" data-toggle="tooltip" data-placement="top" title="<?php if($is_cart_item == true){echo site_phrase('remove_from_cart'); }else{echo site_phrase('add_to_cart'); } ?>" onclick="handleCartItems(this, '<?= $top_course['id']; ?>', 'cart_icon')"></i>
              </div>
            <?php endif; ?>

            <div class="position-absolute bottom-0 left-0 mb-3 ml-4">
              <div class="d-flex align-items-center flex-wrap">
                <ul class="list-inline mt-n1 mb-0 mr-2">
                  <?php for($i = 1; $i < 6; $i++):?>
                      <?php if ($i <= $average_ceil_rating): ?>
                        <li class="list-inline-item mx-0">
                          <img src="<?= base_url('assets/frontend/nifty/svg/illustrations/star.svg'); ?>" alt="Review rating" width="14">
                        </li>
                      <?php else: ?>
                          <li class="list-inline-item mx-0">
                            <img src="<?= base_url('assets/frontend/nifty/svg/illustrations/star-muted.svg'); ?>" alt="Review rating" width="14">
                          </li>
                      <?php endif; ?>
                  <?php endfor; ?>
                </ul>
                <span class="d-inline-block">
                  <small class="font-weight-bold text-white mr-1"><?= $average_ceil_rating; ?></small>
                  <small class="text-white-70">(<?= $number_of_ratings.' '.site_phrase('reviews'); ?>)</small>
                </span>
              </div>
            </div>
          </div>

          <div class="card-body">
            <small class="d-block small font-weight-bold text-cap mb-2">
              <a href="<?= site_url('home/courses?category='.$course_wise_sub_category['slug']); ?>" class="text-muted"><?= $course_wise_sub_category['name']; ?></a>
            </small>

            <div class="mb-3">
              <h3>
                <a class="text-inherit text-muted" href="<?php echo site_url('home/course/'.rawurlencode(slugify($top_course['title'])).'/'.$top_course['id']); ?>"><?= $top_course['title']; ?></a>
              </h3>
            </div>

            <div class="d-flex align-items-center mb-1">
              <div class="avatar-group w-100">

                <?php if ($top_course['multi_instructor']):
                  $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($top_course['user_id']);
                  foreach ($instructor_details as $key => $instructor_detail) { ?>
                    <a class="avatar avatar-xs avatar-circle transition-3d-hover" data-toggle="tooltip" data-placement="top" title="<?= $instructor_detail['first_name'].' '.$instructor_detail['last_name']; ?>" href="<?= site_url('home/instructor_page/'.$instructor_detail['id']); ?>">
                      <img class="avatar-img" src="<?= $this->user_model->get_user_image_url($instructor_detail['id']); ?>" alt="Image Description">
                    </a>
                  <?php } ?>
                <?php else: ?>
                  <a class="avatar avatar-xs avatar-circle transition-3d-hover" data-toggle="tooltip" data-placement="top" title="<?= $user_details['first_name'].' '.$user_details['last_name']; ?>" href="<?= site_url('home/instructor_page/'.$top_course['user_id']); ?>">
                    <img class="avatar-img" src="<?= $this->user_model->get_user_image_url($top_course['user_id']); ?>" alt="Image Description">
                  </a>
                <?php endif; ?>
                

                <a class=" ml-auto text-muted" href="<?php echo site_url('home/compare?course-1=' . rawurlencode(slugify($top_course['title'])) . '&&course-id-1=' . $top_course['id']); ?>" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('course_compare'); ?>">
                  <i class="fas fa-balance-scale"></i>
                </a>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="d-flex align-items-center mr-auto">
                <div class="small text-muted">
                  <i class="fa fa-book-reader d-block d-sm-inline-block mb-1 mb-sm-0 mr-1" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('total_lesson'); ?>"></i>
                  <?php
                    $number_of_lessons = $this->crud_model->get_lessons('course', $top_course['id'])->num_rows();
                    echo $number_of_lessons.' '.site_phrase('lessons');
                  ?>
                </div>
                <small class="text-muted mx-2">|</small>
                <div class="small text-muted">
                  <i class="fa fa-clock d-block d-sm-inline-block mb-1 mb-sm-0 mr-1" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('total_duration'); ?>"></i>
                  <?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($top_course['id']); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer border-0 pt-0">
            <div class="d-flex justify-content-between align-items-center">
              <div class="mr-2">
                <?php if ($top_course['is_free_course'] == 1): ?>
                  <span class="d-block h5 text-lh-sm mb-0"><?php echo site_phrase('free'); ?></span>
                <?php else: ?>
                    <?php if ($top_course['discount_flag'] == 1): ?>
                        <span class="d-block text-muted text-lh-sm"><del><?php echo currency($top_course['price']); ?></del></span>
                        <span class="d-block h5 text-lh-sm mb-0"><?php echo currency($top_course['discounted_price']); ?></span>
                    <?php else: ?>
                        <span class="d-block h5 text-lh-sm mb-0"><?php echo currency($top_course['price']); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
              </div>
              <a class="btn btn-primary btn-sm transition-3d-hover" href="<?php echo site_url('home/course/'.rawurlencode(slugify($top_course['title'])).'/'.$top_course['id']); ?>">
                <?= site_phrase('course_details'); ?>
              </a>
            </div>
          </div>
        </div>
        <!-- End Article -->
      </article>
    <?php endforeach; ?>
  </div>
  <!-- End top courses -->
</div>

<!-- latest course -->



  <div class="text-center mb-5">
    <a class="font-weight-bold" href="<?php echo site_url('home/courses'); ?>"><?= site_phrase('see_all_courses'); ?> <i class="fa fa-angle-right fa-sm ml-1"></i></a>
  </div>
</div>
<!-- End Featured Topics Section -->




  <?php if(get_frontend_settings('blog_visibility_on_the_home_page')): ?>
    <!-- Latest blog Section -->
    <div class="">
      <div class="position-relative">
        <div class="container space-2">
          <!-- Title -->
          <div class="row align-items-md-center mb-7">
            <div class="col-md-12 mb-md-0 text-center">
              <h2><?php echo site_phrase('latest_blogs') ?></h2>
              <p><?php echo site_phrase('stay_informed_about_our_mission_start_reading_our_blog_today'); ?></p>
            </div>
          </div>
          <!-- End Title -->


          <div class="row justify-content-center">
              <?php $latest_blogs = $this->crud_model->get_latest_blogs(6); ?>
              <?php foreach($latest_blogs->result_array() as $latest_blog): ?>
                  <?php $user_details = $this->user_model->get_all_user($latest_blog['user_id'])->row_array(); ?>
                  <div class="col-md-6 col-lg-4 mb-4">
                      <div class="card radius-10">
                          <?php $blog_thumbnail = 'uploads/blog/thumbnail/'.$latest_blog['thumbnail']; ?>
                          <?php if(file_exists($blog_thumbnail) && is_file($blog_thumbnail)): ?>
                              <img src="<?php echo base_url($blog_thumbnail); ?>" class="card-img-top radius-top-10" alt="<?php echo $latest_blog['title']; ?>">
                          <?php else: ?>
                              <img src="<?php echo base_url('uploads/blog/thumbnail/placeholder.png'); ?>" class="card-img-top radius-top-10" alt="<?php echo $latest_blog['title']; ?>">
                          <?php endif; ?>
                          <div class="card-body pt-4">
                              <p class="card-text">
                                  <small class="text-muted"><?php echo site_phrase('created_by'); ?> - <a href="<?php echo site_url('home/instructor_page/'.$latest_blog['user_id']); ?>"><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></a></small>
                              </p>
                              <h4 class="card-title mb-3"><a class="text-inherit text-muted" href="<?php echo site_url('blog/details/'.slugify($latest_blog['title']).'/'.$latest_blog['blog_id']); ?>"><?php echo $latest_blog['title']; ?></a></h4>
                              <p class="card-text ellipsis-line-3 text-15">
                                  <?php echo strip_tags(htmlspecialchars_decode($latest_blog['description'])); ?>
                              </p>
                              
                              <a class="fw-600 text-15 text-inherit text-muted" href="<?php echo site_url('blog/details/'.slugify($latest_blog['title']).'/'.$latest_blog['blog_id']); ?>"><?php echo site_phrase('more_details'); ?></a>
                              
                              <p class="card-text mt-2 mb-0">
                                  <small class="text-muted text-12px"><?php echo site_phrase('published'); ?> - <?php echo get_past_time($latest_blog['added_date']); ?></small>
                              </p>
                          </div>
                      </div>
                  </div>
                <?php endforeach; ?>
              <div class="col-12">
                  <a class="float-right btn btn-outline-secondary px-3 fw-600" href="<?php echo site_url('blogs'); ?>"><?php echo site_phrase('view_all'); ?></a>
              </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
