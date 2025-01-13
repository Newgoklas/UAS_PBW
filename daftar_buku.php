<?php
include "connection.php";

try {
    // Query untuk mendapatkan semua data buku yang belum dihapus (isdel = 0)
    $query = $koneksi->query("SELECT * FROM buku WHERE isdel = 0 ORDER BY id ASC");
    $bukus = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Ambil pesan sukses dari query string
$successMessage = isset($_GET['success']) ? $_GET['success'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; }
        .container { max-width: 800px; margin: 20px auto; padding: 20px; background: #fff; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; color: #333; }
        .message { text-align: center; color: green; margin-bottom: 20px; }
        .table-container { overflow-x: auto; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { text-align: left; padding: 10px; border: 1px solid #ccc; }
        th { background-color: #007BFF; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .actions a { color: #007BFF; text-decoration: none; margin-right: 10px; }
        .actions a:hover { text-decoration: underline; }
        .add-book { text-align: center; margin: 20px 0; }
        .add-book a { padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px; }
        .add-book a:hover { background-color: #0056b3; }
        .back-home { text-align: center; margin: 20px 0; }
        .back-home a { padding: 10px 20px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 5px; }
        .back-home a:hover { background-color: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Buku</h1>

        <!-- Tampilkan pesan sukses jika ada -->
        <?php if ($successMessage): ?>
            <div class="message"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php endif; ?>

        <div class="add-book">
            <a href="input_buku.php">Tambah Buku</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($bukus)): ?>
                        <?php foreach ($bukus as $index => $buku): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars($buku['judul']); ?></td>
                                <td><?php echo htmlspecialchars($buku['penulis']); ?></td>
                                <td><?php echo htmlspecialchars($buku['tahun']); ?></td>
                                <td class="actions">
                                    <a href="edit.php?id=<?php echo $buku['id']; ?>&redirect=daftar_buku.php">Edit</a>
                                    <a href="delete.php?id=<?php echo $buku['id']; ?>&redirect=daftar_buku.php" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">Tidak ada data buku.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="back-home">
            <a href="home.php">Kembali ke Home</a>
        </div>
    </div>
</body>
</html>
