-- final flower-web database schema dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `message` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `gid` varchar(32) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `friend_connections` (
  `connection_id` int(11) NOT NULL AUTO_INCREMENT,
  `friender_userid` varchar(64) NOT NULL DEFAULT 'dead410734',
  `friended_userid` varchar(64) NOT NULL DEFAULT 'dead410734',
  PRIMARY KEY (`connection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `globalcompost` (
  `compostID` int(11) NOT NULL AUTO_INCREMENT,
  `compostsize` bigint(20) NOT NULL DEFAULT 0,
  `compostmaxsize` bigint(20) NOT NULL,
  `compostprize` tinyint(4) NOT NULL,
  PRIMARY KEY (`compostID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `inbox` (
  `mailID` int(11) NOT NULL AUTO_INCREMENT,
  `recipient_id` varchar(255) NOT NULL DEFAULT 'dead410734',
  `sender_id` varchar(255) NOT NULL DEFAULT 'dead410734',
  `sender_name` varchar(255) NOT NULL DEFAULT 'Unknown Sender',
  `time` int(11) NOT NULL DEFAULT 0,
  `message` text NOT NULL,
  PRIMARY KEY (`mailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(64) NOT NULL DEFAULT 'dead410734',
  `username` varchar(100) NOT NULL DEFAULT 'Anonymous',
  `friendcode` int(9) NOT NULL DEFAULT 410734,
  `friends` int(9) NOT NULL DEFAULT 0,
  `country` varchar(7) NOT NULL DEFAULT 'unknown',
  `seeds` double NOT NULL DEFAULT 1000,
  `stars` double NOT NULL DEFAULT 500,
  `PGM` int(11) NOT NULL DEFAULT 0,
  `seedincome` double NOT NULL DEFAULT 1,
  `lastview` double NOT NULL,
  `powerlevel` tinyint(4) NOT NULL DEFAULT 1,
  `yellow_background` tinyint(4) NOT NULL DEFAULT 0,
  `menustyle` tinyint(4) NOT NULL DEFAULT 0,
  `zoom` tinyint(4) NOT NULL DEFAULT 1,
  `nostalgia` tinyint(4) NOT NULL DEFAULT 0,
  `hasflower` tinyint(4) unsigned NOT NULL DEFAULT 0 COMMENT 'Each bit is one flower',
  `has_rose` tinyint(4) NOT NULL DEFAULT 0,
  `has_daisy` tinyint(4) NOT NULL DEFAULT 0,
  `has_iris` tinyint(4) NOT NULL DEFAULT 0,
  `has_orchid` tinyint(4) NOT NULL DEFAULT 0,
  `has_sunflower` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `user_flower` (
  `flowerID` int(11) NOT NULL AUTO_INCREMENT,
  `flower` varchar(15) NOT NULL DEFAULT 'dead410734',
  `uid` varchar(64) NOT NULL DEFAULT 'dead410734',
  `height` double NOT NULL DEFAULT 0,
  `water` double NOT NULL DEFAULT 4,
  `sun` double NOT NULL DEFAULT 12,
  `giga` double NOT NULL DEFAULT 0,
  `warp` double NOT NULL DEFAULT 0,
  `jump` int(11) NOT NULL DEFAULT 0,
  `basicgrowthrate` double NOT NULL DEFAULT 1,
  `autowater` int(11) NOT NULL DEFAULT 0,
  `fertilizer` int(11) NOT NULL DEFAULT 0,
  `superfertilizer` int(11) NOT NULL DEFAULT 0,
  `nevershrink` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`flowerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- 2025-07-18 17:57:48
