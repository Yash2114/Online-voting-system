-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2023 at 01:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcavoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `name` varchar(100) NOT NULL COMMENT 'As the name suggests, varchar means character data that is varying. Also known as Variable Character, it is an indeterminate length string data type. It can hold numbers, letters and special characters. Microsoft SQL Server 2008 (and above) can store up to 8000 characters as the maximum length of the string using varchar data type. SQL varchar usually holds 1 byte per character and 2 more bytes for the length information. It is recommended to use varchar as the data type when columns have variable length and the actual data is way less than the given capacity',
  `position` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`name`, `position`, `image`) VALUES
('BJP', 'local MP', 'img/bjp.jpeg'),
('Congress', 'local MP', 'img/congress.jpeg'),
('AAP', 'local MP', 'img/mop.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`fname`, `lname`, `dob`, `email`, `mobile`, `password`, `role`) VALUES
('parth', 'rohit', '2007', 'parth123@gmail.com', '123456789', '0', 0),
('', '', '0', '', '0', '0', 0),
('Manan', 'Doshi', '2003', 'manan11@gmail.com', '0', '0', 0),
('dhruvik', 'fichadiya', '2004', 'dhruvik@gmail.com', '0', 'dhruvik', 0),
('dhruvik', 'fichadiya', '2004-08-11', 'dhruvik@gmail.com', '', 'fichadiya', 0),
('dhruvik', 'fichadiya', '2004-08-21', 'dhruvik@gmail.com', '12345678910', 'df', 0),
('', '', '', '', '', '', 0),
('mautik', 'patel', '2003-10-21', 'mautikpatel@gmail.com', '7433002551', '2110', 1),
('rutvik', 'patel', '2003-06-12', 'orelic786@gmail.com', '9428399929', 'rut', 1),
('rutvik', 'patel', '2001-02-13', 'orelic786@gmail.com', '343', 'rut', 2),
('rutvik', 'patel', '2000-01-13', 'asd@gmail.com', '3432', 'rut', 0),
('rutvik', 'patel', '2007-10-05', 'orelic786@gmail.com', '2342343423', 'rut', 0),
('pujan', 'patel', '2007-10-05', 'patelrutvikdinesh@gmail.com', '2342343423', 'rut', 0),
('dsfg', 'dfg', '2007-10-06', 'orelic786@gmail.com', '2342343423', 'dsfg', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
