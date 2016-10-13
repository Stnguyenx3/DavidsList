CREATE TABLE `student_`.`users` (
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  'studentID' text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci ,
  `bio` text COLLATE utf8_unicode_ci ,
  `image` LONGBLOB,
  'renter' TINYINT(1), 
  'owner' TINYINT(1),
 );
CREATE TABLE 'student_'.'listings' (
	'email' text COLLATE utf8_unicode_ci NOT NULL,
	'numberOfBedrooms' text COLLATE utf8_unicode_ci NOT NULL,
	'numberOfBathrooms' text COLLATE utf8_unicode_ci NOT NULL,
	'internet' TINYINT(1) ,
	'petPolicy' text COLLATE utf8_unicode_ci NOT NULL,
	'elevatorAccess' text COLLATE utf8_unicode_ci NOT NULL,
	'furnishing' TINYINT(1),
	'airConditioning' TINYINT(1),
	'address' text COLLATE utf8_unicode_ci NOT NULL,
	'description' text COLLATE utf8_unicode_ci NOT NULL,
	'listingImage' LONGBLOB,

  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
