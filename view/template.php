<?php
// If no session variable exists, redirect the user:
if (!isset($_SESSION['uid'])) {
	 header("Location:index.php?action=user-login");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Karma</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Date Time Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Fullscreen widget-->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <!-- User profile -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="image d-flex justify-content-center">
            <img src="dist/img/icons8-user-96.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <span class="dropdown-header">
            <?=$_SESSION['name']?>
            <br/>
            <?=$_SESSION['email']?>
          </span>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <a href="view/logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> 
            Log Out
          </a>
        </div>
      </li>
      

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logo_white.png" alt="Karma Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KARMA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/icons8-male-user-64.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['name']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
         <!-- Nav Item 3 -->
         <li class="nav-item ">
            <a href="index.php?action=event-view" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Events
              </p>
            </a>
          </li>

          <!-- Nav Item 2 -->
          <li class="nav-item ">
            <a href="index.php?action=category-view" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <!-- Nav Item 4 -->
          <li class="nav-item ">
            <a href="index.php?action=org-view" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Organizations
              </p>
            </a>
          </li>

           <!-- Nav Item 5 -->
           <li class="nav-item ">
            <a href="index.php?action=user-view" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>