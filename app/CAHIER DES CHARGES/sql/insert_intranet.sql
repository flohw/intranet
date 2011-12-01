-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 30 Novembre 2011 à 13:26
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
-- Contenu de la table `abscences`
--


--
-- Contenu de la table `departements`
--
-- Contenu de la table `documents`
--


--
-- Contenu de la table `dossiers`
--


--
-- Contenu de la table `evenements`
--


--
-- Contenu de la table `evenements_personnes`
--


--
-- Contenu de la table `groupes`
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
-- Contenu de la table `messages`
--

--
-- Contenu de la table `modules`
--

INSERT INTO `modules` (`id`, `abreviation`, `description`, `coefficient`, `volume_horaire`, `libelle_module_id`, `semestre_id`) VALUES
(1, 'AP1', 'Initiation à l''algorithmique', 20, 20, 1, 1),
(2, 'AP2', 'Algorithmique et structures de données statiques', 20, 20, 1, 1),
(3, 'ASR1', 'Comprendre et utiliser un système d''exploitation et un réseau', 20, 30, 2, 1),
(4, 'ASR2', 'Architecture - codages et circuits logiques\r\n\r\n', 56, 900, 2, 1);

--
-- Contenu de la table `modules_personnes`
--


--
-- Contenu de la table `modules_type_modules`
--


--
-- Contenu de la table `personnes`
--
-- Contenu de la table `semestres`
--

--
-- Contenu de la table `statuts`
--

--
-- Contenu de la table `type_evenements`
--

--
-- Contenu de la table `type_modules`
--

