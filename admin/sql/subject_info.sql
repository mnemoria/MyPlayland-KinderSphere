-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 10:02 AM
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
-- Table structure for table `subject_info`
--

CREATE TABLE `subject_info` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_name` varchar(64) NOT NULL,
  `date_added` date NOT NULL,
  `status` enum('Active','Archive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_info`
--

INSERT INTO `subject_info` (`id`, `subject_code`, `course_id`, `subject_name`, `date_added`, `status`) VALUES
(1, 'C', 1, 'Counting', '2023-07-05', 'Active'),
(2, 'FM', 6, 'Kasanayang Fine Motor', '2023-07-22', 'Active'),
(3, 'BM', 1, 'Basic Math', '2018-01-22', 'Archive'),
(4, 'PSE', 2, 'Pagkilala ng Sarili at Pagpapahayag ng Sariling Emosyon ', '2017-06-21', 'Active'),
(5, 'EI', 2, 'Pag-unawa sa Emosyon ng Iba', '2023-07-23', 'Active'),
(6, 'PKN', 2, 'Pakikipag-ugnayan sa Kapwa at Nakatatanda', '2023-07-23', 'Active'),
(7, 'PP', 2, 'Pagpapahalaga sa Pagkakaiba', '2023-07-23', 'Active'),
(8, 'PPAM', 3, 'Pagpapahalaga sa Pagkakaiba', '2023-07-23', 'Active'),
(9, 'PKOM', 3, 'Pakikisalamuha sa iba bilang kasapi ng komunidad ', '2023-07-23', 'Active'),
(10, 'PS', 4, 'Pagpapahalaga sa Sarili', '2023-07-23', 'Active'),
(11, 'KP', 6, 'Kasanayang Pisikal/Physical Fitness', '2023-07-23', 'Active'),
(12, 'GM', 6, 'Kasanayang Gross Motor ', '2023-07-23', 'Active'),
(13, 'PKK', 6, 'Pangangalaga sa Sariling Kalusugan at Kaligtasan', '2023-07-23', 'Active'),
(14, 'PK', 7, 'Pagpapahalaga sa Kagandahan', '2023-07-23', 'Active'),
(15, 'MP', 7, 'Malikhaing Pagpapahayag', '2023-07-23', 'Active'),
(16, 'SC', 1, 'Sorting and Classifying', '2023-07-23', 'Active'),
(17, 'AT', 1, 'Number and Algebraic Thinking ', '2023-07-23', 'Active'),
(18, 'ME', 1, 'Measurement', '2023-07-23', 'Active'),
(19, 'AP', 1, 'Data Analysis and Probability', '2023-07-23', 'Active'),
(20, 'BS', 8, 'Life Science: Body and Senses', '2023-07-23', 'Active'),
(21, 'A', 8, 'Life Science: Animals', '2023-07-23', 'Active'),
(22, 'P', 8, 'Life Science: Plants', '2023-07-23', 'Active'),
(23, 'E', 8, 'Earth Science: Environment and the Weather', '2023-07-23', 'Active'),
(24, 'APD', 9, 'Auditory Perception and Discrimination', '2023-07-23', 'Active'),
(25, 'VPD', 9, 'Visual Perception and Discrimination', '2023-07-23', 'Active'),
(26, 'OL', 9, 'Oral Language', '2023-07-23', 'Active'),
(27, 'PA', 9, 'Phonological Awareness', '2023-07-23', 'Active'),
(28, 'BPA', 9, 'Book and Print Awareness', '2023-07-23', 'Active'),
(29, 'AK', 9, 'Alphabet Knowledge', '2023-07-23', 'Active'),
(30, 'SS', 9, 'Study Skills', '2023-07-23', 'Active'),
(31, 'CP', 9, 'Composing', '2023-07-23', 'Active'),
(32, 'ATR', 9, 'Attitude Toward Reading', '2023-07-23', 'Active'),
(33, 'V', 9, 'Vocabulary Development', '2023-07-23', 'Active'),
(34, 'LC', 9, 'Listening Comprehension', '2023-07-23', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subject_info`
--
ALTER TABLE `subject_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject_info`
--
ALTER TABLE `subject_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject_info`
--
ALTER TABLE `subject_info`
  ADD CONSTRAINT `subject_info_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
