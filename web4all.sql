-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 02 avr. 2025 à 17:13
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web4all`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID-admin` int NOT NULL AUTO_INCREMENT COMMENT 'Id des admins',
  `Prenom-admin` varchar(60) NOT NULL COMMENT 'Prenom des admins',
  `Nom-admin` varchar(60) NOT NULL COMMENT 'Nom des admins',
  `Email-admin` varchar(255) NOT NULL COMMENT 'Email de log',
  `MDP-admin` varchar(60) NOT NULL COMMENT 'Mot de passe',
  PRIMARY KEY (`ID-admin`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='Table des admins qui gèrent le site';

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID-admin`, `Prenom-admin`, `Nom-admin`, `Email-admin`, `MDP-admin`) VALUES
(14, 'Quentin', 'Dubois', 'cantal@gmail.com', '$2y$10$/.QiZtYuoHp9lee0O/okmOMWsAIdAWHnBRG6o.WzHaasxwYaC32OS');

-- --------------------------------------------------------

--
-- Structure de la table `ajout`
--

DROP TABLE IF EXISTS `ajout`;
CREATE TABLE IF NOT EXISTS `ajout` (
  `ID-entreprise` int NOT NULL COMMENT 'clé étrangère de l''entreprise ajoutée',
  `ID-auteur` int NOT NULL COMMENT 'identifiant de l''auteur du changement'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ajout`
--

INSERT INTO `ajout` (`ID-entreprise`, `ID-auteur`) VALUES
(10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `ID-entreprise` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de l''entreprise',
  `Nom-entreprise` varchar(60) NOT NULL COMMENT 'Nom de l''entreprise',
  `Description-entreprise` varchar(2000) DEFAULT NULL COMMENT 'description de l''entreprise',
  `Email-entreprise` varchar(255) NOT NULL COMMENT 'email de l''entreprise',
  `Telephone-entreprise` varchar(15) DEFAULT NULL COMMENT 'numéro de téléphone de l''entreprise',
  `Note-entreprise` int DEFAULT NULL COMMENT 'moyenne des evaluations de l''entreprise',
  `CheminImage-entreprise` varchar(255) NOT NULL COMMENT 'chemin d''accées vers le logo de l''entreprise',
  PRIMARY KEY (`ID-entreprise`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID-entreprise`, `Nom-entreprise`, `Description-entreprise`, `Email-entreprise`, `Telephone-entreprise`, `Note-entreprise`, `CheminImage-entreprise`) VALUES
(3, 'Thales', 'Cybersecurite et IA', 'test@thales.com', '0223568978', 4, 'c:/wamp64/www/Thales.jpg'),
(8, 'Ankama', 'Société de développement de jeux vidéo', 'societe@ankama.com', '0123456789', 5, 'images/ankama.png'),
(9, 'Ankama', 'Société de développement de jeux vidéo', 'societe@ankama.com', '0123456789', 5, 'images/ankama.png'),
(10, 'Ankama', 'Société de développement de jeux vidéo', 'societe@ankama.com', '0123456789', 5, 'images/ankama.png');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `ID-etudiant` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant étudiant',
  `Prenom-etudiant` varchar(60) NOT NULL COMMENT 'Prenom de l''etudiant',
  `Nom-etudiant` varchar(60) NOT NULL COMMENT 'Nom de l''etudiant',
  `Email-etudiant` varchar(255) NOT NULL COMMENT 'Mail de log compte etudiant',
  `MDP-etudiant` varchar(60) NOT NULL COMMENT 'Mot de passe acces au compte etudiant',
  `Telephone-etudiant` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Num de téléphone étudiant',
  `DateNaissance-etudiant` date NOT NULL COMMENT 'date de naissance de l''etudiant',
  `Chemin-CV` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Chemin d''acces vers le cv',
  `ID-promotion-etudiant` int DEFAULT NULL COMMENT 'identifiant de la promotion (clé étrangère table Promotion)',
  `Stage-etudiant` tinyint(1) NOT NULL COMMENT 'a un stage ?',
  PRIMARY KEY (`ID-etudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID-etudiant`, `Prenom-etudiant`, `Nom-etudiant`, `Email-etudiant`, `MDP-etudiant`, `Telephone-etudiant`, `DateNaissance-etudiant`, `Chemin-CV`, `ID-promotion-etudiant`, `Stage-etudiant`) VALUES
(1, 'Totime', 'VC', 'TVC@example.com', '$2y$10$IUFBma2KFdtrOkJwwtlu6.HHM8nEcDmmmV5QqTBIVHZCUD5e.Hnoy', '0631569513', '2005-08-05', '1', 1, 0),
(2, 'Théotime', 'Van Camp', 'theotime.vancamp@icloud.com', 'oui', NULL, '2005-08-05', NULL, 2, 1),
(4, 'Clément', 'Magnier', 'password', '$2y$10$gp5r9ul0NoLmNOpdRJ3wIuIksEP8.VVciv4FDFo.F6dPA6h6q5zuG', NULL, '2004-05-24', NULL, 2, 1),
(3, 'Clément', 'Magnier', 'clement@magnier.fr', '$2y$10$7MddsMpw3mNglBblY8bFuOFCTfgLd.PHDmIxTvh0EljmCljkl1JVm', '0606060606', '2004-05-24', NULL, 3, 0),
(5, 'John', 'Pork', 'new@gmail.com', '$2y$10$REoNhVAhHdGIXoP1ViUeiu5tadTATD27cAURjdlXTzSzh2ME6o/x.', NULL, '2001-01-01', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `ID-etudiant` int NOT NULL COMMENT 'identifiant de l''etudiant ayant ajouté une offre a sa wishlist',
  `ID-offre` int NOT NULL COMMENT 'Identifiant de l''offre ajoutée'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offrestage`
--

DROP TABLE IF EXISTS `offrestage`;
CREATE TABLE IF NOT EXISTS `offrestage` (
  `ID-offre` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de l''offre',
  `Nom-offre` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'Nom de l''offre',
  `Description-offre` varchar(2000) NOT NULL COMMENT 'Description de l''offre',
  `Competences-offre` varchar(2000) NOT NULL COMMENT 'Compétences requises ou demandées pour l''offre',
  `Debut-offre` date NOT NULL COMMENT 'Date début de l''offre',
  `Fin-offre` date NOT NULL COMMENT 'Date fin de l''offre',
  `Secteur-offre` varchar(60) NOT NULL COMMENT 'secteur d''activité de l''offre',
  `Localisation-offre` varchar(255) NOT NULL COMMENT 'position géographique de l''offre (lien vers API)',
  `ID-entreprise` int NOT NULL COMMENT 'Identifiant de l''entreprise où se deroule l''offre',
  `Type-offre` varchar(60) NOT NULL COMMENT 'CDD, CDI, Stage ou alternance precise le type de contrat',
  PRIMARY KEY (`ID-offre`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offrestage`
--

INSERT INTO `offrestage` (`ID-offre`, `Nom-offre`, `Description-offre`, `Competences-offre`, `Debut-offre`, `Fin-offre`, `Secteur-offre`, `Localisation-offre`, `ID-entreprise`, `Type-offre`) VALUES
(1, 'Développeur Web', 'Développement de sites web et applications', 'HTML, CSS, JavaScript, PHP', '2025-04-01', '2025-06-30', 'Informatique', 'Paris', 101, ''),
(2, 'Analyste Marketing', 'Analyse des données de marché et stratégie', 'SEO, Google Analytics, Data Analysis', '2025-05-01', '2025-08-31', 'Marketing', 'Lille', 102, ''),
(3, 'Ingénieur Logiciel', 'Développement et maintenance de logiciels', 'Python, Java, C++', '2025-03-01', '2025-09-30', 'Technologie', 'Lyon', 103, ''),
(4, 'Consultant RH', 'Gestion et amélioration des processus RH', 'Communication, Management, Recrutement', '2025-04-15', '2025-07-15', 'Ressources Humaines', 'Marseille', 104, ''),
(5, 'Chef de Projet', 'Planification et supervision des projets', 'Gestion de projet, Leadership, Agile', '2025-01-01', '2025-12-31', 'Management', 'Bordeaux', 105, ''),
(6, 'Developpeur PHP', 'Developpeur PHP pour un stage de 6 mois', 'PHP, MySQL, HTML, CSS', '2025-01-01', '2025-06-30', 'Informatique', 'Lille', 3, 'CDI'),
(13, 'Chef Pentester', 'Test de sécurité', 'Python, C++', '2025-01-01', '2025-06-30', 'Informatique', 'Lyon', 1, ''),
(7, 'Développeur Web', 'Développement de sites web et applications', 'HTML, CSS, JavaScript, PHP', '0000-00-00', '0000-00-00', 'Informatique', 'Paris', 1, 'Stage'),
(8, 'Data Analyst', 'Analyse et visualisation de données', 'Python, SQL, Tableau', '2025-05-01', '2025-07-31', 'Data Science', 'Lille', 8, 'Stage'),
(9, 'Graphic Designer', 'Création de visuels pour supports web et print', 'Adobe Photoshop, Illustrator, Figma', '2025-04-15', '2025-06-30', 'Design', 'Lyon', 3, 'Stage'),
(10, 'Marketing Digital', 'Gestion de campagnes publicitaires en ligne', 'SEO, Google Ads, Analytics', '2025-06-01', '2025-08-31', 'Marketing', 'Marseille', 2, 'Stage'),
(11, 'Ingénieur IA', 'Développement d\'algorithmes et modèles IA', 'Python, TensorFlow, PyTorch', '2025-04-10', '2025-07-10', 'Informatique', 'Toulouse', 8, 'Stage'),
(12, 'Développeur Mobile', 'Développement d\'applications mobiles', 'Kotlin, Swift, React Native', '2025-05-01', '2025-07-31', 'Informatique', 'Nice', 8, 'Stage');

-- --------------------------------------------------------

--
-- Structure de la table `pilotepromo`
--

DROP TABLE IF EXISTS `pilotepromo`;
CREATE TABLE IF NOT EXISTS `pilotepromo` (
  `ID-pilote` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant des piotes',
  `Prenom-pilote` varchar(60) NOT NULL COMMENT 'Prenom des pilotes',
  `Nom-pilote` varchar(60) NOT NULL COMMENT 'Nom des pilotes',
  `Email-pilote` varchar(255) NOT NULL COMMENT 'Email de log pilote',
  `MDP-pilote` varchar(60) NOT NULL COMMENT 'Mot de passe compte pilote',
  PRIMARY KEY (`ID-pilote`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pilotepromo`
--

INSERT INTO `pilotepromo` (`ID-pilote`, `Prenom-pilote`, `Nom-pilote`, `Email-pilote`, `MDP-pilote`) VALUES
(1, 'Clement', 'Magnier', 'CM@example.com', '$2y$10$NvVXW7UgfMceNdlOcV4GUOuoSPONd8uGzMBzo89OcZ47OalDVGTqi'),
(2, 'Clément', 'Magnier', 'clement.magnier@viacesi.fr', '$2y$10$nmELEaiyMFzdaT07dVXrGuEQ.PhlJ9TTe.p8QTTLsLxmCiK8XFp4.');

-- --------------------------------------------------------

--
-- Structure de la table `postule`
--

DROP TABLE IF EXISTS `postule`;
CREATE TABLE IF NOT EXISTS `postule` (
  `ID-etudiant` int NOT NULL COMMENT 'Identifiant de l''etudiant qui postule',
  `ID-offre` int NOT NULL COMMENT 'Identifiant de l''offre postulée',
  `Date-postule` date NOT NULL COMMENT 'Date ou l''etudiant postule'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `ID-promo` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant des promos',
  `Nom-promo` varchar(60) NOT NULL COMMENT 'Nom des promos',
  `Debut-promo` date NOT NULL COMMENT 'année de début de la promo',
  `Fin-promo` date NOT NULL COMMENT 'année de fin de la promo',
  PRIMARY KEY (`ID-promo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`ID-promo`, `Nom-promo`, `Debut-promo`, `Fin-promo`) VALUES
(1, 'Informatique', '2023-10-01', '2023-12-31'),
(2, 'BTP', '2025-05-05', '2025-06-05'),
(3, 'Généraliste', '2025-05-25', '2025-05-15');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `ID-offre` int NOT NULL COMMENT 'Identifiant de l''offre publiée',
  `ID-auteur` int NOT NULL COMMENT 'Identifiant de l''auteur de la publication'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`ID-offre`, `ID-auteur`) VALUES
(7, 1),
(8, 1),
(12, 1),
(13, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
