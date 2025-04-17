<?php
require '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM events WHERE id = $id");
header("Location: index.php");
?>

