# Form Data Mahasiswa — Pemrograman Web 1

Aplikasi sederhana untuk menambahkan dan menampilkan data mahasiswa menggunakan HTML, CSS, PHP, dan MySQL.

## File
- `index.html`: form input data.
- `style.css`: desain website.
- `db.php`: koneksi ke database.
- `simpan.php`: proses menyimpan data.
- `mahasiswa.php`: menampilkan data mahasiswa.
- `hapus.php`: menghapus data mahasiswa.

## Menjalankan di Laragon
1. Jalankan Apache dan MySQL dari Laragon.
2. Salin folder project ke `C:\laragon\www\form_database_mahasiswa`.
3. Pastikan database `db_kampus` memiliki tabel `mahasiswa` dengan kolom `nim`, `nama`, `jurusan`, `semester`, dan `ipk`.
4. Buka `http://localhost/form_database_mahasiswa/`.
5. Klik “Lihat Data Mahasiswa” untuk melihat data dari MySQL.

Koneksi default Laragon: host `localhost`, user `root`, password kosong, database `db_kampus`.
