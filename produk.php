<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KosCorner - Rekomendasi Kos</title>
    <link rel="stylesheet" href="style/produk.css">
</head>
<body>
    <header>
        <h1>KOSCORNER</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="produk.php">Rekomendasi Kos</a>
            <a href="about.html">Tentang Kami</a>
            <a href="add_kos.php" class="login-button">Tambahkan Kos</a>
        </nav>
    </header>
    <section class="recommendation-section">
        <h2 class="section-title">REKOMENDASI LAINNYA</h2>
        <div class="recommendation-container" id="produkList">
            <!-- Data kos akan dimuat di sini oleh JavaScript -->
        </div>
    </section>
    <footer>
        <p>&copy; 2024 KosCorner. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const produkList = document.getElementById("produkList");

            // Fungsi untuk menampilkan daftar kos
            function displayProduk(kosArray) {
                produkList.innerHTML = "";
                if (kosArray.length === 0) {
                    produkList.innerHTML = "<p>Tidak ada kos ditemukan.</p>";
                    return;
                }
                kosArray.forEach(kos => {
                    const produkItem = document.createElement("div");
                    produkItem.classList.add("recommendation-item");
                    produkItem.innerHTML = `
                    <a href="detail.php?id=${kos.id}">
                        <img src="${kos.image_url}" alt="${kos.title}">
                        <h3>${kos.title}</h3>
                        <p>${kos.price}</p>
                    </a>
                    `;
                    produkList.appendChild(produkItem);
                });
            }

            // Fungsi untuk mengambil data kos
            function fetchProduk() {
                produkList.innerHTML = "<p>Loading data kos...</p>";
                fetch("admin/fetch_produk.php")
                    .then(response => response.json())
                    .then(data => displayProduk(data))
                    .catch(error => {
                        console.error("Error fetching produk:", error);
                        produkList.innerHTML = "<p>Gagal memuat data kos. Silakan coba lagi.</p>";
                    });
            }

            // Panggil data kos saat halaman dimuat
            fetchProduk();
        });
    </script>
</body>
</html>