<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url('assets/admin/production/images/logo2.png'); ?>" type="image/ico" />

  <title>Toko Sembako Surya</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('assets/admin/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('assets/admin/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url('assets/admin/vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url('assets/admin/vendors/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('assets/admin/build/css/custom.min.css'); ?>" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Add this in the <head> section of your HTML -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-shopping-cart"></i> <span>E - SURYA</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo base_url('assets/admin/production/images/userr.png'); ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Selamat Datang!</span>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <!-- <li><a href="<?php echo site_url('adminpanel/dashboard'); ?>"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron"></span></a>
                </li> -->
                <li>
                  <a href="<?php echo site_url('barang'); ?>">
                    <i class="fa fa-cube"></i> Barang
                    <?php if (!empty($low_stock_count) && $low_stock_count > 0): ?>
                      <span class="badge bg-red" style="margin-left:5px;">
                        <?php echo $low_stock_count; ?>
                      </span>
                    <?php endif; ?>
                  </a>
                </li>
                <li><a href="<?php echo site_url('transaksi'); ?>"><i class="fa fa-tags"></i> Transaksi <span class="fa fa-chevron"></span></a>
                </li>
                <?php if ($this->session->userdata('role') === 'Admin'): ?>
                  <li><a href="<?php echo site_url('pelanggan'); ?>"><i class="fa fa-users"></i> User</a></li>
                <?php endif; ?>
                <!-- <li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-user-shield"></i> Admin <span class="fa fa-chevron"></span></a>
                </li> -->
              </ul>
            </div>
            <!-- <div class="menu_section">
              <h3>Live On</h3>
              <ul class="nav side-menu">
                <li><a href="https://app.sandbox.midtrans.com/payment-links/1721792803405" target="_blank">
                  <i class="fa fa-hand-holding-heart"></i> Sumbangsih <span class="fa fa-chevron"></span></a>
                </li>
              </ul>
            </div> -->
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo site_url('adminpanel/logout'); ?>">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>