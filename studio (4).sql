-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2014 at 10:30 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

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
('02a7d0bc0da287d413fb8abe48744906', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', 1400442439, 'a:6:{s:9:"user_data";s:0:"";s:8:"TimeZone";b:0;s:7:"user_id";s:1:"1";s:10:"user_email";s:17:"teacher@r-cis.com";s:8:"username";s:22:"Hossain Khandaker Kamr";s:6:"status";s:1:"1";}'),
('1928b51424aedc843358fc87e06f3961', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', 1400503199, ''),
('1a4a24e3e103866a20838abbecfbd782', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1400514200, ''),
('7c3f01d650fc95316e5a2df80177e9e1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1400523404, 'a:2:{s:9:"user_data";s:0:"";s:8:"TimeZone";b:0;}'),
('b84639f4756ccfb528d026c104fbe034', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1400586813, 'a:5:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"2";s:10:"user_email";s:17:"student@r-cis.com";s:8:"username";s:28:"Mr. Mohammad Student Hossain";s:6:"status";s:1:"1";}'),
('cc724aae79b0bf4eca6e39bf56144772', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', 1400553825, 'a:6:{s:9:"user_data";s:0:"";s:8:"TimeZone";s:0:"";s:7:"user_id";s:1:"3";s:10:"user_email";s:15:"admin@r-cis.com";s:8:"username";s:20:"Administrator Studio";s:6:"status";s:1:"1";}'),
('cf8fa3b965cb4aae98572bbbc3a55bdd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1400523404, ''),
('e53361d211cfd037aa733eb5dd3973e5', '127.0.0.1', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)', 1400541057, 'a:2:{s:9:"user_data";s:0:"";s:13:"flash:new:msg";s:548:"<p>Congratulations! Your account has been activated. Log in to your profile, upload your information, create your sessions and start sharing your art while earning some cash.</p><p> Please note that a quick video chat with our expert is required before you can create your FIRST session. This will allow us to help you set up your “studio” and make sure you meet the minimum system requirement in order to conduct a glitch free session. <a href="http://localhost/studio_1/">Click here</a> to set up a video chat appointment with our expert!</p>";}'),
('ea22818cf0a7a934815f7bc7ee4767ce', '127.0.0.1', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)', 1400541057, 'a:1:{s:9:"user_data";s:0:"";}'),
('fce5136e7a0efb35aafefd81e29fc510', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1400514200, '');

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
(1, 1, 'This is a test Email CommunicationThis is a test Email Communication<br>This is a test Email Communication<br>This is a test Email CommunicationThis is a test Email Communication<br>This is a test Email Communication<br>This is a test Email CommunicationThis is a test Email Communication<br><br> ', 2, 'teacher@r-cis.com', '2014-05-20 11:46:32'),
(2, 1, 'Reply This is a test Email Communication<br><br>Reply This is a test Email Communication <br>Reply This is a test Email Communication <br>Reply This is a test Email Communication <br>Reply This is a test Email Communication <br>', 2, 'student@r-cis.com', '2014-05-20 11:48:20');

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
('student@r-cis.com', 1, '2014-05-20 11:46:32'),
('teacher@r-cis.com', 1, '2014-05-20 11:46:32');

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
(1, 'student@r-cis.com', 1),
(1, 'teacher@r-cis.com', 1),
(2, 'student@r-cis.com', 1),
(2, 'teacher@r-cis.com', 0);

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
(1, 'This is a test Email Communication');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`BatchID`, `CourseID`, `TeacherID`, `StartDate`, `EndDate`, `SessionDuration`, `NextSessionDate`, `RatingID`, `IsActive`, `CreatedBy`, `ModifiedBy`, `CreatedOn`, `LastModifiedDate`) VALUES
(1, '1', 'teacher@r-cis.com', '1970-01-01', '1970-01-01', '45', '0000-00-00 00:00:00', NULL, 'Yes', 'teacher@r-cis.com', NULL, NULL, NULL),
(2, '2', 'teacher@r-cis.com', '1970-01-01', '1970-01-01', '45', '0000-00-00 00:00:00', NULL, 'Yes', 'teacher@r-cis.com', NULL, NULL, NULL),
(3, '3', 'admin@r-cis.com', '0000-00-00', '0000-00-00', '30', '0000-00-00 00:00:00', NULL, 'Yes', 'System', NULL, NULL, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`CourseID`, `InstructorID`, `CourseName`, `Category`, `SubCategory`, `Overview`, `TotalHour`, `HourPerSession`, `MaxofStudet`, `QualificationForStudent`, `Requirements`, `VideoLink`, `CouseFree`, `IsActive`, `CreatedBy`, `ModifiedBy`, `CreatedOn`, `LastModifiedDate`) VALUES
(1, 'teacher@r-cis.com', 'My Calendar Test', 'Dance', 'Blues', '                                                                                                                                                                        First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ...                                                                                                                                                 ', '6', '45', '10', ' \r\n                             \r\n                             \r\n                             \r\n                             \r\n                             \r\n                            First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ...                                                                                                                                                 ', '                                                                                                                                                                        First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ... First Time Test Course ...                                                                                                                                                 ', 'http://www.youtube.com/watch?v=dcp5RzyOaLY', '30', 'Yes', NULL, NULL, NULL, '2014-05-20 11:45:27'),
(2, 'teacher@r-cis.com', 'Taposh Test', 'Music', 'Banjo', 'TEST', '3', '45', '10', 'TEST ', 'TEST ', '', '30', 'Yes', NULL, NULL, NULL, '2014-05-19 11:00:06'),
(3, 'admin@r-cis.com', 'Demo Session', 'Demo Session', 'Demo Session', '', '1', '1', '1', 'N/A', 'N/A', 'N/A', '0', 'Yes', NULL, NULL, NULL, '2014-05-19 23:07:36');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`EducationID`, `UserID`, `Institute`, `Degree`, `Major`, `StartYear`, `EndYear`) VALUES
(1, 'teacher@r-cis.com', 'National ', 'CPANN', 'Auditing & Taxation', '1996', '1997'),
(2, 'teacher@r-cis.com', 'International', 'NCLS', 'Txce', '2000', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_enrollment_record`
--

INSERT INTO `tbl_enrollment_record` (`ID`, `CourseID`, `BatchID`, `TeacherID`, `StudentID`, `DateOfEnrollment`, `AcceptNote`, `RejectNote`, `ModifiedBy`, `ModifiedOn`) VALUES
(1, '1', '1', 'teacher@r-cis.com', 'student@r-cis.com', '2014-05-18 02:47:04', 'APPROVED', NULL, NULL, '2014/05/18 02:47:04'),
(2, '1', '1', 'teacher@r-cis.com', 'student@r-cis.com', '2014-05-19 04:02:31', NULL, NULL, NULL, '2014/05/19 04:02:31'),
(3, '1', 'assets', NULL, 'student@r-cis.com', '2014-05-19 04:02:33', NULL, NULL, NULL, '2014/05/19 04:02:33'),
(4, '1', 'assets', NULL, 'student@r-cis.com', '2014-05-19 04:02:35', NULL, NULL, NULL, '2014/05/19 04:02:35');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_experience`
--

INSERT INTO `tbl_experience` (`ExperienceID`, `UserID`, `Position`, `Employer`, `StartYear`, `EndYear`) VALUES
(1, 'teacher@r-cis.com', 'Boss', 'Tanvir', '1996', '1997');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`ID`, `Email`, `Notification`, `Status`, `DateTime`) VALUES
(1, 'teacher@r-cis.com', 'Profile updated', 'Read', '2014-05-17 22:41:52'),
(2, 'teacher@r-cis.com', '<a href="http://localhost/studio_1/teacher/view_course/1/1">Created My Calendar Test successfully.</a>', 'Un-Read', '2014-05-17 22:51:31'),
(3, 'teacher@r-cis.com', 'Edited My Calendar Test', 'Read', '2014-05-17 23:02:06'),
(4, 'teacher@r-cis.com', 'Edited My Calendar Test', 'Un-Read', '2014-05-17 23:03:17'),
(5, 'teacher@r-cis.com', 'Edited My Calendar Test', 'Un-Read', '2014-05-17 23:05:39'),
(6, 'teacher@r-cis.com', '<b>My Calendar Test</b>  Date & Time updated', 'Un-Read', '2014-05-17 23:23:35'),
(7, 'teacher@r-cis.com', 'Profile updated', 'Un-Read', '2014-05-17 23:29:48'),
(8, 'teacher@r-cis.com', 'Edited My Calendar Test', 'Un-Read', '2014-05-18 00:05:21'),
(9, 'teacher@r-cis.com', 'Edited My Calendar Test', 'Un-Read', '2014-05-18 00:06:51'),
(10, '0', 'Course My Calendar Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-17 20:46:28'),
(11, '0', 'Course My Calendar Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-17 20:46:28'),
(12, 'student@r-cis.com', 'Signed up for My Calendar Test', 'Un-Read', '2014-05-17 20:47:14'),
(13, 'teacher@r-cis.com', 'Mr. Mohammad Student Hossain''s signup request approved.', 'Un-Read', '2014-05-17 20:47:14'),
(14, 'teacher@r-cis.com', 'FIRST session message!', 'Un-Read', '2014-05-19 11:00:07'),
(15, 'teacher@r-cis.com', '<a href="http://localhost/studio_1/teacher/view_course/2/2">Created Taposh Test successfully.</a>', 'Un-Read', '2014-05-19 11:00:07'),
(16, 'teacher@r-cis.com', 'My+Calendar+Test session started!', 'Un-Read', '2014-05-19 12:45:17'),
(17, 'student@r-cis.com', 'My+Calendar+Test session started!', 'Un-Read', '2014-05-19 12:45:17'),
(18, 'teacher@r-cis.com', 'Taposh+Test session started!', 'Un-Read', '2014-05-19 12:45:22'),
(19, 'teacher@r-cis.com', 'Taposh+Test session started!', 'Un-Read', '2014-05-19 12:45:23'),
(20, '0', 'Course My Calendar Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-18 22:02:33'),
(21, '0', 'Course My Calendar Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-18 22:02:33'),
(22, '0', 'Course My Calendar Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-18 22:02:35'),
(23, '0', 'Course My Calendar Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-18 22:02:35'),
(24, '0', 'Course My Calendar Testsignup pending for instructor''s approval.', 'Un-Read', '2014-05-18 22:02:37'),
(25, '0', 'Course My Calendar Test signup request from Mr. Mohammad Student Hossain', 'Un-Read', '2014-05-18 22:02:37'),
(26, 'teacher@r-cis.com', 'My+Calendar+Test session started!', 'Un-Read', '2014-05-19 22:28:31'),
(27, 'student@r-cis.com', 'My+Calendar+Test session started!', 'Un-Read', '2014-05-19 22:28:31'),
(28, 'teacher@r-cis.com', 'My+Calendar+Test session started!', 'Un-Read', '2014-05-19 22:28:32'),
(29, 'student@r-cis.com', 'My+Calendar+Test session started!', 'Un-Read', '2014-05-19 22:28:32'),
(30, 'teacher@r-cis.com', 'Taposh+Test session started!', 'Un-Read', '2014-05-19 22:28:35'),
(31, 'teacher@r-cis.com', 'Taposh+Test session started!', 'Un-Read', '2014-05-19 22:28:36'),
(32, 'admin@r-cis.com', 'Welcome to Studionear!', 'Un-Read', '2014-05-19 23:07:36'),
(33, 'admin@r-cis.com', 'Profile updated', 'Un-Read', '2014-05-19 23:18:38'),
(34, 'admin@r-cis.com', 'Profile updated', 'Un-Read', '2014-05-19 23:18:54'),
(35, 'teacher@r-cis.com', 'Edited My Calendar Test', 'Un-Read', '2014-05-20 11:45:27'),
(36, 'teacher@r-cis.com', 'Sent message to students', 'Un-Read', '2014-05-20 11:46:32'),
(37, 'teacher@r-cis.com', 'Profile updated', 'Un-Read', '2014-05-20 11:49:18'),
(38, 'teacher@r-cis.com', 'Profile updated', 'Un-Read', '2014-05-20 11:50:54');

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
('2MF129099Y038271H', '2014-05-10T12:53:39Z', 'c5abd5d7b7b1', 'SuccessWithWarning', '10952652', '10215', 'Soft Descriptor truncated', 'The soft descriptor passed in was truncated', 'Warning', '1TC55799BD423652M', '2MF129099Y038271H', '1290-4540-8969-3390', 'cart', 'instant', '2014-05-10T12:53:39Z', '10.00', '0.59', '0.00', 'USD', 'Completed', 'None', 'None', 'Ineligible', 'None', '1399726415', 'You have purchased a course from STUDIO NEAR, LLC.', 'STUDIO NEAR, LLC', 'student@r-cis.com', '2', '2'),
('7TV197867F709630L', '2014-05-18T02:47:14Z', '3f69ac0d1b77a', 'SuccessWithWarning', '11024577', '10215', 'Soft Descriptor truncated', 'The soft descriptor passed in was truncated', 'Warning', '4HH19440A48865416', '7TV197867F709630L', '4628-9003-4318-2023', 'cart', 'instant', '2014-05-18T02:47:13Z', '30.00', '1.17', '0.00', 'USD', 'Completed', 'None', 'None', 'Ineligible', 'None', '1400381224', 'You have purchased a course from STUDIO NEAR, LLC.', 'STUDIO NEAR, LLC', 'student@r-cis.com', '1', '1');

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
('2014-05-10T12:52:00Z', '894e9dddb7245', 'SuccessWithWarning', '10762035', '10571', 'Transaction approved but with invalid CSC format.', 'This transaction was approved. However, the Card Security Code provided had too few, too many, or invalid character types but, as per your account option settings, was not required in the approval process.', 'Warning', 'ProcessorResponse', '0000', '23.00', 'USD', 'X', 'M', '70R22599R67644355', '', 'AngellEYE_PHPClass', '', '127.0.0.1', '1', 'Amex', '374638525834094', '042019', '123', 'Mrs.', 'Kazi', 'Murshed', 'Address1', 'City', 'Rhode Island', 'US', 'ZiP007', '0181919291', 'student@r-cis.com', '4', '4', 1),
('2014-05-18T02:46:23Z', '536eb1a23973', 'SuccessWithWarning', '10958405', '10571', 'Transaction approved but with invalid CSC format.', 'This transaction was approved. However, the Card Security Code provided had too few, too many, or invalid character types but, as per your account option settings, was not required in the approval process.', 'Warning', 'ProcessorResponse', '0000', '30.00', 'USD', 'X', 'M', '7TV197867F709630L', '', 'AngellEYE_PHPClass', '', '127.0.0.1', '1', 'Amex', '374638525834094', '042019', '123', 'Mrs.', 'Shofi', 'Uddin', 'Address1', 'City', 'RI', 'US', 'ZiP007', '444-444-4444', 'student@r-cis.com', '1', '1', 1),
('2014-05-19T16:02:31Z', 'b0a82fe03be1c', 'SuccessWithWarning', '11077688', '10571', 'Transaction approved but with invalid CSC format.', 'This transaction was approved. However, the Card Security Code provided had too few, too many, or invalid character types but, as per your account option settings, was not required in the approval process.', 'Warning', 'ProcessorResponse', '0000', '30.00', 'USD', 'X', 'M', '2VH561671T687445N', '', 'AngellEYE_PHPClass', '', '127.0.0.1', '1', 'Amex', '374638525834094', '042019', '123', 'Mrs.', 'Kazi', 'Murshed', 'Address1', 'City', 'Rhode Island', 'US', 'ZiP007', '0181919291', 'student@r-cis.com', '1', '1', 0);

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
('teacher@r-cis.com', 'd08d1831b3c0b8f777a03e29cba1c04c.jpg', 'UTC', 0, '     Address1', '     Address2', '     City2', 'RI', '2222', 'United States', '019151162222', '01974116222', 'altemai222l@alt.com', '1992-09-16', 'English', '4', '<p>My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;</p><p>&nbsp;</p><p>My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good.&nbsp;My overview is good. 222</p>', NULL, NULL, '<ul><li>Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad... Other qualification is bad...222</li></ul>', 'http://youtube.com/watch/2SRMg_K_ILg', '10', NULL, 'Hossain Khandaker Kamr', '2014-02-15 03:20:35', '2014-05-20 11:50:53'),
('student@r-cis.com', 'fac5c7e708148e5e70dbdef46b640319.jpg', 'UP65', 0, '        Address1', '        Address2', '        City', 'AL', 'Zip009', 'United States', '019191919191', '987654321', 'alt@r-cis.com', '1984-06-19', 'English3', '100', '<p>About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;About Me ...&nbsp;</p>', NULL, NULL, '', 'http://youtube.com/watch/2SRMg_K_ILg', '10', NULL, 'Mr. Mohammad Student Hossain', '2014-02-15 03:40:22', '2014-05-20 11:48:50'),
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
('arif33@r-cis.com', 'eb130e4aa6ccb7571b39c89471556318.jpg', 'UP600', 0, 'Address1', 'Address2', 'City', 'RI', 'ZiP007', 'United States', '01823148220', NULL, NULL, '2010-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-10 02:37:58', NULL),
('admin@r-cis.com', 'f25670317d596de32af60d0543cb098e.jpg', 'UTC', 0, '  D/36, Block E Zakir Hossain Road', '  Mohammadpur', '  Dhaka', 'AL', '29192', 'United States', '+8801714116111', '', '', '1971-12-16', 'English', '', '                                                                                                                        ', NULL, NULL, '  ', '', '', NULL, 'Administrator Studio', '2014-05-19 23:07:36', '2014-05-19 23:18:54');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`ScheduleID`, `BatchID`, `Day`, `StartTime`, `EndTime`, `Flexiblity`, `CreatedBy`, `ModifiedBy`, `CreatedOn`, `LastModifiedDate`, `schedule_date`) VALUES
(1, '1', '0', '12:45:00', '13:45:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '2014-05-20'),
(2, '1', '0', '12:45:00', '13:45:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '2014-05-22'),
(3, '1', '0', '12:45:00', '13:45:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '2014-05-27'),
(4, '1', '0', '12:45:00', '13:45:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '2014-05-30'),
(5, '1', '0', '12:45:00', '13:45:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '2014-06-03'),
(6, '1', '0', '12:45:00', '13:45:00', 'Flexible', 'teacher@r-cis.com', 'teacher@r-cis.com', NULL, NULL, '2014-05-10'),
(7, '2', NULL, '00:45:00', '01:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-08'),
(8, '2', NULL, '00:45:00', '01:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-05-26'),
(9, '2', NULL, '00:45:00', '01:45:00', 'Flexible', 'teacher@r-cis.com', NULL, NULL, NULL, '2014-06-02'),
(10, '3', 'Sunday', '10:00:00', '11:00:00', 'Flexible', 'System', NULL, NULL, NULL, '0000-00-00');

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
('arif33@r-cis.com', ' ', ' '),
('admin@r-cis.com', ' ', ' ');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_session_log`
--

INSERT INTO `tbl_session_log` (`ID`, `MeetingName`, `MeetingID`, `StudentPWD`, `ModeratorPW`, `CourseID`, `BatchID`, `CreatedOn`) VALUES
(1, 'My+Calendar+Test', '14-05-1911112', '618030', '133985', '1', '1', '2014-05-19 12:45:17'),
(2, 'Taposh+Test', '14-05-1922212', '006452', '226148', '2', '2', '2014-05-19 12:45:22'),
(3, 'Taposh+Test', '14-05-19assets2212', '493645', '605887', 'assets', '2', '2014-05-19 12:45:23'),
(4, 'My+Calendar+Test', '14-05-1911122', '889572', '050273', '1', '1', '2014-05-19 22:28:31'),
(5, 'My+Calendar+Test', '14-05-19assets1122', '904040', '491778', 'assets', '1', '2014-05-19 22:28:32'),
(6, 'Taposh+Test', '14-05-1922222', '532274', '674960', '2', '2', '2014-05-19 22:28:35'),
(7, 'Taposh+Test', '14-05-19assets2222', '817531', '609169', 'assets', '2', '2014-05-19 22:28:36');

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
('teacher@r-cis.com', 'Teacher', '1', 'No', 'teacher@r-cis.com', NULL, '2014-05-17 04:51:30', '0000-00-00 00:00:00'),
('student@r-cis.com', 'Student', '1', 'No', 'student@r-cis.com', NULL, '2014-05-18 02:46:28', '2014-05-18 02:47:16'),
('teacher@r-cis.com', 'Teacher', '2', 'No', 'teacher@r-cis.com', NULL, '2014-05-19 05:00:06', '0000-00-00 00:00:00'),
('admin@r-cis.com', 'Teacher', '3', 'No', 'System', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `UserID` text NOT NULL,
  `video_link` text NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'Hossain Khandaker Kamr', '$2a$08$qvWEelkfAb977ofqIfOzmefD0FWTNkGfP.U6K4VQIqMJO2rw6espK', 'teacher', 'teacher@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-05-20 11:49:05', '2014-02-15 09:20:35', '2014-05-20 11:49:05'),
(2, 'Mr. Mohammad Student Hossain', '$2a$08$p63WZUVI0CBYwmucQunb4OWvihal5baO4uDRFPQzn0iLGpM181JSm', 'student', 'student@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-05-20 11:53:33', '2014-02-15 09:40:22', '2014-05-20 11:53:33'),
(3, 'Administrator Studio', '$2a$08$bxZ/RAnEtO.dk/wP0Oede./tSG9ax6CB9FVL5zBLvfMQpYbaDAsK2', 'admin', 'admin@r-cis.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-05-20 03:01:23', '2014-05-19 23:07:36', '2014-05-20 03:01:23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 3, NULL, NULL),
(2, 3, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
