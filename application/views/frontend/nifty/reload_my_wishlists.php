<?php
  foreach ($my_courses as $my_course):
    $course_wise_sub_category = $this->crud_model->get_category_details_by_id($my_course['sub_category_id'])->row_array();
    $user_details = $this->user_model->get_all_user($my_course['user_id'])->row_array();

    $total_rating =  $this->crud_model->get_ratings('course', $my_course['id'], true)->row()->rating;
    $number_of_ratings = $this->crud_model->get_ratings('course', $my_course['id'])->num_rows();
    if ($number_of_ratings > 0) {
      $average_ceil_rating = ceil($total_rating / $number_of_ratings);
    }else {
      $average_ceil_rating = 0;
    }

    $is_wishlist_item = $this->crud_model->is_added_to_wishlist($my_course['id']);
    if(in_array($my_course['id'], $this->session->userdata('cart_items'))){
      $is_cart_item = true;
    }else{
      $is_cart_item = false;
    }
  ?>
    <div class="col-md-6 col-lg-4 mb-5">
	    <div class="card border h-100">
	      <div class="card-img-top position-relative">
	        <a href="<?php echo site_url('home/course/'.rawurlencode(slugify($my_course['title'])).'/'.$my_course['id']); ?>">
	          <img class="card-img-top opacity-9" src="<?php echo $this->crud_model->get_course_thumbnail_url($my_course['id']); ?>" alt="Image Description">
	        </a>

	        <div class="position-absolute top-0 left-0 mt-3 ml-3">
	          <i id="wishlist-heart-<?= $my_course['id']; ?>" class="far fa-trash-alt wishlist-heart <?php if($is_wishlist_item == true) echo 'wishlist-heart-checked'; ?>" data-toggle="tooltip" data-placement="top" title="<?php if($is_wishlist_item == true){echo site_phrase('remove_from_wishlist'); }else{echo site_phrase('add_to_wishlist'); } ?>" onclick="handleWishList(this, '<?= $my_course['id']; ?>', 'my_wishlist')"></i>
	        </div>

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
	        <small class="d-block small text-cap mb-2">
	          <a href="<?= site_url('home/courses?category='.$course_wise_sub_category['slug']); ?>" class="text-muted text-sm"><?= $course_wise_sub_category['name']; ?></a>
	        </small>

	        <div class="mb-3">
	          <h5>
	            <a class="text-inherit text-muted" href="<?php echo site_url('home/course/'.rawurlencode(slugify($my_course['title'])).'/'.$my_course['id']); ?>"><?= $my_course['title']; ?></a>
	          </h5>
	        </div>

	        <div class="d-flex align-items-center">
	          <div class="avatar-group">
	            <a class="avatar avatar-xs avatar-circle" data-toggle="tooltip" data-placement="top" title="<?= $user_details['first_name'].' '.$user_details['last_name']; ?>" href="<?= site_url('home/instructor_page/'.$my_course['user_id']); ?>">
	              <img class="avatar-img" src="<?= $this->user_model->get_user_image_url($my_course['user_id']); ?>" alt="Image Description">
	            </a>
	          </div>
	          <div class="d-flex align-items-center ml-auto">
	            <div class="small text-muted">
	              <i class="fa fa-book-reader d-block d-sm-inline-block mb-1 mb-sm-0 mr-1" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('total_lesson'); ?>"></i>
	              <?php
	                $number_of_lessons = $this->crud_model->get_lessons('course', $my_course['id'])->num_rows();
	                echo $number_of_lessons.' '.site_phrase('lessons');
	              ?>
	            </div>
	            <small class="text-muted mx-2">|</small>
	            <div class="small text-muted">
	              <i class="fa fa-clock d-block d-sm-inline-block mb-1 mb-sm-0 mr-1" data-toggle="tooltip" data-placement="top" title="<?= site_phrase('total_duration'); ?>"></i>
	              <?php echo $this->crud_model->get_total_duration_of_lesson_by_course_id($my_course['id']); ?>
	            </div>
	          </div>
	        </div>
	      </div>

	      <div class="card-footer border-0 pt-0">
	        <div class="d-flex justify-content-between align-items-center">
	          <div class="mr-2">
	            <?php if ($my_course['is_free_course'] == 1): ?>
	              <span class="d-block h5 text-lh-sm mb-0"><?php echo site_phrase('free'); ?></span>
	            <?php else: ?>
	                <?php if ($my_course['discount_flag'] == 1): ?>
	                    <span class="d-block text-muted text-lh-sm"><del><?php echo currency($my_course['price']); ?></del></span>
	                    <span class="d-block h5 text-lh-sm mb-0"><?php echo currency($my_course['discounted_price']); ?></span>
	                <?php else: ?>
	                    <span class="d-block h5 text-lh-sm mb-0"><?php echo currency($my_course['price']); ?></span>
	                <?php endif; ?>
	            <?php endif; ?>
	          </div>
	          <a class="btn btn-sm btn-primary transition-3d-hover" href="<?php echo site_url('home/course/'.rawurlencode(slugify($my_course['title'])).'/'.$my_course['id']); ?>"><?= site_phrase('course_details'); ?></a>
	        </div>
	      </div>
	    </div>
	</div>
<?php endforeach; ?>
