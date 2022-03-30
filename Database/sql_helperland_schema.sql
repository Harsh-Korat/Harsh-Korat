-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 12:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helperland`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `Id` int(11) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `StateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`Id`, `CityName`, `StateId`) VALUES
(1, 'rajkot', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ContactUsId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `SubjectType` varchar(100) NOT NULL,
  `Subject` varchar(500) DEFAULT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Message` longtext NOT NULL,
  `UploadFileName` varchar(100) DEFAULT NULL,
  `CreatedOn` datetime(3) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Priority` int(11) DEFAULT NULL,
  `AssignedToUser` int(11) DEFAULT NULL,
  `IsDeleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactusattachment`
--

CREATE TABLE `contactusattachment` (
  `ContactUsAttachmentId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `FileName` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favoriteandblocked`
--

CREATE TABLE `favoriteandblocked` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `TargetUserId` int(11) NOT NULL,
  `IsFavorite` tinyint(4) NOT NULL,
  `IsBlocked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favoriteandblocked`
--

INSERT INTO `favoriteandblocked` (`Id`, `UserId`, `TargetUserId`, `IsFavorite`, `IsBlocked`) VALUES
(71, 26, 25, 0, 0),
(72, 30, 31, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingId` int(11) NOT NULL,
  `ServiceRequestId` int(11) NOT NULL,
  `RatingFrom` int(11) NOT NULL,
  `RatingTo` int(11) NOT NULL,
  `Ratings` decimal(2,1) NOT NULL,
  `Comments` varchar(2000) DEFAULT NULL,
  `RatingDate` datetime(3) NOT NULL,
  `IsApproved` tinyint(4) DEFAULT 1,
  `VisibleOnHomeScreen` tinyint(4) NOT NULL DEFAULT 0,
  `OnTimeArrival` decimal(2,1) NOT NULL DEFAULT 0.0,
  `Friendly` decimal(2,1) NOT NULL DEFAULT 0.0,
  `QualityOfService` decimal(2,1) NOT NULL DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RatingId`, `ServiceRequestId`, `RatingFrom`, `RatingTo`, `Ratings`, `Comments`, `RatingDate`, `IsApproved`, `VisibleOnHomeScreen`, `OnTimeArrival`, `Friendly`, `QualityOfService`) VALUES
(62, 117, 25, 26, '5.0', 'Very Good', '2022-03-29 11:40:24.000', 2, 0, '5.0', '5.0', '5.0'),
(63, 118, 31, 30, '5.0', '', '2022-03-30 05:42:27.000', 2, 0, '5.0', '5.0', '5.0');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE `servicerequest` (
  `ServiceRequestId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ServiceId` int(11) NOT NULL,
  `ServiceStartDate` date NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `ServiceFrequency` tinyint(3) UNSIGNED DEFAULT NULL,
  `ServiceHourlyRate` decimal(8,2) DEFAULT NULL,
  `ServiceHours` double NOT NULL,
  `ExtraHours` double DEFAULT NULL,
  `SubTotal` decimal(8,2) NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL,
  `TotalCost` decimal(8,2) NOT NULL,
  `Comments` varchar(500) DEFAULT NULL,
  `PaymentTransactionRefNo` varchar(50) DEFAULT NULL,
  `PaymentDue` tinyint(4) NOT NULL DEFAULT 0,
  `JobStatus` tinyint(3) UNSIGNED DEFAULT NULL,
  `ServiceProviderId` int(11) DEFAULT NULL,
  `SPAcceptedDate` datetime(3) DEFAULT NULL,
  `HasPets` tinyint(4) NOT NULL DEFAULT 0,
  `Status` int(11) DEFAULT NULL,
  `CreatedDate` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `ModifiedDate` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `ModifiedBy` int(11) DEFAULT NULL,
  `RefundedAmount` decimal(8,2) DEFAULT NULL,
  `Distance` decimal(18,2) NOT NULL DEFAULT 0.00,
  `HasIssue` tinyint(4) DEFAULT NULL,
  `PaymentDone` tinyint(4) DEFAULT NULL,
  `RecordVersion` char(36) DEFAULT NULL,
  `TotalHours` float NOT NULL,
  `TotalBed` int(11) NOT NULL,
  `TotalBath` int(11) NOT NULL,
  `EffectiveCost` float NOT NULL,
  `ExtraServices` varchar(500) NOT NULL,
  `Tim` time NOT NULL,
  `AddressId` int(11) NOT NULL,
  `Provider_Name` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicerequest`
--

INSERT INTO `servicerequest` (`ServiceRequestId`, `UserId`, `ServiceId`, `ServiceStartDate`, `ZipCode`, `ServiceFrequency`, `ServiceHourlyRate`, `ServiceHours`, `ExtraHours`, `SubTotal`, `Discount`, `TotalCost`, `Comments`, `PaymentTransactionRefNo`, `PaymentDue`, `JobStatus`, `ServiceProviderId`, `SPAcceptedDate`, `HasPets`, `Status`, `CreatedDate`, `ModifiedDate`, `ModifiedBy`, `RefundedAmount`, `Distance`, `HasIssue`, `PaymentDone`, `RecordVersion`, `TotalHours`, `TotalBed`, `TotalBath`, `EffectiveCost`, `ExtraServices`, `Tim`, `AddressId`, `Provider_Name`) VALUES
(65, 25, 0, '2022-03-25', '101010', 8, '0.00', 3, 1, '72.00', '0.00', '72.00', '', NULL, 0, NULL, NULL, NULL, 0, 2, '0000-00-00 00:00:00.000', '2022-03-19 15:17:20.864', NULL, '72.00', '0.00', NULL, 1, '1', 4, 1, 1, 57.6, ' Inside oven , Laundry wash & dry ,', '15:30:00', 53, 26),
(106, 25, 0, '2022-03-29', '101010', 8, '0.00', 3, 1, '72.00', '0.00', '72.00', '', NULL, 0, NULL, NULL, NULL, 0, 2, '0000-00-00 00:00:00.000', '2022-03-29 08:17:19.352', NULL, NULL, '0.00', NULL, 1, '1', 4, 1, 1, 57.6, ' Inside oven , Laundry wash & dry ,', '07:00:00', 53, 26),
(108, 25, 0, '2022-03-29', '101010', 8, '0.00', 3, 0.5, '63.00', '0.00', '63.00', '', NULL, 0, NULL, NULL, NULL, 0, 2, '0000-00-00 00:00:00.000', '2022-03-29 08:19:39.288', NULL, NULL, '0.00', NULL, 1, '1', 3.5, 1, 1, 50.4, ' Inside cabinets ,', '04:49:39', 53, 26),
(109, 25, 0, '2022-03-29', '101010', 8, '0.00', 3, 1, '72.00', '0.00', '72.00', '', NULL, 0, NULL, NULL, NULL, 0, 2, '0000-00-00 00:00:00.000', '2022-03-29 10:24:24.551', NULL, NULL, '0.00', NULL, 1, '1', 4, 1, 1, 57.6, ' Inside oven , Laundry wash & dry ,', '06:54:24', 53, 26),
(111, 25, 0, '2022-03-29', '101010', 8, '0.00', 3, 2, '90.00', '0.00', '90.00', '', NULL, 0, NULL, NULL, NULL, 0, 4, '0000-00-00 00:00:00.000', '2022-03-29 11:21:41.443', NULL, '45.00', '0.00', NULL, 1, '1', 5, 1, 1, 72, ' Inside fridge , Inside oven , Laundry wash & dry , Interior windows', '07:51:41', 53, 26),
(113, 25, 0, '2022-03-29', '101010', 8, '0.00', 3, 1, '72.00', '0.00', '72.00', '', NULL, 0, NULL, NULL, NULL, 0, 4, '0000-00-00 00:00:00.000', '2022-03-29 13:11:14.178', NULL, '72.00', '0.00', NULL, 1, '1', 4, 1, 1, 57.6, ' Inside fridge , Inside oven ,', '09:41:14', 53, 26),
(114, 25, 0, '2022-03-29', '101010', 8, '0.00', 3, 1, '72.00', '0.00', '72.00', '', NULL, 0, NULL, NULL, NULL, 0, 2, '0000-00-00 00:00:00.000', '2022-03-29 13:48:41.497', NULL, NULL, '0.00', NULL, 1, '1', 4, 1, 1, 57.6, ' Inside oven , Laundry wash & dry ,', '10:18:41', 53, 26),
(115, 25, 0, '2022-03-29', '101010', 8, '0.00', 3, 1, '72.00', '0.00', '72.00', '', NULL, 0, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00.000', '2022-03-29 14:41:24.623', NULL, NULL, '0.00', NULL, 1, '1', 4, 1, 1, 57.6, ' Inside oven , Laundry wash & dry ,', '11:11:24', 53, 26),
(116, 25, 0, '2022-03-29', '101010', 8, '0.00', 3, 0.5, '63.00', '0.00', '63.00', '', NULL, 0, NULL, NULL, NULL, 0, 2, '0000-00-00 00:00:00.000', '2022-03-29 14:48:29.840', NULL, NULL, '0.00', NULL, 1, '1', 3.5, 1, 1, 50.4, ' Laundry wash & dry ,', '11:18:29', 53, 26),
(117, 25, 0, '2022-03-29', '101010', 8, '0.00', 3, 1, '72.00', '0.00', '72.00', '', NULL, 0, NULL, NULL, NULL, 0, 2, '0000-00-00 00:00:00.000', '2022-03-29 15:09:14.073', NULL, NULL, '0.00', NULL, 1, '1', 4, 1, 1, 57.6, ' Inside fridge , Inside oven ,', '11:39:14', 53, 26),
(118, 31, 0, '2022-03-30', '101010', 8, '0.00', 3, 1, '72.00', '0.00', '72.00', '', NULL, 0, NULL, NULL, NULL, 0, 4, '0000-00-00 00:00:00.000', '2022-03-30 09:10:32.823', NULL, '72.00', '0.00', NULL, 1, '1', 4, 1, 1, 57.6, ' Inside fridge , Inside oven ,', '05:40:32', 58, 30);

-- --------------------------------------------------------

--
-- Table structure for table `servicerequestaddress`
--

CREATE TABLE `servicerequestaddress` (
  `Id` int(11) NOT NULL,
  `ServiceRequestId` int(11) DEFAULT NULL,
  `AddressLine1` varchar(200) DEFAULT NULL,
  `AddressLine2` varchar(200) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(20) DEFAULT NULL,
  `Mobile` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Type` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servicerequestextra`
--

CREATE TABLE `servicerequestextra` (
  `ServiceRequestExtraId` int(11) NOT NULL,
  `ServiceRequestId` int(11) NOT NULL,
  `ServiceExtraId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servicesetting`
--

CREATE TABLE `servicesetting` (
  `Id` int(11) NOT NULL,
  `ActionType` int(11) NOT NULL,
  `Interval` int(11) NOT NULL,
  `ScheduleTime` time(6) NOT NULL,
  `LastPoll` datetime(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `Id` int(11) NOT NULL,
  `StateName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`Id`, `StateName`) VALUES
(1, 'gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Mobile` varchar(20) NOT NULL,
  `UserTypeId` int(11) NOT NULL,
  `RoleId` int(11) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `WebSite` varchar(1000) DEFAULT NULL,
  `UserProfilePicture` varchar(200) DEFAULT NULL,
  `IsRegisteredUser` tinyint(4) NOT NULL DEFAULT 0,
  `PaymentGatewayUserRef` varchar(200) DEFAULT NULL,
  `ZipCode` varchar(20) DEFAULT NULL,
  `WorksWithPets` tinyint(4) NOT NULL DEFAULT 0,
  `LanguageId` int(11) DEFAULT NULL,
  `NationalityId` int(11) DEFAULT NULL,
  `ResetKey` varchar(200) DEFAULT NULL,
  `CreatedDate` datetime(3) NOT NULL,
  `ModifiedDate` datetime(3) NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `IsApproved` tinyint(4) NOT NULL DEFAULT 0,
  `IsActive` tinyint(4) NOT NULL DEFAULT 0,
  `IsDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `Status` int(11) DEFAULT NULL,
  `IsOnline` tinyint(4) NOT NULL DEFAULT 0,
  `BankTokenId` varchar(100) DEFAULT NULL,
  `TaxNo` varchar(50) DEFAULT NULL,
  `Birth` int(50) NOT NULL,
  `Month` int(120) NOT NULL,
  `Year` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `FirstName`, `LastName`, `Email`, `Password`, `Mobile`, `UserTypeId`, `RoleId`, `Gender`, `DateOfBirth`, `WebSite`, `UserProfilePicture`, `IsRegisteredUser`, `PaymentGatewayUserRef`, `ZipCode`, `WorksWithPets`, `LanguageId`, `NationalityId`, `ResetKey`, `CreatedDate`, `ModifiedDate`, `ModifiedBy`, `IsApproved`, `IsActive`, `IsDeleted`, `Status`, `IsOnline`, `BankTokenId`, `TaxNo`, `Birth`, `Month`, `Year`) VALUES
(14, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$4x5/iWwCzQkF7lKvofUMFeagXU8rlrjr7wQUFrsQwEx02aIuJxmVe', '9999999999', 2, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 'a6a6c7f43bd82f673cee189d924cfe', '2022-03-19 00:00:00.000', '0000-00-00 00:00:00.000', 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0),
(25, 'Vinay', 'Korat', 'harshbhai.korat.1234@gmail.com', '$2y$10$O8Q2V0a7Saw.aL4tz9oqoeLCZzWkIodiL3cg2YJ6pzr1PDN2dw17e', '9874561236', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 2, NULL, 'fcdcc3d42c402eb47d247cb0ad9446', '2022-03-20 00:00:00.000', '2022-03-29 00:00:00.000', 0, 0, 0, 0, 0, 0, NULL, NULL, 1, 2, 7),
(26, 'Provider', 'service', 'harshkorat1290@gmail.com', '$2y$10$eOHNjjzY6046n66LgUWELuslg8w6u0j8V90CY1ga3EsAQK7YQsX.W', '8565623658', 1, 0, 1, '2018-03-05', NULL, '../assets/image/avatar-male.png', 0, NULL, '101010', 0, NULL, 176685, 'e8760eae127cd2cbd62847fa021eb7', '2022-03-29 00:00:00.000', '2022-03-29 15:35:03.000', 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0),
(27, 'Vinay', 'Varma', 'vinay@gmail.com', '$2y$10$x5/Rx8I5Pq6vUMHUMGQxrerCOXhS2qKff6i38DkdydW13uHgmbYT6', '7777777777', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '5a46c69a81ecd57182d32eb032a4b9', '2022-03-29 00:00:00.000', '0000-00-00 00:00:00.000', 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0),
(28, 'Ajay', 'Vora', 'ajay@gmail.com', '$2y$10$Ij4FAs54Zp.P8I8m7cEEYOhHa1pkbidmws.i/60m9upzOnJWvi0nW', '7894561234', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 'b67be27b57d6b13c46e73396c9d1c5', '2022-03-29 00:00:00.000', '0000-00-00 00:00:00.000', 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0),
(29, 'raju', 'Varma', 'raju@gmail.com', '$2y$10$OvdMRS3rFlT9QVmzbRzwV.BBnsy3Pq1Xb8RsXYtL9QKi1FmICTvPW', '4561237899', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '1429cf1796dfafc55a51dda19fe255', '2022-03-29 11:04:37.000', '0000-00-00 00:00:00.000', 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0),
(30, 'Vimal', 'Barota', 'xyz@gmmail.com', '$2y$10$SqevAFYNUlBednyrudaI4.7iTXpMZaIDIKvdSzXlyLMVRA8bHWel2', '7895621456', 1, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2539bb7e3d2857390bb48d6327f05a', '2022-03-30 05:36:57.000', '0000-00-00 00:00:00.000', 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0),
(31, 'Rahul', 'Toy', 'rahul@gmail.com', '$2y$10$J8z14zww4qMRX1FMPuSBp.47y.c7gP.iul1hJYerZDsXjZUCQidPm', '8546756212', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '80b6fdfd09f4df85aa699cf9aac0bc', '2022-03-30 05:39:33.000', '0000-00-00 00:00:00.000', 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `AddressId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `AddressLine1` varchar(200) NOT NULL,
  `AddressLine2` varchar(200) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(20) NOT NULL,
  `IsDefault` tinyint(4) NOT NULL DEFAULT 0,
  `IsDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `Mobile` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`AddressId`, `UserId`, `AddressLine1`, `AddressLine2`, `City`, `State`, `PostalCode`, `IsDefault`, `IsDeleted`, `Mobile`, `Email`, `Type`) VALUES
(53, 25, 'Jamnager', '78', 'Bonn', 'gujarat', '101010', 0, 0, '7895632541', 'harshbhai.korat.1234@gmail.com', 0),
(54, 28, 'Delhi', '789', 'Bonn', 'gujarat', '101010', 0, 0, '1111111111', 'ajay@gmail.com', 0),
(55, 27, 'abcd', '11', 'Bonn', 'gujarat', '101010', 0, 0, '1111111111', 'vinay@gmail.com', 0),
(56, 29, 'abcd', '11', 'Bonn', 'gujarat', '101010', 0, 0, '5555555555', 'raju@gmail.com', 0),
(57, 26, 'aa', '122', '', 'gujarat', '101010', 0, 0, '8565623658', 'harshkorat1290@gmail.com', 1),
(58, 31, 'Rajkot', '105', 'Bonn', 'gujarat', '101010', 0, 0, '8974562314', 'rahul@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `zipcode`
--

CREATE TABLE `zipcode` (
  `Id` int(11) NOT NULL,
  `ZipcodeValue` varchar(50) NOT NULL,
  `CityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zipcode`
--

INSERT INTO `zipcode` (`Id`, `ZipcodeValue`, `CityId`) VALUES
(1, '101010', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `city_ibfk_1` (`StateId`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ContactUsId`);

--
-- Indexes for table `contactusattachment`
--
ALTER TABLE `contactusattachment`
  ADD PRIMARY KEY (`ContactUsAttachmentId`);

--
-- Indexes for table `favoriteandblocked`
--
ALTER TABLE `favoriteandblocked`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `favoriteandblocked_ibfk_1` (`UserId`),
  ADD KEY `favoriteandblocked_ibfk_2` (`TargetUserId`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingId`),
  ADD KEY `rating_ibfk_1` (`ServiceRequestId`),
  ADD KEY `rating_ibfk_2` (`RatingFrom`),
  ADD KEY `rating_ibfk_3` (`RatingTo`);

--
-- Indexes for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD PRIMARY KEY (`ServiceRequestId`),
  ADD KEY `servicerequest_ibfk_1` (`UserId`),
  ADD KEY `servicerequest_ibfk_2` (`ServiceProviderId`),
  ADD KEY `AddressId` (`AddressId`);

--
-- Indexes for table `servicerequestaddress`
--
ALTER TABLE `servicerequestaddress`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `servicerequestaddress_ibfk_1` (`ServiceRequestId`);

--
-- Indexes for table `servicerequestextra`
--
ALTER TABLE `servicerequestextra`
  ADD PRIMARY KEY (`ServiceRequestExtraId`),
  ADD KEY `servicerequestextra_ibfk_1` (`ServiceRequestId`);

--
-- Indexes for table `servicesetting`
--
ALTER TABLE `servicesetting`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`AddressId`),
  ADD KEY `useraddress_ibfk_1` (`UserId`);

--
-- Indexes for table `zipcode`
--
ALTER TABLE `zipcode`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `zipcode_ibfk_1` (`CityId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ContactUsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactusattachment`
--
ALTER TABLE `contactusattachment`
  MODIFY `ContactUsAttachmentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favoriteandblocked`
--
ALTER TABLE `favoriteandblocked`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `servicerequest`
--
ALTER TABLE `servicerequest`
  MODIFY `ServiceRequestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `servicerequestaddress`
--
ALTER TABLE `servicerequestaddress`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicerequestextra`
--
ALTER TABLE `servicerequestextra`
  MODIFY `ServiceRequestExtraId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicesetting`
--
ALTER TABLE `servicesetting`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `zipcode`
--
ALTER TABLE `zipcode`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`StateId`) REFERENCES `state` (`Id`);

--
-- Constraints for table `favoriteandblocked`
--
ALTER TABLE `favoriteandblocked`
  ADD CONSTRAINT `favoriteandblocked_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `favoriteandblocked_ibfk_2` FOREIGN KEY (`TargetUserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`ServiceRequestId`) REFERENCES `servicerequest` (`ServiceRequestId`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`RatingFrom`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`RatingTo`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD CONSTRAINT `servicerequest_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `servicerequest_ibfk_2` FOREIGN KEY (`ServiceProviderId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `servicerequest_ibfk_3` FOREIGN KEY (`AddressId`) REFERENCES `useraddress` (`AddressId`);

--
-- Constraints for table `servicerequestaddress`
--
ALTER TABLE `servicerequestaddress`
  ADD CONSTRAINT `servicerequestaddress_ibfk_1` FOREIGN KEY (`ServiceRequestId`) REFERENCES `servicerequest` (`ServiceRequestId`);

--
-- Constraints for table `servicerequestextra`
--
ALTER TABLE `servicerequestextra`
  ADD CONSTRAINT `servicerequestextra_ibfk_1` FOREIGN KEY (`ServiceRequestId`) REFERENCES `servicerequest` (`ServiceRequestId`);

--
-- Constraints for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD CONSTRAINT `useraddress_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `zipcode`
--
ALTER TABLE `zipcode`
  ADD CONSTRAINT `zipcode_ibfk_1` FOREIGN KEY (`CityId`) REFERENCES `city` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
