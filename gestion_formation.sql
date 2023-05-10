-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2023 at 12:48 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_formation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` int NOT NULL AUTO_INCREMENT,
  `NOM_ADMIN` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `EMAIL_ADMIN` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `MDP_ADMIN` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='L''administrateur est en charge de la gestion des formateurs';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NOM_ADMIN`, `EMAIL_ADMIN`, `MDP_ADMIN`) VALUES
(1, 'Jalal', 'jalalkadori2@gmail.com', '-*/Jalal-*/312!?'),
(2, 'Ihsane', 'ihsane@gmail.com', '-*/Ihsane-*/312!?');

-- --------------------------------------------------------

--
-- Table structure for table `apprenant`
--

DROP TABLE IF EXISTS `apprenant`;
CREATE TABLE IF NOT EXISTS `apprenant` (
  `ID_APPRENANT` int NOT NULL AUTO_INCREMENT,
  `NOM_APPRENANT` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `EMAIL_APPRENANT` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `MDP_APPRENANT` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `TELE_APPRENANT` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID_APPRENANT`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='L''apprenant peut rechercher une formation en fonction de di';

--
-- Dumping data for table `apprenant`
--

INSERT INTO `apprenant` (`ID_APPRENANT`, `NOM_APPRENANT`, `EMAIL_APPRENANT`, `MDP_APPRENANT`, `TELE_APPRENANT`) VALUES
(1, 'Yassine', 'yassine@gmail.com', '-*/Yassine-*/312!?', '601020304'),
(2, 'Mohcine', 'Mohcine@gmail.com', '-*/Mohcine-*/312!?', '601020304'),
(24, 'James Smith', 'james.smith123@gmail.com', '@#kje1Dn3', '5551234567'),
(25, 'Olivia Wilson', 'olivia.wilson456@hotmail.com', 'W9fj#k2Ls', '5552345678'),
(26, 'Ethan Johnson', 'ejohnson789@yahoo.com', '@S8dskWc9', '5553456789'),
(27, 'Emma Davis', 'edavis234@gmail.com', 'Fj2K#d8fS', '5554567890'),
(28, 'Noah Brown', 'noah.brown567@hotmail.com', '3pRt#dL9s', '5555678901'),
(29, 'Ava Garcia', 'agarcia901@yahoo.com', 'Kj2d#fP7s', '5556789012'),
(30, 'William Jones', 'wjones234@gmail.com', '@#ksdFh7G', '5557890123'),
(31, 'Sophia Rodriguez', 'srodriguez678@hotmail.com', 'Kd9#fP3Rt', '5558901234'),
(32, 'Benjamin Lee', 'blee901@yahoo.com', 'Sd7Kf#3pR', '5559012345'),
(33, 'Isabella Perez', 'iperez567@gmail.com', '8fSj#k2dL', '5550123456'),
(34, 'Michael Martin', 'mmartin901@hotmail.com', 'Dn3@#ksdF', '5551234567'),
(35, 'Mia Jackson', 'mjackson234@yahoo.com', '#k2Ls8fSj', '5552345678'),
(36, 'Alexander Martinez', 'amartinez456@gmail.com', 'Wc9@S8dsk', '5553456789'),
(37, 'Charlotte Hernandez', 'chernandez678@hotmail.com', 'dL9s3pRt#', '5554567890'),
(38, 'Daniel Davis', 'ddavis123@yahoo.com', 'fP7sKj2d#', '5555678901'),
(39, 'Amelia Rodriguez', 'arodriguez234@gmail.com', 'Fh7G@#ksd', '5556789012'),
(40, 'Matthew Wilson', 'mwilson567@hotmail.com', 'fP3RtKd9#', '5557890123'),
(41, 'Evelyn Garcia', 'egarcia901@yahoo.com', '3pRtSd7Kf', '5558901234'),
(42, 'Lucas Smith', 'lsmith234@gmail.com', 'k2dL8fSj#', '5559012345'),
(43, 'Harper Johnson', 'hjohnson567@hotmail.com', 'sDf#3pRtL', '5550123456'),
(44, 'Emily Thompson', 'ethompson234@gmail.com', '9#hjKs2Df', '5551234567'),
(45, 'Aiden Moore', 'amoore901@hotmail.com', '3rT#kje1D', '5552345678'),
(46, 'Madison Allen', 'mallen456@yahoo.com', 'L7dSk#fj2', '5553456789'),
(47, 'Carter King', 'cking789@gmail.com', 'Wc9@#ksdF', '5554567890'),
(48, 'Grace Wright', 'gwright123@hotmail.com', 'pRt#dL9s3', '5555678901'),
(49, 'Mason Scott', 'mscott456@gmail.com', 'Kj2d#fP7s', '5556789012'),
(50, 'Chloe Green', 'cgreen789@yahoo.com', 'S8dskWc9@', '5557890123'),
(51, 'Elijah Baker', 'ebaker123@gmail.com', 'fSj#k2dL8', '5558901234'),
(52, 'Avery Hall', 'ahall567@hotmail.com', 'fP3RtKd9#', '5559012345'),
(53, 'Evelyn Cooper', 'ecooper234@gmail.com', 'ksdFh7G@#', '5550123456'),
(54, 'Owen Hill', 'ohill901@yahoo.com', 'rT#kje1Ds', '5551234567'),
(55, 'Lily Flores', 'lflores456@hotmail.com', 'k2Ls8fSj#', '5552345678'),
(56, 'Luke Collins', 'lcollins789@gmail.com', 'skWc9@S8d', '5553456789'),
(57, 'Aria Gonzalez', 'agonzalez123@yahoo.com', 'dL9s3pRt#', '5554567890'),
(58, 'Caleb Perez', 'cperez456@gmail.com', 'fP7sKj2d#', '5555678901'),
(59, 'Sofia Turner', 'sturner789@hotmail.com', 'h7G@#ksdF', '5556789012'),
(60, 'Logan Parker', 'lparker234@yahoo.com', '3Rt#dL9s', '5557890123'),
(61, 'Aaliyah Baker', 'abaker901@gmail.com', 'dskWc9@S8', '5558901234'),
(62, 'Daniel Cooper', 'dcooper567@hotmail.com', 'fSj#k2dL8', '5559012345'),
(63, 'Aurora Nelson', 'anelson123@gmail.com', 'P3RtKd9#f', '5550123456'),
(64, 'Henry Ward', 'hward456@yahoo.com', 'sdFh7G@#k', '5551234567'),
(65, 'Leah Ramirez', 'lramirez789@hotmail.com', 'e1Dn3@#k', '5552345678'),
(66, 'Wyatt Foster', 'wfoster234@gmail.com', 'Ls8fSj#k2', '5552345678'),
(67, NULL, NULL, NULL, NULL),
(68, 'Kaddouri jalal', 'k.jalal@gmail.com', '-*/Yassine-*/312!?', '125362854');

-- --------------------------------------------------------

--
-- Table structure for table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `ID_FORMATEUR` int NOT NULL AUTO_INCREMENT,
  `ID_ADMIN` int NOT NULL,
  `NOM_FORMATEUR` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `EMAIL_FORMATEUR` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `MDP_FORMATEUR` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_FORMATEUR`),
  KEY `FK_FORMATEU_GERER_ADMIN` (`ID_ADMIN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='Le formateur peut consulter la liste de ses sessions et voir';

--
-- Dumping data for table `formateur`
--

INSERT INTO `formateur` (`ID_FORMATEUR`, `ID_ADMIN`, `NOM_FORMATEUR`, `EMAIL_FORMATEUR`, `MDP_FORMATEUR`) VALUES
(1, 1, 'Mehdi', 'Mehdi@gmail.com', '-*/Mehdi-*/312!?'),
(2, 1, 'Abdel', 'Adbel@gmail.com', '-*/Abdel-*/312!?');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `ID_FORMATION` int NOT NULL AUTO_INCREMENT,
  `ID_ADMIN` int NOT NULL,
  `SUJET_FORMATION` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `CATEGORIE_FORMATION` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `HORRAIRE_FORMATION` time DEFAULT NULL,
  `DESCRIPTIVE_FORMATION` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_FORMATION`),
  KEY `FK_FORMATIO_CREER_ADMIN` (`ID_ADMIN`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`ID_FORMATION`, `ID_ADMIN`, `SUJET_FORMATION`, `CATEGORIE_FORMATION`, `HORRAIRE_FORMATION`, `DESCRIPTIVE_FORMATION`) VALUES
