<?php
require '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");

header("Location: gallery.php");
?>
