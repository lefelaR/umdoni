-- Migration: Create quotations table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `quotations`;

CREATE TABLE `quotations` (
  `id` int(11) NOT NULL,
  `title` varchar(552) DEFAULT NULL,
  `subtitle` varchar(552) DEFAULT NULL,
  `body` varchar(1000) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `isActive` varchar(45) DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  `reference` varchar(45) DEFAULT NULL,
  `dueDate` varchar(45) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
