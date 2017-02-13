-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2017 at 07:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `description` varchar(40000) NOT NULL,
  `branch` varchar(3) NOT NULL,
  `semester` int(1) NOT NULL,
  `course` varchar(5) NOT NULL,
  `num` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `description`, `branch`, `semester`, `course`, `num`) VALUES
(28, 'DCS_notes_before_midsem.txt', 'DCS complete notes before midsem, Sem 1 CSE. by Ramesh Verma', 'CSE', 1, 'DCS', 45),
(28, 'DCS_notes_before_EndSem.txt', 'DCS complete notes before Endsem, Sem 1 CSE. by Ramesh Verma', 'CSE', 1, 'DCS', 46),
(15, 'Lab_Exam_Schedule.txt', 'Lab Exam Schedule of DCS LAB Exam for SEM 1 Students of branch CSE', 'CSE', 1, 'DCS', 48),
(23, 'ECE:_M2_EXAM_SCHEDULE.txt', 'ECE Mathematics-2 EXAM SCHEDULE for sem 1 students', 'ECE', 1, 'M-2', 49);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_name`, `user_email`, `user_password`, `admin`) VALUES
(15, 'admin', 'admin@lnmiit.ac.in', 'admin', 1),
(21, 'DeanAcads', 'dean@lnmiit.ac.in', 'qwertyuio', 1),
(22, 'HOD_CSE', 'hod_cse@lnmiit.ac.in', 'qwertyuio', 1),
(23, 'HOD_ECE', 'hod_ece@lnmiit.ac.in', 'qwertyuio', 1),
(25, 'HOD_CCE', 'hod_cce@lnmiit.ac.in', 'qwertyuio', 1),
(26, 'Ravi Sharma', 'ravi.sharma@gmail.com', 'qwertyuio', 0),
(27, 'Manish Rajpurohit', 'manish.raj@protonmail.ru', 'qwertyuio', 0),
(28, 'Ramesh', 'ramesh@gmail.com', 'ramesh', 0),
(29, 'shreyansh', 'ahreyansh@hotmail.com', 'shreyansh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD UNIQUE KEY `num` (`num`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `num` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
