 <?php
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
$cart_items = $this->session->userdata('cart_items');

foreach (json_decode($user_details['wishlist']) as $wishlist):
$course_details = $this->crud_model->get_course_by_id($wishlist)->row_array();
?>
<!-- Promo Item -->
<div class="navbar-promo-item wishlist-item">
    <a class="navbar-promo-link" href="<?php echo site_url('home/course/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id']); ?>">
      <div class="media align-items-center">
        <img class="navbar-promo-icon" src="<?php echo $this->crud_model->get_course_thumbnail_url($wishlist);?>" alt="SVG">
        <div class="media-body">
          <span class="navbar-promo-title">
            <small class="text-sm m-0"><?php echo $course_details['title']; ?></small>
            <?php if ($course_details['is_free_course'] == 1): ?>
                <span class="current-price badge badge-primary badge-pill ml-1"><?php echo site_phrase('free'); ?></span>
            <?php else:  ?>
                <?php if ($course_details['discount_flag'] == 1): ?>
                    <span class="current-price badge badge-primary badge-pill ml-1"><?php echo currency($course_details['discounted_price']); ?></span>
                    <span class="original-price badge badge-secondary badge-pill ml-1"><del><?php echo currency($course_details['price']); ?></del></span>
                <?php else: ?>
                    <span class="current-price badge badge-primary badge-pill ml-1"><?php echo currency($course_details['price']); ?></span>
                <?php endif; ?>
            <?php endif; ?>
          </span>
        </div>
      </div>
    </a>

    <?php if(is_purchased($course_details['id'])): ?>
      <a href="<?= site_url('home/my_courses'); ?>" class="btn btn-info cart-menu-btn text-sm">
        <?php echo site_phrase('already_purchased'); ?>
      </a>
    <?php elseif ($course_details['is_free_course'] != 1): ?>
	    <a href="javascript:;" id="<?php echo $course_details['id']; ?>" class="btn btn-outline-primary cart-menu-btn text-sm <?php if(in_array($course_details['id'], $cart_items)) echo 'active'; ?>" onclick="handleCartItems(this, '<?= $course_details['id']; ?>')">
	    	<?php
	            if(in_array($course_details['id'], $cart_items)){
	                echo site_phrase('remove_from_cart');
	            }else {
	                echo site_phrase('add_to_cart');
	            }
	        ?>
	    </a>
	<?php endif; ?>
		
</div>
<!-- End Promo Item -->
<?php endforeach; ?>
<?php if(count(json_decode($user_details['wishlist'])) <= 0): ?>
    <div class="w-100 text-center pt-5">
      <h5><?= site_phrase('no_item_in_wishlist'); ?> !!</h5>
    </div>
<?php endif; ?>
<div class="dropdown-divider mb-0 mt-3 p-0"></div>
<a href="<?php echo site_url('home/my_wishlist'); ?>" class="btn btn-outline-primary w-100 border-0 rounded-0"><?= site_phrase('go_to_wishlist'); ?></a>