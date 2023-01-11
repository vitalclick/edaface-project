<?php $total_price = 0; ?>
<!-- cart - Mega Menu -->
  <div class="row no-gutters">
    <div class="col-lg-8">
    	<?php foreach ($this->session->userdata('cart_items') as $cart_item):
			$course_details = $this->crud_model->get_course_by_id($cart_item)->row_array();
			$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();

      if($course_details['discount_flag'] == 1):
        $total_price += $course_details['discounted_price'];
      else:
        $total_price  += $course_details['price'];
      endif;
		?>
      <div class="navbar-promo-card-deck">
        <!-- Promo Item -->
        <div class="navbar-promo-card navbar-promo-item">
          <a class="navbar-promo-link disabled" href="javascript:;">
            <div class="media align-items-center">
              <img src="<?php echo $this->crud_model->get_course_thumbnail_url($cart_item);?>" alt="SVG" class="navbar-promo-icon">
              <div class="media-body">
                <span class="navbar-promo-text text-dark"><?php echo $course_details['title']; ?></span>
                <span class="by-user">
                	<?php echo site_phrase('by').' '.$instructor_details['first_name'].' '.$instructor_details['last_name']; ?>
                	
                    <?php if ($course_details['discount_flag'] == 1): ?>
                        <span class="float-right"><del><?php echo currency($course_details['price']); ?></del></span>
                        <span class="float-right mr-4 text-primary"><?php echo currency($course_details['discounted_price']); ?></span>
                    <?php else: ?>
                        <span class="float-right text-primary"><?php echo currency($course_details['price']); ?></span>
                    <?php endif; ?>
                </span>
              </div>
            </div>
          </a>
        </div>
        <!-- End Promo Item -->
      </div>
      <?php endforeach; ?>
      <?php if(count($this->session->userdata('cart_items')) <= 0): ?>
        <div class="w-100 text-center pt-5">
          <img src="<?= base_url('assets/frontend/nifty/img/empty-cart.png'); ?>"></img>
          <h5><?= site_phrase('no_item_in_cart'); ?> !!</h5>
        </div>
      <?php endif; ?>
    </div>

    <!-- Promo -->
    <div class="col-lg-4 navbar-promo d-lg-block px-2">
      <a class="d-block navbar-promo-inner" href="javascript:;">
        <div class="position-relative text-center">
          <span><?php echo site_phrase('total'); ?> : <?php if($total_price != 0){ echo currency($total_price); }else{ echo currency('0'); } ?></span>
        </div>
      </a>
      <a class="btn btn-primary btn-sm w-100 mt-3" href="<?= site_url('home/shopping_cart'); ?>"><i class="fas fa-shopping-cart float"></i> &nbsp;&nbsp;&nbsp;<?= site_phrase('cart'); ?></a>
      <a class="btn btn-success btn-sm w-100 mt-3 mb-2 <?php if($total_price == 0) echo 'disabled'; ?>" href="<?= site_url('home/payment'); ?>"><i class="fas fa-credit-card float"></i> &nbsp;&nbsp;&nbsp;<?= site_phrase('buy'); ?></a>
    </div>
    <!-- End Promo -->
  </div>
<!-- End cart - Mega Menu -->
<div class="d-none"><?php if($page_name != 'shopping_cart'){ $this->session->set_userdata('total_price_of_checking_out', $total_price); } ?></div>