(1, 2, 'Introduction au développement web', 'Développement web', '18:00:00', 'Cette formation vous apprendra les bases du développement web en vous guidant à travers la création d\'un site web simple. Vous apprendrez à utiliser HTML, CSS et JavaScript pour créer des pages web interactives.'),
(2, 1, 'Programmation orientée objet en Python', 'Programmation Python', '24:00:00', 'Cette formation vous apprendra les concepts de base de la programmation orientée objet (POO) en Python. Vous apprendrez à créer des classes, des objets et des méthodes, et à les utiliser pour résoudre des problèmes.'),
(3, 1, 'Développement mobile avec React Native', 'Développement mobile', '40:00:40', 'Cette formation vous apprendra à créer des applications mobiles pour iOS et Android à l\'aide de React Native. Vous apprendrez à utiliser des composants React, à intégrer des API et à déployer votre application sur les app stores.'),
(4, 2, 'Développement de jeux vidéo avec Unity', 'Développement de jeux vidéo', '30:00:00', 'Cette formation vous apprendra à utiliser Unity pour créer des jeux vidéo. Vous apprendrez à créer des personnages, des environnements, à programmer des interactions et à exporter votre jeu pour différents plateformes.'),
(5, 1, 'Développement de logiciels avec Java', 'Programmation Java', '48:00:00', 'la programmation en Java, y compris les classes, les objets, les interfaces et les exceptions. Vous apprendrez également à utiliser des bibliothèques populaires telles que Swing pour créer des interfaces graphiques.'),
(6, 1, 'Développement de sites web dynamiques avec PHP', 'Développement web', '18:00:00', 'Cette formation vous apprendra à utiliser PHP pour créer des sites web dynamiques. Vous apprendrez à utiliser des'),
(7, 1, 'Développement d\'applications mobiles avec Kotlin', 'Développement mobile', '40:00:00', 'Cette formation vous apprendra à développer des applications mobiles pour Android en utilisant Kotlin, le langage de programmation moderne pour le développement d\'applications Android. Vous apprendrez à créer des interfaces utilisateur, à accéder aux fonctionnalités du téléphone et à déployer votre application sur Google Play.');

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `ID_INSCRIPTION` int NOT NULL AUTO_INCREMENT,
  `ID_APPRENANT` int NOT NULL,
  `ID_SESSION` int NOT NULL,
  `VALIDATION` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_INSCRIPTION`),
  KEY `FK_INSCRIPT_SINSCRIRE_APPRENAN` (`ID_APPRENANT`),
  KEY `FK_INSCRIPT_SINSCRIRE_SESSION` (`ID_SESSION`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`ID_INSCRIPTION`, `ID_APPRENANT`, `ID_SESSION`, `VALIDATION`) VALUES
(1, 1, 3, NULL),
(2, 2, 1, NULL),
(3, 63, 3, NULL),
(4, 64, 3, NULL),
(5, 58, 3, NULL),
(6, 59, 3, NULL),
(7, 1, 4, 'OUI'),
(8, 62, 4, 'OUI'),
(9, 36, 4, 'NON'),
(10, 47, 4, 'OUI'),
(11, 61, 4, 'NON'),
(13, 24, 1, NULL),
(14, 25, 1, NULL),
(15, 26, 1, NULL),
(16, 27, 1, NULL),
(17, 28, 1, NULL),
(18, 29, 1, NULL),
(19, 60, 2, NULL),
(20, 45, 2, NULL),
(22, 1, 8, NULL),
(36, 68, 2, NULL),
(40, 68, 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `ID_SESSION` int NOT NULL AUTO_INCREMENT,
  `ID_FORMATEUR` int NOT NULL,
  `ID_FORMATION` int NOT NULL,
  `DATE_DEBUT_SESSION` date DEFAULT NULL,
  `DATE_FIN_SESSION` date DEFAULT NULL,
  `NOMBRE_PLACES_SESSION` smallint DEFAULT NULL,
  `ETAT_SESSION` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_SESSION`),
  KEY `FK_SESSION_AFFECTER_FORMATEU` (`ID_FORMATEUR`),
  KEY `FK_SESSION_CONCERNE_FORMATIO` (`ID_FORMATION`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`ID_SESSION`, `ID_FORMATEUR`, `ID_FORMATION`, `DATE_DEBUT_SESSION`, `DATE_FIN_SESSION`, `NOMBRE_PLACES_SESSION`, `ETAT_SESSION`) VALUES
