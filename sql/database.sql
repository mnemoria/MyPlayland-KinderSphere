CREATE TABLE `myplaylandsis`.`student` (`student_id` INT(10) NOT NULL , `email` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , `name` VARCHAR(200) NOT NULL , `birthdate` DATE NOT NULL , `sex` VARCHAR(25) NOT NULL , `address` VARCHAR(500) NOT NULL , `phone` VARCHAR(15) NOT NULL , `date_of_join` VARCHAR(50) NOT NULL , `parent_name` VARCHAR(200) NOT NULL , PRIMARY KEY (`student_id`)) ENGINE = InnoDB; 




CREATE TABLE `myplaylandsis`.`teacherinfo` (`teacher_id` INT(10) NOT NULL , `email` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , `name` VARCHAR(200) NOT NULL , `birthdate` DATE NOT NULL , `sex` VARCHAR(25) NOT NULL , `address` VARCHAR(500) NOT NULL , `phone` VARCHAR(15) NOT NULL , `date_of_join` VARCHAR(50) NOT NULL , PRIMARY KEY (`teacher_id`)) ENGINE = InnoDB; 




CREATE TABLE `myplaylandsis`.`admininfo` (`admin_id` INT(10) NOT NULL , `email` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , `name` VARCHAR(200) NOT NULL , `birthdate` DATE NOT NULL , `sex` VARCHAR(25) NOT NULL , `address` VARCHAR(500) NOT NULL , `phone` VARCHAR(15) NOT NULL , `date_of_join` VARCHAR(50) NOT NULL , PRIMARY KEY (`admin_id`)) ENGINE = InnoDB; 