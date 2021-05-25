-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2019 at 06:10 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwp-proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `job_id` int(255) NOT NULL,
  `js_id` int(255) NOT NULL,
  `reason` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply`
--


-- --------------------------------------------------------

CREATE TABLE `count` (
  `num` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count`
--


-- --------------------------------------------------------

--
-- Table structure for table `empdetail`
--

CREATE TABLE `empdetail` (
  `address` varchar(1000) NOT NULL,
  `company` varchar(100) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `id` int(255) NOT NULL,
  `comp_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empdetail`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobcount`
--

CREATE TABLE `jobcount` (
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcount`
--


-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `id` int(255) NOT NULL,
  `employer` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `emp_id` int(255) NOT NULL,
  `salary` int(20) NOT NULL,
  `position` varchar(1000) NOT NULL,
  `expire` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `js`
--

CREATE TABLE `js` (
  `id` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `count` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js`
--

-- --------------------------------------------------------



CREATE TABLE `jsdetail` (
  `skills` varchar(500) NOT NULL,
  `id` int(100) NOT NULL,
  `college` varchar(1000) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `interest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jsdetail`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
