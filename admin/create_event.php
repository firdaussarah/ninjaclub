<?php
require '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];

  $imageName = $_FILES['image']['name'];
  $imageTmp = $_FILES['image']['tmp_name'];
  move_uploaded_file($imageTmp, "../$imageName");

  mysqli_query($conn, "INSERT INTO events (title, description, image) VALUES ('$title', '$description', '$imageName')");
  header("Location: index.php");
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
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body>
  <main class="container mt-5">
    <div class="shadow-sm p-4 mb-5 bg-white rounded" style="max-width: 600px; margin: 0 auto;">
      <form action="" method="POST" enctype="multipart/form-data" class="p-4 rounded shadow bg-white" style="max-width: 600px; margin: auto;">
        <h3 class="mb-4 text-center">Upload Event</h3>

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter description" required></textarea>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-danger px-4 rounded-pill">
            <i class="bi bi-upload me-1"></i> Upload
          </button>
        </div>
    </div>
    </form>