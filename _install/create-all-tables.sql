drop table if exists user;
drop table if exists userImage;
drop table if exists listing;
drop table if exists listingImage;
drop table if exists address;
drop table if exists listingDetail;
drop table if exists favoriteListing;
drop table if exists message;

CREATE TABLE `f16g01`.`user` (
	  `userid` INT(4) NOT NULL AUTO_INCREMENT,
	  `email` VARCHAR(100) NOT NULL,
	  `username` VARCHAR(40) NOT NULL,
	  `password` VARCHAR(255) NOT NULL,
	  `studentID` VARCHAR(9),
	  `phone` VARCHAR(10),
	  `bio` VARCHAR(2000),
	  `verified` TINYINT(1) NOT NULL,
	  `firstname` VARCHAR(40) NOT NULL,
	  `lastname` VARCHAR(40) NOT NULL,
	  PRIMARY KEY(`userid`)
 );

CREATE TABLE `f16g01`.`userImage`(
	`userid` INT(4) NOT NULL,
	`image` LONGBLOB,
	`imageThumbnail` BLOB,
	PRIMARY KEY(`userid`)
); 

CREATE TABLE `f16g01`.`listing` (
	`userid` INT(4) NOT NULL,
	`listingId` INT(4) NOT NULL AUTO_INCREMENT,
	`price` INT(4) NOT NULL,
	`type` VARCHAR(100) NOT NULL,
	`status` TINYINT(1) NOT NULL,
    `title` VARCHAR(200),
	PRIMARY KEY(`listingId`)
);

CREATE TABLE `f16g01`.`address` (
	`listingId` INT(4) NOT NULL,
	`approximateAddress` TINYINT(1) NOT NULL,
	`streetName` VARCHAR(100),
	`city` VARCHAR(100),
	`zipcode` VARCHAR(100),
	`state` VARCHAR(100),
	`distance` VARCHAR(45),
	PRIMARY KEY(`listingId`)
);
# note that appromixate addressis a tiny int because we want to know whether or 
# note the user wishes to show his/her exact address

CREATE TABLE `f16g01`.`favoriteListing` (
	`userid` INT(4) NOT NULL,
	`listingId` INT(4) NOT NULL
);

CREATE TABLE `f16g01`.`listingDetail`(
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

CREATE TABLE `f16g01`.`message` (
	`listingId` INT(4) NOT NULL,
	`senderUserId` INT(4) NOT NULL,
	`recipientUserId` INT(4) NOT NULL,
	`message` VARCHAR(2000) NOT NULL,
	`clientId` INT(4) NOT NULL, #client id is the person who is not renting
	`datetime` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`listingId`)
);

CREATE TABLE `f16g01`.`listingImage`(
	`listingID` INT(4) NOT NULL,
	`image` LONGBLOB,
	`imageThumbnail` BLOB
  	#UNIQUE KEY `email` (`email`)
  	# Used 'id' to link tables together, also removed 'renter' and 'owner' flags, additionally added 'listingID' to tie 'listings' and 'listingID' tables together
);
