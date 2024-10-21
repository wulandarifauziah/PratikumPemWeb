-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 12:46 AM
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
-- Database: `crud`
--
CREATE DATABASE IF NOT EXISTS `crud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud`;

-- --------------------------------------------------------

--
-- Table structure for table `join`
--

CREATE TABLE `join` (
  `ID_pelanggan` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `City` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `subscription_type` enum('General Museum News','Scientific Discoveries','Exhibitions & Events','') NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join`
--

INSERT INTO `join` (`ID_pelanggan`, `full_name`, `email`, `Age`, `City`, `state`, `country`, `subscription_type`, `password`, `photo`) VALUES
(86, 'PutraR', 'park85868@gmail.com', 23, 'Makassar', 'Sulawesi Selatan', 'Indonesia', '', 'putri123', './uploads/2024-10-16 00.41.08.jpg'),
(88, 'Wulandari', 'wlandari@gamil.com', 19, 'Samarinda', 'Kalimantan Timur', 'Indonesia', '', 'wulandari4567', './uploads/2024-10-16 00.28.47.png'),
(89, 'aisyah', 'park85868@gmail.com', 23, 'BALIKPAPAN', 'Kalimantan Timur', 'Indonesia', '', '1234567890', './uploads/2024-10-16 00.36.51.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `join`
--
ALTER TABLE `join`
  ADD PRIMARY KEY (`ID_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `join`
--
ALTER TABLE `join`
  MODIFY `ID_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
