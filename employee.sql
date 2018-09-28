-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2018 at 02:50 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE IF NOT EXISTS `emp_details` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_gender` enum('Male','Female') NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `emp_image` varchar(255) NOT NULL,
  `emp_thumb_image` varchar(255) NOT NULL,
  `emp_job_role_id` int(11) NOT NULL,
  `emp_create_date` datetime NOT NULL,
  `emp_update` datetime NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`emp_id`, `emp_name`, `emp_email`, `emp_gender`, `emp_password`, `emp_image`, `emp_thumb_image`, `emp_job_role_id`, `emp_create_date`, `emp_update`) VALUES
(19, 'nisarg', 'np@gmail.com', 'Male', '123456', '5755704-hd-wallpaper5b241a1395801.jpg', '5755704-hd-wallpaper5b241a1395801.jpg', 3, '2018-06-16 00:00:00', '2018-06-16 01:27:07'),
(20, 'maitry', 'mapatel@gmail.com', 'Female', '147258', 'p15b241a361aebd.png', 'p15b241a361aebd.png', 5, '2018-06-16 00:00:00', '2018-06-16 01:31:09'),
(22, 'prachi', 'p@gmail.com', 'Female', '123456', 'plant-flower-bloom-367645b241a7a09d64.jpg', 'plant-flower-bloom-367645b241a7a09d64.jpg', 4, '2018-06-16 00:00:00', '2018-06-16 01:28:50'),
(23, 'akshay', 'akshay@gmail.co', 'Male', '789456', 'p5b241a93ee7df.jpg', 'p5b241a93ee7df.jpg', 2, '2018-06-16 00:00:00', '2018-06-16 01:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `emp_interest`
--

CREATE TABLE IF NOT EXISTS `emp_interest` (
  `emp_interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_interest_create_date` datetime NOT NULL,
  `emp_interest_update` datetime NOT NULL,
  PRIMARY KEY (`emp_interest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `emp_interest`
--

