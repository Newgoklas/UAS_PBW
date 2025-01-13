<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'home.php';

    try {
        // Proses soft delete
        $query = $koneksi->prepare("UPDATE buku SET isdel = 1 WHERE id = ?");
        $query->execute([$id]);

        // Redirect dengan pesan sukses
        header("Location: $redirect?success=Buku berhasil dihapus.");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    // Redirect jika akses langsung
    header("Location: home.php");
    exit();
}
