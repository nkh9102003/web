-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2023 at 09:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_giay`
--

-- --------------------------------------------------------

--
-- Table structure for table `ChiTietDH`
--

CREATE TABLE `ChiTietDH` (
  `IdCTDH` int(11) NOT NULL,
  `IdDonHang` int(11) NOT NULL,
  `IdKhoHang` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ChiTietDH`
--

INSERT INTO `ChiTietDH` (`IdCTDH`, `IdDonHang`, `IdKhoHang`, `SoLuong`, `Gia`) VALUES
(17, 11, 11, 3, 10000000),
(18, 12, 15, 1, 10000000),
(19, 12, 20, 4, 10000000),
(20, 13, 23, 3, 10000000),
(21, 14, 37, 3, 2000000),
(22, 15, 24, 2, 10000000),
(23, 15, 29, 3, 2000000),
(24, 16, 38, 3, 2500000),
(25, 17, 10, 3, 3000000),
(26, 18, 8, 2, 10000000),
(27, 18, 36, 2, 1300500),
(28, 18, 12, 1, 10000000),
(29, 19, 4, 1, 1200000),
(30, 19, 30, 1, 2000000),
(31, 20, 13, 2, 10000000),
(32, 21, 25, 1, 10000000),
(33, 21, 34, 1, 1200000),
(34, 22, 20, 1, 10000000),
(35, 23, 29, 2, 2000000),
(36, 24, 8, 2, 10000000),
(37, 25, 14, 2, 3000000),
(38, 26, 17, 1, 10000000),
(39, 26, 38, 2, 2500000),
(40, 27, 16, 1, 10000000),
(41, 28, 33, 2, 1200000),
(42, 29, 28, 2, 1200000),
(43, 30, 25, 1, 10000000),
(44, 31, 29, 2, 2000000),
(45, 31, 38, 3, 2500000),
(46, 32, 19, 2, 10000000),
(47, 33, 12, 2, 10000000),
(48, 34, 7, 2, 10000000),
(49, 35, 4, 1, 1200000),
(50, 36, 2, 3, 10000000),
(51, 37, 17, 3, 10000000),
(52, 38, 29, 4, 2000000),
(53, 39, 28, 3, 1200000),
(54, 40, 9, 1, 10000000),
(55, 40, 37, 2, 2000000),
(56, 40, 35, 3, 1300500),
(57, 40, 38, 1, 2500000),
(58, 41, 24, 1, 10000000),
(59, 42, 38, 2, 2500000),
(60, 43, 3, 1, 1200000),
(61, 43, 10, 2, 3500000);

-- --------------------------------------------------------

--
-- Table structure for table `DanhGia`
--

