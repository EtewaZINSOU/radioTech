-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 28 Mai 2016 à 17:39
-- Version du serveur :  5.6.17-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `radiotech`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `nom`, `slug`) VALUES
(1, 'esport', 'esport'),
(2, 'Informatique', 'informatique'),
(3, 'Jeux', 'jeux'),
(4, 'Robotique', 'robotique'),
(5, 'Science', 'science'),
(6, 'Art', 'art');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publishedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6A2CA10CA76ED395` (`user_id`),
  KEY `IDX_6A2CA10C12469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id`, `user_id`, `category_id`, `title`, `lien`, `publishedDate`) VALUES
(2, 2, 5, 'Doc Gyneco', '86cb2413d903239243685cc7b002f753.mpga', '2016-05-26 00:10:01'),
(28, 1, 6, 'William', '2727ab6efb8615521df3cacb16019375.mpga', '2016-05-28 03:13:13'),
(31, 3, 6, 'Triller', 'f14c6fb5ccd4d75f80532474124388b6.mpga', '2016-05-28 17:15:33'),
(32, 3, 6, 'Beautiful Girls', '2d92a552bb393502ebcc9b796836f781.mpga', '2016-05-28 17:16:27'),
(33, 3, 1, 'On Ecrit Sur Les Murs', '0b57aed38fdb656b8125951d03dd0c1b.mpga', '2016-05-28 17:17:05'),
(34, 3, 3, 'Hey Mama', 'bc35086e78c1d7d03c35ffea3cc93c2b.mpga', '2016-05-28 17:17:46'),
(35, 3, 2, 'This Is Love', 'd523d051daf439f44e1c0358669956f1.mpga', '2016-05-28 17:18:40'),
(36, 5, 3, 'Triller', 'e3adffd0fb3056409d1c1f91df1290f6.mpga', '2016-05-28 17:35:13'),
(37, 5, 6, 'On Ecrit Sur Les Murs', '29e1c2e9e17ab9b7f0816e6012920916.mpga', '2016-05-28 17:36:20'),
(38, 5, 4, 'Gotta Feling', '9da73e09c823393a556016e90485d4aa.mpga', '2016-05-28 17:36:55');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `birthday` date NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `birthday`, `lastname`, `firstname`) VALUES
(1, 'etewa.zinsou@gmail.com', 'etewa.zinsou@gmail.com', 'etewa.zinsou@gmail.com', 'etewa.zinsou@gmail.com', 1, 'slg80js1vysswg0ss4ssc48wko4co80', 'ESJzuANOPTGhiq0B3fVy6pRBAYM3uw6mfFr2hjk8nE0/IV30D3y0PHEzEbdEzwE2w9NBO49zuKUPGgQyBc8Z6g==', '2016-05-28 10:48:49', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2011-02-14', 'ZINSOU', 'ETEWA EVRARD'),
(2, 'eric.dupont@gmail.com', 'eric.dupont@gmail.com', 'eric.dupont@gmail.com', 'eric.dupont@gmail.com', 1, 'hgnxuskf0qgwcockwkw0ok0gwsgkkok', 'jyglx5BI9GVKCjQ/KksSeSv4k9z0Szwc0zBW5JQrI8MEBpUCkNJ1vC2MFTYYLvoOBjX67JaZjoA6Casf4NB71Q==', '2016-05-26 00:09:13', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2016-05-26', 'Dupont Moreti', 'Eric'),
(3, 'charles@yopmail.com', 'charles@yopmail.com', 'charles@yopmail.com', 'charles@yopmail.com', 1, 'debprwjdic8cgws4ok8c4k04os4sgg0', 't9AwjtII7FdLL0U73blGsAkBXOTZSn508DCADhwkqa/KstlBBdLWq66/SHz7yayq+W1Rds3HK2Ccwd0XjmdBDg==', '2016-05-28 12:49:43', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '1902-01-01', 'Admin1', 'Charles'),
(4, 'job@gmail.com', 'job@gmail.com', 'job@gmail.com', 'job@gmail.com', 1, 'kbvs6ofjqyow08skcc8swwkksockwc8', 'ZptqVe1Jd5yPGsLDoCPZnvXnA9NJ+SZd86QOlnu29Fuy1XLlXdYmd0NeTh+v/9atxrohtkI7GvQ38OtWqU2DYQ==', '2016-05-28 11:17:47', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '1904-01-01', 'Admin2', 'Job'),
(5, 'john@yopmail.com', 'john@yopmail.com', 'john@yopmail.com', 'john@yopmail.com', 1, 'de801iq8e144c8c8g8gskw0gcsgww0k', 'DrQLsJ+8imoGEdfnPgZFPwa45Bil/1y0IUQKOuAeMPIYI66lCbo4RYBz7kVmHNsUKzQYeyXEGqG65tyNYEbQZw==', '2016-05-28 17:34:45', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1965-05-10', 'User1', 'John'),
(6, 'micky@gmail.com', 'micky@gmail.com', 'micky@gmail.com', 'micky@gmail.com', 1, '4rstdmc78rs4c0oc04w08ow4sgc808c', 'kJn5aMfjQQ615WcpUGdj5+PNCqOJXjXDjDcSEJglXoUVRWiOSpFcDZRxULjHh6EqYO25bl+iNqZCzWbA7ILjRw==', '2016-05-28 12:33:08', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1911-03-09', 'User2', 'Micky');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_6A2CA10C12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6A2CA10CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
