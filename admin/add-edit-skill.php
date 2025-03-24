<?php
require_once "../koneksi.php";
session_start();


if (empty($_SESSION['EMAIL'])) {
  header("Location: ../login.php");
}

if (isset($_POST['simpan'])) {
  $nama_skill = $_POST['nama_skill'];
  $persentase = $_POST['persentase'];
  

  $insert = mysqli_query($koneksi, "INSERT INTO skill (nama_skill, persentase) VALUES ('$nama_skill', '$persentase')");

  if ($insert) {
    header("Location: skill.php");
  } else {
    header("Location: add-edit-skill.php");
  }
}

if (isset($_GET['Edit'])) {
  $id = $_GET['Edit'];

  $qEdit = mysqli_query($koneksi, "SELECT * FROM skill WHERE id = $id");
  $rowUpdate = mysqli_fetch_assoc($qEdit); 
}

if (isset($_POST['edit'])) {
  $id = $_GET['Edit'];
  $nama_skill = $_POST['nama_skill'];
  $persentase = $_POST['persentase'];

  $qUpdate = mysqli_query($koneksi, "UPDATE skill SET nama_skill='$nama_skill', persentase='$persentase' WHERE id = $id");
  if ($qUpdate){
    header("Location: skill.php");
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
      <h1>Blank Page</h1>
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
              <h5 class="card-title">Add Skill</h5>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Nama Skill</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_skill" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['nama_skill'] : '' ?>" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Persentase (%)</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="persentase" value="<?php echo isset($_GET['Edit']) ? $rowUpdate['persentase'] : '' ?>" required>
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