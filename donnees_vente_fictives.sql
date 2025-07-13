-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 10 Juillet 2025 à 11:24
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `donnees_vente_fictives`
--
CREATE DATABASE IF NOT EXISTS `donnees_vente_fictives` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `donnees_vente_fictives`;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) DEFAULT NULL,
  `email_client` varchar(50) DEFAULT NULL,
  `adresse_client` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=204 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom_client`, `email_client`, `adresse_client`) VALUES
(201, 'Rakoto', 'rakoto@gmail.com', 'Lot AF 5 Anosipatrana'),
(202, 'Rabe', 'rabe123@gmail.com', 'Villa milay Ambohijanahary'),
(203, 'Rasoa', 'rsoa@gmail.com', 'Lot V-32 Analakely');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `date_commande` date DEFAULT NULL,
  `est_livre` tinyint(1) DEFAULT NULL,
  `id_livreur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_commandes_clients` (`id_client`),
  KEY `fk_commandes_livreurs` (`id_livreur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1036 ;

--
-- Contenu de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_client`, `date_commande`, `est_livre`, `id_livreur`) VALUES
(1034, 202, '2025-07-10', 0, 52),
(1035, 202, '2025-07-10', 0, 52);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fournisseur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fournisseur`, `nom_fournisseur`) VALUES
(54, 'BureauNet'),
(55, 'SanitaireFourniture'),
(56, 'Tana Market'),
(57, 'Technologia');

-- --------------------------------------------------------

--
-- Structure de la table `lignes_commande`
--

CREATE TABLE IF NOT EXISTS `lignes_commande` (
  `id_ligne` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) DEFAULT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ligne`),
  KEY `fk_produits_lignes` (`id_produit`),
  KEY `fk_lignes_commandes` (`id_commande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `lignes_commande`
--

INSERT INTO `lignes_commande` (`id_ligne`, `id_produit`, `id_commande`, `quantite`) VALUES
(1, 567, 1034, 10),
(2, 568, 1034, 5),
(3, 569, 1035, 20),
(4, 564, 1035, 15);

-- --------------------------------------------------------

--
-- Structure de la table `livreurs`
--

CREATE TABLE IF NOT EXISTS `livreurs` (
  `id_livreur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_livreur` varchar(50) DEFAULT NULL,
  `contact_livreur` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_livreur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `livreurs`
--

INSERT INTO `livreurs` (`id_livreur`, `nom_livreur`, `contact_livreur`) VALUES
(51, 'Rasolo be', '0345711132'),
(52, 'Ketaka kely', '0321765866');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(50) DEFAULT NULL,
  `prix_produit` int(11) DEFAULT NULL,
  `stock_produit` int(11) DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_produits_fournisseurs` (`id_fournisseur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=571 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `prix_produit`, `stock_produit`, `id_fournisseur`) VALUES
(564, 'Chargeur', 5000, 85, 56),
(566, 'Smartphone 114', 2000000, 10, 56),
(567, 'Smartphone 322', 2500000, 5, 56),
(568, 'Chargeur rapide', 10000, 25, 54),
(569, 'Efferalgan', 2000, 180, 55),
(570, 'Cahier', 2000, 250, 57);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_commandes_clients` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`),
  ADD CONSTRAINT `fk_commandes_livreurs` FOREIGN KEY (`id_livreur`) REFERENCES `livreurs` (`id_livreur`);

--
-- Contraintes pour la table `lignes_commande`
--
ALTER TABLE `lignes_commande`
  ADD CONSTRAINT `fk_lignes_commandes` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`),
  ADD CONSTRAINT `fk_produits_lignes` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_produits_fournisseurs` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseurs` (`id_fournisseur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
