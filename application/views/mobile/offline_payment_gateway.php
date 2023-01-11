<style>
	.offline-form{
		display: none;
	}

	.payment-gateway-icon-offline{
		height: 32px;
		float: right;
		margin-right: 25%;
	}
	.offline_payment_instruction{
		padding: 20px;
		min-height: 100px;
		width: 100%;
		background-color: #E6E9FC;
		margin-top: 100px;
		border-radius: 10px;
	}

	@media only screen and (max-width: 600px) {
	  .offline{
	    margin-left: 5px;
	    width: 70%;
	  }
	}

</style>

<div class="row payment-gateway offline" onclick="selectedOfflinePaymentGateway()">
	<div class="col-12">
		<img class="tick-icon offline-icon" src="<?php echo base_url('assets/payment/tick.png'); ?>">
		<img class="payment-gateway-icon-offline" src="<?php echo base_url('assets/payment/offline_payment.png'); ?>">
	</div>
</div>

<script>
	function selectedOfflinePaymentGateway(){
		$(".payment-gateway").css("border","2px solid #D3DCDD");
		$('.tick-icon').hide();
		$('.form').hide();

		$(".offline").css("border","2px solid #00D04F");
		$('.offline-icon').show();
		$('.offline-form').show();
	}
</script>