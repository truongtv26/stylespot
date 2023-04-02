<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- Layout styles -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../assets/logo.png" />
  <script src="https://kit.fontawesome.com/cd29af7a45.js" crossorigin="anonymous"></script>
  <title>Petio Admin</title>

</head>
<?php
if (!isset($_SESSION)) {
  session_start();
}
extract($_SESSION['username']);
?>

<body>
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100" action="#">
          <div class="input-group">
            <div class="input-group-prepend bg-transparent">
              <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
          </div>
        </form>
      </div>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-img">

              <img src="<?php echo ".".$avatar ?>" alt="image">
              <!-- <img src="https://demoda.vn/wp-content/uploads/2022/02/avatar-anime-cute.jpg" alt=""> -->
              <span class="availability-status online"></span>
            </div>
            <div class="nav-profile-text">
              <p class="mb-1 text-black"><?php echo $username ?></p>
              <!-- <p class="mb-1 text-black">Phan Văn Luân</p> -->
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="index.php?act=logout">
              <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <div class="container-fluid page-body-wrapper body1">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">

      <ul class="nav">
        <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
            <div class="nav-profile-image">
              <img src="<?="." . $avatar ?>" alt="profile">
              <!-- <img src="https://demoda.vn/wp-content/uploads/2022/02/avatar-anime-cute.jpg" alt="profile"> -->
              <span class="login-status online"></span>
              <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
              <span class="font-weight-bold mb-2"><?= $username ?> </span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
          </a>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <span class="menu-title">Home</span>
            <i class="mdi mdi-home menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=list_category">
            <span class="menu-title">Danh mục</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=list_product">
            <span class="menu-title">Hàng hóa</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=list_account">
            <span class="menu-title">Khách hàng</span>
            <i class="mdi mdi-account menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=list_comment">
            <span class="menu-title">Bình luận</span>
            <i class="mdi mdi-comment-text menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=list_bill">
            <span class="menu-title">Đơn hàng</span>
            <i class="mdi mdi-cart menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=list_statistical">
            <span class="menu-title">Thống kê</span>
            <i class="mdi mdi-chart-areaspline menu-icon"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <a class="nav-link text-black font-weight-bold" href="../index.php">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard Admin
            </a>
          </h3>
        </div>