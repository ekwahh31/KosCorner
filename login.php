<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($email && !empty($password)) {
        // Simulasi verifikasi login (replace dengan database nyata)
        $dummy_email = 'user@example.com';
        $dummy_password = 'password123';

        if ($email === $dummy_email && $password === $dummy_password) {
            echo "<p>Login successful. Welcome, $email!</p>";
        } else {
            echo "<p>Invalid email or password. Please try again.</p>";
        }
    } else {
        echo "<p>Please fill in all fields correctly.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="login-container">
        <h1>LOGIN</h1>
        <form action="login_logic.php" method="POST">
            <label for="email">Email <span>(wajib)</span></label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <textarea id="password" name="password" required></textarea>

            <button type="button" onclick="window.location.href='register.php'">REGISTER</button>
            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>
