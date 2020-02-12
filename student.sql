-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2020 at 09:44 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

CREATE TABLE `employeeinfo` (
  `emp_id` varchar(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeinfo`
--

INSERT INTO `employeeinfo` (`emp_id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
('1', 'rakesh', 'gara', 'rakesh@gmail.com', '2019-12-31'),
('2', 'rakesh', 'gara', 'rakesh@gmail.com', '2020-01-01'),
('3', 'rakesh', 'gara', 'rakesh@gmail.com', '2020-01-02'),
('4', 'rakesh', 'gara', 'rakesh@gmail.com', '2020-01-03'),
('5', 'rakesh', 'gara', 'rakesh@gmail.com', '2020-01-04'),
('6', 'rakesh', 'gara', 'rakesh@gmail.com', '2020-01-05'),
('7', 'rakesh', 'gara', 'rakesh@gmail.com', '2020-01-06'),
('8', 'rakesh', 'gara', 'rakesh@gmail.com', '2020-01-07'),
('9', 'rakesh', 'gara', 'rakesh@gmail.com', '2020-01-08'),
('10', 'rakesh', 'gara', 'rakesh@gmail.com', '2020-01-09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
