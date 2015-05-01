#shell -> mysql -u root < db.sql
CREATE DATABASE IF NOT EXISTS aviasg_todos DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE aviasg_todos;
CREATE TABLE IF NOT EXISTS `todos` (
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


START TRANSACTION;
INSERT INTO `todos` (`id`, `todo`, `priority`, `deadline`, `createdBy`, `created`) VALUES (NULL, 'pirma todo', 'ąčęėįšųūųšįėęėįšųū9', NOW(), NULL, NULL);
INSERT INTO `todos` (`id`, `todo`, `priority`, `deadline`, `createdBy`, `created`) VALUES (NULL, 'antra todo', 'dega', NOW(), NUll, NULL);
COMMIT;