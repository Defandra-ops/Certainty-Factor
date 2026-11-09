<?php
  $judul = "Sistem Pakar Metode Certainty Factor";
  $judul_mini = "Certainty Factor";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$judul?></title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo asset_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo asset_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo asset_url();?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo asset_url();?>css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-success default static-top">

      <a class="navbar-brand mr-1" href="index.php">
				<!-- <img src="<?php echo asset_url();?>/images/logo.png" width="200px" alt=""> -->
				<?=$judul_mini?>
			</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav bg-succeess">
        <li class="nav-item  <?=($content=="view_index") ? "active" : ""?>">
          <a class="nav-link" href="<?php echo site_url('home'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
          </a>
        </li>
        <!-- <li class="nav-item <?=($content=="view_saw") ? "active" : ""?>">
          <a class="nav-link" href="<?php echo site_url('saw'); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Analisa SAW</span></a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('home/login'); ?>">
            <i class="fas fa-fw fa-sign-in-alt"></i>
            <span>Login</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('home/Tutorial'); ?>">
            <i class="fas fa-fw fa-sign-in-alt"></i>
            <span>Tutorial</span></a>
        </li>
        
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('home'); ?>">Home</a>
            </li>
            <li class="breadcrumb-item active"><?=$title?></li>
          </ol>

          <?php include($content.".php"); ?>
          
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span><?=$judul?></span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo asset_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo asset_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo asset_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo asset_url();?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo asset_url();?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo asset_url();?>vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo asset_url();?>js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo asset_url();?>js/demo/datatables-demo.js"></script>
    <script src="<?php echo asset_url();?>js/demo/chart-area-demo.js"></script>

  </body>

</html>
