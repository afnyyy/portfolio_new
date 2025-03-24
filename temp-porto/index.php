<?php
require_once "../koneksi.php";
session_start();

if (isset($_POST['kirim'])) {
  // Ambil data dari form
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $subject = $_POST['subjek'];
  $pesan = $_POST['pesan'];

  // Query untuk insert ke database
  $intoCon = "INSERT INTO contact (nama, email, subjek, pesan) VALUES ('$nama', '$email', '$subject', '$pesan')";

  // Eksekusi query
  if (mysqli_query($koneksi, $intoCon)) {
      echo "<script>alert('Pesan berhasil dikirim!');</script>";
  } else {
      echo "Error: " . $intoCon . "<br>" . mysqli_error($koneksi);
  }
}


$home = mysqli_query($koneksi,"SELECT * FROM home WHERE id=2");
$rowHome = mysqli_fetch_assoc($home);

$about = mysqli_query($koneksi, "SELECT * FROM about WHERE id=1");
$rows = mysqli_fetch_assoc($about);

$query = mysqli_query($koneksi, "SELECT * FROM skill");
$rowSkill = mysqli_fetch_all($query, MYSQLI_ASSOC);

$selectService = mysqli_query($koneksi, "SELECT * FROM services");
$rowServices = mysqli_fetch_all($selectService, MYSQLI_ASSOC);

$resume = mysqli_query($koneksi, "SELECT * FROM resume WHERE id=1");
$rowsResume = mysqli_fetch_assoc($resume);

$porto = mysqli_query($koneksi, "SELECT * FROM isi_porto");
$rowPorto = mysqli_fetch_all($porto, MYSQLI_ASSOC);

