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
TRUNCATE `notes`;
TRUNCATE `documents_stages`;
TRUNCATE `stages`;
TRUNCATE `evenements_personnes`;
TRUNCATE `evenements`;
TRUNCATE `type_evenements`;
TRUNCATE `absences`;
TRUNCATE `messages`;
TRUNCATE `documents`;
TRUNCATE `modules_type_modules`;
TRUNCATE `modules_personnes`;
TRUNCATE `personnes`;
TRUNCATE `statuts`;
TRUNCATE `type_modules`;
TRUNCATE `modules`;
TRUNCATE `libelle_modules`;
TRUNCATE `groupes`;
TRUNCATE `semestres`;
TRUNCATE `departements`;
-- Base de données: `intranet`
--

--
-- Contenu de la table `departements`
--

INSERT INTO `departements` VALUES(1, 'Informatique', 300);
INSERT INTO `departements` VALUES(2, 'Carrières juridique', 200);

--
-- Contenu de la table `semestres`
--

INSERT INTO `semestres` VALUES(1, 'Semestre 1');
INSERT INTO `semestres` VALUES(2, 'Semestre 2');
INSERT INTO `semestres` VALUES(3, 'Semestre 3');
INSERT INTO `semestres` VALUES(4, 'Semestre 4');
INSERT INTO `semestres` VALUES(5, 'Semestre 1d');
INSERT INTO `semestres` VALUES(6, 'Semestre 2d');
INSERT INTO `semestres` VALUES(7, 'semestre 3d');
INSERT INTO `semestres` VALUES(8, 'semestre 4d');
INSERT INTO `semestres` VALUES(9, 'Année spéciale');
INSERT INTO `semestres` VALUES(10, 'Licence Pro');

--
-- Contenu de la table `statuts`
--

