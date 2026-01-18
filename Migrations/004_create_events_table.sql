-- Migration: Create events table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `subtitle` varchar(225) DEFAULT NULL,
  `body` varchar(2500) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `isActive` varchar(45) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `img_file` varchar(255) DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  `updatedAt` varchar(45) DEFAULT NULL,
  `dueDate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
