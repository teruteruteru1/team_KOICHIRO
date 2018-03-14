-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 3 月 14 日 13:35
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

--
-- テーブルのデータのダンプ `areas`
--

INSERT INTO `areas` (`area_id`, `area_name`, `country_id`) VALUES
(1, 'Alaska', 197),
(2, 'Arizona', 197),
(3, 'Arkansas', 197),
(4, 'California', 197),
(5, 'Colorado', 197),
(6, 'Connecticut', 197),
(7, 'Delaware', 197),
(8, 'Florida', 197),
(9, 'Georgia', 197),
(10, 'Hawaii', 197),
(11, 'Idaho', 197),
(12, 'Illinois', 197),
(13, 'Indiana', 197),
(14, 'Iowa', 197),
(15, 'Kansas', 197),
(16, 'Kentucky', 197),
(17, 'Louisiana', 197),
(18, 'Maine', 197),
(19, 'Maryland', 197),
(20, 'Massachusetts', 197),
(21, 'Michigan', 197),
(22, 'Minnesota', 197),
(23, 'Mississippi', 197),
(24, 'Missouri', 197),
(25, 'Montana', 197),
(26, 'Nebraska', 197),
(27, 'Nevada', 197),
(28, 'New Hampshire', 197),
(29, 'New Jersey', 197),
(30, 'New Mexico', 197),
(31, 'New York', 197),
(32, 'North Carolina', 197),
(33, 'North Dakota', 197),
(34, 'Ohio', 197),
(35, 'Oklahoma', 197),
(36, 'Oregon', 197),
(37, 'Pennsylvania', 197),
(38, 'Rhode Island', 197),
(39, 'South Carolina', 197),
(40, 'South Dakota', 197),
(41, 'Tennessee', 197),
(42, 'Texas', 197),
(43, 'Utah', 197),
(44, 'Vermont', 197),
(45, 'Virginia', 197),
(46, 'Washington', 197),
(47, 'West Virginia', 197),
(48, 'Wisconsin', 197),
(49, 'Wyoming', 197),
(50, '北海道', 87),
(51, '青森県', 87),
(52, '岩手県', 87),
(53, '宮城県', 87),
(54, '秋田県', 87),
(55, '山形県', 87),
(56, '福島県', 87),
(57, '茨城県', 87),
(58, '栃木県', 87),
(59, '群馬県', 87),
(60, '埼玉県', 87),
(61, '千葉県', 87),
(62, '東京都', 87),
(63, '神奈川県', 87),
(64, '新潟県', 87),
(65, '富山県', 87),
(66, '石川県', 87),
(67, '福井県', 87),
(68, '山梨県', 87),
(69, '長野県', 87),
(70, '岐阜県', 87),
(71, '静岡県', 87),
(72, '愛知県', 87),
(73, '三重県', 87),
(74, '滋賀県', 87),
(75, '京都府', 87),
(76, '大阪府', 87),
(77, '兵庫県', 87),
(78, '奈良県', 87),
(79, '和歌山県', 87),
(80, '鳥取県', 87),
(81, '島根県', 87),
(82, '岡山県', 87),
(83, '広島県', 87),
(84, '山口県', 87),
(85, '徳島県', 87),
(86, '香川県', 87),
(87, '愛媛県', 87),
(88, '高知県', 87),
(89, '福岡県', 87),
(90, '佐賀県', 87),
(91, '長崎県', 87),
(92, '熊本県', 87),
(93, '大分県', 87),
(94, '宮崎県', 87),
(95, '鹿児島県', 87),
(96, '沖縄県', 87),
(97, 'セブ', 145),
(98, 'マニラ', 145),
(99, 'グアム', 197),
(100, 'ローマ', 85),
(101, 'ヴェネツィア', 85),
(102, 'フローレンス', 85),
(103, 'ミラノ', 85);

-- --------------------------------------------------------

--
-- テーブルの構造 `areas_dialies`
--

