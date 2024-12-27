-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 08:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(0, 'diohebat', '$2y$10$Z72fQY4oCQuWuPf2QecmD.gR52EmFcS8WuuoUlLkqYBq6fNfNIsuq');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_berita`
--

CREATE TABLE `daftar_berita` (
  `id_berita` int(11) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `judul_berita` varchar(200) NOT NULL,
  `isi_berita` text NOT NULL,
  `watching_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_berita`
--

INSERT INTO `daftar_berita` (`id_berita`, `image_path`, `judul_berita`, `isi_berita`, `watching_time`) VALUES
(3, 'assets/img/Balatro_cover.jpg', 'Balatro game kartu yang bertipe rogue-like', 'Game Balatro adalah permainan poker di gadget yang menawarkan pengalaman bermain poker yang realistis dan seru. Dengan grafik berkualitas, gameplay yang intuitif, serta komunitas pemain yang aktif, Balatro unggul sebagai salah satu game poker terbaik yang bisa kamu mainkan di ponsel. Dibandingkan dengan game poker di HP lainnya, Balatro lebih diminati berkat beberapa fitur inovatif.\r\n\r\nBalatro tak hanya fokus pada gameplay standar poker, tapi juga menghadirkan berbagai mode permainan yang bervariasi, termasuk turnamen besar yang bisa diikuti oleh pemain dari seluruh dunia. Dengan rating yang tinggi di berbagai platform, Game Balatro terus membuktikan popularitasnya sebagai game yang menonjol di antara rekomendasi game poker lainnya.', 5),
(4, 'assets/img/gambarmenu.jpg', 'Ultrakill', 'Ultrakill adalah gim tembak-menembak orang pertama yang serba cepat dengan penekanan pada gerakan dan teknik yang bergaya. Pemain harus melewati interpretasi lapisan-lapisan Neraka milik Dante , dengan tiga babak yang masing-masing terdiri dari tiga lapisan yang dibagi menjadi beberapa level .\r\n\r\nPemain melawan musuh menggunakan gudang senjata, memiliki serangan utama dan alternatif, dan berbagai lengan robot. Ini memiliki interaksi unik satu sama lain, menyerukan serangan kombinasi permainan seperti Devil May Cry . Banyak teknik lanjutan dalam permainan adalah hasil dari menggabungkan berbagai elemen gudang senjata pemain. Untuk mendorong gameplay agresif, pemain dapat menyembuhkan dengan menyerap darah musuh  melalui pertarungan jarak dekat atau melalui menangkis serangan musuh. Kinerja pemain dinilai oleh Style mete,mirip dengan permainan seperti Devil May Cry .Pengukur gaya memberi penghargaan kepada pemain untuk melakukan gerakan tingkat lanjut dan mencolok, serta mendorong manuver udara dan dengan cepat bertukar senjata.', 7);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b'),
('admin1', '12345'),
('admin123', '$2y$10$nqvtwBA.5TNZfojc5M1CYOBR4DWIWzSqpzRBbSV1s65pF8ECVdrwi'),
('admin123', '$2y$10$fsKvaUlkMwHXV5eH7c0Q4e8ThT4ff6OoOUpgnj6cmAYKNH8uBr9SG'),
('dioanjay', '$2y$10$0vuq2xRHbYCDswmGqJmtk.cA0umWfCoZKXAhwZahHW.T.NxE987mW'),
('dioanjay', '$2y$10$bxXkP652NtXX/cA/mlC2/uLEtPBseE2JgontVrggZmvQOa89XuZdq'),
('inidio', '$2y$10$.3w0NvzGjh8jseQAn8mlS.XC.9RdU3CiCk5HZdY7oMuMaS64rGX3m'),
('fandio', '$2y$10$hUW4.lyCLMDRWcuFxVAaVe7MIIKfF9D/kQ/HKSUY83Y71x0X4raIW'),
('dio123', '$2y$10$er62//I/VNOnPuZYWVECEuCUnt3HZ101mgEjeb2c.ZB9msTP5NYF6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_berita`
--
ALTER TABLE `daftar_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_berita`
--
ALTER TABLE `daftar_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
