<!-- ========== MAIN ========== -->
<main id="content" role="main">
  <!-- Hero Section -->
  <div class="d-lg-flex" style="background-image: url('<?= base_url('assets/frontend/nifty/svg/illustrations/error-404.svg'); ?>')">
    <div class="container d-lg-flex align-items-lg-center min-vh-lg-100 space-4">
      <div class="w-lg-60 w-xl-50">
        <!-- Title -->
        <div class="mb-4">
          <img class="max-w-23rem mb-3" src="<?= base_url('assets/frontend/nifty/svg/illustrations/error-number-404.svg'); ?>" alt="SVG Illustration">
          <p class="lead"><?= site_phrase('oops'); ?>! <?= site_phrase('looks_like_you_followed_a_bad_link'); ?>.</p>
        </div>
        <!-- End Title -->

        <a class="btn btn-wide btn-primary transition-3d-hover" href="<?= base_url('home'); ?>"><?= site_phrase('back_to_home'); ?></a>
      </div>
    </div>
  </div>
  <!-- End Hero Section -->
</main>
<!-- ========== END MAIN ========== -->