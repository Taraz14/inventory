-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2020 at 04:19 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_sd1`
--

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `genderId` int(11) NOT NULL,
  `genderName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`genderId`, `genderName`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(10) NOT NULL,
  `createdAt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleName`, `createdAt`) VALUES
(1, 'Admin', 1604477954),
(2, 'Alumni', 1604506737);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `genderId` int(11) NOT NULL,
  `userNisn` varchar(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `userUsername` varchar(50) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userPhone` varchar(18) NOT NULL,
  `userAddress` text NOT NULL,
  `userBirthPlace` varchar(30) NOT NULL,
  `userBirthDate` date NOT NULL,
  `userImage` varchar(255) NOT NULL,
  `userYears` varchar(20) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `updateAt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `genderId`, `userNisn`, `userName`, `userLastName`, `userUsername`, `userPassword`, `userEmail`, `userPhone`, `userAddress`, `userBirthPlace`, `userBirthDate`, `userImage`, `userYears`, `createdAt`, `updateAt`) VALUES
(1, 1, '99', 'Taraz14', 'DP', 'admin', '$2y$10$mP25vkwqE272xd2yvOvonuQHCllLT0t6lm.GztNMlKxIzHIB.mX.2', NULL, '081393484770', 'Nothing', 'Surabaya', '2020-04-07', 'nophoto.png', '2020', 1604477954, 1604477954),
(25, 1, '0054309112', 'Baladewa', '19', '0054309112', '$2y$10$FUR3hAJbXgsZ9.8KWJ178OpCQRlkss0qMpVV9Kc2kGV6RW88pgHIe', 'vv@gmail.com', '081393484762', 'Jl. Perkutut, No. 6, Unit 2, Malassom, Aimas, Kab. Sorong', 'Sorong', '2020-11-05', 'avatar5.png', 'August 2023', 1604509178, 1604509178),
(26, 1, '8528236812', 'Dimas', 'Pradhana', '8528236812', '$2y$10$qxcqevSclZPkSC74.kQUbeoIIpX.MGFkQ///esK7hXSBzkCidFzAO', 'dimaz.taraz@gmail.com', '081393484770', 'Jl. Perkutut, No. 6, Unit 2, Malassom, Aimas, Kab. Sorong', 'Sorong', '2020-11-06', 'nophoto.png', 'November 2020', 1604664566, 1604664566);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `userRoleId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`userRoleId`, `roleId`, `userId`) VALUES
(1, 1, 1),
(7, 2, 25),
(8, 2, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`genderId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `genderId` (`genderId`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`userRoleId`),
  ADD KEY `roleId` (`roleId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `genderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `userRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
