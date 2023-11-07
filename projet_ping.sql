-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 nov. 2023 à 18:37
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_ping`
--

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
CREATE TABLE IF NOT EXISTS `demandes` (
  `id_demande` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `id_étudiant_dominante` int DEFAULT NULL,
  `id_ping` int DEFAULT NULL,
  PRIMARY KEY (`id_demande`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_étudiant_dominante` (`id_étudiant_dominante`),
  KEY `id_ping` (`id_ping`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id_equipe` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `status` int DEFAULT NULL,
  `membre` int DEFAULT NULL,
  PRIMARY KEY (`id_equipe`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_dominante`
--

DROP TABLE IF EXISTS `etudiant_dominante`;
CREATE TABLE IF NOT EXISTS `etudiant_dominante` (
  `id_utilisateur` int NOT NULL,
  `dominante` varchar(11) NOT NULL,
  `id_equipe` int DEFAULT NULL,
  `id_ping` int DEFAULT NULL,
  UNIQUE KEY `id_equipe` (`id_equipe`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_ping` (`id_ping`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant_dominante`
--

INSERT INTO `etudiant_dominante` (`id_utilisateur`, `dominante`, `id_equipe`, `id_ping`) VALUES
(3, 'BDTN', NULL, NULL),
(4, 'gee', NULL, NULL),
(7, 'TIC', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ping`
--

DROP TABLE IF EXISTS `ping`;
CREATE TABLE IF NOT EXISTS `ping` (
  `id_ping` int NOT NULL AUTO_INCREMENT,
  `nom_ping` varchar(50) NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `lien_image` varchar(300) NOT NULL,
  PRIMARY KEY (`id_ping`),
  UNIQUE KEY `nom_ping` (`nom_ping`),
  UNIQUE KEY `lien_image` (`lien_image`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ping`
--

INSERT INTO `ping` (`id_ping`, `nom_ping`, `description`, `lien_image`) VALUES
(1, 'mangez', 'Mangez bio est un mode de vie sain et respectueux de l\'environnement. En privilégiant les aliments biologiques, vous contribuez à réduire l\'utilisation de pesticides et à promouvoir une agriculture durable. Les produits bio sont également plus nutritifs et délicieux, ce qui en fait un choix judicieux pour votre santé. Rejoignez le mouvement pour une alimentation plus saine et respectueuse de la planète. Inscrivez-vous aujourd\'hui pour faire votre part.', 'https://static.actu.fr/uploads/2017/05/fruits-et-legumes-bio_pixelot-fotolia.jpg'),
(2, 'rechauffement_climatique', 'Le réchauffement climatique est le phénomène mondial de l\'augmentation des températures de la surface de la Terre. Il est principalement causé par les activités humaines, notamment les émissions de gaz à effet de serre provenant de la combustion des combustibles fossiles, de la déforestation et de l\'industrialisation. Ce phénomène a des conséquences graves sur notre planète, telles que la fonte des calottes glaciaires, l\'élévation du niveau de la mer, l\'acidification des océans, des événements climatiques extrêmes plus fréquents et des perturbations des écosystèmes. Rejoignez l\'effort mondial pour lutter contre le réchauffement climatique et préserver notre planète pour les générations futures. Inscrivez-vous aujourd\'hui pour faire votre part.', 'https://www.neozone.org/blog/wp-content/uploads/2021/08/rechauffement-climatique-001.jpg'),
(3, 'voitures_electriques', 'Les voitures électriques représentent l\'avenir de la mobilité durable. Propulsées par des batteries rechargeables, elles éliminent les émissions de gaz d\'échappement nocifs et contribuent à la réduction de la pollution de l\'air et des émissions de carbone. Les véhicules électriques offrent une conduite silencieuse, une économie de carburant améliorée et une maintenance réduite. En adoptant les voitures électriques, nous investissons dans un avenir plus propre et plus respectueux de l\'environnement. Joignez-vous au mouvement pour une mobilité électrique durable. Inscrivez-vous dès aujourd\'hui pour prendre part à cette révolution.', 'https://www.challenges.fr/assets/img/2020/02/27/cover-r4x3w1000-5e6bb03bafcba-cl-20-006-003-jpg.jpg'),
(4, 'mal nutruition', 'La malnutrition est un problème mondial de santé publique qui touche des millions de personnes, en particulier dans les régions défavorisées. Elle se caractérise par un déséquilibre nutritionnel, entraînant soit une carence en nutriments essentiels, soit un excès de calories vides. La malnutrition peut avoir de graves conséquences sur la croissance, le développement, et la santé physique et mentale. Pour lutter contre ce fléau, des efforts sont déployés à l\'échelle mondiale pour fournir une alimentation équilibrée et éduquer sur la nutrition. Rejoignez la lutte contre la malnutrition en vous informant, en sensibilisant et en soutenant les initiatives visant à assurer une alimentation saine pour tous.', 'https://webstockreview.net/images/boy-clipart-malnourished-31.jpg'),
(5, 'intelligence artificiel', 'L\'intelligence artificielle (IA) révolutionne notre monde. Elle consiste en des systèmes informatiques capables d\'apprendre, de raisonner et de prendre des décisions autonomes, souvent avec une précision surprenante. L\'IA est utilisée dans de nombreux domaines, tels que la médecine, l\'automobile, la finance et plus encore. Elle améliore l\'efficacité, la productivité et la qualité de vie. Cependant, elle soulève également des questions éthiques et de sécurité. Pour tirer le meilleur parti de l\'IA et atténuer les risques, il est essentiel d\'investir dans la recherche, la réglementation et la sensibilisation. Rejoignez l\'avenir de l\'IA en vous impliquant et en contribuant à façonner cette technologie révolutionnaire.', 'https://th.bing.com/th/id/OIP.qTts_vWiemJ4ecSX5FFfvwHaFj?pid=ImgDet&rs=1');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `UNIQUE_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(1, 'k', 'g', 'ds@gmail.com', '$2y$12$PaTsrzBP1cLnXguhmKEja.l0RV1qv/OoUzNvMC7XIQbbbeecGRLO.', 2),
(3, 'k', 'g', 'f@gmail.com', '$2y$12$OhEMhz9/NeYOdDPLbQRQcuN7ajaB4DUDRKUL1cRtCaHO1XMZlPQMy', 2),
(4, 'fdss', 'sd', 'ggft@gmail.com', '$2y$12$fPIXKyzZU4hALfh01/PfbujtHpoVAq8wWBh2PBKrKDSmacgM2SrZ2', 2),
(5, 'h', 'h', 'h@gmail.com', '$2y$12$/X6YBZAw7UURI7FXB613E.LPh32n5mwXTLIZPwf4ZHdbm.LyY9skS', 3),
(6, 'z', 'z', 'z@gmail.com', '$2y$12$tlOlPVAWkyryVrLDMxaO1.12edfMLLWd/3QeIOiPOynQOQto/OYHW', 1),
(7, 'aaa', 'aa', 'aa@gmail', '$2y$12$ajoguuz2muS6wr8zV7fBheD3filhxZyQtuwxJ9h8j.K8CakaN/xWy', 2),
(8, '', '', '', '$2y$12$sQ3IJ50N5oHiwlsbOK1hC.ZToV8LFOF/HsVWFw8/gbdurW.KmYes6', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandes_ibfk_2` FOREIGN KEY (`id_étudiant_dominante`) REFERENCES `etudiant_dominante` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandes_ibfk_3` FOREIGN KEY (`id_ping`) REFERENCES `ping` (`id_ping`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant_dominante`
--
ALTER TABLE `etudiant_dominante`
  ADD CONSTRAINT `fk_id_equipe` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_ping` FOREIGN KEY (`id_ping`) REFERENCES `ping` (`id_ping`),
  ADD CONSTRAINT `fk_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
