-- Migration: Create services table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `body` varchar(1000) DEFAULT NULL,
  `isActive` varchar(45) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `updatedAt` varchar(45) DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  `img_file` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
