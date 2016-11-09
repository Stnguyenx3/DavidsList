<?php

/*
 * Class AddressesController
 * 
 * Controller for the Address class (model/address.php)
 * 
 * This class provides the following functionality:
 *   1) A function to create a new address related to a listing ID 
 *   2) A function to search addresses based on JSON data
 *   3) A function to delete an address related to a listing ID
 *   4) A function to update an address related to a listing ID
 * 
 * Note that an Address object contains the following variables
 * 	 private $listingId;
 *	 private $approximateAddress;
 *	 private $streetName;
 *	 private $city;
 *	 private $zipcode;
 *	 private $state;
 * 
 * TODO:
 *   - Ask David if it's necessary to be passing $listingId as a parameter since I 
 *     assume we are using JSON objects everywhere anyway, and perhaps they can
 *     (or maybe should) contain them?
 * 
 *   - Ask David to clarify what some of these functions are supposed to do (see
 *     questions in comments at the top of each function).
 * 
 *   - Test all functions
 */

class Addresses extends Controller{
	
	/**
	 * Creates a new address related to a listing ID.
	 * 
	 * @param int $listingId
	 * 
	 * External data is JSON object containing everythign that goes into an
	 * address (?)
	 */
	public function createAddress($listingId){
		// build Address object from external JSON data
		$address = new Address();
		$address->setId($listingId);
		$address->setApproximateAddress($POST("approximateAddress"));
		$address->setStreetName($_POST("streetName"));
		$address->setCity($_POST("city"));
		$address->setZipcode($_POST("zipcode"));
		$address->setState($_POST("state"));
		
		// add the Address to the DB
        $addressRepo = RepositoryFactory::createRepository("address");		
		$addressRepo->save($address);
	} // end function createAddress
	
	
	/**
	 * Searches addresses based on JSON data.
	 * 
	 * What is in the JSON data?
	 * 
	 * What happens when a match is found?
	 * 
	 * What is returned?
	 */
	public function searchByAddress(){
		
	} // end function searchByAddress
	
	
	/**
	 * API says "Deletes adresses relating to a listing id." So this funciton should
	 * handle potentially deleting multiple addresses as a result of a single call?
	 * I would assume that a single address cannot be used for more than one
	 * listing, right? For now I am just having it delete a single Address object. 
	 * 
	 * @param int $listingId
	 */
	public function deleteAddress($listingId){
		// find Address object from the provided $listingId
        $addressRepo = RepositoryFactory::createRepository("user");
        $arrayOfAddresses = $addressRepo->find($listingId, "listingId");

        if ($arrayOfAddresses == null) {
			$errorMessage = "Address for listingID {$listingId} not found";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php"; 
        }
		else {
			$addressRepo->remove($arrayOfAddresses[0]);
			
			//TODO - check to make sure it was really removed
			
			// display page indicating successful removal of address
            require APP . "view/_templates/header.php";
            require APP . "view/addresses/address_delete_success.php";
            require APP . "view/_templates/footer.php"; 			
        } // end else		
	} // end function deleteAddress
	
	
	/**
	 * Same question as previous function--does this need to handle updating
	 * multiple addresses relating to a single listing ID? For now, this function 
	 * updates one Address object at a time.
	 * 
	 * @param int $listingId
	 * 
	 * Assuming there should be some external JSON data? If yes, what does it look
	 * like?
	 * 
	 */
	public function updateAddress($listingId){
		// find Address object from the provided $listingId
        $addressRepo = RepositoryFactory::createRepository("user");
        $arrayOfAddresses = $addressRepo->find($listingId, "listingId");
		
        if ($arrayOfAddresses == null) {
			$errorMessage = "Address for listingID {$listingId} not found";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php"; 
        }
		else {
			// Assuming there is external JSON data that contains all class
			// variables of an Address object. Then build Address object from 
			// external JSON data
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
			
			// TODO - communicate success to the user		
        } // end else			
	} // end function udpateAddress
} // end class FavoritesListingsController