<!-- Hero Section -->
<div class="container">
  <div class="bg-primary rounded mt-4" style="background: url(<?= base_url('assets/frontend/nifty/img/wish-list.png'); ?>) right bottom no-repeat;  background-size: contain;">
      <div class="py-4 px-6">
        <h2 class="display-4 text-white"><?php echo site_phrase('my_wishlist'); ?></h2>
      </div>
  </div>
</div>
<!-- End Hero Section -->

<?php include "profile_menus.php"; ?>

<section class="my-courses-area mt-0 pt-0">
    <div class="container">
        <div class="row align-items-baseline">
            <div class="col-lg-6 pb-3 mt-2">
            </div>
            <div class="col-lg-6 pb-5 mt-2">
              <div class="my-course-search-bar">
                <form action="javascript:;">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" id="search_my_courses_value" placeholder="<?php echo site_phrase('search_my_courses'); ?>" onkeyup="getMyWishListsBySearchString(this.value)">
                        <div class="input-group-append">
                            <button class="btn" onclick="getMyWishListsBySearchString($('#search_my_courses_value').val())" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
        <div class="row" id = "my_wishlists_area">
          <?php include "reload_my_wishlists.php"; ?>
        </div>
    </div>
</section>
