-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2023 at 09:38 AM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HNDSOFTS2A6`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocked`
--

CREATE TABLE IF NOT EXISTS `blocked` (
  `user_id` int(11) DEFAULT NULL,
  `blocked_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocked`
--

INSERT INTO `blocked` (`user_id`, `blocked_date`) VALUES
(0, '2023-04-15'),
(25, '2023-05-06'),
(24, '2023-05-06'),
(20, '2023-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `booking_date` datetime NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `total`, `booking_date`) VALUES
(1, 4, 3.00, '2022-11-24 12:38:48'),
(2, 4, 5.50, '2022-11-24 12:43:56'),
(3, 4, 4.50, '2022-11-24 12:44:58'),
(4, 6, 4.50, '2022-11-24 13:26:01'),
(5, 6, 3.00, '2022-11-24 13:32:40'),
(6, 6, 4.50, '2022-11-24 13:33:29'),
(7, 6, 5.50, '2022-11-24 15:04:46'),
(8, 7, 9.00, '2022-11-28 09:24:37'),
(9, 7, 5.50, '2022-11-28 10:09:05'),
(10, 6, 3.00, '2022-11-30 09:41:44'),
(11, 8, 6.00, '2022-12-01 19:02:07'),
(12, 9, 5.50, '2022-12-03 21:40:57'),
(13, 6, 4.50, '2022-12-07 11:50:40'),
(14, 6, 3.00, '2022-12-07 12:03:03'),
(15, 6, 4.50, '2022-12-07 12:04:05'),
(16, 6, 5.50, '2022-12-07 12:04:54'),
(17, 6, 5.50, '2022-12-07 12:56:26'),
(18, 6, 3.00, '2022-12-07 12:57:34'),
(19, 6, 4.50, '2022-12-07 12:59:36'),
(20, 10, 16.50, '2022-12-14 09:12:17'),
(21, 11, 13.50, '2022-12-14 09:31:01'),
(22, 12, 9.00, '2022-12-14 11:08:10'),
(23, 12, 4.50, '2022-12-14 11:11:03'),
(24, 12, 9.00, '2022-12-14 13:55:47'),
(25, 12, 4.50, '2022-12-17 21:40:21'),
(26, 13, 9.00, '2022-12-21 11:33:43'),
(27, 13, 5.50, '2022-12-21 11:34:09'),
(28, 14, 14.50, '2022-12-22 21:02:40'),
(29, 14, 13.50, '2022-12-30 17:31:42'),
(30, 14, 8.50, '2023-01-16 10:01:10'),
(31, 20, 32.00, '2023-04-20 14:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `booking_contents`
--

CREATE TABLE IF NOT EXISTS `booking_contents` (
  `content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `mov_price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `booking_contents`
--

INSERT INTO `booking_contents` (`content_id`, `booking_id`, `id`, `quantity`, `mov_price`) VALUES
(1, 1, 1, 1, 3.00),
(2, 2, 3, 1, 5.50),
(3, 3, 2, 1, 4.50),
(4, 4, 4, 1, 4.50),
(5, 5, 1, 1, 3.00),
(6, 6, 2, 1, 4.50),
(7, 7, 3, 1, 5.50),
(8, 8, 1, 3, 3.00),
(9, 9, 3, 1, 5.50),
(10, 10, 1, 1, 3.00),
(11, 11, 1, 2, 3.00),
(12, 12, 3, 1, 5.50),
(13, 13, 2, 1, 4.50),
(14, 14, 1, 1, 3.00),
(15, 15, 4, 1, 4.50),
(16, 16, 3, 1, 5.50),
(17, 17, 3, 1, 5.50),
(18, 18, 1, 1, 3.00),
(19, 19, 4, 1, 4.50),
(20, 20, 3, 3, 5.50),
(21, 21, 2, 3, 4.50),
(22, 22, 1, 3, 3.00),
(23, 23, 2, 1, 4.50),
(24, 24, 1, 3, 3.00),
(25, 25, 2, 1, 4.50),
(26, 26, 2, 2, 4.50),
(27, 27, 3, 1, 5.50),
(28, 28, 2, 2, 4.50),
(29, 28, 3, 1, 5.50),
(30, 29, 2, 3, 4.50),
(31, 30, 1, 1, 3.00),
(32, 30, 3, 1, 5.50),
(33, 31, 1, 1, 3.00),
(34, 31, 4, 2, 4.50),
(35, 31, 6, 1, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`g_id`, `genre`) VALUES
(1, 'Animation'),
(2, 'Action'),
(3, 'Comedy'),
(5, 'Thriller'),
(6, 'Musical'),
(10, 'Drama'),
(11, 'SIFI');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `food` varchar(30) NOT NULL,
  `size` varchar(6) NOT NULL,
  `food_price` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food`, `size`, `food_price`) VALUES
('Popcorn', 'XL', 10.00),
('Popcorn', 'L', 8.00),
('Popcorn', 'Small', 6.00),
('Hot Dog', 'XL', 10.00),
('Hot Dog', 'L', 7.00),
('Hot Dog', 'Small', 5.00),
('Mix Sweets', 'XL', 8.00),
('Mix Sweets', 'L', 6.00),
('Mix Sweets', 'Small', 4.00),
('Drink', 'XL', 8.00),
('Drink', 'L', 6.00),
('Drink', 'Small', 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(30) NOT NULL,
  `show1` varchar(6) NOT NULL,
  `show2` varchar(6) NOT NULL,
  `show3` varchar(6) NOT NULL,
  `further_info` varchar(500) NOT NULL,
  `img` varchar(30) NOT NULL,
  `preview` varchar(300) NOT NULL,
  `mov_price` decimal(4,2) NOT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Year` int(10) DEFAULT NULL,
  `Language` varchar(255) DEFAULT NULL,
  `Duration` varchar(100) DEFAULT NULL,
  `watch` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `movie_title`, `show1`, `show2`, `show3`, `further_info`, `img`, `preview`, `mov_price`, `Genre`, `Year`, `Language`, `Duration`, `watch`) VALUES
(1, 'Black Adam', '10.00', '12.00', '13.00', 'Nearly 5,000 years after he was bestowed with the almighty powers of the Egyptian gods--and imprisoned just as quickly--Black Adam is freed from his earthly tomb, ready to unleash his unique form of justice on the modern world.', 'img/black.jpg', '"https://www.youtube.com/embed/mkomfZHG5q4"', 3.00, 'Action', 2022, 'English', '125 minutes', 'https://www.youtube.com/embed/rBd0h-g59dg'),
(2, 'Avatar', '14.15', '16.30', '20.00', 'A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'img/avatar.jpg', '"https://www.youtube.com/embed/50MOcmbIDKk"', 4.50, 'Action', 2009, 'English', '162', 'https://www.youtube.com/embed/ldGAkwfv9P8'),
(4, 'Love and Thunder', '11.30', '13.20', '17.45', 'Thor enlists the help of Valkyrie, Korg and ex-girlfriend Jane Foster to fight Gorr the God Butcher, who intends to make the gods extinct.', 'img/img1', '"https://www.youtube.com/embed/Go8nTmfrQd8" ', 4.50, 'Comedy', 2022, 'English', '118 minutes', 'https://www.youtube.com/embed/ldGAkwfv9P8'),
(5, 'Spider-Man: Across the Spider', '12.00', '15.00', '17.00', 'Miles Morales catapults across the Multiverse, where he encounters a team of Spider-People charged with protecting its very existence. When the heroes clash on how to handle a new threat, Miles must redefine what it means to be a hero.', 'img/sp1.jpg', 'https://www.youtube.com/embed/cqGjhVJWtEg', 20.00, 'Animation', 2023, 'English', '120 minute', 'https://www.youtube.com/embed/ldGAkwfv9P8'),
(6, 'Something''s Gotta Give ', '12.00', '15.00', '17.00', 'Though it occasionally stumbles into sitcom territory, Something''s Gotta Give is mostly a smart, funny romantic comedy, with sharp performances from Jack Nicholson, Diane Keaton, and Keanu Reeves.', 'img/something.jpg', 'https://www.youtube.com/embed/6zVzIaEuXS4', 20.00, 'Comedy', 2003, 'English', '120 minute', 'https://www.youtube.com/embed/ldGAkwfv9P8'),
(7, 'The Godfather ', '12.00', '15.00', '17.00', 'The aging patriarch of an organized crime dynasty in postwar New York City transfers control of his clandestine empire to his reluctant youngest son.', 'img/godf.jpg', 'https://www.youtube.com/embed/UaVTIH8mujA', 20.00, 'Thriller', 1972, 'English', '120 minute', 'https://www.youtube.com/embed/ldGAkwfv9P8'),
(8, 'Red Dragon ', '12.00', '15.00', '17.00', 'A retired FBI agent with psychological gifts is assigned to help track down "The Tooth Fairy", a mysterious serial killer. Aiding him is imprisoned forensic psychiatrist Dr. Hannibal "The Cannibal" Lecter.', 'img/redd.jpg', 'https://www.youtube.com/embed/Cln4p9DxnGI', 20.00, 'Thriller', 2002, 'English', '120 minutes', 'https://www.youtube.com/embed/ldGAkwfv9P8'),
(11, 'The Super Mario Bros Movie', '', '', '', 'The story of The Super Mario Bros. on their journey through the Mushroom Kingdom.', 'img/mario', '"https://www.youtube.com/embed/TnGl01FkMMo"', 0.00, 'Animation', 2023, 'English', '93 minutes', '"https://www.youtube.com/embed/TnGl01FkMMo"'),
(16, 'The Sound of Music', '12', '15', '18', 'A young novice is sent by her convent in 1930s Austria to become a governess to the seven children of a widowed naval officer.', 'img/music1.jpg', 'https://www.youtube.com/embed/aMMgcAqOYbI', 20.00, 'Musical', 1962, 'English', '120 min', '"https://www.youtube.com/embed/aMMgcAqOYbI'),
(17, 'Me Before You', '12', '15', '18', 'A girl in a small town forms an unlikely bond with a recently-paralyzed man she is taking care of.', 'img/before1.jpg', '"https://www.youtube.com/embed/Eh993__rOxA', 20.00, 'DRAMA', 2016, 'English', '120 min', '"https://www.youtube.com/embed/Eh993__rOxA'),
(18, 'The Green Mile', '12', '17', '22', 'The Green Mile is a notable masterpiece of cinematography addresses the moral dilemma of the death penalty. As a viewer, you are forced to understand that capital punishment can lead to the death of an innocent person, kill someone who can still bring something good into our world, or leave the crime unsolved.', 'img/green.jpg', 'https://www.youtube.com/embed/Ki4haFrqSrw', 20.00, 'Drama', 1999, 'English', '3h 9m', 'https://www.youtube.com/embed/Ki4haFrqSrw'),
(19, 'Interstellar', '12', '17', '22', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity survival.', 'img/interstellar.jpg', 'https://www.youtube.com/embed/2LqzF5WauAw', 20.00, 'SIFI', 2014, 'English', '2h 49m', 'https://www.youtube.com/embed/2LqzF5WauAw'),
(20, 'Alien  !!', '12', '17', '22', 'The crew of a commercial spacecraft encounter a deadly lifeform after investigating an unknown transmission.', 'img/alien.jpg', 'https://www.youtube.com/embed/gEqHJ1tomnk?list=PLZbXA4lyCtqrZQueU8xeUGJs9jklkrrRi', 20.00, 'Genre', 2014, 'English', '1h 57m', 'https://www.youtube.com/embed/gEqHJ1tomnk?list=PLZbXA4lyCtqrZQueU8xeUGJs9jklkrrRi'),
(21, 'Mamma Mia!', '', '', '', 'The story of a bride-to-be trying to find her real father told using hit songs by the popular 1970s group ABBA.', 'img/mia.jpg', 'https://www.youtube.com/embed/lkN-A00WLYE', 0.00, 'Musical', 2008, 'English', '1h 48 min', 'https://www.youtube.com/embed/lkN-A00WLYE');

-- --------------------------------------------------------

--
-- Table structure for table `mov_rev`
--

CREATE TABLE IF NOT EXISTS `mov_rev` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(4) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `movie_title` varchar(60) NOT NULL,
  `rate` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `mov_rev`
--

INSERT INTO `mov_rev` (`post_id`, `id`, `first_name`, `last_name`, `movie_title`, `rate`, `message`, `post_date`) VALUES
(4, 6, 'Justyna', 'Ulejczyk', 'Black Adam', '5', 'Black Adam', '2022-11-17 14:15:20'),
(8, 6, 'Justyna', 'Ulejczyk', 'Avatar', '4', 'Great Movie!', '2022-12-01 12:56:34'),
(9, 8, 'Michal', 'Juz', 'Black Adam', '5', 'Super', '2022-12-01 19:02:55'),
(10, 6, 'Justyna', 'Ulejczyk', 'Thor', '3', 'Nice movie!', '2022-12-03 21:36:00'),
(11, 9, 'Artur', 'Jakacki', 'Lightyear', '5', 'I love it!', '2022-12-05 10:06:28'),
(12, 6, 'Justyna', 'Ulejczyk', '', '', '', '2022-12-07 12:33:32'),
(13, 6, 'Justyna', 'Ulejczyk', 'Avatar', '5', 'Great!', '2022-12-07 12:36:37'),
(14, 6, 'Justyna', 'Ulejczyk', 'Avatar', '5', 'Great!', '2022-12-07 12:39:20'),
(15, 10, 'Anna', 'Podlasek', '', '', '', '2022-12-14 09:12:46'),
(16, 10, 'Anna', 'Podlasek', 'Lightyear', '5', 'Awesome movie!', '2022-12-14 09:13:06'),
(17, 11, 'Owen', 'Pringle', 'Avatar', '5', 'I loved this move so much! changed my life!', '2022-12-14 09:31:36'),
(37, 12, 'Justyna', 'U', 'Love and Thunder', '5', 'Love it, so funny', '2022-12-19 11:57:14'),
(43, 14, 'justyna', 'u', 'Avatar', '5', 'Love it', '2023-01-24 14:23:59'),
(44, 20, 'Artur', 'Jakacki', 'Black Adam', '5', 'Nice', '2023-04-24 11:10:55'),
(45, 2, 'justyna', 'u', 'Avatar', '5', 'Nice', '2023-04-24 11:28:12'),
(46, 22, 'Jakub', 'Jakacki', 'Mario', '5', 'Love it!', '2023-04-29 10:14:19'),
(47, 2, 'Maria', 'u', 'Avatar', '5', 'Love', '2023-05-10 13:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `type`, `price`, `image`) VALUES
(2, 'PREMIUM', '99.99', 'img/premium.png');

-- --------------------------------------------------------

--
-- Table structure for table `tv_show`
--

CREATE TABLE IF NOT EXISTS `tv_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_title` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `preview` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `play` varchar(255) DEFAULT NULL,
  `play_1` varchar(255) DEFAULT NULL,
  `play_2` varchar(255) DEFAULT NULL,
  `play_3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tv_show`
--

INSERT INTO `tv_show` (`id`, `show_title`, `info`, `img`, `preview`, `genre`, `year`, `language`, `duration`, `play`, `play_1`, `play_2`, `play_3`) VALUES
(1, 'Married... with Children', 'Al is the quintessential working class dad. Peggy, his wife, always wants more from him. With their children, they go through the highs and lows of ordinary life.', 'img/married.jpg', 'https://www.youtube.com/embed/Qa5hL0sY6gE', 'Comedy', '1997', 'English', '30 min', 'Seasons 1, 3 episodes', 'https://www.youtube.com/embed/KjUrxHIjVVI', 'https://www.youtube.com/embed/Wloy_V59DTg', 'https://www.youtube.com/embed/bqfVdVD3Hio'),
(2, 'Demon Slayer: Kimetsu no Yaiba', 'A family is attacked by demons and only two members survive - Tanjiro and his sister Nezuko, who is turning into a demon slowly. Tanjiro sets out to become a demon slayer to avenge his family and cure his sister.', 'img/demon.jpg', '"https://www.youtube.com/embed/9DhuWapDDrw"', 'Animation', '2023', 'Japanese', '30 min', 'S1E3', 'https://www.youtube.com/embed/_YmwaGvh8C0', 'https://www.youtube.com/embed/_YmwaGvh8C0', 'https://www.youtube.com/embed/_YmwaGvh8C0'),
(7, 'Obi-Wan Kenobi', 'Jedi Master Obi-Wan Kenobi has to save young Leia after she is kidnapped, all the while being pursued by Imperial Inquisitors and his former Padawan, now known as Darth Vader.', 'img/obi1.jpg', 'https://www.youtube.com/embed/TWTfhyvzTx0', 'Action', '2022', 'English', '30 min', 'S1S3', 'https://www.youtube.com/embed/ldGAkwfv9P8', 'https://www.youtube.com/embed/ldGAkwfv9P8', 'https://www.youtube.com/embed/ldGAkwfv9P8'),
(8, 'Mandalorian', 'The travels of a lone bounty hunter in the outer reaches of the galaxy, far from the authority of the New Republic.', 'img/mando.jpg', 'https://www.youtube.com/embed/eW7Twd85m2g', 'SIFI', '2019', 'English', '47 min', 'Seasons 1, 3 episodes', 'https://www.youtube.com/embed/yPsXnCXo4rQ', 'https://www.youtube.com/embed/Wloy_V59DTg', 'https://www.youtube.com/embed/cl0EI44nMXE'),
(9, 'Full House', 'A widowed sportscaster raises his three daughters with assistance from his rock and roll brother-in-law and madcap best friend.', 'img/house.jpg', 'https://www.youtube.com/embed/SDP7__2F1YE', 'Drama', '1987', 'English', '30 min', 'Seasons 1, 3 episodes', 'https://www.youtube.com/embed/SDP7__2F1YE', 'https://www.youtube.com/embed/SDP7__2F1YE', 'https://www.youtube.com/embed/SDP7__2F1YE'),
(10, 'Bluey !', 'The slice-of-life adventures of an Australian Blue Heeler Cattle Dog puppy as she has fun with her family and friends in everyday situations.', 'img/bluey.jpg', 'https://www.youtube.com/embed/8Qs9QqAsRcI', 'Genre', '2018', 'English', '30m  ?php if (isset($_POST[''duration''])) echo $_POST[''duration'']; ?>', 'S1 E3', 'https://www.youtube.com/embed/NgFF-uYRe9Q', 'https://www.youtube.com/embed/X_BpLGg3FJ8', 'https://www.youtube.com/embed/1LC6Lbbp71o'),
(11, 'Braking Bad', 'A chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine \nwith a former student in order to secure his family future.', 'img/bad.jpg', 'https://www.youtube.com/embed/VaOt6tXyf2Y', 'Thriller', '2008', 'English', '59m', 'S1 E3', 'https://www.youtube.com/embed/MybaTnzu9AA', 'https://www.youtube.com/embed/X_BpLGg3FJ8', 'https://www.youtube.com/embed/1LC6Lbbp71o'),
(12, 'Grease: Rise of the Pink Ladies', 'A spinoff of the original John Travolta\n and Olivia Newton John 1978 musical.', 'img/grease.jpg', 'https://www.youtube.com/embed/lnAlBzNy5KQ', 'Musical', '2023', 'English', '40m', 'S1 E3', 'https://www.youtube.com/embed/ut5VL9KYzOY', 'https://www.youtube.com/embed/X_BpLGg3FJ8', 'https://www.youtube.com/embed/1LC6Lbbp71o');

-- --------------------------------------------------------

--
-- Table structure for table `type_account`
--

CREATE TABLE IF NOT EXISTS `type_account` (
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_account`
--

INSERT INTO `type_account` (`user_id`, `type`, `date`, `end`) VALUES
(2, 'premium', '2023-04-06', '2024-04-27'),
(23, 'premium', '2023-05-02', '2024-05-02'),
(1, 'premium', '2023-05-03', '2024-05-03'),
(30, 'premium', '2023-05-10', '2024-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `exp_month` varchar(2) NOT NULL,
  `exp_year` int(4) NOT NULL,
  `cvv` int(3) NOT NULL,
  `reg_date` datetime NOT NULL,
  `DOB` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `card_number`, `exp_month`, `exp_year`, `cvv`, `reg_date`, `DOB`, `phone`, `country`) VALUES
(1, 'Admin', 'Webflix', 'admin@webflix', '1eb1afa20dc454d6ef3b6dc6abcbd7dca7e519b698fdf073f4625ded09d74807', '12345', '12', 12, 369, '2023-01-27 11:04:54', NULL, NULL, NULL),
(2, 'Maria', 'u', 'ju@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '5214', '12', 12, 12, '2023-01-27 11:06:02', '2002-05-18', '123456789', 'United Kingdom'),
(20, 'Artur', 'Jakacki', 'ul@college', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '456987', '12', 12, 123, '2023-01-30 18:16:07', '2016-05-22', '1234', 'POLAND'),
(21, 'Justyna', 'Vader', 'vader@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '12345678', '12', 2026, 123, '2023-03-27 09:04:53', '01-01-2002', '12345678', 'USA'),
(22, 'Jakub', 'Jakacki', 'jakub@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '524654', '12', 2027, 321, '2023-04-20 14:14:19', '2002-05-03', '0125369874', 'United Kingdom'),
(23, 'Jakub', 'JUSTA', 'jakub1@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1235465488554', '12', 1236, 123, '2023-04-27 12:39:41', '2015-05-09', '0125369874', 'United Kingdom'),
(24, 'Jakub', 'JUSTA', 'jakub2gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '121213123', '21', 1234, 123, '2023-04-28 12:28:27', '2002-05-03', '0125369874', 'United Kingdom'),
(25, 'Jakub', 'JUSTA', 'jakub1gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2124345345', '12', 1234, 123, '2023-04-28 12:29:53', '2002-05-03', '0125369874', 'United Kingdom'),
(26, 'Jakub', 'JUSTA', 'easr@aerfa', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'asdfghjkk', '12', 123, 123, '2023-04-29 12:43:06', '2009-06-24', '0125369874', 'United Kingdom'),
(27, 'Amanda', 'Holt', 'holt@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '12345678970', '12', 2026, 123, '2023-04-30 20:25:04', '1999-01-01', '0125369874', 'United Kingdom'),
(28, 'John', 'Smith', 'smith@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '', '', 0, 0, '2023-05-09 08:09:15', '1999-01-01', '0789456123', 'United Kingdom'),
(29, 'D', 'D', 'D@D', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '', '', 0, 0, '2023-05-09 08:10:18', '1987-02-05', '123456789', 'United Kingdom'),
(30, 'Adam', 'Black', 'black@gmail', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '', '', 0, 0, '2023-05-10 14:45:33', '1999-02-01', '12315667899', 'UNITED KINDGOM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
