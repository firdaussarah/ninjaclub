<?php
// Menghubungkan ke database
require '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mengambil data dari form dan memastikan input aman
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);

  // Mengambil data gambar
  $imageName = $_FILES['image']['name'];
  $imageTmp = $_FILES['image']['tmp_name'];
  $imagePath = 'assets/img/' . $imageName; // Menyimpan gambar di folder assets/img

  // Mengecek apakah ekstensi file gambar valid
  $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
  $fileExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

  if (in_array($fileExt, $allowedExt)) {
    // Memindahkan gambar ke folder tujuan
    if (move_uploaded_file($imageTmp, "../$imagePath")) {
      // Query untuk menyimpan data ke database
      $sql = "INSERT INTO partners (name, image, description) VALUES ('$name', '$imagePath', '$description')";

      if (mysqli_query($conn, $sql)) {
        header("Location: article.php"); // Mengarahkan ke halaman article setelah sukses
        exit;
      } else {
        echo "Error: " . mysqli_error($conn); // Menampilkan error jika query gagal
      }
    } else {
      echo "Error uploading the image."; // Pesan error jika upload gambar gagal
    }
  } else {
    echo "Invalid file extension. Only JPG, JPEG, PNG, and GIF are allowed."; // Jika ekstensi file tidak valid
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel - Ninja Club Bogor</title>
  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/favicon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <main class="container mt-5">
    <div class="shadow-sm p-4 mb-5 bg-white rounded" style="max-width: 600px; margin: 0 auto;">
      <h3 class="text-center mb-4">Add New Article</h3>
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="partnerName" class="form-label">Title</label>
          <input type="text" name="name" id="partnerName" class="form-control" placeholder="Enter title" required>
        </div>
        <div class="mb-3">
          <label for="partnerDescription" class="form-label">Description</label>
          <textarea name="description" id="partnerDescription" class="form-control" placeholder="Enter description" required></textarea>
        </div>
        <div class="mb-3">
          <label for="partnerImage" class="form-label">Image</label>
          <input type="file" name="image" id="partnerImage" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success w-100">
          <i class="bi bi-upload"></i> Upload
        </button>
      </form>
    </div>
  </main>
</body>

</html>