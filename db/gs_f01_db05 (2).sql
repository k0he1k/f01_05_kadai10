-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 10 朁E18 日 14:51
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_f01_db05`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(12) NOT NULL,
  `bookname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bookurl` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL,
  `rank` int(5) NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `bookname`, `bookurl`, `comment`, `indate`, `rank`, `image`) VALUES
(1, 'maps', 'maos', 'good', '2018-09-19 02:24:20', 4, NULL),
(2, '世界史MAPS ', 'https://www.amazon.co.jp/%E4%B8%96%E7%95%8C%E5%8F%B2MAPS-DK%E7%A4%BE/dp/4391147785/ref=pd_lpo_sbs_14_t_1?_encoding=UTF8&psc=1&refRID=30Z1049YSFP47VVMDQV0', 'bad', '2018-09-20 19:29:03', 2, NULL),
(3, 'なんでもいっぱい大図鑑 ピクチャーペディア', 'https://www.amazon.co.jp/%E3%81%AA%E3%82%93%E3%81%A7%E3%82%82%E3%81%84%E3%81%A3%E3%81%B1%E3%81%84%E5%A4%A7%E5%9B%B3%E9%91%91-%E3%83%94%E3%82%AF%E3%83%81%E3%83%A3%E3%83%BC%E3%83%9A%E3%83%87%E3%82%A3%E3%82%A2-%E3%82%B9%E3%83%9F%E3%82%BD%E3%83%8B%E3%82%A2%E3%83%B3%E5%8D%94%E4%BC%9A/dp/4309615449/ref=pd_lpo_sbs_14_t_0?_encoding=UTF8&psc=1&refRID=30Z1049YSFP47VVMDQV0', 'good', '2018-09-20 20:28:43', 3, NULL),
(5, 'uu', 'uu', 'uu', '2018-09-27 00:05:13', 2, NULL),
(6, 'aa', 'aaaaa', 'aaaa', '2018-09-27 00:10:39', 2, NULL),
(7, 'a', 'aaa', 'aaAA', '2018-09-27 00:24:02', 1, NULL),
(8, 'aa', 'sss', 'ss', '2018-09-27 00:28:19', 2, NULL),
(9, 'y', 'ik', 'sss', '2018-09-27 00:52:13', 4, NULL),
(11, 'ooo', 'ooo', 'ng', '2018-09-27 05:37:24', 5, NULL),
(16, 'gomi', 'gomi', 'gomi', '2018-10-06 17:36:28', 2, 'upload/20181006103628d41d8cd98f00b204e9800998ecf8427e.png');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_data_table`
--

CREATE TABLE IF NOT EXISTS `gs_data_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_php02_table`
--

CREATE TABLE IF NOT EXISTS `gs_php02_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL,
  `age` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_php02_table`
--

INSERT INTO `gs_php02_table` (`id`, `name`, `email`, `detail`, `indate`, `age`) VALUES
(1, 'ジーズ福岡', 'gs_f@test.com', 'test', '2018-09-15 15:24:38', 20),
(2, 'ジーズ東京', 'gs_f@test.com', 'test', '2018-09-15 15:25:08', 10),
(3, 'ジーズ大阪', 'gs_f@test.com', 'test', '2018-09-15 15:25:08', 30),
(4, 'ジーズ札幌', 'gs_f@test.com', 'test', '2018-09-15 15:25:08', 40),
(5, 'ジーズ名古屋', 'gs_f@test.com', 'test', '2018-09-15 15:25:08', 10),
(6, 'ジーズ福岡', 'gs_f2@test.com', 'test', '2018-09-15 15:26:54', 20),
(7, 'ジーズ大阪', 'gs_f2@test.com', 'test', '2018-09-15 15:26:54', 30),
(8, 'ジーズ札幌', 'gs_f2@test.com', 'test', '2018-09-15 15:26:54', 40),
(9, 'ジーズ東京', 'gs_f2@test.com', 'test', '2018-09-15 15:26:54', 10),
(10, 'ジーズ名古屋', 'gs_f2@test.com', 'test', '2018-09-15 15:26:54', 20),
(11, 'aaa', 'gs@test.com', 'wwww', '2018-09-15 16:13:00', 30),
(12, 'aaa', 'oo@test.com', 'pppp', '2018-09-15 16:43:11', 40),
(13, '加藤昂平', '@test.com', 'test', '2018-09-15 16:47:47', 10),
(20, 'd', 'ddd', 'd', '2018-09-18 22:46:14', 30),
(21, 'r', '@test.com', 'rrr', '2018-09-18 22:48:23', 30),
(23, 'lolo', '@test.com', 'oloololol', '2018-09-18 22:59:31', 20);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_php03_table`
--

CREATE TABLE IF NOT EXISTS `gs_php03_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_php03_table`
--

INSERT INTO `gs_php03_table` (`id`, `name`, `email`, `detail`, `indate`) VALUES
(2, 'yamasaki', 'yamasaki@gs.gs', 'test02', '2018-09-15 15:22:57'),
(3, 'osg', 'osg@gs.gs', 'test034', '2018-09-15 15:23:20'),
(4, 'morita', 'morita@gs.gs', 'test04', '2018-09-15 15:23:48'),
(5, 'kimura', 'kimura@gs.gs', 'test05', '2018-09-15 15:24:48'),
(6, 'kamiyama', 'kamiyama@gs.gs', 'test06', '2018-09-15 16:12:26'),
(7, 'kanou', 'kanou@gs.gs', 'test07', '2018-09-15 16:13:06'),
(8, 'kosuge', 'kosuge@gs.gs', 'test08', '2018-09-15 16:17:04'),
(9, 'iseki', 'iseki@gs.gs', 'test09', '2018-09-15 16:47:30');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_ﬂg` int(1) NOT NULL,
  `life_ﬂg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_ﬂg`, `life_ﬂg`) VALUES
(1, 'kato', 'kato', 'test', 1, 0),
(3, 'sato', 'sato', 'test', 0, 0),
(4, 'saito', 'saito', 'test', 0, 0),
(5, 'naito', 'naito', 'test', 0, 0),
(6, 'muto', 'muto', 'test', 0, 0),
(12, 'koto', 'koto', 'test', 0, 0),
(13, 'oto', 'oto', 'test', 0, 0),
(14, 'loto', 'loto', 'test', 1, 0),
(15, 'sato', 'sato', 'test', 0, 0),
(16, 'goto', 'goto', 'test', 0, 0),
(18, 'soto', 'soto', 'test', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_data_table`
--
ALTER TABLE `gs_data_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_php02_table`
--
ALTER TABLE `gs_php02_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_php03_table`
--
ALTER TABLE `gs_php03_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `gs_data_table`
--
ALTER TABLE `gs_data_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gs_php02_table`
--
ALTER TABLE `gs_php02_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `gs_php03_table`
--
ALTER TABLE `gs_php03_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
