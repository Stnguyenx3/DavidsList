<?php

/*
 * Class FavoriteListings
 * 
 * Controller for the FavoriteListing class (model/favorite_listing.php)
 * 
 * This class provides the following functionality:
 *   1) A function to add a FavoriteListing 
 *   2) A function to delete a FavoriteListing
 * 
 * TODO:
 *   - Both functions should be upedated to include error checking / validation.
 *   - Both functions need to be tested.
 */

class FavoriteListings extends Controller{
	
	/**
	 * Adds a listing to a users' list of favorite listings.
	 * 
	 * External data is JSON object containing the following ket-value pairs:
	 *     "userId" => $this->userId,
     *     "$listingId" => $this->$listingId,
	 * 
	 * @todo Add error checking / validation (for example, check to make sure the
	 *     listingId is valid).
	 * 
	 */
	public function addFavorite(){
		// build FavoriteListing object from external JSON data
		$favoriteListing = new FavoriteListing();
		$favoriteListing->setUserId($_POST("userId"));
		$favoriteListing->setListingId($POST("listingId"));
		
		// add the FavoriteListing to the DB
        $favoriteListingsRepo = RepositoryFactory::createRepository(
				"favorite_listing");		
		$favoriteListingsRepo->save($favoriteListing);	
	} // end function addFavorite
	
	
	/**
	 * Deletes a listing from a user's list of favorite listings.
	 * 
	 * External data is JSON object containing the following ket-value pairs:
	 *     "userId" => $this->userId,
     *     "$listingId" => $this->$listingId,
	 * 
	 * @todo Add error checking / validation (for example, check to make sure the
	 *     listingId is valid).
	 */
	public function deleteFavorite(){
		// build FavoriteListing object from external JSON data
		$favoriteListing = new FavoriteListing();
		$favoriteListing->setUserId($_POST("userId"));
		$favoriteListing->setListingId($POST("listingId"));
		
		// remove the FavoriteListing from the DB
        $favoriteListingsRepo = RepositoryFactory::createRepository(
				"favorite_listing");		
		$favoriteListingsRepo->remove($favoriteListing);			
	} // end function deleteFavorite
} // end class FavoritesListingsController