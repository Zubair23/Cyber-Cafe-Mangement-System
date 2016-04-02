-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2016 at 11:54 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyber`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `general_customer`
--

CREATE TABLE `general_customer` (
  `cust_id` int(100) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_mobile` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `del_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_customer`
--

INSERT INTO `general_customer` (`cust_id`, `cust_name`, `cust_mobile`, `cust_email`, `cust_password`, `del_status`) VALUES
(0, 'dzxc', '3213123', 'zxcz@gmail.com', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gp_customer`
--

CREATE TABLE `gp_customer` (
  `gp_id` int(100) NOT NULL,
  `cust_type` varchar(50) NOT NULL,
  `cust_mobile` varchar(100) NOT NULL,
  `pc_id` int(100) NOT NULL,
  `cust_entry` datetime NOT NULL,
  `cust_out` datetime NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hourly_rate`
--

CREATE TABLE `hourly_rate` (
  `rate_id` int(100) NOT NULL,
  `rate` int(100) NOT NULL,
  `entry_date` date NOT NULL,
  `del_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hourly_rate`
--

INSERT INTO `hourly_rate` (`rate_id`, `rate`, `entry_date`, `del_status`) VALUES
(1, 25, '2016-03-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pc_info`
--

CREATE TABLE `pc_info` (
  `id` int(100) NOT NULL,
  `pc_name` varchar(50) NOT NULL,
  `configure` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `del_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_info`
--

INSERT INTO `pc_info` (`id`, `pc_name`, `configure`, `status`, `del_status`) VALUES
(1, 'Samsung', 'Windows XP', 0, 0),
(2, 'Dell', 'Windows 8', 0, 0),
(3, 'Dell corei7', 'Windows 7', 0, 0),
(4, 'Toshiba', 'Windows 7', 0, 0),
(5, 'DELL corei5', 'Windows 8', 0, 0),
(6, 'Samsung2', 'Windows 7', 0, 0),
(7, 'Toshiba3', 'Windows 7', 0, 0),
(8, 'Samsung2', 'Windows 7', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `premium_mem`
--

CREATE TABLE `premium_mem` (
  `member_id` int(100) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `mem_mobile` varchar(100) NOT NULL,
  `mem_email` varchar(20) NOT NULL,
  `sub_hour` varchar(100) NOT NULL,
  `remain_hour` varchar(50) NOT NULL,
  `reg_date` date NOT NULL,
  `amount` int(100) NOT NULL,
  `del_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `premium_mem`
--

INSERT INTO `premium_mem` (`member_id`, `mem_name`, `mem_mobile`, `mem_email`, `sub_hour`, `remain_hour`, `reg_date`, `amount`, `del_status`) VALUES
(1, 'Forhad', '0182474578', 'forhad@yahoo.com', '100', '', '2016-03-02', 2000, 0),
(2, 'asf', '121212121', 'asd@f.com', '500', '10', '2016-03-02', 500, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_customer`
--
ALTER TABLE `general_customer`
  ADD UNIQUE KEY `cust_email` (`cust_email`);

--
-- Indexes for table `gp_customer`
--
ALTER TABLE `gp_customer`
  ADD PRIMARY KEY (`gp_id`);

--
-- Indexes for table `hourly_rate`
--
ALTER TABLE `hourly_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `pc_info`
--
ALTER TABLE `pc_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium_mem`
--
ALTER TABLE `premium_mem`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `mem_mobile` (`mem_mobile`),
  ADD UNIQUE KEY `mem_email` (`mem_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gp_customer`
--
ALTER TABLE `gp_customer`
  MODIFY `gp_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hourly_rate`
--
ALTER TABLE `hourly_rate`
  MODIFY `rate_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pc_info`
--
ALTER TABLE `pc_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `premium_mem`
--
ALTER TABLE `premium_mem`
  MODIFY `member_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
