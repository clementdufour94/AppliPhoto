-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 mars 2021 à 11:53
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `photo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_categorie` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_categorie`, `id_article`, `nom_categorie`) VALUES
(4, 8, 'Objectif reflex Canon EF 8 - 15 mm f/4.0 L USM Fisheye');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(1000000) NOT NULL,
  `img` varchar(100) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `auteur_id` varchar(100) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `description`, `img`, `auteur`, `auteur_id`, `categorie`, `date`) VALUES
(1, 'le Sacr&eacute; coeur', 'Photo du sacr&eacute; coeur', 'IMG_2465.JPG', 'admin', '2', 'Objectif Reflex Canon EF 70-300mm F/4-5.6 is II USM', '2021-03-21 19:01:03'),
(2, 'La Tour Eiffel de nuit', 'Photo de la tour Eiffel de nuit', 'IMG_2464.JPG', 'admin', '2', 'Objectif Hybride Canon RF 24-105mm f/4 L IS USM', '2021-03-21 19:01:50'),
(3, 'Coucher de Soleil sur Paris', 'Photo d\'un coucher de soleil sur Paris', 'IMG_2462.JPG', 'admin', '2', 'Objectif canon EF-S 18-55 mm F3.5-5.6 III 58 mm', '2021-03-21 19:03:05'),
(4, 'Pont', 'Ceci est un pont', 'IMG_8084.JPG', 'clement94', '1', 'Objectif Reflex Canon EF 70-300mm F/4-5.6 is II USM', '2021-03-22 10:13:24'),
(5, 'Cimeti&egrave;re', 'Cimeti&egrave;re', 'DSCN1261.JPG', 'clement94', '1', 'Objectif canon EF-S 18-55 mm F3.5-5.6 III 58 mm', '2021-03-22 10:13:53'),
(6, 'Arbre', 'Arbre', 'DSCF2631 2.jpg', 'clement94', '1', 'Objectif Hybride Canon RF 24-105mm f/4 L IS USM', '2021-03-22 10:15:18'),
(7, 'Jardin', 'Jardin', '..jpg', 'clement94', '1', 'Objectif Hybride Canon RF 24-105mm f/4 L IS USM', '2021-03-22 10:15:58'),
(8, 'Fleur', 'Fleur', '10553428_1396654660555057_2522690696479990140_n.jpg', 'clement94', '1', 'En cours de modération', '2021-03-22 10:17:07'),
(9, 'N&eacute;nuphar', 'N&eacute;nuphar', 'DSCF2734.JPG', 'clement94', '1', 'Objectif Hybride Canon RF 24-105mm f/4 L IS USM', '2021-03-22 10:18:59'),
(10, 'Ou est Charly', 'Charly', 'DSCF2856.jpg', 'admin', '2', 'Objectif Reflex Canon EF 70-300mm F/4-5.6 is II USM', '2021-03-22 11:14:45'),
(11, 'Pont de nuit', 'Pont de nuit', 'IMG_3990.JPG', 'admin', '2', 'Objectif Hybride Canon RF 24-105mm f/4 L IS USM', '2021-03-22 11:41:51');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Objectif Reflex Canon EF 70-300mm F/4-5.6 is II USM'),
(2, 'Objectif Hybride Canon RF 24-105mm f/4 L IS USM'),
(3, 'Objectif canon EF-S 18-55 mm F3.5-5.6 III 58 mm');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `user` int(11) NOT NULL,
  `user_nom` varchar(100) NOT NULL,
  `article` int(11) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `date_publication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fav`
--

CREATE TABLE `fav` (
  `id_article` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fav`
--

INSERT INTO `fav` (`id_article`, `id_auteur`) VALUES
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `site` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL,
  `mdp` varchar(100) NOT NULL,
  `inscription` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `email`, `site`, `instagram`, `twitter`, `facebook`, `admin`, `mdp`, `inscription`) VALUES
(1, 'Dufour', 'Clément', 'clement94', 'clement.dufourl@gmail.com', NULL, NULL, NULL, NULL, NULL, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2021-02-16 17:05:21'),
(2, 'admin', 'Admin', 'admin', 'admin@gmail.com', NULL, 'https://www.instagram.com/clement_dufourl/?hl=fr', NULL, NULL, 1, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2021-03-10 09:35:48');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_categorie`),
  ADD KEY `fk_admin_id_article` (`id_article`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_auteur_id` (`auteur_id`),
  ADD KEY `fk_article_categorie` (`categorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD KEY `fk_commentaire_user` (`user`),
  ADD KEY `fk_commentaire_article` (`article`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
