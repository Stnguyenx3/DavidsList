<?php

/*
 * THIS FILE IS NOW DEPRECATED
 * THE REASON WHY THIS FILE IS DEPRECATED IS BECAUSE WE DON'T WANT TO EXPOSE
 * ADDRESS RANDOMLY. IT MUST GO THROUGH LISTING TO GET ADDRESS
 * ALSO ALL CONTROLLERS SHOULD CORRESPOND TO A PAGE
 */

/*
 *  Class: Addresses
 *   File: application/controller/addresses.php
 * Author: Paul Derugin
 * 
 * Controller for the Address class (model/address.php)
 * 
 * This class provides the following functionality:
 *   1) A function to create a new address related to a listing ID 
 *   2) A function to delete an address related to a listing ID
 *   3) A function to update an address related to a listing ID
 * 
 * The following functionality for this class has been abandoned, since the Search
 * controller basically performs the same thing:
 *	 - A function to search addresses based on JSON data  
 * 
 * Note that an Address object contains the following variables
 * 	 private $listingId;
 *	 private $approximateAddress;
 *	 private $streetName;
 *	 private $city;
 *	 private $zipcode;
 *	 private $state;
 * 
 * Copyright (C) 2016, Paul Derugin
 */

class Addresses extends Controller{
	
	/**
	 * Creates a new address related to a listing ID.
	 * 
	 * @param int $listingId
	 * 
	 * External data is JSON object containing everythign that goes into an
	 * address (?).
	 * 
	 * @status Needs to be tested.
	 */
	public function createAddress($listingId, $addressInfo){
		// build Address object from external JSON data
		$address = new Address();
		$address->setId($listingId);
		$address->setApproximateAddress($addressInfo["approximateAddress"]);
		$address->setStreetName($addressInfo["streetName"]);
		$address->setCity($addressInfo["city"]);
		$address->setZipcode($addressInfo["zipcode"]);
		$address->setState($addressInfo["state"]);
		
		// add the Address to the DB
        $addressRepo = RepositoryFactory::createRepository("address");		
		$addressRepo->save($address);
	} // end function createAddress
	
	
	public function getAddress($listingId) {
		$addressRepo = RepositoryFactory::createRepository("address");
        $arrayOfAddresses = $addressRepo->find($listingId, "listingId");
        echo json_encode($arrayOfAddresses[0]);
	}
	
	/**
	 * Deletes an address, given a listingID. 
	 * 
	 * @param int $listingId
	 * 
	 * @status Tested and working.
	 */
	public function deleteAddress($listingId){
		// find Address object from the provided $listingId
        $addressRepo = RepositoryFactory::createRepository("address");
        $arrayOfAddresses = $addressRepo->find($listingId, "listingId");

        if ($arrayOfAddresses == null) {
			$errorMessage = "Address for listingID {$listingId} not found";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php"; 
        }
		else {
			$addressRepo->remove($arrayOfAddresses[0]);
					
			// display page indicating successful removal of address
            require APP . "view/_templates/header.php";
            require APP . "view/addresses/address_delete_success.php";
            require APP . "view/_templates/footer.php"; 			
        } // end else		
	} // end function deleteAddress
	
	
	/**
	 * Updates a single Address object related to listing ID.
	 * 
	 * @param int $listingId
	 * 
	 * External data is a JSON object contining all variables of an
	 * address object.
	 * 
	 * @status Needs to be tested. 
	 */
	public function updateAddress($listingId){
		// find Address object from the provided $listingId
        $addressRepo = RepositoryFactory::createRepository("address");
        $arrayOfAddresses = $addressRepo->find($listingId, "listingId");
		
        if ($arrayOfAddresses == null) {
			$errorMessage = "Address for listingID {$listingId} not found";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php"; 
        }
		else {
			// Build new Address object from external JSON data
			$address = new Address();
			$address->setId($listingId);
			$address->setApproximateAddress($POST("approximateAddress"));
			$address->setStreetName($_POST("streetName"));
			$address->setCity($_POST("city"));
			$address->setZipcode($_POST("zipcode"));
			$address->setState($_POST("state"));			
			
			// Use the newly created Address object to update the Address object we
			// found earlier
			$addressRepo->update($address);
				
        } // end else			
	} // end function udpateAddress

	public function updateDistance($listingId) {
		$addressRepo = RepositoryFactory::createRepository("address");
        $arrayOfAddresses = $addressRepo->find($listingId, "listingId");

        $address = $arrayOfAddresses[0];
        $address->setDistance($_POST["distance"]);
        $addressRepo->update($address);
	}

} // end class FavoritesListingsController