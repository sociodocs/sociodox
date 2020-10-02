-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 05:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sociochat`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `sr.no` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `comments` varchar(300) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`sr.no`, `name`, `comments`, `post_time`) VALUES
(16, 'ssss', 'dsdszdssff', '2020-09-14 13:56:11'),
(17, 'ffff', 'fxgfdgdgdgd', '2020-09-14 13:57:47'),
(18, 'ffff', 'fdfgdfd', '2020-09-14 13:57:52'),
(19, 'ffff', 'dfgfdgfdgd', '2020-09-14 13:58:00'),
(20, 'ffff', 'dfsdfsdf', '2020-09-14 13:58:06'),
(21, 'dddd', 'dsdasdsds', '2020-09-18 09:34:49'),
(22, 'dddd', 'fffsddddddddsaddsdddddddddddddddedeedeeeeeeeeeeeddcccccccceeeeeeeaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2020-09-18 09:35:07'),
(23, 'dddd', 'hekejjqenwdnjnjkndjkanndsjbbfbfbjbfbfbjfbjbkjbkkkkkkbbbbjbjnjkaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbccccccccccccccccccccccccccccccccccccccccccccdddddddddddddddddddddddddddddddddddddddddddddddddddddddddeeeeeeeeeeeeeee', '2020-09-18 09:36:00'),
(24, 'aaaa', 'dddfdsfsdfsfs', '2020-09-30 15:09:49'),
(25, 'aaaa', 'dfdfds', '2020-09-30 15:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sr.no` int(20) NOT NULL,
  `regfullname` varchar(20) NOT NULL,
  `regusername` varchar(20) NOT NULL,
  `regpassword` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sr.no`, `regfullname`, `regusername`, `regpassword`) VALUES
(6, 'ssss', 'ssss', 'ssss'),
(7, 'ffff', 'ffff', 'ffff'),
(8, 'dddd', 'dddd', 'rfe'),
(9, 'dddd', 'dddd', 'dddd'),
(10, 'aaaa', 'aaaa', 'aaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`sr.no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sr.no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `sr.no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sr.no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
