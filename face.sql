-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 05:15 PM
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
-- Database: `face`
--

-- --------------------------------------------------------

--
-- Table structure for table `ceg`
--

CREATE TABLE `ceg` (
  `stu_names` varchar(50) NOT NULL,
  `2020-03-11` int(11) DEFAULT NULL,
  `2020-03-17` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ceg`
--

INSERT INTO `ceg` (`stu_names`, `2020-03-11`, `2020-03-17`) VALUES
('Arun', 0, 0),
('Akash', 0, 0),
('Bala', 1, 1),
('Deepak', 1, 1),
('Dhanush', 1, 1),
('Eaugene', 1, 1),
('Flemming', 1, 1),
('Gokul', 1, 1),
('Gopi', 1, 1),
('Hrithik', 1, 0),
('Inbaraj', 1, 1),
('Karthi', 1, 0),
('Kural', 1, 0),
('Naren', 1, 0),
('Praveen', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mit`
--

CREATE TABLE `mit` (
  `stu_names` varchar(50) NOT NULL,
  `2020-03-17` int(11) DEFAULT NULL,
  `2020-03-11` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mit`
--

INSERT INTO `mit` (`stu_names`, `2020-03-17`, `2020-03-11`) VALUES
('Abinash', 0, 1),
('Arjun', 1, 1),
('Partha', 0, 1),
('Suresh', 1, 1),
('Susil', 1, 1),
('Afridi', 1, 1),
('Sarathy', 1, 1),
('Mani', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `date` date NOT NULL,
  `start_time` varchar(8) NOT NULL,
  `end_time` varchar(8) NOT NULL,
  `college` varchar(50) NOT NULL,
  `attendance` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`date`, `start_time`, `end_time`, `college`, `attendance`) VALUES
('2020-03-11', '09:00 AM', '12:00 PM', 'CEG', 1),
('2020-03-11', '01:00 PM', '04:00 PM', 'MIT', 1),
('2020-03-12', '09:00 AM', '12:00 PM', 'MIT', 0),
('2020-03-13', '09:00 AM', '12:00 PM', 'CEG', 0),
('2020-03-14', '09:00 AM', '12:00 PM', 'CEG', 0),
('2020-03-15', '09:00 AM', '12:00 PM', 'CEG', 0),
('2020-03-16', '09:00 AM', '12:00 PM', 'CEG', 0),
('2020-03-13', '01:00 PM', '04:00 PM', 'CEG', 0),
('2020-03-14', '01:00 PM', '04:00 PM', 'MIT', 0),
('2020-03-15', '01:00 PM', '04:00 PM', 'MIT', 0),
('2020-03-16', '01:00 PM', '04:00 PM', 'MIT', 0),
('2020-03-17', '09:00 AM', '12:00 PM', 'CEG', 1),
('2020-03-17', '01:00 PM', '04:00 PM', 'MIT', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
