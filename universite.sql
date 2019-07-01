-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 01 Juillet 2019 à 08:32
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `universite`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `id_bat` int(11) NOT NULL,
  `nom_bat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `batiment`
--

INSERT INTO `batiment` (`id_bat`, `nom_bat`) VALUES
(1, 'BATIMENT 1'),
(2, 'Pavillon A'),
(3, 'Pavillon A'),
(4, 'Pavillon A'),
(5, 'Pavillon U'),
(6, 'Pavillon U');

-- --------------------------------------------------------

--
-- Structure de la table `boursier`
--

CREATE TABLE `boursier` (
  `id_etudiant` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `boursier`
--

INSERT INTO `boursier` (`id_etudiant`, `id_type`) VALUES
(79, 1),
(86, 1);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `nomchambre` varchar(255) NOT NULL,
  `id_bat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `nomchambre`, `id_bat`) VALUES
(1, 'Chambre4', 1),
(2, 'CHAMBRE1', 2);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `matricul` varchar(255) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `matricul`, `nom`, `prenom`, `email`, `datenaissance`, `tel`) VALUES
(79, '1020', 'GAYE', 'Doudou Mohamet', 'doudoumohametgaye@gmail.com', '1996-12-11', ' 221782257053'),
(85, '7854', 'NDIAYE', 'ASS', 'ezmailr@gmail.com', '1999-01-12', '78786555'),
(86, '0154', 'Lo', 'Aliou ', 'lune@gmail.com', '1996-12-11', '705142005');

-- --------------------------------------------------------

--
-- Structure de la table `loger`
--

CREATE TABLE `loger` (
  `id_etudiant` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `loger`
--

INSERT INTO `loger` (`id_etudiant`, `id_chambre`) VALUES
(86, 1),
(79, 2);

-- --------------------------------------------------------

--
-- Structure de la table `noboursier`
--

CREATE TABLE `noboursier` (
  `id_etudiant` int(11) NOT NULL,
  `adresse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `noboursier`
--

INSERT INTO `noboursier` (`id_etudiant`, `adresse`) VALUES
(85, 'Touba Toul');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `montant` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `libelle`, `montant`) VALUES
(1, ' PENSION ENTIER', 40000),
(2, 'DEMI PENSION', 20000);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`id_bat`);

--
-- Index pour la table `boursier`
--
ALTER TABLE `boursier`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_bat` (`id_bat`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `loger`
--
ALTER TABLE `loger`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `noboursier`
--
ALTER TABLE `noboursier`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `id_bat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `boursier`
--
ALTER TABLE `boursier`
  ADD CONSTRAINT `boursier_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boursier_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`id_bat`) REFERENCES `batiment` (`id_bat`);

--
-- Contraintes pour la table `loger`
--
ALTER TABLE `loger`
  ADD CONSTRAINT `loger_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `boursier` (`id_etudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loger_ibfk_2` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_chambre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `noboursier`
--
ALTER TABLE `noboursier`
  ADD CONSTRAINT `noboursier_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
