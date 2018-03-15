-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 3 月 15 日 16:48
-- サーバのバージョン： 10.1.28-MariaDB
-- PHP Version: 5.6.32

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
-- テーブルの構造 `dialies_tags`
--

CREATE TABLE `dialies_tags` (
  `dialies_tags_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `dialies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='タグと旅行記の中間テーブル';

--
-- テーブルのデータのダンプ `dialies_tags`
--

INSERT INTO `dialies_tags` (`dialies_tags_id`, `tag_id`, `dialies_id`) VALUES
(1, 3, 15),
(2, 6, 15),
(3, 9, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dialies_tags`
--
ALTER TABLE `dialies_tags`
  ADD PRIMARY KEY (`dialies_tags_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dialies_tags`
--
ALTER TABLE `dialies_tags`
  MODIFY `dialies_tags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
