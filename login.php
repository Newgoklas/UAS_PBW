<?php
session_start();
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
    header("Location: home.php");
    exit;
}

// Tampilkan pesan sukses jika ada
$successMessage = isset($_GET['success']) ? htmlspecialchars($_GET['success']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1707926310424-f7b837508c40?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') 
            no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .card {
            background: rgba(255, 255, 255, 0.7); /* Semi-transparan putih */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px); /* Efek blur latar belakang */
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
}
</style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4">
            <h3 class="text-center mb-4">Login</h3>
            <?php if ($successMessage): ?>
                <div class="alert alert-success text-center"><?php echo $successMessage; ?></div>
            <?php endif; ?>
            <form action="aksilogin.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="text-center mt-3">
                <p>Belum punya akun? <a href="register.php" class="text-primary">Daftar di sini</a></p>
            </div>
        </div>
    </div>
</body>
</html>