CREATE TABLE `DanhGia` (
  `IdDanhGia` int(11) NOT NULL,
  `IdNguoiDung` int(11) NOT NULL,
  `IdSP` int(11) NOT NULL,
  `DanhGia` text NOT NULL,
  `NgayDanhGia` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `DanhGia`
--

INSERT INTO `DanhGia` (`IdDanhGia`, `IdNguoiDung`, `IdSP`, `DanhGia`, `NgayDanhGia`) VALUES
(11, 15, 14, 'Giay nay rat tot', '2023-12-08'),
(12, 7, 31, 'How do shoes talk? They converse', '2023-12-08'),
(13, 13, 14, 'How do shoes talk? They converse', '2023-12-19'),
(14, 29, 14, 'giay sieu ben\n', '2023-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `DonHang`
--

CREATE TABLE `DonHang` (
  `IdDonHang` int(11) NOT NULL,
  `IdNguoiDung` int(11) NOT NULL,
  `TenNguoiNhan` varchar(255) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `PhuongThucTT` varchar(50) NOT NULL,
  `TrangThaiTT` int(11) NOT NULL DEFAULT 0,
  `TrangThaiDH` int(11) NOT NULL DEFAULT 0,
  `NgayDat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `DonHang`
--

INSERT INTO `DonHang` (`IdDonHang`, `IdNguoiDung`, `TenNguoiNhan`, `SDT`, `DiaChi`, `PhuongThucTT`, `TrangThaiTT`, `TrangThaiDH`, `NgayDat`) VALUES
(11, 13, 'ohlala', '123231', '123', 'Tiền mặt', 1, 1, '2023-11-30'),
(12, 13, 'Hoang', '123412313', 'super', 'Thẻ tín dụng', 1, 1, '2023-12-03'),
(13, 13, 'Hoang Nguyen', '1232113', 'Ha Noi', 'Tiền mặt', 1, 1, '2023-10-04'),
(14, 16, 'Ngo Huong', '21323123', '123 Thanh Xuan', 'Tiền mặt', 0, 0, '2022-11-07'),
(15, 13, 'Khac Hoang', '036842774', 'Hoài Đức - Hà Nội', 'Tiền mặt', 1, 1, '2023-08-08'),
(16, 17, 'Ngo Xuan Huong', '093283223', 'Cat ngoi', 'Tiền mặt', 1, 1, '2022-12-08'),
(17, 13, 'Hoang', '0332313', 'Cat ngoi', 'Tiền mặt', 1, 1, '2023-01-08'),
(18, 18, 'Pheo Van Chi', '098432932', 'lang Vu Dai', 'Tiền mặt', 1, 1, '2023-03-17'),
(19, 18, 'Nguyen Van A', '0948332122', 'abc abc', 'Tiền mặt', 1, 1, '2023-08-17'),
(20, 20, 'Nguyen Khac Hoang', '094823232', 'thon Cat Ngoi, Xa Cat Que, Hoai Duc, Ha Noi', 'Tiền mặt', 1, 1, '2023-10-18'),
(21, 20, 'Nguyen Hoang', '023923232', 'Cat ngoi', 'Tiền mặt', 1, 1, '2023-09-18'),
(22, 21, 'Ngo Xuan Huong', '032329242', 'Thanh Xuan', 'Tiền mặt', 1, 1, '2023-09-18'),
(23, 21, 'Ngo Xuan Lac', '048239242', 'Cau Giay', 'Tiền mặt', 1, 1, '2023-06-18'),
(24, 22, 'Nguyen Khac Baki', '093248232', 'Here', 'Tiền mặt', 1, 1, '2023-08-18'),
(25, 22, 'Nguyen Van Baki', '02394823', 'There', 'Tiền mặt', 1, 1, '2023-02-18'),
(26, 23, 'Nguyen Khac Tokita', '0282832312', 'Anywhere', 'Tiền mặt', 1, 1, '2023-07-18'),
(27, 23, 'Tokita Nguyen', '034834234', 'The house 123', 'Tiền mặt', 1, 1, '2023-05-18'),
(28, 24, 'Clark Hoang', '09322323', 'Thanh pho toi loi', 'Tiền mặt', 1, 1, '2023-03-18'),
(29, 24, 'Hoang Kent', '02823232', 'Gotham city', 'Tiền mặt', 1, 1, '2023-06-18'),
(30, 25, 'Kal Nguyen Khac', '02484232', 'Hanh tinh Krypton', 'Tiền mặt', 1, 1, '2023-05-18'),
(31, 25, 'Hoang El', '03843423', 'Hanh tinh Krypton', 'Tiền mặt', 1, 1, '2023-04-18'),
(32, 27, 'Ba Kien', '08232323', 'Dau cung dc', 'Tiền mặt', 1, 1, '2023-12-18'),
(33, 27, 'Lai la cu Ba day', '0833232', 'nha cu Ba', 'Tiền mặt', 1, 1, '2023-12-17'),
(34, 27, 'Ly Truong', '028327723', 'nha Ly truong', 'Tiền mặt', 1, 1, '2023-12-13'),
(35, 27, 'Ly truong', '0923824424', 'Ha Noi', 'Tiền mặt', 1, 1, '2023-12-14'),
(36, 14, 'Nguyen Van A', '02398423', 'abc abc', 'Tiền mặt', 1, 1, '2023-12-15'),
(37, 14, 'Ngo Xuan Huong', '028724232', 'Ha Noi', 'Tiền mặt', 1, 1, '2023-12-16'),
(38, 14, 'Hoang', '0367403997', 'Cat ngoi', 'Tiền mặt', 1, 1, '2023-12-05'),
(39, 14, 'Hoang', '048334341', 'Ha Noi', 'Tiền mặt', 1, 1, '2023-12-19'),
(40, 13, 'Pheo Van Chi', '023241323', 'Cat Nogi', 'Tiền mặt', 1, 1, '2023-12-19'),
(41, 18, 'Hoang', '0367403997', 'Cat ngoi', 'Tiền mặt', 1, 1, '2023-12-14'),
(42, 14, 'Ngo Xuan Huong', '0367403997', 'Cat ngoi', 'Tiền mặt', 1, 1, '2023-12-20'),
(43, 7, 'Hoang', '1321312', '12313', 'Tiền mặt', 1, 1, '2023-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `GioHang`
--

CREATE TABLE `GioHang` (
  `IdGioHang` int(11) NOT NULL,
  `IdNguoiDung` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `IdKhoHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `KhoHang`
--

CREATE TABLE `KhoHang` (
  `IdKhoHang` int(11) NOT NULL,
  `IdSP` int(11) NOT NULL,
  `TruLuong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `Size` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KhoHang`
--

INSERT INTO `KhoHang` (`IdKhoHang`, `IdSP`, `TruLuong`, `Gia`, `Size`) VALUES
(2, 26, 9, 10000000, 41),
(3, 33, 34, 1200000, 39),
(4, 33, 32, 1200000, 37),
(5, 33, 26, 1200000, 40),
(6, 30, 24, 10000000, 42),
(7, 30, 23, 10000000, 35),
(8, 30, 19, 10000000, 37),
(9, 30, 20, 10000000, 39),
(10, 34, 9, 3500000, 35),
(11, 34, 12, 3500000, 41),
(12, 32, 14, 10000000, 38),
(13, 32, 36, 10000000, 36),
(14, 34, 28, 3500000, 37),
(15, 27, 31, 3000000, 41),
(16, 27, 23, 3000000, 42),
(17, 28, 23, 10000000, 38),
(18, 29, 33, 10000000, 35),
(19, 29, 20, 10000000, 38),
(20, 29, 15, 10000000, 41),
(23, 17, 1, 10000000, 42),
(24, 18, 20, 10000000, 40),
(25, 18, 15, 10000000, 39),
(28, 33, 13, 1200000, 33),
(29, 31, 16, 2000000, 35),
(30, 31, 18, 2000000, 32),
(31, 25, 30, 1230000, 34),
(32, 25, 23, 1230000, 36),
(33, 16, 30, 1200000, 34),
(34, 16, 21, 1200000, 33),
(35, 15, 30, 1300500, 33),
(36, 15, 32, 1300500, 35),
(37, 14, 27, 2000000, 34),
(38, 13, 21, 2500000, 35);

-- --------------------------------------------------------

--
-- Table structure for table `NguoiDung`
--

CREATE TABLE `NguoiDung` (
  `IdNguoiDung` int(11) NOT NULL,
  `TenTK` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `QuyenQuanTri` int(11) NOT NULL DEFAULT 0,
  `SDT` varchar(10) NOT NULL,
  `DiaChi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `NguoiDung`
--

INSERT INTO `NguoiDung` (`IdNguoiDung`, `TenTK`, `Email`, `MatKhau`, `QuyenQuanTri`, `SDT`, `DiaChi`) VALUES
(6, 'nkh', 'hkn3002019@gmail.com', 'shoes', 1, '1232311', 'Cat Ngoi'),
(7, 'customer2', 'customer2@gmail.com', 'shoes', 0, '213123', 'abcbcc'),
(13, 'customer1', 'customer1@gmail.com', 'shoes', 0, '213123', '12331 abc'),
(14, 'customer3', 'customer3@gmail.com', 'shoes', 0, '300239012', 'Ha tay'),
(15, 'nxh', 'nxh@gmail.com', 'shoes', 0, '093823138', 'Vinh Phuc'),
(16, 'customer4', 'customer4@gmail.com', 'shoes', 0, '08327321', 'Viet Nam'),
(17, 'customer6', 'customer6@gmail.com', 'shoes', 0, '0092323132', 'Ha Noi'),
(18, 'customer7', 'customer7@gmail.com', 'shoes', 0, '032948284', 'Ha Noi'),
(19, 'customer5', 'customer5@gmail.com', 'shoes', 0, '0238842323', 'Address 5'),
(20, 'hoang', 'hoang@gmail.com', 'shoes', 0, '037568403', 'thon Cat Ngoi, Xa Cat Que, Hoai Duc, Ha Noi'),
(21, 'huong', 'huong@gmail.com', 'shoes', 0, '085734833', 'Vinh Phuc que toi'),
(22, 'bakihanma', 'bakihanma@gmail.com', 'shoes', 0, '0388238232', 'Tokyo'),
(23, 'tokitaohma', 'tokitaohma@gmail.com', 'shoes', 0, '0548433822', 'Japan'),
(24, 'clarkkent', 'clarkkent@gmail.com', 'shoes', 0, '085573232', 'Gotham city'),
(25, 'kalel', 'kalel@gmail.com', 'shoes', 0, '0873443232', 'Crypton'),
(26, 'chipheo', 'pheovanchi@gmail.com', 'shoes', 0, '0847342233', 'lang Vu Dai'),
(27, 'bakien', 'bakien@gmail.com', 'shoes', 0, '084377423', 'lang Vu Dai'),
(28, 'customer10', 'customer10@gmail.com', 'shoes', 0, '039241123', 'Cat ngoi'),
(29, 'tenmoi', 'tenmoi@gmail.com', 'shoes', 0, '0367403997', 'lang Vu Dai');

-- --------------------------------------------------------

--
-- Table structure for table `SanPham`
--

CREATE TABLE `SanPham` (
  `IdSP` int(11) NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `AnhSP` varchar(255) NOT NULL,
  `Gia` int(11) NOT NULL,
  `IdThuongHieu` int(11) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SanPham`
--

INSERT INTO `SanPham` (`IdSP`, `TenSP`, `AnhSP`, `Gia`, `IdThuongHieu`, `MoTa`) VALUES
(13, 'Air Jordan 1 Mocha', '755658.jpg', 2500000, 2, 'cung duoc'),
(14, 'Air Jordan 1  Retro High Shadow', '856292.webp', 2000000, 2, 'binh thuong '),
(15, 'Air Jordan 4 Black Cat', '393118.jpg', 1300500, 2, 'tam trung'),
(16, 'Air Jordan 1 University Blue	', '252489.jpg', 1200000, 2, 'giay co cao'),
(17, 'Air Jordan 4 Oreo', 'img01 (5).webp', 6000000, 2, 'Giay sieu xin'),
(18, 'Air Jordan 1 Electro Orange	', 'aj1.webp', 10000000, 2, 'giay cho nguoi giau'),
(25, 'New Balance 530 Silver Line', 'new balance 530 silver line.jpg', 6500000, 8, 'Giay chat'),
(26, 'Air Force 1 Triple White', 'Nike-Air-Force-1-Low-Triple-White.jpg', 2000000, 1, 'giay xin'),
(27, 'New Balance Aime Leon Dore White Green', 'new balance 550 aime leon dore white green.jpg', 3000000, 8, 'giay sieu chat'),
(28, 'New Balance 990 Grey', 'new balance 990 grey.jpg', 10000000, 8, 'giay ngon'),
(29, 'Air Force 1 Travis Scott Edition', 'Airforce 1 Travis Scott.jpg', 10000000, 1, 'giay vip'),
(30, 'Vans Sk8 Hi', '224161.jpeg', 10000000, 9, 'giay ngau'),
(31, 'Vans Old Skool', '116166.jpg', 4500000, 9, 'giay sieu ngau'),
(32, 'Converse Run Star Hike ', '928421.jpeg', 10000000, 10, 'giay teu'),
(33, 'Converse High X CDG', '366835.jpg', 1200000, 10, 'giay sieu teu'),
(34, 'Adidas Stan Smith White', '216636.jpg', 3500000, 5, ' giay sang chanh sieu vip abc d giay sang chanh sieu vip abc dgiay sang chanh sieu vip abc dgiay sang chanh sieu vip abc dgiay sang chanh sieu vip abc dgiay sang chanh sieu vip abc dgiay sang chanh sieu vip abc dgiay sang chanh sieu vip abc dgiay sang chanh sieu vip abc dgiay sang chanh sieu vip abc dgiay sang chanh sieu vip abc d');

-- --------------------------------------------------------

--
-- Table structure for table `ThuongHieu`
--

CREATE TABLE `ThuongHieu` (
  `IdThuongHieu` int(11) NOT NULL,
  `ThuongHieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ThuongHieu`
--

INSERT INTO `ThuongHieu` (`IdThuongHieu`, `ThuongHieu`) VALUES
(1, 'Nike'),
(2, 'Air Jordan'),
(5, 'Adidas'),
(8, 'New Balance'),
(9, 'Vans'),
(10, 'Converse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ChiTietDH`
--
ALTER TABLE `ChiTietDH`
  ADD PRIMARY KEY (`IdCTDH`),
  ADD KEY `order_id` (`IdDonHang`),
  ADD KEY `variation_id` (`IdKhoHang`);

--
-- Indexes for table `DanhGia`
--
ALTER TABLE `DanhGia`
  ADD PRIMARY KEY (`IdDanhGia`),
  ADD KEY `user_id` (`IdNguoiDung`),
  ADD KEY `product_id` (`IdSP`);

--
-- Indexes for table `DonHang`
--
ALTER TABLE `DonHang`
  ADD PRIMARY KEY (`IdDonHang`),
  ADD KEY `user_id` (`IdNguoiDung`);

--
-- Indexes for table `GioHang`
--
ALTER TABLE `GioHang`
  ADD PRIMARY KEY (`IdGioHang`),
  ADD UNIQUE KEY `uc_uv` (`IdNguoiDung`,`IdKhoHang`),
  ADD KEY `variation_id` (`IdKhoHang`);

--
-- Indexes for table `KhoHang`
--
ALTER TABLE `KhoHang`
  ADD PRIMARY KEY (`IdKhoHang`),
  ADD KEY `spConstraint` (`IdSP`);

--
-- Indexes for table `NguoiDung`
--
ALTER TABLE `NguoiDung`
  ADD PRIMARY KEY (`IdNguoiDung`);

--
-- Indexes for table `SanPham`
--
ALTER TABLE `SanPham`
  ADD PRIMARY KEY (`IdSP`),
  ADD KEY `category_id` (`IdThuongHieu`);

--
-- Indexes for table `ThuongHieu`
--
ALTER TABLE `ThuongHieu`
  ADD PRIMARY KEY (`IdThuongHieu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ChiTietDH`
--
ALTER TABLE `ChiTietDH`
  MODIFY `IdCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `DanhGia`
--
ALTER TABLE `DanhGia`
  MODIFY `IdDanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `DonHang`
--
ALTER TABLE `DonHang`
  MODIFY `IdDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `GioHang`
--
ALTER TABLE `GioHang`
  MODIFY `IdGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `KhoHang`
--
ALTER TABLE `KhoHang`
  MODIFY `IdKhoHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `NguoiDung`
--
ALTER TABLE `NguoiDung`
  MODIFY `IdNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `SanPham`
--
ALTER TABLE `SanPham`
  MODIFY `IdSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ThuongHieu`
--
ALTER TABLE `ThuongHieu`
  MODIFY `IdThuongHieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ChiTietDH`
--
ALTER TABLE `ChiTietDH`
  ADD CONSTRAINT `chitietdh_ibfk_1` FOREIGN KEY (`IdDonHang`) REFERENCES `DonHang` (`IdDonHang`),
  ADD CONSTRAINT `chitietdh_ibfk_2` FOREIGN KEY (`IdKhoHang`) REFERENCES `KhoHang` (`IdKhoHang`);

--
-- Constraints for table `DanhGia`
--
ALTER TABLE `DanhGia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`IdNguoiDung`) REFERENCES `NguoiDung` (`IdNguoiDung`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`IdSP`) REFERENCES `SanPham` (`IdSP`);

--
-- Constraints for table `DonHang`
--
ALTER TABLE `DonHang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`IdNguoiDung`) REFERENCES `NguoiDung` (`IdNguoiDung`);

--
-- Constraints for table `GioHang`
--
ALTER TABLE `GioHang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`IdNguoiDung`) REFERENCES `NguoiDung` (`IdNguoiDung`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`IdKhoHang`) REFERENCES `KhoHang` (`IdKhoHang`);

--
-- Constraints for table `KhoHang`
--
ALTER TABLE `KhoHang`
  ADD CONSTRAINT `spConstraint` FOREIGN KEY (`IdSP`) REFERENCES `SanPham` (`IdSP`);

--
-- Constraints for table `SanPham`
--
ALTER TABLE `SanPham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IdThuongHieu`) REFERENCES `ThuongHieu` (`IdThuongHieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
