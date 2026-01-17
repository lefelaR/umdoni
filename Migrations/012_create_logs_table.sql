-- Migration: Create logs table
-- Created: 2024-01-17

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(11) NOT NULL,
  `time_log` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `actions` varchar(45) NOT NULL,
  `last_login` varchar(45) NOT NULL,
  `logout` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
