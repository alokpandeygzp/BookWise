-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2023 at 07:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`) VALUES
(1, 'Alok Pandey', 'admin@gmail.com', 'admin', 'e043f7a91a32421e1bf2eeeb624f32f2');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `Email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `Email`) VALUES
(1, 'Alok Pandey', 'alok@pandey.com'),
(2, 'Chetan Bhagatt', 'chetan@bhagat.com'),
(4, 'HC Verma', 'verma@hc.com'),
(11, 'Abhishek Jain', 'abhishek@jain.com'),
(12, 'Amay Wakde', 'amay@wakde.com'),
(13, 'Balagurusamy', 'bala@samy.com'),
(14, 'Aman', 'aman@nitc.ac.in'),
(16, 'Yashvant Kanetkar', 'yashvant@kanetkar.com'),
(17, 'Hello World', 'helloworld@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(25) DEFAULT NULL,
  `BookPrice` decimal(10,2) DEFAULT NULL,
  `bookImage` varchar(250) NOT NULL,
  `isIssued` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `BookPrice`, `bookImage`, `isIssued`) VALUES
(1, 'PHP And MySql programming', 5, 1, '222333', '20.00', '1efecc0ca822e40b7b673c0d79ae943f.jpg', 0),
(5, 'Murach\'s MySQL', 5, 1, '9350237695', '455.00', '5939d64655b4d2ae443830d73abc35b6.jpg', 0),
(7, 'WordPress Mastery Guide:', 5, 11, 'B09NKWH7NP', '53.00', '90083a56014186e88ffca10286172e64.jpg', NULL),
(8, 'Rich Dad Poor Dad', 8, 12, 'B07C7M8SX9', '120.00', '52411b2bd2a6b2e0df3eb10943a5b640.jpg', 1),
(9, 'The Girl Who Drank the Moon', 8, 13, '1848126476', '200.00', 'f05cd198ac9335245e1fdffa793207a7.jpg', NULL),
(10, 'C++: The Complete Reference, 4th Edition', 5, 14, '007053246X', '142.00', '36af5de9012bf8c804e499dc3c3b33a5.jpg', 0),
(11, 'ASP.NET Core 5 for Beginners', 9, 11, 'GBSJ36344563', '422.00', 'b1b6788016bbfab12cfd2722604badc9.jpg', 0),
(12, 'Let Us C', 9, 16, 'ISB900012333C', '125.00', '36af5de9012bf8c804e499dc3c3b33a5.jpg', NULL),
(13, 'Physics Redifined', 5, 1, 'ISB29832739CD', '340.00', 'dd8267b57e0e4feee5911cb1e1a03a79.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`) VALUES
(5, 'Technology', 1),
(7, 'Management', 1),
(8, 'General', 1),
(9, 'Programming', 1),
(10, 'Thriller', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ReturnStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `ReturnStatus`, `fine`) VALUES
(8, 1, 'SID002', '2022-01-22 05:59:17', '2022-01-22 06:18:08', 1, 0),
(9, 10, 'SID009', '2022-01-22 07:38:09', '2023-11-09 18:22:34', 1, NULL),
(10, 11, 'SID009', '2022-01-22 08:15:02', '2023-10-11 19:14:02', 1, 0),
(11, 1, 'SID012', '2022-01-22 08:17:15', '2023-10-11 08:22:06', 1, 500),
(12, 10, 'SID012', '2022-01-22 08:18:08', '2022-01-22 08:18:22', 1, 5),
(15, 8, 'SID005', '2023-10-11 19:13:38', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`) VALUES
(1, 'SID002', 'Alok Pandey', 'alokpandey181@nitc.ac.in', '9865472555', 'e043f7a91a32421e1bf2eeeb624f32f2', 1),
(4, 'SID005', 'Atul Sethi', 'atul@nitc.ac.in', '8569710025', 'e043f7a91a32421e1bf2eeeb624f32f2', 1),
(8, 'SID009', 'Abhishek', 'test@nitc.ac.in', '9517200488', 'e043f7a91a32421e1bf2eeeb624f32f2', 1),
(9, 'SID010', 'Amit', 'amit@nitc.ac.in', '8585856224', 'f925916e2754e5e03f75dd58a5733251', 1),
(11, 'SID012', 'Amay Wakde', 'amay@nitc.ac.in', '1234569870', 'e043f7a91a32421e1bf2eeeb624f32f2', 1),
(14, 'SID013', 'Aman', 'aman@nitc.ac.in', '9832938293', 'a742dc642283d0c9a9e47d9aa4a13cfb', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk3` (`CatId`),
  ADD KEY `fk4` (`AuthorId`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`BookId`),
  ADD KEY `fk2` (`StudentID`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`CatId`) REFERENCES `tblcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`AuthorId`) REFERENCES `tblauthors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`BookId`) REFERENCES `tblbooks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`StudentID`) REFERENCES `tblstudents` (`StudentId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
