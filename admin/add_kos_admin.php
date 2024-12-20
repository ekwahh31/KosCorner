<?php
session_start();
include '../includes/db.php';
include '../includes/auth_admin.php';

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
            header("Location: admin-user.php");
            exit();
        } else {
            $_SESSION['error'] = "Gagal menambahkan kos. Silakan coba lagi.";
        }
    } else {
        $_SESSION['error'] = "Harap isi semua bidang.";
    }
    header("Location: add_kos_admin.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Kos Baru</title>
  <link rel="stylesheet" href="../style/add_kos.css">
</head>
<body>
  <div class="container">
    <h1>Tambah Kos Baru</h1>
    <form id="addKosForm" action="add_kos_admin.php" method="POST">
      <input
        type="text"
        name="KosTitle"
        placeholder="Nama Kos"
        required
        aria-label="Nama Kos"
      >
      <input
        type="text"
        name="KosPrice"
        placeholder="Harga Kos / bulan"
        required
        aria-label="Harga Kos / bulan"
      >
      <input
        type="text"
        name="KosLocation"
        placeholder="Lokasi Kos"
        required
        aria-label="Lokasi Kos"
      >
      <input
        type="text"
        name="KosImage"
        placeholder="URL Gambar Kos"
        required
        aria-label="URL Gambar Kos"
      >
      <input
        type="text"
        name="additional_image1"
        placeholder="URL Foto Tambahan 1"
        required
        aria-label="URL Foto Tambahan 1"
      >
      <input
        type="text"
        name="additional_image2"
        placeholder="URL Foto Tambahan 2"
        required
        aria-label="URL Foto Tambahan 2"
      >
      <input
        type="text"
        name="additional_image3"
        placeholder="URL Foto Tambahan 3"
        required
        aria-label="URL Foto Tambahan 3"
      >
      <textarea
        name="room_spec"
        placeholder="Spesifikasi Kamar"
        required
        aria-label="Spesifikasi Kamar"
      ></textarea>
      <textarea
        name="room_facilities"
        placeholder="Fasilitas Kamar"
        required
        aria-label="Fasilitas Kamar"
      ></textarea>
      <textarea
        name="bathroom_facilities"
        placeholder="Fasilitas Kamar Mandi"
        required
        aria-label="Fasilitas Kamar Mandi"
      ></textarea>
      <textarea
        name="general_facilities"
        placeholder="Fasilitas Umum"
        required
        aria-label="Fasilitas Umum"
        ></textarea>

  <div class="button-group">
    <button type="submit">Tambah Kos</button>
  </div>

    </form>
  </div>
</body>
</html>
