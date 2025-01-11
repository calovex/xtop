-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2025 at 08:56 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employment_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'admin', 'password_hash_here', 'admin@agency.com', 'admin', '2025-01-02 14:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `background_information`
--

DROP TABLE IF EXISTS `background_information`;
CREATE TABLE IF NOT EXISTS `background_information` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `section` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `background_information`
--

INSERT INTO `background_information` (`id`, `user_id`, `section`, `data`, `created_at`) VALUES
(1, 1, 'Next of Kin', 'ddasdasasdasd', '2025-01-06 07:26:00'),
(2, 1, 'Personal Information', 'asdasdasd', '2025-01-06 07:26:28'),
(3, 1, 'Dependents', 'asdasdasdasd', '2025-01-06 07:26:38'),
(4, 1, 'Friends', 'asdasdasdasd', '2025-01-06 07:26:49'),
(5, 1, 'Former Employers', 'asdasdasd', '2025-01-06 07:26:57'),
(6, 2, 'Dependents', 'trytrytr', '2025-01-06 13:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE IF NOT EXISTS `certificates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `education` varchar(255) NOT NULL,
  `work_experience` text,
  `referees` text,
  `next_of_kin` text,
  `unique_id` varchar(50) NOT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cert_number` varchar(30) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `role` varchar(1100) NOT NULL,
  `issue_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `user_id`, `name`, `education`, `work_experience`, `referees`, `next_of_kin`, `unique_id`, `status`, `created_at`, `cert_number`, `company_name`, `role`, `issue_date`) VALUES
(1, 1, 'alex busaka', 'secondary', 'worked for 5 employers', 'none', 'none', '12345', 'Approved', '2025-01-06 03:29:36', '12345', 'XXXX Employment Agency', 'house maid', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` enum('Local','International') NOT NULL,
  `country` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `start_date` date NOT NULL,
  `contact_details` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `type`, `country`, `role`, `salary`, `start_date`, `contact_details`) VALUES
(1, 'International', 'UAE', 'Housemaid', '$1200/month', '2025-02-01', 'Contact: +971-12345678'),
(2, 'Local', 'Kenya', 'Plumber', 'KES 50,000/month', '2025-01-15', 'Contact: +254-712345678'),
(3, 'International', 'USA', 'Software Engineer', '$80,000/year', '2025-03-01', 'Contact: +1-555-1234'),
(28, '', 'Tanzania', 'Mechanic', '11115', '2025-02-05', 'Contact via phone: +254755803080'),
(4, '', 'Uganda', 'Mechanic', '28255', '2025-12-11', 'Contact via phone: +254711342257'),
(5, '', 'Tanzania', 'Mechanic', '20546', '2025-07-05', 'Contact via phone: +254743451528'),
(6, '', 'Uganda', 'Plumber', '14864', '2025-12-16', 'Contact via phone: +254754987712'),
(7, '', 'Kenya', 'Carpenter', '16053', '2025-05-01', 'Contact via phone: +254757122859'),
(8, '', 'Uganda', 'Security Guard', '21124', '2025-02-27', 'Contact via phone: +254758354395'),
(9, '', 'Tanzania', 'Security Guard', '19092', '2025-03-15', 'Contact via phone: +254722385281'),
(10, '', 'Kenya', 'Electrician', '11523', '2025-04-13', 'Contact via phone: +254737472281'),
(11, '', 'Tanzania', 'Electrician', '16942', '2025-07-05', 'Contact via phone: +254794139393'),
(12, '', 'Kenya', 'Carpenter', '14659', '2025-02-11', 'Contact via phone: +254725237726'),
(13, '', 'Tanzania', 'Plumber', '22762', '2025-09-16', 'Contact via phone: +254740052559'),
(14, '', 'Kenya', 'Cleaner', '22959', '2025-03-15', 'Contact via phone: +254780885153'),
(15, '', 'Uganda', 'Cleaner', '13479', '2025-03-10', 'Contact via phone: +254743180192'),
(16, '', 'Tanzania', 'Mechanic', '25392', '2025-01-11', 'Contact via phone: +254793966728'),
(17, '', 'Tanzania', 'Electrician', '14364', '2025-12-03', 'Contact via phone: +254727548409'),
(18, '', 'Uganda', 'Cook', '13220', '2025-07-06', 'Contact via phone: +254788520047'),
(19, '', 'Tanzania', 'Security Guard', '28053', '2025-06-09', 'Contact via phone: +254792891495'),
(20, '', 'Tanzania', 'Mason', '23465', '2025-02-21', 'Contact via phone: +254757627089'),
(21, '', 'Tanzania', 'Mason', '19677', '2025-02-21', 'Contact via phone: +254715907124'),
(22, '', 'Tanzania', 'Plumber', '19886', '2025-02-01', 'Contact via phone: +254765424014'),
(23, '', 'Uganda', 'Mechanic', '28447', '2025-06-16', 'Contact via phone: +254751141073'),
(24, '', 'Kenya', 'Carpenter', '12138', '2025-11-12', 'Contact via phone: +254799087187'),
(25, '', 'Tanzania', 'Plumber', '25204', '2025-04-13', 'Contact via phone: +254769355539');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `mpesa_code` varchar(50) NOT NULL,
  `payment_date` datetime NOT NULL,
  `status` enum('Pending','Confirmed') DEFAULT 'Pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mpesa_code` (`mpesa_code`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `name`, `phone`, `amount`, `mpesa_code`, `payment_date`, `status`) VALUES
(1, 1, 'Alex Ovey', '0713025917', '900.00', 'uytrgkg98', '2025-01-06 06:36:26', 'Pending'),
(2, 1, 'Alex Ovey', '0713025917', '98897.00', '9977', '2025-01-06 07:04:30', 'Pending'),
(3, 1, 'castillo48@aol.com', '0713025917', '700.00', '9886t', '2025-01-06 07:05:12', 'Pending'),
(4, 1, 'george', '1234545', '500.00', '45345345', '2025-01-06 13:29:28', 'Pending'),
(5, 2, 'george', '12345', '56777.00', 'dfsdfa55we5e', '2025-01-06 13:31:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `national_id` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `national_id` (`national_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `date_of_birth`, `phone`, `national_id`, `password`) VALUES
(1, 'alex busaka ovey', '2025-01-02', '12345', '24234234', '12345'),
(2, 'George Odhiamb Otieno', '2025-01-11', '1234567', '1234567', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
