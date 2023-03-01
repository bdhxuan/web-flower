-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2022 lúc 06:13 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietnd`
--

CREATE TABLE `chitietnd` (
  `id_ND` int(11) NOT NULL,
  `TenND` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietnd`
--

INSERT INTO `chitietnd` (`id_ND`, `TenND`, `Email`, `SDT`, `DiaChi`, `MatKhau`) VALUES
(2, 'duong tien', 'tienb1910154@gmail.com', '0392544714', 'phu tan an giang', '$2y$10$h0.VmuVfWJQH25Z6NG1lBuAW5Vt43om23AknV7l5l7WU9onJdpLJS'),
(8, 'tientien', 'tien2k@gmail.com', '0392544712', 'ktx b dhct', '$2y$10$ZGWdzpJSD0hCFT3RToMhaeU8dIhXLn7c1KDTMIjUg5Ur7yrML5aZm'),
(10, 'duong tien', 'tientien@gmail.com', '0392544714', '1234', '$2y$10$Zv6SF3hnuN2s4akuCjAxmu2K5lk.B9AI6HNXX11PGh4V5DnVMz4bi'),
(12, 'admin', 'admin@gmail.com', '0334455669', 'phu tan an giang', '$2y$10$E/ZFCeBa.cwOj74fbBdn6.28/seAAzTFnK.7kajnSmuw/cB7.efAe'),
(13, 'Bùi Dương Hương Xuân', 'xuanbui@gmail.com', '0392544712', 'ktx b dhct', '$2y$10$2RZCkcZtJ5XGk8H4DW6RMOWpgyBFp0QTRwduoDZ7s2gOhCuzZhbiW'),
(14, 'tran van a', 'tva@gmail.com', '0392544745', '34a, mậu thận, ninh kiều,tpct', '$2y$10$lT18JgHJ9Oua4Et0UctmTetz9FOpyJUGMP6fRmrgln/fk8TtDqkpy'),
(17, 'Nguyễn Thị Bông', 'bong@gmail.com', '0356020057', 'c915, ktxb, ninh kieu, tpct', '$2y$10$YOsf2IC3baSBc8lKngP0Ku0IUl7YM0WMQUjpcOdXJ6rv7x2Gu76uW');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `idcv` int(50) NOT NULL,
  `TenCV` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`idcv`, `TenCV`) VALUES
