-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 05:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koscorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `hero_images`
--

CREATE TABLE `hero_images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `alt_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero_images`
--

INSERT INTO `hero_images` (`id`, `image_url`, `alt_text`) VALUES
(1, 'https://storage.googleapis.com/storage-ajaib-prd-platform-wp-artifact/2020/10/Kos-kosan.jpg', 'Hero Image');

-- --------------------------------------------------------

--
-- Table structure for table `kos_recommendations`
--

CREATE TABLE `kos_recommendations` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `additional_image1` varchar(225) NOT NULL,
  `additional_image2` varchar(225) NOT NULL,
  `additional_image3` varchar(225) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `location` varchar(500) NOT NULL,
  `room_spec` text NOT NULL,
  `room_facilities` text NOT NULL,
  `bathroom_facilities` text NOT NULL,
  `general_facilities` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kos_recommendations`
--

INSERT INTO `kos_recommendations` (`id`, `image_url`, `additional_image1`, `additional_image2`, `additional_image3`, `title`, `price`, `location`, `room_spec`, `room_facilities`, `bathroom_facilities`, `general_facilities`) VALUES
(1, 'https://static.mamikos.com/uploads/cache/data/style/2024-09-29/uokVVQ1A-540x720.jpg', 'https://static.mamikos.com/uploads/cache/data/style/2024-09-29/arnQ8soL-540x720.jpg', 'https://static.mamikos.com/uploads/cache/data/style/2024-01-28/v03Z3eZX-540x720.jpg', 'https://static.mamikos.com/uploads/cache/data/style/2024-02-11/LRCozq9w.-540x720.jpg', 'KOST GAVIN TIPE AC PURWOKERTO SELATAN', 'Rp1.000.000 / bulan', 'Midtown Residence (Sanjaya Land) Blok A14, Karang Bawang, Grendeng, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53122, Indonesia', 'Ukuran: 3 x 4.5 meter,Tidak Termasuk Listrik', 'AC,Lemari Baju,Meja,Kursi,Lantai Keramik,Tempat Tidur,Cleaning Service,Guling,jendela', 'Shower,Kamar Mandi Dalam,Klosed Duduk,Shower', 'Wifi,Dapur,Balcon,Rak Jemuran,CCTV'),
(2, 'https://static.mamikos.com/uploads/cache/data/style/2024-07-28/w7fteL3e-540x720.jpg', '', '', '', 'Kost Pintu Biruku Purwokerto Timur Banyumas', 'Rp 1.400.000 / bulan', '', '', '', '', ''),
(3, 'https://static.mamikos.com/uploads/cache/data/style/2024-08-04/PsEegQeh.-540x720.jpg', '', '', '', 'Kost Griya Laras Ati Tipe Vip Purwokerto Timur', 'Rp 1.000.000 / bulan', 'Gg. Kebugaran No.88, Jatiwinangun, Purwokerto Lor, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53114, Indonesia .\r\n', 'Ukuran: 3 x 3 meter,Sudah Termasuk Listrik', 'Kipas Angin,Lemari Baju,Meja,Kursi,Bantal,TempatTidur,Ventilasi,Guling,Jendela', 'Shower,Kamar Mandi Dalam,Klosed Duduk,Wastafel', 'Wifi,Dapur,Balcon,Rak Jemuran,CCTV,Dispenser,Ruang Tamu,Kulkas,Laundry,Penjaga Kos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hero_images`
--
ALTER TABLE `hero_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kos_recommendations`
--
ALTER TABLE `kos_recommendations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hero_images`
--
ALTER TABLE `hero_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kos_recommendations`
--
ALTER TABLE `kos_recommendations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
