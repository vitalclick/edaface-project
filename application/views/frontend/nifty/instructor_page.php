<?php
$instructor_details = $this->user_model->get_all_user($instructor_id)->row_array();
$social_links  = json_decode($instructor_details['social_links'], true);
$course_ids = $this->crud_model->get_instructor_wise_courses($instructor_id, 'simple_array');
$instructor_courses = $this->crud_model->get_instructor_wise_courses($instructor_id)->result_array();

?>
<!-- Profile Section -->
<div class="container space-top-1 space-top-sm-2 space-bottom-2">
  <div class="row">
    <div id="stickyBlockStartPoint" class="col-md-5 col-lg-4 mb-7 mb-md-0">
      <div class="js-sticky-block card border p-4"
           data-hs-sticky-block-options='{ "parentSelector": "#stickyBlockStartPoint", "breakpoint": "md", "startPoint": "#stickyBlockStartPoint", "endPoint": "#stickyBlockEndPoint", "stickyOffsetTop": 12, "stickyOffsetBottom": 12 }'>
        <div class="text-center">
          <!-- User Content -->
          <img class="img-fluid rounded-circle mx-auto" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']);?>" alt="" class="img-fluid" alt="Image Description" width="120" height="120">
          <?php if($instructor_details['role_id'] == 2): ?>
            <span class="d-block text-body font-size-1 mt-3"><?= site_phrase('joined_in'); ?> <?= date('d M Y', $instructor_details['date_added']); ?></span>
          <?php endif; ?>
          <div class="mt-3">
            <a class="btn btn-sm btn-outline-primary transition-3d-hover" href="<?= site_url('home/my_messages'); ?>">
              <i class="far fa-envelope mr-2"></i>
              <?= site_phrase('message'); ?>
            </a>
          </div>
          <!-- End User Content -->
        </div>

        <div class="border-top pt-4 mt-4">
          <div class="row">
            <div class="col-6 col-md-12 col-lg-6 mb-4">
              <!-- Icon Block -->
              <div class="media">
                <div class="d-flex">
                  <span class="avatar avatar-xs mr-3">
                    <img class="avatar-img" src="<?php echo base_url('assets/frontend/nifty/svg/illustrations/review-rating-shield.svg'); ?>" alt="Image Description">
                  </span>
                  <span class="text-body font-size-1 mt-1">
                    <?php echo $this->crud_model->get_instructor_wise_course_ratings($instructor_id, 'course')->num_rows(); ?> <?= site_phrase('reviews'); ?>
                  </span>
                </div>
              </div>
              <!-- End Icon Block -->
            </div>

            <div class="col-6 col-md-12 col-lg-6 mb-4 col-6 col-md-12 mb-lg-0">
              <!-- Icon Block -->
              <div class="d-flex">
                <span class="avatar avatar-xs mr-3">
                  <img class="avatar-img" src="<?php echo base_url('assets/frontend/nifty/svg/illustrations/verified-user.svg'); ?>" alt="Image Description">
                </span>
                <span class="text-body font-size-1 mt-1">
                  <?php
                  $this->db->select('user_id');
                  $this->db->distinct();
                  $this->db->where_in('course_id', $course_ids);
                  echo $this->db->get('enrol')->num_rows();
                  echo ' '.site_phrase('students');
                  ?>
                </span>
              </div>
              <!-- End Icon Block -->
            </div>

            <div class="col-6 col-md-12 col-lg-6">
              <!-- Icon Block -->
              <div class="d-flex">
                <span class="avatar avatar-xs mr-3">
                  <img class="avatar-img" src="<?php echo base_url('assets/frontend/nifty/svg/illustrations/add-file.svg'); ?>" alt="Image Description">
                </span>
                <span class="text-body font-size-1 mt-1"><?php echo sizeof($course_ids).' '.site_phrase('courses'); ?></span>
              </div>
              <!-- End Icon Block -->
            </div>
          </div>
        </div>

        <div class="border-top pt-4 mt-4">
          <h1 class="h4 mb-4"><?= site_phrase('connected_accounts'); ?></h1>

          <div class="row">
            <div class="col-6 col-md-12 col-lg-6 mb-4">
              <!-- Social Profiles -->
              <a class="media" href="<?php echo $social_links['twitter']; ?>">
                <div class="icon icon-xs icon-soft-secondary mr-3">
                  <i class="fab fa-twitter"></i>
                </div>
                <div class="media-body">
                  <span class="d-block font-size-1 font-weight-bold"><?= site_phrase('twitter'); ?></span>
                </div>
              </a>
              <!-- End Social Profiles -->
            </div>

            <div class="col-6 col-md-12 col-lg-6 mb-4">
              <!-- Social Profiles -->
              <a class="media" href="<?php echo $social_links['facebook']; ?>">
                <div class="icon icon-xs icon-soft-secondary mr-3">
                  <i class="fab fa-facebook"></i>
                </div>
                <div class="media-body">
                  <span class="d-block font-size-1 font-weight-bold"><?= site_phrase('facebook'); ?></span>
                </div>
              </a>
              <!-- End Social Profiles -->
            </div>

            <div class="col-6 col-md-12 col-lg-6 mb-0 mb-md-4 mb-lg-0">
              <!-- Social Profiles -->
              <a class="media" href="<?php echo $social_links['linkedin']; ?>">
                <div class="icon icon-xs icon-soft-secondary mr-3">
                  <i class="fab fa-linkedin"></i>
                </div>
                <div class="media-body">
                  <span class="d-block font-size-1 font-weight-bold"><?= site_phrase('linkedin'); ?></span>
                </div>
              </a>
              <!-- End Social Profiles -->
            </div>
          </div>
        </div>

        
      </div>
    </div>

    <div class="col-md-7 col-lg-8">
      <div class="ml-lg-6">
        <div class="mb-3 mb-sm-0 mr-2">
          <h2><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></h2>
        </div>

        <div class="media text-body font-size-1 mb-3">
          <i class="fas fa-briefcase mt-1 mr-2"></i>
          <div class="media-body">
            <?php echo $instructor_details['title']; ?>
          </div>
        </div>

        <!-- Info -->
        <div class="border-top pt-5 mt-5">
          <?php if (strlen($instructor_details['biography']) > 500) { ?>
            <div class="limited-description"><?php echo substr($instructor_details['biography'], 0, 500); ?></div>
            <div class="collapse full-description" id="collapseDescriptionSection">
              <?php echo $instructor_details['biography']; ?>
            </div>
            <!-- Link -->
            <a class="link link-collapse small font-size-1 font-weight-bold pt-1" data-toggle="collapse" href="#collapseDescriptionSection" role="button" aria-expanded="false" aria-controls="collapseDescriptionSection">
              <span class="link-collapse-default" onclick="limitedDescription('read_more')"><?= site_phrase('read_more'); ?> <span class="ml-1">+</span></span>
              <span class="link-collapse-active" onclick="limitedDescription('read_less')"><?= site_phrase('read_less'); ?> <span class="ml-1">-</span></span>
            </a>
            <!-- End Link -->
          <?php }else{ ?>
            <?php echo $instructor_details['biography']; ?>
          <?php } ?>
        </div>
        <!-- End Info -->






        <!-- Courses -->
        <div class="pt-6 mt-5">
          <h3 class="mb-4"><?php echo site_phrase('skills'); ?></h3>
          <?php $skills = explode(',', $instructor_details['skills']); ?>
          <?php foreach($skills as $skill): ?>
            <span class="badge badge-warning text-secondary text-12px my-1 py-2"><?php echo $skill; ?></span>
          <?php endforeach; ?>
        </div>
        <div class="pt-8 mt-5 ">
          <h3 class="mb-4"><?php echo site_phrase('courses_taught_by').' '.$instructor_details['first_name'].' '.$instructor_details['last_name']; ?></h3>

          <?php
          foreach($instructor_courses as $course):
            $total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
            $number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
            if ($number_of_ratings > 0) {
              $average_ceil_rating = ceil($total_rating / $number_of_ratings);
            }else {
              $average_ceil_rating = 0;
            }
          ?>
          <!-- Course -->
          <div class="pt-3 pb-3 mt-0 border-top">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-sm-5 col-lg-3 mb-3 mb-sm-0">
                  <a href="<?php echo site_url('home/course/'.rawurlencode(slugify($course['title'])).'/'.$course['id']) ?>">
                    <img class="img-fluid rounded" src="<?php echo $this->crud_model->get_course_thumbnail_url($course['id']); ?>" alt="Image Description">
                  </a>
                </div>
                <div class="col-sm-7 col-lg-9 pl-3">
                  <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                      <h5>
                        <a class="text-muted" href="<?php echo site_url('home/course/'.rawurlencode(slugify($course['title'])).'/'.$course['id']) ?>"><?= $course['title']; ?></a>
                      </h5>
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
                          <span class="text-dark font-size-1 mr-1"><?= $average_ceil_rating; ?></span>
                        </span>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="row">
                        <div class="col-7">
                          <div class="small text-muted mb-2">
                            <i class="fas fa-book-reader mr-1" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('total_lesson'); ?>"></i>
                            <?php
                              $number_of_lessons = $this->crud_model->get_lessons('course', $course['id'])->num_rows();
                              echo $number_of_lessons.' '.site_phrase('lessons');
                            ?>
                          </div>
                          <div class="small text-muted">
                            <i class="fas fa-clock mr-1" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('total_duration'); ?>"></i>
                            <?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course['id']); ?>
                          </div>
                        </div>
                        <div class="col-5 text-right">
                          <?php if ($course['is_free_course'] == 1): ?>
                            <span class="d-block h5 text-primary text-lh-sm mb-0"><?php echo site_phrase('free'); ?></span>
                          <?php else: ?>
                            <?php if ($course['discount_flag'] == 1): ?>
                              <span class="d-block text-muted text-lh-sm"><del><?php echo currency($course['price']); ?></del></span>
                              <span class="d-block h5 text-primary text-lh-sm mb-0"><?php echo currency($course['discounted_price']); ?></span>
                            <?php else: ?>
                              <span class="d-block h5 text-primary text-lh-sm mb-0"><?php echo currency($course['price']); ?></span>
                            <?php endif; ?>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Course -->
          <?php endforeach; ?>
        </div>
        <!-- End Courses -->
        <!-- Sticky Block End Point -->
        <div id="stickyBlockEndPoint"></div>
      </div>
    </div>
  </div>
</div>
<!-- End Profile Section -->