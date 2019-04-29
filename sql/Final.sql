-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 06:58 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `c_name` varchar(100) DEFAULT NULL,
  `c_phone` char(14) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `imagename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `start_time`, `end_time`, `address`, `city`, `state`, `description`, `capacity`, `c_name`, `c_phone`, `c_email`, `imagename`) VALUES
(10, 'Computers for the Blind', '2019-06-12 16:30:00', '2019-06-12 17:15:00', '1201 South Sherman Street', 'Richardson', 'TX', 'Volunteers go through a check list of tasks necessary to refurbish a computer, which takes about 3 hours. They blow out the dust bunnies, wipe the hard drives, bring the computers up to specs, install Windows 10, add accessibility software and much more.', 10, 'Robin Stall', '9728829182', 'robins@utdallas.edu', 'DSC01224-702x400.jpg'),
(11, 'North Texas Food Bank', '2019-11-05 14:30:00', '2019-11-05 16:00:00', 'NTFB, Mapleshade Lane', 'Plano', 'TX', 'Help the North Texas Food Bank sort through their food donations!', 25, 'Jack Hastings', '2143152234', 'hjack@ntfb.com', 'photo410.jpg'),
(12, 'Our Childrens House', '2018-04-01 09:00:00', '2018-04-01 10:00:00', '1340 Empire Central Drive', 'Dallas', 'TX', 'Interact with kids at the children\'s hospital and make their day better!', 10, 'Anthony Benett', '5124447580', 'anthonybenett@och.com', 'sldvsdh.jpg'),
(13, 'Trash Pickup', '2019-05-15 12:30:00', '2019-05-15 13:45:00', '6532 Oak ridge drive', 'Dallas', 'TX', 'Follow along with the #trashbag challenge and help make your community better.', 35, 'Brandon Armstrong', '6962215479', 'brandon.a@gov.com', 'Document.jpg'),
(14, 'Stewpot Dinner', '2019-08-13 15:00:00', '2019-08-13 16:15:00', '1818 Corsicana Street', 'Dallas', 'TX', 'Help provide a meal to the homeless of the area.', 15, 'Harry Potter', '7495215896', 'harry@potter.com', 'TheBridgeBreakfast-10.jpg'),
(15, 'National Volunteer Week - Piggy Bank Painting', '2019-04-30 11:00:00', '2019-04-30 11:45:00', '800 W Campbell Rd', 'Richardson', 'TX', 'Paint a piggy bank and support youth financial awareness programs! Piggy banks are a simple and fun savings solution for children of all ages. They help promote financial responsibility and serve as a reminder to spend wisely.', 18, 'Richard Benson', '(972) 883-2201', 'president@utdallas.edu', 'il_794xN.724288204_crrw.jpg'),
(16, 'Earth Week - UT Dallas Earth Fair', '2019-11-25 10:45:00', '2019-11-25 11:45:00', '800 W Campbell Rd', 'Richardson', 'TX', 'The Earth Fair features booths and interactive activities from student organizations, campus departments, and community agencies. There will be music, free earthy items, and good, clean, green fun!', 10, 'Richard Benson', '(972) 883-2201', 'president@utdallas.edu', 'Earth_Week_Art.png'),
(17, 'Adopt-a-Highway ', '2019-09-16 18:00:00', '2019-09-16 19:30:00', '1645 Mapleshade Ln', 'Plano', 'TX', 'Do not mess with Texas and join us as we clean up a stretch of President George Bush Turnpike and beautify our great state!', 10, 'John Wall', '9728836698', 'wall@utdallas.edu', 'adopt_a_highway.jpg'),
(18, 'Read to Children', '2019-04-21 10:30:00', '2019-04-21 16:00:00', 'Jubilee Park & Community Center, Bank Street', 'Dallas', 'TX', 'Read to the children in your community and help them get interested in reading.', 10, 'Julia Stevens', '4697785129', 'julia@gmail.com', 'Color-Provider-reading-to-kids-1.jpg'),
(19, 'Dream Gala', '2019-05-17 20:15:00', '2019-05-17 21:30:00', 'Omni Dallas Hotel, South Lamar Street', 'Dallas', 'TX', 'The Greater Dallas Chapter of JDRF, the leading global organization focused on type 1 diabetes (T1D) research, will host its annual Dream Gala honoring Cliff Harris.', 10, 'Allison Banks', '2147458612', 'abanks@yahoo.com', '112718_JDRF_DGE_LOGO-01.png'),
(29, 'UREC Fitness - Sweat 45 Series', '2019-04-29 10:00:00', '2019-04-29 11:00:00', 'AC Multipurpose Green 800 W Campbell ', 'Richardson', 'TX', 'Registration required at http://tinyurl.com/sweat45  This class is part of an overall Group Fitness Program.  Cost: $3 per Class  Ten Class Pass: $20 for members; $50 for non-members  Unlimited Semester Pass - $50 for members', 15, 'Frankie Branham', '972-883-6310', 'frankie.branham@utdallas.edu', '20181217_164616_439_9954.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `is_registered`
--

CREATE TABLE `is_registered` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_registered`
--

