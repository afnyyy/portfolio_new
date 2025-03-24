<?php
require_once "../koneksi.php";
session_start();


if (empty($_SESSION['EMAIL'])) {
  header("Location: ../login.php");
}

$testimoni = mysqli_query($koneksi, "SELECT * FROM testimoni");
$rowsTest = mysqli_fetch_all($testimoni, MYSQLI_ASSOC);

if (isset($_GET['idDel'])) {

  $id = $_GET['idDel'];

  
  $del = mysqli_query($koneksi, "DELETE FROM skill WHERE id = $id");
    if ($del) {
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
              <h5 class="card-title">Skill</h5>
              <div class="table table-responsive">
                <a class="btn btn-primary mb-2" href="add-edit-testimoni.php">CREATE</a>
                <table class="table table-bordered">
                  <tr>
                    <th>No</th>
                    <th>Nama </th>
                    <th>Foto</th>
                    <th>Massage</th>
                    <th>Jobdesc</th>
                    <th>Actions</th>
                  </tr>
                  <?php
                  $no = 1;
                  foreach ($rowsTest as $row) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['foto'] ?></td>
                      <td><?= $row['massage']?></td>
                      <td><?= $row['jobdesc']?></td>
                      <td>
                      <a href="add-edit-testimoni.php?Edit=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                      <a onclick="return confirm ('Yakin ingin menghapus?')" href="testimonial.php?idDel=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                       
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