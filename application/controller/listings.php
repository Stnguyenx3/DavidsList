<?php

/*
 *  Class: Listings
 *   File: application/controller/listings.php
 * Author: Imran Irfan and David Chau
 * 
 * Controller for the Listing class (model/listing.php)
 * 
 * This class provides the following functionality:
 *   1) A function to create a new listing, with all related listing information, across different tables
 *   2) A function to delete a listing related to a listing ID, along with related listing information across different tables
 *   3) A function to update an address related to a listing ID, same as above
 *	 4) A function to get a listing related to a listingID, same as above
 *
 * Copyright (C) 2016, Imran Irfan and David Chau
 */

class Listings extends Controller {
	//index
	// This method handles what happens when you move http://yourproject/home/index
	//TODO: Show all listings in a paginated format
	public function index(){
		require APP . 'view/_templates/header.php';
		require APP . 'view/home/index.php';
		require APP . 'view/_templates/footer.php';
	}

	//getListing
	//Function to return a listing's page. Parameter is the id of the listing
	//Returns HTML
	public function getListing($listingID){
	
		//thought process: Traverse the table of listings, and find the listingID of the listing in question. Then return the respective page
		
		$listingResponse = ListingsResponseCreator::createGetListingResponse($listingID);
		$userResponse = UserResponseCreator::createGetUserResponse($listingResponse["listing"]->getId());
		
		if ($listingResponse == null){
			//detail of error page necessary
			$errorMessage = "Error, Listing not found.";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			//the following will send back the header, body, and footer
			//of the listing page
			require APP . 'view/_templates/header.php';
        	require APP . 'view/listings/listing.php';
        	require APP . 'view/_templates/footer.php';
		}

	}

	//deleteListing
	//Function to delete a listing's page. Parameter is the id of the listing
	public function deleteListing($listingID){

		//thought process: Traverse the table of listings, and find the listing_id of the listing in question. Then delete the respective page
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingID, "listingId");


		if ($arrayOfListingObjects == null){
			//detail of error page necessary
			$errorMessage = "The listing with the listingID ({$listingID}) was not found.";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			$removedCorrectly = ListingsResponseCreator::createDeleteListingResponse($listingID);

			if ($removedCorrectly){
				//need to create listing_delete_success page
				require APP . 'view/_templates/header.php';
				require APP . 'view/listings/listing_delete_success.php';
				require APP . 'view/_templates/footer.php';

			}

			else{
				$errorMessage = "The listing with the listingID ({$listingID}) was found but not deleted!";
				require APP . 'view/_templates/header.php';
				require APP . 'view/problem/error_page.php';
				require APP . 'view/_templates/footer.php';

			}		
		}
	}

	//editListing
	//Function to edit a listing. Parameter is the id of the listing. 
	//External information is JSON encoded data which contains
	//part of the listing data to change.
	/*
		format of the json should be
		{
			"user_id":$('#test-userid').val(),
			"listing_price": $('#test-price').val(),
			"listing_type": $('#test-type').val(),
			"listing_status": $('#test-status').val(),
			"listing_detail": {
				"listing_numBedrooms": $('#test-bed').val(),
				"listing_numBathrooms": $('#test-bath').val(),
				"listing_internet": $('#test-internet').val(),
				"listing_pet_policy": $('#test-pet').val(),
				"listing_elevator_access": $('#test-elevator').val(),
				"listing_furnishing": $('#test-furnishing').val(),
				"listing_air_conditioning": $('#test-air').val(),
				"listing_description": $('#test-description').val()
			},
			"address": {
				"approximateAddress": $('#test-approximate').val(),
				"streetName": $('#test-street').val(),
				"city": $('#test-city').val(),
				"zipcode": $('#test-zipcode').val(),
				"state": $('#test-state').val()
			}
		}
	*/
	public function editListing($listingID){
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingID, "listingId");

		if ($arrayOfListingObjects == null){
			//detail of error page necessary
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			$savedCorrectly = ListingsResponseCreator::createUpdateListingResponse($listingID, $_POST);

			if($savedCorrectly) {
				//message it saved
				echo "It saved";
			} else {
				//message it didn't save something
				echo "It did not save";
			}
			//Send out message that it saved
		}

	}

	//newListing
	//Function to create listing. External information is JSON encoded data which 
	//contains new listing data
	/*
		format of the json should be
		{
			"user_id":$('#test-userid').val(),
			"listing_price": $('#test-price').val(),
			"listing_type": $('#test-type').val(),
			"listing_status": $('#test-status').val(),
			"listing_detail": {
				"listing_numBedrooms": $('#test-bed').val(),
				"listing_numBathrooms": $('#test-bath').val(),
				"listing_internet": $('#test-internet').val(),
				"listing_pet_policy": $('#test-pet').val(),
				"listing_elevator_access": $('#test-elevator').val(),
				"listing_furnishing": $('#test-furnishing').val(),
				"listing_air_conditioning": $('#test-air').val(),
				"listing_description": $('#test-description').val()
			},
			"address": {
				"approximateAddress": $('#test-approximate').val(),
				"streetName": $('#test-street').val(),
				"city": $('#test-city').val(),
				"zipcode": $('#test-zipcode').val(),
				"state": $('#test-state').val()
			},
			"listing_image": {
				"image": data.target.result
			}
		}
	*/
	public function newListing(){
		$createdCorrectly = ListingsResponseCreator::createNewListingResponse($_POST);

		if($createdCorrectly) {
			//message it created good
		} else {
			//message it created bad
		}
	}
	
}