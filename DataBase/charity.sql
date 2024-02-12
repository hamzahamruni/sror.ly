-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 13, 2023 at 12:13 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
CREATE TABLE IF NOT EXISTS `donation` (
  `id_donation` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `type` char(50) CHARACTER SET utf8 NOT NULL,
  `notes` text CHARACTER SET utf8,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_donation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id_donation`, `name`, `phone_number`, `type`, `notes`, `date_create`, `state`) VALUES
(2, 'نعيمة محمد اغا', '092343897', 'أثاث', 'توفير عدد 2 اسرة', '2023-07-31 16:07:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donation_family`
--

DROP TABLE IF EXISTS `donation_family`;
CREATE TABLE IF NOT EXISTS `donation_family` (
  `id_donation` int(11) NOT NULL,
  `family_number` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_donation`,`family_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_media`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_media`, `title`, `text`, `id_user`) VALUES
(1, 'الزي المدرسي', 'توزيع الزي المدرسي لي الطلبة المحتجين', 1),
(2, 'ادوات المدرسية', 'توزيع ادوات المدرسية لي الطلبة المحتاجين', 1),
(3, 'التكفل بالرعاية الصحية', 'التكفل بالرعاية الصحية لي الأيتام و لأسر المحتاجة ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_images`
--

DROP TABLE IF EXISTS `media_images`;
CREATE TABLE IF NOT EXISTS `media_images` (
  `id_media` int(11) NOT NULL,
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `path_image` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `idid_media` (`id_media`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_images`
--

INSERT INTO `media_images` (`id_media`, `id_image`, `path_image`) VALUES
(1, 1, '1.jpg'),
(2, 2, '2.png'),
(3, 3, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orphans`
--

DROP TABLE IF EXISTS `orphans`;
CREATE TABLE IF NOT EXISTS `orphans` (
  `id_orphan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'رقم اليتيم',
  `national_number` char(20) NOT NULL,
  `family_number` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `name_full` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_father` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name_mather` varchar(50) CHARACTER SET utf8 NOT NULL,
  `birth_date` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `foster_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(70) CHARACTER SET utf8 NOT NULL,
  `phone` char(14) NOT NULL,
  `note` text CHARACTER SET utf8 NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  `del` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_orphan`),
  UNIQUE KEY `national_number` (`national_number`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  KEY `family_number` (`family_number`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orphans`
--

INSERT INTO `orphans` (`id_orphan`, `national_number`, `family_number`, `state`, `name_full`, `name_father`, `name_mather`, `birth_date`, `sex`, `foster_name`, `address`, `phone`, `note`, `date_create`, `id_user`, `del`) VALUES
(10, '220089384756', 9453077, 2, 'محمد احمد حيدر', 'احمد حيدر', 'كريمة سالم العنقودي', '2008-09-05', 1, 'فاطمة', 'طرابلس شارع الزاوية', '094433567', '', '2023-07-31 15:53:00', NULL, 0),
(11, '220108765500', 9543087, 1, 'مريم رمضان الحاتمي', 'رمضان محمد الحاتمي', 'نعيمة محمد اغا', '2010-08-05', 0, 'نعيمة محمد اغا', 'طرابلس سوق الجمعة', '092343897', '', '2023-07-31 15:55:43', NULL, 0),
(12, '120127654389', 9432188, 1, 'محمد عبد المجيد الهادي', 'عبد المجيد الهادي', 'نادية عمران حمودة', '2012-07-07', 1, 'نادية عمران حمودة', 'طرابلس سوق الجمعة', '091234356', '', '2023-07-31 15:58:50', NULL, 0),
(13, '120230610041', 9453077, 1, 'فاطمة', 'احمد حيدر', 'فاطمة', '2023-06-10', 1, 'ثريا طاهر سعد', 'طرابلس - نوفلين', '912323233', '', '2023-08-01 08:39:13', 1, 0),
(14, '1234357678', 3423, 1, 'احمد عاشور محمد', 'عاشور محمد', 'فاطمة', '2013-01-01', 1, 'ثريا طاهر سعد', 'طرابلس - نوفلين', '912323233', '', '2023-08-12 23:22:28', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orphans_family`
--

DROP TABLE IF EXISTS `orphans_family`;
CREATE TABLE IF NOT EXISTS `orphans_family` (
  `family_number` int(11) NOT NULL,
  `number_children` int(11) NOT NULL,
  `name_deceased` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_die` date NOT NULL,
  `phone_family` char(10) NOT NULL,
  `address_family` char(50) CHARACTER SET utf8 NOT NULL,
  `note_family` text CHARACTER SET utf8 NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  `donation_type` char(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`family_number`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orphans_family`
--

INSERT INTO `orphans_family` (`family_number`, `number_children`, `name_deceased`, `date_die`, `phone_family`, `address_family`, `note_family`, `date_create`, `id_user`, `donation_type`) VALUES
(3423, 4, 'عاشور محمد', '2021-10-18', '0912323233', 'زاوية', '', '2023-08-12 23:22:28', 1, ''),
(9023, 2, 'عمر علي خالد', '2020-10-20', '0912323233', 'بنغازي', '', '2023-08-12 23:09:53', 1, ''),
(2032304, 6, 'جلال مسعود', '2019-02-12', '0932346545', 'غريان', '', '2023-08-12 23:28:01', 1, 'أثاث'),
(5345345, 3, 'احمد علي خليفة', '2007-01-01', '0912323233', 'طرابلس', '', '2023-08-12 23:08:35', 1, 'سلعة تموينية'),
(9432188, 3, 'عبد المجيد الهادي', '2015-06-09', '0947654998', 'طرابلس- نوفليين', '', '2023-07-31 15:58:50', NULL, NULL),
(9453077, 2, 'احمد حيدر', '2018-08-08', '0917616274', 'طرابلس', '', '2023-07-31 15:53:00', NULL, NULL),
(9543087, 7, 'رمضان محمد الحاتمي', '2011-05-05', '092343897', 'طرابلس', '', '2023-07-31 15:55:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relationship_sponsorships_orphans`
--

DROP TABLE IF EXISTS `relationship_sponsorships_orphans`;
CREATE TABLE IF NOT EXISTS `relationship_sponsorships_orphans` (
  `id_sponsorship` int(11) NOT NULL,
  `id_orphan` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id_sponsorship`,`id_orphan`),
  KEY `علاقة اليتيم و الكفالة` (`id_orphan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship_sponsorships_orphans`
--

INSERT INTO `relationship_sponsorships_orphans` (`id_sponsorship`, `id_orphan`, `date_start`, `date_end`) VALUES
(1, 11, '2023-08-01', '2024-02-01'),
(2, 12, '2023-08-02', '2024-02-02'),
(3, 10, '2023-08-02', '2024-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE IF NOT EXISTS `sponsors` (
  `id_sponsors` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `identification_card` varchar(50) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` char(14) NOT NULL,
  `id_type_sponsorships` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `del` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_sponsors`),
  KEY `id_user` (`id_user`),
  KEY `id_type_sponsorships` (`id_type_sponsorships`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id_sponsors`, `full_name`, `identification_card`, `address`, `phone`, `id_type_sponsorships`, `id_user`, `del`) VALUES
(28, 'احمد احمد', 'SE3427F', 'طرابلس سوق الجمعة', '0917616274', 1, 1, 0),
(29, 'محمد جمعة الهوني', '8766789', 'طرابلس سوق الجمعة', '0917665439', 2, NULL, 0),
(30, 'تسنيم علي الشامس', 'Q34RIG88', 'طرابلس الهصبة الخضراء', '0912003040', 2, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sponsorships_orphans`
--

DROP TABLE IF EXISTS `sponsorships_orphans`;
CREATE TABLE IF NOT EXISTS `sponsorships_orphans` (
  `id_sponsorship` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_ponsorship` int(11) NOT NULL,
  `id_sponsors` int(11) NOT NULL,
  `number_months` int(2) NOT NULL,
  `number_persons` int(3) NOT NULL,
  `price_month` double NOT NULL,
  `total_price` double NOT NULL,
  `total_paid` double NOT NULL,
  `payment_method` char(20) CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `del` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_sponsorship`),
  KEY `علاقة نوع الكفالة و الكفالة` (`id_type_ponsorship`),
  KEY `علاقة الكفالة و الكفيل` (`id_sponsors`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsorships_orphans`
--

INSERT INTO `sponsorships_orphans` (`id_sponsorship`, `id_type_ponsorship`, `id_sponsors`, `number_months`, `number_persons`, `price_month`, `total_price`, `total_paid`, `payment_method`, `id_user`, `date_create`, `del`) VALUES
(1, 1, 29, 6, 1, 135, 810, 810, 'زيارة الجمعية', 1, '2023-08-01 09:32:42', 0),
(2, 1, 29, 6, 1, 135, 810, 810, 'زيارة الجمعية', 1, '2023-08-01 23:36:32', 0),
(3, 3, 28, 12, 1, 160, 1920, 1920, 'حساب مصرفي', 1, '2023-08-01 23:37:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `types_sponsorships`
--

DROP TABLE IF EXISTS `types_sponsorships`;
CREATE TABLE IF NOT EXISTS `types_sponsorships` (
  `id_type_ponsorship` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `age_from` float NOT NULL,
  `age_to` float NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `price_month` double NOT NULL,
  `active` tinyint(1) NOT NULL,
  `del` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_type_ponsorship`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types_sponsorships`
--

INSERT INTO `types_sponsorships` (`id_type_ponsorship`, `name`, `age_from`, `age_to`, `sex`, `price_month`, `active`, `del`) VALUES
(1, 'كفالة يتيم', 7, 13, 2, 135, 1, 0),
(2, 'كفالة يتيم', 0, 7, 2, 110, 1, 0),
(3, 'كفالة يتيم', 13, 18, 2, 160, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` char(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `power` char(1) NOT NULL,
  `del` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `phone`, `username`, `password`, `power`, `del`) VALUES
(1, 'Admin', '911111111', 'admin', 'admin', 'A', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

DROP TABLE IF EXISTS `user_permissions`;
CREATE TABLE IF NOT EXISTS `user_permissions` (
  `id_user` int(11) NOT NULL,
  `orphan` tinyint(1) NOT NULL,
  `orphan_family` tinyint(1) NOT NULL,
  `sponsor` tinyint(1) NOT NULL,
  `donation` tinyint(1) NOT NULL,
  `volunteering` tinyint(1) NOT NULL,
  `media` tinyint(1) NOT NULL,
  `users` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id_user`, `orphan`, `orphan_family`, `sponsor`, `donation`, `volunteering`, `media`, `users`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `volunteering`
--

DROP TABLE IF EXISTS `volunteering`;
CREATE TABLE IF NOT EXISTS `volunteering` (
  `id_volunteering` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(30) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` date DEFAULT NULL,
  `img` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `note` text CHARACTER SET utf8 NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `del` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_volunteering`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteering`
--

INSERT INTO `volunteering` (`id_volunteering`, `type`, `title`, `date`, `img`, `note`, `date_create`, `del`, `id_user`) VALUES
(1, 'مشاريع موسيمية', 'مشروع تأمين السلة الرمضانية', '2023-08-22', 'سبة.jpg', 'الي أهل الخير و الاحسان الرجاء مساعدتنا علي توفير السلال الرمضانية', '2023-08-01 10:25:07', 0, 1),
(2, 'مشاريع موسيمية', 'مشروع تأمين كسوه العيد ', '2023-08-21', 'OIP (2)كسوه.jpg', 'أهل الخير و الاحسان الرجاء التبرع بكسوه العيد لأيتام الجعية\r\n', '2023-08-01 10:27:40', 0, 1),
(3, 'مشاريع موسيمية', 'مشروع تأمين أضاحي العيد', '2023-08-17', 'download.jpg', 'الرجاء تامين اضاحي العيد للأيتام', '2023-08-01 10:28:53', 0, 1),
(4, 'مشاريع موسيمية', 'مشروع الحقيبة المدرسية', '2023-09-11', '717.jpg', 'اوفير حقائب و مستلزمات  الدراسة لأيتام الجمعية', '2023-08-01 10:31:04', 0, 1),
(5, 'مشاريع دائمة', 'عملية جراحية', NULL, 'OIP (1).jpg', 'يوجد لدينا يتيم يبلغ من العمر 10 سنوات يحتاج الي عملية جراحية للعين', '2023-08-01 10:32:43', 0, 1),
(6, 'مشاريع دائمة', 'سداد ايجار منازل الاسر المحتاجة', NULL, 'download (2).jpg', 'يوجد لدينا عدد 2 أسر تحتاج لتسديد ايجار منازلهم', '2023-08-01 10:34:10', 0, 1),
(7, 'مشاريع دائمة', 'الدورات التدريبية للمحتاجين', NULL, 'R.jpg', 'من لديه القدرة علي تدريب مجموعة من الايتام ', '2023-08-01 10:36:08', 0, 1),
(8, 'مشاريع دائمة', 'توفير دواء', NULL, 'download (1).jpg', 'يوجد طفل يتيم يحتاج دواء سكري 20-70 ', '2023-08-01 10:36:56', 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation_family`
--
ALTER TABLE `donation_family`
  ADD CONSTRAINT `علاقة نبرعات الاسر و التبرع` FOREIGN KEY (`id_donation`) REFERENCES `donation` (`id_donation`);

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
-- Constraints for table `orphans`
--
ALTER TABLE `orphans`
  ADD CONSTRAINT `علاقة اليتيم و الاسرء` FOREIGN KEY (`family_number`) REFERENCES `orphans_family` (`family_number`),
  ADD CONSTRAINT `علاقة اليتيم و المستحدم` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `orphans_family`
--
ALTER TABLE `orphans_family`
  ADD CONSTRAINT `علاقة الاسرء و المستحدم` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `relationship_sponsorships_orphans`
--
ALTER TABLE `relationship_sponsorships_orphans`
  ADD CONSTRAINT `علاقة اليتيم و الكفالة` FOREIGN KEY (`id_orphan`) REFERENCES `orphans` (`id_orphan`);

--
-- Constraints for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD CONSTRAINT `علاقة الكفيل مع نوع الكفالة المخناره` FOREIGN KEY (`id_type_sponsorships`) REFERENCES `types_sponsorships` (`id_type_ponsorship`),
  ADD CONSTRAINT `علاقة المستحدم مع الكفيل` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `sponsorships_orphans`
--
ALTER TABLE `sponsorships_orphans`
  ADD CONSTRAINT `علاقة الكفالة و الكفيل` FOREIGN KEY (`id_sponsors`) REFERENCES `sponsors` (`id_sponsors`),
  ADD CONSTRAINT `علاقة المتسخدم و الكفالة` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `علاقة نوع الكفالة و الكفالة` FOREIGN KEY (`id_type_ponsorship`) REFERENCES `types_sponsorships` (`id_type_ponsorship`);

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `علاقة المستحدم مع الصلاحيات` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `volunteering`
--
ALTER TABLE `volunteering`
  ADD CONSTRAINT `علاقة المشاريع و المستحدم` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
