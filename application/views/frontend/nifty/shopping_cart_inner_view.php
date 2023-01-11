<div class="col-lg-8 mb-7 mb-lg-0">
	<?php
	$item_quantity = 0;
	$actual_price = 0;
	$total_price  = 0;
	if(count($this->session->userdata('cart_items')) > 0): ?>
		<!-- Hero Section -->
		<div class="bg-primary rounded border-bottom mb-5" style="background: url(<?= base_url('assets/frontend/nifty/img/cart.png'); ?>) right bottom no-repeat; background-size: contain;">
		  <div class="py-4 px-6">
		    <h2 class="text-white"><?php echo site_phrase('shopping_cart'); ?></h2>
		    <span class="text-white"><?php echo sizeof($this->session->userdata('cart_items')); ?> <?php echo site_phrase('items'); ?></span>
		  </div>
		</div>
		<!-- End Hero Section -->

		<?php
		foreach ($this->session->userdata('cart_items') as $cart_item):
		$course_details = $this->crud_model->get_course_by_id($cart_item)->row_array();
		$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
		$wishlist_item = $this->crud_model->is_added_to_wishlist($course_details['id']);
		$item_quantity++;

		if($course_details['discount_flag'] == 1):
		    $total_price += $course_details['discounted_price'];
		    $actual_price += $course_details['price'];
		else:
		    $actual_price += $course_details['price'];
		    $total_price  += $course_details['price'];
		endif;
		?>
		<!-- Product Content -->
		<div class="border-bottom pb-5 mb-5">
			<div class="media">
		        <div class="max-w-15rem w-100 mr-3">
					<img class="img-fluid" src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']); ?>" alt="Image Description">
		        </div>
		        <div class="media-body">
					<div class="row">
						<div class="col-md-7 mb-3 mb-md-0">
							<a class="h5 d-block" href="<?php echo site_url('home/course/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id']) ?>"><?= $course_details['title']; ?></a>
							<div class="d-block d-md-none">
								<?php if($course_details['discount_flag'] == 1): ?>
									<span class="h5 d-block mb-1">
										<?= currency($course_details['discounted_price']); ?>
										<span class="text-muted">|</span> <del class="text-muted"><?= currency($course_details['price']); ?></del>
									</span>
								<?php else: ?>
									<span class="h5 d-block mb-1"> <?= currency($course_details['price']); ?> </span>
								<?php endif; ?>
							</div>

							<div class="text-body font-size-1 mb-1">
								<span>
									<?= site_phrase('created_by'); ?>
									<a href="<?= site_url('home/instructor_page/'.$course_details['user_id']); ?>" class="link-underline"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
								</span>
							</div>
						</div>

						<div class="col-md-3">
							<div class="row">
								<div class="col-auto">
									<a class="d-block text-body font-size-1 mb-1" onclick="removeFromCartList(this, '<?= $course_details['id']; ?>')" href="javascript:;">
										<i class="far fa-trash-alt text-hover-primary mr-1"></i>
										<span class="font-size-1 text-hover-primary"><?= site_phrase('remove'); ?></span>
									</a>
								</div>
							</div>
						</div>

						<div class="col-4 col-md-2 d-none d-md-inline-block text-right">
							<?php if($course_details['discount_flag'] == 1): ?>
								<span class="h5 d-block mb-1"><?= currency($course_details['discounted_price']); ?></span>
								<span class="h5 d-block mb-1"><del class="text-muted"><?= currency($course_details['price']); ?></del></span>
							<?php else: ?>
								<span class="h5 d-block mb-1"> <?= currency($course_details['price']); ?> </span>
							<?php endif; ?>
						</div>
					</div>
		        </div>
			</div>
		</div>
		<!-- End Product Content -->
		<?php endforeach; ?>
	    <div class="d-sm-flex justify-content-end">
			<a class="font-weight-bold" href="<?= site_url('home/courses'); ?>">
				<i class="fas fa-angle-left fa-xs mr-1"></i>
				<?= site_phrase('continue_shopping'); ?>
			</a>
	    </div>
	<?php else: ?>
		<div class="w-md-80 w-lg-50 text-center mx-md-auto">
			<figure class="max-w-10rem max-w-sm-15rem mx-auto mb-3">
				<img class="img-fluid" src="<?= base_url('assets/frontend/nifty/svg/illustrations/empty-cart.svg'); ?>" alt="empty">
			</figure>
			<div class="mb-5">
				<h1 class="h2 text-muted"><?= site_phrase('your_cart_is_currently_empty'); ?> !!</h1>
			</div>
			<a class="btn btn-primary btn-pill transition-3d-hover px-5" href="<?= site_url('home/courses'); ?>"><?= site_phrase('start_shopping'); ?></a>
		</div>
	<?php endif; ?>
	<div class="d-none">
		<?php if (isset($coupon_code) && !empty($coupon_code) && $this->crud_model->check_coupon_validity($coupon_code)) :
            $coupon_details = $this->crud_model->get_coupon_details_by_code($coupon_code)->row_array();

            $actual_price = $total_price;
            $total_price = $this->crud_model->get_discounted_price_after_applying_coupon($coupon_code);
            $this->session->set_userdata('total_price_of_checking_out', $total_price);
            $this->session->set_userdata('applied_coupon', $coupon_code);
            echo $total_price;
        else:
			$this->session->set_userdata('total_price_of_checking_out', $total_price);
        	echo $total_price;
        endif;
        ?>
	</div>
