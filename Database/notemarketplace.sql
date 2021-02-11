-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 05:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notemarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `country_code` varchar(100) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `download_id` int(11) UNSIGNED NOT NULL,
  `note_id` int(11) UNSIGNED NOT NULL,
  `seller` int(11) UNSIGNED NOT NULL,
  `downloader` int(11) UNSIGNED NOT NULL,
  `allow_download` bit(1) NOT NULL,
  `attachment_path` varchar(255) DEFAULT NULL,
  `isattachdownloaded` bit(1) NOT NULL,
  `downloaded_date` datetime DEFAULT NULL,
  `ispaid` bit(1) NOT NULL,
  `purchased_price` decimal(10,0) DEFAULT NULL,
  `note_title` varchar(100) NOT NULL,
  `note_category` varchar(100) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `note_categories`
--

CREATE TABLE `note_categories` (
  `note_categories_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `note_type`
--

CREATE TABLE `note_type` (
  `type_id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_description` varchar(100) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reference_data`
--

CREATE TABLE `reference_data` (
  `reference_id` int(10) UNSIGNED NOT NULL,
  `ref_value` varchar(100) NOT NULL,
  `data_value` varchar(100) NOT NULL,
  `ref_category` varchar(100) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes`
--

CREATE TABLE `seller_notes` (
  `seller_note_id` int(11) UNSIGNED NOT NULL,
  `seller_id` int(11) UNSIGNED NOT NULL,
  `status` int(11) UNSIGNED NOT NULL,
  `actionby` int(11) UNSIGNED DEFAULT NULL,
  `admin_remark` varchar(255) DEFAULT NULL,
  `publisheddate` datetime DEFAULT NULL,
  `note_title` varchar(100) NOT NULL,
  `category` int(11) UNSIGNED NOT NULL,
  `display_picture` varchar(255) DEFAULT NULL,
  `note_type` int(11) UNSIGNED DEFAULT NULL,
  `num_of_pages` int(11) DEFAULT NULL,
  `note_description` varchar(255) NOT NULL,
  `university_name` varchar(200) DEFAULT NULL,
  `country` int(11) UNSIGNED DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `course_code` varchar(100) DEFAULT NULL,
  `professor` varchar(100) DEFAULT NULL,
  `ispaid` int(11) UNSIGNED NOT NULL,
  `selling_price` decimal(10,0) DEFAULT NULL,
  `note_preview` varchar(255) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_attachments`
--

CREATE TABLE `seller_notes_attachments` (
  `attach_id` int(10) UNSIGNED NOT NULL,
  `note_id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_report_issue`
--

CREATE TABLE `seller_notes_report_issue` (
  `report_id` int(11) UNSIGNED NOT NULL,
  `note_id` int(11) UNSIGNED NOT NULL,
  `reported_by_id` int(11) UNSIGNED NOT NULL,
  `download_id` int(11) UNSIGNED NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_review`
--

CREATE TABLE `seller_notes_review` (
  `review_id` int(11) UNSIGNED NOT NULL,
  `note_id` int(11) UNSIGNED NOT NULL,
  `reviewed_by_id` int(11) UNSIGNED NOT NULL,
  `download_id` int(11) UNSIGNED NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_configuration`
--

CREATE TABLE `system_configuration` (
  `cofig_id` int(11) UNSIGNED NOT NULL,
  `information` varchar(100) NOT NULL,
  `info_value` varchar(255) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `roleid` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(24) NOT NULL,
  `isemailverified` bit(1) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `profile_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `gender` int(11) UNSIGNED NOT NULL,
  `phone_code` int(11) UNSIGNED NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `secondary_email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(20) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `address_1` varchar(100) NOT NULL,
  `address_2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` int(10) UNSIGNED NOT NULL,
  `university` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`download_id`),
  ADD KEY `note_id` (`note_id`),
  ADD KEY `seller` (`seller`),
  ADD KEY `downloader` (`downloader`);

--
-- Indexes for table `note_categories`
--
ALTER TABLE `note_categories`
  ADD PRIMARY KEY (`note_categories_id`);

--
-- Indexes for table `note_type`
--
ALTER TABLE `note_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `reference_data`
--
ALTER TABLE `reference_data`
  ADD PRIMARY KEY (`reference_id`);

--
-- Indexes for table `seller_notes`
--
ALTER TABLE `seller_notes`
  ADD PRIMARY KEY (`seller_note_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `status` (`status`),
  ADD KEY `actionby` (`actionby`),
  ADD KEY `category` (`category`),
  ADD KEY `note_type` (`note_type`),
  ADD KEY `country` (`country`),
  ADD KEY `ispaid` (`ispaid`);

--
-- Indexes for table `seller_notes_attachments`
--
ALTER TABLE `seller_notes_attachments`
  ADD PRIMARY KEY (`attach_id`),
  ADD KEY `note_id` (`note_id`);

--
-- Indexes for table `seller_notes_report_issue`
--
ALTER TABLE `seller_notes_report_issue`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `note_id` (`note_id`),
  ADD KEY `reported_by_id` (`reported_by_id`),
  ADD KEY `download_id` (`download_id`);

--
-- Indexes for table `seller_notes_review`
--
ALTER TABLE `seller_notes_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `note_id` (`note_id`),
  ADD KEY `reviewed_by_id` (`reviewed_by_id`),
  ADD KEY `download_id` (`download_id`);

--
-- Indexes for table `system_configuration`
--
ALTER TABLE `system_configuration`
  ADD PRIMARY KEY (`cofig_id`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `gender` (`gender`),
  ADD KEY `phone_code` (`phone_code`),
  ADD KEY `country` (`country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `download_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note_categories`
--
ALTER TABLE `note_categories`
  MODIFY `note_categories_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note_type`
--
ALTER TABLE `note_type`
  MODIFY `type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `reference_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_notes`
--
ALTER TABLE `seller_notes`
  MODIFY `seller_note_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_notes_attachments`
--
ALTER TABLE `seller_notes_attachments`
  MODIFY `attach_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_notes_report_issue`
--
ALTER TABLE `seller_notes_report_issue`
  MODIFY `report_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_notes_review`
--
ALTER TABLE `seller_notes_review`
  MODIFY `review_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_configuration`
--
ALTER TABLE `system_configuration`
  MODIFY `cofig_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `roleid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`seller_note_id`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`seller`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`downloader`) REFERENCES `users` (`userid`);

--
-- Constraints for table `seller_notes`
--
ALTER TABLE `seller_notes`
  ADD CONSTRAINT `seller_notes_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `seller_notes_ibfk_2` FOREIGN KEY (`status`) REFERENCES `reference_data` (`reference_id`),
  ADD CONSTRAINT `seller_notes_ibfk_3` FOREIGN KEY (`actionby`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `seller_notes_ibfk_4` FOREIGN KEY (`category`) REFERENCES `note_categories` (`note_categories_id`),
  ADD CONSTRAINT `seller_notes_ibfk_5` FOREIGN KEY (`note_type`) REFERENCES `note_type` (`type_id`),
  ADD CONSTRAINT `seller_notes_ibfk_6` FOREIGN KEY (`country`) REFERENCES `countries` (`country_id`),
  ADD CONSTRAINT `seller_notes_ibfk_7` FOREIGN KEY (`ispaid`) REFERENCES `reference_data` (`reference_id`);

--
-- Constraints for table `seller_notes_attachments`
--
ALTER TABLE `seller_notes_attachments`
  ADD CONSTRAINT `seller_notes_attachments_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`seller_note_id`);

--
-- Constraints for table `seller_notes_report_issue`
--
ALTER TABLE `seller_notes_report_issue`
  ADD CONSTRAINT `seller_notes_report_issue_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`seller_note_id`),
  ADD CONSTRAINT `seller_notes_report_issue_ibfk_2` FOREIGN KEY (`reported_by_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `seller_notes_report_issue_ibfk_3` FOREIGN KEY (`download_id`) REFERENCES `downloads` (`download_id`);

--
-- Constraints for table `seller_notes_review`
--
ALTER TABLE `seller_notes_review`
  ADD CONSTRAINT `seller_notes_review_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`seller_note_id`),
  ADD CONSTRAINT `seller_notes_review_ibfk_2` FOREIGN KEY (`reviewed_by_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `seller_notes_review_ibfk_3` FOREIGN KEY (`download_id`) REFERENCES `downloads` (`download_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `userroles` (`roleid`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `reference_data` (`reference_id`),
  ADD CONSTRAINT `user_profile_ibfk_3` FOREIGN KEY (`phone_code`) REFERENCES `countries` (`country_id`),
  ADD CONSTRAINT `user_profile_ibfk_4` FOREIGN KEY (`country`) REFERENCES `countries` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
