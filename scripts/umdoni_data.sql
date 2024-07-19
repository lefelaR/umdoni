-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2024 at 09:14 PM
-- Server version: 10.5.24-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umdonigov_umdoni`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `councillors`
--
DROP TABLE IF EXISTS `councillors` ;
CREATE TABLE `councillors` (
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
  `updatedAt` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `councillors`
--

INSERT INTO `councillors` (`id`, `name`, `middlename`, `surname`, `telephone`, `email`, `title`, `category`, `img_file`, `location`, `ward`, `affiliation`, `isActive`, `updatedAt`) VALUES
(14, 'M', 'J', 'Cele-Luthuli', '0717110827', '', 'EXCO Member', 'EXCO', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Mayor_Optimised_33.png', '15  (ANC)', NULL, 1, '2024-04-16 09:27:14'),
(15, 'P', '', 'Thabethe', '0840302238', '', 'EXCO Member', 'EXCO', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Dpty_Mayor_Optimised_17.png', '(ANC)', NULL, 1, '2024-03-20 08:26:14'),
(16, 'M', 'E', 'Mbutho', '0738157465', '', 'EXCO Member', 'EXCO', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/umdoni-mun-23.JPG', '3 (ANC)', NULL, 1, '2024-03-20 08:03:09'),
(17, 'R', 'S', 'Maharaj', '0837993395', '', 'EXCO Member', 'EXCO', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20RS%20Maharaj%20-Ward%2013.jpg', '3 (ANC)', NULL, 1, '2024-03-20 08:03:23'),
(18, 'S', '', 'Singh', '0823378425', '', 'EXCO Member', 'EXCO', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20S%20Singh%20-%20Ward%2015.jpg', '15', NULL, 1, '2024-04-16 10:42:49'),
(19, 'A', '', 'Catten', '0672789720', '', 'EXCO Member', 'EXCO', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-10.jpg', '10 (DA)', NULL, 1, '2024-04-16 09:02:13'),
(20, 'S', 'N', 'Shezi', '0833440683', '', 'PR Cllr. (EFF)', 'PR', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-13.jpg', '', NULL, 1, '2024-04-16 10:50:10'),
(21, 'S', 'N', 'Mlaba', '0762171491', '', 'PR Cllr. (ABC)', 'PR', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-46.jpg', ' ', NULL, 1, '2024-04-16 10:51:45'),
(22, ' P', '', 'Naidoo', '0827776216', '', 'PR Cllr. (ANC)', 'PR', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-47.jpg', '', NULL, 1, '2024-04-16 11:08:03'),
(23, 'R', '', 'Mynhardt', '0827776216', '', 'PR Cllr. (DA)', 'PR', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-9.jpg', '10', NULL, 1, '2024-04-16 10:53:26'),
(24, 'S', 'G', 'Dlamini', '0839810521', '', 'PR Cllr. (IFP)', 'PR', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20SG%20Dlamini%20-%20PR.jpg', '', NULL, 1, '2024-04-16 10:54:11'),
(25, 'Z', 'Z', 'Duma', '0824988658', '', 'PR Cllr. (EFF)', 'PR', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20ZZ%20Duma%20-PR.jpg', '', NULL, 1, '2024-04-16 10:54:44'),
(26, 'B', 'A', 'Cele', '0798378735', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20BA%20Cele%20-%20Ward%2014.jpg', '14', NULL, 1, '2024-04-16 10:42:00'),
(27, 'L ', 'R ', 'Dlamini', '0834811271', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20LR%20Dlamini%20-%20Ward%206.jpg', '6 ', NULL, 1, '2024-04-16 10:35:53'),
(28, 'M', 'A', 'Mbanjwa', '0730724423', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20MA%20Mbanjwa%20-%20Ward%204.jpg', '4', NULL, 1, '2024-04-16 10:34:33'),
(29, 'M', 'G', 'Phungula', '0815271866', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20MG%20Phungula%20-%20Ward%205.jpg', '5', NULL, 1, '2024-04-16 10:35:04'),
(30, 'M', 'R', 'Mdlala', '', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20MR%20Madlala%20-%20Ward%202.jpg', '2', NULL, 1, '2024-04-16 10:32:55'),
(31, 'N', 'L', 'Nkomo', '0823966239', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20NL%20Nkomo%20-%20Ward%2017.jpg', '17', NULL, 1, '2024-04-16 10:43:57'),
(32, 'N', 'P', 'Nombika', '0820520881', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20NP%20Nombika%20-%20Ward%2011.jpg', '11', NULL, 1, '2024-04-16 10:39:43'),
(33, 'N', 'T', 'Nzama', '0784821760', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20NT%20Nzama%20-%20Ward%2018.jpg', '18', NULL, 1, '2024-04-16 10:44:33'),
(34, 'S', '', 'Sookraj', '', '', 'Ward Cllr. (DA)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20S%20Sookhraj-Ward%2012.jpg', '12', NULL, 1, '2024-04-16 10:41:10'),
(35, 'S', '', 'Zulu', '0672612150', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20S%20Zulu%20-%20Ward%201.jpg', '1', NULL, 1, '2024-04-16 10:30:56'),
(36, 'S', 'H', 'Mngoma', '0820561799', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20SHE%20Mngoma%20-%20Ward%208.jpg', '8', NULL, 1, '2024-04-16 10:37:48'),
(37, 'S', 'V', 'Khanyile', '', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20SV%20Khanyile%20-Ward%2019.jpg', '19', NULL, 1, '2024-04-16 10:47:24'),
(38, 'S', 'W', 'Mthwane', '', '', 'Ward Cllr. (ANC)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20SW%20Mthwane%20-%20Ward%207.jpg', '7', NULL, 1, '2024-04-16 10:36:52'),
(39, 'M', 'E', 'Mbutho', '0738157465', 'membutho@gmail.com', 'Speaker (ANC)', 'WARD', 'Speaker_Optimised_23.png', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Speaker_Optimised_23.png', '3', NULL, 1, NULL),
(40, 'P', 'E', 'Thabethe', '0840302238', 'Phile.e.thabethe@gmail.com', 'Deputy Mayor (ANC)', 'WARD', 'Dpty_Mayor_Optimised_17.png', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Dpty_Mayor_Optimised_17.png', '9', NULL, 1, NULL),
(41, 'M', 'J', 'Cele-Luthuli', '0717110827', 'mbali7110@gmail.com', 'Mayor (ANC)', 'WARD', 'Mayor_Optimised_33.png', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Mayor_Optimised_33.png', '16', NULL, 1, NULL),
(42, 'R ', '', 'Mynhardt', '0827776216', 'riana.mynhardt@gmail.com', 'Ward Cllr. (DA)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-9.jpg', '10 ', NULL, 1, '2024-04-16 09:36:46'),
(43, 'R', '', 'Maharaj ', '0837993395', 'maharajravi270@gmail.com', 'Ward Cllr. (ANC)', 'WARD', 'Cllr RS Maharaj -Ward 13.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20RS%20Maharaj%20-Ward%2013.jpg', '13', NULL, 1, NULL),
(44, 'S', '', 'Singh', '0823378425', 'promobag@gmail.com', 'EXCO Member (DA)', 'WARD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Cllr%20S%20Singh%20-%20Ward%2015.jpg', '15', NULL, 1, '2024-04-16 10:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

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
  `updatedAt` varchar(11) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `subtitle`, `body`, `createdAt`, `isActive`, `location`, `img_file`, `updatedBy`, `updatedAt`, `dueDate`) VALUES
(8, 'ehte', 'therth', 'therthrth', '2024-03-18 22:56:17', '0', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/logitech-g435-bluetooth-wireless-gaming-headset-black-1500px-v1-0009.jpg', 'logitech-g435-bluetooth-wireless-gaming-headset-black-1500px-v1-0009.jpg', 'Rakheoana', NULL, '2024-03-14'),
(9, 'test', 'test', 'testing', '2024-03-20 09:20:11', '0', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Screenshot%202024-03-15%20090201.png', 'Screenshot 2024-03-15 090201.png', 'Rakheoana', NULL, '2024-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
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

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
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
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `subtitle`, `body`, `createdAt`, `location`, `status`, `img_file`, `isActive`, `updatedAt`, `user_id`) VALUES
(8, 'COUNCILLOR PASSES ON', 'Abrupt passing of Councillor Qedukwazi Theodore Mzimela. ', 'UMDONI COUNCILLOR PASSES ON \r\nUmdoni municipality has learnt with great sadness and shock of the abrupt passing of Councillor Qedukwazi Theodore Mzimela. \r\nThe devastating news of his passing was shared with the leadership of the municipality this afternoon. \r\nMzimela joined the Umdoni Council as a PR Councillor representing the ABC party late January of the current year. \r\nThe leadership is indeed saddened by the shattering news and pass their sincerest condolences to Mzimela’s family, friends,  colleagues and those who knew him. \r\n“Our hearts are heavy as the Umdoni Council to learn such sad news about a fellow Councillor we have just recently got acquainted to. We believed that he would have brought forward meaningful and progressive contributions to the Umdoni Council. We are indeed saddened by his untimely passing and we convey our heartfelt condolences to those who were close to him. May justice be served in his name,” said the Mayor of Umdoni, Cllr Mbali Cele-Luthuli. \r\nThe municipality will duly share further information regarding his memorial and funeral services on receipt of the details from his family. \r\nMay his soul rest in peace.', '2024-03-25 07:15:34', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/431540876_816549977175782_8277955631333502185_n.jpg', NULL, '431540876_816549977175782_8277955631333502185_n.jpg', 1, '2024-03-25 07:22:47', NULL),
(9, 'UMEYA UTHEMBISILE UKUTHI UHLA LWEZINDLU LUZOQHUBEKA', 'UMEYA UTHEMBISILE UKUTHI UHLA LWEZINDLU LUZOQHUBEKA', 'INKULUMO kaMeya uKhansela Mbali Cele-Luthuli ithinte udaba lwezindlu olushisa ibunzi kumphakathi wase Wadi 3, wabela lomphakathi izindaba ezinhle zokuthi i-phrojekthi yohla lwezindlu eziyi 1000 seyinesabelomali ukuze lomsebenzi uqhubeke ngonyaka wezimali omusha ka 2024/25. \r\nU-Wadi 3 uyingxenye yesibalo samawadi azohlumula kuloluhlelo lwezindlu ekubalwa no wadi 1,2,6 kanye no 19. \r\nUkuveza nje okumbalwa osekenziwe umasipala ku-Wadi 3 wonkana, inkundla yezemidlalo iNkampula Sport Field esiphelile kanye nokuthuthukisa imigwaqo yasemakhaya ngokufaka iziqephu eziwu 40 wamamitha emigwaqweni enomango. \r\nUmasipala unesabelomali esingango R10 Miliyoni  sokulungisa imigwaqo yasemakhaya. Ngaphezu kwalokho, amawadi asemakhaya azophinde azuze kwisabelomali esingu R1.5 Miliyoni sokugcwaliswa kwemigwaqo, phecelezi pothole patching kuwo wonke amawadi asemakhaya nasemadolobheni ngaphansi koMdoni.\r\nLomphakathi ube usufaka izicelo zentuthuko ezimbalwa, ekubalwa ukwakhiwa kwamahholo omphakathi, ukuphakelwa kwamanzi okungaphazamiseki, i renki yamatekisi, ukulungiswa kwemigwaqo engenela emakhaya, amahhovisi akandabazabantu kanye nokulungiswa koMtapo\r\nWolwazi waseVulamehlo. \r\n“Umdoni uyikhaya lethu sonke, kubalulekile ukuthi senze konke okusemandleni ukuthi siwusebenzele futhi silethe intuthuko ngokwezicelo nezidingo zabantu esibaholayo,” kusho uMeya,uKhansela Cele-Luthuli. \r\nSIKHISHWE:\r\nUMASIPALA WASEMDONI', '2024-03-25 07:25:25', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/433460356_817714723725974_2604800242353370831_n.jpg', NULL, '433460356_817714723725974_2604800242353370831_n.jpg', 1, NULL, NULL),
(10, 'UMZINTO TESTING CENTRE TO RESUME OPERATIONS FOR CERTAIN SERVICES', 'Umdoni municipality hereby informs residents and customers that the Umzinto Testing Centre will resume operations on Monday, 25 March 2024 from 7H30 only providing three (3) services.', '', '2024-03-25 09:36:06', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/logo.png', NULL, 'logo.png', 0, '2024-03-25 09:38:07', NULL),
(11, 'Umdoni news', 'UMDONI MUNICIPALITY’S SCOTTBURGH OFFICE AND LIBRARY ARE CLOSED ', 'UMDONI MUNICIPALITY’S SCOTTBURGH OFFICE AND LIBRARY ARE CLOSED FOR REMAINDER OF THE DAY DUE TO WATER SUPPLY INTERRUPTION.. ', '2024-03-25 09:47:54', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/431565860_815111087319671_7118722342608088955_n.jpg', NULL, '431565860_815111087319671_7118722342608088955_n.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
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
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `subtitle`, `body`, `createdAt`, `location`, `status`, `img_file`, `isActive`, `updatedAt`, `user_id`) VALUES
(23, 'RE-ESTABLISHMENT OF LED FORUM', 'Calling all interested stakeholders to form part of the Umdoni LED Forum', 'Umdoni Municipality is re-establishing the LED Forum. LED Forum is an important structure which guides economic development programmes and issues in the municipality. The Municipality hereby calls all interested stakeholders to be members of the Umdoni municipality LED Forum.', '2024-03-25 06:22:39', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/LED_forum_notices.jpg', NULL, 'LED_forum_notices.jpg', 1, NULL, NULL),
(24, 'Registration to Umdoni Local business batabase', 'CALLING ALL BUSINESS PROVIDERS TO REGISTER ON THE UMDONI LOCAL BUSINESS DATABASE ', 'Database forms are available at the Umdoni Municipal LED Office. No 1 Preston Road, Park Rynie, Municipal Website- www.umdoni.gov.za. Umdoni municipal Main Office- corner Bram Fisher and Williamson Street, Umdoni Municipal Libraries', '2024-03-25 06:32:58', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/430296951_18016231385157421_2282148449591150517_n.jpg', NULL, '430296951_18016231385157421_2282148449591150517_n.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `mobile_number` varchar(45) DEFAULT NULL,
  `address_1` varchar(45) DEFAULT NULL,
  `address_2` varchar(45) DEFAULT NULL,
  `town` varchar(45) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `img_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `first_name`, `last_name`, `createdAt`, `mobile_number`, `address_1`, `address_2`, `town`, `postal_code`, `city`, `location`, `img_file`) VALUES
