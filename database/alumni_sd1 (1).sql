-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2020 at 08:38 AM
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
(1, 'Admin', 1604477954);

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

INSERT INTO `user` (`userId`, `genderId`, `userNisn`, `userName`, `userLastName`, `userUsername`, `userPassword`, `userPhone`, `userAddress`, `userBirthPlace`, `userBirthDate`, `userImage`, `userYears`, `createdAt`, `updateAt`) VALUES
(1, 1, '99', 'Taraz14', 'DP', 'admin', '$2y$10$mP25vkwqE272xd2yvOvonuQHCllLT0t6lm.GztNMlKxIzHIB.mX.2', '081393484770', 'Nothing', 'Surabaya', '2020-04-07', 'n', '2020', 1604477954, 1604477954),
(2, 1, '0239486416', 'Baladewa', '19', '0239486416', '$2y$10$drlnz7izW0JPU0QIXY19L.uHq5HW1XGTiPoycSJyt12zKqypSlSo2', '2344242142412', 'asdasd', 'Surabaya', '2020-11-11', 'nophoto.png', 'January 0007', 1604478596, 1604478596),
(3, 2, '213123123', 'Baladewi', '19', '213123123', '$2y$10$Me9cDwhV/7Z7NydyJ.oDxu5BlJI.YIVajWAzRl5tXrY1g28GbWeRu', '081393484770', 'sdfasaf', 'Surabaya', '2020-11-11', 'nophoto.png', 'August 2023', 1604478704, 1604478704);

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
(1, 1, 1);

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
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `userRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
