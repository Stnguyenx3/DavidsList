<?php

/*
 *  Class: ListingResponseCreator
 *   File: application/model/response_creator/listing_response_creator.php
 * Author: David Chau
 * 
 * 
 * This class provides back-end logic functionality, to try and ease the amount
 * of computation the controller has to do. It calls upon the Listings repository
 * and either fetches, creates, updates, or deletes listings and return
 * the responses from each of those actions.
 * 
 * Additionally, it calls upon repositories related to listings and does database calls
 * all in one sitting
 * 
 * Copyright (C) 2016, David Chau
 */

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

		if(empty($arrayOfListingObjects)) {
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

		// return array(
		// 	"listings" => array_slice($allListings, 0, 6),
		// 	"addresses" => array_slice($allAddresses, 0, 6),
		// 	"listing_details" => array_slice($allListingDetails, 0, 6),
		// );
		return array(
			"listings" => $allListings,
			"addresses" => $allAddresses,
			"listing_details" => $allListingDetails,
		);
	}

	//WORKs
	public static function createDeleteListingResponse($listingID) {
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingID, "listingId");

		$addressRepo = RepositoryFactory::createRepository("address");
        $arrayOfAddresses = $addressRepo->find($listingID, "listingId");

        //Delete images related to listing
        $removedCorrectlyImages = ListingImageResponseCreator::createDeleteListingImageResponse($listingID);

		$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
		$arrayOfListingDetailObjects = $listingDetailRepo->find($listingID, "listingId");

		//Delete listing
		$removedCorrectlyListing = $listingRepo->remove($arrayOfListingObjects[0]);
		//delete address related to listing
		$removedCorrectlyAddress = $addressRepo->remove($arrayOfAddresses[0]);
		//delete details related to listing
		$removedCorrectlyDetails = $listingDetailRepo->remove($arrayOfListingDetailObjects[0]);
		//delete messages related to listing
		//TODO

		$favoriteListing = new FavoriteListing();
		$favoriteListing->setUserId(1);
		$favoriteListing->setListingId($listingID);
		
		// remove the FavoriteListing from the DB
        $favoriteListingsRepo = RepositoryFactory::createRepository(
				"favorite_listing");		
		$favoriteListingsRepo->remove($favoriteListing);	

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
		$listing->setTitle($listingInformation["listing_title"]);

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
		$address->setDistance("2.1");
	
		$insertAddress = $addressRepo->save($address);

		$listingImageInfo = $listingInformation["listing_image"];

		$insertListingImage = true;
		if(array_key_exists("image", $listingImageInfo)) {
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
		$listingObject->setTitle($newListingInformation["listing_title"]);

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

		$listingImageInfo = $newListingInformation["listing_image"];

		$insertListingImage = true;
		if(array_key_exists("image", $listingImageInfo)) {
			$insertListingImage = ListingImageResponseCreator::createNewListingImageResponse($listingID, $listingImageInfo);
		}

		return $insertAddress and $insertListingDetails and $insertListing and $insertListingImage;
	}
}