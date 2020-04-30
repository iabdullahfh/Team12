-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 01:34 PM
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
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `UserID`, `ProductID`, `Title`, `Comment`, `Response`, `Category`, `Date`, `upVote`, `Status`) VALUES
(3, NULL, 1, '  TEST 3', ' Tell us what you thought...', 'Response test3', 'Feature request', '2020-03-17', 0, 1),
(4, NULL, 1, '  TEST 4', ' Tell us what you thought...', 'Thanks for your response!', 'Idea', '2020-03-17', 9, 1),
(9, NULL, 2, '  TEST 5', ' Tell us what you thought...', '', 'Feature request', '2020-03-17', 0, 1),
(10, NULL, 1, '  TEST 6', ' Tell us what you thought...', '', 'Feedback', '2020-03-20', 2, 1),
(13, NULL, 2, '  TEST 8', ' Tell us what you thought...', '', 'Feedback', '2020-03-20', 1, 1),
(15, NULL, 1, '  TEST 9', ' Tell us what you thought...', '', 'Feedback', '2020-04-01', 3, 1),
(17, NULL, 1, '  Test10', 'First class support service: Sage has provided our organisation with exception support for many years. Our recent dealings with them have surpassed our expectations. With a team of experts they have always been able to resolve our issues, both quickly and to our complete satisfaction. We have been particularly impressed with their ability to produce bespoke add-on software and their in-depth knowledge of Report Writer which has its own very unique query language. The products they have helped us to produce have enhanced our working practices, made processes more efficient (saved time) and improved accuracy.', '', 'Idea', '2020-04-08', 0, 1),
(18, NULL, 1, '  TEST11', 'First class support service: Sage has provided our organisation with exception support for many years. Our recent dealings with them have surpassed our expectations. With a team of experts they have always been able to resolve our issues, both quickly and to our complete satisfaction. ', '', 'Feedback', '2020-04-11', 0, 1),
(19, NULL, 2, '  TEST12', 'First class support service: Our organisation has been provided with exception support for many years. Our recent dealings with them have surpassed our expectations.', '', 'Idea', '2020-04-11', 0, 2),
(22, NULL, 1, '  TEST13', ' Tell us what you thought...', 'Thanks for your response!', 'Idea', '2020-04-13', 0, 0),
(79, 15, 1, '  TEST 14', 'I thought....', '', 'Feedback', '2020-04-28', 0, 0),
(80, 16, 1, '  TEST 15', 'I thought this product was....', '', 'Feature request', '2020-04-29', 5, 1),
(81, 16, 1, '  TEST 16', 'I thought...', '', 'Feature request', '2020-04-29', 3, 1),
(82, 16, 1, '  TEST 17', 'I thought that this product was very good.', '', 'Feature request', '2020-04-29', 0, 1);

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
(1, 'Test product', '2940.18', 'test type'),
(2, 'Testproduct2', '1000.00', 'testProd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` tinytext CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Password` tinytext CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `EmailAddress` tinytext CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `EmailAddress`, `Type`) VALUES
(15, 'User1', '$2y$10$SSO7G1CqARQnUpdxHPrmNeKCd0PyMjz7OcQLAHZ7iIQknjIlISOEK', 'u@uname.com', 0),
(16, 'Admin', '$2y$10$PJ/r6yBz.6yExgEI5hYB.OqSBX0OUqPyL1/uMx3OdHjTyGrChjI3C', 'admin@admin.com', 1);

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
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`VoteID`, `UserID`, `FeedbackID`) VALUES
(14, 15, 17),
(15, 15, 17),
(17, 15, 10),
(18, 15, 15),
(19, 16, 80),
(20, 16, 17);

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
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `VoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
