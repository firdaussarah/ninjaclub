<?php
require 'koneksi.php'; // file koneksi ke database

// Ambil semua artikel dari database
$articles = mysqli_query($conn, "SELECT * FROM partners");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Articles - Ninja Club Bogor</title>
    <meta name="description" content="Ninja Club Bogor - Articles related to the Kawasaki Ninja Club">
    <meta name="keywords" content="Ninja Club, Bogor, Kawasaki Ninja, Motorcycle Articles">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/favicon.png" rel="apple-touch-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            text-align: center;
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
            margin-top: 15px;
            line-height: 1.6;
        }

        .row.g-4 {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        @media (max-width: 767px) {
            .card-body {
                padding: 15px;
            }

            .card-title {
                font-size: 1.2rem;
            }

            .card-text {
                font-size: 0.9rem;
            }
        }

        #header {
            background-color: #343a40;
            padding: 20px;
        }
    </style>
</head>

<body class="index-page">

    <!-- Header -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.php" class="logo d-flex align-items-center me-auto">
                <h1><img src="assets/img/favicon.png" height="80" alt="Logo"> NINJA CLUB BOGOR</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php#hero" class="active">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="article.php">Articles</a></li>
                    <li><a href="index.php#services">Events</a></li>
                    <li><a href="index.php#portfolio">Gallery</a></li>
                    <li><a href="index.php#team">Members</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main id="main" class="mt-4 pt-4">
        <section class="container py-8">
            <h1 class="mb-5 text-center text-dark">Our Articles</h1>

            <?php if (mysqli_num_rows($articles) > 0): ?>
                <?php while ($article = mysqli_fetch_assoc($articles)): ?>
                    <div class="mb-5 pb-4 border-bottom">
                        <!-- Judul Artikel -->
                        <h3 class="text-dark mb-8 text-right">
                            <?php echo htmlspecialchars($article['name']); ?>
                        </h3>

                        <!-- Gambar jika ada -->
                        <?php if (!empty($article['image'])): ?>
                            <div class="text-center mb-3">
                                <img src="<?php echo htmlspecialchars($article['image']); ?>"
                                    alt="<?php echo htmlspecialchars($article['name']); ?>"
                                    class="img-fluid rounded shadow-sm"
                                    style=" width: auto; height: auto; object-fit: cover; display: block; margin: 0 auto;">
                            </div>
                        <?php endif; ?>

                        <!-- Deskripsi -->
                        <p class="text-muted text-justify">
                            <?php echo htmlspecialchars($article['description']); ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center text-muted">No articles found.</p>
            <?php endif; ?>
        </section>
    </main>


    <!-- Footer -->
    <footer id="footer" class="footer dark-background" style="width: 100%; padding: 40px 0;">
        <div class="container-fluid">
            <div class="row gy-9">
                <div class="col-lg-5 col-md-8 d-flex">
                    <div>
                        <h4>Basecamp</h4>
                        <p>Jalan Kenangan No. 8, Bogor</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <div>
                        <h4>Our Contact</h4>
                        <p>
                            <strong>Telephone:</strong> 085890871234<br>
                            <strong>Email:</strong> <a href="mailto:ninjabogorclub.com" class="text-decoration-none text-white">ninjabogorclub.com</a><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4> Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="https://www.instagram.com/sarahfirdaus._" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.tiktok.com/@ninjabogorclub" class="instagram"><i class="bi bi-tiktok"></i></a>
                        <a href="https://x.com/ninjabogorclub" class="instagram"><i class="bi bi-x"></i></a>
                        <a href="https://www.youtube.com/@ninjabogorclub" class="instagram"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© 2025 <span>Copyright</span> <strong class="px-1 sitename">Ninja Club Bogor</strong> <span>All Rights Reserved</span></p>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="index.php" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
    <script src="assets/js/main.js"></script>

</body>

</html>