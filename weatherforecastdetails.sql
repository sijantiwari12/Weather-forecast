-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 04:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weatherforecastapidb`
--
DROP DATABASE IF EXISTS `weatherforecastapidb`;
CREATE DATABASE IF NOT EXISTS `weatherforecastapidb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `weatherforecastapidb`;

-- --------------------------------------------------------

--
-- Table structure for table `weatherforecastdetails`
--

DROP TABLE IF EXISTS `weatherforecastdetails`;
CREATE TABLE `weatherforecastdetails` (
  `token` varchar(255) NOT NULL,
  `usage_count` int(11) NOT NULL DEFAULT 0,
  `last_used` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weatherforecastdetails`
--

INSERT INTO `weatherforecastdetails` (`token`, `usage_count`, `last_used`) VALUES
('3o2fQgpAfxmQhPDsvhDThhyDMZZ7bRh7VcUGAn24UYJWnjVFDtnfZk77Go6NxB62', 0, NULL),
('QkgAVGXuebE9beJEV6iaMKRWf4eDAtALwi9FibuXvR37HYqEJuQKmVdv9eUEyx88', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weatherforecastdetails`
--
ALTER TABLE `weatherforecastdetails`
  ADD PRIMARY KEY (`token`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
