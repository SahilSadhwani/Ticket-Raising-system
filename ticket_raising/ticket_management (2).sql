-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 07:06 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `issuers`
--

CREATE TABLE `issuers` (
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `user_id_of_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issues_solved`
--

CREATE TABLE `issues_solved` (
  `issue_solved_id` int(11) NOT NULL,
  `resolver_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `time_to_solve` time NOT NULL,
  `date_of_solving` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues_solved`
--

INSERT INTO `issues_solved` (`issue_solved_id`, `resolver_id`, `ticket_id`, `time_to_solve`, `date_of_solving`) VALUES
(5, 1, 15, '13:41:02', '2019-01-31'),
(6, 1, 15, '13:49:20', '2019-01-31'),
(7, 6, 17, '19:26:29', '2019-02-03'),
(8, 6, 18, '00:00:00', '0000-00-00'),
(9, 6, 23, '14:47:12', '2019-02-06'),
(11, 6, 24, '00:00:00', '0000-00-00'),
(12, 6, 31, '17:10:23', '2019-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `resolvers`
--

CREATE TABLE `resolvers` (
  `user_id` int(11) NOT NULL,
  `resolver_id` int(11) NOT NULL,
  `tools` varchar(255) NOT NULL,
  `ratings` int(11) NOT NULL,
  `current_no_of_issues` int(11) NOT NULL,
  `resolver_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resolvers`
--

INSERT INTO `resolvers` (`user_id`, `resolver_id`, `tools`, `ratings`, `current_no_of_issues`, `resolver_type`) VALUES
(2, 1, '', 0, -1, 0),
(10, 6, '', 1, -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resolver_working_period`
--

CREATE TABLE `resolver_working_period` (
  `resolver_id` int(11) NOT NULL,
  `day` datetime NOT NULL,
  `login_timestamp` time NOT NULL,
  `logout_timestamp` time NOT NULL,
  `total_working hours_of_day` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resolver_working_period`
--

INSERT INTO `resolver_working_period` (`resolver_id`, `day`, `login_timestamp`, `logout_timestamp`, `total_working hours_of_day`) VALUES
(1, '2019-01-31 12:14:17', '12:14:17', '00:00:00', '00:00:00'),
(1, '2019-01-31 12:36:17', '12:36:17', '00:00:00', '00:00:00'),
(1, '2019-01-31 12:36:39', '12:36:39', '00:00:00', '00:00:00'),
(1, '2019-02-03 13:58:30', '13:58:30', '00:00:00', '00:00:00'),
(1, '2019-02-03 17:59:35', '17:59:35', '00:00:00', '00:00:00'),
(6, '2019-02-05 13:30:06', '13:30:06', '00:00:00', '00:00:00'),
(1, '2019-02-06 14:34:41', '14:34:41', '00:00:00', '00:00:00'),
(6, '2019-02-06 14:39:08', '14:39:08', '00:00:00', '00:00:00'),
(6, '2019-02-06 15:53:13', '15:53:13', '00:00:00', '00:00:00'),
(6, '2019-02-06 17:09:15', '17:09:15', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `software_id` int(11) NOT NULL,
  `software_name` varchar(255) NOT NULL,
  `tools_required` varchar(255) NOT NULL,
  `software_description` varchar(255) NOT NULL,
  `sofware_allocated_to_companies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`software_id`, `software_name`, `tools_required`, `software_description`, `sofware_allocated_to_companies`) VALUES
(1, 'erp', '', '', ''),
(2, 'ticket_raising', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `software_common_bugs`
--

CREATE TABLE `software_common_bugs` (
  `software_id` int(11) NOT NULL,
  `software_bugs` varchar(255) NOT NULL,
  `software_solutions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `software_resolver`
--

CREATE TABLE `software_resolver` (
  `software_id` int(11) NOT NULL,
  `resolver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_resolver`
--

INSERT INTO `software_resolver` (`software_id`, `resolver_id`) VALUES
(1, 1),
(2, 2),
(2, 1),
(1, 6),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `software_id` int(11) NOT NULL,
  `ticket_subject` varchar(255) NOT NULL,
  `ticket_message` varchar(255) NOT NULL,
  `ticket_photos` varchar(255) NOT NULL,
  `ticket_specification` varchar(255) NOT NULL,
  `date_of_ticket_issue` date NOT NULL,
  `timestamp_of_ticket` time NOT NULL,
  `ticket_taken` int(11) NOT NULL DEFAULT '0',
  `reply_by_user` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `user_id`, `software_id`, `ticket_subject`, `ticket_message`, `ticket_photos`, `ticket_specification`, `date_of_ticket_issue`, `timestamp_of_ticket`, `ticket_taken`, `reply_by_user`) VALUES
(15, 1, 1, 'insertion isssue', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus fugiat quod exercitationem inventore amet labore, magni repudiandae minus iusto, dolores ut non ratione. Quo eaque, quidem iure deleniti incidunt fuga?', 'thailand11548918343.jpg,yatra11548918343.jpg,yatra11548918343.jpg', 'non_critical', '2019-01-31', '12:35:43', 1, NULL),
(16, 1, 2, 'testing issue going on', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus fugiat quod exercitationem inventore amet labore, magni repudiandae minus iusto, dolores ut non ratione. Quo eaque, quidem iure deleniti incidunt fuga?', 'thailand11548918343.jpg,yatra11548918343.jpg,yatra11548918343.jpg', 'non_critical', '2019-01-31', '12:46:55', 0, NULL),
(17, 1, 1, '404 error', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam minima alias vel dolorem veritatis incidunt porro atque, cum excepturi velit a assumenda quidem autem! Porro nemo inventore ipsam sed veritatis?', 'bg-home1548919433.jpg,block1 (1)1548919433.png,block1 (1)1548919433.png', 'critical', '2019-01-31', '12:53:53', 1, ''),
(18, 1, 2, 'modal problem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam minima alias vel dolorem veritatis incidunt porro atque, cum excepturi velit a assumenda quidem autem! Porro nemo inventore ipsam sed veritatis?', 'Screenshot_20181102-133657__011548919532.jpg,snap11548919532.gif', 'critical', '2019-01-31', '12:55:32', 0, NULL),
(19, 1, 1, 'issue 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'dubai11549346674.jpg,dubai11549346674.jpg', 'non_critical', '2019-02-05', '11:34:34', 0, NULL),
(20, 1, 1, 'issue 2`', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'deco11549346712.jpg,deco11549346712.jpg', 'non_critical', '2019-02-05', '11:35:12', 0, NULL),
(21, 1, 1, 'issue 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'hotel_image_141549346734.jpg,hotel_image_141549346734.jpg', 'non_critical', '2019-02-05', '11:35:34', 0, NULL),
(22, 1, 1, 'issue 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'Screenshot_20180717-144658__011549346777.jpg,Screenshot_20180718-152544__011549346777.jpg,Screenshot_20180718-152544__011549346777.jpg', 'critical', '2019-02-05', '11:36:17', 1, NULL),
(23, 1, 1, 'issue 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'bg-home (1)1549346807.jpg,bg-home (1)1549346807.jpg', 'critical', '2019-02-05', '11:36:47', 1, ''),
(24, 1, 1, 'issue 6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'npart-2 (1)1549346836.jpg,npart-2 (1)1549346836.jpg', 'critical', '2019-02-05', '11:37:16', 1, ''),
(25, 1, 2, 'issue 7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'avi-richards-183715-unsplash1549346868.jpg,avi-richards-183715-unsplash1549346868.jpg', 'non_critical', '2019-02-05', '11:37:48', 0, NULL),
(26, 1, 2, 'issue 8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'img21549346894.jpg,img3 (1)1549346894.jpg,img3 (1)1549346894.jpg', 'non_critical', '2019-02-05', '11:38:14', 0, NULL),
(27, 1, 2, 'issue 9', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'south11549346922.jpg,thailand11549346922.jpg,thailand11549346922.jpg', 'non_critical', '2019-02-05', '11:38:42', 0, NULL),
(28, 1, 2, 'issue 10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'manali11549346951.jpg,north11549346951.jpg,north11549346951.jpg', 'critical', '2019-02-05', '11:39:11', 0, NULL),
(29, 1, 2, 'issue 11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'road1549346982.jpg,Screenshot_20180626-1934171549346982.jpg,Screenshot_20180626-1934171549346982.jpg', 'critical', '2019-02-05', '11:39:42', 0, NULL),
(30, 1, 2, 'issue 12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat esse doloremque cumque at consequatur molestias fugiat odio, repudiandae illo, praesentium inventore impedit eveniet facilis laboriosam eius laborum quidem accusantium adipisci.', 'usa11549347010.jpg,usa11549347010.jpg', 'critical', '2019-02-05', '11:40:10', 0, NULL),
(31, 1, 1, 'isssue 99', 'sscscs', 'bg-home1549453140.jpg,block1 (1)1549453140.png,block1 (1)1549453140.png', 'critical', '2019-02-06', '17:09:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_assigned`
--

CREATE TABLE `ticket_assigned` (
  `ticket_id` int(11) NOT NULL,
  `resolver_id` int(11) NOT NULL,
  `issue_status` int(11) NOT NULL,
  `ticket_allocated_day` date DEFAULT NULL,
  `time_of_ticket_allocated` time DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `issue_status_by_user` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_assigned`
--

INSERT INTO `ticket_assigned` (`ticket_id`, `resolver_id`, `issue_status`, `ticket_allocated_day`, `time_of_ticket_allocated`, `reply`, `issue_status_by_user`) VALUES
(15, 1, 2, '2019-01-31', '13:05:15', 'solved issue', 0),
(17, 6, 1, '2019-02-03', '19:25:46', 'i just solved it', 1),
(18, 6, 0, '2019-02-03', '19:28:06', '', 0),
(22, 6, 2, '2019-02-05', '13:39:56', NULL, 0),
(23, 6, 1, '2019-02-06', '14:44:10', '', 1),
(24, 6, 1, '2019-02-06', '15:03:57', '', 1),
(28, 6, 0, '2019-02-06', '15:09:45', 'hello i am testing this for replying only', 0),
(31, 6, 1, '2019-02-06', '17:09:41', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_unsolved`
--

CREATE TABLE `ticket_unsolved` (
  `ticket_id` int(11) NOT NULL,
  `no_of_times_unsolved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_unsolved`
--

INSERT INTO `ticket_unsolved` (`ticket_id`, `no_of_times_unsolved`) VALUES
(15, 0),
(16, 0),
(17, 0),
(18, 2),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 1),
(29, 0),
(30, 0),
(31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_contact`, `user_type`, `company_name`) VALUES
(1, 'Sahil', 'sadhwanisahil64@gmail.com', '$2y$10$UyxO47kVKmwkd/m7FPfJg.j3aBZUDjVX7Fwr6cDIhKVSrX8Y00Jz6', '9820098200', 'user', 'google'),
(2, 'Varunjhd', 'varun@gmail.com', '$2y$10$NAiSOUrk4tkkISx6e.KC5ONj1akWGUFXS989kOok4RemO3fUwbMv2', '9820098200', 'resolver', NULL),
(9, 'Sanjay', 'sanjay@gmail.com', '$2y$10$JSv6Q/Pkxiop7bdN7lvCdO1dmmgHVi7pwOVkWv6qlA.tCE3Yx9mlG', '9872098720', 'user', 'ivp'),
(10, 'Dhiraj', 'dhiraj@gmail.com', '$2y$10$JNRqkGEZl/fIgey/8aVvM.HvlU/p1gOHDiU1XSEOzjr4Hi3rY0Dui', '9632096320', 'resolver', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues_solved`
--
ALTER TABLE `issues_solved`
  ADD PRIMARY KEY (`issue_solved_id`);

--
-- Indexes for table `resolvers`
--
ALTER TABLE `resolvers`
  ADD PRIMARY KEY (`resolver_id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`software_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issues_solved`
--
ALTER TABLE `issues_solved`
  MODIFY `issue_solved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resolvers`
--
ALTER TABLE `resolvers`
  MODIFY `resolver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `software_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
