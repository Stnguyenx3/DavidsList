drop table if exists users;
drop table if exists userImages;
drop table if exists listings;
drop table if exists listingsImages;

CREATE TABLE `student_dtchau`.`users` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `studentID` VARCHAR(8),
  `phone` VARCHAR(10),
  `bio` VARCHAR(2000),
  `listingId` INT(4) NOT NULL,
  `userImagesId` INT(4) NOT NULL
  PRIMARY KEY(`id`)
 );

CREATE TABLE `student_dtchau`.`userImages`(
	`id` INT(4) NOT NULL AUTO_INCREMENT,
	`image` LONGBLOB,
	`imageThumbnail` TINYBLOB,
	PRIMARY KEY(`id`)
);
CREATE TABLE `student_dtchau`.`listings` (
	`id` INT(4) NOT NULL AUTO_INCREMENT,
	`listingImagesId` INT(4) NOT NULL
	`price` INT(4) NOT NULL,
	`numberOfBedrooms` INT(4) NOT NULL,
	`numberOfBathrooms` INT(4) NOT NULL,
	`type` VARCHAR(100) NOT NULL,
	`internet` TINYINT(1) ,
	`petPolicy` VARCHAR(100) NOT NULL,
	`elevatorAccess` text COLLATE utf8_unicode_ci NOT NULL,
	`furnishing` TINYINT(1), #subject to change to a three level int field
	`airConditioning` TINYINT(1),
	`address` VARCHAR(100) NOT NULL,
	`description` VARCHAR(2000) NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE `student_dtchau`.`listingImages`(
	`listingID` INT(4) NOT NULL AUTO_INCREMENT,
	`image` LONGBLOB,
	`imageThumbnail` TINYBLOB,

  PRIMARY KEY (`listingId`)
  #UNIQUE KEY `email` (`email`)
  # Used 'id' to link tables together, also removed 'renter' and 'owner' flags, additionally added 'listingID' to tie 'listings' and 'listingID' tables together
);