</div>

<div class="col-lg-4">
  <div class="pl-lg-4">
    <!-- Order Summary -->
    <div class="card shadow-soft p-4 mb-4">
      <!-- Title -->
      <div class="border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0"><?= site_phrase('order_summary'); ?></h2>
      </div>
      <!-- End Title -->

      <div class="border-bottom pb-4 mb-4">
        <div class="media align-items-center mb-3">
          <span class="d-block font-size-1 mr-3"><?= site_phrase('item_quantity'); ?> (<?= $item_quantity; ?>)</span>
          <div class="media-body text-right">
            <span class="text-dark font-weight-bold">
            	<?php if($total_price == 0): ?>
          			<?= currency('0'); ?>
      			<?php else: ?>
      				<?php if(isset($coupon_code)): ?>
	      				<?= currency($actual_price); ?>
	      			<?php else: ?>
      					<?= currency($total_price); ?>
      				<?php endif; ?>
      			<?php endif; ?>
            </span>
          </div>
        </div>
      </div>

      <div class="media align-items-center mb-3">
        <span class="d-block font-size-1 mr-3"><?= site_phrase('total'); ?></span>
        <div class="media-body text-right">
        	<span class="text-dark font-weight-bold">
        		<?php if($total_price == 0): ?>
          			<?= currency('0'); ?>
      			<?php else: ?>
      				<?php if(isset($coupon_code) && isset($coupon_details)): ?>
	      				<?= currency($total_price); ?>
	      				<del class="text-muted"><?= currency($actual_price); ?></del>
	      			<?php else: ?>
      					<?= currency($total_price); ?>
      				<?php endif; ?>
      			<?php endif; ?>
        	</span>
        </div>
      </div>

      <?php if(isset($coupon_code) && isset($coupon_details)): ?>
	      <div class="media align-items-center mb-3">
	        <div class="media-body text-center">
	        	<span class="font-weight-bold text-warning">
	        		<?php echo $coupon_details['discount_percentage']; ?>% <?php echo site_phrase('coupon_code_applied'); ?> !
	        	</span>
	        </div>
	      </div>
	  <?php endif; ?>

      <div class="row mx-1">
        <div class="col px-1 my-1">
        	<div class="input-group mb-3">
	            <input type="text" class="form-control" placeholder="<?php echo site_phrase('apply_coupon_code'); ?>" id="coupon-code" value="<?php if(isset($coupon_code))echo html_escape($coupon_code); ?>">
	            <div class="input-group-append">
	                <button class="btn btn-success" type="button" onclick="applyCoupon()"><?php echo site_phrase('apply'); ?></button>
	            </div>
	        </div>
        </div>
      </div>
      <div class="row mx-1">
        <div class="col px-1 my-1">
          <a class="btn btn-primary btn-block btn-pill transition-3d-hover" href="<?= site_url('home/payment'); ?>"><?= site_phrase('checkout'); ?></a>
        </div>
      </div>
    </div>
    <!-- End Order Summary -->
  </div>
</div>