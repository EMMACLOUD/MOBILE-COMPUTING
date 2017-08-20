-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2017 at 08:18 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `m2m`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` bigint(100) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `author` varchar(80) NOT NULL,
  `postedon` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
CREATE TABLE IF NOT EXISTS `donation` (
  `id` bigint(100) unsigned NOT NULL AUTO_INCREMENT,
  `sender` varchar(80) NOT NULL,
  `reciever` varchar(80) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `payedon` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Table structure for table `merge`
--

DROP TABLE IF EXISTS `merge`;
CREATE TABLE IF NOT EXISTS `merge` (
  `id` bigint(100) unsigned NOT NULL AUTO_INCREMENT,
  `sender` varchar(80) NOT NULL,
  `reciever` varchar(80) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `xtime` varchar(255) NOT NULL DEFAULT '0',
  `mergeon` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `title` varchar(150) NOT NULL,
  `fb` varchar(60) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `disc` text NOT NULL,
  `keyword` text NOT NULL,
  `perpage` int(10) NOT NULL DEFAULT '10',
  `automerge` int(10) NOT NULL DEFAULT '0',
  `autopurge` int(10) NOT NULL DEFAULT '0',
  `notification` text NOT NULL,
  `memberallowed` varchar(30) NOT NULL,
  `rules` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `url`, `name`, `email`, `slug`, `phone`, `title`, `fb`, `twitter`, `author`, `disc`, `keyword`, `perpage`, `automerge`, `autopurge`, `notification`, `memberallowed`, `rules`) VALUES
(1, 'http://steadyincome.com.ng', 'SteadyIncome', 'ecash@gmail.com', 'steadyincome.com.ng', '+234 178765453', ' SteadyIncome A Place to refill your wallet', 'flashwebtechinc', 'flashwebtechinc', 'FlashWebTech Inc', 'Best Ponzi site for member-to-member  donation', 'member-to-member,donation', 5, 0, 0, 'This System marge user Automatically badge-by-badge if your match does not pay you in the next 1 Hour He will be deleted and be Replaced By another . But if User Contact Not Ready Try Switch Him/Her  ,\r\nInstantly  switch your match to another thanks!', '0', 'We d not Allow Hacking or Fake Alert Notification, etc else you get banned! Thats All.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(100) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `accname` varchar(100) NOT NULL,
  `accno` varchar(80) NOT NULL,
  `right` int(10) NOT NULL DEFAULT '0',
  `plan` varchar(50) NOT NULL DEFAULT '0',
  `tomerge` int(10) NOT NULL DEFAULT '0',
  `mergesince` varchar(80) NOT NULL,
  `totaltomerge` int(50) NOT NULL DEFAULT '0',
  `switched` int(10) NOT NULL DEFAULT '0',
  `switch` int(10) NOT NULL DEFAULT '0',
  `referral` varchar(80) NOT NULL,
  `refstat` int(10) NOT NULL DEFAULT '0',
  `refbonus` int(100) NOT NULL DEFAULT '0',
  `location` varchar(100) NOT NULL,
  `extra` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `joined` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
