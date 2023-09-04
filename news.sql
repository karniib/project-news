-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 04:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ID` int(11) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0',
  `image` varchar(200) NOT NULL,
  `operator` varchar(1000) NOT NULL,
  `dbTitle` varchar(200) NOT NULL,
  `dbDate` date NOT NULL,
  `dbsource` varchar(200) NOT NULL,
  `dbauthor` varchar(200) NOT NULL,
  `dbarticle` varchar(5000) NOT NULL,
  `dbcategory` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ID`, `status`, `image`, `operator`, `dbTitle`, `dbDate`, `dbsource`, `dbauthor`, `dbarticle`, `dbcategory`) VALUES
(1, b'0', 'images/121822462_2463002197341278_6665925791221406103_n.jpg', 'Hadi Karnib', 'hadi', '2023-09-01', 'mhmd', 'hadi karnib', 'hadi123\\r\\n', 'mhmdk'),
(3, b'0', '', '', 'testing', '2003-07-19', 'CNN', 'hadi Karnib', 'test test test\r\ntest\r\nTEST', ''),
(4, b'0', '', '', 'hadi', '2003-12-08', 'CNN', 'hadi', 'snijbiqndiuqnioqunoicq', 'mhmdk'),
(5, b'0', '', 'Hadi Karnib', 'hadi', '2023-09-04', 'CNN', 'hadi', 'njisbdjcnkjnccs', 'mhmdk'),
(6, b'0', '', 'Hadi Karnib', 'hadi', '2023-09-04', 'CNN', 'hadi', 'ionianiocnoiaknoimpce', 'mhmdk'),
(7, b'0', 'images121822462_2463002197341278_6665925791221406103_n.jpg', 'Hadi Karnib', 'hadi', '2023-09-04', 'CNN', 'hadi', '44816498vfwefe', 'mhmdk'),
(8, b'0', 'images/226490872_6124769770929838_4380003693799211281_n.jpg', 'Hadi Karnib', 'hadi', '2023-09-04', 'CNN', 'hadi', 'kmompo[pcqpmpocqmqpo,qc', 'mhmdk'),
(9, b'0', 'images/285747973_3219292058341138_4010238713842585462_n.jpg', 'haidar karnib', 'hadi', '2012-12-12', 'CNN', 'hadi', 'auybwqcuiwnciunwincjoiwmciow', 'mhmdk');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `CatName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `CatName`) VALUES
(3, 'kawthar'),
(2, 'mhmdk');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Type` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`ID`, `FullName`, `Email`, `Password`, `Type`) VALUES
(4, 'Hadi Karnib', 'hadikarnib03@outlook.com', '$2y$10$Uw.cLYISYu7xEOeISsHJoeDkO729IJTY8VZ70rGnFhOmoeo8GRdIW', b'1'),
(5, 'haidar karnib', 'hadikarnib03@gmail.com', '$2y$10$iK6ahD6ARqeiq7buET5gBuTRiOl0RdQlo.fpDP8/UuByPJJiWyH9K', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`ID`, `Name`, `Type`) VALUES
(1, 'karnib', '1'),
(2, 'mhmd', '0'),
(3, 'kawthar', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CatName` (`CatName`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
