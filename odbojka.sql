-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 10:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odbojka`
--

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `naziv`) VALUES
(1, 'Beograd'),
(2, 'Pancevo'),
(3, 'Stara Pazova'),
(4, 'Subotica'),
(5, 'Sremska Mitrovica'),
(6, 'Obrenovac'),
(7, 'Ruma'),
(8, 'Lajkovac'),
(9, 'Klek');

-- --------------------------------------------------------

--
-- Table structure for table `mec`
--

CREATE TABLE `mec` (
  `mecID` int(11) NOT NULL,
  `domacinID` int(11) NOT NULL,
  `gostID` int(11) NOT NULL,
  `setovaDomacin` int(11) NOT NULL,
  `setovaGost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mec`
--

INSERT INTO `mec` (`mecID`, `domacinID`, `gostID`, `setovaDomacin`, `setovaGost`) VALUES
(4, 5, 8, 3, 2),
(5, 7, 10, 3, 1),
(6, 2, 9, 3, 1),
(9, 7, 2, 2, 3),
(10, 3, 2, 3, 1),
(11, 3, 8, 2, 3),
(13, 10, 3, 3, 0),
(14, 8, 6, 3, 1),
(15, 8, 9, 0, 3),
(16, 4, 6, 2, 3),
(17, 5, 7, 3, 1),
(19, 10, 7, 2, 3),
(20, 1, 1, 0, 3),
(22, 5, 5, 4, 4),
(23, 5, 5, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tabela`
--

CREATE TABLE `tabela` (
  `rb` int(11) NOT NULL,
  `timID` int(11) NOT NULL,
  `ukupnoUtakmica` int(11) NOT NULL,
  `pobeda` int(11) NOT NULL,
  `poraza` int(11) NOT NULL,
  `setovaDatih` int(11) NOT NULL,
  `setovaPrimljenih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabela`
--

INSERT INTO `tabela` (`rb`, `timID`, `ukupnoUtakmica`, `pobeda`, `poraza`, `setovaDatih`, `setovaPrimljenih`) VALUES
(1, 1, 5, 4, 1, 12, 2),
(2, 2, 2, 1, 1, 3, 4),
(3, 3, 3, 3, 0, 11, 2),
(4, 4, 1, 0, 1, 0, 3),
(5, 5, 5, 3, 2, 19, 17),
(6, 6, 2, 1, 1, 4, 2),
(7, 7, 2, 0, 2, 2, 4),
(8, 8, 2, 0, 2, 2, 7),
(9, 9, 2, 2, 0, 8, 4),
(10, 10, 2, 0, 2, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `timID` int(11) NOT NULL,
  `nazivTima` varchar(255) NOT NULL,
  `brojIgraca` int(11) NOT NULL,
  `gradID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`timID`, `nazivTima`, `brojIgraca`, `gradID`) VALUES
(1, 'Crvena zvezda', 13, 1),
(2, 'Partizan', 13, 1),
(3, 'Dinamo', 12, 2),
(4, 'Jedinstvo', 14, 3),
(5, 'Spartak', 16, 4),
(6, 'Srem', 13, 5),
(7, 'Tent', 12, 6),
(8, 'Vizura', 17, 7),
(9, 'Železničar', 13, 8),
(10, 'Klek MD', 11, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mec`
--
ALTER TABLE `mec`
  ADD PRIMARY KEY (`mecID`),
  ADD KEY `domacinID` (`domacinID`),
  ADD KEY `gostID` (`gostID`);

--
-- Indexes for table `tabela`
--
ALTER TABLE `tabela`
  ADD PRIMARY KEY (`rb`,`timID`),
  ADD KEY `timID` (`timID`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`timID`),
  ADD KEY `gradID` (`gradID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mec`
--
ALTER TABLE `mec`
  MODIFY `mecID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tabela`
--
ALTER TABLE `tabela`
  MODIFY `rb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `timID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mec`
--
ALTER TABLE `mec`
  ADD CONSTRAINT `mec_ibfk_1` FOREIGN KEY (`domacinID`) REFERENCES `tim` (`timID`),
  ADD CONSTRAINT `mec_ibfk_2` FOREIGN KEY (`gostID`) REFERENCES `tim` (`timID`);

--
-- Constraints for table `tabela`
--
ALTER TABLE `tabela`
  ADD CONSTRAINT `tabela_ibfk_1` FOREIGN KEY (`timID`) REFERENCES `tim` (`timID`);

--
-- Constraints for table `tim`
--
ALTER TABLE `tim`
  ADD CONSTRAINT `tim_ibfk_1` FOREIGN KEY (`gradID`) REFERENCES `grad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
