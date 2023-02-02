-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 09:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sourcecodester_dbrestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserv_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `num_guests` int(11) NOT NULL,
  `package` text NOT NULL,
  `num_tables` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `reservation_time` time NOT NULL DEFAULT '12:00:00',
  `telephone` text NOT NULL,
  `path` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserv_id`, `f_name`, `l_name`, `email`, `num_guests`, `package`, `num_tables`, `rdate`, `reservation_time`, `telephone`, `path`, `comment`, `reg_date`, `user_fk`) VALUES
(80, 'assa', 'asdas', '', 4, '', 1, '2022-11-24', '01:16:00', '09082925512', '', 'asa', '2022-11-05 17:30:40', 36),
(82, 'Juan ', 'Dela Cruz', '', 2, '', 1, '1996-02-07', '07:00:00', '9092925512', '', 'test', '2022-11-19 10:59:17', 36),
(85, 'asdsa', 'asdasdqw', '', 45, 'Charles Package', 0, '2022-12-28', '14:00:00', '0909299121', '', 'asdwqd', '2022-12-24 09:54:52', 36),
(86, 'asdasdas', 'asdwdqw', '', 45, 'Charles Package', 0, '2022-12-29', '14:00:00', '09092928712', '', 'asdwq', '2022-12-24 09:55:46', 36),
(87, 'lifee', 'gerero', '', 45, 'Charlies Package', 0, '2022-12-29', '15:00:00', '09519845742', '', 'www', '2022-12-24 09:56:40', 36),
(88, 'lifeeeeee', 'joeeeeeeee', '', 67, 'Carls Package', 0, '2023-01-04', '19:00:00', '9092925512', '', 'ttt', '2022-12-24 09:57:11', 36);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_backup`
--

CREATE TABLE `reservation_backup` (
  `reserv_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `num_guests` int(11) NOT NULL,
  `package` text NOT NULL,
  `num_tables` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `reservation_time` time NOT NULL DEFAULT '12:00:00',
  `telephone` text NOT NULL,
  `path` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_backup`
--

INSERT INTO `reservation_backup` (`reserv_id`, `f_name`, `l_name`, `email`, `num_guests`, `package`, `num_tables`, `rdate`, `reservation_time`, `telephone`, `path`, `comment`, `reg_date`, `user_fk`) VALUES
(77, 'janobe', 'janobe', '', 1, '', 1, '2020-10-03', '12:00:00', '123123', '', 'ok', '2020-10-03 04:39:27', 35),
(78, 'janobe', 'Sourcecode', '', 2, '', 1, '2020-10-04', '12:00:00', '9999999', '', 'hey dud', '2020-10-04 03:37:39', 35),
(79, 'JOHN RICK', 'JAMOLIN', '', 4, '', 1, '2022-10-28', '12:00:00', '9092925512', '', 'aa', '2022-10-27 08:44:34', 36),
(81, 'Sample', 'Samplelng', '', 4, '', 1, '2022-11-24', '08:55:00', '09092925512', '', 'sample lang', '2022-11-19 09:53:08', 36),
(89, 'John Doe', 'Jemolin', 'johndoe@gmail.com', 2, 'Carls Package', 0, '2023-01-12', '08:59:00', '09092928821', '', 'tesutugasdh', '2023-01-07 00:59:52', 36);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `open_time` time NOT NULL DEFAULT '12:00:00',
  `close_time` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `date`, `open_time`, `close_time`) VALUES
(6, '2019-05-15', '03:11:00', '11:11:00'),
(7, '2019-05-16', '01:00:00', '01:00:00'),
(8, '2019-05-18', '02:01:00', '15:00:00'),
(9, '2022-11-16', '08:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `tables_id` int(11) NOT NULL,
  `t_date` date NOT NULL,
  `t_tables` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`tables_id`, `t_date`, `t_tables`) VALUES
(6, '2019-05-17', 5),
(7, '2019-05-15', 10),
(8, '2019-05-10', 2),
(9, '2020-10-04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `uidUsers`, `emailUsers`, `pwdUsers`, `reg_date`, `role_id`) VALUES
(35, 'jankes', 'as@f.com', '$2y$10$XuVFfcYHRzTU8wx/L0tfI.m496nYhK5LKX6F2PzdtDAWNqkJgKWUW', '2020-10-03 04:38:41', 2),
(36, 'admin', 'admin@g.com', '$2y$10$3FTH3BhrnT90qLVg5RHBq.LQD1d0DSzDgvou4Jue/VCTApZyAHO.O', '2020-10-04 04:12:52', 2),
(37, 'customer', 'customer@gmail.com', '$2y$10$Wgq1JdrY7mI3wWseGuBV9u/3Ks3SCEWRTWF77Bp/MF7LdgKWhCwh2', '2022-11-09 04:37:43', 1),
(38, 'guest', 'guest@gmail.com', '$2y$10$hO56SX6U1dvn8GYh6dAu8OTrDcBQNIyofka8qlqsxosqYqymRCusC', '2022-11-17 09:01:23', 1),
(39, 'sample', 'sample@gmail.com', '$2y$10$2H5yQ21uz3RZSxB5LRRwYuoC8mQhQd/bIpIvth9PigvVFgMy5A0LW', '2022-11-19 08:32:15', 1),
(40, 'guest1', 'guest1@gmail.com', '$2y$10$BsD7Pn/sLVF9DyCiuzAHWupEmq9B2AEh8tsY6x21Rq0xOCPFwkBWK', '2022-12-05 04:59:41', 1),
(41, 'jamolin', 'jamolin2211@gmail.com', '$2y$10$v0NIIHXnQlcVXLg41f5RyOPkurwZTKzS/u/9DX6c.81frLKVZskJC', '2022-12-20 10:42:52', 1),
(42, 'guest123', 'guest123@gmail.com', '$2y$10$6M9U/WWV/mzn3KPPglPFo.NMdEnz0pv8Y4DKZCcoThiGcnU1NAKWu', '2022-12-22 22:59:47', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserv_id`),
  ADD KEY `users_fk` (`user_fk`);

--
-- Indexes for table `reservation_backup`
--
ALTER TABLE `reservation_backup`
  ADD PRIMARY KEY (`reserv_id`),
  ADD KEY `users_fk` (`user_fk`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `reservation_backup`
--
ALTER TABLE `reservation_backup`
  MODIFY `reserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `idusers` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
