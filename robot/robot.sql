-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2015 at 09:57 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `robot`
--
CREATE DATABASE IF NOT EXISTS `robot` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `robot`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_session`()
BEGIN

SELECT * FROM session;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `move_log`(IN `var_xpos` INT, IN `var_ypos` INT, IN `var_face` VARCHAR(45))
BEGIN

INSERT INTO sessiondetail(xposition,yposition,face,createdat)
VALUES(var_xpos,var_ypos,var_face,NOW());

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `robot_placer`(IN `var_ipaddress` VARCHAR(45), OUT `var_id` INT)
BEGIN

INSERT INTO session(sessionstart,ipaddress) VALUES(NOW(),var_ipaddress);
SELECT ID INTO var_id FROM session WHERE ipaddress = var_ipaddress
ORDER BY ID DESC
LIMIT 1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `robot_remover`(IN `var_id` INT)
BEGIN

UPDATE session
SET sessionfinish := NOW()
WHERE ID = var_id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('954c6e95268ca7d7dbc34358d9e0dc7c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', '0000-00-00 00:00:00', 'a:5:{s:9:"user_data";s:0:"";s:2:"ID";s:1:"8";s:4:"xpos";s:1:"2";s:4:"ypos";s:1:"3";s:4:"face";s:5:"north";}'),
('e676a3a7b6a0e9107dcf32d920d19914', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sessionstart` datetime NOT NULL,
  `sessionfinish` datetime NOT NULL,
  `ipaddress` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`ID`, `sessionstart`, `sessionfinish`, `ipaddress`) VALUES
(1, '2015-01-29 15:47:08', '2015-01-29 15:47:56', '127.0.0.1'),
(2, '2015-01-29 15:47:56', '2015-01-29 15:48:34', '127.0.0.1'),
(3, '2015-01-29 15:48:34', '2015-01-29 15:49:42', '127.0.0.1'),
(4, '2015-01-29 15:49:42', '0000-00-00 00:00:00', '127.0.0.1'),
(5, '2015-01-29 15:50:29', '2015-01-29 15:50:58', '127.0.0.1'),
(6, '2015-01-29 15:50:58', '2015-01-29 15:51:29', '127.0.0.1'),
(7, '2015-01-29 15:51:29', '2015-01-29 16:55:57', '127.0.0.1'),
(8, '2015-01-29 16:55:57', '0000-00-00 00:00:00', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `sessiondetail`
--

CREATE TABLE IF NOT EXISTS `sessiondetail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `xposition` int(11) NOT NULL,
  `yposition` int(11) NOT NULL,
  `face` varchar(45) NOT NULL,
  `createdat` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `sessiondetail`
--

INSERT INTO `sessiondetail` (`ID`, `xposition`, `yposition`, `face`, `createdat`) VALUES
(1, 2, 2, 'north', '2015-01-29 15:47:08'),
(2, 2, 3, 'north', '2015-01-29 15:47:33'),
(3, 2, 2, 'north', '2015-01-29 15:47:56'),
(4, 5, 5, 'north', '2015-01-29 15:48:34'),
(5, 4, 5, 'west', '2015-01-29 15:48:38'),
(6, 3, 5, 'west', '2015-01-29 15:48:38'),
(7, 3, 4, 'south', '2015-01-29 15:48:40'),
(8, 3, 3, 'south', '2015-01-29 15:48:41'),
(9, 4, 3, 'east', '2015-01-29 15:48:58'),
(10, 5, 3, 'east', '2015-01-29 15:48:58'),
(11, 6, 3, 'east', '2015-01-29 15:48:58'),
(12, 7, 3, 'east', '2015-01-29 15:48:58'),
(13, 2, 2, 'north', '2015-01-29 15:49:42'),
(14, 3, 2, 'east', '2015-01-29 15:49:57'),
(15, 4, 2, 'east', '2015-01-29 15:49:57'),
(16, 2, 2, 'north', '2015-01-29 15:50:29'),
(17, 3, 2, 'east', '2015-01-29 15:50:46'),
(18, 3, 3, 'north', '2015-01-29 15:50:49'),
(19, 2, 2, 'north', '2015-01-29 15:50:58'),
(20, 2, 3, 'north', '2015-01-29 15:51:12'),
(21, 2, 4, 'north', '2015-01-29 15:51:12'),
(22, 2, 4, 'north', '2015-01-29 15:51:12'),
(23, 2, 4, 'north', '2015-01-29 15:51:13'),
(24, 2, 4, 'north', '2015-01-29 15:51:13'),
(25, 0, 2, 'north', '2015-01-29 15:51:29'),
(26, 0, 3, 'north', '2015-01-29 15:51:32'),
(27, 2, 2, 'north', '2015-01-29 16:55:57'),
(28, 2, 3, 'north', '2015-01-29 16:55:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
