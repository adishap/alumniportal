-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2014 at 08:31 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

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
  `user_id` varchar(20) NOT NULL,
  `organisation_name` varchar(30) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `starting_address` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `self_employed` tinyint(1) NOT NULL,
  PRIMARY KEY (`s_no`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `alum_master_table`
--

CREATE TABLE IF NOT EXISTS `alum_master_table` (
  `user_id` varchar(20) NOT NULL,
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
  `email_address` varchar(50) NOT NULL,
  `landline_no` varchar(15) NOT NULL,
  `martial_status` varchar(9) NOT NULL,
  `date_of_anniversary` date NOT NULL,
  `image_path` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`s_no`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
