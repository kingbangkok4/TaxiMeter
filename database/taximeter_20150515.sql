-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2016 at 02:04 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

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
  `status` enum('ปกติ','ซ่อมบำรุง') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carID`, `brand`, `licensePlate`, `status`) VALUES
(2, 'TOYOTA', 'มง 5699', 'ปกติ'),
(3, 'HONDA', 'กก 3t462462', 'ปกติ');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverID` int(11) NOT NULL,
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
(1, 'ชาติชาย ใจดี', '5553355666662', 'ชาย', 56, '1960-05-10', '45 ม.2 ตำบลกุดรัง อ.เมือง จ.น่าน', 'chat@gmail.com', '0878904423'),
(3, 'นาย ทดสอบ ระบบปป', '1223355666662', 'ชาย', 6, '2010-05-10', 'ปผปผ จ.กาญจนบุรี', 'staff1@mail.com', '0856667777');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `gender` enum('ชาย','หญิง') NOT NULL,
  `address` varchar(512) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `name`, `gender`, `address`, `email`, `phone`, `user_ref`) VALUES
(2, 'นาย ดกืิ้ดกื่ แดกืแื', 'ชาย', 'ืกแดปืแปื จ.นครปฐม', 'oil_takashi@hotmail.com', '0899999999', 16);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'กระบี่'),
(2, 'กรุงเทพมหานคร'),
(3, 'กาญจนบุรี'),
(4, 'กาฬสินธุ์'),
(5, 'กำแพงเพชร'),
(6, 'ขอนแก่น'),
(7, 'จันทบุรี'),
(8, 'ฉะเชิงเทรา'),
(9, 'ชลบุรี'),
(10, 'ชัยนาท'),
(11, 'ชัยภูมิ'),
(12, 'ชุมพร'),
(13, 'เชียงราย'),
(14, 'เชียงใหม่'),
(15, 'ตรัง'),
(16, 'ตราด'),
(17, 'ตาก'),
(18, 'นครนายก'),
(19, 'นครปฐม'),
(20, 'นครพนม'),
(21, 'นครราชสีมา'),
(22, 'นครศรีธรรมราช'),
(23, 'นครสวรรค์'),
(24, 'นนทบุรี'),
(25, 'นราธิวาส'),
(26, 'น่าน'),
(27, 'บุรีรัมย์'),
(28, 'ปทุมธานี'),
(29, 'ประจวบคีรีขันธ์'),
(30, 'ปราจีนบุรี'),
(31, 'ปัตตานี'),
(32, 'พระนครศรีอยุธยา'),
(33, 'พะเยา'),
(34, 'พังงา'),
(35, 'พัทลุง'),
(36, 'พิจิตร'),
(37, 'พิษณุโลก'),
(38, 'เพชรบุรี'),
(39, ' เพชรบูรณ์'),
(40, 'แพร่'),
(41, 'ภูเก็ต'),
(42, 'มหาสารคาม'),
(43, 'มุกดาหาร'),
(44, 'แม่ฮ่องสอน'),
(45, 'ยโสธร'),
(46, 'ยะลา'),
(47, 'ร้อยเอ็ด'),
(48, 'ระนอง'),
(49, 'ระยอง'),
(50, 'ราชบุรี'),
(51, 'ลพบุรี'),
(52, 'ลำปาง'),
(53, 'ลำพูน'),
(54, 'เลย'),
(55, 'ศรีสะเกษ'),
(56, 'สกลนคร'),
(57, 'สงขลา'),
(58, 'สตูล'),
(59, 'สมุทรปราการ'),
(60, 'สมุทรสงคราม'),
(61, 'สมุทรสาคร'),
(62, 'สระแก้ว'),
(63, 'สระบุรี'),
(64, 'สิงห์บุรี'),
(65, 'สุโขทัย'),
(66, 'สุพรรณบุรี'),
(67, 'สุราษฎร์ธานี'),
(68, 'สุรินทร์'),
(69, 'หนองคาย'),
(70, 'หนองบัวลำภู'),
(71, 'อ่างทอง'),
(72, 'อำนาจเจริญ'),
(73, 'อุดรธานี'),
(74, 'อุตรดิตถ์'),
(75, 'อุทัยธานี'),
(76, 'อุบลราชธานี');

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
  `shift` enum('เช้า','บ่าย','เย็น') NOT NULL,
  `status` enum('ยังไม่ได้คืนรถ','คืนรถแล้ว') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rentID`, `carID`, `driverID`, `rentDate`, `returnDate`, `price`, `shift`, `status`) VALUES
(1, 2, 1, '2016-05-14', '2016-05-14', 1000, 'เช้า', 'คืนรถแล้ว'),
(2, 2, 1, '2016-05-14', '2016-05-14', 500, 'เช้า', 'ยังไม่ได้คืนรถ'),
(3, 2, 1, '2016-05-14', '2016-05-14', 1000, 'เช้า', 'ยังไม่ได้คืนรถ'),
(4, 2, 1, '2016-05-14', '2016-05-14', 500, 'บ่าย', 'ยังไม่ได้คืนรถ'),
(5, 2, 1, '2016-05-14', '2016-05-14', 500, 'เย็น', 'ยังไม่ได้คืนรถ'),
(6, 2, 1, '2016-05-16', '2016-05-25', 1000, 'เช้า', 'ยังไม่ได้คืนรถ');

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
  `userID` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `type`) VALUES
(1, 'admin', '1234', 'Admin'),
(16, 'test', '1234', 'Member');

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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
