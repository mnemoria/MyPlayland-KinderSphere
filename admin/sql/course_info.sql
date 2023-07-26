-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 10:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myplaylandsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `name` varchar(64) NOT NULL,
  `date_added` date NOT NULL,
  `status` enum('Active','Archive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`id`, `course_code`, `name`, `date_added`, `status`) VALUES
(1, 'M', 'Mathematics', '2023-07-02', 'Active'),
(2, 'SE ', 'Pagpapaunlad sa Kakayahang Sosyo-Emosyunal', '2023-07-19', 'Active'),
(3, 'KM', 'Pagpapaunlad sa Kakayahang Makipamuhay ', '2023-07-19', 'Active'),
(4, 'KA', 'Kagandahang Asal ', '2023-07-19', 'Active'),
(5, 'GMRC', 'Good Moral and Right Conduct', '2018-01-06', 'Archive'),
(6, 'KP', 'Kalusugang Pisikal at Pagpapaunlad ng Kakayahang Motor', '2023-07-08', 'Active'),
(7, 'S', 'Sining ', '2023-05-11', 'Active'),
(8, 'PNE', 'Understand Physical and Natural Environment', '2023-07-19', 'Active'),
(9, 'LL', 'Language, Literacy and Communication', '2023-07-19', 'Active'),
(10, 'MT', 'Mother Tongue', '2023-07-19', 'Archive'),
(11, 'PE', 'Physical Education', '2023-07-19', 'Archive'),
(12, 'MAPEH', 'Music, Arts, PE, Health', '2011-01-20', 'Archive'),
(13, 'F', 'Filipino', '2013-01-20', 'Archive'),
(14, 'E', 'English', '2016-07-20', 'Archive'),
(15, 'W1', 'Writing 1', '2020-09-16', 'Archive'),
(16, 'PB', 'Pagbibilang', '2023-07-20', 'Archive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_info`
--
ALTER TABLE `course_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
