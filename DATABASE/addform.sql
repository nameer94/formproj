-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2020 at 12:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf8_bin NOT NULL,
  `pass` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user`, `pass`) VALUES
(1, '$2y$10$j67SgKJEXUdzSJXMZsxQeeYMO.eNH/KZBCrl0aGFOX.uNjPRtoCAu', '$2y$10$3jmvGe7nxOEd9V3bLwrH7.qcFsQMynygMGezH6seT2FNvhU4WCIl2');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `g1Name` varchar(20) NOT NULL,
  `g2Name` varchar(20) NOT NULL,
  `mName` varchar(20) NOT NULL,
  `mName1` varchar(20) NOT NULL,
  `mName2` varchar(20) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `job` int(1) NOT NULL,
  `study` int(1) NOT NULL,
  `idt` int(1) NOT NULL,
  `idNum` varchar(30) NOT NULL,
  `id2Num` varchar(30) NOT NULL,
  `id2Numsec` varchar(30) NOT NULL,
  `id2Numsec2` varchar(30) NOT NULL,
  `tmNum` varchar(30) NOT NULL,
  `mrkzName` varchar(20) NOT NULL,
  `mrkzNum` varchar(20) NOT NULL,
  `bdday` int(2) NOT NULL,
  `bdmonth` int(2) NOT NULL,
  `bdyear` int(4) NOT NULL,
  `addNum` varchar(30) NOT NULL,
  `add2Num` varchar(30) NOT NULL,
  `add3Num` varchar(20) NOT NULL,
  `addName` varchar(20) NOT NULL,
  `addPhone` varchar(11) NOT NULL,
  `liv` int(1) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `memdata` longtext NOT NULL,
  `members` int(2) NOT NULL DEFAULT 0,
  `moh` int(2) NOT NULL,
  `akt` int(2) NOT NULL,
  `dday` int(2) NOT NULL,
  `dmonth` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
