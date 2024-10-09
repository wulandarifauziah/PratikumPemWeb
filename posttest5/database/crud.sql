-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 02:10 PM
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
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join`
--

INSERT INTO `join` (`ID_pelanggan`, `full_name`, `email`, `Age`, `City`, `state`, `country`, `subscription_type`, `password`) VALUES
(50, 'fsapi', 'bangzul2727@gmail.com', 12, 'samarinda', 'bandung', 'indonesia', '', 'qqqqqq'),
(51, ' Fauziah Wulandari', 'sitifauziah13005@gmail.com', 7, 'KOTA SAMARINDA', '6789876', 'indonesia', '', '67890');

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
  MODIFY `ID_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
