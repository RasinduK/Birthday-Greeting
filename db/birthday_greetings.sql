-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 01:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birthday_greetings`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `email`, `birthday`, `photo`, `user_id`) VALUES
(1, 'rasindu', '07634667171', 'rasindu@gmai.com', '0000-00-00', 'uploads/444758383_867243268781160_6829085099930891684_n.jpg', 1),
(3, 'rasindu', '0763466717', 'Rasindukaushaliya245@gmail.com', '2002-01-15', 'uploads/186464514_1075559329602148_72873761788600369_n.jpg', 3),
(4, 'koshila', '0701847147', 'koshilabandara75@gmail.com', '2000-06-07', 'uploads/411088394_212546251896935_2331694867778888466_n.jpg', 3),
(5, 'rasindu', '0763466717', 'kaushalyachanaka38@gmail.com', '1996-06-06', 'uploads/436442736_387760187593910_8255350820397357318_n.jpg', 3),
(6, 'qwer', 'qwrr', 'kaushalyachanaka38@gmail.com', '2024-06-06', 'uploads/add record.PNG', 3),
(7, 'Damith', '0774238281', 'k14317damith@gmail.com', '2024-06-07', 'uploads/405193350_1369719827284310_7272060669618366951_n.jpg', 3),
(8, 'abc', '12345', 'kaushalyachanaka38@gmail.com', '2024-06-07', 'uploads/WhatsApp Image 2024-05-27 at 17.18.38_42655414.jpg', 3),
(9, 'qaws', 'qszxdd', 'sadeepal541@gmail.com', '2024-06-07', 'uploads/405193350_1369719827284310_7272060669618366951_n.jpg', 3),
(10, 'rasindu', '07631667171', 'sadeepal541@gmail.com', '2024-06-07', 'uploads/Icojam-Blue-Bits-User-add.256.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `Email`, `password`) VALUES
(1, 'rasindu', '1234', 'ras@gmail.com', '1234'),
(2, 'wer', 'qqqq', 'qqqq@gmail.com', 'qqqq'),
(3, 'rasindu kaushalya', 'Rasindu', 'Rasindukaushaliya245@gmail.com', '1234'),
(4, 'rasindu', 'Rasindu1', 'rasindukaushalya@gmail.com', '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
