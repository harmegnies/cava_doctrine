-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 15 Novembre 2013 à 09:57
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `cavadbmain`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `idAdresse` int(11) NOT NULL AUTO_INCREMENT,
  `rue` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nr` varchar(10) CHARACTER SET latin1 NOT NULL,
  `codePostal` varchar(10) CHARACTER SET latin1 NOT NULL,
  `localite` varchar(100) CHARACTER SET latin1 NOT NULL,
  `idPays` int(11) NOT NULL,
  PRIMARY KEY (`idAdresse`),
  UNIQUE KEY `ID_Adresse_IND` (`idAdresse`),
  KEY `FKfait_partie_IND` (`idPays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `adresse`
--


-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(100) CHARACTER SET latin1 NOT NULL,
  `prenomClient` varchar(100) CHARACTER SET latin1 NOT NULL,
  `emailClient` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sexeClient` char(7) CHARACTER SET latin1 NOT NULL,
  `dateNaissanceClient` date NOT NULL,
  `societeClient` varchar(1) CHARACTER SET latin1 NOT NULL,
  `nTVA` varchar(1) CHARACTER SET latin1 NOT NULL,
  `dateInscription` date NOT NULL,
  `idAdresse` int(11) NOT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `ID_Client_IND` (`idClient`),
  KEY `FKhabite_IND` (`idAdresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `client`
--


-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(10) CHARACTER SET latin1 NOT NULL,
  `dateCommande` date NOT NULL,
  `modePaiement` varchar(100) CHARACTER SET latin1 NOT NULL,
  `idAdresse` int(11) DEFAULT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  UNIQUE KEY `ID_Commande_IND` (`idCommande`),
  KEY `FKest_livree_IND` (`idAdresse`),
  KEY `FKpasse_IND` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `commande`
--


-- --------------------------------------------------------

--
-- Structure de la table `detailcommande`
--

CREATE TABLE IF NOT EXISTS `detailcommande` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixHTVA` float NOT NULL,
  `tauxTVA` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`,`idCommande`),
  UNIQUE KEY `ID_contient_IND` (`idProduit`,`idCommande`),
  KEY `FKcon_Com_IND` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `detailcommande`
--


