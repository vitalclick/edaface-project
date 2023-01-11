<?php
  $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();

  $instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();

  $number_of_enrolments = $this->crud_model->enrol_history($course_id)->num_rows();

  $instructor_count_courses = $this->crud_model->get_instructor_wise_courses($instructor_details['id'])->num_rows();

  $total_lessons = $this->crud_model->get_lessons('course', $course_id)->num_rows();

  $total_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($course_id);

  $sections = $this->crud_model->get_section('course', $course_id)->result_array();

  $total_rating =  $this->crud_model->get_ratings('course', $course_id, true)->row()->rating;

  $is_wishlist_item = $this->crud_model->is_added_to_wishlist($course_id);

  $cart_items = $this->session->userdata('cart_items');

  $ratings_non_of_object = $this->crud_model->get_ratings('course', $course_id);
  $number_of_ratings = $ratings_non_of_object->num_rows();
  $ratings = $ratings_non_of_object->result_array();
  
  if ($number_of_ratings > 0) {
      $average_ceil_rating = ceil($total_rating / $number_of_ratings);
  }else {
      $average_ceil_rating = 0;
  }
  if('uploads/thumbnails/course_thumbnails/course_banner_nifty_'. $course_id .'.jpg'){
    $course_banner = 'uploads/thumbnails/course_thumbnails/course_banner_nifty_'. $course_id .'.jpg';
  }else{
    $course_banner = 'assets/frontend/nifty/img/course_banner_placeholder.jpg';
  }
