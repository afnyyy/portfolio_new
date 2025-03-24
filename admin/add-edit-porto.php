<?php
require_once "../koneksi.php";
session_start();


if (empty($_SESSION['EMAIL'])) {
  header("Location: ../login.php");
}

//jika button simpan di klik
if (isset($_POST['simpan'])) {
  $nama_porto = $_POST['nama_porto'];
  $url_porto = $_POST['link_porto'];
  $foto = $_FILES['foto'];


  if ($foto['error'] == 0) {
    $fileName = uniqid() . "_" . basename($foto['name']);
    $filePath = "../assets/uploads/" . $fileName;
    move_uploaded_file($foto['tmp_name'], $filePath);
    
    $insert = mysqli_query($koneksi, "INSERT INTO isi_porto (nama_porto, foto, link_porto) VALUES ('$nama_porto', '$fileName', '$url_porto')");
    if ($insert) {
      header("Location: portofolio.php");
    }

  }
}

if (isset($_GET['Edit'])) {
  $id = $_GET['Edit'];

  $qEdit = mysqli_query($koneksi, "SELECT * FROM isi_porto WHERE id = '$id'");
  $rowUpdate = mysqli_fetch_assoc($qEdit); 
}

if (isset($_POST['edit'])) {
  $id = $_GET['Edit'];
  $nama_porto = $_POST['nama_porto'];
  $url_porto = $_POST['link_porto'];
  $foto = $_FILES['foto'];


  $fillQupdate = '';
  if ($foto['error'] == 0) {
    $fileName = uniqid() . "_" . basename($foto['name']);
    $filePath = "../assets/uploads/" . $fileName;
    if (move_uploaded_file($foto['tmp_name'], $filePath)){
      $cekFoto = mysqli_query($koneksi, "SELECT foto FROM isi_porto WHERE id ='$id'");
      $fotoLama = mysqli_fetch_assoc($cekFoto);
      if ($fotoLama && file_exists("../assets/uploads/" . $fotoLama['foto'])) {
        unlink("../assets/uploads/" . $fotoLama['foto']);
      }
      $fillQupdate = "foto='$fileName',";
    }else {
      echo "EDIT GAGAL";
    }
  }

  $qUpdate = mysqli_query($koneksi, "UPDATE isi_porto SET $fillQupdate nama_porto = '$nama_porto', link_porto = '$url_porto' WHERE id = '$id'");
  if ($qUpdate){
    header("Location: portofolio.php");
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<?php include '../inc/head.php'; ?>

<body>

  <!-- ======= Header ======= -->
  <?php  include "../inc/header.php"; ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php  include "../inc/sidebar.php"; ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Portofolio</h1>
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
              <h5 class="card-title">Add Edit Porto</h5>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Nama Portofolio</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_porto" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['nama_porto'] : '' ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Foto</label>
                  </div>
                  <div class="col-sm-10">
                  <input type="file" class="form-control" name="foto">
                  </div>
                  <?php if (isset($_GET['Edit'])) {
                  ?>
                    <div class="mt-2">
                      <img width="190" src="../assets/uploads/<?= $rowUpdate['foto'] ?>" alt="">
                    </div>
                  <?php
                  }?>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">URL Porto</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="link_porto" placeholder="Masukkan link portofolio" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['link_porto'] : '' ?>">
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

  <!-- ======= Footer ======= -->
  <?= include '../inc/footer.php'; ?>

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