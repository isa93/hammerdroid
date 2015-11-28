-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 05:58 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hammerdroid`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL DEFAULT '0',
  `id_country` int(11) DEFAULT NULL,
  `name_srb` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name_hun` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_eng` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `altitude` int(11) NOT NULL,
  `wind_force` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_country` (`id_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `id_country`, `name_srb`, `name_hun`, `name_eng`, `altitude`, `wind_force`) VALUES
(1, 1, 'Ajdovscina', NULL, NULL, 110, 35),
(2, 1, 'Maribor', 'Maribor', 'Maribor', 275, 19);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name_srb` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_hun` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_eng` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_srb`, `name_hun`, `name_eng`) VALUES
(1, 'Slovenija', NULL, NULL),
(2, 'Hrvatska', NULL, NULL),
(3, 'BiH', NULL, NULL),
(4, 'Srbija', NULL, NULL),
(5, 'Makedonija', NULL, NULL),
(6, 'Crna Gora', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL DEFAULT '0',
  `id_dimensions` int(11) NOT NULL,
  `s (mm)` float DEFAULT NULL,
  `A` float DEFAULT NULL,
  `Wx` float DEFAULT NULL,
  `Wy` float DEFAULT NULL,
  `Ix` float DEFAULT NULL,
  `Iy` float NOT NULL,
  `Jx` float DEFAULT NULL,
  `Jy` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_dimensions` (`id_dimensions`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `id_dimensions`, `s (mm)`, `A`, `Wx`, `Wy`, `Ix`, `Iy`, `Jx`, `Jy`) VALUES
(1, 1, 1.5, 1.052, 0.651, 0.32, 0.96, 0.39, 0.976, 0.16),
(2, 2, 1.5, 1.352, 1.057, 0.84, 1.08, 0.79, 1.586, 0.839),
(3, 3, 2, 2.137, 2.025, 1.34, 1.38, 0.79, 4.049, 1.342),
(4, 4, 2, 2.537, 2.747, 2.34, 1.47, 1.18, 5.494, 3.506),
(5, 5, 2, 2.937, 3.814, 2.86, 1.8, 1.21, 9.536, 4.292),
(6, 6, 3, 5.408, 8.459, 6.72, 2.17, 1.58, 25.377, 13.438),
(7, 7, 3, 6.608, 13.062, 8.78, 2.81, 1.63, 52.246, 17.554),
(8, 8, 3, 9.008, 24.113, 18.21, 3.66, 2.46, 120.567, 54.644),
(9, 8, 4, 11.748, 30.514, 22.89, 3.6, 2.42, 152.569, 68.667);

-- --------------------------------------------------------

--
-- Table structure for table `dimensions`
--

CREATE TABLE IF NOT EXISTS `dimensions` (
  `id` int(11) NOT NULL DEFAULT '0',
  `dimensions` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dimensions`
--

INSERT INTO `dimensions` (`id`, `dimensions`) VALUES
(1, '30x10'),
(2, '30x20'),
(3, '40x20'),
(4, '40x30'),
(5, '50x30'),
(6, '60x40'),
(7, '80x40'),
(8, '100x60');

-- --------------------------------------------------------

--
-- Table structure for table `factors`
--

CREATE TABLE IF NOT EXISTS `factors` (
  `id` int(11) NOT NULL DEFAULT '0',
  `id_buildings` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `factors` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_buildings` (`id_buildings`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factors`
--

INSERT INTO `factors` (`id`, `id_buildings`, `year`, `factors`) VALUES
(1, 1, 100, 1060),
(2, 2, 100, 1060);

-- --------------------------------------------------------

--
-- Table structure for table `structures_buildings`
--

CREATE TABLE IF NOT EXISTS `structures_buildings` (
  `id` int(11) NOT NULL DEFAULT '0',
  `id_group` int(11) NOT NULL,
  `name_srb` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_hun` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_eng` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_group` (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `structures_buildings`
--

INSERT INTO `structures_buildings` (`id`, `id_group`, `name_srb`, `name_hun`, `name_eng`) VALUES
(1, 1, 'Hidroelektrane', NULL, NULL),
(2, 1, 'Termoelektrane', NULL, NULL),
(3, 1, 'Nuklearne elektrane', NULL, NULL),
(4, 2, 'Skola', NULL, NULL),
(5, 2, 'Bolnica', NULL, NULL),
(6, 2, 'Pozorista', NULL, NULL),
(7, 2, 'Bioskopi', NULL, NULL),
(8, 2, 'Sportski objekti', NULL, NULL),
(9, 2, 'Industrijske zgrade sa skupocenom opremom', NULL, NULL),
(10, 2, 'Muzeji sa izuzetno dragocenim zbirkama', NULL, NULL),
(11, 2, 'Zgrada saveznih ustanova', NULL, NULL),
(12, 2, 'Zgrade republickih ustanova', NULL, NULL),
(13, 2, 'Zgrade javnih gradskih sluzbi', NULL, NULL),
(14, 2, 'Nacionalne biblioteka', NULL, NULL),
(15, 2, 'Stambene zgrade', NULL, NULL),
(16, 2, 'Hoteli', NULL, NULL),
(17, 2, 'Restorani', NULL, NULL),
(18, 2, 'Biblioteke', NULL, NULL),
(19, 2, 'Administrativne zgrade', NULL, NULL),
(20, 2, 'Komunalni objekti', NULL, NULL),
(21, 2, 'Industrijske zgrade', NULL, NULL),
(22, 2, 'Depol', NULL, NULL),
(23, 2, 'Skladista skupocene opreme', NULL, NULL),
(24, 2, 'Skladista osim onih pod 23', NULL, NULL),
(25, 2, 'Stocne staje', NULL, NULL),
(26, 2, 'Hangari putnicke avijacije', NULL, NULL),
(27, 2, 'Hangari ratne avijacije', NULL, NULL),
(28, 2, 'Hangari avijacije javnih sluzbi', NULL, NULL),
(29, 2, 'Hangari privredne avijacije', NULL, NULL),
(30, 3, 'Konstrukcije za nosenje antena', NULL, NULL),
(31, 3, 'Dalekovodi', NULL, NULL),
(32, 3, 'Dizalice', NULL, NULL),
(33, 3, 'Nosaci staza dizalica', NULL, NULL),
(34, 3, 'Dimnjaci', NULL, NULL),
(35, 3, 'Silosi', NULL, NULL),
(36, 3, 'Bunkeri', NULL, NULL),
(37, 3, 'Rashladni tornjevi', NULL, NULL),
(38, 3, 'Industrijska postrojenja', NULL, NULL),
(39, 3, 'Rezervoari', NULL, NULL),
(40, 3, 'Objekti za zabavu, bez publike (vrtuljci, tockovi, gondole i sl.)', NULL, NULL),
(41, 4, 'Drumski mostovi bez saobracaja', NULL, NULL),
(42, 4, 'Zeleznicki mostovi bez saobracaja', NULL, NULL),
(43, 4, 'Pesacki mostovi bez saobracaja', NULL, NULL),
(44, 4, 'Drumski mostovi sa saobracajem', NULL, NULL),
(45, 4, 'Zeleznicki mostovi sa saobracajem', NULL, NULL),
(46, 4, 'Pesacki mostovi sa saobracajem', NULL, NULL),
(47, 4, 'Transportni mostovi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `structures_groups`
--

CREATE TABLE IF NOT EXISTS `structures_groups` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name_srb` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_hun` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_eng` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `structures_groups`
--

INSERT INTO `structures_groups` (`id`, `name_srb`, `name_hun`, `name_eng`) VALUES
(1, 'Elektrane', NULL, NULL),
(2, 'Zgrade', NULL, NULL),
(3, 'Inzinjerski objekti', NULL, NULL),
(4, 'Mostovi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topography`
--

CREATE TABLE IF NOT EXISTS `topography` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name_srb` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_hun` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `name_eng` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mark` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` float NOT NULL,
  `b` float NOT NULL,
  `alfa` float NOT NULL,
  `Z0` float NOT NULL,
  `Zg` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topography`
--

INSERT INTO `topography` (`id`, `name_srb`, `name_hun`, `name_eng`, `mark`, `a`, `b`, `alfa`, `Z0`, `Zg`) VALUES
(1, 'Velike vodane uzburkane povrsine (mora, jezera)', NULL, NULL, 'A', 0.021, 1.4, 0.11, 0.003, 180),
(2, 'Otvoreni, ravni tereni', NULL, NULL, 'B', 0.03, 1, 0.14, 0.03, 320),
(3, 'Sumoviti tereni, industrijske zone', NULL, NULL, 'C', 0.041, 0.5, 0.22, 0.3, 440);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`id_dimensions`) REFERENCES `dimensions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factors`
--
ALTER TABLE `factors`
  ADD CONSTRAINT `factors_ibfk_1` FOREIGN KEY (`id_buildings`) REFERENCES `structures_buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `structures_buildings`
--
ALTER TABLE `structures_buildings`
  ADD CONSTRAINT `structures_buildings_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `structures_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
