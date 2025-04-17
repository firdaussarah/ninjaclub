<?php
include '../koneksi.php';
$id = $_GET['id'];
$event = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id = $id"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];

  // Folder tujuan upload
  $uploadDir = '../uploads/';
  if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
  }

  if (!empty($_FILES['image']['name'])) {
    $imageName = basename($_FILES['image']['name']);
    $imageTmp = $_FILES['image']['tmp_name'];
    $target = $uploadDir . $imageName;

    if (move_uploaded_file($imageTmp, $target)) {
      mysqli_query($conn, "UPDATE events SET title='$title', description='$description', image='$imageName' WHERE id=$id");
    }
  } else {
    mysqli_query($conn, "UPDATE events SET title='$title', description='$description' WHERE id=$id");
  }

  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- (head tetap, sama seperti punyamu) -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Event</title>
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <main class="container mt-5">
    <div class="card shadow-sm p-4 mb-5 bg-white rounded" style="max-width: 600px; margin: 40px auto;">
      <h3 class="text-center mb-4">Edit Event</h3>
      <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="title" class="form-label">Event Title</label>
          <input type="text" name="title" id="title" class="form-control"
            value="<?php echo htmlspecialchars($event['title']); ?>" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" id="description" rows="4" class="form-control" required><?php echo htmlspecialchars($event['description']); ?></textarea>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" name="image" id="image" class="form-control">
        </div>

        <!-- <?php if (!empty($event['image'])): ?>
          <div class="mb-3 text-center">
            <label class="form-label d-block">Current Image:</label>
            <img src="../uploads/<?php echo htmlspecialchars($event['image']); ?>" alt="Current Image" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
          </div>
        <?php endif; ?> -->

        <div class="text-center">
          <button type="submit" class="btn btn-danger px-4 rounded-pill">
            <i class="bi bi-save me-1"></i> Update Event
          </button>
        </div>

      </form>
    </div>
  </main>
</body>

</html>