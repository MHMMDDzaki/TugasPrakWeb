<?php
session_start();
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Toko Buku</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <script src="https://kit.fontawesome.com/f2f766b1b0.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <!--<link rel="shortcut icon" href="assets/images/favicon.png" /> -->
  <style>

  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="container-fluid px-0 d-flex justify-content-start">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php" style="color: white;">Menu Utama</a>
        </div>
        <div class="navbar-brand me-0" style="width: 70px">
          <button class="navbar-toggler navbar-toggler align-self-center mx-2" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <a href="" class="navbar-brand" style="color: black;">
          TOKO BUKU
          <img src="https://th.bing.com/th/id/OIP.5AIBiqVoTNtQIOGzVOeEJwHaFO?w=256&h=180&c=7&r=0&o=5&dpr=2&pid=1.7" alt="" width="30" height="24" class="d-inline-block align-text-top">
        </a>
        <form action="pencarian.php" method="get" class="d-flex" style="margin-left: 100px;">
          <input class="form-control me-2" type="search" placeholder="Cari Buku" aria-label="Search" name="cari">
          <button class="btn btn-outline-dark" type="submit">CARI</button>
        </form>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas " id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>

          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span class="icon-bg"><i class="fas fa-home"></i></span>
              <span class="menu-title">Home</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=keranjang">
              <span class="icon-bg"><i class="fas fa-shopping-cart"></i></span>
              <span class="menu-title">Keranjang</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=riwayat">
              <span class="icon-bg"><i class="fas fa-history"></i></span>
              <span class="menu-title">Riwayat Pembelian</span>
            </a>
          </li>

          <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
              <a href="logout.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Log Out</span></a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?php

          if (isset($_GET['halaman'])) {
            if ($_GET['halaman'] == 'keranjang') {
              include 'keranjang.php';
            } elseif ($_GET['halaman'] == 'riwayat') {
              header("location: riwayat.php");
            }
          } else {
            include 'home.php';
          }

          ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="footer-inner-wraper">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>