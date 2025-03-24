<?php
session_start();
include '../koneksi.php';


if (empty($_SESSION['EMAIL'])) {
  header("Location: ../login.php");
}

$about = mysqli_query($koneksi, "SELECT * FROM about");
$rows = mysqli_fetch_all($about, MYSQLI_ASSOC);

if (isset($_GET['idDel'])) {
  $id = $_GET['idDel'];

  $cekFOTO = mysqli_query($koneksi, "SELECT foto FROM about WHERE id = $id");
  $rowcekFoto = mysqli_fetch_assoc($cekFOTO);
  if ($rowcekFoto && file_exists("../assets/uploads/" . $fotoLama['foto'])) {
    unlink("../assets/uploads/" . $rowcekFoto['foto']);
    $delete = mysqli_query($koneksi, "DELETE FROM about WHERE id = $id");
    if ($delete) {
      header("Location: about.php");
    }
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
      <h1>About</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">About</a></li>
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
              <h5 class="card-title">About</h5>
              <div class="table table-responsive">
                <a class="btn btn-primary mb-2" href="add-edit-about.php">CREATE</a>
                <table class="table table-bordered">
                  <tr>
                    <th>No</th>
                    <th>Deskripsi Saya</th>
                    <th>Foto</th>
                    <th>Job Desc</th>
                    <th>Alamat Website</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Universitas</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                  <?php
                  $no = 1;
                  foreach ($rows as $row) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $row['desc_diri'] ?></td>
                      <td><img width="150" src="../assets/uploads/<?= $row['foto'] ?>" alt=""></td>
                      <td><?= $row['job'] ?></td>
                      <td><?= $row['alamat_web'] ?></td>
                      <td><?= $row['phone']?></td>
                      <td><?= $row['city'] ?></td>
                      <td><?= $row['dagree']?></td>
                      <td><?= $row['email'] ?></td>
                      <td><a href="add-edit-about.php?Edit=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                      <a onclick="return confirm ('Yakin ingin menghapus?')" href="about.php?idDel=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                  <?php
                  } ?>
                </table>
              </div>
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