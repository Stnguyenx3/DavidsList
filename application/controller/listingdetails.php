<?php

/*
 * THIS FILE IS NOW DEPRECATED
 * THE REASON WHY THIS FILE IS DEPRECATED IS BECAUSE WE DON'T WANT TO EXPOSE
 * LISTING DETAILS RANDOMLY. IT MUST GO THROUGH LISTING TO GET LISTING DETAILS
 * ALSO ALL CONTROLLERS SHOULD CORRESPOND TO A PAGE
 */

/*
 *  Class: ListingDetails
 *   File: application/controller/listingdetails.php
 * Author: Imran Irfan
 * 
 * Controller for the ListingDetail class (model/listing_detail.php)
 * 
 * This class provides the following functionality:
 *   1) A function to get the details based on listingId
 *   2) A function to delete a listing detail based on listingId
 *   3) A function to update a listing detail based on listingId
 *   4) A functon to create a listing detail based on listingId
 * 
 * 
 * Copyright (C) 2016, Imran Irfan
 */

class ListingDetails extends Controller{

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

			json_encode($arrayOfListingDetaisObjects[0]);
			//Maybe return the object, probably call from listing
			//return $arrayOfListingDetaisObjects[0];

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
	public function createDetails($listingID, $listingDetail){
		$listingRepo = RepositoryFactory::createRepository("listing_detail");

		$listingDetail = new ListingDetail();

		$listingDetail->setListingId($listingID); //temp fix
		$listingDetail->setNumberOfBedrooms($listingDetail["listing_numBedrooms"]);
		$listingDetail->setNumberOfBathrooms($listingDetail["listing_numBathrooms"]);
		$listingDetail->setInternet($listingDetail["listing_internet"]);
		$listingDetail->setPetPolicy($listingDetail["listing_pet_policy"]);
		$listingDetail->setElevatorAccess($listingDetail["listing_elevator_access"]);
		$listingDetail->setFurnishing($listingDetail["listing_furnishing"]);
		$listingDetail->setAirConditioning($listingDetail["listing_air_conditioning"]);
		$listingDetail->setDescription($listingDetail["listing_description"]);

		$insertListingDetail = $listingRepo->save($listingDetail);

	}
	
}