<?php
isset($layout) ? "": $layout = "list";
isset($selected_category_id) ? "": $selected_category_id = "all";
isset($selected_level) ? "": $selected_level = "all";
isset($selected_language) ? "": $selected_language = "all";
isset($selected_rating) ? "": $selected_rating = "all";
isset($selected_price) ? "": $selected_price = "all";

if($selected_category_id != 'all'){
  $selected_category_slug = $this->crud_model->get_category_details_by_id($selected_category_id)->row('slug');
}else{
  $selected_category_slug = 'all';
}
?>

<!-- Hero Section -->
<div class="container space-top-1">
<div class="bg-primary rounded" style="background: url(<?= base_url('assets/frontend/nifty//svg/illustrations/knowledgebase-community-2.svg'); ?>) right bottom no-repeat;">
    <div class="py-4 px-6">
      <h1 class="display-5 text-white"><?php echo site_phrase('course_list'); ?></h1>
      <p class="text-white mb-0">
        <span class="font-weight-bold"><?php echo count($courses); ?> </span><?php echo site_phrase('courses_on_this_page'); ?>
      </p>
    </div>
  </div>
</div>
<!-- End Hero Section -->

<!-- Courses Section for mobile-->
<div class="container space-2">
  <div class="row">
    <div class="col-lg-3 mb-5 mb-lg-0">
      <div class="navbar-expand-lg navbar-expand-lg-collapse-block show">
        <!-- Responsive Toggle Button -->
        <button type="button" class="navbar-toggler btn btn-block border py-3"
                aria-label="Toggle navigation"
                aria-expanded="false"
                aria-controls="sidebarNav"
                data-toggle="collapse"
                data-target="#sidebarNav">
          <span class="d-flex justify-content-between align-items-center">
            <span class="h5 mb-0"><?php echo site_phrase('view_all_categories'); ?></span>
            <span class="navbar-toggler-default">
              <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z"/>
              </svg>
            </span>
            <span class="navbar-toggler-toggled">
              <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
              </svg>
            </span>
          </span>
        </button>
        <!-- End Responsive Toggle Button -->

        <div id="sidebarNav" class="collapse navbar-collapse">
          <?php
          $categories = $this->crud_model->get_categories()->result_array();
          foreach ($categories as $key => $category):
            $counter = 0; ?>
            <div class="<?php if($key != 0) echo 'mt-5'; ?>">
              <h2 class="h4">
                <a class="text-inherit <?php if($selected_category_id == $category['id']) echo 'text-success'; ?>" href="javascript:;" onclick="filter('<?= $category['slug']; ?>')">
                  <?php echo $category['name']; ?> <span class="badge badge-success"></span>
                </a>
              </h2>
              <?php $get_sub_categories = $this->crud_model->get_sub_categories($category['id']); ?>
              <?php foreach ($get_sub_categories as $sub_category): 
                $counter++;?>
                <?php if($counter <=5): ?>
                  <a class="dropdown-item d-flex justify-content-between align-items-center px-0 <?php if($selected_category_id == $sub_category['id']) echo 'text-success'; ?>" href="javascript:;" onclick="filter('<?= $sub_category['slug']; ?>')">
                    <span>
                      <?= $sub_category['name']; ?>
                      <?php if($sub_category['id'] == $selected_category_id) echo '<i class="fas fa-angle-double-right"></i>'; ?>
                    </span>
                  </a>
                <?php else: ?>
                  <!-- View More - Collapse -->
                  <?php if($counter == 6): ?> <div class="collapse" id="collapseSection<?= $category['id']; ?>"> <?php endif; ?>

                  <a class="dropdown-item d-flex justify-content-between align-items-center px-0 <?php if($selected_category_id == $sub_category['id']) echo 'text-success'; ?>" href="javascript:;" onclick="filter('<?= $sub_category['slug']; ?>')">
                    <span>
                      <?= $sub_category['name']; ?>
                      <?php if($sub_category['id'] == $selected_category_id) echo '<i class="fas fa-angle-double-right"></i>'; ?>
                    </span>
                  </a>
                  <?php if($counter == count($get_sub_categories)): ?>
                    </div>
                    <!-- Link -->
                    <a class="link link-collapse small font-size-1 font-weight-bold pt-1" data-toggle="collapse" href="#collapseSection<?= $category['id']; ?>" role="button" aria-expanded="false" aria-controls="collapseSection<?= $category['id']; ?>">
                      <span class="link-collapse-default"><?php echo site_phrase('view_more'); ?> +</span>
                      <span class="link-collapse-active"><?php echo site_phrase('view_less'); ?> -</span>
                    </a>
                  <?php endif; ?>
                  <!-- End View More - Collapse -->
                <?php endif; ?>
              <?php endforeach; ?>
              <!-- End Nav Link -->
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="col-lg-9">
      <!-- Filter -->
      <div class="border-bottom pb-3 mb-5">
        <div class="row justify-content-md-start align-items-md-center">
          <div class="col-md-12 mb-3 mb-md-0">
            <p class="font-size-1 mr-md-auto mb-0">
              <a class="btn float-right p-0 <?php if($this->session->userdata('layout') == 'list') echo 'text-success'; ?>" onclick="toggleLayout('list')"><i class="fas fa-th-list"></i></a>
              <a class="btn float-right p-0 mr-2 <?php if($this->session->userdata('layout') == 'grid') echo 'text-success'; ?>" onclick="toggleLayout('grid')"><i class="fas fa-th"></i></a>
              <a href="courses" class="btn float-right p-0 mr-2"><i class="fas fa-sync-alt"></i></a>
            </p>
          </div>
        </div>
        <div class="row justify-content-md-start align-items-md-center">
          <div class="col-md-12 text-md-right">
            <!-- price -->
            <select class="js-custom-select" name="price" id="price-search-value-unique" onchange="filter('<?= $selected_category_slug; ?>')" 
                  data-hs-select2-options='{
                    "minimumResultsForSearch": "Infinity",
                    "customClass": "btn btn-sm btn-white dropdown-toggle mb-1",
                    "placeholder": "<?= site_phrase('price'); ?>",
                    "dropdownAutoWidth": true,
                    "width": "auto"
                  }'>
              <option label="empty"></option>
              <option value="all"><?= site_phrase('all'); ?></option>
              <option value="free" <?php if($selected_price == 'free') echo 'selected'; ?>><?= site_phrase('free'); ?></option>
              <option value="paid" <?php if($selected_price == 'paid') echo 'selected'; ?>><?= site_phrase('paid'); ?></option>
            </select>
            <!-- End price -->
            
            <!-- level -->
            <select class="js-custom-select" name="level" id="level-search-value-unique" onchange="filter('<?= $selected_category_slug; ?>')"
                  data-hs-select2-options='{
                    "minimumResultsForSearch": "Infinity",
                    "customClass": "btn btn-sm btn-white dropdown-toggle mb-1",
                    "placeholder": "<?= site_phrase('level'); ?>",
                    "dropdownAutoWidth": true,
                    "width": "auto"
                  }'>
              <option label="empty"></option>
              <option value="all"><?= site_phrase('all'); ?></option>
              <option value="beginner" <?php if($selected_level == 'beginner') echo 'selected'; ?>><?= site_phrase('beginner'); ?></option>
              <option value="advanced" <?php if($selected_level == 'advanced') echo 'selected'; ?>><?= site_phrase('advanced'); ?></option>
              <option value="intermediate" <?php if($selected_level == 'intermediate') echo 'selected'; ?>><?= site_phrase('intermediate'); ?></option>
            </select>
            <!-- End level -->

            <!-- language -->
            <select class="js-custom-select" name="language" id="language-search-value-unique" onchange="filter('<?= $selected_category_slug; ?>')"
                  data-hs-select2-options='{
                    "minimumResultsForSearch": "Infinity",
                    "customClass": "btn btn-sm btn-white dropdown-toggle mb-1",
                    "placeholder": "<?= site_phrase('language'); ?>",
                    "dropdownAutoWidth": true,
                    "width": "auto"
                  }'>
              <option label="empty"></option>
              <option value="all"><?= site_phrase('all'); ?></option>
              <?php
              $languages = $this->crud_model->get_all_languages();
              foreach ($languages as $language): ?>
                <option value="<?= $language; ?>" <?php if($selected_language == $language) echo 'selected'; ?>><?php echo ucfirst($language); ?></option>
              <?php endforeach; ?>
            </select>
            <!-- End language -->

            <!-- rating -->
            <select class="js-custom-select" name="rating" id="rating-search-value-unique" onchange="filter('<?= $selected_category_slug; ?>')"
                  data-hs-select2-options='{
                    "minimumResultsForSearch": "Infinity",
                    "customClass": "btn btn-sm btn-white dropdown-toggle mb-1",
                    "placeholder": "<?= site_phrase('rating'); ?>",
                    "dropdownAutoWidth": true,
                    "width": "auto"
                  }'>
              <option label="empty"></option>
              <option value="all"><?= site_phrase('all'); ?></option>
              <?php for($i = 1; $i <= 5; $i++): ?>
                <option value="<?= $i; ?>" <?php if($selected_rating == $i) echo 'selected'; ?>><?= $i.' '.site_phrase('star'); ?></option>
              <?php endfor;?>
            </select>
            <!-- End rating -->
          </div>
        </div>
      </div>
      <!-- End Filter -->

      <?php include 'category_wise_course_'.$layout.'_layout.php'; ?>
    </div>
  </div>
