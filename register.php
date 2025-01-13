<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Hash password

    try {
        // Periksa apakah email sudah terdaftar
        $checkQuery = $koneksi->prepare("SELECT * FROM users WHERE email = :email");
        $checkQuery->bindParam(':email', $email, PDO::PARAM_STR);
        $checkQuery->execute();

        if ($checkQuery->rowCount() > 0) {
            $errorMessage = "Email sudah terdaftar.";
        } else {
            // Masukkan data ke tabel users
            $query = $koneksi->prepare("INSERT INTO users (username, email, password, active) VALUES (:username, :email, :password, 1)");
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->execute();

            // Redirect ke halaman login dengan pesan sukses
            header("Location: login.php?success=Registrasi berhasil, silakan login.");
            exit;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 400px;">
            <h3 class="text-center mb-4">Daftar</h3>
            <?php if (isset($errorMessage)): ?>
                <div class="alert alert-danger text-center"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
            <form method="POST" action="register.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>
            <div class="text-center mt-3">
                <p>Sudah punya akun? <a href="login.php" class="text-primary">Login di sini</a></p>
            </div>
        </div>
    </div>
</body>
</html>
