-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2022 at 12:43 PM
-- Server version: 5.7.39-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karma_volunteering_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(11) NOT NULL,
  `badge_name` varchar(255) NOT NULL,
  `badge_description` varchar(255) NOT NULL,
  `badge_status` tinyint(1) NOT NULL DEFAULT '1',
  `badge_img` varchar(255) NOT NULL,
  `badge_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `badge_name`, `badge_description`, `badge_status`, `badge_img`, `badge_key`) VALUES
(4, 'Silver', 'Collect 10 points to earn this badge', 1, 'silver.png', 10),
(5, 'Gold', 'Collect 100 points to earn this badge', 1, 'gold.png', 100),
(6, 'Diamond', 'Collect 200 points to earn this badge', 1, 'diamond.png', 200);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(27, 'Charity', 1),
(28, 'Health and Wellness', 1),
(29, 'Environment', 1),
(30, 'Education', 1);

-- --------------------------------------------------------

--
-- Table structure for table `earned_badges`
--

CREATE TABLE `earned_badges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `badge_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `earned_badges`
--

INSERT INTO `earned_badges` (`id`, `user_id`, `badge_key`) VALUES
(27, 28, 10),
(28, 24, 10),
(29, 30, 10),
(30, 32, 10);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `venue` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `organization` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `limit_registration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `start_date`, `end_date`, `start_time`, `end_time`, `description`, `status`, `venue`, `location`, `category`, `organization`, `points`, `image_url`, `limit_registration`) VALUES
(15, 'Fun Day with PJKKEK', '2022-11-27', '2022-11-27', '11:00 AM', '2:30 PM', '<p><strong>ðŸŒŸMake A Difference, Grant a Wish!ðŸŒŸ</strong></p>\r\n\r\n<p>We need your help to make our efforts go even further!&nbsp;</p>\r\n\r\n<p>With just RM 100, you can grant a wish for one kid and make all the difference in the kid&rsquo;s life.</p>\r\n', 1, 'Pusat Jagaan Kanak-Kanak Ekliptik Klang (PJKKEK)', '', 27, 9, 10, 'pjkkek.jpg', 10),
(16, 'Blood Donation Drive', '2022-12-07', '2022-12-07', '10:00 AM', '4:00 PM', '<p>Open to the public as well, so bring your friends and family!<br />\r\nNote: Compulsory to take a meal before donation!</p>\r\n', 1, 'Common Ground, 1 Powerhouse', '', 28, 10, 30, 'blood-donation.jpeg', 80),
(18, 'All About Wellness Carnival', '2022-11-27', '2022-11-27', '8:00 AM', '2:00 PM', '<p>Enjoy a fun-filled day with free health screenings, educational kids corner and health activities.<br />\r\nGet our awesome free goodies bag!</p>\r\n', 1, 'Pantai Hospital, Klang', '', 28, 11, 20, 'wellness-carnival.jpg', 100),
(19, 'Soup Kitchen Volunteer', '2022-11-28', '2022-12-02', '10:00 AM', '2:00 PM', '<ul>\r\n	<li>Pack food and distribute over kitchen counter</li>\r\n	<li>First time volunteers are required to attend briefing.</li>\r\n	<li>Attire &ndash; KSK T-shirt, jeans, long pants and covered shoes.</li>\r\n</ul>\r\n', 1, '17, Jalan Barat, Off Jalan Imbi, 55100 Kuala Lumpur', '', 27, 12, 10, 'soup.jpg', 30),
(20, 'Cotee River Cleanup', '2022-11-20', '2022-11-20', '8:30 AM', '12:00 PM', '<p>Annual river cleanup&nbsp;</p>\r\n', 1, 'Sims Park Boat Ramp', '', 29, 13, 10, 'river.jpeg', 50),
(21, 'Literacy Hub Volunteer', '2022-11-25', '2022-11-25', '10:00 AM', '4:00 PM', '<p>MYReaders&#39; flagship Literacy Hub is designed to be a structured and sustainable programme<br />\r\nthat provides children in need of English reading intervention with the tools and support that they need.</p>\r\n', 1, 'HOPE Worldwide Kuala Lumpur', '', 30, 14, 10, 'literacy-hub.jpg', 20),
(22, 'Teaching Volunteer', '2022-11-25', '2022-11-27', '10:00 AM', '12:30 PM', '<p>Volunteer&nbsp;to&nbsp;teach<strong> English</strong>, <strong>Maths </strong>and <strong>Science</strong>, with each lesson typically running for an hour.</p>\r\n\r\n<p>You do not need previous training to teach, just commitment and willingness to help.</', 1, 'SHELTER Home For Children', '', 30, 14, 1000, 'teaching-volunteer.jpg', 10),
(24, 'Health Screening', '2022-11-24', '2022-11-24', '3:00 PM', '5:00 PM', '<p>Health Screening Test</p>\r\n', 1, 'Common Ground, 1 Powerhouse', '', 28, 10, 5, 'health-screening.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `participant_no` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`id`, `user_id`, `event_id`, `status`, `participant_no`) VALUES
(75, 22, 15, 1, 1),
(76, 26, 22, 1, 1),
(77, 24, 18, 1, 1),
(83, 28, 21, 1, 3),
(84, 28, 15, 1, 0),
(85, 26, 15, 0, 2),
(86, 26, 19, 0, 3),
(90, 30, 21, 0, 5),
(92, 24, 21, 1, 1),
(94, 24, 22, 0, 1),
(95, 30, 18, 1, 2),
(97, 27, 19, 0, 0),
(98, 31, 21, 0, 1),
(101, 32, 16, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  `logo_url` varchar(255) NOT NULL,
  `org_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `user_id`, `org_name`, `status`, `description`, `logo_url`, `org_url`) VALUES
(9, 23, 'Hunters International', 1, '<p>Hunters International is an award winning integrated HR Solutions company which<br />\r\nspecializes in Executive Search, HR Consultancy, Payroll Services<br />\r\nand HR Information System among others.</p>\r\n', 'huntersintl.jpg', 'https://www.hunters-in.com/'),
(10, NULL, 'Common Ground ', 1, '<p>Helping people lead healthier lives</p>\r\n', 'CG_logo-green.png', 'https://www.commonground.work/my-en/locations/bandar-utama/'),
(11, NULL, 'Pantai Hospital', 1, '<p>Located in a popular district of Selangor, Pantai Hospital Klang provides<br />\r\nquality and affordable healthcare services to the community in Klang</p>\r\n', 'logo_phkl_v2.png', 'https://www.pantai.com.my/klang'),
(12, 23, 'Kechara Soup Kitchen', 1, '<p>Starting out as a small group of people passionate about helping others,<br />\r\nKSK quickly grew via word-of-mouth.<br />\r\n<br />\r\nToday, we consist of volunteers from all walks of life.</p>\r\n', 'kechara_logo.png', 'https://kecharasoupkitchen.com/general-volunteer/'),
(13, 25, 'The Ocean Cleanup', 1, '<p>At The Ocean Cleanup, we see ourselves as the architects of river projects<br />\r\nto stop the inflow of plastic into the oceans.<br />\r\n&nbsp;</p>\r\n', 'theoceancleanup.jpg', 'https://theoceancleanup.com/rivers'),
(14, 23, 'MYReaders', 1, '<p>Empowering children through literacy</p>\r\n', 'myreaders_horizontalblue.png', 'https://www.myreaders.org.my/');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT '1' COMMENT '0=Admin, 1=User, 2=Organizer',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `points`, `role`, `status`) VALUES
(22, 'Test', 'Dev', 'admin@email.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, 1),
(23, 'Test', 'Organizer ', 'organizer@email.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 2, 1),
(24, 'Test ', 'User', 'user@email.com', '8cb2237d0679ca88db6464eac60da96345513964', 30, 1, 1),
(25, 'Mary', 'Ocean', 'mary@ocean.org', '8cb2237d0679ca88db6464eac60da96345513964', 0, 2, 1),
(26, 'John', 'Smith', 'js@email.com', '8cb2237d0679ca88db6464eac60da96345513964', 1000, 1, 1),
(27, 'Ali ', 'Baba', 'alibaba@email.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 1),
(28, 'Colby', 'B', 'colby@email.com', '8cb2237d0679ca88db6464eac60da96345513964', 20, 1, 1),
(29, 'Mariam', 'Ishtar', 'mariam@email.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 1),
(30, 'River', 'Lee', 'riverlee@email.com ', '8cb2237d0679ca88db6464eac60da96345513964', 20, 1, 1),
(31, 'Moon ', 'Moon', 'moon@email.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 1),
(32, 'Jane', 'Smith', 'jane@smith.com', '8cb2237d0679ca88db6464eac60da96345513964', 30, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earned_badges`
--
ALTER TABLE `earned_badges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `badge_id` (`badge_key`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `organization` (`organization`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `earned_badges`
--
ALTER TABLE `earned_badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `earned_badges`
--
ALTER TABLE `earned_badges`
  ADD CONSTRAINT `earned_badges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`organization`) REFERENCES `organization` (`id`);

--
-- Constraints for table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `mission_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `mission_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
