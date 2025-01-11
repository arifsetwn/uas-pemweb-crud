<?php
include 'config.php';

// Cek apakah parameter ID ada di URL
if (isset($_XX['id'])) {
    // Siapkan query DELETE dengan prepared statement untuk mencegah SQL Injection
    // Lengkapi query DELETE di sini
    $stmt = $conn->prepare("XX");


    $stmt->bind_param("i", $_GET['id']);
    // Eksekusi query DELETE
    if ($stmt->execute()) {
        // Jika berhasil menghapus, kembali ke halaman index dengan status sukses
        header("Location: index.php?status=deleted");
    } else {
        // Jika gagal menghapus, kembali ke halaman index dengan status error
        // Lengkapi header lokasi untuk status error
        header("XX");
    }
    
    // Tutup prepared statement
    $stmt->close();
} else {
    // Jika tidak ada ID yang dikirim, kembali ke halaman index dengan status error
    header("Location: index.php?status=error");
}

// Tutup koneksi database
$conn->close();
?>
