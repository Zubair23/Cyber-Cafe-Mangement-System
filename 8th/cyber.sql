-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2016 at 06:53 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cyber`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE IF NOT EXISTS `customer_info` (
  `cust_id` int(100) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(100) NOT NULL,
  `pc_id` int(100) NOT NULL,
  `cust_mobile` varchar(15) NOT NULL,
  `cust_entry` datetime NOT NULL,
  `cust_out` datetime NOT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `cust_mobile` (`cust_mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`cust_id`, `cust_name`, `pc_id`, `cust_mobile`, `cust_entry`, `cust_out`) VALUES
(1, 'Forhad', 1, '0124574', '2016-02-01 16:10:33', '0000-00-00 00:00:00'),
(2, 'sony', 4, '1111111', '2016-03-14 23:24:37', '0000-00-00 00:00:00'),
(3, 'abul kashem', 2, '00000000000000', '2016-03-15 00:06:50', '0000-00-00 00:00:00'),
(4, '', 0, '', '2016-03-15 01:21:18', '0000-00-00 00:00:00'),
(6, 'zubair siddique', 3, '0123456789', '2016-03-15 10:20:59', '0000-00-00 00:00:00'),
(7, 'aman shakawat', 5, '18122344555', '2016-03-15 13:03:00', '0000-00-00 00:00:00'),
(8, 'etytey', 6, '5788', '2016-03-15 16:22:19', '0000-00-00 00:00:00'),
(10, 'junaed', 7, '11111111111111', '2016-03-15 22:58:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hourly_rate`
--

CREATE TABLE IF NOT EXISTS `hourly_rate` (
  `rate_id` int(100) NOT NULL AUTO_INCREMENT,
  `rate` int(100) NOT NULL,
  `entry_date` date NOT NULL,
  `del_status` int(11) NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hourly_rate`
--

INSERT INTO `hourly_rate` (`rate_id`, `rate`, `entry_date`, `del_status`) VALUES
(1, 25, '2016-03-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pc_info`
--

CREATE TABLE IF NOT EXISTS `pc_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pc_name` varchar(50) NOT NULL,
  `configure` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `del_status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pc_info`
--

INSERT INTO `pc_info` (`id`, `pc_name`, `configure`, `status`, `del_status`) VALUES
(1, 'Samsung', 'Windows XP', 1, 0),
(2, 'Dell', 'Windows 8', 1, 0),
(3, 'Dell corei7', 'Windows 7', 1, 0),
(4, 'Toshiba', 'Windows 7', 1, 0),
(5, 'DELL corei5', 'Windows 8', 1, 0),
(6, 'Samsung2', 'Windows 7', 1, 0),
(7, 'Toshiba3', 'Windows 7', 1, 0),
(8, 'Samsung2', 'Windows 7', 0, 0),
(9, 'lenovo', 'Windows 8', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `premium_mem`
--

CREATE TABLE IF NOT EXISTS `premium_mem` (
  `member_id` int(100) NOT NULL AUTO_INCREMENT,
  `mem_name` varchar(100) NOT NULL,
  `mem_mobile` varchar(100) NOT NULL,
  `mem_email` varchar(20) NOT NULL,
  `sub_hour` varchar(100) NOT NULL,
  `remain_hour` varchar(50) NOT NULL,
  `reg_date` date NOT NULL,
  `amount` int(100) NOT NULL,
  `del_status` int(10) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `mem_mobile` (`mem_mobile`),
  UNIQUE KEY `mem_email` (`mem_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `premium_mem`
--

INSERT INTO `premium_mem` (`member_id`, `mem_name`, `mem_mobile`, `mem_email`, `sub_hour`, `remain_hour`, `reg_date`, `amount`, `del_status`) VALUES
(1, 'Forhad', '0182474578', 'forhad@yahoo.com', '100', '', '2016-03-02', 2000, 0),
(2, 'asf', '121212121', 'asd@f.com', '500', '10', '2016-03-02', 500, 0),
(3, 'sony', '11111111111111', 'sony@gmil.com', '1', '1', '2016-03-14', 111, 0),
(4, 'sakib', '0103889949', 'sakib@gmail.com', '2', '2', '2016-03-15', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prem_in_pc`
--

CREATE TABLE IF NOT EXISTS `prem_in_pc` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `mem_id` int(255) NOT NULL,
  `mem_in` datetime NOT NULL,
  `mem_out` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prem_in_pc`
--

