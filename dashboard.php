<?php

session_start();
include "connect.php";
if(!isset($_SESSION['user'])) {
    header("location: auth/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <link rel="icon" href="assets/images/logo-icon.png">
  <title>Dashboard</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</head>
<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="dashboard.php">
       <img src="assets/images/logo-icon.png">
       <!-- <h5 class="logo-text">Perpustakaan Digital</h5> -->
     </a>
   </div>
   <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    ?>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li class="<?php echo $page === 'home' ? 'active' : ''; ?>">
        <a href="dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
        <?php
            if(isset($_SESSION['user']['Role'])) {
                if($_SESSION['user']['Role'] == 'admin' OR $_SESSION['user']['Role'] == 'petugas') {
        ?>
            <li  class="<?php echo $page === 'data/laporan-peminjaman' ? 'active' : ''; ?>">
                <a href="dashboard.php?page=data/laporan-peminjaman">
                <i class="zmdi zmdi-book-image"></i> <span>Laporan Peminjaman</span>
                </a>
            </li>

            <li class="<?php echo $page === 'data/user-table' ? 'active' : ''; ?>">
                <a href="dashboard.php?page=data/user-table">
                <i class="zmdi zmdi-account-box"></i> <span>Data User</span>
                </a>
            </li>

            <li  class="<?php echo $page === 'data/buku/buku-table' ? 'active' : ''; ?>">
                <a href="dashboard.php?page=data/buku/buku-table">
                <i class="zmdi zmdi-folder"></i> <span>Data Buku</span>
                </a>
            </li>

            <li  class="<?php echo $page === 'data/kategori/kategori-table' ? 'active' : ''; ?>">
                <a href="dashboard.php?page=data/kategori/kategori-table">
                <i class="zmdi zmdi-tv-list"></i> <span>Data Kategori</span>
                <small class="badge float-right badge-light">New</small>
                </a>
            </li>

            <li class="<?php echo $page === 'data/ulasan/ulasanbuku-table' ? 'active' : ''; ?>">
                <a href="dashboard.php?page=data/ulasan/ulasanbuku-table">
                <i class="zmdi zmdi-tag-more"></i> <span> Data Ulasan</span>
                </a>
            </li>

            <li class="<?php echo $page === 'data/koleksi/koleksi-table' ? 'active' : ''; ?>">
                <a href="dashboard.php?page=data/koleksi/koleksi-table">
                <i class="zmdi zmdi-bookmark"></i> <span>Data Koleksi</span>
                </a>
            </li>
            <?php
                }
            ?>
            <?php 
        } 
      ?>
      
          
    <?php if(isset($_SESSION['user']['Role'])) {
        if($_SESSION['user']['Role'] === 'user') {
    ?>    
        <li class="<?php echo $page === 'data/user-peminjaman/peminjaman-table' ? 'active' : ''; ?>">
              <a href="dashboard.php?page=data/user-peminjaman/peminjaman-table">
              <i class="zmdi zmdi-book-image"></i> <span>Peminjaman</span>
              </a>
        </li>

        <li class="<?php echo $page === 'data/ulasan/ulasanbuku-table' ? 'active' : ''; ?>">
                <a href="dashboard.php?page=data/ulasan/ulasanbuku-table">
                <i class="zmdi zmdi-tag-more"></i> <span>Ulasan</span>
                </a>
        </li>

        <li class="<?php echo $page === 'data/koleksi/koleksi-table' ? 'active' : ''; ?>">
                <a href="dashboard.php?page=data/koleksi/koleksi-table">
                <i class="zmdi zmdi-bookmark"></i> <span>Koleksi Pribadi</span>
                </a>
            </li>
    <?php
        }
    ?>
    <?php 
        } 
    ?>
      
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    <li class="nav-item language">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $_SESSION['user']['Username']; ?></h6>
            <p class="user-subtitle"><?php echo $_SESSION['user']['Email']; ?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i><a href="auth/logout.php">Log Out</a></li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
        <?php
            include $page . '.php';
        ?>

           
       <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2024
        </div>
      </div>
    </footer>
	<!--End footer-->
	
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="assets/js/jquery.loading-indicator.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
 
  <!-- Index js -->
  <script src="assets/js/index.js"></script>

  
</body>
</html>