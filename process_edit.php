<?php
include 'XX'; // Perbaiki path ke file config.php

// Cek apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form yang dikirim
    $id = $_POST['id'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['XX'];// Lengkapi nilai XX dari input form
    $harga = $_POST['harga_real']; 
    $stok = $_POST['XX']; // Lengkapi nilai XX dari input form

    // Siapkan query UPDATE dengan prepared statement untuk mencegah SQL Injection
    $sql = "UPDATE produk 
            SET nama_produk = ?, 
                deskripsi_produk = ?, 
                harga_produk = ?, 
                stok_produk = ? 
            WHERE id_produk = ?";
    
    // Buat prepared statement
    $stmt = $conn->prepare($sql);
    
    // Binding parameter ke prepared statement
    // s = string, i = integer
    // Lengkapi tipe data dan parameter XX yang kosong
    $stmt->bind_param("ssiii", $nama_produk, $XX, $XX, $stok, $id); 

    // Eksekusi query UPDATE
    if ($stmt->execute()) {
        // Jika berhasil update, kembali ke halaman index dengan status sukses
        header("Location: index.php?status=edited");
        exit();
    } else {
        // Jika gagal update, kembali ke halaman index dengan status error
        // Lengkapi lokasi dengan status error
        header("Location: index.php?status=XX"); 
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