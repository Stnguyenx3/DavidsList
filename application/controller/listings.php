<?php

//** Listings Class
//TODO DOC THIS SHIT
//REMOVED DEPRECATED SHIT

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
			require APP . 'view/listings/listing_body.php';
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
			user_id: 1,
			listing_price: 2,
			listing_type: 3,
			listing_status: 4,
			listing_detail:{
				listing_numBedrooms:
				etc
			},
			address:{
				etc
			},
			listing_image: {
				etc
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
			user_id: 1, 
			listing_detail:{
				listing_numBedrooms:
				etc
			},
			address:{
				etc
			},
			listing_image:{
				etc
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