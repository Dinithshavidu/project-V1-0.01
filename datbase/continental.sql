-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 06:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `continental`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `emp_id` int(11) NOT NULL,
  `emp_nic` varchar(255) NOT NULL,
  `emp_date` date NOT NULL,
  `emp_cid` varchar(255) NOT NULL,
  `emp_check_in` varchar(225) NOT NULL,
  `emp_check_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`emp_id`, `emp_nic`, `emp_date`, `emp_cid`, `emp_check_in`, `emp_check_out`) VALUES
(1, '22222', '2022-03-23', '12345', '1', '2'),
(2, '22222', '2022-03-19', '12345', '7:00', '12:00');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `emp_id` int(11) NOT NULL,
  `emp_nic` varchar(100) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_contact` varchar(100) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_active` int(11) NOT NULL DEFAULT 0,
  `emp_date` datetime NOT NULL DEFAULT current_timestamp(),
  `emp_cid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`emp_id`, `emp_nic`, `emp_name`, `emp_contact`, `emp_email`, `emp_active`, `emp_date`, `emp_cid`) VALUES
(7, '22222', 'Krishan Athula', '711656381', 'krishan123@gmail.com', 1, '2022-02-02 08:26:11', '12345'),
(8, '11111', 'Mylendran Pradhap', '766603297', 'pradhap123@gmail.com', 1, '2022-02-02 08:27:09', '12345'),
(9, '33333', 'Hirusha Chamath', '712704718', 'hirusha123@gmail.com', 1, '2022-02-02 08:28:10', '12345'),
(10, '44444', 'Asela Perera', '775986701', 'asela123@gmail.com', 1, '2022-02-02 08:29:54', '12345'),
(11, '55555', 'Ishara Caldera', '766133132', 'Ishara123@gmail.com', 1, '2022-02-02 08:30:56', '12345'),
(12, '66666', 'Premasiri ', '0715839363', 'premasiri123@gmail.com', 1, '2022-02-02 08:32:26', '12345'),
(13, '77777', 'Thevindu Dilmith', '0781689086', 'thevindu123@gmail.com', 1, '2022-02-02 08:39:16', '12345'),
(14, '88888', 'Kavinda', '778058325', 'kavinda123@gmail.com', 1, '2022-02-02 08:40:44', '12345'),
(15, '123', 'ss', '0715723199', 'sd@gmail.com', 1, '2022-03-09 09:57:29', '12345');

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
-- Indexes for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_nic` (`emp_nic`);

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
-- AUTO_INCREMENT for table `employee_data`
--
ALTER TABLE `employee_data`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
