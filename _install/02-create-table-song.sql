CREATE TABLE `student_`.`users` (
  `email` VARCHAR(100) NOT NULL,
  'password' VARCHAR(64) NOT NULL,
  'studentID' VARCHAR(8),
  `phone` VARCHAR(10),
  `bio` VARCHAR(2000),
  'renter' TINYINT(1), 
  'owner' TINYINT(1),
 );

CREATE TABLE 'student_'.'userImages'(
	'email' VARCHAR(100) NOT NUll,
	'image' LONGBLOB,
);
CREATE TABLE 'student_'.'listings' (
	'email' VARCHAR(100) NOT NULL,
	'numberOfBedrooms' INT(4) NOT NULL,
	'numberOfBathrooms' INT(4) NOT NULL,
	'internet' TINYINT(1) ,
	'petPolicy' VARCHAR(100) NOT NULL,
	'elevatorAccess' text COLLATE utf8_unicode_ci NOT NULL,
	'furnishing' TINYINT(1),
	'airConditioning' TINYINT(1),
	'address' VARCHAR(100) NOT NULL,
	'description' VARCHAR(2000) NOT NULL,
);

CREATE TABLE 'student_'.'listingImages'(
	'email' VARCHAR(100) NOT NULL,
	'image' LONGBLOB,

  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
