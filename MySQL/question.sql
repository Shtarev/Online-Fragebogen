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

CREATE TABLE `question` (
  `id` int(5) NOT NULL,
  `question` text NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `question` (`id`, `question`, `type`) VALUES
(1, 'Warum neigt das Hinterrad eines Motorrades beim Bremsen eher zum Blockieren als das Vorderrad? Weil beim Bremsen das Hinterrad', 'radio'),
(2, 'Worauf müssen Sie in regelmäßigen Abständen die Reifen Ihres Fahrzeugs überprüfen?', 'checkbox'),
(3, 'Auf der Fahrbahn hat sich eine breite Wasserlache gebildet. Wie verhalten Sie sich?', 'checkbox'),
(4, 'Wegen einer technischen Veränderung Ihres Fahrzeugs mussten Sie eine Begutachtung durchführen lassen. Wozu sind Sie verpflichtet? Bescheinigung über die Begutachtung', 'radio'),
(5, 'In welchen Fällen muss das Überholen abgebrochen werden?', 'checkbox'),
(6, 'Welche Veränderungen können zum Erlöschen der Betriebserlaubnis führen?', 'checkbox');

ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `question`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
