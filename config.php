<?php
// Perbaiki konfigurasi koneksi berikut
$host = "XX"; // Masukkan nama host database
$user = "XX"; // Masukkan username database
$password = "XX"; // Masukkan password database
$db = "XX"; // Masukkan nama database

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi berhasil!";
?>
