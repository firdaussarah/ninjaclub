<?php
require '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM gallery WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $category = $_POST['category'];

  if ($_FILES['image']['name']) {
    $target = 'assets/img/portofolio/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $image = 'uploads/' . basename($_FILES['image']['name']);
    $query = "UPDATE gallery SET title='$title', description='$description', category='$category', image='$image' WHERE id=$id";
  } else {
    $query = "UPDATE gallery SET title='$title', description='$description', category='$category' WHERE id=$id";
  }

  // Pastikan koneksi yang digunakan sama (gunakan $conn jika itu nama yang benar)
  mysqli_query($conn, $query);
  header('Location: gallery.php');
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
  <title>Edit Gallery</title>
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
<main class="container mt-5"></main>
<div class="card shadow-sm p-4 mb-5 bg-white rounded" style="max-width: 600px; margin: 40px auto;">
  <h3 class="text-center mb-4">Edit Gallery</h3>
  <form method="POST" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" id="title" class="form-control"
        value="<?= htmlspecialchars($data['title']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <input type="text" name="category" id="category" class="form-control"
        value="<?= htmlspecialchars($data['category']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" rows="4" class="form-control" required><?= htmlspecialchars($data['description']) ?></textarea>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" name="image" id="image" class="form-control">
      <?php if (!empty($data['image'])): ?>
        <div class="mt-2">
        </div>
      <?php endif; ?>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger px-4 rounded-pill">
        <i class="bi bi-save me-1"></i> Update Gallery
      </button>
    </div>

  </form>
</div>