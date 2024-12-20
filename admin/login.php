<?php
session_start();
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

     // Menggunakan mysqli
    $stmt = $conn->prepare("SELECT * FROM users WHERE nama = ?");
    $stmt->bind_param('s', $nama);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if ($password === $user['password']) { // Bandingkan password langsung
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['nama'] = $user['nama']; 

            if ($user['role'] === 'admin') {
                header("Location: admin-user.php");
            } elseif ($user['role'] === 'user') {
                header("Location: ../add_kos.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Password salah.";
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan.";
    }
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        ?>
        <form method="POST" action="login.php">
        <label for="text">Nama <span>(wajib)</span></label>
            <input type="text" name="nama" placeholder="Nama" required>
        
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>
            
            <button type="button" onclick="window.location.href='register.php'">REGISTER</button>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
