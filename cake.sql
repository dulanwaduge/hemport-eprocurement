-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-09-05 03:29:31
-- 服务器版本： 10.4.18-MariaDB
-- PHP 版本： 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `cake`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `page` varchar(32) NOT NULL,
  `image` varchar(64) NOT NULL,
  `updateimage` varchar(64) NOT NULL,
  `text` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `name`, `page`, `image`, `updateimage`, `text`) VALUES
(1, 'Under Nav Left one', 'Home', '1.png', 'sustainability.png', 'Hemp for a sustainable future'),
(9, 'Under Nav Right one', 'Home', '2.png', 'hempbenefits.png', 'Health benefits of Hemp!'),
(10, 'Above footer', 'Home', '3.png', '', '123');

-- --------------------------------------------------------

--
-- 表的结构 `builder`
--

CREATE TABLE `builder` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `postcode` varchar(4) DEFAULT NULL,
  `avatar` varchar(64) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `builder`
--

INSERT INTO `builder` (`id`, `name`, `phone`, `email`, `address`, `description`, `city`, `state`, `postcode`, `avatar`, `user_id`) VALUES
(21, 'jack zeng', '3590745627', 'jackzeng@outlook.com', 'none', '都是VSVS', 'Melbourne', 'ACT', '5290', NULL, 211);

-- --------------------------------------------------------

--
-- 表的结构 `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `fname` varchar(64) DEFAULT NULL,
  `lname` varchar(64) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `postcode` varchar(4) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `buyer`
--

INSERT INTO `buyer` (`id`, `fname`, `lname`, `address`, `state`, `postcode`, `email`, `phone`, `users_id`, `modified`) VALUES
(32, 'jack', 'zeng', 'none', 'ACT', '5290', 'jackzeng@outlook.com', '3590745627', 204, '2022-08-14 12:35:31'),
(33, 'jack', 'zeng', 'none', 'Vic', '5290', '123@qq.com', '3590745627', 207, '2022-08-14 13:39:44'),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 209, '2022-08-17 08:41:59'),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 210, '2022-08-17 08:59:30');

-- --------------------------------------------------------

--
-- 表的结构 `demand`
--

CREATE TABLE `demand` (
  `id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `demand` varchar(64) NOT NULL,
  `amount` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `business_name` varchar(64) NOT NULL,
  `business_num` varchar(11) NOT NULL,
  `business_email` varchar(64) NOT NULL,
  `business_address` varchar(64) NOT NULL,
  `city` varchar(32) NOT NULL,
  `state` varchar(32) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `ABN` varchar(11) DEFAULT NULL,
  `buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `demand`
--

INSERT INTO `demand` (`id`, `created`, `demand`, `amount`, `description`, `image1`, `business_name`, `business_num`, `business_email`, `business_address`, `city`, `state`, `postcode`, `ABN`, `buyer_id`) VALUES
(1, '2022-08-14 16:35:11', 'asd', 'asd', 'asdasd', NULL, 'asdasd', 'asdasd', 'asdasd@gmail.com', 'asdasd', 'asdasd', 'NT', 'asda', 'asdasd', 31),
(2, '2022-08-14 17:09:59', 'zzzz', 'zzz', 'zzz', NULL, 'zzz', 'zzz', 'zzz', 'zzz', 'zzz', 'ACT', 'zzz', 'zzz', 31),
(3, '2022-08-24 03:43:42', 'asd', 'asd', 'asd', NULL, 'asd', 'asd', 'asd@gmail.com', 'asd', 'asd', 'Qld', 'asd', 'asd', 31),
(4, '2022-08-24 04:13:21', 'asd', 'asd', 'asd', NULL, 'asd', 'asd', 'asd@gmail.com', 'asd', 'asd', 'ACT', 'asd', 'asd', 31),
(5, '2022-08-24 04:16:25', 'asd', 'asd', 'asd', NULL, 'asd', 'asd', 'asd@gmail.com', 'asd', 'asd', 'ACT', 'asd', 'asd', 31),
(6, '2022-08-24 04:23:32', 'asd', 'asd', 'asd', NULL, 'asd', '1234567890', 'asd@q', 'asd', 'asd', 'NT', '1234', '12345678901', 31),
(7, '2022-09-04 15:28:56', 'Hemp Fabric', '1 ton', 'Need Hemp made fabric ', 'Single use plastic (11).jpg', 'Hemport', '0410200233', 'a@gmail.com', '1 Heyington Place', 'Melbourne', 'Vic', '3142', '12345678909', 34);

-- --------------------------------------------------------

--
-- 表的结构 `orderplaced`
--

CREATE TABLE `orderplaced` (
  `id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` float NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `buyeraddress` varchar(64) DEFAULT NULL,
  `buyerstate` varchar(64) DEFAULT NULL,
  `buyerpostcode` int(4) DEFAULT NULL,
  `buyeremail` varchar(64) DEFAULT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT 1,
  `bname` varchar(32) DEFAULT NULL,
  `sname` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `availability` varchar(64) NOT NULL,
  `price` float NOT NULL DEFAULT 1,
  `description` varchar(64) NOT NULL,
  `amount` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `seller_id` int(11) NOT NULL COMMENT 'Seller->users_id',
  `image` varchar(255) DEFAULT NULL,
  `image1des` text DEFAULT NULL,
  `image_2` varchar(64) DEFAULT NULL,
  `image2des` text DEFAULT NULL,
  `image_3` varchar(64) DEFAULT NULL,
  `image3des` text DEFAULT NULL,
  `image_4` varchar(64) DEFAULT NULL,
  `image4des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `name`, `availability`, `price`, `description`, `amount`, `modified`, `seller_id`, `image`, `image1des`, `image_2`, `image2des`, `image_3`, `image3des`, `image_4`, `image4des`) VALUES
