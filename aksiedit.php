<?php
include "connection.php";
session_start();

if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header("Location: login.php");
    exit();
}

// Ambil data dari form
$id = $_POST['id'] ?? null;
$judul = $_POST['judul'] ?? null;
$penulis = $_POST['penulis'] ?? null;
$tahun = $_POST['tahun'] ?? null;

if (!$id || !$judul || !$penulis || !$tahun) {
    echo "<script>alert('Semua field harus diisi!');</script>";
    header("Location: edit.php?id=$id");
    exit();
}

try {
    // Update data buku
    $dbh = $koneksi->prepare("UPDATE buku SET judul = ?, penulis = ?, tahun = ?, updated_by = ?, updated_at = ? WHERE id = ?");
    $dbh->execute([
        $judul,
        $penulis,
        $tahun,
        $_SESSION['userid'],
        date("Y-m-d H:i:s"),
        $id,
    ]);
    echo "<script>alert('Data berhasil diperbarui!');</script>";
    header("Location: home.php");
    exit();
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
