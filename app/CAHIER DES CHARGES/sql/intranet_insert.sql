-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 20 Décembre 2011 à 17:39
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `intranet`
--
USE `intranet`;

--
-- Vidage des tables 
--

TRUNCATE TABLE `documents`;
TRUNCATE TABLE `notes`;
TRUNCATE TABLE `modules_personnes`;
TRUNCATE TABLE `modules`;
TRUNCATE TABLE `libelle_modules`;
TRUNCATE TABLE `evenements_personnes`;
TRUNCATE TABLE `evenements`;
TRUNCATE TABLE `type_evenements`;
TRUNCATE TABLE `documents_stages`;
TRUNCATE TABLE `absences`;
TRUNCATE TABLE `personnes`;
TRUNCATE TABLE `groupes`;
TRUNCATE TABLE `statuts`;
TRUNCATE TABLE `semestres`;
TRUNCATE TABLE `departements`;

--
-- Contenu de la table `departements`
--

INSERT INTO `departements` VALUES(1, 'Informatique', 300, 'informatique', 'info');
INSERT INTO `departements` VALUES(2, 'Carrières juridique', 200, 'carrieres-juridique', 'CJ');

--
-- Contenu de la table `semestres`
--

INSERT INTO `semestres` VALUES(1, 'Semestre 1');
INSERT INTO `semestres` VALUES(2, 'Semestre 2d');
INSERT INTO `semestres` VALUES(3, 'Semestre 3');
INSERT INTO `semestres` VALUES(4, 'Semestre 4');
INSERT INTO `semestres` VALUES(5, 'Semestre 1d');
INSERT INTO `semestres` VALUES(6, 'semestre 3d');
INSERT INTO `semestres` VALUES(7, 'semestre 4d');
INSERT INTO `semestres` VALUES(8, 'Année spéciale');
INSERT INTO `semestres` VALUES(9, 'Licence Professionnelle');

--
-- Contenu de la table `statuts`
--

INSERT INTO `statuts` VALUES(1, 'Lecteur');
INSERT INTO `statuts` VALUES(10, 'Eleve');
INSERT INTO `statuts` VALUES(20, 'Professeur');
INSERT INTO `statuts` VALUES(30, 'Administrateur');

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` VALUES(1, 'A1', 15, 1);
INSERT INTO `groupes` VALUES(3, 'A1', 15, 2);
INSERT INTO `groupes` VALUES(4, 'A2', 15, 2);
INSERT INTO `groupes` VALUES(5, 'Enseignants', 100, 1);
INSERT INTO `groupes` VALUES(6, 'Administrateurs', 100, 1);
INSERT INTO `groupes` VALUES(7, 'B1', 20, 1);
INSERT INTO `groupes` VALUES(9, 'C1', 10, 1);
INSERT INTO `groupes` VALUES(10, 'Sans', 1000, 1);

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` VALUES(3, 'ADMIN', 'Administrateur', 'administrateur', '2008-11-12', '0101010101', 'admin@admin.ad', 30, 1, 6, '8055d7dc075c825fe6511bb16cd78fc94a7d8d66', 'admin', '2011-12-20 17:00:49');
INSERT INTO `personnes` VALUES(5, 'ADMIN2', 'Admin', '10', '1981-01-01', '0101010101', 'admin@admin.ad', 30, 2, 1, '8055d7dc075c825fe6511bb16cd78fc94a7d8d66', 'admin2a', '0000-00-00 00:00:00');
INSERT INTO `personnes` VALUES(7, 'eleve', 'eleve', 'aze', '1981-01-01', '0101010101', 'eleve@eleve.el', 10, 1, 1, '2429035a4c60f2b59a9ea9c0658a0c08cf5c90a8', 'eleve', '2011-12-20 16:46:56');
INSERT INTO `personnes` VALUES(8, 'PROF', 'Prof', '10', '1981-01-22', '0101010101', 'prof@prof.pro', 20, 1, 3, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'prof', '2011-12-20 16:35:30');
INSERT INTO `personnes` VALUES(9, 'ELEVE2', 'Eleve', '123', '1981-01-01', '0101010101', 'eleve@eleve.el', 10, 1, 3, '2429035a4c60f2b59a9ea9c0658a0c08cf5c90a8', 'eleve2', '2011-12-20 08:40:33');
INSERT INTO `personnes` VALUES(10, 'PROF2', 'Prof', '123', '1981-01-08', '0101010101', 'prof@prof.pro', 20, 1, 5, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'prof2', '2011-12-20 09:48:05');