CREATE TABLE `areas_dialies` (
  `areas_dialies_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL COMMENT 'FK areasの外部キー',
  `dialies_id` int(11) NOT NULL COMMENT 'FK dialiesの外部キー'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `areas_dialies`
--

INSERT INTO `areas_dialies` (`areas_dialies_id`, `area_id`, `dialies_id`) VALUES
(1, 31, 1),
(2, 4, 2),
(3, 97, 3),
(4, 99, 4),
(5, 97, 5),
(6, 101, 6);

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

--
-- テーブルのデータのダンプ `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(8, 'Argentina'),
(10, 'Australia'),
(11, 'Austria'),
(17, 'Belarus'),
(25, 'Brazil'),
(27, 'Bulgaria'),
(30, 'Cambodia'),
(31, 'Cameroon'),
(32, 'Canada'),
(36, 'Chile'),
(37, 'China'),
(38, 'Colombia'),
(43, 'Costa Rica'),
(44, 'Côte d\'Ivoire'),
(46, 'Cuba'),
(49, 'Denmark'),
(52, 'Dominican Republic'),
(53, 'Ecuador'),
(54, 'Egypt'),
(60, 'Fiji'),
(61, 'Finland'),
(62, 'France'),
(66, 'Germany'),
(68, 'Greece'),
(70, 'Guatemala'),
(74, 'Haiti'),
(75, 'Holy See (Vatican City State)'),
(77, 'Hungary'),
(78, 'Iceland'),
(79, 'India'),
(80, 'Indonesia'),
(81, 'Iran, Islamic Republic of'),
(82, 'Iraq'),
(83, 'Ireland'),
(84, 'Israel'),
(85, 'Italy'),
(86, 'Jamaica'),
(87, 'Japan'),
(89, 'Kazakhstan'),
(90, 'Kenya'),
(92, 'Korea, Democratic People\'s Republic of'),
(93, 'Korea, Republic of'),
(116, 'Mexico'),
(119, 'Monaco'),
(128, 'Nepal'),
(129, 'Netherlands'),
(130, 'New Zealand'),
(136, 'Norway'),
(141, 'Panama'),
(142, 'Papua New Guinea'),
(144, 'Peru'),
(145, 'Philippines'),
(147, 'Portugal'),
(164, 'Singapore'),
(170, 'South Africa'),
(173, 'Spain'),
(177, 'Swaziland'),
(178, 'Sweden'),
(179, 'Switzerland'),
(181, 'Taiwan, Province of China'),
(184, 'Thailand'),
(190, 'Turkey'),
(191, 'Turkmenistan'),
(195, 'United Arab Emirates'),
(196, 'United Kingdom'),
(197, 'United States'),
(198, 'Uruguay');

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
  `title` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `title_comment` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `dialies`
--

INSERT INTO `dialies` (`dialy_id`, `user_id`, `commnt_count`, `like_count`, `depart_date`, `arrival_date`, `number_days`, `budget`, `title`, `img_name`, `title_comment`, `created`, `updated`, `flag`) VALUES
(1, 1, 0, 0, '2018-03-01', '2018-03-15', 15, 400000, 'ニューヨーク旅行', 'newyork1234.jpg', '毎年1回のご褒美旅行。実は去年のハワイ旅行の帰宅途中に、既に今年の目的地は決めていたのだ！ それは・・・・「カンクン＆ニューヨーク☆」 そう、NYに行く前に実はカンクンに滞在してたササキ＆タカハシ。 詳細はタカハシの旅日記を参照してください。 死ぬほどキレイな青い海を見ながら、お酒飲みまくり、ご飯たべまくり、ココボンゴという大きなクラブで踊り狂い、観光しまくり、騒ぎまくって結局3泊したのに、 合計7時間くらいしか寝なかった。 ニューヨークまでの直行便フライトの中で仮眠を取り、いざ大都市ニューヨークへ！！ ニューヨークといえば世界の流行や経済の中心地。様々な人種や文化がMIXされた刺激的な大都市。 出発前にNYを舞台にした映画や、ブロードウェイに向けてのミュージカル映画などを観まくり、予習は万全♪　 大好きなドラマのロケ地も含め、行きたいところは山ほどあった今回のNY。  とにかく歩いて歩いて歩きまくり！のいつもの2人の女子旅　イン　NY！ 4泊分・・・盛りだくさんで長くなりそうですが、ご紹介します♪\r\n\r\n', '0000-00-00 00:00:00', '2018-03-13 17:16:52', 0),
(2, 2, 0, 0, '2018-02-02', '2018-02-21', 19, 250000, 'サンフランシスコ旅行', 'sanfrancisco.jpg', 'シアトルからサンフランシスコへの到着は朝7:30。JAL羽田行きの出発は15:00です。アンカレッジから乗り継いでサンフランシスコに着いたので、どうしてもシャワーを浴びたく、お昼12時には戻ってくる予定で出発です。\r\nJALの窓口は1日1便しかないので、出発3時間前にならないと窓口すら用意されておりません。それもあってダウンタウンに行くことに。', '2018-03-13 00:00:00', '2018-03-13 17:16:43', 0),
(3, 1, 0, 0, '2017-10-04', '2017-10-11', 7, 160000, 'セブ カワサンフォールへ', 'Single_Blog2_1518359667602.jpg', '朝4時にホテルを出発し、マイクロバスに乗って、オスロブ、カワサン滝へ行ってきました。\r\n								水温はとても冷たかったですが、綺麗な空気と綺麗な水に感動しました。', '2018-03-14 01:15:59', '2018-03-13 17:15:59', 0),
(4, 2, 0, 0, '2017-07-07', '2017-07-01', 7, 280000, '３度目のグアム', 'Single_Blog3_1519138076376.jpg', '2017年7月3日成田発、7月6日成田着のデルタ航空利用。\r\n								常夏の島グアムで買い物三昧、遊び三昧、グルメ三昧の旅！ショッピング施設も充実していますし、\r\n								以前に行ったときにはなかった新しくできたレストランもたくさんありました！', '2018-03-14 01:27:03', '2018-03-13 17:27:03', 0),
(5, 2, NULL, NULL, '2018-03-01', '2018-03-08', 8, 140000, 'はじめてのセブ', 'Single_Blog4_IMG_20180216_175141.jpg', '毎年、年に一度自分へのご褒美の念を込めてグアムに行くのですが、今年の旅行はいつもとは違う旅行をしてみたいと思い、フィリピン、セブに行くことにしました。3月のセブはとても暑く空港到着から汗だくです。早くビールが飲みたい..', '2018-03-14 01:30:37', '2018-03-13 17:30:37', 0),
(6, 1, 0, 0, '2016-10-01', '2016-10-14', 14, 300000, '2017.9 イタリア旅行記', 'Single-Blog1-P9172057.jpg', 'いよいよ今回のイタリア旅行記も、最終回を迎えることになった。もう一度、出発までの顛末や計画も書いておこう。今から35年ほど前に仕事でミラノに出張した際に、週末の空き時間を利用してベネツィア・フィレンツェに一泊二日で出掛けたことがある。また、その数年前に女房と一緒にヨーロッパ旅行をした時に、ローマで一日だけ観光を行った。ただ、そのいずれもが随分昔のことであり、短時間立ち寄っただけであり、今のデジカメの時代と違って余り写真も残っていない。ましてや、出張の時にはカメラを持参していたかどうかも定かでない。', '0000-00-00 00:00:00', '2018-03-13 17:39:11', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `dialies_tags`
--

CREATE TABLE `dialies_tags` (
  `dialies_tags_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `dialis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='タグと旅行記の中間テーブル';

--
-- テーブルのデータのダンプ `dialies_tags`
--

INSERT INTO `dialies_tags` (`dialies_tags_id`, `tag_id`, `dialis_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 2, 2),
(4, 4, 2),
(5, 2, 3),
(6, 1, 4),
(7, 3, 4),
(8, 6, 5),
(9, 7, 5),
(10, 1, 6),
(11, 2, 6);

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

--
-- テーブルのデータのダンプ `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'グルメ'),
(2, '観光'),
(3, 'ショッピング'),
(4, 'スポーツ・アウトドア'),
(5, 'ホテル'),
(6, 'リラクゼーション'),
(7, 'リゾート'),
(8, 'その他');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `img_name`, `created`, `updated`) VALUES
(1, 'シロ', 'shiro@gmail.com', '$2y$10$CB/oByVSy2Qhy9HAVxFoZeITUK3CA0cbuA.bCXJEr7sF45W3Jq6wm', '20180303105527shiro.jpg', '2018-03-03 18:10:26', '2018-03-03 10:10:26'),
(2, '野原しんのすけ', 'shinnosuke@gmail.com', '$2y$10$cZcWrlqkChu2.6xeHikQpuk3QtF5o91pLKCxkH0CwO5KlE7gMNBai', '20180305025925shinnnnosuke.png', '2018-03-05 09:59:31', '2018-03-05 01:59:31');

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
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `areas_dialies`
--
ALTER TABLE `areas_dialies`
  MODIFY `areas_dialies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `dialies`
--
ALTER TABLE `dialies`
  MODIFY `dialy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dialies_tags`
--
ALTER TABLE `dialies_tags`
  MODIFY `dialies_tags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
