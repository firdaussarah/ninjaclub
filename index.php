<?php

require 'koneksi.php'; // file koneksi ke database

// Proses jika form disubmit
if (isset($_POST["contact_form"])) {
  $name    = $_POST['name'];
  $email   = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Assuming $conn is your mysqli connection
  $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $subject, $message);

  if ($stmt->execute()) {
    $success = "Your message has been sent. Thank you!";
    // Redirect to avoid form resubmission
    header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
    exit;
  } else {
    $error = "Failed to send message.";
  }

  $stmt->close();
}


$partners = mysqli_query($conn, "SELECT * FROM partners");
$events = mysqli_query($conn, "SELECT * FROM events");
$galeri = mysqli_query($conn, "SELECT * FROM gallery");
$team = mysqli_query($conn, "SELECT * FROM team");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Ninja Club Bogor</title>
  <meta name="description" content="Ninja Club Bogor - Community of Kawasaki Ninja enthusiasts in Bogor">
  <meta name="keywords" content="Ninja Club, Bogor, Kawasaki Ninja, Motorcycle Club">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <h1><img src="assets/img/favicon.png" height="80">NINJA CLUB BOGOR</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="article.php">Articles</a></li>
          <li><a href="#services">Events</a></li>
          <li><a href="#portfolio">Gallery</a></li>
          <li><a href="#team">Members</a></li>
          </li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="login.php">Login</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/27.jpg" alt="Ninja Club Bogor" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">Ninja Club Bogor</h2>
        <p data-aos="fade-up" data-aos-delay="200">We are not just a club, but a family.
          Moving Together, Carving Stories.</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#about" class="btn-get-started">About Us</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6 text-dark" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-black text-center">About Us - Ninja Club Bogor</h3>
            <p>Ninja Club Bogor (NCB) is a passionate community of Kawasaki Ninja motorcycle enthusiasts based in Bogor, Indonesia. Established to unite riders who share a love for speed, style, and the thrill of the ride.</p>
            <p>Since our founding, NCB has grown into a vibrant community through activities such as group rides, track days, social gatherings, charity events, and rider safety eninjaon. We foster camaraderie and a shared passion for the Kawasaki Ninja lifestyle.</p>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p>
                More than just a motorcycle club — we are a family of passionate Ninja riders in Bogor and beyond.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Founded to bring together Kawasaki Ninja enthusiasts in Bogor.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Organizes regular rides, events, and community outreach programs.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Promotes safe riding and responsible motorcycling.</span></li>
              </ul>


              <!-- <div class="position-relative mt-4">
                <img src="assets/img/2.jpg" class="img-fluid rounded-4" alt="Ninja Club Bogor">
              </div> -->
            </div>
          </div>
        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-black">Events</h2>
        <p class="text-black text-center">Our Events<br></p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">

          <?php $delay = 200; ?>
          <?php while ($e = mysqli_fetch_assoc($events)): ?>
            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>">
              <div class="service-item">
                <div class="img">
                  <img src="<?php echo $e['image']; ?>" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h3 class="text-center"><?php echo $e['title']; ?></h3>
                  <p style="text-align: justify;"><?php echo $e['description']; ?></p>
                </div>
              </div>
            </div>
            <?php $delay += 100; ?>
          <?php endwhile; ?>

        </div>
      </div>
    </section><!-- /Services Section -->


    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <div class="container section-title" data-aos="fade-up">
          <h2 class="text-black">Join Us</h2>
          <p class="text-black text-center">Be Our Family<br></p>
        </div><!-- End Section Title -->

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Join Ninja Club Bogor!</h3>
                <p class="fst-italic">
                  As a member of Ninja Club Bogor, you will be part of the largest Kawasaki Ninja enthusiast community in West Java. Enjoy various benefits and exciting experiences designed specifically for members.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i>
                    <span>Special discounts at official Kawasaki workshops and motorcycle accessory shops in the Bogor area.</span>
                  </li>
                  <li><i class="bi bi-check2-all"></i> <span>Priority registration for member-exclusive touring events.</span></li>
                </ul>
                <p>
                  Don't miss the opportunity to experience a more exciting driving experience with the Ninja Club Bogor community.
                </p>

              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/12.jpg" alt="Ninja Club Bogor" class="img-fluid rounded-4 shadow-sm"> <!-- Replace with the new Ninja-themed image -->
              </div>
            </div>
          </div><!-- End Tab Content Item -->

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-black">Gallery</h2>
        <p class="text-black text-center">CHECK OUR GALLERY</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <?php while ($g = mysqli_fetch_assoc($galeri)): ?>
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?php echo $g['category']; ?>">
                <div class="portfolio-content h-100">
                  <img src="<?php echo $g['image']; ?>" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4><?php echo $g['title']; ?></h4>
                    <p><?php echo $g['description']; ?></p>
                    <a href="<?php echo $g['image']; ?>"
                      title="<?php echo $g['title']; ?>"
                      data-gallery="portfolio-gallery-<?php echo $g['category']; ?>"
                      class="glightbox preview-link">
                      <i class="bi bi-zoom-in"></i>
                    </a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>

          </div>
        </div>
      </div>
    </section><!-- /Portfolio Section -->

    <!-- Team Section -->
    <section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-black">Members</h2>
        <p class="text-black text-center">CHECK OUR MEMBERS</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <?php $delay = 100; ?>
          <?php while ($t = mysqli_fetch_assoc($team)): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
              <div class="member">

                <div class="pic"><img src="<?= $t['image'] ?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4 class="text-black"><?= $t['name'] ?></h4>
                  <span><?= $t['position'] ?></span>
                </div>
              </div>
            </div>
            <?php $delay += 100; ?>
          <?php endwhile; ?>

        </div>

      </div>
    </section><!-- /Team Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section pt-5 pb-5 bg-light">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-black text-right">Contact</h2>
        <p class="text-black text-center">SEND US MESSAGES AND SUGGESTIONS</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">

          <!-- Form di kiri -->
          <div class="col-lg-6">
            <form action="" method="POST" class="contact-form p-4 shadow rounded bg-white">
              <input type="hidden" name="contact_form" value="1">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="col-md-6">
                  <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="col-md-12">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                </div>
                <div class="col-md-12">
                  <textarea name="message" rows="5" class="form-control" placeholder="Message" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill shadow-sm">
                    <i class="bi bi-send"></i> Send
                  </button>
                </div>
              </div>
            </form>
          </div>

          <!-- Info Kontak di kanan -->
          <div class="col-lg-6">
            <div class="row gy-4">

              <!-- Basecamp -->
              <a href="https://www.google.com/maps?q=Jl.+Kenangan+No.+8,+Bogor" target="_blank" class="text-decoration-none text-dark">
                <div class="info-item text-center shadow-sm p-4 bg-white rounded" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt fs-1 text-primary mb-3"></i>
                  <h4 class="mb-2">Basecamp</h4>
                  <p class="mb-0">Jl. Kenangan No. 8, Bogor</p>
                </div>
              </a>

              <!-- Telepon -->
              <div class="col-md-6">
                <div class="info-item text-center shadow-sm p-4 bg-white rounded" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone fs-1 text-primary mb-3"></i>
                  <h4 class="mb-2">Call Us</h4>
                  <p class="mb-0">085890871234</p>
                </div>
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <div class="info-item text-center shadow-sm p-4 bg-white rounded" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope fs-1 text-primary mb-3"></i>
                  <h4 class="mb-2">Email Us</h4>
                  <p class="mb-0">ninjabogorclub.com</p>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- /Contact Section -->

    <h2 class="text-black text-center">
      Find Us Here
    </h2>
    <div class="map-container">
      <!-- You can embed a Google Map iframe here for your location -->
      <iframe src="https://maps.google.com/maps?q=Bogor,Indonesia&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

  </main>
