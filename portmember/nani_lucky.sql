-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07 ส.ค. 2019  10:18น.
-- Server version: 10.1.40-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.0.33-4+bionic

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nani_lucky`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bgimg` varchar(255) NOT NULL,
  `Keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `config`
--

INSERT INTO `config` (`id`, `name`, `bgimg`, `Keyword`) VALUES
(1, 'NaniLucky', 's', 'd');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `ip_logs`
--

CREATE TABLE `ip_logs` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- โครงสร้างตาราง `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `items`
--

INSERT INTO `items` (`id`, `image`, `name`, `price`, `file`, `info`) VALUES
(1, 'https://thestandard.co/wp-content/uploads/2019/06/Minecraft.jpg', 'ID แท้มายคราฟ', '40', 'test.txt', '<li><strong>NFA</strong> 90%</li>\r\n<li><strong>SFA</strong> 10%</li>'),
(2, 'https://filmschoolrejects.com/wp-content/uploads/2017/09/netflix-logo.jpg', 'Netfix', '45', 'netflix.txt', '<li><strong>Netflix</strong> Random</li> <li><strong>22/7/2562</strong></li>'),
(3, 'https://www.beartai.com/wp-content/uploads/2016/09/g_-_-x-_-_-_65378x20150807115725_0.png', 'Pornhub Premium', '45', 'pornhub.txt', '<li><strong>Pornhub</strong> Premium</li> <li><strong>22/7/2562</strong></li>'),
(4, 'https://www.metalsucks.net/wp-content/uploads/2017/12/spotify.png', 'Spotify', '40', 'spot.txt', '<li><strong>Spotify</strong> Premium</li> <li><strong>22/7/2562</strong></li>'),
(5, 'https://ksassets.timeincuk.net/wp/uploads/sites/54/2018/06/NordVPN-920x506.jpg', 'NordVPN', '45', 'NordVPN.txt', '<li><strong>NordVPN</strong> Premium</li> <li><strong>23/7/2562</strong></li>'),
(6, 'https://1000logos.net/wp-content/uploads/2018/12/xHamster-Logo.png', 'xhamster', '30', 'xhamster.txt', '<li><strong>xhamster</strong> Premium</li> <li><strong>23/7/2562</strong></li>');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info1` varchar(255) NOT NULL,
  `info2` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- โครงสร้างตาราง `ref`
--

CREATE TABLE `ref` (
  `id` int(11) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL,
  `btn` int(11) NOT NULL,
  `createby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `ref`
--

INSERT INTO `ref` (`id`, `ref`, `url`, `point`, `btn`, `createby`) VALUES
(1, 'CfUbdaTKiBRpSbvDdtpPi8oVw3H6fT', 'https://oko.sh/7vLfNG8', '5', 1, ''),
(2, 'oEGstNS55qPQL7aImhjeteKqQVqJlS', 'https://oko.sh/xQmg2', '5', 2, ''),
(3, 'jKKvEKsTV2smVA5txvyOM4pGOTyCqe', 'https://clk.ink/hY4hndBn', '5', 3, ''),
(4, 'wTsFeLSgHz7iRuTIkIQUJ4KJNYyyKx', 'https://oko.sh/BPWsrrhx', '5', 4, ''),
(5, 'RW7lWR6nvxQAOaIdCukirkD4VGSKbi', 'https://clk.ink/KZO0D', '5', 5, ''),
(6, 'J4LlhtGpkYul4m8ZHi8kCQEiL9ipYd', 'https://oko.sh/AgID', '5', 6, ''),
(7, 'JqrFnQTRtnIbJWZonP4vwGfe5NAYgS', 'https://clk.ink/qg3fi', '5', 7, ''),
(8, 'WdIerDW6TXDm0Dmph2Yo2iNphdhxlt', 'https://oko.sh/HKODB', '5', 8, ''),
(9, 'GL8FefgUmiEKrDQLbTwBVaDzVTUsHA', 'https://oko.sh/kCfVRkD', '5', 9, '');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nn` double(64,2) NOT NULL DEFAULT '0.00',
  `btn1` varchar(255) NOT NULL,
  `btn2` varchar(255) NOT NULL,
  `btn3` varchar(255) NOT NULL,
  `btn4` varchar(255) NOT NULL,
  `btn5` varchar(255) NOT NULL,
  `btn6` varchar(255) NOT NULL,
  `btn7` varchar(255) NOT NULL,
  `btn8` varchar(255) NOT NULL,
  `btn9` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- โครงสร้างตาราง `vip`
--

CREATE TABLE `vip` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `info` varchar(1200) NOT NULL,
  `point` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `vip`
--

INSERT INTO `vip` (`id`, `name`, `price`, `info`, `point`) VALUES
(1, 'NEW VIP', '50', '<h4><span class=\"feature\">ซื้อสินค้าพิเศษ</span> : <span class=\"value\">ไม่ได้</span></h4>\r\n<h4><span class=\"feature\">คูณแต้ม</span> : <span class=\"value\">1.5x</span></h4>\r\n<h4><span class=\"feature\">จำนวนวัน</span> : <span class=\"value\">30 วัน</span></h4>', '1.5'),
(2, 'SUPER VIP', '90', '<div class=\"ribbon\">ยอดนิยม</div><h4><span class=\"feature\">ซื้อสินค้าพิเศษ</span> : <span class=\"value\">ได้</span></h4>\r\n<h4><span class=\"feature\">คูณแต้ม</span> : <span class=\"value\">2x</span></h4>\r\n<h4><span class=\"feature\">จำนวนวัน</span> : <span class=\"value\">30 วัน</span></h4>', '2'),
(3, 'ULTRA VIP', '150', '<h4><span class=\"feature\">ซื้อสินค้าพิเศษ</span> : <span class=\"value\">ได้</span></h4>\r\n<h4><span class=\"feature\">คูณแต้ม</span> : <span class=\"value\">3.5x</span></h4>\r\n<h4><span class=\"feature\">จำนวนวัน</span> : <span class=\"value\">30 วัน</span></h4>', '3.5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_logs`
--
ALTER TABLE `ip_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref`
--
ALTER TABLE `ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vip`
--
ALTER TABLE `vip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ip_logs`
--
ALTER TABLE `ip_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=510;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `ref`
--
ALTER TABLE `ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
