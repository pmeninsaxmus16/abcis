SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `iabcis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `iabcis` ;

-- -----------------------------------------------------
-- Table `iabcis`.`school_year`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`school_year` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `code` VARCHAR(45) NOT NULL ,
  `start_date` DATE NOT NULL ,
  `end_date` DATE NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  `next_year` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`cal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`cal` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`sections`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`sections` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `section_id` INT NULL DEFAULT NULL ,
  `weight` INT NOT NULL ,
  `is_active` ENUM('f','t') NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_main_section_idx` (`section_id` ASC) ,
  CONSTRAINT `fk_main_section`
    FOREIGN KEY (`section_id` )
    REFERENCES `iabcis`.`sections` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`cal_period`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`cal_period` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `deadline` DATE NOT NULL ,
  `cal` INT NOT NULL ,
  `section` INT NOT NULL ,
  `sy` INT NOT NULL ,
  `is_cative` ENUM('f','t' ) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cal_period_cal_idx` (`cal` ASC) ,
  INDEX `fk_cal_period_sections_idx` (`section` ASC) ,
  INDEX `fk_cal_period_school_year_idx` (`sy` ASC) ,
  CONSTRAINT `fk_cal_period_cal`
    FOREIGN KEY (`cal` )
    REFERENCES `iabcis`.`cal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cal_period_sections`
    FOREIGN KEY (`section` )
    REFERENCES `iabcis`.`sections` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cal_period_school_year`
    FOREIGN KEY (`sy` )
    REFERENCES `iabcis`.`school_year` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`bell_times`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`bell_times` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `time` TIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`school_periods`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`school_periods` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`periods_section`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`periods_section` (
  `time` INT NOT NULL ,
  `period` INT NOT NULL ,
  `section` INT NOT NULL ,
  INDEX `fk_school_periods_idx` (`period` ASC) ,
  INDEX `fk_periods_section_bell_times_idx` (`time` ASC) ,
  INDEX `fk_periods_section_sections_idx` (`section` ASC) ,
  PRIMARY KEY (`time`, `period`, `section`) ,
  CONSTRAINT `fk_periods_section_bell_times`
    FOREIGN KEY (`time` )
    REFERENCES `iabcis`.`bell_times` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_periods_section_school_periods`
    FOREIGN KEY (`period` )
    REFERENCES `iabcis`.`school_periods` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_periods_section_sections`
    FOREIGN KEY (`section` )
    REFERENCES `iabcis`.`sections` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`sadulation`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`sadulation` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`members`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`members` (
  `id_card` VARCHAR(10) NOT NULL ,
  `lastname` VARCHAR(45) NOT NULL ,
  `fistname` VARCHAR(45) NOT NULL ,
  `middlename` VARCHAR(45) NOT NULL ,
  `birthdate` DATE NULL ,
  `gender` ENUM( 'f',' m'  ) NOT NULL ,
  `place_of_birthdate` VARCHAR(45) NULL ,
  `nickname` VARCHAR(60) NULL ,
  `login` VARCHAR(50) NOT NULL ,
  `sitewide_login` VARCHAR(120) NOT NULL ,
  `status` VARCHAR(45) NOT NULL ,
  `created_date` TIMESTAMP NULL ,
  `password` VARCHAR(255) NULL ,
  `salt` VARCHAR(255) NULL ,
  `saludation` INT NULL ,
  PRIMARY KEY (`id_card`) ,
  INDEX `fk_saludation_members_idx` (`saludation` ASC) ,
  CONSTRAINT `fk_saludation_members`
    FOREIGN KEY (`saludation` )
    REFERENCES `iabcis`.`sadulation` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`addresses_type`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`addresses_type` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL COMMENT 'types:\n\n* home\n* work\n* other\n* etc\n' ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`department`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`department` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`addresses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`addresses` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `country` VARCHAR(45) NOT NULL ,
  `departament` INT NULL ,
  `city` VARCHAR(45) NOT NULL ,
  `barrio` VARCHAR(45) NOT NULL ,
  `address` VARCHAR(200) NOT NULL ,
  `addresses_type` INT NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_addresses_addresses_type_idx` (`addresses_type` ASC) ,
  INDEX `fk_addresses_department_idx` (`departament` ASC) ,
  CONSTRAINT `fk_addresses_addresses_type`
    FOREIGN KEY (`addresses_type` )
    REFERENCES `iabcis`.`addresses_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_addresses_department`
    FOREIGN KEY (`departament` )
    REFERENCES `iabcis`.`department` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`members_addresses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`members_addresses` (
  `adresses` INT NOT NULL ,
  `id_card` VARCHAR(10) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`adresses`, `id_card`) ,
  INDEX `fk_members_addresses_addresses_idx` (`adresses` ASC) ,
  INDEX `fk_members_addresses_members_idx` (`id_card` ASC) ,
  CONSTRAINT `fk_members_addresses_addresses`
    FOREIGN KEY (`adresses` )
    REFERENCES `iabcis`.`addresses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_members_addresses_members`
    FOREIGN KEY (`id_card` )
    REFERENCES `iabcis`.`members` (`id_card` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`city`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`city` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `department` INT NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_city_deparment_idx` (`department` ASC) ,
  CONSTRAINT `fk_city_deparment`
    FOREIGN KEY (`department` )
    REFERENCES `iabcis`.`department` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`id_type`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`id_type` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`members_personal_id`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`members_personal_id` (
  `id_type` INT NOT NULL ,
  `id_card` VARCHAR(10) NOT NULL ,
  `document` VARCHAR(45) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  INDEX `fk_members_personal_id_members_idx` (`id_card` ASC) ,
  INDEX `fk_members_personal_id_id_type_idx` (`id_type` ASC) ,
  PRIMARY KEY (`id_type`, `id_card`) ,
  CONSTRAINT `fk_members_personal_id_members`
    FOREIGN KEY (`id_card` )
    REFERENCES `iabcis`.`members` (`id_card` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_members_personal_id_id_type`
    FOREIGN KEY (`id_type` )
    REFERENCES `iabcis`.`id_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`bitacora`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`bitacora` (
  `id_card` VARCHAR(10) NOT NULL ,
  `operacion` VARCHAR(10) NULL ,
  `usuario` VARCHAR(45) NULL ,
  `host` VARCHAR(45) NULL ,
  `modificado` DATETIME NULL ,
  `tabla` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_card`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`tribe`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`tribe` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `created_date` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`students`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`students` (
  `id_card` VARCHAR(10) NOT NULL ,
  `tribe` INT NOT NULL ,
  `class_year` VARCHAR(45) NOT NULL ,
  INDEX `fk_students_tribe_idx` (`tribe` ASC) ,
  INDEX `fk_students_members1_idx` (`id_card` ASC) ,
  PRIMARY KEY (`id_card`) ,
  CONSTRAINT `fk_students_tribe`
    FOREIGN KEY (`tribe` )
    REFERENCES `iabcis`.`tribe` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_members1`
    FOREIGN KEY (`id_card` )
    REFERENCES `iabcis`.`members` (`id_card` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`grade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`grade` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `academic_order` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`class_year`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`class_year` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `class_year` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`sy_class`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`sy_class` (
  `class_year` INT NOT NULL ,
  `sy` INT NOT NULL ,
  `grade` INT NOT NULL ,
  INDEX `fk_sy_class_grade_idx` (`grade` ASC) ,
  INDEX `fk_sy_class_sy_idx` (`sy` ASC) ,
  INDEX `fk_sy_class_class_year_idx` (`class_year` ASC) ,
  PRIMARY KEY (`class_year`, `sy`, `grade`) ,
  CONSTRAINT `fk_sy_class_grade`
    FOREIGN KEY (`grade` )
    REFERENCES `iabcis`.`grade` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sy_class_sy`
    FOREIGN KEY (`sy` )
    REFERENCES `iabcis`.`school_year` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sy_class_class_year`
    FOREIGN KEY (`class_year` )
    REFERENCES `iabcis`.`class_year` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`media_communication`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`media_communication` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `media_type` VARCHAR(45) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`member_media_communication`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`member_media_communication` (
  `media_type` INT NOT NULL ,
  `id_card` VARCHAR(10) NOT NULL ,
  `media` VARCHAR(180) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  INDEX `fk_member_media_communications_members_idx` (`id_card` ASC) ,
  INDEX `fk_member_media_communications_media_communication_idx` (`media_type` ASC) ,
  PRIMARY KEY (`media_type`, `id_card`) ,
  CONSTRAINT `fk_member_media_communications_members`
    FOREIGN KEY (`id_card` )
    REFERENCES `iabcis`.`members` (`id_card` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_member_media_communications_media_communication`
    FOREIGN KEY (`media_type` )
    REFERENCES `iabcis`.`media_communication` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`relationship`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`relationship` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `relationship` VARCHAR(45) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`grade_sections`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`grade_sections` (
  `grade` INT NOT NULL ,
  `section` INT NOT NULL ,
  INDEX `fk_grade_section_grade_idx` (`grade` ASC) ,
  INDEX `fk_grade_sections_sections_idx` (`section` ASC) ,
  PRIMARY KEY (`grade`, `section`) ,
  CONSTRAINT `fk_grade_sections_grade`
    FOREIGN KEY (`grade` )
    REFERENCES `iabcis`.`grade` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grade_sections_sections`
    FOREIGN KEY (`section` )
    REFERENCES `iabcis`.`sections` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`position`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`position` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `primary_position` ENUM('f','t') NOT NULL ,
  `position` INT NOT NULL ,
  `section` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_position_position_idx` (`position` ASC) ,
  CONSTRAINT `fk_position_position`
    FOREIGN KEY (`position` )
    REFERENCES `iabcis`.`position` (`position` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`member_position`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`member_position` (
  `position` INT NOT NULL ,
  `id_card` VARCHAR(10) NOT NULL ,
  `primary_position` ENUM('f','t' ) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`position`, `id_card`) ,
  INDEX `fk_member_position_position_idx` (`position` ASC) ,
  INDEX `fk_member_position_memeber_idx` (`id_card` ASC) ,
  CONSTRAINT `fk_member_position_memeber`
    FOREIGN KEY (`id_card` )
    REFERENCES `iabcis`.`members` (`id_card` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_member_position_position`
    FOREIGN KEY (`position` )
    REFERENCES `iabcis`.`position` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`position_section`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`position_section` (
  `position` INT NOT NULL ,
  `section` INT NOT NULL ,
  `primary_section` ENUM('f','t') NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`position`, `section`) ,
  INDEX `fk_position_section_position_idx` (`position` ASC) ,
  INDEX `fk_position_section_sections_idx` (`section` ASC) ,
  CONSTRAINT `fk_position_section_position`
    FOREIGN KEY (`position` )
    REFERENCES `iabcis`.`position` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_position_section_sections`
    FOREIGN KEY (`section` )
    REFERENCES `iabcis`.`sections` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`groups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `group` INT NULL ,
  `weight` INT NOT NULL ,
  `created_date` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`members_groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`members_groups` (
  `group` INT NOT NULL ,
  `id_card` VARCHAR(10) NOT NULL ,
  `primary_group` ENUM(' f','t' ) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`group`, `id_card`) ,
  INDEX `fk_members_groups_groups_idx` (`group` ASC) ,
  INDEX `fk_members_groups_members_idx` (`id_card` ASC) ,
  CONSTRAINT `fk_members_groups_groups`
    FOREIGN KEY (`group` )
    REFERENCES `iabcis`.`groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_members_groups_members`
    FOREIGN KEY (`id_card` )
    REFERENCES `iabcis`.`members` (`id_card` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`members_contacts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`members_contacts` (
  `id_card` VARCHAR(10) NOT NULL ,
  `contact` VARCHAR(10) NOT NULL ,
  `relationship` INT NOT NULL ,
  `main_contact` ENUM('f','t') NOT NULL ,
  PRIMARY KEY (`id_card`, `contact`) ,
  INDEX `fk_members_contacts_members1_idx` (`id_card` ASC) ,
  INDEX `fk_members_contacts_members2_idx` (`contact` ASC) ,
  INDEX `fk_members_contacts_relationship_idx` (`relationship` ASC) ,
  CONSTRAINT `fk_members_contacts_members1`
    FOREIGN KEY (`id_card` )
    REFERENCES `iabcis`.`members` (`id_card` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_members_contacts_members2`
    FOREIGN KEY (`contact` )
    REFERENCES `iabcis`.`members` (`id_card` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_members_contacts_relationship`
    FOREIGN KEY (`relationship` )
    REFERENCES `iabcis`.`relationship` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`systems`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`systems` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `namel` VARCHAR(80) NOT NULL ,
  `created_date` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`user_role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`user_role` (
  `role` INT NOT NULL ,
  `id_card` VARCHAR(10) NOT NULL ,
  `system` INT NOT NULL ,
  PRIMARY KEY (`role`, `id_card`, `system`) ,
  INDEX `fk_user_role_roles_idx` (`role` ASC) ,
  INDEX `fk_user_role_systems_idx` (`system` ASC) ,
  INDEX `fk_user_role_members_idx` (`id_card` ASC) ,
  CONSTRAINT `fk_user_role_members`
    FOREIGN KEY (`id_card` )
    REFERENCES `iabcis`.`members` (`id_card` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_role_roles`
    FOREIGN KEY (`role` )
    REFERENCES `iabcis`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_role_systems`
    FOREIGN KEY (`system` )
    REFERENCES `iabcis`.`systems` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iabcis`.`photo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `iabcis`.`photo` (
  `id_card` VARCHAR(10) NOT NULL ,
  `photo` INT NOT NULL ,
  `weght` FLOAT NOT NULL ,
  `type` VARCHAR(15) NOT NULL ,
  `size` VARCHAR(3) NOT NULL ,
  `ip` VARCHAR(15) NULL ,
  `photoname` VARCHAR(80) NOT NULL ,
  PRIMARY KEY (`id_card`) )
ENGINE = InnoDB;

USE `iabcis` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
