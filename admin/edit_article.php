<?php
require '../koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$result = mysqli_query($conn, "SELECT * FROM partners WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $image = $data['image'];

  if ($_FILES['image']['name']) {
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    if (in_array($file_ext, $allowed_ext)) {
      $img_name = uniqid() . '.' . $file_ext;
      $tmp = $_FILES['image']['tmp_name'];
      $path = 'assets/img/clients/' . $img_name;
      move_uploaded_file($tmp, '../' . $path);
      $image = $path;
    }
  }

  $sql = "UPDATE partners SET name='$name', description='$description', image='$image' WHERE id=$id";
  mysqli_query($conn, $sql);
  header("Location: article.php");
  exit;
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
  <title>Edit Article</title>
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
</head>

<body>
  <main class="container mt-5">
    <div class="card shadow-sm p-4 mb-5 bg-white rounded" style="max-width: 600px; margin: 40px auto;">
      <h3 class="text-center mb-4">Edit Article</h3>
      <form method="POST" enctype="multipart/form-data">

        <!-- Title atau Nama Article -->
        <div class="mb-3">
          <label for="partnerName" class="form-label">Title</label>
          <input type="text" name="name" id="partnerName" class="form-control" value="<?= htmlspecialchars($data['name']) ?>" required>
        </div>

        <!-- Deskripsi untuk Article -->
        <div class="mb-3">
          <label for="partnerDescription" class="form-label">Description</label>
          <input type="text" name="description" id="partnerDescription" class="form-control" value="<?= htmlspecialchars($data['description']) ?>" required>
        </div>

        <!-- Gambar untuk Article -->
        <div class="mb-3">
          <label for="partnerImage" class="form-label">Image</label>
          <input type="file" name="image" id="partnerImage" class="form-control">

          <!-- Menampilkan gambar saat ini jika ada -->
          <?php if (!empty($data['image'])): ?>
            <div class="mt-3">
              <label>Current Image:</label><br>
              <img src="<?= '../' . $data['image'] ?>" alt="Article Image" width="100">
            </div>
          <?php endif; ?>
        </div>

        <!-- Tombol submit -->
        <div class="text-center">
          <button type="submit" class="btn btn-danger px-4 rounded-pill">
            <i class="bi bi-save me-1"></i> Update Article
          </button>
        </div>

      </form>
    </div>
  </main>
</body>

</html>