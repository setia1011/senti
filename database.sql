-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_dataset
CREATE DATABASE IF NOT EXISTS `db_dataset` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_dataset`;

-- Dumping structure for table db_dataset.dataset
CREATE TABLE IF NOT EXISTS `dataset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(50) NOT NULL DEFAULT '0',
  `text` text,
  `source` int(11) DEFAULT NULL,
  `scraped_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_dataset.dataset: ~0 rows (approximately)
DELETE FROM `dataset`;
INSERT INTO `dataset` (`id`, `topic`, `text`, `source`, `scraped_at`) VALUES
	(1, '1,2', 'Tri menjelaskan, untuk mengukur nilai oktan bahan bakar, Pertamina menggunakan mesin CFR atau coordinating fuel research. Untuk menguji sampel bahan bakar dengan mesin CFR, tidak sembarangan orang boleh melakukannya, hanya operator yang memiliki sertifikat saja.', 1, '2022-10-10 09:24:37');

-- Dumping structure for table db_dataset.polarity
CREATE TABLE IF NOT EXISTS `polarity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataset_id` int(11) DEFAULT NULL,
  `polarity` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `reviewer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_dataset.polarity: ~0 rows (approximately)
DELETE FROM `polarity`;

-- Dumping structure for table db_dataset.ref_polarity
CREATE TABLE IF NOT EXISTS `ref_polarity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `polarity` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_dataset.ref_polarity: ~4 rows (approximately)
DELETE FROM `ref_polarity`;
INSERT INTO `ref_polarity` (`id`, `polarity`, `description`) VALUES
	(1, 'neutral', 'Neutral, not positive or negative'),
	(2, 'positive', 'Positive'),
	(3, 'negative', 'Negative'),
	(4, 'irrelevant', 'Not relevant with the research domain/topic');

-- Dumping structure for table db_dataset.ref_source
CREATE TABLE IF NOT EXISTS `ref_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_dataset.ref_source: ~4 rows (approximately)
DELETE FROM `ref_source`;
INSERT INTO `ref_source` (`id`, `source`) VALUES
	(1, 'Twitter'),
	(2, 'Instagram'),
	(3, 'Facebook'),
	(4, 'YouTube');

-- Dumping structure for table db_dataset.ref_topic
CREATE TABLE IF NOT EXISTS `ref_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_dataset.ref_topic: ~2 rows (approximately)
DELETE FROM `ref_topic`;
INSERT INTO `ref_topic` (`id`, `topic`) VALUES
	(1, 'bbm'),
	(2, 'pertalite');

-- Dumping structure for table db_dataset.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_dataset.user: ~0 rows (approximately)
DELETE FROM `user`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
