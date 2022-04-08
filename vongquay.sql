-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 07, 2022 lúc 06:30 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vongquay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vongquay`
--

CREATE TABLE `vongquay` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vongquay`
--

INSERT INTO `vongquay` (`id`, `name`, `count`, `total`, `url`) VALUES
(1, 'Voucher chăm sóc nha chu', 100, 300, 'media/images/cham-soc-nha-chu.png'),
(2, 'Voucher chăm sóc da', 80, 13, 'media/images/cham-soc-da.png'),
(5, 'Vali du lịch', 50, 14, 'media/images/Vali.png'),
(6, 'Máy lọc không khí', 5, 1, 'media/images/may-loc-khong-khi.png'),
(8, 'Voucher Phun xăm -50%', 30, 6, 'media/images/phun-xam.png'),
(9, 'Vé lột xác -100%', 1, 1, 'media/images/lot-xac.png'),
(10, 'Mất lượt', 3, 1, 'media/images/chia-buon.png'),
(11, 'Giảm 60% gói extra', 100, 21, 'media/images/extra.png'),
(12, 'Voucher 100.000Đ', 100, 90, 'media/images/100k.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `vongquay`
--
ALTER TABLE `vongquay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `vongquay`
--
ALTER TABLE `vongquay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
