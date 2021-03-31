-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 02:42 PM
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

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_code`, `createddate`, `createdby`, `modifieddate`, `modifiedby`, `isactive`) VALUES
(1, 'india', '+91', '2021-02-27 13:28:37', NULL, NULL, NULL, b'1'),
(2, 'Afghanistan', '+93', '2021-02-27 13:29:31', NULL, NULL, NULL, b'1'),
(3, 'Bangladesh', '+880', '2021-02-27 13:30:52', NULL, NULL, NULL, b'1'),
(4, 'Canada', '+1', '2021-02-27 13:33:20', NULL, NULL, NULL, b'1'),
(5, 'Oman', '+968', '2021-02-27 13:34:15', NULL, NULL, NULL, b'1');

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
  `ispaid` int(10) UNSIGNED NOT NULL,
  `purchased_price` decimal(10,0) DEFAULT NULL,
  `note_title` varchar(100) NOT NULL,
  `note_category` varchar(100) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`download_id`, `note_id`, `seller`, `downloader`, `allow_download`, `attachment_path`, `isattachdownloaded`, `downloaded_date`, `ispaid`, `purchased_price`, `note_title`, `note_category`, `createddate`, `createdby`, `modifieddate`, `modifiedby`) VALUES
(1, 1, 4, 1, b'1', '../Member/4/1/attachment/1_1616847118.pdf', b'0', '2021-03-27 18:15:13', 1, '230', 'computer science', 'MBA', NULL, NULL, NULL, NULL),
(2, 2, 4, 1, b'0', '../Member/4/2/attachment/2_1616847155.pdf', b'0', '2021-03-27 18:16:38', 1, '230', 'computer science', 'IT', NULL, NULL, NULL, NULL),
(3, 7, 4, 1, b'0', '../Member/4/7/attachment/7_1616847986.pdf', b'0', '2021-03-27 18:17:53', 1, '230', 'cpu', 'IT', NULL, NULL, NULL, NULL),
(4, 7, 4, 1, b'0', '../Member/4/7/attachment/8_1616847986.pdf', b'0', '2021-03-27 18:17:53', 1, '230', 'cpu', 'IT', NULL, NULL, NULL, NULL),
(5, 4, 4, 1, b'1', '../Member/4/4/attachment/4_1616847439.pdf', b'1', '2021-03-27 18:18:33', 2, '0', 'graphics', 'IT', NULL, NULL, NULL, NULL),
(6, 6, 4, 1, b'1', '../Member/4/6/attachment/6_1616847790.pdf', b'1', '2021-03-27 18:21:50', 2, '0', 'business', 'MBA', NULL, NULL, NULL, NULL),
(7, 1, 4, 5, b'1', '../Member/4/1/attachment/1_1616847118.pdf', b'0', '2021-03-27 18:33:39', 1, '230', 'computer science', 'MBA', NULL, NULL, NULL, NULL),
(8, 1, 4, 13, b'1', '../Member/4/1/attachment/1_1616847118.pdf', b'0', '2021-03-27 18:37:28', 1, '230', 'computer science', 'MBA', NULL, NULL, NULL, NULL),
(9, 17, 5, 1, b'1', '../Member/5/17/attachment/25_1616851488.pdf', b'0', '2021-03-27 18:59:35', 1, '230', 'computer science', 'CA', NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `note_categories`
--

INSERT INTO `note_categories` (`note_categories_id`, `category_name`, `category_description`, `createddate`, `createdby`, `modifieddate`, `modifiedby`, `isactive`) VALUES
(1, 'MBA', 'commerse stream', '2021-02-27 13:39:19', NULL, NULL, NULL, b'1'),
(2, 'IT', 'Engineering Stream', '2021-02-27 13:40:05', NULL, NULL, NULL, b'1'),
(3, 'CA', 'commerse stream', '2021-02-27 13:40:46', NULL, NULL, NULL, b'1'),
(4, 'Maths', 'trigonometry', '2021-02-27 13:42:34', NULL, NULL, NULL, b'1'),
(5, 'History', 'brief history of india', '2021-02-27 13:44:11', NULL, NULL, NULL, b'1');

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

--
-- Dumping data for table `note_type`
--

INSERT INTO `note_type` (`type_id`, `type_name`, `type_description`, `createddate`, `createdby`, `modifieddate`, `modifiedby`, `isactive`) VALUES
(1, 'Handwritten notes', 'notes which are handwritten', '2021-02-27 13:48:56', NULL, NULL, NULL, b'1'),
(2, 'University notes', 'notes which are provided by university', '2021-02-27 13:50:01', NULL, NULL, NULL, b'1'),
(3, 'Notebook', 'referance book', '2021-02-27 13:50:40', NULL, NULL, NULL, b'1'),
(4, 'Novel', 'a book that tells a story about people and events that are not real', '2021-02-27 13:52:20', NULL, NULL, NULL, b'1');

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

--
-- Dumping data for table `reference_data`
--

INSERT INTO `reference_data` (`reference_id`, `ref_value`, `data_value`, `ref_category`, `createddate`, `createdby`, `modifieddate`, `modifiedby`, `isactive`) VALUES
(1, 'paid', 'P', 'Selling Mode', '2021-02-27 14:05:50', 3, '2021-02-27 14:05:50', 3, b'1'),
(2, 'Free', 'F', 'Selling Mode', '2021-02-27 14:06:42', 3, '2021-02-27 14:06:42', 3, b'1'),
(3, 'Male', 'M', 'Gender', '2021-02-28 01:50:38', 3, NULL, NULL, b'1'),
(4, 'Female', 'Fe', 'Gender', '2021-02-28 01:51:05', 3, NULL, NULL, b'1'),
(5, 'Approved', 'Approved', 'Notes Status', '2021-03-11 19:42:19', 3, NULL, NULL, b'1'),
(6, 'Draft', 'Draft', 'Notes Status', '2021-02-28 01:53:43', 3, NULL, NULL, b'1'),
(7, 'Submitted For Review', 'Submitted For Review', 'Notes Status', '2021-02-28 01:56:05', 3, NULL, NULL, b'1'),
(8, 'In Review', 'In Review', 'Notes Status', '2021-02-28 01:57:30', 3, NULL, NULL, b'1'),
(9, 'Published', 'Approved', 'Notes Status', '2021-02-28 01:58:46', 3, NULL, NULL, b'1'),
(10, 'Rejected', 'Rejected', 'Notes Status', '2021-02-28 02:00:10', 3, NULL, NULL, b'1'),
(11, 'Removed', 'Removed', 'Notes Status', '2021-02-28 02:01:14', 3, NULL, NULL, b'1'),
(12, 'Other', 'O', 'Gender', '2021-03-11 19:44:22', 3, NULL, NULL, b'1');

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
  `selling_price` decimal(10,3) DEFAULT NULL,
  `note_preview` varchar(255) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes`
