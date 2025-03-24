<?php
require_once "../koneksi.php";
session_start();


if (empty($_SESSION['EMAIL'])) {
  header("Location: ../login.php");
}

if (isset($_POST['simpan'])) {
  $gambaran_diri = $_POST['gambaran_diri'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $alamat_web = $_POST['alamat_web'];
  $nama_univ = $_POST['nama_univ'];
  $jurusan = $_POST['jurusan'];
  $tahun_masuk_univ = $_POST['tahun_masuk_univ'];
  $tahun_keluar_univ = $_POST['tahun_keluar_univ'];
  $keterangan = $_POST['keterangan'];
  $pengalaman = $_POST['nama_pengalaman'];
  $tahun_awal_pengalaman = $_POST['tahun_awal_pengalaman'];
  $tahun_akhir_pengalaman = $_POST['tahun_akhir_pengalaman'];
  $alamat_pengalaman = $_POST['alamat_pengalaman'];
  $deskripsi_pengalaman = $_POST['deskripsi_pengalaman'];
  $pengalaman2 = $_POST['nama_pengalaman_2'];
  $tahun_awal_pengalaman2 = $_POST['tahun_awal_pengalaman_2'];
  $tahun_akhir_pengalaman2 = $_POST['tahun_akhir_pengalaman_2'];
  $alamat_pengalaman2 = $_POST['alamat_pengalaman_2'];
  $deskripsi_pengalaman2 = $_POST['deskripsi_pengalaman_2'];  
  

  $insert = mysqli_query($koneksi, "INSERT INTO resume (gambaran_diri, nama, alamat, telp, alamat_web, nama_univ, jurusan, tahun_masuk_univ, tahun_keluar_univ, keterangan, nama_pengalaman, tahun_awal_pengalaman, tahun_akhir_pengalaman, alamat_pengalaman, deskripsi_pengalaman, nama_pengalaman_2, tahun_awal_pengalaman_2, tahun_akhir_pengalaman_2, alamat_pengalaman_2, deskripsi_pengalaman_2) VALUES ('$gambaran_diri', '$nama', '$alamat', '$telp', '$alamat_web', '$nama_univ', '$jurusan', '$tahun_masuk_univ', '$tahun_keluar_univ', '$keterangan', '$pengalaman', '$tahun_awal_pengalaman', '$tahun_akhir_pengalaman', '$alamat_pengalaman', '$deskripsi_pengalaman', '$pengalaman2', '$tahun_awal_pengalaman2', '$tahun_akhir_pengalaman2', '$alamat_pengalaman2', '$deskripsi_pengalaman')") or die(mysqli_error($koneksi));

  if ($insert) {
    header("Location: resume.php");
  } else {
    header("Location: add-edit-resume.php");
  }
}

if (isset($_GET['Edit'])) {
  $id = $_GET['Edit'];

  $qEdit = mysqli_query($koneksi, "SELECT * FROM resume WHERE id = $id");
  $rowUpdate = mysqli_fetch_assoc($qEdit); 
}

if (isset($_POST['edit'])) {
  $id = $_GET['Edit'];
  $gambaran_diri = $_POST['gambaran_diri'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $alamat_web = $_POST['alamat_web'];
  $nama_univ = $_POST['nama_univ'];
  $jurusan = $_POST['jurusan'];
  $tahun_masuk_univ = $_POST['tahun_masuk_univ'];
  $tahun_keluar_univ = $_POST['tahun_keluar_univ'];
  $keterangan = $_POST['keterangan'];
  $pengalaman = $_POST['nama_pengalaman'];
  $tahun_awal_pengalaman = $_POST['tahun_awal_pengalaman'];
  $tahun_akhir_pengalaman = $_POST['tahun_akhir_pengalaman'];
  $alamat_pengalaman = $_POST['alamat_pengalaman'];
  $deskripsi_pengalaman = $_POST['deskripsi_pengalaman']; 
  $pengalaman2 = $_POST['nama_pengalaman_2'];
  $tahun_awal_pengalaman2 = $_POST['tahun_awal_pengalaman_2'];
  $tahun_akhir_pengalaman2 = $_POST['tahun_akhir_pengalaman_2'];
  $alamat_pengalaman2 = $_POST['alamat_pengalaman_2'];
  $deskripsi_pengalaman2 = $_POST['deskripsi_pengalaman_2']; 

  $qUpdate = mysqli_query ($koneksi, "UPDATE resume SET gambaran_diri = '$gambaran_diri', nama = '$nama', alamat = '$alamat', telp = '$telp', alamat_web = '$alamat_web', nama_univ = '$nama_univ', jurusan = '$jurusan', tahun_masuk_univ = '$tahun_masuk_univ', tahun_keluar_univ = '$tahun_keluar_univ', keterangan = '$keterangan', nama_pengalaman = '$pengalaman', tahun_awal_pengalaman = '$tahun_awal_pengalaman', tahun_akhir_pengalaman = '$tahun_akhir_pengalaman', alamat_pengalaman = '$alamat_pengalaman', deskripsi_pengalaman = '$deskripsi_pengalaman', nama_pengalaman_2 = '$pengalaman2', tahun_awal_pengalaman_2 = '$tahun_awal_pengalaman2', tahun_akhir_pengalaman_2 = '$tahun_akhir_pengalaman2', alamat_pengalaman_2 = '$alamat_pengalaman2', deskripsi_pengalaman_2 = '$deskripsi_pengalaman2'  WHERE id = $id");
  if ($qUpdate){
    header("Location: resume.php");
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    body {
      
      background-color: #d4e6f4;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 304 304' width='304' height='304'%3E%3Cpath fill='%239C92AC' fill-opacity='0.1' d='M44.1 224a5 5 0 1 1 0 2H0v-2h44.1zm160 48a5 5 0 1 1 0 2H82v-2h122.1zm57.8-46a5 5 0 1 1 0-2H304v2h-42.1zm0 16a5 5 0 1 1 0-2H304v2h-42.1zm6.2-114a5 5 0 1 1 0 2h-86.2a5 5 0 1 1 0-2h86.2zm-256-48a5 5 0 1 1 0 2H0v-2h12.1zm185.8 34a5 5 0 1 1 0-2h86.2a5 5 0 1 1 0 2h-86.2zM258 12.1a5 5 0 1 1-2 0V0h2v12.1zm-64 208a5 5 0 1 1-2 0v-54.2a5 5 0 1 1 2 0v54.2zm48-198.2V80h62v2h-64V21.9a5 5 0 1 1 2 0zm16 16V64h46v2h-48V37.9a5 5 0 1 1 2 0zm-128 96V208h16v12.1a5 5 0 1 1-2 0V210h-16v-76.1a5 5 0 1 1 2 0zm-5.9-21.9a5 5 0 1 1 0 2H114v48H85.9a5 5 0 1 1 0-2H112v-48h12.1zm-6.2 130a5 5 0 1 1 0-2H176v-74.1a5 5 0 1 1 2 0V242h-60.1zm-16-64a5 5 0 1 1 0-2H114v48h10.1a5 5 0 1 1 0 2H112v-48h-10.1zM66 284.1a5 5 0 1 1-2 0V274H50v30h-2v-32h18v12.1zM236.1 176a5 5 0 1 1 0 2H226v94h48v32h-2v-30h-48v-98h12.1zm25.8-30a5 5 0 1 1 0-2H274v44.1a5 5 0 1 1-2 0V146h-10.1zm-64 96a5 5 0 1 1 0-2H208v-80h16v-14h-42.1a5 5 0 1 1 0-2H226v18h-16v80h-12.1zm86.2-210a5 5 0 1 1 0 2H272V0h2v32h10.1zM98 101.9V146H53.9a5 5 0 1 1 0-2H96v-42.1a5 5 0 1 1 2 0zM53.9 34a5 5 0 1 1 0-2H80V0h2v34H53.9zm60.1 3.9V66H82v64H69.9a5 5 0 1 1 0-2H80V64h32V37.9a5 5 0 1 1 2 0zM101.9 82a5 5 0 1 1 0-2H128V37.9a5 5 0 1 1 2 0V82h-28.1zm16-64a5 5 0 1 1 0-2H146v44.1a5 5 0 1 1-2 0V18h-26.1zm102.2 270a5 5 0 1 1 0 2H98v14h-2v-16h124.1zM242 149.9V160h16v34h-16v62h48v48h-2v-46h-48v-66h16v-30h-16v-12.1a5 5 0 1 1 2 0zM53.9 18a5 5 0 1 1 0-2H64V2H48V0h18v18H53.9zm112 32a5 5 0 1 1 0-2H192V0h50v2h-48v48h-28.1zm-48-48a5 5 0 0 1-9.8-2h2.07a3 3 0 1 0 5.66 0H178v34h-18V21.9a5 5 0 1 1 2 0V32h14V2h-58.1zm0 96a5 5 0 1 1 0-2H137l32-32h39V21.9a5 5 0 1 1 2 0V66h-40.17l-32 32H117.9zm28.1 90.1a5 5 0 1 1-2 0v-76.51L175.59 80H224V21.9a5 5 0 1 1 2 0V82h-49.59L146 112.41v75.69zm16 32a5 5 0 1 1-2 0v-99.51L184.59 96H300.1a5 5 0 0 1 3.9-3.9v2.07a3 3 0 0 0 0 5.66v2.07a5 5 0 0 1-3.9-3.9H185.41L162 121.41v98.69zm-144-64a5 5 0 1 1-2 0v-3.51l48-48V48h32V0h2v50H66v55.41l-48 48v2.69zM50 53.9v43.51l-48 48V208h26.1a5 5 0 1 1 0 2H0v-65.41l48-48V53.9a5 5 0 1 1 2 0zm-16 16V89.41l-34 34v-2.82l32-32V69.9a5 5 0 1 1 2 0zM12.1 32a5 5 0 1 1 0 2H9.41L0 43.41V40.6L8.59 32h3.51zm265.8 18a5 5 0 1 1 0-2h18.69l7.41-7.41v2.82L297.41 50H277.9zm-16 160a5 5 0 1 1 0-2H288v-71.41l16-16v2.82l-14 14V210h-28.1zm-208 32a5 5 0 1 1 0-2H64v-22.59L40.59 194H21.9a5 5 0 1 1 0-2H41.41L66 216.59V242H53.9zm150.2 14a5 5 0 1 1 0 2H96v-56.6L56.6 162H37.9a5 5 0 1 1 0-2h19.5L98 200.6V256h106.1zm-150.2 2a5 5 0 1 1 0-2H80v-46.59L48.59 178H21.9a5 5 0 1 1 0-2H49.41L82 208.59V258H53.9zM34 39.8v1.61L9.41 66H0v-2h8.59L32 40.59V0h2v39.8zM2 300.1a5 5 0 0 1 3.9 3.9H3.83A3 3 0 0 0 0 302.17V256h18v48h-2v-46H2v42.1zM34 241v63h-2v-62H0v-2h34v1zM17 18H0v-2h16V0h2v18h-1zm273-2h14v2h-16V0h2v16zm-32 273v15h-2v-14h-14v14h-2v-16h18v1zM0 92.1A5.02 5.02 0 0 1 6 97a5 5 0 0 1-6 4.9v-2.07a3 3 0 1 0 0-5.66V92.1zM80 272h2v32h-2v-32zm37.9 32h-2.07a3 3 0 0 0-5.66 0h-2.07a5 5 0 0 1 9.8 0zM5.9 0A5.02 5.02 0 0 1 0 5.9V3.83A3 3 0 0 0 3.83 0H5.9zm294.2 0h2.07A3 3 0 0 0 304 3.83V5.9a5 5 0 0 1-3.9-5.9zm3.9 300.1v2.07a3 3 0 0 0-1.83 1.83h-2.07a5 5 0 0 1 3.9-3.9zM97 100a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-48 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 96a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-144a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-96 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm96 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-32 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM49 36a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-32 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM33 68a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 240a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm80-176a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm112 176a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM17 180a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM17 84a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'%3E%3C/path%3E%3C/svg%3E");
      opacity: 0.9;
       
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php  include "../inc/header.php"; ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php  include "../inc/sidebar.php"; ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Resume</h5>
              <form action="" method="POST" enctype="multipart/form-data">
              <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Deskripsi Resume</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gambaran_diri" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['gambaran_diri'] : '' ?>">
                  </div>               
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Nama</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['nama'] : '' ?>">
                  </div>               
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Alamat</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['alamat'] : '' ?>">
                  </div>               
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">No Telp</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="telp" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['telp'] : '' ?>">
                  </div>               
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Alamat Web</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat_web" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['alamat_web'] : '' ?>">
                  </div>               
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Nama Univ</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_univ" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['nama_univ'] : '' ?>">
                  </div>               
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Jurusan</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jurusan" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['jurusan'] : '' ?>">
                  </div>               
                </div>

                
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Tahun Masuk Univ</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" min="1800" max="2080" step="1" class="form-control" name="tahun_masuk_univ" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['tahun_masuk_univ'] : date('Y')?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Tahun Keluar Univ</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" min="1800" max="2080" step="1" class="form-control" name="tahun_keluar_univ" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['tahun_keluar_univ'] : date('Y')?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Keterangan</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="keterangan" cols="30" rows="4"><?php echo isset($_GET['Edit']) ? $rowUpdate['keterangan'] : '' ?></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pengalaman" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['nama_pengalaman'] : '' ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Tahun Awal Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" min="1800" max="2080" step="1" class="form-control" name="tahun_awal_pengalaman" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['tahun_awal_pengalaman'] : date('Y')?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Tahun Akhir Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" min="1800" max="2080" step="1" class="form-control" name="tahun_akhir_pengalaman" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['tahun_akhir_pengalaman'] : date('Y')?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Alamat Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat_pengalaman" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['alamat_pengalaman'] : '' ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Keterangan Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi_pengalaman" cols="30" rows="4"><?php echo isset($_GET['Edit']) ? $rowUpdate['deskripsi_pengalaman'] : '' ?></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pengalaman_2" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['nama_pengalaman_2'] : '' ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Tahun Awal Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" min="1800" max="2080" step="1" class="form-control" name="tahun_awal_pengalaman_2" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['tahun_awal_pengalaman_2'] : date('Y')?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Tahun Akhir Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" min="1800" max="2080" step="1" class="form-control" name="tahun_akhir_pengalaman_2" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['tahun_akhir_pengalaman_2'] : date('Y')?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Alamat Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat_pengalaman_2" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['alamat_pengalaman_2'] : '' ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Keterangan Pengalaman</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi_pengalaman_2" cols="30" rows="4"><?php echo isset($_GET['Edit']) ? $rowUpdate['deskripsi_pengalaman_2'] : '' ?></textarea>
                  </div>
                </div>
         
                


                <div class="row mb-3">
                  <div class="col-md-2 offset-md-2">
                  <?php 
                    if(isset($_GET['Edit'])){
                    ?>
                    <button name="edit" class="btn btn-primary" type="submit" >Edit</button>
                    <?php 
                    } else {
                    ?>                 
                      <button name="simpan" class="btn btn-primary" type="submit" >Simpan</button>
                      <?php 
                    }?>
                  </div>
                </div>
                
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <?php  include "../inc/footer.php"; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>