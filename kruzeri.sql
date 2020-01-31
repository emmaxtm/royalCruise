-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2019 at 10:30 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kruzeri`
--

-- --------------------------------------------------------

--
-- Table structure for table `brod`
--

DROP TABLE IF EXISTS `brod`;
CREATE TABLE IF NOT EXISTS `brod` (
  `ID_brod` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) NOT NULL,
  `kapacitet_ljudi` int(11) NOT NULL,
  PRIMARY KEY (`ID_brod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brod`
--

INSERT INTO `brod` (`ID_brod`, `naziv`, `kapacitet_ljudi`) VALUES
(1, 'Tropico', 1000),
(2, 'Pearl', 2000),
(3, 'Crystal', 1500),
(4, 'Sparcle', 800);

-- --------------------------------------------------------

--
-- Table structure for table `destinacija`
--

DROP TABLE IF EXISTS `destinacija`;
CREATE TABLE IF NOT EXISTS `destinacija` (
  `ID_des` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(20) NOT NULL,
  `pristaniste` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_des`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinacija`
--

INSERT INTO `destinacija` (`ID_des`, `naziv`, `pristaniste`) VALUES
(11, 'Kuba', 'Varadero'),
(12, 'Portoriko', 'San_Huan'),
(13, 'Florida', 'Majami'),
(15, 'Meksiko', 'Verakruz'),
(16, 'Nju_Jork', 'Nju_Jork');

-- --------------------------------------------------------

--
-- Table structure for table `plovidba`
--

DROP TABLE IF EXISTS `plovidba`;
CREATE TABLE IF NOT EXISTS `plovidba` (
  `ID_brod` int(11) NOT NULL,
  `ID_des` int(11) NOT NULL,
  `trajanje_plovidbe` int(11) NOT NULL,
  PRIMARY KEY (`ID_brod`,`ID_des`),
  KEY `plovidba_ibfk_1` (`ID_des`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plovidba`
--

INSERT INTO `plovidba` (`ID_brod`, `ID_des`, `trajanje_plovidbe`) VALUES
(1, 12, 47),
(1, 13, 19),
(2, 11, 24),
(2, 17, 38),
(3, 14, 20),
(3, 16, 22),
(4, 11, 30),
(4, 17, 35),
(4, 18, 26);

-- --------------------------------------------------------

--
-- Table structure for table `putnici`
--

DROP TABLE IF EXISTS `putnici`;
CREATE TABLE IF NOT EXISTS `putnici` (
  `ID_putnik` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sifra` varchar(20) NOT NULL,
  `slika` varchar(200) NOT NULL,
  `ID_brod` int(11) NOT NULL,
  PRIMARY KEY (`ID_putnik`),
  KEY `ID_brod` (`ID_brod`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `putnici`
--

INSERT INTO `putnici` (`ID_putnik`, `ime`, `prezime`, `email`, `sifra`, `slika`, `ID_brod`) VALUES
(14, 'nevil', 'longbottom', 'nevil@gmai.com', 'zxcv', 'Penguins.jpg', 2),
(15, 'mark', 'thompson', 'mark@gmail.com', '1235', 'Tulips.jpg', 4),
(17, 'tom', 'ford', 'tom@gmail.com', '789', 'Jellyfish.jpg', 2),
(18, 'jack', 'sparrow', 'j@gmail.com', 'xxxx', 'Desert.jpg', 2),
(19, 'mickey', 'mouse', 'm@gmail.com', '3333', 'Jellyfish.jpg', 3),
(20, 'mary', 'elizabeth', 'mary@gmail.com', '147', 'Penguins.jpg', 3),
(21, 'novi', 'korisnik', 'novi@gmail.com', 'qwerty', 'Koala.jpg', 3),
(23, 'passenger', 'pass', 'pa@gmail.com', 'wsxc', 'Penguins.jpg', 2),
(24, 'steve', 'brown', 'steve@gmail.com', 'qwer', 'Lighthouse.jpg', 3),
(25, 'tina', 'turner', 'tina@gmail.com', '852', 'Koala.jpg', 2),
(26, 'user', 'ussser', 'user@gmail.com', 'zxcv', 'Desert.jpg', 1),
(27, 'marko', 'markovic', 'm@gmail.com', 'asdf', 'Chrysanthemum.jpg', 3),
(28, 'sophie', 'crunch', 'sophie@gmail.com', '159', 'Koala.jpg', 3),
(29, 'jake', 'johnson', 'jake@gmail.com', '1478', 'Desert.jpg', 3),
(30, 'jake', 'thompson', 'j@gmail.com', '1472', 'Lighthouse.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

DROP TABLE IF EXISTS `zaposleni`;
CREATE TABLE IF NOT EXISTS `zaposleni` (
  `ID_zaposleni` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `zvanje` varchar(20) NOT NULL,
  `ID_brod` int(11) NOT NULL,
  PRIMARY KEY (`ID_zaposleni`),
  KEY `ID_brod` (`ID_brod`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`ID_zaposleni`, `ime`, `prezime`, `zvanje`, `ID_brod`) VALUES
(25, 'Robert', 'Wilson', 'Kapetan', 3),
(26, 'David', 'Trenovski', 'Kapetan', 2),
(27, 'Dzon', 'Malkovic', 'Kapetan', 1),
(28, 'Mark', 'Swon', 'Kapetan', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `plovidba`
--
ALTER TABLE `plovidba`
  ADD CONSTRAINT `plovidba_ibfk_1` FOREIGN KEY (`ID_brod`) REFERENCES `brod` (`ID_brod`);

--
-- Constraints for table `putnici`
--
ALTER TABLE `putnici`
  ADD CONSTRAINT `putnici_ibfk_1` FOREIGN KEY (`ID_brod`) REFERENCES `brod` (`ID_brod`);

--
-- Constraints for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD CONSTRAINT `zaposleni_ibfk_1` FOREIGN KEY (`ID_brod`) REFERENCES `brod` (`ID_brod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
