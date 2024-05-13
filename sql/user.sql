-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 12:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `numtel` int(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `token` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `email`, `adresse`, `numtel`, `mdp`, `token`) VALUES
(6, 'aymen', 'hmani@5ademni.tn', 'tunis', 22334332, '111', 'OFF'),
(7, 'rayen farhani', 'rayen.farhani@esprit.tn', 'tunis', 12345432, '123', ''),
(12, 'KHALIL', 'tombarli@esprit.tn', 'tunis', 12345678, 'khalil123.', ''),
(14, 'NOUR', 'nour@gmail.com', 'tunis', 22222222, 'nour123.', ''),
(15, 'AHMED', 'ahmed@esprit.tn', 'benarous', 33333333, 'ahmed123.', ''),
(16, 'ALA', 'ala@esprit.tn', 'ariana', 44444444, 'alariahi123.', ''),
(17, 'LIWA', 'liwa@gmail.com', 'ariana', 55555555, 'liwa123123.', ''),
(18, 'ASMA', 'asma@gmail.com', 'tunis', 77777777, 'asma123.', ''),
(19, 'ADEM', 'adem@gmail.com', 'tunis', 99999999, 'adem123.', ''),
(20, 'HSAN', 'hsan@gmail.com', 'benarous', 12121212, 'hsan123.', ''),
(21, 'SAFWEN', 'safwen@5ademni.tn', 'benarous', 25118142, 'safwen123.', 'OFF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
