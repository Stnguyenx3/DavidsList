CREATE TABLE `student_`.`users` (
  'id' INT(4) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  'password' VARCHAR(64) NOT NULL,
  'studentID' VARCHAR(8),
  `phone` VARCHAR(10),
  `bio` VARCHAR(2000),
 );

CREATE TABLE 'student_'.'userImages'(
	'id' INT(4) NOT NULL,
	'image' LONGBLOB,
	'imageThumbnail' SHORTBLOB
);
CREATE TABLE 'student_'.'listings' (
	'id' INT(4) NOT NULL,
	'listingID' INT(4) NOT NULL AUTO_INCREMENT,
	'price' INT(4) NOT NULL,
	'numberOfBedrooms' INT(4) NOT NULL,
	'numberOfBathrooms' INT(4) NOT NULL,
	'type' VARCHAR(100) NOT NULL,
	'internet' TINYINT(1) ,
	'petPolicy' VARCHAR(100) NOT NULL,
	'elevatorAccess' text COLLATE utf8_unicode_ci NOT NULL,
	'furnishing' TINYINT(1), #subject to change to a three level int field
	'airConditioning' TINYINT(1),
	'address' VARCHAR(100) NOT NULL,
	'description' VARCHAR(2000) NOT NULL,
);

CREATE TABLE 'student_'.'listingImages'(
	'listingID' INT(4) NOT NULL,
	'image' LONGBLOB,
	'imageThumbnail' SHORTBLOB,

  PRIMARY KEY (`id`),
  #UNIQUE KEY `email` (`email`)
  # Used 'id' to link tables together, also removed 'renter' and 'owner' flags, additionally added 'listingID' to tie 'listings' and 'listingID' tables together
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
