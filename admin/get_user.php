<?php
include '../includes/db.php';
include '../includes/auth_admin.php';

// Query untuk mengambil data pengguna dengan role 'user'
$sql = "SELECT id, nama, email, password FROM users WHERE role = 'user'";
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Return data sebagai JSON
header('Content-Type: application/json');
echo json_encode($users);
?>