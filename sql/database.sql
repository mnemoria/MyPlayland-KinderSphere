// TABLES

CREATE TABLE `myplaylandsis`.`activity_info` (`id` INT(20) NOT NULL AUTO_INCREMENT , `activity_num` INT(20) NOT NULL , `activity_name` VARCHAR(50) NOT NULL , `activity_desc` VARCHAR(255) NOT NULL , `activity_score` INT(20) NOT NULL , `activity_total_pts` INT(20) NOT NULL , `teacher_feedback` VARCHAR(255) NOT NULL , `parent_feedback` VARCHAR(255) NOT NULL , `date` DATE NOT NULL , `student_id` INT(20) NOT NULL , `subject_id` INT(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `myplaylandsis`.`user_message` (`id` INT(20) NOT NULL AUTO_INCREMENT , `incoming_id` INT(20) NOT NULL , `outgoing_id` INT(20) NOT NULL , `messages` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 



// FOREIGN KEYS

ALTER TABLE `activity_info` ADD FOREIGN KEY (`subject_id`) REFERENCES `subject_info`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 

ALTER TABLE `activity_info` ADD FOREIGN KEY (`student_id`) REFERENCES `student_info`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 



