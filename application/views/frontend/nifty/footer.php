<!-- ========== FOOTER ========== -->
  <footer class="bg-light-footer">
    <div class="container">
      <div class="space-top-2 space-bottom-1 space-bottom-lg-2">
        <div class="row justify-content-lg-between">
        <div class="col-6 col-md-3 col-lg">
          <h2><font color="#0DCAF0">Company</font></h2>
          <hr color="#0DCAF0">

            <!-- Nav Link -->
            <ul class="user-links nav nav-sm nav-x-0 flex-column">
            <li><a target="_blank" href="https://launchpad.edaface.com/login">Eda Token</a></li>
	          <li><a target="_blank" href="https://www.digitalclinicnet.com/">Digital Clinic</a></li>
	          <li><a target="_blank" href="https://www.eda.social/">School of Cryptos</a></li>
	          <li><a target="_blank" href="https://launchpad.edaface.com/white-paper">Litepaper</a></li>
	          <li><a target="_blank" href="https://www.edaface.com/tokenomics">Whitepaper</a></li>
	          <li><a target="_blank" href="https://edaface.com/welfare-donations">Welfare Donations</a></li>
	</ul>

            <!-- End Nav Link -->
          </div>

          <div class="col-6 col-md-3 col-lg">
          <h2><font color="#0DCAF0">Products</font></h2>
          <hr color="#0DCAF0">

            <!-- Nav Link -->
            <ul class="user-links nav nav-sm nav-x-0 flex-column">
		<li><a target="_blank" href="https://launchpad.edaface.com/login">Eda Token</a></li>
		<li><a target="_blank" href="https://www.digitalclinicnet.com/">Digital Clinic</a></li>
		<li><a target="_blank" href="https://www.eda.social/">School of Cryptos</a></li>
		<li><a target="_blank" href="https://launchpad.edaface.com/white-paper">Litepaper</a></li>
		<li><a target="_blank" href="https://www.edaface.com/tokenomics">Whitepaper</a></li>
		<li><a target="_blank" href="https://edaface.com/welfare-donations">Welfare Donations</a></li>
	</ul>

            <!-- End Nav Link -->
          </div>

          <div class="col-6 col-md-3 col-lg mb-5 mb-lg-0">
          <h2><font color="#0DCAF0">Legal</font></h2>
          <hr color="#0DCAF0">

            <!-- Nav Link -->
            <ul class="user-links nav nav-sm nav-x-0 flex-column">
            <li><a target="_blank" href="https://edaface.com/terms">Terms of Use</a></li>
	          <li><a target="_blank" href="https://edaface.com/privacy">Privacy Policy</a></li>
	          <li><a target="_blank" href="https://edaface.com/disclaimer">Disclaimer</a></li>
	          <li><a target="_blank" href="https://edaface.com/tc">Listing T&amp;C</a></li>
        	  <li><a target="_blank" href="https://edaface.com/tc">Eda Token Policy</a></li>
            </ul>
            <!-- End Nav Link -->
          </div>

          <div class="col-6 col-md-3 col-lg mb-5 mb-lg-0">
          <h2><font color="#0DCAF0">Communities</font></h2>
          <hr color="#0DCAF0">

            <!-- Nav Link -->
            <ul class="user-links nav nav-sm nav-x-0 flex-column">
            <li><a target="_blank" href="https://www.facebook.com/EdaFace.Office1">Facebook</a></li>
            <li><a target="_blank" href="https://t.me/+8O9tfHSRdEZkY2E0">Telegram</a></li>
            <li><a target="_blank" href="https://www.instagram.com/edaface_office/">Instagram</a></li>
            <li><a target="_blank" href="https://twitter.com/EdaFace_office">Twitter</a></li>
            </ul>
            <!-- End Nav Link -->

           <h2><font color="#0DCAF0"><a target="_blank" href="https://edaface.com/contact">Contact Us</a></font><h2>

          </div>     
        </div>
      </div>

    </div>
  </footer>

  <footer class="bg-light-footer-underneath">
  <div class="container">
  <div class="space-top-2 space-bottom-1 space-bottom-lg-2">
  <div class="row justify-content-lg-between">


  <!-- Logo -->
  <div class="col-6 col-md-4 col-lg">
  <a target="_blank" href="https://edaface.com/">
<img src="https://edaface.com/static/media/edafacelogo.80662ebeea5c38cca3b5.png" width="300"></a>
            </div>
            <!-- End Logo -->


  <div class="col-6 col-md-4 col-lg">
  <p class="text-muted">EdaFace is a user interface aggregator that brings all the various functionalities of the crypto industry onto a single platform!</p>
  </div>

  <div class="col-6 col-md-4 col-lg">
            <ul class="list-inline mb-0">
              <?php $facebook = get_frontend_settings('facebook'); ?>
              <?php $twitter = get_frontend_settings('twitter'); ?>
              <?php $linkedin = get_frontend_settings('linkedin'); ?>
              <?php if($facebook): ?>
                <li class="list-inline-item">
                  <a class="btn btn-xs btn-icon btn-soft-secondary" target="_blank" href="<?= $facebook; ?>">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if($twitter): ?>
                <li class="list-inline-item">
                  <a class="btn btn-xs btn-icon btn-soft-secondary" target="_blank" href="<?= $twitter; ?>">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if($linkedin): ?>
                <li class="list-inline-item">
                  <a class="btn btn-xs btn-icon btn-soft-secondary" target="_blank" href="<?= $linkedin; ?>">
                    <i class="fab fa-linkedin"></i>
                  </a>
                </li>
              <?php endif; ?>
              <!-- End Social Networks -->

              <!-- Language -->
              <li class="list-inline-item">
                <div class="hs-unfold">
                  <a class="js-hs-unfold-invoker dropdown-toggle btn btn-xs btn-soft-secondary" href="javascript:;"
                     data-hs-unfold-options='{
                      "target": "#footerLanguage",
                      "type": "css-animation",
                      "animationIn": "slideInDown"
                     }'>
                    <span><?php echo ucwords($this->session->userdata('language')); ?></span>
                  </a>

                  <div id="footerLanguage" class="hs-unfold-content dropdown-menu dropdown-unfold dropdown-menu-bottom mb-2">
                  <?php
                  $languages = $this->crud_model->get_all_languages();
                  foreach ($languages as $language): ?>
                    <?php if (trim($language) != "" && $this->session->userdata('language') != strtolower($language)): ?>
                      <a class="dropdown-item" onclick="switch_language('<?php echo strtolower($language); ?>')" href="javascript:;"><?php echo ucwords($language);?></a>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  </div>
                </div>
              </li>
              <!-- End Language -->
            </ul>
          </div>

  </div>
  </div>
  </div>
  </footer>



  <footer class="bg-light-footer-copyright">
  <div class="container">
  <div class="row justify-content-lg-between">


   <!-- Copyright -->
   <div class="w-md-75 text-lg-center mx-lg-auto">
          <p class="text-muted small">Copyright © 2022. EdaFace is a product of Emerging Digital Age (EDA) Pty Ltd. All Rights Reserved.</p>
          
        </div>
        <!-- End Copyright -->


  </div>
  </div>
  </footer>

  <!-- ========== END FOOTER ========== -->
<script type="text/javascript">
  function switch_language(language) {
      $.ajax({
          url: '<?php echo site_url('home/site_language'); ?>',
          type: 'post',
          data: {language : language},
          success: function(response) {
              setTimeout(function(){ location.reload(); }, 500);
          }
      });
  }
</script>