--

INSERT INTO `seller_notes` (`seller_note_id`, `seller_id`, `status`, `actionby`, `admin_remark`, `publisheddate`, `note_title`, `category`, `display_picture`, `note_type`, `num_of_pages`, `note_description`, `university_name`, `country`, `course`, `course_code`, `professor`, `ispaid`, `selling_price`, `note_preview`, `createddate`, `createdby`, `modifieddate`, `modifiedby`, `isactive`) VALUES
(1, 4, 6, NULL, NULL, '2021-03-27 17:41:58', 'computer science', 1, '../Member/4/1/display-pic-1616847118.jpg', 1, 121, 'computer science', 'gec', 1, 'science', '12', 'ashish mehta', 1, '230.000', NULL, '2021-03-27 17:41:58', NULL, NULL, NULL, b'1'),
(2, 4, 6, NULL, NULL, '2021-03-27 17:42:34', 'computer science', 2, '../Member/4/2/display-pic-1616847154.jpg', 1, 122, 'computer science', 'gec', 1, 'science', '12', 'ashish mehta', 1, '230.000', NULL, '2021-03-27 17:42:34', NULL, NULL, NULL, b'1'),
(3, 4, 6, NULL, NULL, '2021-03-27 17:44:29', 'chemistry', 3, '../Member/4/3/display-pic-1616847269.jpg', 3, 139, 'science and technology', 'gec', 3, 'science', '12', 'ashish mehta', 2, '0.000', NULL, '2021-03-27 17:44:29', NULL, NULL, NULL, b'1'),
(4, 4, 6, NULL, NULL, '2021-03-27 17:47:18', 'graphics', 2, '../Member/4/4/display-pic-1616847438.jpg', 1, 111, 'notemarketplace', 'gec', 2, 'graphics', '10', 'ashish mehta', 2, '0.000', NULL, '2021-03-27 17:47:18', NULL, NULL, NULL, b'1'),
(5, 4, 9, NULL, NULL, '2021-03-27 17:49:43', 'notemarketplace', 2, '../Member/4/5/display-pic-1616847583.jpg', 2, 122, 'notemarketplace', 'gec', 2, 'graphics', '10', 'ashish mehta', 2, '0.000', NULL, '2021-03-27 17:49:43', NULL, NULL, NULL, b'1'),
(6, 4, 9, NULL, NULL, '2021-03-27 17:53:09', 'business', 1, '../Member/4/6/display-pic-1616847789.jpg', 1, 129, 'notemarketplace', 'gec', 2, 'graphics', '10', 'ashish mehta', 2, '0.000', NULL, '2021-03-27 17:53:09', NULL, NULL, NULL, b'1'),
(7, 4, 7, NULL, NULL, '2021-03-27 17:56:25', 'cpu', 2, '../Member/4/7/display-pic-1616847985.jpg', 1, 140, 'science', 'gec', 4, 'business analytics', '13', 'ashish mehta', 1, '230.000', NULL, '2021-03-27 17:56:25', NULL, NULL, NULL, b'1'),
(8, 4, 8, NULL, NULL, '2021-03-27 17:56:35', 'graphics', 3, '../Member/4/8/display-pic-1616847995.jpg', 2, 120, 'computer', 'gec', 4, 'business analytics', '13', 'ashish mehta', 1, '230.000', NULL, '2021-03-27 17:56:35', NULL, NULL, NULL, b'1'),
(9, 4, 6, NULL, NULL, '2021-03-27 17:56:38', 'MCWC', 2, '../Member/4/9/display-pic-1616847998.jpg', 3, 160, 'business', 'gec', 4, 'business analytics', '13', 'ashish mehta', 1, '230.000', NULL, '2021-03-27 17:56:38', NULL, NULL, NULL, b'1'),
(10, 4, 6, NULL, NULL, '2021-03-27 17:56:41', 'python', 1, '../Member/4/10/display-pic-1616848001.jpg', 3, 200, 'python', 'gec', 4, 'business analytics', '13', 'ashish mehta', 1, '230.000', NULL, '2021-03-27 17:56:41', NULL, NULL, NULL, b'1'),
(11, 4, 6, NULL, NULL, '2021-03-27 17:56:50', 'android', 3, '../Member/4/11/display-pic-1616848010.jpg', 1, 123, 'programming', 'gec', 4, 'business analytics', '13', 'ashish mehta', 1, '230.000', NULL, '2021-03-27 17:56:50', NULL, NULL, NULL, b'1'),
(12, 4, 6, NULL, NULL, '2021-03-27 17:58:54', 'maths', 4, '../Member/4/12/display-pic-1616848134.jpg', 2, 300, 'maths', 'gec', 2, 'maths', '10', 'ashish mehta', 2, '0.000', NULL, '2021-03-27 17:58:54', NULL, NULL, NULL, b'1'),
(13, 4, 10, NULL, NULL, '2021-03-27 17:58:58', 'AI', 4, '../Member/4/13/display-pic-1616848138.jpg', 1, 123, 'AI', 'gec', 2, 'maths', '10', 'ashish mehta', 2, '0.000', NULL, '2021-03-27 17:58:58', NULL, NULL, NULL, b'1'),
(14, 4, 6, NULL, NULL, '2021-03-27 17:59:01', 'maths', 4, '../Member/4/14/display-pic-1616848141.jpg', 2, 123, 'maths', 'gec', 2, 'maths', '10', 'ashish mehta', 1, '150.000', NULL, '2021-03-27 17:59:01', NULL, NULL, NULL, b'1'),
(15, 4, 6, NULL, NULL, '2021-03-27 18:00:48', 'python', 2, '../Member/4/15/display-pic-1616848248.jpg', 2, 123, 'python', 'gec', 5, 'AI', '10', 'ashish mehta', 1, '150.000', NULL, '2021-03-27 18:00:48', NULL, NULL, NULL, b'1'),
(16, 13, 6, NULL, NULL, '2021-03-27 18:50:36', 'notemarketplace', 3, '../Member/13/16/display-pic-1616851237.jpg', 2, 123, 'notemarketplace', 'gec', 3, 'business analytics', '13', 'ashish mehta', 1, '230.000', NULL, '2021-03-27 18:50:36', NULL, NULL, NULL, b'1'),
(17, 5, 6, NULL, NULL, '2021-03-27 18:54:47', 'computer science', 3, '../Member/5/17/display-pic-1616851488.jpg', 2, 123, 'computer science', 'gec', 2, 'computer science', '10', 'ashish mehta', 1, '230.000', NULL, '2021-03-27 18:54:47', NULL, NULL, NULL, b'1');

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

