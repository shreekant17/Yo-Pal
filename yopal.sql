-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 02:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yopal`
--

-- --------------------------------------------------------

--
-- Table structure for table `allposts`
--

CREATE TABLE `allposts` (
  `PostId` varchar(300) NOT NULL,
  `PostedBy` varchar(300) DEFAULT NULL,
  `LikesCount` bigint(20) DEFAULT NULL,
  `CommentsCount` bigint(20) DEFAULT NULL,
  `Caption` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PostAddress` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VideoAddress` text DEFAULT NULL,
  `PostedOn` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allstories`
--

CREATE TABLE `allstories` (
  `StoryId` varchar(400) NOT NULL,
  `StoryBy` varchar(400) DEFAULT NULL,
  `ViewsCount` bigint(20) DEFAULT NULL,
  `LikesCount` bigint(20) DEFAULT NULL,
  `Caption` text DEFAULT NULL,
  `StoryAddress` varchar(500) DEFAULT NULL,
  `StoryPostedOn` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `PairId` varchar(800) NOT NULL,
  `sender` varchar(400) NOT NULL,
  `receiver` varchar(400) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentId` varchar(400) NOT NULL,
  `Comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PostId` varchar(500) DEFAULT NULL,
  `CommentedBy` varchar(500) DEFAULT NULL,
  `CommentedOn` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `Follower` varchar(400) DEFAULT NULL,
  `Following` varchar(400) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `PostId` varchar(400) DEFAULT NULL,
  `LikedBy` varchar(350) DEFAULT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `DPsrc` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `ActionTo` varchar(500) DEFAULT NULL,
  `ActionBy` varchar(500) DEFAULT NULL,
  `ActionOn` varchar(500) DEFAULT NULL,
  `ActionText` text DEFAULT NULL,
  `PostId` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `Fname` varchar(100) DEFAULT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Date_of_birth` date DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `DPsrc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Followers` bigint(20) DEFAULT NULL,
  `Followings` bigint(20) DEFAULT NULL,
  `PostsCount` bigint(20) DEFAULT NULL,
  `DeletedPosts` bigint(20) DEFAULT NULL,
  `StoriesCount` bigint(20) DEFAULT NULL,
  `DeletedStories` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allposts`
--
ALTER TABLE `allposts`
  ADD PRIMARY KEY (`PostId`);

--
-- Indexes for table `allstories`
--
ALTER TABLE `allstories`
  ADD PRIMARY KEY (`StoryId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentId`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD UNIQUE KEY `Follower` (`Follower`,`Following`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
