<?php
include "includes/config.php";
session_start();
if (!isset($_SESSION['nama_lengkap'])) {
  echo "<script>location.href='login.php'</script>";
}
$config = new Config();
$db = $config->getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Navigation Dasboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/28ed5f249e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
</head>

<body>
  <div class="wrapper">
    <aside id="sidebar" class="js-sidebar">
      <!-- Content For Sidebar -->
      <div class="h-100">
        <div class="sidebar-logo">
          <a href="#">Kelompok 5 AHP </a>
        </div>
        <ul class="sidebar-nav">
          <li class="sidebar-header">Admin Elements</li>
          <li class="sidebar-item">
            <a href="./index.php" class="sidebar-link">
              <i class="fa-solid fa-list pe-2"></i>
              Dashboard
            </a>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
              Pages Detail Perhitungan AHP
            </a>
            <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
              <li class="sidebar-item">
                <a href="nilai.php" class="sidebar-link">Nilai</a>
              </li>
              <li class="sidebar-item">
                <a href="kriteria.php" class="sidebar-link">Kriteria</a>
              </li>
              <li class="sidebar-item">
                <a href="alternatif.php" class="sidebar-link">Alternatif</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
              Perhitungan AHP
            </a>
            <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
              <li class="sidebar-item">
                <a href="analisa-kriteria.php" class="sidebar-link">Analisa Kriteria</a>
              </li>
              <li class="sidebar-item">
                <a href="analisa-alternatif.php" class="sidebar-link">Analisa Alternatif</a>
              </li>
              <li class="sidebar-item">
                <a href="rangking.php" class="sidebar-link">Rangking</a>
              </li>
            </ul>
        </ul>
      </div>
    </aside>
    <div class="main">
      <nav class="navbar navbar-expand px-3 border-bottom">
        <button class="btn" id="sidebar-toggle" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="" />
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Setting</a>
                <a href="#" class="dropdown-item">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>







      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="js/index.js"></script>