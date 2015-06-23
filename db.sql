#shell -> mysql -u root < db.sql
CREATE DATABASE IF NOT EXISTS aviasg_todos DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE aviasg_todos;
CREATE TABLE IF NOT EXISTS `todos`
(
	`id` INT NOT NULL AUTO_INCREMENT ,
	`todo` VARCHAR(255) NULL ,
	`priority` VARCHAR(255) NULL ,
	`deadline` TIMESTAMP NULL,
	`createdBy` VARCHAR(255) NULL,
	`created` TIMESTAMP NOT NULL ,
	`completed` TINYINT NOT NULL DEFAULT '0', 
PRIMARY KEY (`id`) ,
UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB CHARACTER SET=utf8 COLLATE utf8_bin;
CREATE TABLE IF NOT EXISTS `user`
(
    `user_id`       INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username`      VARCHAR(255) DEFAULT NULL UNIQUE,
    `email`         VARCHAR(255) DEFAULT NULL UNIQUE,
    `display_name`  VARCHAR(50) DEFAULT NULL,
    `password`      VARCHAR(128) NOT NULL,
    `state`         SMALLINT UNSIGNED
) ENGINE=InnoDB CHARSET="utf8";

 
START TRANSACTION;
INSERT INTO `user` (`username`, `email`, `display_name`, `password`, `state` ) VALUES ( 'admin',  'admin@admin.com', 'admin', '$2a$10$LWsJ/sRnT6KPPlR.5D61tuKbMmDNV9SMkOEblti7htKK8OLoVY4oW', '1' );
INSERT INTO `todos` (`id`, `todo`, `priority`, `deadline`, `createdBy`, `created`) VALUES (NULL, 'pirma todo', '1', NOW(), NULL, NULL);
INSERT INTO `todos` (`id`, `todo`, `priority`, `deadline`, `createdBy`, `created`) VALUES (NULL, 'antra todo', '9', NOW(), NUll, NULL);
COMMIT;