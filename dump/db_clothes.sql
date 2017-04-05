-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
<<<<<<< Updated upstream
-- Generation Time: Mar 16, 2016 at 04:03 PM
=======
-- Generation Time: Mar 28, 2016 at 12:52 PM
>>>>>>> Stashed changes
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_clothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_comment`
--

CREATE TABLE IF NOT EXISTS `db_comment` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `author` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_rubric`
--

CREATE TABLE IF NOT EXISTS `db_rubric` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `db_rubric`
--

INSERT INTO `db_rubric` (`id`, `title`, `image`, `description`) VALUES
<<<<<<< Updated upstream
(1, 'Rubric1', '/images/rubric/Sonik.jpg', 'description'),
(2, 'Rubric2', '', 'Description2'),
(3, 'Rubric3', '/images/rubric/Sonik.jpg', 'Rubric3');
=======
(1, 'Джинсы', '/images/rubric/Sonik.jpg', 'Описание джинсов'),
(2, 'Галстуки', '', 'Описание галстуков'),
(3, 'Рубашки', '/images/rubric/Sonik.jpg', 'Описание рубашек');
>>>>>>> Stashed changes

-- --------------------------------------------------------

--
-- Table structure for table `db_rubrics_styles`
--

CREATE TABLE IF NOT EXISTS `db_rubrics_styles` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `rubric_id` int(7) NOT NULL,
  `style_id` int(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rubric_id` (`rubric_id`),
  KEY `style_id` (`style_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_rubrics_styles`
--

INSERT INTO `db_rubrics_styles` (`id`, `rubric_id`, `style_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `db_style`
--

CREATE TABLE IF NOT EXISTS `db_style` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `db_style`
--

INSERT INTO `db_style` (`id`, `title`, `image`, `description`) VALUES
<<<<<<< Updated upstream
(1, 'title', '/images/style/Sonik.jpg', 'description'),
(2, '123', '/images/style/Sonik.jpg', '123'),
(3, 'Style3', '/images/style/Sonik.jpg', 'Style3');
=======
(1, 'Джинсы Новые', '/images/style/Sonik.jpg', 'Новые джинсы, без дыр.'),
(2, 'Галстук Новый', '/images/style/Sonik.jpg', 'Новый галстук, целый.'),
(3, 'Рубашка Новая', '/images/style/Sonik.jpg', 'Новая рубашка, без дыр.');
>>>>>>> Stashed changes

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE IF NOT EXISTS `db_user` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(76) NOT NULL,
  `password` varchar(36) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_rubrics_styles`
--
ALTER TABLE `db_rubrics_styles`
  ADD CONSTRAINT `db_rubrics_styles_ibfk_1` FOREIGN KEY (`rubric_id`) REFERENCES `db_rubric` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_rubrics_styles_ibfk_2` FOREIGN KEY (`style_id`) REFERENCES `db_style` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
