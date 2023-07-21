CREATE TABLE `myplaylandsis`.`student` (`id` INT(20) NOT NULL AUTO_INCREMENT , `student_number` VARCHAR(20) NOT NULL , `email` VARCHAR(60) NOT NULL , `password` VARCHAR(50) NOT NULL , `name` VARCHAR(30) NOT NULL , `surname` VARCHAR(30) NOT NULL , `birthdate` DATE NOT NULL , `sex` VARCHAR(25) NOT NULL , `address` VARCHAR(255) NOT NULL , `picture` VARCHAR(100) NOT NULL , `parent_name` VARCHAR(60) NOT NULL , `phone` VARCHAR(25) NOT NULL , `role` VARCHAR(20) NOT NULL , `date_of_join` DATE NOT NULL , PRIMARY KEY (`student_id`)) ENGINE = InnoDB; 


CREATE TABLE `myplaylandsis`.`teacher` (`id` INT(20) NOT NULL AUTO_INCREMENT , `email` VARCHAR(60) NOT NULL , `password` VARCHAR(60) NOT NULL , `name` VARCHAR(200) NOT NULL , `birthdate` DATE NOT NULL , `sex` VARCHAR(20) NOT NULL , `address` VARCHAR(100) NOT NULL , `phone` VARCHAR(20) NOT NULL , `date_of_join` DATE NOT NULL , `role` VARCHAR(15) NOT NULL , PRIMARY KEY (`teacher_id`)) ENGINE = InnoDB; 


CREATE TABLE `myplaylandsis`.`admin` (`id` INT(20) NOT NULL AUTO_INCREMENT , `email` VARCHAR(60) NOT NULL , `password` VARCHAR(60) NOT NULL , `name` VARCHAR(200) NOT NULL , `birthdate` DATE NOT NULL , `sex` VARCHAR(20) NOT NULL , `address` VARCHAR(100) NOT NULL , `phone` VARCHAR(20) NOT NULL , `date_of_join` DATE NOT NULL , `role` VARCHAR(15) NOT NULL , PRIMARY KEY (`admin_id`)) ENGINE = InnoDB;


CREATE TABLE `myplaylandsis`.`activities` (`activity_id` INT(20) NOT NULL AUTO_INCREMENT , `activity_num` INT(20) NOT NULL , `activity_name` VARCHAR(50) NOT NULL , `activity_desc` VARCHAR(255) NOT NULL , `activity_score` INT(20) NOT NULL , `activity_total_pts` INT(20) NOT NULL , `teacher_feedback` VARCHAR(255) NOT NULL , `parent_feedback` VARCHAR(255) NOT NULL , `subject_id` INT(20) NOT NULL , `student_id` INT(20) NOT NULL , PRIMARY KEY (`activity_id`)) ENGINE = InnoDB; 


CREATE TABLE `myplaylandsis`.`subjects` (`subject_id` INT(20) NOT NULL AUTO_INCREMENT , `subject_code` VARCHAR(20) NOT NULL , `subject_name` VARCHAR(50) NOT NULL , PRIMARY KEY (`subject_id`)) ENGINE = InnoDB; 