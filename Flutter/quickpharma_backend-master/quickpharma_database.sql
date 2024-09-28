-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2023 at 05:42 AM
-- Server version: 10.6.11-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u483250490_quickpharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `fcm_id` varchar(255) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:Inactive 1:Active',
  `api_token` text DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `app_settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`app_settings`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `username`, `email`, `phone`, `address`, `avatar`, `fcm_id`, `otp`, `email_verified_at`, `password`, `status`, `api_token`, `latitude`, `longitude`, `app_settings`, `created_at`, `updated_at`) VALUES
(1, 'Shokhrukh Abdullaev', 'azera0309@gmail.com', 'shokhrukhbusiness@gmail.com', '+998904550205', '2808 ford street brooklyn Newyork', NULL, 'faW4cuoFSWq-Qil33qW1FK:APA91bFRWE4en3nLO3CSSYCOwpvoHn3F0u5vUE9N7zYK8XrqKUokcWSVh3DDOVzGjgcDJ2Hh9xR3Kwnl7DiH71liu-RDsonTq4e5vMgORuaKu0GNffLr26cpF8CwvvJwj9-YXAXrM5nK', NULL, NULL, '$2y$10$tqArW2/8UmGZrljZYrK6COb09ArUcl.XjoEy9GiNdG.iCpXKgRreq', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FkbS5xdWlja3BoYXJtYWNldXRpY2FsLmNvbS9hcGkvbG9naW4iLCJpYXQiOjE2NzcxNDM4MzcsIm5iZiI6MTY3NzE0MzgzNywianRpIjoiS2R6bWdRZE5GSWdaRVhDayIsInN1YiI6IjEiLCJwcnYiOiI5MTljMzI2ZDQzYWIxNTE5YThiYTNiODU4NmI2ODc1MmU4YzgzODA3IiwiaWQiOjF9.0AxmkYiJ5ZsMvb3wzx3g6oFolM-vdcRUObaMY27M-Vs', NULL, NULL, NULL, '2023-02-18 15:23:43', '2023-02-23 09:17:18'),
(2, 'Jayesh Italiya', 'jayesh.italiya@icloud.com', 'jayesh.italiya@icloud.com', '123456789', 'surat', NULL, 'null', NULL, NULL, '$2y$10$cUyaZhwaRcpLKH7p9dNHUeP62/VBvxPUwjrHnA17iJm7ikZ6Fp0JC', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FkbS5xdWlja3BoYXJtYWNldXRpY2FsLmNvbS9hcGkvbG9naW4iLCJpYXQiOjE2NzcwNzQ2OTIsIm5iZiI6MTY3NzA3NDY5MiwianRpIjoiNHhjRENHU1BkOHpxMHQxYiIsInN1YiI6IjIiLCJwcnYiOiI5MTljMzI2ZDQzYWIxNTE5YThiYTNiODU4NmI2ODc1MmU4YzgzODA3IiwiaWQiOjJ9.-rmyupnvzg0GKYn4niv5noIXqx5c7h0ziCb647bIQ7w', NULL, NULL, NULL, '2023-02-20 05:13:17', '2023-02-22 14:04:53'),
(3, 'Ayna Muradova', 'aynulya07', 'aynamuradova26@gamil.com', '+1 347 819 5767', NULL, NULL, 'null', NULL, NULL, '$2y$10$kWJC.CaBki5.59XWWrjr7uCiTjA./XKGp6O/WpM0h3RZSeCYNhWd6', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FkbS5xdWlja3BoYXJtYWNldXRpY2FsLmNvbS9hcGkvbG9naW4iLCJpYXQiOjE2NzcyNjM2OTQsIm5iZiI6MTY3NzI2MzY5NCwianRpIjoiMk1ENG5BZnpaYzVvQVNyZSIsInN1YiI6IjMiLCJwcnYiOiI5MTljMzI2ZDQzYWIxNTE5YThiYTNiODU4NmI2ODc1MmU4YzgzODA3IiwiaWQiOjN9.7mmRnCc7ps0aA0J28GxDUnnje0Cfn96NJjXyd5d2l1c', NULL, NULL, NULL, '2023-02-24 14:21:24', '2023-02-24 18:34:54');

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
-- Table structure for table `hubs`
--

CREATE TABLE `hubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility` varchar(255) NOT NULL DEFAULT 'New York',
  `title` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `path` longtext DEFAULT NULL,
  `location` point DEFAULT NULL,
  `area` polygon DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:Inactive 1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hubs`
--

