<?php
$this->db->where('user_id', $this->session->userdata('user_id'));
$purchase_history = $this->db->get('payment',$per_page, $this->uri->segment(3));
?>
<!-- Hero Section -->
<div class="container">
  <div class="bg-primary rounded mt-4" style="background: url(<?= base_url('assets/frontend/nifty/img/cart-book-512.png'); ?>) right bottom no-repeat; background-size: contain;">
      <div class="py-4 px-6">
        <h2 class="display-4 text-white"><?php echo site_phrase('purchase_history'); ?></h2>
      </div>
  </div>
</div>
<!-- End Hero Section -->

<?php include "profile_menus.php"; ?>

<section class="purchase-history-list-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="purchase-history-list">
                    <li class="purchase-history-list-header">
                        <div class="row">
                            <div class="col-sm-6"><h4 class="purchase-history-list-title"> <?php echo site_phrase('courses'); ?> </h4></div>
                            <div class="col-sm-6 d-none d-md-block d-lg-block">
                                <div class="row">
                                    <div class="col-sm-3"> <?php echo site_phrase('date'); ?> </div>
                                    <div class="col-sm-3"> <?php echo site_phrase('total_price'); ?> </div>
                                    <div class="col-sm-4"> <?php echo site_phrase('payment_type'); ?> </div>
                                    <div class="col-sm-2"> <?php echo site_phrase('actions'); ?> </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php if ($purchase_history->num_rows() > 0):
                        foreach($purchase_history->result_array() as $key => $each_purchase):
                            $course_details = $this->crud_model->get_course_by_id($each_purchase['course_id'])->row_array();?>
                            <li class="purchase-history-items mb-2 <?php if($purchase_history->num_rows() == ($key+1)) echo 'border-0'; ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="purchase-history-course-img">
                                            <a class="purchase-history-course-title" href="<?php echo site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']); ?>" >
                                              <img width="200" src="<?php echo $this->crud_model->get_course_thumbnail_url($each_purchase['course_id']);?>" class="img-fluid">
                                            </a>
                                        </div>
                                        <a class="purchase-history-course-title text-muted" href="<?php echo site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']); ?>" >
                                            <?php
                                            echo $course_details['title'];
                                            ?>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 purchase-history-detail">
                                        <div class="row">
                                            <div class="col-sm-3 date">
                                                <?php echo date('D, d-M-Y', $each_purchase['date_added']); ?>
                                            </div>
                                            <div class="col-sm-3 price"><b>
                                                <?php echo currency($each_purchase['amount']); ?>
                                            </b></div>
                                            <div class="col-sm-4 payment-type">
                                                <?php echo ucfirst($each_purchase['payment_type']); ?>
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="<?php echo site_url('home/invoice/'.$each_purchase['id']); ?>" target="_blank" class="btn btn-receipt"><?php echo site_phrase('invoice'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>
                            <div class="row text-center">
                                <?php echo site_phrase('no_records_found'); ?>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
  if(addon_status('offline_payment') == 1):
    include "pending_purchase_course_history.php";
  endif;
?>
<nav>
    <?php echo $this->pagination->create_links(); ?>
</nav>