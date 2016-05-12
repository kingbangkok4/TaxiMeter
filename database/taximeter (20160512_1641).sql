-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 11:41 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taximeter`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carID` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `licensePlate` varchar(20) DEFAULT NULL,
  `status` enum('ว่าง','ถูกเช่าแล้ว','ซ่อมบำรุง') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverID` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `idCard` varchar(13) NOT NULL,
  `gender` enum('ชาย','หญิง') NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(512) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverID`, `name`, `idCard`, `gender`, `age`, `birthday`, `address`, `email`, `phone`) VALUES
('1', 'ชาติชาย ใจดี', '', 'ชาย', 48, '2016-02-15', '45 ม.2 ตำบลกุดรัง อ.เมือง', 'chat@gmail.com', '0878904423');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `mobile` text,
  `email` text,
  `address` text,
  `gender` text,
  `user_ref` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fullname`, `mobile`, `email`, `address`, `gender`, `user_ref`) VALUES
(1, 'ผู้ดูแลระบบ', '0898908909', 'admin@mail.com', 'กรุงเทพมหานคร', 'ชาย', 1),
(2, 'นาย ณัฏฐ์ เจ้าของร้าน', '0869998888', 'contact@nutcarcare.com', 'กรุงเทพมหานคร', 'ชาย', 2),
(4, 'สมศรี  รักชาติ', '0946782345', 'aa@mail.com', 'กรุงเทพมหานคร', 'หญิง', 4),
(5, 'สมใจ รักดี', '0804567890', 'sdgh@hotmail.com', 'กรุงเทพมหานคร', 'หญิง', 7);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rentID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `driverID` int(11) NOT NULL,
  `rentDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `price` int(11) NOT NULL,
  `shift` enum('เช้า','บ่าย','เย็น') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `driverID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `serviceDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('กำลังให้บริการ','สิ้นสุดการให้บริการ') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin1', '12345', 'Admin'),
(4, 'Staff1', '1234', 'Staff'),
(7, 'staff2', '9999', 'Staff'),
(8, 'uu', '0000', 'Staff'),
(2, 'nut', '1234', 'Owner'),
(6, 'admin', '1234', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driverID`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rentID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
