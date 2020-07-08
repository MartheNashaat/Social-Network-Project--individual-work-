-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 11:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendrequests`
--

CREATE TABLE `friendrequests` (
  `id` int(10) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `friendid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friendrequests`
--

INSERT INTO `friendrequests` (`id`, `userid`, `friendid`) VALUES
(94, 'user@email.com', 'test12@email.com'),
(95, 'user1@email.com', 'test12@email.com'),
(97, 'user@email.com', 'user1@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `friendid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `userid`, `friendid`) VALUES
(52, 'user1@email.com', 'user@email.com'),
(53, 'user@email.com', 'test12@email.com'),
(54, 'user1@email.com', 'test12@email.com'),
(55, 'test@email.com', 'test12@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `postdate` datetime(6) NOT NULL,
  `poster` varchar(50) NOT NULL,
  `public` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `image`, `postdate`, `poster`, `public`) VALUES
(549, 'New post', 'Stick1.png', '2020-05-16 19:34:23.000000', 'user@email.com', 'public'),
(550, 'Hello friends!!', '', '2020-05-16 19:34:37.000000', 'user@email.com', 'private'),
(553, 'hello', '', '2020-05-16 20:08:49.000000', 'test@email.com', 'public'),
(554, 'hi friends', 'Accept.png', '2020-05-16 20:09:02.000000', 'test@email.com', 'private'),
(555, 'New profile picture!', 'Stick1.png', '2020-05-16 20:09:47.000000', 'user@email.com', 'private'),
(556, 'New post!!', 'giraffe2.jpg', '2020-05-17 11:01:54.000000', 'user@email.com', 'public'),
(557, 'Hi ! ', 'friends1.png', '2020-05-17 11:02:51.000000', 'user@email.com', 'private'),
(558, 'hello everyone!!', '', '2020-05-17 11:40:05.000000', 'user122@email.com', 'public'),
(559, 'new picture!', 'farfalla.jpg', '2020-05-17 11:40:24.000000', 'user122@email.com', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` blob NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `day` int(5) NOT NULL,
  `month` int(5) NOT NULL,
  `year` int(5) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  `hometown` varchar(30) NOT NULL,
  `country` varchar(20) NOT NULL,
  `marital` varchar(15) NOT NULL,
  `about` varchar(200) NOT NULL,
  `profilepic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `password`, `email`, `gender`, `day`, `month`, `year`, `phonenumber`, `hometown`, `country`, `marital`, `about`, `profilepic`) VALUES
(22, 'user', 'user11', 0x313233, 'user@email.com', 'female', 18, 8, 1931, 1, 'my home', 'country', 'single', '	hi 		    					    	', 'profilewoman2.png'),
(28, 'test', 'test11', 0x313233, 'test@email.com', 'female', 19, 12, 1938, 0, '', '', '', '', 'profilewoman2.png'),
(29, 'test1', 'test11', 0x313233, 'test12@email.com', 'male', 18, 11, 1939, 0, '', '', '', '', 'profileman2.png'),
(30, 'user12', 'user', 0x313233, 'user1@email.com', 'male', 14, 11, 2008, 0, '', '', '', '', 'profileman2.png'),
(31, 'user122', 'user', 0x313233, 'user122@email.com', 'female', 17, 11, 1979, 0, '', '', '', '', 'profilewoman2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendrequests`
--
ALTER TABLE `friendrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendrequests`
--
ALTER TABLE `friendrequests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=560;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
