-- Migration: Create newsletters table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `newsletters`;

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `publisher` varchar(45) DEFAULT NULL,
  `img_file` varchar(45) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  `summary` varchar(1000) DEFAULT NULL,
  `youtube` varchar(45) DEFAULT NULL,
  `rating` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
