-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 03:56 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `post`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userId` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '3',
  `lastLogin` datetime NOT NULL,
  `lastLogout` datetime NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userId`, `username`, `password`, `emailId`, `firstName`, `lastName`, `dob`, `role`, `lastLogin`, `lastLogout`) VALUES
(1, 'admin1', 'admin1', 'admin1@gmail.com', 'admin', '1', NULL, 3, '2017-04-10 11:22:57', '2017-04-10 12:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE IF NOT EXISTS `blogpost` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_updated` datetime NOT NULL,
  `post_category` int(11) NOT NULL,
  `post_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_Id` int(30) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `userid` (`user_Id`),
  KEY `post_category` (`post_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=290 ;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`post_id`, `post_title`, `post_content`, `author`, `post_created`, `post_updated`, `post_category`, `post_status`, `user_Id`) VALUES
(1, 'First post', 'abcdef', '1', '2017-03-21 09:48:25', '2017-04-03 16:53:23', 1, 1, 1),
(223, 'asdsadas', 'Enter text here...', '', '2017-03-30 11:36:49', '2017-04-03 16:53:26', 1, 1, 1),
(227, 'ff', 'asdasdasdasd', 'root is author', '2017-04-03 07:46:56', '2017-04-07 16:34:13', 3, 1, 120),
(268, 'asdsadas', 'sadsad', 'admin1', '2017-04-05 08:00:22', '2017-04-05 15:04:43', 3, 1, 1),
(276, 'q', 'sadsdad', 'root', '2017-04-05 10:04:03', '2017-04-05 15:37:33', 5, 1, 120),
(277, 'akash', 'Enter text here...asdasd', 'root', '2017-04-06 05:56:04', '2017-04-07 13:12:26', 5, 1, 120),
(278, 'a213123', 'Enter text here...', 'root', '2017-04-06 05:56:10', '0000-00-00 00:00:00', 1, 1, 120),
(283, 'asdsad', 'asdasdasd', 'root', '2017-04-07 07:41:20', '2017-04-07 14:18:00', 4, 1, 120),
(284, 'root', 'qweqweqwewqewqe', 'akash', '2017-04-07 07:41:51', '2017-04-07 13:12:44', 6, 1, 1),
(285, 'asdsadsadasdasda2313123', 'sadsad', 'root', '2017-04-07 07:49:17', '2017-04-07 13:21:38', 1, 0, 120),
(286, 'asdasd', 'sadsad', 'admin1', '2017-04-07 07:51:47', '0000-00-00 00:00:00', 6, 1, 1),
(287, 'fdsfsdfsdasdasdasd', 'Enter text here...asdasdasd', 'root', '2017-04-07 08:50:02', '0000-00-00 00:00:00', 1, 1, 120),
(288, 'sadasdasd', '11111111', 'root', '2017-04-07 12:26:50', '0000-00-00 00:00:00', 4, 1, 120),
(289, 'sdfsdfsdf', 'Enter text here...sdfsdfds', 'root', '2017-04-10 09:56:39', '0000-00-00 00:00:00', 1, 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parentC` int(11) DEFAULT NULL,
  PRIMARY KEY (`cId`),
  UNIQUE KEY `categoryName` (`categoryName`),
  KEY `parentC` (`parentC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cId`, `categoryName`, `description`, `status`, `parentC`) VALUES
(1, 'A', 'every post', 1, 0),
(2, 'A1', 'every sport', 1, 1),
(3, 'A2', 'all about media', 1, 1),
(4, 'B', '', 1, 0),
(5, 'B1', 'all about news', 1, 4),
(6, 'B1A', 'sdasdasd', 1, 5),
(7, 'B2', 'qweqweqwe', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comId` int(22) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `parent` int(22) NOT NULL DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `postId` int(11) NOT NULL,
  `userId` int(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`comId`),
  KEY `postId` (`postId`),
  KEY `userId` (`userId`),
  KEY `username` (`username`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comId`, `comment`, `parent`, `dateCreated`, `status`, `postId`, `userId`, `username`) VALUES
(130, 'this is the first comment', 0, '2017-04-10 09:57:31', 1, 1, 120, 'root'),
(131, 'this is repl to first comment', 130, '2017-04-10 09:57:45', 1, 1, 120, 'root'),
(132, 'another reply to first comment', 130, '2017-04-10 09:57:59', 1, 1, 120, 'root'),
(133, 'this is second comment', 0, '2017-04-10 09:58:12', 1, 1, 120, 'root');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `userId` int(30) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT 'anonymous',
  `sessionId` varchar(255) NOT NULL,
  `sStart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `sessionId` (`sessionId`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`userId`, `username`, `sessionId`, `sStart`, `role`) VALUES
(1, 'akash', 'jur3e1223vnu4seqa1fouqq632', '2017-04-10 10:23:46', 2),
(120, 'root', 'botpomtj0nso49kdklbkk4gem6', '2017-04-07 10:41:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessiona`
--

CREATE TABLE IF NOT EXISTS `sessiona` (
  `userId` int(30) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT 'anonymous',
  `sessionId` varchar(255) NOT NULL,
  `sStart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `sessionId` (`sessionId`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessionall`
--

CREATE TABLE IF NOT EXISTS `sessionall` (
  `userId` int(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `lastsession` datetime NOT NULL,
  `oldsessions` datetime NOT NULL,
  `currentsession` tinyint(1) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `idCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` tinyint(1) NOT NULL DEFAULT '2',
  `lastLogin` datetime NOT NULL,
  `lastLogout` datetime NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=139 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `emailId`, `firstName`, `lastName`, `dob`, `idCreated`, `role`, `lastLogin`, `lastLogout`) VALUES
(1, 'akash', '94754d0abb89e4cf0a7f1c494dbb9d2c', 'akash1@gmail.com', 'akash', '1', '0000-00-00', '2017-04-10 10:23:46', 2, '2017-04-10 15:53:46', '2017-04-07 13:13:04'),
(104, 'name', 'b068931cc450442b63f5b3d276ea4297', 'name', 'name', 'name', NULL, '2017-04-06 06:05:24', 2, '2017-04-06 11:35:04', '2017-04-06 11:35:24'),
(120, 'root', '81c3b080dad537de7e10e0987a4bf52e', '3', '', 'asdads', '0000-00-00', '2017-04-10 10:19:27', 2, '2017-04-10 15:48:07', '2017-04-10 15:49:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `catfk` FOREIGN KEY (`post_category`) REFERENCES `categories` (`cId`),
  ADD CONSTRAINT `PUFK` FOREIGN KEY (`user_Id`) REFERENCES `user` (`userId`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `blogpost` (`post_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `SUFK` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessiona`
--
ALTER TABLE `sessiona`
  ADD CONSTRAINT `SAFK` FOREIGN KEY (`userId`) REFERENCES `admin` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
