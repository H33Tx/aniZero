-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 30. Nov 2021 um 20:40
-- Server-Version: 5.7.36-0ubuntu0.18.04.1
-- PHP-Version: 7.2.34-26+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `anizero`
--
CREATE DATABASE IF NOT EXISTS `anizero` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `anizero`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anime`
--

DROP TABLE IF EXISTS `anime`;
CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alternates` varchar(250) DEFAULT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'soon.png',
  `rating` int(2) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `description` varchar(1000) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bookmarks`
--

DROP TABLE IF EXISTS `bookmarks`;
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
-- Tabellenstruktur für Tabelle `episodes`
--

DROP TABLE IF EXISTS `episodes`;
CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub` tinyint(1) NOT NULL DEFAULT '1',
  `episode` int(11) NOT NULL,
  `released` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `source` varchar(250) NOT NULL,
  `host` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `registration` tinyint(1) NOT NULL,
  `private` tinyint(1) NOT NULL,
  `theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tag_cloud`
--

DROP TABLE IF EXISTS `tag_cloud`;
CREATE TABLE `tag_cloud` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tag_relation`
--

DROP TABLE IF EXISTS `tag_relation`;
CREATE TABLE `tag_relation` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

DROP TABLE IF EXISTS `users`;
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
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tag_cloud`
--
ALTER TABLE `tag_cloud`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tag_relation`
--
ALTER TABLE `tag_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tag_cloud`
--
ALTER TABLE `tag_cloud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tag_relation`
--
ALTER TABLE `tag_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;