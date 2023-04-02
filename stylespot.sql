-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 01, 2023 lúc 07:16 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `stylespot`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `total_money` int(100) NOT NULL,
  `pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0.Thanh toán khi nhận hàng\r\n1.Thanh toán bằng VNPAY\r\n',
  `status` tinyint(1) DEFAULT 0 COMMENT '0.Đơn hàng mới 1.Đang xử lý 2.Đang giao hàng 3.Đã hoàn thành',
  `user_id` int(11) DEFAULT NULL,
  `ngaydathang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `fullname`, `email`, `address`, `phone`, `total_money`, `pttt`, `status`, `user_id`, `ngaydathang`) VALUES
(216, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 218, 0, 3, 67, '31/03/2023'),
(217, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 106, 1, 0, 67, '31/03/2023'),
(218, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 50, 1, 0, 67, '31/03/2023'),
(219, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 218, 1, 0, 67, '31/03/2023'),
(220, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 50, 1, 0, 67, '31/03/2023'),
(221, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 218, 1, 0, 67, '31/03/2023'),
(222, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 235, 0, 0, 67, '01/04/2023'),
(223, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 235, 1, 0, 67, '01/04/2023'),
(224, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 50, 1, 0, 67, '01/04/2023'),
(225, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 235, 1, 0, 67, '01/04/2023'),
(226, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 235, 1, 0, 67, '01/04/2023'),
(227, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 235, 1, 0, 67, '01/04/2023'),
(228, 'truongtv', 'truongtvph19876@fpt.edu.vn', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', '0982968640', 235, 1, 0, 67, '01/04/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `order_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `price` double(10,2) NOT NULL,
  `amount` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`order_id`, `user_id`, `price`, `amount`, `product_id`, `size_id`, `bill_id`, `product_name`) VALUES
(170, 67, 54.00, 2, 141, 37, 137, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(171, 67, 56.00, 1, 143, 36, 139, 'BASAS BUMPER GUM EXT NE - LOW TOP - BLACK/GUM'),
(172, 67, 56.00, 1, 143, 36, 140, 'BASAS BUMPER GUM EXT NE - LOW TOP - BLACK/GUM'),
(173, 67, 54.00, 1, 141, 36, 141, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(174, 67, 54.00, 1, 141, 36, 148, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(175, 67, 54.00, 1, 141, 36, 149, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(176, 67, 54.00, 1, 141, 36, 150, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(177, 67, 56.00, 1, 143, 36, 151, 'BASAS BUMPER GUM EXT NE - LOW TOP - BLACK/GUM'),
(178, 67, 56.00, 1, 143, 36, 152, 'BASAS BUMPER GUM EXT NE - LOW TOP - BLACK/GUM'),
(179, 67, 56.00, 1, 143, 36, 153, 'BASAS BUMPER GUM EXT NE - LOW TOP - BLACK/GUM'),
(180, 67, 168.00, 1, 142, 40, 154, 'GIÀY SNEAKERS VANS OLD SKOOL BLACK/WHITE VN000D3HY28 MÀU ĐEN TRẮNG'),
(181, 67, 146.00, 1, 140, 39, 155, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(182, 67, 146.00, 1, 140, 39, 156, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(183, 67, 54.00, 1, 141, 0, 158, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(184, 67, 54.00, 1, 141, 0, 159, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(185, 67, 54.00, 1, 141, 36, 160, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(186, 67, 54.00, 1, 141, 36, 160, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(187, 67, 54.00, 1, 141, 36, 160, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(188, 67, 54.00, 1, 141, 36, 161, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(189, 67, 54.00, 1, 141, 36, 162, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(190, 67, 54.00, 1, 141, 36, 162, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(191, 67, 54.00, 1, 141, 36, 162, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(192, 67, 54.00, 1, 141, 36, 163, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(193, 67, 54.00, 1, 141, 36, 164, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(194, 67, 54.00, 1, 141, 36, 164, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(195, 67, 54.00, 1, 141, 36, 165, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(196, 67, 54.00, 1, 141, 39, 166, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(197, 67, 54.00, 1, 141, 36, 167, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(198, 67, 54.00, 1, 141, 36, 168, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(199, 67, 54.00, 1, 141, 36, 169, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(200, 67, 54.00, 1, 141, 36, 172, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(201, 67, 54.00, 1, 141, 36, 174, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(202, 67, 54.00, 1, 141, 36, 175, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(203, 67, 54.00, 1, 141, 36, 176, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(204, 67, 146.00, 1, 140, 39, 176, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(205, 67, 146.00, 1, 140, 39, 179, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(206, 67, 146.00, 1, 140, 39, 184, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(207, 67, 146.00, 1, 140, 39, 186, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(208, 67, 146.00, 1, 140, 39, 187, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(209, 67, 146.00, 1, 140, 39, 188, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(210, 67, 146.00, 1, 140, 39, 190, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(211, 67, 146.00, 1, 140, 39, 192, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(212, 67, 146.00, 1, 140, 39, 194, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(213, 67, 146.00, 1, 140, 39, 196, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(214, 67, 146.00, 1, 140, 39, 197, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(215, 67, 146.00, 1, 140, 39, 198, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(216, 67, 146.00, 1, 140, 39, 200, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003'),
(217, 67, 54.00, 1, 141, 36, 200, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(218, 67, 54.00, 1, 141, 36, 202, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(219, 67, 54.00, 1, 141, 36, 202, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(220, 67, 54.00, 1, 141, 36, 204, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(221, 67, 54.00, 1, 141, 36, 204, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(222, 67, 54.00, 1, 141, 36, 206, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(223, 67, 54.00, 1, 141, 36, 206, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(224, 67, 54.00, 1, 141, 36, 214, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(225, 67, 54.00, 1, 141, 36, 214, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM'),
(226, 67, 168.00, 1, 142, 40, 215, 'GIÀY SNEAKERS VANS OLD SKOOL BLACK/WHITE VN000D3HY28 MÀU ĐEN TRẮNG'),
(227, 67, 168.00, 1, 142, 40, 215, 'GIÀY SNEAKERS VANS OLD SKOOL BLACK/WHITE VN000D3HY28 MÀU ĐEN TRẮNG'),
(228, 67, 168.00, 1, 142, 40, 215, 'GIÀY SNEAKERS VANS OLD SKOOL BLACK/WHITE VN000D3HY28 MÀU ĐEN TRẮNG'),
(229, 67, 168.00, 1, 142, 40, 216, 'GIÀY SNEAKERS VANS OLD SKOOL BLACK/WHITE VN000D3HY28 MÀU ĐEN TRẮNG'),
(230, 67, 56.00, 1, 143, 0, 217, 'BASAS BUMPER GUM EXT NE - LOW TOP - BLACK/GUM'),
(231, 67, 168.00, 1, 142, 40, 219, 'GIÀY SNEAKERS VANS OLD SKOOL BLACK/WHITE VN000D3HY28 MÀU ĐEN TRẮNG'),
(232, 67, 168.00, 1, 142, 40, 221, 'GIÀY SNEAKERS VANS OLD SKOOL BLACK/WHITE VN000D3HY28 MÀU ĐEN TRẮNG'),
(233, 67, 185.00, 1, 139, 40, 222, 'Giày nam Nike Air Force 1 ID ‘Gucci’ CT7875-994'),
(234, 67, 185.00, 1, 139, 40, 223, 'Giày nam Nike Air Force 1 ID ‘Gucci’ CT7875-994'),
(235, 67, 185.00, 1, 139, 40, 225, 'Giày nam Nike Air Force 1 ID ‘Gucci’ CT7875-994'),
(236, 67, 185.00, 1, 139, 40, 227, 'Giày nam Nike Air Force 1 ID ‘Gucci’ CT7875-994');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categori`
--

CREATE TABLE `categori` (
  `categori_id` int(11) NOT NULL,
  `categori_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categori`
--

INSERT INTO `categori` (`categori_id`, `categori_name`) VALUES
(11, 'Giày Nam'),
(12, 'Giày Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT -1,
  `content` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `parent_id`, `content`, `product_id`, `user_id`, `date_comment`) VALUES
(1, -1, 'abc', 143, 67, '12/03/2023'),
(27, -1, 'sản phẩm cũng ra gì', 0, 0, '2023-03-30 13:14:29'),
(28, -1, 'sản phẩm cũng ra gì', 143, 67, '2023-03-30 13:16:55'),
(29, 28, 'cảm ơn bạn', 143, 67, '2023-03-30 13:17:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `mo_ta` varchar(255) NOT NULL,
  `number_of_view` int(11) DEFAULT NULL,
  `categori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `img`, `mo_ta`, `number_of_view`, `categori_id`) VALUES
(138, 'Giày Thể Thao Nike Air Max 90 By You DO7431-900 Màu Xanh Nâu', 219.00, 'giay-the-thao-nike-air-max-90-by-you-do7431-900-mau-xanh-nau-size-35-5-641d4fc37251f-24032023142243.jpg', 'giày thể thao nike air max 90 xanh nâu với thiết kế thời trang thương hiệu nike nổi tiếng mỹ. Đôi giày nike air max 90 sở hữu gam màu nổi bật cùng chất liệu cao cấp sẽ cho bạn trải nghiệm tuyệt vời khi đi lên chân', 5, 0),
(139, 'Giày nam Nike Air Force 1 ID ‘Gucci’ CT7875-994', 185.00, 'nike-air-force-1-id-gucci-ct7875-994-2.jpg.webp', 'Phần đế giày mang đến cảm giác êm ái nhưng không kém phần chắc chắn, phù hợp cho dân tập luyện thể thao với các cú bật người “thần sầu”. Chất liệu ở trên sử dụng vải gân có màu trắng ngà, sử dụng các đường may nổi để lại những dấu chấm nhỏ nhằm trang trí ', 18, 0),
(140, 'NIKE REVOLUTION 6 BLACK/WHITE/IRON GREY – DC3728-003', 146.00, 'DC3728-003.png', 'Thiết kế đơn giản  Lưới sang trọng được đặt ở bàn chân trước và dọc theo cổ chân để tạo cảm giác thoải mái. Gia cường thêm lớp da tổng hợp giúp tặng cường độ bền.  Linh hoạt hơn  Đế giữa bằng bọt mang lại cảm giác lái nhẹ nhàng hơn so với Revolution 5. Đế', NULL, 11),
(141, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE/GUM', 54.00, 'pro_AV00114_1.jpg', 'Bumper Gum EXT (Extension) NE là bản nâng cấp được xếp vào dòng sản phẩm Basas, nhưng lại gây ấn tượng với diện mạo phá đi sự an toàn thường thấy. Với cách sắp xếp logo hoán đổi đầy ý tứ và mảng miếng da lộn (Suede) xuất hiện hợp lí trên chất vải canvas N', NULL, 12),
(142, 'GIÀY SNEAKERS VANS OLD SKOOL BLACK/WHITE VN000D3HY28 MÀU ĐEN TRẮNG', 168.00, 'giay-sneakers-vans-old-skool-black-white-vn000d3hy28-mau-den-trang-63808252b5eaf-25112022155234.jpg', 'Giày Sneaker Vans Old Skool Black/White VN000D3HY28 Màu Đen Trắng là một trong những best seller đến từ nhà Vans nổi tiếng. Sở hữu phối màu hài hòa, thiết kế basic dễ đi, mẫu giày Sneaker Vans Old Skool Black/White VN000D3HY28 Màu Đen Trắng sẽ là must try', NULL, 0),
(143, 'BASAS BUMPER GUM EXT NE - LOW TOP - BLACK/GUM', 56.00, 'Pro_AV00098_1.jpg', 'Bumper Gum EXT (Extension) NE là bản nâng cấp được xếp vào dòng sản phẩm Basas, nhưng lại gây ấn tượng với diện mạo phá đi sự an toàn thường thấy. Với cách sắp xếp logo hoán đổi đầy ý tứ và mảng miếng da lộn (Suede) xuất hiện hợp lí trên chất vải canvas N', NULL, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pr_size` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`size_id`, `product_id`, `pr_size`) VALUES
(428, 140, 39),
(429, 140, 40),
(430, 141, 36),
(431, 141, 37),
(432, 141, 38),
(433, 141, 39),
(434, 141, 40),
(435, 141, 41),
(436, 141, 42),
(437, 142, 40),
(438, 142, 41),
(439, 142, 42),
(440, 143, 36),
(441, 143, 40),
(442, 143, 41),
(443, 139, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.user\r\n1.admin\r\n',
  `status` varchar(10) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `avatar`, `email`, `phone`, `address`, `role`, `status`) VALUES
(67, 'truongtv', '123456', './upload/shine.jpg', 'truongtvph19876@fpt.edu.vn', '0982968640', 'Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội', 1, 'true'),
(68, 'truong1', '1', '../upload/vn-11134201-23030-t6xpsdo2yxovf9.jfif', 'K282011113@hupes.edu.vn', '0348571059', 'Phường Phúc Xá, Quận Ba Đình, Thành phố Hà Nội', 0, 'true'),
(69, 'truongtv3', '1234567', '../upload/Pro_AV00098_1.jpg', 'truongtv67891@gmail.com', '0969268096', 'Phường Sông Hiến, Thành phố Cao Bằng, Tỉnh Cao Bằng', 0, 'false'),
(70, 'truongtv33', '33', '../upload/Pro_AV00098_1.jpg', 'truong@g.co', '0365085415', 'Thị trấn Văn Điển, Huyện Thanh Trì, Thành phố Hà Nội', 0, 'true');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `lk_user` (`user_id`),
  ADD KEY `lk_bill` (`bill_id`);

--
-- Chỉ mục cho bảng `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`categori_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `lk_size` (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT cho bảng `categori`
--
ALTER TABLE `categori`
  MODIFY `categori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_bill` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
