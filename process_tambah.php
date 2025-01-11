<?php
include 'XX'; // Perbaiki path ke file config.php

// Cek apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "XX") {
    // Ambil data dari form yang dikirim
    $nama_produk = $_POST['XX']; // Lengkapi nilai XX dari input form
    $deskripsi = $_POST['XX']; // Lengkapi nilai XX dari input form
    $harga = $_POST['harga_real']; 
    $stok = $_POST['XX']; // Lengkapi nilai XX dari input form

    // Siapkan query INSERT dengan prepared statement untuk mencegah SQL Injection
    // Lengkapi query INSERT di sini
    $sql = "INSERT INTO produk (nama_produk, XX, XX, XX) 
            VALUES (?, ?, ?, ?)";
    
    // Buat prepared statement
    $stmt = $conn->prepare($sql);
    
    // Binding parameter ke prepared statement
    // s = string, i = integer
    $stmt->bind_param("ssii", $nama_produk, $deskripsi, $harga, $stok);

    // Eksekusi query INSERT
    if ($stmt->execute()) {
        // Jika berhasil tambah data, kembali ke halaman index dengan status sukses
        header("Location: index.php?status=added");
        exit();
    } else {
        // Jika gagal tambah data, kembali ke halaman index dengan status error
        header("Location: index.php?status=error");
        exit();
    }

    // Tutup prepared statement
    $stmt->close();
} else {
    // Jika bukan request POST, kembali ke halaman index
    header("Location: index.php");
    exit();
}

// Tutup koneksi database
$conn->close();
?> 