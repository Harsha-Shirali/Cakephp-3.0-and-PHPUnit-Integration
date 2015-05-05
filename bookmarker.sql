-- phpMyAdmin SQL Dump
-- version 4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2015 at 03:37 PM
-- Server version: 5.5.38-0ubuntu0.12.04.1
-- PHP Version: 5.4.37-1+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookmarker`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `created`, `modified`) VALUES
(1, 'The title', 'This is the article body.', '2015-02-10 11:06:52', NULL),
(2, 'A title once again', 'And the article body follows.', '2015-02-10 11:07:24', NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2015-02-10 11:07:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `url` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_key` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `title`, `description`, `url`, `created`, `updated`) VALUES
(1, 1, 'cakephp 3.0', 'My first app', 'www.cake3.0.com', NULL, NULL),
(2, 1, 'Sample Book Mark', 'description', 'www.sample.com', '2015-02-09 12:11:36', NULL),
(3, 5, 'sample', 'desc', 'sample.com', '2015-02-10 12:58:15', NULL),
(6, 5, 'Check list to go live Enrollment journey', 'gvhng', 'bvnvn', '2015-02-10 13:30:00', NULL),
(7, 5, 'AngularJS Example: ', 'fghf', 'gfhfgh', '2015-02-10 14:04:38', NULL),
(8, 3, 'AngularJS Example: ', 'fgfh', 'gfhfh', '2015-02-19 10:58:34', NULL),
(9, 3, 'sample345', 'desc', 'URL', '2015-03-03 06:52:12', NULL),
(10, 3, 'bookmarker', 'description', 'url', '2015-03-09 10:05:36', NULL),
(11, 3, 'title', 'desc', 'url', '2015-04-20 07:03:37', NULL),
(12, 3, 'test', 'test', 'test', '2015-05-05 07:22:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks_tags`
--

CREATE TABLE IF NOT EXISTS `bookmarks_tags` (
  `bookmark_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`bookmark_id`,`tag_id`),
  KEY `tag_idx` (`tag_id`,`bookmark_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmarks_tags`
--

INSERT INTO `bookmarks_tags` (`bookmark_id`, `tag_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `updated`) VALUES
(1, 'cakephp', NULL, NULL),
(2, 'sample tag', '2015-02-09 12:13:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `updated`) VALUES
(1, 'harsha.test@gmail.com', '123456', NULL, NULL),
(2, 'test123@cake.org', '$2y$10$PvwyvV.OR0xDK1TolcMcsevmd7u7JtxJZ/E6lGqlAwI9Lk.IUiH.u', '2015-02-09 12:08:56', NULL),
(3, 'harsha.shirali@gmail.com', '$2y$10$p7pEi8JoohgeYVllAHZpzOs8WQMGMiHmruofwQ6iE.QILCZWwb4ZS', '2015-02-09 12:12:35', NULL),
(4, 'sample@gmail.com', '$2y$10$SIcMEDD2cFI87H4ztZlGm.05z35sEP1L16nTw/joToMikECiaUDfW', '2015-02-10 04:16:02', NULL),
(5, 'test@gmail.com', '$2y$10$H86lIg.1STbWTBBkWo9ZZOkOExqTmVKGf4trVbY1fLP10/Qd.EJRC', '2015-02-10 12:47:44', NULL),
(6, 'test2@gmail.com', '$2y$10$H0K7G9IMTJmIeXDjiLQN7eu4Hex1TeZhtF5NNDFAFk6l92j9zgT/q', '2015-02-10 12:58:43', NULL),
(7, 'test123@test.com', '$2y$10$i8trhlQD5UUJzIK9hg6Pte.AD5FVnsqrjPAt4Unw9I.mqdADJhCii', '2015-02-10 13:04:03', NULL),
(8, 'test123@gmail.com', '$2y$10$uq7wm5DvXryzcY9emR7uuu7zGkoKoCmneMioHw6Is1jW1DEPZKrVO', '2015-03-03 06:53:45', NULL),
(9, 'harsha.shiralitest@gmail.com', '$2y$10$qmIKY0u8aPCUWZ3/TwB3x.Z3zEUUAg3E0iBQnXiz2VCLV7.P3.Yke', '2015-05-05 07:24:48', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bookmarks_tags`
--
ALTER TABLE `bookmarks_tags`
  ADD CONSTRAINT `bookmarks_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `bookmarks_tags_ibfk_2` FOREIGN KEY (`bookmark_id`) REFERENCES `bookmarks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
