-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 09:22 AM
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
(1, b'1', 'images/336008423_910662736938052_2290421840171585445_n.jpg', 'Hadi Karnib', 'hadi', '2023-09-01', 'mhmd', 'hadi karnib', 'hadi123\\r\\n', 'mhmdk'),
(3, b'1', '', '', 'testing', '2003-07-19', 'CNN', 'hadi Karnib', 'test test test\r\ntest\r\nTEST', ''),
(4, b'1', '', '', 'hadi', '2003-12-08', 'CNN', 'hadi', 'snijbiqndiuqnioqunoicq', 'mhmdk'),
(5, b'1', '', 'Hadi Karnib', 'hadi', '2023-09-04', 'CNN', 'hadi', 'njisbdjcnkjnccs', 'mhmdk'),
(6, b'1', '', 'Hadi Karnib', 'hadi', '2023-09-04', 'CNN', 'hadi', 'ionianiocnoiaknoimpce', 'mhmdk'),
(7, b'1', 'images121822462_2463002197341278_6665925791221406103_n.jpg', 'Hadi Karnib', 'hadi', '2023-09-04', 'CNN', 'hadi', '44816498vfwefe', 'mhmdk'),
(8, b'1', 'images/226490872_6124769770929838_4380003693799211281_n.jpg', 'Hadi Karnib', 'hadi', '2023-09-04', 'CNN', 'hadi', 'kmompo[pcqpmpocqmqpo,qc', 'mhmdk'),
(9, b'1', 'images/285747973_3219292058341138_4010238713842585462_n.jpg', 'haidar karnib', 'hadi', '2012-12-12', 'CNN', 'hadi', 'auybwqcuiwnciunwincjoiwmciow', 'mhmdk'),
(10, b'0', 'images/90090684_197346488221009_4612143685847482368_n.jpg', 'hadi', 'ali ghader', '2023-09-05', 'CNN', 'ali ghader', 'uhbwubvhwsbvhbwjhbwjbckwbcjwbvck', 'mhmdk'),
(11, b'0', 'images/121822462_2463002197341278_6665925791221406103_n.jpg', 'hadikarnib', 'iuxbiuax', '2023-09-05', 'CNN', 'kjwnionw', 'ubqubuyqbdciuqbuiwq', 'mhmdk');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `role` varchar(255) DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FullName`, `Email`, `Password`, `role`) VALUES
(1, 'hadi', 'hadi@hadi123', '$2y$10$lgZIIRBTrn2/s/f7CgUJUe6nyEhv2zyNghmGl40k9k.SeuNFB/h5K', 'admin'),
(2, 'hadi', 'hadi123@outlook', '$2y$10$kLm2cU9jF94G2EYvxieKwOYH4lasNo.M3h9S1kn7g.kacAUzpyQwO', 'admin'),
(3, 'mhmd', '123@123', '$2y$10$xuz71C5S3eofsUGxe5wUGOjzjvjLW3lkyIJpbgsnSUgdV9UwwNmoi', 'admin'),
(4, 'hadi', 'hadi@hadi', '$2y$10$F5ObqCbWlQ8i6X4D1fV01Op56/wiGC6y3V95wdPWdnPqkAUZeD5VS', NULL),
(5, 'hadikarnib', 'hadi@1234', '$2y$10$eAxzWigImA8fIJQqF2FxveLAW.7VZrCANi4/dD4waGcLKI4ucGTWy', 'admin'),
(6, 'haidarallaw', 'haidar123@123', '$2y$10$l3mhm9f9lw6k9tc26zC6quQB9UknjPJBBygWbri9OTb/3pV5JXDgS', 'admin\r\n');

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
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
