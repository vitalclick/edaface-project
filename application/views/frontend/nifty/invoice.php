<?php
$course_details = $this->crud_model->get_course_by_id($payment_info['course_id'])->row_array();
$buyer_details = $this->user_model->get_all_user($payment_info['user_id'])->row_array();
$sub_category_details = $this->crud_model->get_category_details_by_id($course_details['sub_category_id'])->row_array();
$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
?>

<?php include "profile_menus.php"; ?>

<section class="purchase-history-list-area">
    <!-- Invoice Section -->
    <div class="container space-2 px-md-7 px-lg-11">
      <div class="card border bg-img-hero" style="background-image: url(<?= base_url('assets/frontend/nifty/svg/components/abstract-shapes-18.svg'); ?>);">
        <div class="card-body p-5 p-md-7 p-lg-11">
          <div class="row justify-content-lg-between align-items-sm-center mb-5">
            <div class="col-md-6 order-sm-1 pt-5">
              <!-- Address -->
              <h3><?= get_settings('system_title'); ?></h3>
              <address class="m-0">
                <?= get_settings('system_email'); ?>
              </address>
              <address class="m-0">
                <?= get_settings('address'); ?>
              </address>
              <small class="d-block text-muted"><?= site_phrase('phone'); ?>: <?= get_settings('phone'); ?></small>
              <!-- End Address -->
            </div>
            <div class="col-md-6 order-sm-1 pt-0 mt-0">
                <!-- Logo -->
              <img class="float-right" width="250" src="<?= base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="Logo">
              <!-- End Logo -->
            </div>
        </div>
        <hr>
        <div class="row justify-content-lg-between align-items-sm-center mb-11">
            <div class="col-md-6 order-sm-1">
              <!-- Address -->
              <h3><?= site_phrase('bill_to'); ?> :</h3>
              <address class="m-0">
                <?php echo $buyer_details['first_name'].' '.$buyer_details['last_name']; ?>
              </address>
              <small class="d-block text-muted"><?php echo site_phrase('email'); ?>: <?php echo $buyer_details['email']; ?></small>
              <!-- End Address -->
            </div>
            <div class="col-md-6 order-sm-1 pt-6 text-right">
                <?= site_phrase('purchase_date') ?> : <?php echo date('D, d-M-Y', $payment_info['date_added']); ?>
                <br>
                <?= site_phrase('payment_method'); ?> : <?php echo ucfirst($payment_info['payment_type']); ?>
            </div>
        </div>
          
          <!-- Table -->
          <div class="table-responsive-lg">
            <table class="table table-heighlighted font-size-1 mb-0">
              <thead>
                <tr class="text-uppercase text-body">
                  <th scope="col" class="font-weight-bold"><?= site_phrase('course'); ?></th>
                  <th scope="col" class="font-weight-bold"><?= site_phrase('category'); ?></th>
                  <th scope="col" class="font-weight-bold"><?= site_phrase('instructor'); ?></th>
                  <th scope="col" class="font-weight-bold text-right"><?= site_phrase('price'); ?></th>
                </tr>
              </thead>
              <tbody class="text-dark">
                <tr>
                  <th scope="row"><?php echo $course_details['title']; ?></th>
                  <td><?php echo $sub_category_details['name']; ?></td>
                  <td><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></td>
                  <td class="text-right"><?php echo currency($payment_info['amount']); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End Table -->

          <!-- Total -->
          <div class="border-top border-dark pt-2 mb-9">
            <div class="row">
              <div class="col-6">
                <div class="text-dark pl-2">
                  <?php echo site_phrase('sub_total'); ?>
                </div>
              </div>
              <div class="col-6 text-right">
                <div class="text-dark pr-2">
                  <?php echo currency($payment_info['amount']); ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="text-dark pl-2">
                  <?php echo site_phrase('grand_total'); ?>
                </div>
              </div>
              <div class="col-6 text-right">
                <div class="text-dark pr-2">
                  <?php echo currency($payment_info['amount']); ?>
                </div>
              </div>
            </div>
          </div>
          <!-- End Total -->


          <!-- Contacts -->
          <div class="row mt-10 justify-content-lg-between">
            <div class="col-md-12 text-right">
              <p class="small text-muted mb-0">&copy; <?= get_settings('footer_text'); ?></p>
            </div>
          </div>
          <!-- End Contacts -->
        </div>
      </div>

      <div class="text-right mt-5">
        <button type="button" class="btn btn-primary transition-3d-hover" onclick="window.print();return false;">
          <i class="fas fa-print mr-2"></i>
          <?= site_phrase('print'); ?>
        </button>
      </div>
    </div>
    <!-- End Invoice Section -->
</section>