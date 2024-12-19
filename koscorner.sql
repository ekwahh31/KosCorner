CREATE TABLE kos_recommendations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_url VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    price VARCHAR(50) NOT NULL,
    link VARCHAR(255) NOT NULL
);

INSERT INTO kos_recommendations (image_url, title, price, link) VALUES
('https://example.com/images/4.jpg', 'KOST GAVIN TIPE AC PURWOKERTO SELATAN', 'Rp1.000.000 / bulan', 'kos4.php'),
('https://example.com/images/5.jpg', 'Kost Pintu Biruku Purwokerto Timur Banyumas', 'Rp 1.400.000 / bulan', 'kos5.php'),
('https://example.com/images/6.jpg', 'Kost Griya Laras Ati Tipe Vip Purwokerto Timur', 'Rp 1.000.000 / bulan', 'kos6.php');
