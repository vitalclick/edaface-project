<!-- Go to Top -->
  <a class="js-go-to go-to position-fixed visibility-hidden" href="javascript:;"
     data-hs-go-to-options='{"offsetTop": 700,"position": {"init": {"right": 15},"show": {"bottom": 15},"hide": {"bottom": -15}}}'>
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- End Go to Top -->

  <!-- JS Global Compulsory -->
  <script src="<?= base_url('assets/frontend/nifty/vendor/jquery-migrate/dist/jquery-migrate.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- JS Implementing Plugins -->
  <script src="<?= base_url('assets/frontend/nifty/vendor/hs-header/dist/hs-header.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/hs-go-to/dist/hs-go-to.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/hs-unfold/dist/hs-unfold.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/hs-mega-menu/dist/hs-mega-menu.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/hs-show-animation/dist/hs-show-animation.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/typed.js/lib/typed.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/fancybox/dist/jquery.fancybox.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/slick-carousel/slick/slick.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/jquery-countdown/dist/jquery.countdown.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/select2/dist/js/select2.full.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/hs-sticky-block/dist/hs-sticky-block.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/clipboard/dist/clipboard.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/jquery-mask-plugin/dist/jquery.mask.min.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/vendor/quill/dist/quill.min.js'); ?>"></script>

  <!-- JS Front -->
  <script src="<?= base_url('assets/frontend/nifty/js/hs.core.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/js/hs.validation.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/js/hs.fancybox.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/js/hs.slick-carousel.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/js/hs.countdown.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/js/hs.select2.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/js/hs.clipboard.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/js/hs.mask.js'); ?>"></script>
  <script src="<?= base_url('assets/frontend/nifty/js/hs.quill.js'); ?>"></script>
  <script src="<?php echo base_url() . 'assets/frontend/nifty/js/jQuery.tagify.js'; ?>"></script>
  <script type="text/javascript">
    if($('.tagify').height()){
      $('.tagify').tagify();
    }
  </script>
  <!-- IE Support -->
  <script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?= base_url("assets/frontend/nifty/vendor/polifills.js"); ?>"><\/script>');
  </script>


<script src="<?php echo base_url().'assets/global/toastr/toastr.min.js'; ?>"></script>
<script type="text/javascript">
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "2000",
    "hideDuration": "2000",
    "timeOut": "2000",
    "extendedTimeOut": "2000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
</script>

<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != ""):?>
	<script type="text/javascript">
		toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
	</script>
<?php endif;?>
<?php if ($this->session->flashdata('error_message') != ""):?>
	<script type="text/javascript">
		toastr.error('<?php echo $this->session->flashdata("error_message");?>');
	</script>
<?php endif;?>
<?php if ($this->session->flashdata('info_message') != ""):?>
  <script type="text/javascript">
    toastr.info('<?php echo $this->session->flashdata("info_message");?>');
  </script>
<?php endif;?>
<!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // initialization of header
      var header = new HSHeader($('#header')).init();

      // initialization of mega menu
      var megaMenu = new HSMegaMenu($('.js-mega-menu')).init();

      // initialization of unfold
      var unfold = new HSUnfold('.js-hs-unfold-invoker').init();

      // initialization of form validation
      $('.js-validate').each(function() {
        $.HSCore.components.HSValidation.init($(this), {
          rules: {
            confirmPassword: {
              equalTo: '#signupPassword'
            }
          }
        });
      });

      // initialization of show animations
      $('.js-animation-link').each(function () {
        var showAnimation = new HSShowAnimation($(this)).init();
      });

      // initialization of fancybox
      $('.js-fancybox').each(function () {
        var fancybox = $.HSCore.components.HSFancyBox.init($(this));
      });

      // initialization of slick carousel
      $('.js-slick-carousel').each(function() {
        var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
      });

      // initialization of select2
      $('.js-custom-select').each(function () {
        var select2 = $.HSCore.components.HSSelect2.init($(this));
      });

      // initialization of go to
      $('.js-go-to').each(function () {
        var goTo = new HSGoTo($(this)).init();
      });

      // initialization of sticky blocks
      $('.js-sticky-block').each(function () {
        var stickyBlock = new HSStickyBlock($(this)).init();
      });

      // initialization of clipboard
      $('.js-clipboard').each(function() {
        var clipboard = $.HSCore.components.HSClipboard.init(this);
      });

      // initialization of masked input
      $('.js-masked-input').each(function () {
        var mask = $.HSCore.components.HSMask.init($(this));
      });

       // initialization of quilljs editor
      var quill = $.HSCore.components.HSQuill.init('.js-quill');
    });
  </script>
