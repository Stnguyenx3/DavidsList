<?php

require APP . "model/repositories/listing_image_repository.php";
require APP . "model/repositories/user_image_repository.php";
require APP . "model/repositories/listing_repository.php";
require APP . "model/repositories/user_repository.php";
class RespositoryFactory {
	public static function createRepository($repoName) {
		$db = Database.getInstance();
		switch($repoName) {
			case "listing_image": {
				return new ListingImageRepo($db);
				break;
			}
			case "listing": {
				return new ListingRepo($db);
				break;
			}
			case "user": {
				return new UserRepo($db);
				break;
			}
			case "user_image": {
				return new UserImageRepo($db);
				break;
			}
			case "listing_image_all": {
				return new AllListingImagesQuery($db);
				break;
			}
			case "listing_all": {
				return new AllListingQuery($db);
				break;
			}
			case "user_all": {
				return new AllUsersImagesQuery($db);
				break;
			}
			case "user_image_all": {
				return new AllUsersQuery($db);
				break;
			}
		}
	}
}