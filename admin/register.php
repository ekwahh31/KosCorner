<?php
session_start();
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($name && $email && !empty($password)) {
        $stmt = $conn->prepare("INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, 'user')");
        $stmt->bind_param('sss', $name, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['error'] = "Registration failed. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Please fill in all fields correctly.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../style/registrasi.css">
</head>
<body>
    <div class="login-container">
        <h1>REGISTER</h1>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<p style="color:green;">' . $_SESSION['success'] . '</p>';
            unset($_SESSION['success']);
        }
        ?>
        <form action="register.php" method="POST" id="registerForm">
            <label for="name">Nama <span>(wajib)</span></label>
            <input type="text" name="name" placeholder="Nama" required>
            
            <label for="email">Email <span>(wajib)</span></label>
            <input type="email" name="email" placeholder="Email" required>
            
            <label for="password">Password <span>(wajib)</span></label>
            <input type="password" name="password" placeholder="Password" required>
            
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>