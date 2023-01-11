<!-- Cart Section -->
<div class="container space-1 space-md-2">
	<div class="row" id="shopping_cart_inner_view">
	    <?php include "shopping_cart_inner_view.php"; ?>
	</div>
</div>
<!-- End Cart Section -->

<script type="text/javascript">
	function applyCoupon() {
        $("#spinner").removeClass('hidden');
        var couponCode = $("#coupon-code").val();
        url3 = '<?php echo site_url('home/refreshShoppingCart'); ?>';
        $.ajax({
            url: url3,
            type: 'POST',
            data: {
                couponCode: couponCode
            },
            success: function(response) {
                $("#spinner").addClass('hidden');
                $('#shopping_cart_inner_view').html(response);
            }
        });
    }
</script>