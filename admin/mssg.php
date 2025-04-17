<?php
require '../koneksi.php';
if (isset($_POST['messages'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];

   $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
   $stmt->bind_param("ssss", $name, $email, $subject, $message);
   if ($stmt->execute()) {
      echo "<div class='alert alert-success text-center'>Message Sent Successfully!</div>";
   } else {
      echo "<div class='alert alert-danger text-center'>Failed to Send Message!</div>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Admin Panel - Ninja Club Bogor</title>
   <!-- Favicons -->
   <link href="../assets/img/favicon.png" rel="icon">
   <link href="../assets/img/favicon.png" rel="apple-touch-icon">

   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- site icon -->
   <link rel="icon" href="images/fevicon.png" type="image/png" />
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!-- site css -->
   <link rel="stylesheet" href="style.css" />
   <!-- responsive css -->
   <link rel="stylesheet" href="css/responsive.css" />
   <!-- color css -->
   <link rel="stylesheet" href="css/colors.css" />
   <!-- select bootstrap -->
   <link rel="stylesheet" href="css/bootstrap-select.css" />
   <!-- scrollbar css -->
   <link rel="stylesheet" href="css/perfect-scrollbar.css" />
   <!-- custom css -->
   <link rel="stylesheet" href="css/custom.css" />
   <!-- calendar file css -->
   <link rel="stylesheet" href="js/semantic.min.css" />
   <link rel="stylesheet" href="css/bootstrap.css" />
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar_blog_1">
               <div class="sidebar-header">
                  <div class="logo_section">
                     <!-- <a href="index.html"><img class="logo_icon img-responsive" src="" alt="#" /></a> -->
                  </div>
               </div>
               <div class="sidebar_user_info">
                  <div class="icon_setting"></div>
                  <div class="user_profle_side">
                     <div class="user_img"><img class="img-responsive" src="images/pp.jpg" alt="#" /></div>
                     <div class="user_info">
                        <h6>Sarr</h6>
                        <p><span class="online_animation"></span> Online</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sidebar_blog_2">
               <ul class="list-unstyled components">
                  <li class="active">
                     <!-- <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span>Dashboard</span></a> -->
                     <!-- <ul class="collapse list-unstyled" id="dashboard"> -->
                  <li>
                     <a href="index.php"><span>Event</span></a>
                  </li>
                  <li>
                     <a href="article.php"><span>Article</span></a>
                  </li>
                  <li>
                     <a href="gallery.php"><span>Gallery</span></a>
                  </li>
                  <li>
                     <a href="members.php"><span>Members</span></a>
                  </li>
                  <!-- </ul> -->
                  </li>
                  <li><a href="mssg.php"><span>Message</span></a></li>
                  <ul>
                     <li><a href="logout.php"><span>Logout</span></a></li>
                  </ul>
               </ul>
               </li>
               </ul>
               </li>
               </ul>
            </div>
         </nav>
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <div class="topbar">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <div class="full">
                     <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                     <div class="logo_section">
                        <!-- <a href="index.php"><img class="img-responsive" src="../assets/img/kolo.png" alt="#" /></a> -->
                     </div>
                     <div class="right_topbar">
                        <div class="icon_info">
                           <ul class="user_profile_dd">
                              <!-- <li>
                                 <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/pp.jpg" alt="#" /><span class="name_user">Sarr</span></a>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                 </div>
                              </li> -->
                           </ul>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">

                           <h2 class="mt-5">Contact Messages</h2>
                           <table class="table table-bordered table-striped mt-3">
                              <div style="overflow-x: auto;">
                                 <table class="table table-striped" style="width: 1000px" ;>
                                    <thead class="table-dark">
                                       <tr>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Subject</th>
                                          <th>Message</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $message = mysqli_query($conn, "SELECT * FROM messages ORDER BY sent_at DESC");
                                       while ($row = mysqli_fetch_assoc($message)):
                                       ?>
                                          <tr>
                                             <td><?= htmlspecialchars($row['name']) ?></td>
                                             <td><?= htmlspecialchars($row['email']) ?></td>
                                             <td><?= htmlspecialchars($row['subject']) ?></td>
                                             <td><?= htmlspecialchars($row['message']) ?></td>
                                             <td>
                                                <!-- <a href="mailto:<?= $row['email'] ?>?subject=Re: <?= urlencode($row['subject']) ?>" class="btn btn-primary btn-sm">
                                             <i class="bi bi-envelope-fill"></i> Reply                                          </a> -->
                                                <a href="deletecontact.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm" onclick="return confirm('Delete this message?')"><i class="bi bi-trash"></i>Delete</a>
                                                </a>
                                             </td>

                                          <?php endwhile; ?>
                                    </tbody>
                                 </table>


                                 <!-- footer -->
                                 <div class="container-fluid">
                                    <div class="footer">
                                       <p>Copyright © 2025 Designed by Ninja Club Bogor. All rights reserved.</p>
                                    </div>
                                 </div>
                              </div>
                              <!-- end dashboard inner -->
                        </div>
                     </div>
                  </div>
                  <!-- jQuery -->
                  <script src="js/jquery.min.js"></script>
                  <script src="js/popper.min.js"></script>
                  <script src="js/bootstrap.min.js"></script>
                  <!-- wow animation -->
                  <script src="js/animate.js"></script>
                  <!-- select country -->
                  <script src="js/bootstrap-select.js"></script>
                  <!-- owl carousel -->
                  <script src="js/owl.carousel.js"></script>
                  <!-- chart js -->
                  <script src="js/Chart.min.js"></script>
                  <script src="js/Chart.bundle.min.js"></script>
                  <script src="js/utils.js"></script>
                  <script src="js/analyser.js"></script>
                  <!-- nice scrollbar -->
                  <script src="js/perfect-scrollbar.min.js"></script>
                  <script>
                     var ps = new PerfectScrollbar('#sidebar');
                  </script>
                  <!-- custom js -->
                  <script src="js/custom.js"></script>
                  <!-- calendar file css -->
                  <script src="js/semantic.min.js"></script>
                  <script></script>
</body>

</html>