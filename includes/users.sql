-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2022 at 06:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosai_limited`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `date`, `role`) VALUES
(20, 'Naeem ', 'Khan', 'naeem', 'md3rahat2cse93@gmail.com', '$2y$04$7n1BEGTzRMwNUyFoOgN2v.wttGn1wfhYDOOVx6Rci62aBWQHSr3jC', '2022-06-10', 'Contributor'),
(23, 'Asraf', 'Khan', 'asraf', 'asraf@gmail.com', '$2y$04$kOksIS0he5htsmXjeF5fiuPIsNU8yPsWFHSMH0Eo5N3Oyco4yyde.', '2022-06-10', 'Admin'),
(26, 'Ayman', 'Wasir', 'ayman2021', 'wasimbepary1999@gmail.com', '$2y$04$vbDGdDDhk5IFlUynSny/deeXaPwFeB6w7j8s/k5YMmDgwptOegfvC', '2022-07-03', 'Contributor'),
(27, 'Alamin', 'Khan', 'alamin', 'alaminkhanak@gmail.com', '$2y$04$y8S9qp6L2Kxmc6STI6zdu.l.pXPItd78yojHWXvZ/CmZPJpnnkcBe', '2022-07-07', 'Admin'),
(28, 'Rahat', 'Mia', 'rahat', '0raduan0@gmail.com', '$2y$04$WSKX0kRy9fWofQZCKWO9weTNVCHvuojJFaYm5WXSf.5USi08ZRGd.', '2022-08-01', 'Contributor'),
(29, 'Nurullah', 'Masum', 'nurutech', 'cssb140020@gmail.com', '$2y$04$vKdo.lJ1bWfAj9HfKbLHNuC.UE9TTOxSy6JmxrMq7TPK5gi6si2XC', '2022-08-03', 'Learner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
