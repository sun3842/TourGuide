-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 07:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email_id` varchar(20) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`Id`, `Name`, `Email_id`, `Phone`, `Password`) VALUES
(1, 'admin', 'admin@admin.com', 1234, '4321');

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `username` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `licence` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`username`, `date`, `licence`, `phone`, `email`, `password`) VALUES
('Agency', '16.16.16', 'ABC123', 1743331117, 'a@gmail.com', '12345'),
('', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `offer_table`
--

CREATE TABLE `offer_table` (
  `Offer` varchar(50) NOT NULL,
  `Place_Id` varchar(50) NOT NULL,
  `licence` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_table`
--

INSERT INTO `offer_table` (`Offer`, `Place_Id`, `licence`) VALUES
('60%', '2', '12365'),
('60%', '2', '12365'),
('10%', '3', '12365'),
('60%', '1', 'asdf203'),
('40%', '4', 'asdf203');

-- --------------------------------------------------------

--
-- Table structure for table `photo_table`
--

CREATE TABLE `photo_table` (
  `User_Email` varchar(30) NOT NULL,
  `Url` varchar(50) NOT NULL,
  `Place_Id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_table`
--

INSERT INTO `photo_table` (`User_Email`, `Url`, `Place_Id`) VALUES
('s@gmail.com', 'url/Sundarban_1.jpg', '1'),
('s@gmail.com', 'url/Coxs_bazar_sea.jpg', '2'),
('s@gmail.com', 'url/Coxs_bazar_sea.jpg', ''),
('s@gmail.com', 'url/jaflong.jpg', ''),
('s@gmail.com', 'url/saint-martin.jpg', ''),
('s@gmail.com', 'url/Sundarban_1.jpg', ''),
('sun.a@gmail.com', 'url/jaflong.jpg', ''),
('sun.a@gmail.com', 'url/logo.jpg', ''),
('sun.a@gmail.com', 'url/saint-martin.jpg', ''),
('sun.a@gmail.com', 'url/travel4.jpg', ''),
('sun.a@gmail.com', 'url/world.gif', ''),
('', 'url/WP_20150513_18_32_05_Pro.jpg', '3'),
('', 'url/WP_20150513_18_32_25_Pro.jpg', '3'),
('', 'url/WP_20150513_18_34_57_Pro.jpg', '3'),
('', 'url/WP_20150513_18_32_05_Pro.jpg', '3'),
('', 'url/WP_20150513_18_32_25_Pro.jpg', '3'),
('', 'url/WP_20150513_18_34_57_Pro.jpg', '3'),
('', 'url/WP_20150513_18_32_05_Pro.jpg', '3'),
('', 'url/WP_20150513_18_32_25_Pro.jpg', '3'),
('', 'url/WP_20150513_18_34_57_Pro.jpg', '3'),
('', 'url/WP_20150513_18_32_25_Pro.jpg', '3'),
('', 'url/WP_20150513_18_34_57_Pro.jpg', '3'),
('', 'url/bandarban.jpg', '4'),
('', 'url/jaflong.jpg', '4'),
('', 'url/travel4.jpg', '4'),
('razonamit@gmail.com', 'url/13659112_685107728306637_2656029672994228000_n', ''),
('razonamit@gmail.com', 'url/13659112_685107728306637_2656029672994228000_n', '');

-- --------------------------------------------------------

--
-- Table structure for table `place_table`
--

CREATE TABLE `place_table` (
  `Place_Id` int(10) NOT NULL,
  `Place_Name` varchar(25) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Rating` float NOT NULL,
  `Details` varchar(100) NOT NULL,
  `Photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_table`
--

INSERT INTO `place_table` (`Place_Id`, `Place_Name`, `Type`, `Rating`, `Details`, `Photo`) VALUES
(1, 'Bandarban', 'Hill', 7.8, 'Good place', 'url/bandarban.jpg'),
(2, 'coxs bazar', 'sea', 8, 'beautiful', 'url/saint-martin.jpg'),
(4, 'sunderban', 'Forest', 6.6, 'Full of advanture', 'url/saint-martin.jpg'),
(5, 'Hello', 'Hello', 9, 'good', 'url/download.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Date_of_birth` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email_id` varchar(50) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`FirstName`, `LastName`, `Date_of_birth`, `Gender`, `Phone`, `Email_id`, `Photo`, `Password`) VALUES
('Aditya', 'saha', '16.04.2005', 'male', '01796370693', 'razonamit@gmail.com', 'url/21751.jpg', 'aditya'),
('sah', 'hosan', '06.06.06', 'male', '01748930069', 'sun.amran@gmail.com', 'url/user.jpg', '12369'),
('shahi', 'amran', '06.06.06', 'male', '01748930064', 'sun@gmail.com', 'url/test.jpg', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `visited_table`
--

CREATE TABLE `visited_table` (
  `User_Email` varchar(50) NOT NULL,
  `Place_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visited_table`
--

INSERT INTO `visited_table` (`User_Email`, `Place_Id`) VALUES
('s@gmail.com', '1'),
('s@gmail.com', '2'),
('undefined', '1'),
('sun@gmail.com', '1'),
('sun@gmail.com', '2'),
('sun@gmail.com', '3'),
('sun@gmail.com', '3'),
('sun@gmail.com', '3'),
('sun.amran@gmail.com', '1'),
('razonamit@gmail.com', '2'),
('razonamit@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `place_table`
--
ALTER TABLE `place_table`
  ADD PRIMARY KEY (`Place_Id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`Email_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
