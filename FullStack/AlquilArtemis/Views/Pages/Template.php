<?php 
$RoutesArray = explode("/",$_SERVER['REQUEST_URI']);
$RoutesArray = array_filter($RoutesArray);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./Views/Assets/Plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./Views/Assets/Plugins/AdminLTE/css/adminlte.min.css">
</head>
<body class="sidebar-mini layout-fixed sidebar-closed sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
<?php include "./Views/Modules/NavBar.php"?>
<!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include "./Views/Modules/SideBar.php" ?>
    <!-- /.sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php

    if(!empty($RoutesArray[4])){


      if($RoutesArray[4] == "Inventarios" || 
      $RoutesArray[4] == "Productos"
      
      ){

        include "./Views/Pages/".$RoutesArray[4]."/".$RoutesArray[4].".php";
      }
    }
    else{
      include "./Views/Pages/Home/Home.php";
    }
    ?>
    
  </div>
  <!-- /.content-wrapper -->
  <!-- Footer -->
  <?php include("./Views/Modules/Footer.php")?>
  <!-- /.Footer -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="./Views/Assets/Plugins//jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./Views/Assets/Plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="./Views/Assets/Plugins/AdminLTE/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./Views/Assets/Plugins/AdminLTE/js/demo.js"></script>
</body>
</html>