INSERT INTO `is_registered` (`event_id`, `user_id`) VALUES
(13, 21),
(15, 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `phone` char(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `address`, `city`, `state`, `phone`, `email`, `password`, `is_admin`) VALUES
(1, 'Bob', 'Bender', '8794 Garfield', 'Chicago', 'IL', '972-886-3147', 'test@email.com', NULL, 0),
(2, 'James', 'Fass', '8794 Garfield', 'Chicago', 'IL', '972-886-3147', 'test@email.com', NULL, 0),
(3, 'Kim', 'Grace', '6677 Mills Ave', 'Sacramento', 'CA', '972-886-3147', 'test@email.com', NULL, 0),
(4, 'James', 'Borg', '450 Stone', 'Houston', 'TX', '972-886-3147', 'test@email.com', NULL, 0),
(5, 'Alex', 'Freed', '4333 Pillsbury', 'Milwaukee', 'WI', '972-886-3147', 'test@email.com', NULL, 0),
(6, 'Evan', 'Wallis', '134 Pelham', 'Milwaukee', 'WI', '972-886-3147', 'test@email.com', NULL, 0),
(7, 'Jared', 'James', '123 Peachtree', 'Atlanta', 'GA', '972-886-3147', 'test@email.com', NULL, 0),
(8, 'John', 'James', '7676 Bloomington', 'Sacramento', 'CA', '972-886-3147', 'test@email.com', NULL, 0),
(9, 'Andy', 'Vile', '1967 Jordan', 'Milwaukee', 'WI', '972-886-3147', 'test@email.com', NULL, 0),
(10, 'Brad', 'Knight', '176 Main St.', 'Atlanta', 'GA', '972-886-3147', 'test@email.com', NULL, 0),
(11, 'Josh', 'Zell', '266 McGrady', 'Milwaukee', 'WI', '972-886-3147', 'test@email.com', NULL, 0),
(12, 'Justin', 'Mark', '2342 May', 'Atlanta', 'GA', '972-886-3147', 'test@email.com', NULL, 0),
(13, 'Jon', 'Jones', '111 Allgood', 'Atlanta', 'GA', '972-886-3147', 'test@email.com', NULL, 0),
(14, 'Ahmad', 'Jabbar', '980 Dallas', 'Houston', 'TX', '972-886-3147', 'test@email.com', NULL, 0),
(15, 'Joyce', 'English', '5631 Rice', 'Houston', 'TX', '972-886-3147', 'test@email.com', NULL, 0),
(16, 'Ramesh', 'Narayan', '971 Fire Oak', 'Humble', 'TX', '972-886-3147', 'test@email.com', NULL, 0),
(17, 'Alicia', 'Zelaya', '3321 Castle', 'Spring', 'TX', '972-886-3147', 'test@email.com', NULL, 0),
(18, 'Brandon', 'Armstrong', '3321 Riverside', 'Austin', 'TX', '972-886-3147', 'test2@email.com', 'abcd123', 0),
(19, 'Katie', 'Green', '3461 Forest Ln', 'Los Angeles', 'CA', '972-886-3147', 'kgreen@email.com', '123', 1),
(20, 'John', 'Doe', '1234 Main St', 'Dallas', 'TX', '1547896457', 'admin@email.com', '$2y$10$Zkq6TckBzzfBr279jNLrb..3EHDNQrIaw6LsXLasuONy2p3zX7Mu2', 1),
(21, 'Jane', 'Doe', '1234 Main St', 'Dallas', 'TX', '784569564', 'user@email.com', '$2y$10$Aa3QDeyh.dbBjgErM1zKquPhy.T9csBBPbSxicJiV2rMc0lZxZ7u.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_id` (`event_id`);

--
-- Indexes for table `is_registered`
--
ALTER TABLE `is_registered`
  ADD PRIMARY KEY (`event_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `is_registered`
--
ALTER TABLE `is_registered`
  ADD CONSTRAINT `is_registered_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `is_registered_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
