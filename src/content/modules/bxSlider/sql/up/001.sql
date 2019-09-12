CREATE TABLE `{prefix}slider` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `enabled` TINYINT(1) NOT NULL DEFAULT '1' , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `{prefix}slider_pictures` ( `id` INT NOT NULL AUTO_INCREMENT , `file` VARCHAR(255) NOT NULL , `enabled` TINYINT NOT NULL DEFAULT '1' , `slider_id` INT NOT NULL , `position` INT NOT NULL DEFAULT '10' , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `{prefix}slider_pictures` add column title varchar(255) null default '';

ALTER TABLE `{prefix}slider_pictures` add column link varchar(255) null default null;

ALTER TABLE `{prefix}slider_pictures`
  ADD CONSTRAINT fk_slider
  FOREIGN KEY (slider_id) 
  REFERENCES `{prefix}slider`(id)
  ON DELETE CASCADE;