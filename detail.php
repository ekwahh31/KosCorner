<?php
// Database connection
include'includes/db.php';

// Get kos ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query to get kos details
$sql_detail = "SELECT * FROM kos_recommendations WHERE id = ?";
$stmt = $conn->prepare($sql_detail);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$kos = $result->fetch_assoc();

if (!$kos) {
    die("Kos tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KosCorner</title>
    <link rel="stylesheet" href="kos.css">
</head>
<body>
<header>
        <h1>KOSCORNER</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="#">Rekomendasi Kos</a>
            <a href="#">Tentang Kami</a>
        </nav>
    </header>

    <div class="container">
        <h1><?php echo $kos['title']; ?></h1>
        <h2><?php echo $kos['price']; ?></h2>
        <p>Lokasi : <?php echo $kos['location']; ?></p>

        <div class="images">
            <img src="<?php echo $kos['image_url']; ?>" alt="Kamar" class="main-image">
            <div class="additional-images">
                <img src="<?php echo $kos['additional_image1']; ?>" alt="Kamar Mandi">
                <img src="<?php echo $kos['additional_image2']; ?>" alt="Gerbang Kost">
                <img src="<?php echo $kos['additional_image3']; ?>" alt="Jalan Menuju Kost">
            </div>
        </div>

        <h3>Spesifikasi Tipe Kamar</h3>
        <ul>
            <?php foreach (explode(",", $kos['room_spec']) as $spec): ?>
                <li><?php echo trim($spec); ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Fasilitas Kamar</h3>
        <ul>
            <?php foreach (explode(",", $kos['room_facilities']) as $facility): ?>
                <li><?php echo trim($facility); ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Fasilitas Kamar Mandi</h3>
        <ul>
            <?php foreach (explode(",", $kos['bathroom_facilities']) as $facility): ?>
                <li><?php echo trim($facility); ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Fasilitas Umum</h3>
        <ul>
            <?php foreach (explode(",", $kos['general_facilities']) as $facility): ?>
                <li><?php echo trim($facility); ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Tinggalkan Balasan</h3>
        <form action="submit_comment.php" method="post" class="comment-form">
            <textarea name="comment" rows="5" placeholder="Tulis komentar Anda di sini..." required></textarea>
            <input type="hidden" name="kos_id" value="<?php echo $kos['id']; ?>">
            <button type="submit">Kirim Komentar</button>
        </form>

        <div class="comments">
            <h4>Ulasan:</h4>
            <p>Belum ada ulasan.</p>
        </div>
    </div>
</body>
</html>