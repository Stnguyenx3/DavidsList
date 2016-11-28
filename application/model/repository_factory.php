<?php

/*
 * Factory class that instantiates one of the repositories based on the given
 * repository name, with the dependency injected into the repository
 */
class RepositoryFactory {
	public static function createRepository($repoName) {
		$db = Database::getInstance();
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
			case "address": {
				return new AddressRepo($db);
				break;
			}
			case "favorite_listing": {
				return new FavoriteListingRepo($db);
				break;
			}
			case "listing_detail": {
				return new ListingDetailRepo($db);
				break;
			}
			case "message": {
				return new MessageRepo($db);
				break;
			}			
		}
	}
}