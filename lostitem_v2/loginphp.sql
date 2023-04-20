-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 10:42 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `img_upload`
--

CREATE TABLE `img_upload` (
  `id` int(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Img` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `phno`, `created_at`) VALUES
(2, 'db_vaecontech', '$2y$10$EnvJ8W6e/fdfwgcNRYeEfO1HEbncZciL3JqDSuBjyJadGU67G47oK', 'sai', 'sai@gmail.com', '9876543210', '2022-12-10'),
(3, 'danny', '$2y$10$r6Ss8Wl3MHHZoVXzfEvHhOkVgVmoFg94jZB47BAILWIpu1jPr5yty', 'Danny', 'danny@gmail.com', '123456789', '2022-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img_upload`
--
ALTER TABLE `img_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img_upload`
--
ALTER TABLE `img_upload`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
