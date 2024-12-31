# Project Perpustakaan 📚

Aplikasi perpustakaan berbasis web yang dirancang menggunakan **Laravel 11** dan **Livewire**. Aplikasi ini membantu pengelolaan perpustakaan secara efisien, mencakup data customer, buku, transaksi peminjaman, pengembalian, hingga laporan historis.

<img src="https://laravel.com/img/logomark.min.svg" width="200px" /> <!-- Logo Laravel -->
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8kgf5iqtk7lR3R851jge2j4fEBRiR4_cYhGCy1ndZdvnP0res7USiwbtj6r7HvyRMDFo&usqp=CAU" width="200px" /> <!-- Logo Livewire -->

---

## Fitur Utama 🚀

### 1. **Manajemen Admin**  
   - Tambah, edit, dan hapus data admin.  
   - Admin memiliki hak akses penuh untuk mengelola aplikasi.  

### 2. **Manajemen Customer**  
   - Registrasi, pengelolaan, dan penghapusan data customer (anggota perpustakaan).  
   - Menyimpan riwayat peminjaman setiap customer.  

### 3. **Manajemen Kategori Buku**  
   - Mengelola kategori buku untuk pengelompokan yang terstruktur.  

### 4. **Manajemen Buku**  
   - Kelola koleksi buku: tambah, edit, hapus, atau pencarian buku berdasarkan kategori atau judul.  

### 5. **Peminjaman dan Pengembalian Buku**  
   - Kelola data transaksi peminjaman dan pengembalian buku.  
   - Hitung denda otomatis berdasarkan durasi keterlambatan.  

### 6. **Riwayat Pengembalian**  
   - Menyimpan arsip historis pengembalian buku untuk keperluan laporan dan audit.  

### 7. **Dashboard Informasi**  
   - Menampilkan statistik real-time, seperti:  
     - Total buku  
     - Jumlah customer  
     - Transaksi peminjaman aktif  
     - Grafik peminjaman dan pengembalian.  

### 8. **Autentikasi Login**  
   - Sistem login custom untuk memastikan hanya admin yang dapat mengakses aplikasi.  

---

## Teknologi yang Digunakan 🛠️

- **Laravel 11**: Framework PHP untuk pengembangan aplikasi web yang kuat.  
  <img src="https://laravel.com/img/logomark.min.svg" width="200px" /> <!-- Ikon Laravel -->
- **Livewire**: Framework untuk pengembangan aplikasi full-stack tanpa penggunaan JavaScript secara langsung.  
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8kgf5iqtk7lR3R851jge2j4fEBRiR4_cYhGCy1ndZdvnP0res7USiwbtj6r7HvyRMDFo&usqp=CAU" width="200px" /> <!-- Ikon Livewire -->
- **MySQL**: Database relasional untuk penyimpanan data.
-  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXizOekeei5tf2Z8KG1_DI-hjwgLEttS-M9A&s" width="200px" /> <!-- Ikon Livewire -->
- **Tailwind CSS**: Framework CSS untuk desain antarmuka yang modern dan responsif.
-  <img src="https://cdnblog.webkul.com/blog/wp-content/uploads/2024/05/tailwindcss-1633184775.webp" width="200px" /> <!-- Ikon Livewire -->

---

## Instalasi 🚧

### Prasyarat

Pastikan sistem Anda sudah terpasang:

- PHP >= 8.2  
- Composer  
- Node.js & NPM  
- MySQL

### Langkah-langkah Instalasi

1. **Clone repositori**  
   Jalankan perintah berikut untuk mengunduh source code:  
   ```bash
   git clone https://github.com/username/project-perpustakaan.git
   cd project-perpustakaan
