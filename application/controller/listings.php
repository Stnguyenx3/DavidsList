<?php

//** Listings Class

class Listings extends Controller {
	//index
	// This method handles what happens when you move http://yourproject/home/index

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
		
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingID, "listingid");	
		
		if ($arrayOfListingObjects == null){
			//detail of error page necessary
			require APP . 'view/problem/error_page.php';
		}

		else{
			//the following will send back the header, body, and footer
			//of the listing page
			require APP . "view/_templates/header.php";
			require APP . "view/listings/listing_body.php";
			require APP . "view/_templates/footer.php";
		}

	}

	//deleteListing
	//Function to delete a listing's page. Parameter is the id of the listing
	public function deleteListing($listing_id){

		//thought process: Traverse the table of listings, and find the listing_id of the listing in question. Then delete the respective page

	}

	//editListing
	//Function to edit a listing. Parameter is the id of the listing. 
	//External information is JSON encoded data which contains
	//part of the listing data to change.
	public function editListing($listing_id){



	}
	//newListing
	//Function to create listing. External information is JSON encoded data which 
	//contains new listing data
	public function newListing(){

	}
	
}