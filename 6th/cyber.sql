-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2016 at 08:51 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customer_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `pc_info`
--

CREATE TABLE IF NOT EXISTS `pc_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pc_name` varchar(50) NOT NULL,
  `configure` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pc_info`
--

INSERT INTO `pc_info` (`id`, `pc_name`, `configure`, `status`) VALUES
(1, 'Samsung', 'Windows XP', 0),
(2, 'Dell', 'Windows 8', 0),
(3, 'Dell corei7', 'Windows 7', 0),
(4, 'Toshiba', 'Windows 7', 0),
(5, 'DELL corei5', 'Windows 8', 1),
(6, 'Samsung2', 'Windows 7', 0),
(7, 'Toshiba3', 'Windows 7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `premium_mem`
--

CREATE TABLE IF NOT EXISTS `premium_mem` (
  `member_id` int(100) NOT NULL AUTO_INCREMENT,
  `mem_name` varchar(100) NOT NULL,
  `mem_mobile` varchar(100) NOT NULL,
  `mem_email` varchar(20) NOT NULL,
  `sub_time` date NOT NULL,
  `reg_date` date NOT NULL,
  `amount` int(100) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `mem_mobile` (`mem_mobile`),
  UNIQUE KEY `mem_email` (`mem_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `premium_mem`
--

INSERT INTO `premium_mem` (`member_id`, `mem_name`, `mem_mobile`, `mem_email`, `sub_time`, `reg_date`, `amount`) VALUES
(1, 'Forhad', '01834437114', 'forhad@gmail.com', '2016-02-29', '2016-01-24', 1000),
(2, 'banna', '01831730244', 'banna@bodna.com', '2016-01-25', '0000-00-00', 123),
(3, 'zubair', '010201000', 'zubari23@gmail.com', '2016-12-12', '0000-00-00', 11111);
