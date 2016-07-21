-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2016 at 05:41 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stallstop`
--

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `ORDERNO` int(11) NOT NULL,
  `IDNO` int(11) NOT NULL,
  `USERNAME` varchar(500) NOT NULL,
  `SNO` int(11) NOT NULL,
  `ADDRESS` text NOT NULL,
  `PHONENO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`ORDERNO`, `IDNO`, `USERNAME`, `SNO`, `ADDRESS`, `PHONENO`) VALUES
(1, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(2, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(3, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(4, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(5, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(6, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(7, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(8, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(9, 1, 'sandy', 2, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(10, 1, 'sandy', 56, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(11, 1, 'sandy', 56, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(12, 1, 'sandy', 15, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(13, 1, 'sandy', 12, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(14, 1, 'sandy', 39, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(15, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(16, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(17, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(18, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(19, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(20, 1, 'sandy', 0, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(21, 1, 'sandy', 9, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(22, 1, 'sandy', 3, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(23, 1, 'sandy', 1, '1514,TSK Nagar, Chennai - 600037', 9176286409),
(24, 1, 'sandy', 16, '1514,TSK Nagar, Chennai - 600037', 9176286409);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`ORDERNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `ORDERNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
