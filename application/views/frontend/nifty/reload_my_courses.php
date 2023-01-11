<?php foreach ($my_courses as $my_course):
  //check ajax reload or hard reload
  if(!isset($page_name)){
    $course_details = $this->crud_model->get_course_by_id($my_course['id'])->row_array();
  }else{
    $course_details = $this->crud_model->get_course_by_id($my_course['course_id'])->row_array();
  }
?>
  <div class="col-lg-3 col-md-6">
    <div class="card m-2">
      <div class="card-body p-0">
        <a href="<?php echo site_url('home/course/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id']); ?>">
            <div class="course-image">
                <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']); ?>" alt="" class="w-100">
            </div>
        </a>

        <div class="" id = "course_info_view_<?php echo $course_details['id'];  ?>">
          <div class="p-2">
            <a class="w-100" href="<?php echo site_url('home/course/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id']); ?>"><h5 class="title text-muted"><?php echo ellipsis($course_details['title']); ?></h5></a>
            <div class="w-100 text-right">
              <small><?php echo ceil(course_progress($course_details['id'])); ?>% <?php echo site_phrase('completed'); ?></small>
            </div>
            <div class="progress mb-3 height-5-px">
              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo course_progress($course_details['id']); ?>%" aria-valuenow="<?php echo course_progress($course_details['id']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <?php
             $get_my_rating = $this->crud_model->get_user_specific_rating('course', $course_details['id']);
             for($i = 1; $i < 6; $i++):?>
             <?php if ($i <= $get_my_rating['rating']): ?>
                <img src="<?= base_url('assets/frontend/nifty/svg/illustrations/star.svg'); ?>" alt="Review rating" width="14">
            <?php else: ?>
                <img src="<?= base_url('assets/frontend/nifty/svg/illustrations/star-muted.svg'); ?>" alt="Review rating" width="14">
             <?php endif; ?>
            <?php endfor; ?>
              
            <a class="float-right text-warning" href="javascript:;" id = "edit_rating_btn_<?php echo $course_details['id']; ?>" onclick="toggleRatingView('<?php echo $course_details['id']; ?>')"><?php echo site_phrase('edit_rating'); ?></a>
            <div class="row mt-5 mb-5">
              <div class="col-md-12">
                <a href="<?php echo site_url('home/lesson/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id']); ?>" class="btn btn-success w-100 btn-sm"><?php echo site_phrase('start_lesson'); ?></a>
              </div>
            </div>
          </div>
        </div>

        <div class="p-2 pb-4 hidden" id = "course_rating_view_<?php echo $course_details['id']; ?>">
          <a href="<?php echo site_url('home/course/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id']); ?>"><h5 class="title"><?php echo ellipsis($course_details['title']); ?></h5></a>
          <?php
  					$user_specific_rating = $this->crud_model->get_user_specific_rating('course', $course_details['id']);
  				?>
  				<form class="" action="javascript:;" method="post">
  					<div class="form-group select">
  						<div class="styled-select">
  							<select class="form-control" name="star_rating" id="star_rating_of_course_<?php echo $course_details['id']; ?>">
  								<option value="1" <?php if ($user_specific_rating['rating'] == 1): ?>selected=""<?php endif; ?>>1 <?php echo site_phrase('out_of'); ?> 5</option>
  								<option value="2" <?php if ($user_specific_rating['rating'] == 2): ?>selected=""<?php endif; ?>>2 <?php echo site_phrase('out_of'); ?> 5</option>
  								<option value="3" <?php if ($user_specific_rating['rating'] == 3): ?>selected=""<?php endif; ?>>3 <?php echo site_phrase('out_of'); ?> 5</option>
  								<option value="4" <?php if ($user_specific_rating['rating'] == 4): ?>selected=""<?php endif; ?>>4 <?php echo site_phrase('out_of'); ?> 5</option>
  								<option value="5" <?php if ($user_specific_rating['rating'] == 5): ?>selected=""<?php endif; ?>>5 <?php echo site_phrase('out_of'); ?> 5</option>
  							</select>
  						</div>
  					</div>
  					<div class="form-group add_top_30">
  						<textarea name="review" id ="review_of_a_course_<?php echo $course_details['id']; ?>" class="form-control height-120-px" placeholder="<?php echo site_phrase('write_your_review_here'); ?>"><?php echo $user_specific_rating['review']; ?></textarea>
  					</div>
  					<button type="" class="btn btn-block btn-info btn-sm" onclick="publishRating('<?php echo $course_details['id']; ?>')" name="button"><?php echo site_phrase('publish_rating'); ?></button>
  					<a href="javascript::" class="btn btn-block btn-danger btn-sm" onclick="toggleRatingView('<?php echo $course_details['id']; ?>')" name="button"><?php echo site_phrase('cancel'); ?></a>
  				</form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>