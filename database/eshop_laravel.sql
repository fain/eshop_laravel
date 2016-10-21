-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 10:27 AM
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
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`, `created_at_ip`, `updated_at_ip`) VALUES
(1, 'ACNE', NULL, NULL, '192.168.0.77', '192.168.0.77'),
(2, 'RONHILL', NULL, NULL, '192.168.0.77', '192.168.0.77'),
(3, 'ALBIRO', NULL, NULL, '192.168.0.77', '192.168.0.77'),
(4, 'ODDMOLLY', NULL, NULL, '192.168.0.77', '192.168.0.77');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `main_category_id`, `name`, `slug`, `menu_type`, `status`, `description`, `created_at`, `updated_at`, `created_at_ip`, `updated_at_ip`) VALUES
(1, 0, 'MENS', 'mens', 'main', 'A', '', NULL, NULL, '192.168.0.77', '192.168.0.77'),
(2, 0, 'WOMENS', 'womens', 'main', 'A', '', NULL, NULL, '192.168.0.77', '192.168.0.77'),
(3, 0, 'KIDS', 'kids', 'main', 'A', '', NULL, NULL, '192.168.0.77', '192.168.0.77'),
(4, 0, 'FASHION', 'fashion', 'main', 'A', '', NULL, NULL, '192.168.0.77', '192.168.0.77'),
(5, 0, 'CLOTHING', 'clothing', 'main', 'A', '', NULL, NULL, '192.168.0.77', '192.168.0.77'),
(6, 1, 'Top', 'top', 'sub', 'A', '', NULL, NULL, '192.168.0.77', '192.168.0.77'),
(7, 1, 'bottom', 'bottom', 'sub', 'A', '', NULL, NULL, '', ''),
(8, 3, 'cap', 'cap', 'sub', 'A', 'This is all about cap', NULL, '2016-09-29 06:57:53', '', NULL);

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
  `merchants_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `ship_add` varchar(200) NOT NULL,
  `ship_state` varchar(3) NOT NULL,
  `ship_city` varchar(100) NOT NULL,
  `ship_pcode` varchar(5) NOT NULL,
  `rtn_add` varchar(200) NOT NULL,
  `rtn_state` varchar(3) NOT NULL,
  `rtn_city` varchar(100) NOT NULL,
  `rtn_pcode` varchar(5) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants_bus_details`
--

INSERT INTO `merchants_bus_details` (`id`, `merchants_id`, `name`, `email`, `phone`, `ship_add`, `ship_state`, `ship_city`, `ship_pcode`, `rtn_add`, `rtn_state`, `rtn_city`, `rtn_pcode`, `updated_at`, `created_at`) VALUES
(1, 1, 'Aiman Zaidan', 'aiman@multibase.com.my', '0176219306', 'No 18, Kedai Jkkk, Jalan Besar, Kampong Soeharto', '10', 'Kuala Kubu Bharu', '44010', 'No 18, Kedai Jkkk, Jalan Besar', '10', 'Kuala Kubu Bharu', '44010', '2016-09-21 08:29:16', '2016-09-21 08:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `merchants_info`
--

CREATE TABLE `merchants_info` (
  `id` int(11) NOT NULL,
  `merchants_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(12) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `store_name` varchar(30) NOT NULL,
  `store_url` varchar(30) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants_info`
--

INSERT INTO `merchants_info` (`id`, `merchants_id`, `name`, `email`, `dob`, `phone`, `gender`, `store_name`, `store_url`, `updated_at`, `created_at`) VALUES
(1, 1, 'Aiman Zaidan', 'aiman@multibase.com.my', '1987-08-18', '0176219306', 'F', 'AiFa Store', 'aifastore', '2016-09-21 08:29:16', '2016-09-21 08:29:16');

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
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `title`, `description`, `price`, `category_id`, `brand_id`, `created_at`, `updated_at`, `created_at_ip`, `updated_at_ip`) VALUES
(1, 'Mini skirt black edition', 'Mini skirt black edition', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 35, 1, 1, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(2, 'T-shirt blue edition', 'T-shirt blue edition', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 64, 2, 3, NULL, NULL, '192.168.0.77', '192.168.0.77'),
(3, 'Sleeveless Colorblock Scuba', 'Sleeveless Colorblock Scuba', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 13, 3, 2, NULL, NULL, '192.168.0.77', '192.168.0.77');

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
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