INSERT INTO `statuts` VALUES(10, 'Eleve');
INSERT INTO `statuts` VALUES(20, 'Enseignant');
INSERT INTO `statuts` VALUES(30, 'Administrateur');

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` VALUES(1, 'A1', 15, 1);
INSERT INTO `groupes` VALUES(2, 'A2', 15, 1);
INSERT INTO `groupes` VALUES(3, 'B1', 15, 1);
INSERT INTO `groupes` VALUES(4, 'B2', 15, 1);
INSERT INTO `groupes` VALUES(5, 'C1', 15, 1);
INSERT INTO `groupes` VALUES(6, 'C2', 15, 1);
INSERT INTO `groupes` VALUES(7, 'D1', 15, 1);
INSERT INTO `groupes` VALUES(8, 'D2', 15, 1);

INSERT INTO `groupes` VALUES(9, 'A1', 15, 2);
INSERT INTO `groupes` VALUES(10, 'A2', 15, 2);
INSERT INTO `groupes` VALUES(11, 'B1', 15, 2);
INSERT INTO `groupes` VALUES(12, 'B2', 15, 2);
INSERT INTO `groupes` VALUES(13, 'C1', 15, 2);
INSERT INTO `groupes` VALUES(14, 'C2', 15, 2);
INSERT INTO `groupes` VALUES(15, 'D1', 15, 2);
INSERT INTO `groupes` VALUES(16, 'D2', 15, 2);

INSERT INTO `groupes` VALUES(17, 'Administrateurs', 15, 1);
INSERT INTO `groupes` VALUES(18, 'Enseignants', 15, 1);
--
-- Contenu de la table `personnes`
--

/*BASE*/

INSERT INTO `personnes` VALUES(1, 'ADMIN', 'Administrateur', 'administrateur', '2008-11-12', '0101010101', 'admin@admin.ad', 30, 1, 6, '8055d7dc075c825fe6511bb16cd78fc94a7d8d66', 'admin', '2011-12-20 17:00:49'); /*mdp : admin*/

INSERT INTO `personnes` VALUES(2, 'ELEVE', 'Eleve', 'aze', '1981-01-01', '0101010101', 'eleve@eleve.el', 10, 1, 1, '2429035a4c60f2b59a9ea9c0658a0c08cf5c90a8', 'eleve', '2011-12-20 16:46:56'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(3, 'PROF', 'Prof', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'prof@prof.pro', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'prof', '2011-12-20 16:35:30'); /*mdp : prof*/

/*ADMIN*/

INSERT INTO `personnes` VALUES(4, 'VASSOILE', 'Marc', '10 rue du Lac Grenoble 38000', '1980-04-12', '0664531627', 'vassoile.marc@iut2.fr', 30, 1, 17, 'ba282cee005c8d1e72ae796aadf82c8fc3a92226', 'vassoim', '2010-12-20 15:00:00'); /*mdp : vassoilm2*/

/*ELEVES*/

INSERT INTO `personnes` VALUES(5, 'PARRENO', 'Florian', '654 route de chantecler 38070 Saint Quentin Fallavier', '1991-08-12', '0678931627', 'parreno.florian@iut2.fr', 10, 1, 1, 'd935830ca42927439953aa985483b1984bea553d', 'parrenof', '2010-12-20 15:00:00'); /*mdp : floflodu38*/

INSERT INTO `personnes` VALUES(6, 'PAULI', 'Marie', '8 Allée des fleurs 38000 Grenoble', '1992-02-15', '0678934567', 'pauli.marie@iut2.fr', 10, 1, 1, '072b5a53c998070e5395dba1375c6b991699f978', 'paulim', '2010-12-20 15:00:00'); /*mdp : mushisama*/

INSERT INTO `personnes` VALUES(7, 'LANDRISCINA', 'Dorian', '12 chemin des vignes', '1992-11-25', '0675628627', 'landriscina.dorian@iut2.fr', 10, 1, 1, '22d8dd753c9dd5147623bdf0834ed8ad097639d4', 'landrisd', '2010-12-20 15:00:00'); /*mdp : dodoletombeur*/

INSERT INTO `personnes` VALUES(8, 'MISTRI', 'Aurelie', '90 rue du dauphiné 38000 Grenoble', '1992-01-28', '0789901627', 'mistri.aurelie@iut2.fr', 10, 1, 1, 'cc8b85a78285e4fbca442ef02644a06f4ea5010b', 'mistria', '2010-12-20 15:00:00'); /*mdp : fautfairequoi*/

INSERT INTO `personnes` VALUES(9, 'MONNIER', 'Alexandra', '5 rue du platane Saint Martin D\'Hères', '1992-08-29', '0623097654', 'alexandra.monnier@iut2.fr', 10, 1, 1, '50d68802aae0791bad09451d61cc39d2356fe3fe', 'monnieal', '2010-12-20 15:00:00'); /*mdp : alexlabikeuse*/

INSERT INTO `personnes` VALUES(10, 'MARTINEZ', 'Pierre Julien', '66 rue du vercors 38000 Grenoble', '1992-08-18', '0673786534', 'martinez.pierrejulien@iut2.fr', 10, 1, 1, '54c87bffe256effed7c3c7ee7bc7680e8b64b33b', 'mapierre', '2010-12-20 15:00:00'); /*mdp : legendpj*/

INSERT INTO `personnes` VALUES(11, 'LOUVETON', 'Joffrey', '38 rue Général Férrié', '1991-11-03', '0637345692', 'hello@joff.me', 10, 1, 1, '821c212bc5dcb219afea62be602c08c7754c1f2a', 'louvetoj', '2010-12-20 15:00:00');  /*mdp : jojobpm*/

/*PROFS*/

INSERT INTO `personnes` VALUES(12, 'BELKHATIR', 'Noureddine', '20 route de l\'IUT', '1981-01-22', '0101010101', 'belkhatir.nourredine@iut2.fr', 20, 1, 18, '97ab7b75e32207c0c1bc8f044a788d403f67c562', 'nourbel', '2010-12-01 15:00:00'); /*mdp : chefdep*/

INSERT INTO `personnes` VALUES(13, 'BLANCHON', 'Hervé', '20 route de l\'IUT', '1981-01-22', '0101010101', 'blanchon.herve@iut2.fr', 20, 1, 18, 'fc5e9c8431b89f5a839ca264c466dc3f43ea60bf', 'blanchonh', '2010-12-01 15:00:00'); /*mdp : vecteur*/

INSERT INTO `personnes` VALUES(14, 'BLANCO-LAINE', 'Gaëlle', '20 route de l\'IUT', '1981-01-22', '0101010101', 'blancolaine.gaelle@iut2.fr', 20, 1, 18, '715d9bf5e707a2122eba3039baa0ec35ff079406', 'blancog', '2010-12-01 15:00:00'); /*mdp : chefdeprojet*/

INSERT INTO `personnes` VALUES(15, 'BONNAUD', 'Laurent', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'bonnaud.laurent@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'bonnaudl', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(16, 'BRUNET-MANQUAT', 'Francis', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'brunetmanquat.francis@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'brunetmf', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(17, 'CARAVEL ', 'Marie-Claude', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'caravel.marieclaude@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'caravel', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(18, 'CHASTEL', 'Frédéric', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'chastel.frederic@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'chastelf', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(19, 'CHEVALLET', 'Jean-Pierre', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'chevallet.jeanpierre@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'jpchevallet', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(20, 'COAT', 'Françoise', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'coat.francoise@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'coatfr', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(21, 'COLLOMBET', 'Caryn', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'collombet.caryn@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'colloc', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(22, 'CORSET', 'Franck', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'corset.franck@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'corsetf', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(23, 'CULET', 'Annie', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'culet.annie@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'culeta', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(24, 'FONTENAS', 'Eric', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'fontenas.eric@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'fontenae', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(25, 'GATUMEL', 'Mathieu', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'gatumel.mathieu@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'gatumelm', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(26, 'GEROT', 'Cédric', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'gerot.cedric@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'gerotc', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(27, 'GOULIAN', 'Jérôme', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'goulian.jerome@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'goulianj', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(28, 'HAMON', 'Agnès', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'hamon.agnes@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'hamona', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(29, 'JOYCE', 'Laura', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'joyce.laura@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'joycel', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(30, 'LAURILLAU', 'Yann', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'laurillau.yann@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'laurilly', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(31, 'LEJEUNE', 'Anne', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'lejeune.anne@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'lejeuna', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(32, 'MARTIN', 'Philippe', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'martin.philippe@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'martinp', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(33, 'MONTANVERT', 'Annick', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'montanvert.annick@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'montana', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(34, 'PESTY', 'Sylvie', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'pesty.sylvie@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'pestys', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(35, 'RACAULT', 'Laëtitia', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'racault.laeticia@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'racaultl', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(36, 'ROISIN', 'Cécile', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'roisin.cecile@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'roisinc', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(37, 'SIMONET', 'Ana', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'simonet.ana@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'simona', '2010-12-01 15:00:00'); /*mdp : prof*/
-- Contenu de la table `absences`
--
/*
--INSERT INTO `absences` VALUES(1, '2011-12-18 00:00:00', 'aze', 7);
*/
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
/*
--INSERT INTO `evenements_personnes` VALUES(23, 3, 5);
--INSERT INTO `evenements_personnes` VALUES(24, 3, 9);
--INSERT INTO `evenements_personnes` VALUES(25, 3, 8);
*/
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
INSERT INTO `modules` VALUES(1, 'AP1', 'Initiation à l''algorithmique', 20, 200, 1, 1);
INSERT INTO `modules` VALUES(2, 'AP2', 'Algorithmique et structures de données statiques', 20, 200, 1, 1);
INSERT INTO `modules` VALUES(3, 'ASR1', 'Comprendre et utiliser un système d''exploitation et un réseau', 20, 30, 2, 1);
INSERT INTO `modules` VALUES(4, 'ASR2', 'Architecture - Codages et circuits logiques\r\n\r\n', 56, 900, 2, 1);
INSERT INTO `modules` VALUES(5, 'OMGL1', 'Base de données', 30, 300, 3, 1);
INSERT INTO `modules` VALUES(6, 'MAT1', 'Logique', 20, 120, 4, 1);
INSERT INTO `modules` VALUES(7, 'MAT2', 'Analyse - initiation', 15, 120, 4, 1);
INSERT INTO `modules` VALUES(8, 'EC1', 'Méthodologie du travail intellectuel - initiation', 5, 50, 5, 1);
INSERT INTO `modules` VALUES(9, 'LAN1', 'Anglais de communication - niveau 1', 10, 50, 5, 1);
INSERT INTO `modules` VALUES(10, 'EGO3', 'Environnement économique', 25, 120, 6, 1);
INSERT INTO `modules` VALUES(11, 'EGO4', 'Gestion de l\'entreprise', 20, 150, 6, 1);
INSERT INTO `modules` VALUES(12, 'EGO7', 'Jeu d\'entreprise', 15, 20, 6, 1);

-- Contenu de la table `modules_type_modules`
--
/*
INSERT INTO `modules_type_modules` VALUES(1, 1, 3);
INSERT INTO `modules_type_modules` VALUES(2, 1, 2);
INSERT INTO `modules_type_modules` VALUES(3, 1, 1);
INSERT INTO `modules_type_modules` VALUES(4, 2, 1);
*/
--
-- Contenu de la table `modules_personnes`
--
/*
--INSERT INTO `modules_personnes` VALUES(1, 2, 8);
--INSERT INTO `modules_personnes` VALUES(2, 4, 8);
--INSERT INTO `modules_personnes` VALUES(3, 5, 8);
*/