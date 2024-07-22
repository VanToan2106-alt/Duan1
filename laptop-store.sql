-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2024 lúc 05:06 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laptop-store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id_bill` int(11) NOT NULL COMMENT 'Mã đơn hàng',
  `id_customer` int(11) NOT NULL,
  `receiver_name` varchar(100) NOT NULL COMMENT 'Tên người nhận',
  `receiver_phone` varchar(100) NOT NULL COMMENT 'Số điện thoại người nhận',
  `receiver_address` text NOT NULL COMMENT 'Địa chỉ người nhận',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Trạng thái của đơn hàng. \r\n- 0 là đang xử lý, \r\n-1 là đã xử lý, \r\n- 2 là đang đóng gói và vận chuyển, \r\n- 3 là đang vận chuyển đến người nhận,\r\n- 4 là nhận hàng thành công, \r\n- 5 là user từ chối nhận hàng\r\n- 6 là user hủy đơn',
  `purchase_date` datetime DEFAULT current_timestamp() COMMENT 'Ngày mua '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id_bill`, `id_customer`, `receiver_name`, `receiver_phone`, `receiver_address`, `status`, `purchase_date`) VALUES
(25, 7, 'Nguyễn Văn Toàn', '0393546131', '132 Hồ Xuân Hương', 4, '2024-06-26 07:43:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL COMMENT 'Mã loại hàng',
  `name` varchar(255) NOT NULL COMMENT 'Tên của loại hàng',
  `created_at` datetime DEFAULT NULL COMMENT 'Ngày tạo ',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2023-06-29 10:11:19', '2023-06-29 10:11:19'),
(2, 'Điện thoại', '2023-06-29 10:11:19', '2023-06-29 10:11:19'),
(3, 'Tablet', '2023-06-29 10:11:19', '2023-06-29 10:11:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL COMMENT 'Mã bình luận',
  `id_product` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL COMMENT 'Nội dung bình luận ',
  `censorship` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 là chưa kiểm duyệt, 1 là đã ẩn, 2 là đã kiểm duyệt và đang đăng bán',
  `day_post` datetime DEFAULT NULL COMMENT 'Ngày tạo ',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id_comment`, `id_product`, `id_user`, `content`, `censorship`, `day_post`, `updated_at`) VALUES
(18798, 101, 60, 'Sản Phẩm Tốt', 2, '2024-06-26 09:26:28', '2024-06-26 09:26:28'),
(18799, 101, 60, 'egshdrtm,yu.áedrhjctv,yu.f', 2, '2024-07-19 09:56:20', '2024-07-19 09:56:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `note` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id_customer`, `id_user`, `full_name`, `phone`, `address`, `note`) VALUES
(7, 61, 'Nguyễn Văn Toàn', '0393546131', '132 Hồ Xuân Hương', ''),
(8, 60, 'Nguyễn Văn Toàn', '0393546131', '132 Hồ Xuân Hương', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_bills`
--

CREATE TABLE `detail_bills` (
  `id_detailbill` int(11) NOT NULL COMMENT 'Mã chi tiết đơn hàng',
  `id_bill` int(11) NOT NULL COMMENT 'Mã đơn hàng',
  `id_product` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `name_product` varchar(255) NOT NULL COMMENT 'Tên của sản phẩm',
  `price` int(11) UNSIGNED NOT NULL COMMENT 'Giá của sản phẩm ',
  `amount` int(11) UNSIGNED NOT NULL COMMENT 'Số lượng sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `id_category` int(11) NOT NULL COMMENT 'Mã loại hàng',
  `firms` varchar(255) NOT NULL COMMENT 'Hãng của sản phẩm',
  `name` varchar(255) NOT NULL COMMENT 'Tên của sản phẩm',
  `price` int(11) UNSIGNED NOT NULL COMMENT 'Giá của sản phẩm ',
  `discount` int(11) UNSIGNED NOT NULL COMMENT 'Giảm giá của sản phẩm. Mặc định là 0% và giảm tối đa 20%',
  `description` text DEFAULT NULL COMMENT 'Mô tả của sản phẩm',
  `img_product` varchar(255) DEFAULT NULL COMMENT 'Hình ảnh của sản phẩm',
  `censorship` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 là chưa kiểm duyệt, 1 là đã ẩn, 2 là đã kiểm duyệt và đang đăng bán',
  `view` int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượt xem của sản phẩm',
  `created_at` datetime DEFAULT NULL COMMENT 'Ngày tạo ',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `id_category`, `firms`, `name`, `price`, `discount`, `description`, `img_product`, `censorship`, `view`, `created_at`, `updated_at`) VALUES
(101, 1, 'MSI', 'Laptop MSI Pavilion 15 AMD Ryzen 5 16MB', 30000000, 11, 'Laptop MSI Pavilion 15 AMD Ryzen 5 16MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop MSIPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi5.png', 2, 141, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(102, 1, 'HP', 'Laptop HP Ideapad Intel Core i9 16MB', 34000000, 39, 'Laptop HP Ideapad Intel Core i9 16MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop HPIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp1.png', 1, 79, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(103, 1, 'Lenovo', 'Laptop Lenovo Vivobook AMD Ryzen 3 32MB', 26000000, 21, 'Laptop Lenovo Vivobook AMD Ryzen 3 32MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LenovoVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo7.png', 1, 152, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(104, 1, 'Lenovo', 'Laptop Lenovo Legion 5 AMD Ryzen 7 8MB', 26000000, 18, 'Laptop Lenovo Legion 5 AMD Ryzen 7 8MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop LenovoLegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo1.png', 0, 11, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(105, 1, 'HP', 'Laptop HP Ideapad Intel Core i7 32MB', 30000000, 30, 'Laptop HP Ideapad Intel Core i7 32MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop HPIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp3.png', 0, 150, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(106, 1, 'MSI', 'Laptop MSI Nitro 16 Phoenix Intel Core i5 16MB', 34000000, 10, 'Laptop MSI Nitro 16 Phoenix Intel Core i5 16MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop MSINitro 16 Phoenix sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi3.png', 0, 91, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(107, 1, 'LG', 'Laptop LG Nitro 5 Eagle Intel Core i9 32MB', 26000000, 39, 'Laptop LG Nitro 5 Eagle Intel Core i9 32MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LGNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg3.png', 1, 102, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(108, 1, 'MSI', 'Laptop MSI Vivobook Intel Core i5 8MB', 22000000, 39, 'Laptop MSI Vivobook Intel Core i5 8MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop MSIVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi2.png', 0, 162, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(109, 1, 'Dell', 'Laptop Dell Aspire 3 Intel Core i5 32MB', 26000000, 5, 'Laptop Dell Aspire 3 Intel Core i5 32MB thuộc dòng sản phẩm của hãng Dell hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop DellAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'dell3.png', 1, 193, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(110, 1, 'LG', 'Laptop LG Ideapad AMD Ryzen 7 32MB', 34000000, 7, 'Laptop LG Ideapad AMD Ryzen 7 32MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LGIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg5.png', 1, 133, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(111, 1, 'Lenovo', 'Laptop Lenovo Pavilion 15 Intel Core i5 8MB', 22000000, 4, 'Laptop Lenovo Pavilion 15 Intel Core i5 8MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop LenovoPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo2.png', 2, 182, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(112, 1, 'Lenovo', 'Laptop Lenovo Aspire 3 Intel Core i7 8MB', 26000000, 35, 'Laptop Lenovo Aspire 3 Intel Core i7 8MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop LenovoAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo1.png', 2, 32, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(113, 1, 'Acer', 'Laptop Acer Legion 5 Intel Core i3 8MB', 34000000, 30, 'Laptop Acer Legion 5 Intel Core i3 8MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop AcerLegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer7.png', 0, 14, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(114, 1, 'Asus', 'Laptop Asus Nitro 16 Phoenix AMD Ryzen 7 32MB', 26000000, 39, 'Laptop Asus Nitro 16 Phoenix AMD Ryzen 7 32MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AsusNitro 16 Phoenix sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus3.png', 0, 76, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(115, 1, 'Acer', 'Laptop Acer Aspire 3 Intel Core i5 16MB', 26000000, 26, 'Laptop Acer Aspire 3 Intel Core i5 16MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop AcerAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer6.png', 0, 190, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(116, 1, 'Dell', 'Laptop Dell Aspire 3 AMD Ryzen 7 32MB', 26000000, 32, 'Laptop Dell Aspire 3 AMD Ryzen 7 32MB thuộc dòng sản phẩm của hãng Dell hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop DellAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'dell7.png', 1, 76, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(117, 1, 'MSI', 'Laptop MSI Ideapad AMD Ryzen 3 8MB', 26000000, 5, 'Laptop MSI Ideapad AMD Ryzen 3 8MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop MSIIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi1.png', 2, 104, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(118, 1, 'HP', 'Laptop HP Ideapad Intel Core i3 32MB', 34000000, 36, 'Laptop HP Ideapad Intel Core i3 32MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop HPIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp2.png', 0, 34, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(119, 1, 'Dell', 'Laptop Dell Nitro 5 Eagle AMD Ryzen 5 8MB', 22000000, 0, 'Laptop Dell Nitro 5 Eagle AMD Ryzen 5 8MB thuộc dòng sản phẩm của hãng Dell hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop DellNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'dell6.png', 1, 18, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(120, 1, 'LG', 'Laptop LG Nitro 5 Eagle Intel Core i9 32MB', 34000000, 15, 'Laptop LG Nitro 5 Eagle Intel Core i9 32MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LGNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg5.png', 0, 191, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(121, 1, 'Dell', 'Laptop Dell Pavilion 15 Intel Core i3 32MB', 26000000, 16, 'Laptop Dell Pavilion 15 Intel Core i3 32MB thuộc dòng sản phẩm của hãng Dell hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop DellPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'dell4.png', 1, 185, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(122, 1, 'HP', 'Laptop HP Ideapad Intel Core i3 16MB', 26000000, 9, 'Laptop HP Ideapad Intel Core i3 16MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop HPIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp3.png', 1, 24, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(123, 1, 'Lenovo', 'Laptop Lenovo Pavilion 15 AMD Ryzen 7 32MB', 22000000, 5, 'Laptop Lenovo Pavilion 15 AMD Ryzen 7 32MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LenovoPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo1.png', 1, 118, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(124, 1, 'HP', 'Laptop HP Vivobook Intel Core i5 32MB', 22000000, 9, 'Laptop HP Vivobook Intel Core i5 32MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop HPVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp6.png', 0, 114, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(125, 1, 'Lenovo', 'Laptop Lenovo Nitro 16 Phoenix Intel Core i5 8MB', 26000000, 4, 'Laptop Lenovo Nitro 16 Phoenix Intel Core i5 8MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop LenovoNitro 16 Phoenix sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo2.png', 1, 137, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(126, 1, 'Lenovo', 'Laptop Lenovo Ideapad Intel Core i3 32MB', 22000000, 39, 'Laptop Lenovo Ideapad Intel Core i3 32MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LenovoIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo4.png', 2, 182, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(127, 1, 'HP', 'Laptop HP Ideapad Intel Core i7 8MB', 22000000, 33, 'Laptop HP Ideapad Intel Core i7 8MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop HPIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp2.png', 1, 67, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(128, 1, 'Lenovo', 'Laptop Lenovo Vivobook Intel Core i9 16MB', 30000000, 26, 'Laptop Lenovo Vivobook Intel Core i9 16MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop LenovoVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo5.png', 2, 123, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(129, 1, 'MSI', 'Laptop MSI Nitro 16 Phoenix Intel Core i9 8MB', 34000000, 33, 'Laptop MSI Nitro 16 Phoenix Intel Core i9 8MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop MSINitro 16 Phoenix sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi2.png', 0, 184, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(130, 1, 'LG', 'Laptop LG Nitro 5 Eagle AMD Ryzen 5 16MB', 34000000, 38, 'Laptop LG Nitro 5 Eagle AMD Ryzen 5 16MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop LGNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg5.png', 0, 136, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(131, 1, 'HP', 'Laptop HP Pavilion 15 AMD Ryzen 5 8MB', 30000000, 33, 'Laptop HP Pavilion 15 AMD Ryzen 5 8MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop HPPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp1.png', 0, 77, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(132, 1, 'Asus', 'Laptop Asus Nitro 16 Phoenix Intel Core i7 16MB', 26000000, 40, 'Laptop Asus Nitro 16 Phoenix Intel Core i7 16MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop AsusNitro 16 Phoenix sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus4.png', 0, 106, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(133, 1, 'Lenovo', 'Laptop Lenovo Aspire 3 Intel Core i5 32MB', 26000000, 15, 'Laptop Lenovo Aspire 3 Intel Core i5 32MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LenovoAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo5.png', 1, 107, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(134, 1, 'LG', 'Laptop LG Ideapad AMD Ryzen 3 8MB', 34000000, 2, 'Laptop LG Ideapad AMD Ryzen 3 8MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop LGIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg6.png', 1, 142, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(135, 1, 'LG', 'Laptop LG Aspire 3 Intel Core i7 8MB', 22000000, 34, 'Laptop LG Aspire 3 Intel Core i7 8MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop LGAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg2.png', 2, 110, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(136, 1, 'Asus', 'Laptop Asus Pavilion 15 Intel Core i3 16MB', 26000000, 21, 'Laptop Asus Pavilion 15 Intel Core i3 16MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop AsusPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus1.png', 0, 72, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(137, 1, 'Lenovo', 'Laptop Lenovo Nitro 5 Eagle AMD Ryzen 7 16MB', 26000000, 20, 'Laptop Lenovo Nitro 5 Eagle AMD Ryzen 7 16MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop LenovoNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo7.png', 2, 165, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(138, 1, 'HP', 'Laptop HP Legion 5 Intel Core i9 16MB', 26000000, 12, 'Laptop HP Legion 5 Intel Core i9 16MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop HPLegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp3.png', 1, 105, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(139, 1, 'Acer', 'Laptop Acer Vivobook Intel Core i9 8MB', 34000000, 8, 'Laptop Acer Vivobook Intel Core i9 8MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop AcerVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer1.png', 1, 87, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(140, 1, 'Asus', 'Laptop Asus Ideapad AMD Ryzen 7 8MB', 26000000, 34, 'Laptop Asus Ideapad AMD Ryzen 7 8MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop AsusIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus7.png', 1, 131, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(141, 1, 'LG', 'Laptop LG Legion 5 Intel Core i3 8MB', 22000000, 21, 'Laptop LG Legion 5 Intel Core i3 8MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop LGLegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg2.png', 1, 176, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(142, 1, 'Lenovo', 'Laptop Lenovo Pavilion 15 AMD Ryzen 3 8MB', 22000000, 34, 'Laptop Lenovo Pavilion 15 AMD Ryzen 3 8MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop LenovoPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo6.png', 0, 176, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(143, 1, 'HP', 'Laptop HP Nitro 5 Eagle Intel Core i3 32MB', 30000000, 36, 'Laptop HP Nitro 5 Eagle Intel Core i3 32MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop HPNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp4.png', 2, 34, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(144, 1, 'Lenovo', 'Laptop Lenovo Vivobook Intel Core i5 16MB', 26000000, 23, 'Laptop Lenovo Vivobook Intel Core i5 16MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop LenovoVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo4.png', 2, 101, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(145, 1, 'HP', 'Laptop HP Pavilion 15 Intel Core i7 32MB', 26000000, 31, 'Laptop HP Pavilion 15 Intel Core i7 32MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop HPPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp6.png', 0, 88, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(146, 1, 'HP', 'Laptop HP Gaming Intel Core i9 32MB', 22000000, 34, 'Laptop HP Gaming Intel Core i9 32MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop HPGaming sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp4.png', 2, 190, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(147, 1, 'Acer', 'Laptop Acer Gaming AMD Ryzen 7 8MB', 34000000, 31, 'Laptop Acer Gaming AMD Ryzen 7 8MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop AcerGaming sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer3.png', 1, 91, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(148, 1, 'Lenovo', 'Laptop Lenovo Aspire 3 AMD Ryzen 3 32MB', 30000000, 36, 'Laptop Lenovo Aspire 3 AMD Ryzen 3 32MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LenovoAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo5.png', 1, 120, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(149, 1, 'Acer', 'Laptop Acer Vivobook Intel Core i5 8MB', 30000000, 25, 'Laptop Acer Vivobook Intel Core i5 8MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop AcerVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer3.png', 2, 30, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(150, 1, 'Asus', 'Laptop Asus Ideapad Intel Core i7 32MB', 26000000, 27, 'Laptop Asus Ideapad Intel Core i7 32MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AsusIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus7.png', 2, 51, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(151, 1, 'Asus', 'Laptop Asus Gaming Intel Core i3 32MB', 26000000, 3, 'Laptop Asus Gaming Intel Core i3 32MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AsusGaming sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus7.png', 1, 150, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(152, 1, 'MSI', 'Laptop MSI Legion 5 Intel Core i7 8MB', 30000000, 23, 'Laptop MSI Legion 5 Intel Core i7 8MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop MSILegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi2.png', 0, 135, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(153, 1, 'HP', 'Laptop HP Nitro 5 Eagle AMD Ryzen 5 8MB', 34000000, 13, 'Laptop HP Nitro 5 Eagle AMD Ryzen 5 8MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop HPNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp5.png', 1, 78, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(154, 1, 'Lenovo', 'Laptop Lenovo Aspire 3 AMD Ryzen 7 32MB', 26000000, 16, 'Laptop Lenovo Aspire 3 AMD Ryzen 7 32MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LenovoAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo3.png', 2, 101, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(155, 1, 'MSI', 'Laptop MSI Vivobook Intel Core i9 8MB', 22000000, 21, 'Laptop MSI Vivobook Intel Core i9 8MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop MSIVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi2.png', 0, 15, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(156, 1, 'Lenovo', 'Laptop Lenovo Aspire 3 AMD Ryzen 5 32MB', 22000000, 25, 'Laptop Lenovo Aspire 3 AMD Ryzen 5 32MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LenovoAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo1.png', 0, 20, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(157, 1, 'Acer', 'Laptop Acer Ideapad Intel Core i5 32MB', 34000000, 12, 'Laptop Acer Ideapad Intel Core i5 32MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AcerIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer2.png', 0, 184, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(158, 1, 'Asus', 'Laptop Asus Aspire 3 AMD Ryzen 7 32MB', 34000000, 1, 'Laptop Asus Aspire 3 AMD Ryzen 7 32MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AsusAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus7.png', 2, 176, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(159, 1, 'Acer', 'Laptop Acer Ideapad Intel Core i7 16MB', 26000000, 2, 'Laptop Acer Ideapad Intel Core i7 16MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop AcerIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer7.png', 1, 84, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(160, 1, 'Acer', 'Laptop Acer Legion 5 Intel Core i7 32MB', 22000000, 0, 'Laptop Acer Legion 5 Intel Core i7 32MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AcerLegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer6.png', 2, 167, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(161, 1, 'Lenovo', 'Laptop Lenovo Vivobook AMD Ryzen 3 32MB', 34000000, 15, 'Laptop Lenovo Vivobook AMD Ryzen 3 32MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LenovoVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo6.png', 2, 86, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(162, 1, 'Acer', 'Laptop Acer Vivobook AMD Ryzen 5 32MB', 34000000, 30, 'Laptop Acer Vivobook AMD Ryzen 5 32MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AcerVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer5.png', 2, 31, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(163, 1, 'LG', 'Laptop LG Aspire 3 AMD Ryzen 5 32MB', 30000000, 5, 'Laptop LG Aspire 3 AMD Ryzen 5 32MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LGAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg2.png', 2, 43, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(164, 1, 'Acer', 'Laptop Acer Nitro 16 Phoenix AMD Ryzen 3 32MB', 30000000, 11, 'Laptop Acer Nitro 16 Phoenix AMD Ryzen 3 32MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AcerNitro 16 Phoenix sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer3.png', 1, 179, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(165, 1, 'Dell', 'Laptop Dell Gaming Intel Core i5 8MB', 26000000, 27, 'Laptop Dell Gaming Intel Core i5 8MB thuộc dòng sản phẩm của hãng Dell hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop DellGaming sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'dell5.png', 1, 29, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(166, 1, 'MSI', 'Laptop MSI Pavilion 15 Intel Core i9 16MB', 22000000, 12, 'Laptop MSI Pavilion 15 Intel Core i9 16MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop MSIPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi5.png', 0, 110, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(167, 1, 'Acer', 'Laptop Acer Legion 5 Intel Core i3 32MB', 34000000, 16, 'Laptop Acer Legion 5 Intel Core i3 32MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AcerLegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer3.png', 1, 46, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(168, 1, 'Acer', 'Laptop Acer Gaming Intel Core i9 32MB', 22000000, 22, 'Laptop Acer Gaming Intel Core i9 32MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AcerGaming sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer7.png', 0, 144, '2023-06-29 10:29:43', '2023-06-29 10:29:43'),
(169, 1, 'Asus', 'Laptop Asus Aspire 3 Intel Core i7 8MB', 34000000, 9, 'Laptop Asus Aspire 3 Intel Core i7 8MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop AsusAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus3.png', 0, 135, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(170, 1, 'HP', 'Laptop HP Vivobook Intel Core i5 8MB', 30000000, 39, 'Laptop HP Vivobook Intel Core i5 8MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop HPVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp6.png', 1, 63, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(171, 1, 'Asus', 'Laptop Asus Gaming AMD Ryzen 5 16MB', 22000000, 9, 'Laptop Asus Gaming AMD Ryzen 5 16MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop AsusGaming sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus1.png', 0, 175, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(172, 1, 'HP', 'Laptop HP Vivobook Intel Core i3 32MB', 30000000, 39, 'Laptop HP Vivobook Intel Core i3 32MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop HPVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp1.png', 1, 90, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(173, 1, 'Asus', 'Laptop Asus Gaming Intel Core i3 32MB', 22000000, 20, 'Laptop Asus Gaming Intel Core i3 32MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AsusGaming sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus5.png', 0, 156, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(174, 1, 'MSI', 'Laptop MSI Vivobook AMD Ryzen 5 16MB', 34000000, 13, 'Laptop MSI Vivobook AMD Ryzen 5 16MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop MSIVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi2.png', 2, 148, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(175, 1, 'LG', 'Laptop LG Nitro 5 Eagle Intel Core i9 16MB', 22000000, 14, 'Laptop LG Nitro 5 Eagle Intel Core i9 16MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop LGNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg2.png', 0, 30, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(176, 1, 'HP', 'Laptop HP Nitro 5 Eagle AMD Ryzen 7 8MB', 22000000, 1, 'Laptop HP Nitro 5 Eagle AMD Ryzen 7 8MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop HPNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp4.png', 2, 146, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(177, 1, 'Acer', 'Laptop Acer Aspire 3 Intel Core i7 8MB', 30000000, 3, 'Laptop Acer Aspire 3 Intel Core i7 8MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop AcerAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer3.png', 2, 70, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(178, 1, 'HP', 'Laptop HP Aspire 3 Intel Core i3 16MB', 30000000, 8, 'Laptop HP Aspire 3 Intel Core i3 16MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop HPAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp6.png', 2, 146, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(179, 1, 'Asus', 'Laptop Asus Ideapad Intel Core i3 16MB', 34000000, 2, 'Laptop Asus Ideapad Intel Core i3 16MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop AsusIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus7.png', 2, 74, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(180, 1, 'HP', 'Laptop HP Pavilion 15 Intel Core i9 32MB', 30000000, 40, 'Laptop HP Pavilion 15 Intel Core i9 32MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop HPPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp1.png', 2, 82, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(181, 1, 'MSI', 'Laptop MSI Vivobook AMD Ryzen 7 16MB', 22000000, 16, 'Laptop MSI Vivobook AMD Ryzen 7 16MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop MSIVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi5.png', 0, 83, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(182, 1, 'MSI', 'Laptop MSI Gaming AMD Ryzen 5 8MB', 26000000, 19, 'Laptop MSI Gaming AMD Ryzen 5 8MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop MSIGaming sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi1.png', 0, 58, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(183, 1, 'MSI', 'Laptop MSI Nitro 16 Phoenix Intel Core i7 16MB', 34000000, 15, 'Laptop MSI Nitro 16 Phoenix Intel Core i7 16MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop MSINitro 16 Phoenix sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi1.png', 0, 43, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(184, 1, 'Asus', 'Laptop Asus Nitro 5 Eagle Intel Core i5 8MB', 26000000, 17, 'Laptop Asus Nitro 5 Eagle Intel Core i5 8MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop AsusNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus7.png', 1, 38, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(185, 1, 'Lenovo', 'Laptop Lenovo Aspire 3 Intel Core i5 32MB', 26000000, 19, 'Laptop Lenovo Aspire 3 Intel Core i5 32MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LenovoAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo5.png', 1, 107, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(186, 1, 'Asus', 'Laptop Asus Gaming Intel Core i9 32MB', 34000000, 29, 'Laptop Asus Gaming Intel Core i9 32MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AsusGaming sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus5.png', 2, 157, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(187, 1, 'Asus', 'Laptop Asus Legion 5 Intel Core i7 16MB', 34000000, 32, 'Laptop Asus Legion 5 Intel Core i7 16MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop AsusLegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus5.png', 1, 76, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(188, 1, 'MSI', 'Laptop MSI Pavilion 15 AMD Ryzen 3 8MB', 34000000, 27, 'Laptop MSI Pavilion 15 AMD Ryzen 3 8MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop MSIPavilion 15 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi2.png', 0, 41, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(189, 1, 'Dell', 'Laptop Dell Nitro 5 Eagle AMD Ryzen 3 32MB', 34000000, 4, 'Laptop Dell Nitro 5 Eagle AMD Ryzen 3 32MB thuộc dòng sản phẩm của hãng Dell hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop DellNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'dell6.png', 1, 96, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(190, 1, 'Lenovo', 'Laptop Lenovo Nitro 16 Phoenix Intel Core i5 8MB', 22000000, 19, 'Laptop Lenovo Nitro 16 Phoenix Intel Core i5 8MB thuộc dòng sản phẩm của hãng Lenovo hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop LenovoNitro 16 Phoenix sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lenovo1.png', 2, 109, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(191, 1, 'Asus', 'Laptop Asus Nitro 5 Eagle AMD Ryzen 3 16MB', 30000000, 17, 'Laptop Asus Nitro 5 Eagle AMD Ryzen 3 16MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop AsusNitro 5 Eagle sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus4.png', 2, 68, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(192, 1, 'Asus', 'Laptop Asus Vivobook AMD Ryzen 7 16MB', 26000000, 9, 'Laptop Asus Vivobook AMD Ryzen 7 16MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop AsusVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus3.png', 0, 186, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(193, 1, 'Asus', 'Laptop Asus Aspire 3 AMD Ryzen 3 32MB', 26000000, 30, 'Laptop Asus Aspire 3 AMD Ryzen 3 32MB thuộc dòng sản phẩm của hãng Asus hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AsusAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'asus5.png', 2, 196, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(194, 1, 'HP', 'Laptop HP Vivobook AMD Ryzen 7 16MB', 22000000, 23, 'Laptop HP Vivobook AMD Ryzen 7 16MB thuộc dòng sản phẩm của hãng HP hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 7 mạnh mẽ, cùng với dung lượng RAM 16MB, Laptop HPVivobook sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'hp3.png', 2, 154, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(195, 1, 'MSI', 'Laptop MSI Ideapad Intel Core i7 8MB', 22000000, 36, 'Laptop MSI Ideapad Intel Core i7 8MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i7 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop MSIIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi6.png', 2, 111, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(196, 1, 'LG', 'Laptop LG Legion 5 AMD Ryzen 3 32MB', 30000000, 18, 'Laptop LG Legion 5 AMD Ryzen 3 32MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core AMD Ryzen 3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LGLegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg4.png', 0, 51, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(197, 1, 'LG', 'Laptop LG Ideapad Intel Core i5 32MB', 30000000, 38, 'Laptop LG Ideapad Intel Core i5 32MB thuộc dòng sản phẩm của hãng LG hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i5 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop LGIdeapad sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'lg3.png', 1, 36, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(198, 1, 'MSI', 'Laptop MSI Aspire 3 Intel Core i9 8MB', 26000000, 14, 'Laptop MSI Aspire 3 Intel Core i9 8MB thuộc dòng sản phẩm của hãng MSI hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 8MB, Laptop MSIAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'msi6.png', 1, 176, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(199, 1, 'Dell', 'Laptop Dell Aspire 3 Intel Core i3 32MB', 26000000, 3, 'Laptop Dell Aspire 3 Intel Core i3 32MB thuộc dòng sản phẩm của hãng Dell hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i3 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop DellAspire 3 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'dell4.png', 1, 78, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(200, 1, 'Acer', 'Laptop Acer Legion 5 Intel Core i9 32MB', 34000000, 21, 'Laptop Acer Legion 5 Intel Core i9 32MB thuộc dòng sản phẩm của hãng Acer hỗ trợ học tập, làm việc cũng như giải trí. \r\n    Với core Intel Core i9 mạnh mẽ, cùng với dung lượng RAM 32MB, Laptop AcerLegion 5 sẽ giúp bạn xử lý công việc một cách \r\n    mượt mà và nhanh chóng.', 'acer3.png', 1, 150, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(201, 2, 'SamSung', 'Điện thoại SamSung Galaxy Z Flip4', 18000000, 32, 'Điện thoại SamSung Galaxy Z Flip4 chiếc điện thoại của SamSung đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại SamSung Galaxy Z Flip4Sở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'samsung1.png', 0, 94, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(202, 2, 'SamSung', 'Điện thoại SamSung Galaxy Z Fold4', 30000000, 16, 'Điện thoại SamSung Galaxy Z Fold4 chiếc điện thoại của SamSung đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại SamSung Galaxy Z Fold4Sở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'samsung2.png', 2, 145, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(203, 2, 'SamSung', 'Điện thoại SamSung Galaxy A51', 30000000, 8, 'Điện thoại SamSung Galaxy A51 chiếc điện thoại của SamSung đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại SamSung Galaxy A51Sở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'samsung3.png', 1, 147, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(204, 2, 'SamSung', 'Điện thoại SamSung Galaxy A71', 30000000, 12, 'Điện thoại SamSung Galaxy A71 chiếc điện thoại của SamSung đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại SamSung Galaxy A71Sở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'samsung4.png', 2, 70, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(205, 2, 'SamSung', 'Điện thoại SamSung Galaxy S22 Ultra', 21000000, 15, 'Điện thoại SamSung Galaxy S22 Ultra chiếc điện thoại của SamSung đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại SamSung Galaxy S22 UltraSở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'samsung5.png', 0, 53, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(206, 2, 'SamSung', 'Điện thoại SamSung Galaxy S23 Ultra', 18000000, 18, 'Điện thoại SamSung Galaxy S23 Ultra chiếc điện thoại của SamSung đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại SamSung Galaxy S23 UltraSở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'samsung6.png', 1, 100, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(207, 2, 'iPhone', 'Điện thoại iPhone 12', 18000000, 11, 'Điện thoại iPhone 12 chiếc điện thoại của iPhone đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại iPhone 12Sở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'iphone1.png', 0, 102, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(208, 2, 'iPhone', 'Điện thoại iPhone 12 Pro Max', 18000000, 16, 'Điện thoại iPhone 12 Pro Max chiếc điện thoại của iPhone đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại iPhone 12 Pro MaxSở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'iphone2.png', 1, 53, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(209, 2, 'iPhone', 'Điện thoại iPhone 13', 24000000, 20, 'Điện thoại iPhone 13 chiếc điện thoại của iPhone đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại iPhone 13Sở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'iphone3.png', 2, 22, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(210, 2, 'iPhone', 'Điện thoại iPhone 13 Pro', 24000000, 27, 'Điện thoại iPhone 13 Pro chiếc điện thoại của iPhone đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại iPhone 13 ProSở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'iphone4.png', 0, 17, '2023-06-29 10:29:44', '2023-06-29 10:29:44');
INSERT INTO `products` (`id_product`, `id_category`, `firms`, `name`, `price`, `discount`, `description`, `img_product`, `censorship`, `view`, `created_at`, `updated_at`) VALUES
(211, 2, 'iPhone', 'Điện thoại iPhone 14', 21000000, 8, 'Điện thoại iPhone 14 chiếc điện thoại của iPhone đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại iPhone 14Sở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'iphone5.png', 1, 70, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(212, 2, 'Oppo', 'Điện thoại Oppo Find N2 Flip', 24000000, 12, 'Điện thoại Oppo Find N2 Flip chiếc điện thoại của Oppo đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại Oppo Find N2 FlipSở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'oppo1.png', 1, 113, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(213, 2, 'Oppo', 'Điện thoại Oppo Find X5', 30000000, 17, 'Điện thoại Oppo Find X5 chiếc điện thoại của Oppo đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại Oppo Find X5Sở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'oppo2.png', 2, 53, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(214, 2, 'Oppo', 'Điện thoại Oppo Reno8 Pro', 27000000, 2, 'Điện thoại Oppo Reno8 Pro chiếc điện thoại của Oppo đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại Oppo Reno8 ProSở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'oppo3.png', 0, 170, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(215, 2, 'Oppo', 'Điện thoại Oppo Reno8 T', 18000000, 25, 'Điện thoại Oppo Reno8 T chiếc điện thoại của Oppo đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại Oppo Reno8 TSở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'oppo4.png', 1, 11, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(216, 2, 'Oppo', 'Điện thoại Oppo Reno6 Pro', 30000000, 0, 'Điện thoại Oppo Reno6 Pro chiếc điện thoại của Oppo đã được đăng bán chính thức tại Việt Nam. \r\n        Điện thoại Oppo Reno6 ProSở hữu cấu hình mạnh mẽ cùng thiết kế siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.', 'oppo5.png', 1, 164, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(217, 3, 'SamSung', 'Tablet SamSung Galaxy Tab S7', 31000000, 18, 'Bạn có đang mong chờ những sản phẩm chất lượng? Sau hàng loạt các sản phẩm đình đám thì hãng đã tung ra chiếc SamSung Galaxy Tab S7 trang bị những tính năng ngày càng vượt trội và thời thượng.', 'tabletsamsung1.png', 2, 81, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(218, 3, 'SamSung', 'Tablet SamSung Galaxy Tab S8 Ultra', 25000000, 26, 'Bạn có đang mong chờ những sản phẩm chất lượng? Sau hàng loạt các sản phẩm đình đám thì hãng đã tung ra chiếc SamSung Galaxy Tab S8 Ultra trang bị những tính năng ngày càng vượt trội và thời thượng.', 'tabletsamsung2.png', 2, 122, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(219, 3, 'SamSung', 'Tablet SamSung Galaxy Tab A8', 25000000, 34, 'Bạn có đang mong chờ những sản phẩm chất lượng? Sau hàng loạt các sản phẩm đình đám thì hãng đã tung ra chiếc SamSung Galaxy Tab A8 trang bị những tính năng ngày càng vượt trội và thời thượng.', 'tabletsamsung3.png', 0, 199, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(220, 3, 'iPad', 'Tablet iPad Pro M2 12.9 inch', 31000000, 22, 'Bạn có đang mong chờ những sản phẩm chất lượng? Sau hàng loạt các sản phẩm đình đám thì \r\n        hãng đã tung ra chiếc iPad Pro M2 12.9 inch trang bị những tính năng ngày càng vượt trội và thời thượng.', 'ipad1.png', 0, 138, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(221, 3, 'iPad', 'Tablet iPad Pro M2 11 inch', 31000000, 39, 'Bạn có đang mong chờ những sản phẩm chất lượng? Sau hàng loạt các sản phẩm đình đám thì \r\n        hãng đã tung ra chiếc iPad Pro M2 11 inch trang bị những tính năng ngày càng vượt trội và thời thượng.', 'ipad2.png', 2, 49, '2023-06-29 10:29:44', '2023-06-29 10:29:44'),
(222, 3, 'iPad', 'Tablet iPad Air 5 M1', 25000000, 36, 'Bạn có đang mong chờ những sản phẩm chất lượng? Sau hàng loạt các sản phẩm đình đám thì \r\n        hãng đã tung ra chiếc iPad Air 5 M1 trang bị những tính năng ngày càng vượt trội và thời thượng.', 'ipad3.png', 2, 66, '2023-06-29 10:29:44', '2023-06-29 10:29:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id_rate` int(11) NOT NULL COMMENT 'Mã đánh giá',
  `id_product` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `id_user` int(11) NOT NULL,
  `point` float NOT NULL DEFAULT 1 COMMENT 'Điểm đánh giá ',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL COMMENT 'Mã user',
  `email` varchar(255) NOT NULL COMMENT 'Địa chỉ email của user',
  `password` varchar(100) NOT NULL COMMENT 'Mật khẩu đăng nhặp của user',
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 là khách hàng, 1 là nhân viên, 2 là quản trị',
  `day_registered` timestamp NULL DEFAULT current_timestamp() COMMENT 'Ngày đăng kí tài khoản của user '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role`, `day_registered`) VALUES
(60, 'admin@laptopstore.com', 'admin', 2, '2024-06-20 03:37:31'),
(61, 'toanngu.2106@gmail.com', '123456', 0, '2024-06-26 00:18:01'),
(62, 'huystaff@test.vn', '000', 1, '2024-06-26 00:52:51'),
(63, 'duongstaff@test.vn', '000', 1, '2024-06-26 00:53:14'),
(64, 'vantoanstaff@test.vn', '123456', 0, '2024-07-15 03:43:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `email` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `detail_bills`
--
ALTER TABLE `detail_bills`
  ADD PRIMARY KEY (`id_detailbill`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id_rate`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `email` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại hàng', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận', AUTO_INCREMENT=18800;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `detail_bills`
--
ALTER TABLE `detail_bills`
  MODIFY `id_detailbill` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết đơn hàng', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã đánh giá', AUTO_INCREMENT=6102;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã user', AUTO_INCREMENT=65;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `detail_bills`
--
ALTER TABLE `detail_bills`
  ADD CONSTRAINT `detail_bills_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `detail_bills_ibfk_2` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id_bill`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
