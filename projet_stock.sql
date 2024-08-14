-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 juin 2023 à 20:28
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `id` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `date_achat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `adresse`, `telephone`, `email`) VALUES
(6, 'mamatu', 'kojiro', 'thiesJI', 655576, 'Jassebou23++70@gmail.comJI'),
(5, 'momo', 'ka', 'MBOUR', 534322, 'SAS@glopmYGV'),
(3, 'zaraki', 'ly', 'koki', 778694532, 'SAS@glopm'),
(4, 'ousmane', 'guiza', 'liberte6', 77689043, 'Ousouousou@bang');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL,
  `id_vente` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `numero_f` int(11) NOT NULL,
  `date_f` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `mode_pay` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom`, `prenom`, `adresse`, `telephone`, `email`) VALUES
(1, 'Abou', 'Hadja', 'foire', 334567890, '6TT87T@gmail.FR');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(155) NOT NULL,
  `nom_p` varchar(122) NOT NULL,
  `description` varchar(155) NOT NULL,
  `prix` int(11) NOT NULL,
  `date_e` datetime(5) NOT NULL,
  `date_f` datetime(5) NOT NULL,
  `image` tinyblob NOT NULL,
  `stock` int(255) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=14445 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `categorie`, `nom_p`, `description`, `prix`, `date_e`, `date_f`, `image`, `stock`) VALUES
(1, 'accessoires', 'ZAZA', 'yttctyc', 50000, '2023-05-17 00:00:00.00000', '2023-05-28 00:00:00.00000', '', 10),
(123, 'electronique', 'AVION', 'noir et blanc', 10000000, '2023-01-09 00:00:00.00000', '2023-06-18 00:00:00.00000', '', 0),
(234, 'electronique', 'mycar', 'neuf', 344567, '2023-06-12 00:00:00.00000', '2023-06-25 00:00:00.00000', 0x323032332d30362d3235, 0),
(9999, 'vetements', '2K23', 'vhbvjk jh', 558877, '2022-12-04 00:00:00.00000', '2023-06-18 00:00:00.00000', 0x323032332d30362d3138, 0),
(5, 'accessoires', 'lunettes', 'belle', 789999, '2023-06-08 00:00:00.00000', '2023-06-29 00:00:00.00000', '', 0),
(14444, 'maison', 'ballon basket', 'beau ballon', 9000, '2023-06-09 00:00:00.00000', '2023-06-25 00:00:00.00000', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `confirm_password`, `etat`) VALUES
(1, 'Zaza@hgma.hj', '0cf31b2c283ce3431794586df7b0996d', '0cf31b2c283ce3431794586df7b0996d', 0),
(2, 'zaraki52', '0cf31b2c283ce3431794586df7b0996d', '0cf31b2c283ce3431794586df7b0996d', 0),
(3, 'zaraki5', '0cf31b2c283ce3431794586df7b0996d', '0cf31b2c283ce3431794586df7b0996d', 0),
(4, 'kasse52', '0cf31b2c283ce3431794586df7b0996d', '0cf31b2c283ce3431794586df7b0996d', 0),
(5, 'Afro', '0cf31b2c283ce3431794586df7b0996d', '0cf31b2c283ce3431794586df7b0996d', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(10) NOT NULL,
  `id_article` int(10) NOT NULL,
  `quantite` int(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `date_vente` datetime(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id`, `id_client`, `id_article`, `quantite`, `prix`, `date_vente`) VALUES
(1, 6, 1, 4, 50000, '2023-06-04 02:02:13.0'),
(2, 5, 123, 5, 444, '2023-06-04 02:13:28.0'),
(3, 5, 123, 5, 444, '2023-06-04 02:14:05.0'),
(4, 5, 123, 5, 444, '2023-06-04 02:20:16.0'),
(5, 6, 5, 70, 50000, '2023-06-04 02:30:22.0'),
(6, 6, 5, 12, 50000, '2023-06-04 02:30:52.0'),
(7, 3, 1, 122, 9000, '2023-06-04 02:39:46.0'),
(8, 3, 14444, 122, 9000, '2023-06-04 02:40:32.0'),
(9, 6, 14444, 1, 444, '2023-06-04 05:01:57.0'),
(10, 6, 1, 2, 50000, '2023-06-04 05:02:19.0'),
(11, 6, 14444, 3, 444, '2023-06-04 05:02:48.0'),
(12, 6, 1, 1, 9000, '2023-06-04 05:04:21.0'),
(13, 6, 1, 1, 9000, '2023-06-04 05:07:57.0'),
(14, 6, 123, 14, 50000, '2023-06-04 05:08:29.0'),
(15, 6, 123, 14, 50000, '2023-06-04 05:09:53.0'),
(16, 6, 5, 89, 444, '2023-06-04 05:10:30.0'),
(17, 6, 5, 1, 444, '2023-06-04 05:12:55.0'),
(18, 6, 5, 1, 444, '2023-06-04 05:13:22.0'),
(19, 6, 5, 1, 50000, '2023-06-04 05:13:48.0'),
(20, 6, 1, 155555, 50000, '2023-06-04 05:14:39.0'),
(21, 6, 1, 155555, 50000, '2023-06-04 05:19:37.0'),
(22, 6, 123, 2, 9000, '2023-06-04 05:23:32.0'),
(23, 6, 5, 1, 444, '2023-06-04 05:26:36.0'),
(24, 6, 1, 7, 444, '2023-06-04 05:27:14.0'),
(25, 6, 1, 7, 444, '2023-06-04 05:27:29.0'),
(26, 6, 123, 1, 9000, '2023-06-04 05:29:52.0'),
(27, 6, 14444, 3, 50000, '2023-06-04 05:31:00.0'),
(28, 6, 5, 2, 9000, '2023-06-04 05:41:01.0'),
(29, 3, 5, 1, 50000, '2023-06-04 05:44:54.0'),
(30, 3, 5, 11, 50000, '2023-06-04 05:45:30.0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
