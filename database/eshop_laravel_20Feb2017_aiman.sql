-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2017 at 07:36 AM
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
(12, '15', 'Apple', 'A', '2016-11-16 22:51:37', '2016-11-16 22:51:37', NULL, NULL),
(13, '15', 'Lenovo', 'A', '2017-01-17 17:57:00', '2017-01-17 17:57:00', NULL, NULL);

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
(1, 3, 'Default', 'Aiman Zaidan', 'No 66-1, Jalan Wangsa Delima 6, Pusat Bandar Wangsa Maju,', 'Kuala Lumpur', '53300', '14', '0176219306', 'Y', '2016-12-14 04:48:39', '2016-12-13 20:48:39'),
(2, 3, 'BBS', 'Muhammad Farhan Bin Abdul Latip', 'A-005, BLok A, Apartment Julia, Jalan 4/8, Bandar Baru Selayang Fasa 2B', 'Batu Caves', '68100', '10', '126437433', 'N', '2016-12-14 04:48:39', '2016-12-13 20:48:39'),
(11, 3, 'Soe', 'Aiman Zaidan', 'No 18, Kedai Jkkk, Jalan Besar, Kampong Soeharto', 'Kuala Kubu Bharu', '44010', '10', '176219306', 'N', '2016-12-14 04:48:39', '2016-12-13 20:48:39');

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
  `bundle_rate` varchar(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_shipping`
--

INSERT INTO `merchant_shipping` (`id`, `user_id`, `title`, `name`, `address`, `city`, `postcode`, `state`, `phone`, `set_default`, `bundle_rate`, `created_at`, `updated_at`) VALUES
(1, 3, 'Default', 'Aiman Zaidan', 'No 66-1, Jalan Wangsa Delima 6, Pusat Bandar Wangsa Maju, 2', 'Kuala Lumpur', '53300', '14', '0176219306', 'N', 'Y', '2017-01-17 02:49:49', '2017-01-16 18:49:49'),
(60, 3, 'Soe', 'Aiman Zaidan', 'No 18, Kedai Jkkk, Jalan Besar, Kampong Soeharto', 'Kuala Kubu Bharu', '44010', '10', '176219306', 'Y', 'N', '2017-01-17 02:49:49', '2017-01-16 18:49:49'),
(62, 3, 'PJ', 'Aiman Zaidan', 'E-13-02, blok E, Flora Damansara, Jalan PJU 8/9, Bandar Damansara Perdana', 'Petaling Jaya', '47820', '10', '176219306', 'N', NULL, '2017-01-17 02:49:49', '2017-01-16 18:49:49');

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
(5, 15, 12, 3, '2016-11-16 23:00:53', '2017-02-06 20:11:35', NULL, NULL),
(6, 15, 11, 3, '2016-11-16 23:09:45', '2017-02-06 22:57:53', NULL, NULL),
(13, 15, 10, 3, '2017-01-15 20:32:09', '2017-02-06 00:08:48', NULL, NULL),
(15, 15, 13, 3, '2017-01-17 18:33:58', '2017-01-17 18:33:58', NULL, NULL);

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
  `option_id` text,
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
(2, 5, 'New', ' Apple iPhone 7 128GB (Gold)', 'AP564ELAA8DUFZANMY-17839644', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">1 year Apple Malaysia Warranty</li>\r\n<li class="">4.7 inch HD Retina Display with 3D Touch</li>\r\n<li class="">A10 Fusion chip 64-bit quad-core processor</li>\r\n<li class="">Static Home Button (pressure-sentitive button)</li>\r\n<li class="">Water - Resistant body with IP67 certified</li>\r\n<li class="">12MP Rear camera with optical image stabilization</li>\r\n<li class="">7MP Front camer with auto-image stabilzation</li>\r\n<li class="">Digital zoom up to 5x</li>\r\n<li class="">Dual Stereo Speaker on top &amp; bottom iPhone 7</li>\r\n<li class="">New Wireless AirPod headphone (not included)</li>\r\n</ul>', '<p><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/vaHzUn9.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/vaHzUn9.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/PPSVzIY.png" width="80%&rdquo;" data-original="http://i.imgur.com/PPSVzIY.png" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/FhAly06.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/FhAly06.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/LCExxD0.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/LCExxD0.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/XFcy7C6.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/XFcy7C6.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/nSFt7Uf.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/nSFt7Uf.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/HlOpdRK.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/HlOpdRK.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/CQS4lYl.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/CQS4lYl.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/MyLqflj.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/MyLqflj.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/KtTiPqy.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/KtTiPqy.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/89PsLBR.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/89PsLBR.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/BJQP16i.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/BJQP16i.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/Z3MLlmy.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/Z3MLlmy.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/bN8QrnX.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/bN8QrnX.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/VVhYuU5.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/VVhYuU5.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/polo53g.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/polo53g.jpg" /></center>', 'Exempted', 'Y', '5', '2016-11-17', NULL, 3459, '12', 288.25, 'N', 'RM', NULL, NULL, NULL, NULL, 0.14, 25, NULL, 60, 1, 'courier', 'Free', NULL, 'Feedback', 'Bayor la', 'N', NULL, '2017-02-07 04:11:36', '2017-02-06 20:11:35'),
(3, 6, 'New', 'Samsung S7 Edge Dual Sim 32Gb Gold', 'SA356ELAA5HXJDANMY-11177469', '<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Qualcomm Snapdragon 820 MSM8996 2.2GHz quad-core processor</li>\r\n<li class="">Android 6.0 Marshmallow operating system</li>\r\n<li class="">4G mobile hotspot capability with support for up to 10 devices</li>\r\n<li class="">WiFi Capable 802.11 a/b/g/n/ac</li>\r\n<li class="">5.5" WQHD touch-screen display</li>\r\n<li class="">Bluetooth 4.2</li>\r\n</ul>', '<div class="feature col2 reverse">\r\n<div>\r\n<div><strong>Slim in a big way</strong></div>\r\n<p>Big screen. Slim profile. So you can get more photos, movies and games on the Quad HD Super AMOLED display, and fit it all in your back pocket.</p>\r\n</div>\r\n</div>\r\n<div class="feature col2">\r\n<div>\r\n<p><img class="productlazyimage" src="http://www.samsung.com/us/system/features/f0029861/Swipe_your_in_318x238.png" alt="" data-original="http://www.samsung.com/us/system/features/f0029861/Swipe_your_in_318x238.png" /></p>\r\n</div>\r\n<div>\r\n<div><strong>Swipe and you&rsquo;re in</strong></div>\r\n<p>Swipe the dual-edge screen for updates in an instant, from texts and calls to breaking news and weather. Plus, the curved screen lets you see even more.</p>\r\n</div>\r\n</div>\r\n<div class="feature col2 reverse">\r\n<div>\r\n<p><img class="productlazyimage" src="http://www.samsung.com/us/system/features/f0029860/Because_water_318x238.png" alt="" data-original="http://www.samsung.com/us/system/features/f0029860/Because_water_318x238.png" /></p>\r\n</div>\r\n<div>\r\n<div><strong>Because water happens</strong></div>\r\n<p>Bring on the spills, splashes and dunks. Now you won&rsquo;t need to put your phone in a bowl of rice because of a little water.&nbsp;1</p>\r\n</div>\r\n</div>\r\n<div class="feature col2">\r\n<div>\r\n<p><img class="productlazyimage" src="http://www.samsung.com/us/system/features/f0029859/Post_worthy_day_318x238.png" alt="" data-original="http://www.samsung.com/us/system/features/f0029859/Post_worthy_day_318x238.png" /></p>\r\n</div>\r\n<div>\r\n<div><strong>Post-worthy day or night</strong></div>\r\n<p>Our new camera has an advanced sensor for catching details in low light, and a fast auto-focus for photos with less blur.</p>\r\n</div>\r\n</div>\r\n<div class="feature">&nbsp;</div>', 'Exempted', 'Y', '7', '2016-11-17', NULL, 2639, NULL, NULL, 'N', 'RM', NULL, NULL, NULL, NULL, 0.4, 42, '["{\\"typeid\\": \\"1\\", \\"info\\": \\"Gold\\"}","{\\"typeid\\": \\"14\\", \\"info\\": \\"New\\"}"]', 60, 1, 'courier', 'Free', NULL, 'Beli dulu baru tau', 'tak boleh pulang', 'N', NULL, '2017-02-07 06:57:53', '2017-02-06 22:57:53'),
(4, 13, 'New', ' Huawei P9 Plus 64GB Dual SIM LTE (Quartz Grey)', 'HU965ELAA9NT0AANMY-20597632', '<div class="prod_brief">\r\n<div class="prod-warranty"><span class="prod-warranty__term">1 Year</span> <span class="prod-warranty__type">Local Manufacturer Warranty</span>\r\n<div class="warranty-popup warranty-popup_hidden "><span class="warranty-popup__more">more</span></div>\r\n</div>\r\n</div>\r\n<div class="prod_content">\r\n<div class="prod_details">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">Beautifully Premium Full Metal Unibody, 5.5" FHD Amoled</li>\r\n<li class="">EMUI 4.1 (Android 6.0)</li>\r\n<li class="">Kirin 955 (64-bit), Octa-core (2.5GHz)</li>\r\n<li class="">Professional Rear Camera: LEICA Dual 12MP Camera (Monochrome &amp; RGB)</li>\r\n<li class="">Front Camera: 8MP</li>\r\n<li class="">Large 3400mAh built-in Li-Polymer Battery, RAM/ROM: 4GB / 64GB</li>\r\n<li class="">Dual SIM (Nano-SIM, Dual Stand-by); MicroSD card support up to 128GB</li>\r\n</ul>\r\n</div>\r\n</div>', '<p>The Huawei P9 Plus 64GB Dual SIM LTE is one of the best smartphones with an affordable price in the market. Even at a competitive price, the Huawei P9 Plus 64GB Dual SIM LTE comes with amazing features such as the Kirin 955 (64-bit), Octa-core (2.5GHz) and RAM/ROM: 4GB / 64GB. The phone comes with a special hardware as well as a 5.5" FHD Amoled resolution which will give you an impressive viewing experience. The smartphone made from selective premium full metal unibody also comes with the professional photography technology.<br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/sQSSQva.png" width="80%&rdquo;" data-original="http://i.imgur.com/sQSSQva.png" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/u7OUQbK.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/u7OUQbK.jpg" /></center>\r\n<p><br /><br /><br /></p>\r\n<div><strong>Premium Metal Unibody Design</strong></div>\r\n<p>The premium full metal unibody makes the Huawei P9 Plus 64GB Dual SIM LTE look elegant and classy in design. The lightweight and wafer-thin design of the smartphone will be a breath of fresh air in your hands. The solid built of the smartphone as well as its colour perfects the overall premium design of the smartphone from Huawei. With a slim design, you will be able to easily slip the phone into your pocket or handbag. The smartphone comes with 3400mAh built-in Li-Polymer Battery.<br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/UvtdMSB.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/UvtdMSB.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/101xEHi.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/101xEHi.jpg" /></center>\r\n<p><br /><br /><br /></p>\r\n<div><strong>5.5 Inches with Amoled View</strong></div>\r\n<p>Enjoy various multimedia entertainment content on the best quality possible with this Huawei P9 Plus 64GB Dual SIM LTE. Boasting a screen of 5.5 inches, you will be operating Huawei P9 Plus 64GB Dual SIM LTE with much ease. The Amoled resolution features a fantastic clarity ensuring that you enjoy images that are sharper and colours that pop onto screen. With a fast connectivity, the Huawei P9 Plus 64GB Dual SIM LTE ensures that you will be able to connect to the fastest network wherever you go, enabling you to complete various tasks faster. The smartphone also comes with dual SIM capabilities.<br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/b4A6b9b.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/b4A6b9b.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/vt9FPwJ.jpg" width="70%&rdquo;" data-original="http://i.imgur.com/vt9FPwJ.jpg" /></center>\r\n<p><br /><br /><br /></p>\r\n<div><strong>Optimal Performance with High Memory</strong></div>\r\n<p>The Huawei P9 Plus 64GB Dual SIM LTE is equipped with the powerful Kirin 955 (64-bit), Octa-core (2.5GHz) processor with RAM/ROM: 4GB / 64GB to support seamless multitasking so that you can complete more tasks faster. Furthermore, the hardware also gives you a hassle-free experience while using the smartphone through its applications and games that are high in resolution. The smartphone comes with a built-in memory of 64GB to store all your favourite data and multimedia contents. You can increase the smartphone&rsquo;s storage capacity up to 128GB with an external memory card.<br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/CFXUZ95.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/CFXUZ95.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/KwlxeGs.jpg" width="70%&rdquo;" data-original="http://i.imgur.com/KwlxeGs.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/7NXyEk0.jpg" width="70%&rdquo;" data-original="http://i.imgur.com/7NXyEk0.jpg" /></center>\r\n<p><br /><br /><br /></p>\r\n<div><strong>Professional 12MP and 8MP Cameras</strong></div>\r\n<p>Pictures are one of the best ways to immortalise our precious moments in life. With the Huawei P9 Plus 64GB Dual SIM LTE, you will be able to capture all those moments with the best quality possible by using the 12MP back camera on the smartphone. The ground-breaking photography technology as a result of collaboration with Leica is designed with dual lens which quickly captures images that are very clear and better. For all those who love to take selfies, this smartphone also comes with a front camera which boasts 8 MP to immortalise your precious moments in life.<br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/z84O2K3.jpg" width="70%&rdquo;" data-original="http://i.imgur.com/z84O2K3.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/uO6P2ty.jpg" width="80%&rdquo;" data-original="http://i.imgur.com/uO6P2ty.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/lz0BMMn.jpg" width="70%&rdquo;" data-original="http://i.imgur.com/lz0BMMn.jpg" /></center>\r\n<p><br /><br /><br /></p>\r\n<div><strong>About Huawei</strong></div>\r\n<p>Always reliable and offering a harmonious blend of top-notch technology with stunning visual appeal and classic durability, Huawei is a great brand to trust in when it comes to smartphones. Since the company''s unveiling, Huawei is continuing to thrive and strive for the smartphone and tablet stars, cementing their name in the technology world apart from cementing their name in the world of watches and more. Today, their signature cutting edge technology and craftsmanship can be found across the globe.<br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/jw5esph.jpg" width="70%&rdquo;" data-original="http://i.imgur.com/jw5esph.jpg" /></center>\r\n<p><br /><br /><br /><br /><br /><br /></p>\r\n<center><img class="productlazyimage" src="http://i.imgur.com/tHuGE7b.jpg" width="70%&rdquo;" data-original="http://i.imgur.com/tHuGE7b.jpg" /></center>\r\n<p><br /><br /><br /><br /></p>\r\n<center><iframe src="https://www.youtube.com/embed/D9AP6mgMozg" width="760" height="415" frameborder="0" allowfullscreen="allowfullscreen" data-mce-fragment="1"></iframe></center>', 'Exempted', 'Y', '3', '2017-01-16', NULL, 2599, NULL, NULL, 'Y', '%', 20, NULL, NULL, NULL, 0.162, 200, NULL, 1, 1, 'courier', 'ByProd', 6, 'We''ll contact you to reconfirm the delivery of the item', 'If item broken', 'Y', 1, '2017-02-06 08:08:49', '2017-02-06 00:08:48'),
(5, 15, 'New', ' LENOVO VIBE S1 LITE 16GB (Midnight Blue)', 'LE106ELAA6YCDMANMY-14529428', '<div class="prod_brief">\r\n<div class="prod-warranty"><span class="prod-warranty__term">1 Year</span> <span class="prod-warranty__type">Local Manufacturer Warranty</span>\r\n<div class="warranty-popup warranty-popup_hidden"><span class="warranty-popup__more">more</span></div>\r\n</div>\r\n</div>\r\n<div class="prod_content">\r\n<div class="prod_details">\r\n<ul class="prd-attributesList ui-listBulleted js-short-description">\r\n<li class="">5.0 inches&nbsp;</li>\r\n<li class="">Octa-core 1.3 GHz Cortex-A53</li>\r\n<li class="">16 GB ROM, 2 GB RAM</li>\r\n<li class="">13MP Rear Camera + 8MP Front Camera&nbsp;</li>\r\n<li class="">Dual SIM</li>\r\n</ul>\r\n</div>\r\n</div>', '<div class="overview_specs_green_box display_none">\r\n<p>The phone for the selfie lovers</p>\r\n<div><strong>Display and Configuration</strong></div>\r\n<div>&nbsp;</div>\r\n<div>The Lenovo Vibe S1 Lite flaunts a compact 5.0-inch IPS LCD full HD (1080 x 1920 pixels) display and has a very sharp pixel density of 441ppi which eventually delivers razor sharp pictures. The display is protected by Gorilla glass screen which resists user marks and scratches. The smartphone is powered by 1.3GHz octa-core processor which work together with 2GB RAM and Mali-T720 MP3 graphics to make sure the users get seamless performance. The phone runs Android v5.1 Lollipop as its operating system.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Camera and Battery</strong></div>\r\n<div>&nbsp;</div>\r\n<div>The smartphone from lenovo is equipped with 13MP camera which packs a powerful punch through its BSI sensor and Digital Image Stabilisation. The camera is further enhanced by dual LED flash which makes sure that you can click sharp pictures even in low light. There is an 8MP front camera with LED flash at the front too which makes it a delight for the selfie lovers. The phone is backed by a 2,700mAh li-po battery which makes sure that users get to use the phone for ample hours.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Storage and Connectivity</strong></div>\r\n<div>&nbsp;</div>\r\n<div>The store data and files, the Lenovo Vibe S1 Lite houses an inbuilt memory of 16GB which can further be expanded up to 128GB via a microSD card which can be a substitute to an external device. The connectivity features include 4G, Bluetooth, Wi-Fi, Computer sync, OTA sync, Tethering among others.</div>\r\n</div>\r\n<p>Verdict</p>\r\n<div>The Lenovo Vibe S1 is targeted particularly towards camera lovers, the major feature is the presence of front flash camera. Having said that, it also consists of powerful configuration which would give great overall experience. If you are looking for a good mid-range phone then this is the one for you.</div>', 'Exempted', 'Y', '60', '2017-01-18', NULL, 599, NULL, NULL, 'Y', '%', 22, 'Y', '2017-01-18', '2017-02-03', 0.152, 15, '["{\\"typeid\\": \\"1\\", \\"info\\": \\"Midnight Blue\\"}","{\\"typeid\\": \\"3\\", \\"info\\": \\"EIT STORE-VIBE S1 LITE BLUE\\"}","{\\"typeid\\": \\"15\\", \\"info\\": \\"5.0\\"}","{\\"typeid\\": \\"12\\", \\"info\\": \\"11 to 15MP\\"}","{\\"typeid\\": \\"16\\", \\"info\\": \\"2G\\"}","{\\"typeid\\": \\"19\\", \\"info\\": \\"6G\\"}","{\\"typeid\\": \\"20\\", \\"info\\": \\"1Year\\"}"]', 1, 1, 'courier', 'Bundle', NULL, 'Beli dulu', 'Kalau rosak je', 'N', NULL, '2017-01-18 02:33:58', '2017-01-18 02:33:58');

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
(11, 5, 'Y', '575396_1486440695.jpeg', 'uploads/5/', NULL, '2017-02-07 04:11:36', '2017-02-06 20:11:35'),
(12, 5, NULL, '497069_1486440696.jpg', 'uploads/5/', NULL, '2017-02-07 04:11:36', '2017-02-06 20:11:35'),
(13, 6, 'Y', '983391_1486438050.jpg', 'uploads/6/', NULL, '2017-02-07 03:27:30', '2017-02-06 19:27:30'),
(14, 6, NULL, '960333_1486438051.jpg', 'uploads/6/', NULL, '2017-02-07 03:27:31', '2017-02-06 19:27:30'),
(20, 13, 'Y', '207088_1486368529.jpg', 'uploads/13/', NULL, '2017-02-06 08:08:49', '2017-02-06 00:08:48'),
(21, 13, NULL, '87489_1486368529.jpg', 'uploads/13/', NULL, '2017-02-06 08:08:49', '2017-02-06 00:08:48'),
(23, 15, 'Y', 'lenovo-vibe-s1-lite-16gb-midnight-blue-5323-24008611-4f27da0161c9004d12642348f43c284b.jpg', 'uploads/15/', NULL, '2017-01-17 18:33:58', '2017-01-17 18:33:58');

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
(11, 'Label', 'label', 'N', '2016-11-18 00:30:11', '2016-11-18 00:30:11'),
(12, 'Camera Back', 'camera_back', 'A', '2017-01-12 20:36:00', '2017-01-12 20:36:00'),
(13, 'Camera Front', 'camera_front', 'A', '2017-01-12 20:36:15', '2017-01-12 20:36:15'),
(14, 'Condition', 'condition', 'A', '2017-01-12 20:36:29', '2017-01-12 20:36:29'),
(15, 'Screen Size (inches)', 'screen_size_mobile', 'A', '2017-01-12 20:36:50', '2017-01-12 20:36:50'),
(16, 'Network Connections', 'net_connection', 'A', '2017-01-12 20:37:24', '2017-01-12 20:37:24'),
(17, 'Operating System', 'operating_system', 'A', '2017-01-12 20:37:38', '2017-01-12 20:37:38'),
(18, 'Processor Type', 'processor_type', 'A', '2017-01-12 20:37:58', '2017-01-12 20:37:58'),
(19, 'RAM memory', 'ram', 'A', '2017-01-12 20:38:16', '2017-01-12 20:38:16'),
(20, 'Warranty Period', 'warranty_period', 'A', '2017-01-12 20:38:47', '2017-01-12 20:38:47');

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
(4, 'Womens', NULL, 'A', '2016-11-23 00:29:39', '2016-11-23 00:29:39'),
(5, 'Mobiles', '1,3,12,13,14,15,16,17,18,19,20', 'A', '2017-01-13 07:28:42', '2017-01-12 23:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `promo_text` varchar(255) NOT NULL,
  `country_origin` varchar(100) DEFAULT NULL,
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
  `ad_sel` varchar(10) DEFAULT NULL,
  `ad_start` date DEFAULT NULL,
  `ad_end` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `products_id`, `promo_text`, `country_origin`, `mul_pur_disc_set`, `mul_pur_disc_item`, `mul_pur_disc_sel`, `mul_pur_disc`, `mul_pur_disc_period_set`, `mul_pur_period_start`, `mul_pur_period_end`, `min_pur`, `min_pur_val`, `max_pur`, `max_per_ord`, `max_per_pers`, `ad_sel`, `ad_start`, `ad_end`, `created_at`, `updated_at`) VALUES
(1, 13, 'Jualan Hebat', 'Jepun', 'Y', 2, 'RM', 20, 'Y', '2017-02-13', '2017-02-17', 'minimum', 2, 'per_ord', 6, NULL, 'top', '2017-02-06', '2017-02-10', '2017-02-06 08:08:49', '2017-02-06 00:08:48'),
(2, 6, 'dadada', '', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, '2017-02-06 20:08:29', '2017-02-06 20:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_rate`
--

CREATE TABLE `shipping_rate` (
  `id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `bundle_of` int(11) DEFAULT NULL,
  `wm_kg` float DEFAULT NULL,
  `wm_rm` double DEFAULT NULL,
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
  `cond_ship` varchar(1) DEFAULT NULL,
  `cond_disc` float DEFAULT NULL,
  `cond_disc_for_purch` float DEFAULT NULL,
  `cond_free` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_rate`
--

INSERT INTO `shipping_rate` (`id`, `products_id`, `bundle_of`, `wm_kg`, `wm_rm`, `add_wm_kg`, `add_wm_rm`, `sbh_kg`, `sbh_rm`, `add_sbh_kg`, `add_sbh_rm`, `srk_kg`, `srk_rm`, `add_srk_kg`, `add_srk_rm`, `cond_ship`, `cond_disc`, `cond_disc_for_purch`, `cond_free`, `created_at`, `updated_at`) VALUES
(5, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'D', 20, 300, NULL, '2017-01-17 02:39:45', '2017-01-16 18:39:45'),
(6, 13, NULL, 0.5, 8, 0.5, 1, 0.5, 10, 0.5, 1, 0.5, 10, 0.5, 1, NULL, NULL, NULL, NULL, '2017-02-06 08:08:49', '2017-02-06 00:08:48');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `merchant_shipping`
--
ALTER TABLE `merchant_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `products_info`
--
ALTER TABLE `products_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `product_option`
--
ALTER TABLE `product_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `product_option_group`
--
ALTER TABLE `product_option_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shipping_rate`
--
ALTER TABLE `shipping_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
