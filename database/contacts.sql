-- Mid Florida Scholars Academy
-- Database: `midflorida`
-- Table structure for table `contacts`

CREATE DATABASE IF NOT EXISTS `midflorida` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `midflorida`;

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `subject` VARCHAR(255) DEFAULT 'General Inquiry',
  `message` TEXT NOT NULL,
  `status` VARCHAR(50) DEFAULT 'New',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_status` (`status`),
  INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
