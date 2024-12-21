-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 07:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpc3`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `merek`, `tipe`, `harga`, `deskripsi`) VALUES
(1, '101', 'Zotac', 'VGA', 6.60, 'vga mahal cuy'),
(3, '102', 'AMD', 'CPU', 4.50, 'vga bagus'),
(5, '103', 'Asrock', 'MOTHERBOARD', 3.50, 'mobo murah kualitas bagus di budget nya'),
(7, '104', 'MSI', 'MOTHERBOARD', 4.40, 'mahal cuy'),
(8, '105', 'ZOTAC', 'VGA', 5.50, 'ZOTAC GTX 1660Ti White edition'),
(9, '106', 'Asrock', 'PSU', 2.50, 'kurang bagus produk psu nya'),
(10, '107', 'AMD', 'CPU', 4.50, 'AMD Ryzen 5 5600G 4.5 Ghz');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama_lengkap`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'radit', 'radit@gmail.com', '$2y$10$zOp8LvP6fFLzJmYszkk2qujXdQ35fvI6ApyXsy6G6cXeM6oC1qigO', 'user', '2024-12-06 01:44:03', '2024-12-06 01:44:03'),
(2, 'admin', 'admin@gmail.com', '$2y$10$YhD4vB5rUVdGkfQQndC3Yur1feVfazfnT7Hm67TxmSlU25uPifuf6', 'admin', '2024-12-06 01:44:20', '2024-12-06 01:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id` int(11) NOT NULL,
  `namatipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id`, `namatipe`) VALUES
(1, 'VGA'),
(2, 'RAM'),
(3, 'CPU'),
(4, 'SSD'),
(5, 'MOTHERBOARD'),
(6, 'PSU'),
(7, 'COOLER'),
(8, 'CASE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
