-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2023 lúc 03:13 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_pet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `TenDayDu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `TenNguoiDung` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(100) NOT NULL,
  `NgayCapNhat` timestamp NULL DEFAULT current_timestamp(),
  `IDNguoiDung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `TenDayDu`, `AdminEmail`, `TenNguoiDung`, `Password`, `NgayCapNhat`, `IDNguoiDung`) VALUES
(1, 'trung', 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', '2023-03-10 06:03:56', '01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanphamdaban`
--

CREATE TABLE `chitietsanphamdaban` (
  `id` int(11) NOT NULL,
  `IdSP` int(11) DEFAULT NULL,
  `IDNguoiDung` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayPhatHanh` timestamp NULL DEFAULT current_timestamp(),
  `NgayTroLai` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunTrangThai` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL,
  `SoLuong` int(100) DEFAULT NULL,
  `Gia` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int(11) NOT NULL,
  `TenSach` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `IDTacGia` int(11) DEFAULT NULL,
  `MaSach` varchar(25) DEFAULT NULL,
  `GiaSach` decimal(10,3) DEFAULT NULL,
  `HinhSach` varchar(250) NOT NULL,
  `DuocPhatHanh` int(1) DEFAULT NULL,
  `NgayDangKi` timestamp NULL DEFAULT current_timestamp(),
  `NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `MoTa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SoLuong` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duyetdon`
--

CREATE TABLE `duyetdon` (
  `id` int(11) NOT NULL,
  `idSP` int(11) DEFAULT NULL,
  `idnguoidung` varchar(120) DEFAULT NULL,
  `NgayDat` timestamp NULL DEFAULT current_timestamp(),
  `trangthaimua` int(1) DEFAULT NULL,
  `NgayTroLai` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `fine` int(11) DEFAULT NULL,
  `trangthai` int(1) DEFAULT NULL,
  `HinhSP` varchar(255) DEFAULT NULL,
  `SoLuong` int(100) DEFAULT NULL,
  `Gia` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `duyetdon`
--

INSERT INTO `duyetdon` (`id`, `idSP`, `idnguoidung`, `NgayDat`, `trangthaimua`, `NgayTroLai`, `fine`, `trangthai`, `HinhSP`, `SoLuong`, `Gia`) VALUES
(185, 48, 'SID015', '2023-06-12 08:59:59', NULL, '2023-06-13 04:30:35', NULL, 1, '79ab822c1f344c5a082109d77a30e41f.jpg', 1, '150.000'),
(186, 48, 'SID015', '2023-06-13 04:32:15', NULL, NULL, NULL, 3, '79ab822c1f344c5a082109d77a30e41f.jpg', 1, '150.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `IDNguoiDung` varchar(100) DEFAULT NULL,
  `TenDayDu` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `SoDienThoai` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `TrangThai` int(1) DEFAULT NULL,
  `NgayDangKi` timestamp NULL DEFAULT current_timestamp(),
  `NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `IDNguoiDung`, `TenDayDu`, `EmailId`, `SoDienThoai`, `Password`, `TrangThai`, `NgayDangKi`, `NgayCapNhat`, `diachi`) VALUES
