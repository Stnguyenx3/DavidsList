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
 * 
 * Copyright (C) 2016, Paul Derugin
 */
class FavoriteListings extends Controller{
	
	/**
	 * Adds a listing to a users' list of favorite listings.
	 * 
	 * External data is JSON object containing the following key-value pairs:
     *     "$listingId" => $this->$listingId.
	 * 
	 */
	public function addFavorite(){
		// build FavoriteListing object from external JSON data
		if(isset($_SESSION["email"])) {
			$userRepo = RepositoryFactory::createRepository("user");
        	$arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");

			$favoriteListing = new FavoriteListing();
			$favoriteListing->setUserId($arrayOfUserObjects[0]->getId());
			$favoriteListing->setListingId($_POST["listingId"]);
			
			// add the FavoriteListing to the DB
	        $favoriteListingsRepo = RepositoryFactory::createRepository(
					"favorite_listing");		

	        $arrayOfListingsRepo = $favoriteListingsRepo->find($_POST["listingId"], "listingId");
	        $isFavorited = false;
	        foreach($arrayOfListingsRepo as $favoriteListings) {
	        	if($favoriteListings->getUserId() == $arrayOfUserObjects[0]->getId()) {
	        		$isFavorited = true;
	        		break;
	        	}
	        }
	        if($isFavorited) {
	        	echo "You have favorited this apartment already";
	        } else {
	        	echo $favoriteListingsRepo->save($favoriteListing);	
	        }

		} else {
			$_SESSION["previous_url"] = URL . 'listings/getlisting/' . $_POST["listingId"];
			echo "You are not logged in";
		}
	} // end function addFavorite
	
	
	/**
	 * Deletes a listing from a user's list of favorite listings.
	 * 
	 * External data is JSON object containing the following ket-value pairs:
     *     "$listingId" => $this->$listingId,
	 */
	public function deleteFavorite(){
		// build FavoriteListing object from external JSON data
		$userRepo = RepositoryFactory::createRepository("user");
        $arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");
		$favoriteListing = new FavoriteListing();
		$favoriteListing->setUserId($arrayOfUserObjects[0]->getId());
		$favoriteListing->setListingId($_POST["listingId"]);
		
		// remove the FavoriteListing from the DB
        $favoriteListingsRepo = RepositoryFactory::createRepository(
				"favorite_listing");		
		$favoriteListingsRepo->remove($favoriteListing);			
	} // end function deleteFavorite
	
} // end class FavoriteListings