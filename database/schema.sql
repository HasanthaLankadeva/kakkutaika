
-- USERS
CREATE TABLE `admin_accounts` (
  `id` int(10) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--MEDIA
CREATE TABLE `attachments` (
  `id` int(10) NOT NULL,
  `lanID` varchar(10) DEFAULT NULL,
  `module` varchar(200) NOT NULL,
  `itemID` int(10) NOT NULL,
  `attachment` varchar(5000) NOT NULL,
  `attTitle` varchar(1000) DEFAULT NULL,
  `attDes` text DEFAULT NULL,
  `alt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--CATEGORY
CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `rowOrder` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `module` varchar(100) DEFAULT NULL,
  `categoryTitle` varchar(100) DEFAULT NULL,
  `categoryKey` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- MODULE
CREATE TABLE `module_NAME` (
  `id` int(10) NOT NULL,
  `rowOrder` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `itemID` int(10) NOT NULL,
  `lanID` varchar(10) NOT NULL,
  `itemTitle` varchar(500) DEFAULT NULL,
  `itemImage` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `contentOne` text DEFAULT NULL,
  `contentTwo` text DEFAULT NULL,
  `lineOne` varchar(1000) DEFAULT NULL,
  `lineTwo` varchar(1000) DEFAULT NULL,
  `lineThree` varchar(1000) DEFAULT NULL,
  `lineFour` varchar(1000) DEFAULT NULL,
  `lineFive` varchar(1000) DEFAULT NULL,
  `lineSix` varchar(1000) DEFAULT NULL,
  `lineSeven` varchar(1000) DEFAULT NULL,
  `lineEight` varchar(1000) DEFAULT NULL,
  `lineNine` varchar(1000) DEFAULT NULL,
  `lineTen` varchar(1000) DEFAULT NULL,
  `lineEleven` varchar(500) DEFAULT NULL,
  `lineTwelve` varchar(500) DEFAULT NULL,
  `lineThirteen` varchar(500) DEFAULT NULL,
  `lineFourteen` varchar(500) DEFAULT NULL,
  `lineFifteen` varchar(500) DEFAULT NULL,
  `itemKey` varchar(500) DEFAULT NULL,
  `itemCategory` varchar(500) DEFAULT NULL,
  `mapping` varchar(100) NOT NULL,
  `attachments` mediumtext DEFAULT NULL,
  `startDate` varchar(20) NOT NULL,
  `endDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;