(1, 'quan ly'),
(2, 'nhan vien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dh_chitiet`
--

CREATE TABLE `dh_chitiet` (
  `id_DH` int(255) NOT NULL,
  `id_SP` int(255) NOT NULL,
  `SoLuong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dh_chitiet`
--

INSERT INTO `dh_chitiet` (`id_DH`, `id_SP`, `SoLuong`) VALUES
(66, 62, '1'),
(66, 74, '2'),
(66, 57, '1'),
(67, 65, '1'),
(68, 63, '2'),
(68, 67, '1'),
(69, 63, '1'),
(70, 72, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_DH` int(255) NOT NULL,
  `id_ND` int(255) NOT NULL,
  `TenND2` varchar(255) NOT NULL,
  `SDT2` varchar(255) NOT NULL,
  `DiaChi2` varchar(255) NOT NULL,
  `LuuY` varchar(255) NOT NULL,
  `LoiChuc` varchar(255) NOT NULL,
  `PTTT` int(10) NOT NULL COMMENT '0.COD, 1.Chuyển Khoản',
  `PTGH` int(10) NOT NULL COMMENT '0. GHN, 1.GHTK',
  `NgayDat` datetime NOT NULL,
  `TTDH` int(10) NOT NULL COMMENT '0.Chờ xác nhận, 1.Đã xác nhận',
  `TTGH` int(10) NOT NULL COMMENT '0.Đang giao hàng, 1.Đã giao hàng',
  `TongTien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_DH`, `id_ND`, `TenND2`, `SDT2`, `DiaChi2`, `LuuY`, `LoiChuc`, `PTTT`, `PTGH`, `NgayDat`, `TTDH`, `TTGH`, `TongTien`) VALUES
(66, 17, 'Nguyễn Thị Bông', '0356020057', 'c915, ktxb, ninh kieu, tpct', '', '', 0, 0, '2022-04-28 21:55:20', 0, 0, '5196000'),
(67, 17, 'tran van hen', '0356020057', 'c915, ktxb, ninh kieu, tpct', '', '', 1, 0, '2022-04-28 21:56:44', 0, 0, '510000'),
(68, 10, 'ngo van tien', '0392544714', '1234', 'cam on', '', 0, 1, '2022-04-28 21:57:44', 0, 0, '1647000'),
(69, 10, 'thanh tam ', '0392544714', '1234', '', 'năm mới thành công mới', 1, 1, '2022-04-28 21:58:06', 1, 0, '549000'),
(70, 2, 'duong tien', '0392544714', 'phu tan an giang', 'tks', 'mần ăn phát đạt', 1, 0, '2022-04-28 21:59:24', 0, 0, '749000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihoa`
--

CREATE TABLE `loaihoa` (
  `idLoai` int(11) NOT NULL,
  `TenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaihoa`
--

INSERT INTO `loaihoa` (`idLoai`, `TenLoai`) VALUES
(1, ' Hoa Cưới'),
(2, ' Hoa Sinh Nhật'),
(3, ' Hoa Chúc Mừng'),
(4, ' Hoa Tốt Nghiệp'),
(5, ' Hoa Khai Trương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_ND` int(11) NOT NULL,
  `id_TT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id_ND`, `id_TT`) VALUES
(26, 10),
(28, 12),
(29, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) NOT NULL,
  `idMaSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GiaGiam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idLoai` int(11) NOT NULL,
  `spMoi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ChiTiet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `idMaSP`, `TenSP`, `SoLuong`, `Gia`, `GiaGiam`, `idLoai`, `spMoi`, `ChiTiet`, `HinhAnh`) VALUES
(56, 'HC01', 'Thanh Xuân', '20', '699000', '0', 1, '0', 'Hoa cẩm tú cầu mang ý nghĩa mưu cầu hạnh phúc, cầu cho người nhận có được cuộc sống luôn vui vẻ, bình an. Có thể thấy nhân nhiều dịp thì loài hoa này được xuất hiện khắp nơi như đám cưới, cầu hôn, sinh nhật, lễ chúc mừng, lễ kỷ niệm,...', 'HC1.jpg'),
(57, 'HC02', ' Hương Nồng Say', '13', '899000', '799000', 1, '0', 'Hoa hồng phấn với tông màu ngọt ngào, dịu dàng của mình không chỉ dùng để bày tỏ những cảm xúc thăng hoa của tình yêu lứa đôi.', 'HC2.jpeg'),
(58, 'HC03', ' Tình Khúc Vàng', '10', '750000', '0', 1, '1', 'Bó hoa mang gam màu pastel đầy trang nhã và duyên dáng với sự kết hợp của nhiều loại hoa tươi như hoa Hồng, Cẩm chướng, Cát tường và Cẩm tú cầu, thích hợp để đồng hành cùng cô dâu phong cách thanh lịch trong ngày trọng đại nhất của mình.', 'HC3.jpeg'),
(59, 'HC04', ' Our Love', '11', '519000', '0', 1, '0', 'Hoa hồng phấn tượng trưng cho tình yêu đầu tiên, cảm động, tình yêu vĩnh cửu và tình yêu ngọt ngào. Màu phấn luôn là màu đại diện của con gái và phù hợp với mối tình đầu của con gái.', 'HC4.png'),
(60, 'HC05', ' My Heart', '50', '649000', '0', 1, '1', 'Hoa hồng màu đỏ tượng trưng cho tình yêu say đắm, lãng mạn nhưng cũng rất mạnh mẽ, bất chấp chông gai để đến với bến bờ hạnh phúc. Đối với mối quan hệ vừa chớm nở, tặng hoa hồng màu đỏ chính là cách khẳng định tình cảm chân thật. Đồng thời, đó cũng chính ', 'HC6.jpeg'),
(61, 'HC06', ' First Love', '22', '600000', '0', 1, '0', 'Với 17 hoa hồng, 5 hoa cẩm chướng, và các loại hoa lá khác nhau mang đến cho bạn bó hoa hồng nhã nhặn, tinh khiết và thanh lịch sẽ tô điểm thêm cho bạn trong ngày trọng đại của mình.', 'HC5.png'),
(62, 'HTN01', ' Sunshine', '55', '499000', '399000', 4, '1', 'Cùng làm người thân yêu và bạn bè bất ngờ với bó hoa Tốt nghiệp vô cùng đáng yêu Sunshine này nha! Với vẻ đẹp xanh mát từ cẩm tú cầu và chú gấu bông xinh xắn, đây chắc chắn là món quà tốt nghiệp rất ý nghĩa đó!', 'HTN1.jpeg'),
(63, 'HTN02', ' Bình Minh', '35', '549000', '0', 4, '0', 'Một chút sự tỏa nắng từ hoa hướng dương hòa thêm một chút thanh thuần của những nhánh hoa baby đã tạo ra một mặt trời nhỏ trong vòng tay của chú gấu bông. Với ý nghĩa \"Hãy cứ tỏa sáng như mặt trời\", Shiny You chính là món quà vô cùng đáng yêu và ý nghĩa d', 'HTN2.jpg'),
(64, 'HTN03', ' Beautiful In White', '10', '550000', '0', 4, '1', 'Với sự kết hợp của 24 bông Hoa Hồng trắng và các loại hoa và lá khác. Beautiful In White là bó hoa sang trọng và thanh khiết với hoa Hồng trắng được gói xinh xắn. Đây sẽ là món quà bất ngờ và hoàn hảo dành tặng người thương, gia đình hoặc bạn bè. ', 'HTN3.jpeg'),
(65, 'HTN04', ' Hừng Đông', '47', '610000', '510000', 4, '0', 'Bó hoa Hừng Đông đem đến cảm giác thanh lịch bằng sự kết hợp giữa các loại hoa tông màu pastel. Đây sẽ là món quà bất ngờ và hoàn hảo dành tặng người thương, gia đình hoặc bạn bè.', 'HTN7.jpeg'),
(66, 'HTN05', ' Nắng Mai', '24', '449000', '0', 4, '0', 'Bày tỏ những cảm xúc khó nói đều trở nên đơn giản hơn rất nhiều với Bó Hoa Nắng Mai mềm mại siêu đáng yêu. Một cái ôm và bó hoa này là tất cả những gì bạn cần.', 'HTN8.jpg'),
(67, 'HTN06', ' Tình Ca Mùa Hạ', '17', '549000', '0', 4, '0', 'Vẻ đẹp thuần khiết và dịu dàng đến từ những nhánh hoa Baby trắng tựa như nàng thơ sẽ là món quà tặng sinh nhật, quà tặng tốt nghiệp,... cực kỳ ý nghĩa. Nếu bạn còn ngại nói lời yêu thương thì hãy để chú gấu bông và bó hoa Tình Ca Mùa Hạ giúp bạn nha!', 'HTN6.jpeg'),
(68, 'HSN01', ' Infinite Love', '15', '749000', '0', 2, '1', 'Với 9 Bông Hoa Tulip Đỏ - Bó hoa Infinite Love mang vẻ đẹp đơn giản nhưng không kém phần nồng nhiệt từ những cành hoa Tulip đỏ chắc chắn sẽ là món quà vô cùng lãng mạn đến những người thân yêu. Cùng khiến cho những khoảnh khắc trở nên rực rỡ hơn với bó ho', 'HSN3.jpeg'),
(69, 'HSN02', ' Vũ Điệu Đắm Say', '52', '689000', '589000', 2, '0', 'Hoa cẩm chướng là loài hoa được khoác lên mình một vẻ ngoài xinh đẹp. Mang  tính cách dịu dàng, xinh tươi. Thể hiện một chút xíu nét nữ tính nhưng không kém phần kiều diễm. Cũng chính vì điều lẽ ấy mà lựa chọn loài hoa này làm quà tặng cũng ẩn chứa nhiều ', 'HCM1.jpg'),
(70, 'HSN03', ' Selena', '22', '349000', '0', 2, '1', 'Biến những khoảnh khắc bên cạnh người thương trở nên ý nghĩa và đáng nhớ hơn với bó hoa tulip Selena này nha! Trong bất kì dịp sinh nhật, kỷ niệm, tốt nghiệp,... thì bó hoa này cũng rất phù hợp đó.', 'HSN1.jpeg'),
(71, 'HSN05', ' Nàng Xuân', '25', '799000', '649000', 2, '0', 'Gửi tặng người thương một chút nhẹ nhàng, một chút tinh khôi và một chút đáng yêu với những cành hoa Tulip hồng pastel này nha! ', 'HSN4.jpeg'),
(72, 'HSN06', 'Love (99 bông)', '10', '899000', '749000', 2, '1', 'Không giống như bó hoa 100 bông hồng, 99 bông hồng đỏ mang ý nghĩa tượng trưng cho lời hẹn ước về tình yêu đầy chân thành và sâu thẳm. Một sự khao khát có được tình yêu trọn vẹn mà chỉ có đối phương chính là mảnh ghép cuối cùng của câu chuyện tình ngọt ng', 'HSN2.jpeg'),
(73, 'HCM01', ' An Nhiên', '49', '1239000', '0', 3, '1', 'Hoa ly hay hoa bách hợp, là loài hoa được trồng phổ biến ở những nơi có khí hậu ôn đới lạnh như phương Tây. Đây là loài hoa tượng trưng cho vẻ đẹp sang trọng, thanh lịch và nhã nhặn. Chính vì thế, ở phương Tây thường tặng hoa ly vào dịp Tết hay ngày lễ đặ', 'HCM7.jpeg'),
(74, 'HCM02', ' Vinh Hoa', '7', '2200000', '1999000', 3, '0', 'Mỗi sự kiện đặc biệt hay dịp quan trọng nào sẽ trở nên lộng lẫy và hoành tráng hơn rất nhiều với vẻ đẹp. Cùng lan tỏa sắc màu của sự thành công và may mắn này đến những người thân yêu nhé!', 'HCM2.jpeg'),
(75, 'HCM03', ' Hạnh Phúc', '19', '1969000', '0', 3, '1', 'Bó hoa Hạnh Phúc mang gam màu sắc trang nhã và duyên dáng của hoa hồng Ohara nhập khẩu với sự kết hợp của màu xanh lá tai lừa và màu tím của hoa sao. Đây sẽ là món quà bất ngờ và hoàn hảo dành tặng người thương, gia đình hoặc bạn bè.', 'HCM3.jpg'),
(76, 'HCM04', ' Giọt Nắng', '5', '849000', '0', 3, '0', 'Hộp hoa mang gam màu đầy trang nhã và duyên dáng với sự kết hợp của hoa Hồng pastel & hoa Hồng Tím lãng mạn.\r\nĐây sẽ là món quà bất ngờ và hoàn hảo dành tặng người thương, gia đình hoặc bạn bè.', 'HCM8.jpeg'),
(77, 'HCM05', ' Secret Lover', '9', '949000', '0', 3, '0', '24 bông Hoa Hồng kết hợp đây sẽ là hộp hoa xinh xắn với chất liệu chính là hoa hồng màu mật ong, điểm cúc tana và các loại lá bạc vừa lạ mắt vừa ngát hương.\r\nĐây sẽ là món quà bất ngờ và hoàn hảo dành tặng người thương, gia đình hoặc bạn bè.', 'HCM6.jpeg'),
(78, 'HCM06', ' Ánh Dương', '33', '379000', '0', 3, '0', 'Bó hoa rực rỡ và tươi tắn với hoa Hướng Dương được gói xinh xắn. Đây sẽ là món quà bất ngờ và hoàn hảo dành tặng người thương, gia đình hoặc bạn bè.', 'HCM5.png'),
(79, 'HKT01', ' Cát Tường Như Ý', '50', '1199000', '0', 5, '0', 'Kệ hoa to, tươi tắn và sang trọng với sự kết hợp của các loại hoa màu vàng.\r\nĐây sẽ là món quà tặng đầy ý nghĩa thay cho lời chúc mừng trong dịp khai trương hoặc các ngày lễ trọng đại. ', 'HKT1.jpeg'),
(80, 'HKT02', ' Hồng Phát', '44', '6999000', '0', 5, '0', 'Chậu hoa lan hồ điệp Hồng Phát với cánh hoa màu tím nhạt dập dìu như những cánh bướm trong buổi chiều tà, vừa sang trọng lại vừa vô cùng nên thơ. Bao gồm: 10 cành Lan Hồ Điệp màu tím (Giá đã bao gồm chậu)', 'HKT2.jpeg'),
(81, 'HKT03', ' Đại Cát Đại Lợi', '31', '1100000', '0', 5, '0', 'Kệ hoa to, tươi tắn và sang trọng với hướng dương, và các loại hoa lan.\r\nĐây sẽ là món quà tặng đầy ý nghĩa thay cho lời chúc mừng trong dịp khai trương hoặc các ngày lễ trọng đại.', 'HKT10.jpg'),
(82, 'HKT04', ' Dreamy ', '19', '1149000', '0', 5, '0', 'Hộp Hoa Gỗ Dreamy thể hiện nhiều sắc thái của tông màu Tím là món quà sang trọng thích hợp dành tặng người bạn yêu thương. Với sự kết hợp của: \r\n\r\nHộp hoa Dreamy bao gồm: 20 Bông Hoa Hồng, 10 Bông Cúc Pingpong, 10 Cành Cẩm Chướng, 10 Cành Mõm Sói và các l', 'HKT5.jpeg'),
(86, 'HKT05', ' Coral White', '15', '769000', '0', 2, '0', 'Hoa để bàn tươi tắn và sang trọng với sự kết hợp của nhiều loại hoa.\r\nĐây sẽ là món quà tặng đầy ý nghĩa thay cho lời chúc mừng trong dịp khai trương hoặc các ngày lễ trọng đại.', 'HKT9.jpeg'),
(87, 'HKT06', 'Tài Lộc', '45', '1399000', '0', 5, '0', 'Với sự kết hợp của Cẩm Tú Cầu, Hoa Hồng Tím, Hoa Hồng Da, Hoa Sao Tím Hoa, Cẩm Chướng Trắng và Các loại hoa, lá khác. Đây sẽ là món quà tặng đầy ý nghĩa thay cho lời chúc mừng trong dịp khai trương hoặc các ngày lễ trọng đại.', 'HKT6.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(11) NOT NULL,
  `MaNV` varchar(50) NOT NULL,
  `ChucVu` int(50) NOT NULL,
  `id_TT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `MaNV`, `ChucVu`, `id_TT`) VALUES
(22, 'nv01', 1, 8),
(23, 'nv02', 2, 13),
(24, 'nv03', 2, 14);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietnd`
--
ALTER TABLE `chitietnd`
  ADD PRIMARY KEY (`id_ND`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`idcv`);

--
-- Chỉ mục cho bảng `dh_chitiet`
--
ALTER TABLE `dh_chitiet`
  ADD KEY `fk_dh` (`id_DH`),
  ADD KEY `fk_pp` (`id_SP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_DH`),
  ADD KEY `fk_nd` (`id_ND`);

--
-- Chỉ mục cho bảng `loaihoa`
--
ALTER TABLE `loaihoa`
  ADD PRIMARY KEY (`idLoai`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_ND`),
  ADD KEY `fk_nguoidung` (`id_TT`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp` (`idLoai`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chucvu` (`ChucVu`),
  ADD KEY `fk_thongtin` (`id_TT`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietnd`
--
ALTER TABLE `chitietnd`
  MODIFY `id_ND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `idcv` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_DH` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `loaihoa`
--
ALTER TABLE `loaihoa`
  MODIFY `idLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_ND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dh_chitiet`
--
ALTER TABLE `dh_chitiet`
  ADD CONSTRAINT `fk_dh` FOREIGN KEY (`id_DH`) REFERENCES `donhang` (`id_DH`),
  ADD CONSTRAINT `fk_pp` FOREIGN KEY (`id_SP`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_ndd` FOREIGN KEY (`id_ND`) REFERENCES `chitietnd` (`id_ND`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `fk_nguoidung` FOREIGN KEY (`id_TT`) REFERENCES `chitietnd` (`id_ND`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp` FOREIGN KEY (`idLoai`) REFERENCES `loaihoa` (`idLoai`);

--
-- Các ràng buộc cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD CONSTRAINT `fk_chucvu` FOREIGN KEY (`ChucVu`) REFERENCES `chucvu` (`idcv`),
  ADD CONSTRAINT `fk_thongtin` FOREIGN KEY (`id_TT`) REFERENCES `chitietnd` (`id_ND`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
