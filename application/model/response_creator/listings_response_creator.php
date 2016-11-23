<?php

class ListingsResponseCreator {
	//WORKS
	public static function createGetListingResponse($listingID) {
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingID, "listingId");	

		$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingId");
		
		$addressRepo = RepositoryFactory::createRepository("address");
		$arrayOfAddresses = $addressRepo->find($listingID, "listingId");

		$arrayofListingImageObjects = ListingImageResponseCreator::createGetListingImageResponse($listingID);

		if(count($arrayOfListingObjects) == 0) {
			return null;
		}

		return array(
			"listing" => $arrayOfListingObjects[0],
			"address" => $arrayOfAddresses[0],
			"listing_detail" => $arrayOfListingDetailObjects[0],
			"listing_images" => $arrayofListingImageObjects
		);
	}

	public static function createGetAllListingResponse() {
		$listingRepo = RepositoryFactory::createRepository("listing");
		$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
		$addressRepo = RepositoryFactory::createRepository("address");

		$allListings = $listingRepo->fetch();
		$allListingDetails = $listingDetailRepo->fetch();
		$allAddresses = $addressRepo->fetch();

		return array(
			"listings" => array_slice($allListings, 0, 3),
			"addresses" => array_slice($allAddresses, 0, 3),
			"listing_details" => array_slice($allListingDetails, 0, 3),
		);
	}

	//WORKs
	public static function createDeleteListingResponse($listingID) {
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingID, "listingId");

		$addressRepo = RepositoryFactory::createRepository("address");
        $arrayOfAddresses = $addressRepo->find($listingID, "listingId");

        $removedCorrectlyImages = ListingImageResponseCreator::createDeleteListingImageResponse($listingID);

		$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingId");

		$removedCorrectlyListing = $listingRepo->remove($arrayOfListingObjects[0]);
		$removedCorrectlyAddress = $addressRepo->remove($arrayOfAddresses[0]);
		
		$removedCorrectlyDetails = $listingDetailRepo->remove($arrayOfListingDetailObjects[0]);

		return $removedCorrectlyListing and $removedCorrectlyAddress and 
			$removedCorrectlyImages and $removedCorrectlyDetails;
	}

	//WORKS
	public static function createNewListingResponse($listingInformation) {
		$listingRepo = RepositoryFactory::createRepository("listing");
		$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
		$addressRepo = RepositoryFactory::createRepository("address");

		$listing = new Listing();
		$listingDetail = new ListingDetail();
		$address = new Address();
		$newListingImage = new ListingImage();

		$listing->setId($listingInformation["user_id"]); 
		$listing->setPrice($listingInformation["listing_price"]);
		$listing->setType($listingInformation["listing_type"]);
		$listing->setStatus($listingInformation["listing_status"]);

		$insertListing = $listingRepo->save($listing);

		//Maybe add some kind of sleep

		$arrayOfResults = $listingRepo->find($listingInformation["user_id"], "userid");
		$listing = $arrayOfResults[count($arrayOfResults)-1];
		$listingID = $listing->getListingId();

		//Maybe add some kind of sleep

		$listingDetailInformation = $listingInformation["listing_detail"];

		$listingDetail->setListingId($listingID); 
		$listingDetail->setNumberOfBedrooms($listingDetailInformation["listing_numBedrooms"]);
		$listingDetail->setNumberOfBathrooms($listingDetailInformation["listing_numBathrooms"]);
		$listingDetail->setInternet($listingDetailInformation["listing_internet"]);
		$listingDetail->setPetPolicy($listingDetailInformation["listing_pet_policy"]);
		$listingDetail->setElevatorAccess($listingDetailInformation["listing_elevator_access"]);
		$listingDetail->setFurnishing($listingDetailInformation["listing_furnishing"]);
		$listingDetail->setAirConditioning($listingDetailInformation["listing_air_conditioning"]);
		$listingDetail->setDescription($listingDetailInformation["listing_description"]);

		$insertListingDetail = $listingDetailRepo->save($listingDetail);

		$addressInfo = $listingInformation["address"];

		$address->setId($listingID);
		$address->setApproximateAddress($addressInfo["approximateAddress"]);
		$address->setStreetName($addressInfo["streetName"]);
		$address->setCity($addressInfo["city"]);
		$address->setZipcode($addressInfo["zipcode"]);
		$address->setState($addressInfo["state"]);
	
		$insertAddress = $addressRepo->save($address);

		$listingImageInfo = $listingInformation["listing_image"];

		$insertListingImage = true;
		if($listingImageInfo["image"] != null) {
			$insertListingImage = ListingImageResponseCreator::createNewListingImageResponse($listingID, $listingImageInfo);
		}

		return array(
			"listing_id" => $listingID,
			"created_correctly" => $insertListing and $insertListingDetail and $insertAddress and $insertListingImage
		);

	}

	//WORKS
	public static function createUpdateListingResponse($listingID, $newListingInformation) {
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingID, "listingId");

		$addressRepo = RepositoryFactory::createRepository("address");
        $arrayOfAddresses = $addressRepo->find($listingID, "listingId");

        $listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingId");

		$listingDetail = $newListingInformation["listing_detail"];
		$address = $newListingInformation["address"];

		$listingObject = $arrayOfListingObjects[0];
		$listingObject->setPrice($newListingInformation["listing_price"]);
		$listingObject->setType($newListingInformation["listing_type"]);

		$listingDetailObject = $arrayOfListingDetailObjects[0];
		$listingDetailObject->setNumberOfBedrooms($listingDetail["listing_numBedrooms"]);
		$listingDetailObject->setNumberOfBathrooms($listingDetail["listing_numBathrooms"]);
		$listingDetailObject->setInternet($listingDetail["listing_internet"]);
		$listingDetailObject->setPetPolicy($listingDetail["listing_pet_policy"]);
		$listingDetailObject->setElevatorAccess($listingDetail["listing_elevator_access"]);
		$listingDetailObject->setFurnishing($listingDetail["listing_furnishing"]);
		$listingDetailObject->setAirConditioning($listingDetail["listing_air_conditioning"]);
		$listingDetailObject->setDescription($listingDetail["listing_description"]);

		$addressObj = new Address();
		$addressObj->setId($listingID);
		$addressObj->setApproximateAddress($address["approximateAddress"]);
		$addressObj->setStreetName($address["streetName"]);
		$addressObj->setCity($address["city"]);
		$addressObj->setZipcode($address["zipcode"]);
		$addressObj->setState($address["state"]);			
		
		$insertAddress = $addressRepo->update($addressObj);
		$insertListingDetails = $listingDetailRepo->update($listingDetailObject);
		$insertListing = $listingRepo->update($listingObject);

		$listingImageInfo = $listingInformation["listing_image"];

		$insertListingImage = true;
		if($listingImageInfo["image"] != null) {
			$insertListingImage = ListingImageResponseCreator::createNewListingImageResponse($listingID, $listingImageInfo);
		}

		return $insertAddress and $insertListingDetails and $insertListing and $insertListingImage;
	}
}