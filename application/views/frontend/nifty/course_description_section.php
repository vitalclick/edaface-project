<!--Description Section -->
    <div class="container space-top-2 space-top-md-1">
      <div class="row">
        <div class="col-md-7 col-lg-8">
          <!-- Info -->
          <div class="pt-0 mt-0">
            <h3 class="mb-4"><?php echo site_phrase('what_you_will_learn'); ?> ?</h3>

            <div class="row">
              <?php foreach (json_decode($course_details['outcomes']) as $outcome): ?>
                <?php if ($outcome != ""): ?>                
                  <div class="col-lg-6">
                    <!-- Icon Block -->
                    <div class="media text-body font-size-1 mb-3">
                      <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                      <div class="media-body">
                        <?php echo $outcome; ?>
                      </div>
                    </div>
                    <!-- End Icon Block -->
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- End Info -->


          <!-- Check course type -->
          <?php if($course_details['course_type'] == 'general'): ?>
            <!-- Collapse -->
            <div class="border-top pt-7 mt-7">
              <div class="row mb-4">
                <div class="col-7">
                  <h3 class="mb-0"><?= site_phrase('curriculum_for_this_course'); ?></h3>
                </div>
                <div class="col-5 text-right">
                  <div class="row">
                    <div class="col-lg-6">
                      <span class="font-size-1"><?= $total_lessons.' '.site_phrase('lessons'); ?></span>
                    </div>
                    <div class="col-lg-6">
                      <span class="font-size-1"><?= $total_duration; ?></span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card -->
              <?php $section_counter = 0;
              foreach ($sections as $section): 
                $section_counter++; ?>

                <!-- View More - Collapse -->
                <?php if($section_counter == 11): ?> <div class="collapse" id="collapseCoursesContentSections"> <?php endif; ?>

                <div class="card border mb-1">
                  <div class="card-header card-collapse" id="coursesHeading<?= $section['id']; ?>">
                    <a class="btn btn-link btn-sm btn-block card-btn p-3 collapsed"  href="javascript:;" role="button" data-toggle="collapse" data-target="#coursesCollapse<?= $section['id']; ?>" aria-expanded="false" aria-controls="coursesCollapse<?= $section['id']; ?>">
                      <!-- Header -->
                      <span class="row">
                        <span class="col-7">
                          <span class="media">
                            <span class="card-btn-toggle mr-3 ml-0">
                              <span class="card-btn-toggle-default">&plus;</span>
                              <span class="card-btn-toggle-active">&minus;</span>
                            </span>
                            <span class="media-body">
                              <span class="text-body font-weight-bold mr-5"><?= $section['title']; ?></span>
                            </span>
                          </span>
                        </span>
                        <span class="col-5 text-right">
                          <span class="row">
                            <span class="col-lg-6">
                              <span class="text-muted">
                                <?php echo $this->crud_model->get_lessons('section', $section['id'])->num_rows().' '.site_phrase('lessons'); ?>
                              </span>
                            </span>
                            <span class="col-lg-6">
                              <span class="text-muted">
                                <?php echo $this->crud_model->get_total_duration_of_lesson_by_section_id($section['id']); ?>
                              </span>
                            </span>
                          </span>
                        </span>
                      </span>
                      <!-- End Header -->
                    </a>
                  </div>
                  <div id="coursesCollapse<?= $section['id']; ?>" class="collapse" aria-labelledby="coursesHeading<?= $section['id']; ?>">
                    <div class="card-body p-0">
                      <?php $lessons_accordions = $this->crud_model->get_lessons('section', $section['id'])->result_array();
                      foreach ($lessons_accordions as $lessons_accordion):?>
                        <!-- Course Program -->
                        <div class="border-bottom py-3 pr-3 pl-6">
                          <div class="row">
                            <div class="col-8">
                              <a class="media font-size-1 mr-5" href="javascript:;" onclick="go_course_playing_page('<?php echo $course_details['id']; ?>', '<?php echo $lessons_accordion['id']; ?>')">
                                <i class="fa fa-play-circle min-w-3rem text-center opacity-lg mt-1 mr-2 ml-1"></i>
                                <span class="media-body">
                                  <span><?= $lessons_accordion['title']; ?></span>
                                </span>
                              </a>
                            </div>
                            <div class="col-4 text-right">
                              <div class="row">
                                <div class="col-md-12 text-right">

                                  <?php if($lessons_accordion['is_free'] == 1): ?>
                                    <a href="javascript:;">
                                      <span class="lecture-preview mt--10-sm hover-underline" onclick="lesson_preview('<?php echo site_url('home/preview_free_lesson/'.$lessons_accordion['id']); ?>', '<?php echo site_phrase('lesson').': '.$lessons_accordion['title']; ?>')">
                                        <i class="fas fa-eye"></i>
                                        <?php echo site_phrase('preview'); ?></span>
                                    </a>
                                  <?php endif; ?>
                                  <small class="text-muted"> | </small>
                                  <span class="text-primary font-size-1"><?php echo $lessons_accordion['duration']; ?></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Course Program -->
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <?php if(count($sections) == $section_counter && $section_counter >= 11): ?> </div> <?php endif; ?>
              <?php endforeach; ?>
              <!-- End Card -->
              <!-- Link -->
              <?php if($section_counter >= 11): ?>
                <div class="card border">
                  <a class="link link-collapse btn btn-link btn-sm btn-block card-btn text-center p-3 text-primary" data-toggle="collapse" href="#collapseCoursesContentSections" role="button" aria-expanded="false" aria-controls="collapseCoursesContentSections">
                    <span class="link-collapse-default">
                      <?= $section_counter-10; ?> <?= site_phrase('more_sections'); ?>
                    </span>
                    <span class="link-collapse-active">
                      <?= site_phrase('view_less'); ?>
                    </span>
                  </a>
                </div>
              <?php endif; ?>
              <!-- End Link -->
            </div>
            <!-- End Collapse -->
          <?php endif; ?>
          <!-- End check course type -->


          <!-- Info -->
          <div class="border-top pt-7 mt-7">
            <h3 class="mb-4"><?= site_phrase('description'); ?></h3>
            <?php if (strlen($course_details['description']) > 500) { ?>
              <div class="limited-description"><?php echo substr($course_details['description'], 0, 500); ?></div>
              <div class="collapse full-description" id="collapseDescriptionSection">
                <?php echo $course_details['description']; ?>
              </div>
              <!-- Link -->
              <a class="link link-collapse small font-size-1 font-weight-bold pt-1" data-toggle="collapse" href="#collapseDescriptionSection" role="button" aria-expanded="false" aria-controls="collapseDescriptionSection">
                <span class="link-collapse-default" onclick="limitedDescription('read_more')"><?= site_phrase('read_more'); ?> <span class="ml-1">+</span></span>
                <span class="link-collapse-active" onclick="limitedDescription('read_less')"><?= site_phrase('read_less'); ?> <span class="ml-1">-</span></span>
              </a>
              <!-- End Link -->
            <?php }else{ ?>
              <?php echo $course_details['description']; ?>
            <?php } ?>
          </div>
          <!-- End Info -->


          <!-- Info -->
          <div class="pt-3 mt-5">
            <h3 class="mb-4"><?php echo site_phrase('Requirements'); ?></h3>

            <div class="row">
              <?php foreach (json_decode($course_details['requirements']) as $requirement): ?>
                <?php if ($requirement != ""): ?>                
                  <div class="col-lg-6">
                    <!-- Icon Block -->
                    <div class="media text-body font-size-1 mb-3">
                      <i class="fas fa-hand-point-right text-success mt-1 mr-2"></i>
                      <div class="media-body">
                        <?php echo $requirement; ?>
                      </div>
                    </div>
                    <!-- End Icon Block -->
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- End Info -->

          <!-- Author -->
          <div class="border-top pt-7 mt-7">
            <h3 class="mb-4"><?= site_phrase('course_instructor'); ?></h3>
            <?php if ($course_details['multi_instructor']):
              $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($course_details['user_id']); ?>
                <?php foreach ($instructor_details as $key => $instructor_detail) { ?>
                  <?php if($key > 0)echo '<hr>'; ?>
                  <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                      <div class="avatar avatar-xl avatar-circle mb-3">
                        <img class="avatar-img" src="<?php echo $this->user_model->get_user_image_url($instructor_detail['id']); ?>" alt="Instructor image">
                      </div>

                      <!-- Icon Block -->
                      <div class="media text-body font-size-1 mb-2">
                        <div class="min-w-3rem text-center mr-2">
                          <i class="fa fa-comments"></i>
                        </div>
                        <div class="media-body">
                          <?php echo $this->crud_model->get_instructor_wise_course_ratings($instructor_detail['id'], 'course')->num_rows().' '.site_phrase('reviews'); ?>
                        </div>
                      </div>
                      <!-- End Icon Block -->

                      <!-- Icon Block -->
                      <div class="media text-body font-size-1 mb-2">
                        <div class="min-w-3rem text-center mr-2">
                          <i class="fa fa-user"></i>
                        </div>
                        <div class="media-body">
                          <?php
                            $course_ids = $this->crud_model->get_instructor_wise_courses($instructor_detail['id'], 'simple_array');
                            $this->db->select('user_id');
                            $this->db->distinct();
                            $this->db->where_in('course_id', $course_ids);
                            echo $this->db->get('enrol')->num_rows().' '.site_phrase('students');
                          ?>
                        </div>
                      </div>
                      <!-- End Icon Block -->

                      <!-- Icon Block -->
                      <div class="media text-body font-size-1 mb-2">
                        <div class="min-w-3rem text-center mr-2">
                          <i class="fa fa-play"></i>
                        </div>
                        <div class="media-body">
                          <?= $instructor_count_courses.' '.site_phrase('courses'); ?>
                        </div>
                      </div>
                      <!-- End Icon Block -->
                    </div>

                    <div class="col-lg-8">
                      <!-- Info -->
                      <div class="mb-2">
                        <h4 class="h5 mb-1">
                          <a class="link-underline" href="<?php echo site_url('home/instructor_page/'.$instructor_detail['id']) ?>"><?php echo $instructor_detail['first_name'].' '.$instructor_detail['last_name']; ?></a>
                        </h4>
                        <span class="d-block font-size-1 font-weight-bold">
                          <?php echo $instructor_detail['title']; ?>
                        </span>
                      </div>
                      <?php echo $instructor_detail['biography']; ?>
                      <!-- End Info -->
                    </div>
                  </div>
                <?php } ?>
            <?php else: ?>
              <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                  <div class="avatar avatar-xl avatar-circle mb-3">
                    <img class="avatar-img" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="Instructor image">
                  </div>

                  <!-- Icon Block -->
                  <div class="media text-body font-size-1 mb-2">
                    <div class="min-w-3rem text-center mr-2">
                      <i class="fa fa-comments"></i>
                    </div>
                    <div class="media-body">
                      <?php echo $this->crud_model->get_instructor_wise_course_ratings($instructor_details['id'], 'course')->num_rows().' '.site_phrase('reviews'); ?>
                    </div>
                  </div>
                  <!-- End Icon Block -->

                  <!-- Icon Block -->
                  <div class="media text-body font-size-1 mb-2">
                    <div class="min-w-3rem text-center mr-2">
                      <i class="fa fa-user"></i>
                    </div>
                    <div class="media-body">
                      <?php
                        $course_ids = $this->crud_model->get_instructor_wise_courses($instructor_details['id'], 'simple_array');
                        $this->db->select('user_id');
                        $this->db->distinct();
                        $this->db->where_in('course_id', $course_ids);
                        echo $this->db->get('enrol')->num_rows().' '.site_phrase('students');
                      ?>
                    </div>
                  </div>
                  <!-- End Icon Block -->

                  <!-- Icon Block -->
                  <div class="media text-body font-size-1 mb-2">
                    <div class="min-w-3rem text-center mr-2">
                      <i class="fa fa-play"></i>
                    </div>
                    <div class="media-body">
                      <?= $instructor_count_courses.' '.site_phrase('courses'); ?>
                    </div>
                  </div>
                  <!-- End Icon Block -->
                </div>

                <div class="col-lg-8">
                  <!-- Info -->
                  <div class="mb-2">
                    <h4 class="h5 mb-1">
                      <a class="link-underline" href="<?php echo site_url('home/instructor_page/'.$instructor_details['id']) ?>"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
                    </h4>
                    <span class="d-block font-size-1 font-weight-bold">
                      <?php echo $instructor_details['title']; ?>
                    </span>
                  </div>
                  <?php echo $instructor_details['biography']; ?>
                  <!-- End Info -->
                </div>
              </div>
            <?php endif; ?>
          </div>
          <!-- End Author -->

          <!-- Ratings & Reviews -->
          <div class="border-top pt-7 mt-7">
            <!-- Overall Ratings -->
            <div class="mb-7">
              <h3 class="mb-4"><?= site_phrase('student_feedback'); ?></h3>

              <div class="row align-items-center">
                <div class="col-lg-4 mb-4 mb-lg-0">
                  <!-- Overall Review Rating -->
                  <div class="card bg-primary text-white text-center py-4 px-3">
                    <span class="display-4"><?= $average_ceil_rating.' '.site_phrase('rating'); ?></span>
                    <ul class="list-inline mb-2">
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
                    <span><?= site_phrase('course_rating'); ?></span>
                  </div>
                  <!-- End Overall Review Rating -->
                </div>

                <div class="col-lg-8">
                  <ul class="list-unstyled list-sm-article mb-0">
                    <?php for($i = 5; $i >= 1; $i--): ?>
                      <?php $percentage_of_rating = $this->crud_model->get_percentage_of_specific_rating($i, 'course', $course_id); ?>
                      <li>
                        <!-- Review Rating -->
                        <a class="d-flex align-items-center font-size-1" href="javascript:;">
                          <div class="progress w-100">
                            <div class="progress-bar" role="progressbar" style="width: <?= $percentage_of_rating; ?>%;" aria-valuenow="<?= $percentage_of_rating; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="d-flex align-items-center min-w-21rem ml-3">
                            <ul class="list-inline mr-1 mb-2">
                              <?php for($j = 5; $j >= 1; $j--): ?>
                                <?php if($i >= $j): ?>
                                <li class="list-inline-item mr-1"><img src="<?= base_url('assets/frontend/nifty/svg/illustrations/star.svg'); ?>" alt="Review rating" width="16"></li>
                                <?php else: ?>
                                  <li class="list-inline-item mr-1"><img src="<?= base_url('assets/frontend/nifty/svg/illustrations/star-muted.svg'); ?>" alt="Review rating" width="16"></li>
                                <?php endif; ?>
                              <?php endfor; ?>
                            </ul>
                            <span><?php echo $percentage_of_rating; ?>%</span>
                          </div>
                        </a>
                        <!-- End Review Rating -->
                      </li>
                    <?php endfor; ?>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Overall Ratings -->

            <!-- Reviews Header -->
            <div class="row justify-content-md-between align-items-md-center">
              <div class="col-md-12 mb-5">
                <h3 class="mb-0"><?= site_phrase('reviews'); ?></h3>
              </div>
            </div>
            <!-- End Reviews Header -->

            <?php foreach($ratings as $rating): ?>
              <!-- Review -->
              <div class="border-top pt-5 mb-5">
                <div class="row mb-2">
                  <div class="col-lg-4 mb-3 mb-lg-0">
                    <!-- Review -->
                    <div class="media align-items-center">
                      <div class="avatar avatar-circle mr-3">
                        <img class="avatar-img" src="<?php echo $this->user_model->get_user_image_url($rating['user_id']); ?>" alt="Image Description">
                      </div>
                      <div class="media-body">
                        <span class="d-block text-body font-size-1"><?php echo date('D, d-M-Y', $rating['date_added']); ?></span>
                        <h4 class="mb-0">
                          <?php
                            $user_details = $this->user_model->get_user($rating['user_id'])->row_array();
                            echo $user_details['first_name'].' '.$user_details['last_name'];
                          ?>
                        </h4>
                      </div>
                    </div>
                    <!-- End Review -->
                  </div>

                  <div class="col-lg-8">
                    <ul class="list-inline mb-2">
                      <?php for($i = 1; $i < 6; $i++):?>
                        <?php if ($i <= $rating['rating']): ?>
                          <li class="list-inline-item mr-1"><img src="<?= base_url('assets/frontend/nifty/svg/illustrations/star.svg'); ?>" alt="Review rating" width="16"></li>
                        <?php else: ?>
                          <li class="list-inline-item mr-1"><img src="<?= base_url('assets/frontend/nifty/svg/illustrations/star-muted.svg'); ?>" alt="Review rating" width="16"></li>
                        <?php endif; ?>
                      <?php endfor; ?>
                    </ul>

                    <p><?php echo $rating['review']; ?></p>
                  </div>
                </div>
              </div>
              <!-- End Review -->
            <?php endforeach; ?>
          </div>
          <!-- End Ratings & Reviews -->
        </div>
      </div>
    </div>
    <!-- End Description Section -->
    <script type="text/javascript">
      function go_course_playing_page(course_id, lesson_id){
        var course_playing_url = "<?php echo site_url('home/lesson/'.slugify($course_details['title'])); ?>/"+course_id+'/'+lesson_id;

        $.ajax({
          url: '<?php echo site_url('home/go_course_playing_page/'); ?>'+course_id,
          type: 'POST',
          success: function(response) {
            if(response == 1){
              window.location.replace(course_playing_url);
            }
          }
        });
      }
    </script>