--
-- Contenu de la table `absences`
--

INSERT INTO `absences` VALUES(1, '2011-12-18 00:00:00', 'aze', 7);

--
-- Contenu de la table `documents_stages`
--

INSERT INTO `documents_stages` VALUES(4, '007.jpg', 'stages-offres', '2011-12-16 12:12:29', 'image/jpeg');
INSERT INTO `documents_stages` VALUES(8, 'CV-fr.pdf', 'stages-utiles', '2011-12-16 15:01:49', 'application/pdf');
INSERT INTO `documents_stages` VALUES(12, 'cell-phone.png', 'stages-utiles', '2011-12-16 15:01:58', 'image/png');

--
-- Contenu de la table `type_evenements`
--

INSERT INTO `type_evenements` VALUES(1, 'Réunion');
INSERT INTO `type_evenements` VALUES(2, 'Convocation');
INSERT INTO `type_evenements` VALUES(3, 'Soirée');

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` VALUES(3, 'Noël', '2011-12-25 00:00:00', '2011-12-25 00:00:00', 3);

--
-- Contenu de la table `evenements_personnes`
--

INSERT INTO `evenements_personnes` VALUES(23, 3, 5);
INSERT INTO `evenements_personnes` VALUES(24, 3, 9);
INSERT INTO `evenements_personnes` VALUES(25, 3, 8);

--
-- Contenu de la table `libelle_modules`
--

INSERT INTO `libelle_modules` VALUES(1, 'Algorithmique et programmation');
INSERT INTO `libelle_modules` VALUES(2, 'Architectures, systèmes et réseaux');
INSERT INTO `libelle_modules` VALUES(3, 'Outils et modèles du génie logiciel');
INSERT INTO `libelle_modules` VALUES(4, 'Mathématiques');
INSERT INTO `libelle_modules` VALUES(5, 'Expression et communication');
INSERT INTO `libelle_modules` VALUES(6, 'Economie et gestion des organisations');

--
-- Contenu de la table `modules`
--

INSERT INTO `modules` VALUES(1, 'AP1', 'Initiation à l''algorithmique', 20, 20, 1, 1);
INSERT INTO `modules` VALUES(2, 'AP2', 'Algorithmique et structures de données statiques', 20, 20, 1, 2);
INSERT INTO `modules` VALUES(3, 'ASR1', 'Comprendre et utiliser un système d''exploitation et un réseau', 20, 30, 2, 2);
INSERT INTO `modules` VALUES(4, 'ASR2', 'Architecture - codages et circuits logiques\r\n\r\n', 56, 900, 2, 1);
INSERT INTO `modules` VALUES(5, 'test', 'aze', 30, 30, 1, 1);
INSERT INTO `modules` VALUES(6, 'teste', 'aze', 120, 12, 1, 1);

--
-- Contenu de la table `modules_personnes`
--

INSERT INTO `modules_personnes` VALUES(1, 2, 8);
INSERT INTO `modules_personnes` VALUES(2, 4, 8);
INSERT INTO `modules_personnes` VALUES(3, 5, 8);

--
-- Contenu de la table `notes`
--
INSERT INTO `notes` VALUES(1, 7, 1, 20);
INSERT INTO `notes` VALUES(2, 7, 5, 10);

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` VALUES(1, 'CV-en.pdf', 8, 1, '2011-12-19 22:39:20');
INSERT INTO `documents` VALUES(2, 'CV-fr.pdf', 8, 3, '2011-12-19 22:46:34');