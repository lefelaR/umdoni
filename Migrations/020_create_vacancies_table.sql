-- Migration: Create vacancies table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `vacancies`;

CREATE TABLE `vacancies` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `subtitle` varchar(552) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `duties` varchar(500) DEFAULT NULL,
  `experience` varchar(45) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `isActive` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
