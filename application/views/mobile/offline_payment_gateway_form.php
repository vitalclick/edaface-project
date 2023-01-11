<form id="offline-payment-form" action="<?php echo site_url('addons/offline_payment/attach_payment_document/true'); ?>" class="offline-form form" method="post" enctype="multipart/form-data" onsubmit="show_loader_modal()">
	<hr class="border mb-4">
	<label for="amount"><?php echo get_phrase('payable_amount'); ?></label>
	<input type="number" id="amount" class="form-control" name="amount" value="<?php echo $total_price_of_checking_out; ?>" readonly>
	<label class="mt-4" for="payment_document"><?php echo get_phrase('document_of_your_payment'); ?> (jpg, pdf, txt, png, docx)</label>
	<input type="file" class="form-control" id="payment_document" name="payment_document" required>
	<button type="submit" class="payment-button float-right mt-4" onclick="show_loader_modal()"><?php echo get_phrase('submit_payment_document'); ?></button>

	<div class="offline_payment_instruction">
		<p><?php echo get_phrase('instruction'); ?>: Admin will review your payment document and then approve the course purchase.</p>
	</div>
</form>
<div id="loader_modal" style="position: fixed; display: none; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: #42477077; z-index: 1000; color: #fff; text-align: center; padding-top: 100px;">Please wait....</div>
<script>
	function show_loader_modal() {
		if (document.getElementById("payment_document").files.length > 0) {
			$("#loader_modal").show();
		}
	}
</script>
