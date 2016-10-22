<?php

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
			case "address": {
				return new AddressRepo($db);
				break;
			}
			case "address_all": {
				return new AllAddressQuery($db);
				break;
			}
			case "favorite_listing": {
				return new FavoriteListingRepo($db);
				break;
			}
			case "favorite_listing_all": {
				return new AllFavoriteListingQuery($db);
				break;
			}
			case "listing_detail": {
				return new ListingDetailRepo($db);
				break;
			}
			case "listing_detail_all": {
				return new AllListingDetailQuery($db);
				break;
			}
		}
	}
}