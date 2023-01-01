-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 07:44 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(225) NOT NULL,
  `role_description` text NOT NULL,
  `role_updatetime` text NOT NULL,
  `role_updateid` varchar(15) NOT NULL,
  `role_createid` varchar(15) NOT NULL,
  `role_createtime` text NOT NULL,
  `role_specialnote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`role_id`, `role_name`, `role_description`, `role_updatetime`, `role_updateid`, `role_createid`, `role_createtime`, `role_specialnote`) VALUES
(1, ' Super Administrator', 'No Description', '29-07-21 09:26:33', '12345', '12345', '29-07-21 09:26:33', 'No Special Note'),
(22, 'Administrator', '2nd admin functions less than super admin', '06-08-21 05:37:15', '980283380v', '980283380v', '06-08-21 05:37:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_date` text NOT NULL,
  `user_nic` varchar(20) NOT NULL,
  `user_role` varchar(10) NOT NULL,
  `user_tpno` varchar(15) NOT NULL,
  `user_eno` varchar(20) NOT NULL,
  `user_address` text NOT NULL,
  `user_note` text DEFAULT NULL,
  `user_updatetime` text DEFAULT NULL,
  `user_updateid` text NOT NULL,
  `user_crid` text NOT NULL,
  `user_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_date`, `user_nic`, `user_role`, `user_tpno`, `user_eno`, `user_address`, `user_note`, `user_updatetime`, `user_updateid`, `user_crid`, `user_status`) VALUES
(2, 'Super Administrator', '827ccb0eea8a706c4c34a16891f84e7b', '2021-07-27 06:03:55', '12345', '1', '6969769', '45', 'dhgfhd', 'dwdd', '01-11-21 07:11:45', '12345', '12345', '1'),
(21, 'Other Role', '827ccb0eea8a706c4c34a16891f84e7b', '06-08-21 07:36:50', '45678', '22', '1122457885', '445', 'Test Booking Manager', '', '06-08-21 07:36:50', '12345', '12345', '1'),
(37, 'dinith', '827ccb0eea8a706c4c34a16891f84e7b', '03-02-22 09:37:55', '971993120V', '22', '0715723199', 'dinith', 't', 'tt', NULL, '', '12345', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
