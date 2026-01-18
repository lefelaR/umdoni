-- Migration: Create seniors table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `seniors`;

CREATE TABLE `seniors` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `surname` varchar(455) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `img_file` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `ward` varchar(255) DEFAULT NULL,
  `affiliation` varchar(255) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  `updatedAt` varchar(45) DEFAULT NULL,
  `initials` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `seniors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `seniors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
