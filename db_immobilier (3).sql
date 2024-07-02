-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 02 juil. 2024 à 03:51
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `mot_de_passe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `email`, `date_creation`, `mot_de_passe`) VALUES
(1, 'Fall ', 'Abdou Aziz', 'fallaziz699@gmail.com', '2024-06-26 08:30:56', 'passer'),
(2, 'Kane', 'Max', 'max06@gmail.com', '2024-06-26 08:31:47', '');

-- --------------------------------------------------------

--
-- Structure de la table `immeubles`
--

CREATE TABLE `immeubles` (
  `id_i` int(11) NOT NULL,
  `lib_i` varchar(100) NOT NULL,
  `adresse_i` varchar(100) NOT NULL,
  `equipements_i` varchar(255) NOT NULL,
  `nbr_unites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `immeubles`
--

INSERT INTO `immeubles` (`id_i`, `lib_i`, `adresse_i`, `equipements_i`, `nbr_unites`) VALUES
(1, 'Immeuble A', '123 Rue Principale', 'Ascenseur, Parking', 10),
(2, 'Immeuble B', '456 Avenue Centrale', 'Piscine, Sécurité 24/7', 8),
(3, 'Immeuble C', '789 Boulevard Sud', 'Jardin, Salle de sport', 12);

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

CREATE TABLE `locataire` (
  `id_locataire` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp(),
  `mot_de_passe` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `locataire`
--

INSERT INTO `locataire` (`id_locataire`, `nom`, `prenom`, `adresse`, `email`, `telephone`, `date_inscription`, `mot_de_passe`) VALUES
(1, 'Dupont', 'Jean', '1 Rue du Test', 'jean.dupont@example.com', '0102030405', '2024-06-01 00:00:00', 'passer'),
(3, 'Bernard', 'Luc', '3 Boulevard de la Démo', 'luc.bernard@example.com', '1112131415', '2024-06-03 00:00:00', '0'),
(4, 'Fall', 'Abdou', 'Yeumbeull', 'falllaziz699@gmail.com', '772784885', '2024-06-29 00:00:00', '0'),
(9, 'Fall', 'Abdou', 'Yeumbeull', 'az@gmail.com', '772784885', '2024-06-29 00:00:00', 'passer'),
(10, 'Diop', 'Saly', 'Saint-Louis', 'sali@gmail.com', '768795843', '2024-06-29 10:51:03', 'passer'),
(11, 'TEST', 'TEST', 'TEST', 'TEST@TEST.COM', '77777777', '2024-06-29 14:38:33', 'passer'),
(12, 'Ngary', 'Hossain', 'ISI', 'isi@gamil.com', '77777', '2024-06-29 15:21:05', 'passer'),
(13, 'Fall', 'Moustaph', 'Yeumbeul', 'mtaph@gmail.com', '768784321', '2024-06-29 20:22:37', 'passer'),
(14, 'DIEYE', 'Lamine', 'YEUMBEUL', 'diey@gmail.com', '703569632', '2024-06-30 01:32:05', 'passer');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `id_unite` int(11) DEFAULT NULL,
  `id_locataire` int(11) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `montant_loyer` decimal(10,2) DEFAULT NULL,
  `statut_paiement` enum('paye','en_retard','non_paye') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id_location`, `id_unite`, `id_locataire`, `date_debut`, `date_fin`, `montant_loyer`, `statut_paiement`) VALUES
(1, 5, 3, '2024-06-01', '2024-06-15', 175000.00, 'en_retard'),
(2, 4, 1, '2024-06-29', '2024-07-18', 210000.00, 'paye'),
(3, 4, 1, '2024-06-01', '2024-06-30', 1500.00, 'non_paye'),
(4, 6, 1, '2024-05-28', '2024-06-29', 1980.00, 'non_paye'),
(5, 9, 1, '2024-05-30', '2024-06-01', 225.00, 'non_paye'),
(6, 9, 1, '2024-05-30', '2024-06-01', 225.00, 'non_paye'),
(7, 9, 1, '2024-05-30', '2024-06-01', 225.00, 'non_paye'),
(8, 9, 1, '2024-06-07', '2024-07-07', 2325.00, 'non_paye'),
(9, 10, 1, '2024-07-05', '2024-08-08', 4083.33, 'non_paye'),
(10, 8, 1, '2024-06-30', '2024-06-07', 1440.00, 'non_paye'),
(11, 4, 1, '2024-06-29', '2024-06-30', 100.00, 'non_paye'),
(12, 11, 1, '2024-06-29', '2024-07-03', 316.67, 'non_paye'),
(13, 10, 1, '2024-06-29', '2024-07-07', 1050.00, 'non_paye'),
(14, 10, 1, '2024-07-19', '2024-08-19', 3733.33, 'non_paye');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fonction` enum('Admin','Proprietaire','Locataire') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `fonction`) VALUES
(1, 'aziz', 'passer', 'Admin'),
(2, 'sambou', 'sarr', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaires`
--

CREATE TABLE `proprietaires` (
  `id_proprietaire` int(11) NOT NULL,
  `nom_pro` varchar(50) NOT NULL,
  `prenom_pro` varchar(50) NOT NULL,
  `email_pro` varchar(50) NOT NULL,
  `immeuble` varchar(11) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `proprietaires`
--

INSERT INTO `proprietaires` (`id_proprietaire`, `nom_pro`, `prenom_pro`, `email_pro`, `immeuble`, `mot_de_passe`) VALUES
(11, 'Gaye', 'laye', 'gaye699@gmail.com', 'Immeuble A', 'passer'),
(12, 'Fall ', 'kblb', 'a@gmail.com', 'Immeuble C', 'passer'),
(15, 'Fall', 'aze', '4@gmail.com', 'Immeuble B', 'passer');

-- --------------------------------------------------------

--
-- Structure de la table `unites`
--

CREATE TABLE `unites` (
  `id_u` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `nbr_piece` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `loyer_mensuel` int(11) NOT NULL,
  `etat` enum('Libre','En attente','Occupée') NOT NULL,
  `id_immeuble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `unites`
--

INSERT INTO `unites` (`id_u`, `img`, `nbr_piece`, `superficie`, `loyer_mensuel`, `etat`, `id_immeuble`) VALUES
(4, 'ul.jpg', 3, 75, 1500, 'Libre', 1),
(5, 'ul1.jpg', 2, 50, 1200, 'En attente', 2),
(6, 'ul2.jpg', 4, 90, 1800, 'Libre', 3),
(7, 'ul3.jpg', 4, 90, 2500, 'Occupée', 1),
(8, 'ul4.jpg', 3, 75, 1800, 'Libre', 3),
(9, 'ul5.jpg', 5, 108, 2250, 'Libre', 2),
(10, 'ul6.jpg', 4, 105, 3500, 'Libre', 1),
(11, 'ul7.jpg', 2, 50, 1900, 'Occupée', 1),
(12, 'ul8.jpg', 3, 60, 2100, 'Libre', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `immeubles`
--
ALTER TABLE `immeubles`
  ADD PRIMARY KEY (`id_i`),
  ADD KEY `nbr_unites` (`nbr_unites`);

--
-- Index pour la table `locataire`
--
ALTER TABLE `locataire`
  ADD PRIMARY KEY (`id_locataire`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`),
  ADD KEY `id_unite` (`id_unite`),
  ADD KEY `id_locataire` (`id_locataire`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `proprietaires`
--
ALTER TABLE `proprietaires`
  ADD PRIMARY KEY (`id_proprietaire`),
  ADD KEY `immeubles` (`immeuble`);

--
-- Index pour la table `unites`
--
ALTER TABLE `unites`
  ADD PRIMARY KEY (`id_u`),
  ADD KEY `id_immeuble` (`id_immeuble`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `immeubles`
--
ALTER TABLE `immeubles`
  MODIFY `id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `locataire`
--
ALTER TABLE `locataire`
  MODIFY `id_locataire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `proprietaires`
--
ALTER TABLE `proprietaires`
  MODIFY `id_proprietaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `unites`
--
ALTER TABLE `unites`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`id_unite`) REFERENCES `unites` (`id_u`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`id_locataire`) REFERENCES `locataire` (`id_locataire`);

--
-- Contraintes pour la table `unites`
--
ALTER TABLE `unites`
  ADD CONSTRAINT `unites_ibfk_1` FOREIGN KEY (`id_immeuble`) REFERENCES `immeubles` (`id_i`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
