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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_modules`
--

/*!40000 ALTER TABLE `cj_modules` DISABLE KEYS */;
LOCK TABLES `cj_modules` WRITE;
INSERT INTO `contjell`.`cj_modules` VALUES  (1,'test_module',1,'primary/test_module',''),
 (5,'profile',2,'','4'),
 (4,'users',1,'','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_modules` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_pathfinder`
--

/*!40000 ALTER TABLE `cj_pathfinder` DISABLE KEYS */;
LOCK TABLES `cj_pathfinder` WRITE;
INSERT INTO `contjell`.`cj_pathfinder` VALUES  (6,'profile','/user/{%hook%}',5,4),
 (5,'{%hook%}','/user',4,0),
 (4,'user','/',4,0),
 (3,'forum','/',3,0),
 (2,'blog','/',2,0),
 (1,'news','/',1,0);
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contjell`.`cj_settings`
--

/*!40000 ALTER TABLE `cj_settings` DISABLE KEYS */;
LOCK TABLES `cj_settings` WRITE;
INSERT INTO `contjell`.`cj_settings` VALUES  (1,'core_dfault_primary','news',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `cj_settings` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
