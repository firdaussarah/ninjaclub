<?php
require '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM partners WHERE id = $id");
header("Location: article.php");
