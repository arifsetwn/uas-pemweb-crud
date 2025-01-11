<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Tambah Produk</h1>
    </header>

    <div class="container">
        <form action="process_tambah.php" method="POST">
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" id="harga" name="harga" required onkeyup="formatRupiah(this)">
                <input type="hidden" name="harga_real" id="harga_real">
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" required>
            </div>

            <button type="submit" class="btn btn-tambah">Tambah Produk</button>
        </form>
    </div>

    <script>
        function formatRupiah(input) {
            // Remove non-digit characters
            let number = input.value.replace(/[^\d]/g, '');
            
            // Store original number in hidden input
            document.getElementById('harga_real').value = number;
            
            // Format the number
            if (number) {
                number = parseInt(number);
                let formatted = new Intl.NumberFormat('id-ID').format(number);
                input.value = 'Rp ' + formatted;
            }
        }
    </script>
</body>
</html>
