-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 08:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_food_ordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(17, 8, 5, 1, '2023-12-13 13:58:57', '2023-12-13 13:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Pizza', 'pizza', 'This is pizza category', 'uploads/category/1701301163.jpg', 'pizza category', 'pizza', 'All type of pizza\'s are stored here.', 0, '2023-11-29 17:39:23', '2023-11-29 17:39:23'),
(10, 'Chicken Fry', 'chicken-fry', 'This is a chicken fry category', 'uploads/category/1701301303.jpg', 'chicken fry category', 'chicken fry', 'All kinds of chicken fries are stored here.', 0, '2023-11-29 17:41:43', '2023-11-29 17:41:43'),
(11, 'Shawarma', 'shawarma', 'This is a shawarma category', 'uploads/category/1701301721.png', 'Shawarma category', 'shawarma', 'All kinds of shawarmas are store here', 0, '2023-11-29 17:48:41', '2023-11-29 17:48:41'),
(12, 'Burger', 'burger', 'This is a burger category', 'uploads/category/1701336765.jpg', 'burger category', 'burger', 'All kinds of burgers are here.', 0, '2023-11-30 03:32:45', '2023-11-30 03:32:45'),
(18, 'Burger', 'burger', 'This is a burger category update', NULL, 'burger category', 'burger category', 'burger category', 0, '2023-12-03 23:55:20', '2023-12-03 23:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_28_185516_create_categories_table', 1),
(7, '2023_11_28_211153_add_details_to_users_table', 2),
(8, '2023_11_28_221153_create_products_table', 3),
(9, '2023_11_28_222531_create_product_images_table', 3),
(10, '2023_12_01_231907_create_wishlists_table', 4),
(11, '2023_12_03_145913_create_profile_details_table', 5),
(12, '2023_12_03_192743_create_reviews_table', 6),
(13, '2023_12_09_064521_add_wallet_balance_to_users_table', 7),
(14, '2023_12_11_061825_create_carts_table', 8),
(15, '2023_12_12_182237_create_orders_table', 9),
(16, '2023_12_12_182846_create_order_items_table', 9),
(17, '2023_12_12_193659_modify_reviews_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(11, 1, 'Track-hioF5D7i', 'Sazzad', 'himel.s.hossain@gmail.com', '01626415005', 'Dhaka', 'in progress', 'Cash on Delivery', NULL, '2023-12-13 09:26:17', '2023-12-13 09:26:17'),
(12, 1, 'Track-JIpuwdeC', 'Sazzad', 'himel.s.hossain@gmail.com', '01626415005', 'Dhaka', 'in progress', 'Cash on Delivery', NULL, '2023-12-13 09:55:50', '2023-12-13 09:55:50'),
(13, 1, 'Track-hEkSHbpU', 'Sazzad', 'himel.s.hossain@gmail.com', '01626415005', 'Dhaka', 'in progress', 'Cash on Delivery', NULL, '2023-12-13 10:00:06', '2023-12-13 10:00:06'),
(14, 8, 'Track-Pf4fA1xV', 'Maria Shifa', 'maria.shifa@gmail.com', '01626415005', 'Dhaka', 'in progress', 'Cash on Delivery', NULL, '2023-12-13 13:37:43', '2023-12-13 13:37:43'),
(15, 5, 'Track-mlqVwAiQ', 'AK Alve', 'ak.alve24@gmail.com', '01626415005', 'Dhaka', 'in progress', 'Cash on Delivery', NULL, '2023-12-14 02:37:54', '2023-12-14 02:37:54'),
(16, 13, 'Track-kNNrTMBZ', 'rahageer', 'rahagir@gmail.com', '01626415005', 'mirpur', 'in progress', 'Cash on Delivery', NULL, '2024-05-02 11:56:49', '2024-05-02 11:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(13, 11, 6, 2, 400, '2023-12-13 09:26:17', '2023-12-13 09:26:17'),
(14, 12, 8, 4, 150, '2023-12-13 09:55:50', '2023-12-13 09:55:50'),
(15, 12, 9, 6, 80, '2023-12-13 09:55:50', '2023-12-13 09:55:50'),
(16, 13, 6, 4, 400, '2023-12-13 10:00:06', '2023-12-13 10:00:06'),
(17, 14, 6, 1, 400, '2023-12-13 13:37:43', '2023-12-13 13:37:43'),
(18, 14, 7, 1, 350, '2023-12-13 13:37:43', '2023-12-13 13:37:43'),
(19, 14, 6, 3, 400, '2023-12-13 13:37:43', '2023-12-13 13:37:43'),
(20, 15, 6, 1, 400, '2023-12-14 02:37:54', '2023-12-14 02:37:54'),
(21, 16, 8, 3, 150, '2024-05-02 11:56:49', '2024-05-02 11:56:49'),
(22, 16, 9, 1, 80, '2024-05-02 11:56:49', '2024-05-02 11:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('sazzad.hossen.himel@g.bracu.ac.bd', '$2y$12$pDBl11YJNy.8FbgHbJvkOObrn6pQ6kpkGZWoGhcwwN5qBDC6rXVq2', '2023-12-14 03:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `main_price` int(11) NOT NULL,
  `discounted_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `popular` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=popular, 0=regular',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden, 0=visible',
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `main_price`, `discounted_price`, `quantity`, `popular`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(6, 12, 'chicken burger', 'chicken-burger', 'This is chicken burger with cheese', 500, 400, 50, 1, 1, 'chicken burger', 'chicken burger', 'This is chicken burger with cheese and cold drink', '2023-12-03 23:22:36', '2023-12-03 23:22:36'),
(7, 12, 'beef burger', 'beef-burger', 'This is beef burger with cheese', 450, 350, 60, 0, 1, 'beef burger with cheese', 'beef burger with cheese', 'beef burger with cheese and cold drink', '2023-12-03 23:24:37', '2023-12-03 23:24:37'),
(8, 11, 'chicken shawarma', 'chicken-shawarma', 'This is chicken shawarma', 200, 150, 100, 1, 1, 'This is chicken shawarma with cheese', 'chicken shawarma with cheese', 'This is chicken shawarma with cheese and sauce', '2023-12-03 23:27:55', '2023-12-03 23:27:55'),
(9, 11, 'Vegetables Shawarma', 'vegetables-shawarma', 'This is Vegetables Shawarma with extra butter', 100, 80, 100, 1, 1, 'This is Vegetables Shawarma', 'Vegetables Shawarma', 'This is Vegetables Shawarma  with extra butter', '2023-12-03 23:30:35', '2023-12-03 23:30:35'),
(10, 10, 'Chicken Fry', 'chicken-fry', 'This is chicken', 500, 400, 50, 1, 1, 'This is chicken', 'This is chicken', 'This is chicken', '2023-12-14 03:58:24', '2023-12-14 03:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 6, 'uploads/products/17016673561.jpg', '2023-12-03 23:22:36', '2023-12-03 23:22:36'),
(4, 7, 'uploads/products/17016674771.jpeg', '2023-12-03 23:24:37', '2023-12-03 23:24:37'),
(5, 8, 'uploads/products/17016676751.jpg', '2023-12-03 23:27:55', '2023-12-03 23:27:55'),
(6, 9, 'uploads/products/17016678351.jpg', '2023-12-03 23:30:35', '2023-12-03 23:30:35'),
(7, 10, 'uploads/products/17025479041.jpeg', '2023-12-14 03:58:24', '2023-12-14 03:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `profile_details`
--

CREATE TABLE `profile_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_details`
--

INSERT INTO `profile_details` (`id`, `user_id`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(2, 4, '01626416006', '66 Mohakhali', '2023-12-03 23:46:56', '2023-12-03 23:46:56'),
(3, 10, '01626415005', 'Dhaka', '2023-12-14 03:49:40', '2023-12-14 03:50:08'),
(4, 13, '01626416006', 'mirpur, dhaka', '2024-05-02 11:48:21', '2024-05-02 11:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `comment`, `created_at`, `updated_at`) VALUES
(17, 10, 9, 'This is Good.', '2023-12-14 03:51:15', '2023-12-14 03:51:15'),
(18, 8, 9, 'This is Good.', '2023-12-14 03:51:51', '2023-12-14 03:51:51'),
(19, 13, 10, 'its good', '2024-05-02 11:53:48', '2024-05-02 11:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `wallet_balance` decimal(8,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = user, 1 = admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `wallet_balance`, `created_at`, `updated_at`, `role_as`) VALUES
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$WSt9MP4sqTGXN4t48aHQMOMlt.nIj7Tz1IUUaDvuCj1JrZT8825aq', NULL, 0, '2023-11-28 15:51:43', '2023-12-11 00:48:57', 1),
(4, 'Sazzad', 'sazzad.hossen.himel@g.bracu.ac.bd', NULL, '$2y$12$U.v.XviX5LkEXRcVDr7xHu1wIi6obXK3BB8L6I8Oq5Ff6sU7aWsTO', '3AXD9SBdZn5ARiH4f8QBK2UlIZvaEKQOmUreGoAGuHI97D9KbIn8upodGShn', 500, '2023-12-03 23:06:49', '2023-12-14 02:56:44', 0),
(8, 'Maria Shifa', 'maria.shifa@gmail.com', NULL, '$2y$12$l59EvZZ525XEE4D7XIhYTu3TRP0JXL7LDqUa6iaXYih8oWEf75VPO', NULL, 1000, '2023-12-03 23:14:46', '2023-12-13 00:47:26', 0),
(9, 'K Alve', 'ak.alve1068@gmail.com', NULL, '$2y$12$czmH72IbZVX3W2Oa.g5xUOMuG/lL8KWZg8IOyelPrfeZacNIdc2MS', NULL, 1000, '2023-12-14 02:26:20', '2023-12-14 02:27:35', 0),
(10, 'Sazzad', 'himel.s.hossain@gmail.com', NULL, '$2y$12$jfpNO5xX.mfZ9j7cdNhhf.eTg/72MJ1iAzXLEjis2f1xU/Lr4i/Ay', 'XNCFicESRNM5OmKhavm5A0IYZ1tsUbMHJ8jmXB0UOERaaX3XgOWbjawl0q4h', 0, '2023-12-14 03:44:38', '2023-12-14 03:50:08', 0),
(12, 'rahageer', 'rahageersaadman2000@gmail.com', NULL, 'rahageer', NULL, 0, NULL, NULL, 0),
(13, 'rahageer', 'rahagir@gmail.com', NULL, '$2y$12$BqJtPgkn/B0slyRtuQhjne1xiD8lbQbBdJ0Y1EGWBD1YUmsdJvyHm', NULL, 500, '2024-05-02 11:46:51', '2024-05-02 11:58:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 8, 7, '2023-12-13 13:59:51', '2023-12-13 13:59:51'),
(9, 1, 5, '2023-12-13 14:06:19', '2023-12-13 14:06:19'),
(10, 9, 6, '2023-12-14 02:33:51', '2023-12-14 02:33:51'),
(11, 8, 9, '2023-12-14 03:52:10', '2023-12-14 03:52:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profile_details_user_id_unique` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviews_user_id_unique` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile_details`
--
ALTER TABLE `profile_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD CONSTRAINT `profile_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
