-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2015 at 04:18 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aops-api`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`member_id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgllahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tglaplikasi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `introducer_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `username`, `name`, `tgllahir`, `tglaplikasi`, `sponsor_id`, `introducer_id`, `created_at`, `updated_at`) VALUES
(1, 'arbud', 'arief setiabudi', '09101987', '09101987', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'rengga', 'rengga', '09101987', '09101987', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'anto', 'anto', '09101987', '09101987', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'astra', 'astra', '09101987', '09101987', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'reza', 'reza', '09101987', '09101987', 4, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_12_28_102750_create_members_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `role_id` int(10) unsigned NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `email`, `active`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ike', 'Romaguera', '$2y$10$HH0M9SEUgp/cviwmdIudD.vDi8ULPMaexBT.YfeY//yrRqBDOieiW', 'admin@localhost.com', '1', 1, '9Qo0A8JIRZXCh26Yu4oSanKcujPHIGnxVkp7AmdDRWp11mRekYkUF8tO6pU8', '2015-12-17 05:16:37', '2015-12-18 06:55:18'),
(2, 'member', 'aja', '$2y$10$7mbyybNy6EXCobdYamDTneyL81tjB4bcGIrC0F.Wk3P6Fp6VESHZ6', 'member@localhost.com', '1', 2, 'H6Kaf59m4W2hIzZ4P3f68AQYOyORMQNNJdcaF6dokjsOcfIbyr5WZ5ixn4xI', '2015-12-17 07:30:43', '2015-12-17 08:31:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `member_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
