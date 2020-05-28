ALTER TABLE `group`
	CHANGE COLUMN `image` `image_ru` VARCHAR(255),
	ADD COLUMN `image_en` TEXT;
UPDATE `group` SET `image_en` = `image_ru`;
