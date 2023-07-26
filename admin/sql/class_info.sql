-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 09:09 AM
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
-- Table structure for table `class_info`
--

CREATE TABLE `class_info` (
  `id` int(11) NOT NULL,
  `class_level` enum('Nursery','Kindergarten 1','Kindergarten 2') NOT NULL,
  `class_name` varchar(64) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `status` enum('Active','Archive') NOT NULL,
  `level_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_info`
--

INSERT INTO `class_info` (`id`, `class_level`, `class_name`, `teacher_id`, `status`, `level_code`) VALUES
(1, 'Nursery', 'Love', 4, 'Active', 1),
(2, 'Kindergarten 1', 'Patience', 5, 'Active', 2),
(3, 'Kindergarten 2', 'Faith', 6, 'Active', 3),
(16, 'Kindergarten 2', 'Integrity', 8, 'Archive', 3),
(17, 'Nursery', 'Care', 10, 'Active', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_info`
--
ALTER TABLE `class_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_info`
--
ALTER TABLE `class_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_info`
--
ALTER TABLE `class_info`
  ADD CONSTRAINT `class_info_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
