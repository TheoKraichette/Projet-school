-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 11 Septembre 2019 à 16:25
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `matiere` varchar(255) DEFAULT NULL,
  `note` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `idEleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id`, `matiere`, `note`, `date`, `idEleve`) VALUES
(1, 'Français', 5, '2019-09-09', 1),
(2, 'Histoire-Géographie', 15, '2019-09-09', 1),
(3, 'Mathématiques', 16, '2019-09-09', 2),
(4, 'Mathématiques', 10, '2019-09-10', 1),
(5, 'Sciences', 9, '2019-09-10', 2),
(6, 'Sport', 18, '2019-09-10', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` char(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `classe` varchar(255) DEFAULT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `emailParent` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `anciennete` int(11) DEFAULT NULL,
  `salaire` double DEFAULT NULL,
  `expulsion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `statut`, `nom`, `prenom`, `sexe`, `age`, `identifiant`, `mdp`, `classe`, `eleve_id`, `emailParent`, `email`, `anciennete`, `salaire`, `expulsion`) VALUES
(1, 'Directeur', 'Goldman', 'Jean-Jacques', NULL, NULL, 'Goldman_JJ', 'goldPass', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Instituteur', 'Delenoix', 'Jean', NULL, NULL, 'Delenoix_J', 'delePass', 'CP', NULL, NULL, 'jean.delenoix@mail.com', 1, 24000, NULL),
(3, 'Instituteur', 'Bekritch', 'Justine', NULL, NULL, 'Bekritch_J', 'bekrPass', 'CE1', NULL, NULL, 'justine.bekritch@mail.com', 12, 28000, NULL),
(4, 'Instituteur', 'Garbo', 'Greta', NULL, NULL, 'Garbo_G', 'garbPass', 'CE2', NULL, NULL, 'greta.garbo@mail.com', 7, 26800, NULL),
(5, 'Instituteur', 'Ghelain', 'Georges', NULL, NULL, 'Ghelain_G', 'ghelPass', 'CM1', NULL, NULL, 'georges.ghelain@mail.com', 8, 27000, NULL),
(6, 'Instituteur', 'Charbonnier', 'Gisèle', NULL, NULL, 'Charbonnier_G', 'charPass', 'CM2', NULL, NULL, 'gisele.charbonnier@mail.com', 5, 23000, NULL),
(7, 'Eleve', 'Allon', 'Levy', 'h', 6, 'allon_l', 'allonPass', 'CP', 1, 'famille.allon@mail.com', NULL, NULL, NULL, 0),
(8, 'Eleve', 'Bacard', 'Hugo', 'h', 5, 'bacard_h', 'bacardPass', 'CP', 2, 'famille.bacard@mail.com', NULL, NULL, NULL, 1),
(9, 'Eleve', 'Becker', 'Matthew', 'h', 6, 'becker_m', 'beckerPass', 'CP', 3, 'famille.becker@mail.com', NULL, NULL, NULL, 0),
(10, 'Eleve', 'Balwe', 'Chetan', 'M', 8, 'balwe_c', 'belwepass', 'CP', 4, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_FK` (`idEleve`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eleve_id` (`eleve_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_FK` FOREIGN KEY (`idEleve`) REFERENCES `user` (`eleve_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
