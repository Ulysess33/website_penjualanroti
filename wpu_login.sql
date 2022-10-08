-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2022 at 10:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_history`
--

CREATE TABLE `data_history` (
  `id_history` int(11) NOT NULL,
  `jenisroti` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl` date NOT NULL,
  `datapenjualan` int(128) NOT NULL,
  `datapersediaan` int(128) NOT NULL,
  `dataproduksi` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_history`
--

INSERT INTO `data_history` (`id_history`, `jenisroti`, `tgl`, `datapenjualan`, `datapersediaan`, `dataproduksi`) VALUES
(1, 'Roti Tawar', '2022-08-02', 5000, 4000, 2000),
(2, 'Roti Tawar', '2022-09-07', 1234, 1234, 1234),
(3, 'Roti Manis', '2022-09-07', 123124, 1231241, 123124),
(4, 'Roti Kasino', '2022-09-06', 1234, 1234, 1234),
(5, 'Roti Tawar', '2022-09-16', 1234, 124, 12532),
(6, 'Roti Sobek', '2022-09-16', 12341, 124124, 12412),
(7, 'Roti Manis', '2022-09-17', 21432254, 46456, 65365476);

-- --------------------------------------------------------

--
-- Table structure for table `data_roti`
--

CREATE TABLE `data_roti` (
  `id` int(12) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_roti`
--

INSERT INTO `data_roti` (`id`, `name`) VALUES
(6, 'Roti Manis1'),
(8, 'Roti Tawar'),
(10, 'Roti Kasino');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Yusuf Rakha Wijaya', 'yusufrakhaw@gmail.com', 'default.jpg', '$2y$10$rkkMQlIYkjm80zYUPuMa8u260kiTvBpvHdrIaWy55uOdC7EOIRb9q', 1, 1, 1661163606),
(6, 'Rafli Adhiradamar Saputra', 'adhiradamarsaputra240524@gmail.com', 'default.jpg', '$2y$10$8QxGQteznrNyTDKHB2qeLeL3.itqPZk7qCpNXClOtxs5HjRZCV31.', 2, 1, 1661275852);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 2, 2),
(5, 1, 3),
(6, 1, 5),
(7, 1, 6),
(8, 2, 6),
(9, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'History'),
(5, 'Prediksi'),
(6, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Member'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profile', 'user/index', 'fas fa-fw fa-user', 1),
(3, 3, 'Data Roti', 'menu/roti', 'fas fa-fw fa-solid fa-bread-slice', 1),
(5, 6, 'Informasi Prediksi', 'laporan', 'fas fa-fw fa-chart-area', 1),
(6, 3, 'Input Data', 'menu/input', 'fas fa-fw fa-box-open', 1),
(7, 4, 'Data History', 'history/datahistory', 'fas fa-fw fa-dollar-sign', 1),
(9, 5, 'Prediksi', 'prediksi', 'fas fa-fw fa-solid fa-forward', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_history`
--
ALTER TABLE `data_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `data_roti`
--
ALTER TABLE `data_roti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_history`
--
ALTER TABLE `data_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_roti`
--
ALTER TABLE `data_roti`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