?>
<div class="position-relative">
  <!-- Hero Section -->
  <div class="gradient-y-overlay-lg-white bg-img-hero space-2" style="background-image: url(<?= base_url($course_banner); ?>);">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-lg-8">
          <?php if($course_details['is_top_course'] == 1): ?>
            <small class="btn btn-xs btn-success btn-pill text-uppercase mb-2"><?php echo site_phrase('top_course'); ?></small>
          <?php endif; ?>
          <h1 class="text-lh-sm"><?= $course_details['title']; ?></h1>
          <p><?= $course_details['short_description']; ?></p>

          <div class="d-flex align-items-center flex-wrap">
            <div class="d-flex align-items-center flex-wrap">
              <span class="badge badge-success text-white" data-toggle="tooltip" data-placement="top" title="<?php echo site_phrase('course_level'); ?>"><?php echo site_phrase($course_details['level']); ?></span>
              <span class="badge badge-info text-white ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo site_phrase('language'); ?>"><?php echo site_phrase($course_details['language']); ?></span>
              <!-- Authors -->
              <div class="d-flex align-items-center ml-4">
                <div class="avatar-group">
                  <span class="avatar avatar-xs avatar-circle">
                    <img class="avatar-img" src="<?= $this->user_model->get_user_image_url($course_details['user_id']); ?>" alt="Image Description">
                  </span>
                </div>
                <?php if ($course_details['multi_instructor']):
                  $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($course_details['user_id']); ?>
                  <span class="pl-2"><?= site_phrase('created_by_multiple_instructors'); ?>
                    <?php foreach ($instructor_details as $key => $instructor_detail) { ?>
                      <?php if($key > 0)echo ', '; ?>
                      <a class="link-underline" href="<?php echo site_url('home/instructor_page/'.$instructor_detail['id']) ?>"><?php echo $instructor_detail['first_name'].' '.$instructor_detail['last_name']; ?></a>
                    <?php } ?>
                  </span>
                <?php else: ?>
                  <span class="pl-2"><?= site_phrase('created_by'); ?> <a class="link-underline" href="<?php echo site_url('home/instructor_page/'.$instructor_details['id']) ?>"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a></span>
                <?php endif; ?>
                
              </div>
              <!-- End Authors -->
              <hr class="w-100"> 
              <i class="fa fa-comments"></i>
              <ul class="list-inline mt-n1 mb-0 mr-2 ml-2">
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
                <span class="text-dark font-weight-bold mr-1"><?php echo $average_ceil_rating; ?></span>
                <span class="text-muted">(<?= $number_of_ratings.' '.site_phrase('reviews'); ?>), </span>
              </span>
              <span class="d-inline-block">
                <span class="text-dark font-weight-bold ml-2"> <?php echo $number_of_enrolments; ?></span>
                <span class="text-muted"><?= site_phrase('students_enrolled'); ?>, </span>
              </span>
              <?php if ($course_details['last_modified'] > 0): ?>
                <span class="text-muted ml-2 mr-2"> <?= site_phrase('last_updated'); ?> </span>
                <span class="text-dark font-weight-bold"> <?= date('D, d-M-Y', $course_details['last_modified']); ?> </span><br>
              <?php else: ?>
                <span class="text-muted ml-2 mr-2"> <?= site_phrase('last_updated'); ?> </span>
                <span class="text-dark font-weight-bold"> <?= date('D, d-M-Y', $course_details['date_added']); ?> </span><br>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- Sidebar Content Section -->
  <div class="container space-top-md-2 position-md-absolute top-0 right-0 left-0">
    <div class="row justify-content-end">
      <div id="stickyBlockStartPoint" class="col-md-5 col-lg-4 position-relative z-index-2">
        <!-- <div class="js-sticky-block card border" -->
          <div class="card border"
             data-hs-sticky-block-options='{
               "parentSelector": "#stickyBlockStartPoint",
               "breakpoint": "md",
               "startPoint": "#stickyBlockStartPoint",
               "endPoint": "#stickyBlockEndPoint",
               "stickyOffsetTop": 12,
               "stickyOffsetBottom": 12
             }'>
          <div class="position-relative p-1">
            <!-- Video Popup -->
            <a class="js-fancybox video-player" href="javascript:;"
               data-hs-fancybox-options='{ "src": "<?= $course_details['video_url']; ?>", "caption": "<?= $course_details['title']; ?>", "speed": 700, "buttons": ["fullScreen", "close"], "youtube": { "autoplay": 1 } }'>

              <img class="card-img-top" src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']); ?>" alt="Image Description">

              <span class="video-player-btn video-player-centered text-center">
                <span class="video-player-icon mb-2">
                  <i class="fa fa-play"></i>
                </span>
                <span class="d-block text-center text-white">
                  <?= site_phrase('preview_this_course'); ?>
                </span>
              </span>
            </a>
            <!-- End Video Popup -->
          </div>

          <div class="card-body">
            <div class="mb-3">
              <?php if ($course_details['is_free_course'] == 1): ?>
                <span class="h2 text-lh-sm mr-1 mb-0"><?php echo site_phrase('free'); ?></span>
              <?php else: ?>
                <?php if ($course_details['discount_flag'] == 1): ?>
                  <span class="lead text-muted text-lh-sm"><del><?php echo currency($course_details['price']); ?></del></span>
                  <span class="h2 text-lh-sm mr-1 mb-0"><?php echo currency($course_details['discounted_price']); ?></span>
                <?php else: ?>
                  <span class="h2 text-lh-sm mr-1 mb-0"><?php echo currency($course_details['price']); ?></span>
                <?php endif; ?>
              <?php endif; ?>
            </div>

            <?php if(is_purchased($course_id)):?>
              <div class="mb-2">
                <a class="btn btn-block btn-info transition-3d-hover" href="<?= site_url('home/my_courses'); ?>"><?= site_phrase('already_purchased'); ?></a>
              </div>
            <?php elseif($course_details['is_free_course'] == 1): ?>
              <div class="mb-2">
                <a class="btn btn-block btn-info transition-3d-hover" href="<?= site_url('home/get_enrolled_to_free_course/'.$course_id); ?>"><?= site_phrase('get_enrolled'); ?></a>
              </div>
              <div class="mb-2">
                <a class="btn btn-block btn-outline-primary transition-3d-hover <?php if($is_wishlist_item == true) echo 'active'; ?>" id = "course_wishlist_item_<?php echo $course_id; ?>" onclick="handleWishList(this, '<?= $course_id; ?>', 'course_details')" href="javascript:;"><?php if($is_wishlist_item == true){ echo site_phrase('remove_from_wishlist'); }else{ echo site_phrase('add_to_wishlist'); }; ?></a>
              </div>
            <?php else: ?>
              <div class="mb-2">
                <a class="btn btn-block btn-success transition-3d-hover" id = "course_<?php echo $course_details['id']; ?>" onclick="handleBuyNow(this)" href="javascript:;"><?= site_phrase('buy_now'); ?></a>
              </div>
              <div class="mb-2">
                <a class="btn btn-block btn-outline-info transition-3d-hover <?php if(in_array($course_id, $cart_items)) echo 'active'; ?>" id = "course_cart_item_<?php echo $course_id; ?>" onclick="handleCartItems(this, '<?= $course_id; ?>', 'course_details')" href="javascript:;"><?php if(in_array($course_id, $cart_items)){ echo site_phrase('remove_from_cart'); }else{ echo site_phrase('add_to_cart'); }; ?></a>
              </div>
              <div class="mb-2">
                <a class="btn btn-block btn-outline-primary transition-3d-hover <?php if($is_wishlist_item == true) echo 'active'; ?>" id = "course_wishlist_item_<?php echo $course_id; ?>" onclick="handleWishList(this, '<?= $course_id; ?>', 'course_details')" href="javascript:;"><?php if($is_wishlist_item == true){ echo site_phrase('remove_from_wishlist'); }else{ echo site_phrase('add_to_wishlist'); }; ?></a>
              </div>
            <?php endif; ?>

            <h2 class="h4"><?php echo site_phrase('this_course_includes'); ?></h2>

              <?php if($course_details['course_type'] == 'general'): ?>
                <!-- Icon Block -->
                <div class="media text-body font-size-1 mb-2">
                  <div class="min-w-3rem text-center mr-3"> <i class="fa fa-video"></i> </div>
                  <div class="media-body"> <?php echo $total_duration.' '.site_phrase('on_demand_videos'); ?>. </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="media text-body font-size-1 mb-2">
                  <div class="min-w-3rem text-center mr-3"> <i class="fa fa-file"></i> </div>
                  <div class="media-body"> <?php echo $total_lessons.' '.site_phrase('lessons'); ?>. </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="media text-body font-size-1 mb-2">
                  <div class="min-w-3rem text-center mr-3"> <i class="fa fa-infinity"></i> </div>
                  <div class="media-body"> <?= site_phrase('full_time_access'); ?>. </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="media text-body font-size-1 mb-2">
                  <div class="min-w-3rem text-center mr-3"> <i class="fa fa-mobile"></i> </div>
                  <div class="media-body"> <?= site_phrase('access_on_mobile').', '.site_phrase('tablet_and_tv'); ?>. </div>
                </div>
                <!-- End Icon Block -->
              <?php else: ?>
                <!-- Icon Block -->
                <div class="media text-body font-size-1 mb-2">
                  <div class="min-w-3rem text-center mr-3"> <i class="fa fa-video"></i> </div>
                  <div class="media-body"> <?php echo site_phrase('scorm_course'); ?>. </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="media text-body font-size-1 mb-2">
                  <div class="min-w-3rem text-center mr-3"> <i class="fa fa-infinity"></i> </div>
                  <div class="media-body"> <?= site_phrase('full_time_access'); ?>. </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="media text-body font-size-1 mb-2">
                  <div class="min-w-3rem text-center mr-3"> <i class="fa fa-mobile"></i> </div>
                  <div class="media-body"> <?= site_phrase('access_on_tablet_and_tv'); ?>. </div>
                </div>
                <!-- End Icon Block -->
              <?php endif; ?>

              
          </div>
          <div class="card-footer">
            <a class="text-center font-weight-bold py-3" href="<?php echo site_url('home/compare?course-1=' . rawurlencode(slugify($course_details['title'])) . '&&course-id-1=' . $course_details['id']); ?>">
              <i class="fas fa-balance-scale"></i> <?= site_phrase('compare'); ?>
            </a>
            |
            <!-- Button trigger modal -->
            <a class="text-center font-weight-bold py-3" data-toggle="modal" data-target="#copyToClipboardModal" href="javascript:;">
              <i class="fa fa-share mr-1"></i>
              Share
            </a>
            <!-- End Button trigger modal -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Sidebar Content Section -->
