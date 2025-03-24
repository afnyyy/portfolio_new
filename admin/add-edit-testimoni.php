<?php
require_once "../koneksi.php";
session_start();


if (empty($_SESSION['EMAIL'])) {
  header("Location: ../login.php");
}

//jika button simpan di klik
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $jobdesc = $_POST['jobdesc'];
  $massage = $_POST['massage'];
  $foto = $_FILES['foto'];


  if ($foto['error'] == 0) {
    $fileName = uniqid() . "_" . basename($foto['name']);
    $filePath = "../assets/uploads/" . $fileName;
    move_uploaded_file($foto['tmp_name'], $filePath);
    
    $insert = mysqli_query($koneksi, "INSERT INTO testimoni(nama, foto, jobdesc, massage) VALUES ('$nama', '$fileName', '$jobdesc', '$massage')");
    if ($insert) {
      header("Location: testimonial.php");
    }

  }
}

if (isset($_GET['Edit'])) {
  $id = $_GET['Edit'];

  $qEdit = mysqli_query($koneksi, "SELECT * FROM testimoni WHERE id = $id");
  $rowUpdate = mysqli_fetch_assoc($qEdit); 
}

if (isset($_POST['edit'])) {
  $nama = $_POST['nama'];
  $jobdesc = $_POST['jobdesc'];
  $massage = $_POST['massage'];
  $foto = $_FILES['foto'];

  $fillQupdate = '';
  if ($foto['error'] == 0) {
    $fileName = uniqid() . "_" . basename($foto['name']);
    $filePath = "../assets/uploads/" . $fileName;
    if (move_uploaded_file($foto['tmp_name'], $filePath)){
      $cekFoto = mysqli_query($koneksi, "SELECT foto FROM testimoni WHERE id =$id");
      $fotoLama = mysqli_fetch_assoc($cekFoto);
      if ($fotoLama && file_exists("../assets/uploads/" . $fotoLama['foto'])) {
        unlink("../assets/uploads/" . $fotoLama['foto']);
      }
      $fillQupdate = "foto='$fileName',";
    }else {
      echo "EDIT GAGAL";
    }
  }

  $qUpdate = mysqli_query($koneksi, "UPDATE testimoni SET $fillQupdate nama='$nama', jobdesc='$jobdesc', massage='$massage' WHERE id = $id");
  if ($qUpdate){
    header("Location: testimonial.php");
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
      <h1>Admin Page</h1>
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
              <h5 class="card-title">Add Edit Home</h5>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Nama</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['nama'] : '' ?>">
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
                    <label for="">Job Desc</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jobdesc" placeholder="Masukkan Nama Job Desc" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['jobdesc'] : '' ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Massage</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="massage" placeholder="Masukkan Massage" required><?php echo isset($_GET['Edit']) ? $rowUpdate['massage'] : '' ?></textarea>
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