</div>
<!-- End Courses Section -->

<script type="text/javascript">

function get_url(selected_category_id) {
    var urlPrefix   = '<?php echo site_url('home/courses?'); ?>'
    var urlSuffix = "";
    var slectedCategory = "";
    var selectedPrice = "";
    var selectedLevel = "";
    var selectedLanguage = "";
    var selectedRating = "";

    // Get selected category
    if(selected_category_id != 'all'){
      slectedCategory = selected_category_id;
    }

    // Get selected price
    if($("#price-search-value-unique").val() != 'all'){
      selectedPrice = $("#price-search-value-unique").val();
    }

    // Get selected difficulty Level
    if($("#level-search-value-unique").val() != 'all'){
      selectedLevel = $("#level-search-value-unique").val();
    }

    // Get selected  language
    if($("#language-search-value-unique").val() != 'all'){
      selectedLanguage = $("#language-search-value-unique").val();
    }

    // Get selected rating
    if($("#rating-search-value-unique").val() != 'all'){
      selectedRating = $("#rating-search-value-unique").val();
    }

    urlSuffix = "category="+slectedCategory+"&&price="+selectedPrice+"&&level="+selectedLevel+"&&language="+selectedLanguage+"&&rating="+selectedRating;
    return urlPrefix+urlSuffix;
}
function filter(selected_category_id) {
    var url = get_url(selected_category_id);
    window.location.replace(url);
    //console.log(url);
}

function toggleLayout(layout) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/set_layout_to_session'); ?>',
        data : {layout : layout},
        success : function(response){
            location.reload();
        }
    });
}


</script>