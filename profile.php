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
    <title>Profiles - Ninja Club Bogor</title>
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

        <section id="profile" class="profile section-bg pt-20" style="margin-top: 80px;">
            <div class="container" data-aos="fade-up">
                <div class="row content">
                    <div class="col-lg-6">
                        <h3>Our Journey</h3>
                        <p>Ninja Club Bogor was founded in 2018 by a group of passionate Kawasaki Ninja motorcycle enthusiasts. What began as a simple gathering of like-minded riders soon evolved into a prominent motorcycle club in the region. Our founders shared a common love for Kawasaki Ninja bikes, but more importantly, they were united by their love for the thrill of the road, the freedom that comes with riding, and the sense of belonging to a community of individuals who shared the same passion.</p>
                        <p>From the very beginning, Ninja Club Bogor set out to create a safe, supportive, and inclusive space where Kawasaki Ninja motorcycle owners could come together, share experiences, and create lasting friendships. Our growth over the years is a testament to the club’s success in fostering a strong sense of community among riders from all walks of life, from seasoned professionals to new riders looking to improve their skills.</p>
                        <p>Throughout the years, the club has organized a variety of activities, including group rides, charity events, and riding training programs. Our events are more than just opportunities to ride; they are a way for our members to bond, learn, and share experiences that go beyond the motorcycle. Whether it’s a weekend ride through scenic routes or a charity ride to raise funds for a cause, every event is an opportunity for the club to make a positive impact on our community while having fun.</p>
                        <p>At Ninja Club Bogor, we believe that the bond shared among riders goes beyond motorcycles. It’s about building friendships, supporting one another, and creating memories that last a lifetime. Every ride, every event, and every moment shared with our members strengthens the club and reinforces our commitment to providing an environment where Kawasaki Ninja motorcycle enthusiasts can thrive.</p>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>Our Values</h3>
                        <p>As a club, we are guided by a set of core values that shape our culture and define the way we interact with one another, both on and off the road. These values are at the heart of everything we do and serve as a foundation for the experiences we create for our members.</p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <strong>Passion for Motorcycling:</strong> Our love for Kawasaki Ninja motorcycles is what brought us together, and it continues to drive us. We are committed to sharing that passion with others and growing the community of Kawasaki Ninja owners.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>Commitment to Safety:</strong> Safety is our top priority. We promote responsible riding and emphasize the importance of safety gear, proper riding techniques, and awareness on the road.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>Respect and Brotherhood:</strong> We believe that riding is about more than just the bike. It’s about respect—respect for fellow riders, for the road, and for the community we’ve built together. Our members support one another through thick and thin, and we always strive to maintain a welcoming and inclusive atmosphere.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>Adventure and Exploration:</strong> Riding is an adventure, and we embrace that spirit. We love to explore new places, enjoy scenic rides, and challenge ourselves through thrilling group rides and competitions.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>Continuous Improvement:</strong> We are committed to continuous learning and self-improvement. Whether it’s enhancing our riding skills, learning about motorcycle maintenance, or staying up to date with the latest trends in motorcycling, we are always seeking ways to improve ourselves and our club.</li>
                        </ul>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-12">
                        <h3>Our Goals</h3>
                        <p>At Ninja Club Bogor, our mission is to create a strong and vibrant community of Kawasaki Ninja motorcycle riders who are united by their love for riding and their commitment to creating lasting memories. Our main goals include:</p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <strong>To Foster a Supportive Community:</strong> Our primary goal is to foster a supportive and friendly environment for Kawasaki Ninja owners. We want our members to feel like they belong, whether it’s through group rides, training events, or simply sharing experiences with one another.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>To Promote Responsible Riding:</strong> We believe in riding responsibly, both for our safety and the safety of others. We emphasize safe riding techniques, promote the use of safety gear, and encourage our members to practice good road awareness.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>To Host Exciting Events:</strong> We aim to organize exciting and memorable events throughout the year. From thrilling group rides to charity events, our goal is to bring riders together for fun, camaraderie, and to give back to the community.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>To Provide Opportunities for Learning:</strong> We strive to provide our members with opportunities to learn and improve. Whether it’s through group rides that challenge our skills or workshops on motorcycle maintenance, we are dedicated to helping our members become better riders.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>To Give Back to the Community:</strong> We believe in making a positive impact beyond just motorcycling. Through charity rides, donations, and community outreach, we aim to use our passion for motorcycles to support various causes and make a difference in people’s lives.</li>
                        </ul>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-12">
                        <h3>Why Join Us?</h3>
                        <p>Becoming a member of Ninja Club Bogor opens the door to a world of exciting opportunities and benefits. When you join us, you are not just joining a motorcycle club—you are becoming part of a community that values camaraderie, respect, and mutual support. Some of the benefits of being a part of our club include:</p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <strong>Exclusive Events:</strong> As a member, you will have access to exclusive group rides, charity events, and social gatherings tailored to Kawasaki Ninja motorcycle enthusiasts.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>Learning and Growth:</strong> Whether you're new to motorcycling or a seasoned rider, we provide a wealth of opportunities for learning and skill-building. From technical workshops to group rides, there’s always something new to learn.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>Camaraderie and Brotherhood:</strong> Being part of Ninja Club Bogor means you’ll never ride alone. Our members enjoy the companionship of fellow riders who share the same passion and commitment to motorcycling.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>Access to Resources:</strong> Members receive access to exclusive resources, such as riding tips, maintenance advice, and a network of Kawasaki Ninja owners who are always happy to help.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>Charitable Opportunities:</strong> We actively engage in charity events, helping out those in need through our motorcycle rides and donations. Being a part of our club means contributing to meaningful causes while doing what we love.</li>
                            <li><i class="bi bi-check-circle"></i> <strong>Make Lifelong Friendships:</strong> The relationships built in Ninja Club Bogor go beyond the bike. We’ve created a community where members form lasting friendships, share memories, and support one another in all aspects of life.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

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