INSERT INTO `emp_interest` (`emp_interest_id`, `interest_id`, `emp_id`, `emp_interest_create_date`, `emp_interest_update`) VALUES
(12, 3, 1, '2018-06-09 03:43:49', '2018-06-09 03:43:49'),
(13, 4, 1, '2018-06-09 03:43:49', '2018-06-09 03:43:49'),
(14, 1, 2, '2018-06-09 03:44:02', '2018-06-09 03:44:02'),
(15, 4, 2, '2018-06-09 03:44:02', '2018-06-09 03:44:02'),
(16, 4, 3, '2018-06-09 03:44:18', '2018-06-09 03:44:18'),
(20, 1, 5, '2018-06-09 03:44:53', '2018-06-09 03:44:53'),
(21, 2, 5, '2018-06-09 03:44:53', '2018-06-09 03:44:53'),
(22, 3, 6, '2018-06-09 03:46:38', '2018-06-09 03:46:38'),
(23, 4, 6, '2018-06-09 03:46:38', '2018-06-09 03:46:38'),
(24, 2, 7, '2018-06-09 03:48:02', '2018-06-09 03:48:02'),
(25, 3, 7, '2018-06-09 03:48:02', '2018-06-09 03:48:02'),
(26, 4, 8, '2018-06-09 03:48:24', '2018-06-09 03:48:24'),
(29, 1, 9, '2018-06-09 03:49:44', '2018-06-09 03:49:44'),
(30, 2, 9, '2018-06-09 03:49:44', '2018-06-09 03:49:44'),
(31, 1, 10, '2018-06-09 04:08:22', '2018-06-09 04:08:22'),
(32, 2, 10, '2018-06-09 04:08:22', '2018-06-09 04:08:22'),
(69, 1, 4, '2018-06-09 04:29:37', '2018-06-09 04:29:37'),
(70, 2, 4, '2018-06-09 04:29:37', '2018-06-09 04:29:37'),
(71, 3, 4, '2018-06-09 04:29:37', '2018-06-09 04:29:37'),
(72, 4, 4, '2018-06-09 04:29:37', '2018-06-09 04:29:37'),
(103, 2, 12, '2018-06-09 05:46:43', '2018-06-09 05:46:43'),
(104, 4, 12, '2018-06-09 05:46:43', '2018-06-09 05:46:43'),
(119, 1, 11, '2018-06-09 05:52:26', '2018-06-09 05:52:26'),
(120, 2, 11, '2018-06-09 05:52:26', '2018-06-09 05:52:26'),
(121, 3, 13, '2018-06-14 04:47:20', '2018-06-14 04:47:20'),
(122, 4, 13, '2018-06-14 04:47:20', '2018-06-14 04:47:20'),
(123, 1, 14, '2018-06-14 04:47:49', '2018-06-14 04:47:49'),
(124, 4, 14, '2018-06-14 04:47:49', '2018-06-14 04:47:49'),
(125, 3, 19, '2018-06-16 01:27:07', '2018-06-16 01:27:07'),
(126, 4, 19, '2018-06-16 01:27:07', '2018-06-16 01:27:07'),
(129, 2, 21, '2018-06-16 01:28:07', '2018-06-16 01:28:07'),
(130, 3, 21, '2018-06-16 01:28:07', '2018-06-16 01:28:07'),
(131, 2, 22, '2018-06-16 01:28:50', '2018-06-16 01:28:50'),
(132, 3, 22, '2018-06-16 01:28:50', '2018-06-16 01:28:50'),
(133, 4, 22, '2018-06-16 01:28:50', '2018-06-16 01:28:50'),
(134, 1, 23, '2018-06-16 01:29:16', '2018-06-16 01:29:16'),
(135, 2, 23, '2018-06-16 01:29:16', '2018-06-16 01:29:16'),
(136, 3, 23, '2018-06-16 01:29:16', '2018-06-16 01:29:16'),
(137, 1, 20, '2018-06-16 01:31:09', '2018-06-16 01:31:09'),
(138, 2, 20, '2018-06-16 01:31:09', '2018-06-16 01:31:09'),
(139, 4, 20, '2018-06-16 01:31:09', '2018-06-16 01:31:09'),
(140, 2, 27, '2018-06-16 06:11:03', '2018-06-16 06:11:03'),
(141, 3, 27, '2018-06-16 06:11:03', '2018-06-16 06:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `emp_job_role`
--

CREATE TABLE IF NOT EXISTS `emp_job_role` (
  `emp_job_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_field_name` varchar(50) NOT NULL,
  `emp_field_value` varchar(50) NOT NULL,
  `emp_job_role_create_date` datetime NOT NULL,
  `emp_job_role_update` datetime NOT NULL,
  PRIMARY KEY (`emp_job_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `emp_job_role`
--

INSERT INTO `emp_job_role` (`emp_job_role_id`, `emp_field_name`, `emp_field_value`, `emp_job_role_create_date`, `emp_job_role_update`) VALUES
(1, 'Front End Developer', 'front_end_developer', '2018-05-29 12:41:08', '2018-05-29 22:08:00'),
(2, 'Back End Developer', 'back_end_developer', '2018-05-22 04:37:32', '2018-05-29 22:08:00'),
(3, 'Tester', 'tester', '2018-05-29 12:41:08', '2018-05-29 22:08:00'),
(4, 'Designer', 'designer', '2018-05-29 10:06:00', '0000-00-00 00:00:00'),
(5, 'Analyst', 'analyst', '2018-05-29 00:00:00', '2018-05-29 22:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_name` varchar(50) NOT NULL,
  `interest_create_date` datetime NOT NULL,
  `interest_update` datetime NOT NULL,
  PRIMARY KEY (`interest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interest_id`, `interest_name`, `interest_create_date`, `interest_update`) VALUES
(1, 'Development', '2018-06-01 09:12:16', '0000-00-00 00:00:00'),
(2, 'Designing', '2018-06-01 09:12:16', '2018-06-01 12:00:00'),
(3, 'Marketing', '2018-06-01 15:08:07', '0000-00-00 00:00:00'),
(4, 'Business', '2018-06-01 14:17:08', '2018-06-01 12:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
