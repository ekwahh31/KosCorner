<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koscorner";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk hero image
$sql_hero = "SELECT * FROM hero_images LIMIT 1";
$result_hero = $conn->query($sql_hero);
$hero = $result_hero->fetch_assoc();

// Query untuk recommendations
$sql_recommendations = "SELECT * FROM kos_recommendations";
$result_recommendations = $conn->query($sql_recommendations);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KosCorner</title>
    <link rel="stylesheet" href="styles.css">
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

    <section class="hero">
        <?php if ($hero): ?>
            <img src="<?php echo $hero['image_url']; ?>" alt="<?php echo $hero['alt_text']; ?>">
        <?php else: ?>
            <img src="default-hero.jpg" alt="Default Hero Image">
        <?php endif; ?>
    </section>

    <section class="recommendations">
        <h2>Rekomendasi</h2>
        <div class="cards">
            <?php if ($result_recommendations->num_rows > 0): ?>
                <?php while($row = $result_recommendations->fetch_assoc()): ?>
                    <div class="card">
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['title']; ?>">
                        <h3><?php echo $row['title']; ?></h3>
                        <p><?php echo $row['price']; ?></p>
                        <a href="<?php echo $row['link']; ?>"><button>Lihat Detail</button></a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Tidak ada data kos tersedia.</p>
            <?php endif; ?>
        </div>
        <button>Lihat Semua</button>
    </section>

    <section class="philosophy">
    <h3>Kos Lainnya</h3>
        <div class="footer-gallery">
            <img src="images/gallery1.jpg" alt="Gallery 1">
            <img src="images/gallery2.jpg" alt="Gallery 2">
            <img src="images/gallery3.jpg" alt="Gallery 3">
        </div>
    </section>

    <footer>
    <h2>Our Philosophy</h2>
        <div class="philosophy-content">
            <p>"Di KosCorner, kami percaya tempat tinggal nyaman mendukung kehidupan terbaik Anda."</p>
            <img src="images/logo.png" alt="Logo Philosophy">
        </div>
        <p>&copy; 2024 KosCorner. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
