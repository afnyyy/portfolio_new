<?php
require_once "../koneksi.php";
session_start();


if (empty($_SESSION['EMAIL'])) {
  header("Location: ../login.php");
}

//jika button simpan di klik
if (isset($_POST['simpan'])) {
  $desc = $_POST['desc_diri'];
  $job = $_POST['job'];
  $alamat_web = $_POST['alamat_web'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $dagree = $_POST['dagree'];
  $email = $_POST['email'];
  $foto = $_FILES['foto'];


  if ($foto['error'] == 0) {
    $fileName = uniqid() . "_" . basename($foto['name']);
    $filePath = "../assets/uploads/" . $fileName;
    move_uploaded_file($foto['tmp_name'], $filePath);
    
    $insert = mysqli_query($koneksi, "INSERT INTO about(desc_diri, foto, job, alamat_web, phone, city, dagree, email) VALUES ('$desc', '$fileName', '$job', '$alamat_web', '$phone', '$city', '$dagree', '$email')");
    if ($insert) {
      header("Location: about.php");
    }

  }
}

if (isset($_GET['Edit'])) {
  $id = $_GET['Edit'];

  $qEdit = mysqli_query($koneksi, "SELECT * FROM about WHERE id = $id");
  $rowUpdate = mysqli_fetch_assoc($qEdit); 
}

if (isset($_POST['edit'])) {
  $id = $_GET['Edit'];
  $desc = $_POST['desc_diri'];
  $job = $_POST['job'];
  $alamat_web = $_POST['alamat_web'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $dagree = $_POST['dagree'];
  $email = $_POST['email'];
  $foto = $_FILES['foto'];

  $fillQupdate = '';
  if ($foto['error'] == 0) {
    $fileName = uniqid() . "_" . basename($foto['name']);
    $filePath = "../assets/uploads/" . $fileName;
    if (move_uploaded_file($foto['tmp_name'], $filePath)){
      $cekFoto = mysqli_query($koneksi, "SELECT foto FROM about WHERE id =$id");
      $fotoLama = mysqli_fetch_assoc($cekFoto);
      if ($fotoLama && file_exists("../assets/uploads/" . $fotoLama['foto'])) {
        unlink("../assets/uploads/" . $fotoLama['foto']);
      }
      $fillQupdate = "foto='$fileName',";
    }else {
      echo "EDIT GAGAL";
    }
  }

  $qUpdate = mysqli_query($koneksi, "UPDATE about SET $fillQupdate desc_diri='$desc', job='$job', alamat_web='$alamat_web', phone='$phone', city='$city', dagree='$dagree', email='$email'  WHERE id = $id");
  if ($qUpdate){
    header("Location: about.php");
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
                    <label for="">Deskripsi Saya</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="desc_diri" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['desc_diri'] : '' ?>">
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
                    <input type="text" class="form-control" name="job" placeholder="Masukkan Nama Job Desc" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['job'] : '' ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Alamat Website</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat_web" placeholder="Masukkan Alamat Web" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['alamat_web'] : '' ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">No Hp</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="phone" placeholder="Masukkan No Handphone" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['phone'] : '' ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Alamat</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="city" placeholder="Masukkan Alamat Anda" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['city'] : '' ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Universitas</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="dagree" placeholder="Masukkan Nama Universitas" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['dagree'] : '' ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="">Email</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required value="<?php echo isset($_GET['Edit']) ? $rowUpdate['email'] : '' ?>">
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