(13, 41, 'Rakheoana', 'Lefela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/umdoni-mun-17.png', 'umdoni-mun-17.png'),
(15, 43, 'Nhlanhla', 'Mnyandu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 44, 'Nhlanhla', 'Mnyandu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 45, 'Lindokuhle ', 'Cele', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 46, 'Rakheoana', 'Lefela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 47, 'David', 'Nyathi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

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

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `subtitle`, `body`, `createdAt`, `isActive`, `location`, `img_file`, `updatedAt`, `updatedBy`, `dueDate`) VALUES
(51, 'test', 'test sub', '                        \r\n               test description         ', '2024-03-18 15:25:19', '0', '', NULL, '0', 'rakheoana', NULL);


CREATE TABLE `rfps` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
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


-- --------------------------------------------------------

SELECT * FROM umdoni.logs;CREATE TABLE `logs` (
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
--
-- Table structure for table `quotations`
--

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

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `title`, `subtitle`, `body`, `createdAt`, `isActive`, `updatedBy`, `reference`, `dueDate`, `location`, `status`) VALUES
(25, 'erge', 'rger', '<p>ergergerge</p>', '2024-04-16', '0', 'Rakheoana', 'gerger', '2024-04-17', '', '1'),
(26, 'eerhgbtr', 'ergfer', '<p>ergergergerge</p>', '2024-04-15', '0', 'Rakheoana', 'gergerg', '2024-04-18', '', '1'),
(27, 'tghd', 'fgdf', '<p>dfgdfgdfgd</p>', '2024-04-15', '0', 'Rakheoana', 'gdfgdfg', '2024-04-20', '', '1'),
(28, 'tttt', 'ttt', '<p>dsfgbsdfgwsd</p>', '2024-04-15', '0', 'Rakheoana', 'ttt', '2024-04-18', './files/quotations/php_cookbook.pdf', '1'),
(29, 'fdgs', 'sdfg', '<p>dfsgsdfgds</p>', '2024-04-15', '0', 'Rakheoana', 'sdfg', '2024-04-18', '/files/quotations/php_cookbook.pdf', '1'),
(30, 'Hire of Grader in Ward 1 and 2 for 20 days', '', '<p>Request to Hire Grader in Ward 1 and 2 for 20 days.</p>', '2024-04-17', '1', 'David', 'MN128/2024', '2024-04-25', '/files/quotations/417142320-0001.pdf', '1'),
(31, 'HIRE OF GRADER IN WARD 18 FOR 20 DAYS', '', '<p>Request to Hirer a Grader in Ward 18 for 20 Days.</p>', '2024-04-17', '1', 'David', 'MN129/2024', '2024-04-25', '/files/quotations/417141833-0001.pdf', '1'),
(32, 'HIRE OF TLB IN CLUSTER 1 FOR 25 DAYS', '', '<p>Request to Hire TLB in Cluster 1 for 25 days.</p>', '2024-04-15', '1', 'David', 'MN121/2024', '2024-04-23', '/files/quotations/417140757-0001.pdf', '1'),
(33, 'Verge Maintenance in Scottburgh and Scottburgh South for 2 Months.', '', '<p>Request for Verge Maintenance in Scottburgh and Scottburgh South for 2 Months.</p>', '2024-04-15', '1', 'David', 'MN124/2024', '2024-04-23', '/files/quotations/416135534-0001.pdf', '1'),
(34, 'SUPPLY AND DELIVERY OF BRUSH CUTRTERS AND POLE PRUNERS.', '', '<p>Request to Supply and Delivery of Brush Cutters and Pole Pruners for Parks and Gardens.</p>', '2024-04-15', '1', 'David', 'MN123/2024', '2024-04-23', '/files/quotations/416134630-0001.pdf', '1'),
(35, 'SUPPLY AND DELIVERY OF TOILET ROLLS', '', '<p>Request to Supply and Delivery of Toilet Rolls.</p>', '2024-04-15', '1', 'David', 'MN125/2024', '2024-04-23', '/files/quotations/416112238-0001.pdf', '1'),
(36, 'SUPPLY AND FIT 12.00 X R20 NEW TYRES.', '', '<p>Request to Supply and Fit 12.00 R20 New tyres.</p>', '2024-04-15', '1', 'David', 'MN122/2024', '2024-04-23', '/files/quotations/416104758-0001.pdf', '1'),
(37, 'Carry out Repairs to Traffic Robots', '', '<p>Request to Carry out Repairs to Traffic Robots.</p>', '2024-04-15', '1', 'David', 'MN126/2024', '2024-04-23', '/files/quotations/416103231-0001.pdf', '1');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `servicetype` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `createdAt` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `email`, `name`, `telephone`, `servicetype`, `comments`, `createdAt`, `status`) VALUES
(2, '', '', '', '', 'i dont loke the color of the footer', '2024-04-16 19:52:14', '1'),
(3, 'andyr@telkomsa.net', 'Andy Reid', '0727854226', 'APPLICATION FORM', 'PENSIONER RATES REDUCTION', '2024-04-17 11:51:21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `permissions` varchar(552) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `status`) VALUES
(1, 'Admin', '{\"eventManagement\":\"on\",\"contentManagement\":\"on\",\"serviceManagement\":\"on\",\"officialProfiles\":\"on\",\"documentLibrary\":\"on\",\"humanResources\":\"on\",\"communityEngagement\":\"on\",\"economicDevelopment\":\"on\",\"systemSettings\":\"on\",\"support\":\"on\"}', NULL),
(2, 'Communication Agent', '{\"eventManagement\":\"on\",\"contentManagement\":\"on\",\"officialProfiles\":\"on\",\"documentLibrary\":\"on\",\"communityEngagement\":\"on\",\"economicDevelopment\":\"on\"}', NULL),
(3, 'SCM Agent', '{\"economicDevelopment\":\"on\"}', NULL),
(4, 'Service Magmnt Agent', '{\"serviceManagement\":\"on\"}', NULL),
(5, 'HR Agent', '{\"humanResources\":\"on\"}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seniors`
--

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

--
-- Dumping data for table `seniors`
--

INSERT INTO `seniors` (`id`, `name`, `middlename`, `surname`, `telephone`, `email`, `title`, `category`, `img_file`, `location`, `ward`, `affiliation`, `isActive`, `updatedAt`, `initials`) VALUES
(21, 'T', 'C', 'Ndlela', '', 'Thabisilen@umdoni.gov.za', 'Municipal Manager', 'SM', 'umdoni-staff-135-Edit.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/umdoni-staff-135-Edit.jpg', '', NULL, 1, NULL, 'Mrs'),
(22, 'V', 'T', 'Khanyile', '', 'revork@umdoni.gov.za', 'GM: Community Services', 'SM', 'Umdoni-Staff-14.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-14.jpg', '', NULL, 1, NULL, 'Mr'),
(23, 'M', '', 'Chandulal', '', 'Mahendrac@umdoni.gov.za', 'GM: Treasury', 'SM', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-17.jpg', '', NULL, 1, '2024-04-17 18:12:35', 'Mr'),
(24, 'S', 'E', 'Nyawo', '', 'sabelon@umdoni.gov.za', 'GM: Corporate Services', 'SM', 'Umdoni-Staff-15.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-15.jpg', '', NULL, 1, NULL, 'Mr'),
(25, 'M', 'B', 'Shangase', '', 'Mthokozisis@umdoni.gov.za', 'GM: Technical Services', 'SM', 'umdoni-staff-147.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/umdoni-staff-147.jpg', '', NULL, 1, NULL, 'Mr'),
(26, 'B', '', 'Ntsebeshe ', '', 'Bonganin@umdoni.gov.za', 'Manager: Disaster Management', 'CSD', 'umdoni-staff-118.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/umdoni-staff-118.jpg', '', NULL, 1, NULL, 'Mr'),
(27, 'N', 'F', 'Dlamini', '', 'Nomfundod@umdoni.go.va', 'Beach Manager', 'CSD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-27.jpg', '', NULL, 1, '2024-03-20 10:02:45', 'Ms'),
(28, 'N', 'S', 'Cele', '', 'Sbusisoc@umdoni.govza', 'Chief Protection Services', 'CSD', 'Umdoni-Staff-6.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-6.jpg', '', NULL, 1, NULL, 'Mr'),
(29, 'N', '', 'Mngomezulu', '', 'Nonhlanhlam@umdoni.gov.za', 'Chief Librarian', 'CSD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-22.jpg', '', NULL, 1, '2024-03-20 10:03:11', 'Ms'),
(30, 'S', 'A', 'Bhengu', '', 'Andreasb@umdoni.gov.za', 'Manager: Environmental Services', 'PDD', 'Umdoni-Staff-25.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-25.jpg', '', NULL, 1, NULL, 'Mr'),
(31, 'S', '', 'Hlongwane', '', 'Siyah@umdoni.gov.za', 'Manager: LED', 'PDD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/umdoni-staff-164.jpg', '', NULL, 1, '2024-03-20 10:28:44', 'Mr'),
(32, 'R', '', 'Ntombela', '', 'Rayn@umdoni.gov.za', 'Manager: Planning', 'PDD', 'umdoni-staff-146.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/umdoni-staff-146.jpg', '', NULL, 1, NULL, 'Mr'),
(33, 'M ', '', 'Khanyile', '', 'Mondlik@umdoni.gov.za', 'Manager: Building Control	', 'PDD', 'Umdoni-Staff-21.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-21.jpg', '', NULL, 1, NULL, 'Mr'),
(34, 'S', '', 'Zamisa', '', 'Sboz@umdoni.gov.za', 'Manager Housing', 'TSD', 'umdoni-staff-142.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/umdoni-staff-142.jpg', '', NULL, 1, NULL, 'Mr'),
(35, 'K', '', 'Subben', '', 'Kavershens@umdoni.gov.za', 'Manager: Solid Waste', 'TSD', 'Umdoni-Staff-33.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-33.jpg', '', NULL, 1, NULL, 'Mr'),
(36, 'T', '', 'Cele', '', 'Thulac@umdoni.gov.za', 'Manager: Fleet', 'COSD', 'Umdoni-Staff-34.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-34.jpg', '', NULL, 1, NULL, 'Mr'),
(37, 'Z', '', 'Cele', '', 'Zethembec@umdoni.gov.za', 'Manager: ICT', 'COSD', 'Umdoni-Staff-45.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-45.jpg', '', NULL, 1, NULL, 'Mr'),
(38, 'L', '', 'Harisingh', '', 'LindaH@umdoni.gov.za', 'Manager: Auxiliary & Secretariat', 'COSD', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-31.jpg', '', NULL, 1, '2024-03-20 10:03:43', 'Ms'),
(39, 'B', '', 'Khanyile', '', 'Bonganik@umdoni.gov.za', 'Manager: Public Participation', 'OTMM', 'Umdoni-Staff-24.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-24.jpg', '', NULL, 1, NULL, 'Mr'),
(40, 'S', '', 'Chiya', '', 'Siyasangac@umdoni.go.za', 'Manager: IDP & PMS', 'OTMM', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-26.jpg', '', NULL, 1, '2024-03-20 10:04:30', 'Ms'),
(41, 'S', '', 'Reddy', '', 'Sayarikar@umdoni.gov.za', 'Manager: Legal and Estates', 'OTMM', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-28.jpg', '', NULL, 1, '2024-03-20 10:04:49', 'Ms'),
(42, 'T', 'D', 'Ndlovu', '', 'Thulan@umdoni.gov.za', 'Manager: Internal Audit	', 'OTMM', 'Umdoni-Staff-38.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-38.jpg', '', NULL, 1, NULL, 'Mr'),
(43, 'S', '', 'Cele', '', 'Sphelelec@umdoni.gov.za', 'Manager: Communications & CCS', 'OTMM', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-44.jpg', '', NULL, 1, '2024-03-20 10:05:09', 'Ms'),
(44, 'Z', '', 'Koli', '', 'Zolik@umdoni.gov.za', 'Manager: Budget	', 'FM', NULL, 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-19.jpg', '', NULL, 1, '2024-03-20 10:05:36', 'Ms'),
(45, 'D', '', 'Nyathi', '', 'Davidn@umdoni.gov.za', 'Manager: SCM', 'FM', 'Umdoni-Staff-35.jpg', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/Umdoni-Staff-35.jpg', '', NULL, 1, NULL, 'Mr'),
(46, 'S', '', 'Xulu', '', 'Sandilex@umdoni.gov.za', 'Manager: PMU', 'TSD', 'umdoni-mun-13.JPG', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/umdoni-mun-13.JPG', '', NULL, 1, NULL, 'Mr');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
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

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `title`, `subtitle`, `body`, `createdAt`, `isActive`, `updatedBy`, `reference`, `dueDate`, `location`, `status`) VALUES
(22, 'OPEN REGISTER-BID | APPOINTEMENT OF PANEL-PPE', 'OPEN REGISTER-BID 06-2024 | APPOINTEMENT OF PANEL-PPE 02-1102023', 'Supply and delivery of stationery for the period of 36 months', '2024-03-25 10:04:59', '0', 'Rakheoana', 'BID 05/2024 - MN:253/2023', '2024-06-01', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/OPEN%20REGISTER-BID%2006-2024%20APPOINTMENT%20OF%20PANEL-PPE%2002-11-2023%20%281%29.pdf', '1'),
(23, 'OPEN REGISTER-BID | SUPPLY AND DELIVERY OF STATIONERY', 'OPEN REGISTER-BID 05-2024 SUPPLY AND DELIVERY OF STATIONERY 02-11-2023', 'Supply and delivery of stationery for the period of 36 months', '2024-03-25 10:18:38', '0', 'Rakheoana', 'BID 05/2024 - MN:2023', '2024-05-01', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/OPEN%20REGISTER-BID%2005-2024%20SUPPLY%20AND%20DELIVERY%20OF%20STATIONERY%2002-11-2023.pdf', '1'),
(24, 'OPEN REGISTER-BID | SUPPLY AND DELIVERY OF SKIPS', 'OPEN REGISTER-BID 04-2024 SUPPLY AND DELIVERY OF SKIPS 02-11-2023', 'Supply and delivery of a minimum of 20 x 6m3 stackable industrial skip containers for Umdoni Municipality.      ', '2024-03-25 10:23:07', '0', 'Rakheoana', 'BID 04/2024 - MN:252/2023', '2024-04-01', 'https://umdoni-bucket-of-documents.s3.eu-central-1.amazonaws.com/OPEN%20REGISTER-BID%2004-2024%20SUPPLY%20AND%20DELIVERY%20OF%20SKIPS%2002-11-2023.pdf', '1'),
(25, 'Test Tender', 'Test Tender Subtitle', '<p>Testing the tender download.</p>', '2024-04-03', '0', 'Rakheoana', 'UMD789456', '2024-04-30', './files/tenders/Developer - Cards Task.pdf', '1'),
(26, 'Test Tender', 'Test Tender Subtitle', '<p>Testing the tender download.</p>', '2024-04-03', '0', 'Rakheoana', 'UMD789456', '2024-04-30', './files/tenders/Developer - Cards Task.pdf', '1'),
(27, 'hdrth', 'rthrt', '<p>etrhrethret</p>', '2024-04-15', '0', 'Rakheoana', 'rthrthr', '2024-04-20', './files/tendersphp_cookbook.pdf', '1'),
(28, 'hdrth', 'rthrt', '<p>etrhrethret</p>', '2024-04-15', '0', 'Rakheoana', 'rthrthr', '2024-04-20', './files/tendersphp_cookbook.pdf', '1'),
(29, 'ryj', 'rtyj', '<p>tyjrtyjrtyjrt</p>', '2024-04-15', '0', 'Rakheoana', 'rtyj', '2024-04-15', '/files/tendersphp_cookbook.pdf', '1'),
(30, 'erge', 'gerge', '<p>ergergerg</p>', '2024-04-16', '0', 'Rakheoana', 'rgeg', '2024-04-17', '/files/tendersphp_cookbook.pdf', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `createdAt` varchar(42) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `locked` int(11) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `role_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `status`, `verified`, `createdAt`, `access_token`, `confirmation_token`, `locked`, `surname`, `role_id`) VALUES
(41, 'Rakheoana', 'elisha@isutech.co.za', 'dd884254e4acddf32ceab8e0bc2d6fa9', 0, 1, '2024-03-18 15:02:55', NULL, NULL, 0, 'Lefela', '1'),
(43, 'Nhlanhla', 'nhlanhla@isutech.co.za', 'nhla1060M!*', 0, 1, '2024-03-18 20:58:33', NULL, NULL, 0, 'Mnyandu', '1'),
(44, 'Nhlanhla', 'nhlanhla@me.com', 'nhla1060M!*', 0, 1, '2024-03-22 07:32:39', NULL, NULL, 0, 'Mnyandu', '2'),
(45, 'Lindokuhle ', 'lindokuhlemyezaa@gmail.com', 'Lubanz1@', 0, 1, '2024-03-25 16:49:04', NULL, NULL, 0, 'Cele', '2'),
(46, 'Rakheoana', 'rakgew+2@gmail.com', 'Ytmxlz2&', 0, NULL, '2024-04-17 16:54:34', NULL, NULL, 1, 'Lefela', '2'),
(47, 'David', 'davidn@umdoni.gov.za', 'Password@25', 0, 1, '2024-04-17 17:16:59', NULL, NULL, 0, 'Nyathi', '2');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

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


--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `councillors`
--
ALTER TABLE `councillors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seniors`
--
ALTER TABLE `seniors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `councillors`
--
ALTER TABLE `councillors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seniors`
--
ALTER TABLE `seniors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;