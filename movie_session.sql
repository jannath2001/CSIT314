-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 10:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
-- Table structure for table `movie_session`
--

CREATE TABLE `movie_session` (
  `movie_session_id` int(11) NOT NULL,
  `movie_session_roomId` int(11) NOT NULL,
  `movie_session_movieId` int(11) NOT NULL,
  `movie_session_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_session`
--

INSERT INTO `movie_session` (`movie_session_id`, `movie_session_roomId`, `movie_session_movieId`, `movie_session_time`) VALUES
(4, 1, 11, '13:00:00'),
(7, 1, 11, '16:00:00'),
(8, 1, 11, '15:00:00'),
(9, 2, 11, '00:00:00'),
(12, 1, 11, '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie_session`
--
ALTER TABLE `movie_session`
  ADD PRIMARY KEY (`movie_session_id`),
  ADD KEY `movieSessionRoomId` (`movie_session_roomId`),
  ADD KEY `movieSessionMovieId` (`movie_session_movieId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie_session`
--
ALTER TABLE `movie_session`
  MODIFY `movie_session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_session`
--
ALTER TABLE `movie_session`
  ADD CONSTRAINT `movieSessionMovieId` FOREIGN KEY (`movie_session_movieId`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `movieSessionRoomId` FOREIGN KEY (`movie_session_roomId`) REFERENCES `room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