(1, 1, 1, '2023-05-01', '2023-06-10', 5, 'inscription achevée'),
(2, 2, 5, '2023-06-04', '2023-07-04', 12, 'en cours d\'inscription'),
(3, 1, 6, '2023-04-02', '2023-05-13', 20, 'en cours'),
(4, 1, 7, '2023-02-01', '2023-02-28', 15, 'cloturée'),
(7, 2, 3, '2023-01-01', '2023-01-31', 10, 'annulée'),
(8, 1, 6, '2023-07-01', '2023-08-31', 20, 'en cours d\'inscription'),
(9, 1, 6, '2023-09-01', '2023-09-30', 10, 'en cours d\'inscription');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formateur`
--
ALTER TABLE `formateur`
  ADD CONSTRAINT `FK_FORMATEU_GERER_ADMIN` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Constraints for table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_FORMATIO_CREER_ADMIN` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_INSCRIPT_SINSCRIRE_APPRENAN` FOREIGN KEY (`ID_APPRENANT`) REFERENCES `apprenant` (`ID_APPRENANT`),
  ADD CONSTRAINT `FK_INSCRIPT_SINSCRIRE_SESSION` FOREIGN KEY (`ID_SESSION`) REFERENCES `session` (`ID_SESSION`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `FK_SESSION_AFFECTER_FORMATEU` FOREIGN KEY (`ID_FORMATEUR`) REFERENCES `formateur` (`ID_FORMATEUR`),
  ADD CONSTRAINT `FK_SESSION_CONCERNE_FORMATIO` FOREIGN KEY (`ID_FORMATION`) REFERENCES `formation` (`ID_FORMATION`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
