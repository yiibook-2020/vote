-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-12-02 16:11:13
-- 服务器版本： 5.7.31-log
-- PHP 版本： 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `vote`
--

-- --------------------------------------------------------

--
-- 表的结构 `vote_record`
--

CREATE TABLE `vote_record` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(20) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `vote_record`
--

INSERT INTO `vote_record` (`id`, `work_id`, `ip`, `create_date`) VALUES
(1, 1, '192.168.10.1', '2020-12-02'),
(4, 2, '192.168.10.1', '2020-12-02'),
(5, 2, '192.168.10.1', '2020-12-02'),
(6, 2, '192.168.10.1', '2020-12-02'),
(7, 2, '192.168.10.1', '2020-12-02'),
(8, 2, '183.199.164.238', '2020-12-02'),
(9, 1, '183.199.164.238', '2020-12-02'),
(10, 2, '223.104.102.31', '2020-12-02'),
(11, 1, '223.104.102.31', '2020-12-02'),
(12, 4, '223.104.102.31', '2020-12-02'),
(13, 3, '223.104.102.31', '2020-12-02'),
(14, 5, '183.199.164.238', '2020-12-02'),
(15, 6, '183.199.164.238', '2020-12-02'),
(16, 6, '223.104.102.31', '2020-12-02'),
(17, 5, '223.104.102.31', '2020-12-02'),
(18, 4, '183.199.164.238', '2020-12-02'),
(19, 3, '183.199.164.238', '2020-12-02'),
(20, 4, '111.225.202.2', '2020-12-02'),
(21, 2, '111.225.202.2', '2020-12-02'),
(22, 1, '111.225.202.2', '2020-12-02'),
(23, 5, '111.225.202.2', '2020-12-02'),
(24, 6, '111.225.202.2', '2020-12-02');

-- --------------------------------------------------------

--
-- 表的结构 `works`
--

CREATE TABLE `works` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `vote_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `works`
--

INSERT INTO `works` (`id`, `title`, `vote_count`, `created_at`, `updated_at`) VALUES
(1, '春日的小蝴蝶🦋', 5, '2020-12-01 15:54:09', '2020-12-02 07:53:16'),
(2, '黄昏下的长颈鹿🦒', 9, '2020-12-01 15:54:41', '2020-12-02 07:53:04'),
(3, '慈祥的老人', 2, '2020-12-02 00:29:15', '2020-12-02 00:46:01'),
(4, '龙卷风🌪️', 3, '2020-12-02 00:29:38', '2020-12-02 07:38:00'),
(5, '青春的山村', 3, '2020-12-02 00:43:38', '2020-12-02 07:53:30'),
(6, '美丽的瀑布', 3, '2020-12-02 00:43:53', '2020-12-02 07:53:36');

--
-- 转储表的索引
--

--
-- 表的索引 `vote_record`
--
ALTER TABLE `vote_record`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `vote_record`
--
ALTER TABLE `vote_record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用表AUTO_INCREMENT `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