--
-- Dumping data for table `seller_notes_attachments`
--

INSERT INTO `seller_notes_attachments` (`attach_id`, `note_id`, `file_name`, `file_path`, `createddate`, `createdby`, `modifieddate`, `modifiedby`, `isactive`) VALUES
(1, 1, '', '../Member/4/1/attachment/1_1616847118.pdf', NULL, NULL, NULL, NULL, b'1'),
(2, 2, '', '../Member/4/2/attachment/2_1616847155.pdf', NULL, NULL, NULL, NULL, b'1'),
(3, 3, '', '../Member/4/3/attachment/3_1616847269.pdf', NULL, NULL, NULL, NULL, b'1'),
(4, 4, '', '../Member/4/4/attachment/4_1616847439.pdf', NULL, NULL, NULL, NULL, b'1'),
(5, 5, '', '../Member/4/5/attachment/5_1616847584.pdf', NULL, NULL, NULL, NULL, b'1'),
(6, 6, '', '../Member/4/6/attachment/6_1616847790.pdf', NULL, NULL, NULL, NULL, b'1'),
(7, 7, '', '../Member/4/7/attachment/7_1616847986.pdf', NULL, NULL, NULL, NULL, b'1'),
(8, 7, '', '../Member/4/7/attachment/8_1616847986.pdf', NULL, NULL, NULL, NULL, b'1'),
(9, 8, '', '../Member/4/8/attachment/9_1616847996.pdf', NULL, NULL, NULL, NULL, b'1'),
(10, 8, '', '../Member/4/8/attachment/10_1616847996.pdf', NULL, NULL, NULL, NULL, b'1'),
(11, 9, '', '../Member/4/9/attachment/11_1616847999.pdf', NULL, NULL, NULL, NULL, b'1'),
(12, 9, '', '../Member/4/9/attachment/12_1616847999.pdf', NULL, NULL, NULL, NULL, b'1'),
(13, 10, '', '../Member/4/10/attachment/13_1616848002.pdf', NULL, NULL, NULL, NULL, b'1'),
(14, 10, '', '../Member/4/10/attachment/14_1616848002.pdf', NULL, NULL, NULL, NULL, b'1'),
(15, 11, '', '../Member/4/11/attachment/15_1616848010.pdf', NULL, NULL, NULL, NULL, b'1'),
(16, 11, '', '../Member/4/11/attachment/16_1616848011.pdf', NULL, NULL, NULL, NULL, b'1'),
(17, 12, '', '../Member/4/12/attachment/17_1616848135.pdf', NULL, NULL, NULL, NULL, b'1'),
(18, 12, '', '../Member/4/12/attachment/18_1616848135.pdf', NULL, NULL, NULL, NULL, b'1'),
(19, 13, '', '../Member/4/13/attachment/19_1616848139.pdf', NULL, NULL, NULL, NULL, b'1'),
(20, 13, '', '../Member/4/13/attachment/20_1616848139.pdf', NULL, NULL, NULL, NULL, b'1'),
(21, 14, '', '../Member/4/14/attachment/21_1616848141.pdf', NULL, NULL, NULL, NULL, b'1'),
(22, 14, '', '../Member/4/14/attachment/22_1616848142.pdf', NULL, NULL, NULL, NULL, b'1'),
(23, 15, '', '../Member/4/15/attachment/23_1616848248.pdf', NULL, NULL, NULL, NULL, b'1'),
(24, 16, '', '../Member/13/16/attachment/24_1616851237.pdf', NULL, NULL, NULL, NULL, b'1'),
(25, 17, '', '../Member/5/17/attachment/25_1616851488.pdf', NULL, NULL, NULL, NULL, b'1');

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

