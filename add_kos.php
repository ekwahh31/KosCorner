<?php
include 'includes/auth_user.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Kos Baru</title>
  <link rel="stylesheet" href="style/add_kos.css">
  <style>
    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
      display: none;
    }
    .alert-success {
      color: #3c763d;
      background-color: #dff0d8;
      border-color: #d6e9c6;
    }
    .alert-error {
      color: #a94442;
      background-color: #f2dede;
      border-color: #ebccd1;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Tambah Kos Baru</h1>
    <div id="alertBox" class="alert"></div>
    <?php
    if (isset($_SESSION['error'])) {
        echo '<script>showAlert("' . $_SESSION['error'] . '", "alert-error");</script>';
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo '<script>showAlert("' . $_SESSION['success'] . '", "alert-success");</script>';
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
  <script>
    function showAlert(message, type) {
        const alertBox = document.getElementById('alertBox');
        alertBox.textContent = message;
        alertBox.className = 'alert ' + type;
        alertBox.style.display = 'block';

        // Set timeout to hide the alert after 3 seconds (3000 ms)
        setTimeout(() => {
            alertBox.style.display = 'none';
            if (type === 'alert-success') {
                window.location.href = 'index.php';
            }
        }, 3000);
    }

    // Check for query parameters and show alerts accordingly
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        showAlert('Kos berhasil ditambahkan.', 'alert-success');
    } else if (urlParams.has('error')) {
        showAlert('Gagal menambahkan kos. Silakan coba lagi.', 'alert-error');
    }
  </script>
</body>
</html>