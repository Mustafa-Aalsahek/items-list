-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 02:48 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mikro`
--

-- --------------------------------------------------------

--
-- Table structure for table `lista`
--

CREATE TABLE `lista` (
  `id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `lisaa` int(11) NOT NULL,
  `kate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lista`
--

INSERT INTO `lista` (`id`, `item`, `price`, `vat`, `lisaa`, `kate`) VALUES
(18, 'RAM', '50.90', '63.12', 10, '69.43'),
(20, 'Battery', '80.00', '99.20', 10, '109.12'),
(21, 'SSD', '95.50', '118.42', 20, '142.10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lista`
--
ALTER TABLE `lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
