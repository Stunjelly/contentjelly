-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema contjell
--

CREATE DATABASE IF NOT EXISTS contjell;
USE contjell;

--
-- Definition of table `contjell`.`cj_groups`
--

DROP TABLE IF EXISTS `contjell`.`cj_groups`;
CREATE TABLE  `contjell`.`cj_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `members` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_groups`
--

/*!40000 ALTER TABLE `cj_groups` DISABLE KEYS */;
LOCK TABLES `cj_groups` WRITE;
INSERT INTO `contjell`.`cj_groups` VALUES  (1,'Administrators',1,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_groups` ENABLE KEYS */;


--
-- Definition of table `contjell`.`cj_modules`
--

DROP TABLE IF EXISTS `contjell`.`cj_modules`;
CREATE TABLE  `contjell`.`cj_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(225) NOT NULL,
  `module_type` tinyint(4) NOT NULL,
  `module_loc` text NOT NULL,
  `module_parent` varchar(10) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_modules`
--

/*!40000 ALTER TABLE `cj_modules` DISABLE KEYS */;
LOCK TABLES `cj_modules` WRITE;
INSERT INTO `contjell`.`cj_modules` VALUES  (5,'profile',2,'primary/user/secondary/profile','4'),
 (4,'user',1,'primary/user',''),
 (8,'login',2,'primary/user/secondary/login','4'),
 (9,'register',2,'primary/user/secondary/register','4'),
 (10,'send_email',3,'tertiary/send_email',''),
 (11,'page',1,'primary/page',''),
 (13,'admin',1,'primary/admin',''),
 (14,'error_pages',1,'primary/error_pages','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_modules` ENABLE KEYS */;


--
-- Definition of table `contjell`.`cj_pages`
--

DROP TABLE IF EXISTS `contjell`.`cj_pages`;
CREATE TABLE  `contjell`.`cj_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_permalink` varchar(100) NOT NULL,
  `page_title` text NOT NULL,
  `page_content` text NOT NULL,
  `page_date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_type` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_pages`
--

/*!40000 ALTER TABLE `cj_pages` DISABLE KEYS */;
LOCK TABLES `cj_pages` WRITE;
INSERT INTO `contjell`.`cj_pages` VALUES  (1,'aboutus','All about ContentJelly!','This is a page about how awesome content jelly is and why you should use it! ',123123,13,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_pages` ENABLE KEYS */;


--
-- Definition of table `contjell`.`cj_pathfinder`
--

DROP TABLE IF EXISTS `contjell`.`cj_pathfinder`;
CREATE TABLE  `contjell`.`cj_pathfinder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path_chunk` varchar(225) NOT NULL,
  `path_prefix` varchar(225) NOT NULL,
  `path_module` int(11) NOT NULL,
  `path_parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_pathfinder`
--

/*!40000 ALTER TABLE `cj_pathfinder` DISABLE KEYS */;
LOCK TABLES `cj_pathfinder` WRITE;
INSERT INTO `contjell`.`cj_pathfinder` VALUES  (6,'profile','/user/{%hook%}',5,4),
 (5,'{%hook%}','/user',4,0),
 (4,'user','/',4,0),
 (1,'news','/',1,0),
 (12,'login','/',8,4),
 (11,'register','/',9,4),
 (13,'{%hook%}','/',12,11),
 (14,'admin','/',13,0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_pathfinder` ENABLE KEYS */;


--
-- Definition of table `contjell`.`cj_settings`
--

DROP TABLE IF EXISTS `contjell`.`cj_settings`;
CREATE TABLE  `contjell`.`cj_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(50) NOT NULL,
  `setting_value` varchar(225) NOT NULL,
  `setting_mod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_settings`
--

/*!40000 ALTER TABLE `cj_settings` DISABLE KEYS */;
LOCK TABLES `cj_settings` WRITE;
INSERT INTO `contjell`.`cj_settings` VALUES  (1,'core_default_primary','11',0),
 (2,'core_default_theme','themestun',0),
 (3,'default_page','1',11);
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_settings` ENABLE KEYS */;


--
-- Definition of table `contjell`.`cj_spec_pages`
--

DROP TABLE IF EXISTS `contjell`.`cj_spec_pages`;
CREATE TABLE  `contjell`.`cj_spec_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `access` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_spec_pages`
--

/*!40000 ALTER TABLE `cj_spec_pages` DISABLE KEYS */;
LOCK TABLES `cj_spec_pages` WRITE;
INSERT INTO `contjell`.`cj_spec_pages` VALUES  (1,'Admin Panel',1,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_spec_pages` ENABLE KEYS */;


--
-- Definition of table `contjell`.`cj_user_details`
--

DROP TABLE IF EXISTS `contjell`.`cj_user_details`;
CREATE TABLE  `contjell`.`cj_user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `detail_name` varchar(100) NOT NULL,
  `detail_value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_user_details`
--

/*!40000 ALTER TABLE `cj_user_details` DISABLE KEYS */;
LOCK TABLES `cj_user_details` WRITE;
INSERT INTO `contjell`.`cj_user_details` VALUES  (1,13,'user_first_name','Nic'),
 (2,13,'user_surname','West');
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_user_details` ENABLE KEYS */;


--
-- Definition of table `contjell`.`cj_user_groups`
--

DROP TABLE IF EXISTS `contjell`.`cj_user_groups`;
CREATE TABLE  `contjell`.`cj_user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_user_groups`
--

/*!40000 ALTER TABLE `cj_user_groups` DISABLE KEYS */;
LOCK TABLES `cj_user_groups` WRITE;
INSERT INTO `contjell`.`cj_user_groups` VALUES  (1,1,13);
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_user_groups` ENABLE KEYS */;


--
-- Definition of table `contjell`.`cj_users`
--

DROP TABLE IF EXISTS `contjell`.`cj_users`;
CREATE TABLE  `contjell`.`cj_users` (
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_users`
--

/*!40000 ALTER TABLE `cj_users` DISABLE KEYS */;
LOCK TABLES `cj_users` WRITE;
INSERT INTO `contjell`.`cj_users` VALUES  (12,'ed','8b06729815f6625c76d99cf02210b063','66442','7dc9fd3566abd47e40650cdc559e723e',1,'ed@stunjelly.com',0,'','963e0a8dbe63a91473d1038ed451b903'),
 (13,'nic','8b06729815f6625c76d99cf02210b063','95701','3e56fb7b826150dbad586eb038314187',1,'nic@stunjelly.com',0,'','118d87a358a99d4fdac9a7a3f2692647');
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
