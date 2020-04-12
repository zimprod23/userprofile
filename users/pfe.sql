-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 avr. 2020 à 19:35
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `ID` int(15) NOT NULL,
  `PPR` int(15) NOT NULL,
  `_PUB_NAME` varchar(100) NOT NULL,
  `_PUB_FNAME` varchar(100) NOT NULL,
  `_TITLE` varchar(100) NOT NULL,
  `_BRANCHE` varchar(100) NOT NULL,
  `_SEMESTER` varchar(10) NOT NULL,
  `_TYPE` varchar(100) NOT NULL,
  `_DESCRIPTION` varchar(250) NOT NULL,
  `_COURSE_PATH` varchar(100) NOT NULL,
  `_RELEASE_DATE` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`ID`, `PPR`, `_PUB_NAME`, `_PUB_FNAME`, `_TITLE`, `_BRANCHE`, `_SEMESTER`, `_TYPE`, `_DESCRIPTION`, `_COURSE_PATH`, `_RELEASE_DATE`) VALUES
(11, 18, 'zimpr', 'zimpr', 'fwgetr', 'gretrbnh', 'gregegre', 'gregregre', 'djiosahfioewj fewiofnewonfoepwjfpoweinfioewnfopewfopewnfiewo', './courses/20180505213334_create_user.js', '2020-04-11'),
(21, 18, 'zimpr', 'zimpr', 'test', 'DAI', 'S1', 'media', 'msmnalkcnlksa', './courses/Admincnx.php', '2020-04-11'),
(22, 18, 'zimpr', 'zimpr', 'lalalala', 'DAI', 'S1', 'media', 'nkdlcsanlkcnklsacsa', './courses/bg.svg', '2020-04-11'),
(26, 18, 'zimpr', 'zimpr', 'csharp', 'DAI', 'S1', 'document', 'ccc', './courses/busness.jpeg', '2020-04-11'),
(28, 18, 'zimpr', 'zimpr', 'cs', 'DAI', 'S1', 'document', 'console.log()', './courses/Home.php', '2020-04-11'),
(31, 18, 'zimpr', 'zimpr', 'obj c', 'DAI', 'S4', 'document', 'description', './courses/mail.php', '2020-04-11'),
(32, 31, 'allal', 'allal', 'allal', 'ASR', 'S2', 'document', 'bbbbbb', './courses/opera_autoupdate.log', '2020-04-11'),
(33, 18, 'zimpr', 'zimpr', 'kalicci', 'TEC', 'S2', 'document', 'jajaja', './courses/Formation.css', '2020-04-11'),
(34, 18, 'zimpr', 'zimpr', 'python', 'DAI', 'S1', 'media', 'nn', './courses/TP11.zip', '2020-04-11'),
(35, 18, 'zimpr', 'zimpr', 'php', 'DAI', 'S1', 'media', 'hh', './courses/TP11.rar', '2020-04-11'),
(36, 38, 'zimppr', 'zimppr', 'c++', 'ASR', 'S2', 'document', 'ciewhnfio', './courses/api-ms-win-core-console-l1-1-0.dll', '2020-04-11'),
(37, 18, 'zimpr', 'zimpr', 'c++', 'DAI', 'S1', 'zipped', 'hello', './courses/ForgotPasswordSystemIn2018.zip', '2020-04-11');

-- --------------------------------------------------------

--
-- Structure de la table `superuser`
--

