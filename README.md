### **Instruksi Praktikum:**

1. **Jalankan XAMPP/Laragon dan Buat Database**
   - Gunakan **phpMyAdmin** untuk membuat database berikut:  

     **Nama Database:** `toko_NIM`  
     **Nama Tabel:** `produk`  

     Tabel dengan struktur berikut:  

     | **Nama Kolom**       | **Tipe Data**    | **Keterangan**                           |
     |----------------------|------------------|-------------------------------------------|
     | `id_produk`          | `INT`           | Primary Key, Auto Increment               |
     | `nama_produk`        | `VARCHAR(100)`  | Nama produk                               |
     | `deskripsi_produk`   | `TEXT`          | Deskripsi detail tentang produk           |
     | `harga_produk`       | `DECIMAL(10,2)` | Harga produk (format desimal, 2 digit)    |
     | `stok_produk`        | `INT`           | Jumlah stok produk yang tersedia          |

2. **Clone Source Code Website**
   - Clone source code dari link berikut:  
     [Link Source Code PHP CRUD](https://ums.id/pemweb2425)

3. **Modifikasi File `config.php`**
   - Pastikan file `config.php` terkoneksi dengan database yang telah dibuat (`toko_NIM`).  

4. **Modifikasi File `process_tambah.php`**
   - Modifikasi agar website dapat menambahkan data ke tabel `produk`.

5. **Modifikasi File `process_edit.php`**
   - Modifikasi agar website dapat mengedit data di tabel `produk`.

6. **Modifikasi File `hapus.php`**
   - Modifikasi agar website dapat menghapus data dari tabel `produk`.

---

### **Catatan:**
Pastikan semua fitur CRUD (Create, Read, Update, Delete) berjalan dengan baik sesuai dengan spesifikasi database. Selamat mengerjakan! 🎉
