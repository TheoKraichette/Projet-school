-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 25 Septembre 2019 à 08:40
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
  `dates` date DEFAULT NULL,
  `idEleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id`, `matiere`, `note`, `dates`, `idEleve`) VALUES
(1, 'Français', 5, '2019-09-09', 1),
(2, 'Histoire-Géographie', 15, '2019-09-09', 1),
(3, 'Mathématiques', 16, '2019-09-09', 2),
(4, 'Mathématiques', 10, '2019-09-10', 1),
(5, 'Sciences', 9, '2019-09-10', 2),
(6, 'Sport', 18, '2019-09-10', 3),
(7, 'Sport', 0, '2019-09-19', 1),
(8, 'Francais', 15, '2019-09-13', 1),
(9, 'Histoire-Geographie', 14, '2019-09-20', 1),
(10, 'Francais', 5, '2019-09-20', 1),
(11, 'Francais', 5, '2019-09-24', 68),
(12, 'Mathematique', 11.11, '2019-09-10', 68),
(13, 'Francais', 15.15, '2019-09-09', 68),
(14, 'Mathematique', 16.66, '2019-09-03', 1),
(15, 'Histoire-Geographie', 15.55, '2019-09-24', 2),
(16, 'Histoire-Geographie', 11, '2019-09-24', 1);

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
  `idEleve` int(11) DEFAULT NULL,
  `emailParent` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `anciennete` int(11) DEFAULT NULL,
  `salaire` double DEFAULT NULL,
  `expulsion` varchar(255) DEFAULT 'ras'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `statut`, `nom`, `prenom`, `sexe`, `age`, `identifiant`, `mdp`, `classe`, `idEleve`, `emailParent`, `email`, `anciennete`, `salaire`, `expulsion`) VALUES
