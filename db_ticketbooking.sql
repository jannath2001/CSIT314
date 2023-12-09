-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 11:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ticketbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(50) NOT NULL,
  `movie_id` int(50) NOT NULL,
  `ticket_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `room_id` int(30) NOT NULL,
  `Date` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `num_of_ticket` int(30) NOT NULL,
  `seat_num` varchar(50) NOT NULL,
  `review` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `movie_id`, `ticket_id`, `user_id`, `room_id`, `Date`, `location`, `time`, `num_of_ticket`, `seat_num`, `review`) VALUES
(50, 9, 53, 1, 2, '2023-12-19', 'jewel', '11:00:00', 1, 'B3', 3),
(51, 11, 54, 1, 5, '2023-12-18', 'cathay', '11:00:00', 1, 'C2', 2),
(52, 16, 55, 1, 4, '2023-12-16', 'cathay', '11:00:00', 2, 'B3, C3', 0),
(53, 18, 56, 1, 3, '2023-12-15', 'cathay', '11:00:00', 1, 'C3', 0),
(54, 11, 57, 10, 5, '2023-12-15', 'bugis', '11:00:00', 1, 'D3', 0),
(55, 15, 58, 10, 4, '2023-12-18', 'cathay', '11:00:00', 1, 'C3', 0),
(56, 2, 59, 10, 6, '2023-12-16', 'bugis', '11:00:00', 3, 'C3, D3, E3', 0),
(57, 18, 60, 10, 3, '2023-12-17', 'cathay', '11:00:00', 2, 'B2, B3', 0),
(58, 17, 61, 10, 4, '2023-12-19', 'cathay', '11:00:00', 2, 'B3, C3', 0),
(59, 9, 62, 10, 2, '2023-12-17', 'cathay', '11:00:00', 2, 'H1, H2', 0),
(60, 11, 63, 2, 5, '2023-12-18', 'cathay', '11:00:00', 1, 'B3', 2),
(61, 16, 64, 1, 4, '2023-12-17', 'cathay', '11:00:00', 2, 'D1, E1', 2),
(62, 2, 65, 1, 6, '2023-12-19', 'jewel', '11:00:00', 1, 'C2', 0),
(63, 17, 66, 1, 4, '2023-12-19', 'cathay', '11:00:00', 2, 'A2, B2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_beverage`
--

