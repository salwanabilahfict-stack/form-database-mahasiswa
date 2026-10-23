<?php
require "db.php";
$result = $conn->query("SELECT nim, nama, jurusan, semester, ipk FROM mahasiswa ORDER BY nim ASC");
$pesan = $_GET["pesan"] ?? "";
$error = $_GET["error"] ?? "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="topbar"><div class="brand">Kampus<span>Data</span></div><div class="top-note">Pemrograman Web 1</div></header>
<main class="container">
  <section class="page-heading">
    <div><p class="eyebrow">DATA AKADEMIK</p><h1>Daftar Mahasiswa</h1><p class="subtitle">Data mahasiswa yang tersimpan di database.</p></div>
    <a href="index.html" class="btn btn-light">Kembali ke Form</a>
  </section>
  <?php if ($pesan === "berhasil"): ?>
    <div class="message success">Data mahasiswa berhasil disimpan.</div>
  <?php elseif ($pesan === "hapus"): ?>
    <div class="message success">Data mahasiswa berhasil dihapus.</div>
  <?php elseif ($error === "nim"): ?>
    <div class="message error">NIM sudah digunakan. Silakan pakai NIM yang berbeda.</div>
  <?php elseif ($error === "input"): ?>
    <div class="message error">Data belum valid. Periksa kembali isian form.</div>
  <?php endif; ?>
  <section class="table-card">
    <div class="section-heading"><div><h2>Data Mahasiswa</h2><p>Jumlah data: <?php echo $result ? $result->num_rows : 0; ?> mahasiswa</p></div><span class="status-pill">Terhubung ke MySQL</span></div>
    <div class="data-table-wrap">
      <table>
        <thead><tr><th>NIM</th><th>Nama</th><th>Jurusan</th><th>Semester</th><th>IPK</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row["nim"]); ?></td>
            <td><?php echo htmlspecialchars($row["nama"]); ?></td>
            <td><?php echo htmlspecialchars($row["jurusan"]); ?></td>
            <td><?php echo (int)$row["semester"]; ?></td>
            <td><?php echo number_format((float)$row["ipk"], 2); ?></td>
            <td><a class="action-link delete" href="hapus.php?nim=<?php echo urlencode($row["nim"]); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a></td>
          </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="6">Belum ada data mahasiswa.</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </section>
  <footer class="footer"><span>Tugas Pemrograman Web 1</span><span>Form Data Mahasiswa</span></footer>
</main>
</body>
</html>
