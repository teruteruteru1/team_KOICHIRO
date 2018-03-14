-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 3 月 14 日 12:50
-- サーバのバージョン： 10.1.29-MariaDB
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
-- Database: `20180108LearnSNS`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `feed_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `feeds`
--

CREATE TABLE `feeds` (
  `id` int(11) NOT NULL,
  `feed` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_count` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `feeds`
--

INSERT INTO `feeds` (`id`, `feed`, `user_id`, `like_count`, `created`, `updated`) VALUES
(6, 'hello world', 2, 0, '2018-02-08 19:50:05', '2018-02-09 06:06:15'),
(8, 'mogemoge', 1, 0, '2018-02-09 13:14:23', '2018-03-01 07:44:30'),
(9, 'hagehage', 2, 0, '2018-02-09 13:14:33', '2018-03-01 07:48:59'),
(10, 'hello world', 2, 0, '2018-02-08 19:50:05', '2018-02-09 06:06:15'),
(11, 'hello world', 2, 0, '2018-02-08 19:50:05', '2018-02-09 06:06:15'),
(12, 'oneone', 1, 0, '2018-02-08 15:02:55', '2018-02-27 06:24:32'),
(13, 'hugahuaga', 3, 0, '2018-02-08 15:02:55', '2018-02-08 07:02:55'),
(14, 'hungahunga', 3, 0, '2018-02-08 15:02:55', '2018-02-08 07:02:55');

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `img_name`, `created`, `updated`) VALUES
(1, 'シロ', 'shiro@gmail.com', '$2y$10$ViE70jBOG45t3FC6DdnJfuiG7gR0HNzn9tllj5bIsb9/1RikInihG', '20180206062400shiro.jpg', '2018-02-06 13:24:03', '2018-02-06 05:24:03'),
(2, '野原しんのすけ', 'shinnosuke@gmail.com', '$2y$10$hO7MuB/G8W7ou3cyBFB14OAQbxHbsUb3F59odr8k6DuCXUmAZUofy', '20180208061157shinnnnosuke.png', '2018-02-08 13:11:59', '2018-02-08 05:11:59'),
(3, '野原ひろし', 'hiroshi@gmail.com', '$2y$10$/gu.u4H2dpiQOAEss.B4DOh.bBPDk1nd3aELHd/qLcO3AllWBe.C6', '2018021306372020180201063950hiroshi.jpg', '2018-02-13 13:37:32', '2018-02-13 05:37:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
