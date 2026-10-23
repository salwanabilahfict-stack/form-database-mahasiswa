<?php
require "db.php";

$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$jurusan = trim($_POST["jurusan"] ?? "");
$semester = filter_var($_POST["semester"] ?? null, FILTER_VALIDATE_INT);
$ipk = filter_var($_POST["ipk"] ?? null, FILTER_VALIDATE_FLOAT);

if ($nim === "" || $nama === "" || $jurusan === "" ||
    $semester === false || $semester < 1 || $semester > 8 ||
    $ipk === false || $ipk < 0 || $ipk > 4) {
    header("Location: mahasiswa.php?error=input");
    exit;
}

$stmt = $conn->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, semester, ipk) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssid", $nim, $nama, $jurusan, $semester, $ipk);

if ($stmt->execute()) {
    header("Location: mahasiswa.php?pesan=berhasil");
    exit;
}

if ($conn->errno === 1062) {
    header("Location: mahasiswa.php?error=nim");
    exit;
}

http_response_code(500);
echo "Data gagal disimpan. Periksa struktur tabel dan koneksi database.";
?>
