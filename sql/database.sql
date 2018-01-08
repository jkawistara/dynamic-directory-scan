-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2018 at 04:32 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `directories_scan`
--
DROP DATABASE IF EXISTS `directories_scan`;
CREATE DATABASE IF NOT EXISTS `directories_scan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `directories_scan`;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `totalCount` int(11) NOT NULL DEFAULT '1',
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content`, `totalCount`, `status`) VALUES
(1, 'abcdef', 4, 1),
(2, 'abcdefghijkl', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
