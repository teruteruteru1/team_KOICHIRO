-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 2 月 26 日 07:52
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
-- Database: `teamKOICHIRO`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `areas`
--

CREATE TABLE `areas` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL COMMENT 'FK countriesの外部キー'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `areas_dialies`
--

CREATE TABLE `areas_dialies` (
  `areas_dialies_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL COMMENT 'FK areasの外部キー',
  `dialies_id` int(11) NOT NULL COMMENT 'FK dialiesの外部キー'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `dialy_id` int(11) NOT NULL COMMENT 'FK dialiesの外部キー',
  `user_id` int(11) NOT NULL COMMENT 'FK usersの外部キー',
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `dialies`
--

CREATE TABLE `dialies` (
  `dialy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commnt_count` int(11) DEFAULT NULL,
  `like_count` int(11) DEFAULT NULL,
  `depart_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `number_days` int(11) NOT NULL,
  `budget` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `img_name_count` int(11) NOT NULL,
  `title_comment` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `dialies_tags`
--

CREATE TABLE `dialies_tags` (
  `dialies_tags_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `dialis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='タグと旅行記の中間テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `favs`
--

CREATE TABLE `favs` (
  `fav_id` int(11) NOT NULL,
  `dialy_id` int(11) NOT NULL COMMENT 'FK dialiesの外部キー',
  `user_id` int(11) NOT NULL COMMENT 'FK usersの外部キー'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `dialy_id` int(11) NOT NULL COMMENT 'FK dialiesの外部キー',
  `user_id` int(11) NOT NULL COMMENT 'FK usersの外部キー'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `pic_name` int(11) NOT NULL,
  `dialy_id` int(11) NOT NULL COMMENT 'FK dialyの外部キー',
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pasward` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `areas_dialies`
--
ALTER TABLE `areas_dialies`
  ADD PRIMARY KEY (`areas_dialies_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `dialies`
--
ALTER TABLE `dialies`
  ADD PRIMARY KEY (`dialy_id`);

--
-- Indexes for table `dialies_tags`
--
ALTER TABLE `dialies_tags`
  ADD PRIMARY KEY (`dialies_tags_id`);

--
-- Indexes for table `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas_dialies`
--
ALTER TABLE `areas_dialies`
  MODIFY `areas_dialies_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dialies`
--
ALTER TABLE `dialies`
  MODIFY `dialy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dialies_tags`
--
ALTER TABLE `dialies_tags`
  MODIFY `dialies_tags_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favs`
--
ALTER TABLE `favs`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