-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `nomPays` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idPays`),
  UNIQUE KEY `ID_Pays_IND` (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=239 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`idPays`, `nomPays`) VALUES
(1, 'Afghanistan	\r\n'),
(2, 'Afrique du Sud	\r\n'),
(3, 'Albanie	\r\n'),
(4, 'Algérie	\r\n'),
(5, 'Allemagne	\r\n'),
(6, 'Andorre	\r\n'),
(7, 'Angola	\r\n'),
(8, 'Anguilla	\r\n'),
(9, 'Antarctique	\r\n'),
(10, 'Antigua-et-Barbuda	\r\n'),
(11, 'Antilles néerlandaises	\r\n'),
(12, 'Arabie saoudite	\r\n'),
(13, 'Argentine	\r\n'),
(14, 'Arménie	\r\n'),
(15, 'Aruba	\r\n'),
(16, 'Australie	\r\n'),
(17, 'Autriche	\r\n'),
(18, 'Azerbaïdjan	\r\n'),
(19, 'Bénin	\r\n'),
(20, 'Bahamas	\r\n'),
(21, 'Bahreïn	\r\n'),
(22, 'Bangladesh	\r\n'),
(23, 'Barbade	\r\n'),
(24, 'Belau	\r\n'),
(25, 'Belgique	\r\n'),
(26, 'Belize	\r\n'),
(27, 'Bermudes	\r\n'),
(28, 'Bhoutan	\r\n'),
(29, 'Biélorussie\r\n'),
(30, 'Birmanie\r\n'),
(31, 'Bolivie	\r\n'),
(32, 'Bosnie-Herzégovine\r\n'),
(33, 'Botswana	\r\n'),
(34, 'Brésil	\r\n'),
(35, 'Brunei	\r\n'),
(36, 'Bulgarie	\r\n'),
(37, 'Burkina Faso	\r\n'),
(38, 'Burundi	\r\n'),
(39, 'Côte d''Ivoire	\r\n'),
(40, 'Cambodge	\r\n'),
(41, 'Cameroun	\r\n'),
(42, 'Canada	\r\n'),
(43, 'Cap-Vert	\r\n'),
(44, 'Chili	\r\n'),
(45, 'Chine	\r\n'),
(46, 'Chypre	\r\n'),
(47, 'Colombie	\r\n'),
(48, 'Comores	\r\n'),
(49, 'Congo	\r\n'),
(50, 'Corée du Nord	\r\n'),
(51, 'Corée du Sud	\r\n'),
(52, 'Costa Rica	\r\n'),
(53, 'Croatie	\r\n'),
(54, 'Cuba	\r\n'),
(55, 'Danemark	\r\n'),
(56, 'Djibouti	\r\n'),
(57, 'Dominique	\r\n'),
(58, 'Égypte	\r\n'),
(59, 'Émirats arabes unis	\r\n'),
(60, 'Équateur	\r\n'),
(61, 'Érythrée	\r\n'),
(62, 'Espagne	\r\n'),
(63, 'Estonie	\r\n'),
(64, 'États-Unis	\r\n'),
(65, 'Éthiopie	\r\n'),
(66, 'Finlande	\r\n'),
(67, 'France	\r\n'),
(68, 'Géorgie	\r\n'),
(69, 'Gabon	\r\n'),
(70, 'Gambie	\r\n'),
(71, 'Ghana	\r\n'),
(72, 'Gibraltar	\r\n'),
(73, 'Grèce	\r\n'),
(74, 'Grenade	\r\n'),
(75, 'Groenland	\r\n'),
(76, 'Guadeloupe	\r\n'),
(77, 'Guam	\r\n'),
(78, 'Guatemala	\r\n'),
(79, 'Guinée	\r\n'),
(80, 'Guinée équatoriale	\r\n'),
(81, 'Guinée-Bissao	\r\n'),
(82, 'Guyana	\r\n'),
(83, 'Guyane française	\r\n'),
(84, 'Haïti	\r\n'),
(85, 'Honduras	\r\n'),
(86, 'Hong Kong	\r\n'),
(87, 'Hongrie	\r\n'),
(88, 'Ile Bouvet	\r\n'),
(89, 'Ile Christmas	\r\n'),
(90, 'Ile Norfolk	\r\n'),
(91, 'Iles Cayman	\r\n'),
(92, 'Iles Cook	\r\n'),
(93, 'Iles Féroé	\r\n'),
(94, 'Iles Falkland	\r\n'),
(95, 'Iles Fidji	\r\n'),
(96, 'Iles Géorgie du Sud et Sandwich du Sud	\r\n'),
(97, 'Iles Heard et McDonald	\r\n'),
(98, 'Iles Marshall	\r\n'),
(99, 'Iles Pitcairn	\r\n'),
(100, 'Iles Salomon	\r\n'),
(101, 'Iles Svalbard et Jan Mayen	\r\n'),
(102, 'Iles Turks-et-Caicos	\r\n'),
(103, 'Iles Vierges américaines	\r\n'),
(104, 'Iles Vierges britanniques	\r\n'),
(105, 'Iles des Cocos (Keeling)	\r\n'),
(106, 'Iles mineures éloignées des États-Unis	\r\n'),
(107, 'Inde	\r\n'),
(108, 'Indonésie	\r\n'),
(109, 'Iran	\r\n'),
(110, 'Iraq	\r\n'),
(111, 'Irlande	\r\n'),
(112, 'Islande	\r\n'),
(113, 'Israël	\r\n'),
(114, 'Italie	\r\n'),
(115, 'Jamaïque	\r\n'),
(116, 'Japon	\r\n'),
(117, 'Jordanie	\r\n'),
(118, 'Kazakhstan	\r\n'),
(119, 'Kenya	\r\n'),
(120, 'Kirghizistan	\r\n'),
(121, 'Kiribati	\r\n'),
(122, 'Koweït	\r\n'),
(123, 'Laos	\r\n'),
(124, 'Lesotho	\r\n'),
(125, 'Lettonie	\r\n'),
(126, 'Liban	\r\n'),
(127, 'Liberia	\r\n'),
(128, 'Libye	\r\n'),
(129, 'Liechtenstein	\r\n'),
(130, 'Lituanie	\r\n'),
(131, 'Luxembourg	\r\n'),
(132, 'Macao	\r\n'),
(133, 'Madagascar	\r\n'),
(134, 'Malaisie	\r\n'),
(135, 'Malawi	\r\n'),
(136, 'Maldives	\r\n'),
(137, 'Mali	\r\n'),
(138, 'Malte	\r\n'),
(139, 'Mariannes du Nord	\r\n'),
(140, 'Maroc	\r\n'),
(141, 'Martinique	\r\n'),
(142, 'Maurice	\r\n'),
(143, 'Mauritanie	\r\n'),
(144, 'Mayotte	\r\n'),
(145, 'Mexique	\r\n'),
(146, 'Micronésie	\r\n'),
(147, 'Moldavie	\r\n'),
(148, 'Monaco	\r\n'),
(149, 'Mongolie	\r\n'),
(150, 'Montserrat	\r\n'),
(151, 'Mozambique	\r\n'),
(152, 'Népal	\r\n'),
(153, 'Namibie	\r\n'),
(154, 'Nauru	\r\n'),
(155, 'Nicaragua	\r\n'),
(156, 'Niger	\r\n'),
(157, 'Nigeria	\r\n'),
(158, 'Nioué	\r\n'),
(159, 'Norvège	\r\n'),
(160, 'Nouvelle-Calédonie	\r\n'),
(161, 'Nouvelle-Zélande	\r\n'),
(162, 'Oman	\r\n'),
(163, 'Ouganda	\r\n'),
(164, 'Ouzbékistan	\r\n'),
(165, 'Pérou	\r\n'),
(166, 'Pakistan	\r\n'),
(167, 'Panama	\r\n'),
(168, 'Papouasie-Nouvelle-Guinée	\r\n'),
(169, 'Paraguay	\r\n'),
(170, 'Pays-Bas	\r\n'),
(171, 'Philippines	\r\n'),
(172, 'Pologne	\r\n'),
(173, 'Polynésie française	\r\n'),
(174, 'Porto Rico	\r\n'),
(175, 'Portugal	\r\n'),
(176, 'Qatar	\r\n'),
(177, 'République centrafricaine	\r\n'),
(178, 'République démocratique du Congo	\r\n'),
(179, 'République dominicaine	\r\n'),
(180, 'République tchèque	\r\n'),
(181, 'Réunion	\r\n'),
(182, 'Roumanie	\r\n'),
(183, 'Royaume-Uni	\r\n'),
(184, 'Russie	\r\n'),
(185, 'Rwanda	\r\n'),
(186, 'Sénégal	\r\n'),
(187, 'Sahara occidental	\r\n'),
(188, 'Saint-Christophe-et-Niévès	\r\n'),
(189, 'Saint-Marin	\r\n'),
(190, 'Saint-Pierre-et-Miquelon	\r\n'),
(191, 'Saint-Siège 	\r\n'),
(192, 'Saint-Vincent-et-les-Grenadines	\r\n'),
(193, 'Sainte-Hélène	\r\n'),
(194, 'Sainte-Lucie	\r\n'),
(195, 'Salvador	\r\n'),
(196, 'Samoa	\r\n'),
(197, 'Samoa américaines	\r\n'),
(198, 'Sao Tomé-et-Principe	\r\n'),
(199, 'Seychelles	\r\n'),
(200, 'Sierra Leone	\r\n'),
(201, 'Singapour	\r\n'),
(202, 'Slovénie	\r\n'),
(203, 'Slovaquie	\r\n'),
(204, 'Somalie	\r\n'),
(205, 'Soudan	\r\n'),
(206, 'Sri Lanka	\r\n'),
(207, 'Suède	\r\n'),
(208, 'Suisse	\r\n'),
(209, 'Suriname	\r\n'),
(210, 'Swaziland	\r\n'),
(211, 'Syrie	\r\n'),
(212, 'Taïwan	\r\n'),
(213, 'Tadjikistan	\r\n'),
(214, 'Tanzanie	\r\n'),
(215, 'Tchad	\r\n'),
(216, 'Terres australes françaises	\r\n'),
(217, 'Territoire britannique de l''Océan Indien	\r\n'),
(218, 'Thaïlande	\r\n'),
(219, 'Timor Oriental	\r\n'),
(220, 'Togo	\r\n'),
(221, 'Tokélaou	\r\n'),
(222, 'Tonga	\r\n'),
(223, 'Trinité-et-Tobago	\r\n'),
(224, 'Tunisie	\r\n'),
(225, 'Turkménistan	\r\n'),
(226, 'Turquie	\r\n'),
(227, 'Tuvalu	\r\n'),
(228, 'Ukraine	\r\n'),
(229, 'Uruguay	\r\n'),
(230, 'Vanuatu	\r\n'),
(231, 'Venezuela	\r\n'),
(232, 'Viêt Nam	\r\n'),
(233, 'Wallis-et-Futuna	\r\n'),
(234, 'Yémen	\r\n'),
(235, 'Yougoslavie	\r\n'),
(236, 'Zambie	\r\n'),
(237, 'Zimbabwe	\r\n'),
(238, 'ex-République yougoslave de Macédoine	');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(100) CHARACTER SET latin1 NOT NULL,
  `refProduit` varchar(20) CHARACTER SET latin1 NOT NULL,
  `prixHTVA` float NOT NULL,
  `tauxTVA` float NOT NULL,
  `millesime` varchar(10) CHARACTER SET latin1 NOT NULL,
  `contenant` varchar(100) CHARACTER SET latin1 NOT NULL,
  `idTypeProduit` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`),
  UNIQUE KEY `ID_Produit_IND` (`idProduit`),
  KEY `FKappartient_IND` (`idTypeProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `produit`
--


-- --------------------------------------------------------

--
-- Structure de la table `typeproduit`
--

CREATE TABLE IF NOT EXISTS `typeproduit` (
  `idTypeProduit` int(11) NOT NULL AUTO_INCREMENT,
  `typeProduit` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idTypeProduit`),
  UNIQUE KEY `ID_TypeProduit_IND` (`idTypeProduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typeproduit`
--

INSERT INTO `typeproduit` (`idTypeProduit`, `typeProduit`) VALUES
(1, 'vin blanc'),
(2, 'vin rosé');
