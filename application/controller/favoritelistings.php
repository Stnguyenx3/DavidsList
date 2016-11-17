<?php

/*
 *  Class: FavoriteListings
 *   File: application/controller/favoritelistings.php
 * Author: Paul Derugin
 * 
 * Controller for the FavoriteListing class (application/model/favorite_listing.php)
 * 
 * This class provides the following functionality:
 *   1) A function to add a FavoriteListing 
 *   2) A function to delete a FavoriteListing
 * 
 * This class also contains a temporary test function, testDelete, which
 * confirms that the method I employ in the deleteFavorite function should
 * work.
 * 
 * TODO: Both functions should be updated to include error checking / validation.
 * 
 * Both functions need to be tested.
 * 
 * Copyright (C) 2016, Paul Derugin
 */
class FavoriteListings extends Controller{
	
	/**
	 * Adds a listing to a users' list of favorite listings.
	 * 
	 * External data is JSON object containing the following key-value pairs:
	 *     "userId" => $this->userId;
     *     "$listingId" => $this->$listingId.
	 * 
	 * @todo Add error checking / validation (for example, check to make sure the
	 * listingId is valid).
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
	
	
	/**
	 * Temporary function confirms that I have the right idea on how to
	 * delete a favorite listing, given a userID and a listingID.
	 * 
	 * The function is executed when the user navigates to the URL
	 * .../favoritelistings/testdelete/x-m, where x = userID, m = listingID 
	 * of the listing that is to be removed. 
	 * 
	 * @param string $userIDAndFavoriteListingID Should be in the format "x-m", 
	 * where x = userID, m = listingID of the listing that is to be removed.
	 */
	public function testDelete($userIDAndFavoriteListingID){
		$params = explode("-", $userIDAndFavoriteListingID);
		
		$favoriteListing = new FavoriteListing();
		$favoriteListing->setUserId($params[0]);
		$favoriteListing->setListingId($params[1]);
		
		// remove the FavoriteListing from the DB
        $favoriteListingsRepo = RepositoryFactory::createRepository(
				"favorite_listing");		
		$favoriteListingsRepo->remove($favoriteListing);			
	} // end function testDelete
} // end class FavoriteListings