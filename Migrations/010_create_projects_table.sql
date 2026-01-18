-- Migration: Create projects table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `body` varchar(1000) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `isActive` varchar(45) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `img_file` varchar(45) DEFAULT NULL,
  `updatedAt` varchar(45) DEFAULT NULL,
  `updatedBy` varchar(45) DEFAULT NULL,
  `dueDate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
