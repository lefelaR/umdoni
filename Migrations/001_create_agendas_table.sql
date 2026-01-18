-- Migration: Create agendas table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `agendas`;

CREATE TABLE `agendas` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `body` varchar(1500) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `img_file` varchar(255) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  `updatedAt` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `agendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
