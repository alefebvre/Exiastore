-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 21 Juin 2013 à 06:49
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `exiastore`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `ID_Article` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Article` text NOT NULL,
  `Stock_Article` text NOT NULL,
  `Prix_Article` int(11) NOT NULL,
  `ID_Categorie` int(11) NOT NULL,
  `ID_Etat` int(11) NOT NULL,
  PRIMARY KEY (`ID_Article`),
  KEY `ID_Categorie` (`ID_Categorie`),
  KEY `ID_Etat` (`ID_Etat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`ID_Article`, `Nom_Article`, `Stock_Article`, `Prix_Article`, `ID_Categorie`, `ID_Etat`) VALUES
(1, 'American Pie', '10', 20, 1, 1),
(3, 'Tarzan', '20', 10, 1, 1),
(4, 'Avatar', '20', 20, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_Categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Categorie` text NOT NULL,
  PRIMARY KEY (`ID_Categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID_Categorie`, `Nom_Categorie`) VALUES
(1, 'DVD'),
(2, 'CD');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `ID_Commande` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Article` int(11) NOT NULL,
  `Nom_Article` text NOT NULL,
  `Date_Recep_Commande` date NOT NULL,
  `ID_Statut` int(11) NOT NULL,
  PRIMARY KEY (`ID_Commande`),
  KEY `ID_Article` (`ID_Article`),
  KEY `ID_Statut` (`ID_Statut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE IF NOT EXISTS `contenir` (
  `ID_Article` int(11) NOT NULL,
  `ID_Commande` int(11) NOT NULL,
  `Quantité` int(11) NOT NULL,
  `Prix_HT` int(11) NOT NULL,
  `TVA` int(11) NOT NULL,
  `Prix_TTC` int(11) NOT NULL,
  PRIMARY KEY (`ID_Article`,`ID_Commande`),
  KEY `ID_Commande` (`ID_Commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `description_article`
--

CREATE TABLE IF NOT EXISTS `description_article` (
  `ID_Description` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Edition` date NOT NULL,
  `Auteur` text NOT NULL,
  `Information` text NOT NULL,
  `ID_Article` int(11) NOT NULL,
  PRIMARY KEY (`ID_Description`),
  KEY `ID_Article` (`ID_Article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `description_article`
--

INSERT INTO `description_article` (`ID_Description`, `Date_Edition`, `Auteur`, `Information`, `ID_Article`) VALUES
(1, '1999-06-05', 'Paul et Chris Weitz', 'Humilié d''avoir été surpris par ses parents devant un film pornographique, Jim, qui en est à sa dernière année d''étude, fait un pacte avec sa bande de copains : perdre leur virginité avant la fin de l''année scolaire. Il leur reste trois semaines avant le bal de promo pour utiliser toutes les techniques possibles de séduction. Tous les moyens sont bons, même les plus inattendus, car chaque jour compte. Une chose est certaine, Jim ne regardera plus jamais une tarte aux pommes de la même façon !', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `ID_Etat` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Etat` text NOT NULL,
  PRIMARY KEY (`ID_Etat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`ID_Etat`, `Type_Etat`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, 'Nouveaute'),
(5, 'Disponible'),
(6, 'Hors_stock');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `ID_Facture` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_Carte` int(11) NOT NULL,
  `Date_Expiration` date NOT NULL,
  `Cle_Cryptage` int(11) NOT NULL,
  `ID_Commande` int(11) NOT NULL,
  `ID_Type_Paiement` int(11) NOT NULL,
  PRIMARY KEY (`ID_Facture`),
  KEY `ID_Type_Paiement` (`ID_Type_Paiement`),
  KEY `ID_Type_Paiement_2` (`ID_Type_Paiement`),
  KEY `ID_Commande` (`ID_Commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `ID_Statut` int(11) NOT NULL AUTO_INCREMENT,
  `En_preparation` tinyint(1) NOT NULL,
  `Prete` tinyint(1) NOT NULL,
  `Envoye` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_Statut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_paiement`
--

CREATE TABLE IF NOT EXISTS `type_paiement` (
  `ID_Type_Paiement` int(11) NOT NULL AUTO_INCREMENT,
  `MasterCard` text NOT NULL,
  `Visa` text NOT NULL,
  PRIMARY KEY (`ID_Type_Paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_Utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Utilisateur` text NOT NULL,
  `Prenom_Utilisateur` text NOT NULL,
  `Adresse_Utilisateur` text NOT NULL,
  `Ville_Utilisateur` text NOT NULL,
  `Cp_Utilisateur` text NOT NULL,
  `Pays_Utilisateur` text NOT NULL,
  `Tel_Utilisateur` text NOT NULL,
  `Login_Utilisateur` text NOT NULL,
  `Mdp_Utilisateur` text NOT NULL,
  `Type_Utilisateur` tinyint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_Utilisateur`),
  KEY `ID_Type` (`Type_Utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_Utilisateur`, `Nom_Utilisateur`, `Prenom_Utilisateur`, `Adresse_Utilisateur`, `Ville_Utilisateur`, `Cp_Utilisateur`, `Pays_Utilisateur`, `Tel_Utilisateur`, `Login_Utilisateur`, `Mdp_Utilisateur`, `Type_Utilisateur`) VALUES
(1, 'test', 'test', 'test', 'test', '62138', 'test', '0321022188', 'test', 'test', 0),
(2, '', '', '', '', '', '', '', 'loli', 'loli', 0),
(3, '', '', '', '', '', '', '', 'flo', 'flo', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`ID_Categorie`) REFERENCES `categorie` (`ID_Categorie`) ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`ID_Etat`) REFERENCES `etat` (`ID_Etat`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`ID_Article`) REFERENCES `article` (`ID_Article`) ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`ID_Statut`) REFERENCES `statut` (`ID_Statut`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`ID_Article`) REFERENCES `article` (`ID_Article`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`ID_Commande`) REFERENCES `commande` (`ID_Commande`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `description_article`
--
ALTER TABLE `description_article`
  ADD CONSTRAINT `description_article_ibfk_1` FOREIGN KEY (`ID_Article`) REFERENCES `article` (`ID_Article`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`ID_Commande`) REFERENCES `commande` (`ID_Commande`) ON UPDATE CASCADE,
  ADD CONSTRAINT `facture_ibfk_2` FOREIGN KEY (`ID_Type_Paiement`) REFERENCES `type_paiement` (`ID_Type_Paiement`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
