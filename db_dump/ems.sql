-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2019 at 11:15 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_leave`
--

DROP TABLE IF EXISTS `applied_leave`;
CREATE TABLE IF NOT EXISTS `applied_leave` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `leave_from` varchar(1000) NOT NULL,
  `leave_to` varchar(1000) NOT NULL,
  `e_leave` varchar(100) NOT NULL,
  `m_leave` varchar(100) NOT NULL,
  `c_leave` varchar(100) NOT NULL,
  `apply_by` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_leave`
--

INSERT INTO `applied_leave` (`id`, `leave_from`, `leave_to`, `e_leave`, `m_leave`, `c_leave`, `apply_by`, `status`, `comment`, `apply_date`) VALUES
(5, '2018-12-31', '2019-01-31', '2', '2', '2', '24', 'Approved', 'ccc', '2019-01-09 13:55:09'),
(6, '2018-12-31', '2019-01-10', '4', '6', '2', '25', 'Approved', 'asd', '2019-01-09 13:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `assign_leave`
--

DROP TABLE IF EXISTS `assign_leave`;
CREATE TABLE IF NOT EXISTS `assign_leave` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `v_from` varchar(1000) NOT NULL,
  `v_to` varchar(1000) NOT NULL,
  `e_leave` varchar(1000) NOT NULL,
  `m_leave` varchar(1000) NOT NULL,
  `c_leave` varchar(1000) NOT NULL,
  `assign_to` varchar(1000) NOT NULL,
  `assign_by` varchar(1000) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_leave`
--

INSERT INTO `assign_leave` (`id`, `v_from`, `v_to`, `e_leave`, `m_leave`, `c_leave`, `assign_to`, `assign_by`, `modified_date`) VALUES
(10, '2018-01-01', '2019-01-31', '6', '6', '6', '24', '20', '2019-01-08 11:11:12'),
(9, '2018-01-01', '2019-01-31', '6', '6', '6', '25', '20', '2019-01-08 11:11:12'),
(11, '2018-01-01', '2019-01-31', '6', '6', '6', '19', '20', '2019-01-08 11:11:12'),
(12, '2018-01-01', '2019-01-31', '5', '5', '5', '19', '20', '2019-01-08 11:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `t_id` int(255) NOT NULL AUTO_INCREMENT,
  `task` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `assigned_by` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `task`, `user_id`, `assigned_by`, `date_time`) VALUES
(2, 'testing message', '25', '20', '2019-01-08 04:49:36'),
(3, 'testing message', '24', '20', '2019-01-08 04:49:36'),
(4, 'is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normald the like).', '25', '20', '2019-01-08 04:52:22'),
(5, 'is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normald the like).', '24', '20', '2019-01-08 04:52:22'),
(6, 'is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normald the like).', '19', '20', '2019-01-08 04:52:22'),
(7, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '25', '20', '2019-01-08 05:16:08'),
(8, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '24', '20', '2019-01-08 05:16:08'),
(9, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '19', '20', '2019-01-08 05:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `task_reply`
--

DROP TABLE IF EXISTS `task_reply`;
CREATE TABLE IF NOT EXISTS `task_reply` (
  `r_id` int(255) NOT NULL AUTO_INCREMENT,
  `reply` text NOT NULL,
  `m_id` varchar(100) NOT NULL,
  `reply_by` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_reply`
--

INSERT INTO `task_reply` (`r_id`, `reply`, `m_id`, `reply_by`, `date_time`) VALUES
(2, 'This is the reply from me!!!!!', '3', '24', '2019-01-08 07:48:41'),
(3, 'This is the reply from me!!!!!', '3', '24', '2019-01-08 08:26:48'),
(4, 'This is the reply from me!!!!!', '3', '24', '2019-01-08 08:28:29'),
(5, 'This is the reply from me!!!!!', '3', '24', '2019-01-08 08:29:09'),
(6, 'This is the reply from me!!!!!', '3', '24', '2019-01-08 08:31:05'),
(7, 'This is the reply from me!!!!!', '3', '24', '2019-01-08 08:32:37'),
(8, 'This is the reply from me!!!!!', '3', '24', '2019-01-08 08:33:37'),
(9, 'This is the reply from me!!!!!', '3', '24', '2019-01-08 08:34:54'),
(10, 'fhfhfhhfjfjf', '3', '24', '2019-01-08 08:35:18'),
(11, 'aaaaaaa', '3', '24', '2019-01-08 08:36:07'),
(12, 'aaaaaaa', '3', '24', '2019-01-08 08:40:19'),
(13, 'ok', '3', '20', '2019-01-08 09:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `department` varchar(1000) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `department`, `role`, `created_on`) VALUES
(20, 'Dinesh', 'dinesh@gmail.com', '12345', 'Web Development', 'admin', '2019-01-07 12:01:35'),
(24, 'Suresh', 'suresh@gmail.com', '12345', 'SEO', 'employee', '2019-01-07 15:10:38'),
(25, 'Mukesh', 'mukesh@gmail.com', '12345', 'SEO', 'employee', '2019-01-07 15:11:06'),
(21, 'Ramesh1', 'ramesh1@gmail.com', '12345', 'Admin', 'admin', '2019-01-07 13:37:43'),
(19, 'Garima kumari', 'garima1@gmail.com', '12345', 'SEO', 'employee', '2019-01-07 13:15:03'),
(26, 'Mona', 'mona@gmail.com', '12345', 'Web Development', 'admin', '2019-01-07 15:11:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
