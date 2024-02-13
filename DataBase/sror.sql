-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2024 at 11:40 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sror`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id_achievements` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `detiles` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `date` date NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id_achievements`, `title`, `detiles`, `date`, `img`) VALUES
(4, 'عنوان الانجاز', 'التفاصيل', '2024-02-01', 'logo-removebg-preview.png'),
(5, 'عنوان الانجاز 1', 'التفاصيل', '2024-02-01', 'logo-removebg-preview.png'),
(6, 'عنوان الانجاز 1', 'التفاصيل', '2024-02-01', 'logo-removebg-preview.png'),
(7, 'عنوان الانجاز 3', 'التفاصيل', '2024-02-01', 'logo-removebg-preview.png'),
(8, 'عنوان الانجاز 4', 'التفاصيل', '2024-02-01', 'logo-removebg-preview.png'),
(9, 'عنوان الانجاز 5', 'التفاصيل', '2024-02-01', 'logo-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id_activities` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `link` varchar(100) NOT NULL,
  `detiles` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id_activities`, `name`, `link`, `detiles`, `img`) VALUES
(2, 'اسم النشاط', 'link.com', 'التفاصيل', 'logo-removebg-preview.png'),
(3, 'اسم النشاط 1', 'link.com', 'التفاصيل', 'logo-removebg-preview.png'),
(4, 'اسم النشاط 2', 'link.com', 'التفاصيل', 'logo-removebg-preview.png'),
(5, 'اسم النشاط 3', 'link.com', 'التفاصيل', 'logo-removebg-preview.png'),
(6, 'اسم النشاط 4', 'link.com', 'التفاصيل', 'logo-removebg-preview.png'),
(7, 'اسم النشاط 5', 'link.com', 'التفاصيل', 'logo-removebg-preview.png'),
(8, 'اسم النشاط 6', 'link.com', 'التفاصيل', 'logo-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id_campaigns` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `detiles` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id_campaigns`, `name`, `detiles`, `img`) VALUES
(2, 'اسم الحملة', 'التفاصيل', 'logo-removebg-preview.png'),
(3, 'اسم الحملة 1', 'التفاصيل', 'logo-removebg-preview.png'),
(4, 'اسم الحملة 2', 'التفاصيل', 'logo-removebg-preview.png'),
(5, 'اسم الحملة 3', 'التفاصيل', 'logo-removebg-preview.png'),
(6, 'اسم الحملة 4', 'التفاصيل', 'logo-removebg-preview.png'),
(7, 'اسم الحملة 5', 'التفاصيل', 'logo-removebg-preview.png'),
(8, 'اسم الحملة 6', 'التفاصيل', 'logo-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id_delivery` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` char(10) NOT NULL,
  `company` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `type` enum('سيارة','كنتر') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id_donation` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `type` enum('مادي','نقدي','رصيد') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `physically` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT 'ماديا',
  `amount` double DEFAULT NULL,
  `type_amount` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `phone_credit` char(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `receipt` enum('مندوب','حضور للمؤسسة') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hadia`
--

CREATE TABLE `hadia` (
  `id_hadia` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name_to` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone_to` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tag` tinyint(1) NOT NULL,
  `amount` double NOT NULL,
  `receipt` enum('مندوب','حضور للمؤسسة') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id_media` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media_images`
--

CREATE TABLE `media_images` (
  `id_media` int NOT NULL,
  `id_image` int NOT NULL,
  `path_image` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `needy`
--

CREATE TABLE `needy` (
  `id_needy` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` char(10) NOT NULL,
  `family_number` int NOT NULL,
  `bank_number` char(20) NOT NULL,
  `living` enum('أجار','ملك') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `source_income` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `by_whom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `family_needs` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `department` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` char(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `power` char(1) NOT NULL,
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `phone`, `username`, `password`, `power`, `del`) VALUES
(1, 'Admin', '911111111', 'admin', 'admin', 'A', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id_user` int NOT NULL,
  `hadia` tinyint(1) NOT NULL,
  `donation` tinyint(1) NOT NULL,
  `volunteering` tinyint(1) NOT NULL,
  `users` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id_user`, `hadia`, `donation`, `volunteering`, `users`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vister_web`
--

CREATE TABLE `vister_web` (
  `id` bigint NOT NULL,
  `ip_address` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vister_web`
--

INSERT INTO `vister_web` (`id`, `ip_address`) VALUES
(2, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `volunteering`
--

CREATE TABLE `volunteering` (
  `id_volunteering` int NOT NULL,
  `type` char(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date` date DEFAULT NULL,
  `img` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `del` tinyint(1) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteering`
--

INSERT INTO `volunteering` (`id_volunteering`, `type`, `title`, `date`, `img`, `note`, `date_create`, `del`, `id_user`) VALUES
(22, 'اقسام الخدمات', 'عنوان القسم 1', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:13:39', 0, 1),
(23, 'اقسام الخدمات', 'عنوان القسم 2', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:13:57', 0, 1),
(24, 'اقسام الخدمات', 'عنوان القسم 3', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:14:41', 0, 1),
(25, 'اقسام الخدمات', 'عنوان القسم 5', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:14:49', 0, 1),
(26, 'اقسام الخدمات', 'عنوان القسم 6', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:14:59', 0, 1),
(27, 'اقسام النشطات', 'عنوان القسم 1', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:15:12', 0, 1),
(28, 'اقسام النشطات', 'عنوان القسم 2', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:15:23', 0, 1),
(29, 'اقسام النشطات', 'عنوان القسم 3', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:15:29', 0, 1),
(30, 'اقسام النشطات', 'عنوان القسم 4', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:15:36', 0, 1),
(31, 'اقسام النشطات', 'عنوان القسم 5', NULL, 'logo-removebg-preview.png', 'تفاصيل', '2024-02-13 23:16:04', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id_achievements`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id_activities`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id_campaigns`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id_delivery`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id_donation`);

--
-- Indexes for table `hadia`
--
ALTER TABLE `hadia`
  ADD PRIMARY KEY (`id_hadia`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `media_images`
--
ALTER TABLE `media_images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `idid_media` (`id_media`);

--
-- Indexes for table `needy`
--
ALTER TABLE `needy`
  ADD PRIMARY KEY (`id_needy`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vister_web`
--
ALTER TABLE `vister_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteering`
--
ALTER TABLE `volunteering`
  ADD PRIMARY KEY (`id_volunteering`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id_achievements` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id_activities` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id_campaigns` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id_delivery` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id_donation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hadia`
--
ALTER TABLE `hadia`
  MODIFY `id_hadia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media_images`
--
ALTER TABLE `media_images`
  MODIFY `id_image` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `needy`
--
ALTER TABLE `needy`
  MODIFY `id_needy` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vister_web`
--
ALTER TABLE `vister_web`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteering`
--
ALTER TABLE `volunteering`
  MODIFY `id_volunteering` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `علاقة المركز الاعلامي و المستحدم` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `media_images`
--
ALTER TABLE `media_images`
  ADD CONSTRAINT `علاقة  الصور و الوسائط` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`);

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `علاقة المستحدم مع الصلاحيات` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