--
-- Dumping data for table `seller_notes_report_issue`
--

INSERT INTO `seller_notes_report_issue` (`report_id`, `note_id`, `reported_by_id`, `download_id`, `remark`, `createddate`, `createdby`, `modifieddate`, `modifiedby`) VALUES
(1, 1, 5, 4, 'inappropriate', NULL, NULL, NULL, NULL),
(2, 6, 1, 4, 'inappropriate', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_review`
--

CREATE TABLE `seller_notes_review` (
  `review_id` int(11) UNSIGNED NOT NULL,
  `note_id` int(11) UNSIGNED NOT NULL,
  `reviewed_by_id` int(11) UNSIGNED NOT NULL,
  `download_id` int(11) UNSIGNED NOT NULL,
  `rating` decimal(10,3) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes_review`
--

INSERT INTO `seller_notes_review` (`review_id`, `note_id`, `reviewed_by_id`, `download_id`, `rating`, `comments`, `createddate`, `createdby`, `modifieddate`, `modifiedby`, `isactive`) VALUES
(1, 1, 1, 4, '3.473', 'explanation is very descriptive', NULL, NULL, NULL, NULL, b'1'),
(2, 1, 5, 4, '4.278', 'good', NULL, NULL, NULL, NULL, b'1'),
(3, 1, 13, 4, '4.671', 'good', NULL, NULL, NULL, NULL, b'1'),
(4, 4, 1, 4, '4.427', 'explanation is very descriptive', NULL, NULL, NULL, NULL, b'1'),
(5, 17, 1, 5, '4.334', 'good', NULL, NULL, NULL, NULL, b'1');

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

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`roleid`, `name`, `description`, `createddate`, `createdby`, `modifieddate`, `modifiedby`, `isactive`) VALUES
(1, 'user', 'buyer or seller', '2021-02-25 10:53:46', 3, NULL, NULL, b'1'),
(2, 'admin', 'user who maintain the system', '2021-02-25 10:54:44', 3, NULL, NULL, b'1'),
(3, 'superadmin', 'who created the notemarketplace', '2021-02-25 10:55:42', 3, NULL, NULL, b'1');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `role_id`, `firstname`, `lastname`, `email_id`, `password`, `isemailverified`, `createddate`, `createdby`, `modifieddate`, `modifiedby`, `isactive`) VALUES
(1, 1, 'kashish', 'rathod', 'gopirathod1601@gmail.com', 'kashish', b'1', '2021-02-26 16:07:02', NULL, NULL, NULL, b'1'),
(2, 2, 'gopi', 'rathod', 'kashishrathod531@gmail.com', 'kashish123', b'1', '2021-02-26 17:32:11', NULL, NULL, NULL, b'1'),
(3, 2, 'khyati', 'thakkar', 'kthakkar9426@gmail.com', 'khyati17', b'1', '2021-02-26 17:34:21', NULL, NULL, NULL, b'1'),
(4, 1, 'harsh', 'Rathod', 'khyatiratanghayara001@gmail.com', 'hello123', b'1', '2021-03-27 16:38:08', NULL, NULL, NULL, b'1'),
(5, 1, 'harsh', 'mehta', 'harshrathod982002@gmail.com', 'harsh98', b'1', '2021-03-05 17:37:00', NULL, NULL, NULL, b'1'),
(6, 1, 'lalu', 'Rathod', 'hrathod1137@gmail.com', 'lalu1137', b'1', '2021-03-05 17:38:35', NULL, NULL, NULL, b'1'),
(13, 1, 'daksh', 'kalathiya', 'dk9664889944@gmail.com', 'daksh123', b'1', '2021-03-27 16:49:16', NULL, NULL, NULL, b'1');

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
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`profile_id`, `user_id`, `gender`, `phone_code`, `date_of_birth`, `secondary_email`, `phone_no`, `profile_picture`, `address_1`, `address_2`, `city`, `state`, `zip_code`, `country`, `university`, `college`, `createddate`, `createdby`, `modifieddate`, `modifiedby`) VALUES
(1, 1, 4, 1, '2021-03-16 00:00:00', 'gopirathod122@gmail.com', '9664785717', '../Member/1/display-1616845775.png', 'shivaji nagar', 'vraj dhan complex', 'bhavnagar', 'gujrat', '364140', 1, 'gtu', 'gec', '2021-03-27 16:55:45', NULL, NULL, NULL),
(2, 4, 3, 2, '2011-07-17 00:00:00', 'khyatiratanghayara001@gmail.com', '9106925100', '../Member/4/display-1616845213.png', 'krishna complex', 'kandivali east', 'mumbai', 'maharashtra', '363089', 2, 'gtu', 'mithibai college', '2021-03-27 17:06:15', NULL, NULL, NULL),
(3, 5, 3, 2, '2021-03-15 00:00:00', 'harshrathod982002@gmail.com', '9106925100', '../Member/5/display-1616845346.png', 'krishna complex', 'kandivali east', 'mumbai', 'maharashtra', '363089', 2, 'gtu', 'mithibai college', '2021-03-27 17:12:26', NULL, NULL, NULL),
(4, 6, 3, 2, '2021-03-15 00:00:00', 'hrathod1137@gmail.com', '9664785718', '../Member/6/display-1616845605.png', 'shivaji', 'nagar', 'bhavnagar', 'gujrat', '364140', 3, 'gtu', 'gecbvn', '2021-03-27 17:14:05', NULL, NULL, NULL),
(5, 13, 3, 1, '2021-03-16 00:00:00', 'dk9664889944@gmail.com', '9664785718', '../Member/13/display-1616851318.png', 'shivaji', 'nagar', 'bhavnagar', 'gujrat', '364140', 4, 'gtu', 'mithibai college', '2021-03-27 18:47:21', NULL, NULL, NULL);

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
  ADD KEY `downloader` (`downloader`),
  ADD KEY `ispaid` (`ispaid`);

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
  ADD UNIQUE KEY `email_id` (`email_id`),
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
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `download_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `note_categories`
--
ALTER TABLE `note_categories`
  MODIFY `note_categories_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `note_type`
