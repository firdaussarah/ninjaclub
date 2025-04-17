<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$database = "ninja_club";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

function setAlert($title='', $text='', $type='', $buttons='') {
	$_SESSION["alert"]["title"]		= $title;
	$_SESSION["alert"]["text"] 		= $text;
	$_SESSION["alert"]["type"] 		= $type;
	$_SESSION["alert"]["buttons"]	= $buttons; 
}
function checkLogin() {
	if (!isset($_SESSION['username'])) {
		setAlert("Access Denied!", "Login First!", "error");
		header('Location: login.php');
	} 
}

function checkLoginAtLogin() {
	if (isset($_SESSION['username'])) {
		setAlert("You has been logged!", "Welcome!", "success");
		header('Location: admin/index.php');
	}
}

function logout() {
	setAlert("You has been logout!", "Success Logout!", "success");
	header("Location: ../index.php");
} 
?>
