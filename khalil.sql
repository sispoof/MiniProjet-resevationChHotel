-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 29 sep. 2020 à 18:33
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `khalil`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_ch` int(10) UNSIGNED NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prix` varchar(30) NOT NULL,
  `path` varchar(300) DEFAULT NULL,
  `code_chambre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_ch`, `title`, `description`, `prix`, `path`, `code_chambre`) VALUES
(1, 'chambre simple individuelle ', 'une chambre pour une personne, avec un lit simple. Selon le standard de l\'hotel, la zone residentielle peut varier de 8 a 14 metre carre .', '70,5', 'img\\chambre\\chambre-simple-indi.jpg', '1111'),
(2, 'chambre double individuelle', 'est une chambre avec deux lits, concue pour une personne.', '120', 'img\\chambre\\chambre-double-1pers.jpg', '5555'),
(3, 'chambre double deux personnes', 'c\'est une chambre conçue pour 2 personnes. Elle se caracterise par la presence de deux lits simples. Le terme « twin » sera egalement utilise pour les chambres à plusieurs lits avec un plus grand nombre pair de lits simples.', '150', 'img\\chambre\\chambre-double-2personne.jpg', '91011'),
(4, 'Chambre triple', 'une chambre pour trois personnes, généralement avec trois lits simples,', '250', 'img\\chambre\\chambre-fam2.jpg', '54545');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_event` int(10) UNSIGNED NOT NULL,
  `Title` varchar(120) NOT NULL,
  `description` varchar(600) NOT NULL,
  `img` varchar(300) NOT NULL,
  `date_eve` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id_event`, `Title`, `description`, `img`, `date_eve`) VALUES
(1, 'Thour 3am el mouldi', 'kima w3ednakom eb a9wa event fel tari5 \"thour 3am el Mouldi\" \r\nmar7ba bel jami3 w brabbi maghir ma tjibou ma5cher w zoghzogh \r\nkil 3ad chikoun etma5mi5 mawjoud:\r\n-10:00 Ftour sbe7\r\n-12:00 ftour nos nhar\r\n-21:00 3ché w chrab w 97ab \r\nw rabbi y5alilna bachoulet 3am el mouldi', 'img/events/events.jpg', '2020-05-06'),
(2, 'tlé9 monia loubéna ', 'kima bech ykoun 3anna ba3d el event ta3 thour 3am el mouldi chikoun 3anna tlé9 monia loubéna ba3 ma tanket hia w rajelha 5ater gharet men same7 chekléy 5ater rajelha 3am el mouldi chya3mel 7afla fel outel te3na ye5i 3amlet bel 3néd m3ah w chta3mel 7afla ..\r\nkounou fel maw3ed w tajmou tjibou zoghzogh', 'img/events/events1.jpg', '2020-05-11'),
(3, '7aflet Mohsen Ghabra', '3mna mohsen ghabra charek w rba7 fel promosport 20.000 rabbi yzidou y7eb yosrfhom fel chrab w chi5a w betbi3a kol mahou monkar te9awah 3anna el mouhem bar7bé bikom kol w kil3ada zoghzogh zeda ema manech mas2oulin 3alli chya3mlou fihom Mohsen ghabra ken karraz 3adi ydawwarha tfara ', 'img/events/events2.jpg', '2020-05-20'),
(4, 'gaming event', 'el event te3na chikoun nhar el 5mis 14:00 jibou talifounetkom  w mcharjin famma tournoi ta3 jbouret el free fire \r\nmar7bé \r\nkil3ada mar7bé 7atta bel zoghzogh deja el event mayjiwah ken zoghzogh', 'img/events/events3.jpg', '2020-05-27');

-- --------------------------------------------------------

--
-- Structure de la table `participations`
--

CREATE TABLE `participations` (
  `id_participation` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_event` int(10) UNSIGNED NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `participations`
--

INSERT INTO `participations` (`id_participation`, `id_user`, `id_event`, `etat`) VALUES
(23, 1, 1, 1),
(24, 1, 2, 1),
(25, 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ch` int(10) UNSIGNED NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_ch` int(10) UNSIGNED NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `id_user`, `id_ch`, `etat`) VALUES
(5, 2, 1, 1),
(6, 2, 2, 1),
(17, 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `title`) VALUES
(4, 'coupure d\'eau'),
(5, 'manque de manchfa '),
(6, 'manque de ftour sbe7'),
(7, 'jib do5an fi yeddek'),
(8, 'coupure d\'électricité');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`) VALUES
(1, 'admin', 'admin'),
(2, 'ahmed', 'ahmed');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_ch`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `participations`
--
ALTER TABLE `participations`
  ADD PRIMARY KEY (`id_participation`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_event` (`id_event`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recfkch` (`id_ch`),
  ADD KEY `recfkser` (`id_service`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `fk_ch` (`id_ch`),
  ADD KEY `fk_user` (`id_user`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_ch` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `participations`
--
ALTER TABLE `participations`
  MODIFY `id_participation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participations`
--
ALTER TABLE `participations`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `recfkch` FOREIGN KEY (`id_ch`) REFERENCES `chambre` (`id_ch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recfkser` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_ch` FOREIGN KEY (`id_ch`) REFERENCES `chambre` (`id_ch`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