$testimoni = mysqli_query($koneksi, "SELECT * FROM testimoni");
$rowsTest = mysqli_fetch_all($testimoni, MYSQLI_ASSOC);




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - iPortfolio Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img  src="<?php echo "../assets/uploads/" . $rows['foto']?>" alt="" class="img-fluid rounded-circle">
    </div>

    <a href="index.html" class="logo d-flex align-items-center justify-content-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename"><?php echo $rowHome['nama']; ?></h1>
    </a>

    <div class="social-links text-center">
      <a href="https://www.instagram.com/afnyyyy/" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="https://www.linkedin.com/authwall?trk=gf&trkInfo=AQG8mNY_sBJhoAAAAZXDrKsgWbUH4VtEOb3E6suYvN4FtsDIAs_a1QrrI6dEoL8_yc1XmoeFhQEgdUEAPNqynKDUkZBWzQlADCI25nFKLKvhBCzx_MAnu782kuvfoyORXmlGl9s=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fafnyyyy" class="linkedin"><i class="bi bi-linkedin"></i></a>
      <a href="27afny@gmail.com" class="google-plus"><i class="bi bi-envelope-at-fill"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
        <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
        <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
        <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
        <li><a href="#skills"><i class="bi bi-bar-chart-line-fill"></i> Skill</a></li>
        <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
      </ul>
    </nav>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/header.jpeg" alt="" data-aos="fade-in" class="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2><?= $rowHome['nama'] ?></h2>
        <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer">Designer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Saya</h2>
        <p><?= $rows['desc_diri'] ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="<?php echo "../assets/uploads/" . $rows['foto']?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 content">
            <h2>UI/UX Designer &amp; Web Developer.</h2>
            <p class="fst-italic py-3">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?= $rows['alamat_web'] ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>No Handphone:</strong> <span><?= $rows['phone'] ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Alamat:</strong> <span><?= $rows['city'] ?></span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Gelar:</strong> <span><?= $rows['dagree'] ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?= $rows['email'] ?></span></li>
                </ul>
              </div>
            </div>
            <p class="py-3">
              <?= $rows['description'] ?>
            </p>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kemampuan</h2>
        <p>Hardskill yang saya kuasai</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row skills-content skills-animation">
        <?php 
						foreach ($rowSkill as $value) {
				?>
          <div class="col-lg-6">

            <div class="progress">
              <span class="skill"><?php echo $value['nama_skill'] ?><i class="val"><?= $value['persentase'] ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:<?= $row['persentase'] ?>%"></div>
              </div>
            </div><!-- End Skills Item -->
          </div>
          <?php } ?>
        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <p><?php echo $rowsResume ['gambaran_diri'] ?></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Sumary</h3>

            <div class="resume-item pb-0">
              <h4><?php echo $rowsResume ['nama'] ?></h4>
              <p><em>Ilmu Komputer di universitas Negeri Jakarta</em></p>
              <ul>
                <li><?php echo $rowsResume ['alamat'] ?></li>
                <li><?php echo $rowsResume ['telp'] ?></li>
                <li><?php echo $rowsResume ['alamat_web'] ?></li>
              </ul>
            </div><!-- Edn Resume Item -->

            <h3 class="resume-title">Pendidikan</h3>
            <div class="resume-item">
              <h4><?php echo $rowsResume ['jurusan'] ?></h4>
              <h5><?php echo $rowsResume ['tahun_masuk_univ'] ?> - <?php echo $rowsResume ['tahun_keluar_univ'] ?></h5>
              <p><em><?php echo $rowsResume ['nama_univ'] ?></em></p>
              <p><?php echo $rowsResume ['keterangan'] ?></p>
            </div><!-- Edn Resume Item -->

            
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <h3 class="resume-title">Pengalaman</h3>
            <div class="resume-item">
              <h4><?php echo $rowsResume ['nama_pengalaman'] ?></h4>
              <h5><?php echo $rowsResume ['tahun_awal_pengalaman'] ?> - <?php echo $rowsResume ['tahun_akhir_pengalaman'] ?></h5>
              <p><em><?php echo $rowsResume ['alamat_pengalaman'] ?></em></p>
              <p><?php echo $rowsResume ['deskripsi_pengalaman'] ?></p>
            </div><!-- Edn Resume Item -->

            <div class="resume-item">
              <h4><?php echo $rowsResume ['nama_pengalaman_2'] ?></h4>
              <h5><?php echo $rowsResume ['tahun_awal_pengalaman_2'] ?> - <?php echo $rowsResume ['tahun_akhir_pengalaman_2'] ?></h5>
              <p><em><?php echo $rowsResume ['alamat_pengalaman_2'] ?></em></p>
              <p><?php echo $rowsResume ['deskripsi_pengalaman_2'] ?></p>
            </div><!-- Edn Resume Item -->

          </div>

        </div>

      </div>

    </section><!-- /Resume Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Product</li>
            <li data-filter=".filter-branding">Branding</li>
            <li data-filter=".filter-books">Books</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          <?php 
						foreach ($rowPorto as $list) {
							?>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="<?php echo "../assets/uploads/" . $list['foto']?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?php echo $list ['nama_porto'] ?></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="<?php echo $list ['link_porto'] ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            
          <?php } ?>

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Services Section -->
    <section id="services" class="services section">
      
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>consectetur adipiscing elit. Lorem ipsum dolor sit amet, </p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
        <?php 
						foreach ($rowServices as $item) {
				?>
          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="bi bi-laptop"></i></div>
            <div>
              <h4 class="title"><a href="service-details.html" class="stretched-link"><?php echo $item['judul_service'] ?></a></h4>
              <p class="description"><?php echo $item['deskripsi']?></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="bi bi-pencil-fill"></i></div>
            <div>
              <h4 class="title"><a href="service-details.html" class="stretched-link"><?php echo $item['judul_service'] ?></a></h4>
              <p class="description"><?php echo $item['deskripsi']?></p>
            </div>
          </div>
          <!-- End Service Item -->
          <?php } ?>

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
          <?php 
						foreach ($rowsTest as $testi) {
							?>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span><?php echo $testi ['massage'] ?></span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="../assets/uploads/<?= $testi['foto'] ?>" class="testimonial-img" alt="">
                <h3><?php echo $testi ['nama'] ?></h3>
                <h4><?php echo $testi ['jobdesc'] ?></h4>
              </div>
            </div><!-- End testimonial item -->

            <?php } ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Alamat</h3>
                  <p>Jakarta, Indonesia</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>No Handphone</h3>
                  <p>0812345678</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email</h3>
                  <p>27afny@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="" method="post" class="bg-light p-4 p-md-5 contact-form" data-aos="fade-up" data-aos-delay="200" method="POST">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="nama" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subjek" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="pesan" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit" name="kirim" class="btn btn-primary">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Afny</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">Afny</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>