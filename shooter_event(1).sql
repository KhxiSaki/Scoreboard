-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 04:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shooter_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `centrefire`
--

CREATE TABLE `centrefire` (
  `CentreFire_ID` int(10) NOT NULL,
  `Participant_ID` int(10) NOT NULL,
  `TotalScore` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `centrefire`
--

INSERT INTO `centrefire` (`CentreFire_ID`, `Participant_ID`, `TotalScore`) VALUES
(11, 21, 28),
(12, 22, 28);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `Group_ID` int(10) NOT NULL,
  `Group_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `Participant_ID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Group_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`Participant_ID`, `name`, `Group_ID`) VALUES
(21, 'aiman', 21),
(22, 'Test', 21),
(23, 'tester', 21);

-- --------------------------------------------------------

--
-- Table structure for table `platescore`
--

CREATE TABLE `platescore` (
  `PlateScore_ID` int(10) NOT NULL,
  `group_ID` int(10) NOT NULL,
  `TotalScore` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `Score_ID` int(10) NOT NULL,
  `Score` int(10) NOT NULL,
  `ScoreName` varchar(100) NOT NULL,
  `Participant_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`Score_ID`, `Score`, `ScoreName`, `Participant_ID`) VALUES
(204, 1, 'Score1', 21),
(205, 2, 'Score2', 21),
(206, 3, 'Score3', 21),
(207, 4, 'Score4', 21),
(208, 5, 'Score5', 21),
(209, 6, 'Score6', 21),
(210, 8, 'Score7', 21),
(218, 2, 'Score1', 22),
(219, 2, 'Score2', 22),
(220, 3, 'Score3', 22),
(221, 4, 'Score4', 22),
(222, 5, 'Score5', 22),
(223, 6, 'Score6', 22),
(224, 7, 'Score7', 22),
(232, 1, 'Score1', 23),
(233, 0, 'Score2', 23),
(234, 0, 'Score3', 23),
(235, 0, 'Score4', 23),
(236, 0, 'Score5', 23),
(237, 0, 'Score6', 23),
(238, 0, 'Score7', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centrefire`
--
ALTER TABLE `centrefire`
  ADD PRIMARY KEY (`CentreFire_ID`),
  ADD KEY `Participant_ID_fk` (`Participant_ID`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`Group_ID`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`Participant_ID`),
  ADD KEY `group_ID_fk` (`Group_ID`);

--
-- Indexes for table `platescore`
--
ALTER TABLE `platescore`
  ADD PRIMARY KEY (`PlateScore_ID`),
  ADD KEY `group_ID_fk` (`group_ID`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`Score_ID`),
  ADD UNIQUE KEY `Participant_ID` (`Participant_ID`,`ScoreName`),
  ADD KEY `Participant_ID_fk` (`Participant_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centrefire`
--
ALTER TABLE `centrefire`
  MODIFY `CentreFire_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `Group_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `Participant_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `platescore`
--
ALTER TABLE `platescore`
  MODIFY `PlateScore_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `Score_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
