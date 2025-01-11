<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dashboard Produk</h1>
    </header>

    <div class="container">
        <?php
        include 'config.php';
        $sql = "SELECT * FROM produk";
        $result = $conn->query($sql);
        ?>
        <a href="tambah.php" class="btn btn-tambah">Tambah Produk</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) { 
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
                        <td><?php echo htmlspecialchars($row['deskripsi_produk']); ?></td>
                        <td>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($row['stok_produk']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-edit">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php 
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">Tidak ada data produk</td>
                    </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == 'deleted'): ?>
            <div class="alert alert-success">Produk berhasil dihapus!</div>
        <?php elseif ($_GET['status'] == 'added'): ?>
            <div class="alert alert-success">Produk berhasil ditambahkan!</div>
        <?php elseif ($_GET['status'] == 'edited'): ?>
            <div class="alert alert-success">Produk berhasil diperbarui!</div>
        <?php elseif ($_GET['status'] == 'error'): ?>
            <div class="alert alert-danger">Terjadi kesalahan!</div>
        <?php endif; ?>
    <?php endif; ?>

    <?php $conn->close(); ?>
</body>
</html>
