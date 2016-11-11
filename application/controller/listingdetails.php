<?php

//Listing Details class

class ListingDetails extends Controller{
	
	public function index(){
		require APP . 'view/_templates/header.php';
		require APP . 'view/home/index.php';
		require APP . 'view/_templates/footer.php';
	}

	//getDetails
	//Retrieves Listing Details based on Listing ID
	public function getDetails($listingID){
		$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingId");

		if ($arrayOfListingDetailObjects == null){
			$errorMessage = "The details of the listing with the listingID ({$listingID}) was not found.";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			//return listingDetail based on listing ID
			//very unsure about whether or not I should return the object or print.
			require APP . 'view/_templates/header.php';
			require APP . 'view/listings/listing_body.php';
			require APP . 'view/_templates/footer.php';
			echo "Number of Bedrooms: ";
			echo $arrayOfListingDetailObjects[0]->getNumberOfBedrooms();
			echo ", Number of Bathrooms: ";
			echo $arrayOfListingDetailObjects[0]->getNumberOfBathrooms();
			echo ", Internet: ";
			echo $arrayOfListingDetailObjects[0]->getInternet();
			echo ", Pet Policy: ";
			echo $arrayOfListingDetailObjects[0]->getPetPolicy();
			echo ", Elevator Access: ";
			echo $arrayOfListingDetailObjects[0]->getElevatorAccess();
			echo ", Furnishing: ";
			echo $arrayOfListingDetailObjects[0]->getFurnishing();
			echo ", Air Conditioning: ";
			echo $arrayOfListingDetailObjects[0]->getAirConditioning();
			echo ", Description: ";
			echo $arrayOfListingDetailObjects[0]->getDescription();

		}
	}

	//deleteDetails
	//Delete Listing Details based on listing ID
	public function deleteDetails($listingID){
		$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingId");
		
		if ($arrayOfListingDetailObjects == null){
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}
		else{
			$removedCorrectly = $listingDetailRepo->remove($arrayOfListingDetailObjects[0]);
			//should we output a page detailing success or not?
		}
	}

	//editDetails
	//Updates Listing Detail based on ID
	public function editDetails($listingID){
		$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingId");

		if ($arrayOfListingDetailObjects == null){
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			$listingDetailObject = $arrayOfListingDetailObjects[0];

			$listingDetailObject->setNumberOfBedrooms($_POST["listing_numBedrooms"]);
			$listingDetailObject->setNumberOfBathrooms($_POST["listing_numBathrooms"]);
			$listingDetailObject->setInternet($_POST["listing_internet"]);
			$listingDetailObject->setPetPolicy($_POST["listing_pet_policy"]);
			$listingDetailObject->setElevatorAccess($_POST["listing_elevator_access"]);
			$listingDetailObject->setFurnishing($_POST["listing_furnishing"]);
			$listingDetailObject->setAirConditioning($_POST["listing_air_conditioning"]);
			$listingDetailObject->setDescription($_POST["listing_description"]);

			$insertListingDetails = $listingDetailRepo->update($listingDetailObject);

		}
	}

	//createDetails
	//create new listing details to associate with listing id
	public function createDetails(){
		$listingRepo = RepositoryFactory::createRepository("listing_detail");

		$listingDetail = new ListingDetail();

		$listingDetail->setListingId($_POST["listing_id"]); //temp fix
		$listingDetail->setNumberOfBedrooms($_POST["listing_numBedrooms"]);
		$listingDetail->setNumberOfBathrooms($_POST["listing_numBathrooms"]);
		$listingDetail->setInternet($_POST["listing_internet"]);
		$listingDetail->setPetPolicy($_POST["listing_pet_policy"]);
		$listingDetail->setElevatorAccess($_POST["listing_elevator_access"]);
		$listingDetail->setFurnishing($_POST["listing_furnishing"]);
		$listingDetail->setAirConditioning($_POST["listing_air_conditioning"]);
		$listingDetail->setDescription($_POST["listing_description"]);

		$insertListingDetail = $listingRepo->save($listingDetail);

	}
	
}