-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 juin 2022 à 12:29
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfebd`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `mobileno` text NOT NULL,
  `image` varchar(2000) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `name`, `gender`, `dob`, `mobileno`, `image`, `delete_status`) VALUES
(1, 'jalal', 'jalaleddinebouchrit@gmail.com', 'dc7561cf6b75b126c04a88b283bbc9110f9a113e23457050bc08f50c70fde27b', 'jalal', 'Male', '2002-05-20', '1234567899', 'photo.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointmentid` int(10) NOT NULL AUTO_INCREMENT,
  `raison` varchar(25) NOT NULL,
  `patientid` int(10) NOT NULL,
  `La_date_du_rendezvous` date DEFAULT NULL,
  `Le_temps_du_rendezvous` time DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `message` text,
  `delete_status` int(11) DEFAULT '0',
  `doctorname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`appointmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=818 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`appointmentid`, `raison`, `patientid`, `La_date_du_rendezvous`, `Le_temps_du_rendezvous`, `status`, `message`, `delete_status`, `doctorname`) VALUES
(44, 'Visite', 13, '2022-06-10', '11:12:00', 'Approuver', 'message', 0, 'jalal eddine bouchrit'),
(45, 'Visite', 15, '2022-06-09', '11:11:00', 'Approuver', 'message', 0, 'Ikram'),
(46, 'Cure', 17, '2022-06-08', '14:25:00', 'Approuver', 'message', 0, 'Ikram'),
(47, 'Visite', 15, '2022-05-30', '11:11:00', 'Approuver', 'message', 0, 'jalal eddine bouchrit'),
(48, 'Cure', 15, '2022-06-04', '11:11:00', 'Approuver', 'message', 0, 'Ikram'),
(49, 'Cure', 13, '2022-06-12', '11:01:00', 'Approuver', 'message', 0, 'Ikram'),
(50, 'Cure', 14, '2022-06-16', '11:01:00', 'Approuver', '.', 0, 'jalal eddine bouchrit'),
(51, 'Visite', 14, '2022-06-16', '15:15:00', 'Approuver', '.', 0, 'jalal eddine bouchrit'),
(52, 'Cure', 18, '2022-06-16', '15:15:00', 'Approuver', '.', 0, 'jamal'),
(53, 'Visite', 13, '2022-06-20', '11:12:00', 'Approuver', '.', 0, 'jamal'),
(54, 'Visite', 13, '2022-06-20', '11:01:00', 'Approuver', '.', 0, 'jalal eddine bouchrit'),
(410, 'Cure', 16, '2022-06-22', '13:44:00', 'Approuver', '.', 0, 'jamal'),
(420, 'Cure', 16, '2022-06-23', '13:44:00', 'Approuver', '.', 0, 'jamal'),
(440, 'Cure', 14, '2022-06-21', '13:44:00', 'Approuver', '.', 0, 'jalal eddine bouchrit'),
(450, 'Cure', 13, '2022-06-20', '13:44:00', 'Approuver', '.', 0, 'jalal eddine bouchrit'),
(470, 'Cure', 16, '2022-06-24', '13:44:00', 'Approuver', '.', 0, 'jamal'),
(810, 'Cure', 14, '2022-06-25', '13:44:00', 'Approuver', '.', 0, 'jamal'),
(811, 'Visite', 14, '2022-06-20', '11:00:00', 'Approuver', '.', 0, 'Ikram'),
(812, 'Visite', 15, '2022-06-18', '11:01:00', 'Approuver', '.', 0, 'Ikram'),
(813, 'Cure', 14, '2022-06-20', '16:10:00', 'Approuver', '.', 0, 'Ikram'),
(814, 'Visite', 15, '2022-06-22', '10:12:00', 'Approuver', '.', 0, 'jamal'),
(815, 'Visite', 15, '2022-06-20', '10:10:00', 'En attente', '.', 1, 'jamal'),
(816, 'Cure', 18, '2022-06-20', '10:12:00', 'Approuver', '.', 0, 'amine'),
(817, 'Visite', 18, '2022-06-20', '15:45:00', 'En attente', '.\r\n', 0, 'patient1');

-- --------------------------------------------------------

--
-- Structure de la table `arthromyalgique`
--

