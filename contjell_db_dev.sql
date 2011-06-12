-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2011 at 05:51 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `contjell`
--

-- --------------------------------------------------------

--
-- Table structure for table `cj_groups`
--

CREATE TABLE IF NOT EXISTS `cj_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `members` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cj_groups`
--

INSERT INTO `cj_groups` (`id`, `name`, `members`, `type`) VALUES
(1, 'Administrators', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cj_modules`
--

CREATE TABLE IF NOT EXISTS `cj_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(225) NOT NULL,
  `module_type` tinyint(4) NOT NULL,
  `module_loc` text NOT NULL,
  `module_parent` varchar(10) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cj_modules`
--

INSERT INTO `cj_modules` (`module_id`, `module_name`, `module_type`, `module_loc`, `module_parent`) VALUES
(5, 'profile', 2, 'primary/user/secondary/profile', '4'),
(4, 'user', 1, 'primary/user', ''),
(8, 'login', 2, 'primary/user/secondary/login', '4'),
(9, 'register', 2, 'primary/user/secondary/register', '4'),
(10, 'send_email', 3, 'tertiary/send_email', ''),
(11, 'page', 1, 'primary/page', '');

-- --------------------------------------------------------

--
-- Table structure for table `cj_pages`
--

CREATE TABLE IF NOT EXISTS `cj_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_permalink` varchar(100) NOT NULL,
  `page_title` text NOT NULL,
  `page_content` text NOT NULL,
  `page_date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_type` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cj_pages`
--

INSERT INTO `cj_pages` (`id`, `page_permalink`, `page_title`, `page_content`, `page_date`, `user_id`, `page_type`) VALUES
(1, 'aboutus', 'All about ContentJelly!', 'This is a page about how awesome content jelly is and why you should use it! ', 123123, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cj_pathfinder`
--

CREATE TABLE IF NOT EXISTS `cj_pathfinder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path_chunk` varchar(225) NOT NULL,
  `path_prefix` varchar(225) NOT NULL,
  `path_module` int(11) NOT NULL,
  `path_parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cj_pathfinder`
--

INSERT INTO `cj_pathfinder` (`id`, `path_chunk`, `path_prefix`, `path_module`, `path_parent`) VALUES
(6, 'profile', '/user/{%hook%}', 5, 4),
(5, '{%hook%}', '/user', 4, 0),
(4, 'user', '/', 4, 0),
(1, 'news', '/', 1, 0),
(12, 'login', '/', 8, 4),
(11, 'register', '/', 9, 4),
(13, '{%hook%}', '/', 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cj_settings`
--

CREATE TABLE IF NOT EXISTS `cj_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(50) NOT NULL,
  `setting_value` varchar(225) NOT NULL,
  `setting_mod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cj_settings`
--

INSERT INTO `cj_settings` (`id`, `setting_name`, `setting_value`, `setting_mod`) VALUES
(1, 'core_default_primary', '11', 0),
(2, 'core_default_theme', 'themestun', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cj_spec_pages`
--

CREATE TABLE IF NOT EXISTS `cj_spec_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `access` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cj_spec_pages`
--

INSERT INTO `cj_spec_pages` (`id`, `page_id`, `group_id`, `access`) VALUES
(1, 'Admin Panel', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cj_users`
--

CREATE TABLE IF NOT EXISTS `cj_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_salt` varchar(10) NOT NULL,
  `user_activation` varchar(40) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `user_lastseen` int(11) NOT NULL,
  `user_lang` tinytext NOT NULL,
  `user_key` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cj_users`
--

INSERT INTO `cj_users` (`user_id`, `user_name`, `user_password`, `user_salt`, `user_activation`, `user_status`, `user_email`, `user_lastseen`, `user_lang`, `user_key`) VALUES
(12, 'ed', '8b06729815f6625c76d99cf02210b063', '66442', '7dc9fd3566abd47e40650cdc559e723e', 1, 'ed@stunjelly.com', 0, '', '963e0a8dbe63a91473d1038ed451b903'),
(13, 'nic', '8b06729815f6625c76d99cf02210b063', '95701', '3e56fb7b826150dbad586eb038314187', 1, 'nic@stunjelly.com', 0, '', '118d87a358a99d4fdac9a7a3f2692647');

-- --------------------------------------------------------

--
-- Table structure for table `cj_user_groups`
--

CREATE TABLE IF NOT EXISTS `cj_user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cj_user_groups`
--

INSERT INTO `cj_user_groups` (`id`, `group_id`, `user_id`) VALUES
(1, 1, 13);