(12, 'SID015', 'trung', 'trung@dz.vn', '0385746657', '202cb962ac59075b964b07152d234b70', 1, '2023-03-19 14:14:59', '2023-06-01 07:29:59', 'Hạ Long-Quảng Ninh'),
(13, 'SID016', 'Người dùng', 'nguoidung@test.com', '0989889898', '202cb962ac59075b964b07152d234b70', 1, '2023-03-30 07:23:08', NULL, NULL),
(14, 'SID021', 'vjppro', 'vjp@dz.vn', '0903493434', '202cb962ac59075b964b07152d234b70', 1, '2023-05-31 16:48:33', NULL, 'HN'),
(16, 'SID023', 'trung1111', 't@dz.vn', '023231111', '202cb962ac59075b964b07152d234b70', 1, '2023-05-31 16:59:34', '2023-06-05 06:33:32', 'HN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloai`
--

CREATE TABLE `phanloai` (
  `id` int(11) NOT NULL,
  `TenPhanLoai` varchar(159) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT current_timestamp(),
  `NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `phanloai`
--

INSERT INTO `phanloai` (`id`, `TenPhanLoai`, `NgayTao`, `NgayCapNhat`) VALUES
(24, 'Thú cưng', '2023-05-01 06:48:18', '2023-05-17 17:44:02'),
(25, 'Chăm sóc', '2023-05-12 10:45:51', NULL),
(27, 'Vật dụng', '2023-05-12 10:56:39', NULL),
(29, 'Thức ăn', '2023-06-12 07:09:25', NULL),
(30, 'Quần áo', '2023-06-12 07:09:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `TenSP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `IDPhanLoai` int(11) DEFAULT NULL,
  `MaSP` varchar(25) DEFAULT NULL,
  `GiaSP` decimal(10,3) DEFAULT NULL,
  `HinhSP` varchar(250) NOT NULL,
  `DuocPhatHanh` int(1) DEFAULT NULL,
  `NgayDangKi` timestamp NULL DEFAULT current_timestamp(),
  `NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `MoTa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SoLuong` int(100) DEFAULT NULL,
  `theloai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Noibat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `TenSP`, `CatId`, `IDPhanLoai`, `MaSP`, `GiaSP`, `HinhSP`, `DuocPhatHanh`, `NgayDangKi`, `NgayCapNhat`, `MoTa`, `SoLuong`, `theloai`, `Noibat`) VALUES
(48, 'Thức ăn kitcat cho mèo', 13, 29, 'TA01', '150.000', '79ab822c1f344c5a082109d77a30e41f.jpg', NULL, '2023-06-12 07:29:56', '2023-06-12 07:38:24', 'Thức ăn kitcat cho mèo', 1, 'Thú cưng', 1),
(49, 'Gói thức ăn whiskas ', 13, 29, 'TA02', '120.000', '663fdedfb23fdeb70e21263fa758db34.jpg', NULL, '2023-06-12 07:40:54', '2023-06-12 08:29:53', 'Gói thức ăn whiskas dành cho mèo', 1, 'Thú cưng', 2),
(50, 'Gói thức ăn minino', 13, 29, 'TA03', '120.000', 'f400185240a89f0bcaab7895d8e9d5ea.jpg', NULL, '2023-06-12 07:42:36', '2023-06-12 08:31:27', 'Gói thức ăn minino dành cho mèo', 1, 'Thú cưng', 2),
(51, 'Thức ăn cho cún lớn', 13, 24, 'TA04', '200.000', '40a91e395597c2710618ea482590915b.jpg', NULL, '2023-06-12 07:43:24', '2023-06-12 08:31:32', 'Thức ăn cho cún lớn', 1, 'Thú cưng', 2),
(52, 'Thức ăn hạt cho cún', 13, 29, 'TA05', '150.000', 'f25fac11f2e550038ae5ef0a1699e42d.jpg', NULL, '2023-06-12 07:44:53', '2023-06-12 08:31:36', 'Thức ăn cho cún cỡ vừa', 1, 'Thú cưng', 2),
(55, 'Gói thức ăn cho cún con', 13, 29, 'TA06', '220.000', 'cf663bf71869fe1f872ffbea35a00163.jpg', NULL, '2023-06-12 07:54:56', '2023-06-12 08:31:45', 'Gói thức ăn cho cún con', 1, 'Thú cưng', 2),
(56, 'Bát ăn ', 14, 27, 'VD01', '50.000', '92adc60916ed53cfae0f44448c9fbbe5jpeg', NULL, '2023-06-12 07:58:54', '2023-06-12 08:33:46', 'Bát ăn  cho thú cưng', 1, 'Thú cưng', 1),
(57, 'Đồ chơi ', 14, 27, 'VD02', '50.000', 'b44024da4d4b5abf05e4b0dd88ad07db.jpg', NULL, '2023-06-12 08:00:01', '2023-06-12 08:31:54', 'Đồ chơi vui nhộn', 1, 'Thú cưng', 3),
(58, 'Thẻ tên', 14, 27, 'VD03', '35.000', 'b0079d999cdc7321a58f2600309d7924.jpg', NULL, '2023-06-12 08:01:22', '2023-06-12 08:31:56', 'Thẻ tên', 1, 'Thú cưng', 3),
(60, 'Balo trong phi hành gia', 14, 27, 'VD05', '300.000', '56ba949cd4ea111eba43f6dbfc942f26.jpg', NULL, '2023-06-12 08:11:31', '2023-06-12 08:32:00', 'Balo trong phi hành gia', 1, 'Thú cưng', 3),
(63, 'Chuồng cho mèo', 14, 27, 'VD06', '270.000', '4312cd829de723db984e4213720620aa.jpg', NULL, '2023-06-12 08:35:11', '2023-06-12 08:35:27', 'Chuồng ghép cho mèo', 1, 'Quần áo', 3),
(64, 'Áo quần ngầu lòi', 19, 30, 'QA01', '450.000', 'c3febfa00a7825610dd50947c76edd9c.png', NULL, '2023-06-12 08:37:16', '2023-06-12 08:41:12', 'Áo quần cosplay siêu ngầu lòi :))', 1, 'Quần áo', 4),
(65, 'Áo quần ngàu lòi', 19, 30, 'QA02', '450.000', 'c8e434c669d49b233b49adfaf53436a0.jpg', NULL, '2023-06-12 08:38:15', '2023-06-12 08:41:14', 'Áo quần cosplay siêu ngàu lòi ', 1, 'Quần áo', 4),
(66, 'Áo quần ngàu lòi ', 19, 30, 'QA03', '450.000', '19f5ac5983e0a10332d9c9c09cbf2847.jpg', NULL, '2023-06-12 08:42:47', '2023-06-12 08:43:33', 'Áo quần cosplay siêu ngàu lòi ', 1, 'Quần áo', 4),
(68, 'Áo quần  ngàu lòi ', 19, 30, 'QA04', '450.000', '518aa6eb27df5aa51e5827f882b1ea34.jpg', NULL, '2023-06-12 08:44:57', '2023-06-12 08:45:03', 'Áo quần cosplay siêu ngàu lòi ', 1, 'Quần áo', 4),
(74, 'CORGI đẹp trai', 17, 24, 'TC01', '2500.000', 'e0cbd4959085348dc47e231ebcc0c018.jpg', NULL, '2023-06-12 09:13:53', '2023-06-12 09:46:28', 'CORGI đẹp trai', 1, 'Quần áo', 1),
(78, 'Mèo tai cụp', 17, 24, 'TC03', '3000.000', '9f563959af689aa6ea845df30acf5964.jpg', NULL, '2023-06-12 09:19:30', '2023-06-12 09:20:01', 'Mèo chân lùn', 1, 'Quần áo', NULL),
(81, 'Mèo xám tai cụp', 17, 24, 'TC04', '2999.000', 'd91fbf9f7042263c29000d2d019b8988.jpg', NULL, '2023-06-12 09:26:29', NULL, 'Mèo xám tai cụp', 1, 'Quần áo', NULL),
(82, 'Mèo chân lùn xám tai cụp', 17, 24, 'TC05', '2599.000', '67afbfb6d33a1b364a8c94ac6043a58b.jpg', NULL, '2023-06-12 09:28:16', '2023-06-12 09:46:33', 'Mèo chân lùn xám tai cụp', 1, 'Quần áo', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(11) NOT NULL,
  `TenTheLoai` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrangThai` int(1) DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT current_timestamp(),
  `NgayCapNhat` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `TenTheLoai`, `TrangThai`, `NgayTao`, `NgayCapNhat`) VALUES
(13, 'Thức ăn', 1, '2023-03-29 07:26:47', '2023-05-01 06:39:11'),
(14, 'Phụ kiện', 1, '2023-03-29 07:32:08', '2023-05-12 10:59:51'),
(16, 'Dịch vụ', 1, '2023-05-12 09:57:33', '2023-05-12 09:57:33'),
(17, 'Thú cưng', 1, '2023-05-19 00:51:32', '2023-05-19 00:51:32'),
(19, 'Quần áo', 1, '2023-06-12 08:16:35', '2023-06-12 08:17:22');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietsanphamdaban`
--
ALTER TABLE `chitietsanphamdaban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `duyetdon`
--
ALTER TABLE `duyetdon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IDNguoiDung` (`IDNguoiDung`);

--
-- Chỉ mục cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chitietsanphamdaban`
--
ALTER TABLE `chitietsanphamdaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `duyetdon`
--
ALTER TABLE `duyetdon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
