-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2024 at 08:15 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hall_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Phone_no` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Email`, `Password`, `Phone_no`) VALUES
(934, 'Emon', 'emon0934@cseku.ac.bd', 'emon', 1712345678);

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

DROP TABLE IF EXISTS `allotment`;
CREATE TABLE IF NOT EXISTS `allotment` (
  `ID` int NOT NULL,
  `roomNo` int NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `allotment`
--

INSERT INTO `allotment` (`ID`, `roomNo`, `checkInDate`, `checkOutDate`) VALUES
(210201, 606, '2024-04-22', '2024-04-30'),
(210202, 111, '2024-04-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
CREATE TABLE IF NOT EXISTS `complain` (
  `complainID` int NOT NULL AUTO_INCREMENT,
  `studentName` varchar(50) NOT NULL,
  `roomNo` int NOT NULL,
  `mobileNo` int NOT NULL,
  `studentEmail` varchar(30) NOT NULL,
  `complainDate` date NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`complainID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complainID`, `studentName`, `roomNo`, `mobileNo`, `studentEmail`, `complainDate`, `details`) VALUES
(1, 'partho', 111, 152150715, 'partho2102@cseku.ac.bd', '2024-04-23', 'Table and Light problem');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `noticeId` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`noticeId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`noticeId`, `title`, `content`, `created_at`) VALUES
(1, 'Notice for seat application', 'you can now apply for seat to this link', '2024-04-23 17:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `seat_application`
--

DROP TABLE IF EXISTS `seat_application`;
CREATE TABLE IF NOT EXISTS `seat_application` (
  `application_id` int NOT NULL AUTO_INCREMENT,
  `studentName` varchar(30) NOT NULL,
  `studentId` int NOT NULL,
  `hall_name` varchar(60) NOT NULL,
  `session` varchar(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `term` varchar(15) NOT NULL,
  `application_date` date NOT NULL,
  `ygpa` varchar(8) NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seat_application`
--

INSERT INTO `seat_application` (`application_id`, `studentName`, `studentId`, `hall_name`, `session`, `gender`, `term`, `application_date`, `ygpa`) VALUES
(1, 'Atikullah Atik', 210220, 'BangoBondhu Sheikh Mujib Hall', '2023-24', 'male', '1', '2024-04-23', '3.67');

-- --------------------------------------------------------

--
-- Table structure for table `seat_change_application`
--

DROP TABLE IF EXISTS `seat_change_application`;
CREATE TABLE IF NOT EXISTS `seat_change_application` (
  `application_id` int NOT NULL AUTO_INCREMENT,
  `studentEmail` varchar(30) NOT NULL,
  `currentRoomNo` int NOT NULL,
  `preferredRoomNo` int NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seat_change_application`
--

INSERT INTO `seat_change_application` (`application_id`, `studentEmail`, `currentRoomNo`, `preferredRoomNo`) VALUES
(1, 'partho2102@cseku.ac.bd', 111, 606);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `ID` int NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone_no` int NOT NULL,
  `Password` varchar(30) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Name`, `Email`, `Phone_no`, `Password`, `user_type`) VALUES
(210201, 'Rahad', 'rahad2102@ku.ac.bd', 152150715, '123', 'Residential Student'),
(210202, 'partho', 'partho2102@cseku.ac.bd', 152150715, '123', 'Residential Student'),
(210220, 'Atikullah Atik', 'atikullah5555@gmail.com', 150771470, '123', 'Non Residential Student'),
(210225, 'Ashik', 'ashik25@cse.ac.bd', 138851118, '123', 'Residential Student'),
(2102226, 'Uma Datta', 'uma@ku.ac.bd', 1723456798, '123', 'Non Residential Student');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
