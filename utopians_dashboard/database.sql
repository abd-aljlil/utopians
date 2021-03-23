//5-5-2018
CREATE TABLE `utopians_dashboard`.`question_types` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(25) NOT NULL , `created_by` INT NOT NULL , `updated_by` INT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `trash` INT NOT NULL DEFAULT '0' , `active` INT NOT NULL DEFAULT '0' , `block` INT NOT NULL DEFAULT '0' , `remember_token` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `question_types` CHANGE `created_by` `created_by` INT(11) NULL;
ALTER TABLE `question_types` CHANGE `updated_by` `updated_by` INT(11) NULL;
ALTER TABLE `question_types` CHANGE `remember_token` `remember_token` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;


//9-5-2018
ALTER TABLE `exam_name_index_questions` ADD `question_types_id` INT NOT NULL AFTER `exam_name_index_id`;


//10-5-2018
ALTER TABLE users ADD remember_token VARCHAR(255) NOT NULL AFTER updated_by;
ALTER TABLE users CHANGE level level INT(10) UNSIGNED NOT NULL DEFAULT '0';


//11-5-2018
ALTER TABLE `exam_name_index_questions` CHANGE `answer1` `answer1` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;
ALTER TABLE `exam_name_index_questions` CHANGE `answer2` `answer2` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;
ALTER TABLE `exam_name_index_questions` CHANGE `answer3` `answer3` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;
ALTER TABLE `exam_name_index_questions` CHANGE `answer4` `answer4` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;
ALTER TABLE `exam_name_index_questions` CHANGE `correct_answer` `correct_answer` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;



//12-5-2018
ALTER TABLE `exam_name_index` ADD `exam_percent` DOUBLE(4,2) NOT NULL AFTER `period`;
ALTER TABLE `exam_name_index_questions` ADD `question_percent` DOUBLE(4,2) NOT NULL AFTER `correct_answer`;
CREATE TABLE `utopians_dashboard`.`exam_name_index_users` ( `id` INT NOT NULL AUTO_INCREMENT , `exam_name_index` INT NOT NULL , `user_id` INT NOT NULL , `result` DOUBLE(4,2) NOT NULL DEFAULT '0' , `result_status` INT NOT NULL DEFAULT '0' , `trash` INT NOT NULL DEFAULT '0' , `active` INT NOT NULL DEFAULT '0' , `block` INT NOT NULL DEFAULT '0' , `updated_by` INT NOT NULL , `created_by` INT NOT NULL , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `remember_token` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


//16-5-2018
ALTER TABLE `users` CHANGE `id` `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT;


//17-5-2018
ALTER TABLE `group_timing` ADD `day` VARCHAR(15) NULL DEFAULT NULL AFTER `group_id`;

ALTER TABLE `groups` ADD `user_level` VARCHAR(6) NOT NULL AFTER `name`;
INSERT INTO `roles` (`id`, `name`, `description`, `created_by`, `updated_by`, `trash`, `active`, `block`, `created_at`, `updated_at`) VALUES (NULL, 'teacher assistant', '', NULL, NULL, '0', '0', '0', NULL, NULL);

ALTER TABLE `users` CHANGE `level` `level` VARCHAR(10) NOT NULL DEFAULT '0';
ALTER TABLE `users` CHANGE `level` `level` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;


//18-5-2018
ALTER TABLE `exam_name_index_users` CHANGE `exam_name_index` `exam_name_index_id` INT(11) NOT NULL;
ALTER TABLE `exam_name_index_users` CHANGE `updated_by` `updated_by` INT(11) NULL DEFAULT NULL;
ALTER TABLE `exam_name_index_users` CHANGE `created_by` `created_by` INT(11) NULL DEFAULT NULL;
ALTER TABLE `exam_name_index_users` CHANGE `remember_token` `remember_token` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

//19-5-2018
RENAME TABLE
    exam_name_index_questions_u TO exam_name_index_questions_users


//22-5-2018
ALTER TABLE `exam_name_index` CHANGE `date` `date` DATETIME NOT NULL;



//25-6-2018
ALTER TABLE `exam_name_index_users` ADD `time_counter` INT NULL DEFAULT NULL AFTER `user_id`;
ALTER TABLE `exam_name_index_users` CHANGE `time_counter` `time_counter` INT(11) NULL DEFAULT '0';

//4-7-2018
CREATE TABLE `utopians_dashboard`.`level_setting_exam_percent` ( `id` INT NOT NULL AUTO_INCREMENT , `level` INT NOT NULL , `percent` DOUBLE(4,2) NOT NULL , `trash` INT NOT NULL DEFAULT '0' , `active` INT NOT NULL DEFAULT '0' , `block` INT NOT NULL DEFAULT '0' , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_by` INT NULL , `created_by` INT NULL , `remember_token` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `level_setting_exam_percent` ADD `exam_name_index_id` INT NOT NULL AFTER `id`;
