-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 07:17 PM
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
(1, 1, 1, 2, b'1', NULL, b'1', '2021-03-04 04:45:52', 1, '123', 'notemarketplace', 'science', NULL, NULL, NULL, NULL),
(2, 2, 1, 1, b'1', NULL, b'1', NULL, 1, '123', 'note', 'it', NULL, NULL, NULL, NULL),
(3, 3, 2, 1, b'1', NULL, b'1', '2021-03-04 04:45:52', 1, '123', 'title', 'science', NULL, NULL, NULL, NULL),
(4, 4, 2, 1, b'1', NULL, b'1', '2021-03-04 04:45:52', 1, '123', 'marvel', 'it', NULL, NULL, NULL, NULL),
(5, 5, 1, 3, b'1', NULL, b'1', '2021-03-04 04:45:52', 1, '123', 'note', 'history', NULL, NULL, NULL, NULL),
(6, 6, 2, 1, b'1', NULL, b'1', '2021-03-04 04:45:52', 1, '123', 'market', 'it', NULL, NULL, NULL, NULL),
(7, 10, 1, 3, b'1', NULL, b'1', '2021-03-04 04:45:52', 1, '123', 'note', 'data_science', NULL, NULL, NULL, NULL),
(8, 11, 1, 2, b'1', NULL, b'1', '2021-03-04 04:45:52', 1, '123', 'marketplace', 'history', NULL, NULL, NULL, NULL),
(9, 10, 1, 1, b'1', NULL, b'1', '2021-03-04 04:45:52', 1, '123', 'physics', 'science', NULL, NULL, NULL, NULL),
(10, 17, 1, 2, b'1', NULL, b'1', NULL, 1, '123', 'chemistry', 'science', NULL, NULL, NULL, NULL);

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
(6, 'Draft', 'Draft', 'Notes Status', '2021-02-28 01:53:43', 3, NULL, NULL, b'1'),
(7, 'Submitted For Review', 'Submitted For Review', 'Notes Status', '2021-02-28 01:56:05', 3, NULL, NULL, b'1'),
(8, 'In Review', 'In Review', 'Notes Status', '2021-02-28 01:57:30', 3, NULL, NULL, b'1'),
(9, 'Published', 'Approved', 'Notes Status', '2021-02-28 01:58:46', 3, NULL, NULL, b'1'),
(10, 'Rejected', 'Rejected', 'Notes Status', '2021-02-28 02:00:10', 3, NULL, NULL, b'1'),
(11, 'Removed', 'Removed', 'Notes Status', '2021-02-28 02:01:14', 3, NULL, NULL, b'1');

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
(1, 1, 6, NULL, NULL, '2021-03-03 00:44:21', 'hello', 2, '../Member/default/reviewer-3.png', 1, 12, 'des', 'HXUAS', 2, 'kashish', '12', 'kashish', 1, '23.000', '../Member/1/1/preview-1614712461.jpg', '2021-03-03 00:44:21', NULL, NULL, NULL, b'1'),
(2, 1, 6, NULL, NULL, '2021-03-03 00:45:04', 'hello', 2, '../Member/default/reviewer-3.png', 1, 12, 'des', 'HXUAS', 2, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/2/preview-1614712505.jpg', '2021-03-03 00:45:04', NULL, NULL, NULL, b'1'),
(3, 1, 6, NULL, NULL, '2021-03-03 00:46:13', 'note', 2, '../Member/1/3/display-pic-1614712573.jpg', 1, 12, 'des', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/3/preview-1614712574.jpg', '2021-03-03 00:46:13', NULL, NULL, NULL, b'0'),
(4, 1, 6, NULL, NULL, '2021-03-03 14:49:07', 'note', 2, '../Member/1/4/display-pic-1614763147.jpg', 1, 12, 'hmawdghe', 'sbcskk', 1, 'kashish', '12', 'jbcjwj', 2, '23.000', '../Member/1/4/preview-1614763147.jpg', '2021-03-03 14:49:07', NULL, NULL, NULL, b'1'),
(5, 1, 6, NULL, NULL, '2021-03-03 14:49:56', 'khyati', 2, '../Member/1/5/display-pic-1614763197.jpg', 1, 12, 'hSCGa', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/5/preview-1614763197.jpg', '2021-03-03 14:49:56', NULL, NULL, NULL, b'0'),
(6, 1, 6, NULL, NULL, '2021-03-03 14:50:55', 'notemarketplace', 2, '../Member/1/6/display-pic-1614763255.jpg', 1, 12, 'zjhdgc', 'sbcskk', 1, 'kashish', '12', 'jbcjwj', 2, '23.000', '../Member/1/6/preview-1614763256.jpg', '2021-03-03 14:50:55', NULL, NULL, NULL, b'1'),
(9, 1, 6, NULL, NULL, '2021-03-03 21:18:06', 'note', 2, '../Member/1/9/display-pic-1614786486.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/9/preview-1614786486.jpg', '2021-03-03 21:18:06', NULL, NULL, NULL, b'1'),
(10, 1, 6, NULL, NULL, '2021-03-03 21:18:11', 'note', 2, '../Member/1/10/display-pic-1614786491.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/10/preview-1614786491.jpg', '2021-03-03 21:18:11', NULL, NULL, NULL, b'1'),
(11, 1, 6, NULL, NULL, '2021-03-03 21:18:14', 'note', 2, '../Member/1/11/display-pic-1614786494.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/11/preview-1614786494.jpg', '2021-03-03 21:18:14', NULL, NULL, NULL, b'1'),
(12, 1, 6, NULL, NULL, '2021-03-03 21:18:17', 'note', 2, '../Member/1/12/display-pic-1614786497.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/12/preview-1614786497.jpg', '2021-03-03 21:18:17', NULL, NULL, NULL, b'1'),
(13, 1, 6, NULL, NULL, '2021-03-03 21:18:20', 'note', 2, '../Member/1/13/display-pic-1614786500.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/13/preview-1614786500.jpg', '2021-03-03 21:18:20', NULL, NULL, NULL, b'1'),
(14, 1, 6, NULL, NULL, '2021-03-03 21:18:23', 'note', 2, '../Member/1/14/display-pic-1614786503.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/14/preview-1614786503.jpg', '2021-03-03 21:18:23', NULL, NULL, NULL, b'1'),
(15, 1, 6, NULL, NULL, '2021-03-03 21:18:28', 'note', 2, '../Member/1/15/display-pic-1614786509.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/15/preview-1614786509.jpg', '2021-03-03 21:18:28', NULL, NULL, NULL, b'0'),
(16, 1, 6, NULL, NULL, '2021-03-03 21:18:31', 'note', 2, '../Member/1/16/display-pic-1614786511.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/16/preview-1614786511.jpg', '2021-03-03 21:18:31', NULL, NULL, NULL, b'0'),
(17, 1, 6, NULL, NULL, '2021-03-03 21:18:33', 'note', 2, '../Member/1/17/display-pic-1614786513.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/17/preview-1614786513.jpg', '2021-03-03 21:18:33', NULL, NULL, NULL, b'0'),
(18, 1, 6, NULL, NULL, '2021-03-03 21:18:35', 'note', 2, '../Member/1/18/display-pic-1614786515.jpg', 1, 12, 'hadbsj', 'sbcskk', 1, 'kashish', '12', 'kashish', 2, '23.000', '../Member/1/18/preview-1614786515.jpg', '2021-03-03 21:18:35', NULL, NULL, NULL, b'0'),
(19, 1, 9, NULL, NULL, '2021-03-04 03:11:32', 'kashish', 2, NULL, NULL, NULL, 'mnabchc', NULL, NULL, NULL, NULL, NULL, 2, '123.000', NULL, NULL, NULL, NULL, NULL, b'1'),
(20, 1, 9, NULL, NULL, '2021-03-04 03:11:52', 'lajcs', 2, NULL, NULL, NULL, 'cajc', NULL, NULL, NULL, NULL, NULL, 2, '123.000', NULL, NULL, NULL, NULL, NULL, b'1'),
(21, 1, 9, NULL, NULL, '2021-03-04 03:20:43', 'jcnka', 2, NULL, NULL, NULL, 'jnxajch', NULL, NULL, NULL, NULL, NULL, 9, '123.000', NULL, NULL, NULL, NULL, NULL, b'1');

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
(2, 13, '', '../Member/1/13/attachment/21614702082.pdf', NULL, NULL, NULL, NULL, b'1'),
(3, 13, '', '../Member/1/13/attachment/31614702082.pdf', NULL, NULL, NULL, NULL, b'1'),
(4, 14, '', '../Member/1/14/attachment/4_1614706106.pdf', NULL, NULL, NULL, NULL, b'1'),
(5, 14, '', '../Member/1/14/attachment/5_1614706106.pdf', NULL, NULL, NULL, NULL, b'1'),
(6, 14, '', '../Member/1/14/attachment/6_1614706106.pdf', NULL, NULL, NULL, NULL, b'1'),
(7, 15, '', '../Member/1/15/attachment/7_1614712287.pdf', NULL, NULL, NULL, NULL, b'1'),
(8, 16, '', '../Member/1/16/attachment/8_1614712355.pdf', NULL, NULL, NULL, NULL, b'1'),
(9, 3, '', '../Member/1/3/attachment/9_1614712574.pdf', NULL, NULL, NULL, NULL, b'1'),
(10, 4, '', '../Member/1/4/attachment/10_1614763147.pdf', NULL, NULL, NULL, NULL, b'1'),
(11, 5, '', '../Member/1/5/attachment/11_1614763197.pdf', NULL, NULL, NULL, NULL, b'1'),
(12, 6, '', '../Member/1/6/attachment/12_1614763256.pdf', NULL, NULL, NULL, NULL, b'1'),
(14, 9, '', '../Member/1/9/attachment/14_1614786486.pdf', NULL, NULL, NULL, NULL, b'1'),
(15, 10, '', '../Member/1/10/attachment/15_1614786491.pdf', NULL, NULL, NULL, NULL, b'1'),
(16, 11, '', '../Member/1/11/attachment/16_1614786494.pdf', NULL, NULL, NULL, NULL, b'1'),
(17, 12, '', '../Member/1/12/attachment/17_1614786498.pdf', NULL, NULL, NULL, NULL, b'1'),
(18, 13, '', '../Member/1/13/attachment/18_1614786500.pdf', NULL, NULL, NULL, NULL, b'1'),
(19, 14, '', '../Member/1/14/attachment/19_1614786503.pdf', NULL, NULL, NULL, NULL, b'1'),
(20, 15, '', '../Member/1/15/attachment/20_1614786509.pdf', NULL, NULL, NULL, NULL, b'1'),
(21, 16, '', '../Member/1/16/attachment/21_1614786511.pdf', NULL, NULL, NULL, NULL, b'1'),
(22, 17, '', '../Member/1/17/attachment/22_1614786513.pdf', NULL, NULL, NULL, NULL, b'1'),
(23, 18, '', '../Member/1/18/attachment/23_1614786515.pdf', NULL, NULL, NULL, NULL, b'1');

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
(1, 1, 'kashish', 'rathod', 'gopirathod1601@gmail.com', 's&qR)WaF', b'1', '2021-02-26 16:07:02', NULL, NULL, NULL, b'1'),
(2, 2, 'kashish', 'rathod', 'kashishrathod531@gmail.com', 'kU[O7(1*', b'1', '2021-02-26 17:32:11', NULL, NULL, NULL, b'1'),
(3, 2, 'khyati', 'ratanghayara', 'kthakkar9426@gmail.com', 'cMqD50I`', b'1', '2021-02-26 17:34:21', NULL, NULL, NULL, b'1'),
(4, 1, 'hello', 'rathod', 'abc@gmail.com', 'hello123', b'1', NULL, NULL, NULL, NULL, b'1'),
(5, 1, 'kashish', 'rathod', 'abcd@gmail.com', 'jkqdbkq', b'1', '2021-03-05 17:37:00', NULL, NULL, NULL, b'1'),
(6, 1, 'gopi', 'rathod', 'xyz@gmail.com', '/[GK<rzQ', b'1', '2021-03-05 17:38:35', NULL, NULL, NULL, b'1');

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
  MODIFY `download_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `reference_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seller_notes`
--
ALTER TABLE `seller_notes`
  MODIFY `seller_note_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `seller_notes_attachments`
--
ALTER TABLE `seller_notes_attachments`
  MODIFY `attach_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `roleid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
