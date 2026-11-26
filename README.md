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


## Tampilan Aplikasi
1. Buka halaman Buku
<img width="960" height="540" alt="Screenshot 2026-11-26 143242" src="https://github.com/user-attachments/assets/7e49c3ff-2cae-40d9-a360-625e1da3a483" />

2. Pencarian data
<img width="960" height="540" alt="Screenshot 2026-11-26 202919" src="https://github.com/user-attachments/assets/8b04f4ff-1a88-4b6b-8afb-9207277afeb3" />

3. Tambah Buku Baru
<img width="960" height="540" alt="Screenshot 2026-11-26 203216" src="https://github.com/user-attachments/assets/f3ba9b63-aa64-4a3a-a288-a92c82af5bc2" />

4. Tes Error ID Duplikat
<img width="960" height="540" alt="Screenshot 2026-11-26 203424" src="https://github.com/user-attachments/assets/81d4c52e-bdaf-4775-b918-b823ba974c63" />

5. Tes Error Format ID
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/ecda1956-95ef-47ad-b19d-fd5669765ab4" />

6. Edit Buku
<img width="960" height="540" alt="Screenshot 2026-11-26 203216" src="https://github.com/user-attachments/assets/83335577-a01f-4741-aa8b-1f41c5bf5149" />

7. Hapus Buku yang Belum Pernah Dipinjam
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/c208c56c-d1ab-4390-9558-84eeefa5ef8a" />

8. Tes Error Hapus Buku yang Memiliki Riwayat Pinjam
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/24328e53-f73f-4457-b8f5-805c41aaedfd" />

9. Filter Status
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/5ee75754-2268-4c6f-affb-3e404723068a" />

10. Filter Status
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/9e6e6c72-bb54-4f8f-acab-4f5d91df8f91" />

11. Catat Peminjaman Baru
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/ddd7d44d-0b33-4575-8cb8-512f53185aff" />
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/a48bcce3-7f74-4471-925d-70b88da40f63" />

12. Pengembalian Buku
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/4520dbde-96d3-4c34-9c12-963ccddb6659" />
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/98fca718-ee82-49da-a08b-d9d8a9ff9787" />

13. Pinjam Buku Sampai Stok Habis
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/c7933b86-cf50-4b2a-ae9b-b20c8985f209" />
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/adc70cea-89b2-4483-9e04-eb45013ac332" />

14. Hapus Transaksi yang Masih Dipinjam
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/0c3f0daf-8100-425e-a22f-ef6ea2514b15" />
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/23df1e06-4954-42a1-bb2b-94758275a6cf" />

## Database
Nama database: `db_perpustakaan`

Tabel yang digunakan:
- `buku`
- `anggota`
- `peminjaman`
<img width="960" height="540" alt="Screenshot 2026-11-26 124730" src="https://github.com/user-attachments/assets/f60cf10c-a4e7-4ae5-aa3b-dee8014c2b17" />


http://localhost/phpmyadmin/index.php?route=/database/structure&db=db_perpustakaan


