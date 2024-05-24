-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 192.168.45.200
-- Généré le : sam. 18 mai 2024 à 14:04
-- Version du serveur : 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediatheque`
--
CREATE DATABASE IF NOT EXISTS `mediatheque` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mediatheque`;

-- --------------------------------------------------------

--
-- Structure de la table `Acteur`
--

CREATE TABLE `Acteur` (
  `id_acteur` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `biographie` text DEFAULT NULL,
  `id_nationalite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Acteur`
--

INSERT INTO `Acteur` (`id_acteur`, `nom`, `prenom`, `biographie`, `id_nationalite`) VALUES
(1, 'DiCaprio', 'Leonardo', 'Acteur américain célèbre pour ses rôles dans Titanic, Inception, etc.', 2),
(2, 'Winslet', 'Kate', 'Actrice britannique connue pour son rôle dans Titanic', 3),
(3, 'Depp', 'Johnny', 'Acteur américain connu pour ses rôles dans Pirates des Caraïbes, Edward aux mains d\'argent, etc.', 2),
(4, 'Lawrence', 'Jennifer', 'Actrice américaine gagnante d\'un Oscar pour son rôle dans Happiness Therapy', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Auteur`
--

CREATE TABLE `Auteur` (
  `id_auteur` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `bibliographie` text DEFAULT NULL,
  `id_pays_origine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Auteur`
--

INSERT INTO `Auteur` (`id_auteur`, `prenom`, `nom`, `bibliographie`, `id_pays_origine`) VALUES
(1, 'Victor', 'Hugo', 'Écrivain français du XIXe siècle', 1),
(2, 'J.K.', 'Rowling', 'Auteur britannique de la saga Harry Potter', 3),
(3, 'Stephen', 'King', 'Maître de l\'horreur américain', 2),
(4, 'Margaret', 'Atwood', 'Auteur de science-fiction et de romans dystopiques', 4);

-- --------------------------------------------------------

--
-- Structure de la table `Casting`
--

CREATE TABLE `Casting` (
  `id_casting` int(11) NOT NULL,
  `id_acteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Casting`
--

INSERT INTO `Casting` (`id_casting`, `id_acteur`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `CastingDVD`
--

CREATE TABLE `CastingDVD` (
  `id_dvd` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `DVD`
--

CREATE TABLE `DVD` (
  `id_dvd` int(11) NOT NULL,
  `ian` varchar(20) DEFAULT NULL,
  `id_directeur` int(11) DEFAULT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `id_casting` int(11) DEFAULT NULL,
  `annee` year(4) DEFAULT NULL,
  `statut` varchar(20) DEFAULT NULL,
  `nombre_exemplaires` int(11) DEFAULT NULL,
  `id_langue` int(11) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `id_theme` int(11) DEFAULT NULL,
  `sous_titres` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `DVD`
--

INSERT INTO `DVD` (`id_dvd`, `ian`, `id_directeur`, `id_genre`, `titre`, `type`, `id_casting`, `annee`, `statut`, `nombre_exemplaires`, `id_langue`, `duree`, `id_theme`, `sous_titres`) VALUES
(3, '5051889282652', 1, 3, 'Inception', 'Film', 1, '2010', 'Disponible', 5, 2, 148, 6, NULL),
(4, '7321917000198', 3, 4, 'Edward aux mains d\'argent', 'Film', 3, '1990', 'Disponible', 3, 1, 105, 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `DVDLangue`
--

CREATE TABLE `DVDLangue` (
  `id_dvd` int(11) NOT NULL,
  `id_langue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `DVDTheme`
--

CREATE TABLE `DVDTheme` (
  `id_dvd` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Editeur`
--

CREATE TABLE `Editeur` (
  `id_editeur` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Editeur`
--

INSERT INTO `Editeur` (`id_editeur`, `nom`) VALUES
(1, 'Gallimard'),
(2, 'Penguin Books'),
(3, 'HarperCollins'),
(4, 'Simon & Schuster');

-- --------------------------------------------------------

--
-- Structure de la table `Genre`
--

CREATE TABLE `Genre` (
  `id_genre` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Genre`
--

INSERT INTO `Genre` (`id_genre`, `nom`) VALUES
(1, 'Roman'),
(2, 'Science-fiction'),
(3, 'Thriller'),
(4, 'Fantasy'),
(5, 'Biographie'),
(6, 'Comédie'),
(7, 'Drame');

-- --------------------------------------------------------

--
-- Structure de la table `Langue`
--

CREATE TABLE `Langue` (
  `id_langue` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Langue`
--

INSERT INTO `Langue` (`id_langue`, `nom`) VALUES
(1, 'Français'),
(2, 'Anglais'),
(3, 'Espagnol'),
(4, 'Allemand');

-- --------------------------------------------------------

--
-- Structure de la table `Livre`
--

CREATE TABLE `Livre` (
  `id_livre` int(11) NOT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `id_editeur` int(11) DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `nombre_pages` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `statut` varchar(20) DEFAULT NULL,
  `id_langue` int(11) DEFAULT NULL,
  `nombre_exemplaires` int(11) DEFAULT NULL,
  `id_theme` int(11) DEFAULT NULL,
  `maison_edition` varchar(100) DEFAULT NULL,
  `collection` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Livre`
--

INSERT INTO `Livre` (`id_livre`, `id_auteur`, `isbn`, `id_genre`, `id_editeur`, `titre`, `nombre_pages`, `annee`, `statut`, `id_langue`, `nombre_exemplaires`, `id_theme`, `maison_edition`, `collection`) VALUES
(1, 2, '9780747532743', 1, 2, 'Harry Potter à l\'école des sorciers', 332, 1997, 'Disponible', 2, 15, 2, 'Penguin Books', 'Harry Potter'),
(2, 3, '9782253150623', 2, 3, 'Ça', 1504, 2010, 'Disponible', 3, 8, 4, 'J\'ai Lu', 'Horreur'),
(3, 1, '9782070413119', 1, 1, 'Les Misérables', 1488, 1862, 'Disponible', 1, 10, 1, 'Gallimard', 'Folio');

-- --------------------------------------------------------

--
-- Structure de la table `LivreLangue`
--

CREATE TABLE `LivreLangue` (
  `id_livre` int(11) NOT NULL,
  `id_langue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `LivreTheme`
--

CREATE TABLE `LivreTheme` (
  `id_livre` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `NoteDVD`
--

CREATE TABLE `NoteDVD` (
  `id_note` int(11) NOT NULL,
  `id_dvd` int(11) DEFAULT NULL,
  `note` decimal(3,1) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date_note` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `NoteDVD`
--

INSERT INTO `NoteDVD` (`id_note`, `id_dvd`, `note`, `commentaire`, `id_utilisateur`, `date_note`) VALUES
(5, 3, 4.7, 'Film de science-fiction captivant', 1, '2024-05-04'),
(6, 4, 4.0, 'Fantastique et émouvant', 1, '2024-05-05');

-- --------------------------------------------------------

--
-- Structure de la table `NoteLivre`
--

CREATE TABLE `NoteLivre` (
  `id_note` int(11) NOT NULL,
  `id_livre` int(11) DEFAULT NULL,
  `note` decimal(3,1) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date_note` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `NoteLivre`
--

INSERT INTO `NoteLivre` (`id_note`, `id_livre`, `note`, `commentaire`, `id_utilisateur`, `date_note`) VALUES
(4, 1, 4.5, 'Chef-d\'œuvre de la littérature française', 1, '2024-05-01'),
(5, 2, 4.8, 'Excellent livre pour les jeunes et les moins jeunes', 1, '2024-05-02'),
(6, 3, 4.2, 'Très bon roman d\'horreur', 1, '2024-05-03');

-- --------------------------------------------------------

--
-- Structure de la table `Pays`
--

CREATE TABLE `Pays` (
  `id_pays` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Pays`
--

INSERT INTO `Pays` (`id_pays`, `nom`) VALUES
(1, 'France'),
(2, 'États-Unis'),
(3, 'Royaume-Uni'),
(4, 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `Realisateur`
--

CREATE TABLE `Realisateur` (
  `id_realisateur` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `biographie` text DEFAULT NULL,
  `id_pays_origine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `RealisateurDVD`
--

CREATE TABLE `RealisateurDVD` (
  `id_dvd` int(11) NOT NULL,
  `id_realisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_ressource` int(11) DEFAULT NULL,
  `type_ressource` enum('livre','dvd') DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_retour_prevue` date DEFAULT NULL,
  `date_retour_reelle` date DEFAULT NULL,
  `statut` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Theme`
--

CREATE TABLE `Theme` (
  `id_theme` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Theme`
--

INSERT INTO `Theme` (`id_theme`, `nom`) VALUES
(1, 'Amour'),
(2, 'Aventure'),
(3, 'Histoire'),
(4, 'Suspense'),
(5, 'Voyage'),
(6, 'Nature'),
(7, 'Science');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(100) DEFAULT NULL,
  `type_utilisateur` enum('utilisateur','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `type_utilisateur`) VALUES
(1, 'Dupont', 'Jean', 'jean.dupont@example.com', 'motdepasse123', 'utilisateur'),
(2, 'Admin', 'Admin', 'admin@example.com', 'admin123', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Acteur`
--
ALTER TABLE `Acteur`
  ADD PRIMARY KEY (`id_acteur`),
  ADD KEY `id_nationalite` (`id_nationalite`);

--
-- Index pour la table `Auteur`
--
ALTER TABLE `Auteur`
  ADD PRIMARY KEY (`id_auteur`),
  ADD KEY `id_pays_origine` (`id_pays_origine`);

--
-- Index pour la table `Casting`
--
ALTER TABLE `Casting`
  ADD PRIMARY KEY (`id_casting`),
  ADD KEY `id_acteur` (`id_acteur`);

--
-- Index pour la table `CastingDVD`
--
ALTER TABLE `CastingDVD`
  ADD PRIMARY KEY (`id_dvd`,`id_acteur`),
  ADD KEY `id_acteur` (`id_acteur`);

--
-- Index pour la table `DVD`
--
ALTER TABLE `DVD`
  ADD PRIMARY KEY (`id_dvd`),
  ADD KEY `id_directeur` (`id_directeur`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_casting` (`id_casting`),
  ADD KEY `id_langue` (`id_langue`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Index pour la table `DVDLangue`
--
ALTER TABLE `DVDLangue`
  ADD PRIMARY KEY (`id_dvd`,`id_langue`),
  ADD KEY `id_langue` (`id_langue`);

--
-- Index pour la table `DVDTheme`
--
ALTER TABLE `DVDTheme`
  ADD PRIMARY KEY (`id_dvd`,`id_theme`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Index pour la table `Editeur`
--
ALTER TABLE `Editeur`
  ADD PRIMARY KEY (`id_editeur`);

--
-- Index pour la table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `Langue`
--
ALTER TABLE `Langue`
  ADD PRIMARY KEY (`id_langue`);

--
-- Index pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_editeur` (`id_editeur`),
  ADD KEY `id_langue` (`id_langue`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Index pour la table `LivreLangue`
--
ALTER TABLE `LivreLangue`
  ADD PRIMARY KEY (`id_livre`,`id_langue`),
  ADD KEY `id_langue` (`id_langue`);

--
-- Index pour la table `LivreTheme`
--
ALTER TABLE `LivreTheme`
  ADD PRIMARY KEY (`id_livre`,`id_theme`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Index pour la table `NoteDVD`
--
ALTER TABLE `NoteDVD`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `id_dvd` (`id_dvd`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `NoteLivre`
--
ALTER TABLE `NoteLivre`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `Pays`
--
ALTER TABLE `Pays`
  ADD PRIMARY KEY (`id_pays`);

--
-- Index pour la table `Realisateur`
--
ALTER TABLE `Realisateur`
  ADD PRIMARY KEY (`id_realisateur`),
  ADD KEY `id_pays_origine` (`id_pays_origine`);

--
-- Index pour la table `RealisateurDVD`
--
ALTER TABLE `RealisateurDVD`
  ADD PRIMARY KEY (`id_dvd`,`id_realisateur`),
  ADD KEY `id_realisateur` (`id_realisateur`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `FK_Reservation_DVD` (`id_ressource`);

--
-- Index pour la table `Theme`
--
ALTER TABLE `Theme`
  ADD PRIMARY KEY (`id_theme`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Acteur`
--
ALTER TABLE `Acteur`
  MODIFY `id_acteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Auteur`
--
ALTER TABLE `Auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Casting`
--
ALTER TABLE `Casting`
  MODIFY `id_casting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `DVD`
--
ALTER TABLE `DVD`
  MODIFY `id_dvd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Editeur`
--
ALTER TABLE `Editeur`
  MODIFY `id_editeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Langue`
--
ALTER TABLE `Langue`
  MODIFY `id_langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `NoteDVD`
--
ALTER TABLE `NoteDVD`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `NoteLivre`
--
ALTER TABLE `NoteLivre`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Pays`
--
ALTER TABLE `Pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Realisateur`
--
ALTER TABLE `Realisateur`
  MODIFY `id_realisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Theme`
--
ALTER TABLE `Theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Acteur`
--
ALTER TABLE `Acteur`
  ADD CONSTRAINT `Acteur_ibfk_1` FOREIGN KEY (`id_nationalite`) REFERENCES `Pays` (`id_pays`);

--
-- Contraintes pour la table `Auteur`
--
ALTER TABLE `Auteur`
  ADD CONSTRAINT `Auteur_ibfk_1` FOREIGN KEY (`id_pays_origine`) REFERENCES `Pays` (`id_pays`);

--
-- Contraintes pour la table `Casting`
--
ALTER TABLE `Casting`
  ADD CONSTRAINT `Casting_ibfk_1` FOREIGN KEY (`id_acteur`) REFERENCES `Acteur` (`id_acteur`);

--
-- Contraintes pour la table `CastingDVD`
--
ALTER TABLE `CastingDVD`
  ADD CONSTRAINT `CastingDVD_ibfk_1` FOREIGN KEY (`id_dvd`) REFERENCES `DVD` (`id_dvd`),
  ADD CONSTRAINT `CastingDVD_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `Acteur` (`id_acteur`);

--
-- Contraintes pour la table `DVD`
--
ALTER TABLE `DVD`
  ADD CONSTRAINT `DVD_ibfk_1` FOREIGN KEY (`id_directeur`) REFERENCES `Acteur` (`id_acteur`),
  ADD CONSTRAINT `DVD_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `Genre` (`id_genre`),
  ADD CONSTRAINT `DVD_ibfk_3` FOREIGN KEY (`id_casting`) REFERENCES `Casting` (`id_casting`),
  ADD CONSTRAINT `DVD_ibfk_4` FOREIGN KEY (`id_langue`) REFERENCES `Langue` (`id_langue`),
  ADD CONSTRAINT `DVD_ibfk_5` FOREIGN KEY (`id_theme`) REFERENCES `Theme` (`id_theme`);

--
-- Contraintes pour la table `DVDLangue`
--
ALTER TABLE `DVDLangue`
  ADD CONSTRAINT `DVDLangue_ibfk_1` FOREIGN KEY (`id_dvd`) REFERENCES `DVD` (`id_dvd`),
  ADD CONSTRAINT `DVDLangue_ibfk_2` FOREIGN KEY (`id_langue`) REFERENCES `Langue` (`id_langue`);

--
-- Contraintes pour la table `DVDTheme`
--
ALTER TABLE `DVDTheme`
  ADD CONSTRAINT `DVDTheme_ibfk_1` FOREIGN KEY (`id_dvd`) REFERENCES `DVD` (`id_dvd`),
  ADD CONSTRAINT `DVDTheme_ibfk_2` FOREIGN KEY (`id_theme`) REFERENCES `Theme` (`id_theme`);

--
-- Contraintes pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD CONSTRAINT `Livre_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `Auteur` (`id_auteur`),
  ADD CONSTRAINT `Livre_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `Genre` (`id_genre`),
  ADD CONSTRAINT `Livre_ibfk_3` FOREIGN KEY (`id_editeur`) REFERENCES `Editeur` (`id_editeur`),
  ADD CONSTRAINT `Livre_ibfk_4` FOREIGN KEY (`id_langue`) REFERENCES `Langue` (`id_langue`),
  ADD CONSTRAINT `Livre_ibfk_5` FOREIGN KEY (`id_theme`) REFERENCES `Theme` (`id_theme`);

--
-- Contraintes pour la table `LivreLangue`
--
ALTER TABLE `LivreLangue`
  ADD CONSTRAINT `LivreLangue_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `Livre` (`id_livre`),
  ADD CONSTRAINT `LivreLangue_ibfk_2` FOREIGN KEY (`id_langue`) REFERENCES `Langue` (`id_langue`);

--
-- Contraintes pour la table `LivreTheme`
--
ALTER TABLE `LivreTheme`
  ADD CONSTRAINT `LivreTheme_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `Livre` (`id_livre`),
  ADD CONSTRAINT `LivreTheme_ibfk_2` FOREIGN KEY (`id_theme`) REFERENCES `Theme` (`id_theme`);

--
-- Contraintes pour la table `NoteDVD`
--
ALTER TABLE `NoteDVD`
  ADD CONSTRAINT `NoteDVD_ibfk_1` FOREIGN KEY (`id_dvd`) REFERENCES `DVD` (`id_dvd`),
  ADD CONSTRAINT `NoteDVD_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `NoteLivre`
--
ALTER TABLE `NoteLivre`
  ADD CONSTRAINT `NoteLivre_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `Livre` (`id_livre`),
  ADD CONSTRAINT `NoteLivre_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `Realisateur`
--
ALTER TABLE `Realisateur`
  ADD CONSTRAINT `Realisateur_ibfk_1` FOREIGN KEY (`id_pays_origine`) REFERENCES `Pays` (`id_pays`);

--
-- Contraintes pour la table `RealisateurDVD`
--
ALTER TABLE `RealisateurDVD`
  ADD CONSTRAINT `RealisateurDVD_ibfk_1` FOREIGN KEY (`id_dvd`) REFERENCES `DVD` (`id_dvd`),
  ADD CONSTRAINT `RealisateurDVD_ibfk_2` FOREIGN KEY (`id_realisateur`) REFERENCES `Acteur` (`id_acteur`);

--
-- Contraintes pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `FK_Reservation_DVD` FOREIGN KEY (`id_ressource`) REFERENCES `DVD` (`id_dvd`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Reservation_Livre` FOREIGN KEY (`id_ressource`) REFERENCES `Livre` (`id_livre`) ON DELETE CASCADE,
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`);
--
-- Base de données : `polymedia`
--
CREATE DATABASE IF NOT EXISTS `polymedia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `polymedia`;

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE `acteurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `biographie` text DEFAULT NULL,
  `id_nationalite` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `bibliographie` text DEFAULT NULL,
  `id_nationalite` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id`, `nom`, `prenom`, `bibliographie`, `id_nationalite`, `created_at`, `updated_at`) VALUES
(17, 'Hugo', 'Victor', 'Victor Hugo est un écrivain, dramaturge, poète, homme politique, académicien et intellectuel engagé français, né le 26 février 1802 à Besançon et mort le 22 mai 1885 à Paris. Il est considéré comme l\'un des plus importants écrivains de langue française. Son œuvre, abondante, couvre tous les genres littéraires et politiques, et son style est d\'une grande diversité. Il est également une personnalité politique et intellectuelle majeure de son époque.', 1, '2024-05-17 13:38:35', '2024-05-17 13:38:35'),
(18, 'Rowling', 'J.K.', 'Joanne Rowling, plus connue sous les pseudonymes J. K. Rowling et Robert Galbraith, est une romancière et scénariste britannique née le 31 juillet 1965 à Yate, dans le Gloucestershire en Angleterre. Elle doit sa renommée mondiale à la série Harry Potter, dont les romans connaissent un succès commercial record à travers le monde.', 2, '2024-05-17 13:38:35', '2024-05-17 13:38:35'),
(19, 'Tolkien', 'J.R.R.', 'John Ronald Reuel Tolkien, né le 3 janvier 1892 à Bloemfontein (Afrique du Sud) et mort le 2 septembre 1973 à Bournemouth (Royaume-Uni), est un écrivain, poète, philologue, essayiste et professeur anglais. Il est principalement connu pour ses romans Le Hobbit et Le Seigneur des anneaux.', 3, '2024-05-17 13:38:35', '2024-05-17 13:38:35'),
(20, 'Saint-Exupéry', 'Antoine de', 'Antoine de Saint-Exupéry, né le 29 juin 1900 à Lyon et disparu en vol le 31 juillet 1944 en mer, au large de Marseille, est un écrivain et aviateur français. Il est surtout connu pour son livre Le Petit Prince, publié en 1943, traduit dans plus de deux cents langues et dialectes.', 1, '2024-05-17 13:38:35', '2024-05-17 13:38:35'),
(21, 'Hosseini', 'Khaled', 'Khaled Hosseini, né le 4 mars 1965 à Kaboul en Afghanistan, est un écrivain et médecin américain d\'origine afghane. Il est l\'auteur de trois romans à succès : Les Cerfs-volants de Kaboul, Mille Soleils splendides et Ainsi résonne l\'écho infini des montagnes.', 4, '2024-05-17 13:38:35', '2024-05-17 13:38:35'),
(22, 'Christie', 'Agatha', 'Agatha Christie, née Agatha Mary Clarissa Miller le 15 septembre 1890 à Torquay et morte le 12 janvier 1976 à Wallingford (Oxfordshire), est une femme de lettres britannique, auteure de nombreux romans policiers. Son nom est associé à celui de ses deux héros : Hercule Poirot et Miss Marple.', 2, '2024-05-17 13:38:35', '2024-05-17 13:38:35'),
(23, 'Orwell', 'George', 'George Orwell, nom de plume d\'Eric Arthur Blair, né le 25 juin 1903 à Motihari (Inde) pendant la période du Raj britannique et mort le 21 janvier 1950 à Londres, est un écrivain, essayiste et journaliste britannique. Son œuvre est marquée par une lucide opposition aux idéologies totalitaires, que ce soit le stalinisme, dans une perspective anti-totalitaire, ou le nationalisme.', 4, '2024-05-17 13:38:35', '2024-05-17 13:38:35'),
(24, 'Eco', 'Umberto', 'Umberto Eco, né le 5 janvier 1932 à Alexandrie, dans le Piémont, et mort le 19 février 2016 à Milan, en Lombardie, est un universitaire, sémiologue, romancier, essayiste, philosophe et critique littéraire italien, surtout connu du grand public pour son roman Le Nom de la rose.', 3, '2024-05-17 13:38:35', '2024-05-17 13:38:35');

-- --------------------------------------------------------

--
-- Structure de la table `castings`
--

CREATE TABLE `castings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_acteur` bigint(20) UNSIGNED NOT NULL,
  `id_dvd` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dvds`
--

CREATE TABLE `dvds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ian` varchar(255) NOT NULL,
  `id_realisateur` bigint(20) UNSIGNED NOT NULL,
  `genre` enum('Romance','Science-fiction','Mystère','Thriller','Fantaisie','Aventure','Horreur','Dystopie','Humour','Jeunesse','Biographie','Histoire','Sciences naturelles','Sciences sociales','Psychologie','Économie','Politique','Religion') NOT NULL,
  `titre` varchar(255) NOT NULL,
  `id_casting` bigint(20) UNSIGNED NOT NULL,
  `annee` int(4) NOT NULL,
  `statut` enum('disponible','indisponible') NOT NULL,
  `nombre_exemplaires` int(11) NOT NULL,
  `id_langue` bigint(20) UNSIGNED NOT NULL,
  `duree` int(11) NOT NULL,
  `sous_titres` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dvd_langues`
--

CREATE TABLE `dvd_langues` (
  `id_dvd` bigint(20) UNSIGNED NOT NULL,
  `id_langue` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `editeurs`
--

CREATE TABLE `editeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `editeurs`
--

INSERT INTO `editeurs` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Gallimard', '2024-05-17 13:44:58', '2024-05-17 13:44:58'),
(2, 'Grasset', '2024-05-17 13:44:58', '2024-05-17 13:44:58'),
(3, 'Fallois', '2024-05-17 13:44:58', '2024-05-17 13:44:58'),
(4, 'Folio', '2024-05-17 13:44:58', '2024-05-17 13:44:58'),
(5, 'Gallimard Jeunesse', '2024-05-17 13:44:58', '2024-05-17 13:44:58'),
(6, 'Robert Laffont', '2024-05-17 13:44:58', '2024-05-17 13:44:58');

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

CREATE TABLE `langues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `langues`
--

INSERT INTO `langues` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Français', '2024-05-17 13:51:27', '2024-05-17 13:51:27'),
(2, 'Anglais', '2024-05-17 13:51:27', '2024-05-17 13:51:27'),
(3, 'Espagnol', '2024-05-17 13:51:27', '2024-05-17 13:51:27'),
(4, 'Allemand', '2024-05-17 13:51:27', '2024-05-17 13:51:27'),
(5, 'Italien', '2024-05-17 13:51:27', '2024-05-17 13:51:27'),
(6, 'Portugais', '2024-05-17 13:51:27', '2024-05-17 13:51:27');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_auteur` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `id_editeur` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `genre` enum('Romance','Science-fiction','Mystère','Thriller','Fantaisie','Aventure','Horreur','Dystopie','Humour','Jeunesse','Biographie','Histoire','Sciences naturelles','Sciences sociales','Psychologie','Économie','Politique','Religion') NOT NULL,
  `nombre_pages` int(11) NOT NULL,
  `annee` int(4) NOT NULL,
  `statut` enum('disponible','indisponible') NOT NULL,
  `id_langue` bigint(20) UNSIGNED NOT NULL,
  `nombre_exemplaires` int(11) NOT NULL,
  `maison_edition` varchar(255) NOT NULL,
  `collection` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `id_auteur`, `isbn`, `id_editeur`, `titre`, `genre`, `nombre_pages`, `annee`, `statut`, `id_langue`, `nombre_exemplaires`, `maison_edition`, `collection`, `created_at`, `updated_at`) VALUES
(85, 17, '9782070425163', 1, 'Le Petit Prince', 'Fantaisie', 93, 1943, 'disponible', 1, 10, 'Gallimard', 'Classiques', '2024-05-17 13:55:46', '2024-05-17 13:55:46'),
(86, 18, '9782070408500', 1, 'Les Misérables', 'Romance', 1900, 1862, 'disponible', 1, 10, 'Gallimard', 'Folio Classique', '2024-05-17 13:55:46', '2024-05-17 13:55:46'),
(87, 19, '9782072850742', 2, '1984', 'Dystopie', 400, 1949, 'disponible', 1, 10, 'Gallimard', 'Classiques', '2024-05-17 13:55:46', '2024-05-17 13:55:46'),
(88, 20, '9782070360427', 3, 'Le Nom de la Rose', 'Mystère', 592, 1980, 'disponible', 1, 10, 'Grasset', 'Policier', '2024-05-17 13:55:46', '2024-05-17 13:55:46'),
(89, 17, '9782070735706', 4, 'La Vérité sur l\'Affaire Harry Quebert', 'Thriller', 670, 2012, 'disponible', 1, 10, 'Fallois', 'Policier', '2024-05-17 13:55:46', '2024-05-17 13:55:46'),
(90, 18, '9782070337597', 5, 'L\'Étranger', 'Romance', 123, 1942, 'disponible', 1, 10, 'Gallimard', 'Folio Classique', '2024-05-17 13:55:46', '2024-05-17 13:55:46'),
(91, 18, '9782070419032', 6, 'Fondation', 'Science-fiction', 277, 1951, 'disponible', 1, 10, 'Gallimard', 'Folio SF', '2024-05-17 13:55:46', '2024-05-17 13:55:46'),
(92, 19, '9782070425563', 1, 'Orgueil et Préjugés', 'Romance', 416, 1813, 'disponible', 1, 10, 'Gallimard', 'Classiques', '2024-05-17 13:55:46', '2024-05-17 13:55:46'),
(93, 20, '9782070438075', 2, 'La Nuit des temps', 'Science-fiction', 447, 1968, 'disponible', 1, 10, 'Gallimard', 'Folio SF', '2024-05-17 13:55:46', '2024-05-17 13:55:46'),
(94, 17, '9782070425594', 3, 'Da Vinci Code', 'Mystère', 672, 2003, 'disponible', 1, 10, 'Gallimard', 'Policier', '2024-05-17 13:55:46', '2024-05-17 13:55:46');

-- --------------------------------------------------------

--
-- Structure de la table `livre_langues`
--

CREATE TABLE `livre_langues` (
  `id_livre` bigint(20) UNSIGNED NOT NULL,
  `id_langue` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2000_01_01_000001_create_pays_table', 1),
(2, '2000_01_01_000002_create_acteurs_table', 1),
(3, '2000_01_01_000003_create_auteurs_table', 1),
(4, '2000_01_01_000004_create_editeurs_table', 1),
(5, '2000_01_01_000006_create_langues_table', 1),
(6, '2000_01_01_000007_create_realisateurs_table', 1),
(7, '2000_01_01_000009_create_utilisateurs_table', 1),
(8, '2000_01_01_000010_create_casting_table', 1),
(9, '2000_01_01_000011_create_dvds_table', 1),
(10, '2000_01_01_000012_create_dvdlangues_table', 1),
(11, '2000_01_01_000014_create_livres_table', 1),
(12, '2000_01_01_000015_create_livrelangues_table', 1),
(13, '2000_01_01_000017_create_note_table', 1),
(14, '2000_01_01_000019_create_reservations_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `id_livre` bigint(20) UNSIGNED NOT NULL,
  `id_dvd` bigint(20) UNSIGNED NOT NULL,
  `type_ressource` enum('livre','dvd') NOT NULL,
  `note` decimal(3,1) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `date_note` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'France', '2024-05-17 13:37:50', '2024-05-17 13:37:50'),
(2, 'Royaume-Uni', '2024-05-17 13:37:50', '2024-05-17 13:37:50'),
(3, 'États-Unis', '2024-05-17 13:37:50', '2024-05-17 13:37:50'),
(4, 'Italie', '2024-05-17 13:37:50', '2024-05-17 13:37:50');

-- --------------------------------------------------------

--
-- Structure de la table `realisateurs`
--

CREATE TABLE `realisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `biographie` text DEFAULT NULL,
  `id_nationalite` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `id_livre` bigint(20) UNSIGNED NOT NULL,
  `id_dvd` bigint(20) UNSIGNED NOT NULL,
  `type_ressource` enum('livre','dvd') NOT NULL,
  `date_debut` date NOT NULL,
  `date_retour_prevue` date NOT NULL,
  `statut` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `type_utilisateur` enum('utilisateur','bibliothecaire','admin') NOT NULL DEFAULT 'utilisateur',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteurs`
--
ALTER TABLE `acteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acteurs_id_nationalite_foreign` (`id_nationalite`);

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteurs_id_nationalite_foreign` (`id_nationalite`);

--
-- Index pour la table `castings`
--
ALTER TABLE `castings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `castings_id_acteur_foreign` (`id_acteur`);

--
-- Index pour la table `dvds`
--
ALTER TABLE `dvds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dvds_id_realisateur_foreign` (`id_realisateur`),
  ADD KEY `dvds_id_casting_foreign` (`id_casting`),
  ADD KEY `dvds_id_langue_foreign` (`id_langue`);

--
-- Index pour la table `dvd_langues`
--
ALTER TABLE `dvd_langues`
  ADD PRIMARY KEY (`id_dvd`,`id_langue`),
  ADD KEY `dvd_langues_id_langue_foreign` (`id_langue`);

--
-- Index pour la table `editeurs`
--
ALTER TABLE `editeurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livres_id_auteur_foreign` (`id_auteur`),
  ADD KEY `livres_id_editeur_foreign` (`id_editeur`),
  ADD KEY `livres_id_langue_foreign` (`id_langue`);

--
-- Index pour la table `livre_langues`
--
ALTER TABLE `livre_langues`
  ADD PRIMARY KEY (`id_livre`,`id_langue`),
  ADD KEY `livre_langues_id_langue_foreign` (`id_langue`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_id_utilisateur_foreign` (`id_utilisateur`),
  ADD KEY `note_id_livre_foreign` (`id_livre`),
  ADD KEY `note_id_dvd_foreign` (`id_dvd`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `realisateurs`
--
ALTER TABLE `realisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `realisateurs_id_nationalite_foreign` (`id_nationalite`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_id_livre_foreign` (`id_livre`),
  ADD KEY `reservations_id_dvd_foreign` (`id_dvd`),
  ADD KEY `reservations_id_utilisateur_foreign` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateurs_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteurs`
--
ALTER TABLE `acteurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `castings`
--
ALTER TABLE `castings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dvds`
--
ALTER TABLE `dvds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `editeurs`
--
ALTER TABLE `editeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `realisateurs`
--
ALTER TABLE `realisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acteurs`
--
ALTER TABLE `acteurs`
  ADD CONSTRAINT `acteurs_id_nationalite_foreign` FOREIGN KEY (`id_nationalite`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD CONSTRAINT `auteurs_id_nationalite_foreign` FOREIGN KEY (`id_nationalite`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `castings`
--
ALTER TABLE `castings`
  ADD CONSTRAINT `castings_id_acteur_foreign` FOREIGN KEY (`id_acteur`) REFERENCES `acteurs` (`id`);

--
-- Contraintes pour la table `dvds`
--
ALTER TABLE `dvds`
  ADD CONSTRAINT `dvds_id_casting_foreign` FOREIGN KEY (`id_casting`) REFERENCES `castings` (`id`),
  ADD CONSTRAINT `dvds_id_langue_foreign` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id`),
  ADD CONSTRAINT `dvds_id_realisateur_foreign` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateurs` (`id`);

--
-- Contraintes pour la table `dvd_langues`
--
ALTER TABLE `dvd_langues`
  ADD CONSTRAINT `dvd_langues_id_dvd_foreign` FOREIGN KEY (`id_dvd`) REFERENCES `dvds` (`id`),
  ADD CONSTRAINT `dvd_langues_id_langue_foreign` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id`);

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_id_auteur_foreign` FOREIGN KEY (`id_auteur`) REFERENCES `auteurs` (`id`),
  ADD CONSTRAINT `livres_id_editeur_foreign` FOREIGN KEY (`id_editeur`) REFERENCES `editeurs` (`id`),
  ADD CONSTRAINT `livres_id_langue_foreign` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id`);

--
-- Contraintes pour la table `livre_langues`
--
ALTER TABLE `livre_langues`
  ADD CONSTRAINT `livre_langues_id_langue_foreign` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id`),
  ADD CONSTRAINT `livre_langues_id_livre_foreign` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_id_dvd_foreign` FOREIGN KEY (`id_dvd`) REFERENCES `dvds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `note_id_livre_foreign` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `note_id_utilisateur_foreign` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `realisateurs`
--
ALTER TABLE `realisateurs`
  ADD CONSTRAINT `realisateurs_id_nationalite_foreign` FOREIGN KEY (`id_nationalite`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_id_dvd_foreign` FOREIGN KEY (`id_dvd`) REFERENCES `dvds` (`id`),
  ADD CONSTRAINT `reservations_id_livre_foreign` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`),
  ADD CONSTRAINT `reservations_id_utilisateur_foreign` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);
--
-- Base de données : `singleton_test`
--
CREATE DATABASE IF NOT EXISTS `singleton_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `singleton_test`;

-- --------------------------------------------------------

--
-- Structure de la table `table_test`
--

CREATE TABLE `table_test` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `table_test`
--

INSERT INTO `table_test` (`id`) VALUES
(1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `table_test`
--
ALTER TABLE `table_test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `table_test`
--
ALTER TABLE `table_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Base de données : `test_mediatheque`
--
CREATE DATABASE IF NOT EXISTS `test_mediatheque` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test_mediatheque`;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `genre` varchar(1) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `genre`, `age`) VALUES
(1, 'Doe', 'John', 'H', 30),
(2, 'Smith', 'Jane', 'F', 25),
(3, 'Johnson', 'Michael', 'H', 35),
(4, 'Williams', 'Emily', 'F', 28),
(5, 'Brown', 'William', 'H', 40),
(6, 'Jones', 'Emma', 'F', 22),
(7, 'Taylor', 'David', 'H', 33),
(8, 'Anderson', 'Olivia', 'F', 29),
(9, 'Thomas', 'Sophia', 'F', 27),
(10, 'Roberts', 'Daniel', 'H', 31);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