CREATE TABLE `superuser` (
  `PPR` int(15) NOT NULL,
  `_NAME` varchar(100) NOT NULL,
  `_FNAME` varchar(100) NOT NULL,
  `_USERNAME` varchar(100) NOT NULL,
  `_EMAIL` varchar(100) NOT NULL,
  `_PASSWORD` varchar(100) NOT NULL,
  `_PIC_PATH` varchar(100) DEFAULT NULL,
  `_DESCRIPTION` varchar(250) DEFAULT 'system manager'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `superuser`
--

INSERT INTO `superuser` (`PPR`, `_NAME`, `_FNAME`, `_USERNAME`, `_EMAIL`, `_PASSWORD`, `_PIC_PATH`, `_DESCRIPTION`) VALUES
(2, 'admin', 'admin', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', './AdminPics/pic1.jpg', 'system manager');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `PPR` int(15) NOT NULL,
  `_NAME` varchar(100) NOT NULL,
  `_FNAME` varchar(100) NOT NULL,
  `_USERNAME` varchar(100) NOT NULL,
  `_EMAIL` varchar(100) NOT NULL,
  `_PASSWORD` varchar(100) NOT NULL,
  `_PIC_PATH` varchar(100) DEFAULT NULL,
  `_DESCRIPTION` varchar(250) DEFAULT 'Professeur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`PPR`, `_NAME`, `_FNAME`, `_USERNAME`, `_EMAIL`, `_PASSWORD`, `_PIC_PATH`, `_DESCRIPTION`) VALUES
(18, 'zimpr', 'zimpr', 'zimpr', 'zimpr@gmail.com', '25f9e794323b453885f5181f1b624d0b', '../.main/pictures/info.PNG', 'Professeur'),
(20, 'aaa', 'aaa', ' aaa', 'jjjjjjjjjjjjjl@gmail.com', '202cb962ac59075b964b07152d234b70', '../.main/pictures/attack.jpg', 'Professeur'),
(21, 'jaja', 'jaja', 'jaja', 'jaja@gmail.com', 'f1920129f9c75b3d604ea4874e120736', '../.main/pictures/20200317_145348.jpg', 'Professeur'),
(22, 'kkak', 'kkak', 'kkak', 'kkak@gmail.com', '79b7cdcd14db14e9cb498f1793817d69', '../.main/pictures/20200317_145348.jpg', 'Professeur'),
(23, 'nksn', 'nkxsn', 'jxos', 'jcsjal@gmail.com', '8c919b46083068971f8ec0045a73a60c', '../.main/pictures/20200317_145228.jpg', 'Professeur'),
(25, 'nksn1', 'nkxsn1', 'jxos1', 'jcsjjnxlksal@gmail.com', '1545e945d5c3e7d9fa642d0a57fc8432', '../.main/pictures/20200317_145228.jpg', 'Professeur'),
(26, '   ', '   ', '   ', 'jcsjjnxll@gmail.com', '7215ee9c7d9dc229d2921a40e899ec5f', '../.main/pictures/20200317_145228.jpg', 'Professeur'),
(27, 'kakakakakka', 'kakaakkakakaka', 'lklklklklkl', 'moinawfjsnakjfnd@gmail.com', '202cb962ac59075b964b07152d234b70', '../.main/pictures/90605245_2901504419908920_839607621798330368_o.jpg', 'Professeur'),
(31, 'allal', 'allal', 'allal', 'aaafff@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '../.main/pictures/FB_IMG_15705343701681675.jpg', 'Professeur'),
(33, 'update', 'update', 'bitch', 'choukrimarouane40@gmail.com', '74b87337454200d4d33f80c4663dc5e5', '../.main/pictures/WhatsApp Image 2020-04-06 at 22.56.00.jpeg', 'Professeur'),
(36, 'must_be_updated', 'must_be_updated', 'munskqwndjk', 'sjklsanfklanklna@gmail.com', '202cb962ac59075b964b07152d234b70', '../.main/pictures/thamy.jpg', 'Professeur'),
(38, 'zimppr', 'zimppr', 'zem', 'zimproduction23@gmail.com', '7cec85c75537840dad40251576e5b757', '../.main/pictures/ed dev.PNG', 'Professeur'),
(39, 'marouane', 'choukri', 'marouane', 'marouanechoukri40@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '../.main/pictures/info.PNG', 'Professeur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PPR` (`PPR`);

--
-- Index pour la table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`PPR`),
  ADD UNIQUE KEY `_USERNAME` (`_USERNAME`),
  ADD UNIQUE KEY `_EMAIL` (`_EMAIL`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`PPR`),
  ADD UNIQUE KEY `_USERNAME` (`_USERNAME`),
  ADD UNIQUE KEY `_EMAIL` (`_EMAIL`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `superuser`
--
ALTER TABLE `superuser`
  MODIFY `PPR` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `PPR` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`PPR`) REFERENCES `user` (`PPR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