DROP TABLE IF EXISTS `arthromyalgique`;
CREATE TABLE IF NOT EXISTS `arthromyalgique` (
  `Survient_sous_Docetaxel_` varchar(3) NOT NULL,
  `Delai_dapparition` varchar(7) NOT NULL,
  `Durée_dévolution` varchar(7) NOT NULL,
  `Date_de_declaration` varchar(11) NOT NULL,
  `Hanches` varchar(5) NOT NULL,
  `Epaules` varchar(5) NOT NULL,
  `Membres` varchar(5) NOT NULL,
  `Aucun` varchar(4) NOT NULL,
  `Crampes_musculaires` varchar(4) NOT NULL,
  `Douleurs_diffuses` varchar(5) NOT NULL,
  `Arthralgies` varchar(4) NOT NULL,
  `Patient_Ip` varchar(7) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`Survient_sous_Docetaxel_`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cures`
--

DROP TABLE IF EXISTS `cures`;
CREATE TABLE IF NOT EXISTS `cures` (
  `Vous_avez_passé_votre_cure_` varchar(3) NOT NULL,
  `La_date_dont_vous_avez_passé_la_cure` date NOT NULL,
  `La_date_de_la_prochaine_cure` date NOT NULL,
  `Le_nombre_de_jours_restant_avant_votre_prochaine_cure` int(11) NOT NULL,
  `Patient_Ip` varchar(4) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`Vous_avez_passé_votre_cure_`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cures`
--

INSERT INTO `cures` (`Vous_avez_passé_votre_cure_`, `La_date_dont_vous_avez_passé_la_cure`, `La_date_de_la_prochaine_cure`, `Le_nombre_de_jours_restant_avant_votre_prochaine_cure`, `Patient_Ip`, `id`) VALUES
('oui', '2022-06-01', '2022-06-04', 3, '13', 1),
('ahh', '2022-06-04', '2022-06-08', 4, '13', 2);

-- --------------------------------------------------------

--
-- Structure de la table `cutane_symptome`
--

DROP TABLE IF EXISTS `cutane_symptome`;
CREATE TABLE IF NOT EXISTS `cutane_symptome` (
  `Rash_cutanée` varchar(4) NOT NULL,
  `Mains_et_pieds` varchar(4) NOT NULL,
  `Ongles` varchar(4) NOT NULL,
  `Infiltration_oedémateuse` varchar(5) NOT NULL,
  `Alopécie` varchar(5) NOT NULL,
  `Suivi_d’une_extravasation_cutanée` varchar(5) NOT NULL,
  `Date_de_déclaration` varchar(11) NOT NULL,
  `Grade_de_rash_cutanée` varchar(7) NOT NULL,
  `Grade_de_mains_et_pieds` varchar(7) NOT NULL,
  `Grade_des_ongles` varchar(7) NOT NULL,
  `Patient_Ip` varchar(7) NOT NULL,
  `id` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `digestive_symptome`
--

DROP TABLE IF EXISTS `digestive_symptome`;
CREATE TABLE IF NOT EXISTS `digestive_symptome` (
  `Nausées` varchar(4) NOT NULL,
  `Vomissements` varchar(5) NOT NULL,
  `Diarrhées` varchar(5) NOT NULL,
  `Constipation` varchar(4) NOT NULL,
  `Mucite` varchar(4) NOT NULL,
  `Douleurs_abdominales` varchar(5) NOT NULL,
  `Modification_des_gouts_des_aliments` varchar(5) NOT NULL,
  `Date_de_déclaration` varchar(11) NOT NULL,
  `Grade_de_nausées` varchar(7) NOT NULL,
  `Grade_de_diarrhées` varchar(7) NOT NULL,
  `Grade_de_constipation` varchar(7) NOT NULL,
  `Grade_de_mucite` varchar(7) NOT NULL,
  `Patient_Ip` varchar(7) NOT NULL,
  `id` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `Doctor_Ip` int(7) NOT NULL AUTO_INCREMENT,
  `doctorname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text,
  `status` varchar(10) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `Age` int(11) NOT NULL,
  `Sex` varchar(500) NOT NULL,
  PRIMARY KEY (`Doctor_Ip`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `doctor`
--

INSERT INTO `doctor` (`Doctor_Ip`, `doctorname`, `mobileno`, `email`, `password`, `status`, `delete_status`, `Age`, `Sex`) VALUES
(8, 'jalal eddine bouchrit', '0767366988', 'jalaleddinebouchrit@gmail.com', '241992a37c6a7a7044edca190836547108001676d2f586efa0f1923da5372454', 'Active', 1, 20, 'Male'),
(12, 'Ikram', '0661514252', 'DRikram@gmail.com', NULL, 'Active', 0, 66, 'Femelle'),
(13, 'jamal', '0651425245', 'jamal@gmail.com', NULL, 'Active', 0, 56, 'Male'),
(14, 'mohamed', '0662532152', 'meditachi@gmail.com', NULL, 'Active', 0, 55, 'Male'),
(15, 'ali', '0651425212', 'anas@gmail.com', NULL, 'Inactive', 0, 55, 'Male'),
(16, 'patient1', '0661514312', 'patient1@gmail.com', NULL, 'Active', 0, 25, 'Male'),
(17, 'amine', '0651424578', 'mohammed@gmail.com', NULL, 'Active', 1, 25, 'Male');

-- --------------------------------------------------------

--
-- Structure de la table `gonadique`
--

DROP TABLE IF EXISTS `gonadique`;
CREATE TABLE IF NOT EXISTS `gonadique` (
  `Apparition_après_combien_de_cures_` int(11) NOT NULL,
  `Irrégularité_du_cycle` varchar(4) NOT NULL,
  `Modification_du_rythme_ou_de_quantité` varchar(5) NOT NULL,
  `Interruption_totale_des_règles` varchar(4) NOT NULL,
  `Signes_de_dérivation_ostrogénique` varchar(5) NOT NULL,
  `Date_de_declaration` varchar(11) NOT NULL,
  `Grade` varchar(11) NOT NULL,
  `Patient_Ip` varchar(7) NOT NULL,
  `id` bit(1) NOT NULL,
  PRIMARY KEY (`Apparition_après_combien_de_cures_`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gonadique`
--

INSERT INTO `gonadique` (`Apparition_après_combien_de_cures_`, `Irrégularité_du_cycle`, `Modification_du_rythme_ou_de_quantité`, `Interruption_totale_des_règles`, `Signes_de_dérivation_ostrogénique`, `Date_de_declaration`, `Grade`, `Patient_Ip`, `id`) VALUES
(3, 'true', 'false', 'true', 'false', '19 Mai 2022', 'Rassurement', '15', b'1');

-- --------------------------------------------------------

--
-- Structure de la table `manage_website`
--

DROP TABLE IF EXISTS `manage_website`;
CREATE TABLE IF NOT EXISTS `manage_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(600) NOT NULL,
  `business_email` varchar(600) NOT NULL,
  `business_web` varchar(500) NOT NULL,
  `portal_addr` varchar(500) NOT NULL,
  `addr` varchar(600) NOT NULL,
  `date_format` date NOT NULL,
  `logo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `manage_website`
--

INSERT INTO `manage_website` (`id`, `business_name`, `business_email`, `business_web`, `portal_addr`, `addr`, `date_format`, `logo`) VALUES
(1, 'CHU', 'jalaleddinebouchrit@gmail.com', 'https://www.chumarrakech.ma/', 'Safi', 'jalal eddine bouchrit : ', '2022-06-11', 'logo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `medicineid` int(10) NOT NULL AUTO_INCREMENT,
  `medicinename` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `delete_status` int(11) DEFAULT '0',
  `toxicite` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`medicineid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medicine`
--

INSERT INTO `medicine` (`medicineid`, `medicinename`, `description`, `status`, `delete_status`, `toxicite`) VALUES
(10, 'doliprane', 'effervescence', 'Active', 0, 'Digestive'),
(11, 'doliprane 1000', 'siiuq', 'Active', 1, 'Digestive');

-- --------------------------------------------------------

--
-- Structure de la table `neurologique`
--

DROP TABLE IF EXISTS `neurologique`;
CREATE TABLE IF NOT EXISTS `neurologique` (
  `Topographie_de_la_neuropathie` varchar(21) NOT NULL,
  `Picotements` varchar(5) NOT NULL,
  `Fourmillements` varchar(4) NOT NULL,
  `Dysethésies` varchar(5) NOT NULL,
  `Sensation_de_brulure` varchar(4) NOT NULL,
  `Douleur` varchar(5) NOT NULL,
  `Difficulté_à_gravir_les_escaliers` varchar(5) NOT NULL,
  `Difficulté_de_l’extension_des_doigts` varchar(4) NOT NULL,
  `Altération_des_activités_quotidiennes` varchar(5) NOT NULL,
  `Aucun` varchar(5) NOT NULL,
  `Date_de_declaration` varchar(11) NOT NULL,
  `Grade` varchar(10) NOT NULL,
  `Patient_Ip` varchar(7) NOT NULL,
  `id` bit(1) NOT NULL,
  PRIMARY KEY (`Topographie_de_la_neuropathie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `neurologique`
--

INSERT INTO `neurologique` (`Topographie_de_la_neuropathie`, `Picotements`, `Fourmillements`, `Dysethésies`, `Sensation_de_brulure`, `Douleur`, `Difficulté_à_gravir_les_escaliers`, `Difficulté_de_l’extension_des_doigts`, `Altération_des_activités_quotidiennes`, `Aucun`, `Date_de_declaration`, `Grade`, `Patient_Ip`, `id`) VALUES
('', '', '', '', '', '', '', '', '', '', '19 Mai 2022', '3', '13', b'0');

-- --------------------------------------------------------

--
-- Structure de la table `oculaire`
--

DROP TABLE IF EXISTS `oculaire`;
CREATE TABLE IF NOT EXISTS `oculaire` (
  `Fréquente_avec_Docetaxel_` varchar(3) NOT NULL,
  `Delai_dapparition` varchar(7) NOT NULL,
  `Durée_dévolution` varchar(7) NOT NULL,
  `Date_de_declaration` varchar(11) NOT NULL,
  `Rougueur` varchar(5) NOT NULL,
  `Larmoiement` varchar(4) NOT NULL,
  `œdème` varchar(5) NOT NULL,
  `Sensation_de_picotement` varchar(4) NOT NULL,
  `Baisse` varchar(5) NOT NULL,
  `Fièvre` varchar(4) NOT NULL,
  `Aucun` varchar(5) NOT NULL,
  `Grade` varchar(7) NOT NULL,
  `Patient_Ip` varchar(7) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`Fréquente_avec_Docetaxel_`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `oculaire`
--

INSERT INTO `oculaire` (`Fréquente_avec_Docetaxel_`, `Delai_dapparition`, `Durée_dévolution`, `Date_de_declaration`, `Rougueur`, `Larmoiement`, `œdème`, `Sensation_de_picotement`, `Baisse`, `Fièvre`, `Aucun`, `Grade`, `Patient_Ip`, `id`) VALUES
('Oui', '3 jours', '5 jours', '19 Mai 2022', 'false', 'true', 'false', 'true', 'false', 'true', 'false', 'Hopital', '13', 3);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patientid` int(10) NOT NULL AUTO_INCREMENT,
  `patientname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `delete_status` int(11) DEFAULT '0',
  `Age` varchar(15) NOT NULL,
  `admissiondate` date DEFAULT NULL,
  PRIMARY KEY (`patientid`),
  KEY `loginid` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`patientid`, `patientname`, `mobileno`, `email`, `gender`, `status`, `delete_status`, `Age`, `admissiondate`) VALUES
(13, 'jalal', '0661514312', '1@gmail.com', 'Male', 'Active', 0, '22', '2022-05-17'),
(14, 'saif eddine', '06162548', 'saif@gmail.com', 'Male', 'Active', 0, '22', '2022-05-18'),
(15, 'patient1', '06514375', 'patient1@gmail.com', 'Male', 'Active', 0, '52', '2022-05-20'),
(16, 'amine berkokii', '0661514375', 'abdellah2fff81100@gmail.com', 'Male', 'Active', 0, '20', '2022-06-10'),
(17, 'charaf eddine', '01252536', 'jalaleddinezzbouchrit@gmail.com', 'Male', 'Active', 0, '25', '2022-06-10'),
(18, 'anas ', '0615427845', 'anas@gmail.com', 'Male', 'Active', 0, '20', '2022-06-12');

-- --------------------------------------------------------

--
-- Structure de la table `toxicite`
--

DROP TABLE IF EXISTS `toxicite`;
CREATE TABLE IF NOT EXISTS `toxicite` (
  `toxiciteid` int(10) NOT NULL AUTO_INCREMENT,
  `date_declaration` date DEFAULT NULL,
  `nom_toxicite` varchar(500) DEFAULT NULL,
  `delete_status` int(11) DEFAULT '0',
  `status` varchar(10) DEFAULT NULL,
  `description` text,
  `nombre_declaration` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`toxiciteid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `toxicite`
--

INSERT INTO `toxicite` (`toxiciteid`, `date_declaration`, `nom_toxicite`, `delete_status`, `status`, `description`, `nombre_declaration`) VALUES
(4, '2022-06-20', 'Toxicite Neurologique', 0, 'active', NULL, '4'),
(3, '2022-06-11', 'Toxicite Arthromyalgique', 0, 'active', NULL, '7'),
(2, '2022-06-10', 'Toxicite Cutane', 0, 'active', NULL, '5'),
(1, '2022-06-01', 'Toxicite Digestive', 0, 'active', NULL, '10'),
(6, '2022-06-20', 'Toxicite Oculaire', 0, 'active', NULL, '3'),
(7, '2022-06-19', 'Toxicite Gonadique ', 0, 'active', NULL, '1');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL,
  `loginname` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `patientname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createddateandtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
