<?php
$my_courses = $this->user_model->my_courses()->result_array();
$categories = array();
foreach ($my_courses as $my_course) {
    $course_details = $this->crud_model->get_course_by_id($my_course['course_id'])->row_array();
    if (!in_array($course_details['category_id'], $categories)) {
        array_push($categories, $course_details['category_id']);
    }
}
?>
<!-- Hero Section -->
<div class="container">
  <div class="bg-primary rounded mt-4" style="background: url(<?= base_url('assets/frontend/nifty/img/books.png'); ?>) right bottom no-repeat;  background-size: contain;">
      <div class="py-4 px-6">
        <h2 class="display-4 text-white"><?php echo site_phrase('my_courses'); ?></h2>
      </div>
  </div>
</div>
<!-- End Hero Section -->

<?php include "profile_menus.php"; ?>

<section class="my-courses-area pt-0">
    <div class="container">
        <div class="row align-items-baseline">
            <div class="col-lg-6 pb-3">
                <div class="my-course-filter-bar filter-box">
                  <span><?php echo site_phrase('filter_by'); ?></span>
                  <div class="btn-group">
                    <a class="btn btn-outline-primary dropdown-toggle all-btn" href="#"data-toggle="dropdown">
                        <?php echo site_phrase('categories'); ?>
                    </a>

                    <div class="dropdown-menu">
                        <?php foreach ($categories as $category):
                            $category_details = $this->crud_model->get_categories($category)->row_array();
                            ?>
                            <a class="dropdown-item" href="#" id = "<?php echo $category; ?>" onclick="getCoursesByCategoryId(this.id)"><?php echo $category_details['name']; ?></a>
                        <?php endforeach; ?>
                    </div>
                  </div>
                  <div class="btn-group">
                    <a href="<?php echo site_url('home/my_courses'); ?>" class="btn btn-outline-primary"><i class="fas fa-sync-alt"></i></a>
                  </div>
                </div>
            </div>
            <div class="col-lg-6 pb-5">
              <div class="my-course-search-bar">
                <form action="javascript:;">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" id="search_my_courses_value" placeholder="<?php echo site_phrase('search_my_courses'); ?>" onkeyup="getCoursesBySearchString(this.value)">
                        <div class="input-group-append">
                            <button class="btn" onclick="getCoursesBySearchString($('#search_my_courses_value').val())" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
        <div class="row" id = "my_courses_area">
          <?php include "reload_my_courses.php"; ?>
        </div>
    </div>
</section>