<?php
include 'includes/auth_user.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Kos Baru</title>
  <link rel="stylesheet" href="style/add_kos.css">
</head>
<body>
  <div class="container">
    <h1>Tambah Kos Baru</h1>
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
    <form id="addKosForm" action="admin/process_add_kos.php" method="POST">
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
    <button onclick="window.location.href='includes/logout.php'" type="button">Log Out</button>
    <button type="submit">Tambah Kos</button>
  </div>

    </form>
  </div>
</body>
</html>