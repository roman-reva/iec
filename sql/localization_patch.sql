ALTER TABLE `category`
	CHANGE COLUMN `name` `name_ru` VARCHAR(255) NULL DEFAULT NULL COLLATE 'cp1251_general_ci' AFTER `id`,
	CHANGE COLUMN `menuname` `menuname_ru` VARCHAR(255) NOT NULL COLLATE 'cp1251_general_ci' AFTER `name_ru`,
	ADD COLUMN `name_en` VARCHAR(255) NULL DEFAULT NULL AFTER `menuname_ru`,
	ADD COLUMN `menuname_en` VARCHAR(255) NOT NULL AFTER `name_en`;
UPDATE `category` SET `name_en` = `name_ru`, `menuname_en` = `menuname_ru`;

ALTER TABLE `group`
	CHANGE COLUMN `name` `name_ru` VARCHAR(255) NOT NULL AFTER `id`,
	CHANGE COLUMN `details` `details_ru` TEXT NOT NULL AFTER `name_ru`,
	CHANGE COLUMN `text` `text_ru` TEXT NOT NULL AFTER `details_ru`,
	ADD COLUMN `name_en` VARCHAR(255) NOT NULL AFTER `text_ru`,
	ADD COLUMN `details_en` TEXT NOT NULL AFTER `name_en`,
	ADD COLUMN `text_en` TEXT NOT NULL AFTER `details_en`;
UPDATE `group` SET `name_en` = `name_ru`, `details_en` = `details_ru`, `text_en` = `text_ru`;


ALTER TABLE `infopage`
	CHANGE COLUMN `title` `title_ru` TEXT NOT NULL AFTER `id`,
	CHANGE COLUMN `menutitle` `menutitle_ru` TEXT NOT NULL AFTER `title_ru`,
	CHANGE COLUMN `text` `text_ru` TEXT NOT NULL AFTER `menutitle_ru`,
	ADD COLUMN `title_en` TEXT NOT NULL AFTER `text_ru`,
	ADD COLUMN `menutitle_en` TEXT NOT NULL AFTER `title_en`,
	ADD COLUMN `text_en` TEXT NOT NULL AFTER `menutitle_en`;
UPDATE `infopage` SET `title_en` = `title_ru`, `menutitle_en` = `menutitle_ru`, `text_en` = `text_ru`;

ALTER TABLE `page`
	CHANGE COLUMN `title` `title_ru` VARCHAR(255) NOT NULL AFTER `id`,
	CHANGE COLUMN `details` `details_ru` TEXT NOT NULL AFTER `title_ru`,
	CHANGE COLUMN `text` `text_ru` TEXT NOT NULL AFTER `details_ru`,
	ADD COLUMN `title_en` VARCHAR(255) NOT NULL AFTER `text_ru`,
	ADD COLUMN `details_en` TEXT NOT NULL AFTER `title_en`,
	ADD COLUMN `text_en` TEXT NOT NULL AFTER `details_en`;
UPDATE `page` SET `title_en` = `title_ru`, `details_en` = `details_ru`, `text_en` = `text_ru`;

ALTER TABLE `page_type`
	CHANGE COLUMN `name` `name_ru` VARCHAR(255) NOT NULL AFTER `id`,
	ADD COLUMN `name_en` VARCHAR(255) NOT NULL AFTER `name_ru`;
UPDATE `page_type` SET `name_en` = `name_ru`;