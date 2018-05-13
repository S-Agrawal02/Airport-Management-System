-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2018 at 02:14 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin01', '123');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE IF NOT EXISTS `airport` (
  `airport_id` varchar(10) NOT NULL,
  `airport_name` varchar(50) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `runways` int(2) DEFAULT NULL,
  PRIMARY KEY (`airport_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airport_id`, `airport_name`, `location`, `runways`) VALUES
('BOM', 'Shivaji', 'Mumbai', 4),
('MAA', 'Chennai International Airport', 'Chennai', 6),
('STV', 'Surat Airport', 'Surat', 2),
('GWL', 'Gwalior', 'Gwalior', 8),
('DEL', 'Delhi', 'New', 4);

-- --------------------------------------------------------

--
-- Table structure for table `crew_master`
--

CREATE TABLE IF NOT EXISTS `crew_master` (
  `member_id` varchar(15) NOT NULL,
  `member_name` varchar(30) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `mobile` bigint(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crew_master`
--

INSERT INTO `crew_master` (`member_id`, `member_name`, `designation`, `mobile`, `email`) VALUES
('AB44', 'Arnav', 'Pilot', 9790052313, 'arnav.bhutani2015@vit.ac.in'),
('SR225', 'Sunayna Ray', 'Manager', 9790055147, 'sunayna.ray2015@vit.ac.in'),
('SA02', 'Shubham Agrawal', 'Pilot', 9585586236, 'shubhamagrawal2011@yahoo.in'),
('SP33', 'Sumit Patil', 'Pilot', 9065448752, 'sumitpatil2515@gmail.com'),
('RB57', 'Rushikesh', 'Pilot', 9585564552, 'rushi.babar2015@vit.ac.in'),
('VA227', 'Vidushi Agrawal', 'Air Hostess', 9132248987, 'vidushi05agrawal@ymail.in'),
('AJ316', 'Aman Jain', 'Air Hostess', 4444444444, 'laddoo.jain@vit.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `flight_crew`
--

CREATE TABLE IF NOT EXISTS `flight_crew` (
  `flight_id` varchar(10) NOT NULL DEFAULT '',
  `member_id` varchar(15) NOT NULL DEFAULT '',
  `dep_airport_id` varchar(10) NOT NULL DEFAULT '',
  `departure_date` date DEFAULT NULL,
  PRIMARY KEY (`flight_id`,`member_id`,`dep_airport_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_crew`
--

INSERT INTO `flight_crew` (`flight_id`, `member_id`, `dep_airport_id`, `departure_date`) VALUES
('IG-640', 'SA02', 'BOM', '2017-09-27'),
('IG-640', 'AB44', 'MAA', '2017-09-07'),
('IG-640', 'SP33', 'BOM', '2017-11-07'),
('Go554', 'SR225', 'IND', '2017-11-13'),
('IG-640', 'SR225', 'MAA', '2017-11-07'),
('JK905', 'RB57', 'BOM', '2017-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `flight_master`
--

CREATE TABLE IF NOT EXISTS `flight_master` (
  `flight_id` varchar(10) NOT NULL,
  `airline` varchar(15) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `capacity` int(3) DEFAULT NULL,
  PRIMARY KEY (`flight_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_master`
--

INSERT INTO `flight_master` (`flight_id`, `airline`, `class`, `capacity`) VALUES
('IG-640', 'Indigo', 'Economy', 150),
('JK905', 'Jet Airways', 'Economy', 150);

-- --------------------------------------------------------

--
-- Table structure for table `flight_schedule`
--

CREATE TABLE IF NOT EXISTS `flight_schedule` (
  `flight_id` varchar(10) NOT NULL DEFAULT '',
  `dep_date` date NOT NULL DEFAULT '0000-00-00',
  `dep_time` time NOT NULL DEFAULT '00:00:00',
  `source_airport_id` varchar(10) NOT NULL DEFAULT '',
  `dest_airport_id` varchar(10) DEFAULT NULL,
  `no_of_passengers` int(3) DEFAULT NULL,
  `runway` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`flight_id`,`dep_date`,`dep_time`,`source_airport_id`),
  UNIQUE KEY `flight_id` (`flight_id`,`dep_date`,`source_airport_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_schedule`
--

INSERT INTO `flight_schedule` (`flight_id`, `dep_date`, `dep_time`, `source_airport_id`, `dest_airport_id`, `no_of_passengers`, `runway`, `status`, `remarks`) VALUES
('Go-554', '2017-10-26', '03:25:00', 'STV', 'STV', 104, 1, 'Ontime', 'done'),
('JK905', '2017-10-23', '06:50:00', 'MAA', 'BOM', 111, 2, 'Ontime', 'sjlnj'),
('JK905', '2017-11-06', '16:40:00', 'DEL', 'GWL', 130, 2, 'Ontime', 'jl'),
('IG-640', '2017-11-08', '12:15:00', 'DEL', 'GWL', 125, 2, 'Ontime', 'done');
