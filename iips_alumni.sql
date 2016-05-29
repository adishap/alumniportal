-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2016 at 07:20 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iips_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `alum_career_info`
--

CREATE TABLE IF NOT EXISTS `alum_career_info` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(20) NOT NULL,
  `organisation_name` varchar(30) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `starting_address` varchar(50) NOT NULL,
  `office_email_id` varchar(50) NOT NULL,
  `self_employed` tinyint(1) NOT NULL,
  PRIMARY KEY (`s_no`),
  UNIQUE KEY `user_id` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `alum_career_info`
--

INSERT INTO `alum_career_info` (`s_no`, `user_email`, `organisation_name`, `job_title`, `country_code`, `country`, `state`, `city`, `starting_address`, `office_email_id`, `self_employed`) VALUES
(1, 'ayushi@gmail.com', 'google', 'sdsd', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `alum_master_table`
--

CREATE TABLE IF NOT EXISTS `alum_master_table` (
  `user_email` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` date NOT NULL,
  `admission_year` int(4) NOT NULL,
  `passing_year` int(4) NOT NULL,
  `course` varchar(15) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `per_country` varchar(30) NOT NULL,
  `per_state` varchar(50) NOT NULL,
  `per_city` varchar(50) NOT NULL,
  `per_starting_address` varchar(50) NOT NULL,
  `per_country_code` varchar(15) NOT NULL,
  `per_pincode` varchar(12) NOT NULL,
  `loc_country` varchar(30) NOT NULL,
  `loc_country_code` varchar(15) NOT NULL,
  `loc_state` varchar(50) NOT NULL,
  `loc_city` varchar(50) NOT NULL,
  `loc_starting_address` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `landline_no` varchar(15) NOT NULL,
  `martial_status` varchar(9) NOT NULL,
  `date_of_anniversary` date NOT NULL,
  `image_path` varchar(150) NOT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alum_master_table`
--

INSERT INTO `alum_master_table` (`user_email`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `admission_year`, `passing_year`, `course`, `roll_no`, `per_country`, `per_state`, `per_city`, `per_starting_address`, `per_country_code`, `per_pincode`, `loc_country`, `loc_country_code`, `loc_state`, `loc_city`, `loc_starting_address`, `mobile_no`, `landline_no`, `martial_status`, `date_of_anniversary`, `image_path`) VALUES
('adi@gmail.com', 'adi', '', 'po', 'female', '1970-01-01', 1990, 1991, 'M.Tech(IT)', '', '', '', '', '', '', '', '', '', '', 'Indore', '', '822sffgg', '', '', '0000-00-00', 'images/Alumni/alumni_profile_picture/adi@gmail.com.jpg'),
('ayushi@gmail.com', 'Ayushi', '', 'Sharma', 'female', '1980-03-04', 1990, 2006, 'M.Tech(IT)', 'IT-2K11-09', 'India', 'MP', 'Indore', '', '', '452010', '', '', '', 'new york', '', 'hdhdcnn', '', 'Unmarried', '1970-01-01', 'images/Alumni/alumni_profile_picture/ayushi@gmail.com.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`s_no`),
  UNIQUE KEY `user_id` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`s_no`, `user_email`, `password`) VALUES
(1, 'adi@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'ayushi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
