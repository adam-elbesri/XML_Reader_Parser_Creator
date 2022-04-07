-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 nov. 2021 à 08:43
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testing`
--

-- --------------------------------------------------------

--
-- Structure de la table `demandeconference`
--

DROP TABLE IF EXISTS `demandeconference`;
CREATE TABLE IF NOT EXISTS `demandeconference` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `id` text NOT NULL,
  `sujet` text NOT NULL,
  `lieu` text NOT NULL,
  `date` text NOT NULL,
  `dureeConference` text NOT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `UNIQUE` (`id`(30))
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandeconference`
--

INSERT INTO `demandeconference` (`num`, `id`, `sujet`, `lieu`, `date`, `dureeConference`) VALUES
(7, 'William T. Strauss', 'COVID ', 'Manufacture', '3 NOVEMBRE ', '3h'),
(8, 'David N. Bateman', 'Ecologie', 'TrÃ©filerie', '4 janvier', '2h');

-- --------------------------------------------------------

--
-- Structure de la table `demandelisteformation`
--

DROP TABLE IF EXISTS `demandelisteformation`;
CREATE TABLE IF NOT EXISTS `demandelisteformation` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `id` text NOT NULL,
  `branche` text NOT NULL,
  `filliere` text NOT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `UNIQUE` (`id`(30))
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandelisteformation`
--

INSERT INTO `demandelisteformation` (`num`, `id`, `branche`, `filliere`) VALUES
(1, 'David N. Bateman', 'Ecologie', 'TrÃ©filerie'),
(2, 'William T. Strauss', 'COVID ', 'Manufacture');

-- --------------------------------------------------------

--
-- Structure de la table `demandestage`
--

DROP TABLE IF EXISTS `demandestage`;
CREATE TABLE IF NOT EXISTS `demandestage` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `id` text NOT NULL,
  `objet` text NOT NULL,
  `description` text NOT NULL,
  `lieu` text NOT NULL,
  `remuneration` text NOT NULL,
  `datedebut` text NOT NULL,
  `datefin` text NOT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `UNIQUE` (`id`(30))
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandestage`
--

INSERT INTO `demandestage` (`num`, `id`, `objet`, `description`, `lieu`, `remuneration`, `datedebut`, `datefin`) VALUES
(1, 'William T. Strauss', 'COVID ', 'Manufacture', '3 NOVEMBRE ', '3h', '31 DECEMBRE ', '2 FEVRIER'),
(2, 'David N. Bateman', 'Ecologie', 'TrÃ©filerie', '4 janvier', '2h', '31 DECEMBRE ', '2 FEVRIER');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id`, `name`, `address`, `gender`, `designation`, `age`) VALUES
(1, 'William T. Strauss', '2210 Roosevelt Road Pittsburg, KS 66762', 'Male', 'Transmission technician', 42),
(2, 'David N. Bateman', '3729 Sycamore Fork Road Miami, FL 33176', 'Male', 'Vegetable cook', 44),
(3, 'Gail P. Robinson', '991 Ashmor Drive Crookston, MN 56716', 'Female', 'Personnel administrator', 51),
(4, 'James M. Cardin', '120 Kuhl Avenue Atlanta, GA 30303', 'Male', 'Switchboard operator', 21),
(5, 'Jason K. Peterson', '1029 Lords Way Memphis, TN 38118', 'Male', 'Pediatrician', 43),
(6, 'Penni G. Vazquez', '1545 Whiteman Street Camden, NJ 08102', 'Female', 'Tractor driver', 33),
(7, 'David A. Davis', '617 Spirit Drive Port Orange, FL 32019', 'Male', 'Oncology nurse', 34),
(8, 'Kimberly J. Hemingway', '4874 Lynn Street Woburn, MA 01801', 'Female', 'Leasing manager', 32),
(9, 'Corine C. Conner', '1595 Meadowview Drive Fredericksburg, VA 22408', 'Female', 'Model', 22),
(10, 'Ben A. Champagne', '3736 Hartland Avenue Appleton, WI 54913', 'Male', 'Commentator', 21),
(11, 'Mary J. Smith', '727 Alexander Drive Arlington, TX 76011', 'Female', 'Safety inspector', 35),
(12, 'Buford R. Quinn', '2717 McDowell Street Nashville, TN 37210', 'Male', 'Log debarker', 23),
(13, 'Lawrence P. Walters', '4488 Stratford Court Rocky Mount, NC 27801', 'Male', 'Mechanical drafter', 26),
(14, 'Armando T. Trainor', '1272 Small Street New York, NY 10016', 'Male', 'Clinical laboratory technologist', 21),
(15, 'Cathy H. Maldonado', '287 Lakeland Terrace Southfield, MI 48075', 'Female', 'Dipper', 31),
(16, 'Elizabeth M. Manning', '2398 Wines Lane Houston, TX 77032', 'Female', 'Hearing therapist', 34),
(17, 'Jon B. Parker', '4317 Stuart Street Saxonsburg, PA 16056', 'Male', 'Watch repairer', 28),
(18, 'Lindsey C. Myers', '3529 Confederate Drive Earlville, NY 13332', 'Male', 'Cleaner', 42),
(19, 'Stephen T. Armijo', '2488 Confederate Drive Syracuse, NY 13202', 'Male', 'Legal secretary', 46),
(20, 'Estelle A. Sawyer', '2613 Creekside Lane Santa Barbara, CA 93178', 'Female', 'Dispatcher', 39);

-- --------------------------------------------------------

--
-- Structure de la table `reponseconference`
--

DROP TABLE IF EXISTS `reponseconference`;
CREATE TABLE IF NOT EXISTS `reponseconference` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `id` text NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `UnNIQUE` (`id`(30))
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponseconference`
--

INSERT INTO `reponseconference` (`num`, `id`, `reponse`) VALUES
(1, 'William T. Strauss', 'COVID '),
(2, 'David N. Bateman', 'Ecologie');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
