-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2016 at 10:54 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttthsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('Admin.Document.*', '1', NULL, 'N;'),
('Admin.Linksite.*', '1', NULL, 'N;'),
('Admin.Menu.*', '1', NULL, 'N;'),
('Admin.News.*', '1', NULL, 'N;'),
('Admin.Slideshow.*', '1', NULL, 'N;'),
('Admin.User.*', '1', NULL, 'N;'),
('member', '2', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, 'Administrator', NULL, NULL),
('Admin.Document.*', 1, 'Văn bản.*', NULL, 'N;'),
('Admin.Linksite.*', 1, 'Liên kết trang.*', NULL, 'N;'),
('Admin.Menu.*', 1, 'Danh mục.*', NULL, 'N;'),
('Admin.News.*', 1, 'Tin tức.*', NULL, 'N;'),
('Admin.Slideshow.*', 1, 'Slideshow', NULL, 'N;'),
('Admin.User.*', 1, 'Thành viên.*', NULL, 'N;'),
('member', 2, 'User', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL,
  `idmenu` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) DEFAULT NULL,
  `usercreate` tinyint(2) NOT NULL,
  `datecreate` datetime DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `seodescription` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seokeyword` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `linksite`
--

CREATE TABLE IF NOT EXISTS `linksite` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opgroup` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linksite`
--

INSERT INTO `linksite` (`id`, `title`, `link`, `opgroup`) VALUES
(1, 'UBND Tỉnh Đồng Tháp', 'dongthap.gov.vn', 'Cổng thông tin'),
(2, 'UBND TP Sa Đéc', 'sadec.dongthap.gov.vn', 'Trang thông tin'),
(3, 'UBND TP Cao Lãnh', 'tpcaolanh.dongthap.gov.vn', 'Trang thông tin'),
(4, 'UBND Huyện Cao Lãnh', 'caolanh.dongthap.gov.vn', 'Trang thông tin'),
(5, 'UBND Huyện Châu Thành', 'chauthanh.dongthap.gov.vn', 'Trang thông tin'),
(6, 'UBND Huyện Hồng Ngự', 'hongngu.dongthap.gov.vn', 'Trang thông tin'),
(7, 'UBND Huyện Lai Vung', 'laivung.dongthap.gov.vn', 'Trang thông tin'),
(8, 'UBND Huyện Lấp Vò', 'lapvo.dongthap.gov.vn', 'Trang thông tin'),
(9, 'UBND Huyện Tam Nông', 'tamnong.dongthap.gov.vn', 'Trang thông tin'),
(10, 'UBND Huyện Tân Hồng', 'tanhong.dongthap.gov.vn', 'Trang thông tin'),
(11, 'UBND Huyện Thanh Bình', 'thanhbinh.dongthap.gov.vn', 'Trang thông tin'),
(12, 'UBND Huyện Tháp Mười', 'thapmuoi.dongthap.gov.vn', 'Trang thông tin'),
(13, 'UBND TX Hồng Ngự', 'txhongngu.dongthap.gov.vn', 'Trang thông tin'),
(14, 'UBND Phường 1', 'p1.sadec.dongthap.gov.vn', 'Xã - Phường TPSĐ'),
(15, 'UBND Phường 2', 'p2.sadec.dongthap.gov.vn', 'Xã - Phường TPSĐ'),
(16, 'UBND Phường 3', 'p3.sadec.dongthap.gov.vn', 'Xã - Phường TPSĐ'),
(17, 'UBND Xã Tân Phú Đông', 'tanphudong.sadec.dongthap.gov.vn', 'Xã - Phường TPSĐ'),
(18, 'UBND Xã Tân Khánh Đông', 'tankhanhdong.sadec.dongthap.gov.vn', 'Xã - Phường TPSĐ');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent`, `title`, `alias`, `controller`, `url`, `icon`, `status`) VALUES
(1, 0, 'Tổng quan', 'tong-quan', '', NULL, '', 1),
(2, 1, 'Giới thiệu', 'gioi-thieu', 'tong-quan', NULL, '', 1),
(3, 1, 'Cơ cấu tổ chức', 'co-cau-to-chuc', 'tong-quan', NULL, '', 1),
(4, 1, 'Nhiệm vụ quyền hạn', 'nhiem-vu-quyen-han', 'tong-quan', NULL, '', 1),
(5, 0, 'Đào tạo', 'dao-tao', '', NULL, '', 1),
(6, 5, 'Chương trình đào tạo', 'chuong-trinh-dao-tao', 'dao-tao', NULL, '', 1),
(7, 5, 'Lịch khai giảng', 'lich-khai-giang', 'dao-tao', NULL, '', 1),
(8, 0, 'Dịch vụ', 'dich-vu', '', NULL, '', 1),
(9, 8, 'Giới thiệu', 'gioi-thieu', 'dich-vu', NULL, '', 1),
(10, 0, 'Tin tức', 'tin-tuc', '', NULL, '', 1),
(11, 10, 'Tin địa phương', 'tin-dia-phuong', 'tin-tuc', NULL, '', 1),
(12, 10, 'Tin công nghệ', 'tin-cong-nghe', 'tin-tuc', NULL, '', 1),
(13, 10, 'Thông báo', 'thong-bao', 'tin-tuc', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `usercreate` int(2) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `seodescription` text COLLATE utf8_unicode_ci,
  `seokeyword` text COLLATE utf8_unicode_ci,
  `source` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datecreate` datetime DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_save`
--

CREATE TABLE IF NOT EXISTS `pcounter_save` (
  `save_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `save_value` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pcounter_save`
--

INSERT INTO `pcounter_save` (`save_name`, `save_value`) VALUES
('counter', 0),
('day_time', 2457406),
('max_count', 0),
('max_time', 0),
('yesterday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_users`
--

CREATE TABLE IF NOT EXISTS `pcounter_users` (
  `user_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_time` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pcounter_users`
--

INSERT INTO `pcounter_users` (`user_ip`, `user_time`) VALUES
('837ec5754f503cfaaee0929fd48974e7', 1453089273);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'member', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `usercreate` tinyint(4) NOT NULL,
  `datecreate` datetime DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `title`, `alias`, `image`, `caption`, `usercreate`, `datecreate`, `lastupdate`) VALUES
(1, NULL, NULL, 'flower.jpg', 'Trung tâm tin học Sa Đéc', 1, '2016-01-17 23:06:02', '2016-01-18 09:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datecreate` datetime DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `password`, `fullname`, `firstname`, `lastname`, `avatar`, `phone`, `email`, `datecreate`, `lastupdate`, `note`) VALUES
(1, 1, 'vuhnt', '74ba00b2e2918534bcbd5aec2ab8bd70d9110d0c8e5c7a16a7cde00606da684dd07abdf3c8e26856cc7410ca14e243892fb58dc37e916a367187d08f3a9792c2', 'Huỳnh Ngô Thanh Vũ', 'Vũ', 'Huỳnh', '', 939897075, 'vudt88@gmail.com', '2016-01-06 22:28:35', '2016-01-10 22:42:07', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linksite`
--
ALTER TABLE `linksite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `pcounter_save`
--
ALTER TABLE `pcounter_save`
  ADD PRIMARY KEY (`save_name`);

--
-- Indexes for table `pcounter_users`
--
ALTER TABLE `pcounter_users`
  ADD PRIMARY KEY (`user_ip`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`itemname`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `linksite`
--
ALTER TABLE `linksite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
