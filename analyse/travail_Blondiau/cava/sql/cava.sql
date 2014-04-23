-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 26 Octobre 2013 à 10:13
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Base de données: `cava`
--

-- --------------------------------------------------------

--
-- Structure de la table `cepage`
--
CREATE TABLE IF NOT EXISTS `cepage` (
  `idcepage` int(11) NOT NULL AUTO_INCREMENT,
  `label_cepage` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcepage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
--
-- Contenu de la table `cepage`
--
INSERT INTO `cepage` (`idcepage`, `label_cepage`) VALUES
(1, 'Bordeaux'),
(2, 'Médoc'),
(3, 'Cabernet'),
(4, 'Sauvignon');
-- --------------------------------------------------------
--
-- Structure de la table `domaine`
--
CREATE TABLE IF NOT EXISTS `domaine` (
  `iddomaine` int(11) NOT NULL AUTO_INCREMENT,
  `label_domaine` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddomaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
--
-- Contenu de la table `domaine`
--
INSERT INTO `domaine` (`iddomaine`, `label_domaine`) VALUES
(1, 'Domaine 1'),
(2, 'Domaine 2'),
(3, 'Domaines 3'),
(4, 'Domaines 4');
-- --------------------------------------------------------
--
-- Structure de la table `type`
--
CREATE TABLE IF NOT EXISTS `type` (
  `idtype` int(11) NOT NULL,
  `label_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Contenu de la table `type`
--
INSERT INTO `type` (`idtype`, `label_type`) VALUES
(1, 'Rouges'),
(2, 'Blancs'),
(3, 'Rosés');
-- --------------------------------------------------------
--
-- Structure de la table `vins`
--
CREATE TABLE IF NOT EXISTS `vins` (
  `idvins` int(11) NOT NULL AUTO_INCREMENT,
  `nom_vins` varchar(45) DEFAULT NULL,
  `content_vins` text,
  `prix_vins` varchar(45) DEFAULT NULL,
  `url_vins` varchar(64) NOT NULL,
  PRIMARY KEY (`idvins`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;
--
-- Contenu de la table `vins`
--
INSERT INTO `vins` (`idvins`, `nom_vins`, `content_vins`, `prix_vins`, `url_vins`) VALUES
(1, 'Vins 1', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg'),
(2, 'Vins 2', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg'),
(3, 'Vins 3', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg'),
(4, 'Vins 4', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg'),
(5, 'Vins 5', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg'),
(6, 'Vins 6', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg'),
(7, 'Vins 7', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg'),
(8, 'Vins 8', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg'),
(9, 'Vins 9', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg'),
(10, 'Vins 10', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', '10 €', 'images/deco/test3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `vins_cepage`
--

CREATE TABLE IF NOT EXISTS `vins_cepage` (
  `idvins_cepage` int(11) NOT NULL AUTO_INCREMENT,
  `vins_idvins` int(11) DEFAULT NULL,
  `cepage_idcepage` int(11) NOT NULL,
  PRIMARY KEY (`idvins_cepage`),
  KEY `fk_vins_cepage_vins1` (`vins_idvins`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `vins_cepage`
--

INSERT INTO `vins_cepage` (`idvins_cepage`, `vins_idvins`, `cepage_idcepage`) VALUES
(1, 1, 1),
(2, 2, 2),
(7, 3, 3),
(8, 4, 1),
(9, 5, 2),
(10, 6, 3),
(11, 7, 1),
(12, 8, 2),
(13, 9, 3),
(14, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vins_domaine`
--

CREATE TABLE IF NOT EXISTS `vins_domaine` (
  `idvins_domaine` int(11) NOT NULL AUTO_INCREMENT,
  `vins_idvins` int(11) DEFAULT NULL,
  `domaine_iddomaine` int(11) NOT NULL,
  PRIMARY KEY (`idvins_domaine`),
  KEY `fk_vins_domaine_vins1` (`vins_idvins`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `vins_domaine`
--

INSERT INTO `vins_domaine` (`idvins_domaine`, `vins_idvins`, `domaine_iddomaine`) VALUES
(9, 1, 1),
(10, 2, 2),
(11, 3, 3),
(12, 4, 4),
(13, 5, 1),
(14, 6, 2),
(15, 7, 3),
(16, 8, 4),
(17, 9, 1),
(18, 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `vins_type`
--

CREATE TABLE IF NOT EXISTS `vins_type` (
  `idvins_type` int(11) NOT NULL AUTO_INCREMENT,
  `vins_idvins` int(11) DEFAULT NULL,
  `type_idtype` int(11) NOT NULL,
  PRIMARY KEY (`idvins_type`),
  KEY `fk_vins_type_vins` (`vins_idvins`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `vins_type`
--

INSERT INTO `vins_type` (`idvins_type`, `vins_idvins`, `type_idtype`) VALUES
(7, 1, 1),
(8, 2, 2),
(9, 3, 3),
(10, 4, 1),
(11, 5, 2),
(12, 6, 3),
(13, 7, 1),
(14, 8, 2),
(15, 9, 3),
(16, 10, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `vins_cepage`
--
ALTER TABLE `vins_cepage`
  ADD CONSTRAINT `fk_vins_cepage_vins1` FOREIGN KEY (`vins_idvins`) REFERENCES `vins` (`idvins`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vins_domaine`
--
ALTER TABLE `vins_domaine`
  ADD CONSTRAINT `fk_vins_domaine_vins1` FOREIGN KEY (`vins_idvins`) REFERENCES `vins` (`idvins`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vins_type`
--
ALTER TABLE `vins_type`
  ADD CONSTRAINT `fk_vins_type_vins` FOREIGN KEY (`vins_idvins`) REFERENCES `vins` (`idvins`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
