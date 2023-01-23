-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 14 jan 2023 om 20:39
-- Serverversie: 8.0.31
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be-toets`
--
CREATE DATABASE IF NOT EXISTS `be-toets` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `be-toets`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `auto`
--

DROP TABLE IF EXISTS `auto`;
CREATE TABLE IF NOT EXISTS `auto` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Kenteken` varchar(10) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `InstructeurId` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `InstructeurId` (`InstructeurId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `auto`
--

INSERT INTO `auto` (`Id`, `Kenteken`, `Type`, `InstructeurId`) VALUES
(1, 'AU-67-IO', 'Golf', 3),
(2, 'TH-78-KL', 'Ferrari', 2),
(3, '90-KL-TR ', 'Fiat 500', 4),
(4, 'YY-OP-78', 'Mercedes', 5),
(5, 'AU-67-IO', 'Golf', 3),
(6, 'TH-78-KL', 'Ferarri', 2),
(7, '90-KL-TR', 'Fiat', 4),
(8, 'YY-OP-78', 'Mercedes', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `instructeur`
--

DROP TABLE IF EXISTS `instructeur`;
CREATE TABLE IF NOT EXISTS `instructeur` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Naam` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `instructeur`
--

INSERT INTO `instructeur` (`Id`, `Naam`, `Email`) VALUES
(1, 'Groen', 'groen@gmail.com'),
(2, 'Manhoi', 'manhoi@gmail.com'),
(3, 'Zoyi', 'zoyi@gmail.com'),
(4, 'Berthold', 'berthold@gmail.com'),
(5, 'Denekamp', 'denekamp@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mankement`
--

DROP TABLE IF EXISTS `mankement`;
CREATE TABLE IF NOT EXISTS `mankement` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `AutoId` int NOT NULL,
  `Datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Mankement` varchar(500) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `AutoId` (`AutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `mankement`
--

INSERT INTO `mankement` (`Id`, `AutoId`, `Datum`, `Mankement`) VALUES
(1, 4, '2023-01-04 00:00:00', 'Profiel rechterband minder dan 2 mm'),
(2, 2, '2023-01-02 00:00:00', 'Rechter achterlicht kapot'),
(3, 1, '2023-01-02 00:00:00', '2023-01-02 '),
(4, 2, '2023-01-06 00:00:00', 'Bumper rechtsachter ingedeukt'),
(5, 2, '2023-01-08 00:00:00', 'Radio kapot'),
(6, 2, '2023-01-10 21:43:37', 'bandje kut lek'),
(14, 2, '2023-01-10 22:12:56', 'Banden zijn lek');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `Instructeur` FOREIGN KEY (`InstructeurId`) REFERENCES `instructeur` (`Id`);

--
-- Beperkingen voor tabel `mankement`
--
ALTER TABLE `mankement`
  ADD CONSTRAINT `AutoId` FOREIGN KEY (`AutoId`) REFERENCES `auto` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
