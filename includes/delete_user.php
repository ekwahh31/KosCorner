<?php
session_start();
include 'db.php';
include 'auth_admin.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Pengguna berhasil dihapus.";
    } else {
        $_SESSION['error'] = "Gagal menghapus pengguna. Silakan coba lagi.";
    }
} else {
    $_SESSION['error'] = "ID pengguna tidak ditemukan.";
}
header("Location: ../admin/admin-user.php");
exit();
?>