-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2023 lúc 08:57 AM
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
-- Cơ sở dữ liệu: `testsp`
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
  `NgayCapNhat` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `TenDayDu`, `AdminEmail`, `TenNguoiDung`, `Password`, `NgayCapNhat`) VALUES
(1, 'trung', 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', '2023-03-10 06:03:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsachdaphathanh`
--

CREATE TABLE `chitietsachdaphathanh` (
  `id` int(11) NOT NULL,
  `IdSach` int(11) DEFAULT NULL,
  `IDNguoiDung` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayPhatHanh` timestamp NULL DEFAULT current_timestamp(),
  `NgayTroLai` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunTrangThai` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsachdaphathanh`
--

INSERT INTO `chitietsachdaphathanh` (`id`, `IdSach`, `IDNguoiDung`, `NgayPhatHanh`, `NgayTroLai`, `RetrunTrangThai`, `fine`) VALUES
(31, 15, 'SID015', '2023-03-29 07:56:12', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duyetmuonsach`
--

CREATE TABLE `duyetmuonsach` (
  `id` int(11) NOT NULL,
  `idsach` int(11) DEFAULT NULL,
  `idnguoidung` varchar(120) DEFAULT NULL,
  `ngaymuon` timestamp NULL DEFAULT current_timestamp(),
  `trangthaimuon` int(1) DEFAULT NULL,
  `NgayTroLai` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `fine` int(11) DEFAULT NULL,
  `trangthai` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `duyetmuonsach`
--

INSERT INTO `duyetmuonsach` (`id`, `idsach`, `idnguoidung`, `ngaymuon`, `trangthaimuon`, `NgayTroLai`, `fine`, `trangthai`) VALUES
(11, 16, 'SID016', '2023-03-30 07:25:04', NULL, NULL, NULL, NULL);

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
  `NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `IDNguoiDung`, `TenDayDu`, `EmailId`, `SoDienThoai`, `Password`, `TrangThai`, `NgayDangKi`, `NgayCapNhat`) VALUES
(12, 'SID015', 'trung', 'trung@dz.vn', '0385746657', '202cb962ac59075b964b07152d234b70', 1, '2023-03-19 14:14:59', '2023-03-24 21:53:22'),
(13, 'SID016', 'Người dùng', 'nguoidung@test.com', '0989889898', '202cb962ac59075b964b07152d234b70', 1, '2023-03-30 07:23:08', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `id` int(11) NOT NULL,
  `TenSach` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `IDTacGia` int(11) DEFAULT NULL,
  `MaSach` varchar(25) DEFAULT NULL,
  `GiaSach` decimal(10,3) DEFAULT NULL,
  `HinhSach` varchar(250) NOT NULL,
  `DuocPhatHanh` int(1) DEFAULT NULL,
  `NgayDangKi` timestamp NULL DEFAULT current_timestamp(),
  `NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`id`, `TenSach`, `CatId`, `IDTacGia`, `MaSach`, `GiaSach`, `HinhSach`, `DuocPhatHanh`, `NgayDangKi`, `NgayCapNhat`) VALUES
(23, 'Thức ăn cho mèo', 13, 24, '022', '150.000', '60510f0ba9c104f93426d5ad1b1fb5a4.jpg', NULL, '2023-05-01 06:48:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `id` int(11) NOT NULL,
  `TenTacGia` varchar(159) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayTao` timestamp NULL DEFAULT current_timestamp(),
  `NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`id`, `TenTacGia`, `NgayTao`, `NgayCapNhat`) VALUES
(24, 'mèo', '2023-05-01 06:48:18', NULL);

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
(14, 'Vật dụng', 1, '2023-03-29 07:32:08', '2023-05-01 06:39:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietsachdaphathanh`
--
ALTER TABLE `chitietsachdaphathanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `duyetmuonsach`
--
ALTER TABLE `duyetmuonsach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IDNguoiDung` (`IDNguoiDung`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
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
-- AUTO_INCREMENT cho bảng `chitietsachdaphathanh`
--
ALTER TABLE `chitietsachdaphathanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `duyetmuonsach`
--
ALTER TABLE `duyetmuonsach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
