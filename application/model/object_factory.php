<? 

class ObjectFactory {
	public static function createObject($object) {
		switch($object) {
			case "Address": {
				return new Address();
				break;
			}
			case "ListingImage": {
				return new ListingImage();
				break;
			}
			case "Listing": {
				return new ListingRepo();
				break;
			}
			case "User": {
				return new UserRepo();
				break;
			}
			case "UserImage": {
				return new UserImageRepo();
				break;
			}
			case "FavoriteListing": {
				return new FavoriteListingRepo();
				break;
			}
			case "ListingDetail": {
				return new ListingDetailRepo();
				break;
			}
		}
	}
}