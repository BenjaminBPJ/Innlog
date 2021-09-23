-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 23 sep. 2021 à 09:58
-- Version du serveur :  8.0.22
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `innlog`
--

-- --------------------------------------------------------

--
-- Structure de la table `sorties`
--

CREATE TABLE `sorties` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` datetime NOT NULL,
  `distance` int UNSIGNED NOT NULL,
  `speedAverage` int NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sorties`
--

INSERT INTO `sorties` (`id`, `title`, `type`, `date`, `distance`, `speedAverage`, `comment`) VALUES
(8, '', 'Vélo', '2021-09-21 18:48:27', 17, 18, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error inventore recusandae repellendus impedit esse iure iste natus neque ullam! Amet qui labore earum! Odit porro placeat fugiat sint voluptas doloremque.'),
(10, '', 'A pied', '2021-09-21 18:48:27', 3, 5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis voluptatum beatae dolore? Voluptatibus veniam dolorum quibusdam illo dolore? Quidem quisquam voluptates unde temporibus nostrum cumque officiis veniam sequi totam debitis!'),
(11, '', 'En canöé', '2021-09-21 18:48:27', 12, 6, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic exercitationem sequi beatae tempore. Quaerat dignissimos omnis magni ratione quod, a odit. Atque magni blanditiis reprehenderit numquam. Illum dolorem sequi adipisci?'),
(12, '', 'En canöé', '2021-09-21 18:48:27', 15, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis facere, facilis beatae quos eos voluptas cumque optio error rem delectus voluptatem quasi distinctio doloribus esse laudantium vero eligendi nemo ab!'),
(13, '', 'Vélo', '2021-09-21 18:48:27', 21, 16, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos debitis, dicta delectus commodi consequuntur fugiat quod. Laudantium illum veniam, libero deserunt voluptas optio corrupti ex aliquam nam eos? Quisquam, voluptate?'),
(14, '', 'A pied', '2021-09-21 18:48:27', 5, 4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad voluptas sunt, laboriosam quaerat aperiam dolorum maiores est repellat possimus necessitatibus sint accusantium voluptate perferendis eaque quos quae aliquam consectetur blanditiis.'),
(15, '', 'Vélo', '2021-09-21 18:48:27', 8, 14, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero amet expedita voluptatem veniam minima est maiores architecto, omnis illum mollitia repudiandae ab, tenetur excepturi similique esse necessitatibus corrupti repellendus iusto.'),
(28, 'la balade', 'a pied', '2021-09-23 09:43:26', 12, 5, ''),
(29, 'Rando', 'en velo', '2021-09-23 10:32:53', 8, 14, 'qsn,cxopszcdoa;opd;;op;dxopvsdfovisdfuijvuidfjui');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `password`) VALUES
(1, 'btbhtr', 'nhyrtgr'),
(5, '31', ''),
(6, '313132', ''),
(7, '$pseudo', '$password'),
(9, '31313', 'hjbjubhuibhuiiojoopjioj'),
(10, '31313ioji', 'hjbjubhuibhuiiojoopjioj'),
(11, 'Didier', 'kijsdijosioj'),
(12, 'Yann', 'kijsd,fseio,ezio'),
(13, 'Charlene', 'kijsd,fseio,ezio');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sorties`
--
ALTER TABLE `sorties`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sorties`
--
ALTER TABLE `sorties`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
