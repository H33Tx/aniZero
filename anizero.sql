-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2022 at 08:50 PM
-- Server version: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.3.33-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anizero`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alternates` varchar(250) DEFAULT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'soon.png',
  `views` int(11) NOT NULL DEFAULT '1',
  `description` varchar(5000) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anime_views`
--

CREATE TABLE `anime_views` (
  `id` int(11) NOT NULL,
  `aid` int(10) NOT NULL,
  `ip` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `ep` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_anime`
--

CREATE TABLE `comments_anime` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_episode`
--

CREATE TABLE `comments_episode` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `ep` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DO_NOT_LEAK_OR_SHARE_UNDER_ANY_CIRCUMSTANCES`
--

CREATE TABLE `DO_NOT_LEAK_OR_SHARE_UNDER_ANY_CIRCUMSTANCES` (
  `id` int(11) NOT NULL,
  `ip` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `sub` int(1) NOT NULL DEFAULT '1',
  `episode` int(11) NOT NULL,
  `released` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `source` varchar(250) NOT NULL,
  `host` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `stars` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `day` int(1) NOT NULL DEFAULT '1',
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `registration` tinyint(1) NOT NULL,
  `slogan` varchar(150) NOT NULL,
  `theme` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `descr` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cleanip` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `registration`, `slogan`, `theme`, `name`, `url`, `logo`, `descr`, `email`, `cleanip`) VALUES
(1, 1, 'Your place to watch Anime online!', 1, 'AniZero', 'https://anizero.h33t.moe/', 'anizero.png', 'AniZero is your place to watch Anime Online in High Quality! Bookmark them and keep track of your progress by logging in or creating an Account. Anime Rocks!', 'ninefreaks@yandex.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tag_cloud`
--

CREATE TABLE `tag_cloud` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag_relation`
--

CREATE TABLE `tag_relation` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `group` int(1) NOT NULL DEFAULT '3',
  `create_datetime` datetime NOT NULL,
  `theme` int(1) NOT NULL DEFAULT '1',
  `image` varchar(4) NOT NULL DEFAULT 'jpg',
  `website` varchar(200) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `twitter` varchar(155) DEFAULT NULL,
  `facebook` varchar(155) DEFAULT NULL,
  `instagram` varchar(155) DEFAULT NULL,
  `watchlist` tinyint(1) NOT NULL DEFAULT '1',
  `about` varchar(1000) DEFAULT NULL,
  `read_announce` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anime_views`
--
ALTER TABLE `anime_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_anime`
--
ALTER TABLE `comments_anime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_episode`
--
ALTER TABLE `comments_episode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DO_NOT_LEAK_OR_SHARE_UNDER_ANY_CIRCUMSTANCES`
--
ALTER TABLE `DO_NOT_LEAK_OR_SHARE_UNDER_ANY_CIRCUMSTANCES`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_cloud`
--
ALTER TABLE `tag_cloud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_relation`
--
ALTER TABLE `tag_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anime_views`
--
ALTER TABLE `anime_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments_anime`
--
ALTER TABLE `comments_anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments_episode`
--
ALTER TABLE `comments_episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DO_NOT_LEAK_OR_SHARE_UNDER_ANY_CIRCUMSTANCES`
--
ALTER TABLE `DO_NOT_LEAK_OR_SHARE_UNDER_ANY_CIRCUMSTANCES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag_cloud`
--
ALTER TABLE `tag_cloud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag_relation`
--
ALTER TABLE `tag_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
