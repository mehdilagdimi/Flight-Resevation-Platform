-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 12:57 PM
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
-- Database: `flights_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `privilege` varchar(20) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `birthDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `passw` varchar(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `airportID` int(11) NOT NULL,
  `airportAdress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departures`
--

CREATE TABLE `departures` (
  `volID` int(11) DEFAULT NULL,
  `airportID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `volID` int(11) DEFAULT NULL,
  `airportID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passengerID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `birthDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `planeID` int(11) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservs`
--

CREATE TABLE `reservs` (
  `reservID` int(11) NOT NULL,
  `volID` int(11) DEFAULT NULL,
  `passengerID` int(11) DEFAULT NULL,
  `dateReserv` timestamp NOT NULL DEFAULT current_timestamp(),
  `goingComing` varchar(20) NOT NULL DEFAULT 'Going',
  `seatNum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `birthDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `passw` varchar(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vols`
--

CREATE TABLE `vols` (
  `volID` int(11) NOT NULL,
  `planeID` int(11) DEFAULT NULL,
  `departureDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `arrivalDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `availableSeats` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `state` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`airportID`);

--
-- Indexes for table `departures`
--
ALTER TABLE `departures`
  ADD KEY `volID` (`volID`),
  ADD KEY `airportID` (`airportID`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD KEY `volID` (`volID`),
  ADD KEY `airportID` (`airportID`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passengerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`planeID`);

--
-- Indexes for table `reservs`
--
ALTER TABLE `reservs`
  ADD PRIMARY KEY (`reservID`),
  ADD KEY `volID` (`volID`),
  ADD KEY `passengerID` (`passengerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`volID`),
  ADD KEY `planeID` (`planeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `airportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passengerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `planeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservs`
--
ALTER TABLE `reservs`
  MODIFY `reservID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vols`
--
ALTER TABLE `vols`
  MODIFY `volID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departures`
--
ALTER TABLE `departures`
  ADD CONSTRAINT `departures_ibfk_1` FOREIGN KEY (`volID`) REFERENCES `vols` (`volID`) ON DELETE CASCADE,
  ADD CONSTRAINT `departures_ibfk_2` FOREIGN KEY (`airportID`) REFERENCES `airports` (`airportID`);

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_ibfk_1` FOREIGN KEY (`volID`) REFERENCES `vols` (`volID`) ON DELETE CASCADE,
  ADD CONSTRAINT `destinations_ibfk_2` FOREIGN KEY (`airportID`) REFERENCES `airports` (`airportID`);

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `reservs`
--
ALTER TABLE `reservs`
  ADD CONSTRAINT `reservs_ibfk_1` FOREIGN KEY (`volID`) REFERENCES `vols` (`volID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservs_ibfk_2` FOREIGN KEY (`passengerID`) REFERENCES `passengers` (`passengerID`) ON DELETE CASCADE;

--
-- Constraints for table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`planeID`) REFERENCES `planes` (`planeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
