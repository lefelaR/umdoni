-- Migration: Create rfps table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `rfps`;

CREATE TABLE `rfps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(552) DEFAULT NULL,
  `subtitle` varchar(552) DEFAULT NULL,
  `body` varchar(1000) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `isActive` varchar(45) DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  `reference` varchar(45) DEFAULT NULL,
  `dueDate` varchar(45) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
