-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2017 at 12:55 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `postID` int(11) NOT NULL,
  `post_title` text,
  `post_cont` text,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_author` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `post_title`, `post_cont`, `post_date`, `post_author`) VALUES
(16, 'ij1iojwoj', 'ijdwoij', '2017-10-27 10:58:25', NULL),
(17, 'jdidjsao', 'oijdsiaoj', '2017-10-27 10:58:30', NULL),
(21, 'jdisojaoidksm', 'kdsmasondsaidsjnadoinwadlosnalÃ¶aidnsajn', '2017-10-27 11:25:35', NULL),
(22, 'helo', 'no thank you', '2017-10-27 11:27:45', 'Nils'),
(24, 'Hello There', 'General Kenobi', '2017-11-08 13:40:15', 'Jonas'),
(26, 'idji', 'jsdiaj', '2017-11-14 13:33:16', NULL),
(27, 'Wow', '<script>alert(\"wow\");<//script>', '2017-11-14 14:49:57', NULL),
(28, 'toto', '\"\"<script>alert(\"wow);</script>\"\"', '2017-11-14 14:51:22', NULL),
(29, 'wjhihw', 'e<script>alert(\"wowo\");</script>', '2017-11-14 14:52:24', NULL),
(30, 'jdsa', 'e<script>alert(\"wowo\");</script>', '2017-11-14 14:54:16', NULL),
(31, 'dsjak', '/<script>window.close();</script>', '2017-11-14 14:56:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_users`
--

CREATE TABLE `blog_users` (
  `userID` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_users`
--

INSERT INTO `blog_users` (`userID`, `user_name`, `user_pass`, `user_mail`) VALUES
(2, 'admin', 'password', 'admin@testdom.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `blog_users`
--
ALTER TABLE `blog_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `blog_users`
--
ALTER TABLE `blog_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
