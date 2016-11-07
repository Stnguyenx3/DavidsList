<?php

//Listing Details class

class ListingDetails extends Controller{
	
	public function index(){
		require APP . 'view/_templates/header.php';
		require APP . 'view/home/index.php';
		require APP . 'view/_templates/footer.php';
	}

	//getDetails
	public function getDetails($listingID){
		$listingDetailRepo = RepositoryFactory::createRepository("listingDetail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingDetail");

		if ($arrayOfListingDetailObjects == null){
			require APP . 'view/problem/error_page.php';
		}

		else{
			//return listingDetail based on listingID
			//very unsure about this method
			echo $arrayOfListingDetailObjects[0]->getNumberOfBedrooms();
			echo $arrayOfListingDetailObjects[0]->getNumberOfBathrooms();
			echo $arrayOfListingDetailObjects[0]->getInternet();
			echo $arrayOfListingDetailObjects[0]->getPetPolicy();
			echo $arrayOfListingDetailObjects[0]->getElevatorAccess();
			echo $arrayOfListingDetailObjects[0]->getFurnishing();
			echo $arrayOfListingDetailObjects[0]->getAirConditioning();
			echo $arrayOfListingDetailObjects[0]->getDescription();

		}
	}

	//deleteDetails
	public function deleteDetails($listingID){
		$listingDetailRepo = RepositoryFactory::createRepository("listingDetail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingDetail");
		
		if ($arrayOfListingDetailObjects == null){
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}
		else{
			$listingDetailRepo->remove($arrayOfListingDetailObjects[0]);
			//should we output a page detailing success or not?
		}
	}

	//editDetails
	public function editDetails($listingID){
		$listingDetailRepo = RepositoryFactory::createRepository("listingDetail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingDetail");

		if ($arrayOfListingDetailObjects == null){
			require APP . 'view/problem/error_page.php';
		}

		else{
			//do something
		}
	}

	//createDetails
	public function createDetails(){
		
	}
	
}