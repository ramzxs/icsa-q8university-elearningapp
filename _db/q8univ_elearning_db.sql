-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 11:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q8univ_elearning_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `crsID` varchar(15) NOT NULL,
  `crsTitle` varchar(100) NOT NULL,
  `crsDescription` text NOT NULL,
  `crsUnits` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`crsID`, `crsTitle`, `crsDescription`, `crsUnits`) VALUES
('JAVA', 'Java Programming Course', 'Java\r\nProgramming\r\nLanguage', '30.00'),
('UKITL4', 'UK IT Level 4 Diploma in IT', 'International\r\nDiploma\r\nin\r\nInformation Technology', '120.00'),
('WEBDEV', 'Web Development Course', 'Web Design\r\nWeb Development\r\nWebmastering', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `course_material`
--

CREATE TABLE `course_material` (
  `cmID` int(11) NOT NULL,
  `cmCourse` varchar(15) NOT NULL,
  `cmTitle` varchar(150) NOT NULL,
  `cmFiles` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_material`
--

INSERT INTO `course_material` (`cmID`, `cmCourse`, `cmTitle`, `cmFiles`) VALUES
(1001, 'UKITL4', 'Introduction to IT', 'IT_PDFFile.pdf'),
(1002, 'UKITL4', 'Lesson 1', 'UKITL4_Lesson1.docx|UKITL4_Lesson1.pdf'),
(1003, 'JAVA', 'Lesson 2', 'JAVA_Lesson1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrID` int(11) NOT NULL,
  `enrDateTime` datetime NOT NULL,
  `enrCourse` varchar(15) NOT NULL,
  `enrStudent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrID`, `enrDateTime`, `enrCourse`, `enrStudent`) VALUES
(2, '2023-09-15 09:48:27', 'JAVA', '2023-00000'),
(10, '2023-09-15 09:48:27', 'UKITL4', '2023-00000'),
(11, '2023-09-15 10:09:24', 'WEBDEV', '2023-00001');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stdID` varchar(10) NOT NULL,
  `stdPassword` varchar(100) NOT NULL,
  `stdNameLast` varchar(100) NOT NULL,
  `stdNameFirst` varchar(100) NOT NULL,
  `stdNameMiddle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
-- test and test2

INSERT INTO `student` (`stdID`, `stdPassword`, `stdNameLast`, `stdNameFirst`, `stdNameMiddle`) VALUES
('2023-00000', '*94BDCEBE19083CE2A1F959FD02F964C7AF4CFC29', 'Test', 'Student', '.'),
('2023-00001', '*7CEB3FDE5F7A9C4CE5FBE610D7D8EDA62EBE5F4E', 'Test', 'Two', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`crsID`);

--
-- Indexes for table `course_material`
--
ALTER TABLE `course_material`
  ADD PRIMARY KEY (`cmID`),
  ADD KEY `fk_coursematerial_course` (`cmCourse`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrID`),
  ADD KEY `fk_enrollm ent_course` (`enrCourse`),
  ADD KEY `fk_enrollment_student` (`enrStudent`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stdID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_material`
--
ALTER TABLE `course_material`
  MODIFY `cmID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_material`
--
ALTER TABLE `course_material`
  ADD CONSTRAINT `fk_coursematerial_course` FOREIGN KEY (`cmCourse`) REFERENCES `course` (`crsID`) ON UPDATE CASCADE;

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `fk_enrollm ent_course` FOREIGN KEY (`enrCourse`) REFERENCES `course` (`crsID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enrollment_student` FOREIGN KEY (`enrStudent`) REFERENCES `student` (`stdID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
