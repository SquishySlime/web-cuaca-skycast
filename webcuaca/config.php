<?php
$servername = "localhost";
$username = "root"; // Default username XAMPP
$password = ""; // Default password kosong
$dbname = "skycast_db"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
