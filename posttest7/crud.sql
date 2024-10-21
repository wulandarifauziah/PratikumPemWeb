-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 03:26 PM
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
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join`
--

INSERT INTO `join` (`ID_pelanggan`, `full_name`, `email`, `Age`, `City`, `state`, `country`, `subscription_type`, `password`, `photo`) VALUES
(114, 'Muhammad Zulkifli', 'mzulkifli1327@gmail.com', 20, 'Samarinda', 'Sulawesi Selatan', 'Indonesia', '', '$2y$10$vuzKvWCuj/K1BrKa6XGsPeJS98AW099uJHnVIa97azocIjWxnccsG', './uploads/2024-10-21 10.41.44.jpg'),
(116, 'Wulandari Fauziah', 'wulandarif@gmail.com', 19, 'Samarinda', 'kalimatan timur', 'Indonesia', '', '$2y$10$ZZPt/f3Ev1mLP881HAQQx.u/p2fUHpKGoNTXTECtPq8vLPLqvjFh.', './uploads/2024-10-21 15.23.47.png');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `description`, `image`) VALUES
(1, 'Individual tickets for the Museum', 'Ticket and time slot booking granting access to the permanent collections and the temporary exhibitions!..', 'monalisa.jpg'),
(2, 'Individual tickets for the exhibition Hall Napoléon', 'Figures of the Fool - From the Middle Ages to the Romantics (16 October 2024 - 3 February 2025). This ticket is also valid for admission to the museum\'s permanent collections.', 'figur.png'),
(3, 'Torlonia Collection', 'Masterpieces from the Torlonia Collection (26 June - 11 November 2024). This ticket is also valid for admission to the museum\'s permanent collections.', 'tronolia.png'),
(4, 'Paris Museum Pass', 'Compulsory time slot booking', 'paris.png'),
(5, 'Audio Guide', 'Permanent collections of the Musée du Louvre', 'audiog.png'),
(6, 'Guided Tours', 'Cultural activities with speaker or museum guide.', 'tours.png'),
(7, 'Individual tickets for the exhibition', 'A New Look at Watteau – An Actor With No Lines: Pierrot, known as Gilles.\r\n16 October 2024–3 February 2025 \r\nSully wing, Level 1, Salle de la Chapelle\r\nThis ticket is also valid for admission to the museum\'s permanent collections', 'Individual_tickets.png'),
(9, 'Group tickets for exhibtion', 'Figures of the Fool - From the Middle Ages to the Romantics\r\n16 October 2024 - 3 February 2025 | Hall Napoléon\r\nGroups with their own guide.', 'figur.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(12, 'wulandari', 'yuuhabah@gmail.com', '$2y$10$hXl..wtlRqe6.7plqMkyvOlImOF.cIMoK9kHLJG760MJwiRsPRjLC', 'user'),
(13, 'muzul', 'bangzul2727@gmail.com', '$2y$10$UD8vC4qy52V3Fxqg/x0iNO2rLAbs8979UL5x6eNrWVfmDmF45CtVC', 'admin'),
(14, 'Fauziah', 'fauziah@gmail.com', '$2y$10$BtViHKLCJ97ReysgY9CjXO4E1/MlghXxkp.1AncULN9PdVEY4Gb/y', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `join`
--
ALTER TABLE `join`
  ADD PRIMARY KEY (`ID_pelanggan`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `join`
--
ALTER TABLE `join`
  MODIFY `ID_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
