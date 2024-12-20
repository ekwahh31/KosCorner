<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($name && $email && !empty($password)) {
        // Simulasi penyimpanan data registrasi (replace dengan database nyata)
        echo "<p>Registration successful! Welcome, $name.</p>";
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
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/registrasi.css">
    <script defer src="register.js"></script>
</head>
<body>
    <div class="login-container">
        <h1>REGISTER</h1>
        <form action="register_logic.php" method="POST" id="registerForm">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <textarea id="password" name="password" required></textarea>

            <button type="submit">REGISTER</button>
            <button type="button" onclick="window.location.href='login_page.html'">LOGIN</button>
        </form>
    </div>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    if (!name || !email || !password) {
        event.preventDefault(); // Prevent form submission
        alert('Please fill in all fields.');
    } else if (!validateEmail(email)) {
        event.preventDefault();
        alert('Please enter a valid email address.');
    }
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

    </script>
</body>
</html>
