-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 07:26 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `merchant_return`
--

CREATE TABLE `merchant_return` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `set_default` varchar(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_return`
--

INSERT INTO `merchant_return` (`id`, `user_id`, `title`, `name`, `address`, `city`, `postcode`, `state`, `phone`, `set_default`, `created_at`, `updated_at`) VALUES
(1, 3, 'Default', 'Aiman Zaidan', 'No 66-1, Jalan Wangsa Delima 6, Pusat Bandar Wangsa Maju,', 'Kuala Lumpur', '53300', '14', '0176219306', 'Y', '2016-12-14 04:48:39', '2016-12-13 20:48:39'),
(2, 3, 'BBS', 'Muhammad Farhan Bin Abdul Latip', 'A-005, BLok A, Apartment Julia, Jalan 4/8, Bandar Baru Selayang Fasa 2B', 'Batu Caves', '68100', '10', '126437433', 'N', '2016-12-14 04:48:39', '2016-12-13 20:48:39'),
(11, 3, 'Soe', 'Aiman Zaidan', 'No 18, Kedai Jkkk, Jalan Besar, Kampong Soeharto', 'Kuala Kubu Bharu', '44010', '10', '176219306', 'N', '2016-12-14 04:48:39', '2016-12-13 20:48:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchant_return`
--
ALTER TABLE `merchant_return`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchant_return`
--
ALTER TABLE `merchant_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
