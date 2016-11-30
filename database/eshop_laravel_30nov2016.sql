-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2016 at 03:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'WOMEN', NULL, NULL),
(2, 'MEN', NULL, NULL),
(3, 'KIDS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags`
--

CREATE TABLE `blog_post_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_post_tags`
--

INSERT INTO `blog_post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 9, 1, NULL, NULL),
(10, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'Pink', NULL, NULL),
(2, 'T-Shirt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `name`, `status`, `created_at`, `updated_at`, `created_at_ip`, `updated_at_ip`) VALUES
(9, '15', 'Asus', 'A', '2016-11-16 22:50:22', '2016-11-16 22:50:22', NULL, NULL),
(10, '15', 'Huawei', 'A', '2016-11-16 22:50:33', '2016-11-16 22:50:33', NULL, NULL),
(11, '15', 'Samsung', 'A', '2016-11-16 22:50:44', '2016-11-16 22:50:44', NULL, NULL),
(12, '15', 'Apple', 'A', '2016-11-16 22:51:37', '2016-11-16 22:51:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_set` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `main_category_id`, `name`, `slug`, `menu_set`, `menu_type`, `status`, `description`, `created_at`, `updated_at`, `created_at_ip`, `updated_at_ip`) VALUES
(12, 0, 'Electronics', 'electronics', 'Y', 'main', 'A', '', '2016-11-16 22:40:11', '2016-11-16 22:40:11', NULL, NULL),
(13, 0, 'Women''s Fashion', 'womens_fashion', 'Y', 'main', 'A', '', '2016-11-16 22:40:46', '2016-11-16 22:40:46', NULL, NULL),
(14, 0, 'Men''s Fashion', 'mens_fashion', 'Y', 'main', 'A', '', '2016-11-16 22:41:06', '2016-11-16 22:41:16', NULL, NULL),
(15, 12, 'Mobiles', 'mobiles', NULL, 'sub', 'A', '', '2016-11-16 22:42:10', '2016-11-16 22:42:10', NULL, NULL),
(16, 12, 'Computers', 'computers', NULL, 'sub', 'A', '', '2016-11-16 22:42:35', '2016-11-16 22:42:35', NULL, NULL),
(17, 13, 'Tops', 'womens_tops', NULL, 'sub', 'A', '', '2016-11-16 22:43:15', '2016-11-16 22:43:15', NULL, NULL),
(19, 14, 'Tops', 'mens_top', NULL, 'sub', 'A', '', '2016-11-16 22:49:53', '2016-11-16 22:49:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `name`) VALUES
(1, 14, 'Kuala Lumpur'),
(2, 1, 'Johor Bahru'),
(3, 1, 'Pasir Gudang'),
(4, 1, 'Skudai'),
(5, 1, 'Nusajaya'),
(6, 1, 'Muar'),
(7, 1, 'Batu Pahat'),
(8, 1, 'Yong Peng'),
(9, 1, 'Parit Raja'),
(10, 1, 'Kluang'),
(11, 1, 'Kulai'),
(12, 1, 'Kota Tinggi'),
(13, 1, 'Segamat'),
(14, 2, 'Sungai Petani'),
(15, 2, 'Alor Setar'),
(16, 2, 'Kulim'),
(17, 2, 'Jitra'),
(18, 3, 'Kota Bharu'),
(19, 3, 'Pasir Mas'),
(20, 4, 'Bandaraya Melaka'),
(21, 4, 'Ayer Keroh'),
(22, 4, 'Alor Gajah'),
(23, 4, 'Masjid Tanah'),
(24, 5, 'Seremban'),
(25, 5, 'Nilai'),
(26, 6, 'Kuantan'),
(27, 6, 'Temerloh'),
(28, 7, 'Georgetown'),
(29, 7, 'Bukit Mertajam'),
(30, 7, 'Butterworth'),
(31, 7, 'Bayan Lepas'),
(32, 7, 'Nibong Tebal'),
(33, 7, 'Sungai Jawi'),
(34, 7, 'Seberang Perai'),
(35, 8, 'Ipoh'),
(36, 8, 'Batu Gajah'),
(37, 8, 'Taiping'),
(38, 8, 'Sitiawan'),
(39, 8, 'Manjung'),
(40, 8, 'Teluk Intan'),
(41, 8, 'Parit Buntar'),
(42, 8, 'Tanjung Malim'),
(43, 8, 'Tapah'),
(45, 9, 'Kangar'),
(46, 12, 'Kota Kinabalu'),
(47, 12, 'Tawau'),
(48, 12, 'Sandakan'),
(49, 12, 'Lahad Datu'),
(50, 12, 'Keningau'),
(51, 13, 'Kuching'),
(52, 13, 'Miri'),
(53, 13, 'Sibu'),
(54, 13, 'Bintulu'),
(55, 10, 'Shah Alam'),
(56, 10, 'Petaling Jaya'),
(57, 10, 'Subang Jaya'),
(58, 10, 'Kajang'),
(59, 10, 'Cheras'),
(60, 10, 'Ampang'),
(61, 10, 'Klang'),
(62, 10, 'Selayang'),
(63, 10, 'Rawang'),
(64, 10, 'Banting'),
(65, 10, 'Sepang'),
(66, 10, 'Kuala Selangor'),
(67, 10, 'Kuala Kubu Bharu'),
(68, 11, 'Kuala Terengganu'),
(69, 11, 'Chukai');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_group` varchar(10) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `username`, `password`, `user_group`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'aiman87', '$2y$10$R5Erye0e9KqqnO2Ukg3vru1Xkoym9xbEAMEphCLztA9EEtZBBSp2a', 'Merchant', 'rM6igb05p5Z5B8yhChuNBaCOkVMQGugtIJwGYcMpkFw4GP5hX1jaO74mU60l', '2016-10-21 07:30:38', '2016-09-21 08:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `merchants_bus_details`
--

CREATE TABLE `merchants_bus_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants_bus_details`
--

INSERT INTO `merchants_bus_details` (`id`, `user_id`, `name`, `email`, `phone`, `updated_at`, `created_at`) VALUES
(1, 3, 'Aiman Zaidan', 'aiman@multibase.com.my', '0176219306', '2016-10-27 20:46:28', '2016-10-27 20:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `merchants_info`
--

CREATE TABLE `merchants_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(30) NOT NULL,
  `store_url` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants_info`
--

INSERT INTO `merchants_info` (`id`, `user_id`, `store_name`, `store_url`, `status`, `updated_at`, `created_at`) VALUES
(1, 3, 'AiFa Store', 'aifastore', 'Approved', '2016-10-28 04:51:23', '2016-10-27 20:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_return`
--

CREATE TABLE `merchant_return` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `set_default` varchar(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_return`
--

INSERT INTO `merchant_return` (`id`, `user_id`, `title`, `name`, `address`, `city`, `postcode`, `state`, `phone`, `set_default`, `created_at`, `updated_at`) VALUES
(1, 3, 'Default', 'Aiman Zaidan', 'No 66-1, Jalan Wangsa Delima 6, Pusat Bandar Wangsa Maju,', 'Kuala Lumpur', '53300', 'Kuala Lumpur', '0176219306', NULL, '2016-11-28 08:41:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_shipping`
--

CREATE TABLE `merchant_shipping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `set_default` varchar(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_shipping`
--

INSERT INTO `merchant_shipping` (`id`, `user_id`, `title`, `name`, `address`, `city`, `postcode`, `state`, `phone`, `set_default`, `created_at`, `updated_at`) VALUES
(1, 3, 'Default', 'Aiman Zaidan', 'No 66-1, Jalan Wangsa Delima 6, Pusat Bandar Wangsa Maju,', 'Kuala Lumpur', '53300', 'Kuala Lumpur', '0176219306', NULL, '2016-11-28 08:41:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_13_042302_create_item_table', 1),
('2016_09_13_043717_merchants', 2),
('2016_09_13_044737_add_gender_to_merchants', 3),
('2016_09_13_064908_modify_gender_in_merchants', 3),
('2016_09_13_065335_make_gender_null_in_merchants', 4),
('2016_09_13_070722_create_posts_table', 5),
('2016_09_13_070732_create_products_table', 5),
('2016_09_13_070742_create_categories_table', 5),
('2016_09_13_070751_create_brands_table', 5),
('2016_09_14_070514_add_category_id_image_to_posts', 6),
('2016_09_14_075250_blog_categories', 7),
('2016_09_14_075351_blog_tags', 7),
('2016_09_14_075750_blog_post_tags', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog` tinyint(1) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `url`, `title`, `description`, `content`, `image`, `blog`, `category_id`, `created_at`, `updated_at`, `created_at_ip`, `updated_at_ip`) VALUES
(1, 'veritatis', 'Dolorum est repellat quo nemo.', 'Nemo corporis quisquam quia et magni architecto accusantium modi. Culpa vero sint labore corrupti ut consequatur. Labore laudantium aliquam voluptate minus.', 'Reiciendis praesentium est nemo eveniet dolor dolores maxime voluptas. Eum aut ut laborum. Recusandae id sed amet quam.', 'blog-one.jpg', 1, 1, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(2, 'dolor', 'Dolore delectus veritatis repellendus molestiae sed id.', 'Velit aut veniam aut quasi ut. Perferendis et et sit velit. Explicabo quidem tenetur a perferendis natus odio voluptates sit.', 'Praesentium voluptas temporibus impedit labore exercitationem. Sint rerum impedit velit dicta. Sequi et porro ab omnis et veritatis alias. Nam amet et dolorem consequatur dolorum rerum.', 'blog-two.jpg', 1, 2, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(3, 'est', 'Tempore explicabo numquam esse ducimus et et illum.', 'Natus laudantium et deleniti. Laborum fugiat nulla iure neque. Quia dolorum sapiente ut voluptatibus saepe voluptate. Tempora voluptatibus eos provident porro et voluptatem iste.', 'Excepturi vero qui eligendi. Omnis aut et qui. Blanditiis mollitia quis iste molestiae ab.', 'blog-two.jpg', 1, 3, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(4, 'quo', 'Autem ut consectetur quia alias id est quisquam.', 'In doloremque error nihil animi qui esse. Voluptatibus ipsam libero voluptas quas natus pariatur.', 'Voluptatibus sapiente et excepturi expedita odit sunt dolores aut. Quia alias ex praesentium rerum sunt.', 'blog-three.jpg', 1, 1, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(5, 'libero', 'Voluptatibus quis sunt aperiam quaerat non eius qui.', 'Quis odio blanditiis error possimus. Quo fuga repellendus iste et maiores voluptas. Quae eligendi dolorum dolorem voluptas et in. Nihil deleniti necessitatibus pariatur non magnam.', 'Qui praesentium et et voluptas. Quibusdam consequatur quis nisi animi vero est occaecati. Sunt voluptates et dolor fugiat aspernatur odio non.', 'blog-three.jpg', 1, 1, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(6, 'nam', 'Voluptates vel voluptatem dolores sed delectus.', 'Quam error voluptas iste nostrum dicta minima repellendus ut. Vero iure qui quidem ut voluptates sunt magni voluptas. Nisi fuga eius aut perspiciatis velit ullam nesciunt.', 'Animi eaque magnam molestias laborum dolore. Reiciendis fugiat harum voluptatem voluptatem facilis sunt quia. Est recusandae suscipit vel.', 'blog-one.jpg', 1, 1, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(7, 'ipsa', 'Repudiandae recusandae quia vitae odio repellendus.', 'Neque officiis ab facere ducimus. Dicta autem enim consequuntur eum. Deleniti velit assumenda ea ipsam. Aliquam hic maiores dolores rerum qui sed qui.', 'Maxime sed distinctio vitae sapiente id. Eaque odit sit iure ut animi in accusantium. Ut qui qui nisi minus.', 'blog-three.jpg', 1, 1, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(8, 'iusto', 'Numquam doloremque quibusdam commodi error nihil ducimus.', 'Quaerat voluptas accusantium labore necessitatibus. Et et quisquam dolorem reiciendis. Soluta adipisci expedita similique veritatis. Quia delectus et in ut. Facilis velit in odio laborum similique quasi.', 'Atque corporis saepe excepturi odit dolores. Tempora quaerat est suscipit tenetur quis. Rerum ducimus vero voluptatem non. Sequi incidunt natus quae non perspiciatis laborum.', 'blog-one.jpg', 1, 1, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(9, 'dolores', 'Aperiam veritatis est minus perspiciatis molestiae.', 'Accusantium a magni consequatur ab tempore eligendi. Sed quia omnis voluptatum sint. Expedita rerum et repellat recusandae perferendis optio. Aut culpa quis enim adipisci eos.', 'Recusandae sunt ea nobis consequuntur non. Labore illo dolore fuga perferendis odit laudantium. Dolorum tenetur aut sit nobis dolorem praesentium.', 'blog-three.jpg', 1, 3, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(10, 'quaerat', 'Enim nihil doloribus animi officiis rerum nesciunt ut consequatur.', 'Ad cum rem doloremque rerum cupiditate. Dolorem nisi ut expedita sed fugit doloribus. Id libero placeat vero aut consequatur eaque. Saepe necessitatibus quas harum quas voluptates velit. Vitae dignissimos quis iste dignissimos.', 'Autem non laborum ab voluptatum dolorum error est ipsam. Eos atque sed dolorem sint similique. Sint minus incidunt facilis nostrum sed eum.', 'blog-three.jpg', 1, 2, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(11, 'consequuntur', 'Et sequi ex velit aut sint vel.', 'Qui debitis culpa ullam. Ut recusandae quis placeat nesciunt culpa fuga eius. Vel unde eligendi quo culpa facere similique voluptatem et. Perspiciatis et id quia debitis harum sapiente dicta sit. Vel voluptatum cumque atque sunt deleniti ullam.', 'Consequatur enim et nihil quia et error doloremque. Explicabo labore voluptas aliquam cupiditate. Aut itaque et ut rem. Ducimus quae quam quia ut numquam dolor ducimus.', 'blog-three.jpg', 1, 1, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(12, 'nesciunt', 'Consequuntur dolorem quo id maiores.', 'Aperiam eius mollitia vitae est ratione aliquam veniam. Ipsa tempora nesciunt et aut. Incidunt iste odio illum laudantium. Non ducimus quam quod est.', 'Autem ipsum atque rem temporibus rem eum. Dolores et in qui. Est saepe quisquam porro rerum voluptas.', 'blog-two.jpg', 1, 3, NULL, NULL, '192.168.0.77', '192.168.0.77');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `merchants_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `merchants_id`, `created_at`, `updated_at`, `created_at_ip`, `updated_at_ip`) VALUES
(5, 15, 12, 3, '2016-11-16 23:00:53', '2016-11-16 23:00:53', NULL, NULL),
(6, 15, 11, 3, '2016-11-16 23:09:45', '2016-11-16 23:09:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_info`
--

CREATE TABLE `products_info` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_code` varchar(50) DEFAULT NULL,
  `short_details` text NOT NULL,
  `details` text NOT NULL,
  `gst_type` varchar(10) NOT NULL,
  `selling_period_set` varchar(1) NOT NULL,
  `selling_period_day` varchar(15) DEFAULT NULL,
  `selling_period_start` date DEFAULT NULL,
  `selling_period_end` date DEFAULT NULL,
  `price` double NOT NULL,
  `tier_price` varchar(15) DEFAULT NULL,
  `inst_price` double DEFAULT NULL,
  `discount_set` varchar(1) DEFAULT NULL,
  `discount_sel` varchar(15) DEFAULT NULL,
  `discount_val` double DEFAULT NULL,
  `discount_period_set` varchar(1) DEFAULT NULL,
  `discount_period_start` date DEFAULT NULL,
  `discount_period_end` date DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `option_id` varchar(255) DEFAULT NULL,
  `merchant_shipping_id` int(11) DEFAULT NULL,
  `merchant_return_id` int(11) DEFAULT NULL,
  `shipping_method` varchar(20) NOT NULL,
  `ship_rate` varchar(15) NOT NULL,
  `ship_rate_id` int(11) DEFAULT NULL,
  `after_sale_serv` text,
  `return_policy` text NOT NULL,
  `promo_set` varchar(1) DEFAULT NULL,
  `promo_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_info`
--

INSERT INTO `products_info` (`id`, `products_id`, `type`, `prod_name`, `prod_code`, `short_details`, `details`, `gst_type`, `selling_period_set`, `selling_period_day`, `selling_period_start`, `selling_period_end`, `price`, `tier_price`, `inst_price`, `discount_set`, `discount_sel`, `discount_val`, `discount_period_set`, `discount_period_start`, `discount_period_end`, `weight`, `stock_quantity`, `option_id`, `merchant_shipping_id`, `merchant_return_id`, `shipping_method`, `ship_rate`, `ship_rate_id`, `after_sale_serv`, `return_policy`, `promo_set`, `promo_id`, `created_at`, `updated_at`) VALUES
(2, 5, 'New', ' Apple iPhone 7 128GB (Gold)', 'AP564ELAA8DUFZANMY-17839644', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">1 year Apple Malaysia Warranty</li>\r\n<li class="">4.7 inch HD Retina Display with 3D Touch</li>\r\n<li class="">A10 Fusion chip 64-bit quad-core processor</li>\r\n<li class="">Static Home Button (pressure-sentitive button)</li>\r\n<li class="">Water - Resistant body with IP67 certified</li>\r\n<li class="">12MP Rear camera with optical image stabilization</li>\r\n<li class="">7MP Front camer with auto-image stabilzation</li>\r\n<li class="">Digital zoom up to 5x</li>\r\n<li class="">Dual Stereo Speaker on top &amp; bottom iPhone 7</li>\r\n<li class="">New Wireless AirPod headphone (not included)</li>\r\n</ul>', '<p><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/vaHzUn9.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/vaHzUn9.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/PPSVzIY.png" width="80%&rdquo;" data-original="http://i.imgur.com/PPSVzIY.png" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/FhAly06.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/FhAly06.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/LCExxD0.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/LCExxD0.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/XFcy7C6.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/XFcy7C6.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/nSFt7Uf.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/nSFt7Uf.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/HlOpdRK.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/HlOpdRK.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/CQS4lYl.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/CQS4lYl.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/MyLqflj.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/MyLqflj.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/KtTiPqy.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/KtTiPqy.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/89PsLBR.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/89PsLBR.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/BJQP16i.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/BJQP16i.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/Z3MLlmy.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/Z3MLlmy.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/bN8QrnX.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/bN8QrnX.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/VVhYuU5.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/VVhYuU5.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/polo53g.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/polo53g.jpg" /></center>', 'Exempted', 'Y', '5', '2016-11-17', NULL, 3459, '12', 288.25, 'N', 'RM', NULL, NULL, NULL, NULL, 0.14, 25, NULL, NULL, NULL, 'courier', 'Free', NULL, 'Feedback', 'Bayor la', 'N', NULL, '2016-11-17 07:00:54', '2016-11-17 07:00:54'),
(3, 6, 'New', 'Samsung S7 Edge Dual Sim 32Gb Gold', 'SA356ELAA5HXJDANMY-11177469', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Qualcomm Snapdragon 820 MSM8996 2.2GHz quad-core processor</li>\r\n<li class="">Android 6.0 Marshmallow operating system</li>\r\n<li class="">4G mobile hotspot capability with support for up to 10 devices</li>\r\n<li class="">WiFi Capable 802.11 a/b/g/n/ac</li>\r\n<li class="">5.5" WQHD touch-screen display</li>\r\n<li class="">Bluetooth 4.2</li>\r\n</ul>', '<div class="feature col2 reverse">\r\n<div>\r\n<div><strong>Slim in a big way</strong></div>\r\n<p>Big screen. Slim profile. So you can get more photos, movies and games on the Quad HD Super AMOLED display, and fit it all in your back pocket.</p>\r\n</div>\r\n</div>\r\n<div class="feature col2">\r\n<div>\r\n<p><img class="productlazyimage" src="http://www.samsung.com/us/system/features/f0029861/Swipe_your_in_318x238.png" alt="" data-original="http://www.samsung.com/us/system/features/f0029861/Swipe_your_in_318x238.png" /></p>\r\n</div>\r\n<div>\r\n<div><strong>Swipe and you&rsquo;re in</strong></div>\r\n<p>Swipe the dual-edge screen for updates in an instant, from texts and calls to breaking news and weather. Plus, the curved screen lets you see even more.</p>\r\n</div>\r\n</div>\r\n<div class="feature col2 reverse">\r\n<div>\r\n<p><img class="productlazyimage" src="http://www.samsung.com/us/system/features/f0029860/Because_water_318x238.png" alt="" data-original="http://www.samsung.com/us/system/features/f0029860/Because_water_318x238.png" /></p>\r\n</div>\r\n<div>\r\n<div><strong>Because water happens</strong></div>\r\n<p>Bring on the spills, splashes and dunks. Now you won&rsquo;t need to put your phone in a bowl of rice because of a little water.&nbsp;1</p>\r\n</div>\r\n</div>\r\n<div class="feature col2">\r\n<div>\r\n<p><img class="productlazyimage" src="http://www.samsung.com/us/system/features/f0029859/Post_worthy_day_318x238.png" alt="" data-original="http://www.samsung.com/us/system/features/f0029859/Post_worthy_day_318x238.png" /></p>\r\n</div>\r\n<div>\r\n<div><strong>Post-worthy day or night</strong></div>\r\n<p>Our new camera has an advanced sensor for catching details in low light, and a fast auto-focus for photos with less blur.</p>\r\n</div>\r\n</div>\r\n<div class="feature">&nbsp;</div>', 'Exempted', 'Y', '7', '2016-11-17', NULL, 2639, NULL, NULL, 'N', 'RM', NULL, NULL, NULL, NULL, 0.4, 42, NULL, NULL, NULL, 'courier', 'Free', NULL, 'Beli dulu baru tau', 'tak boleh pulang', 'N', NULL, '2016-11-17 07:09:45', '2016-11-17 07:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `primary_img` varchar(1) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `products_id`, `primary_img`, `name`, `path`, `size`, `created_at`, `updated_at`) VALUES
(11, 5, NULL, '0007067_apple-iphone-7-128gb-gold.jpeg', 'uploads/5/', NULL, '2016-11-16 23:00:53', '2016-11-16 23:00:53'),
(12, 5, 'Y', 'apple-iphone-7plus-128gb-gold-XS-1.jpg', 'uploads/5/', NULL, '2016-11-17 07:01:34', '2016-11-16 23:00:53'),
(13, 6, 'Y', 'samsung-galaxy-s7-edge-32gb-gold-2694-5125605-a2f0b5c1218f40e3ca5b7a853b71e361-catalog_233.jpg', 'uploads/6/', NULL, '2016-11-16 23:09:45', '2016-11-16 23:09:45'),
(14, 6, NULL, 'samsung-s7-edge-dual-sim-32gb-gold-5910-1863595-40ab3c73df7fc8aa7bf984aa29779aa9-catalog_233.jpg', 'uploads/6/', NULL, '2016-11-16 23:09:45', '2016-11-16 23:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_option`
--

CREATE TABLE `product_option` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_option`
--

INSERT INTO `product_option` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Color', 'color', 'A', '2016-11-17 19:09:57', '2016-11-17 19:09:57'),
(3, 'Model', 'model', 'A', '2016-11-17 19:57:06', '2016-11-17 19:57:06'),
(4, 'Size', 'size', 'A', '2016-11-23 03:22:36', '2016-11-22 19:22:36'),
(11, 'Label', 'label', 'N', '2016-11-18 00:30:11', '2016-11-18 00:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_option_group`
--

CREATE TABLE `product_option_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prod_opt` varchar(255) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_option_group`
--

INSERT INTO `product_option_group` (`id`, `name`, `prod_opt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '4,1', 'A', '2016-11-24 08:25:51', '2016-11-24 00:25:51'),
(3, 'Fashion', '1', 'A', '2016-11-24 08:27:29', '2016-11-24 00:27:29'),
(4, 'Womens', NULL, 'A', '2016-11-23 00:29:39', '2016-11-23 00:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `promo_text` varchar(255) NOT NULL,
  `country_origin` varchar(100) NOT NULL,
  `mul_pur_disc_set` varchar(1) DEFAULT NULL,
  `mul_pur_disc_item` int(11) DEFAULT NULL,
  `mul_pur_disc_sel` varchar(10) DEFAULT NULL,
  `mul_pur_disc` double DEFAULT NULL,
  `mul_pur_disc_period_set` varchar(1) DEFAULT NULL,
  `mul_pur_period_start` date DEFAULT NULL,
  `mul_pur_period_end` date DEFAULT NULL,
  `min_pur` varchar(20) DEFAULT NULL,
  `min_pur_val` int(11) DEFAULT NULL,
  `max_pur` varchar(20) DEFAULT NULL,
  `max_per_ord` int(11) DEFAULT NULL,
  `max_per_pers` int(11) DEFAULT NULL,
  `ad_sel` varchar(10) NOT NULL,
  `ad_start` date DEFAULT NULL,
  `ad_end` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_rate`
--

CREATE TABLE `shipping_rate` (
  `id` int(11) NOT NULL,
  `wm_kg` float DEFAULT NULL,
  `wm_rm` double DEFAULT NULL,
  `same_all_reg` varchar(1) DEFAULT NULL,
  `add_wm_kg` float DEFAULT NULL,
  `add_wm_rm` double DEFAULT NULL,
  `sbh_kg` float DEFAULT NULL,
  `sbh_rm` double DEFAULT NULL,
  `add_sbh_kg` float DEFAULT NULL,
  `add_sbh_rm` double DEFAULT NULL,
  `srk_kg` float DEFAULT NULL,
  `srk_rm` double DEFAULT NULL,
  `add_srk_kg` float DEFAULT NULL,
  `add_srk_rm` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'Johor'),
(2, 'Kedah'),
(3, 'Kelantan'),
(4, 'Melaka'),
(5, 'Negeri Sembilan'),
(6, 'Pahang'),
(7, 'Pulau Pinang'),
(8, 'Perak'),
(9, 'Perlis'),
(10, 'Selangor'),
(11, 'Terengganu'),
(12, 'Sabah'),
(13, 'Sarawak'),
(14, 'Wilayah Persekutuan Kuala Lumpur'),
(15, 'Wilayah Persekutuan Kuala Labuan'),
(16, 'Wilayah Persekutuan Kuala Putrajaya'),
(99, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_group` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_group`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Zaidan Hussein', 'zaidan60@gmail.com', '$2y$10$9OKPHyBjQ43yF2HdM.3D0.GQNWNi1eNUjDZ018Xaia7/12SAZ8qJW', 'Customer', '8BYk3E7aC9SoCc0fFJYZQyBTXQjF6zcyXpauxD9Fs3yCR5IAbzkioh7gE6R7', '2016-10-26 19:57:54', '2016-11-10 23:25:04'),
(3, 'Aiman Zaidan', 'aiman@multibase.com.my', '$2y$10$YcAwNhmlPa7DcBZTNqEbVueCpYg5TN4Tfz7JtMkw5zhjzHbSOfi.G', 'Admin', 'MzGZWKHKR5G0wiJqPk909v2WIxjuz4MYflppCrxbnMfzWfOCLwTi21vKpVsd', '2016-10-27 20:46:28', '2016-11-28 01:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(2) NOT NULL,
  `c_number` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `dob`, `gender`, `c_number`, `created_at`, `updated_at`) VALUES
(1, 2, '1960-01-19', 'F', '0129811617', '2016-10-26 19:57:54', '2016-10-26 19:57:54'),
(2, 3, '1987-08-18', 'F', '0176219306', '2016-10-27 20:46:28', '2016-10-27 20:46:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_category_unique` (`category`);

--
-- Indexes for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_tags_tag_unique` (`tag`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchants_bus_details`
--
ALTER TABLE `merchants_bus_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchants_info`
--
ALTER TABLE `merchants_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_return`
--
ALTER TABLE `merchant_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_shipping`
--
ALTER TABLE `merchant_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_url_unique` (`url`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_info`
--
ALTER TABLE `products_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_option`
--
ALTER TABLE `product_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_option_group`
--
ALTER TABLE `product_option_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_rate`
--
ALTER TABLE `shipping_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `merchants_bus_details`
--
ALTER TABLE `merchants_bus_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `merchants_info`
--
ALTER TABLE `merchants_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `merchant_return`
--
ALTER TABLE `merchant_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `merchant_shipping`
--
ALTER TABLE `merchant_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products_info`
--
ALTER TABLE `products_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `product_option`
--
ALTER TABLE `product_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_option_group`
--
ALTER TABLE `product_option_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_rate`
--
ALTER TABLE `shipping_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
