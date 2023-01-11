<?php
$paypal_settings = $this->db->get_where('settings', array('key' => 'paypal'))->row()->value;
$paypal = json_decode($paypal_settings);
$stripe_settings = $this->db->get_where('settings', array('key' => 'stripe_keys'))->row()->value;
$stripe = json_decode($stripe_settings);
$razorpay = json_decode(get_settings('razorpay_keys'));
?>
<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('setup_payment_informations'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-md-7" style="padding: 0;">
        <!-- System Currency Settings -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><p><?php echo get_phrase('system_currency_settings'); ?></p></h4>
                    <form class="" action="<?php echo site_url('admin/payment_settings/system_currency'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label><?php echo get_phrase('system_currency'); ?></label>
                            <select class="form-control select2" data-toggle="select2" id = "system_currency" name="system_currency" required>
                                <option value=""><?php echo get_phrase('select_system_currency'); ?></option>
                                <?php
                                $currencies = $this->crud_model->get_currencies();
                                foreach ($currencies as $currency):?>
                                <option value="<?php echo $currency['code'];?>"
                                    <?php if (get_settings('system_currency') == $currency['code'])echo 'selected';?>> <?php echo $currency['code'];?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('currency_position'); ?></label>
                        <select class="form-control select2" data-toggle="select2" id = "currency_position" name="currency_position" required>
                            <option value="left" <?php if (get_settings('currency_position') == 'left') echo 'selected';?> ><?php echo get_phrase('left'); ?></option>
                            <option value="right" <?php if (get_settings('currency_position') == 'right') echo 'selected';?> ><?php echo get_phrase('right'); ?></option>
                            <option value="left-space" <?php if (get_settings('currency_position') == 'left-space') echo 'selected';?> ><?php echo get_phrase('left_with_a_space'); ?></option>
                            <option value="right-space" <?php if (get_settings('currency_position') == 'right-space') echo 'selected';?> ><?php echo get_phrase('right_with_a_space'); ?></option>
                        </select>
                    </div>

                    <div class="row justify-content-md-center">
                        <div class="form-group col-md-6">
                            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_system_currency'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        
</div>


<!--Paystack payment gateway addon-->
<?php
if(addon_status('paystack') == 1):
    include "paystack_settings.php";
endif;
?>
<!--payumoney payment gateway addon-->
<?php
if (addon_status('payumoney') == 1) :
    include "payumoney_settings.php";
endif;
?>
<!--razorpay payment gateway addon-->
<?php
if (addon_status('razorpay') == 1) :
    include "razorpay_settings.php";
endif;
?>
<!--instamojo payment gateway addon-->
<?php
if (addon_status('instamojo') == 1) :
    include "instamojo_settings.php";
endif;
?>
<!--pagseguro payment gateway addon-->
<?php
if (addon_status('pagseguro') == 1) :
    include "pagseguro_settings.php";
endif;
?>
<!--mercadopago payment gateway addon-->
<?php
if (addon_status('mercadopago') == 1) :
    include "mercadopago_settings.php";
endif;
?>
<!--ccavenue payment gateway addon-->
<?php
if (addon_status('ccavenue') == 1) :
    include "ccavenue_settings.php";
endif;
?>
<!--flutterwave payment gateway addon-->
<?php
if (addon_status('flutterwave') == 1) :
    include "flutterwave_settings.php";
endif;
?>
<!--paytm payment gateway addon-->
<?php
if (addon_status('paytm') == 1) :
    include "paytm_settings.php";
endif;
?>
<?php
if (addon_status('iyzico') == 1) :
    include "iyzico_settings.php";
endif;
?>
<?php
if (addon_status('payu_latam') == 1) :
    include "payu_latam_settings.php";
endif;
?>
</div>
<div class="col-md-5">
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading"><?php echo get_phrase('heads_up'); ?>!</h4>
        <p><?php echo get_phrase('please_make_sure_that').' "'.get_phrase('system_currency').'", '.'"'.get_phrase('paypal_currency').'" and '.'"'.get_phrase('stripe_currency').'" '.get_phrase('are_same'); ?>.</p>
    </div>
</div>
</div>