(29, 'aaaa', 'Yes', 1, 'aaa', 23, '2022-07-04 02:12:46', 34, NULL, '23', NULL, '', NULL, '', NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cname` varchar(64) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `image_4` varchar(255) DEFAULT NULL,
  `builder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `address` varchar(64) DEFAULT NULL,
  `BusinessName` varchar(64) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `emailaddress` varchar(32) DEFAULT NULL,
  `bsb` varchar(6) DEFAULT '0',
  `accountno` varchar(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `seller`
--

INSERT INTO `seller` (`id`, `address`, `BusinessName`, `phone`, `users_id`, `emailaddress`, `bsb`, `accountno`) VALUES
(34, 'aaa', '222', '0400000000', 202, '1@1.com', '123123', '123123'),
(35, NULL, NULL, NULL, 205, NULL, '0', '0'),
(36, 'none', 'none', '3590745627', 206, '123@qq.com', '628519', '259618489'),
(37, 'none', 'none', '3590745627', 208, '123@qq.com', '123456', '5156266');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `token` varchar(255) DEFAULT NULL COMMENT 'token for verification',
  `createtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `company_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `ABN` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `type`, `username`, `password`, `token`, `createtime`, `modifiedate`, `company_name`, `phone`, `industry`, `ABN`) VALUES
(201, 'Admin', 'admin@admin.com', '$2y$10$TDXy/vPlbq2iNzQz8TNJn.7nQ5CFEhFWsOS8CD1ArBujptJjoLktq', NULL, '2022-07-03 16:36:29', '2022-07-03 16:36:29', '', '', '', ''),
(203, 'Buyer', '1059618132@qq.com', '$2y$10$ydBJLODboTHFYT88kzQ8vOwqmQIoclGZ.V0wR/MMSuTZScmD4No4K', NULL, '2022-08-14 12:29:40', '2022-08-14 12:29:40', '', '', '', ''),
(204, 'Buyer', 'jackzeng@outlook.com', '$2y$10$i91MvXc54K6.EtT6bKYk9e3sRjGoXASxeZ0r/50HtWbCThl7I6UpS', NULL, '2022-08-14 12:35:10', '2022-08-14 12:35:10', '', '', '', ''),
(206, 'Seller', '123@qq.com', '$2y$10$mBEgwCqqr7EHMfZhuBRdT.jIQgryqt4CC/bNSVDmX1sHdd31FLhNG', NULL, '2022-08-14 13:19:49', '2022-08-14 13:19:49', '', '', '', ''),
(207, 'Buyer', '1jackzeng@outlook.com', '$2y$10$N8UEDpVhHRBjN8lBcGgvSu.uQxgi0LpYSBjmN0NINnC/5UgGXLbW6', NULL, '2022-08-14 13:39:34', '2022-08-14 13:39:34', 'none', '13590745627', '12323', '123123213'),
(208, 'Seller', '123jackzeng@outlook.com', '$2y$10$sCg5QIScTEXe17V1ITJOk.IGO3zyPlrvx380yjeN./H6eSSVotrJG', NULL, '2022-08-14 13:45:44', '2022-08-14 13:45:44', 'none', '13590745627', 'abc', '11111111111'),
(209, 'Buyer', '1234jackzeng@outlook.com', '$2y$10$PbLxFV.//8W.YgM6jCXxR.APM6U1F5qseWxTQAJxxaAdbkzZxCJLO', NULL, '2022-08-17 08:41:59', '2022-08-17 08:41:59', 'none', '13590745627', 'service', '11111111111'),
(210, 'Buyer', '174141jackzeng@outlook.com', '$2y$10$.21WEOipUMCCfbGJVwanROKlen6zAywRm8ZVLTxvu3np7TaaQPdAi', NULL, '2022-08-17 08:59:30', '2022-08-17 08:59:30', 'none', '13590745627', 'service', '11111111111'),
(211, 'Builder', '111jackzeng@outlook.com', '$2y$10$GneV8.VEZX/JcQpB0wCb6.CyaLLIPIyre7Pt.ZQ9s/e8ciwiLtTwi', NULL, '2022-09-04 12:02:10', '2022-09-04 12:02:10', 'none', '13590745627', 'abc', '11111111111');

--
-- 转储表的索引
--

--
-- 表的索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `builder`
--
ALTER TABLE `builder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_builder_users` (`user_id`);

--
-- 表的索引 `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_buyer_users` (`users_id`);

--
-- 表的索引 `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `orderplaced`
--
ALTER TABLE `orderplaced`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projects_users` (`builder_id`);

--
-- 表的索引 `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seller_user` (`users_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `builder`
--
ALTER TABLE `builder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用表AUTO_INCREMENT `demand`
--
ALTER TABLE `demand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `orderplaced`
--
ALTER TABLE `orderplaced`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用表AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- 限制导出的表
--

--
-- 限制表 `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `fk_buyer_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_project_users` FOREIGN KEY (`builder_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
