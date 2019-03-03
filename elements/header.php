<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Car Rental</title>
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
  <script type="text/javascript" src="<?php echo SITE_URL ?>/assets/js/jquery-3.3.1.min.js"></script>  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo SITE_URL ?>">
          <span style="color: #000;">Car Rental System</span>
        </a>        
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo SITE_URL ?>/assets/star-admin/images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION[ 'first_name' ] . " " . $_SESSION[ 'last_name' ] ?></p>                
                </div>
              </div>             
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php  echo SITE_URL; ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php  echo SITE_URL; ?>/?page=accounts">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Accounts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php  echo SITE_URL; ?>/?page=cars">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Cars</span>
            </a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="<?php  echo SITE_URL; ?>/?page=reserve_cars">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Reserve Cars</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php  echo SITE_URL; ?>/?page=transactions">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Transactions</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php  echo SITE_URL; ?>/?action=logout">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/ui-features/buttons.html">Buttons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/ui-features/typography.html">Typography</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/forms/basic_elements.html">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Form elements</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/charts/chartjs.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/tables/basic-table.html">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/icons/font-awesome.html">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/samples/blank-page.html"> Blank Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo SITE_URL ?>/assets/star-admin/pages/samples/error-500.html"> 500 </a>
                </li>
              </ul>
            </div>
          </li> -->
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        	<?php element ( 'message' ); ?>
