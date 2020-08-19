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

CREATE TABLE `poll` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ids` int(5) NOT NULL,
  `question` varchar(510) NOT NULL,
  `response` text NOT NULL,
  `note` int(1) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `poll` (`id`, `name`, `ids`, `question`, `response`, `note`, `ip`) VALUES
(1, 'Angela Merkel', 4674, 'Warum neigt das Hinterrad eines Motorrades beim Bremsen eher zum Blockieren als das Vorderrad? Weil beim Bremsen das Hinterrad', '- noch angetrieben wird', 0, '127.0.0.13'),
(2, 'Angela Merkel', 4674, 'Worauf müssen Sie in regelmäßigen Abständen die Reifen Ihres Fahrzeugs überprüfen?', 'Auf ausreichende Profiltiefe / Auf äußere Beschädigungen / ', 0, '127.0.0.13'),
(3, 'Angela Merkel', 4674, 'Auf der Fahrbahn hat sich eine breite Wasserlache gebildet. Wie verhalten Sie sich?', 'Auf den Gehweg ausweichen / Auf den Gehweg nicht ausweichen / ', 0, '127.0.0.13'),
(4, 'Angela Merkel', 4674, 'Wegen einer technischen Veränderung Ihres Fahrzeugs mussten Sie eine Begutachtung durchführen lassen. Wozu sind Sie verpflichtet? Bescheinigung über die Begutachtung', '- sofort dem Fahrzeughersteller übersenden', 0, '127.0.0.13'),
(5, 'Angela Merkel', 4674, 'In welchen Fällen muss das Überholen abgebrochen werden?', 'Wenn der Eingeholte plötzlich beschleunigt / Wenn der Eingeholte seine Geschwindigkeit stark verringert / Wenn durch unerwarteten Gegenverkehr Gefahr entsteht / ', 0, '127.0.0.13'),
(6, 'Angela Merkel', 4674, 'Welche Veränderungen können zum Erlöschen der Betriebserlaubnis führen?', 'Anbau eines Beiwagens / ', 0, '127.0.0.13'),
(7, 'Vladimir Putin', 7845, 'Warum neigt das Hinterrad eines Motorrades beim Bremsen eher zum Blockieren als das Vorderrad? Weil beim Bremsen das Hinterrad', '- entlastet wird', 1, '127.0.0.11'),
(8, 'Vladimir Putin', 7845, 'Worauf müssen Sie in regelmäßigen Abständen die Reifen Ihres Fahrzeugs überprüfen?', 'Auf ausreichende Profiltiefe / Auf äußere Beschädigungen / Auf richtigen Luftdruck / ', 1, '127.0.0.11'),
(9, 'Vladimir Putin', 7845, 'Auf der Fahrbahn hat sich eine breite Wasserlache gebildet. Wie verhalten Sie sich?', 'Vorher nicht bremsen, Beine hochnehmen und durchfahren / Auf den Gehweg ausweichen / ', 0, '127.0.0.11'),
(10, 'Vladimir Putin', 7845, 'Wegen einer technischen Veränderung Ihres Fahrzeugs mussten Sie eine Begutachtung durchführen lassen. Wozu sind Sie verpflichtet? Bescheinigung über die Begutachtung', '- sofort dem Fahrzeughersteller übersenden', 0, '127.0.0.11'),
(11, 'Vladimir Putin', 7845, 'In welchen Fällen muss das Überholen abgebrochen werden?', 'Wenn der Eingeholte plötzlich beschleunigt / Wenn durch unerwarteten Gegenverkehr Gefahr entsteht / ', 1, '127.0.0.11'),
(12, 'Vladimir Putin', 7845, 'Welche Veränderungen können zum Erlöschen der Betriebserlaubnis führen?', 'Verwendung von Reifen einer anderen Größe / ', 0, '127.0.0.11'),
(13, 'Donald Trump', 5039, 'Warum neigt das Hinterrad eines Motorrades beim Bremsen eher zum Blockieren als das Vorderrad? Weil beim Bremsen das Hinterrad', '- entlastet wird', 1, '127.0.0.12'),
(14, 'Donald Trump', 5039, 'Worauf müssen Sie in regelmäßigen Abständen die Reifen Ihres Fahrzeugs überprüfen?', 'Auf äußere Beschädigungen / Auf richtigen Luftdruck / ', 0, '127.0.0.12'),
(15, 'Donald Trump', 5039, 'Auf der Fahrbahn hat sich eine breite Wasserlache gebildet. Wie verhalten Sie sich?', 'Vorher nicht bremsen, Beine hochnehmen und durchfahren / Auf den Gehweg ausweichen / ', 0, '127.0.0.12'),
(16, 'Donald Trump', 5039, 'Wegen einer technischen Veränderung Ihres Fahrzeugs mussten Sie eine Begutachtung durchführen lassen. Wozu sind Sie verpflichtet? Bescheinigung über die Begutachtung', '- mitführen oder Fahrzeugpapiere berichtigen lassen', 1, '127.0.0.12'),
(17, 'Donald Trump', 5039, 'In welchen Fällen muss das Überholen abgebrochen werden?', 'Wenn der Eingeholte plötzlich beschleunigt / Wenn der Eingeholte seine Geschwindigkeit stark verringert / ', 0, '127.0.0.12'),
(18, 'Donald Trump', 5039, 'Welche Veränderungen können zum Erlöschen der Betriebserlaubnis führen?', 'Verwendung von Reifen einer anderen Größe / ', 0, '127.0.0.12');

ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `poll`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