</body>

<footer id="footer" class="footer dark-background" style="width: 100%; padding: 40px 0;">
  <div class="container-fluid">
    <div class="row gy-9">
      <div class="col-lg-5 col-md-8 d-flex">
        <!-- <i class="bi bi-geo-alt icon"></i> -->
        <div>
          <h4> Basecamp</h4>
          <p>
            Jalan Kenangan No. 8, Bogor<br>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 footer-links d-flex">
        <!-- <i class="bi bi-telephone icon"></i> -->
        <div>
          <h4> Our Contact</h4>
          <p>
            <strong>Telephone:</strong> 085890871234<br></a>
            <strong>Email:</strong> ninjabogorclub.com<br></a>
          </p>
        </div>
      </div>

      <!-- <div class="col-lg-3 col-md-6 footer-links d-flex">
        <i class=""></i>
        <div>
          <img src="assets/img/favicon.png" alt="" style="width: 90px; height: auto;">
        </div>
      </div> -->

      <div class="col-lg-3 col-md-6 footer-links">
        <h4> Follow Us</h4>
        <div class="social-links d-flex">
          <a href="https://www.instagram.com/sarahfirdaus._" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="https://www.tiktok.com/@ninjabogorclub" class="instagram"><i class="bi bi-tiktok"></i></a>
          <a href="https://x.com/ninjabogorclub" class="instagram"><i class="bi bi-twitter-x"></i></a>
          <a href="https://www.youtube.com/@ninjabogorclub" class="instagram"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>© 2025 <span>Copyright</span> <strong class="px-1 sitename">Ninja Club Bogor</strong> <span>All Rights Reserved</span></p>
    <div class="credits">
    </div>
  </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->

<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</html>