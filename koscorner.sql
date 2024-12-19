CREATE TABLE kos_recommendations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_url VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    price VARCHAR(50) NOT NULL,
    link VARCHAR(255) NOT NULL
);

INSERT INTO kos_recommendations (image_url, title, price, link) VALUES
('https://static.mamikos.com/uploads/cache/data/style/2024-09-29/irwfW6Dv-540x720.jpg', 'KOST GAVIN TIPE AC PURWOKERTO SELATAN', 'Rp1.000.000 / bulan', 'kos4.php'),
('https://static.mamikos.com/uploads/cache/data/style/2024-07-28/w7fteL3e-540x720.jpg', 'Kost Pintu Biruku Purwokerto Timur Banyumas', 'Rp 1.400.000 / bulan', 'kos5.php'),
('https://static.mamikos.com/uploads/cache/data/style/2024-08-04/PsEegQeh.-540x720.jpg', 'Kost Griya Laras Ati Tipe Vip Purwokerto Timur', 'Rp 1.000.000 / bulan', 'kos6.php');

CREATE TABLE hero_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_url VARCHAR(255) NOT NULL,
    alt_text VARCHAR(255) NOT NULL
);

INSERT INTO hero_images (image_url, alt_text) VALUES
('https://storage.googleapis.com/storage-ajaib-prd-platform-wp-artifact/2020/10/Kos-kosan.jpg', 'Hero Image');
