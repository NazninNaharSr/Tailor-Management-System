-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 03:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `userName`, `password`, `gender`, `dob`, `picture`, `type`) VALUES
('Avishek ', 'avishek123@gmail.co', 'saha', '123', 'male', '10/01/1999', 'uploads/IMG_0082 (3) edit pro-min.jpg', ''),
('Daiyan', 'd@gmail.com', 'dk', '123', 'male', '03/07/2000', 'uploads/me.jpeg', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `oid` bigint(100) NOT NULL,
  `tid` int(50) NOT NULL,
  `eid` int(50) NOT NULL,
  `Done/Not` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`oid`, `tid`, `eid`, `Done/Not`) VALUES
(1, 2, 3, 'Delivery Done');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `order taken` varchar(50) NOT NULL,
  `delivery` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `gender`, `dob`, `order taken`, `delivery`) VALUES
(1, 'Dipto', 'Male', '31-12-2000', 'yes', 'Done'),
(2, 'Adit', 'Male', '2-9-1999', 'No', 'Not yet'),
(3, 'Ovi', 'Male', '10-2-1998', 'Yes', 'On the way');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `oid` bigint(100) NOT NULL,
  `user_ID` int(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `oquantity` mediumint(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`oid`, `user_ID`, `oname`, `oquantity`, `order_date`, `delivery_date`, `note`) VALUES
(1, 1, 'S-1', 2, '12/3/2020', '15/3/2020', 'urgently needed'),
(2, 2, 'S-2', 1, '12/4/2019', '15/4/2019', 'Nothing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` bigint(100) NOT NULL,
  `tid` int(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `pquantity` mediumint(100) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `tid`, `pname`, `description`, `pquantity`, `price`) VALUES
(2, 2, 'Kameej', 'h-19\"\r\nW-20\"', 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `tailor`
--

CREATE TABLE `tailor` (
  `ID` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tailor`
--

INSERT INTO `tailor` (`ID`, `name`, `email`, `userName`, `password`, `gender`, `dob`, `picture`, `type`) VALUES
(2, 'Naznin', 'n@gmail.com', 'nn', '2345', 'female', '03/11/2000', 'uploads/nn1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tailors_order`
--

CREATE TABLE `tailors_order` (
  `oid` bigint(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tailors_order`
--

INSERT INTO `tailors_order` (`oid`, `note`) VALUES
(1, 'Order taken successfully'),
(2, 'Order Taken successfully');

-- --------------------------------------------------------

--
-- Table structure for table `track_order`
--

CREATE TABLE `track_order` (
  `oid` bigint(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `email`, `userName`, `password`, `gender`, `dob`, `picture`, `type`) VALUES
(1, 'sdfs', 'n@gmail.com', 'saha', '1234', 'male', '07/09/2000', '', 'User'),
(2, 'Naznin', 'nahar@gmail.com', 'naz', '2345', 'female', '12/03/1998', '', 'User'),
(3, 'daiyan', 'd3@gmail.com', 'daiya', '12345', 'male', '03/07/2000', '', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tailor`
--
ALTER TABLE `tailor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tailors_order`
--
ALTER TABLE `tailors_order`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `track_order`
--
ALTER TABLE `track_order`
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `oid` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tailor`
--
ALTER TABLE `tailor`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tailors_order`
--
ALTER TABLE `tailors_order`
  MODIFY `oid` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `track_order`
--
ALTER TABLE `track_order`
  ADD CONSTRAINT `track_order_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `products` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
