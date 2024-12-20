<?php
session_start();
include '../includes/db.php';
include '../includes/auth_user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['KosTitle']);
    $price = trim($_POST['KosPrice']);
    $location = trim($_POST['KosLocation']);
    $image = trim($_POST['KosImage']);
    $additional_image1 = trim($_POST['additional_image1']);
    $additional_image2 = trim($_POST['additional_image2']);
    $additional_image3 = trim($_POST['additional_image3']);
    $room_spec = trim($_POST['room_spec']);
    $room_facilities = trim($_POST['room_facilities']);
    $bathroom_facilities = trim($_POST['bathroom_facilities']);
    $general_facilities = trim($_POST['general_facilities']);
    $id_user = $_SESSION['user_id'];

    if ($title && $price && $location && $image && $additional_image1 && $additional_image2 && $additional_image3 && $room_spec && $room_facilities && $bathroom_facilities && $general_facilities && $id_user) {
        $stmt = $conn->prepare("INSERT INTO kos_recommendations (id_user, title, price, location, image_url, additional_image1, additional_image2, additional_image3, room_spec, room_facilities, bathroom_facilities, general_facilities) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isssssssssss', $id_user, $title, $price, $location, $image, $additional_image1, $additional_image2, $additional_image3, $room_spec, $room_facilities, $bathroom_facilities, $general_facilities);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Kos berhasil ditambahkan.";
            header("Location: ../add_kos.php?success=1");
            exit();
        } else {
            $_SESSION['error'] = "Gagal menambahkan kos. Silakan coba lagi.";
            header("Location: ../add_kos.php?error=1");
            exit();
        }
    } else {
        $_SESSION['error'] = "Harap isi semua bidang.";
        header("Location: ../add_kos.php?error=1");
        exit();
    }
}
?>