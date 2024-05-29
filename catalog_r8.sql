-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 09:38 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog_r8`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `license` mediumtext NOT NULL,
  `dimension` varchar(40) NOT NULL,
  `format` varchar(40) NOT NULL,
  `active` tinyint(1) NOT NULL COMMENT '1 active, 0 not active',
  `image` varchar(75) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `visitors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `license`, `dimension`, `format`, `active`, `image`, `tag_id`, `date`, `visitors`) VALUES
(1, 'ROSY', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution.', '1024x1024', 'jpg', 1, 'd635ecf16a94b750f893de2cbc9a0674.jpeg', 2, '2024-02-19', 0),
(3, 'TURTLE', 'Free for both personal and commercial use. No need to pay anything. No need to make any\r\n                        attribution.', '360x360', 'JPEG', 1, '2fd69055135a9ec9daa652ad877820a5.jpeg', 36, '2023-06-29', 0),
(4, 'MORNNING', 'Free for both personal and commercial use. No need to pay anything. No need to make any\n                        attribution.', '480x480', 'PNG', 1, '8ad547613ddf12f76e0a2af72dc4a796.jpeg', 7, '2024-02-07', 0),
(6, 'PEACE', 'License', '1024x1024', 'PNG', 1, '0028386f50b65ab9b2259df00157a544.jpeg', 9, '2024-06-03', 5),
(7, 'PLANTS', 'License', '1024x1024', 'PNG', 1, 'e57e9bc16e26152a7478ed428a4df097.jpeg', 21, '2024-01-04', 0),
(8, 'SEA', 'Free sea for both personal and commercial use. No need to pay anything. No need to make any attribution.', '1092x1063', 'JPEG', 1, '067534d91c4bc115a17b0b378095595f.jpeg', 24, '2023-10-15', 0),
(9, 'CLOCKS', 'Clock License ', '1092x1063', 'jpg', 1, '6d5c5a058a37c4caf029d8a0b7dadf92.jpeg', 19, '2024-02-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`) VALUES
(32, 'ABSTRACT'),
(8, 'ANIMALS'),
(7, 'BUS'),
(19, 'CLOCKES'),
(23, 'FLOWERS'),
(29, 'HANGERS'),
(9, 'MORNNIG'),
(31, 'NEW YORK'),
(30, 'PERFUMES'),
(2, 'PINKY'),
(21, 'PLANTS'),
(35, 'PURPLE'),
(46, 'RIVER'),
(34, 'ROCKI'),
(22, 'ROSY'),
(24, 'SEA'),
(36, 'TURTLE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL COMMENT '1 active, 0 not active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `created_at`, `active`) VALUES
(1, 'Mona Ahmed', 'mona120', 'mona@gmail.com', '$2y$10$z9p/G2p5WCU4EM.thN8ke.wSzmTovxsoqv1BXEp5ycU7X/K/3r3ki', '2024-02-18 22:15:54', 1),
(4, 'esraa ali', 'esraa2020', 'esraa@gmail.com', '$2y$10$CXB.HM2GAGuyKZ4s.K1LU.EKexyLX.7cJutRCJYJ1zcVGX0WOBdVe', '2024-02-19 03:53:39', 1),
(5, 'Doaa Ahmed', 'doaa14', 'doaa@gmail.com', '$2y$10$LhdzH46cwzYcEp9.1pa3oeq9w3QVd1szKLdIT3vh4KV4pid/DCQby', '2024-02-19 21:02:10', 0),
(6, 'Filiz kassem', 'filiz12', 'filiz@gmail.com', '$2y$10$2yaY6FVNszYhU9KvaSrkcOPlPPzSDNULtrLk4QzbyLPpynsWz/Nwa', '2024-02-19 21:05:54', 1),
(7, 'Osama mohamed', 'osama13', 'osama@gmail.com', '$2y$10$PnWpbCeueG5gWmeLVkivIugs.5C00plzBm2lUhjxymIbLd3EO/BU6', '2024-02-19 21:58:46', 0),
(8, 'Ahmed gamal', 'ahmed15', 'ahmed@gmail.com', '$2y$10$U5Hi5VhpHn9jna8X6TgPjeGOs0vxcvQsJrMq.nZ//5eqqD17mTKgi', '2024-02-19 22:02:12', 0),
(9, 'Moaz yassin', 'moaz2016', 'moaz@gmail.com', '$2y$10$SZXoRT1J67D/raVM.mxK5u8hTyFG0uHQZgL8EehDz/9i8loOhUx7S', '2024-02-20 00:09:00', 1),
(10, 'Koussay Mohamed', 'koussay2017', 'koussay@gmail.com', '$2y$10$iO7YeVhnKMzH2hN0GR60p.GK3KvjulgLv2qeehCGVOQlE00gNqEFm', '2024-02-22 20:33:35', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
