<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Activate</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/assets/star-admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/assets/star-admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/assets/star-admin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>/assets/star-admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo SITE_URL ?>/assets/star-admin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Activate</h2>            
            <div class="auto-form-wrapper">
              <p>Please enter the code sent to your Phone or click the link sent in your email.</p>
              <form method="post">
                <input type="hidden" name="action" value="activate_registration">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your Email Address" name="email">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your Activation Code" name="code">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>            
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Activate</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have an account ?</span>
                  <a href="<?php echo SITE_URL ?>/?page=login" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo SITE_URL ?>/assets/star-admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo SITE_URL ?>/assets/star-admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo SITE_URL ?>/assets/star-admin/js/off-canvas.js"></script>
  <script src="<?php echo SITE_URL ?>/assets/star-admin/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
