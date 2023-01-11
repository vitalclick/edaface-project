<?php foreach($courses as $course):
  $instructor_details = $this->user_model->get_all_user($course['user_id'])->row_array();
  $total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
  $number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
  if ($number_of_ratings > 0) {
      $average_ceil_rating = ceil($total_rating / $number_of_ratings);
  }else {
      $average_ceil_rating = 0;
  }
?>
  <!-- Card -->
    <div class="row mx-md-n2 border-bottom pb-5 mb-5">
      <div class="col-md-4 px-md-2 mb-3 mb-md-0">
        <a href="<?php echo site_url('home/course/'.rawurlencode(slugify($course['title'])).'/'.$course['id']) ?>">
          <div class="position-relative">
            <img class="img-fluid w-100 rounded" src="<?php echo $this->crud_model->get_course_thumbnail_url($course['id']); ?>" alt="Image Description">

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
                  <small class="font-weight-bold text-white mr-1"><?php echo $average_ceil_rating; ?></small>
                  <small class="text-white-70">(<?= $number_of_ratings.' '.site_phrase('reviews'); ?>)</small>
                </span>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-8">
        <div class="media mb-2">
          <div class="media-body mr-7">
            <h3 class="text-hover-primary">
              <a class="text-muted" href="<?php echo site_url('home/course/'.rawurlencode(slugify($course['title'])).'/'.$course['id']) ?>">
                <?= $course['title']; ?>
              </a>
            </h3>
          </div>

          <div class="d-flex mt-1 ml-auto">
            <div class="text-right">
              <?php if ($course['is_free_course'] == 1): ?>
                <span class="d-block h5 text-primary text-lh-sm mb-0"><?php echo site_phrase('free'); ?></span>
              <?php else: ?>
                <?php if ($course['discount_flag'] == 1): ?>
                  <span class="d-block text-muted text-1h-sm"><del><?php echo currency($course['price']); ?></del></span>
                  <span class="d-block h5 text-primary text-lh-sm mb-0"><?php echo currency($course['discounted_price']); ?></span>
                <?php else: ?>
                  <span class="d-block h5 text-primary text-lh-sm mb-0"><?php echo currency($course['price']); ?></span>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>

          <small class="text-muted mx-2">|</small>

          <a class="float-right text-muted" href="<?php echo site_url('home/compare?course-1=' . rawurlencode(slugify($course['title'])) . '&&course-id-1=' . $course['id']); ?>" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('course_compare'); ?>">
                <i class="fas fa-balance-scale"></i>
          </a>
        </div>

        <div class="d-flex justify-content-start align-items-center small text-muted mb-2">
          <div class="d-flex align-items-center">
            <div class="avatar-group">
              <?php if ($course['multi_instructor']):
                $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($course['user_id']);
                foreach ($instructor_details as $key => $instructor_detail) { ?>
                  <a class="avatar avatar-xs avatar-circle transition-3d-hover" data-toggle="tooltip" data-placement="top" title="<?= $instructor_detail['first_name'].' '.$instructor_detail['last_name']; ?>" href="<?= site_url('home/instructor_page/'.$instructor_detail['id']); ?>">
                    <img class="rounded-circle" src="<?= $this->user_model->get_user_image_url($instructor_detail['id']); ?>" width="30" alt="Image Description">
                  </a>
                <?php } ?>
              <?php else: ?>
                <a class="avatar avatar-xs avatar-circle transition-3d-hover" data-toggle="tooltip" data-placement="top" title="<?= $instructor_details['first_name'].' '.$instructor_details['last_name']; ?>" href="<?= site_url('home/instructor_page/'.$instructor_details['id']); ?>">
                  <img class="rounded-circle" src="<?= $this->user_model->get_user_image_url($instructor_details['id']); ?>" width="30" alt="Image Description">
                </a>
              <?php endif; ?>
            </div>
          </div>
          <div class="ml-auto">
            <i class="fa fa-book-reader mr-1" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('total_lesson'); ?>"></i>
            <?php
              $number_of_lessons = $this->crud_model->get_lessons('course', $course['id'])->num_rows();
              echo $number_of_lessons.' '.site_phrase('lessons');
            ?>
          </div>
          <span class="text-muted mx-2">|</span>
          <div class="d-inline-block">
            <i class="fa fa-clock mr-1" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('total_duration'); ?>"></i>
            <?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course['id']); ?>
          </div>
          <span class="text-muted mx-2">|</span>
          <div class="d-inline-block">
            <i class="fa fa-signal mr-1" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('level'); ?>"></i>
            <?php echo site_phrase($course['level']); ?>
          </div>
        </div>

        <p class="font-size-1 text-body mb-0"><?php echo $course['short_description']; ?></p>
      </div>
    </div>
  <!-- End Card -->
<?php endforeach; ?>
<!-- Pagination -->
<div class="d-flex justify-content-between align-items-center mt-8">
  <small class="d-none d-sm-inline-block text-body"></small>

  <nav aria-label="Page navigation">
    <?php
      if ($selected_category_id == "all" && $selected_price == 0 && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all'){
        echo $this->pagination->create_links();
      }
    ?>
  </nav>
</div>
<!-- End Pagination -->
