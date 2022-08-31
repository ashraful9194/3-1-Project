-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2022 at 06:02 PM
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
-- Table structure for table `allpost`
--

CREATE TABLE `allpost` (
  `post_id` int(11) NOT NULL,
  `post_date` date DEFAULT NULL,
  `post_publisher_username` varchar(300) DEFAULT NULL,
  `post_publisher_id` int(11) DEFAULT NULL,
  `post_title` varchar(500) DEFAULT NULL,
  `post_category` varchar(300) DEFAULT NULL,
  `post_paragraph_1` varchar(2000) DEFAULT NULL,
  `post_code_1` varchar(2000) DEFAULT NULL,
  `post_paragraph_2` varchar(2000) DEFAULT NULL,
  `post_code_2` varchar(2000) DEFAULT NULL,
  `post_paragraph_3` varchar(2000) DEFAULT NULL,
  `post_code_3` varchar(2000) DEFAULT NULL,
  `post_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allpost`
--

INSERT INTO `allpost` (`post_id`, `post_date`, `post_publisher_username`, `post_publisher_id`, `post_title`, `post_category`, `post_paragraph_1`, `post_code_1`, `post_paragraph_2`, `post_code_2`, `post_paragraph_3`, `post_code_3`, `post_status`) VALUES
(4, '2022-07-07', 'asraf', 23, 'gfhdjdj', 'eceiowcjnw', 'weinocweioc', 'weonciouewnc', 'nqecnewuc', 'eoncouewnc', 'noiwencueow', 'oencouewnovuew', 'approved'),
(5, '2022-07-07', 'asraf', 23, 'uhdfuwehf', 'h8efhciuef', 'hfoefou', 'ewfnocuwenf', 'nuowoenf', 'uofnwbuoewnf', 'nuwneucfew', 'euofneuowf', 'approved'),
(6, '2022-07-13', 'alamin', 27, 'how to get last 3 entry of sql', 'SQL', 'Assuming I have a table named dbo.birds, which has a column named ID. Its of type int and its a Primary key column. Therefore, all the IDs are unique.', 'SELECT TOP 3 *FROM dbo.Birds ORDER BY ID DESC', 'This one-liner is the simplest query in the list, to get the last 3 number of records in a table. The TOP clause in SQL Server returns the first N number of records or rows from a table. Applying the ORDER BY clause with DESC, will return rows in descending order. Hence, we get the last 3 rows.', 'SELECT *FROM dbo.Birds b1\r\nWHERE 3 > (\r\n    SELECT COUNT(*) FROM dbo.Birds b2\r\n        WHERE b2.ID > b1.ID\r\n)', 'This method is also important and interesting too. Now, let us assume I have a table that does not have a primary key or an ID column. How do I query and get the last 3 rows?', 'CREATE TABLE [dbo].[ColorMaster](\r\n    [ColorName] [varchar](20) NOT NULL,\r\n    [HexCode] [varchar](10) NOT NULL\r\n)', 'approved'),
(7, '2022-07-13', 'alamin', 27, 'fghjk', 'fghjkl', 'gbhnjmk,l', 'cvgbhnjmk,l', 'eucneowuqeijfij', 'qifiq', 'qiofio', 'q3f3', 'approved'),
(8, '2022-07-13', 'alamin', 27, 'For loop inpython', 'language', 'Python programming language provides the following types of loops to handle looping requirements. Python provides three ways for executing the loops. While all the ways provide similar basic functionality, they differ in their syntax and condition checking time.\r\n\r\nWhile Loop: \r\nIn python, while loop is used to execute a block of statements repeatedly until a given condition is satisfied. And when the condition becomes false, the line immediately after the loop in the program is executed.', 'while expression:\r\n    statement(s)', '3. All the statements indented by the same number of character spaces after a programming construct are considered to be part of a single block of code. Python uses indentation as its method of grouping statements. \r\n            Example: ', '# Python program to illustrate\r\n# while loop\r\ncount = 0\r\nwhile (count < 3):\r\n	count = count + 1\r\n	print(\"Hello Geek\")\r\n', 'post link', 'geeksforgeeks.org/loops-in-python/', 'approved'),
(9, '2022-07-13', 'alamin', 27, 'qcjodhfwoufheq', 'qeuofhqoeiwjfhqe', 'qiejfoiqejf', 'qwnfoiqnf', 'qiowfjoiqhf', 'qifo3iqjf', 'qoufn3oi', 'il3nfi3', 'approved'),
(10, '2022-07-13', 'alamin', 27, 'jefooindsuvnwefweouifjoweif', 'iowjeiovf', 'weoicjiowe', 'weoifwoei\r\n', 'qwiofn', '23ofn', 'vwcin', 'wfv', 'approved'),
(12, '2022-07-13', 'alamin', 27, 'qilamfipowfscimi', 'simccc', 'wuneuoe', 'ioenfioew', 'cwljn', 'fmcio23f', 'ciwej', 'cmiwe', 'approved'),
(14, '2022-07-13', 'alamin', 27, 'suivnuwi', 'vniower', 'idjvip4', 'vnouws', 'aoiavmweio', 'skjnuwf', 'jdsncfu', 'unocewu', 'approved'),
(16, '2022-07-13', 'asraf', 23, 'wilndciq', 'qfnc', 'cniwe', 'weioc', 'weklcn', 'wenlcn', 'niec', 'welcn', 'pending'),
(20, '2022-07-20', 'asraf', 23, 'uhwdih', 'qwdkub3u', 'qciiq3fn', 'ucbqeuowf', 'ilneiof', 'owhefio', 'ln2i3fn', 'lkncil32n', 'pending'),
(21, '2022-07-20', 'alamin', 27, 'thw', 'thw', 'thw', 'thw', 'thw', 'thw', 'thw', 'thw', 'approved'),
(22, '2022-08-01', 'rahat', 28, 'qwertyuiopmukyul', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 'ghghghghghghghghghghghghghghghghghghghghgh', 'dhfffffffffffffffffffffffffffffffffffgggggggggggggggggggg', 'fdhhhhhhhhhhhhhhhhhh', 'dfhhhhhhhhhhhhhhhhhhhhh', 'dfhhhhhhhhhhhhhhhhhhhhhhhhhh', 'pending'),
(23, '2022-08-01', 'rahat', 28, 'ura ura ura', 'agwgh', 'wagwegh', 'wegh', 'ghwe', 'weagg', 'wsg', 'wegwhg', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allpost`
--
ALTER TABLE `allpost`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_publisher_id` (`post_publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allpost`
--
ALTER TABLE `allpost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allpost`
--
ALTER TABLE `allpost`
  ADD CONSTRAINT `allpost_ibfk_1` FOREIGN KEY (`post_publisher_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
