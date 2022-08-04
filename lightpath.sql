-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2022 at 12:34 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lightpath`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `tekst` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `username`, `tekst`) VALUES
(1, 'jeffreyT', 'Geen probleem'),
(2, 'Jeffrey', 'Nee snap het niet'),
(3, 'Jeffrey', 'Nee snap het niet'),
(4, 'Jeffrey', 'Goed meneer'),
(5, 'Jeffrey', 'Nee hoor'),
(6, 'Jeffrey', 'Goed hoor'),
(7, 'jeffrey', ''),
(8, 'jeffrey', 'Goed'),
(9, 'jeffrey', 'Ik snap het niet'),
(10, 'jeffrey', 'Nee'),
(11, 'jeffrey', ''),
(12, 'jeffrey', 'Ok'),
(13, 'jeffrey', 'Nee'),
(14, 'jeffrey', 'Hoi'),
(15, 'jeffrey', 'Hoi'),
(16, 'jeffrey', 'Goede dag'),
(17, 'undefined', 'Goed'),
(18, 'undefined', 'Goed'),
(19, 'undefined', 'Hallo'),
(20, 'undefined', 'Ge'),
(21, 'undefined', 'Nee ze'),
(22, 'undefined', 'Nee ze'),
(23, 'undefined', 'Zo'),
(24, 'undefined', 'Nee snap het niet'),
(25, 'undefined', 'Goed oke'),
(26, 'undefined', 'Goed'),
(27, 'undefined', 'Goed'),
(28, 'undefined', 'Nee'),
(29, 'Jeffrey Talemans ', 'Nee'),
(30, 'Jeffrey Talemans ', 'Look'),
(31, 'Jeffrey Talemans ', 'Goh'),
(32, 'Jeffrey Talemans ', 'Nee'),
(33, 'Jeffrey Talemans ', 'Goed gedaan'),
(34, '<br />\r\n<b>Notice</b>:  Undefined variable: _SESSION in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n', ''),
(35, '<br />\r\n<b>Notice</b>:  Undefined variable: _SESSION in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n', ''),
(36, '<br />\r\n<b>Notice</b>:  Undefined variable: _SESSION in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n', ''),
(37, '<br />\r\n<b>Notice</b>:  Undefined variable: _SESSION in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n', ''),
(38, '<br />\r\n<b>Notice</b>:  Undefined variable: _SESSION in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n', ''),
(39, '<br />\r\n<b>Notice</b>:  Undefined variable: _SESSION in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n<br />\r\n<b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\\MAMP\\htdocs\\lightPath\\liveChat.php</b> on line <b>51</b><br />\r\n', ''),
(40, 'Jeffrey Talemans ', 'Goedzo'),
(41, 'Jeffrey Talemans ', 'Goed nee'),
(42, 'Jeffrey Talemans ', 'Nee'),
(43, 'Jeffrey Talemans ', 'Ok'),
(44, 'Jeffrey Talemans ', 'Oh no'),
(45, 'Jeffrey Talemans ', 'oh'),
(46, 'Jeffrey Talemans ', 'Goed'),
(47, 'Jeffrey Talemans ', 'Nee snap het niet'),
(48, 'Jeffrey Talemans ', 'Nee'),
(49, 'Jeffrey Talemans ', 'Go'),
(50, 'Jeffrey Talemans ', 'Hello'),
(51, 'Jeffrey Talemans ', 'Go easy on me'),
(52, 'Jeffrey Talemans ', 'Didn\'t get the chance'),
(53, 'Jeffrey Talemans ', 'Nee'),
(54, 'Jeffrey Talemans ', 'Goed zo'),
(55, 'Jeffrey Talemans ', 'Bye');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `evt_id` bigint(20) NOT NULL,
  `evt_start` datetime NOT NULL,
  `evt_end` datetime NOT NULL,
  `evt_text` text NOT NULL,
  `evt_color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`evt_id`, `evt_start`, `evt_end`, `evt_text`, `evt_color`) VALUES
(1, '2022-07-21 00:00:00', '2022-07-22 00:00:00', 'Thanks for making this ppossitble', '#0055ff'),
(2, '2022-07-12 00:00:00', '2022-07-12 00:00:00', 'Eindeljk', '#e4edff');

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `wachtwoord` varchar(300) NOT NULL,
  `profielfoto` varchar(300) DEFAULT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gebruiker`
--

INSERT INTO `gebruiker` (`id`, `email`, `username`, `wachtwoord`, `profielfoto`, `role`) VALUES
(1, '1', 'j', 'k', '8', 0),
(2, 'r0837125@student.thomasmore.be', 'Jeffrey Talemans', '$2y$12$nlMyuAir9MS7rqVrNC219uvjOEHavmBRf31gPlo/RH5Bicx/o3bSq', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`id`, `title`, `date`) VALUES
(1, 'Goede dag', '2022-07-14 13:19:32'),
(2, 'Goed dan', '2022-07-14 13:22:23'),
(3, 'Goed', '2022-07-14 13:24:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`evt_id`),
  ADD KEY `evt_start` (`evt_start`),
  ADD KEY `evt_end` (`evt_end`);

--
-- Indexes for table `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `evt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
