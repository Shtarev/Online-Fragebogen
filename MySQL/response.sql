-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Server: 10.3.13-MariaDB
-- PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `response` (
  `id` int(5) NOT NULL,
  `response` text NOT NULL,
  `response_nr` int(5) NOT NULL,
  `question_id` int(11) NOT NULL,
  `ja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `response` (`id`, `response`, `response_nr`, `question_id`, `ja`) VALUES
(1, '- stärker belastet wird', 1, 1, ''),
(2, '- noch angetrieben wird', 2, 1, ''),
(3, '- entlastet wird', 3, 1, 'checked'),
(4, '', 4, 1, ''),
(5, '', 5, 1, ''),
(6, '', 6, 1, ''),
(7, 'Auf ausreichende Profiltiefe', 1, 2, 'checked'),
(8, 'Auf äußere Beschädigungen', 2, 2, 'checked'),
(9, 'Auf richtigen Luftdruck', 3, 2, 'checked'),
(10, '', 4, 2, ''),
(11, '', 5, 2, ''),
(12, '', 6, 2, ''),
(13, 'Langsam fahren, Füße auf den Fußrasten lassen', 1, 3, 'checked'),
(14, 'Vorher nicht bremsen, Beine hochnehmen und durchfahren', 2, 3, ''),
(15, 'Auf den Gehweg ausweichen', 3, 3, ''),
(16, 'Auf den Gehweg nicht ausweichen', 4, 3, ''),
(17, '', 5, 3, ''),
(18, '', 6, 3, ''),
(19, '- an der dafür vorgesehenen Stelle in den Fahrzeugbrief einkleben', 1, 4, ''),
(20, '- mitführen oder Fahrzeugpapiere berichtigen lassen', 2, 4, 'checked'),
(21, '- sofort dem Fahrzeughersteller übersenden', 3, 4, ''),
(22, '', 4, 4, ''),
(23, '', 5, 4, ''),
(24, '', 6, 4, ''),
(25, 'Wenn der Eingeholte plötzlich beschleunigt', 1, 5, 'checked'),
(26, 'Wenn der Eingeholte seine Geschwindigkeit stark verringert', 2, 5, ''),
(27, 'Wenn durch unerwarteten Gegenverkehr Gefahr entsteht', 3, 5, 'checked'),
(28, '', 4, 5, ''),
(29, '', 5, 5, ''),
(30, '', 6, 5, ''),
(31, 'Verwendung von Reifen einer anderen Größe', 1, 6, 'checked'),
(32, 'Anbau eines Beiwagens', 2, 6, 'checked'),
(33, 'Anbau einer Nebelschlussleuchte', 3, 6, ''),
(34, '', 4, 6, ''),
(35, '', 5, 6, ''),
(36, '', 6, 6, '');

ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `response`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
