<?php
session_start();

// Data login admin (contoh, ganti sesuai kebutuhan)
$username_admin = "admin";
$password_admin = "123";

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Validasi username dan password
if ($username == $username_admin && $password == $password_admin) {
    $_SESSION['admin'] = $username;
    header("location:index.php"); // Redirect ke dashboard admin
} else {
    header("location:login-admin.php?pesan=gagal");
}
?>
