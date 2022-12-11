-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 02:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collax`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name_en`, `slug`, `title_en`, `about_image`, `description_en`, `button_name_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 'WHAT WE DO?', 'the-service-we-offer-is-specifically-designed-to-meet-your-needs', 'The service we offer is specifically designed to meet your needs.', 'upload/about/1751821206843300.png', '<p><span style=\"color: rgb(100, 100, 100); font-family: &quot;Open Sans&quot;, sans-serif;\">Company that believes in the power of creative strategy.</span><br></p>', 'About Us', 1, '2022-12-10 04:08:12', '2022-12-10 04:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `name_en` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_name_en` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_date` date DEFAULT NULL,
  `button_name_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `menu_id`, `name_en`, `title_en`, `slug`, `blog_name_en`, `blog_description_en`, `blog_date`, `button_name_en`, `blog_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Blog Post', 'Popular blog post', 'popular-blog-post', 'Godaddy user flow solution...', '<p><span style=\"color: rgb(138, 144, 162); font-family: &quot;DM Sans&quot;, sans-serif;\">At Collax we specialize in designing, building, shipping and scaling beautifu</span><br></p>', '2022-12-10', 'Read More', 'upload/blog/1751829730127881.jpg', 1, '2022-12-10 06:23:40', '2022-12-10 06:23:40'),
(2, 2, 'Blog', 'Popular blog post', 'popular-blog-post', 'What is ui/ux design trend...', '<h4 class=\"tp-bp-title\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px 0px 10px; font-size: 22px; font-family: &quot;DM Sans&quot;, sans-serif; transition: all 0.3s ease-out 0s;\"><a href=\"http://127.0.0.1:8000/blog-details.html\" style=\"margin: 0px; padding: 0px; color: inherit; transition: all 0.3s ease-out 0s; outline: none; border: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What is ui/ux design trend...</a><a href=\"http://127.0.0.1:8000/blog-details.html\" style=\"margin: 0px; padding: 0px; color: inherit; transition: all 0.3s ease-out 0s; outline: none; border: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What is ui/ux design trend...</a><a href=\"http://127.0.0.1:8000/blog-details.html\" style=\"margin: 0px; padding: 0px; color: inherit; transition: all 0.3s ease-out 0s; outline: none; border: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What is ui/ux design trend...</a></h4>', '2022-12-10', 'View More', 'upload/blog/1751829770365708.png', 1, '2022-12-10 06:24:18', '2022-12-10 06:24:18'),
(3, 2, 'Blog', 'Popular blog post', 'popular-blog-post', 'Create you design system like...', '<h4 class=\"tp-bp-title\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px 0px 10px; font-size: 22px; font-family: &quot;DM Sans&quot;, sans-serif; transition: all 0.3s ease-out 0s;\"><a href=\"http://127.0.0.1:8000/blog-details.html\" style=\"margin: 0px; padding: 0px; color: inherit; transition: all 0.3s ease-out 0s; outline: none; border: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Create you design system like...</a><a href=\"http://127.0.0.1:8000/blog-details.html\" style=\"margin: 0px; padding: 0px; color: inherit; transition: all 0.3s ease-out 0s; outline: none; border: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Create you design system like...</a><a href=\"http://127.0.0.1:8000/blog-details.html\" style=\"margin: 0px; padding: 0px; color: inherit; transition: all 0.3s ease-out 0s; outline: none; border: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Create you design system like...</a></h4>', '2022-12-10', 'View More', 'upload/blog/1751829815303470.jpg', 1, '2022-12-10 06:25:01', '2022-12-10 06:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `chooses`
--

CREATE TABLE `chooses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choose_name_en` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choose_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `email`, `subject`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', 'ME', '01710201452', 'Hi! I am User', 1, '2022-12-10 07:42:39', '2022-12-10 07:42:39'),
(2, 'kamrul', 'kamrul@gmail.com', 'Me', '01710203210', 'Hi! I am Kamrul Islam.', 1, '2022-12-11 05:57:14', '2022-12-11 05:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/1751829323138390.png', 1, '2022-12-10 06:17:12', '2022-12-10 06:17:12'),
(2, 'upload/logo/1751829328189564.png', 1, '2022-12-10 06:17:17', '2022-12-10 06:17:17'),
(3, 'upload/logo/1751829357045334.png', 1, '2022-12-10 06:17:44', '2022-12-10 06:17:44'),
(4, 'upload/logo/1751829363040782.png', 1, '2022-12-10 06:17:50', '2022-12-10 06:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name_en`, `name_bn`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shop', NULL, 'shop', 0, '2022-12-11 04:09:38', '2022-12-11 04:11:19'),
(2, 'About', NULL, 'about', 1, '2022-12-10 03:45:02', '2022-12-10 03:45:02'),
(3, 'Services', NULL, 'services', 1, '2022-12-10 03:45:08', '2022-12-10 03:45:08'),
(4, 'Projects', NULL, 'projects', 1, '2022-12-10 03:45:23', '2022-12-10 03:45:23'),
(7, 'Contact Us', NULL, 'contact-us', 1, '2022-12-10 03:45:51', '2022-12-10 03:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_01_045408_create_pages_table', 1),
(7, '2022_10_15_162637_create_menus_table', 1),
(8, '2022_10_16_112038_create_abouts_table', 1),
(9, '2022_10_16_150707_create_services_table', 1),
(10, '2022_10_17_022311_create_projects_table', 1),
(11, '2022_10_17_032945_create_testimonials_table', 1),
(12, '2022_10_17_040318_create_teams_table', 1),
(13, '2022_10_17_101307_create_blogs_table', 1),
(14, '2022_10_17_123745_create_logos_table', 1),
(15, '2022_10_18_035034_create_submenus_table', 1),
(16, '2022_11_11_043514_create_sliders_table', 1),
(17, '2022_11_11_053903_create_chooses_table', 1),
(18, '2022_11_21_151428_create_seos_table', 1),
(19, '2022_11_27_143430_create_emails_table', 1),
(20, '2022_11_28_051540_create_subscribes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nav',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name_en`, `title_en`, `slug`, `description_en`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Services', 'This is Services Page', 'services', 'This is Services PageThis is Services PageThis is Services PageThis is Services Page', 'Bottom', 1, '2022-12-10 06:33:17', '2022-12-10 06:33:17'),
(2, 'About Us', 'This is About Page', 'about-us', 'This is About Page&nbsp;This is About Page', 'Bottom', 1, '2022-12-10 06:36:01', '2022-12-10 06:36:01'),
(3, 'Contact Us', 'This is Contact Us Page', 'contact-us', 'This is Contact Us Page&nbsp;This is Contact Us Page&nbsp;This is Contact Us Page', 'Bottom', 1, '2022-12-10 06:36:25', '2022-12-10 06:36:25'),
(4, 'Terms & Policy', 'This is Terms & Policy Page', 'terms--policy', 'This is Terms &amp; Policy Page&nbsp;This is Terms &amp; Policy Page&nbsp;This is Terms &amp; Policy Page', 'Bottom', 1, '2022-12-10 06:36:54', '2022-12-10 06:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `submenu_id` int(11) DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name_en` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `menu_id`, `submenu_id`, `slug`, `project_name_en`, `project_description_en`, `button_name_en`, `project_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 2, '', 'Ecommerce Website', '<p>Most Ecommerce Website<br></p>', NULL, 'upload/project/1751825497187802.jpg', 1, '2022-12-10 05:16:23', '2022-12-10 05:16:23', NULL),
(2, 4, 2, '', 'School Management Software', '<p>project_image<br></p>', NULL, 'upload/project/1751825565275720.jpg', 1, '2022-12-10 05:17:28', '2022-12-10 05:17:28', NULL),
(3, 4, 2, '', 'Erp Software', '<p><span style=\"color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13.12px; white-space: pre-wrap; background-color: rgb(248, 249, 250);\">Most Ecommerce Website</span><br></p>', NULL, 'upload/project/1751825627474105.jpg', 1, '2022-12-10 05:18:27', '2022-12-10 05:18:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'Collax It Solutions', 'Easy Collax', 'Best online shop, Best Product, Best Ecommerce Store', 'This is Collax Meta Description', 'This is Collax Google Analytics', '2022-12-10 06:39:43', '2022-12-10 06:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `submenu_id` int(11) DEFAULT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_button_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `menu_id`, `submenu_id`, `name_en`, `title_en`, `slug`, `service_name_en`, `service_description_en`, `service_button_en`, `service_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Our Services', 'We Provide the Best Quality', 'our-services', 'Web Design', 'Lorem ipsum dolor sit amet con setetur sadipscing elitr sed…', 'View All Service', 'upload/services/1751823777296630.jpg', 1, '2022-12-10 04:49:03', '2022-12-10 04:49:03'),
(2, 3, 3, 'Our Services', 'We Provide the Best Quality', 'our-services', 'Graphics Design', 'Lorem ipsum dolor sit amet con setetur sadipscing elitr sed…', 'View More', 'upload/services/1751824646631863.jpg', 1, '2022-12-10 05:02:52', '2022-12-10 05:02:52'),
(3, 3, 2, 'Our Services', 'We Provide the Best Quality', 'our-services', 'Web Development', 'Lorem ipsum dolor sit amet con setetur sadipscing elitr sed…', NULL, 'upload/services/1751824684096143.jpg', 1, '2022-12-10 05:03:28', '2022-12-10 05:03:28'),
(4, 3, 3, 'Our Services', 'We Provide the Best Quality', 'our-services', 'Apps Development', 'Lorem ipsum dolor sit amet con setetur sadipscing elitr sed…', NULL, 'upload/services/1751824725078060.jpg', 1, '2022-12-10 05:04:07', '2022-12-10 05:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Soft Integration', '2022-08-22 02:57:04', '2022-12-11 07:03:19'),
(2, 'site_logo', 'upload/setting/logo/1670749133logo-blue.png', '2022-08-03 12:46:20', '2022-12-11 02:58:54'),
(3, 'site_favicon', 'upload/setting/favicon/1670666427favicon.png', '2022-08-04 12:46:20', '2022-12-10 04:00:27'),
(4, 'site_footer_logo', 'upload/setting/logo/1670678397logo-white.png', '2022-08-03 12:46:20', '2022-12-10 07:19:57'),
(5, 'phone', '01788660255', '2022-08-04 12:47:27', '2022-11-14 08:31:12'),
(6, 'email', 'soft@gmail.com', '2022-08-12 12:47:52', '2022-12-11 07:03:20'),
(7, 'business_name', 'Soft Integration Ltd', '2022-08-08 12:48:27', '2022-12-11 07:03:19'),
(8, 'business_address', 'H # 39, Road 3, Sector # 10,Uttara, Dhaka.', '2022-08-04 12:48:53', '2022-09-12 01:14:47'),
(9, 'business_hours', '10:00 - 6:00, Sa - Thu', '2022-08-01 12:49:29', NULL),
(10, 'copy_right', '©Soft Integration Technology', '2022-08-05 12:49:58', '2022-12-11 07:03:20'),
(11, 'developed_by', 'It Solutions', '2022-08-14 12:50:24', NULL),
(12, 'developer_link', 'https://www.collax.com.bd/', '2022-08-13 12:50:56', NULL),
(13, 'facebook_url', 'https://www.facebook.com/', '2022-08-18 12:51:19', '2022-11-14 08:31:12'),
(14, 'twitter_url', 'https://www.twitter.com/', '2022-08-17 12:51:45', NULL),
(15, 'linkedin_url', 'https://www.linkedin.com/', '2022-08-12 12:52:12', '2022-11-14 08:31:12'),
(16, 'youtube_url', 'https://www.youtube.com/', '2022-08-04 12:52:42', NULL),
(17, 'instagram_url', 'https://www.instagram.com/', '2022-08-11 12:53:11', NULL),
(18, 'pinterest_url', 'https://www.pinterest.com/', '2022-08-05 12:53:45', NULL),
(22, 'site_contact_logo', 'upload/setting/contact/1670666427contact-1.jpg', NULL, '2022-12-10 04:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name_en`, `slug`, `title_en`, `url`, `slider_image`, `description_en`, `button_name_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 'We bring solutions to make life easier through Technology.', 'we-bring-solutions-to-make-life-easier-through-technology', 'We have considered our solutions to support every stage of your growth.', 'https://www.youtube.com', 'upload/slider/1751908428156017.jpg', 'We have considered our solutions to support every stage of your growth.', 'Get a  Quote', 1, '2022-12-11 03:14:33', '2022-12-11 03:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `menu_id`, `name_en`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Web Development', 'web-development', 1, '2022-12-10 04:27:26', '2022-12-10 04:27:26'),
(2, 3, 'Digital Marketing', 'digital-marketing', 1, '2022-12-10 04:27:36', '2022-12-10 04:27:36'),
(3, 3, 'Graphics Design', 'graphics-design', 1, '2022-12-10 04:27:58', '2022-12-10 04:27:58'),
(4, 2, 'Team', 'team', 1, '2022-12-10 06:04:17', '2022-12-10 06:04:17'),
(5, 2, 'Blog', 'blog', 1, '2022-12-10 06:04:25', '2022-12-10 06:04:25'),
(6, 2, 'Shop', 'shop', 1, '2022-12-11 04:11:08', '2022-12-11 04:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '2022-12-10 07:31:21', '2022-12-10 07:31:21'),
(2, 'rakibul@gmail.com', '2022-12-10 22:23:38', '2022-12-10 22:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `submenu_id` int(11) DEFAULT NULL,
  `title_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_name_en` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `submenu_id`, `title_en`, `description_en`, `team_name_en`, `designation_en`, `facebook`, `github`, `linkedin`, `instagram`, `team_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Meet Our Team', '<p>Our Team</p>', 'Md Mamun', 'Digital Marketing', 'https://www.facebook.com/', 'https://www.github.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'upload/team/1751922490898364.jpg', 1, '2022-12-11 07:03:52', '2022-12-11 07:03:52'),
(2, 4, 'Our Team', '<p>Some Team</p>', 'Rokunuzzaman Rafi', 'Software Enginners', 'https://www.facebook.com/', 'https://www.github.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'upload/team/1751922317363959.jpg', 1, '2022-12-11 07:03:58', '2022-12-11 07:03:58'),
(3, 4, 'Our Team', '<p>Our Team</p>', 'Nazrul Islam Suzon', 'Software Enginners', 'https://www.facebook.com/', 'https://www.github.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'upload/team/1751922582959994.jpg', 1, '2022-12-11 06:59:31', '2022-12-11 06:59:31'),
(4, 4, 'Our Team', '<p>Our Team</p>', 'Bassu Mia', 'Founder & CEO', 'https://www.facebook.com/', 'https://www.github.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'upload/team/1751922353117324.jpg', 1, '2022-12-11 06:59:39', '2022-12-11 06:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_designation_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name_en`, `title_en`, `testimonial_name_en`, `testimonial_designation_en`, `testimonial_description_en`, `testimonial_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Testimonials', 'Customer Feadback', 'Shakibul Islam', 'Founder Of (Rirax)', '<p><span style=\"color: rgb(244 247 255); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">We look and sound so good! I am still in shock at how smooth this process was. The professionalism, collaboration and the design they come up is great.</span><br></p>', 'upload/testimonial/1751829140712197.png', 1, '2022-12-11 00:41:48', '2022-12-11 00:41:48'),
(2, 'Testimonials', 'Customer Feadback', 'Ross Ross', 'Founder Of (Rirax)', '<p><span style=\"color: rgb(244 247 255); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">We look and sound so good! I am still in shock at how smooth this process was. The professionalism, collaboration and the design they come up is great.</span><br></p>', 'upload/testimonial/1751829167218931.png', 1, '2022-12-11 00:41:43', '2022-12-11 00:41:43'),
(3, 'Testimonials', 'Customer Feadback', 'Shorna Khatun', 'Founder Of (Rirax)', '<p><span style=\"color: rgb(244 247 255); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">We look and sound so good! I am still in shock at how smooth this process was. The professionalism, collaboration and the design they come up is great.</span><br></p>', 'upload/testimonial/1751829205902199.png', 1, '2022-12-11 00:41:32', '2022-12-11 00:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobaile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobaile`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '01712452365', NULL, '$2y$10$/63JcLYHi3FznOk9FmbufeznfNeCnMPs1OazNdJ1ObuQAx2rJkjAG', NULL, NULL, 'upload/users/1670665412port-3.jpg', 1, '2022-12-10 03:41:47', '2022-12-10 03:43:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chooses`
--
ALTER TABLE `chooses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emails_email_unique` (`email`),
  ADD UNIQUE KEY `emails_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `value` (`value`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribes_email_unique` (`email`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chooses`
--
ALTER TABLE `chooses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
