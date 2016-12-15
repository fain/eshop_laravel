-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 04:12 AM
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
-- Table structure for table `shipping_rate`
--

CREATE TABLE `shipping_rate` (
  `id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `bundle_of` int(11) DEFAULT NULL,
  `wm_kg` float DEFAULT NULL,
  `wm_rm` double DEFAULT NULL,
  `same_all_reg` varchar(1) DEFAULT NULL,
  `add_wm_kg` float DEFAULT NULL,
  `add_wm_rm` double DEFAULT NULL,
  `sbh_kg` float DEFAULT NULL,
  `sbh_rm` double DEFAULT NULL,
  `add_sbh_kg` float DEFAULT NULL,
  `add_sbh_rm` double DEFAULT NULL,
  `srk_kg` float DEFAULT NULL,
  `srk_rm` double DEFAULT NULL,
  `add_srk_kg` float DEFAULT NULL,
  `add_srk_rm` double DEFAULT NULL,
  `cond_ship` varchar(1) DEFAULT NULL,
  `cond_disc` float DEFAULT NULL,
  `cond_disc_for_purch` float DEFAULT NULL,
  `cond_free` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipping_rate`
--
ALTER TABLE `shipping_rate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shipping_rate`
--
ALTER TABLE `shipping_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
