-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 29 jan 2023 om 20:30
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
-- Database: `be-userstory1`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `instructeur`
--

DROP TABLE IF EXISTS `instructeur`;
CREATE TABLE IF NOT EXISTS `instructeur` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(20) NOT NULL,
  `Tussenvoegsel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Achternaam` varchar(20) NOT NULL,
  `Mobiel` int NOT NULL,
  `DatumInDienst` date NOT NULL,
  `AantalSterren` varchar(5) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `instructeur`
--

INSERT INTO `instructeur` (`Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Mobiel`, `DatumInDienst`, `AantalSterren`) VALUES
(1, 'Li', NULL, 'Zhan', 628493827, '2015-04-17', '3'),
(2, 'Leroy', NULL, 'Boerhaven', 639398734, '2018-06-25', '1'),
(3, 'Yoeri', 'van', 'Veen', 624383291, '2010-05-12', '3'),
(4, 'Bert', 'van', 'Sali', 648293823, '2023-01-10', '4'),
(5, 'Mohammed', 'el', 'Yassidi', 634291234, '2010-06-14', '5');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `typevoertuig`
--

DROP TABLE IF EXISTS `typevoertuig`;
CREATE TABLE IF NOT EXISTS `typevoertuig` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `TypeVoertuig` varchar(20) NOT NULL,
  `Rijbewijscategorie` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `typevoertuig`
--

INSERT INTO `typevoertuig` (`Id`, `TypeVoertuig`, `Rijbewijscategorie`) VALUES
(1, 'Personenauto', 'B'),
(2, 'Vrachtwagen', 'C'),
(3, 'Bus', 'D'),
(4, 'Bromfiets', 'AM');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voertuig`
--

DROP TABLE IF EXISTS `voertuig`;
CREATE TABLE IF NOT EXISTS `voertuig` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Kenteken` varchar(20) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Bouwjaar` date NOT NULL,
  `Brandstof` varchar(20) NOT NULL,
  `TypeVoertuigId` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `TypeVoertuigId` (`TypeVoertuigId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `voertuig`
--

INSERT INTO `voertuig` (`Id`, `Kenteken`, `Type`, `Bouwjaar`, `Brandstof`, `TypeVoertuigId`) VALUES
(1, 'AU-67-IO', 'Golf', '2017-06-12', 'Diesel', 1),
(2, 'TR-24-OP', 'DAF', '2019-05-23', 'Diesel', 2),
(3, 'TH-78-KL', 'Mercedes', '2023-01-01', 'Benzine', 1),
(4, '90-KL-TR', 'Fiat 500', '2021-09-12', 'Benzine', 1),
(5, '34-TK-LP', 'Scania', '2015-03-13', 'Diesel', 2),
(6, 'YY-OP-78', 'BMW M5', '2022-05-13', 'Diesel', 1),
(7, 'UU-HH-JK', 'M.A.N', '2017-12-03', 'Diesel', 2),
(8, 'ST-FZ-28', 'Citroën', '2018-01-20', 'Elektries', 1),
(9, '123-FR-T', 'Piaggio Zip', '2021-02-01', 'Benzine', 4),
(10, 'DRS-52-P', 'Vespa', '2022-03-21', 'Benzine', 4),
(11, 'STP-12-U', 'Kymco', '2022-03-21', 'Benzine', 4),
(12, '45-SD-23', 'Renault', '2022-07-02', 'Diesel', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voertuiginstructeur`
--

DROP TABLE IF EXISTS `voertuiginstructeur`;
CREATE TABLE IF NOT EXISTS `voertuiginstructeur` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `VoertuigId` int NOT NULL,
  `InstructeurId` int NOT NULL,
  `DatumToekenning` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `VoertuigId` (`VoertuigId`),
  KEY `InstructeurId` (`InstructeurId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `voertuiginstructeur`
--

INSERT INTO `voertuiginstructeur` (`Id`, `VoertuigId`, `InstructeurId`, `DatumToekenning`) VALUES
(1, 1, 5, '2017-06-18'),
(2, 3, 1, '2021-09-26'),
(3, 9, 1, '2021-09-27'),
(4, 3, 4, '2022-08-01'),
(5, 5, 1, '2019-08-30'),
(6, 10, 5, '2020-02-02');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `voertuig`
--
ALTER TABLE `voertuig`
  ADD CONSTRAINT `TypeVoertuigId` FOREIGN KEY (`TypeVoertuigId`) REFERENCES `typevoertuig` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Beperkingen voor tabel `voertuiginstructeur`
--
ALTER TABLE `voertuiginstructeur`
  ADD CONSTRAINT `InstructeurId` FOREIGN KEY (`InstructeurId`) REFERENCES `instructeur` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `VoertuigId` FOREIGN KEY (`VoertuigId`) REFERENCES `voertuig` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
