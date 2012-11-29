CREATE SCHEMA `cleverbug` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE  TABLE IF NOT EXISTS `cleverbug`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NULL ,
  `dob` DATE NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB;

INSERT INTO `user` (`user_id`,`username`,`dob`) VALUES (1,'Saad','1978-06-09');
INSERT INTO `user` (`user_id`,`username`,`dob`) VALUES (2,'John','1976-11-28');
INSERT INTO `user` (`user_id`,`username`,`dob`) VALUES (3,'Frank','1976-11-25');
INSERT INTO `user` (`user_id`,`username`,`dob`) VALUES (4,'Suzan','1980-03-06');
INSERT INTO `user` (`user_id`,`username`,`dob`) VALUES (5,'Kris','1984-05-14');
INSERT INTO `user` (`user_id`,`username`,`dob`) VALUES (6,'Sunny','1979-10-08');