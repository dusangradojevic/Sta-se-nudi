-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 04:07 PM
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
(3, 1, 'Dohghh', 'Facfa', 'd@d.com', 'K9qiZNfZznD4qJb', 'dvlaskovic98'),
(5, 1, 'Dodo3', 'Vlaskovic', 'd3@d.com', 'K9qiZNfZznD4qJb', 'dodo3'),
(7, 0, 'dodo5', 'xampp', 'vlaskovic.dodo@gmail.com', 'K9qiZNfZznD4qJb', 'xdodo'),
(9, 1, 'gg', 'tt', 'd@d3.com', 'K9qiZNfZznD4qJb', 'gt'),
(11, 1, 'MD5', 'MD5', 'MD5@mail.com', 'fa9d128890c064f92f0cc809d065ef75', 'MD5'),
(13, 0, 'admin2', 'admin2', 'duyhntg@dvddvf.com', '202cb962ac59075b964b07152d234b70', 'admin2'),
(16, 1, 'aagg', 'aaaa', 'aaa@aacco.com', '4ccf8210d0d5a198cd917b6ddb0d8bf5', 'aaaa');

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
  `category` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`IdO`, `title`, `text`, `type`, `isValid`, `idK`, `category`) VALUES
(1, 'Maltezer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate itaque, labore saepe tempora rerum modi aliquid voluptatibus, velit obcaecati delectus earum sit esse provident consectetur eaque magni! Ut, tempora minus! ', 'Ljubimci', 1, 16, 'Ljubimci'),
(2, 'S20', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate itaque, labore saepe tempora rerum modi aliquid voluptatibus, velit obcaecati delectus earum sit esse provident consectetur eaque magni! Ut, tempora minus! ', 'Tehnika', 1, 16, 'Tehnika'),
(7, 'Jakna', 'hnggrfgthhthyytfrggthjyuyhtrgrrgfe', 'Odeca', 1, 16, 'Odeca'),
(11, 'Nije potvrdjen', 'gjuymujhk,', 'Tehnika', 0, 16, 'Tehnika');

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
  MODIFY `idK` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `oglasi`
--
ALTER TABLE `oglasi`
  MODIFY `IdO` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD CONSTRAINT `R_1` FOREIGN KEY (`idK`) REFERENCES `korisnici` (`idK`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `R_4` FOREIGN KEY (`idK`) REFERENCES `korisnici` (`idK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