(1, 'Directeur', 'Goldman', 'Jean-Jacques', NULL, NULL, 'Goldman_JJ', 'goldPass', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Instituteur', 'Delenoix', 'Jean', '', 38, 'delenoix_J', 'delepass', 'CP', NULL, NULL, 'delenoix@gmail.com', 55, 1100, NULL),
(3, 'Instituteur', 'Bekritch', 'Justine', NULL, 44, 'Bekritch_J', 'bekrPass', 'CE1', NULL, NULL, 'justine.bekritch@mail.com', 12, 28000, NULL),
(4, 'Instituteur', 'Garbo', 'Greta', NULL, 55, 'Garbo_G', 'garbPass', 'CE2', NULL, NULL, 'greta.garbo@mail.com', 7, 26800, NULL),
(5, 'Instituteur', 'Ghelain', 'Georges', NULL, 33, 'Ghelain_G', 'ghelPass', 'CM1', NULL, NULL, 'georges.ghelain@mail.com', 8, 27000, NULL),
(6, 'Instituteur', 'Charbonnier', 'Gisèle', NULL, 59, 'Charbonnier_G', 'charPass', 'CM2', NULL, NULL, 'gisele.charbonnier@mail.com', 5, 23000, NULL),
(7, 'Eleve', 'Allon', 'Levy', 'M', NULL, 'allon_L', 'allonpass', 'CP', 1, 'testemailphpalaji@gmail.com', NULL, NULL, NULL, 'ras'),
(8, 'Eleve', 'Bacard', 'Hugo', 'M', NULL, 'bacard_h', 'bacardpass', 'CP', 2, 'belwefamily@gmail.com', NULL, NULL, NULL, 'Temporairement'),
(9, 'Eleve', 'Becker', 'Matthew', 'M', NULL, 'becker_m', 'beckerpass', 'CP', 3, 'testemailphpalaji@gmail.com', NULL, NULL, NULL, 'Temporairement'),
(10, 'Eleve', 'Balwe', 'Chetan', 'M', 8, 'balwe_c', 'belwepass', 'CP', 4, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(11, 'Eleve', 'Belair', 'Luc', 'M', 6, 'belair_l', 'belairpass', 'CP', 5, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(12, 'Eleve', 'Berkovitch', 'Vladimir', 'M', 6, 'berkovitch_v', 'berkopass', 'CP', 6, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(13, 'Eleve', 'Bertrand', 'Benoit', 'M', 6, 'bertrand_b', 'bertrandpass', 'CP', 7, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(14, 'Eleve', 'Rastafor', 'Prasenjit', 'M', 6, 'rastafor_p', 'rastapasss', 'CP', 8, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(15, 'Eleve', 'Blossier', 'Thomas', 'M', 6, 'blossier_t', 'blossierpass', 'CP', 9, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(16, 'Eleve', 'Bouyahad', 'Alexandra', 'F', 6, 'bouyahad_a', 'bouyapass', 'CP', 10, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(17, 'Eleve', 'Pellerin', 'Paul', 'M', 6, 'pellerin_p', 'pellepass', 'CP', 11, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(18, 'Eleve', 'Uscello', 'Brandon', 'M', 6, 'uscello_b', 'usecellopass', 'CP', 12, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(20, 'Eleve', 'Bissien', 'Erwan', 'M', 6, 'bissien_e', 'bissienpass', 'CP', 13, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(21, 'Eleve', 'Brugalle', 'Lea', 'F', 6, 'brugalle_l', 'brugpass', 'CP', 14, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(22, 'Eleve', 'Pietkochvky', 'Dylan', 'M', 6, 'pietkochvky_D', 'pietpasss', 'CP', 15, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(23, 'Eleve', 'Declairveaux', 'Julie', 'F', 7, 'declairveaux_J', 'declairpass', 'CE1', 16, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(24, 'Eleve', 'Gaultier', 'Jean-Paul', 'M', 7, 'gaultier_J', 'gaultierpass', 'CE1', 17, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(25, 'Eleve', 'Baudouin', 'Claire', 'F', 7, 'baudouin_C', 'baudoinpass', 'CE1', 18, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(26, 'Eleve', 'Lacourt', 'Georges', 'F', 7, 'lacourt_G', 'lacourtpass', 'CE1', 19, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(27, 'Eleve', 'Lesieur', 'Jean-Francois', 'M', 7, 'lesieur_J', 'lesieurpass', 'CE1', 20, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(28, 'Eleve', 'Marciani', 'Edith', 'F', 7, 'marciani_E', 'marciapass', 'CE1', 21, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(29, 'Eleve', 'MBappe', 'Killian', 'M', 7, 'mbappe_k', 'mbappepass', 'CE1', 22, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(30, 'Eleve', 'Simpson', 'Marge', 'F', 7, 'simpson_M', 'simpsonpass', 'CE1', 23, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(31, 'Eleve', 'Pei', 'Li xing', 'F', 7, 'pei_L', 'peilpass', 'CE1', 24, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(32, 'Eleve', 'Andrade', 'Georges', 'M', 7, 'andrade_G', 'andrapass', 'CE1', 25, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(33, 'Eleve', 'Delorme', 'Francine', 'F', 7, 'delorme_F', 'delormepass', 'CE1', 26, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(34, 'Eleve', 'Leandre', 'Suzanne', 'F', 7, 'leandre_s', 'leandrepass', 'CE1', 27, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(35, 'Eleve', 'Komanetchi', 'Nadia', 'F', 7, 'komanetchi_N', 'komapass', 'CE1', 28, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(36, 'Eleve', 'Massonet', 'Sandrine', 'F', 7, 'massonet_S', 'massopass', 'CE1', 29, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(37, 'Eleve', 'Dufreysne', 'Joelle', 'F', 7, 'dufreysne_J', 'dufreysnepass', 'CE1', 30, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(38, 'Eleve', 'Roberts', 'Julia', 'F', 8, 'roberts_J', 'robertpass', 'CE2', 31, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(39, 'Eleve', 'Midot', 'Bertrand', 'M', 8, 'midot_B', 'midotpass', 'CE2', 32, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(40, 'Eleve', 'Lemaitre', 'Johanna', 'F', 8, 'lemaitre_J', 'lemaitrepass', 'CE2', 33, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(41, 'Eleve', 'Essaidi', 'Karim', 'M', 8, 'essaidi_K', 'essaidipass', 'CE2', 34, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(42, 'Eleve', 'Jules', 'Francois', 'M', 8, 'jules_F', 'julespass', 'CE2', 35, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(43, 'Eleve', 'Marques', 'Nolan', 'M', 8, 'marques_N', 'marquespass', 'CE2', 36, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(44, 'Eleve', 'Ladjici', 'Mohammed', 'M', 8, 'ladjici_M', 'ladjipass', 'CE2', 37, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(45, 'Eleve', 'Feru', 'Marc', 'M', 8, 'feru_M', 'ferupass', 'CE2', 38, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(46, 'Eleve', 'Legrand', 'Sophie', 'M', 8, 'legrand_S', 'legrandpass', 'CE2', 39, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(47, 'Eleve', 'Pontier', 'Alexandra', 'F', 8, 'pontier_A', 'pontierpass', 'CE2', 40, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(48, 'Eleve', 'Koshugi', 'Cho', 'M', 8, 'koshugi_C', 'koshupass', 'CE2', 41, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(49, 'Eleve', 'Janshen', 'Frederic', 'M', 8, 'janshen_F', 'janshenpass', 'CE2', 42, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(50, 'Eleve', 'Schmitt', 'Eleonore', 'F', 8, 'schmitt_E', 'schmittpass', 'CE2', 43, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(51, 'Eleve', 'Chiesa', 'Deborah', 'F', 8, 'chiesa_D', 'chiesapass', 'CE2', 44, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(52, 'Eleve', 'Conrad', 'Jacqueline', 'F', 8, 'conrad_J', 'conradpass', 'CE2', 45, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(53, 'Eleve', 'Roberts', 'Julia', 'F', 8, 'roberts_Ju', 'robertspass', 'CM1', 46, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(54, 'Eleve', 'Midot', 'Juliette', 'F', 8, 'midot_j', 'midotpass', 'CM1', 47, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(55, 'Eleve', 'Douvres', 'Amandine', 'F', 8, 'douvres_a', 'douvrespass', 'CM1', 48, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(56, 'Eleve', 'Gengini', 'Lea', 'F', 8, 'gengini_l', 'genginipass', 'CM1', 49, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(57, 'Eleve', 'Jules', 'Francoise', 'F', 8, 'jules_Fr', 'julespass', 'CM1', 50, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(58, 'Eleve', 'Muniet', 'Nadine', 'F', 8, 'muniet_n', 'munietpass', 'CM1', 51, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(59, 'Eleve', 'Labrouch', 'Moktar', 'M', 8, 'labrouch_m', 'labrouchpass', 'CM1', 52, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(60, 'Eleve', 'Feru', 'Marc', 'M', 8, 'feru_ma', 'ferupass', 'CM1', 53, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(61, 'Eleve', 'Marielle', 'Bertrand', 'M', 8, 'marielle_b', 'mariellepass', 'CM1', 54, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(62, 'Eleve', 'Pontier', 'Alexandre', 'M', 8, 'pontier_A', 'pontierpass', 'CM1', 55, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(63, 'Eleve', 'Bettencourt', 'Liliane', 'F', 8, 'bettencourt_l', 'bettenpass', 'CM1', 56, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(64, 'Eleve', 'Rastapor', 'Jasmine', 'F', 8, 'rastapor_j', 'rastapass', 'CM1', 57, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(65, 'Eleve', 'Schmitt', 'Valentine', 'F', 8, 'schmitt_v', 'schmittpass', 'CM1', 58, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(66, 'Eleve', 'Bato', 'Delphine', 'F', 8, 'bato_d', 'batopass', 'CM1', 59, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(67, 'Eleve', 'Conrad', 'Jacqueline', 'F', 8, 'conrad_Ja', 'conradpass', 'CM1', 60, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(68, 'Eleve', 'Roberts', 'Jules', 'M', 9, 'roberts_Jul', 'robertspass', 'CM2', 61, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(70, 'Eleve', 'Montiel', 'Bernard', 'M', 9, 'montiel_b', 'montielpass', 'CM2', 62, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(71, 'Eleve', 'Desissi', 'Franz', 'M', 9, 'desissi_f', 'desipass', 'CM2', 63, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(72, 'Eleve', 'Armeplease', 'Novak', 'M', 9, 'arme_n', 'armepass', 'CM2', 64, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(73, 'Eleve', 'Lepers', 'Julien', 'M', 9, 'lepers_j', 'leperspass', 'CM2', 65, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(74, 'Eleve', 'Draggo', 'Ivan', 'M', 9, 'draggo_i', 'dragpass', 'CM2', 66, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(75, 'Eleve', 'Khadafi', 'Mouhammar', 'M', 9, 'khadafi_m', 'khadapass', 'CM2', 67, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(76, 'Eleve', 'Foutre', 'Jean', 'M', 9, 'foutre_j', 'foutrepass', 'CM2', 68, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(77, 'Eleve', 'Loren', 'Moktar', 'M', 9, 'loren_m', 'lorenpass', 'CM2', 69, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(78, 'Eleve', 'Pontier', 'Alexandre', 'M', 9, 'pontier_al', 'pontierpass', 'CM2', 70, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(79, 'Eleve', 'Petitotomobile', 'Boumbo', 'M', 9, 'petiteoto_b', 'petitepass', 'CM2', 71, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(80, 'Eleve', 'Janshen', 'Frederic', 'M', 9, 'janshen_fr', 'janshenpass', 'CM2', 72, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(81, 'Eleve', 'Beam', 'Jim', 'M', 9, 'beam_j', 'beampass', 'CM2', 73, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL),
(82, 'Eleve', 'Velma ', 'DaphnÃ©', 'F', 9, 'velma_d', 'velmapass', 'CM2', 74, 'belwefamily@gmail.com', NULL, NULL, NULL, NULL);

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
  ADD UNIQUE KEY `eleve_id` (`idEleve`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_FK` FOREIGN KEY (`idEleve`) REFERENCES `user` (`idEleve`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
