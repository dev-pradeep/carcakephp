-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2018 at 04:59 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turoscrape`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `profile_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `works` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `lives` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `school` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `joined` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `num_of_trips` int(10) DEFAULT NULL,
  `num_of_reviews` int(10) DEFAULT NULL,
  `overall_rating` decimal(2,1) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `created`, `modified`, `profile_name`, `full_name`, `works`, `lives`, `school`, `joined`, `num_of_trips`, `num_of_reviews`, `overall_rating`, `photo`) VALUES
(1, '2018-03-05 11:00:08', '2018-03-14 11:21:45', 'AWD', 'as', 'asd', 'asdasd', 'asd', 'asdas', 13, 123123, '9.9', '123');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_paln_id` int(11) NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `payment_date` timestamp NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `isDeleted` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `user_paln_id` (`user_paln_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_stripe_id` varchar(255) DEFAULT NULL,
  `plan_name` varchar(100) NOT NULL,
  `paln_day` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `amount` float(10,2) NOT NULL,
  PRIMARY KEY (`plan_id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `plan_stripe_id`, `plan_name`, `paln_day`, `created_at`, `updated_at`, `isDeleted`, `amount`) VALUES
(1, 'premium', 'Premium', '30', '2018-03-19 09:17:13', '2018-03-19 09:17:13', 0, 10.00),
(2, 'standard', 'Standard', '30', '2018-03-19 09:17:13', '2018-03-19 09:17:13', 0, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `refund_payment`
--

DROP TABLE IF EXISTS `refund_payment`;
CREATE TABLE IF NOT EXISTS `refund_payment` (
  `refund_id` int(11) NOT NULL AUTO_INCREMENT,
  `refund_pay_id` varchar(255) DEFAULT NULL,
  `refund_object` varchar(255) DEFAULT NULL,
  `refund_amount` varchar(255) DEFAULT NULL,
  `refund_balance_transaction` varchar(255) DEFAULT NULL,
  `refund_charge` varchar(255) DEFAULT NULL,
  `refund_currency` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `receipt_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`refund_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `vehicle_id` int(10) DEFAULT NULL,
  `driver_id` int(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `daily_rate` decimal(10,2) DEFAULT NULL,
  `rental_length` int(10) DEFAULT NULL,
  `trip_price` decimal(10,2) DEFAULT NULL,
  `delivery_fee` decimal(10,2) DEFAULT NULL,
  `extension_fee` decimal(10,2) DEFAULT NULL,
  `distance_reimbursement` decimal(10,2) DEFAULT NULL,
  `gas_reimbursement` decimal(10,2) DEFAULT NULL,
  `tickets_tolls` decimal(10,2) DEFAULT NULL,
  `fines` decimal(10,2) DEFAULT NULL,
  `additional_charges` decimal(10,2) DEFAULT NULL,
  `reimbursement_total` decimal(10,2) DEFAULT NULL,
  `trip_total` decimal(10,2) DEFAULT NULL,
  `turo_fees` decimal(10,2) DEFAULT NULL,
  `earnings` decimal(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_key` (`user_id`),
  KEY `driver_key` (`driver_id`),
  KEY `vehicle_key` (`vehicle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2732396 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `vehicle_id`, `driver_id`, `start_date`, `end_date`, `start_time`, `end_time`, `daily_rate`, `rental_length`, `trip_price`, `delivery_fee`, `extension_fee`, `distance_reimbursement`, `gas_reimbursement`, `tickets_tolls`, `fines`, `additional_charges`, `reimbursement_total`, `trip_total`, `turo_fees`, `earnings`, `created`, `modified`) VALUES
(2622508, 4047480, 361303, NULL, NULL, '2018-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12.00', '159.25', '2018-02-28 22:40:40', '2018-03-05 10:53:18'),
(2688121, 4047480, 367045, NULL, NULL, '2018-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '315.75', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2722033, 4047480, 361303, NULL, NULL, '2018-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '79.95', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2716231, 4047480, 367045, NULL, NULL, '2018-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '152.25', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2590161, 4047480, 343181, NULL, NULL, '2018-02-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.40', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2594056, 4047480, 361303, NULL, NULL, '2018-02-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '159.25', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2552634, 4047480, 324892, NULL, NULL, '2018-02-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '114.40', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2699832, 4047480, 367045, NULL, NULL, '2018-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '148.50', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2685731, 4047480, 343181, NULL, NULL, '2018-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50.70', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2555184, 4047480, 324892, NULL, NULL, '2018-02-13', NULL, NULL, '38.68', 6, '232.05', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '232.05', '-81.22', '150.83', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2684171, 4047480, 343181, NULL, NULL, '2018-02-12', NULL, NULL, '39.00', 1, '39.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '39.00', '-13.65', '25.35', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2676917, 4047480, 343181, NULL, NULL, '2018-02-11', NULL, NULL, '39.00', 2, '78.00', '0.00', '0.00', '32.18', '0.00', '0.00', '0.00', '32.18', '32.18', '110.18', '-27.30', '82.88', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2664657, 4047480, 361303, NULL, NULL, '2018-02-11', NULL, NULL, '79.00', 1, '79.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '79.00', '-27.65', '51.35', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2629161, 4047480, 324892, NULL, NULL, '2018-02-05', NULL, NULL, '69.00', 3, '207.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '207.00', '-72.45', '134.55', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2606510, 4047480, 361303, NULL, NULL, '2018-02-02', NULL, NULL, '49.00', 5, '245.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '245.00', '-85.75', '159.25', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2644897, 4047480, 324892, NULL, NULL, '2018-01-31', NULL, NULL, '69.00', 2, '138.00', '0.00', '25.00', '0.00', '0.00', '0.00', '50.00', '50.00', '0.00', '213.00', '-57.05', '155.95', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2593358, 4047480, 343181, NULL, NULL, '2018-01-30', NULL, NULL, '49.00', 3, '147.00', '20.00', '0.00', '0.00', '21.06', '0.00', '0.00', '21.06', '21.06', '188.06', '-58.45', '129.61', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2621633, 4047480, 324892, NULL, NULL, '2018-01-24', NULL, NULL, '49.00', 1, '49.00', '20.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '69.00', '-24.15', '44.85', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2582971, 4047480, 343181, NULL, NULL, '2018-01-23', NULL, NULL, '41.65', 7, '291.55', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '291.55', '-102.04', '189.51', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2577420, 4047480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2555596, 4047480, 324892, NULL, NULL, '2018-01-21', NULL, NULL, '39.00', 4, '156.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '156.00', '-54.60', '101.40', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2592272, 4047480, 361303, NULL, NULL, '2018-01-20', NULL, NULL, '29.00', 3, '87.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '87.00', '-30.45', '56.55', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2341569, 4047480, 324892, NULL, NULL, '2018-01-16', NULL, NULL, '62.80', 5, '314.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '314.00', '-109.90', '204.10', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2575998, 4047480, 343181, NULL, NULL, '2018-01-14', NULL, NULL, '49.00', 4, '196.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '196.00', '-68.60', '127.40', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2575768, 4047480, 343181, NULL, NULL, '2018-01-07', NULL, NULL, '49.00', 3, '147.00', '0.00', '0.00', '0.00', '11.02', '0.00', '0.00', '11.02', '11.02', '158.02', '-51.45', '106.57', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2538222, 4047480, 343181, NULL, NULL, '2018-01-04', NULL, NULL, '69.00', 4, '276.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '276.00', '-96.60', '179.40', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2385183, 4047480, 324892, NULL, NULL, '2018-01-04', NULL, NULL, '49.00', 1, '49.00', '20.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '69.00', '-24.15', '44.85', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2336519, 4047480, 324892, NULL, NULL, '2018-01-01', NULL, NULL, '64.33', 6, '386.00', '0.00', '0.00', '0.00', '16.61', '0.00', '0.00', '16.61', '16.61', '402.61', '-135.10', '267.51', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2445860, 4047480, 343181, NULL, NULL, '2017-12-31', NULL, NULL, '76.86', 7, '538.05', '0.00', '0.00', '0.00', '22.30', '9.15', '0.00', '31.45', '22.30', '569.50', '-188.32', '381.18', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2532576, 4047480, 324892, NULL, NULL, '2017-12-24', NULL, NULL, '65.67', 3, '197.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '197.00', '-68.95', '128.05', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2423602, 4047480, 343181, NULL, NULL, '2017-12-22', NULL, NULL, '75.46', 9, '679.15', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '679.15', '-237.70', '441.45', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2436754, 4047480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2440531, 4047480, 324892, NULL, NULL, '2017-12-16', NULL, NULL, '45.17', 7, '316.20', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '316.20', '-110.67', '205.53', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2465240, 4047480, 324892, NULL, NULL, '2017-12-06', NULL, NULL, '44.00', 4, '176.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '176.00', '-61.60', '114.40', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2464513, 4047480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2443939, 4047480, 324892, NULL, NULL, '2017-11-22', NULL, NULL, '49.00', 2, '98.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '98.00', '-34.30', '63.70', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2732394, 4047489, 324892, 1, '2021-03-02', '2023-03-02', '02:03:00', '01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-09 07:56:12', '2018-03-24 07:21:40'),
(2425581, 4047480, 324892, NULL, NULL, '2017-11-17', NULL, NULL, '19.00', 1, '19.00', '20.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '39.00', '-13.65', '25.35', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2392845, 4047480, 324892, NULL, NULL, '2017-11-13', NULL, NULL, '39.00', 4, '156.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '156.00', '-54.60', '101.40', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2378791, 4047480, 324892, NULL, '2023-03-02', '2017-11-06', '02:03:00', '02:04:00', '39.00', 3, '117.00', '100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '217.00', '-75.95', '141.05', '2018-02-28 22:40:40', '2018-03-09 10:10:14'),
(2378698, 4047480, 324892, NULL, NULL, '2017-11-02', NULL, NULL, '39.00', 2, '78.00', '20.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '98.00', '-34.30', '63.70', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2372749, 4047480, 324892, NULL, NULL, '2017-10-30', NULL, NULL, '47.25', 4, '189.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '189.00', '-66.15', '122.85', '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2333131, 4047480, 324892, 1, NULL, '2017-10-15', NULL, NULL, '66.00', 3, '198.00', '20.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '218.00', '-76.30', '141.70', '2018-02-28 22:40:40', '2018-03-13 10:45:35'),
(2337799, 4047480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-28 22:40:40', '2018-02-28 23:03:36'),
(2732390, 4047480, 343181, NULL, '2020-01-03', '2022-04-03', '01:03:00', '14:12:00', '23.00', 23, '23.00', '23.00', '23.00', '323.00', '23.00', '232.00', '323.00', '23.00', '23.00', '23.00', '23.00', '23.00', '2018-03-05 09:16:33', '2018-03-05 09:17:58'),
(2732392, 4047480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-05 10:46:32', '2018-03-05 10:46:32'),
(2732395, 4047490, 324892, 1, '2023-02-02', '2023-03-02', '01:02:00', '04:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-03 11:01:11', '2018-04-03 11:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 4047490, 'Standard', 'sub_CXQbAD8HcevrZj', 'Standard', 1, NULL, NULL, '2018-03-22 05:13:58', '2018-03-22 05:13:58'),
(2, 4047491, 'Premium', 'sub_CXQdAG63oU7Gud', 'Premium', 1, NULL, NULL, '2018-03-22 05:16:13', '2018-03-22 05:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `reservation_id` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_key` (`user_id`),
  KEY `reservation_key` (`reservation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `created`, `modified`, `user_id`, `reservation_id`, `amount`, `date`) VALUES
(1, '2018-03-05 11:02:15', '2018-03-05 11:02:15', 4047480, 2333131, '1250.00', '2018-03-05'),
(2, '2018-03-05 11:02:49', '2018-03-14 11:30:29', 4047480, 2336519, '100.00', '2018-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_key` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `up_down_plan`
--

DROP TABLE IF EXISTS `up_down_plan`;
CREATE TABLE IF NOT EXISTS `up_down_plan` (
  `up_down_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `up_down_plan_name` varchar(20) DEFAULT NULL,
  `old_paln` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) DEFAULT NULL,
  `plan_status` varchar(32) DEFAULT NULL,
  `refund_id` int(11) NOT NULL,
  PRIMARY KEY (`up_down_plan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '2' COMMENT 'admin-1,users-2',
  `stripe_id` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `stripe_plan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4047492 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `stripe_id`, `created`, `modified`, `stripe_plan`) VALUES
(4047489, 'Super Admin', 'admin@admin.com', '$2y$10$a0uNyPgmiRAi1B67tFs40.mPHJOa4z.vtUMohg/0iULF2PmcUYvve', 1, NULL, '2018-03-08 13:34:24', '2018-03-21 05:20:08', 0),
(4047490, 'dev users', 'user@gmail.com', '$2y$10$aQaww2PvQCNgs0qv6zlkpuXvC8PiA3aa32j31YW0cPVkeIJTa5BRS', 2, 'cus_CXQb9Ql1O87GVn', '2018-03-22 05:13:57', '2018-03-22 05:13:57', 0),
(4047491, 'dev user1', 'user1@gmail.com', '$2y$10$Wa/85/h1FYgzHu.mkNe2HONIsDbOuGFrKnf/HzVagrn2j0VxMUV9u', 2, 'cus_CXQdVbztlgkjGN', '2018-03-22 05:16:12', '2018-03-22 05:16:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_paln`
--

DROP TABLE IF EXISTS `users_paln`;
CREATE TABLE IF NOT EXISTS `users_paln` (
  `user_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `up_name` varchar(100) NOT NULL,
  `up_start_date` date NOT NULL,
  `up_end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `active_plan` tinyint(4) NOT NULL,
  `up_pay` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_plan_id`),
  KEY `user_plan_id` (`user_plan_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_paln`
--

INSERT INTO `users_paln` (`user_plan_id`, `up_name`, `up_start_date`, `up_end_date`, `user_id`, `active_plan`, `up_pay`, `created_at`, `updated_at`, `isDeleted`, `status`) VALUES
(1, 'Standard', '2018-03-22', '2018-04-21', 4047490, 2, 0, '2018-03-22 05:13:58', '2018-03-22 05:13:58', 0, 1),
(2, 'Premium', '2018-03-22', '2018-04-21', 4047491, 1, 0, '2018-03-22 05:16:13', '2018-03-22 05:16:13', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `year` int(4) DEFAULT NULL,
  `make` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_key` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=367048 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `created`, `modified`, `user_id`, `year`, `make`, `model`, `photo`) VALUES
(324892, '2018-02-28 22:44:45', '2018-03-14 11:03:14', 4047480, 2017, 'Jeep', 'Renegade', ''),
(367045, '2018-02-28 22:44:45', '2018-02-28 22:44:45', 4047480, 2018, 'Jeep', 'Wrangler', NULL),
(361303, '2018-02-28 22:44:45', '2018-02-28 22:44:45', 4047480, 2017, 'Jeep', 'Renegade', NULL),
(343181, '2018-02-28 22:44:45', '2018-02-28 22:44:45', 4047480, 2018, 'Subaru', 'Outback', NULL),
(367046, '2018-03-05 10:56:05', '2018-03-05 10:56:05', 4047480, 1, 'a', 'apache', 'aa'),
(367047, '2018-03-14 11:05:09', '2018-03-14 11:05:09', 4047480, 2015, '11', '111', '111');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
