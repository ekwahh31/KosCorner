<?php
include 'includes/db.php';
// Query untuk hero image
$sql_hero = "SELECT * FROM hero_images LIMIT 1";
$result_hero = $conn->query($sql_hero);
$hero = $result_hero->fetch_assoc();
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
            <a href="about.html">Tentang Kami</a>
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
        <h2>Rekomendasi Kos</h2>
        <div id="kosList" class="cards">
            <!-- Data kos akan dimuat di sini oleh JavaScript -->
        </div>
    </section>
    
    <div class="philosophy-container">
    <div class="philosophy-box">
        <div class="philosophy-text">
            <h2>Our Philosophy</h2>
            <p>
                Di <strong>KosCorner</strong>, kami percaya bahwa tempat tinggal bukan sekadar ruang untuk tidur, tetapi fondasi bagi seseorang untuk bermimpi, tumbuh, dan mencapai potensi terbaiknya. Kami memahami bahwa kenyamanan, lokasi yang strategis, dan lingkungan yang mendukung dapat membuat perbedaan besar dalam kehidupan sehari-hari.
            </p>
        </div>
        <div class="philosophy-image">
            <img src="path/to/your/image.png" alt="Kos Kosan Illustration">
        </div>
    </div>
</div>




<footer>
    <h2>Our Philosophy</h2>
        <div class="philosophy-content">
            <p>" Di KosCorner, kami percaya tempat tinggal nyaman mendukung kehidupan terbaik Anda. "</p>
        </div>
        <p>&copy; 2024 KosCorner. All rights reserved.</p>
    </footer>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const kosList = document.getElementById("kosList");

            // Fungsi untuk menampilkan daftar kos
            function displayKos(kosArray) {
                kosList.innerHTML = "";
                if (kosArray.length === 0) {
                    kosList.innerHTML = "<p>Tidak ada kos ditemukan.</p>";
                    return;
                }
                kosArray.forEach(kos => {
                    const kosCard = document.createElement("div");
                    kosCard.classList.add("card");
                    kosCard.innerHTML = `
                        <img src="${kos.image_url}" alt="${kos.title}">
                        <h3>${kos.title}</h3>
                        <p>${kos.price}</p>
                    `;
                    const kosLink = document.createElement("a");
                    kosLink.href = `detail.php?id=${kos.id}`;
                    kosLink.textContent = "Lihat Detail";
                    kosCard.appendChild(kosLink);
                    kosList.appendChild(kosCard);
                });
            }

            // Fungsi untuk mengambil data kos
            function fetchKos() {
                kosList.innerHTML = "<p>Loading data kos...</p>";
                fetch("fetch_kos.php")
                    .then(response => response.json())
                    .then(data => displayKos(data))
                    .catch(error => {
                        console.error("Error fetching kos:", error);
                        kosList.innerHTML = "<p>Gagal memuat data kos. Silakan coba lagi.</p>";
                    });
            }

            // Panggil data kos saat halaman dimuat
            fetchKos();
        });
    </script>
</body>
</html>
