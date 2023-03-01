-- --------------------------------------------------------
-- Hôte:                         localhost
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour agenda
CREATE DATABASE IF NOT EXISTS `agenda` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `agenda`;

-- Listage de la structure de la table agenda. agendas
CREATE TABLE IF NOT EXISTS `agendas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `id_user` int(4) NOT NULL,
  `guests` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Listage des données de la table agenda.agendas : ~10 rows (environ)
/*!40000 ALTER TABLE `agendas` DISABLE KEYS */;
INSERT INTO `agendas` (`id`, `name`, `is_public`, `id_user`, `guests`, `created_at`) VALUES
	(1, 'Activités Louis', 1, 1, 'ha@yahoo.com,louis@yahoo.com,home@yahoo.com', '2022-09-21 00:00:00'),
	(2, 'Shopping', 1, 1, '', '2022-09-21 00:00:00'),
	(3, 'Activités Henri', 1, 1, 'ha@yahoo.com,louis@yahoo.com', '2022-09-21 00:00:00'),
	(4, 'Activités sport Nov2022', 0, 1, '', '2022-09-21 00:00:00'),
	(5, 'Cours marché Nov22', 1, 1, 'ha@yahoo.com', '2022-09-21 00:00:00'),
	(7, 'Badminton', 1, 2, 'vtrhung@yahoo.com', '2022-09-21 00:00:00'),
	(8, 'Tennis', 1, 4, 'louis@yahoo.com,vtrhung@yahoo.com', '2022-09-21 00:00:00'),
	(9, 'Sorties scolaire', 1, 4, 'louis@yahoo.com', '2022-09-21 00:00:00'),
	(10, 'Sports famille', 1, 2, 'vtrhung@yahoo.com,henri@yahoo.com,louis@yahoo.com', '2022-09-21 00:00:00'),
	(11, 'Sorties famille', 1, 2, 'vtrhung@yahoo.com,henri@yahoo.com,louis@yahoo.com', '2022-09-21 00:00:00'),
	(12, 'Dossier profesionnel', 0, 1, '', '2023-03-01 13:43:24'),
	(13, 'Dossier profesionnel', 0, 1, '', '2023-03-01 13:44:43');
/*!40000 ALTER TABLE `agendas` ENABLE KEYS */;

-- Listage de la structure de la table agenda. events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_user` int(4) NOT NULL,
  `id_agenda` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `guests` varchar(500) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startdate` date NOT NULL,
  `starthour` varchar(50) DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `endhour` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Listage des données de la table agenda.events : ~20 rows (environ)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `id_user`, `id_agenda`, `name`, `description`, `guests`, `type`, `startdate`, `starthour`, `enddate`, `endhour`) VALUES
	(1, 1, 1, 'test', 'hung', 'ha@yahoo.com', 'event', '2022-09-15', '', '2022-09-16', ''),
	(2, 1, 5, 'test', 'hung', 'ha@yahoo.com,louis@yahoo.com', 'event', '2022-09-13', '', '2022-09-16', ''),
	(3, 1, 3, 'test', 'hung', 'louis@yahoo.com', 'event', '2022-09-15', '', '2022-09-18', ''),
	(4, 1, 3, 'test', 'hung', 'ha@yahoo.com,louis@yahoo.com', 'event', '2022-09-15', '', '2022-09-20', ''),
	(5, 1, 2, 'test', 'hung', 'vtrhung@yahoo.com,ha@yahoo.com,', 'event', '2022-09-09', '', '2022-09-12', ''),
	(6, 1, 4, 'test', 'hung', 'ha@yahoo.com,', 'event', '2022-09-18', '', '2022-09-21', ''),
	(7, 1, 5, 'test', 'hung', 'ha@yahoo.com,louis@yahoo.com', 'event', '2022-09-20', '', '2022-09-24', ''),
	(8, 1, 3, 'sport', 'test', 'vtrhung@yahoo.com,ha@yahoo.com,louis@yahoo.com,home@yahoo.com', 'event', '2022-09-15', '', '2022-09-22', ''),
	(10, 1, 2, 'trong53', 'tennis', 'vtrhung@yahoo.com,ha@yahoo.com,louis@yahoo.com', 'event', '2022-09-21', '', '2022-09-23', ''),
	(11, 1, 2, 'sport tennis', 'Gymnase Cortots', '', 'event', '2022-09-25', '', '2022-09-28', ''),
	(12, 4, 8, 'sport', 'jogging', '', 'event', '2022-09-22', '', '2022-09-30', ''),
	(13, 4, 8, 'Natation', 'Grésille', '', 'event', '2022-09-29', '16:00', '2022-10-06', '17:00'),
	(14, 2, 11, 'Cours marché', 'Fontaine Les Dijon', '', 'event', '2022-09-29', '12:00', '2022-10-06', '18:00'),
	(15, 2, 10, 'Vélo', 'Dijon', '', 'event', '2022-09-29', '10:00', '2022-10-06', '19:00'),
	(16, 2, 7, 'inscription tennis', 'Gymnase Cortots', NULL, 'task', '2022-09-30', '10:00', NULL, NULL),
	(22, 1, 1, 'sport', 'agenda défini', '', 'event', '2022-09-30', '', '2022-10-06', ''),
	(23, 1, 2, 'sport', 'test tache', NULL, 'task', '2022-09-30', '14:37', NULL, NULL),
	(24, 1, 7, 'tache agen collabo', 'tache agen collabo', NULL, 'task', '2022-09-28', '15:41', NULL, NULL);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Listage de la structure de la table agenda. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `Email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Listage des données de la table agenda.users : ~6 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `password`, `email`, `created_at`) VALUES
	(1, 'hung', 'hung', 'vtrhung@yahoo.com', '2022-09-19 10:39:03'),
	(2, 'ha', 'ha', 'ha@yahoo.com', '2022-08-19 12:39:03'),
	(3, 'louis', 'louis', 'louis@yahoo.com', '2022-07-19 12:39:03'),
	(4, 'henri', 'henri', 'henri@yahoo.com', '2022-09-15 12:39:03'),
	(7, 'home', 'home', 'home@yahoo.com', '2022-09-10 12:39:03'),
	(8, 'familly', 'Familly1234+', 'familly@yahoo.com', '2022-09-19 12:39:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
