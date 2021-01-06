-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 08:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportaldatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `UserName`, `Password`) VALUES
(1, 'admin', 'admin123'),
(2, 'admin1', 'admin123'),
(3, 'admin1', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `EmployerId` int(11) NOT NULL,
  `CompanyEmail` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `District` varchar(30) NOT NULL,
  `Thana` varchar(30) NOT NULL,
  `WholeAddress` varchar(120) NOT NULL,
  `IndustryType` varchar(30) NOT NULL,
  `BusinessDescription` varchar(120) NOT NULL,
  `CompanyMobile` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobapplication`
--

CREATE TABLE `jobapplication` (
  `JobId` int(11) NOT NULL,
  `JobSeekerId` int(11) NOT NULL,
  `File` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobapplication`
--

INSERT INTO `jobapplication` (`JobId`, `JobSeekerId`, `File`) VALUES
(2, 1, 0x526573756d65204d64204d617372616669205261686d616e2e706466),
(3, 1, 0x526573756d65204d64204d617372616669205261686d616e2e706466),
(1, 2, 0x526573756d65204d64204d617372616669205261686d616e2e706466),
(2, 2, 0x526573756d65204d64204d617372616669205261686d616e2e706466),
(3, 2, 0x526573756d65204d64204d617372616669205261686d616e2e706466),
(4, 2, 0x526573756d65204d64204d617372616669205261686d616e2e706466),
(1, 1, 0x433a78616d7070096d70706870464531442e746d70);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `JobId` int(11) NOT NULL,
  `EmployerId` int(11) NOT NULL,
  `JobCategory` varchar(50) NOT NULL,
  `JobTitle` varchar(70) NOT NULL,
  `JobResponsibilities` varchar(300) NOT NULL,
  `EmploymentStatus` varchar(20) NOT NULL,
  `EducationalRequirements` varchar(100) NOT NULL,
  `ExperienceRequirements` varchar(50) NOT NULL,
  `AdditionalRequirements` varchar(150) NOT NULL,
  `JobLocation` varchar(50) NOT NULL,
  `Salary` int(11) NOT NULL,
  `Deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `JobSeekerId` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`JobSeekerId`, `FirstName`, `LastName`, `Gender`, `Email`, `Mobile`, `UserName`, `Password`) VALUES
(1, 'abc', 'abc', 'Male', 'r13ayan@gmail.com', '01994699017', 'jobseeker1', 'Jobseeker1'),
(2, 'john', 'steive', 'Male', 'r13ayan@gmail.com', '01994699017', 'jobseeker2', 'Jobseeker2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`EmployerId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`JobId`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`JobSeekerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `EmployerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `JobSeekerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
