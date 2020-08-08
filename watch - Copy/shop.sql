-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 20, 2020 lúc 11:04 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `order`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Automatic', 'automatic', 22, 0, 'Automatic', 'Đồng hồ cơ', NULL, NULL),
(3, 'Baby G', 'baby-g', 22, 0, 'Baby-G', 'Đồng hồ Baby-G', NULL, NULL),
(4, 'SmartWatch', 'smartwatch', 22, 0, 'SmartWatch', 'Đồng hồ thông minh', NULL, NULL),
(5, 'AppleWatch', 'applewatch', 22, 4, 'AppleWatch', 'Đồng hồ thông minh Apple', NULL, NULL),
(6, 'MiBand', 'miband', 22, 4, 'MiBand', 'Xiaomi Smart Watch', NULL, NULL),
(8, 'Ahaha', 'ahaha', 22, 4, 'MiBand', 'Ahaha', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_03_12_101742_create_cates_table', 1),
(7, '2020_03_12_102458_create_products_table', 1),
(8, '2020_03_12_103642_create_product_images_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `intro` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `intro`, `content`, `image`, `keywords`, `description`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(1, 'A MiBand 3', 'a-miband-3', 7000, '<p>MiBand Pro</p>', '<p>OK</p>', 'product_1.jpg', 'MiBand', 'MiBand OK', 2, 6, NULL, '2020-04-07 00:16:06'),
(8, 'Apple Watch 4', 'apple-watch-4', 9999, '<p>OK</p>', '<p>OK</p>', 'product_2.jpg', NULL, NULL, 2, 5, '2020-03-17 21:06:39', '2020-04-07 05:13:30'),
(9, 'MiBand test', 'miband-test', 8000, NULL, NULL, 'product_3.jpg', NULL, NULL, 2, 1, '2020-03-18 18:06:23', '2020-04-07 05:13:57'),
(10, 'AAA', 'aaa', 8888, '<p>AAA</p>', '<p>AAA</p>', 'product_4.jpg', 'AAA', 'AAA', 1, 1, '2020-03-18 18:06:46', '2020-03-20 00:18:34'),
(12, 'hihi test', 'hihi-test', 8000, NULL, NULL, 'product_5.jpg', NULL, NULL, 2, 1, '2020-03-19 19:35:26', '2020-04-07 05:14:04'),
(13, 'MiBand Mi', 'miband-mi', 8888, '<p>OK</p>', '<p>OK</p>', 'product_6.jpg', NULL, NULL, 2, 6, '2020-03-20 22:35:33', '2020-04-07 00:53:04'),
(14, 'MiBand Mi2', 'miband-mi2', 8888, '<p>OK</p>', '<p>OK</p>', 'product_7.jpg', NULL, NULL, 2, 6, '2020-03-20 22:35:33', '2020-03-20 22:35:33'),
(15, 'MiBand Mi3', 'miband-mi3', 8888, '<p>OK</p>', '<p>OK</p>', 'product_8.jpg', NULL, NULL, 2, 6, '2020-03-20 22:35:33', '2020-03-20 22:35:33'),
(17, 'MiBand Mi4', 'miband-mi4', 8888, '<p>OK</p>', '<p>OK</p>', 'product_8.jpg', NULL, NULL, 2, 6, '2020-03-20 22:35:33', '2020-03-20 22:35:33'),
(18, 'MiBand Mi5', 'miband-mi5', 8888, '<p>OK</p>', '<p>OK</p>', 'product_8.jpg', NULL, NULL, 2, 6, '2020-03-20 22:35:33', '2020-03-20 22:35:33'),
(19, 'MiBand Mi6', 'miband-mi6', 8888, '<p>OK</p>', '<p>OK</p>', 'product_8.jpg', NULL, NULL, 2, 6, '2020-03-20 22:35:33', '2020-03-20 22:35:33'),
(20, 'MiBand Mi7', 'miband-mi7', 8888, '<p>OK</p>', '<p>OK</p>', 'product_8.jpg', NULL, NULL, 2, 6, '2020-03-20 22:35:33', '2020-03-20 22:35:33'),
(21, 'MiBand Mi8', 'miband-mi8', 8888, '<p>OK</p>', '<p>OK</p>', 'product_8.jpg', NULL, NULL, 2, 6, '2020-03-20 22:35:33', '2020-03-20 22:35:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 'IMG_20200110_153325_AO_HDR.jpg', 8, NULL, NULL),
(14, 'IMG_20200110_085112_AO_HDR.jpg', 12, NULL, NULL),
(15, 'IMG_20200110_153301_AO_HDR.jpg', 12, NULL, NULL),
(16, 'IMG_20200109_094710_AO_HDR.jpg', 12, NULL, NULL),
(17, 'IMG_20200110_085057_AO_HDR.jpg', 12, NULL, NULL),
(18, 'IMG_20200110_085112_AO_HDR.jpg', 12, NULL, NULL),
(21, 'IMG_20200110_085057_AO_HDR.jpg', 10, NULL, NULL),
(22, 'IMG_20200110_085112_AO_HDR.jpg', 10, NULL, NULL),
(23, 'IMG_20200110_085057_AO_HDR.jpg', 10, NULL, NULL),
(24, 'IMG_20200109_094513_AO_HDR.jpg', 10, NULL, NULL),
(25, 'IMG_20200109_094710_AO_HDR.jpg', 13, NULL, NULL),
(26, 'product_3.jpg', 9, NULL, NULL),
(27, 'details_2.jpg', 9, NULL, NULL),
(28, 'details_3.jpg', 9, NULL, NULL),
(29, 'details_1.jpg', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$H8YteJtS2VwEFuMFz96T1elrQW9ZOWr.ltcp1FogrdAyRO.H/qM8u', 'test@gmail.com', 1, '4fNxg6oksjpTGpHPt1uxpSoJ204VayABitAD32ad', NULL, NULL),
(2, 'admin2', '$2y$10$xU0o.ZGVjDI5cE9FxlsEgeNrGna5m4oC93s9fWkvZ.CV98RjQp9ym', 'haovobaomat@gmail.com', 1, 'Qq5w0aV4NpDOJ5QkzqLMRa4QMGdyRjWl5DnlPgGhT4puPMZTP1wqYmU7hj9G', '2020-03-20 01:21:08', '2020-03-20 01:21:08'),
(4, 'AAA', '$2y$10$MdxqEQf2uWwaMSnQYZuft.z/iEBTdZ./tLhdw7IVMR3I5DmPa8TQy', 'haovobaomat@gmail.com', 2, 'qVge3UzQELJ2XilXnw7BuP0eaXmFzSTlG8S1DGdNsNqR4wWRbuc24T7Uz29a', '2020-03-20 01:32:53', '2020-03-20 01:32:53'),
(9, 'Vo Anh Hao', '$2y$10$AO1akLas7heK333I.o6T2uEOAD4F8RLE79bsAQzh6OS3UFlxmjnoG', 'haovobaomat@gmail.com', 0, NULL, '2020-05-11 19:22:42', '2020-05-11 19:22:42');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
