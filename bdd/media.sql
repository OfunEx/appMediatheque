-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 20 Mai 2014 à 20:58
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `media`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_support` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_emprunt` date DEFAULT NULL,
  `date_limite` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  PRIMARY KEY (`id_support`,`id_user`),
  KEY `FK_emprunt_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `emprunt`
--


-- --------------------------------------------------------

--
-- Structure de la table `key`
--

CREATE TABLE IF NOT EXISTS `key` (
  `id_key` int(11) NOT NULL AUTO_INCREMENT,
  `terme` varchar(50) DEFAULT NULL,
  `commentaire` text,
  PRIMARY KEY (`id_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `key`
--

INSERT INTO `key` (`id_key`, `terme`, `commentaire`) VALUES
(1, 'patate', 'c''est une patate'),
(2, 'oiseau', 'c''est un oiseau'),
(3, 'petite', 'elle est petite'),
(4, 'ornithologue', 'c''est un ornithologue'),
(5, 'ananas', 'c''est un ananas');

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id_support` int(11) NOT NULL,
  `id_key` int(11) NOT NULL,
  PRIMARY KEY (`id_support`,`id_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `link`
--


-- --------------------------------------------------------

--
-- Structure de la table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id_support` int(11) NOT NULL AUTO_INCREMENT,
  `titre_support` varchar(100) DEFAULT NULL,
  `type_support` varchar(50) DEFAULT NULL,
  `type_format` varchar(50) DEFAULT NULL,
  `type_contenu` varchar(50) DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `createur_support` varchar(100) DEFAULT NULL,
  `type_createur` varchar(15) DEFAULT NULL,
  `description_support` text,
  `nbExemplaire` int(3) DEFAULT NULL,
  `nbExemplaireDispo` int(5) DEFAULT NULL,
  `nb_consultation` int(10) DEFAULT NULL,
  `tps_emprunt_max` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_support`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `support`
--

INSERT INTO `support` (`id_support`, `titre_support`, `type_support`, `type_format`, `type_contenu`, `date_publication`, `createur_support`, `type_createur`, `description_support`, `nbExemplaire`, `nbExemplaireDispo`, `nb_consultation`, `tps_emprunt_max`) VALUES
(1, 'test', 'test', 'test', 'test', '2014-05-13', 'test', 'test', 'test', 2, 2, NULL, NULL),
(2, 'test', 'test', 'test', 'test', '2014-05-06', 'test', 'test', 'test', NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `prenom_user` varchar(50) DEFAULT NULL,
  `nom_user` varchar(50) DEFAULT NULL,
  `date_user` date DEFAULT NULL,
  `mail_user` varchar(50) DEFAULT NULL,
  `idconnex_user` varchar(50) DEFAULT NULL,
  `pass_user` varchar(255) DEFAULT NULL,
  `level_user` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `prenom_user`, `nom_user`, `date_user`, `mail_user`, `idconnex_user`, `pass_user`, `level_user`) VALUES
(1, 'Guillaume', 'Besse', '1993-11-15', 'ofun.exemplar@gmail.com', 'Ofun', '86d573c65143debec72768b86d6d54fa6e0b3e8a', '2');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_emprunt_id_support` FOREIGN KEY (`id_support`) REFERENCES `support` (`id_support`),
  ADD CONSTRAINT `FK_emprunt_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `FK_link_id_key` FOREIGN KEY (`id_key`) REFERENCES `key` (`id_key`),
  ADD CONSTRAINT `FK_link_id_support` FOREIGN KEY (`id_support`) REFERENCES `support` (`id_support`);
