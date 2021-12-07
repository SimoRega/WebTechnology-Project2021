-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema blogtw
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blogtw
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `camper` DEFAULT CHARACTER SET utf8 ;
USE `camper` ;

-- -----------------------------------------------------
-- Table `blogtw`.`autore`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `camper`.`accessori` (
  `idAccessorio` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `prezzo` FLOAT(24) NOT NULL,
  `descrizione` MEDIUMTEXT NOT NULL,
  `img` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idAccessorio`))
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