CREATE TABLE `food_beverage` (
  `menu_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_beverage`
--

INSERT INTO `food_beverage` (`menu_id`, `item_name`, `description`, `price`, `image`) VALUES
(2, 'Nachos', 'Mexican Nachos', 12, 'nachos.jpg'),
(3, 'Coke', 'Best soft drink', 8, 'coke.jpg'),
(6, 'Popcorn', 'Buttered Popcorn', 10, 'popcorn.jpg'),
(9, 'burger', 'Spicy burger', 4, 'burger.jpg'),
(10, 'Hot Chocolate', 'Warm and soothing Chocolate', 3, 'hotChocolate.jpg'),
(11, 'Fries', 'Seaweed Fries', 2, 'fries.jpg'),
(12, 'Hot dog', 'Tasty and Home-made', 4, 'hotDog.jpg'),
(13, 'Oatmilk', 'Our Specialty', 1, 'oatmilk.jpg'),
(14, 'Popcorn Chicken', 'Sweet and Salty', 4, 'popcornChicken.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `password` varchar(30) NOT NULL,
  `token` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`password`, `token`, `email`, `user_id`, `user_type`) VALUES
('123', '', 'abc@gmail.com', 1, 'loyaltyMember'),
('458', '', 'def@gmail.com', 2, 'loyaltyMember'),
('staff', '', 'staff@gmail.com', 3, 'staff'),
('manager', '', 'manager@gmail.com', 4, 'manager'),
('sysadmin1', '', 'sysadmin@gmail.com', 5, 'systemAdmin'),
('customer', '', 'binxin@gmail.com', 8, 'loyaltyMember'),
('customer', '', 'sonia@gmail.com', 9, 'loyaltyMember'),
('customer', '', 'amina@gmail.com', 10, 'loyaltyMember'),
('customer', '', 'sathya@gmail.com', 11, 'loyaltyMember'),
('customer', '', 'jiazhen@gmail.com', 12, 'loyaltyMember');

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_member`
--

CREATE TABLE `loyalty_member` (
  `member_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `points` int(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loyalty_member`
--

INSERT INTO `loyalty_member` (`member_name`, `birthday`, `points`, `email`, `user_id`) VALUES
('brenda', '2023-05-03', 976, 'abc@gmail.com', 1),
('xinyu', '2013-03-25', 203, 'def@gmail.com', 2),
('lenis', '2013-05-01', 500, 'lenis@gmail.com', 4),
('damien', '2014-05-12', 500, 'damien@gmail.com', 5),
('junlin', '2017-07-28', 500, 'junlin@gmail.com', 7),
('binxin', '2013-01-10', 100, 'binxin@gmail.com', 8),
('sonia', '2023-10-07', 100, 'sonia@gmail.com', 9),
('amina', '2023-05-08', 259, 'amina@gmail.com', 10),
('sathya', '2023-05-17', 100, 'sathya@gmail.com', 11),
('jiazhen', '2018-05-02', 500, 'jiazhen@gmail.com', 12);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `format` varchar(50) NOT NULL,
  `rating` int(10) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `duration` int(20) NOT NULL,
  `age_rating` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `MovieSynopsis` varchar(250) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `room_id`, `availability`, `price`, `format`, `rating`, `genre`, `duration`, `age_rating`, `subtitle`, `MovieSynopsis`, `movie_name`, `image`) VALUES
(1, 5, 'Available', 12, '3D', 2, 'comedy', 220, 'PG', 'chinese', 'The USS Enterprise crew travels to the forbidden zone in space to rescue an endangered species. Captain Kirk then leads his team to a war-zone world in search of a weapon of mass destruction.', 'Star Trek into the darkness', 'Movie1.jpg'),
(2, 6, 'Available', 20, '4D', 3, 'Comedy', 119, 'PG13', 'chinese', 'Thor embarks on a journey unlike anything he\'s ever faced -- a quest for inner peace. However, his retirement gets interrupted by Gorr the God Butcher, a galactic killer who seeks the extinction of the gods', 'Thor : Love and Thunder', 'Movie2.jpg'),
(9, 2, 'Available', 23, '4D', 3, 'Action', 190, 'PG', 'chinese', 'Miles faces his own challenges while he seeks out who he truly is..', 'Spider-Man Into the spider-verse', 'spiderman.jpg'),
(11, 5, 'Unavailable', 45, 'Digital', 4, 'Comedy', 98, 'PG', 'English', 'In the primaeval era, Grug and his family risk the dangers of their surroundings to find a new dwelling place. Along the way, they meet a modern boy who woos them with his adventurous ways.', 'Les Croods', 'Movie3.jpg'),
(15, 4, 'Available', 7, 'Digital', 4, 'Drama', 116, 'PG13', 'Chinese', 'Jung Seok, a former soldier, along with his teammates, sets out on a mission to battle hordes of post-apocalyptic zombies in the Korean peninsula wastelands.', 'Peninsula', 'm-2.jpg'),
(16, 4, 'Available', 10, 'Digital', 3, 'crime ', 102, 'NC16', 'English', 'Eli and Jimmy Solinski struggle to save themselves from criminals seeking vengeance, federal officials and soldiers from another world.', 'Kin', 'm-1.jpg'),
(17, 4, 'Available', 12, '3D/ Imax', 3, 'Science Fiction', 162, 'PG13', 'Chinese', 'Cobb steals information from his targets by entering their dreams. Saito offers to wipe clean Cobb\'s criminal history as payment for performing an inception on his sick competitor\'s son.', 'Inception', 'm-3.jpg'),
(18, 3, 'available', 11, 'Digital', 4, 'Comedy / Superhero', 130, 'PG', 'English', 'Tony Stark encounters a formidable foe called the Mandarin. After failing to defeat his enemy, Tony embarks on a journey of self-discovery as he fights against the powerful Mandarin.', 'Iron Man 3', 'm-4.jpg'),
(19, 3, 'Available', 10, '3D / Imax', 4, 'Horror', 115, 'NC16', 'chinese', 'After witnessing a bizarre, traumatic incident involving a patient, Dr. Rose Cotter starts experiencing frightening occurrences that she can\'t explain. As an overwhelming terror begins taking over her life, Rose must confront her troubling past in or', 'Smile', 'smile.png');

-- --------------------------------------------------------

--
-- Table structure for table `movie_session`
--

CREATE TABLE `movie_session` (
  `movie_session_id` int(11) NOT NULL,
  `movie_session_roomId` int(11) NOT NULL,
  `movie_session_movieId` int(11) NOT NULL,
  `movie_session_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_session`
--

INSERT INTO `movie_session` (`movie_session_id`, `movie_session_roomId`, `movie_session_movieId`, `movie_session_time`) VALUES
(66, 5, 1, '13:00:00'),
(67, 6, 2, '14:00:00'),
(68, 2, 9, '15:00:00'),
(69, 5, 11, '16:00:00'),
(70, 4, 15, '11:00:00'),
(71, 4, 16, '12:00:00'),
(72, 4, 17, '13:00:00'),
(73, 3, 18, '16:00:00'),
(74, 3, 19, '15:00:00'),
(75, 3, 25, '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `movie_ticket`
--

CREATE TABLE `movie_ticket` (
  `ticket_id` int(50) NOT NULL,
  `user_id` int(20) NOT NULL,
  `seat_num` varchar(50) NOT NULL,
  `movie_id` int(50) NOT NULL,
  `room_id` int(50) NOT NULL,
  `total` int(20) NOT NULL,
  `date` date NOT NULL,
  `Time` time NOT NULL,
  `ticketType` varchar(50) NOT NULL,
  `location` varchar(70) NOT NULL,
  `num_of_ticket` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_ticket`
--

INSERT INTO `movie_ticket` (`ticket_id`, `user_id`, `seat_num`, `movie_id`, `room_id`, `total`, `date`, `Time`, `ticketType`, `location`, `num_of_ticket`) VALUES
(53, 1, 'B3', 9, 2, 23, '2023-12-19', '11:00:00', 'adult', 'jewel', 1),
(54, 1, 'C2', 11, 5, 45, '2023-12-18', '11:00:00', 'adult', 'cathay', 1),
(55, 1, 'B3, C3', 16, 4, 40, '2023-12-16', '11:00:00', 'student', 'cathay', 2),
(56, 1, 'C3', 18, 3, 21, '2023-12-15', '11:00:00', 'adult', 'cathay', 1),
(57, 10, 'D3', 11, 5, 49, '2023-12-15', '11:00:00', 'student', 'bugis', 1),
(58, 10, 'C3', 15, 4, 15, '2023-12-18', '11:00:00', 'student', 'cathay', 1),
(59, 10, 'C3, D3, E3', 2, 6, 66, '2023-12-16', '11:00:00', 'adult', 'bugis', 3),
(60, 10, 'B2, B3', 18, 3, 42, '2023-12-17', '11:00:00', 'adult', 'cathay', 2),
(61, 10, 'B3, C3', 17, 4, 29, '2023-12-19', '11:00:00', 'adult', 'cathay', 2),
(62, 10, 'H1, H2', 9, 2, 58, '2023-12-17', '11:00:00', 'adult', 'cathay', 2),
(63, 2, 'B3', 11, 5, 45, '2023-12-18', '11:00:00', 'adult', 'cathay', 1),
(64, 1, 'D1, E1', 16, 4, 34, '2023-12-17', '11:00:00', 'adult', 'cathay', 2),
(65, 1, 'C2', 2, 6, 30, '2023-12-19', '11:00:00', 'adult', 'jewel', 1),
(66, 1, 'A2, B2', 17, 4, 19, '2023-12-19', '11:00:00', 'student', 'cathay', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `reward_id` int(10) NOT NULL,
  `reward_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `reward_Point` int(10) NOT NULL,
  `rewardAmount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`reward_id`, `reward_name`, `description`, `image`, `reward_Point`, `rewardAmount`) VALUES
(1, 'Reward 2', '$10 off', 'reward2.jpg', 100, 10),
(6, 'Reward 1', '$5 discount', 'reward1.jpg', 50, 5),
(7, 'Reward 3', '$15 off', 'reward3.jpg', 150, 15),
(8, 'Reward 4', '$12 off', 'reward6.jpg', 100, 12),
(9, 'Reward 5', '$13 off', 'reward6.jpg', 100, 13),
(10, 'Reward 6', '$14 off', 'reward6.jpg', 100, 14),
(12, 'Reward 8', '$16 off', 'reward6.jpg', 100, 16),
(13, 'Reward 9', '$17 off', 'reward6.jpg', 100, 17),
(14, 'Reward 10', '$18 off', 'reward6.jpg', 100, 18),
(15, 'Reward 11', '$19 off', 'reward6.jpg', 100, 19),
(16, 'Reward 12', '$20 off', 'reward6.jpg', 120, 20),
(17, 'Reward 13', '$21 off', 'reward6.jpg', 210, 21);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `num_of_seat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `num_of_seat`) VALUES
(1, 30),
(2, 30),
(3, 30),
(4, 30),
(5, 30),
(6, 30),
(7, 30),
(8, 30),
(9, 30),
(10, 30),
(11, 30),
(12, 30),
(13, 30),
(14, 30),
(15, 30),
(16, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `FK10` (`movie_id`),
  ADD KEY `Fk11` (`user_id`),
  ADD KEY `FK12` (`ticket_id`),
  ADD KEY `FK13` (`room_id`);

--
-- Indexes for table `food_beverage`
--
ALTER TABLE `food_beverage`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `loyalty_member`
--
ALTER TABLE `loyalty_member`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `FK1` (`room_id`);

--
-- Indexes for table `movie_session`
--
ALTER TABLE `movie_session`
  ADD PRIMARY KEY (`movie_session_id`),
  ADD KEY `movieSessionRoomId` (`movie_session_roomId`),
  ADD KEY `movieSessionMovieId` (`movie_session_movieId`);

--
-- Indexes for table `movie_ticket`
--
ALTER TABLE `movie_ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `FK8` (`movie_id`),
  ADD KEY `FK9` (`room_id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`reward_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `food_beverage`
--
ALTER TABLE `food_beverage`
  MODIFY `menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `loyalty_member`
--
ALTER TABLE `loyalty_member`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `movie_session`
--
ALTER TABLE `movie_session`
  MODIFY `movie_session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `movie_ticket`
--
ALTER TABLE `movie_ticket`
  MODIFY `ticket_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `reward_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `movie_session`
--
ALTER TABLE `movie_session`
  ADD CONSTRAINT `movieSessionMovieId` FOREIGN KEY (`movie_session_movieId`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `movieSessionRoomId` FOREIGN KEY (`movie_session_roomId`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `movie_ticket`
--
ALTER TABLE `movie_ticket`
  ADD CONSTRAINT `FK8` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `FK9` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
