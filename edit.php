<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Ambil data buku berdasarkan ID
        $query = $koneksi->prepare("SELECT * FROM buku WHERE id = :id AND isdel = 0");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $buku = $query->fetch(PDO::FETCH_ASSOC);

        // Jika buku tidak ditemukan
        if (!$buku) {
            die("Buku tidak ditemukan atau telah dihapus.");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Update data buku jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $tahun = $_POST['tahun'];

        try {
            $updateQuery = $koneksi->prepare(
                "UPDATE buku SET judul = :judul, penulis = :penulis, tahun = :tahun WHERE id = :id"
            );
            $updateQuery->bindParam(':judul', $judul, PDO::PARAM_STR);
            $updateQuery->bindParam(':penulis', $penulis, PDO::PARAM_STR);
            $updateQuery->bindParam(':tahun', $tahun, PDO::PARAM_INT);
            $updateQuery->bindParam(':id', $id, PDO::PARAM_INT);
            $updateQuery->execute();

            // Redirect ke halaman daftar_buku.php dengan pesan sukses
            header("Location: daftar_buku.php?success=Data buku berhasil diperbarui");
            exit;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
} else {
    die("ID buku tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 0; }
        .container { max-width: 500px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; }
        form { display: flex; flex-direction: column; }
        label { margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .back { margin-top: 15px; text-align: center; }
        .back a { text-decoration: none; color: #007BFF; }
        .back a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Buku</h1>
        <form method="POST">
            <label for="judul">Judul Buku:</label>
            <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($buku['judul']); ?>" required>

            <label for="penulis">Penulis:</label>
            <input type="text" id="penulis" name="penulis" value="<?php echo htmlspecialchars($buku['penulis']); ?>" required>

            <label for="tahun">Tahun Terbit:</label>
            <input type="number" id="tahun" name="tahun" value="<?php echo htmlspecialchars($buku['tahun']); ?>" required>

            <button type="submit">Simpan Perubahan</button>
        </form>
        <div class="back">
            <a href="daftar_buku.php">Kembali ke Daftar Buku</a>
        </div>
    </div>
</body>
</html>
