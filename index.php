<?php
//koneksi database
include "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Di Samsi Computer</title>

<!-- bootstrap css -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- datatables css -->
<link rel="stylesheet" href="assets/css/datatables.min.css">
<!--font awesome css-->
<link rel="stylesheet" href="assets/css/all.css">
<!--chosen css-->
<link rel="stylesheet" href="assets/css/bootstrap-chosen.css">

</head>
<body>
    
<!--navbar-->
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=gejala">Gejala</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=kerusakan">Kerusakan</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=pengetahuan">Basis Pengatahuan</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=kasus">Kasus</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="?page=konsultasi">Konsultasi</a>
    </li>
    
  </ul>
</nav> 


  <!--setting menu-->
    <?php
      $page = isset($_GET['page']) ? $_GET['page'] : "";
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      if ($page==""){
          include "welcome.php";
      }else{
    ?>
<!-- container -->
<div class="container mt-5 mb-5">

    <?php
        if ($page=="gejala"){
          if ($action==""){
              include "tampil_gejala.php";
          }elseif ($action=="tambah"){
              include "tambah_gejala.php";
          }elseif ($action=="update"){
              include "update_gejala.php";
          }else{
              include "hapus_gejala.php";
          }
        }elseif ($page=="kerusakan"){
          if ($action==""){
              include "tampil_kerusakan.php";
          }elseif ($action=="tambah"){
              include "tambah_kerusakan.php";
          }elseif ($action=="update"){
              include "update_kerusakan.php";
          }else{
              include "hapus_kerusakan.php";
          }
        }elseif ($page=="pengetahuan"){
          if ($action==""){
              include "tampil_pengetahuan.php";
          }elseif ($action=="tambah"){
              include "tambah_pengetahuan.php";
          }elseif ($action=="detail"){
              include "detail_pengetahuan.php";
          }elseif ($action=="update"){
              include "update_pengetahuan.php";
          }elseif ($action=="hapus_gejala"){
              include "hapus_detail_pengetahuan.php";
          }else{
              include "hapus_pengetahuan.php";
          }
        }elseif ($page=="kasus"){
          if ($action==""){
              include "tampil_kasus.php";
          }elseif ($action=="tambah"){
              include "tambah_kasus.php";
          }elseif ($action=="detail"){
              include "detail_kasus.php";
          }elseif ($action=="update"){
              include "update_kasus.php";
          }elseif ($action=="hapus_gejala"){
              include "hapus_detail_kasus.php";
          }else{
              include "hapus_kasus.php";
          }
        }else{
          if ($action==""){
            include "tampil_konsultasi.php";
          }else{
              include "hasil_konsultasi.php";
          }
        }
      }
      ?>

  </div>


<!--jquery-->
<script src="assets/js/jquery-3.7.0.min.js"></script>
<!--bootstrap js-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- datatables js -->
<script src="assets/js/datatables.min.js"></script>
<script>
      $(document).ready(function() {
            $('#myTable').DataTable();
      } );
  </script>
<!--font awesome js-->
<script src="assets/js/all.js"></script>
<!--font awesome js-->
<script src="assets/js/chosen.jquery.min.js"></script>
<script>
      $(function() {
        $('.chosen').chosen();
      });
</script>

</body>
</html>