<?php
include "connection.php";

// Variabel untuk menyimpan pesan
$message = "";

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul']);
    $penulis = trim($_POST['penulis']);
    $tahun = trim($_POST['tahun']);

    // Validasi input
    if (empty($judul) || empty($penulis) || empty($tahun)) {
        $message = "Lengkapi semua input!";
    } else {
        try {
            // Cek apakah buku sudah ada berdasarkan judul
            $cekQuery = $koneksi->prepare("SELECT * FROM buku WHERE judul = ?");
            $cekQuery->execute([$judul]);

            if ($cekQuery->rowCount() > 0) {
                $message = "Buku sudah pernah terdaftar.";
            } else {
                // Query untuk menambahkan data buku
                $query = $koneksi->prepare("INSERT INTO buku (judul, penulis, tahun) VALUES (?, ?, ?)");
                $query->execute([$judul, $penulis, $tahun]);

                $message = "Berhasil menambahkan buku ke daftar buku.";
            }
        } catch (PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-button {
            text-align: center;
            margin-top: 10px;
        }
        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .back-button a:hover {
            background-color: #5a6268;
        }
        .message {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .message.success {
            color: green;
        }
        .message.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Data Buku</h1>
        <form method="POST" action="">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" id="judul" required>

            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" required>

            <label for="tahun">Tahun Terbit</label>
            <input type="number" name="tahun" id="tahun" required>

            <button type="submit">Simpan</button>
        </form>

        <!-- Menampilkan pesan -->
        <?php if (!empty($message)): ?>
            <div class="message <?php echo ($message === "Berhasil menambahkan buku ke daftar buku.") ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="back-button">
            <a href="home.php">Kembali ke Home</a>
        </div>
    </div>
</body>
</html>
