-- Migration: Create documents table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(552) DEFAULT NULL,
  `body` varchar(552) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `img_file` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `isActive` varchar(45) DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  `updatedAt` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
