SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `intranet` ;
CREATE SCHEMA IF NOT EXISTS `intranet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `intranet` ;

-- -----------------------------------------------------
-- Table `intranet`.`departements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`departements` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`departements` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  `nb_max_eleves` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nom_UNIQUE` (`nom` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`semestres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`semestres` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`semestres` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`groupes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`groupes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`groupes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  `nb_max_eleves` INT NOT NULL ,
  `semestre_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_groupes_semestres1` (`semestre_id` ASC) ,
  CONSTRAINT `fk_groupes_semestres1`
    FOREIGN KEY (`semestre_id` )
    REFERENCES `intranet`.`semestres` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'classes (A1, A2, B1, B2…)' ;


-- -----------------------------------------------------
-- Table `intranet`.`libelle_modules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`libelle_modules` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`libelle_modules` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`modules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`modules` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`modules` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `abreviation` VARCHAR(255) NOT NULL ,
  `description` TEXT NOT NULL ,
  `volume_horaire` INT NOT NULL ,
  `coefficient` INT NOT NULL ,
  `libelle_module_id` INT NOT NULL ,
  `semestre_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_modules_libelle_modules1` (`libelle_module_id` ASC) ,
  INDEX `fk_modules_semestres1` (`semestre_id` ASC) ,
  CONSTRAINT `fk_modules_libelle_modules1`
    FOREIGN KEY (`libelle_module_id` )
    REFERENCES `intranet`.`libelle_modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modules_semestres1`
    FOREIGN KEY (`semestre_id` )
    REFERENCES `intranet`.`semestres` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'AP1, AP2, ASR-4, ...' ;


-- -----------------------------------------------------
-- Table `intranet`.`type_modules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`type_modules` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`type_modules` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  `nb_max_eleves` INT NOT NULL ,
  `departement_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nom_UNIQUE` (`nom` ASC) ,
  INDEX `fk_type_modules_departements` (`departement_id` ASC) ,
  CONSTRAINT `fk_type_modules_departements`
    FOREIGN KEY (`departement_id` )
    REFERENCES `intranet`.`departements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'Td, Tp, cours magistral, partiel' ;


-- -----------------------------------------------------
-- Table `intranet`.`statuts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`statuts` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`statuts` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`personnes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`personnes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`personnes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(80) NOT NULL ,
  `prenom` VARCHAR(80) NOT NULL ,
  `adresse` TEXT NOT NULL ,
  `date_naissance` DATE NULL ,
  `telephone` VARCHAR(10) NOT NULL ,
  `bureau` VARCHAR(45) NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `statut_id` INT NOT NULL ,
  `departement_id` INT NOT NULL ,
  `groupe_id` INT NOT NULL ,
  `mot_de_passe` VARCHAR(255) NOT NULL ,
  `login` VARCHAR(60) NOT NULL ,
  `last_login` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_professeurs_statuts1` (`statut_id` ASC) ,
  INDEX `fk_professeurs_departements1` (`departement_id` ASC) ,
  INDEX `fk_professeurs_groupes1` (`groupe_id` ASC) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  CONSTRAINT `fk_professeurs_statuts1`
    FOREIGN KEY (`statut_id` )
    REFERENCES `intranet`.`statuts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professeurs_departements1`
    FOREIGN KEY (`departement_id` )
    REFERENCES `intranet`.`departements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professeurs_groupes1`
    FOREIGN KEY (`groupe_id` )
    REFERENCES `intranet`.`groupes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`modules_personnes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`modules_personnes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`modules_personnes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `module_id` INT NOT NULL ,
  `personne_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_modules_has_professeurs_professeurs1` (`personne_id` ASC) ,
  INDEX `fk_modules_has_professeurs_modules1` (`module_id` ASC) ,
  CONSTRAINT `fk_modules_has_professeurs_modules1`
    FOREIGN KEY (`module_id` )
    REFERENCES `intranet`.`modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modules_has_professeurs_professeurs1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`modules_type_modules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`modules_type_modules` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`modules_type_modules` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `module_id` INT NOT NULL ,
  `type_module_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_modules_has_type_modules_type_modules1` (`type_module_id` ASC) ,
  INDEX `fk_modules_has_type_modules_modules1` (`module_id` ASC) ,
  CONSTRAINT `fk_modules_has_type_modules_modules1`
    FOREIGN KEY (`module_id` )
    REFERENCES `intranet`.`modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modules_has_type_modules_type_modules1`
    FOREIGN KEY (`type_module_id` )
    REFERENCES `intranet`.`type_modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`documents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`documents` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`documents` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  `personne_id` INT NOT NULL ,
  `module_id` INT NOT NULL ,
  `type_mime` VARCHAR(70) NOT NULL ,
  `date_ajout` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_documents_professeurs1` (`personne_id` ASC) ,
  INDEX `fk_documents_modules1` (`module_id` ASC) ,
  CONSTRAINT `fk_documents_professeurs1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_documents_modules1`
    FOREIGN KEY (`module_id` )
    REFERENCES `intranet`.`modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`messages` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`messages` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titre` VARCHAR(80) NOT NULL ,
  `date_envoi` DATETIME NOT NULL ,
  `fichier` VARCHAR(100) NOT NULL ,
  `personne_id` INT NOT NULL COMMENT 'expéditeur' ,
  `destinataire_id` INT NOT NULL COMMENT 'destinataire du message' ,
  `supprime_dest` INT NOT NULL DEFAULT 0 ,
  `supprime_exp` INT NOT NULL DEFAULT 0 ,
  `lu_dest` INT NOT NULL DEFAULT 0 ,
  `lu_exp` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_messages_personnes1` (`personne_id` ASC) ,
  CONSTRAINT `fk_messages_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`absences`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`absences` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`absences` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `date` DATETIME NOT NULL ,
  `justification` VARCHAR(255) NOT NULL ,
  `personne_id` INT(255) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_abscences_personnes1` (`personne_id` ASC) ,
  CONSTRAINT `fk_abscences_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`type_evenements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`type_evenements` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`type_evenements` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`evenements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`evenements` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`evenements` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titre` VARCHAR(35) NOT NULL ,
  `date_debut` DATETIME NOT NULL ,
  `date_fin` DATETIME NOT NULL ,
  `type_evenement_id` INT NOT NULL ,
  `personne_id` INT NOT NULL ,
  `description` TEXT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_evenements_type_evenements1` (`type_evenement_id` ASC) ,
  INDEX `fk_evenements_personnes1` (`personne_id` ASC) ,
  CONSTRAINT `fk_evenements_type_evenements1`
    FOREIGN KEY (`type_evenement_id` )
    REFERENCES `intranet`.`type_evenements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evenements_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`evenements_personnes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`evenements_personnes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`evenements_personnes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `evenement_id` INT NOT NULL ,
  `personne_id` INT NOT NULL ,
  INDEX `fk_evenements_has_personnes_personnes1` (`personne_id` ASC) ,
  INDEX `fk_evenements_has_personnes_evenements1` (`evenement_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_evenements_has_personnes_evenements1`
    FOREIGN KEY (`evenement_id` )
    REFERENCES `intranet`.`evenements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evenements_has_personnes_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`stages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`stages` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`stages` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `entreprise` VARCHAR(20) NOT NULL ,
  `ville` VARCHAR(20) NOT NULL ,
  `description` TEXT NOT NULL ,
  `dispo` TINYINT(1)  NOT NULL ,
  `departements_id` INT NOT NULL ,
  `date_ajout` DATETIME NOT NULL ,
  `document` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_offres_stage_departements1` (`departements_id` ASC) ,
  CONSTRAINT `fk_offres_stage_departements1`
    FOREIGN KEY (`departements_id` )
    REFERENCES `intranet`.`departements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`documents_stages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`documents_stages` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`documents_stages` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(45) NOT NULL ,
  `personne_id` INT NOT NULL ,
  `categorie` VARCHAR(45) NOT NULL ,
  `date_ajout` DATETIME NOT NULL ,
  `type_mime` VARCHAR(70) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_documents_stages_personnes1` (`personne_id` ASC) ,
  CONSTRAINT `fk_documents_stages_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`notes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`notes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`notes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `personne_id` INT NOT NULL ,
  `type_module_id` INT NOT NULL ,
  `module_id` INT NOT NULL ,
  `note` FLOAT NOT NULL ,
  `coefficient` INT NOT NULL ,
  INDEX `fk_notes_personnes1` (`personne_id` ASC) ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_notes_type_modules1` (`type_module_id` ASC) ,
  INDEX `fk_notes_modules1` (`module_id` ASC) ,
  CONSTRAINT `fk_notes_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notes_type_modules1`
    FOREIGN KEY (`type_module_id` )
    REFERENCES `intranet`.`type_modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notes_modules1`
    FOREIGN KEY (`module_id` )
    REFERENCES `intranet`.`modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`pages_statiques`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`pages_statiques` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`pages_statiques` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `contenu` LONGTEXT NOT NULL ,
  `titre` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`documents_statiques`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`documents_statiques` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`documents_statiques` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  `type_mime` VARCHAR(70) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`pages_statiques_documents_statiques`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`pages_statiques_documents_statiques` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`pages_statiques_documents_statiques` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `pages_statique_id` INT NOT NULL ,
  `documents_statique_id` INT NOT NULL ,
  INDEX `fk_pages_statiques_has_documents_statiques_documents_statiques1` (`documents_statique_id` ASC) ,
  INDEX `fk_pages_statiques_has_documents_statiques_pages_statiques1` (`pages_statique_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_pages_statiques_has_documents_statiques_pages_statiques1`
    FOREIGN KEY (`pages_statique_id` )
    REFERENCES `intranet`.`pages_statiques` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pages_statiques_has_documents_statiques_documents_statiques1`
    FOREIGN KEY (`documents_statique_id` )
    REFERENCES `intranet`.`documents_statiques` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
