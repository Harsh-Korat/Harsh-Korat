-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 11:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `house_no` int(10) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `telephone_no` int(10) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_refund`
--

CREATE TABLE `admin_refund` (
  `refund_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `paid_id` int(11) NOT NULL,
  `refunded_amount` float NOT NULL,
  `total_refund_amount` float NOT NULL,
  `refund_comment` varchar(255) NOT NULL,
  `call_center_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `encryption_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_service_booking`
--

CREATE TABLE `customer_service_booking` (
  `service_id` int(11) NOT NULL,
  `service_date` date NOT NULL,
  `service_start_time` time NOT NULL,
  `service_end_time` time NOT NULL,
  `service_provider` int(11) NOT NULL,
  `service_amount` float NOT NULL,
  `service_status` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `pets_at_home` varchar(100) NOT NULL,
  `service_inside_cabinets` time DEFAULT NULL,
  `service_inside_fridge` time DEFAULT NULL,
  `service_inside_oven` time DEFAULT NULL,
  `Service_Laundry_wash_dry` time DEFAULT NULL,
  `service_interior_windows` time DEFAULT NULL,
  `service_need_time` time NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `admin_reschedule_comment` varchar(255) DEFAULT NULL,
  `call_center_emp_notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_sp`
--

CREATE TABLE `favourite_sp` (
  `favourite_id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `favourite` varchar(100) DEFAULT NULL,
  `unfavourite` varchar(100) DEFAULT NULL,
  `block_sp` varchar(200) DEFAULT NULL,
  `block_customer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `service_provider_id` int(11) DEFAULT NULL,
  `notification_message` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_serviceprovider`
--

CREATE TABLE `rating_serviceprovider` (
  `rating_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL,
  `on_time_arrival` float NOT NULL,
  `friendly` float NOT NULL,
  `quality_of_service` float NOT NULL,
  `feedback_serviceProvider` varchar(255) DEFAULT NULL,
  `average_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_details`
--

CREATE TABLE `service_provider_details` (
  `service_provider_id` int(11) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `nationality` varchar(40) DEFAULT NULL,
  `gender` enum('Male','Female','Other','') DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `address_tittle` varchar(255) DEFAULT NULL,
  `house_no` varchar(30) DEFAULT NULL,
  `postal_code` int(10) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `tax_no` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `encryption_key` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `Foreign key` (`customer_id`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_refund`
--
ALTER TABLE `admin_refund`
  ADD PRIMARY KEY (`refund_id`),
  ADD KEY `Paid_id` (`paid_id`),
  ADD KEY `Admin_id` (`admin_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_service_booking`
--
ALTER TABLE `customer_service_booking`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `address` (`address`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `service_provider` (`service_provider`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `favourite_sp`
--
ALTER TABLE `favourite_sp`
  ADD PRIMARY KEY (`favourite_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `service_provider_id` (`service_provider_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `service_provider_id` (`service_provider_id`);

--
-- Indexes for table `rating_serviceprovider`
--
ALTER TABLE `rating_serviceprovider`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `service_provider_id` (`service_provider_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service_provider_details`
--
ALTER TABLE `service_provider_details`
  ADD PRIMARY KEY (`service_provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_refund`
--
ALTER TABLE `admin_refund`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_service_booking`
--
ALTER TABLE `customer_service_booking`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_sp`
--
ALTER TABLE `favourite_sp`
  MODIFY `favourite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_serviceprovider`
--
ALTER TABLE `rating_serviceprovider`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_provider_details`
--
ALTER TABLE `service_provider_details`
  MODIFY `service_provider_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`);

--
-- Constraints for table `admin_refund`
--
ALTER TABLE `admin_refund`
  ADD CONSTRAINT `admin_refund_ibfk_1` FOREIGN KEY (`paid_id`) REFERENCES `customer_service_booking` (`service_id`),
  ADD CONSTRAINT `admin_refund_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin_details` (`admin_id`);

--
-- Constraints for table `customer_service_booking`
--
ALTER TABLE `customer_service_booking`
  ADD CONSTRAINT `customer_service_booking_ibfk_1` FOREIGN KEY (`service_provider`) REFERENCES `service_provider_details` (`service_provider_id`),
  ADD CONSTRAINT `customer_service_booking_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`),
  ADD CONSTRAINT `customer_service_booking_ibfk_3` FOREIGN KEY (`address`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `customer_service_booking_ibfk_4` FOREIGN KEY (`admin_id`) REFERENCES `admin_details` (`admin_id`);

--
-- Constraints for table `favourite_sp`
--
ALTER TABLE `favourite_sp`
  ADD CONSTRAINT `favourite_sp_ibfk_1` FOREIGN KEY (`service_provider_id`) REFERENCES `service_provider_details` (`service_provider_id`),
  ADD CONSTRAINT `favourite_sp_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin_details` (`admin_id`),
  ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`service_provider_id`) REFERENCES `service_provider_details` (`service_provider_id`);

--
-- Constraints for table `rating_serviceprovider`
--
ALTER TABLE `rating_serviceprovider`
  ADD CONSTRAINT `rating_serviceprovider_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`),
  ADD CONSTRAINT `rating_serviceprovider_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `customer_service_booking` (`service_id`),
  ADD CONSTRAINT `rating_serviceprovider_ibfk_3` FOREIGN KEY (`service_provider_id`) REFERENCES `service_provider_details` (`service_provider_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
