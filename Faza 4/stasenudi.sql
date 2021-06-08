-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 02:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stasenudi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `idc` int(18) NOT NULL,
  `user_to` int(18) NOT NULL,
  `user_from` int(18) NOT NULL,
  `message` varchar(256) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idK` int(18) NOT NULL,
  `isValid` tinyint(1) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `surname` varchar(25) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idK`, `isValid`, `name`, `surname`, `mail`, `password`, `username`) VALUES
(1, 1, 'admin', 'admin', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(7, 0, 'dodo5', 'xampp', 'vlaskovic.dodo@gmail.com', 'K9qiZNfZznD4qJb', 'xdodo'),
(9, 1, 'gg', 'tt', 'd@d3.com', 'K9qiZNfZznD4qJb', 'gt'),
(13, 0, 'admin2', 'admin2', 'duyhntg@dvddvf.com', '202cb962ac59075b964b07152d234b70', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `oglasi`
--

CREATE TABLE `oglasi` (
  `IdO` int(18) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `isValid` tinyint(1) DEFAULT NULL,
  `idK` int(18) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `imgurl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`IdO`, `title`, `text`, `type`, `isValid`, `idK`, `category`, `imgurl`) VALUES
(11, 'Nije potvrdjen', 'gjuymujhk,', 'Tehnika', 0, 16, 'Tehnika', ''),
(13, 'LJubimac', 'hrtrhuyyjthhtgtrtnyf', 'Ljubimci', 1, 18, 'Ljubimci', ''),
(17, 'J20', 'gjregjfgerdf[thdgr[dgsferjdgfsrhsdfdx[17', 'Razmena', 1, 18, 'Tehnika', ''),
(18, 'fgfd', 'ggreew', 'Razmena', 0, 1, 'Ljubimac', '1622718773_400706df365e4a31324a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `IdR` int(18) NOT NULL,
  `rate` int(18) DEFAULT NULL,
  `idK` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `R_2` (`user_to`),
  ADD KEY `R_3` (`user_from`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idK`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD PRIMARY KEY (`IdO`),
  ADD KEY `R_1` (`idK`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`IdR`),
  ADD KEY `R_4` (`idK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `idc` int(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idK` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oglasi`
--
ALTER TABLE `oglasi`
  MODIFY `IdO` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `IdR` int(18) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `R_2` FOREIGN KEY (`user_to`) REFERENCES `korisnici` (`idK`),
  ADD CONSTRAINT `R_3` FOREIGN KEY (`user_from`) REFERENCES `korisnici` (`idK`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `R_4` FOREIGN KEY (`idK`) REFERENCES `korisnici` (`idK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
