-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 sep. 2021 à 09:09
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mycave`
--

-- --------------------------------------------------------

--
-- Structure de la table `mywines`
--

DROP TABLE IF EXISTS `mywines`;
CREATE TABLE IF NOT EXISTS `mywines` (
  `users_id` int(11) NOT NULL,
  `wines_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`,`wines_id`),
  KEY `fk_users_has_wines_wines1_idx` (`wines_id`),
  KEY `fk_users_has_wines_users_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mywines`
--

INSERT INTO `mywines` (`users_id`, `wines_id`) VALUES
(7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) DEFAULT '0',
  `register_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo_UNIQUE` (`pseudo`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `role`, `register_date`) VALUES
(7, 'Admin', 'ac.coutoux@gmail.com', '$2y$10$HPmm7kLd4iip806.mE80J./ipqegAIJMs1pT../fIBiatXwbiPK7K', 1, '2021-09-04'),
(9, 'accx', 'acoutoux@apperture.fr', '$2y$10$LwhRL9.PI3FiyKVr9Odl4uNFdmBDK7QGzZffxn3nLsgvooVWbmEfa', 0, '2021-09-06');

-- --------------------------------------------------------

--
-- Structure de la table `wines`
--

DROP TABLE IF EXISTS `wines`;
CREATE TABLE IF NOT EXISTS `wines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `year` int(11) NOT NULL,
  `bottle` varchar(45) DEFAULT 'generic.png',
  `description` longtext NOT NULL,
  `region` varchar(70) NOT NULL,
  `country` varchar(70) NOT NULL,
  `grape` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wines`
--

INSERT INTO `wines` (`id`, `name`, `year`, `bottle`, `description`, `region`, `country`, `grape`) VALUES
(1, 'CHATEAU DE SAINT COSME', 2009, 'saint-cosme.png', 'Les arômes de fruits et d\'épices laissent entrevoir la légèreté de ce joli vin, qui accompagne parfaitement les plats de poisson.', 'Vallée du Rhône / Gigondas', 'France', 'Grenache / Syrah'),
(2, 'LAN RIOJA CRIANZA', 2006, 'lan-rioja.png', 'Un regain d\'intérêt pour les vignobles a ouvert la porte à cette excellente incursion sur le marché des vins de dessert. Léger et rebondissant, avec un soupçon de truffe noire, ce vin ne manquera pas de titiller les papilles.', 'Rioja', 'Espagne', 'Tempranillo'),
(3, 'MARGERUM SYBARITE', 2010, 'margerum.png', 'Le cachet d\'un bon Cabernet dans sa cave à vin peut maintenant être remplacé par un vin enfantin et ludique qui déborde de saveurs alléchantes de cerise noire et de réglisse. C\'est un goût qui vous transportera certainement dans le passé.', 'Côte Centrale Californie', 'USA', 'Sauvignon Blanc'),
(4, 'OWEN ROE \"EX UMBRIS\"', 2009, 'ex-umbris.png', 'Une combinaison de poivre noir et de piment jalapeno vous fera vaciller, tandis que l\'essence d\'orange vous ramènera à la réalité. Ne manquez pas\r\ncette sensation gustative primée.', 'Washington', 'USA', 'Syrah'),
(5, 'REX HILL', 2009, 'rex-hill1.png', 'On ne peut douter que ce sera le vin servi lors des remises de prix à Hollywood, car il a un pouvoir de star indéniable. Soyez les premiers à découvrir le début dont tout le monde parlera demain.', 'Oregon', 'USA', 'Pinot noir'),
(6, 'VITICCIO CLASSICO RISERVA', 2007, 'viticcio.png', 'Bien que la texture soit douce et arrondie, le corps de ce vin est plein, riche et tellement séduisant. Cette production est encore plus impressionnante lorsque l\'on prend note des tanins tendres qui laissent les papilles gustatives entièrement satisfaites.', 'Toscane', 'Italie', 'Sangiovese / Merlot'),
(7, 'CHATEAU LE DOYENNE', 2005, 'le-doyenne.png', 'Bien que dense, ce vin se démarque par sa profondeur et sa structure finement équilibrées. C\'est une expérience pour tous les sens.', 'Bordeaux', 'France', 'Merlot'),
(8, 'DOMAINE DU BOUSCAT', 2009, 'bouscat.png', 'La légère couleur dorée de ce vin dissimule la saveur vive qu\'il renferme. Véritable vin d\'été, il ne demande qu\'à être dégusté lors d\'un pique-nique dans un vignoble baigné de soleil.', 'Bordeaux', 'France', 'Merlot'),
(9, 'BLOCK NINE', 2009, 'block-nine.png', 'Avec des notes de gingembre et d\'épices, ce vin est un excellent complément aux entrées et aux desserts légers pour les fêtes de fin d\'année.', 'Californie', 'USA', 'Pinot noir'),
(10, 'DOMAINE SERENE', 2007, 'domaine-serene.png', 'Bien que subtil dans ses complexités, ce vin est sûr de plaire à un large éventail d\'amateurs. Les notes de grenade vous raviront tandis que la finale de noix complète le tableau d\'une expérience de dégustation raffinée.', 'Oregon', 'USA', 'Pinot noir'),
(11, 'BODEGA LURTON', 2011, 'lurton.png', 'De solides notes de cassis mêlées à une légère note d\'agrumes font de ce vin un produit facile à boire pour des palais variés.', 'Mendoza', 'Argentine', 'Pinot gris'),
(12, 'LES MORIZOTTE', 2009, 'marizotte.png', 'Brisant le moule des classiques, cette production surprendra et fera sans aucun doute frémir les papilles avec ses notes de café et de tabac qui s&#039;harmonisent parfaitement avec les notes plus traditionnelles. il plaira certainement à la foule de fin de soirée avec la légère poussée d&#039;adrénaline qu&#039;il apporte.', 'Bordeaux', 'Frances', 'Chardonnay'),
(26, 'BIDULE', 2021, 'generic.png', 'Un vin frais et nouveau, parfait pour l\'apéro', 'Loire', 'France', 'Saumur champigny'),
(27, 'BLABAL', 2003, '6135d7b4d947e_cellar (2).jpg', 'Blabla', 'Aquitaine', 'Frances', 'Bordeaux');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mywines`
--
ALTER TABLE `mywines`
  ADD CONSTRAINT `fk_users_has_wines_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_has_wines_wines1` FOREIGN KEY (`wines_id`) REFERENCES `wines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
