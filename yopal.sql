-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 08:19 PM
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

--
-- Dumping data for table `allposts`
--

INSERT INTO `allposts` (`PostId`, `PostedBy`, `LikesCount`, `CommentsCount`, `Caption`, `PostAddress`, `VideoAddress`, `PostedOn`) VALUES
('0_prasadashish007@gmail.com', 'prasadashish007@gmail.com', 7, 0, 'Stay Focused😤🔥', 'users/prasadashish007@gmail.com/posts/post1.jpg', NULL, '2023-05-19 12:19:06'),
('0_skkalwar999@gmail.com', 'skkalwar999@gmail.com', 8, 1, 'Hare Krishna', 'users/skkalwar999@gmail.com/posts/post1.jpg', NULL, '2023-05-20 16:51:08'),
('0_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 5, 2, 'How is it?? My #photography #nature ✨😇', 'users/borahaishwarya06@gmail.com/posts/post1.jpg', NULL, '2023-05-20 19:24:00'),
('0_sauravmazumder2003@gmail.com', 'sauravmazumder2003@gmail.com', 5, 0, 'Go with the flow', 'users/sauravmazumder2003@gmail.com/posts/post1.jpg', NULL, '2023-05-23 14:16:00'),
('2_AishwaryaB', 'borahaishwarya06@gmail.com', 4, 3, '🌼💗', 'users/borahaishwarya06@gmail.com/posts/post2.jpg', NULL, '2023-05-31 23:42:51'),
('6_skkalwar999@gmail.com', 'skkalwar999@gmail.com', 4, 0, '', NULL, 'users/skkalwar999@gmail.com/posts/post6.mp4', '2023-06-12 17:01:42'),
('2_arnabgupta000@gmail.com', 'arnabgupta000@gmail.com', 6, 1, 'Cute puppy', 'users/arnabgupta000@gmail.com/posts/post2.jpg', NULL, '2023-06-07 00:45:37'),
('3_prasadashish007@gmail.com', 'prasadashish007@gmail.com', 6, 0, '😌Jai shree ram🙏', 'users/prasadashish007@gmail.com/posts/post3.jpg', NULL, '2023-06-14 23:17:53'),
('5_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 6, 1, '🐥....🐱', NULL, 'users/borahaishwarya06@gmail.com/posts/post5.mp4', '2023-06-17 16:57:30'),
('6_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 5, 0, '(⁠◕⁠ᴗ⁠◕⁠✿⁠)', NULL, NULL, '2023-06-17 16:59:23'),
('7_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 5, 0, 'feeling blessed', NULL, NULL, '2023-06-19 01:18:27'),
('8_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 6, 0, '#night_quotes', 'users/borahaishwarya06@gmail.com/posts/post8.jpg', NULL, '2023-06-19 01:21:01'),
('8_skkalwar999@gmail.com', 'skkalwar999@gmail.com', 7, 0, '', 'users/skkalwar999@gmail.com/posts/post8.jpg', NULL, '2023-06-20 09:26:35'),
('9_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 5, 1, 'Caption', 'users/borahaishwarya06@gmail.com/posts/post9.jpg', NULL, '2023-06-21 11:08:19'),
('5_prasadashish007@gmail.com', 'prasadashish007@gmail.com', 5, 1, '✨Positive approach matters😌', 'users/prasadashish007@gmail.com/posts/post5.jpg', NULL, '2023-07-07 22:24:21'),
('1_kunaldas1365@gmail.com', 'kunaldas1365@gmail.com', 4, 1, 'Meow billi ; )', NULL, 'users/kunaldas1365@gmail.com/posts/post1.mp4', '2023-08-29 20:01:12'),
('10_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 2, 0, 'how are you?', NULL, NULL, '2023-10-12 17:13:34');

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

--
-- Dumping data for table `allstories`
--

INSERT INTO `allstories` (`StoryId`, `StoryBy`, `ViewsCount`, `LikesCount`, `Caption`, `StoryAddress`, `StoryPostedOn`) VALUES
('1_AishwaryaB', 'borahaishwarya06@gmail.com', 0, 0, 'Eman gorom porise ðŸ¥²', 'users/borahaishwarya06@gmail.com/stories/story1.jpg', '2023-05-31 20:14:47'),
('1_Bot.ashish', 'prasadashish007@gmail.com', 0, 0, 'ðŸ™Jai Shree RamðŸ™', 'users/prasadashish007@gmail.com/stories/story1.jpg', '2023-06-04 13:59:27'),
('2_Bot.ashish', 'prasadashish007@gmail.com', 0, 0, '', 'users/prasadashish007@gmail.com/stories/story2.jpg', '2023-06-14 23:18:40'),
('2_AishwaryaB', 'borahaishwarya06@gmail.com', 0, 0, 'âœ¨', 'users/borahaishwarya06@gmail.com/stories/story2.jpg', '2023-06-17 15:08:21'),
('2_Shreekant', 'skkalwar999@gmail.com', 0, 0, '', 'users/skkalwar999@gmail.com/stories/story2.jpg', '2023-06-19 15:28:22'),
('3_Shreekant', 'skkalwar999@gmail.com', 0, 0, '', 'users/skkalwar999@gmail.com/stories/story3.jpg', '2023-06-19 22:54:52'),
('1_marjinakhan', 'designerscloset561@gmail.com', 0, 0, '', 'users/designerscloset561@gmail.com/stories/story1.jpeg', '2023-06-19 22:57:51'),
('1_Guluglulu420', 'mashpotatoisthatyou@gmail.com', 0, 0, '', 'users/mashpotatoisthatyou@gmail.com/stories/story1.jpg', '2023-06-19 23:00:50'),
('3_Bot.ashish', 'prasadashish007@gmail.com', 0, 0, '', 'users/prasadashish007@gmail.com/stories/story3.jpg', '2023-06-27 00:02:17'),
('4_Bot.ashish', 'prasadashish007@gmail.com', 0, 0, '', 'users/prasadashish007@gmail.com/stories/story4.jpg', '2023-06-27 00:05:12');

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

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`PairId`, `sender`, `receiver`, `message`, `date`, `time`, `timestamp`) VALUES
('borahaishwarya06@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'borahaishwarya06@gmail.com', 'hi', '2023-12-02', '16:12:00', '2023-12-02 10:42:42'),
('borahaishwarya06@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'borahaishwarya06@gmail.com', 'hello', '2023-12-02', '16:13:00', '2023-12-02 10:43:05'),
('skkalwar999@gmail.com-zakirhussainsarkar37@gmail.com', 'zakirhussainsarkar37@gmail.com', 'skkalwar999@gmail.com', 'Halo', '2023-12-02', '16:31:00', '2023-12-02 11:01:42'),
('skkalwar999@gmail.com-zakirhussainsarkar37@gmail.com', 'zakirhussainsarkar37@gmail.com', 'skkalwar999@gmail.com', 'Mic 🎤 testing ', '2023-12-02', '16:32:00', '2023-12-02 11:02:10'),
('skkalwar999@gmail.com-zakirhussainsarkar37@gmail.com', 'skkalwar999@gmail.com', 'zakirhussainsarkar37@gmail.com', '123 testing', '2023-12-02', '16:33:00', '2023-12-02 11:03:41'),
('skkalwar999@gmail.com-zakirhussainsarkar37@gmail.com', 'skkalwar999@gmail.com', 'zakirhussainsarkar37@gmail.com', 'ji', '2023-12-14', '21:02:00', '2023-12-14 15:32:04'),
('arnabgupta000@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'arnabgupta000@gmail.com', 'ji', '2023-12-14', '21:02:00', '2023-12-14 15:32:23'),
('prasadashish007@gmail.com-skkalwar999@gmail.com', 'prasadashish007@gmail.com', 'skkalwar999@gmail.com', 'hii', '2024-02-26', '11:06:00', '2024-02-26 05:36:17'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', 'hii', '2024-02-26', '11:07:00', '2024-02-26 05:37:35'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', 'hi', '2024-02-26', '11:09:00', '2024-02-26 05:39:30'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'jksd', '2024-02-26', '11:09:00', '2024-02-26 05:39:48'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'Hey', '2024-02-26', '11:10:00', '2024-02-26 05:40:26'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'Yo', '2024-02-26', '11:10:00', '2024-02-26 05:40:30'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', 'yo', '2024-02-26', '11:10:00', '2024-02-26 05:40:33'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', 'ji', '2024-02-26', '11:17:00', '2024-02-26 05:47:23'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'hi', '2024-02-26', '11:19:00', '2024-02-26 05:49:58'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', 'hey', '2024-02-26', '11:20:00', '2024-02-26 05:50:49'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'kdhfjss', '2024-02-26', '11:21:00', '2024-02-26 05:51:15'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', 'kdsfkjl', '2024-02-26', '11:21:00', '2024-02-26 05:51:22'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', 'hjhgg', '2024-02-26', '11:22:00', '2024-02-26 05:52:19'),
('arnabgupta000@gmail.com-sauravmazumder2003@gmail.com', 'sauravmazumder2003@gmail.com', 'arnabgupta000@gmail.com', 'jsa', '2024-02-26', '11:27:00', '2024-02-26 05:57:42'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', 'lksda', '2024-02-26', '11:27:00', '2024-02-26 05:57:51'),
('sauravmazumder2003@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'yo', '2024-03-08', '21:15:00', '2024-03-08 15:45:40'),
('govindkumar77727@gmail.com-skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'govindkumar77727@gmail.com', 'ksdfjsl', '2024-03-17', '00:19:00', '2024-03-16 18:49:15');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentId`, `Comment`, `PostId`, `CommentedBy`, `CommentedOn`) VALUES
('1_borahaishwarya06@gmail.com2023-05-30 14:27:30', 'Thank you Ashish', '0_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', '2023-05-30 14:27:30'),
('0_prasadashish007@gmail.com2023-05-29 19:43:43', 'Mesmerizing 🕊️', '0_borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', '2023-05-29 19:43:43'),
('0_prasadashish007@gmail.com2023-05-29 16:44:58', 'Jai shree Krishna😌', '0_skkalwar999@gmail.com', 'prasadashish007@gmail.com', '2023-05-29 16:44:58'),
('0_borahaishwarya06@gmail.com2023-05-31 23:44:06', 'So, moi etiya gom palu je kio mur agor post bilak upload hua nasil... Moi link eta share korisilu.  Maybe heikarone..', '2_AishwaryaB', 'borahaishwarya06@gmail.com', '2023-05-31 23:44:06'),
('1_skkalwar999@gmail.com2023-06-01 00:41:11', 'The issue has been resolved✅️. Thanks for your feedback Aishwarya', '2_AishwaryaB', 'skkalwar999@gmail.com', '2023-06-01 00:41:11'),
('2_borahaishwarya06@gmail.com2023-06-01 00:43:04', 'Good to know that Shreekant. ', '2_AishwaryaB', 'borahaishwarya06@gmail.com', '2023-06-01 00:43:04'),
('0_prasadashish007@gmail.com2023-06-17 23:07:17', 'Just like you😙✨', '2_arnabgupta000@gmail.com', 'prasadashish007@gmail.com', '2023-06-17 23:07:17'),
('0_borahaishwarya06@gmail.com2023-06-21 11:08:34', 'Nice', '9_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', '2023-06-21 11:08:34'),
('0_akashdeepsarmah292@gmail.com2023-07-23 20:51:16', 'Nice', '5_borahaishwarya06@gmail.com', 'akashdeepsarmah292@gmail.com', '2023-07-23 20:51:16'),
('0_skkalwar999@gmail.com2023-08-29 20:05:13', 'Nice Pussycat 🔥🌹', '1_kunaldas1365@gmail.com', 'skkalwar999@gmail.com', '2023-08-29 20:05:13'),
('0_govindkumar77727@gmail.com2023-09-16 21:13:27', 'hello', '5_prasadashish007@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `Follower` varchar(400) DEFAULT NULL,
  `Following` varchar(400) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`Follower`, `Following`) VALUES
('AishwaryaB', 'Dhritiman'),
('AishwaryaB', 'Shreekant'),
('Arnab', 'Shreekant'),
('bot_ashish', 'AishwaryaB'),
('bot_ashish', 'Arnab'),
('bot_ashish', 'Sawraav'),
('bot_ashish', 'Shreekant'),
('Govind727', 'bot_ashish'),
('Govind727', 'Shreekant'),
('Guluglulu420', 'AishwaryaB'),
('Guluglulu420', 'bot_ashish'),
('Guluglulu420', 'Shreekant'),
('Nagu', 'Akashdeepsarmah'),
('Nagu', 'jakirhussain'),
('Nagu', 'Rohitroi'),
('Nagu', 'Shreekant'),
('Sawraav', 'AishwaryaB'),
('Sawraav', 'bot_ashish'),
('Sawraav', 'Shreekant'),
('Shreekant', 'AishwaryaB'),
('Shreekant', 'Arnab'),
('Shreekant', 'Avipshabiswas'),
('Shreekant', 'bot_ashish'),
('Shreekant', 'Dhritiman'),
('Shreekant', 'Govind727'),
('Shreekant', 'Guluglulu420'),
('Shreekant', 'Iffatjaved'),
('Shreekant', 'jakirhussain'),
('Shreekant', 'marjinakhan'),
('Shreekant', 'Nagu'),
('Shreekant', 'Ra');

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

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`PostId`, `LikedBy`, `Username`, `DPsrc`) VALUES
('0_skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('0_prasadashish007@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('0_sauravmazumder2003@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('0_prasadashish007@gmail.com', 'sauravmazumder2003@gmail.com', 'Sawraav', 'Resources/images/defaultDp.jpeg'),
('0_borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('0_prasadashish007@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('0_skkalwar999@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('0_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('0_skkalwar999@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('0_prasadashish007@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('0_skkalwar999@gmail.com', 'sauravmazumder2003@gmail.com', 'Sawraav', 'Resources/images/defaultDp.jpeg'),
('0_borahaishwarya06@gmail.com', 'sauravmazumder2003@gmail.com', 'Sawraav', 'Resources/images/defaultDp.jpeg'),
('2_AishwaryaB', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('0_sauravmazumder2003@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('0_sauravmazumder2003@gmail.com', 'sauravmazumder2003@gmail.com', 'Sawraav', 'Resources/images/defaultDp.jpeg'),
('0_sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('2_AishwaryaB', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('2_AishwaryaB', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('5_borahaishwarya06@gmail.com', 'deep05275@gmail.com', 'Rohitroi', 'Resources/images/defaultDp.jpeg'),
('0_skkalwar999@gmail.com', 'arnabgupta000@gmail.com', 'Arnab', 'users/arnabgupta000@gmail.com/dp/IMG_20230325_201543_385.jpg'),
('0_prasadashish007@gmail.com', 'arnabgupta000@gmail.com', 'Arnab', 'users/arnabgupta000@gmail.com/dp/IMG_20230325_201543_385.jpg'),
('3_prasadashish007@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('6_skkalwar999@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('2_arnabgupta000@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('6_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('2_arnabgupta000@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('3_prasadashish007@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('0_borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('2_arnabgupta000@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('6_skkalwar999@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('5_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('6_borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('3_prasadashish007@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('5_borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('6_borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('5_borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('7_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('8_borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('7_borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('7_borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('8_borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('7_borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('6_borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('5_borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('3_prasadashish007@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('6_skkalwar999@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('2_arnabgupta000@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('2_AishwaryaB', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('0_sauravmazumder2003@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('0_borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('0_skkalwar999@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('0_prasadashish007@gmail.com', 'mashpotatoisthatyou@gmail.com', 'Guluglulu420', 'Resources/images/defaultDp.jpeg'),
('8_skkalwar999@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('8_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('8_skkalwar999@gmail.com', 'avipshaavipsha34@gmail.com', 'Avipshabiswas', 'Resources/images/defaultDp.jpeg'),
('3_prasadashish007@gmail.com', 'avipshaavipsha34@gmail.com', 'Avipshabiswas', 'Resources/images/defaultDp.jpeg'),
('2_arnabgupta000@gmail.com', 'avipshaavipsha34@gmail.com', 'Avipshabiswas', 'Resources/images/defaultDp.jpeg'),
('0_skkalwar999@gmail.com', 'avipshaavipsha34@gmail.com', 'Avipshabiswas', 'Resources/images/defaultDp.jpeg'),
('0_prasadashish007@gmail.com', 'avipshaavipsha34@gmail.com', 'Avipshabiswas', 'Resources/images/defaultDp.jpeg'),
('8_skkalwar999@gmail.com', 'deep05275@gmail.com', 'Rohitroi', 'Resources/images/defaultDp.jpeg'),
('', 'deep05275@gmail.com', 'Rohitroi', 'Resources/images/defaultDp.jpeg'),
('6_skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('8_skkalwar999@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('9_borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('8_skkalwar999@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('9_borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('8_borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('5_prasadashish007@gmail.com', 'prasadashish007@gmail.com', 'Bot.ashish', 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg'),
('5_prasadashish007@gmail.com', 'kunaldas1365@gmail.com', 'Nagu', 'users/kunaldas1365@gmail.com/dp/modiji12.jpg'),
('5_prasadashish007@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('9_borahaishwarya06@gmail.com', 'kunaldas1365@gmail.com', 'Nagu', 'users/kunaldas1365@gmail.com/dp/modiji12.jpg'),
('8_skkalwar999@gmail.com', 'kunaldas1365@gmail.com', 'Nagu', 'users/kunaldas1365@gmail.com/dp/modiji12.jpg'),
('8_borahaishwarya06@gmail.com', 'kunaldas1365@gmail.com', 'Nagu', 'users/kunaldas1365@gmail.com/dp/modiji12.jpg'),
('7_borahaishwarya06@gmail.com', 'kunaldas1365@gmail.com', 'Nagu', 'users/kunaldas1365@gmail.com/dp/modiji12.jpg'),
('1_kunaldas1365@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('1_kunaldas1365@gmail.com', 'kunaldas1365@gmail.com', 'Nagu', 'users/kunaldas1365@gmail.com/dp/modiji12.jpg'),
('0_skkalwar999@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('5_prasadashish007@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('1_', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('1_kunaldas1365@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('9_borahaishwarya06@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('8_skkalwar999@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('8_borahaishwarya06@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('6_borahaishwarya06@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('5_borahaishwarya06@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('3_prasadashish007@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('2_arnabgupta000@gmail.com', 'govindkumar77727@gmail.com', 'Govind727', 'Resources/images/defaultDp.jpeg'),
('5_prasadashish007@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('9_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('1_kunaldas1365@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg'),
('10_borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', 'Shreekant', 'users/skkalwar999@gmail.com/dp/images (15).jpeg'),
('10_borahaishwarya06@gmail.com', 'borahaishwarya06@gmail.com', 'AishwaryaB', 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg');

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

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`ActionTo`, `ActionBy`, `ActionOn`, `ActionText`, `PostId`) VALUES
('skkalwar999@gmail.com', 'borahaishwarya06@gmail.com', '2023-06-16 15:19:06', 'Liked your post', '0_skkalwar999@gmail.com'),
('skkalwar999@gmail.com', 'borahaishwarya06@gmail.com', '2023-06-16 15:19:27', 'Started following you', NULL),
('arnabgupta000@gmail.com', 'borahaishwarya06@gmail.com', '2023-06-16 15:21:34', 'Liked your post', '2_arnabgupta000@gmail.com'),
('skkalwar999@gmail.com', 'borahaishwarya06@gmail.com', '2023-06-16 15:22:49', 'Liked your post', '6_skkalwar999@gmail.com'),
('prasadashish007@gmail.com', 'skkalwar999@gmail.com', '2023-10-22 19:10:45', 'Liked your post', '0_prasadashish007@gmail.com'),
('prasadashish007@gmail.com', 'skkalwar999@gmail.com', '2023-06-19 20:41:37', 'Liked your post', '3_prasadashish007@gmail.com'),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-09-17 15:38:05', 'Liked your post', '2_AishwaryaB'),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-09-17 15:38:10', 'Liked your post', '0_borahaishwarya06@gmail.com'),
('arnabgupta000@gmail.com', 'skkalwar999@gmail.com', '2023-06-22 10:16:02', 'Liked your post', '2_arnabgupta000@gmail.com'),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-06-17 15:27:03', 'Liked your post', '3_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-06-20 01:44:46', 'Liked your post', '6_borahaishwarya06@gmail.com'),
('prasadashish007@gmail.com', 'borahaishwarya06@gmail.com', '2023-06-17 17:46:30', 'Liked your post', '3_prasadashish007@gmail.com'),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-07-23 21:09:36', 'Liked your post', '5_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-10-11 18:59:55', 'Started following you', NULL),
('designerscloset561@gmail.com', 'skkalwar999@gmail.com', '2023-10-30 16:04:16', 'Started following you', NULL),
('mashpotatoisthatyou@gmail.com', 'skkalwar999@gmail.com', '2023-06-19 20:28:31', 'Started following you', NULL),
('zakirhussainsarkar37@gmail.com', 'skkalwar999@gmail.com', '2023-10-30 15:51:13', 'Started following you', NULL),
('dhritimanboruah123@gmail.com', 'skkalwar999@gmail.com', '2023-06-19 20:28:32', 'Started following you', NULL),
('borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', '2023-06-17 23:02:30', 'Liked your post', '6_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', '2023-06-17 23:02:39', 'Liked your post', '5_borahaishwarya06@gmail.com'),
('arnabgupta000@gmail.com', 'skkalwar999@gmail.com', '2023-06-19 20:28:33', 'Started following you', NULL),
('dhritimanboruah123@gmail.com', 'borahaishwarya06@gmail.com', '2023-06-18 15:25:35', 'Started following you', NULL),
('arnabgupta000@gmail.com', 'prasadashish007@gmail.com', '2023-06-17 23:02:48', 'Started following you', NULL),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-06-20 14:06:35', 'Liked your post', '8_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-06-19 20:20:12', 'Liked your post', '7_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', '2023-06-19 14:01:42', 'Liked your post', '7_borahaishwarya06@gmail.com'),
('skkalwar999@gmail.com', 'borahaishwarya06@gmail.com', '2023-06-20 14:06:13', 'Liked your post', '8_skkalwar999@gmail.com'),
('sauravmazumder2003@gmail.com', 'skkalwar999@gmail.com', '2023-09-17 15:38:08', 'Liked your post', '0_sauravmazumder2003@gmail.com'),
('borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:33', 'Liked your post', '8_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:35', 'Liked your post', '7_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:37', 'Liked your post', '6_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:38', 'Liked your post', '5_borahaishwarya06@gmail.com'),
('prasadashish007@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:40', 'Liked your post', '3_prasadashish007@gmail.com'),
('skkalwar999@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:41', 'Liked your post', '6_skkalwar999@gmail.com'),
('arnabgupta000@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:45', 'Liked your post', '2_arnabgupta000@gmail.com'),
('borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:45', 'Liked your post', '2_AishwaryaB'),
('sauravmazumder2003@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:46', 'Liked your post', '0_sauravmazumder2003@gmail.com'),
('borahaishwarya06@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:47', 'Liked your post', '0_borahaishwarya06@gmail.com'),
('skkalwar999@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:49', 'Liked your post', '0_skkalwar999@gmail.com'),
('prasadashish007@gmail.com', 'mashpotatoisthatyou@gmail.com', '2023-06-19 23:01:51', 'Liked your post', '0_prasadashish007@gmail.com'),
('skkalwar999@gmail.com', 'avipshaavipsha34@gmail.com', '2023-06-20 19:57:51', 'Liked your post', '8_skkalwar999@gmail.com'),
('prasadashish007@gmail.com', 'avipshaavipsha34@gmail.com', '2023-06-20 19:58:17', 'Liked your post', '3_prasadashish007@gmail.com'),
('arnabgupta000@gmail.com', 'avipshaavipsha34@gmail.com', '2023-06-20 19:58:24', 'Liked your post', '2_arnabgupta000@gmail.com'),
('skkalwar999@gmail.com', 'avipshaavipsha34@gmail.com', '2023-06-20 19:58:36', 'Liked your post', '0_skkalwar999@gmail.com'),
('prasadashish007@gmail.com', 'avipshaavipsha34@gmail.com', '2023-06-20 19:58:40', 'Liked your post', '0_prasadashish007@gmail.com'),
('borahaishwarya06@gmail.com', 'deep05275@gmail.com', '2023-06-20 23:05:39', 'Liked your post', '5_borahaishwarya06@gmail.com'),
('skkalwar999@gmail.com', 'deep05275@gmail.com', '2023-06-20 23:08:24', 'Liked your post', '8_skkalwar999@gmail.com'),
('', 'deep05275@gmail.com', '', 'Liked your post', ''),
('skkalwar999@gmail.com', 'prasadashish007@gmail.com', '2023-06-27 00:01:36', 'Liked your post', '8_skkalwar999@gmail.com'),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-06-21 12:31:05', 'Liked your post', '9_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', '2023-06-27 00:01:36', 'Liked your post', '9_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'prasadashish007@gmail.com', '2023-06-27 00:01:55', 'Liked your post', '8_borahaishwarya06@gmail.com'),
('prasadashish007@gmail.com', 'skkalwar999@gmail.com', '2023-07-07 22:48:10', 'Liked your post', '5_prasadashish007@gmail.com'),
('borahaishwarya06@gmail.com', 'akashdeepsarmah292@gmail.com', '2023-07-23 20:51:16', 'Commented on your post', '5_borahaishwarya06@gmail.com'),
('prasadashish007@gmail.com', 'kunaldas1365@gmail.com', '2023-08-29 19:38:06', 'Liked your post', '5_prasadashish007@gmail.com'),
('borahaishwarya06@gmail.com', 'kunaldas1365@gmail.com', '2023-08-29 19:38:07', 'Liked your post', '9_borahaishwarya06@gmail.com'),
('skkalwar999@gmail.com', 'kunaldas1365@gmail.com', '2023-08-29 19:38:10', 'Liked your post', '8_skkalwar999@gmail.com'),
('borahaishwarya06@gmail.com', 'kunaldas1365@gmail.com', '2023-08-29 19:38:12', 'Liked your post', '8_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'kunaldas1365@gmail.com', '2023-08-29 19:38:17', 'Liked your post', '7_borahaishwarya06@gmail.com'),
('skkalwar999@gmail.com', 'kunaldas1365@gmail.com', '2023-08-29 19:38:44', 'Started following you', NULL),
('zakirhussainsarkar37@gmail.com', 'kunaldas1365@gmail.com', '2023-08-29 19:39:05', 'Started following you', NULL),
('akashdeepsarmah292@gmail.com', 'kunaldas1365@gmail.com', '2023-08-29 19:39:06', 'Started following you', NULL),
('deep05275@gmail.com', 'kunaldas1365@gmail.com', '2023-08-29 19:39:07', 'Started following you', NULL),
('kunaldas1365@gmail.com', 'skkalwar999@gmail.com', '2023-08-29 20:02:58', 'Liked your post', '1_kunaldas1365@gmail.com'),
('kunaldas1365@gmail.com', 'skkalwar999@gmail.com', '2023-08-29 20:05:13', 'Commented on your post', '1_kunaldas1365@gmail.com'),
('kunaldas1365@gmail.com', 'skkalwar999@gmail.com', '2023-08-29 20:07:08', 'Started following you', NULL),
('prasadashish007@gmail.com', 'skkalwar999@gmail.com', '2023-10-30 01:19:31', 'Started following you', NULL),
('skkalwar999@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:12:34', 'Liked your post', '0_skkalwar999@gmail.com'),
('prasadashish007@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:13:27', 'Commented on your post', '5_prasadashish007@gmail.com'),
('skkalwar999@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:15:58', 'Started following you', NULL),
('prasadashish007@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:15:59', 'Started following you', NULL),
('prasadashish007@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:19:14', 'Liked your post', '5_prasadashish007@gmail.com'),
('', 'govindkumar77727@gmail.com', '2023-09-16 21:19:17', 'Liked your post', '1_'),
('kunaldas1365@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:19:20', 'Liked your post', '1_kunaldas1365@gmail.com'),
('borahaishwarya06@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:19:28', 'Liked your post', '9_borahaishwarya06@gmail.com'),
('skkalwar999@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:19:30', 'Liked your post', '8_skkalwar999@gmail.com'),
('borahaishwarya06@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:19:33', 'Liked your post', '8_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:19:43', 'Liked your post', '6_borahaishwarya06@gmail.com'),
('borahaishwarya06@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:19:46', 'Liked your post', '5_borahaishwarya06@gmail.com'),
('prasadashish007@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:19:48', 'Liked your post', '3_prasadashish007@gmail.com'),
('arnabgupta000@gmail.com', 'govindkumar77727@gmail.com', '2023-09-16 21:19:52', 'Liked your post', '2_arnabgupta000@gmail.com'),
('govindkumar77727@gmail.com', 'skkalwar999@gmail.com', '2023-09-17 15:36:24', 'Started following you', NULL),
('prasadashish007@gmail.com', 'borahaishwarya06@gmail.com', '2023-10-12 17:14:12', 'Liked your post', '5_prasadashish007@gmail.com'),
('kunaldas1365@gmail.com', 'borahaishwarya06@gmail.com', '2023-10-12 17:14:27', 'Liked your post', '1_kunaldas1365@gmail.com'),
('avipshaavipsha34@gmail.com', 'skkalwar999@gmail.com', '2023-10-23 00:34:53', 'Started following you', NULL),
('borahaishwarya06@gmail.com', 'skkalwar999@gmail.com', '2023-10-25 12:44:49', 'Liked your post', '10_borahaishwarya06@gmail.com'),
('raj@gmail.com', 'skkalwar999@gmail.com', '2023-10-30 10:26:24', 'Started following you', NULL),
('javediffat146@gmail.com', 'skkalwar999@gmail.com', '2023-10-30 17:44:47', 'Started following you', NULL);

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
  `Contact` bigint(10) NOT NULL,
  `DPsrc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Followers` bigint(20) DEFAULT NULL,
  `Followings` bigint(20) DEFAULT NULL,
  `PostsCount` bigint(20) DEFAULT NULL,
  `DeletedPosts` bigint(20) DEFAULT NULL,
  `StoriesCount` bigint(20) DEFAULT NULL,
  `DeletedStories` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`Fname`, `Lname`, `Username`, `Email`, `Password`, `Date_of_birth`, `Gender`, `Contact`, `DPsrc`, `Followers`, `Followings`, `PostsCount`, `DeletedPosts`, `StoriesCount`, `DeletedStories`) VALUES
('Shreekant', 'Kalwar', 'Shreekant', 'skkalwar999@gmail.com', '@shree#1234', '2002-09-23', 'M', 8876452874, 'users/skkalwar999@gmail.com/dp/assassins-creed-mirage-4k-basim-wallpaper-i-made-from-the-v0-ocumyhwmpum91 (1).jpeg', 7000000, 12, 3, 4, 3, 0),
('Ashish Kumar', 'Prasad', 'Bot.ashish', 'prasadashish007@gmail.com', 'Kumar@2004', '2004-03-01', 'M', 0, 'users/prasadashish007@gmail.com/dp/IMG_20230203_133041_059.jpg', 4, 4, 3, 2, 4, 0),
('Aishwarya', 'Borah', 'AishwaryaB', 'borahaishwarya06@gmail.com', '*32boraish5#2', '2003-01-18', 'F', 0, 'users/borahaishwarya06@gmail.com/dp/girls & art discovered by Ἕως on We Heart It.jpg', 200, 2, 8, 2, 2, 0),
('Marjina', 'Khan', 'marjinakhan', 'designerscloset561@gmail.com', 'witcherisme24', '2006-06-25', 'F', 0, NULL, 1, 0, 0, 0, 1, 0),
('Gulu ', 'Gulu', 'Guluglulu420', 'mashpotatoisthatyou@gmail.com', 'mashpotatoisthatyou420', '2004-01-07', 'F', 0, NULL, 1, 3, 0, 0, 1, 0),
('Saurav', 'Mazumder', 'Sawraav', 'sauravmazumder2003@gmail.com', 'saurav@1111', '2003-12-25', 'M', 0, NULL, 1, 3, 1, 0, 0, 0),
('DHRITIMAN', 'BORUAH', 'Dhritiman', 'dhritimanboruah123@gmail.com', 'dhritiman90', '1999-07-27', 'M', 0, NULL, 2, 0, 0, 0, 0, 0),
('Arnab', 'Arnab', 'Arnab', 'arnabgupta000@gmail.com', 'qwfpgq234', '2003-04-07', 'M', 0, 'users/arnabgupta000@gmail.com/dp/IMG_20230325_201543_385.jpg', 2, 1, 1, 1, 0, 0),
('Iffat', 'Javed', 'Iffatjaved', 'javediffat146@gmail.com', 'meisiffi24', '2003-05-24', 'F', 0, 'users/javediffat146@gmail.com/dp/IMG20221208211640.jpg', 1, 0, 0, 0, 0, 0),
('Avipsha', 'Biswas', 'Avipshabiswas', 'avipshaavipsha34@gmail.com', 'Avipsha123', '2004-01-07', 'F', 0, NULL, 1, 0, 0, 0, 0, 0),
('Rohit', 'Roy', 'Rohitroi', 'deep05275@gmail.com', 'roitmahan', '2004-02-26', 'M', 0, NULL, 1, 0, 0, 0, 0, 0),
('Sk Jakir Hussain', 'Sarkar', 'jakirhussain', 'zakirhussainsarkar37@gmail.com', 'Jakir321', '2003-09-30', 'M', 0, NULL, 2, 0, 0, 0, 0, 0),
('Akashdeep', 'Sarmah', 'Akashdeepsarmah', 'akashdeepsarmah292@gmail.com', 'alk@123459', '2003-02-02', 'M', 0, NULL, 1, 0, 0, 0, 0, 0),
('Nagesh ', 'Nange', 'Nagu', 'kunaldas1365@gmail.com', 'nagu123', '2021-12-12', 'M', 0, 'users/kunaldas1365@gmail.com/dp/modiji12.jpg', 1, 4, 1, 0, 0, 0),
('Zak', 'Hawkins', 'Yeet', 'zakaryhawkins320@gmail.com', 'ghs125465', '2005-11-28', 'M', 0, NULL, 0, 0, 0, 0, 0, 0),
('Govind', 'Kalwar', 'Govind727', 'govindkumar77727@gmail.com', 'Govind786125@', '2000-12-16', 'M', 0, NULL, 1, 2, 0, 0, 0, 0),
('email', 'last', 'emaillast', 'email@email.com', 'password', '1978-12-31', 'M', 0, NULL, 0, 0, 0, 0, 0, 0),
('Ra', 'Ra', 'Ra', 'raj@gmail.com', '123456', '2001-09-18', 'M', 0, NULL, 1, 0, 0, 0, 0, 0),
('Priyansh ', 'Dubey', 'Priyansh', 'eraofmarvel@gmail.com', 'roman@123', '2023-10-19', 'M', 0, NULL, 0, 0, 0, 0, 0, 0);

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
