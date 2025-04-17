<?php
require '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM team WHERE id = $id");
header("Location: members.php");
