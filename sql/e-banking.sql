-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Juillet 2015 à 12:04
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `e-banking`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(100) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `pass`) VALUES
(1, 'admin', '1SA2eO3UokHARYWkhhKm5Q==');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(100) NOT NULL AUTO_INCREMENT,
  `ncin` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `active` text NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `ncin`, `nom`, `prenom`, `active`, `login`, `pass`) VALUES
(1, '07556699', 'adib', 'aouadi', '1', 'adib', '1SA2eO3UokHARYWkhhKm5Q=='),
(8, '07885544', 'marwa', 'abidi', '1', 'marwa', '1SA2eO3UokHARYWkhhKm5Q==');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` int(100) NOT NULL AUTO_INCREMENT,
  `RIB` text NOT NULL,
  `num_c` text NOT NULL,
  `type` text NOT NULL,
  `date` date NOT NULL,
  `solde` text NOT NULL,
  `block` text NOT NULL,
  `id_client` int(100) NOT NULL,
  PRIMARY KEY (`id_compte`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `RIB`, `num_c`, `type`, `date`, `solde`, `block`, `id_client`) VALUES
(1, '02669501459833265142', '02669501416833265142', 'compte courant', '2015-05-16', '130', '0', 1),
(2, '01234565897563146920', '01234565897563146920', 'compte courant', '2015-06-07', '100', '1', 8);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `id_demande` int(100) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type` text NOT NULL,
  `nombre` text NOT NULL,
  `etat` text NOT NULL,
  `id_client` int(100) NOT NULL,
  PRIMARY KEY (`id_demande`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`id_demande`, `date`, `type`, `nombre`, `etat`, `id_client`) VALUES
(3, '2015-06-01', 'carte crédit', '1', 'Accepter', 1),
(8, '2015-06-01', 'chéquier barré', '100', 'Accepter', 1);

-- --------------------------------------------------------

--
-- Structure de la table `extrait`
--

CREATE TABLE IF NOT EXISTS `extrait` (
  `id_extrait` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `solde` text NOT NULL,
  PRIMARY KEY (`id_extrait`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `extrait`
--

INSERT INTO `extrait` (`id_extrait`, `date`, `solde`) VALUES
(1, '2015-06-01', '100'),
(2, '2015-06-02', '150'),
(3, '2015-06-05', '100'),
(4, '2015-06-02', '150');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `id_historique` int(100) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `solde` text NOT NULL,
  `id_client` int(100) NOT NULL,
  PRIMARY KEY (`id_historique`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id_historique`, `date`, `solde`, `id_client`) VALUES
(1, '2015-05-25', '300', 1),
(2, '2015-05-25', '280', 1),
(3, '2015-05-25', '230', 1),
(4, '2015-06-01', '200', 1),
(5, '2015-06-08', '150', 1),
(6, '2015-06-08', '130', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE IF NOT EXISTS `reclamation` (
  `id_reclamation` int(100) NOT NULL AUTO_INCREMENT,
  `sujet` text NOT NULL,
  `texte` text NOT NULL,
  `etat` text NOT NULL,
  `repense` text,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_reclamation`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `reclamation`
--

INSERT INTO `reclamation` (`id_reclamation`, `sujet`, `texte`, `etat`, `repense`, `id_client`) VALUES
(3, 'probléme', 'probléme                                            \r\n                                            ', 'traiter', 'xdbb', 1);

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

CREATE TABLE IF NOT EXISTS `transfert` (
  `id_transfert` int(100) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `solde` text NOT NULL,
  `type` text NOT NULL,
  `num` text NOT NULL,
  `etat` text NOT NULL,
  `id_client` int(100) NOT NULL,
  PRIMARY KEY (`id_transfert`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `transfert`
--

INSERT INTO `transfert` (`id_transfert`, `date`, `solde`, `type`, `num`, `etat`, `id_client`) VALUES
(1, '2015-05-25', '100', 'R I B', '02669501459834465142', 'success', 1),
(2, '2015-05-25', '20', 'R I B', '02669501411833265142', 'success', 1),
(3, '2015-05-25', '50', 'R I B', '02669501459834465142', 'success', 1),
(4, '2015-06-01', '30', 'R I B', '02669501416833255142', 'success', 1),
(5, '2015-06-08', '50', 'R I B', '02669441459833265142', 'success', 1),
(6, '2015-06-08', '20', 'R I B', '03215698561238541690', 'success', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `historique_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `transfert`
--
ALTER TABLE `transfert`
  ADD CONSTRAINT `transfert_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
