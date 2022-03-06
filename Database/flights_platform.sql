-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 12:51 PM
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `privilege`, `fName`, `lName`, `phone`, `email`, `birthDate`, `passw`, `createdAt`) VALUES
(1, '', 'Mehdi', 'Lagdimi', '0606', 'mehdi@gmail.com', '2022-02-20 13:25:21', '1234', '2022-02-20 13:25:21'),
(2, '', 'ahmed', 'rachid', '0707', 'ahmed@gmail.com', '2022-02-20 13:25:21', '4321', '2022-02-20 13:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `airportID` int(11) NOT NULL,
  `airportAdress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`airportID`, `airportAdress`) VALUES
(1, 'Al Massira Airport, Agadir'),
(2, 'Cherif Al Idrissi Airport, Al Hoceima'),
(3, 'Ben Slimane Airport, Ben Slimane');

-- --------------------------------------------------------

--
-- Table structure for table `departures`
--

CREATE TABLE `departures` (
  `volID` int(11) DEFAULT NULL,
  `airportID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departures`
--

INSERT INTO `departures` (`volID`, `airportID`) VALUES
(2, 2),
(3, 2),
(31, 2),
(32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `volID` int(11) DEFAULT NULL,
  `airportID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`volID`, `airportID`) VALUES
(2, 1),
(3, 2),
(31, 3),
(32, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `flights`
-- (See below for the actual view)
--
CREATE TABLE `flights` (
`volID` int(11)
,`departureDate` timestamp
,`departAirport` varchar(100)
,`destAirport` varchar(100)
,`arrivalDate` timestamp
,`model` varchar(50)
,`availableSeats` int(11)
,`price` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `flightsfrom`
-- (See below for the actual view)
--
CREATE TABLE `flightsfrom` (
`volID` int(11)
,`departAirport` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `flightsfromto`
-- (See below for the actual view)
--
CREATE TABLE `flightsfromto` (
`volID` int(11)
,`departAirport` varchar(100)
,`destAirport` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `flightsto`
-- (See below for the actual view)
--
CREATE TABLE `flightsto` (
`volID` int(11)
,`destAirport` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passengerID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `volID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `birthDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`passengerID`, `userID`, `volID`, `fName`, `lName`, `birthDate`) VALUES
(1, 1, 1, 'User1', 'User1LASTNAME', '2022-03-02 19:42:47'),
(2, 2, 2, 'User2', 'User2LASTNAME', '2022-03-02 19:45:51'),
(20, 1, 1, 'fName6', 'lName6', '2022-03-16 23:00:00'),
(21, 1, 2, 'fName5', 'lName5', '2022-03-20 23:00:00'),
(22, 1, 3, 'fName7', 'lName7', '2022-03-16 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `planeID` int(11) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`planeID`, `model`, `seats`) VALUES
(1, 'Boeing 737', 700),
(2, 'Airbus A319', 132);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reservations`
-- (See below for the actual view)
--
CREATE TABLE `reservations` (
`reservID` int(11)
,`fName` varchar(50)
,`lName` varchar(50)
,`departureDate` timestamp
,`departAirport` varchar(100)
,`destAirport` varchar(100)
,`arrivalDate` timestamp
,`dateReserv` timestamp
,`seatNum` int(11)
,`price` float
,`goingComing` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `reservs`
--

CREATE TABLE `reservs` (
  `reservID` int(11) NOT NULL,
  `passengerID` int(11) DEFAULT NULL,
  `dateReserv` timestamp NOT NULL DEFAULT current_timestamp(),
  `goingComing` varchar(20) NOT NULL DEFAULT 'Going',
  `seatNum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservs`
--

INSERT INTO `reservs` (`reservID`, `passengerID`, `dateReserv`, `goingComing`, `seatNum`) VALUES
(1, 2, '2022-02-21 18:01:56', 'Going', 4),
(2, 1, '2022-02-21 18:01:56', 'Going', 6),
(9, 20, '2022-03-04 22:36:12', 'going', 86),
(10, 21, '2022-03-04 22:38:35', 'going', 6),
(11, 22, '2022-03-04 23:12:24', 'going', 56);

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `phone`, `email`, `birthDate`, `passw`, `createdAt`) VALUES
(1, '0808', 'user1@gmail.com', '2022-02-20 13:26:23', '0000', '2022-02-20 13:26:23'),
(2, '0909', 'user2@gmail.com', '2022-02-20 13:26:23', '1111', '2022-02-20 13:26:23'),
(3, '099999', 'testsignup@gmail.com', '2022-02-09 23:00:00', '123', '2022-02-23 10:35:22');

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
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vols`
--

INSERT INTO `vols` (`volID`, `planeID`, `departureDate`, `arrivalDate`, `availableSeats`, `price`, `createdAt`) VALUES
(2, 2, '2022-02-20 18:55:52', '2022-02-23 18:54:50', 132, 468.7, '2022-02-20 18:55:52'),
(3, 1, '2022-02-25 18:55:52', '2022-02-26 18:54:50', 699, 500, '2022-02-20 18:55:52'),
(31, 1, '2022-02-25 21:34:00', '2022-02-26 21:33:00', 567, 787, '2022-02-25 16:29:22'),
(32, 1, '2022-03-12 16:50:00', '2022-03-19 16:51:00', 3, 12, '2022-03-05 16:51:18');

-- --------------------------------------------------------

--
-- Structure for view `flights`
--
DROP TABLE IF EXISTS `flights`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flights`  AS SELECT `v`.`volID` AS `volID`, `v`.`departureDate` AS `departureDate`, `t`.`departAirport` AS `departAirport`, `t`.`destAirport` AS `destAirport`, `v`.`arrivalDate` AS `arrivalDate`, `p`.`model` AS `model`, `v`.`availableSeats` AS `availableSeats`, `v`.`price` AS `price` FROM ((`vols` `v` join `flightsfromto` `t` on(`v`.`volID` = `t`.`volID`)) join `planes` `p` on(`v`.`planeID` = `p`.`planeID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `flightsfrom`
--
DROP TABLE IF EXISTS `flightsfrom`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flightsfrom`  AS SELECT `d`.`volID` AS `volID`, `a`.`airportAdress` AS `departAirport` FROM (`departures` `d` join `airports` `a` on(`d`.`airportID` = `a`.`airportID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `flightsfromto`
--
DROP TABLE IF EXISTS `flightsfromto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flightsfromto`  AS SELECT `f`.`volID` AS `volID`, `f`.`departAirport` AS `departAirport`, `t`.`destAirport` AS `destAirport` FROM (`flightsfrom` `f` join `flightsto` `t` on(`f`.`volID` = `t`.`volID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `flightsto`
--
DROP TABLE IF EXISTS `flightsto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flightsto`  AS SELECT `d`.`volID` AS `volID`, `a`.`airportAdress` AS `destAirport` FROM (`destinations` `d` join `airports` `a` on(`d`.`airportID` = `a`.`airportID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `reservations`
--
DROP TABLE IF EXISTS `reservations`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reservations`  AS SELECT `r`.`reservID` AS `reservID`, `p`.`fName` AS `fName`, `p`.`lName` AS `lName`, `f`.`departureDate` AS `departureDate`, `f`.`departAirport` AS `departAirport`, `f`.`destAirport` AS `destAirport`, `f`.`arrivalDate` AS `arrivalDate`, `r`.`dateReserv` AS `dateReserv`, `r`.`seatNum` AS `seatNum`, `f`.`price` AS `price`, `r`.`goingComing` AS `goingComing` FROM ((`reservs` `r` join `passengers` `p` on(`r`.`passengerID` = `p`.`passengerID`)) join `flights` `f` on(`f`.`volID` = `p`.`volID`)) ;

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
  ADD KEY `passengers_ibfk_1` (`userID`);

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
  ADD KEY `reservs_ibfk_2` (`passengerID`);

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
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `airportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passengerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `planeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservs`
--
ALTER TABLE `reservs`
  MODIFY `reservID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vols`
--
ALTER TABLE `vols`
  MODIFY `volID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservs`
--
ALTER TABLE `reservs`
  ADD CONSTRAINT `reservs_ibfk_2` FOREIGN KEY (`passengerID`) REFERENCES `passengers` (`passengerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`planeID`) REFERENCES `planes` (`planeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
