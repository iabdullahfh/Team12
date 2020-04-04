-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 12:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback system v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Title` varchar(20) DEFAULT NULL,
  `Comment` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Response` varchar(250) NOT NULL,
  `Category` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `upVote` int(11) NOT NULL,
  `downVote` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `UserID`, `ProductID`, `Title`, `Comment`, `Response`, `Category`, `Date`, `upVote`, `downVote`, `Status`) VALUES
(1, NULL, NULL, '  TEST 1', ' Tell us what you thought...', '', 'Feature request', '2020-03-17', 0, 0, 1),
(2, NULL, NULL, '  TEST 2', ' Tell us what you thought...', '', 'Idea', '2020-03-17', 7, 7, 1),
(3, NULL, NULL, '  TEST 3', ' Tell us what you thought...', '', 'Feature request', '2020-03-17', 0, 0, 1),
(4, NULL, NULL, '  TEST 4', ' Tell us what you thought...', '', 'Feedback', '2020-03-20', 0, 0, 1),
(5, NULL, NULL, '  TEST 5', ' Tell us what you thought...', '', 'Idea', '2020-03-20', 4, 3, 1),
(6, NULL, NULL, '  TEST 6', ' Tell us what you thought...', '', 'Feedback', '2020-03-20', 0, 0, 1),
(7, NULL, NULL, '  TEST 7', ' Tell us what you thought...', '', 'Feedback', '2020-04-01', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  `Type` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Price`, `Type`) VALUES
(1, 'Test product', '2940.18', 'test type');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Password` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `EmailAddress` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `VoteID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FeedbackID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `ProductID_FK` (`ProductID`),
  ADD KEY `UserID_FK` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`VoteID`),
  ADD KEY `UserIDFK` (`UserID`),
  ADD KEY `FeedBackIDFK` (`FeedbackID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `VoteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `ProductID_FK` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE,
  ADD CONSTRAINT `UserID_FK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `FeedBackIDFK` FOREIGN KEY (`FeedbackID`) REFERENCES `feedback` (`FeedbackID`) ON DELETE CASCADE,
  ADD CONSTRAINT `UserIDFK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
