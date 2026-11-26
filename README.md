# perpus-php
Praktik CRUD Kasus 1 - Aplikasi Perpustakaan PHP Native dan MySQL

## Deskripsi
Aplikasi Perpustakaan merupakan project sederhana berbasis web yang dibuat menggunakan PHP Native dan MySQL. Aplikasi ini digunakan untuk mengelola data buku, anggota, dan transaksi peminjaman buku.

Project ini dibuat untuk memenuhi tugas CRUD (Create, Read, Update, Delete).

## Teknologi yang Digunakan
- PHP Native
- MySQL
- HTML
- CSS
- Bootstrap
- XAMPP

## Fitur Aplikasi
1. **Dashboard**
   - Menampilkan jumlah data buku.
   - Menampilkan jumlah anggota.
   - Menampilkan jumlah peminjaman dan pengembalian.

2. **Data Buku**
   - Menampilkan data buku.
   - Menambahkan buku.
   - Mengedit data buku.
   - Menghapus buku.
   - Mencari buku.

3. **Data Peminjaman**
   - Menampilkan data peminjaman.
   - Menambahkan transaksi peminjaman.
   - Memproses pengembalian buku.
   - Menghapus data peminjaman.

## Struktur Folder
```text
perpus-php/
├── assets/
│   └── css/
├── config/
│   └── config.php
├── includes/
│   ├── functions.php
│   ├── header.php
│   └── footer.php
├── buku/
├── peminjaman/
├── screenshots/
├── index.php
└── README.md
```

## Cara Menjalankan Aplikasi
1. Instal dan jalankan XAMPP.
2. Aktifkan Apache dan MySQL.
3. Letakkan folder project di dalam `htdocs`.
4. Buat database dengan nama `db_perpustakaan` melalui phpMyAdmin.
5. Buat tabel sesuai struktur database aplikasi.
6. Sesuaikan konfigurasi database pada file `config/config.php`.
7. Buka browser dan akses:

```text
http://localhost/perpus-php/
```

## Database
Nama database: `db_perpustakaan`

Tabel yang digunakan:
- `buku`
- `anggota`
- `peminjaman`

## Tampilan Aplikasi
Screenshot tampilan aplikasi dapat dilihat pada folder `screenshots`.

## Penutup
Project ini dibuat sebagai bagian dari pembelajaran pemrograman web menggunakan PHP Native dan MySQL, khususnya dalam penerapan operasi CRUD dan pengelolaan database.
