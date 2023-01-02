-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 03:12 PM
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
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `ap_id` int(11) NOT NULL,
  `ap_cust_no` text NOT NULL,
  `ap_service_type` int(11) NOT NULL,
  `ap_job_id` int(11) NOT NULL,
  `ap_treatment` int(11) NOT NULL,
  `ap_date` date NOT NULL,
  `ap_alocate_time` int(11) NOT NULL,
  `ap_note` int(11) NOT NULL,
  `ap_active` int(11) NOT NULL,
  `ap_emp_cr_id` int(11) NOT NULL,
  `ap_emp_up_id` int(11) NOT NULL,
  `ap_is_complete` int(11) NOT NULL,
  `ap_created_at` date NOT NULL,
  `ap_updated_at` date NOT NULL,
  `ap_section` int(11) NOT NULL,
  `ap_emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `ap_cs_id` int(11) NOT NULL,
  `ap_cs_cust_no` text NOT NULL,
  `ap_cs_service_type` int(11) NOT NULL,
  `ap_cs_job_id` int(11) NOT NULL,
  `ap_cs_treatment` int(11) NOT NULL,
  `ap_cs_date` date NOT NULL,
  `ap_cs_alocate_time` int(11) NOT NULL,
  `ap_cs_note` text NOT NULL,
  `ap_cs_active` int(11) NOT NULL,
  `ap_cs_emp_cr_id` int(11) NOT NULL,
  `ap_cs_emp_up_id` int(11) NOT NULL,
  `ap_cs_is_complete` int(11) NOT NULL,
  `ap_cs_created_at` date NOT NULL,
  `ap_cs_updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_dob` text NOT NULL,
  `cust_address` text NOT NULL,
  `cus_no` text NOT NULL,
  `cust_weight` text NOT NULL,
  `cust_hight` text NOT NULL,
  `cust_city` text NOT NULL,
  `cust_active` int(11) NOT NULL,
  `cust_note` text NOT NULL,
  `cust_up_emp_id` int(11) NOT NULL,
  `cust_cr_emp_id` int(11) NOT NULL,
  `cust_created_at` date NOT NULL,
  `cust_updated_at` date NOT NULL,
  `cust_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_created_at` date NOT NULL,
  `job_is_complete` int(11) NOT NULL,
  `job_is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sec_id` int(11) NOT NULL,
  `sec_name` int(11) NOT NULL,
  `sec_note` int(11) NOT NULL,
  `sec_create_at` date NOT NULL,
  `sec_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sr_name` text NOT NULL,
  `sr_sec_id` int(11) NOT NULL,
  `sr_id` int(11) NOT NULL,
  `sr_create_at` date NOT NULL,
  `sr_active` int(11) NOT NULL,
  `sr_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `tm_id` int(11) NOT NULL,
  `tm_active` int(11) NOT NULL,
  `tm_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`ap_cs_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`tm_id`);

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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `ap_cs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `tm_id` int(11) NOT NULL AUTO_INCREMENT;

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
