-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2021 at 09:09 PM
-- Server version: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-26+ubuntu18.04.1+deb.sury.org+1

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

CREATE TABLE IF NOT EXISTS `anime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alternates` varchar(250) DEFAULT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'soon.png',
  `rating` int(2) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `description` varchar(1000) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `ep` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE IF NOT EXISTS `episodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub` tinyint(1) NOT NULL DEFAULT '1',
  `episode` int(11) NOT NULL,
  `released` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `source` varchar(250) NOT NULL,
  `host` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `read_announce` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
