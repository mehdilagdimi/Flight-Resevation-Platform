-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 04:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_frmwork_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `mvc_col1`
--

CREATE TABLE `mvc_col1` (
  `ID_1` int(11) NOT NULL,
  `data1` varchar(40) DEFAULT NULL,
  `data2` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mvc_col2`
--

CREATE TABLE `mvc_col2` (
  `ID_2` int(11) NOT NULL,
  `data3` varchar(40) DEFAULT NULL,
  `data4` float DEFAULT NULL,
  `ID_1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_pass`) VALUES
(1, 'Admin', '0000'),
(2, 'Guest', '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mvc_col1`
--
ALTER TABLE `mvc_col1`
  ADD PRIMARY KEY (`ID_1`);

--
-- Indexes for table `mvc_col2`
--
ALTER TABLE `mvc_col2`
  ADD PRIMARY KEY (`ID_2`),
  ADD KEY `ID_1` (`ID_1`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mvc_col1`
--
ALTER TABLE `mvc_col1`
  MODIFY `ID_1` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mvc_col2`
--
ALTER TABLE `mvc_col2`
  MODIFY `ID_2` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mvc_col2`
--
ALTER TABLE `mvc_col2`
  ADD CONSTRAINT `mvc_col2_ibfk_1` FOREIGN KEY (`ID_1`) REFERENCES `mvc_col1` (`ID_1`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
