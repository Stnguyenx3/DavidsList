drop table if exists user;
drop table if exists userImage;
drop table if exists listing;
drop table if exists listingImage;
drop table if exists address;
drop table if exists listingDetail;
drop table if exists favoriteListing;

CREATE TABLE `student_dtchau`.`user` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `studentID` VARCHAR(9),
  `phone` VARCHAR(10),
  `bio` VARCHAR(2000),
  PRIMARY KEY(`id`)
 );

CREATE TABLE `student_dtchau`.`userImage`(
	`id` INT(4) NOT NULL,
	`image` LONGBLOB,
	`imageThumbnail` BLOB,
	PRIMARY KEY(`id`)
);

CREATE TABLE `student_dtchau`.`listing` (
	`id` INT(4) NOT NULL AUTO_INCREMENT,
	`price` INT(4) NOT NULL,
	`type` VARCHAR(100) NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE `student_dtchau`.`address` (
	`listingId` INT(4) NOT NULL,
	`streetName` VARCHAR(100),
	`city` VARCHAR(100),
	`zipcode` VARCHAR(100),
	`state` VARCHAR(100),
	PRIMARY KEY(`listingId`)
);

CREATE TABLE `student_dtchau`.`favoriteListing` (
	`id` INT(4) NOT NULL,
	`listingId` INT(4) NOT NULL,
	PRIMARY KEY(`listingId`)
);

CREATE TABLE `student_dtchau`.`listingDetail`(
	`listingId` INT(4) NOT NULL,
	`numberOfBedrooms` INT(4) NOT NULL,
	`numberOfBathrooms` INT(4) NOT NULL,
	`internet` TINYINT(1),
	`petPolicy` VARCHAR(100) NOT NULL,
	`elevatorAccess` text COLLATE utf8_unicode_ci NOT NULL,
	`furnishing` TINYINT(1), #subject to change to a three level int field
	`airConditioning` TINYINT(1),
	`description` VARCHAR(2000) NOT NULL,
	PRIMARY KEY(`listingId`)
);

CREATE TABLE `student_dtchau`.`listingImage`(
	`listingID` INT(4) NOT NULL AUTO_INCREMENT,
	`image` LONGBLOB,
	`imageThumbnail` BLOB,

  PRIMARY KEY (`listingId`)
  #UNIQUE KEY `email` (`email`)
  # Used 'id' to link tables together, also removed 'renter' and 'owner' flags, additionally added 'listingID' to tie 'listings' and 'listingID' tables together
);
