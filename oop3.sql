-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 05:51 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oop3`
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `country`, `birth_date`, `image`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'isa93', 'arnoldti93@gmail.com', 'b8d3b45e3c8c82b66e0937108b8519185d1b94a44be75149f9da3a7683f308c4499f2bf4945eb246b6187dc28b16a2932df9f9ec394d904e1515f0e2ba997afea4680c1e7c432ee3c65359c787113001d344a7e19ab3716659d5b78b71a6d599b8d3b45e3c8c82b66e0937108b8519185d1b94a44be75149f9da3a7683f308c4', 'Arnold', 'Tóth Isaszegi', 'United Kingdom', '1993-10-08', '20151112-013430.png', '2015-10-21 22:43:00', '2015-11-13 00:40:17', '2015-11-26 17:18:57'),
(2, NULL, 'arnoldti93@gmail.com', '5427b90529877d8ea658a5f6a4552263d61885de7022ca5fcaa95cf88ef7414c93fd67592ce13eff12c9cab9183908535c882fd9bb036316560a3ea9571a37d51b6d9df9732db0db6b389c2b5b741fbd1d30ae1ad4f669853bbcf8a0ceb4991d5427b90529877d8ea658a5f6a4552263d61885de7022ca5fcaa95cf88ef7414c', 'Arnold', 'Tóth Isaszegi', 'Ukraine', '2013-07-10', NULL, '2015-10-25 10:30:40', NULL, '2015-11-12 02:42:07'),
(5, 'Kimy#1', 'kim_jong-un@atomail.com', 'ecbfbd9b15b66c4ecb696f1a98d731f481bdcff19634f00241441063288df4b81fd1136c18b91572f82e9dca9f61ec8275002fe0acb8b0ecee97dac74fa1501326717ad079184dfd202e230418a806de3936859940828797e1714401001e72dfecbfbd9b15b66c4ecb696f1a98d731f481bdcff19634f00241441063288df4b8', 'Un', 'Kim Jong', 'Korea, Democratic People&#039;s Republic of', '1983-01-08', '2015111149.jpg', '2015-11-11 00:49:49', '2015-11-12 01:37:15', '2015-11-26 14:47:50'),
(6, 'Fuhrer', 'worldLeada@jewslayer.com', '8570091d8b6bb6a6409c593ec1a80b49db96354f453712978cee268df6b8786fc111291223627a60d1a68beb7563648c6f2dbaffa25fafd19f799036d71273de7a2bab571d9726ebc9d41a272f5b39ea891f9f8a9dcf99edfea2618b2799377f8570091d8b6bb6a6409c593ec1a80b49db96354f453712978cee268df6b8786f', 'Adolf', 'Hitler', 'Germany', '1945-04-30', '2015111104.png', '2015-11-11 00:59:04', NULL, '2015-11-12 02:42:41');

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
