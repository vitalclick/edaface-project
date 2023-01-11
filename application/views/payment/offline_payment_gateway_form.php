<form action="<?php echo site_url('addons/offline_payment/attach_payment_document'); ?>" class="offline-form form" method="post" enctype="multipart/form-data">
	<hr class="border mb-4">
	<label for="amount"><?php echo get_phrase('payable_amount'); ?></label>
	<input type="number" id="amount" class="form-control" name="amount" value="<?php echo $total_price_of_checking_out; ?>" readonly>
	<label class="mt-4" for="payment_document"><?php echo get_phrase('document_of_your_payment'); ?> (jpg, pdf, txt, png, docx)</label>
	<input type="file" class="form-control" id="payment_document" name="payment_document" required>
	<button type="submit" class="payment-button float-right mt-4"><?php echo get_phrase('submit_payment_document'); ?></button>


	<div class="offline_payment_instruction">
		<p><?php echo get_phrase('instruction'); ?>: Admin will review your payment document and then approve the course purchase.</p>
	</div>
</form>
