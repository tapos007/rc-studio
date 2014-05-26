-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2014 at 10:31 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studio`
--
CREATE DATABASE IF NOT EXISTS `studio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `studio`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('007ffa6f207710264b411d340c496be7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1400076332, ''),
('47444cb16eea6fd6805295d8f8066b27', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', 1400273651, 'a:5:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"1";s:10:"user_email";s:17:"teacher@r-cis.com";s:8:"username";s:11:"Teacher One";s:6:"status";s:1:"1";}'),
('4ffb9563ea2962cc3bb21b45a2a2adab', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', 1400337091, 'a:5:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"1";s:10:"user_email";s:17:"teacher@r-cis.com";s:8:"username";s:11:"Teacher One";s:6:"status";s:1:"1";}'),
('7f38c4bea4ccdc8c39e8c7a05cba3053', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36', 1400065979, 'a:5:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"1";s:10:"user_email";s:17:"teacher@r-cis.com";s:8:"username";s:11:"Teacher One";s:6:"status";s:1:"1";}'),
('8870c1454a24f98791371bdf169234c7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1400328707, 'a:8:{s:9:"user_data";s:0:"";s:9:"user_role";s:7:"student";s:12:"captcha_word";s:4:"UgAb";s:12:"captcha_time";d:1400076559.28120899200439453125;s:7:"user_id";s:1:"2";s:10:"user_email";s:17:"student@r-cis.com";s:8:"username";s:28:"Mr. Mohammad Student Hossain";s:6:"status";s:1:"1";}'),
('aed25ec9cff3d3b2f639792e917f465d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36', 1399987855, ''),
('c3520765b1c1f1f508e4561910d51055', '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', 1400349754, 'a:5:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"1";s:10:"user_email";s:17:"teacher@r-cis.com";s:8:"username";s:11:"Teacher One";s:6:"status";s:1:"1";}'),
('e025a9b3ac1876f9a58da75a4e63604d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36', 1399987855, '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `msg_messages`
--

CREATE TABLE IF NOT EXISTS `msg_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `priority` int(2) NOT NULL DEFAULT '0',
  `sender_id` text NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `msg_messages`
--

INSERT INTO `msg_messages` (`id`, `thread_id`, `body`, `priority`, `sender_id`, `cdate`) VALUES
(1, 1, 'rrr ', 2, 'teacher@r-cis.com', '2014-05-11 14:02:08'),
(2, 1, 'grrrrrrrrr ', 2, 'teacher@r-cis.com', '2014-05-11 14:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `msg_participants`
--

CREATE TABLE IF NOT EXISTS `msg_participants` (
  `user_id` varchar(100) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg_participants`
--

INSERT INTO `msg_participants` (`user_id`, `thread_id`, `cdate`) VALUES
('student@r-cis.com', 1, '2014-05-11 14:02:08'),
('teacher@r-cis.com', 1, '2014-05-11 14:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `msg_status`
--

CREATE TABLE IF NOT EXISTS `msg_status` (
  `message_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`message_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg_status`
--

INSERT INTO `msg_status` (`message_id`, `user_id`, `status`) VALUES
(1, 'student@r-cis.com', 0),
(1, 'teacher@r-cis.com', 3),
(2, 'student@r-cis.com', 0),
(2, 'teacher@r-cis.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `msg_threads`
--

CREATE TABLE IF NOT EXISTS `msg_threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `msg_threads`
--

INSERT INTO `msg_threads` (`id`, `subject`) VALUES
(1, 'test 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE IF NOT EXISTS `tbl_batch` (
  `BatchID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` text,
  `TeacherID` text,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `SessionDuration` text,
  `NextSessionDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `RatingID` text,
  `IsActive` text,
  `CreatedBy` text,
  `ModifiedBy` text,
  `CreatedOn` datetime DEFAULT NULL,
  `LastModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`BatchID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`BatchID`, `CourseID`, `TeacherID`, `StartDate`, `EndDate`, `SessionDuration`, `NextSessionDate`, `RatingID`, `IsActive`, `CreatedBy`, `ModifiedBy`, `CreatedOn`, `LastModifiedDate`) VALUES
(6, '6', 'mu@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(8, '8', 'mu@r-cis.com', '2014-02-28', '2014-02-28', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'mu@r-cis.com', NULL, NULL, NULL),
(10, '10', 'hossain@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(12, '12', 'qqq@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(13, '13', '777@yahoo.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(34, '34', 'wang@r-cis.com', '2014-10-10', '2014-11-11', '45', '0000-00-00 00:00:00', NULL, 'Yes', 'wang@r-cis.com', NULL, NULL, NULL),
(33, '33', 'wang@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(32, '32', 'uddin@r-cis.com', '2014-01-22', '2014-01-28', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'uddin@r-cis.com', NULL, NULL, NULL),
(31, '31', 'uddin@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(39, '39', 'aa11@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(40, '40', 'aabb@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(41, '41', 'ccaa@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(42, '42', 'ddcc@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(43, '43', 'aacc@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(44, '44', 'acac@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(47, '47', 'arif@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(48, '48', 'rrraa@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(49, '49', 'eee@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(53, '53', 'eee@r-cis.com', '2014-03-29', '2014-03-31', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'eee@r-cis.com', NULL, NULL, NULL),
(52, '52', 'eee@r-cis.com', '2014-03-29', '2014-03-31', '30', '2014-03-26 07:39:03', NULL, 'Yes', 'eee@r-cis.com', NULL, NULL, NULL),
(54, '54', 'eee@r-cis.com', '2014-03-29', '2014-03-31', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'eee@r-cis.com', NULL, NULL, NULL),
(55, '55', 'eee@r-cis.com', '2014-03-29', '2014-03-31', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'eee@r-cis.com', NULL, NULL, NULL),
(56, '56', 'eee@r-cis.com', '2014-03-29', '2014-03-31', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'eee@r-cis.com', NULL, NULL, NULL),
(57, '57', 'eee@r-cis.com', '2014-03-29', '2014-03-31', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'eee@r-cis.com', NULL, NULL, NULL),
(58, '58', 'eee@r-cis.com', '2014-03-29', '2014-03-31', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'eee@r-cis.com', NULL, NULL, NULL),
(59, '59', 'eee@r-cis.com', '2014-03-29', '2014-03-31', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'eee@r-cis.com', NULL, NULL, NULL),
(60, '60', 'eee@r-cis.com', '2014-03-29', '2014-11-11', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'eee@r-cis.com', NULL, NULL, NULL),
(75, '75', 'tapos.aa@gmail.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(76, '76', 'mohammad@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(77, '77', 'ksa@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(78, '78', 'ksa@r-cis.com', '2014-05-01', '2014-05-10', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'ksa@r-cis.com', NULL, NULL, NULL),
(79, '79', 'ksa@r-cis.com', '2014-05-01', '2014-05-10', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'ksa@r-cis.com', NULL, NULL, NULL),
(80, '80', 'arif33@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL),
(87, '87', 'teacher@r-cis.com', '1970-01-01', '1970-01-01', '34', '0000-00-00 00:00:00', NULL, 'Yes', 'teacher@r-cis.com', NULL, NULL, NULL),
(86, '86', 'teacher@r-cis.com', '1970-01-01', '1970-01-01', '34', '0000-00-00 00:00:00', NULL, 'Yes', 'teacher@r-cis.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `Category` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`Category`) VALUES
('Dance'),
('Music'),
('Yoga'),
('Cooking'),
('Others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
  `CourseID` int(11) NOT NULL AUTO_INCREMENT,
  `InstructorID` text NOT NULL,
  `CourseName` text,
  `Category` text,
  `SubCategory` text,
  `Overview` text NOT NULL,
  `TotalHour` text,
  `HourPerSession` text,
  `MaxofStudet` text,
  `QualificationForStudent` text,
  `Requirements` text,
  `VideoLink` text,
  `CouseFree` text,
  `IsActive` text,
  `CreatedBy` text,
  `ModifiedBy` text,
  `CreatedOn` datetime DEFAULT NULL,
  `LastModifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CourseID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`CourseID`, `InstructorID`, `CourseName`, `Category`, `SubCategory`, `Overview`, `TotalHour`, `HourPerSession`, `MaxofStudet`, `QualificationForStudent`, `Requirements`, `VideoLink`, `CouseFree`, `IsActive`, `CreatedBy`, `ModifiedBy`, `CreatedOn`, `LastModifiedDate`) VALUES
(6, 'mu@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(8, 'mu@r-cis.com', 'Yoga', 'Yoga', 'Ananda', 'Kjskdfkn', '2', '30', '5', 'fsdfsf', 'sdfsdf', 'gmail.com', '10', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(10, 'hossain@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(12, 'qqq@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(13, '777@yahoo.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(33, 'wang@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(32, 'uddin@r-cis.com', 'Guitar Advanced', 'Music', 'Guitar', 'How are you', '1', '30', '5', ' Basic ', ' dfd', 'http://www.youtube.com/watch?v=NzX2UEM4kxU', '20', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(31, 'uddin@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(34, 'wang@r-cis.com', 'Keyboard Basic', 'Music', 'Keyboard', 'Wang Hong Ling jing bing. .Wang Hong Ling jing bing. . ', '10', '45', '5', ' Wang Hong Ling jing bing. .', ' Wang Hong Ling jing bing. .Wang Hong Ling jing bing. .', 'http://www.youtube.com/watch?v=6NCvGbDxHd8', '30', 'Yes', NULL, NULL, NULL, '2014-03-19 11:16:03'),
(39, 'aa11@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(40, 'aabb@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(41, 'ccaa@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(42, 'ddcc@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(43, 'aacc@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(44, 'acac@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '5', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-26 16:08:57'),
(47, 'arif@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '1', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-29 02:02:16'),
(48, 'rrraa@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '1', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-29 02:25:43'),
(49, 'eee@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '1', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-03-29 02:31:58'),
(53, 'eee@r-cis.com', 'Chinese Vegetable Soup ', 'Cooking', 'Chinese', 'test', '1', '30', '1', ' ', ' ', 'http://www.youtube.com/watch?v=PxLR-CpLh-0', '20', 'Yes', NULL, NULL, NULL, '2014-03-29 06:21:55'),
(52, 'eee@r-cis.com', 'Keyboard Basic', 'Music', 'Keyboard', 'fff', '1', '30', '1', ' ', ' ', 'http://www.youtube.com/watch?v=PxLR-CpLh-0', '20', 'Yes', NULL, NULL, NULL, '2014-03-29 06:13:13'),
(54, 'eee@r-cis.com', 'Guitar', 'Music', 'Guitar', 'dd', '1', '30', '1', ' ', ' ', 'http://www.youtube.com/watch?v=PxLR-CpLh-0', '20', 'Yes', NULL, NULL, NULL, '2014-03-29 07:30:59'),
(55, 'eee@r-cis.com', 'Tabla', 'Music', 'Drums', 'dddd', '1', '30', '1', ' ', ' ', 'http://www.youtube.com/watch?v=6NCvGbDxHd8', '20', 'Yes', NULL, NULL, NULL, '2014-03-29 07:37:23'),
(56, 'eee@r-cis.com', 'Keyboard Basic', 'Music', 'Mandolin', ' ', '1', '30', '1', ' ', ' ', 'http://www.youtube.com/watch?v=PxLR-CpLh-0', '20', 'Yes', NULL, NULL, NULL, '2014-03-29 07:40:13'),
(57, 'eee@r-cis.com', 'Harmoniam', 'Music', 'Banjo', ' ', '1', '30', '1', ' ', ' ', '', '20', 'Yes', NULL, NULL, NULL, '2014-03-29 07:46:28'),
(58, 'eee@r-cis.com', 'XXX', 'Dance', 'Tango', ' ', '1', '30', '1', ' ', ' ', '', '20', 'Yes', NULL, NULL, NULL, '2014-03-29 08:14:14'),
(59, 'eee@r-cis.com', 'XXX', 'Music', 'Mandolin', ' ', '1', '30', '1', ' ', ' ', '', '20', 'Yes', NULL, NULL, NULL, '2014-03-29 08:15:24'),
(60, 'eee@r-cis.com', 'ZZZ', 'Dance', 'Tango', '<font face="Arial, Verdana"><span style="font-size: 13px;">preg_replace("/&lt;([a-z][a-z0-9]*)[^&gt;]*?(\\/?)&gt;/i",''&lt;$1$2&gt;'', $notification-&gt;Notification);preg_replace("/&lt;([a-z][a-z0-9]*)[^&gt;]*?(\\/?)&gt;/i",''&lt;$1$2&gt;'', $notification-&gt;Notification);preg_replace("/&lt;([a-z][a-z0-9]*)[^&gt;]*?(\\/?)&gt;/i",''&lt;$1$2&gt;'', $notification-&gt;Notification);</span></font>', '1', '30', '1', '<font face="Arial, Verdana"><span style="font-size: 13px;">preg_replace("/&lt;([a-z][a-z0-9]*)[^&gt;]*?(\\/?)&gt;/i",''&lt;$1$2&gt;'', $notification-&gt;Notification);preg_replace("/&lt;([a-z][a-z0-9]*)[^&gt;]*?(\\/?)&gt;/i",''&lt;$1$2&gt;'', $notification-&gt;Notification);</span></font>', ' ', 'http://www.youtube.com/watch?v=PxLR-CpLh-0', '20', 'Yes', NULL, NULL, NULL, '2014-03-29 09:13:06'),
(75, 'tapos.aa@gmail.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '1', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-04-23 02:41:52'),
(76, 'mohammad@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '1', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-04-27 00:58:57'),
(77, 'ksa@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '1', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-04-27 01:02:24'),
(78, 'ksa@r-cis.com', 'Keyboard Basic', 'Music', 'Keyboard', '            Overview                                                                        ', '9', '30', '10', ' \n     \n     \n    Qualification                                                                        ', '            Requirremtns                                                                        ', 'http://www.youtube.com/watch?v=PxLR-CpLh-0', '10', 'Yes', NULL, NULL, NULL, '2014-04-27 02:31:33'),
(79, 'ksa@r-cis.com', 'Chinese Vegetable Soup ', 'Cooking', 'Breakfast', 'Cooking overview', '9', '30', '9', 'Cooking Qulification', 'Basic Cooking', 'http://www.youtube.com/watch?v=6NCvGbDxHd8', '11', 'Yes', NULL, NULL, NULL, '2014-04-27 01:31:12'),
(80, 'arif33@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '1', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-05-10 02:37:58'),
(87, 'teacher@r-cis.com', 'pagol banano2', 'Music', 'Mandolin', 'fdfdf', '5', '34', '12', 'dsfsd', 'sdfsd', '', '12', 'Yes', NULL, NULL, NULL, '2014-05-17 20:28:27'),
(86, 'teacher@r-cis.com', 'pagol banano1', 'Dance', 'Folk', 'sdfsd', '4', '34', '12', 'sdf', 'sdfsd', '', '12', 'Yes', NULL, NULL, NULL, '2014-05-17 20:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

CREATE TABLE IF NOT EXISTS `tbl_education` (
  `EducationID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` text,
  `Institute` text,
  `Degree` text,
  `Major` text,
  `StartYear` text,
  `EndYear` text,
  PRIMARY KEY (`EducationID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`EducationID`, `UserID`, `Institute`, `Degree`, `Major`, `StartYear`, `EndYear`) VALUES
(1, 'teacher@r-cis.com', 'National ', 'CPANN', 'Auditing & Taxation', '1996', NULL),
(2, 'teacher@r-cis.com', '222', 'yyy', '222', '2222', NULL),
(3, 'mu@r-cis.com', 'AS', 'SDf', 'SF', '1950', NULL),
(4, 'teacher@r-cis.com', '666', '666', '666', '1950', NULL),
(5, 'uddin@r-cis.com', 'National ', 'CPANN', 'Auditing & Taxation', '2010', NULL),
(6, 'wang@r-cis.com', 'MIST', 'BSc', 'Computer Science', '1962', NULL),
(7, 'wang@r-cis.com', 'BIST', 'Masters', 'Musical Instrument', '1993', NULL),
(8, 'eee@r-cis.com', 'National ', 'CPANN', 'Auditing & Taxation', '2009', NULL),
(9, 'ksa@r-cis.com', 'National ', 'CPANN', 'Auditing & Taxation', '1990', NULL),
(10, 'student@r-cis.com', 'National ', 'CPANN', 'Auditing & Taxation', '1996', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE IF NOT EXISTS `tbl_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `process` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`id`, `code`, `subject`, `message`, `process`) VALUES
(1, '101', 'Registration Success', '\r\nThanks for registering with Studionear! Please click the link below to activate your instructor profile:\r\n<br/><br/>\r\n[link]\r\n', 'Registration Teacher Success'),
(2, '102', 'Registration Failed', '', 'Registration Teacher Failed'),
(3, '103', 'Profile Incomplete', '', 'If Profile Not Complete '),
(4, '104', 'Create First Course ', '', 'Create Course First Time Check'),
(5, '105', 'Create Course Success', '\r\nYou just successfully created a course on Studionear. Here are the details:\r\n<br/><br/>\r\nCourse Name: [course_name]\r\n<br/>\r\nCategory: [category]\r\n<br/>\r\nSubcategeory: [subcategory]\r\n<br/>\r\n\r\nFees per student: [fees]\r\n<br/><br/><br/>\r\n[link] \r\n<br/>\r\nThis course is now visible to all users.  Click on the link above to view or edit the details of the course. \r\n\r\n', 'Create Course Success'),
(6, '106', 'Create Course Failed', '', 'Create Course Failed'),
(7, '107', 'Change Next Session Date Time Success', '', 'Change Next Session Date Time Success'),
(8, '108', 'Change Next Session Date Time Failed', '', 'Change Next Session Date Time Failed'),
(9, '109', 'Start Session Success', '', 'Start Session Success'),
(10, '110', 'Start Session Failed', '', 'Start Session Failed'),
(11, '111', 'Update Course Info Success', 'You just successfully updated one of your courses on Studionear. Here are the details:\r\n<br/><br/>\r\nCourse Name:[course_name]\r\n<br/>\r\nCategory: [category]\r\n<br/>\r\nSubcategeory: [subcategory]\r\n<br/>\r\nDate & Time: [date_time]\r\n<br/>\r\nFees per student: [fees]\r\n<br/>\r\n\r\n[link] to access the course page<br /><br /><br />\r\n', 'Edit Course Success'),
(12, '112', 'Update Course Info Failed', '', 'Edit Course Failed'),
(13, '113', 'End Course Rate Students Success', 'You just successfully completed one of your courses on Studionear. Here are the details:\r\n<br/><br/>\r\nCourse Name:[course_name]\r\n<br/>\r\nCategory: [category]\r\n<br/>\r\nSubcategeory: [subcategory]\r\n<br/>\r\nStart Date & Time: [start_date_time]\r\n<br/>\r\nEnd Date & Time: [end_date_time]\r\n<br/>\r\n<br />\r\n[link] to access the ratings page\r\n<br/><br />\r\nWay to go!<br/><br/>\r\n', 'End Course Rate Students Success'),
(14, '114', 'End Course Rate Students Failed', '', 'End Course Rate Students Failed'),
(15, '115', 'Message All Students Success', 'Your message below was sent to one or more of your students:\r\n<br/><br/>\r\nMessage recipients: [recipients]\r\n<br/>\r\nMessage Subject: [subject]\r\n<br/>\r\n[message]\r\n<br/><br/>\r\n\r\n\r\n\r\n[link]\r\n\r\n', 'Message All Student Success'),
(16, '116', 'Message All Students Failed', '', 'Message All Student Failed'),
(17, '117', 'Edit Profile Teacher Success', '', 'Edit Profile Teacher Success'),
(18, '118', 'Edit Profile Teacher Failed', '\r\nYou just accepted a registration request from [student_name]. Here are the details:\r\n<br/><br/>\r\nCourse Name: [course name]\r\n<br/>\r\nStart Date & Time: [Start_Date_Time]\r\n<br/>\r\nEnd Date & Time: [End_Date_Time]\r\n<br/>\r\nNumber of sessions: [Number_of_sessions]\r\n<br/>\r\nCourse Fee: [Course_Fee]\r\n<br/>\r\nRequest Status: Accepted!\r\n<br/><br/>\r\n\r\nClick here to view your courses and make changes.\r\n', 'Edit Profile Teacher Failed'),
(19, '119', 'Set Preference Success', '', 'Set Preference Success'),
(20, '120', 'Set Preference Failed', '', 'Set Preference Failed'),
(21, '201', 'Registration Success', 'Thanks for registering with Studionear! Please [click] the link below to activate your student profile:\r\n<br/><br/>\r\n[link]\r\n\r\n\r\n', 'Registration Student Success'),
(22, '202', 'Registration Failed', '', 'Registration Student Failed'),
(23, '203', 'Profile Incomplete', '', 'If Profile Not Complete '),
(24, '204', 'Join Session Success', '', 'Join Session Success'),
(25, '205', 'Join Session Failed', '', 'Join Session Failed'),
(26, '206', 'Course Purchase Success', 'Your registration for the course listed below is pending the instructor''s acceptance:\r\n<br/><br/>\r\nCourse Name: [course_name]\r\n<br/>\r\nCategory: [category]\r\n<br/>\r\nSubcategeory: [subcategory]\r\n<br/>\r\nStart Date: [start_date_time]\r\n<br/>\r\nFees: [fees]\r\n<br/><br/>\r\n\r\nWe will notify you as soon as the instructor accepts your request.<br /><br />\r\n[link]\r\n', 'Course Purchase/Signup Success'),
(27, '207', 'Course Purchase Failed', '', 'Course Purchase/Signup Failed'),
(28, '208', 'Rate Teacher Success', 'You just successfully completed a course and rated your instructor on Studionear. Here are the details:\r\n<br/><br/>\r\nCourse Name: [course_name]\r\n<br/>\r\nCategory: [category]\r\n<br/>\r\nSubcategeory: [subcategory]\r\n<br/>\r\nStart Date & Time: [start_date_time]\r\n<br/>\r\nEnd Date & Time: [end_date_time]\r\n<br/>\r\nTotal Fees: [fees]\r\n<br/>\r\n\r\n[link]\r\n<br/>\r\nWay to go!<br/><br/>\r\n', 'Rate Teacher Success'),
(29, '209', 'Rate Teacher Failed', '', 'Rate Teacher Failed'),
(30, '301', 'Unregistered User Send Message Failed', '', 'Unregistered User Send Message Failed'),
(31, '301', 'Unregistered Signup Failed', '', 'Unregistered Signup Failed'),
(32, '401', 'Try to Access Unauthorized AnyOne', '', 'Try to Access Unauthorized AnyOne'),
(33, '402', 'Try to Access Wrong URL AnyOne', '', 'Try to Access Wrong URL AnyOne'),
(34, '403', 'Site Down for Maintenance', '\r\nStudionear will be down for maintenance starting 1/1/1111 11:00 pm through 1/2/1111 3:00 am. \r\nDuring this time, several functionalities on the website will be turned off. Please schedule your use accordingly. \r\n<br/><br/>\r\nWe apologize for any inconvenience this may cause and we hope you''ll like the recharged Studionear website post maintenance. Thanks for your patience.\r\n\r\n', 'Site Down for Maintenance'),
(35, '501', 'Password Recovery Success', 'Thanks for contacting us regarding retrieving your password.\r\nBelow you''ll find the information you requested:\r\n<br/><br/>\r\n<u>Your login info:</u>\r\n<br/>\r\nEmail: [email]\r\n<br/>\r\nPassword: [123456]\r\n<br/>\r\n[link]\r\n', 'Password Recovery Success'),
(36, '502', 'Password Recovery Failed', '', 'Password Recovery Failed'),
(37, '503', 'User Activatioin Success', '', 'User Activatioin Success'),
(38, '504', 'User Activatioin Failed', '', 'User Activatioin Failed'),
(39, '210', 'Request Demo Session Success', '', 'Request Demo Session Success'),
(40, '211', 'Request Demo Session Failed', '', 'Request Demo Session Failed'),
(41, '121', 'Profile Activation Success', '\r\n\r\nWe are so glad that you’ve chosen to become an instructor on Studionear.\r\n<br/><br/>\r\nWe believe that you have decided to become a part of Studionear because you have a knack for art and you want to share it with the world while earning a few bucks. And we are here to help you do just that!\r\n<br/><br/>\r\nYour login info:\r\nEmail: [email]\r\nPassword: [123456]\r\nSTUDIONEAR LOGIN PAGE LINK\r\n<br/><br/>\r\nIMPORTANT\r\nPlease make sure to complete your profile. Here’s what you can do to improve your chances of showing up in search results and encourage potential students to sign up for classes you have to offer:\r\n·        Add a brief description about yourself\r\n·        Enter your education and experience\r\n·        Include links to your video \r\n·        Setup search preferences and keywords in your profile. For e.g. If you teach salsa dance, you can enter the keyword “Salsa”, or select Salsa in the Set Preference page in your profile settings. This will make your profile appear in the search result anytime a student searches for a salsa instructor.\r\n\r\nPlease feel free to contact us with any questions or suggestions you have. You can send us a message or live chat with our expert on the website. We’re all ears! :D\r\n<br/><br/>\r\nGood Luck!\r\n\r\n\r\n', 'Profile Activation Success'),
(42, '122', 'Profile Activation Failure', '', 'Profile Activation Failure'),
(43, '214', 'Profile Activation Success', 'We are so glad that you’ve decided to join Studionear.\r\n<br/><br/>\r\nWe believe that you want to learn a form of art and we are here to help you do just that!\r\n<br/>\r\nYour login info:\r\n<br/>\r\nEmail: [email]\r\n<br/>\r\nPassword: [123456]\r\n<br/>\r\nSTUDIONEAR LOGIN PAGE LINK\r\n<br/><br/>\r\nPlease feel free to contact us with any questions or suggestions you have. You can send us a message or live chat with our expert on the website. We’re all ears! :D\r\n<br/><br/>\r\nGood Luck!\r\n', 'Profile Activation Success'),
(44, '215', 'Profile Activation Failure', '', 'Profile Activation Failure'),
(45, '123', 'Approve Demo Session Success', 'You just approved a demo request from [student name]. Here are the details:\r\n<br/><br/>\r\nStudent Name: [student_name]\r\n<br/>\r\nRequested Date & Time: [date_time]\r\n<br/>\r\nDemo duration: [demo_duration]\r\n<br/>\r\nRequest Status: Approved!\r\n<br/><br/>\r\n\r\n[link]<br/><br/>\r\n', 'Approve Demo Session Success'),
(46, '212', 'Approve Demo Session Success', '[instructor_name] just accepted your demo request. Here are the details:\r\n<br/><br/>\r\nInstructor Name: [instructor_name]\r\n<br/>\r\nRequested Date & Time: [date_time]\r\n<br/>\r\nDemo duration: [demo_duration]\r\n<br/>\r\nStatus: Accepted!\r\n<br/><br/>\r\n\r\n[link]\r\n', 'Approve Demo Session Success'),
(47, '124', 'Approve Demo Session Failed', '', 'Approve Demo Session Failed'),
(48, '125', 'Reject Demo Session Success', 'You just denied a demo request from [student_name]. Here are the details of the request:\r\n<br/><br/>\r\nStudent Name: [student_name]\r\n<br/>\r\nRequested Date & Time: [requested_date_time]\r\n<br/>\r\nDemo duration: [demo_duration]\r\n<br/>\r\nRequest Status: Denied!\r\n<br/><br/>\r\n[link] to view the demo request and make changes.', 'Reject Demo Session Success'),
(49, '213', 'Reject Demo Session Success', 'We''re sorry, [Instructor_Name] has denied your request for a demo. \r\n<br/><br/>\r\n[link] here to message [Instructor''s_First_Name] and make another request. ', 'Reject Demo Session Success'),
(50, '126', 'Reject Demo Session Failed', '', 'Reject Demo Session Failed'),
(51, '127', 'Course Signup Request Email', ' [student_name] just requested to sign up for your course [link].  \r\n<br/><br/>\r\nThe registration and payment are pending your acceptance. Please [link1] to accept or reject the request.\r\n', 'Course Signup Request Email'),
(52, '128', 'Accept student signup request Success', 'You just accepted a registration request from [student_name]. Here are the details:\r\n<br/><br/>\r\nCourse Name: [course_name]\r\n<br/>\r\nStart Date & Time: [start_date_time]\r\n<br/>\r\nEnd Date & Time: [end_date_time]\r\n<br/>\r\nNumber of sessions: [number_of_sessions]\r\n<br/>\r\nCourse Fee: [fees]\r\n<br/>\r\nRequest Status: Accepted!\r\n<br/><br/>\r\n[link] here to view your courses and make changes.\r\n\r\n', 'Accept student signup request Success'),
(53, '129', 'Accept student signup request Failed', '', 'Accept student signup request Failed'),
(54, '130', 'Reject student signup request Success', 'You just rejected a registration request from [student_name]. Here are the details of the request:\r\n<br/><br/>\r\nCourse Name: [course_name]\r\n<br/>\r\nStart Date & Time: [start_date_time]\r\n<br/>\r\nEnd Date & Time: [end_date_time]\r\n<br/>\r\nNumber of sessions: [number_of_sessions]\r\n<br/>\r\nCourse Fee: [fees]\r\n<br/>\r\nRequest Status: Denied!\r\n<br/><br/>\r\n[link] to view your courses and make changes.\r\n', 'Reject student signup request Success'),
(55, '131', 'Reject student signup request Failed', '', 'Reject student signup request Failed'),
(56, '216', 'Payment processing success', 'Thanks for your payment. You’ve just signed up for the “[course_name]” session with “[Instructor_Name]”. Below is your payment receipt:\r\n<br/><br/>\r\n[RECEIPT]\r\n', 'Payment processing success'),
(57, '217', 'Payment processing failed', 'Your payment for the “[course_name]” session with “[Instructor_Name]” could not be processed. You will not be registered for the course until your payment is received. Please click on the link below to verify your payment information and complete your payment.\r\n<br/><br/>\r\n[link]\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Payment processing failed'),
(58, '218', 'Accept student signup request Success', 'You’ve just signed up for [course_name] with [instructor_name]. Below are the course details:\r\n<br/><br/>\r\nCourse Name: [course_name]\r\n<br/>\r\nStart Date & Time: [start_date_time]\r\n<br/>\r\nEnd Date & Time: [end_date_time]\r\n<br/>\r\nNumber of sessions: [number_of_sessions]\r\n<br/>\r\n\r\n[link] to view the course page.', 'Accept student signup request Success'),
(59, '219', 'Reject student signup request Success', 'We''re sorry, [instructor_name] has denied your request to signup for his course [course_name]. \r\n<br/>\r\nYour credit card was not processed because you weren''t registered for the course.\r\n<br/>\r\n[link] here to message [instructor_name] and make another request. \r\n', 'Reject student signup request Success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollment_record`
--

CREATE TABLE IF NOT EXISTS `tbl_enrollment_record` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` text NOT NULL,
  `BatchID` text,
  `TeacherID` text,
  `StudentID` text,
  `DateOfEnrollment` datetime DEFAULT NULL,
  `AcceptNote` text,
  `RejectNote` text,
  `ModifiedBy` text,
  `ModifiedOn` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_enrollment_record`
--

INSERT INTO `tbl_enrollment_record` (`ID`, `CourseID`, `BatchID`, `TeacherID`, `StudentID`, `DateOfEnrollment`, `AcceptNote`, `RejectNote`, `ModifiedBy`, `ModifiedOn`) VALUES
(1, '2', '2', 'teacher@r-cis.com', 'student@r-cis.com', '2014-05-10 12:53:35', 'ddd ', NULL, NULL, '2014/05/10 12:53:35'),
(2, '2', 'assets', NULL, 'student@r-cis.com', '2014-05-10 12:46:12', NULL, NULL, NULL, '2014/05/10 12:46:12'),
(3, '4', '4', 'teacher@r-cis.com', 'student@r-cis.com', '2014-05-10 12:52:51', '1 ', NULL, NULL, '2014/05/10 12:52:51'),
(4, '4', 'assets', NULL, 'student@r-cis.com', '2014-05-10 12:50:04', NULL, NULL, NULL, '2014/05/10 12:50:04'),
(5, '4', '4', 'teacher@r-cis.com', 'student@r-cis.com', '2014-05-10 12:52:51', '1 ', NULL, NULL, '2014/05/10 12:52:51'),
(6, '4', 'assets', NULL, 'student@r-cis.com', '2014-05-10 12:52:00', NULL, NULL, NULL, '2014/05/10 12:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_experience`
--

CREATE TABLE IF NOT EXISTS `tbl_experience` (
  `ExperienceID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` text,
  `Position` text,
  `Employer` text,
  `StartYear` text,
  `EndYear` text,
  PRIMARY KEY (`ExperienceID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` text NOT NULL,
  `Notification` text NOT NULL,
  `Status` text NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`ID`, `Email`, `Notification`, `Status`, `DateTime`) VALUES
(1, '0', 'Course Another Time Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-10 00:46:11'),
(2, '0', 'Course Another Time Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-10 00:46:11'),
(3, '0', 'Course Another Time Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-10 00:46:12'),
(4, '0', 'Course Another Time Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-10 00:46:12'),
(5, '0', 'Course Unpublish Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-10 00:50:03'),
(6, '0', 'Course Unpublish Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-10 00:50:03'),
(7, '0', 'Course Unpublish Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-10 00:50:04'),
(8, '0', 'Course Unpublish Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-10 00:50:04'),
(9, '0', 'Course Unpublish Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-10 00:52:00'),
(10, '0', 'Course Unpublish Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-10 00:52:00'),
(11, '0', 'Course Unpublish Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-10 00:52:00'),
(12, '0', 'Course Unpublish Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-10 00:52:00'),
(13, 'student@r-cis.com', 'Signed up for Unpublish Test', 'Un-Read', '2014-05-10 00:52:55'),
(14, 'teacher@r-cis.com', 'Mr. Mohammad Student Hossain''s signup request approved.', 'Un-Read', '2014-05-10 00:52:55'),
(15, 'student@r-cis.com', 'Signed up for Another Time Test', 'Un-Read', '2014-05-10 00:53:39'),
(16, 'teacher@r-cis.com', 'Mr. Mohammad Student Hossain''s signup request approved.', 'Un-Read', '2014-05-10 00:53:39'),
(17, 'teacher@r-cis.com', '<a href="http://localhost/studio_1/teacher/view_course/81/81">Created Tanvirs Time Test successfully.</a>', 'Un-Read', '2014-05-11 09:53:32'),
(18, 'teacher@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-11 12:13:32'),
(19, 'student@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-11 12:13:32'),
(20, 'student@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-11 12:13:32'),
(21, 'teacher@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-11 12:13:38'),
(22, 'student@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-11 12:13:38'),
(23, 'student@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-11 12:13:38'),
(24, 'teacher@r-cis.com', 'Sent message to students', 'Un-Read', '2014-05-11 14:02:09'),
(25, 'teacher@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-17 11:04:23'),
(26, 'student@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-17 11:04:23'),
(27, 'student@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-17 11:04:23'),
(28, 'teacher@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-17 11:04:25'),
(29, 'student@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-17 11:04:25'),
(30, 'student@r-cis.com', 'Unpublish+Test session started!', 'Un-Read', '2014-05-17 11:04:25'),
(31, 'teacher@r-cis.com', '<a href="http://localhost/studio_1/teacher/view_course/82/82">Created pagol banano successfully.</a>', 'Un-Read', '2014-05-17 19:17:39'),
(32, 'teacher@r-cis.com', '<a href="http://localhost/studio_1/teacher/view_course/83/83">Created pagol banano1 successfully.</a>', 'Un-Read', '2014-05-17 19:24:40'),
(33, 'teacher@r-cis.com', '<a href="http://localhost/studio_1/teacher/view_course/84/84">Created pagol banano2 successfully.</a>', 'Un-Read', '2014-05-17 19:31:54'),
(34, 'teacher@r-cis.com', '<a href="http://localhost/studio_1/teacher/view_course/85/85">Created pagol banano3 successfully.</a>', 'Un-Read', '2014-05-17 19:34:59'),
(35, 'teacher@r-cis.com', '<a href="http://localhost/studio_1/teacher/view_course/86/86">Created pagol banano1 successfully.</a>', 'Un-Read', '2014-05-17 20:03:07'),
(36, 'teacher@r-cis.com', 'FIRST session message!', 'Un-Read', '2014-05-17 20:28:28'),
(37, 'teacher@r-cis.com', '<a href="http://localhost/studio_1/teacher/view_course/87/87">Created pagol banano2 successfully.</a>', 'Un-Read', '2014-05-17 20:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paypal_auth_capture_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_paypal_auth_capture_detail` (
  `authorizationid` text NOT NULL,
  `timestamp1` text NOT NULL,
  `correlationid` text NOT NULL,
  `ack` text NOT NULL,
  `build` text NOT NULL,
  `l_errorcode0` text NOT NULL,
  `l_shortmessage0` text NOT NULL,
  `l_longmessage0` text NOT NULL,
  `l_severitycode0` text NOT NULL,
  `transactionid` text NOT NULL,
  `parenttransactionid` text NOT NULL,
  `receiptid` text NOT NULL,
  `transactiontype` text NOT NULL,
  `paymenttype` text NOT NULL,
  `ordertime` text NOT NULL,
  `amt` text NOT NULL,
  `feeamt` text NOT NULL,
  `taxamt` text NOT NULL,
  `currencycode` text NOT NULL,
  `paymentstatus` text NOT NULL,
  `pendingreason` text NOT NULL,
  `reasoncode` text NOT NULL,
  `protectioneligibility` text NOT NULL,
  `protectioneligibilitytype` text NOT NULL,
  `invnum` text NOT NULL,
  `note` text NOT NULL,
  `softdescriptor` text NOT NULL,
  `student_id` text NOT NULL,
  `course_id` text NOT NULL,
  `batch_id` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paypal_auth_capture_detail`
--

INSERT INTO `tbl_paypal_auth_capture_detail` (`authorizationid`, `timestamp1`, `correlationid`, `ack`, `build`, `l_errorcode0`, `l_shortmessage0`, `l_longmessage0`, `l_severitycode0`, `transactionid`, `parenttransactionid`, `receiptid`, `transactiontype`, `paymenttype`, `ordertime`, `amt`, `feeamt`, `taxamt`, `currencycode`, `paymentstatus`, `pendingreason`, `reasoncode`, `protectioneligibility`, `protectioneligibilitytype`, `invnum`, `note`, `softdescriptor`, `student_id`, `course_id`, `batch_id`) VALUES
('8DB51366R77216036', '2014-05-10T12:52:56Z', 'd12a353e3a639', 'SuccessWithWarning', '10952652', '10215', 'Soft Descriptor truncated', 'The soft descriptor passed in was truncated', 'Warning', '3UD20801Y4535512Y', '8DB51366R77216036', '3853-6699-8588-1287', 'cart', 'instant', '2014-05-10T12:52:55Z', '23.00', '0.97', '0.00', 'USD', 'Completed', 'None', 'None', 'Ineligible', 'None', '1399726371', 'You have purchased a course from STUDIO NEAR, LLC.', 'STUDIO NEAR, LLC', 'student@r-cis.com', '4', '4'),
('2MF129099Y038271H', '2014-05-10T12:53:39Z', 'c5abd5d7b7b1', 'SuccessWithWarning', '10952652', '10215', 'Soft Descriptor truncated', 'The soft descriptor passed in was truncated', 'Warning', '1TC55799BD423652M', '2MF129099Y038271H', '1290-4540-8969-3390', 'cart', 'instant', '2014-05-10T12:53:39Z', '10.00', '0.59', '0.00', 'USD', 'Completed', 'None', 'None', 'Ineligible', 'None', '1399726415', 'You have purchased a course from STUDIO NEAR, LLC.', 'STUDIO NEAR, LLC', 'student@r-cis.com', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paypal_transaction_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_paypal_transaction_detail` (
  `timestamp1` text NOT NULL,
  `correlationid` text NOT NULL,
  `ack` text NOT NULL,
  `build` text NOT NULL,
  `l_errorcode0` text NOT NULL,
  `l_shortmessage0` text NOT NULL,
  `l_longmessage0` text NOT NULL,
  `l_severitycode0` text NOT NULL,
  `l_errorparamid0` text NOT NULL,
  `l_errorparamvalue0` text NOT NULL,
  `amount` text NOT NULL,
  `currencycode` text NOT NULL,
  `avscode` text NOT NULL,
  `cvv2match` text NOT NULL,
  `transactionid` text NOT NULL,
  `errors` text NOT NULL,
  `buttonsource` text NOT NULL,
  `signature` text NOT NULL,
  `ipaddress` text NOT NULL,
  `returnfmfdetails` text NOT NULL,
  `creditcardtype` text NOT NULL,
  `acct` text NOT NULL,
  `expdate` text NOT NULL,
  `cvv2` text NOT NULL,
  `salutation` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `countrycode` text NOT NULL,
  `zip` text NOT NULL,
  `phonenum` text NOT NULL,
  `student_id` text NOT NULL,
  `course_id` text NOT NULL,
  `batch_id` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paypal_transaction_detail`
--

INSERT INTO `tbl_paypal_transaction_detail` (`timestamp1`, `correlationid`, `ack`, `build`, `l_errorcode0`, `l_shortmessage0`, `l_longmessage0`, `l_severitycode0`, `l_errorparamid0`, `l_errorparamvalue0`, `amount`, `currencycode`, `avscode`, `cvv2match`, `transactionid`, `errors`, `buttonsource`, `signature`, `ipaddress`, `returnfmfdetails`, `creditcardtype`, `acct`, `expdate`, `cvv2`, `salutation`, `firstname`, `lastname`, `street`, `city`, `state`, `countrycode`, `zip`, `phonenum`, `student_id`, `course_id`, `batch_id`, `status`) VALUES
('2014-05-10T12:46:11Z', '51da7dd88e93b', 'SuccessWithWarning', '10762035', '10571', 'Transaction approved but with invalid CSC format.', 'This transaction was approved. However, the Card Security Code provided had too few, too many, or invalid character types but, as per your account option settings, was not required in the approval process.', 'Warning', 'ProcessorResponse', '0000', '10.00', 'USD', 'X', 'M', '2MF129099Y038271H', '', 'AngellEYE_PHPClass', '', '127.0.0.1', '1', 'Amex', '374638525834094', '042019', '123', 'Mrs.', 'Kazi', 'Murshed', 'Address1', 'City', 'Rhode Island', 'US', 'ZiP007', '0181919291', 'student@r-cis.com', '2', '2', 1),
('2014-05-10T12:50:04Z', '47b5eda119c50', 'SuccessWithWarning', '10762035', '10571', 'Transaction approved but with invalid CSC format.', 'This transaction was approved. However, the Card Security Code provided had too few, too many, or invalid character types but, as per your account option settings, was not required in the approval process.', 'Warning', 'ProcessorResponse', '0000', '23.00', 'USD', 'X', 'M', '8DB51366R77216036', '', 'AngellEYE_PHPClass', '', '127.0.0.1', '1', 'Amex', '374638525834094', '042019', '123', 'Mrs.', 'Kazi', 'Murshed', 'Address1', 'City', 'Rhode Island', 'US', 'ZiP007', '0181919291', 'student@r-cis.com', '4', '4', 1),
('2014-05-10T12:52:00Z', '894e9dddb7245', 'SuccessWithWarning', '10762035', '10571', 'Transaction approved but with invalid CSC format.', 'This transaction was approved. However, the Card Security Code provided had too few, too many, or invalid character types but, as per your account option settings, was not required in the approval process.', 'Warning', 'ProcessorResponse', '0000', '23.00', 'USD', 'X', 'M', '70R22599R67644355', '', 'AngellEYE_PHPClass', '', '127.0.0.1', '1', 'Amex', '374638525834094', '042019', '123', 'Mrs.', 'Kazi', 'Murshed', 'Address1', 'City', 'Rhode Island', 'US', 'ZiP007', '0181919291', 'student@r-cis.com', '4', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_profile` (
  `UserID` varchar(100) NOT NULL,
  `Picture` text,
  `TimeZone` varchar(10) NOT NULL DEFAULT 'UP600',
  `DayLightSaving` tinyint(4) NOT NULL,
  `Address` text,
  `Address1` text,
  `City` text NOT NULL,
  `State` text,
  `zipCode` text,
  `Country` text,
  `Phone` text,
  `Mobile` text,
  `AlternateEmail` text,
  `DoB` date NOT NULL,
  `Language` text,
  `YearOfExperince` text,
  `Overview` text,
  `EducationID` text,
  `ExperienceID` text,
  `OtherQualification` text,
  `VideoLinks` text,
  `RatePerHour` text,
  `CreatedBy` text,
  `ModifiedBy` text,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`UserID`, `Picture`, `TimeZone`, `DayLightSaving`, `Address`, `Address1`, `City`, `State`, `zipCode`, `Country`, `Phone`, `Mobile`, `AlternateEmail`, `DoB`, `Language`, `YearOfExperince`, `Overview`, `EducationID`, `ExperienceID`, `OtherQualification`, `VideoLinks`, `RatePerHour`, `CreatedBy`, `ModifiedBy`, `CreatedOn`, `LastModifiedDate`) VALUES
('teacher@r-cis.com', 'd08d1831b3c0b8f777a03e29cba1c04c.jpg', 'UM8', 0, 'Address1', 'Address2', 'City2', 'RI', '2222', 'United States', '019151162222', '01974116222', 'altemai222l@alt.com', '1992-09-16', 'English', '4', '                                                                        My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. My overview is good. <div><br></div><div>My overview is good. <span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. </span><span>My overview is good. 222</span></div>                                                                ', NULL, NULL, ' Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad...222                                                   ', 'http://youtube.com/watch/2SRMg_K_ILg', '10', NULL, 'Teacher One', '2014-02-15 03:20:35', '2014-05-01 22:23:29'),
('student@r-cis.com', 'fac5c7e708148e5e70dbdef46b640319.jpg', 'UM12', 0, '         Line1sdfgsdfg', '         Line2', '          SCFSDF', 'AL', '8899ss', 'United States', '019191919191', '987654321', 'alt@r-cis.com', '1984-06-19', 'English3', '100', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ... About Me ...                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ', NULL, NULL, '                                ', 'http://youtube.com/watch/2SRMg_K_ILg', '10', NULL, 'Mr. Mohammad Student Hossain', '2014-02-15 03:40:22', '2014-05-11 15:29:36'),
('xxx@r-cis.com', '1bd0f12f6f25ef259f468505c9e1d98f.jpg', 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-08 10:20:39', NULL),
('mu@r-cis.com', '3edc0ea12b65b8c45ce1f5c1da4f22e9.jpg', 'UM95', 0, '    Address1', '    Address2', '    city', 'AL', '99221', 'United States', '019191919191', '', '', '1970-01-01', 'Bangla', '2', 'gdfgadfasdf', NULL, NULL, 'sfsdf   ', 'www.youtube.com', '10', NULL, 'Munna Vhai', '2014-02-28 03:12:32', '2014-02-28 16:02:36'),
('hossain@r-cis.com', '2cfab5052eec53f1b32ce2a13b38262c.jpg', 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-03 12:32:40', NULL),
('anxxtu@r-cis.com', '59e4d030fb7c675b2a60e1410196a7d7.jpg', 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-09 02:52:36', NULL),
('kkk@r-cis.com', 'f3fa324cff32e3b7408d44e20723d5e5.jpg', 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-11 05:57:46', NULL),
('abc@r-cis.com', '2c77b22058beacc958bea810b9144d1a.jpg', 'UM12', 0, 'Test add', '  Address2', '  city', 'CO', '99221', 'United States', '019191919191', '', '', '1975-01-01', 'English', NULL, '', NULL, NULL, '  ', NULL, NULL, NULL, 'shofi uddin', '2014-03-12 02:28:52', '2014-03-12 11:14:49'),
('st5@r-cis.com', '68145d014576aefaf546d873c9a70662.JPG', 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15 06:48:15', NULL),
('info@r-cis.com', 'be5861fabb148b60b6f1719167a4e501.jpg', 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15 06:53:49', NULL),
('anxx8tu@r-cis.com', NULL, 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15 06:57:13', NULL),
('shofi.usdgfddin2@r-cis.com', 'c09111405a823f1a56cb85b7c0394f1b.jpg', 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15 07:02:04', NULL),
('yyyusdgfddin2@r-cis.com', 'ed9ff86b9ee03de2d9b61ccd773e32bb.jpg', 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15 07:03:48', NULL),
('yyyus1fddin2@r-cis.com', '6614c18a520e1b16010c11a63ab0d792.jpg', 'UP600', 0, 'Address1', 'Address2', 'city', 'AL', '99221', 'United States', '019191919191', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-15 08:06:59', NULL),
('y3ddin2@r-cis.com', 'aaff6ade4bf69499ff0dd9f531957ba6.jpg', 'UM12', 0, '   Address1', '   Address2', '   city', 'AL', '99221', 'United States', '019191919191', '', '', '1970-01-01', 'English', NULL, 'Test', NULL, NULL, '   ', NULL, NULL, NULL, 'shofi uddin', '2014-03-15 08:10:41', '2014-03-15 15:14:53'),
('777@yahoo.com', NULL, 'UP600', 0, 'dhaka', 'dhaka', 'dhaka', 'AL', '1205', 'United States', '8801675675645', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-18 00:56:07', NULL),
('uaua@r-cis.com', 'a8687866cb748c39f50420ffe3511d9c.jpg', 'UP600', 0, 'D/36, Block E Zakir Hossain Road', 'Mohammadpur', 'Dhaka', 'AL', '1207', 'United States', '880171411611', NULL, NULL, '1992-09-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-29 01:20:19', NULL),
('sharif0025@gmail.com', '071802230b44cb8d242218c69eb2edf3.jpg', 'UP600', 0, 'Address1', 'Address2', 'City', 'RI', 'ZiP007', 'United States', '01823148220', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-23 12:06:44', NULL),
('uddin@r-cis.com', '1eda6cd8d86adfc96ca55d9971cdc55f.jpg', 'UM6', 0, ' dhaka', ' dhaka', ' dhaka', 'AL', '1205', 'United States', '8801675675645', '01974116222', 'altemai222l@alt.com', '1970-01-01', 'English', '2', 'asdf asdf dsafasdf', NULL, NULL, ' asdfffe ererer ', 'http://www.youtube.com/watch?v=NzX2UEM4kxU', '12', NULL, 'shofi uddin', '2014-03-19 08:06:27', '2014-03-19 15:10:08'),
('wang@r-cis.com', '115d420b216784eaf8fb2227d4c67d2c.jpg', 'UM6', 0, '     Address1', '     Address2', '     City One', 'AL', 'ZX992', 'United States', '01714116111', '0191444112', 'wang@alter.com', '1970-01-01', 'English', '3', 'Wang Hong Ling jing bing. .Wang Hong Ling jing bing. .Wang Hong Ling jing bing. .Wang Hong Ling jing bing. .Wang Hong Ling jing bing. .Wang Hong Ling jing bing. .Wang Hong Ling jing bing. .Wang Hong Ling jing bing. .Wang Hong Ling jing bing. .', NULL, NULL, '   Wang Hong Ling jing bing. .  ', 'youtube.com/embade/?v=201234kjnoikj', '10', NULL, 'My Teacher Wang', '2014-03-19 11:07:09', '2014-03-19 18:12:55'),
('aa11@r-cis.com', '8b4ff782b68f7647b8c9de391aa3990a.jpg', 'UP600', 0, 'House: 54/A, Road-132, Gulshan, Dhaka - 1211', 'Dhaka', 'Dhaka', 'AL', '1212', 'United States', '+88-02-8100411', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-24 04:11:12', NULL),
('eee@r-cis.com', '969e6455b9b59b5e1ad9c3866d05b8dd.jpg', 'UM12', 0, '    D/36, Block E Zakir Hossain Road', '    Mohammadpur', '    Dhaka', 'AL', '1207', 'United States', '880171411611', '01974116222', 'arif@r-cis.com', '1992-09-16', 'English', '1', 'My Overview', NULL, NULL, '    ', 'http://youtube.com/watch/2SRMg_K_ILg', '10', NULL, 'Shofi Uddin', '2014-03-29 02:31:58', '2014-03-29 11:07:23'),
('rrraa@r-cis.com', 'de23a0af52e2541781c70af883a93b5a.jpg', 'UP600', 0, 'D/36, Block E Zakir Hossain Road', 'Mohammadpur', 'Dhaka', 'AL', '1207', 'United States', '880171411611', NULL, NULL, '1992-09-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-29 02:25:43', NULL),
('arif@r-cis.com', NULL, 'UP600', 0, 'D/36, Block E Zakir Hossain Road', 'Mohammadpur', 'Dhaka', 'AL', '1207', 'United States', '01714116111', NULL, NULL, '1992-09-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-29 02:02:16', NULL),
('yaya@r-cis.com', '4c596e258c9049bf0f77d54178bcfd6b.jpg', 'UP600', 0, 'D/36, Block E Zakir Hossain Road', 'Mohammadpur', 'Dhaka', 'KY', '1207', 'United States', '880171411611', NULL, NULL, '1992-09-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-29 01:52:17', NULL),
('xaxa@r-cis.com', '033d8f2342aeebfd3209b4f5a5a076db.jpg', 'UP600', 0, 'D/36, Block E Zakir Hossain Road', 'Mohammadpur', 'Dhaka', 'AL', '1207', 'United States', '880171411611', NULL, NULL, '1992-09-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-27 09:28:02', NULL),
('jaja@r-cis.com', '28e42de4974fab850629235173f7936f.jpg', 'UP600', 0, 'D/36, Block E Zakir Hossain Road', 'Mohammadpur', 'Dhaka', 'AL', '1207', 'United States', '880171411611', NULL, NULL, '1992-09-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-03-27 08:57:30', NULL),
('0', 'b23559f24ee947d7a61d05fd1a330692.jpg', 'UP600', 0, '234234', '234234', '2234', 'AL', '234', 'United States', '234234', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-04-20 22:32:59', NULL),
('tapos.aa@gmail.com', 'f9840abdbbdee035003bf2f6fe2c9c49.jpg', 'UP600', 0, 'nawabpur', '', 'dhaka', 'AL', '1100', 'United States', '01913455445', NULL, NULL, '1987-08-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-04-23 02:41:52', NULL),
('shofi.udd@r-cis.com', '519531bf81ac355432f82ce8cc214b9e.jpg', 'UP600', 0, 'D/36, Block E Zakir Hossain Road', 'Mohammadpur', 'Dhaka', 'AL', '1207', 'United States', '880171411611', NULL, NULL, '1982-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-04-26 22:21:43', NULL),
('razib@r-cis.com', '80ee0d85a05622fb31f57ec567717cdb.jpg', 'UM12', 0, ' D/36, Block E Zakir Hossain Road', ' Mohammadpur', ' Dhaka', 'AL', '1207', 'United States', '880171411611', '0124234234', 'shafi@r-cis.com', '1982-05-08', '', NULL, '                                                                    ', NULL, NULL, ' ', NULL, NULL, NULL, 'Kazi Razib', '2014-04-26 23:03:57', '2014-04-27 13:59:38'),
('sumon12@r-cis.com', 'a5377ee6fc8a00c9adfec0f619893496.jpg', 'UP600', 0, 'D/36, Block E Zakir Hossain Road', 'Mohammadpur', 'Dhaka', 'AL', '1207', 'United States', '880171411611', NULL, NULL, '1982-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-04-27 00:14:28', NULL),
('mohammad@r-cis.com', '238c869c2144d3120c1eaaed21f980d5.jpg', 'UP600', 0, 'D/36, Block E Zakir Hossain Road', 'Mohammadpur', 'Dhaka', 'AL', '1207', 'United States', '880171411611', NULL, NULL, '1982-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-04-27 00:58:57', NULL),
('ksa@r-cis.com', 'c36a65639c15042bdc9bbd3e3a14d688.jpg', 'UM12', 0, ' D/36, Block E Zakir Hossain Road', ' Mohammadpur', ' Dhaka', 'AL', '1207', 'United States', '880171411611', '01711453421', 'arif@r-cis.com', '1982-05-08', 'English', '5', '                                                                    ', NULL, NULL, ' ', 'http://youtube.com/embed/2SRMg_K_ILg', '12', NULL, 'Mohammad Arif Hossain', '2014-04-27 01:02:24', '2014-04-27 13:17:59'),
('arifspp@r-cis.com', '00904870b36ed94557b036fdb5934ada.jpg', 'UP600', 0, 'Address1', 'Address2', 'City', 'RI', 'ZiP007', 'United States', '0181818181', NULL, NULL, '1998-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-03 12:36:03', NULL),
('arif333@r-cis.com', NULL, 'UP600', 0, 'Address1', 'Address2', 'City', 'RI', 'ZiP007', 'United States', '0181818181', NULL, NULL, '1993-05-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-10 02:28:51', NULL),
('arif33@r-cis.com', 'eb130e4aa6ccb7571b39c89471556318.jpg', 'UP600', 0, 'Address1', 'Address2', 'City', 'RI', 'ZiP007', 'United States', '01823148220', NULL, NULL, '2010-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-10 02:37:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `CourseID` text NOT NULL,
  `CourseName` text NOT NULL,
  `BatchID` text,
  `TeacherID` text,
  `StudentID` text,
  `CommentsForTeacher` text,
  `CommentsForStudent` text,
  `StartDate` text,
  `EndDate` text,
  `RatingPointStudent` decimal(3,2) DEFAULT NULL,
  `RatingPointTeacher` decimal(3,2) DEFAULT NULL,
  `HideCommentsTeacher` text,
  `HideCommentsStudent` text,
  `CreatedBy` text,
  `ModifiedBy` text,
  `CreatedOn` datetime DEFAULT NULL,
  `LastModifiedDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `ScheduleID` int(11) NOT NULL AUTO_INCREMENT,
  `BatchID` text,
  `Day` text,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `Flexiblity` text,
  `CreatedBy` text,
  `ModifiedBy` text,
  `CreatedOn` datetime DEFAULT NULL,
  `LastModifiedDate` datetime DEFAULT NULL,
  `schedule_date` date NOT NULL,
  PRIMARY KEY (`ScheduleID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`ScheduleID`, `BatchID`, `Day`, `StartTime`, `EndTime`, `Flexiblity`, `CreatedBy`, `ModifiedBy`, `CreatedOn`, `LastModifiedDate`, `schedule_date`) VALUES
(1, '1', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(2, '2', 'Monday', '13:00:00', '13:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(3, '3', 'Monday', '13:00:00', '13:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(4, '4', 'Monday', '13:00:00', '13:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(5, '5', 'Monday', '08:00:00', '08:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(6, '5', 'Wednesday', '08:00:00', '08:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(7, '6', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(8, '7', 'Monday', '08:00:00', '08:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(9, '8', 'Monday', '10:30:00', '10:30:00', 'Flexible', 'mu@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(10, '9', 'Monday', '08:00:00', '08:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(11, '10', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(12, '11', 'Monday', '08:00:00', '08:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(13, '12', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(14, '13', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(15, '14', 'Tuesday', '10:00:00', '11:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(48, '31', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(49, '32', 'Monday', '08:00:00', '10:00:00', 'Flexible', 'uddin@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(18, '11', 'Wednesday', '09:00:00', '10:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(19, '11', 'Thursday', '06:00:00', '02:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(20, '11', 'Friday', '01:00:00', '01:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(21, '11', 'Monday', '08:00:00', '09:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(47, '15', 'Thursday', '11:00:00', '10:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(46, '15', 'Wednesday', '10:00:00', '08:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(25, '15', 'Monday', '08:00:00', '10:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(26, '15', 'Tuesday', '09:00:00', '10:00:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(52, '34', 'Tuesday', '08:00:00', '08:00:00', 'Flexible', 'wang@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(51, '34', 'Monday', '07:00:00', '07:00:00', 'Flexible', 'wang@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(50, '33', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(31, '19', 'Monday', '09:11:24', '09:11:24', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(32, '20', 'Monday', '09:11:52', '09:11:52', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(33, '21', 'Monday', '09:15:01', '09:15:01', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(34, '22', 'Monday', '09:26:21', '09:26:21', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(35, '23', 'Monday', '09:34:52', '09:34:52', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(36, '24', 'Monday', '09:35:19', '09:35:19', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(37, '25', 'Monday', '09:38:36', '09:38:36', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(38, '26', 'Monday', '09:39:02', '09:39:02', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(39, '27', 'Monday', '09:43:46', '09:43:46', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(40, '28', 'Monday', '10:01:16', '10:01:16', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(41, '29', 'Monday', '10:43:02', '10:43:02', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(42, '30', 'Monday', '10:43:53', '10:43:53', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(53, '35', 'Monday', '08:39:06', '08:39:06', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(54, '35', 'Monday', '08:39:06', '08:39:06', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(55, '36', 'Monday', '23:00:00', '23:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(56, '36', 'Tuesday', '22:00:00', '23:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(57, '11', '0', '00:00:00', '00:00:00', '0', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(58, '37', 'Monday', '02:45:00', '02:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(59, '38', 'Monday', '06:45:00', '06:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(60, '38', 'Monday', '22:00:00', '17:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(61, '39', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(62, '40', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(63, '41', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(64, '42', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(65, '43', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(66, '44', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(67, '45', 'Monday', '02:30:00', '02:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(68, '46', 'Monday', '02:30:00', '02:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(69, '46', 'Tuesday', '15:00:00', '16:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(70, '46', 'Thursday', '15:00:00', '16:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(71, '47', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(72, '48', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(73, '49', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(74, '50', 'Monday', '06:00:00', '07:00:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(75, '51', 'Monday', '07:00:00', '07:15:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(76, '52', 'Monday', '07:15:00', '08:15:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(77, '53', 'Monday', '06:30:00', '07:30:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(78, '54', 'Monday', '07:00:00', '08:00:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(79, '55', 'Monday', '07:45:00', '08:45:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(80, '56', 'Monday', '07:00:00', '08:00:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(81, '57', 'Monday', '08:45:00', '07:45:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(82, '58', 'Monday', '09:15:00', '08:15:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(83, '59', 'Monday', '07:15:00', '08:15:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(84, '60', 'Monday', '10:15:00', '10:15:00', 'Flexible', 'eee@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(85, '61', 'Monday', '12:47:26', '12:47:26', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(86, '62', 'Monday', '18:00:00', '21:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(87, '63', 'Monday', '18:00:00', '21:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(88, '64', 'Monday', '10:21:20', '10:21:20', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(89, '65', 'Monday', '10:21:32', '10:21:32', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(90, '66', 'Monday', '10:44:53', '10:44:53', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(91, '67', 'Monday', '10:53:16', '10:53:16', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(92, '68', 'Monday', '20:30:00', '21:30:00', 'Not Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(93, '69', 'Monday', '10:00:00', '10:45:00', 'Not Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(94, '69', 'Monday', '10:00:00', '12:45:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(95, '69', 'Tuesday', '02:30:00', '02:30:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '0000-00-00'),
(96, '70', 'Monday', '18:00:00', '06:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(97, '70', 'Monday', '18:00:00', '18:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(98, '71', 'Monday', '18:00:00', '18:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(99, '71', 'Monday', '03:45:00', '04:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(100, '72', 'Monday', '04:00:00', '04:40:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(101, '72', 'Monday', '05:00:00', '05:40:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(102, '72', 'Friday', '06:00:00', '06:40:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(103, '73', 'Monday', '16:30:00', '17:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(104, '73', 'Saturday', '04:30:00', '05:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(105, '73', 'Wednesday', '06:30:00', '07:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(106, '73', 'Thursday', '07:30:00', '08:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(107, '74', 'Thursday', '04:45:00', '04:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(108, '74', 'Sunday', '04:45:00', '04:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(109, '74', 'Tuesday', '04:45:00', '05:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(110, '74', 'Monday', '20:45:00', '00:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(111, '75', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(112, '76', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(113, '77', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(114, '78', 'Monday', '07:15:00', '08:15:00', 'Flexible', 'ksa@r-cis.com', 'ksa@r-cis.com', NULL, NULL, '0000-00-00'),
(115, '78', 'Tuesday', '09:15:00', '09:15:00', 'Not Flexible', 'ksa@r-cis.com', 'ksa@r-cis.com', NULL, NULL, '0000-00-00'),
(116, '79', 'Thursday', '07:30:00', '08:30:00', 'Flexible', 'ksa@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(117, '80', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00'),
(118, '81', 'Monday', '05:45:00', '06:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '0000-00-00'),
(119, '83', NULL, '09:15:00', '10:15:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-22'),
(120, '83', NULL, '09:15:00', '10:15:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-24'),
(121, '83', NULL, '09:15:00', '10:15:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-26'),
(122, '84', NULL, '09:30:00', '10:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-22'),
(123, '84', NULL, '09:30:00', '10:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-24'),
(124, '84', NULL, '09:30:00', '10:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-26'),
(125, '84', NULL, '19:31:53', '19:31:53', '0', 'teacher@r-cis.com', NULL, NULL, NULL, '1970-01-01'),
(126, '85', NULL, '09:30:00', '10:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-20'),
(127, '85', NULL, '09:30:00', '10:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-22'),
(128, '85', NULL, '09:30:00', '10:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-24'),
(129, '85', NULL, '09:30:00', '10:30:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-26'),
(130, '86', NULL, '10:00:00', '12:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-20'),
(131, '86', NULL, '10:00:00', '12:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-22'),
(132, '86', NULL, '10:00:00', '12:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-24'),
(133, '86', NULL, '10:00:00', '13:00:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-26'),
(134, '87', NULL, '10:15:00', '11:15:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-06-03'),
(135, '87', NULL, '10:15:00', '11:15:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-06-05'),
(136, '87', NULL, '10:15:00', '12:15:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-06-07'),
(137, '87', NULL, '10:15:00', '10:15:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-06-09'),
(138, '87', NULL, '10:15:00', '11:15:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_search_preference`
--

CREATE TABLE IF NOT EXISTS `tbl_search_preference` (
  `UserID` text NOT NULL,
  `Keywords` text NOT NULL,
  `SubCategory` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_search_preference`
--

INSERT INTO `tbl_search_preference` (`UserID`, `Keywords`, `SubCategory`) VALUES
('teacher@r-cis.com', ' Other qualification is bad... ', ' , Tango, Blues, Drums, Tabla, Bhakti, Cardiac , Ballet, Ballet, Ballet'),
('mu@r-cis.com', '<u>Fsdf</u>', ' , Tango, Blues, Drums, Tabla, Ethiopian, Japanese, Vietnamese'),
('qqq@r-cis.com', ' ', ' '),
('777@yahoo.com', ' ', ' '),
('uddin@r-cis.com', ' Keyboard', ' , Others, Cambodian, Bhakti'),
('wang@r-cis.com', ' Guitar is my dream', ' , Guitar, Tango'),
('aa11@r-cis.com', ' ', ' '),
('aabb@r-cis.com', ' ', ' '),
('ccaa@r-cis.com', ' ', ' '),
('ddcc@r-cis.com', ' ', ' '),
('aacc@r-cis.com', ' ', ' '),
('acac@r-cis.com', ' ', ' '),
('arif@r-cis.com', ' ', ' '),
('rrraa@r-cis.com', ' ', ' '),
('eee@r-cis.com', 'Blues', ' , Tango, Breakdancing, Guitar, Bhakti, Brunch'),
('tapos.aa@gmail.com', ' ', ' '),
('mohammad@r-cis.com', ' ', ' '),
('ksa@r-cis.com', 'Please contact me for the course..', ' , Tango, Guitar, Ashtanga, Cajun, Vegan, Baking, Electro'),
('arif33@r-cis.com', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session_log`
--

CREATE TABLE IF NOT EXISTS `tbl_session_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MeetingName` text NOT NULL,
  `MeetingID` text NOT NULL,
  `StudentPWD` text NOT NULL,
  `ModeratorPW` text NOT NULL,
  `CourseID` text NOT NULL,
  `BatchID` text NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_session_log`
--

INSERT INTO `tbl_session_log` (`ID`, `MeetingName`, `MeetingID`, `StudentPWD`, `ModeratorPW`, `CourseID`, `BatchID`, `CreatedOn`) VALUES
(1, 'Unpublish+Test', '14-05-1144418', '582213', '926990', '4', '4', '2014-05-11 12:13:32'),
(2, 'Unpublish+Test', '14-05-11assets4418', '483544', '807087', 'assets', '4', '2014-05-11 12:13:38'),
(3, 'Unpublish+Test', '14-05-1744417', '389396', '704607', '4', '4', '2014-05-17 11:04:23'),
(4, 'Unpublish+Test', '14-05-17assets4417', '913354', '594919', 'assets', '4', '2014-05-17 11:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `Category` text NOT NULL,
  `SubCategory` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`Category`, `SubCategory`) VALUES
('Music', 'Guitar'),
('Music', 'Mandolin'),
('Music', 'Drums'),
('Music', 'Tabla'),
('Music', 'Banjo'),
('Music', 'Keyboard'),
('Music', 'Piano'),
('Music', 'Saxophone'),
('Music', 'Clarinet'),
('Music', 'Trumpet'),
('Music', 'Violin'),
('Music', 'Harmonica'),
('Music', 'Other'),
('Dance', 'Tango'),
('Dance', 'Blues'),
('Dance', 'Bachata'),
('Dance', 'Ballet'),
('Dance', 'Belly dance'),
('Dance', 'Bhangra'),
('Dance', 'Bharatnatyam'),
('Dance', 'Breakdancing'),
('Dance', 'Charleston'),
('Dance', 'Contemporary'),
('Dance', 'Country dance'),
('Dance', 'Country/western'),
('Dance', 'Disco'),
('Dance', 'Electro'),
('Dance', 'Experimental / Freestyle'),
('Dance', 'Folk'),
('Dance', 'Hip-Hop'),
('Dance', 'Kathak'),
('Dance', 'Modern Dance'),
('Dance', 'Merengue'),
('Dance', 'Odissi'),
('Dance', 'Punk Rock'),
('Dance', 'Salsa'),
('Dance', 'Samba'),
('Dance', 'Other'),
('Cooking', 'Baking'),
('Cooking', 'Breakfast'),
('Cooking', 'Brunch'),
('Cooking', 'Mexican'),
('Cooking', 'Ethiopian'),
('Cooking', 'Japanese'),
('Cooking', 'Europian'),
('Cooking', 'Vietnamese'),
('Cooking', 'Seafood'),
('Cooking', 'Vegan'),
('Cooking', 'Vegetarian'),
('Cooking', 'Middle Eastern'),
('Cooking', 'Italian'),
('Cooking', 'Greek'),
('Cooking', 'Thai'),
('Cooking', 'Chinese'),
('Cooking', 'Tapas'),
('Cooking', 'Sushi'),
('Cooking', 'Indian'),
('Cooking', 'Essential Knife Skills'),
('Cooking', 'French'),
('Cooking', 'Turkish'),
('Cooking', 'African'),
('Cooking', 'Asian'),
('Cooking', 'Brazilian'),
('Cooking', 'Cajun'),
('Cooking', 'Cambodian'),
('Cooking', 'Caribbean'),
('Cooking', 'Crepes'),
('Cooking', 'Cuban'),
('Cooking', 'Desserts & Ice-cream'),
('Cooking', 'Eastern European'),
('Cooking', 'Filipino'),
('Cooking', 'German'),
('Cooking', 'Hawaiian'),
('Cooking', 'Indonesian'),
('Cooking', 'Korean'),
('Cooking', 'Peruvian'),
('Cooking', 'Latin American'),
('Cooking', 'Noodles'),
('Cooking', 'Sandwiches'),
('Cooking', 'Salad'),
('Cooking', 'Southern'),
('Cooking', 'Spanish'),
('Cooking', 'Other'),
('Yoga', 'Ananda'),
('Yoga', 'Anusara '),
('Yoga', 'Ashtanga'),
('Yoga', 'Bando '),
('Yoga', 'Bhakti'),
('Yoga', 'Cardiac '),
('Yoga', 'Hatha'),
('Yoga', 'Vinyasa'),
('Yoga', 'Lyengar'),
('Yoga', 'Kundalini'),
('Yoga', 'Restorative'),
('Yoga', 'Jivamukti'),
('Yoga', 'Power'),
('Yoga', 'Prenatal'),
('Yoga', 'Viniyoga'),
('Yoga', 'Yin'),
('Yoga', 'Other'),
('Others', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE IF NOT EXISTS `tbl_transaction` (
  `TransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `TransactionType` text,
  `Date` datetime NOT NULL,
  `Description` text,
  `Status` text,
  `Amount` text,
  `TeacherID` text,
  `StudentID` text,
  `CourseID` text,
  `BatchID` text,
  `CreatedBy` text,
  `ModifiedBy` text,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`TransactionID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useronbatch`
--

CREATE TABLE IF NOT EXISTS `tbl_useronbatch` (
  `UserID` text,
  `Rolle` text,
  `BatchID` text,
  `IsCompleted` text,
  `CreatedBy` text,
  `ModifiedBy` text,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastModifiedDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_useronbatch`
--

INSERT INTO `tbl_useronbatch` (`UserID`, `Rolle`, `BatchID`, `IsCompleted`, `CreatedBy`, `ModifiedBy`, `CreatedOn`, `LastModifiedDate`) VALUES
('student@r-cis.com', 'Student', '2', 'No', 'student@r-cis.com', NULL, '2014-05-10 06:46:11', '2014-05-10 12:53:39'),
('student@r-cis.com', 'Student', 'assets', 'Req', 'student@r-cis.com', NULL, '2014-05-10 06:46:12', '2014-05-10 12:46:12'),
('teacher@r-cis.com', 'Teacher', '1', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '2', 'No', 'teacher@r-cis.com', NULL, '2014-02-15 03:23:36', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '5', 'No', 'teacher@r-cis.com', NULL, '2014-02-21 04:08:48', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '3', 'No', 'teacher@r-cis.com', NULL, '2014-02-15 03:45:47', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '4', 'No', 'teacher@r-cis.com', NULL, '2014-02-15 02:14:47', '0000-00-00 00:00:00'),
('mu@r-cis.com', 'Teacher', '6', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '7', 'No', 'teacher@r-cis.com', NULL, '2014-02-27 21:02:42', '0000-00-00 00:00:00'),
('mu@r-cis.com', 'Teacher', '8', 'No', 'mu@r-cis.com', NULL, '2014-02-27 22:06:42', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '9', 'No', 'teacher@r-cis.com', NULL, '2014-02-27 22:33:22', '0000-00-00 00:00:00'),
('hossain@r-cis.com', 'Teacher', '10', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '11', 'No', 'teacher@r-cis.com', NULL, '2014-03-04 20:04:42', '0000-00-00 00:00:00'),
('qqq@r-cis.com', 'Teacher', '12', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('777@yahoo.com', 'Teacher', '13', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '14', 'No', 'teacher@r-cis.com', NULL, '2014-03-17 19:06:16', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '15', 'No', 'teacher@r-cis.com', NULL, '2014-03-17 20:06:11', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '16', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:00:00', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '17', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:04:10', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '18', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:11:22', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '19', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:11:24', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '20', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:11:52', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '21', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:15:01', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '22', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:26:21', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '23', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:34:52', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '24', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:35:19', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '25', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:38:36', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '26', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:39:02', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '27', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 02:43:46', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '28', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 03:01:16', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '29', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 03:43:02', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '30', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 03:43:53', '0000-00-00 00:00:00'),
('uddin@r-cis.com', 'Teacher', '31', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('uddin@r-cis.com', 'Teacher', '32', 'No', 'uddin@r-cis.com', NULL, '2014-03-18 20:12:23', '0000-00-00 00:00:00'),
('wang@r-cis.com', 'Teacher', '33', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('wang@r-cis.com', 'Teacher', '34', 'No', 'wang@r-cis.com', NULL, '2014-03-18 23:16:03', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '35', 'No', 'teacher@r-cis.com', NULL, '2014-03-20 01:39:06', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '36', 'No', 'teacher@r-cis.com', NULL, '2014-03-20 02:54:35', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '37', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 18:41:02', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '38', 'No', 'teacher@r-cis.com', NULL, '2014-03-19 22:46:00', '0000-00-00 00:00:00'),
('aa11@r-cis.com', 'Teacher', '39', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('aabb@r-cis.com', 'Teacher', '40', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ccaa@r-cis.com', 'Teacher', '41', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ddcc@r-cis.com', 'Teacher', '42', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('aacc@r-cis.com', 'Teacher', '43', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('acac@r-cis.com', 'Teacher', '44', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '45', 'No', 'teacher@r-cis.com', NULL, '2014-03-24 18:27:01', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '46', 'No', 'teacher@r-cis.com', NULL, '2014-03-24 18:28:10', '0000-00-00 00:00:00'),
('arif@r-cis.com', 'Teacher', '47', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('rrraa@r-cis.com', 'Teacher', '48', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '49', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '50', 'No', 'eee@r-cis.com', NULL, '2014-03-29 04:47:38', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '51', 'No', 'eee@r-cis.com', NULL, '2014-03-29 05:51:56', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '52', 'No', 'eee@r-cis.com', NULL, '2014-03-28 18:13:13', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '53', 'No', 'eee@r-cis.com', NULL, '2014-03-28 18:21:55', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '54', 'No', 'eee@r-cis.com', NULL, '2014-03-28 19:30:59', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '55', 'No', 'eee@r-cis.com', NULL, '2014-03-28 19:37:23', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '56', 'No', 'eee@r-cis.com', NULL, '2014-03-28 19:40:13', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '57', 'No', 'eee@r-cis.com', NULL, '2014-03-28 19:46:28', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '58', 'No', 'eee@r-cis.com', NULL, '2014-03-28 20:14:14', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '59', 'No', 'eee@r-cis.com', NULL, '2014-03-28 20:15:24', '0000-00-00 00:00:00'),
('eee@r-cis.com', 'Teacher', '60', 'No', 'eee@r-cis.com', NULL, '2014-03-28 21:13:07', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '61', 'No', 'teacher@r-cis.com', NULL, '2014-04-05 05:47:26', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '62', 'No', 'teacher@r-cis.com', NULL, '2014-04-09 04:23:36', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '63', 'No', 'teacher@r-cis.com', NULL, '2014-04-09 04:23:50', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '64', 'No', 'teacher@r-cis.com', NULL, '2014-04-13 03:21:20', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '65', 'No', 'teacher@r-cis.com', NULL, '2014-04-13 03:21:32', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '66', 'No', 'teacher@r-cis.com', NULL, '2014-04-13 03:44:53', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '67', 'No', 'teacher@r-cis.com', NULL, '2014-04-13 03:53:16', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '68', 'No', 'teacher@r-cis.com', NULL, '2014-04-13 04:42:47', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '69', 'No', 'teacher@r-cis.com', NULL, '2014-04-19 06:46:46', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '70', 'No', 'teacher@r-cis.com', NULL, '2014-04-19 07:49:53', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '71', 'No', 'teacher@r-cis.com', NULL, '2014-04-19 07:57:48', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '72', 'No', 'teacher@r-cis.com', NULL, '2014-04-19 08:05:51', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '73', 'No', 'teacher@r-cis.com', NULL, '2014-04-19 08:37:20', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '74', 'No', 'teacher@r-cis.com', NULL, '2014-04-19 08:46:56', '0000-00-00 00:00:00'),
('tapos.aa@gmail.com', 'Teacher', '75', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('mohammad@r-cis.com', 'Teacher', '76', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ksa@r-cis.com', 'Teacher', '77', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ksa@r-cis.com', 'Teacher', '78', 'No', 'ksa@r-cis.com', NULL, '2014-04-27 07:22:46', '0000-00-00 00:00:00'),
('ksa@r-cis.com', 'Teacher', '79', 'No', 'ksa@r-cis.com', NULL, '2014-04-27 07:31:12', '0000-00-00 00:00:00'),
('student@r-cis.com', 'Student', '4', 'No', 'student@r-cis.com', NULL, '2014-05-10 06:50:03', '2014-05-10 12:52:55'),
('student@r-cis.com', 'Student', 'assets', 'Req', 'student@r-cis.com', NULL, '2014-05-10 06:50:04', '2014-05-10 12:50:04'),
('student@r-cis.com', 'Student', '4', 'No', 'student@r-cis.com', NULL, '2014-05-10 06:52:00', '2014-05-10 12:52:55'),
('student@r-cis.com', 'Student', 'assets', 'Req', 'student@r-cis.com', NULL, '2014-05-10 06:52:00', '2014-05-10 12:52:00'),
('teacher@r-cis.com', 'Teacher', '81', 'No', 'teacher@r-cis.com', NULL, '2014-05-10 15:53:31', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '82', 'No', 'teacher@r-cis.com', NULL, '2014-05-17 01:17:37', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '83', 'No', 'teacher@r-cis.com', NULL, '2014-05-17 01:24:39', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '84', 'No', 'teacher@r-cis.com', NULL, '2014-05-17 01:31:53', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '85', 'No', 'teacher@r-cis.com', NULL, '2014-05-17 01:34:57', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '86', 'No', 'teacher@r-cis.com', NULL, '2014-05-17 02:03:06', '0000-00-00 00:00:00'),
('teacher@r-cis.com', 'Teacher', '87', 'No', 'teacher@r-cis.com', NULL, '2014-05-17 02:28:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `UserID` text NOT NULL,
  `video_link` text NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_videos`
--

INSERT INTO `tbl_videos` (`UserID`, `video_link`, `description`) VALUES
('teacher@r-cis.com', '2SRMg_K_ILg', ''),
('teacher@r-cis.com', 'loQhufxiorM', ''),
('teacher@r-cis.com', 'gO6cFMRqXqU', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `role` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=72 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'Teacher One', '$2a$08$qvWEelkfAb977ofqIfOzmefD0FWTNkGfP.U6K4VQIqMJO2rw6espK', 'teacher', 'teacher@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2014-05-17 18:02:52', '2014-02-15 09:20:35', '2014-05-17 18:02:52'),
(2, 'Mr. Mohammad Student Hossain', '$2a$08$7B6R6QhYUryt6xzVmouYDOAESU.JykCDbtZqUGanUB31s6gPRawQW', 'student', 'student@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-05-17 14:06:18', '2014-02-15 09:40:22', '2014-05-17 08:06:18'),
(3, 'Munna Vhai', '$P$B8KMptp/adjfSusWtRxcr0kzIeh7550', 'teacher', 'mu@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-02-28 16:00:54', '2014-02-28 09:12:32', '2014-02-28 10:00:54'),
(4, 'Hossain mohammad', '$P$BttuwPQ4HFTUOqkAh/gSernzkaSD.W.', 'teacher', 'hossain@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2014-03-03 18:32:40', '2014-03-03 12:32:40'),
(26, 'shofi uddin', '$P$BFz/Ly01obnqIpHFMvtjqEkyo9kAGS0', 'student', 'abc@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, 'NULL', '127.0.0.1', '2014-03-12 10:02:59', '2014-03-11 09:56:28', '2014-03-12 03:02:59'),
(34, 'shofi uddin', '$P$B3mNJOjqDKvX5DRXnrnIS3i00D1g8T1', 'student', 'y3ddin2@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-03-15 15:14:12', '2014-03-15 15:10:41', '2014-03-15 08:14:12'),
(35, 'shofi7 mohammad7', '$P$BxORhvx2Llfej7RzOakAu/pGP7zl7z0', 'teacher', '777@yahoo.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-03-18 07:58:59', '2014-03-18 07:56:07', '2014-03-18 00:58:59'),
(37, 'shofi uddin', '$P$BZxhoc6PQi5FIHpA492aVSxQPAxVFF0', 'teacher', 'uddin@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-03-19 15:07:29', '2014-03-19 15:06:27', '2014-03-19 08:07:29'),
(55, 'Mohammad Arif Hossain', '$P$BQjSXcOrMH.2PSdy5j7fl53a6dTSij.', 'student', 'jaja@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2014-03-27 15:57:30', '2014-03-27 08:57:58'),
(57, 'Mohammad Arif Hossain', '$P$BSM5ex9BeLU/cVYdQVkg/QJhrQWxMg.', 'student', 'uaua@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2014-03-29 08:20:19', '2014-03-29 01:50:23'),
(58, 'Mohammad Arif Hossain', '$P$Bym59rJd9V6qHiFsDonJ101ZtpYRm5/', 'student', 'yaya@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2014-03-29 08:52:17', '2014-03-29 02:07:10'),
(59, 'Mohammad Arif Hossain', '$P$BZ9Jtr2GYCINhXais/0vwQP9mKAzLG1', 'teacher', 'arif@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-05-01 19:05:00', '2014-03-29 09:02:16', '2014-05-01 13:05:00'),
(61, 'Shofi Uddin', '$P$Be7e7Mjf9PQ7wtFafPVtAnEeCyZc6d/', 'teacher', 'eee@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-03-30 13:45:19', '2014-03-29 09:31:58', '2014-03-30 06:45:19'),
(63, 'tapos ghosh', '$P$BC.gj9R8Waa45zAkFl4VCABiT1ULet0', 'teacher', 'tapos.aa@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '113.11.119.93', '2014-04-23 09:49:57', '2014-04-23 09:41:52', '2014-04-23 02:49:57'),
(64, 'Shofi Uddin', '$P$B1jyd/gAXxojZCIedfW.LkKZp4kbDq/', 'student', 'shofi.udd@r-cis.com', 0, 0, NULL, NULL, NULL, NULL, 'd3122f0f1068cde5f73eb000edc7b016', '113.11.119.92', '0000-00-00 00:00:00', '2014-04-27 05:21:43', '2014-04-26 22:21:43'),
(65, 'Kazi Razib', '$P$BzwZXwxvGcYtAX3jvrZVGV0u00HzAw.', 'student', 'razib@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '113.11.119.92', '2014-04-27 09:22:23', '2014-04-27 06:03:57', '2014-04-27 02:22:23'),
(66, 'Sumon Mia', '$P$BzYsIHZ6Btap58bvQCgcB5ywsfXEIU.', 'student', 'sumon12@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '113.11.119.92', '0000-00-00 00:00:00', '2014-04-27 07:14:28', '2014-04-27 00:37:05'),
(67, 'Mohammad Arif Hossain', '$P$B0Iqv3ozAdlmcSl9JwX5r6HXYfvhU.1', 'teacher', 'mohammad@r-cis.com', 0, 0, NULL, NULL, NULL, NULL, 'f929f81c04e226371f09d8375be2064f', '113.11.119.92', '0000-00-00 00:00:00', '2014-04-27 07:58:57', '2014-04-27 00:58:57'),
(68, 'Mohammad Arif Hossain', '$P$BrgLX2k.xtMSTlZW.seLPaiZnO5Hvl.', 'teacher', 'ksa@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '113.11.119.92', '2014-04-27 09:20:00', '2014-04-27 08:02:24', '2014-04-27 02:20:00'),
(69, 'ssdda ssdada', '$2a$08$bggV6p56lIgR.YbIcUqGjOvUggs7T2PBB2kcK7xl1i8CKdw2sQhUe', 'student', 'arifspp@r-cis.com', 0, 0, NULL, NULL, NULL, NULL, '9528453c3f1358cf55d74580e95f4246', '127.0.0.1', '0000-00-00 00:00:00', '2014-05-03 18:36:03', '2014-05-03 12:36:03'),
(70, 'Hossain Mohammad', '$2a$08$GNKx9qWg0XVv4xFupZXJ8OOKVhmcDQpsp94IRr8/2koZwvvAhl2Ze', 'student', 'arif333@r-cis.com', 0, 0, NULL, NULL, NULL, NULL, '0d3aabeb8c7f53d94baff0a69475e992', '127.0.0.1', '0000-00-00 00:00:00', '2014-05-10 08:28:51', '2014-05-10 02:28:51'),
(71, 'ssdda Mohammad', '$2a$08$a0b63RiV/WhjP929x5bMDuj2dCfs0RyEFk7lIKFgPVfxSGqmtA2Nm', 'teacher', 'arif33@r-cis.com', 0, 0, NULL, NULL, NULL, NULL, 'da9f81ff2788b9ab1887e602b98aefb1', '127.0.0.1', '0000-00-00 00:00:00', '2014-05-10 08:37:58', '2014-05-10 02:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
