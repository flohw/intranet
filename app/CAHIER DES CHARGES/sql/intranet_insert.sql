-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 06 Décembre 2011 à 13:33
-- Version du serveur: 5.1.53
-- Version de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `intranet`
--
--
-- Contenu de la table `libelle_modules`
--

INSERT INTO `libelle_modules` (`id`, `nom`) VALUES
(1, 'Algorithmique et programmation'),
(2, 'Architectures, systèmes et réseaux'),
(3, 'Outils et modèles du génie logiciel'),
(4, 'Mathématiques'),
(5, 'Expression et communication'),
(6, 'Economie et gestion des organisations');

--
-- Contenu de la table `modules`
--

INSERT INTO `modules` (`id`, `abreviation`, `description`, `coefficient`, `volume_horaire`, `libelle_module_id`, `semestre_id`) VALUES
(1, 'AP1', 'Initiation à l''algorithmique', 20, 20, 1, 1),
(2, 'AP2', 'Algorithmique et structures de données statiques', 20, 20, 1, 1),
(3, 'ASR1', 'Comprendre et utiliser un système d''exploitation et un réseau', 20, 30, 2, 1),
(4, 'ASR2', 'Architecture - codages et circuits logiques\r\n\r\n', 56, 900, 2, 1);

--
-- Contenu de la table `stages`
--

INSERT INTO `stages` (`id`, `entreprise`, `ville`, `description`, `dispo`, `departements_id`, `date_ajout`) VALUES
(1, 'Apple', 'New-York City', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1, '2011-12-06 14:11:34'),
(2, 'Schneider', 'Grenoble', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1, '2011-12-06 14:12:00'),
(3, 'IUT2', 'Grenoble', '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ', 0, 1, '2011-12-06 14:13:13'),
(4, 'Credit agricole', 'Lyon', 'te velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 0, 1, '2011-12-06 14:13:35');


--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id`, `nom`, `slug`, `personne_id`, `module_id`, `date_ajout`) VALUES
(1, 'Document Tes', 'doct', 1, 1, '2011-12-22 14:07:21'),
(2, 'Doc 3', 'd3', 2, 1, '2011-12-19 14:07:50');