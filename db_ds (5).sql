-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 06:36 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ds`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(26) NOT NULL,
  `activity_venue` varchar(100) NOT NULL,
  `activity_start` datetime NOT NULL,
  `activity_end` datetime NOT NULL,
  `activity_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `timeStart` datetime NOT NULL,
  `timeEnd` datetime NOT NULL,
  `activity_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ces`
--

CREATE TABLE `ces` (
  `ces_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `ces_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facilitator`
--

CREATE TABLE `facilitator` (
  `facilitator_id` int(11) NOT NULL,
  `person_id` varchar(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memfee`
--

CREATE TABLE `memfee` (
  `memFee_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `amtPaid` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `officer_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `officer_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `officer_batch` int(11) NOT NULL,
  `position` enum('President','VP-Internal','VP-External','VP-Finance','VP-Information') NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `person_firstName` varchar(25) NOT NULL,
  `person_lastName` varchar(25) NOT NULL,
  `person_email` varchar(25) NOT NULL,
  `person_phoneNo` varchar(11) DEFAULT NULL,
  `person_type` enum('Student','Officer','Teacher') NOT NULL,
  `person_schoolId` varchar(10) NOT NULL,
  `person_password` varchar(200) NOT NULL,
  `sem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `person_firstName`, `person_lastName`, `person_email`, `person_phoneNo`, `person_type`, `person_schoolId`, `person_password`, `sem_id`) VALUES
(11101997, 'NICOLE FAITH', 'PORO, ', 'asd@gmail.com', '(680) 250-1', 'Student', '11101997', '11101997', 14),
(12100830, 'KAREN KEY', 'CABINGATAN,', 'asd@gmail.com', '(446) 594-7', 'Student', '12100830', '12100830', 14),
(14200078, 'FRANCIS THOMAS', 'COMAR, ', 'asd@gmail.com', '(188) 324-1', 'Student', '14200078', '14200078', 14),
(15101929, 'MARY VERONICA', 'ABANGAN, ', 'asd@gmail.com', '(335) 879-7', 'Student', '15101929', '15101929', 14),
(15102224, ' DOMINIQUE MICHAEL', 'ABEJAR,', 'asd@gmail.com', '(287) 647-7', 'Student', '15102224', '15102224', 14),
(15102642, ' ANDREW JOSHUA', 'EDIOMA,', 'asd@gmail.com', '(527) 947-2', 'Student', '15102642', '15102642', 14),
(15103915, 'DARRELL', 'PILAPIL, ', 'asd@gmail.com', '(129) 893-9', 'Student', '15103915', '15103915', 14),
(15104019, 'RICHARD CYREL', 'AUGUSTO,', 'asd@gmail.com', '(791) 494-0', 'Student', '15104019', '15104019', 14),
(15104186, ' NAVIA MAE', 'AGRAVANTE,', 'asd@gmail.com', '(541) 943-8', 'Student', '15104186', '15104186', 14),
(15104364, 'NICOLAH', 'ENRIQUEZ, ', 'asd@gmail.com', '(587) 621-3', 'Student', '15104364', '15104364', 14),
(15105724, 'EARL VINCENT', 'DABON, ', 'asd@gmail.com', '(845) 460-1', 'Student', '15105724', '15105724', 14),
(15106086, ' RIDENZEL', 'YU,', 'asd@gmail.com', '(390) 910-9', 'Student', '15106086', '15106086', 14),
(15106915, 'BRYAN JAMES ALWIN', 'ISOBAL, ', 'asd@gmail.com', '(130) 866-0', 'Student', '15106915', '15106915', 14),
(15200247, 'DWIGHT ORVEN', 'DIVERA, ', 'asd@gmail.com', '(156) 145-5', 'Student', '15200247', '15200247', 14),
(16100039, 'ANNIKA KRISTIANNE', 'TAN, ', 'asd@gmail.com', '(399) 296-5', 'Student', '16100039', '16100039', 14),
(16101572, ' KARL MICHAEL', 'MAURO,', 'asd@gmail.com', '(571) 285-8', 'Student', '16101572', '16101572', 14),
(16101671, 'VAN COKE', 'VELASQUEZ, ', 'asd@gmail.com', '(490) 976-5', 'Student', '16101671', '16101671', 14),
(16101677, 'NELSON', 'TURAYNO, ', 'asd@gmail.com', '(868) 640-9', 'Student', '16101677', '16101677', 14),
(16101694, 'HANS CHRISTIAN', 'VELOSO, ', 'asd@gmail.com', '(572) 675-7', 'Student', '16101694', '16101694', 14),
(16101698, 'MARY CHRIST', 'CAYHAO, ', 'asd@gmail.com', '(832) 689-5', 'Student', '16101698', '16101698', 14),
(16101776, 'ANGELY MARIE FAITH', 'GELIG, ', 'asd@gmail.com', '(506) 184-9', 'Student', '16101776', '16101776', 14),
(16101788, ' THOMAS TRISTAN', 'CATANE,', 'asd@gmail.com', '(502) 288-1', 'Student', '16101788', '16101788', 14),
(16101792, 'ALYSSA MARIE', 'MARGISON, ', 'asd@gmail.com', '(128) 695-0', 'Student', '16101792', '16101792', 14),
(16101793, ' YEHOO', 'LEE,', 'asd@gmail.com', '(734) 148-6', 'Student', '16101793', '16101793', 14),
(16101810, 'NICK ANDREW', 'AGUIPO, ', 'asd@gmail.com', '(535) 944-9', 'Student', '16101810', '16101810', 14),
(16101906, ' MICHAEL SEBASTIAN', 'CABUSAS, ', 'asd@gmail.com', '(528) 831-9', 'Student', '16101906', '16101906', 14),
(16101909, 'MARK ANTHONY', 'CABUSAS, ', 'asd@gmail.com', '(666) 156-4', 'Student', '16101909', '16101909', 14),
(16101944, 'CLIFF JASPER', 'TABOADA, ', 'asd@gmail.com', '(240) 894-7', 'Student', '16101944', '16101944', 14),
(16101966, ' MARTIN ALBERT', 'GAITERA,', 'asd@gmail.com', '(525) 287-3', 'Student', '16101966', '16101966', 14),
(16101968, 'JOHN DAVID', 'PONO, ', 'asd@gmail.com', '(505) 980-0', 'Student', '16101968', '16101968', 14);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` int(11) NOT NULL,
  `person_id` varchar(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_tutorial`
--

CREATE TABLE `request_tutorial` (
  `request_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `person_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_code` varchar(25) NOT NULL,
  `room_description` varchar(100) NOT NULL,
  `room_type` int(2) NOT NULL,
  `room_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `sy_start` int(4) NOT NULL,
  `sy_end` int(4) NOT NULL,
  `semester_type` enum('First','Second','Summer') NOT NULL,
  `sy_filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `sy_start`, `sy_end`, `semester_type`, `sy_filename`) VALUES
(14, 2016, 2017, 'First', 'CSIT_MASTERLIST_-_PARTIAL-7.xlsx'),
(15, 2016, 2017, 'Second', 'CSIT_MASTERLIST_-_PARTIAL-8.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_course` enum('BSIT','BSCS') NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_course`, `person_id`) VALUES
(122, 'BSIT', 16101810),
(123, 'BSIT', 15104019),
(124, 'BSIT', 12100830),
(125, 'BSIT', 16101909),
(126, 'BSIT', 16101906),
(127, 'BSIT', 16101788),
(128, 'BSIT', 16101698),
(129, 'BSIT', 14200078),
(130, 'BSIT', 15105724),
(131, 'BSIT', 15200247),
(132, 'BSIT', 15102642),
(133, 'BSIT', 15104364),
(134, 'BSIT', 16101966),
(135, 'BSIT', 16101776),
(136, 'BSIT', 15106915),
(137, 'BSCS', 16101793),
(138, 'BSCS', 16101792),
(139, 'BSCS', 16101572),
(140, 'BSCS', 15103915),
(141, 'BSCS', 16101968),
(142, 'BSCS', 11101997),
(143, 'BSCS', 16101944),
(144, 'BSCS', 16100039),
(145, 'BSCS', 16101677),
(146, 'BSCS', 16101671),
(147, 'BSCS', 16101694),
(148, 'BSCS', 15106086),
(149, 'BSCS', 15101929),
(150, 'BSCS', 15102224),
(151, 'BSCS', 15104186),
(152, 'BSIT', 16101810),
(153, 'BSIT', 15104019),
(154, 'BSIT', 12100830),
(155, 'BSIT', 16101909),
(156, 'BSIT', 16101906),
(157, 'BSIT', 16101788),
(158, 'BSIT', 16101698),
(159, 'BSIT', 14200078),
(160, 'BSIT', 15105724),
(161, 'BSIT', 15200247),
(162, 'BSIT', 15102642),
(163, 'BSIT', 15104364),
(164, 'BSIT', 16101966),
(165, 'BSIT', 16101776),
(166, 'BSIT', 15106915),
(167, 'BSCS', 16101793),
(168, 'BSCS', 16101792),
(169, 'BSCS', 16101572),
(170, 'BSCS', 15103915),
(171, 'BSCS', 16101968),
(172, 'BSCS', 11101997),
(173, 'BSCS', 16101944),
(174, 'BSCS', 16100039),
(175, 'BSCS', 16101677),
(176, 'BSCS', 16101671),
(177, 'BSCS', 16101694),
(178, 'BSCS', 15106086),
(179, 'BSCS', 15101929),
(180, 'BSCS', 15102224),
(181, 'BSCS', 15104186);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(14) NOT NULL,
  `subject_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `suggestion_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `suggestion` varchar(1000) NOT NULL,
  `timePost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tutorial_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `ces`
--
ALTER TABLE `ces`
  ADD PRIMARY KEY (`ces_id`);

--
-- Indexes for table `facilitator`
--
ALTER TABLE `facilitator`
  ADD PRIMARY KEY (`facilitator_id`);

--
-- Indexes for table `memfee`
--
ALTER TABLE `memfee`
  ADD PRIMARY KEY (`memFee_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `request_tutorial`
--
ALTER TABLE `request_tutorial`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ces`
--
ALTER TABLE `ces`
  MODIFY `ces_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facilitator`
--
ALTER TABLE `facilitator`
  MODIFY `facilitator_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memfee`
--
ALTER TABLE `memfee`
  MODIFY `memFee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16101969;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request_tutorial`
--
ALTER TABLE `request_tutorial`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