</div>




<?php include "course_description_section.php"; ?>




<!-- Copy to Clipboard Modal -->
<div class="modal fade" id="copyToClipboardModal" tabindex="-1" role="dialog" aria-labelledby="copyToClipboardModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header">
        <h4 id="copyToClipboardModalTitle" class="mb-0"><?= site_phrase('share_this_course'); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg aria-hidden="true" class="mb-0" width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
          </svg>
        </button>
      </div>
      <!-- End Header -->

      <!-- Body -->
      <div class="modal-body">
        <form>
          <!-- Clipboard -->
          <div class="input-group mb-4">
            <input id="copyToClipboard" type="text" class="form-control" value="<?php echo current_url(); ?>">
            <div class="input-group-append">
              <a class="js-clipboard input-group-text" href="javascript:;"
                 data-hs-clipboard-options='{
                   "contentTarget": "#copyToClipboard",
                   "successText": "<?= site_phrase('copied'); ?>!",
                   "container": "#copyToClipboardModal"
                 }'><?= site_phrase('copy'); ?></a>
            </div>
          </div>
          <!-- End Clipboard -->
        </form>

        <!-- Social Networks -->
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-outline-secondary" target="_blank" href="https://facebook.com/">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-outline-secondary" target="_blank" href="https://twitter.com/">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-outline-secondary" target="_blank" href="https://linkedin.com/">
              <i class="fab fa-linkedin"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-outline-secondary" target="_blank" href="https://gmail.com/">
              <i class="fa fa-envelope"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-outline-secondary" target="_blank" href="https://slack.com/">
              <i class="fab fa-slack"></i>
            </a>
          </li>
        </ul>
        <!-- End Social Networks -->
      </div>
      <!-- End Body -->
    </div>
  </div>
</div>
<!-- End Copy to Clipboard Modal -->