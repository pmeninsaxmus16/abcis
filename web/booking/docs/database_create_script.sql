SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `booking_db` ;
CREATE SCHEMA IF NOT EXISTS `booking_db` DEFAULT CHARACTER SET utf8 ;
USE `booking_db` ;

-- -----------------------------------------------------
-- Table `booking_db`.`resource_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`resource_category` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`resource_category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(85) NOT NULL ,
  `description` VARCHAR(150) NULL ,
  `created_date` TIMESTAMP NOT NULL DEFAULT now() ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `booking_db`.`resource`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`resource` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`resource` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(85) NOT NULL ,
  `description` VARCHAR(150) NULL ,
  `category_id` INT NOT NULL ,
  `quantity` INT NOT NULL DEFAULT 1 ,
  `time_before_booking` TIME NOT NULL DEFAULT '00:00:00' ,
  `is_active` ENUM('t','f') NOT NULL DEFAULT 't' ,
  `created_date` TIMESTAMP NOT NULL DEFAULT now() ,
  PRIMARY KEY (`id`) ,
  INDEX `category_resource_fkey` (`category_id` ASC) ,
  CONSTRAINT `category_resource_fkey`
    FOREIGN KEY (`category_id` )
    REFERENCES `booking_db`.`resource_category` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `booking_db`.`section`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`section` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`section` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(85) NOT NULL ,
  `description` VARCHAR(150) NULL ,
  `created_date` TIMESTAMP NOT NULL DEFAULT now() ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `booking_db`.`room`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`room` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`room` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(85) NOT NULL ,
  `description` VARCHAR(150) NULL ,
  `section_id` INT NOT NULL ,
  `created_date` TIMESTAMP NOT NULL DEFAULT now() ,
  PRIMARY KEY (`id`) ,
  INDEX `section_fkey` (`section_id` ASC) ,
  CONSTRAINT `section_fkey`
    FOREIGN KEY (`section_id` )
    REFERENCES `booking_db`.`section` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `booking_db`.`link_resource_room`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`link_resource_room` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`link_resource_room` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `resource_id` INT NOT NULL ,
  `room_id` INT NOT NULL ,
  `created_date` TIMESTAMP NOT NULL DEFAULT now() ,
  PRIMARY KEY (`id`) ,
  INDEX `lnk_resource_fkey` (`resource_id` ASC) ,
  INDEX `lnk_room_fkey` (`room_id` ASC) ,
  CONSTRAINT `lnk_resource_fkey`
    FOREIGN KEY (`resource_id` )
    REFERENCES `booking_db`.`resource` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `lnk_room_fkey`
    FOREIGN KEY (`room_id` )
    REFERENCES `booking_db`.`room` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `booking_db`.`link_resource_admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`link_resource_admin` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`link_resource_admin` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `resource_id` INT NOT NULL ,
  `owner` VARCHAR(8) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL DEFAULT now() ,
  PRIMARY KEY (`id`) ,
  INDEX `lnk_resource_room_fkey` (`resource_id` ASC) ,
  CONSTRAINT `lnk_resource_room_fkey`
    FOREIGN KEY (`resource_id` )
    REFERENCES `booking_db`.`resource` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `booking_db`.`timetable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`timetable` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`timetable` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(85) NOT NULL ,
  `nickname` VARCHAR(35) NOT NULL ,
  `description` VARCHAR(150) NULL ,
  `start_time` TIME NOT NULL DEFAULT '00:00:00' ,
  `end_date` TIME NOT NULL DEFAULT '00:00:00' ,
  `created_date` TIMESTAMP NOT NULL DEFAULT now() ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `booking_db`.`bookingheader`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`bookingheader` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`bookingheader` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `subject` VARCHAR(85) NOT NULL ,
  `location` INT NOT NULL DEFAULT -1 ,
  `description` VARCHAR(150) NULL ,
  `owner` VARCHAR(8) NOT NULL ,
  `is_active` ENUM('t','f') NOT NULL DEFAULT 't' ,
  `ip` VARCHAR(15) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL DEFAULT now() ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `booking_db`.`bookingchild`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`bookingchild` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`bookingchild` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `booking_id` INT NOT NULL ,
  `start_time` TIME NOT NULL DEFAULT '00:00:00' ,
  `end_date` TIME NOT NULL DEFAULT '00:00:00' ,
  `bdate` DATE NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `bookingheader_fkey` (`booking_id` ASC) ,
  CONSTRAINT `bookingheader_fkey`
    FOREIGN KEY (`booking_id` )
    REFERENCES `booking_db`.`bookingheader` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `booking_db`.`link_booking_resource`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `booking_db`.`link_booking_resource` ;

CREATE  TABLE IF NOT EXISTS `booking_db`.`link_booking_resource` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `resource_id` INT NOT NULL ,
  `booking_id` INT NOT NULL ,
  `created_date` TIMESTAMP NOT NULL DEFAULT now() ,
  PRIMARY KEY (`id`) ,
  INDEX `lnk_bresource_fkey` (`resource_id` ASC) ,
  INDEX `lnk_bbooking_fkey` (`booking_id` ASC) ,
  CONSTRAINT `lnk_bresource_fkey`
    FOREIGN KEY (`resource_id` )
    REFERENCES `booking_db`.`resource` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `lnk_bbooking_fkey`
    FOREIGN KEY (`booking_id` )
    REFERENCES `booking_db`.`bookingheader` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

grant all privileges on booking_db.* to 'booking'@'localhost' identified by '+3%3flORin' with grant option;
