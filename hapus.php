<?php
require "db.php";
$nim = trim($_GET["nim"] ?? "");

if ($nim === "") {
    header("Location: mahasiswa.php?error=input");
    exit;
}

$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE nim = ?");
$stmt->bind_param("s", $nim);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: mahasiswa.php?pesan=hapus");
} else {
    header("Location: mahasiswa.php");
}
exit;
?>
