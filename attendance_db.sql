-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 02:48 PM
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
-- Database: `attendance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `query_id` int(11) NOT NULL,
  `query` mediumtext NOT NULL,
  `staff` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`query_id`, `query`, `staff`, `date`, `status`) VALUES
(24, 'qwertyuiopsdfykl;zxcvbnm,.', 'clg1003', '2020-04-22 16:23:47', 1),
(25, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'clg1003', '2020-04-22 16:27:43', 0),
(27, 'jhdg\nsgs\nhdfhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh\ndhdfhdfhdfhdfh\ndhdfhdfhfddfhd', 'clg1003', '2020-04-22 16:33:40', 1),
(28, 'dzxcgadxvbvcgdrs f brfasrF zxhfsbfvbsd ga agwere', 'clg1003', '2020-04-22 16:33:50', 1),
(29, 'verify daily attendance', 'clg1003', '2020-04-22 16:34:02', 0),
(30, 'today attendance updated', 'clg1003', '2020-04-22 16:35:25', 0),
(31, 'wergf', 'clg1003', '2020-04-22 16:35:30', 0),
(32, 'hi hello', 'clg1004', '2020-04-23 20:40:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `register_no` varchar(50) NOT NULL,
  `class` varchar(20) NOT NULL,
  `attendance` varchar(20) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `register_no`, `class`, `attendance`, `date`) VALUES
(3, '17mech01', 'mech', 'Present', '9-4-2020'),
(4, '17mech03', 'mech', 'Absent', '9-4-2020'),
(5, '17cse68', 'cse', 'Present', '9-4-2020'),
(6, '17cse70', 'cse', 'Present', '9-4-2020'),
(7, '17ece45', 'ece', 'Present', '9-4-2020'),
(8, '17ece98', 'ece', 'Absent', '9-4-2020'),
(9, '17ece45', 'ece', 'Present', '10-4-2020'),
(10, '17ece98', 'ece', 'Present', '10-4-2020'),
(11, '17eee12', 'eee', 'Absent', '9-4-2020'),
(12, '17eee34', 'eee', 'Absent', '9-4-2020'),
(13, '17eee12', 'eee', 'Absent', '10-4-2020'),
(14, '17eee34', 'eee', 'Present', '10-4-2020'),
(15, '17mech01', 'mech', 'Present', '10-4-2020'),
(16, '17mech03', 'mech', 'Present', '10-4-2020'),
(17, '17cse68', 'cse', 'Present', '10-4-2020'),
(18, '17cse70', 'cse', 'Present', '10-4-2020'),
(19, '17ece45', 'ece', 'Present', '20-4-2020'),
(20, '17ece98', 'ece', 'Absent', '20-4-2020'),
(21, '17mech01', 'mech', 'Present', '20-4-2020'),
(22, '17mech03', 'mech', 'Present', '20-4-2020'),
(23, '17eee12', 'eee', 'Present', '20-4-2020'),
(24, '17eee34', 'eee', 'Present', '20-4-2020'),
(25, '123', 'eee', 'Present', '20-4-2020'),
(26, '17cse68', 'cse', 'Present', '21-4-2020'),
(27, '17cse70', 'cse', 'Absent', '21-4-2020'),
(36, '17cse63', 'cse', 'Present', '22-4-2020'),
(37, '17cse68', 'cse', 'Present', '22-4-2020'),
(38, '17cse70', 'cse', 'Present', '22-4-2020'),
(39, '17cse114', 'cse', 'Present', '22-4-2020'),
(40, '17mech01', 'mech', 'Present', '23-4-2020'),
(41, '17mech03', 'mech', 'Present', '23-4-2020'),
(42, '17mech18', 'mech', 'Present', '23-4-2020'),
(43, '17cse301', 'cse', 'Present', '23-4-2020'),
(44, '17cse63', 'cse', 'Present', '23-4-2020'),
(45, '17cse64', 'cse', 'Present', '23-4-2020'),
(46, '17cse68', 'cse', 'Present', '23-4-2020'),
(47, '17cse70', 'cse', 'Absent', '23-4-2020'),
(48, '17cse74', 'cse', 'Absent', '23-4-2020'),
(49, '17cse302', 'cse', 'Absent', '23-4-2020'),
(50, '17cse84', 'cse', 'Absent', '23-4-2020'),
(51, '17cse88', 'cse', 'Absent', '23-4-2020'),
(52, '17cse114', 'cse', 'Absent', '23-4-2020');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(20, 'cse'),
(22, 'ece'),
(23, 'eee'),
(21, 'mech');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(20) NOT NULL,
  `staff_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`) VALUES
('clg1002', 'Venkatesh'),
('clg1003', 'Archana'),
('clg1004', 'Ezhil');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `register_no` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`register_no`, `student_name`, `class`) VALUES
('17cse114', 'Venkatesh R', 'cse'),
('17cse301', 'Jeevan', 'cse'),
('17cse302', 'Rubesh K R', 'cse'),
('17cse63', 'Pradeesha M', 'cse'),
('17cse64', 'Priyadharshini', 'cse'),
('17cse68', 'Raghul', 'cse'),
('17cse70', 'Raja', 'cse'),
('17cse74', 'Ramya', 'cse'),
('17cse84', 'Sanjay K M', 'cse'),
('17cse88', 'Shankara Narayanan K J', 'cse'),
('17ece45', 'Ram', 'ece'),
('17ece68', 'Rahul Jp', 'ece'),
('17ece98', 'Vasu', 'ece'),
('17eee12', 'Mano', 'eee'),
('17eee34', 'Murali', 'eee'),
('17mech01', 'Amar', 'mech'),
('17mech03', 'Faizal', 'mech'),
('17mech18', 'Mani', 'mech');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`register_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
