-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 02:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_player`
--

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `titre` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `contenu` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `photo`, `titre`, `description`, `contenu`, `date`) VALUES
(1, 'fp_1653594703IMG-20220503-WA0021.jpg', 'Kakule', 'Attaquant pied gauche &amp; droite, un tres bon joueur pour une equique ou l\'unite est une vertus', 'Joueur', '1651078314'),
(4, 'fp_1653594943IMG-20220503-WA0002.jpg', 'Katanda Jrk', 'Bro hi there. cool it\'s working fine', 'Jrk', '1651315497'),
(3, 'fp_1653594971IMG-20220503-WA0001.jpg', 'Binja', 'Play well and never get tired.', 'Player', '1651222494'),
(5, 'fp_1653595075IMG-20220503-WA0035.jpg', 'president', 'visete de president', 'au stade', '1653595075'),
(6, 'fp_1653595148IMG-20220503-WA0003.jpg', 'action ', 'match', 'leo', '1653595148'),
(7, 'fp_1653595198IMG-20220505-WA0035.jpg', 'president', 'visite les entrenn', 'au stade', '1653595198'),
(8, 'fp_1653595267IMG-20220503-WA0005.jpg', 'passe decisif', 'contre l\'equipe', 'au stade', '1653595267'),
(9, 'fp_1653595296IMG-20220503-WA0011.jpg', 'action ', 'virunga', 'au stade', '1653595296'),
(10, 'fp_1653595626IMG-20220504-WA0031.jpg', 'fff', 'ccv', 'ccvv', '1653595626');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `profile` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `age` int(11) NOT NULL,
  `taille` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(300) NOT NULL,
  `display_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `profile`, `name`, `age`, `taille`, `email`, `phone`, `description`, `date`, `display_status`) VALUES
(2, 'fp_1653591798IMG-20220503-WA0019.jpg', 'KAKULE KAMWIRA', 19, '1m70', 'kakule@gmail.com', '+243996838365', 'Attaquant 7&amp;11\r\nPied droit &amp; gauche.', '1651129716', 1),
(3, 'fp_1653593276IMG-20220405-WA0022.jpg', 'MAMBO BASILWANGO', 18, '1m78', 'Mambo@gmail.com', '+243997857473', 'Attaquant pied droit.', '1651222313', 1),
(4, 'fp_1653593445IMG-20220405-WA0023.jpg', 'BASEKELA MODESTE', 21, '1M77', '@gmail.com', '09999999', 'Attaquant de pointe \r\npied droit', '1653593445', 1),
(5, 'fp_1653593697IMG-20220405-WA0024.jpg', 'BRANHAM KABALA', 18, '1M78', '@gmail.com', '0999999', 'attaquant \r\npied droit ', '1653593697', 1);

-- --------------------------------------------------------

--
-- Table structure for table `player_photo`
--

CREATE TABLE `player_photo` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `player_video`
--

CREATE TABLE `player_video` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poisson`
--

CREATE TABLE `poisson` (
  `id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms_visitors`
--

CREATE TABLE `sms_visitors` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(300) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_visitors`
--

INSERT INTO `sms_visitors` (`id`, `name`, `email`, `message`, `date`, `status`) VALUES
(1, 'lucien', 'kalala@gmail.com', 'hello la famille vous allez bien?', '1654647455', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profile` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `name`, `email`, `password`, `date`) VALUES
(1, 'ecofoot-pl_1654168055IMG_0311.JPG', 'Lucien Kalala', 'murhulakalalalucien14@gmail.com', '$2y$10$UjNB/IDhQRRxriSw4xG9eOGgdEg3NfiTmrdidSzLxAbw7O603g8ii', '1651220795'),
(3, 'ecofoot-pl_1654521696IMG_0254.JPG', 'Geremy katanda', 'admin2@gmail.com', '$2y$10$SNQz6iNTPtsdoBFn7QxI2eYdcPYPaOXxptwYWWaawEMfLcDUldMmK', '1651146711');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `video` varchar(300) NOT NULL,
  `titre` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `contenu` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video`, `titre`, `description`, `contenu`, `date`) VALUES
(1, 'fp_1651077677funVideo1.mp4', 'hello', 'hello', 'hello', '1651077678'),
(3, 'fp_165122101020_MIN_FULL_BODY_WORKOUT____No_Equipment___Pamela_Reif.mp4', 'workout', 'Build muscle', 'From home', '1651221014');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_photo`
--
ALTER TABLE `player_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_video`
--
ALTER TABLE `player_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poisson`
--
ALTER TABLE `poisson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_visitors`
--
ALTER TABLE `sms_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `player_photo`
--
ALTER TABLE `player_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player_video`
--
ALTER TABLE `player_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poisson`
--
ALTER TABLE `poisson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_visitors`
--
ALTER TABLE `sms_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
