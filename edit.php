<?php
include 'config.php';

// Get product ID from URL and validate
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (empty($id)) {
    header("Location: index.php");
    exit();
}

// Fetch product data
$stmt = $conn->prepare("SELECT * FROM produk WHERE id_produk = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// If product not found, redirect back to index
if (!$product) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Produk</h1>
    </header>

    <div class="container">
        <form action="process_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" required 
                       value="<?php echo htmlspecialchars($product['nama_produk']); ?>">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required><?php echo htmlspecialchars($product['deskripsi_produk']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" id="harga" name="harga" required onkeyup="formatRupiah(this)" 
                       value="Rp <?php echo number_format($product['harga_produk'], 0, ',', '.'); ?>">
                <input type="hidden" name="harga_real" id="harga_real" 
                       value="<?php echo $product['harga_produk']; ?>">
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" required 
                       value="<?php echo htmlspecialchars($product['stok_produk']); ?>">
            </div>

            <button type="submit" class="btn btn-edit">Update Produk</button>
        </form>
    </div>

    <script>
        function formatRupiah(input) {
            let number = input.value.replace(/[^\d]/g, '');
            document.getElementById('harga_real').value = number;
            if (number) {
                number = parseInt(number);
                let formatted = new Intl.NumberFormat('id-ID').format(number);
                input.value = 'Rp ' + formatted;
            }
        }
    </script>
</body>
</html>
