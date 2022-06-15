-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 05:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunisair`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `evt_id` bigint(20) NOT NULL,
  `evt_start` datetime NOT NULL,
  `evt_end` datetime NOT NULL,
  `evt_text` text NOT NULL,
  `evt_color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`evt_id`, `evt_start`, `evt_end`, `evt_text`, `evt_color`) VALUES
(2, '2022-06-08 00:02:00', '2022-06-24 00:04:00', 'iheb', '#ededed'),
(3, '2022-06-06 00:00:00', '2022-06-08 00:00:00', 'cd', '#e4edff');

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `Id` int(30) NOT NULL,
  `Matricule` int(11) NOT NULL,
  `Mois` date NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`Id`, `Matricule`, `Mois`, `Type`, `Description`) VALUES
(75, 10, '2022-06-07', 'PNC', 'fefcscscxs'),
(76, 10, '2022-06-09', 'PNC', 'hello'),
(77, 10, '2022-06-08', 'PNC', 'hello'),
(78, 10, '2022-06-01', 'PNC', 'hi'),
(79, 10, '2022-06-08', 'PNC', 'hi'),
(80, 100, '2022-06-08', 'PNC', 'xsx');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Id` int(11) NOT NULL,
  `Day_off_origin` date NOT NULL,
  `Tlc` varchar(30) NOT NULL,
  `Ac_type_code` varchar(30) NOT NULL,
  `Airline` varchar(30) NOT NULL,
  `Flight_no` varchar(30) NOT NULL,
  `Departure_date` date NOT NULL,
  `Departure_time` varchar(30) NOT NULL,
  `Arrival` date NOT NULL,
  `Arrival_time` varchar(20) NOT NULL,
  `Aireport_c_is_dep` varchar(30) NOT NULL,
  `Aireport_c_is_dest` varchar(30) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Id`, `Day_off_origin`, `Tlc`, `Ac_type_code`, `Airline`, `Flight_no`, `Departure_date`, `Departure_time`, `Arrival`, `Arrival_time`, `Aireport_c_is_dep`, `Aireport_c_is_dest`, `Code`, `Type`) VALUES
(6, '2022-06-07', 'gt', 'gt', 'gt', 'gt', '2022-05-31', 'gt', '2022-05-30', 'gt', 'gt', 'gt', 'gt', 'gt'),
(7, '0000-00-00', 'vr', 'vr', 'vr', 'vr', '2022-05-31', 'vr', '2022-06-01', 'vr', 'vr', 'vr', 'vr', 'vr'),
(8, '2022-06-06', 'vf', 'vf', 'vf', 'vf', '2022-05-31', 'vf', '2022-06-21', 'vf', 'vf', 'vf', 'vf', 'f'),
(9, '2022-06-07', 'vd', 'vd', 'vd', 'vd', '2022-06-08', 'vd', '2022-05-30', 'vd', 'vd', 'vd', 'vd', 'vd'),
(10, '2022-06-07', 'gt', 'gtg', 't', 'gt', '2022-05-30', 'gt', '2022-05-31', 'gt', 'gt', 'gt', 'gt', 'gt'),
(11, '2022-05-31', 't', 'gr', 'gr', 'gr', '2022-05-31', 'gr', '2022-06-08', 'gr', 'gr', 'gr', 'gr', 'gr'),
(12, '2022-05-31', 'fr', 'fr', 'fr', 'fr', '2022-06-01', 'fr', '2022-06-08', 'fr', 'fr', 'fr', 'fr', 'fr'),
(13, '2022-06-01', '6215', 'hy', 'hy', 'hy', '2022-06-06', 'y', '2022-06-12', 'hy', 'hy', 'hyhy', 'hy', 'hy'),
(14, '2022-06-01', 'hyhyhy', 'hy', 'hy', 'hyhy', '2022-06-08', 'hy', '2022-06-08', 'yh', 'yh', 'hy', 'hy', 'hy');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id` int(30) NOT NULL,
  `Matricule` int(30) NOT NULL,
  `Mdp` varchar(30) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Corps` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `Matricule`, `Mdp`, `Firstname`, `Lastname`, `Corps`) VALUES
(25, 10, '10', 'iheb', 'khmiri', 'PNT'),
(26, 100, '100', 'iheb', 'khmiri', 'ADMIN'),
(27, 484, 'cec', 'cc', 'cc', 'PNT'),
(28, 28, '25252', '25', 'vrfv', 'PNT'),
(29, 48, 'CEDC', 'CEC55', 'CEC', 'PNT'),
(30, 582, '48', '48', '48', 'PNC'),
(31, 48488, 'vdv', 'vdv', 'vdv', 'PNT'),
(32, 45848, 'cec', 'ce', 'ce', 'PNT'),
(33, 100, '1000', 'ferc', 'cefe', 'PNT'),
(34, 484, 'cec', 'cec', 'ce', 'PNT'),
(35, 54459, '48878', 'cc', 'cc', 'PNT'),
(36, 48548, '4848', 'cdc', 'cdc', 'PNT'),
(37, 488, '4848', 'vrvr', 'vrvrv', 'ADMIN'),
(38, 959, '49', 'iheb', 'ihebhihi', 'PNT'),
(39, 5959, '4848', 'cccedcece', 'cc', 'PNC'),
(40, 100, '987', 'ce', 'ce', 'ADMIN'),
(41, 5959, '4848', 'cc', 'cc', 'ADMIN'),
(42, 595977, 'iheb', 'ccllllllllll', 'ccklllll', 'PNC'),
(43, 1000, '4848', 'cc', 'cc', 'ADMIN'),
(44, 148, 'vrv', 'vdv', 'vd', 'PNT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`evt_id`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ck_user_demande` (`Matricule`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ck_user_demande` (`Matricule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `evt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `ck_user_demande` FOREIGN KEY (`Matricule`) REFERENCES `utilisateur` (`Matricule`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
