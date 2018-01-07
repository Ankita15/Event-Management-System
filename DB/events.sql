-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 01:44 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `carpool`
--

CREATE TABLE `carpool` (
  `carpool_id` int(11) NOT NULL,
  `carpool_request` varchar(200) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpool`
--

INSERT INTO `carpool` (`carpool_id`, `carpool_request`, `event_id`, `user_id`) VALUES
(2, '2 seats available on the way to event.!!', 1, 'ray@uncc.edu'),
(3, 'Is anyone going to attend this event? Willing to share expenses.\r\n\r\n', 1, 'asharm50@uncc.edu'),
(5, 'Interested in going to this event. If anyone going, please let me know, willing to share expenses.\r\nThanks', 4, 'ray@uncc.edu'),
(6, 'Need carpool', 1, 'ray@uncc.edu'),
(7, 'Hello', 21, 'mkale33@uncc.edu'),
(8, 'hi', 23, 'mkale33@uncc.edu');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `commentText` varchar(500) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `commentText`, `event_id`, `user_id`) VALUES
(16, 'Awesome Event!!', 1, 'asharm50@uncc.edu'),
(17, 'Die hard fan of enrique must attend this event :)\r\n', 4, 'ray@uncc.edu'),
(18, 'East or West 49ers Charlotte 49ers are the best.', 10, 'ray@uncc.edu'),
(19, 'Proud to be a 49er', 11, 'asharm50@uncc.edu'),
(20, 'Delicious food with great ambience', 12, 'ray@uncc.edu'),
(22, 'Got hired by Google , Yayy :)', 14, 'mkale3@uncc.edu'),
(23, 'Lots of opportunties to grab , don\'t miss this event.', 15, 'mkale3@uncc.edu'),
(24, 'Hi', 1, 'ray@uncc.edu');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_desc` varchar(200) NOT NULL,
  `event_images` varchar(64) NOT NULL,
  `event_date` date NOT NULL,
  `event_venue` varchar(50) NOT NULL,
  `event_time` time NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `event_category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_desc`, `event_images`, `event_date`, `event_venue`, `event_time`, `user_id`, `event_category`) VALUES
(1, 'The Chainsmokers Concert', 'The Chainsmokers is an American DJ/producer duo consisting of Andrew Taggart and Alex Pall.\r\nAre you excited??? Get ready for the smashing performance of America\'s Top Band- The Chainsmokers ', 'chainsmoker.jpg', '2017-04-08', 'Charlotte', '10:00:00', 'asharm50@uncc.edu', 'musical'),
(4, 'Enrique Iglesias Concert', 'Enrique is coming to Charlotte, NC on May 13th 2017 for Expo Fiesta Fest 2017!', 'enrique.png', '2017-05-13', 'Charlotte NC', '05:00:00', 'asharm50@uncc.edu', 'musical'),
(10, '49ers Football Game', 'The Charlotte 49ers football program will host its annual Green-White Spring Game, Saturday at 6 pm at Jerry Richardson Stadium.  ', 'football1.jpg', '2017-04-29', 'Jerry Richardson Stadium Charlotte NC', '06:00:00', 'ray@uncc.edu', 'sports'),
(11, '49er Basketball Game', '49ers host Louisiana Tech for Conference USA game ', 'basketball.jpg', '2017-04-30', 'Halton Arena UNC Charlotte', '07:00:00', 'ray@uncc.edu', 'sports'),
(12, 'Charlotte Food Fest', 'Come and enjoy variety of cuisines!! Complimentary Drinks with any food. ', 'foodfest.jpg', '2017-05-02', '9512 Charlotte NC', '06:00:00', 'ray@uncc.edu', 'food'),
(13, 'Lunch & Learn', 'Come and interact with top companies like BOFA, Google, IBM, HP and many more!! Free Food ', 'lunchlearn.jpg', '2017-05-04', 'Woodward Hall UNC Charlotte UNC', '02:00:00', 'asharm50@uncc.edu', 'food'),
(14, 'Charlotte Career Fair 2017', 'Don\'t miss the opportunity to get hired by companies like Google, BOFA, Wells Faro, Facebook and many more.', 'career1.jpg', '2017-05-02', 'Belk Stadium UNC', '09:00:00', 'asharm50@uncc.edu', 'career'),
(15, 'Summer Internship Fair', 'Summer Internship Fair is here!! Come and get hired by the company officials.', 'career2.jpg', '2017-05-06', 'Woodward Lounge UNC Charlotte', '02:00:00', 'asharm50@uncc.edu', 'career'),
(17, 'SSDI FINAL EXAM', 'Bring 1 cheat sheet', '', '2017-05-05', 'Woodward 125', '05:00:00', 'asharm50@uncc.edu', 'career'),
(20, 'CHARLOTTE FOOD TRUCK FEST 2017', 'Here we go again foodies! We have our dates set and now we are excited to come to Charlotte for the largest food truck fest of 2017.', 'truckfest.jpg', '2017-04-30', 'Charlotte', '09:00:00', 'parie@uncc.edu', 'food');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(64) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_type` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_type`) VALUES
('anki@uncc.edu', 'anki', '26a3a8e17fd3b29064e31f22e8f2a203', 'Contributor'),
('asharm50@uncc.edu', 'Ankita', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('himanshy@uncc.edu', 'Himanshu', '4122ea4f5490094a33d7cdba65136cf8', 'Contributor'),
('mkale33@uncc.edu', 'Mike', '098f6bcd4621d373cade4e832627b4f6', 'Contributor'),
('mkale3@uncc.edu', 'Mike', '2kdjhgjgjgiuh7788', 'Contributor'),
('parie@uncc.edu', 'parie', 'b53eab8b45fcf49f3ce12f627c93d46f', 'Contributor'),
('priya@uncc.edu', 'Priyanka ', '0b1c8bc395a9588a79cd3c191c22a6b4', 'Contributor'),
('ray@uncc.edu', 'Ray', '070dd72385b8b2b205db53237da57200', 'Contributor'),
('test@uncc.edu', 'test', '23hjggghetqwetbbjklj7789', 'Contributor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carpool`
--
ALTER TABLE `carpool`
  ADD PRIMARY KEY (`carpool_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `carpool_ibfk_1` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_ibfk_1` (`event_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carpool`
--
ALTER TABLE `carpool`
  MODIFY `carpool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carpool`
--
ALTER TABLE `carpool`
  ADD CONSTRAINT `carpool_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