INSERT INTO `hubs` (`id`, `facility`, `title`, `address`, `path`, `location`, `area`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New York', 'New York', '4505 West Jefferson Boulevard, Los Angeles, CA, USA', '[{\"lat\":\"34.08387185006113\",\"lng\":\"-118.30266010310743\"},{\"lat\":\"34.084440540400074\",\"lng\":\"-118.18520787769685\"},{\"lat\":\"34.03523470575341\",\"lng\":\"-118.14983483904977\"},{\"lat\":\"34.0025098223518\",\"lng\":\"-118.18177360210004\"},{\"lat\":\"34.002794440927346\",\"lng\":\"-118.26900420225877\"},{\"lat\":\"34.04291611028451\",\"lng\":\"-118.33288172835928\"},{\"lat\":\"34.07989091074823\",\"lng\":\"-118.32051833621081\"}]', 0x0000000001010000004d05268117965dc0bf7163c44f034140, 0x0000000001030000000100000008000000552a7bc85e935dc094881250bc0a4140b76b2472da8b5dc0bfbc97f2ce0a41405b61dde496895dc05872229282044140eb12bf2da28b5dc0d775ea3d520041405fcc665d37915dc02f3278915b0041407f2f2aef4d955dc0a3126d467e05414094f2565f83945dc0857488dd390a4140552a7bc85e935dc094881250bc0a4140, 1, '2023-01-17 05:11:28', '2023-01-17 05:12:00'),
(2, 'New York', 'New York', '1951 East Wright Circle, Anaheim, CA, USA', NULL, 0x0000000001010000006580553f00795dc03820f8ce1ee74040, NULL, 1, '2023-01-17 05:11:41', '2023-01-17 05:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `masked_photos`
--

CREATE TABLE `masked_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `regions_id` bigint(20) UNSIGNED NOT NULL,
  `mask_photo` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=approved,2=pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masked_photos`
--

INSERT INTO `masked_photos` (`id`, `regions_id`, `mask_photo`, `status`, `created_at`, `updated_at`) VALUES
(5, 12, '1675238213.2452.png', 1, '2023-03-06 14:27:09', '2023-03-06 14:27:09'),
(6, 12, '1675238213.2452.png', 2, '2023-03-06 14:27:44', '2023-03-06 14:27:44');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_09_134439_create_tickets', 1),
(6, '2022_12_03_042803_create_recipients', 1),
(8, '2022_12_03_044307_create_prescriptions_no', 1),
(10, '2022_12_07_043140_create_drivers', 1),
(12, '2022_12_14_055718_create_orders_status_activity', 1),
(13, '2022_12_16_072537_create_orders_types', 1),
(14, '2022_12_16_091330_create_route', 1),
(15, '2022_12_19_093851_create_route_autocreate_schedule_days', 1),
(16, '2022_12_23_084538_create_regions', 1),
(17, '2023_01_05_062323_add_fcm_id_to_drivers', 1),
(18, '2023_01_05_125322_add_otp_to_drivers', 1),
(19, '2023_01_06_080547_create_hubs', 1),
(20, '2023_01_12_055906_add_latitude_longitude_to_drivers', 1),
(21, '2023_01_12_084215_add_latitude_longitude_to_users', 1),
(22, '2023_01_13_070155_add_order_sequence_to_orders', 1),
(23, '2023_01_19_041359_create_settings', 2),
(24, '2023_01_20_053354_add_regions_id_to_orders', 2),
(25, '2023_01_20_070614_add_driver_id_to_regions', 2),
(26, '2023_01_31_063211_add_is_finished_to_regions', 3),
(27, '2023_01_31_064853_add_app_settings_to_drivers', 3),
(28, '2023_02_01_050231_add_payout_to_orders', 3),
(29, '2023_02_08_125008_add_facility_to_users', 4),
(30, '2022_12_03_043914_create_orders', 5),
(31, '2022_12_14_051831_create_orders_activity', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Ready to Print','Ready for Pickup','Pickup Occurred','Ready for Delivery','Route Optimized','Driver Out','Delivered','Delivery Attempted','Returned','Rejected','Back to Pharmacy','Investigation','Other Date Delivery','Ready To Optimize','On Its Way To Facility','Not Present','Recipient Refused','Skipped','Wrong Address') NOT NULL DEFAULT 'Ready to Print',
  `sub_status` enum('Open','Scheduled') NOT NULL DEFAULT 'Open',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Pharmacy User',
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) NOT NULL DEFAULT 0,
  `dispatcher_id` bigint(20) NOT NULL DEFAULT 0,
  `regions_id` bigint(20) NOT NULL DEFAULT 0,
  `request_call_upon_arrival` enum('Yes','No') NOT NULL DEFAULT 'No',
  `include_insurance` enum('Yes','No') NOT NULL DEFAULT 'No',
  `order_total_price` varchar(255) NOT NULL DEFAULT '0',
  `insurance_rate` varchar(255) NOT NULL DEFAULT '0',
  `delivery_methods_type` enum('idrequired','face2face','inperson','signlink','nosign','noask') NOT NULL DEFAULT 'face2face' COMMENT 'idrequired :FACE-TO-FACE ID & SIGNATURE REQUIRED | face2face : FACE-TO-FACE SIGNATURE REQUIRED | inperson : FACE-TO-FACE NO SIGNATURE REQUIRED | signlink: ONLINE SIGNATURE | nosign : SIGNATURE OPTIONAL | noask : NO-CONTACT DELIVERY',
  `special_instructions` text DEFAULT NULL,
  `weight` enum('small','medium','large') NOT NULL DEFAULT 'small',
  `items` varchar(255) DEFAULT NULL,
  `copay` varchar(255) DEFAULT NULL,
  `order_type` enum('regular','Time Window Next Day','Same Day') NOT NULL DEFAULT 'regular',
  `order_condition` enum('regular','priority','emergency') NOT NULL DEFAULT 'regular',
  `subtype_fridge` enum('Yes','No') NOT NULL DEFAULT 'No',
  `store_in_fridge` varchar(255) DEFAULT NULL COMMENT 'Yes | No',
  `subtype_confidential` enum('Yes','No') NOT NULL DEFAULT 'No',
  `subtype_sensitive` enum('Yes','No') NOT NULL DEFAULT 'No',
  `subtype_hazardous` enum('Yes','No') NOT NULL DEFAULT 'No',
  `subtype_controlled` enum('Yes','No') NOT NULL DEFAULT 'No',
  `subtype_woundcare` enum('Yes','No') NOT NULL DEFAULT 'No',
  `documents_to_sign_by_recipient` varchar(255) DEFAULT NULL,
  `date_to_deliver` date DEFAULT NULL,
  `time_to_deliver` time DEFAULT NULL,
  `time_window_deliveries` varchar(255) DEFAULT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time_min` time NOT NULL,
  `pickup_time_max` time NOT NULL,
  `recipient_email_to_owner` enum('Yes','No') NOT NULL DEFAULT 'No',
  `operator_initials` varchar(255) NOT NULL,
  `is_sms` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_call` enum('Yes','No') NOT NULL DEFAULT 'No',
  `condition` varchar(255) DEFAULT NULL,
  `facility` varchar(255) DEFAULT NULL,
  `hub` varchar(255) DEFAULT NULL,
  `contents` varchar(255) DEFAULT NULL,
  `note_added` varchar(255) DEFAULT NULL,
  `is_copay_payed` enum('Yes','No') NOT NULL DEFAULT 'No',
  `added_by` bigint(20) NOT NULL,
  `attempts` bigint(20) NOT NULL DEFAULT 0,
  `order_activity` varchar(255) DEFAULT NULL COMMENT 'Delivered | Wrong Address | Not Present | Recipient Refused',
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `location` point DEFAULT NULL,
  `address` longtext NOT NULL,
  `order_sequence` bigint(20) NOT NULL DEFAULT 0,
  `payout` varchar(255) NOT NULL DEFAULT '0',
  `eta_date_time` varchar(255) DEFAULT NULL,
  `not_paying_copay_action` int(11) DEFAULT NULL COMMENT '<-- 1 --> Allow Rx2Go to Give the Medication to the Patient, even if the patient does not pay the copay.\r\n<-- 2 --> Do not give the medicine to the patient, bring it back to the pharmacy.\r\n<-- 3 --> Amount of copay will be available on all necessary legal documents, But we will not attempt to collect the copay.',
  `is_pickup_order` enum('Yes','No') DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `sub_status`, `user_id`, `recipient_id`, `driver_id`, `dispatcher_id`, `regions_id`, `request_call_upon_arrival`, `include_insurance`, `order_total_price`, `insurance_rate`, `delivery_methods_type`, `special_instructions`, `weight`, `items`, `copay`, `order_type`, `order_condition`, `subtype_fridge`, `store_in_fridge`, `subtype_confidential`, `subtype_sensitive`, `subtype_hazardous`, `subtype_controlled`, `subtype_woundcare`, `documents_to_sign_by_recipient`, `date_to_deliver`, `time_to_deliver`, `time_window_deliveries`, `pickup_date`, `pickup_time_min`, `pickup_time_max`, `recipient_email_to_owner`, `operator_initials`, `is_sms`, `is_call`, `condition`, `facility`, `hub`, `contents`, `note_added`, `is_copay_payed`, `added_by`, `attempts`, `order_activity`, `latitude`, `longitude`, `location`, `address`, `order_sequence`, `payout`, `eta_date_time`, `not_paying_copay_action`, `is_pickup_order`, `created_at`, `updated_at`) VALUES
(1036, 'Driver Out', 'Open', 1022, 1018, 2, 0, 13, 'No', 'No', '0', '0.0', 'face2face', '', 'large', '12', '250', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-02-24', '19:28:00', '', '2023-02-20', '01:48:00', '15:18:00', 'No', '', 'No', 'No', NULL, NULL, NULL, '23423242', '2023-01-03', 'No', 1000, 0, NULL, '40.8839827', '-73.8948752', 0x0000000001010000001880a1a2457952c0695d595826714440, '3887 Cannon Place, The Bronx, NY, USA', 1, '0', NULL, NULL, 'No', '2023-02-20 13:55:02', '2023-02-24 08:16:40'),
(1037, 'Delivered', 'Open', 1022, 1056, 2, 0, 13, 'No', 'No', '0', '0.0', 'face2face', '', 'medium', '5', '120', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-02-25', '19:37:00', '', '2023-02-20', '01:55:00', '15:25:00', 'No', '', 'No', 'No', NULL, NULL, NULL, 'Test By Jayesh', 'Test By Jayesh', 'No', 1000, 0, NULL, '40.8261723', '-73.9070847', 0x000000000101000000ed4cfcac0d7a52c039ae9003c0694440, '1027 Boston Rd, The Bronx, NY, USA', 3, '0', NULL, NULL, 'No', '2023-02-20 14:04:58', '2023-02-24 08:16:40'),
(1038, 'Driver Out', 'Open', 1022, 1057, 1, 0, 14, 'No', 'No', '0', '0.0', 'face2face', '', 'medium', '5', '140', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-02-22', '22:36:00', '', '2023-02-20', '02:04:00', '15:34:00', 'No', '', 'No', 'No', NULL, NULL, NULL, 'Test by Jayesh', 'Test by Jayesh', 'No', 1000, 0, NULL, '40.8071971', '-73.91909679999999', 0x000000000101000000ee76627bd27a52c089f60c3c52674440, '514 East 138th Street, The Bronx, NY, USA', 1, '0', NULL, NULL, 'No', '2023-02-20 14:07:13', '2023-02-23 13:22:51'),
(1039, 'Driver Out', 'Open', 1022, 1058, 1, 0, 14, 'No', 'No', '0', '0.0', 'face2face', '', 'medium', '5', '450', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-03-02', '19:42:00', '', '2023-02-20', '02:07:00', '15:37:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1000, 0, NULL, '40.71161439999999', '-73.9952469', 0x00000000010100000081bc0d20b27f52c06cae3f2e165b4440, '10 Monroe Street, New York, NY, USA', 3, '0', NULL, NULL, 'No', '2023-02-20 14:08:47', '2023-02-21 16:04:21'),
(1040, 'Driver Out', 'Open', 1022, 1059, 2, 0, 13, 'No', 'No', '0', '0.0', 'face2face', '', 'medium', '3', '110', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-03-07', '21:41:00', '', '2023-02-20', '02:08:00', '15:38:00', 'No', '', 'No', 'No', NULL, NULL, NULL, 'chug', 'chug', 'No', 1000, 0, NULL, '40.88307959999999', '-73.8334679', 0x0000000001010000000331bf89577552c0e4e198c008714440, '3565 Bivona Street, The Bronx, NY, USA', 4, '0', NULL, NULL, 'No', '2023-02-20 14:09:50', '2023-02-24 08:16:40'),
(1041, 'Delivery Attempted', 'Open', 1022, 1060, 1, 0, 12, 'No', 'No', '0', '0.0', 'face2face', '', 'medium', '5', '40', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-02-28', '19:44:00', '', '2023-02-20', '02:09:00', '15:39:00', 'No', '', 'No', 'No', NULL, NULL, NULL, 'fgtw', 'fgtw', 'No', 1000, 0, NULL, '40.76769669999999', '-73.99284109999999', 0x000000000101000000fba765b58a7f52c0a2dfade243624440, '555 West 53rd Street, New York, NY, USA', 3, '0', NULL, NULL, 'No', '2023-02-20 14:11:01', '2023-02-24 08:16:22'),
(1042, 'Driver Out', 'Open', 1022, 1061, 1, 0, 12, 'No', 'No', '0', '0.0', 'face2face', '', 'medium', '2', '200', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-03-11', '10:41:00', '', '2023-02-20', '02:11:00', '15:41:00', 'No', '', 'No', 'No', NULL, NULL, NULL, 'Test By Jayesh', 'Test By Jayesh', 'No', 1000, 0, NULL, '40.76117199999999', '-74.00030699999999', 0x0000000001010000006fbda607058052c0c25087156e614440, '650 West 42nd Street, New York, NY, USA', 2, '0', NULL, NULL, 'Yes', '2023-02-20 14:11:50', '2023-02-24 08:16:22'),
(1043, 'Driver Out', 'Open', 1022, 1062, 1, 0, 12, 'No', 'No', '0', '0.0', 'face2face', '', 'small', '4', '40', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-02-23', '19:46:00', '', '2023-02-20', '02:11:00', '15:41:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1000, 0, NULL, '40.8363435', '-73.9461365', 0x00000000010100000052431b808d7c52c0705cc64d0d6b4440, '860 Riverside Drive, New York, NY, USA', 4, '0', NULL, NULL, 'No', '2023-02-20 14:12:41', '2023-02-24 08:16:22'),
(1044, 'Driver Out', 'Open', 1022, 1063, 1, 0, 14, 'No', 'No', '0', '0.0', 'face2face', '', 'small', '1', '30', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-02-27', '12:43:00', '', '2023-02-26', '06:38:00', '08:08:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1000, 0, NULL, '40.8054974', '-73.93731389999999', 0x00000000010100000085a570f3fc7b52c0ab01ef891a674440, '107 East 126th Street, New York, NY, USA', 2, '0', NULL, NULL, 'No', '2023-02-20 14:13:34', '2023-02-26 06:38:31'),
(1045, 'Driver Out', 'Open', 1022, 1064, 1, 0, 14, 'Yes', 'No', '0', '0.0', 'face2face', '', 'medium', '2', '50', 'regular', 'regular', 'Yes', '', 'Yes', 'Yes', 'No', 'No', 'No', '', '2023-03-08', '21:50:00', '', '2023-02-23', '11:25:00', '12:55:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1000, 0, NULL, '40.722046', '-73.97820779999999', 0x0000000001010000004c6ce3f49a7e52c0931ada006c5c4440, '738 East 5th Street, New York, NY, USA', 4, '0', '2023-03-01 20:00', NULL, 'No', '2023-02-20 14:14:17', '2023-02-23 11:26:17'),
(1046, 'Ready for Pickup', 'Open', 1022, 1037, 0, 0, 0, 'Yes', 'No', '0', '0.0', 'face2face', 'leave at the door of patient', 'medium', '1', '0', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-02-23', '17:12:00', '', '2023-02-21', '07:07:00', '20:37:00', 'Yes', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1022, 0, NULL, '40.7547898', '-73.99395489999999', 0x000000000101000000bc4c03f59c7f52c05c2dc1f39c604440, '336 West 37th Street, Нью-Йорк, США', 0, '0', NULL, NULL, 'No', '2023-02-21 19:11:07', '2023-02-27 15:29:38'),
(1047, 'Ready for Delivery', 'Open', 1022, 1037, 0, 0, 0, 'Yes', 'No', '0', '0.0', 'face2face', '', 'medium', '2', '0', 'regular', 'regular', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', '', '2023-02-23', '16:29:00', '', '2023-02-21', '07:26:00', '20:56:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1022, 0, NULL, '40.6747831', '-73.87484719999999', 0x000000000101000000d23f1c7ffd7752c05e32e94a5f564440, '2640 Pitkin Avenue, Бруклин, Нью-Йорк, США', 0, '0', NULL, NULL, 'No', '2023-02-21 19:27:35', '2023-02-23 06:49:52'),
(1048, 'Ready for Delivery', 'Open', 1022, 1065, 0, 0, 0, 'No', 'No', '0', '0.0', 'face2face', 'Leave At the Door', 'medium', '1', '0', 'regular', 'regular', 'No', '', 'No', 'No', 'Yes', 'No', 'No', '', '2023-02-23', '09:20:00', '', '2023-02-21', '07:43:00', '21:13:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1022, 0, NULL, '40.5852104', '-73.9353355', 0x0000000001010000006bd26d89dc7b52c0b9a3a42ce84a4440, '2808 Ford Street, Brooklyn, NY, USA', 0, '0', NULL, NULL, 'No', '2023-02-21 19:48:13', '2023-02-23 06:50:05'),
(1053, 'Delivered', 'Open', 1022, 1037, 0, 0, 12, 'No', 'No', '0', '0.0', 'face2face', '', 'small', '1', '', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-03-21', '12:00:00', '', '2023-03-21', '12:00:00', '12:00:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1000, 0, NULL, '40.7170111', '-74.0082834', 0x000000000101000000610619b7878052c03baf0c05c75b4440, '138 West Broadway, Нью-Йорк, США', 0, '0', NULL, NULL, 'Yes', '2023-03-01 09:59:50', '2023-03-01 09:59:50'),
(1054, 'Ready to Print', 'Open', 1032, 1069, 0, 0, 0, 'Yes', 'No', '0', '0.0', 'nosign', '', 'medium', '1', '0', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-03-02', '09:01:00', '', '2023-03-01', '06:57:00', '20:27:00', 'Yes', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1032, 0, NULL, '40.585242', '-73.950907', 0x00000000010100000066a208a9db7c52c0711fb935e94a4440, '1733 Sheepshead Bay Road, Бруклин, Нью-Йорк, США', 0, '0', NULL, NULL, 'No', '2023-03-01 19:00:11', '2023-03-01 19:00:11'),
(1056, 'Route Optimized', 'Open', 1023, 1071, 2, 0, 20, 'No', 'No', '0', '0.0', 'noask', '', 'small', '5', '400', 'regular', 'regular', 'No', '', 'Yes', 'Yes', 'No', 'No', 'Yes', '', '2023-03-28', '04:55:00', '', '2023-03-02', '09:27:00', '01:53:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1000, 0, NULL, '21.1381205', '72.7747444', 0x00000000010100000096308969953152403c6876dd5b233540, 'Rajhans Cinemas, Vesu Main Road, Vesu, Surat, Gujarat, India', 1, '0', NULL, NULL, 'No', '2023-03-02 09:25:21', '2023-03-02 09:34:27'),
(1057, 'Route Optimized', 'Open', 1022, 1072, 2, 0, 20, 'No', 'No', '0', '0.0', 'nosign', '', 'large', '5', '120', 'regular', 'regular', 'No', '', 'Yes', 'Yes', 'Yes', 'No', 'No', '', '2023-03-22', '18:03:00', '', '2023-03-02', '09:28:00', '10:58:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1000, 0, NULL, '21.1871374', '72.7858421', 0x0000000001010000007ad4a93c4b325240c5db943ce82f3540, 'SUMERRU BUSINESS CORNER, Adajan Gam, Pal Gam, Surat, Gujarat, India', 2, '0', NULL, NULL, 'No', '2023-03-02 09:31:02', '2023-03-02 09:34:27'),
(1058, 'Ready for Pickup', 'Open', 1022, 1037, 0, 0, 12, 'No', 'No', '0', '0.0', 'face2face', '', 'small', '1', '', 'regular', 'regular', 'No', '', 'No', 'No', 'No', 'No', 'No', '', '2023-03-02', '12:10:00', '', '2023-03-02', '12:10:00', '15:00:00', 'No', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, 'No', 1000, 0, NULL, '40.7170111', '-74.0082834', 0x000000000101000000610619b7878052c03baf0c05c75b4440, '138 West Broadway, Нью-Йорк, США', 0, '0', NULL, NULL, 'Yes', '2023-03-02 10:11:10', '2023-03-02 11:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders_activity`
--

CREATE TABLE `orders_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Order') NOT NULL DEFAULT 'Order',
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `activity` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_activity`
--

INSERT INTO `orders_activity` (`id`, `type`, `order_id`, `added_by`, `activity`, `created_at`, `updated_at`) VALUES
(181, 'Order', 1036, 1000, 'New order created.', '2023-02-20 13:55:02', '2023-02-20 13:55:02'),
(182, 'Order', 1037, 1000, 'New order created.', '2023-02-20 14:04:58', '2023-02-20 14:04:58'),
(183, 'Order', 1038, 1000, 'New order created.', '2023-02-20 14:07:13', '2023-02-20 14:07:13'),
(184, 'Order', 1039, 1000, 'New order created.', '2023-02-20 14:08:47', '2023-02-20 14:08:47'),
(185, 'Order', 1040, 1000, 'New order created.', '2023-02-20 14:09:50', '2023-02-20 14:09:50'),
(186, 'Order', 1041, 1000, 'New order created.', '2023-02-20 14:11:01', '2023-02-20 14:11:01'),
(187, 'Order', 1042, 1000, 'New order created.', '2023-02-20 14:11:50', '2023-02-20 14:11:50'),
(188, 'Order', 1043, 1000, 'New order created.', '2023-02-20 14:12:41', '2023-02-20 14:12:41'),
(189, 'Order', 1044, 1000, 'New order created.', '2023-02-20 14:13:34', '2023-02-20 14:13:34'),
(190, 'Order', 1045, 1000, 'New order created.', '2023-02-20 14:14:17', '2023-02-20 14:14:17'),
(191, 'Order', 1036, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:18:24', '2023-02-20 14:18:24'),
(192, 'Order', 1037, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:18:44', '2023-02-20 14:18:44'),
(193, 'Order', 1038, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:18:53', '2023-02-20 14:18:53'),
(194, 'Order', 1039, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:18:59', '2023-02-20 14:18:59'),
(195, 'Order', 1040, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:19:07', '2023-02-20 14:19:07'),
(196, 'Order', 1041, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:19:15', '2023-02-20 14:19:15'),
(197, 'Order', 1042, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:19:27', '2023-02-20 14:19:27'),
(198, 'Order', 1041, 1000, 'Changed status from Ready for Pickup to Ready for Pickup', '2023-02-20 14:19:39', '2023-02-20 14:19:39'),
(199, 'Order', 1043, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:19:46', '2023-02-20 14:19:46'),
(200, 'Order', 1044, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:19:52', '2023-02-20 14:19:52'),
(201, 'Order', 1045, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-20 14:20:06', '2023-02-20 14:20:06'),
(202, 'Order', 1036, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-20 14:20:24', '2023-02-20 14:20:24'),
(203, 'Order', 1037, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-20 14:20:30', '2023-02-20 14:20:30'),
(204, 'Order', 1038, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-20 14:20:37', '2023-02-20 14:20:37'),
(205, 'Order', 1039, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-20 14:20:43', '2023-02-20 14:20:43'),
(206, 'Order', 1040, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-20 14:20:49', '2023-02-20 14:20:49'),
(207, 'Order', 1041, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-20 14:20:56', '2023-02-20 14:20:56'),
(208, 'Order', 1042, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-20 14:21:03', '2023-02-20 14:21:03'),
(209, 'Order', 1043, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-20 14:21:08', '2023-02-20 14:21:08'),
(210, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 14:36:16', '2023-02-20 14:36:16'),
(211, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 14:36:38', '2023-02-20 14:36:38'),
(212, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 14:36:45', '2023-02-20 14:36:45'),
(213, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 14:37:04', '2023-02-20 14:37:04'),
(214, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 14:37:11', '2023-02-20 14:37:11'),
(215, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 14:37:26', '2023-02-20 14:37:26'),
(216, 'Order', 1044, 1000, 'Printed a label.', '2023-02-20 14:37:38', '2023-02-20 14:37:38'),
(217, 'Order', 1042, 1000, 'Printed a label.', '2023-02-20 14:37:44', '2023-02-20 14:37:44'),
(218, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 14:38:18', '2023-02-20 14:38:18'),
(219, 'Order', 1043, 1000, 'Printed a label.', '2023-02-20 14:38:39', '2023-02-20 14:38:39'),
(220, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 17:01:20', '2023-02-20 17:01:20'),
(221, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 17:17:53', '2023-02-20 17:17:53'),
(222, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 17:23:31', '2023-02-20 17:23:31'),
(223, 'Order', 1045, 1000, 'Print Confirmation', '2023-02-20 17:24:06', '2023-02-20 17:24:06'),
(224, 'Order', 1044, 1000, 'Print Confirmation', '2023-02-20 17:24:06', '2023-02-20 17:24:06'),
(225, 'Order', 1045, 1000, 'Print Delivery Slip', '2023-02-20 17:24:14', '2023-02-20 17:24:14'),
(226, 'Order', 1044, 1000, 'Print Delivery Slip', '2023-02-20 17:24:14', '2023-02-20 17:24:14'),
(227, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 17:27:29', '2023-02-20 17:27:29'),
(228, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 17:44:38', '2023-02-20 17:44:38'),
(229, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 17:45:21', '2023-02-20 17:45:21'),
(230, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 17:47:13', '2023-02-20 17:47:13'),
(231, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 17:47:13', '2023-02-20 17:47:13'),
(232, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 17:47:13', '2023-02-20 17:47:13'),
(233, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 17:47:35', '2023-02-20 17:47:35'),
(234, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 17:47:35', '2023-02-20 17:47:35'),
(235, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 17:47:35', '2023-02-20 17:47:35'),
(236, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 17:48:53', '2023-02-20 17:48:53'),
(237, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 17:48:53', '2023-02-20 17:48:53'),
(238, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 17:48:53', '2023-02-20 17:48:53'),
(239, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 17:52:19', '2023-02-20 17:52:19'),
(240, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 17:52:19', '2023-02-20 17:52:19'),
(241, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 17:52:19', '2023-02-20 17:52:19'),
(242, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 18:07:58', '2023-02-20 18:07:58'),
(243, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 18:07:58', '2023-02-20 18:07:58'),
(244, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 18:07:58', '2023-02-20 18:07:58'),
(245, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 18:13:21', '2023-02-20 18:13:21'),
(246, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 18:13:21', '2023-02-20 18:13:21'),
(247, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 18:13:21', '2023-02-20 18:13:21'),
(248, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 18:13:54', '2023-02-20 18:13:54'),
(249, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 18:13:54', '2023-02-20 18:13:54'),
(250, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 18:13:54', '2023-02-20 18:13:54'),
(251, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 18:14:39', '2023-02-20 18:14:39'),
(252, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 18:14:39', '2023-02-20 18:14:39'),
(253, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 18:14:39', '2023-02-20 18:14:39'),
(254, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 18:17:52', '2023-02-20 18:17:52'),
(255, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 18:17:52', '2023-02-20 18:17:52'),
(256, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 18:17:52', '2023-02-20 18:17:52'),
(257, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 18:18:23', '2023-02-20 18:18:23'),
(258, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 18:18:23', '2023-02-20 18:18:23'),
(259, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 18:18:23', '2023-02-20 18:18:23'),
(260, 'Order', 1041, 1000, 'Printed a label.', '2023-02-20 18:18:45', '2023-02-20 18:18:45'),
(261, 'Order', 1040, 1000, 'Printed a label.', '2023-02-20 18:18:45', '2023-02-20 18:18:45'),
(262, 'Order', 1039, 1000, 'Printed a label.', '2023-02-20 18:18:45', '2023-02-20 18:18:45'),
(263, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 18:53:20', '2023-02-20 18:53:20'),
(264, 'Order', 1045, 1000, 'Printed a label.', '2023-02-20 18:53:51', '2023-02-20 18:53:51'),
(265, 'Order', 1036, 1000, 'Printed a label.', '2023-02-21 12:02:52', '2023-02-21 12:02:52'),
(266, 'Order', 1036, 1000, 'Printed a label.', '2023-02-21 12:49:23', '2023-02-21 12:49:23'),
(280, 'Order', 1039, 1000, 'Printed a label.', '2023-02-21 14:00:18', '2023-02-21 14:00:18'),
(281, 'Order', 1045, 1022, 'Changed status from Driver Out to Ready for Pickup', '2023-02-21 15:38:49', '2023-02-21 15:38:49'),
(282, 'Order', 1045, 1022, 'Changed status from Ready for Pickup to Ready for Pickup', '2023-02-21 15:38:49', '2023-02-21 15:38:49'),
(283, 'Order', 1045, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-21 15:46:17', '2023-02-21 15:46:17'),
(284, 'Order', 1044, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-21 15:46:24', '2023-02-21 15:46:24'),
(302, 'Order', 1036, 2, 'Driver Add Driver Notes', '2023-02-21 17:36:02', '2023-02-21 17:36:02'),
(303, 'Order', 1036, 2, 'Changed status from Driver Out to Delivered', '2023-02-21 17:36:02', '2023-02-21 17:36:02'),
(304, 'Order', 1037, 2, 'Driver Add Driver Notes', '2023-02-21 18:27:40', '2023-02-21 18:27:40'),
(305, 'Order', 1037, 2, 'Changed status from Driver Out to Delivered', '2023-02-21 18:27:40', '2023-02-21 18:27:40'),
(306, 'Order', 1046, 1022, 'New order created.', '2023-02-21 19:11:07', '2023-02-21 19:11:07'),
(307, 'Order', 1046, 1022, 'Printed a label.', '2023-02-21 19:11:08', '2023-02-21 19:11:08'),
(308, 'Order', 1046, 1022, 'Printed a label.', '2023-02-21 19:11:51', '2023-02-21 19:11:51'),
(309, 'Order', 1046, 1000, 'Printed a label.', '2023-02-21 19:14:01', '2023-02-21 19:14:01'),
(310, 'Order', 1046, 1000, 'Printed a label.', '2023-02-21 19:15:22', '2023-02-21 19:15:22'),
(311, 'Order', 1046, 1000, 'Printed a label.', '2023-02-21 19:16:13', '2023-02-21 19:16:13'),
(312, 'Order', 1046, 1000, 'Printed a label.', '2023-02-21 19:17:04', '2023-02-21 19:17:04'),
(313, 'Order', 1046, 1000, 'Printed a label.', '2023-02-21 19:17:52', '2023-02-21 19:17:52'),
(314, 'Order', 1046, 1000, 'Print Delivery Slip', '2023-02-21 19:18:04', '2023-02-21 19:18:04'),
(315, 'Order', 1045, 1000, 'Print Delivery Slip', '2023-02-21 19:18:04', '2023-02-21 19:18:04'),
(316, 'Order', 1046, 1000, 'Print Confirmation', '2023-02-21 19:18:09', '2023-02-21 19:18:09'),
(317, 'Order', 1045, 1000, 'Print Confirmation', '2023-02-21 19:18:09', '2023-02-21 19:18:09'),
(318, 'Order', 1046, 1000, 'Printed a label.', '2023-02-21 19:18:24', '2023-02-21 19:18:24'),
(319, 'Order', 1045, 1000, 'Printed a label.', '2023-02-21 19:18:24', '2023-02-21 19:18:24'),
(320, 'Order', 1046, 1000, 'Printed a label.', '2023-02-21 19:18:56', '2023-02-21 19:18:56'),
(321, 'Order', 1046, 1000, 'Printed a label.', '2023-02-21 19:25:33', '2023-02-21 19:25:33'),
(322, 'Order', 1046, 1000, 'Printed a label.', '2023-02-21 19:25:51', '2023-02-21 19:25:51'),
(323, 'Order', 1047, 1022, 'New order created.', '2023-02-21 19:27:35', '2023-02-21 19:27:35'),
(324, 'Order', 1047, 1022, 'Printed a label.', '2023-02-21 19:27:35', '2023-02-21 19:27:35'),
(325, 'Order', 1047, 1000, 'Printed a label.', '2023-02-21 19:28:29', '2023-02-21 19:28:29'),
(326, 'Order', 1048, 1022, 'New order created.', '2023-02-21 19:48:13', '2023-02-21 19:48:13'),
(327, 'Order', 1048, 1022, 'Printed a label.', '2023-02-21 19:48:14', '2023-02-21 19:48:14'),
(330, 'Order', 1036, 2, 'Driver Add Driver Notes', '2023-02-22 04:16:29', '2023-02-22 04:16:29'),
(331, 'Order', 1036, 2, 'Changed status from Recipient Refused to Delivered', '2023-02-22 04:16:29', '2023-02-22 04:16:29'),
(332, 'Order', 1040, 1000, 'Printed a label.', '2023-02-22 04:29:49', '2023-02-22 04:29:49'),
(333, 'Order', 1040, 2, 'Driver Add Driver Notes', '2023-02-22 04:31:40', '2023-02-22 04:31:40'),
(334, 'Order', 1040, 2, 'Changed status from Driver Out to Delivered', '2023-02-22 04:31:40', '2023-02-22 04:31:40'),
(335, 'Order', 1042, 1, 'Driver Add Driver Notes', '2023-02-22 14:08:26', '2023-02-22 14:08:26'),
(336, 'Order', 1042, 1, 'Changed status from Driver Out to Delivered', '2023-02-22 14:08:26', '2023-02-22 14:08:26'),
(337, 'Order', 1041, 1000, 'Printed a label.', '2023-02-22 15:47:52', '2023-02-22 15:47:52'),
(338, 'Order', 1047, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-23 06:49:28', '2023-02-23 06:49:28'),
(339, 'Order', 1048, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-23 06:49:41', '2023-02-23 06:49:41'),
(340, 'Order', 1047, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-23 06:49:52', '2023-02-23 06:49:52'),
(341, 'Order', 1048, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-02-23 06:50:05', '2023-02-23 06:50:05'),
(342, 'Order', 1041, 1, 'Driver Add Driver Notes', '2023-02-23 07:04:13', '2023-02-23 07:04:13'),
(343, 'Order', 1041, 1, 'Changed status from Driver Out to Delivered', '2023-02-23 07:04:13', '2023-02-23 07:04:13'),
(344, 'Order', 1038, 1, 'Driver Add Driver Notes', '2023-02-23 13:22:51', '2023-02-23 13:22:51'),
(345, 'Order', 1038, 1, 'Changed status from Driver Out to Delivered', '2023-02-23 13:22:51', '2023-02-23 13:22:51'),
(346, 'Order', 1044, 1000, 'Printed a label.', '2023-02-26 06:37:46', '2023-02-26 06:37:46'),
(347, 'Order', 1044, 1000, 'Printed a label.', '2023-02-26 06:38:45', '2023-02-26 06:38:45'),
(348, 'Order', 1044, 1000, 'Printed a label.', '2023-02-26 06:39:40', '2023-02-26 06:39:40'),
(349, 'Order', 1046, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-02-27 15:29:38', '2023-02-27 15:29:38'),
(350, 'Order', 1054, 1032, 'New order created.', '2023-03-01 19:00:11', '2023-03-01 19:00:11'),
(351, 'Order', 1054, 1032, 'Printed a label.', '2023-03-01 19:00:11', '2023-03-01 19:00:11'),
(353, 'Order', 1056, 1000, 'New order created.', '2023-03-02 09:25:21', '2023-03-02 09:25:21'),
(355, 'Order', 1056, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-03-02 09:26:50', '2023-03-02 09:26:50'),
(357, 'Order', 1056, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-03-02 09:27:11', '2023-03-02 09:27:11'),
(358, 'Order', 1057, 1000, 'New order created.', '2023-03-02 09:31:02', '2023-03-02 09:31:02'),
(359, 'Order', 1057, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-03-02 09:31:20', '2023-03-02 09:31:20'),
(360, 'Order', 1057, 1000, 'Changed status from Ready for Pickup to Ready For Delivery', '2023-03-02 09:31:28', '2023-03-02 09:31:28'),
(361, 'Order', 1045, 1000, 'Printed a label.', '2023-03-02 10:15:29', '2023-03-02 10:15:29'),
(362, 'Order', 1045, 1000, 'Printed a label.', '2023-03-02 10:52:10', '2023-03-02 10:52:10'),
(363, 'Order', 1045, 1000, 'Printed a label.', '2023-03-02 10:52:13', '2023-03-02 10:52:13'),
(364, 'Order', 1045, 1000, 'Printed a label.', '2023-03-02 10:52:28', '2023-03-02 10:52:28'),
(365, 'Order', 1045, 1000, 'Printed a label.', '2023-03-02 10:59:30', '2023-03-02 10:59:30'),
(376, 'Order', 1058, 1000, 'Printed a label.', '2023-03-02 11:20:52', '2023-03-02 11:20:52'),
(377, 'Order', 1058, 1000, 'Changed status from Ready to Print to Ready for Pickup', '2023-03-02 11:20:52', '2023-03-02 11:20:52'),
(378, 'Order', 1045, 1000, 'Printed a label.', '2023-03-06 13:14:24', '2023-03-06 13:14:24'),
(379, 'Order', 1045, 1000, 'Printed a label.', '2023-03-06 13:17:40', '2023-03-06 13:17:40'),
(380, 'Order', 1057, 1000, 'Print Delivery Slip And Confirmation', '2023-03-06 16:13:31', '2023-03-06 16:13:31'),
(381, 'Order', 1057, 1000, 'Print Confirmation', '2023-03-06 16:13:35', '2023-03-06 16:13:35'),
(382, 'Order', 1057, 1000, 'Print Confirmation', '2023-03-06 16:13:40', '2023-03-06 16:13:40'),
(383, 'Order', 1057, 1000, 'Print Delivery Slip', '2023-03-06 16:13:42', '2023-03-06 16:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders_document`
--

CREATE TABLE `orders_document` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `document` text DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1:Attach photo | 2:Attach signature | 3: Copay | 4:Fridge ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_document`
--

INSERT INTO `orders_document` (`id`, `order_id`, `document`, `type`, `created_at`, `updated_at`) VALUES
(78, 1036, '16769853046.jpg', 1, '2023-02-21 13:15:04', '2023-02-21 13:15:04'),
(79, 1036, '167698545322.jpg', 1, '2023-02-21 13:17:33', '2023-02-21 13:17:33'),
(80, 1036, '167698751933.png', 1, '2023-02-21 13:51:59', '2023-02-21 13:51:59'),
(81, 1036, '1676987519428.png', 2, '2023-02-21 13:51:59', '2023-02-21 13:51:59'),
(82, 1037, '167700406046.jpg', 1, '2023-02-21 18:27:40', '2023-02-21 18:27:40'),
(83, 1036, '167703938960.png', 1, '2023-02-22 04:16:29', '2023-02-22 04:16:29'),
(84, 1036, '1677039389621.png', 2, '2023-02-22 04:16:29', '2023-02-22 04:16:29'),
(85, 1042, '167707490694.jpg', 1, '2023-02-22 14:08:26', '2023-02-22 14:08:26'),
(86, 1041, '167713585387.jpg', 1, '2023-02-23 07:04:13', '2023-02-23 07:04:13'),
(87, 1038, '167715857198.jpg', 1, '2023-02-23 13:22:51', '2023-02-23 13:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders_status_activity`
--

CREATE TABLE `orders_status_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_status_activity`
--

INSERT INTO `orders_status_activity` (`id`, `order_id`, `added_by`, `from`, `to`, `created_at`, `updated_at`) VALUES
(136, 1036, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:18:24', '2023-02-20 14:18:24'),
(137, 1037, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:18:44', '2023-02-20 14:18:44'),
(138, 1038, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:18:53', '2023-02-20 14:18:53'),
(139, 1039, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:18:59', '2023-02-20 14:18:59'),
(140, 1040, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:19:07', '2023-02-20 14:19:07'),
(141, 1041, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:19:15', '2023-02-20 14:19:15'),
(142, 1042, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:19:27', '2023-02-20 14:19:27'),
(143, 1041, 1000, 'Ready for Pickup', 'Ready for Pickup', '2023-02-20 14:19:39', '2023-02-20 14:19:39'),
(144, 1043, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:19:46', '2023-02-20 14:19:46'),
(145, 1044, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:19:52', '2023-02-20 14:19:52'),
(146, 1045, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-20 14:20:06', '2023-02-20 14:20:06'),
(147, 1036, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-20 14:20:24', '2023-02-20 14:20:24'),
(148, 1037, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-20 14:20:30', '2023-02-20 14:20:30'),
(149, 1038, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-20 14:20:37', '2023-02-20 14:20:37'),
(150, 1039, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-20 14:20:43', '2023-02-20 14:20:43'),
(151, 1040, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-20 14:20:49', '2023-02-20 14:20:49'),
(152, 1041, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-20 14:20:56', '2023-02-20 14:20:56'),
(153, 1042, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-20 14:21:03', '2023-02-20 14:21:03'),
(154, 1043, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-20 14:21:08', '2023-02-20 14:21:08'),
(155, 1045, 1022, 'Driver Out', 'Ready for Pickup', '2023-02-21 15:38:49', '2023-02-21 15:38:49'),
(156, 1045, 1022, 'Ready for Pickup', 'Ready for Pickup', '2023-02-21 15:38:49', '2023-02-21 15:38:49'),
(157, 1045, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-21 15:46:17', '2023-02-21 15:46:17'),
(158, 1044, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-21 15:46:24', '2023-02-21 15:46:24'),
(160, 1036, 2, 'Driver Out', 'Delivered', '2023-02-21 17:36:02', '2023-02-21 17:36:02'),
(161, 1037, 2, 'Driver Out', 'Delivered', '2023-02-21 18:27:40', '2023-02-21 18:27:40'),
(162, 1036, 2, 'Recipient Refused', 'Delivered', '2023-02-22 04:16:29', '2023-02-22 04:16:29'),
(163, 1040, 2, 'Driver Out', 'Delivered', '2023-02-22 04:31:40', '2023-02-22 04:31:40'),
(164, 1042, 1, 'Driver Out', 'Delivered', '2023-02-22 14:08:26', '2023-02-22 14:08:26'),
(165, 1047, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-23 06:49:28', '2023-02-23 06:49:28'),
(166, 1048, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-23 06:49:41', '2023-02-23 06:49:41'),
(167, 1047, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-23 06:49:52', '2023-02-23 06:49:52'),
(168, 1048, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-02-23 06:50:05', '2023-02-23 06:50:05'),
(169, 1041, 1, 'Driver Out', 'Delivered', '2023-02-23 07:04:13', '2023-02-23 07:04:13'),
(170, 1038, 1, 'Driver Out', 'Delivered', '2023-02-23 13:22:51', '2023-02-23 13:22:51'),
(171, 1046, 1000, 'Ready to Print', 'Ready for Pickup', '2023-02-27 15:29:38', '2023-02-27 15:29:38'),
(173, 1056, 1000, 'Ready to Print', 'Ready for Pickup', '2023-03-02 09:26:50', '2023-03-02 09:26:50'),
(175, 1056, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-03-02 09:27:11', '2023-03-02 09:27:11'),
(176, 1057, 1000, 'Ready to Print', 'Ready for Pickup', '2023-03-02 09:31:20', '2023-03-02 09:31:20'),
(177, 1057, 1000, 'Ready for Pickup', 'Ready For Delivery', '2023-03-02 09:31:28', '2023-03-02 09:31:28'),
(178, 1058, 1000, 'Ready to Print', 'Ready for Pickup', '2023-03-02 11:20:52', '2023-03-02 11:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders_types`
--

CREATE TABLE `orders_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `user_type` longtext DEFAULT NULL,
  `isActive` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_types`
--

INSERT INTO `orders_types` (`id`, `order_type`, `user_type`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Regular', NULL, 'Yes', '2023-01-17 05:13:20', '2023-01-17 05:13:20'),
(2, 'Next-Day', NULL, 'Yes', '2023-01-17 05:13:29', '2023-01-17 05:13:29');

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
-- Table structure for table `prescriptions_no`
--

CREATE TABLE `prescriptions_no` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `rx_number` varchar(255) DEFAULT NULL,
  `date_filled` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions_no`
--

INSERT INTO `prescriptions_no` (`id`, `order_id`, `rx_number`, `date_filled`, `created_at`, `updated_at`) VALUES
(53, 1036, 'rx-2132121312', '2023-02-20', '2023-02-20 13:55:02', '2023-02-20 13:55:02'),
(54, 1037, 'rx-111111', '2023-02-20', '2023-02-20 14:04:58', '2023-02-20 14:04:58'),
(55, 1038, 'rx-000009888', '2023-02-20', '2023-02-20 14:07:13', '2023-02-20 14:07:13'),
(56, 1039, 'rx-444332222', '2023-02-20', '2023-02-20 14:08:47', '2023-02-20 14:08:47'),
(57, 1040, 'rx-96789', '2023-02-20', '2023-02-20 14:09:50', '2023-02-20 14:09:50'),
(58, 1041, 'rx-9292929', '2023-02-20', '2023-02-20 14:11:01', '2023-02-20 14:11:01'),
(59, 1042, 'rx-000000000', '2023-03-03', '2023-02-20 14:11:50', '2023-02-20 14:11:50'),
(60, 1043, 'rx-09191919', '2023-02-20', '2023-02-20 14:12:41', '2023-02-20 14:12:41'),
(61, 1044, 'rx-0000', '2023-02-20', '2023-02-20 14:13:34', '2023-02-20 14:13:34'),
(62, 1045, 'rx-299292929', '2023-02-20', '2023-02-20 14:14:17', '2023-02-20 14:14:17'),
(63, 1046, '6868', '2023-02-21', '2023-02-21 19:11:07', '2023-02-21 19:11:07'),
(64, 1047, '32323', '2023-02-21', '2023-02-21 19:27:35', '2023-02-21 19:27:35'),
(65, 1048, '123', '2023-02-21', '2023-02-21 19:48:13', '2023-02-21 19:48:13'),
(68, 1054, '1221', '2023-03-01', '2023-03-01 19:00:11', '2023-03-01 19:00:11'),
(70, 1056, 'rx-654654', '2023-03-02', '2023-03-02 09:25:21', '2023-03-02 09:25:21'),
(71, 1057, 'rx-231213', '2023-03-02', '2023-03-02 09:31:02', '2023-03-02 09:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `delivery_address` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `apt` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `home_phone` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`home_phone`)),
  `other_email` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`other_email`)),
  `added_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipients`
--

INSERT INTO `recipients` (`id`, `name`, `email`, `delivery_address`, `address`, `city`, `zip`, `state`, `apt`, `phone`, `latitude`, `longitude`, `home_phone`, `other_email`, `added_by`, `created_at`, `updated_at`) VALUES
(1000, 'Patrick Everett', 'MemorialCare@gmail.com', '2801 Atlantic Ave, Long Beach, CA 90806, United States', '2801 Atlantic Ave, Long Beach, CA 90806, United States', 'Long Beach', '90806', '', 'Quia error pariatur', '+1 (873) 103-5746', '33.8079705', '-118.186492', '[\"+1 (718) 141-3631\"]', '[]', 1000, '2023-01-17 05:24:39', '2023-01-17 05:24:39'),
(1001, 'Hyatt Butler', 'Pacific@gmail.com', 'Pacific Plaza Pharmacy, Pacific Avenue, Long Beach, CA, USA', 'Pacific Plaza Pharmacy, Pacific Avenue, Long Beach, CA, USA', 'Long Beach', '90806', '', 'Ut culpa enim tempo', '+1 (641) 533-7288', '33.8076767', '-118.1941328', '[\"+1 (593) 984-6738\"]', '[]', 1000, '2023-01-17 05:25:39', '2023-01-17 05:25:39'),
(1002, 'Charlotte Mendez', 'GoldenPharmacy@gmail.com', 'Golden Pharmacy, Pacific Avenue, Long Beach, CA, USA', 'Golden Pharmacy, Pacific Avenue, Long Beach, CA, USA', 'Long Beach', '90813', '', 'Placeat voluptatum', '+1 (582) 409-2882', '33.7890252', '-118.1933315', '[\"+1 (851) 963-9205\"]', '[]', 1000, '2023-01-17 05:26:26', '2023-01-17 05:26:26'),
(1003, 'Lee Lynn', 'TPharmacy@gmail.com', 'T & C Pharmacy, East Pacific Coast Highway, Long Beach, CA, USA', 'T & C Pharmacy, East Pacific Coast Highway, Long Beach, CA, USA', 'Long Beach', '90804', 'CA', 'Animi sit ut sunt', '+1 (621) 203-9659', '33.7895546', '-118.1638958', '[\"+1 (982) 556-8446\"]', '[]', 1000, '2023-01-17 05:27:25', '2023-01-17 05:27:25'),
(1004, 'Sonya Watson', 'Walgreens@gmail.com', '600 Long Beach Blvd, Long Beach, CA 90802, United States', '600 Long Beach Blvd, Long Beach, CA 90802, United States', 'Long Beach', '90802', '', 'Blanditiis id labori', '+1 (126) 876-7726', '33.77439409999999', '-118.1889838', '[\"+1 (817) 121-2582\"]', '[]', 1000, '2023-01-17 05:32:51', '2023-01-17 05:32:51'),
(1005, 'Grant Lang', 'CVSPharmacy@gmail.com', '4775 Rosecrans Ave, Hawthorne, CA 90250, United States', '4775 Rosecrans Ave, Hawthorne, CA 90250, United States', 'Ipsum est sapiente', '83428', '', 'Enim voluptas nostru', '+1 (107) 681-7636', '', '', '[\"+1 (331) 561-3991\"]', '[]', 1000, '2023-01-17 13:24:43', '2023-01-17 13:24:43'),
(1006, 'Kelsie Martin', 'Pharmacy@gmail.com', '950 N Western Ave, San Pedro, CA 90732, United States', '950 N Western Ave, San Pedro, CA 90732, United States', 'Rancho Palos Verdes', '90732', '', 'Lorem lorem molestia', '+1 (868) 661-9539', '33.7512585', '-118.3090097', '[\"+1 (957) 115-6326\"]', '[]', 1000, '2023-01-17 13:26:49', '2023-01-17 13:26:49'),
(1007, 'Dean Sanchez', 'c@gmail.com', '155 CA-1, Hermosa Beach, CA 90254, United States', '155 CA-1, Hermosa Beach, CA 90254, United States', 'Hermosa Beach', '90254', '', 'Commodi consequat Q', '+1 (225) 997-2524', '33.8559997', '-118.3910307', '[\"+1 (591) 913-6297\"]', '[]', 1000, '2023-01-17 13:28:10', '2023-01-17 13:28:10'),
(1008, 'Graiden Browning', 'aaa@gmail.com', '950 N Western Ave, San Pedro, CA 90732, United States', '950 N Western Ave, San Pedro, CA 90732, United States', 'Rancho Palos Verdes', '90732', '', 'Cum placeat blandit', '+1 (473) 823-5585', '33.7512585', '-118.3090097', '[\"+1 (621) 705-7813\"]', '[]', 1000, '2023-01-17 13:28:56', '2023-01-17 13:28:56'),
(1009, 'McKenzie Crawford', 'aaa1a@gmail.com', '1 World Way, Los Angeles, CA 90045, United States', '1 World Way, Los Angeles, CA 90045, United States', 'Los Angeles', '90045', '', 'In est in quis illo', '+1 (646) 506-8948', '33.9460203', '-118.4010335', '[\"+1 (773) 517-5136\"]', '[]', 1000, '2023-01-17 13:30:10', '2023-01-17 13:30:10'),
(1010, 'Jayesh', 'Jayesh.Italiya@iCloud.com', '20 Jamstead Court, Buffalo, NY, USA', '20 Jamstead Court, Buffalo, NY, USA', 'Buffalo', '12122', '', '111', '+919979776494', '42.9831851', '-78.7444625', '[null]', '[]', 1000, '2023-01-17 16:06:27', '2023-01-17 16:06:27'),
(1011, 'Ayna', '', '', '206 Brooklyn Bridge Blvd, Brooklyn, NY, USA', 'Newyork', '11201', '', '11', '+91 9979776494', '', '', '[null]', '[]', 1001, '2023-01-18 18:23:04', '2023-01-28 18:12:09'),
(1012, 'Jack Henry', 'medly@gmail.com', '209 Brookline Dental, Harvard Street, Brookline, MA, USA', '209 Brookline Dental, Harvard Street, Brookline, MA, USA', 'Brookline', '02446', '', '111', '+1 9989887632', '42.3398067', '-71.12048229999999', '[null]', '[]', 1002, '2023-01-19 14:13:22', '2023-01-19 14:13:22'),
(1015, 'Farrukh Nurridonov', 'Jack@admin.com', '289 Brad Street, Jamestown, NY, USA', '289 Brad Street, Jamestown, NY, USA', 'Jamestown', '14701', '', '111', '+1 7862056283', '42.0782116', '-79.2309563', '[null]', '[]', 1002, '2023-01-19 14:18:09', '2023-01-19 14:18:09'),
(1016, 'Nick John Harriys', 'Rup@admin.com', 'US Army Reserve Center, 123 NY-303, Orangeburg, NY, USA', 'US Army Reserve Center, 123 NY-303, Orangeburg, NY, USA', 'Orangeburg', '12122', '', '424', '+18628898228', '41.038007', '-73.94207999999999', '[null]', '[]', 1002, '2023-01-19 14:21:29', '2023-01-19 14:21:29'),
(1017, 'Rukh Shah', 'Rukh@admin.com', '19 St Marks Pl, New York, NY, USA', '19 St Marks Pl, New York, NY, USA', 'New York', '21211', '', '20', '+1 728738921', '40.729187', '-73.988711', '[null]', '[]', 1002, '2023-01-19 14:24:35', '2023-01-19 14:24:35'),
(1018, 'SEDA MAGDALENA', 'mittal.italiya97@gmail.com', '3887 Cannon Place, The Bronx, NY, USA', '3887 Cannon Place, The Bronx, NY, USA', 'Bronx', '10463', '', '11', '+17187964414', '40.8839827', '-73.8948752', '[null]', '[]', 1007, '2023-02-12 06:53:31', '2023-02-20 13:55:02'),
(1021, 'rgergvbfedg', 'a@yopmail.com', 'Fefese Repuestos - Avenida Circunvalación, Iquique, Chile', 'Reverb by Hard Rock Downtown Atlanta, Centennial Olympic Park Drive Northwest, Atlanta, GA, USA', 'Atlanta', '30313', '', '1', '654314654', '-20.2007514', '-70.1325179', '[null]', '[]', 1000, '2023-02-13 14:27:41', '2023-02-13 14:46:43'),
(1022, 'EDMOND CUKA', 'bet1995@mail.ru', '2808 Ford Street, Brooklyn, NY, USA', '2808 Ford Street, Brooklyn, NY, USA', 'Brooklyn', '11230', '', '11', '+1 3478195767', '40.5852104', '-73.9353355', '[null]', '[]', 1020, '2023-02-13 17:37:51', '2023-02-13 17:37:51'),
(1023, 'PORTALATIN YOMAR', 'jack@gmail.com', '206 West 92nd Street, New York, NY, USA', '206 West 92nd Street, New York, NY, USA', 'New York', '10025', '', '610', '+12126651678', '40.7916845', '-73.9730395', '[null]', '[]', 1000, '2023-02-14 12:59:49', '2023-02-14 12:59:49'),
(1024, 'PORTALATIN YOMAR', 'YOMAR@gmail.com', '161 Manhattan Avenue, New York, NY, USA', '161 Manhattan Avenue, New York, NY, USA', 'New York', '10025', '', '610', '19176845083', '', '', '[null]', '[]', 1000, '2023-02-14 13:01:25', '2023-02-14 13:01:25'),
(1025, 'ROSADO SENOVIA', 'ROSADO@GMAIL.COM', '631 East 219th Street, The Bronx, NY, USA', '631 E 219th St, The Bronx, NY, USA', 'Bronx', '10467', '', '2nd Floor', '+17182007227', '40.8844674', '-73.8650957', '[null]', '[]', 1000, '2023-02-14 13:06:18', '2023-02-19 15:48:15'),
(1026, 'FLORES EDNA', 'EDNA@GMAIL.COM', '576 Timpson Place, The Bronx, NY, USA', '576 Timpson Place, The Bronx, NY, USA', 'Bronx', '10455', '', '5B', '+12129427937', '40.8117113', '-73.90194919999999', '[null]', '[]', 1000, '2023-02-14 13:11:46', '2023-02-14 13:11:46'),
(1027, 'ARROYO ELETICIA', 'ELETICIA@gmail.com', '35 Jackson Street, New York, NY, USA', '35 Jackson Street, New York, NY, USA', 'New York', '10002', '', '5C', '+17185707514', '40.7125868', '-73.9810178', '[null]', '[]', 1000, '2023-02-14 13:13:25', '2023-02-14 13:13:25'),
(1028, 'TOBAL OLGA', 'OLGA@gmail.com', '559 West 164th Street, New York, NY, USA', '559 West 164th Street, New York, NY, USA', 'New York', '10032', '', '2H', '+12129270774', '40.83828099999999', '-73.9407123', '[null]', '[]', 1000, '2023-02-14 13:15:53', '2023-02-14 13:15:53'),
(1029, 'PEREZ MARCOS', 'marcos@gmail.com', '164 Saint Ann\'s Avenue, The Bronx, NY, USA', '164 Saint Ann\'s Avenue, The Bronx, NY, USA', 'Bronx', '10454', '', '5-A', '+13479672607', '40.805263', '-73.91820779999999', '[null]', '[]', 1000, '2023-02-14 13:18:00', '2023-02-14 13:18:00'),
(1030, 'BONDZIE GODSON', 'wood@gmail.com', '2775 Marion Avenue, The Bronx, NY, USA', '2775 Marion Avenue, The Bronx, NY, USA', 'Bronx', '10458', '', '1C', '+16317419434', '40.8667674', '-73.8879462', '[null]', '[]', 1000, '2023-02-14 13:26:07', '2023-02-14 13:26:07'),
(1031, 'GONZALEZ EDILIA', 'EDILIA@gmail.com', '235 Fort Washington Avenue, New York, NY, USA', '235 Fort Washington Avenue, New York, NY, USA', 'New York', '10032', '', '1F', '+12129281662', '40.8431177', '-73.9422491', '[null]', '[]', 1000, '2023-02-14 13:29:23', '2023-02-14 13:29:23'),
(1032, 'GILLES GLADYS J', 'GILLES@gmail.com', '2345 Broadway, New York, NY, USA', '2345 Broadway, New York, NY, USA', 'New York', '10024', '', '313', '+12127878600', '40.7880912', '-73.9771422', '[null]', '[]', 1000, '2023-02-14 13:38:58', '2023-02-14 13:38:58'),
(1033, 'CABRERA ANA', 'ana@gmail.com', '565 West 148th Street, New York, NY, USA', '565 West 148th Street, New York, NY, USA', 'New York', '10031', '', '51', '+12122345703', '40.82831729999999', '-73.94858200000002', '[null]', '[]', 1000, '2023-02-14 13:41:12', '2023-02-14 13:41:12'),
(1034, 'VANDO HILDA', 'HILDA@gmail.com', '45 Fairview Avenue, New York, NY, USA', '45 Fairview Avenue, New York, NY, USA', 'New York', '10040', '', '16A', '+19177486779', '40.85771949999999', '-73.9295067', '[null]', '[]', 1000, '2023-02-14 15:42:20', '2023-02-14 15:42:20'),
(1035, 'JIMENEZ JOSEFA', 'JOSEFA@gmail.com', '500 West 135th Street, New York, NY, USA', '500 West 135th Street, New York, NY, USA', 'New York', '10031', '', '6A', '+19176039144', '40.8189289', '-73.9526618', '[null]', '[]', 1000, '2023-02-14 15:44:17', '2023-02-14 15:44:17'),
(1036, 'GUTH ARTHUR', 'ARTHUR@gmail.com', '1622 York Avenue, New York, NY, USA', '1622 York Avenue, New York, NY, USA', 'New York', '10028', '', '1110', '+19176120052', '40.7754991', '-73.94712849999999', '[null]', '[]', 1000, '2023-02-14 15:46:43', '2023-02-14 15:46:43'),
(1037, 'Jayesh Pharmacy Rx', 'shoxruxabdullayev662@gmail.com', '138 West Broadway, Нью-Йорк, США', '138 West Broadway, Нью-Йорк, США', NULL, NULL, NULL, NULL, '+16467391873', '40.7170111', '-74.0082834', '[\"+16467391873\"]', '[]', 1000, '2023-02-17 18:02:26', '2023-03-01 09:19:54'),
(1038, 'Lorem Ipsum', 'loremipsum@yopmail.com', '305 Park Avenue South, New York, NY, USA', '345 Park Avenue, New York, NY, USA', 'New York', '10154', '', '2', '1232312113121', '40.7403895', '-73.98595619999999', '[null]', '[]', 1000, '2023-02-18 09:46:59', '2023-02-18 17:29:45'),
(1039, 'Jayesh Italia', 'shokhrukhbusiness@gmail.com', '3619 Provost Avenue, Бронкс, Нью-Йорк, США', '138 West Broadway, Нью-Йорк, США', 'NY', '10013', '', '3A', '+998904550205', '40.8866616', '-73.8285866', '[null]', '[]', 1022, '2023-02-18 15:29:40', '2023-02-18 15:30:29'),
(1040, 'Abdullaev Shokhrukh', 'Farser80@gmail.com', '550 1 Avenue, Нью-Йорк, США', '550 1 Avenue, Нью-Йорк, США', 'New York', '10016', '', '5A', '+16467391873', '40.742133', '-73.97385109999999', '[null]', '[]', 1022, '2023-02-18 15:33:16', '2023-02-18 15:33:16'),
(1048, 'Lorem Ipsum', 'loremipsumcarter@gmail.com', '36191 English Court, Sterling Heights, MI, USA', '36191 English Court, Sterling Heights, MI, USA', 'Sterling Heights', '48310', '', '3rd floor', '2113211', '42.5607122', '-83.07721959999999', '[null]', '[]', 1000, '2023-02-20 05:26:09', '2023-02-20 05:26:09'),
(1049, 'Lorem I', 'ipsumcarter@gmail.com', 'TreeRunner Adventure Park & Mini Golf West Bloomfield, Drake Road, West Bloomfield Township, MI, USA', 'TreeRunner Adventure Park & Mini Golf West Bloomfield, Drake Road, West Bloomfield Township, MI, USA', 'West Bloomfield Township', '48322', '', '32', '32312131231', '42.54510639999999', '-83.4020324', '[null]', '[]', 1000, '2023-02-20 05:31:32', '2023-02-20 05:31:32'),
(1055, 'Lorem Ipsum', '', '11215 Oak Leaf Drive, Silver Spring, MD, USA', '11215 Oak Leaf Drive, Silver Spring, MD, USA', 'Silver Spring', '20901', '', '2rd floor', '1111111111', '39.03967069999999', '-76.99415619999999', '[null]', '[]', 1000, '2023-02-20 06:32:37', '2023-02-20 06:32:37'),
(1056, 'BONILLA EVIAN', '', '1027 Boston Rd, The Bronx, NY, USA', '1027 Boston Rd, The Bronx, NY, USA', 'BRONX', '10456', '', '3RD FLR', '+13479080167', '40.8261723', '-73.9070847', '[null]', '[]', 1000, '2023-02-20 14:04:58', '2023-02-20 14:04:58'),
(1057, 'QUINTUNA ORTEGA ARIOSTO', '', '514 East 138th Street, The Bronx, NY, USA', '514 East 138th Street, The Bronx, NY, USA', 'BRONX', '10454', '', 'APT 18', '+16468121102', '40.8071971', '-73.91909679999999', '[null]', '[]', 1000, '2023-02-20 14:07:13', '2023-02-20 14:07:13'),
(1058, 'NABUT JEANNE', '', '10 Monroe Street, New York, NY, USA', '10 Monroe Street, New York, NY, USA', 'New York', '10002', '', '12 J', '+19175233420', '40.71161439999999', '-73.9952469', '[null]', '[]', 1000, '2023-02-20 14:08:47', '2023-02-20 14:08:47'),
(1059, 'GARAY INES', '', '3565 Bivona Street, The Bronx, NY, USA', '3565 Bivona Street, The Bronx, NY, USA', 'BRONX', '10475', '', '12A', '14438343883', '40.88307959999999', '-73.8334679', '[null]', '[]', 1000, '2023-02-20 14:09:50', '2023-02-20 14:09:50'),
(1060, 'HUANG SU', '', '555 West 53rd Street, New York, NY, USA', '555 West 53rd Street, New York, NY, USA', 'New York', '10019', '', '644', '+13472543195', '40.76769669999999', '-73.99284109999999', '[null]', '[]', 1000, '2023-02-20 14:11:01', '2023-02-20 14:11:01'),
(1061, 'OBRIEN JOHN', '', '650 West 42nd Street, New York, NY, USA', '650 West 42nd Street, New York, NY, USA', 'New York', '10036', '', '1524', '19176503487', '40.76117199999999', '-74.00030699999999', '[null]', '[]', 1000, '2023-02-20 14:11:50', '2023-02-20 14:11:50'),
(1062, 'BUENO LADYS', '', '860 Riverside Drive, New York, NY, USA', '860 Riverside Drive, New York, NY, USA', 'New York', '10032', '', '4f', '+12125681203', '40.8363435', '-73.9461365', '[null]', '[]', 1000, '2023-02-20 14:12:41', '2023-02-20 14:12:41'),
(1063, 'SERRANO CARLOS', '', '107 East 126th Street, New York, NY, USA', '107 East 126th Street, New York, NY, USA', 'New York', '10035', 'NY', '5C', '+16465259053', '40.8054974', '-73.93731389999999', '[]', '[]', 1000, '2023-02-20 14:13:34', '2023-02-26 06:38:31'),
(1064, 'TIBURCIO JOSE', '', '738 East 5th Street, New York, NY, USA', '738 East 5th Street, New York, NY, USA', 'New York', '10009', 'CT', '6C', '12123619750', '40.722046', '-73.97820779999999', '[\"23121321321321\"]', '[]', 1000, '2023-02-20 14:14:17', '2023-02-23 11:26:17'),
(1065, 'Michel Jackson 213', '', '2808 Ford Street, Brooklyn, NY, USA', '2808 Ford Street, Brooklyn, NY, USA', 'New York', '11229', 'CT', '3rd Floor', '45454545454', '40.5852104', '-73.9353355', '[\"2312\",\"55555\"]', '[]', 1022, '2023-02-21 19:48:12', '2023-02-23 06:08:28'),
(1068, 'Solidity Rx', 'laylotemurova@gmail.com', '779 Broadway, New York, NY, USA', '779 Broadway, New York, NY, USA', NULL, NULL, NULL, NULL, '+19293107070', '40.7315386', '-73.9919311', '[\"+19293107070\"]', NULL, 1000, '2023-03-01 09:28:46', '2023-03-01 09:28:46'),
(1069, 'Test Joseph', '', '1733 Sheepshead Bay Road, Бруклин, Нью-Йорк, США', '1733 Sheepshead Bay Road, Бруклин, Нью-Йорк, США', 'NY', '10466', 'NY', '1', '9177646065', '40.585242', '-73.950907', '[null]', '[]', 1032, '2023-03-01 19:00:11', '2023-03-01 19:00:11'),
(1070, 'Joseph Cartos', '', 'PAL RTO office, Hazira - Adajan Road, Adajan Gam, Surat, Gujarat, India', 'PAL RTO office, Hazira - Adajan Road, Adajan Gam, Surat, Gujarat, India', 'Surat', '395009', 'CT', '5th floor', '21313121231', '21.182063', '72.782675', '[null]', '[]', 1000, '2023-03-02 09:23:21', '2023-03-02 09:23:21'),
(1071, 'Ayas Vyuga', '', 'Rajhans Cinemas, Vesu Main Road, Vesu, Surat, Gujarat, India', 'Rajhans Cinemas, Vesu Main Road, Vesu, Surat, Gujarat, India', 'Surat', '365006', 'CT', '1st floor', '21312313123', '21.1381205', '72.7747444', '[null]', '[]', 1000, '2023-03-02 09:25:21', '2023-03-02 09:25:21'),
(1072, 'James Carter', '', 'SUMERRU BUSINESS CORNER, Adajan Gam, Pal Gam, Surat, Gujarat, India', 'SUMERRU BUSINESS CORNER, Adajan Gam, Pal Gam, Surat, Gujarat, India', 'Surat', '395009', 'CT', '21 floor', '23132321231', '21.1871374', '72.7858421', '[null]', '[]', 1000, '2023-03-02 09:31:02', '2023-03-02 09:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `route_name_id` varchar(255) DEFAULT NULL,
  `route_name_i` varchar(255) DEFAULT NULL,
  `path` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`path`)),
  `area` polygon DEFAULT NULL,
  `regions_color` text DEFAULT NULL,
  `service_time` varchar(255) DEFAULT NULL,
  `starts_at` datetime DEFAULT NULL,
  `sameday_delivery` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sameday_start_place` varchar(255) DEFAULT NULL,
  `sameday_finish_place` varchar(255) DEFAULT NULL,
  `is_queued` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_real` enum('Yes','No') NOT NULL DEFAULT 'No',
  `total_order` bigint(20) NOT NULL DEFAULT 0,
  `started` datetime DEFAULT NULL,
  `is_started` enum('Yes','No') NOT NULL DEFAULT 'No',
  `hub_start_lat` varchar(255) DEFAULT NULL,
  `hub_start_lng` varchar(255) DEFAULT NULL,
  `hub_finish_lat` varchar(255) DEFAULT NULL,
  `hub_finish_lng` varchar(255) DEFAULT NULL,
  `is_route_optimized` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_finished` enum('Yes','No') NOT NULL DEFAULT 'No',
  `last_stop` datetime DEFAULT NULL,
  `driver_current_location` longtext DEFAULT NULL,
  `approximate_driving_time` varchar(255) DEFAULT NULL,
  `distance` varchar(255) DEFAULT NULL,
  `actual_driving_time` varchar(255) DEFAULT NULL,
  `sessionId` longtext DEFAULT NULL,
  `is_request_mask_photo` enum('Yes','No') NOT NULL DEFAULT 'No',
  `mask_photo` text DEFAULT NULL,
  `driver_id` bigint(20) NOT NULL DEFAULT 0,
  `dispatcher_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `route_name`, `route_name_id`, `route_name_i`, `path`, `area`, `regions_color`, `service_time`, `starts_at`, `sameday_delivery`, `sameday_start_place`, `sameday_finish_place`, `is_queued`, `is_real`, `total_order`, `started`, `is_started`, `hub_start_lat`, `hub_start_lng`, `hub_finish_lat`, `hub_finish_lng`, `is_route_optimized`, `is_finished`, `last_stop`, `driver_current_location`, `approximate_driving_time`, `distance`, `actual_driving_time`, `sessionId`, `is_request_mask_photo`, `mask_photo`, `driver_id`, `dispatcher_id`, `created_at`, `updated_at`) VALUES
(12, 'Brooklyn', '5', '1', '[{\"lat\":\"40.775991804565585\",\"lng\":\"-73.98897171020509\"},{\"lat\":\"40.756489872673846\",\"lng\":\"-74.00665283203126\"},{\"lat\":\"40.713175131022695\",\"lng\":\"-74.01180267333986\"},{\"lat\":\"40.69977176830021\",\"lng\":\"-73.98553848266603\"},{\"lat\":\"40.72657579608992\",\"lng\":\"-73.97472381591798\"},{\"lat\":\"40.759220487652215\",\"lng\":\"-73.96871566772462\"},{\"lat\":\"40.775991804565585\",\"lng\":\"-73.95257949829103\"},{\"lat\":\"40.81718705874584\",\"lng\":\"-73.93627166748048\"},{\"lat\":\"40.83771016242007\",\"lng\":\"-73.93524169921876\"},{\"lat\":\"40.84459307197389\",\"lng\":\"-73.93661499023439\"},{\"lat\":\"40.839658228207675\",\"lng\":\"-73.94777297973634\"},{\"lat\":\"40.824591695611346\",\"lng\":\"-73.95549774169923\"}]', 0x000000000103000000010000000d000000fbffff4f4b7f52c099490fb353634440eeffffff6c8052c0ed71ffa8d46044400b000060c18052c03b089c52495b4440ffffff0f137f52c09dc10d1f92594440020000e0617e52c0c822896f005d44401b000070ff7d52c092750e232e614440ffffff0ff77c52c099490fb353634440dfffffdfeb7b52c0a603e6959968444012000000db7b52c0758f2b163a6b4440e6ffff7ff17b52c03c4733a01b6c4440e9ffff4fa87c52c03ffcbaeb796b4440f1ffffdf267d52c0e9997e388c694440fbffff4f4b7f52c099490fb353634440, '#C8BCBD', '5000', '2023-02-20 14:23:00', 'Yes', NULL, NULL, 'Yes', 'Yes', 5, '2023-02-24 08:16:00', 'Yes', NULL, NULL, NULL, NULL, 'Yes', 'No', NULL, '{\"latitude\":40.693730,\"longitude\":-73.895510}', '3483', '23.0535', '2965', 'APEA5wcAACoAAAAAAAAADAAAAKgBAAB42mNYwcjAyMrAwMCekVqUapWcKzdTTxrIZagXfRTP8ao80VvU-3PMJyD92OtzDAMWANPowsoE1nj5RZQvQ8qqBO8luX9i2oD0dSCNT2PKjFxJEH9e4KPnDLv_JHobtv2NWQCkeYE0Po0dnVvANs77NdGTSTE_y5tdmCvWG0gLA2l8Gtm68iVAfLXAbS4MDjtSvE3svsaoAWkhIE2sHxFew-YRhPuxuRbmSEaw6Qon_ut-B9LLchgUFVgaWRrmsC4IYDogwcDSOYGbgavJgUGBgUHEAQCndmswkNSMeA:car', 'Yes', '1675238213.2452.png', 1, 0, '2023-02-20 14:22:59', '2023-02-24 08:16:22'),
(13, 'Brooklyn', '5', '2', '[{\"lat\":\"40.89223436192512\",\"lng\":\"-73.90468597412111\"},{\"lat\":\"40.820045086716505\",\"lng\":\"-73.94451141357423\"},{\"lat\":\"40.79379856838544\",\"lng\":\"-73.91395568847658\"},{\"lat\":\"40.803934592883806\",\"lng\":\"-73.90331268310548\"},{\"lat\":\"40.825500979989755\",\"lng\":\"-73.86898040771486\"},{\"lat\":\"40.85926556806055\",\"lng\":\"-73.82881164550783\"},{\"lat\":\"40.87873731327488\",\"lng\":\"-73.8106155395508\"},{\"lat\":\"40.893012953820794\",\"lng\":\"-73.80168914794923\"}]', 0x0000000001030000000100000009000000f9ffff5fe67952c0eb6a4ebc34724440f1ffffdf727c52c0f658c63cf76844401f0000407e7a52c0a06905319b654440dfffffdfcf7952c0a9472854e76644400b0000609d7752c0beef1f04aa6944400d0000400b7552c04fb3046afc6d44400f000020e17352c04125db767a704440f1ffffdf4e7352c064c89b3f4e724440f9ffff5fe67952c0eb6a4ebc34724440, '#8E403F', '8000', '2023-02-20 14:28:00', 'Yes', NULL, NULL, 'Yes', 'Yes', 4, '2023-02-24 08:16:00', 'Yes', NULL, NULL, NULL, NULL, 'Yes', 'No', NULL, NULL, '2959', '18.4964', '2426', 'AMUA5wcAACoAAAAAAAAADAAAAEkBAAB42mPwZGRgZGFgYGDPSC1KtUrOTZ5nLw3kMiROmPiA4_f9Ym_d1UKxX4C0NZBmwAJgGjevSpIE8T_ZnL_MsLQi31v4CEvsXCDNCaTxabyR8EUcxJ_QqqPCsG5VofdiZY7YzUB6DpDGp1Har04fxFd617GbqU-o3vtbi1BsMZD-2EK8UxEuxOYeVGcIBqtrbwTSwPBySgvQUnUSUmQ14ORScmVgcjikwAAA6sJOZW4pS78:car', 'No', NULL, 2, 0, '2023-02-20 14:27:44', '2023-02-24 08:16:40'),
(14, 'Brooklyn', '5', '1', '[{\"lat\":\"40.821072160440096\",\"lng\":\"-73.93053795680527\"},{\"lat\":\"40.70197195918249\",\"lng\":\"-74.05067885217589\"},{\"lat\":\"40.6889568347545\",\"lng\":\"-73.9353435926201\"},{\"lat\":\"40.806001404678966\",\"lng\":\"-73.85570734197445\"}]', 0x0000000001030000000100000005000000810a13ef8d7b52c0795f7ee418694440772c83523e8352c0a8b29737da594440de345fabdc7b52c0e3cfd0bc2f5844406d2ebae8c37652c02dd0d40d2b674440810a13ef8d7b52c0795f7ee418694440, '#CDC932', '450', '2023-02-21 15:46:00', 'Yes', NULL, NULL, 'Yes', 'Yes', 4, '2023-02-21 16:04:00', 'Yes', NULL, NULL, NULL, NULL, 'Yes', 'No', NULL, NULL, '2664', '13.1302', '1837', 'AL8A5wcAACoAAAAAAAAADAAAAEIBAAB42mNwYmRgZGFgYGDPSC1KtUrO3bwqSRLIZfhkc_4yx9KKfG_hIyyxc4E0J5BmwAJgGpXXP5cA8RknPoxj2CCe4_0wniX2IJD-Ho9fo9xMPWkQv170UTzDq_JEb1HvzzGfgPRjr88x-DSydeWDbVQL3ObC4LAjxdvE7muMGpAWAtLEOhXhQmzuQXXGETlBp1ogLcpwIIVBgoOB4QGDIKsPqwAANPNMPLk4JGA:car', 'No', NULL, 1, 0, '2023-02-21 15:47:32', '2023-02-21 16:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `autocreation` enum('On','Off') NOT NULL DEFAULT 'Off',
  `order_types` varchar(255) DEFAULT NULL,
  `optimal_service_time_per_stop` varchar(255) DEFAULT NULL COMMENT '(seconds)',
  `optimal_orders_number_per_route` varchar(255) DEFAULT NULL,
  `driver_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `route_name`, `autocreation`, `order_types`, `optimal_service_time_per_stop`, `optimal_orders_number_per_route`, `driver_id`, `created_at`, `updated_at`) VALUES
(5, 'Brooklyn', 'Off', '1', '360', '60', 3, '2023-02-18 17:42:22', '2023-02-24 18:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `route_autocreate_schedule_days`
--

CREATE TABLE `route_autocreate_schedule_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `days` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `minute` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `data`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'Interprom Logistics LLC', '2022-10-13 05:25:54', '2023-02-07 13:31:57'),
(2, 'company_website', 'quickpharmaceutical.com', '2022-10-13 05:25:54', '2023-02-07 13:31:57'),
(3, 'company_email', 'support@quickpharmaceutical.com', '2022-10-13 05:25:54', '2023-02-07 13:31:57'),
(4, 'company_address', 'test', '2022-10-13 05:25:54', '2023-02-07 13:31:57'),
(5, 'company_tel1', '1234567890', '2022-10-13 05:25:54', '2023-02-07 13:31:57'),
(6, 'company_tel2', '1234567890', '2022-10-13 05:25:54', '2023-02-07 13:31:57'),
(7, 'maintenance_mode', '', '2022-10-13 05:25:54', '2023-02-07 13:31:57'),
(8, 'currency_symbol', '', '2022-10-13 05:25:54', '2023-01-17 00:53:40'),
(9, 'fcm_key', 'AAAAPg3KJhA:APA91bFgBV1AmCYHvoKZkCAsELL1u6QsntyAoQGD8O6RkTp8_FnWD5y4c81244EYbyvftqRTkYsT-0-6GlrpuIHet2EA139ZyJOUeEtemdNNpS6goxiteCLwiVQKp-lJOixcd8W5Vizw', '2022-10-13 05:25:54', '2023-02-07 13:31:57'),
(10, 'privacy_policy', 'Privacy  Policy\r\n\r\nThank you for reviewing our Privacy Policy. This website (the “quickpharmaceutical.com”), is operated from the United States of America on behalf of this pharmacy (“Company,” “we,” “us” and “our”). If you choose to access this Site from locations outside the U.S. you do so at your own risk and subject to the laws of the United States of America, and you are responsible for compliance with any local laws. You may not use or export anything (including information) from the Site in violation of U.S. export laws, regulations or the Terms of Use\r\n\r\nYour privacy is important to us. It is our policy to protect your personal information and to use it only in accordance with this Privacy Policy. This Privacy Policy only governs our use and disclosure of information collected through this Site.\r\n\r\nACCEPTANCE OF PRIVACY POLICY\r\n\r\nPlease read this Privacy Policy carefully. We want you to understand what data we collect from you when you visit our Site; how we use such data; and whether and to whom we share such data with others. Using our Site is voluntary, and by accessing or using the Site, you: (i) acknowledge that you have read and understood this Privacy Policy; (ii) agree that your access and use of the Site are subject to the Privacy Policy and Terms of Use; and (iii) consent to our collection and use of your Non-Personal and Personally Identifiable Information as described in this Privacy Policy, as updated or revised from time to time. At all times, we reserve the right to disclose any information, including personally identifiable information, to comply with any applicable law, regulation, legal process or governmental request; to protect the Company’s rights or property (including without limitation in the event of a transfer of control of the company, or substantially all of its assets), or during emergencies when safety is at risk, or for credit fraud protection and risk reduction purposes.\r\n\r\nINFORMATION WE COLLECT FROM YOU\r\n\r\nWhen you use the Site, several types of data may be collected from you, including:\r\nNon-Personal Information; and\r\nPersonally Identifiable Information. Certain types of data are specifically NOT collected, including personal information from children.\r\n\r\n2.1 Non-Personal Information. We automatically collect certain anonymous data regarding usage of the Site. The anonymous data we collect may include information such as:\r\nThe name of the Internet domain you used to access the Internet;\r\nYour IP address and if applicable, the IP address of the web site from which you linked to our Site;\r\nThe date and time you accessed our Site;\r\nThe type of web browser you are using; and\r\nThe pages you visited\r\nThis information (&ldquo;Non-Personal Information&rdquo;) does not personally identify users, by itself or in combination with other information. We use this Non-Personal Information to monitor the effectiveness of the Site and to consider potential changes to improve the user experience. Non-Personal Information may be collected through cookies. For more detailed information on cookies, please refer to the &ldquo;Use of Cookies&rdquo; section below.\r\n\r\n2.2 Personally Identifiable Information Generally\r\nIf you would like to order products and prescription or nonprescription drugs using our Site to the extent they are available, our registration process asks you to provide us with a limited amount of personal, health-related and/or transactional information. This information is necessary to process your order and enable you to use our Site to access such functions, or to otherwise receive individualized or personalized customer service that we would not be able to offer to anonymous users. Categories of personally identifiable information include: name, address, email address, phone number, date of birth, where appropriate, Protected Health Information such as, prescription number, and if applicable, Transaction Information as described in Section 2.2 (b) (collectively, &ldquo;PII&rdquo;). By providing such information, you consent to our collection and use of it, as described in this Privacy Policy.\r\n\r\nProtected Health Information\r\nCertain PII collected, such as your prescription number, may also be considered Protected Health Information (&ldquo;PHI&rdquo;). PHI is information that may identify you and that relates to your past, present or future physical or mental health or condition and related health care services. Additional information regarding PHI, including our use and disclosure of your PHI, and your health information rights, is provided in our Notice of Privacy Practices.\r\n\r\nFinancial and Other Transactional Information.\r\nIn conjunction with our online prescription ordering service, we may collect certain  categories of PII necessary to complete and process your requests for service or products, to process your selected method for payment and if applicable, to arrange for delivery of your prescription(s) to your door] (&ldquo;Transactional Information& rdquo;). This information is limited to your name, billing address, shipping address, email address, phone number, and if you choose to pay by credit  card, credit card information, such as type of credit card, name on card, card number, validation  number, and expiration date, as well as any relevant insurance information, if you would like us to submit your claim for payment to your insurance payor. We may retain Transactional Information as long as is necessary to fulfill the purposes specified in this Privacy Policy and for recordkeeping, subject to statutory or regulatory retention requirements and legitimate business needs, such as for order tracking and status retrieval purposes.\r\n\r\n2.3 No Personal Information from Children\r\nThe services hosted on the Site, including online prescription ordering, are not offered to children. Children are not permitted to use the Site, and we request that children under the age of 13 not submit any personal information to the website. We do not knowingly collect personal information from children under the age of 13. Since information regarding children under the age of 13 should not be collected, the Company does not knowingly distribute personal information regarding children under the age of 13. If your child has submitted personal information, please contact us to request that such information be removed. Once we are aware of information entered by a child, we will exercise commercially reasonable efforts to remove such information from our databases and storage areas; however, we are not liable for any consequences relating to such information.\r\n\r\n2.4 Other Information NOT Collected.\r\nOur services and your use of the Site do not require you to disclose, nor require us to request or collect, any information not described above. We do not request, solicit or intend to collect any such information and you should not disclose any such information on the Site. If we discover that such information was disclosed by you, we will exercise commercially reasonable efforts to delete such information; however, we are not liable for any consequences relating to such disclosures of information.\r\n\r\nUSE AND DISCLOSURE OF INFORMATION COLLECTED\r\n Our use and disclosure of certain information varies with respect to the type of information collected, including:\r\nNon-Personal Information\r\nPersonally Identifiable Information; and\r\nTransactional Information.\r\n\r\n3.1 Non-Personal Information\r\nWe use the Non-Personal Information collected through the Site for statistical purposes and for improving the functionality of the Site. In general, this information is used internally but we may, from time to time, engage a third party&rsquo;s software or services to assist us with these analyses. In those limited cases, disclosure of this information to a third-party is necessary; however, the data remains anonymous at all times. \r\n\r\n3.2 Personally Identifiable Information.\r\nWe use PII collected through the Site in conjunction with our online prescription ordering function to respond to your requests for service. We may also use PII to communicate with you regarding refill reminders and other information relevant to your health.\r\n\r\nAdditionally, we may use your email address or other contact information to send you transactional messages, newsletters, special promotional offers, consumer surveys and other commercial messages. If you no longer wish to receive such commercial messages, simply click the &lsquo; unsubscribe & rsquo; link that we include at the bottom of every email that we send you.\r\n\r\nWe may use third party service providers and suppliers to facilitate our operation of the Site and/or to do mailings on our behalf, and they may have access to PII. Additionally, we may provide PII to third parties for marketing purposes or to third parties that we believe have products or services of interest to you.\r\n\r\n3.3 Transactional Information\r\nWe use Transactional Information collected through the Site for the purpose of processing commercial activities that you have initiated. This may include contacting third-party payors such as your insurance carrier, processing your request to pay by credit card or for delivery purposes, where applicable. Additionally, Transactional Information may be used for recordkeeping purposes, as appropriate.\r\n\r\nThough we make every effort to preserve your privacy, disclosure of PII to third parties for non-marketing purposes may occur in certain situations such as: (i) responding to a subpoena, court order or other such request; (ii) responding to a law enforcement agency&rsquo;s request or as otherwise required by law; and (iii) providing PII and/or Transactional Information to a third party if we file for bankruptcy, or there is a transfer of the assets or ownership in connection with proposed or consummated corporate reorganizations, such as mergers, acquisitions, or sales of business units. In all such instances, we will take the utmost care to disclose only that information which is necessary and appropriate under the circumstances.\r\n\r\nUSE OF COOKIES\r\n\r\nCookies are small bits of data cached or stored on your computer based on Internet activity. We use cookies to monitor individual activity in aggregate to improve the Site and provide features that are tailored to your needs. The information we gather may include IP address, user language, the operating system, browser type, the presence/absence of &ldquo;flash&rdquo; plug-ins, screen resolution, connection type, and information that identifies the cookie. However, no other user information is generally collected. We do not use cookies to obtain any personally identifiable information. Most web browsers automatically accept cookies, but you can usually change your browser settings to prevent this. If you disable cookies, your ability to use some features of the Site may be limited.\r\n\r\nLINKED SITES\r\n\r\nWe may provide links on the Site to other sites of interest; however, we do not review or endorse the content of these sites, and are not responsible for that content or the privacy policies of websites to which the Site links. If you provide any information to such third parties, different rules regarding the collection and use of your personal information may apply. We strongly suggest you review such third party&rsquo;s privacy policies and terms of use before providing any data to them. You should contact these entities directly if you have any questions about their use of the information that they collect.\r\n\r\nSECURITY\r\nWe strive to maintain the security of your information by using appropriate measures designed to protect our systems. However, we cannot guarantee the security of any information that is disclosed online. Consequently, we do not insure or warrant the security of any information you transmit, and you do so at your own risk.\r\n\r\nMODIFICATIONS TO THIS PRIVACY POLICY\r\nIt may be necessary for us to modify this Privacy Policy. We will notify all users by posting an amendment to the Privacy Policy on the Site. Such modifications will become effective on the day they are posted. We encourage you to frequently review the Privacy Policy for any modifications.\r\n\r\nQUESTIONS\r\nIf you have any questions or concerns about this policy or the use of your information, or to modify or update any information we have received, please contact us through our website, in person or by mail.', '2022-10-15 05:22:05', '2023-02-27 09:37:34'),
(11, 'type', 'terms_conditions', '2023-01-19 06:03:09', '2023-02-07 13:31:57'),
(12, 'maintenance_message', 'app in Maintenance', '2023-01-19 06:07:33', '2023-02-07 13:31:57'),
(13, 'terms_conditions', 'The standard Lorem Ipsum passage, used since the 1500s\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute  irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\r\n\r\n1914 translation by H. Rackham\r\n\r\nBut I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I  will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\r\n\r\n1914 translation by H. Rackham\r\n\r\nOn the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', '2023-01-31 10:56:37', '2023-02-27 08:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext DEFAULT NULL,
  `priority` enum('Moderate','Low','Normal','High','Emergency') NOT NULL DEFAULT 'Moderate',
  `status` enum('Open','Assigned','In Progress','Ready to Resolve','Resolved','On Hold','Rejected') NOT NULL DEFAULT 'Open',
  `type` varchar(255) DEFAULT NULL,
  `assign_to` varchar(255) DEFAULT NULL,
  `managed_by` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `last_status_update` datetime NOT NULL,
  `last_updated_by` varchar(255) DEFAULT NULL,
  `close` varchar(255) DEFAULT NULL,
  `close_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-Super-Admin, 1- Pharmacy, 2-User, 3-Dispatcher',
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `doing_business_as` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `apt` varchar(255) DEFAULT NULL COMMENT 'Apt/Suite/Floor',
  `address` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:Inactive 1:Active',
  `permissions` text DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `facility` varchar(255) DEFAULT 'New York',
  `current_status` enum('Open','Close') NOT NULL DEFAULT 'Open',
  `copay_limit` bigint(20) DEFAULT 0,
  `attempts_limit` bigint(20) DEFAULT 0,
  `order_rate` bigint(20) DEFAULT 0,
  `special_instructions` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userType`, `name`, `username`, `business_name`, `doing_business_as`, `email`, `phone`, `city`, `state`, `zip`, `apt`, `address`, `avatar`, `email_verified_at`, `password`, `status`, `permissions`, `last_login_at`, `remember_token`, `latitude`, `longitude`, `facility`, `current_status`, `copay_limit`, `attempts_limit`, `order_rate`, `special_instructions`, `created_at`, `updated_at`) VALUES
(1000, 0, 'Super Admin', 'admin', NULL, NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$WPpLMvj/X3cXBpaMiCwXgemKElCnWLz4J9pxB1Y.okUJH.nz3GVZq', 1, NULL, '2023-03-09 05:17:52', 'mCRD9q5kqjdwrPL5qSt4BdChxcDUpiK3DjBmfkAkPA0pAPFN9JgqZdW5mmYc', NULL, NULL, 'New York', 'Open', 0, 0, 0, NULL, NULL, '2023-03-09 05:17:52'),
(1003, 2, 'Destiny Juarez', NULL, NULL, NULL, 'qywywu@mailinator.com', NULL, NULL, NULL, NULL, NULL, 'Labore exercitatione', NULL, NULL, '$2y$10$zRn5BQq56GCCyqMPi/pFrO/WrOC5QsXAXYSkpxrBtIWf8vrVaqdyW', 1, '{\"orders\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"users\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"clients\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"drivers\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"order_type\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"route_name\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"map\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"}}', NULL, NULL, NULL, NULL, 'New York', 'Open', 0, 0, 0, NULL, '2023-01-25 11:23:38', '2023-01-25 11:23:38'),
(1004, 2, 'Delilah Ball', NULL, NULL, NULL, 'dury@mailinator.com', NULL, NULL, NULL, NULL, NULL, 'Quo perspiciatis cu', NULL, NULL, '$2y$10$QiIajceLSvqTz78wFwV4Ju7/VuUq3FlU07tGag8Kx7HSAvDT7oH1G', 1, '{\"orders\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"users\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"clients\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"drivers\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"order_type\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"route_name\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"map\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"}}', NULL, NULL, NULL, NULL, 'New York', 'Open', 0, 0, 0, NULL, '2023-01-25 11:23:44', '2023-01-25 11:23:44'),
(1005, 2, 'Hayfa Rowe', NULL, NULL, NULL, 'kunyrywyn@mailinator.com', NULL, NULL, NULL, NULL, NULL, 'Quos a eius repudian', NULL, NULL, '$2y$10$asU2KlRNkXmRkzBAxXLDSOITv4/.Gvl9YFm9XTsfL9u43Hr1DpuBO', 1, '{\"orders\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"users\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"clients\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"drivers\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"order_type\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"route_name\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"map\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"}}', NULL, NULL, NULL, NULL, 'New York', 'Open', 0, 0, 0, NULL, '2023-01-25 11:23:50', '2023-01-25 11:23:50'),
(1006, 2, 'Brady Sharpe', NULL, NULL, NULL, 'vupa@mailinator.com', NULL, NULL, NULL, NULL, NULL, 'Perspiciatis cupidi', NULL, NULL, '$2y$10$EY2ONK18zaNNB61w6xskeuA5JdUaESfuA75WZ3NrA5zDY3VXhbWpm', 1, '{\"orders\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"users\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"clients\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"drivers\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"order_type\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"route_name\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"map\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"}}', NULL, NULL, NULL, NULL, 'New York', 'Open', 0, 0, 0, NULL, '2023-01-25 11:23:57', '2023-01-25 11:23:57'),
(1010, 2, 'Sean RX', NULL, NULL, NULL, 'azera0309@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$RvGOckCxnHHNREFzX8IfhuSA0OIUZH7WiWwKeiFMeWdq9BX6moY0u', 1, '{\"orders\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"users\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"clients\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"drivers\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\",\"read\":\"on\"},\"order_type\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"route_name\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"map\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', '2023-02-27 12:52:20', NULL, NULL, NULL, 'New York', 'Open', 0, 0, 0, NULL, '2023-02-04 18:43:01', '2023-02-27 12:52:20'),
(1022, 1, 'Jayesh Pharmacy Rx', NULL, NULL, NULL, 'shoxruxabdullayev662@gmail.com', '+16467391873', NULL, NULL, NULL, NULL, '138 West Broadway, Нью-Йорк, США', NULL, NULL, '$2y$10$WPpLMvj/X3cXBpaMiCwXgemKElCnWLz4J9pxB1Y.okUJH.nz3GVZq', 1, '{\"orders\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', '2023-03-06 14:21:43', 'GbKfTQ1huBPmRaVOV31w1ieM17Uz4FUrOSEFYpKncUcXxMIqH7fZabPx1TcD', '40.7170111', '-74.0082834', 'New York', 'Open', 0, 0, 0, NULL, '2023-02-18 15:22:30', '2023-03-06 14:21:43'),
(1023, 1, 'Solidity Rx', NULL, NULL, NULL, 'laylotemurova@gmail.com', '+19293107070', NULL, NULL, NULL, NULL, '779 Broadway, New York, NY, USA', NULL, NULL, '$2y$10$FqrdIHhBD5d0VlFCOLTl1e0m5wPg9cLoCgW8SdYKwf4drUe3mUMJ6', 1, '{\"orders\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', '2023-02-27 12:03:14', NULL, '40.7315386', '-73.9919311', 'New York', 'Open', 0, 0, 0, NULL, '2023-02-27 12:02:21', '2023-02-27 12:03:14'),
(1024, 3, 'Lorem dispatcher', NULL, NULL, NULL, 'dispatcher@gmail.com', '2312131551315', NULL, NULL, NULL, NULL, 'Loreto, BCS, Mexico', NULL, NULL, '$2y$10$GJ2NiiVUYrTJeyk564QXKur2S.BNxib5sKx6kYvVE3ZfrSTQW2nui', 0, '{\"orders\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', NULL, NULL, '26.0117564', '-111.3477531', 'New York', 'Open', 0, 0, 0, NULL, '2023-02-27 13:51:40', '2023-02-27 13:53:53'),
(1025, 3, 'Ipsum Dispatcher', NULL, NULL, NULL, 'dispatcher2@gmail.com', '3211515151', NULL, NULL, NULL, NULL, 'Loeches, Spain', NULL, NULL, '$2y$10$3fsbb1W4uV2xYxMuHOFgSewK0r0DifmFQYmI8NeBTi1NHcq/D7xbq', 0, '{\"orders\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', NULL, NULL, '40.38348209999999', '-3.4170301', 'New York', 'Open', 0, 0, 0, NULL, '2023-02-27 13:52:25', '2023-02-27 13:54:02'),
(1031, 1, 'Joseph Pharmacy', NULL, 'Joseph pharmacy', NULL, 'bet1995@mail.ru', '3478195767', 'New York', 'NY', '10023', 'Floor', '216 West 72nd Street, New York, NY, USA', NULL, NULL, '$2y$10$xybUlj/3vm0hsHebY7HSU.BY2nUhQ4BhCwW7y37JO0bANOAROWt0i', 1, '{\"orders\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', '2023-02-28 18:45:40', NULL, '40.7787871', '-73.98278479999999', 'New York', 'Open', 0, 0, 0, NULL, '2023-02-28 18:34:40', '2023-02-28 18:45:40'),
(1032, 1, 'Essam', NULL, 'Joseph Pharmacy', 'Joseph Pharmacy', 'josephspharmacy@gmail.com', '2128751718', 'New York', 'NY', '10466', '1st floor', '216 West 72nd Street, Нью-Йорк, США', NULL, NULL, '$2y$10$pvIMwEbEDx8lh/f/Bav3AOcXHBfXT5n22YxPyzZOEUJ3886LUmfNi', 1, '{\"orders\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', '2023-03-06 16:26:27', NULL, '40.7787871', '-73.98278479999999', 'New York', 'Open', 0, 0, 0, NULL, '2023-03-01 18:55:12', '2023-03-06 16:26:27'),
(1033, 1, 'Mefijwdihwdjwsjdhwjqsqodkwfk fjebfhjhdjwshfewifejqwwqfewjfewhgewu kfwejfwefhewgeuwh:jfefehfejfjehfie//NJjdshdjwfhwu оаипруафравгпшцурафцоварквшпругвыовапцушгысвыарршрпшц jcsafsafhawfjewoifhe ufhdfwjdhewifgewiufhjadwfewi quickpharmaceutical.com', NULL, 'Mefijwdihwdjwsjdhwjqsqodkwfk fjebfhjhdjwshfewifejqwwqfewjfewhgewu kfwejfwefhewgeuwh:jfefehfejfjehfie//NJjdshdjwfhwu оаипруафравгпшцурафцоварквшпругвыовапцушгысвыарршрпшц jcsafsafhawfjewoifhe ufhdfwjdhewifgewiufhjadwfewi quickpharmaceutical.com', 'Graphiker', 'a.l.b.e.rt.h.ansh.in.4.9@gmail.com', '89829974844', 'Mefijwdihwdjwsjdhwjqsqodkwfk fjebfhjhdjwshfewifejqwwqfewjfewhgewu kfwejfwefhewgeuwh:jfefehfejfjehfie//NJjdshdjwfhwu оаипруафравгпшцурафцоварквшпругвыовапцушгысвыарршрпшц jcsafsafhawfjewoifhe ufhdfwjdhewifgewiufhjadwfewi quickpharmaceutical.com', 'Mefijwdihwdjwsjdhwjqsqodkwfk fjebfhjhdjwshfewifejqwwqfewjfewhgewu kfwejfwefhewgeuwh:jfefehfejfjehfie//NJjdshdjwfhwu оаипруафравгпшцурафцоварквшпругвыовапцушгысвыарршрпшц jcsafsafhawfjewoifhe ufhdfwjdhewifgewiufhjadwfewi quickpharmaceutical.com', '155322', 'Greece', 'a.l.b.e.rt.h.ansh.in.4.9@gmail.com', NULL, NULL, '$2y$10$dHU9FNobT4RbHK2a.W7HAueY0265mhq3DkSvuPRx6/.1.5iHWmGre', 1, '{\"orders\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', NULL, NULL, NULL, NULL, 'New York', 'Open', 0, 0, 0, NULL, '2023-03-02 06:54:36', '2023-03-02 06:54:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hubs`
--
ALTER TABLE `hubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masked_photos`
--
ALTER TABLE `masked_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masked_photos_region_id_foreign` (`regions_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_recipient_id_foreign` (`recipient_id`);

--
-- Indexes for table `orders_activity`
--
ALTER TABLE `orders_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_activity_order_id_foreign` (`order_id`),
  ADD KEY `orders_activity_added_by_foreign` (`added_by`);

--
-- Indexes for table `orders_document`
--
ALTER TABLE `orders_document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_document_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders_status_activity`
--
ALTER TABLE `orders_status_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_status_activity_order_id_foreign` (`order_id`),
  ADD KEY `orders_status_activity_added_by_foreign` (`added_by`);

--
-- Indexes for table `orders_types`
--
ALTER TABLE `orders_types`
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
-- Indexes for table `prescriptions_no`
--
ALTER TABLE `prescriptions_no`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_no_order_id_foreign` (`order_id`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route_autocreate_schedule_days`
--
ALTER TABLE `route_autocreate_schedule_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_autocreate_schedule_days_route_id_foreign` (`route_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_added_by_foreign` (`added_by`);

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
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hubs`
--
ALTER TABLE `hubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `masked_photos`
--
ALTER TABLE `masked_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1059;

--
-- AUTO_INCREMENT for table `orders_activity`
--
ALTER TABLE `orders_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT for table `orders_document`
--
ALTER TABLE `orders_document`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `orders_status_activity`
--
ALTER TABLE `orders_status_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `orders_types`
--
ALTER TABLE `orders_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions_no`
--
ALTER TABLE `prescriptions_no`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1073;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `route_autocreate_schedule_days`
--
ALTER TABLE `route_autocreate_schedule_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `masked_photos`
--
ALTER TABLE `masked_photos`
  ADD CONSTRAINT `masked_photos_region_id_foreign` FOREIGN KEY (`regions_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_recipient_id_foreign` FOREIGN KEY (`recipient_id`) REFERENCES `recipients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders_activity`
--
ALTER TABLE `orders_activity`
  ADD CONSTRAINT `orders_activity_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders_document`
--
ALTER TABLE `orders_document`
  ADD CONSTRAINT `orders_document_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders_status_activity`
--
ALTER TABLE `orders_status_activity`
  ADD CONSTRAINT `orders_status_activity_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescriptions_no`
--
ALTER TABLE `prescriptions_no`
  ADD CONSTRAINT `prescriptions_no_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `route_autocreate_schedule_days`
--
ALTER TABLE `route_autocreate_schedule_days`
  ADD CONSTRAINT `route_autocreate_schedule_days_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
