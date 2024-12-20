<?php
session_start();
include '../includes/db.php';
include '../includes/auth_admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($nama && $email) {
        if (!empty($password)) {
            // Update nama, email, dan password
            $stmt = $conn->prepare("UPDATE users SET nama = ?, email = ?, password = ? WHERE id = ?");
            $stmt->bind_param('sssi', $nama, $email, $password, $id);
        } else {
            // Update hanya nama dan email
            $stmt = $conn->prepare("UPDATE users SET nama = ?, email = ? WHERE id = ?");
            $stmt->bind_param('ssi', $nama, $email, $id);
        }

        if ($stmt->execute()) {
            $_SESSION['success'] = "Pengguna berhasil diperbarui.";
        } else {
            $_SESSION['error'] = "Gagal memperbarui pengguna. Silakan coba lagi.";
        }
    } else {
        $_SESSION['error'] = "Harap isi semua bidang.";
    }
    header("Location: admin-user.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
} else {
    header("Location: admin-user.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../style/edit_user.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
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
        <form action="edit_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            <label for="password">Password (kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>