--
ALTER TABLE `note_type`
  MODIFY `type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `reference_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seller_notes`
--
ALTER TABLE `seller_notes`
  MODIFY `seller_note_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `seller_notes_attachments`
--
ALTER TABLE `seller_notes_attachments`
  MODIFY `attach_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `seller_notes_report_issue`
--
ALTER TABLE `seller_notes_report_issue`
  MODIFY `report_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller_notes_review`
--
ALTER TABLE `seller_notes_review`
  MODIFY `review_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_configuration`
--
ALTER TABLE `system_configuration`
  MODIFY `cofig_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `roleid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`seller_note_id`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`seller`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`downloader`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `downloads_ibfk_4` FOREIGN KEY (`ispaid`) REFERENCES `reference_data` (`reference_id`);

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
  ADD CONSTRAINT `seller_notes_report_issue_ibfk_3` FOREIGN KEY (`download_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `seller_notes_review`
--
ALTER TABLE `seller_notes_review`
  ADD CONSTRAINT `seller_notes_review_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`seller_note_id`),
  ADD CONSTRAINT `seller_notes_review_ibfk_2` FOREIGN KEY (`reviewed_by_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `seller_notes_review_ibfk_3` FOREIGN KEY (`download_id`) REFERENCES `users` (`userid`);

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
