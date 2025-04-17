<?php
require '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM messages WHERE id = $id");
header("Location: mssg.php");
