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
		$arrayOfListingObjects = $listingRepo->find($listingID, "listing");	
		
		if ($arrayOfListingObjects == null){
			//detail of error page necessary
			$errorMessage = "Error, Listing not found.";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'veiw/_templates/footer.php';
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
	public function deleteListing($listingID){

		//thought process: Traverse the table of listings, and find the listing_id of the listing in question. Then delete the respective page
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingID, "listing");

		if ($arrayOfListingObjects == null){
			//detail of error page necessary
			require APP . 'view/problem/error_page.php';
		}

		else{
			$listingRepo->remove($arrayOfListingObjects[0]);
			//need to create listing_delete_success page
			require APP . 'view/_templates/header.php';
			require APP . 'view/listings/listing_delete_success.php';
			require APP . 'view/_templates/footer.php';
		}
	}

	//editListing
	//Function to edit a listing. Parameter is the id of the listing. 
	//External information is JSON encoded data which contains
	//part of the listing data to change.
	public function editListing($listingID){
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingID, "listing");

		if ($arrayOfListingObjects == null){
			//detail of error page necessary
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		//kinda stuck here. Will come back to this.
		else{
			$listingDetailRepo = RepositoryFactory::createRepository("listingDetail");
			$addressRepo = RepositoryFactory::createRepository("address");

			$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingDetail");
			$arrayOfAddressObjects = $addressRepo->find($listingID, "address");

			

		}


	}
	//newListing
	//Function to create listing. External information is JSON encoded data which 
	//contains new listing data
	public function newListing(){
		
		
		$listingRepo = RepositoryFactory::createRepository("listing");
		$listingDetailRepo = RepositoryFactory::createRepository("listingDetail");
		$addressRepo = RepositoryFactory::createRepository("address");
	//$listingImageRepo = RepositoryFactory::createRepository("listingImage");
		
		$listing = new Listing;
		$listingDetail = new ListingDetail;
		$address = new Address;
	//$listingImage = new ListingImage;

		$listing->setPrice($_POST["listing_price"]);
		$listing->setType($_POST["listing_type"]);
		//unsure about ids here

		$listingDetail->setNumberOfBedrooms($_POST["listing_numBedrooms"]);
		$listingDetail->setNumberOfBathrooms($_POST["listing_numBathrooms"]);
		$listingDetail->setInternet($_POST["listing_internet"]);
		$listingDetail->setPetPolicy($_POST["listing_pet_policy"]);
		$listingDetail->setElevatorAccess($_POST["listing_elevator_access"]);
		$listingDetail->setFurnishing($_POST["listing_furnishing"]);
		$listingDetail->setAirConditioning($_POST["listing_air_conditioning"]);
		$listingDetail->setDescription($_POST["listing_description"]);

		//unsure about ids

		$address->setStreetName($_POST["listing_street_name"]);
		$address->setCity($_POST["listing_city_name"]);
		$address->setZipCode($_POST["listing_zip_code"]);
		$address->setState($_POST["listing_state"]);

		//unsure about ids


		$insertListing = $listingRepo->save($listing);
		$insertListingDetails = $listingDetailRepo->save($listingDetail);
		$insertAddress = $addressRepo->save($address);
	//$insertListingImage = $listingImageRepo->save($listingImage);
				

	}
	
}