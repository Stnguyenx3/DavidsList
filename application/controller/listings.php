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
		$arrayOfListingObjects = $listingRepo->find($listingID, "listingId");	
		
		if ($arrayOfListingObjects == null){
			//detail of error page necessary
			$errorMessage = "Error, Listing not found.";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
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
		$arrayOfListingObjects = $listingRepo->find($listingID, "listingId");

		if ($arrayOfListingObjects[0] == null){
			//detail of error page necessary
			$errorMessage = "The listing with the listingID ({$listingID}) was not found.";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			$listingRepo->remove($arrayOfListingObjects[0]);

			$newArrayOfListingObjects = $listingRepo->find($listingID, "listingId");
				if ($newArrayOfListingObjects[0] == null){
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
			$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
			$addressRepo = RepositoryFactory::createRepository("address");

			$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingId"); 
			$arrayOfAddressObjects = $addressRepo->find($listingID, "listingId"); 

			$listingObject = $arrayOfListingObjects[0];
			$listingDetailObject = $arrayOfListingDetailObjects[0];
			$addressObject = $arrayOfAddressObjects[0];

			//listing
			$listingObject->setPrice($_POST["listing_price"]);
			$listingObject->setType($_POST["listing_type"]);

			echo $listingObject->__toString();

			//listingDetail
			$listingDetailObject ->setNumberOfBedrooms($_POST["listing_numBedrooms"]);
			$listingDetailObject ->setNumberOfBathrooms($_POST["listing_numBathrooms"]);
			$listingDetailObject ->setInternet($_POST["listing_internet"]);
			$listingDetailObject ->setPetPolicy($_POST["listing_pet_policy"]);
			$listingDetailObject ->setElevatorAccess($_POST["listing_elevator_access"]);
			$listingDetailObject ->setFurnishing($_POST["listing_furnishing"]);
			$listingDetailObject ->setAirConditioning($_POST["listing_air_conditioning"]);
			$listingDetailObject ->setDescription($_POST["listing_description"]);

			echo $listingDetailObject->__toString();

			//address
			$addressObject->setStreetName($_POST["listing_street_name"]);
			$addressObject->setCity($_POST["listing_city_name"]);
			$addressObject->setZipcode($_POST["listing_zip_code"]);
			$addressObject->setState($_POST["listing_state"]);

			//save the things
			$insertListing = $listingRepo->update($listingObject);
			$insertListingDetails = $listingDetailRepo->update($listingDetailObject );
			$insertAddress = $addressRepo->update($addressObject);

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
		

		$listingDetail->setNumberOfBedrooms($_POST["listing_numBedrooms"]);
		$listingDetail->setNumberOfBathrooms($_POST["listing_numBathrooms"]);
		$listingDetail->setInternet($_POST["listing_internet"]);
		$listingDetail->setPetPolicy($_POST["listing_pet_policy"]);
		$listingDetail->setElevatorAccess($_POST["listing_elevator_access"]);
		$listingDetail->setFurnishing($_POST["listing_furnishing"]);
		$listingDetail->setAirConditioning($_POST["listing_air_conditioning"]);
		$listingDetail->setDescription($_POST["listing_description"]);

		

		$address->setStreetName($_POST["listing_street_name"]);
		$address->setCity($_POST["listing_city_name"]);
		$address->setZipCode($_POST["listing_zip_code"]);
		$address->setState($_POST["listing_state"]);


		$insertListing = $listingRepo->save($listing);
		$insertListingDetails = $listingDetailRepo->save($listingDetail);
		$insertAddress = $addressRepo->save($address);
		//$insertListingImage = $listingImageRepo->save($listingImage);
				

	}
	
}