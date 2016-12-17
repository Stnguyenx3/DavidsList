<?php

/*
 * THIS FILE IS NOW DEPRECATED
 * THE REASON WHY THIS FILE IS DEPRECATED IS BECAUSE WE DON'T WANT TO EXPOSE
 * LISTING IMAGES RANDOMLY. IT MUST GO THROUGH LISTING TO GET IMAGE
 * ALSO ALL CONTROLLERS SHOULD CORRESPOND TO A PAGE
 */

/*
 *  Class: ListingImages
 *   File: application/controller/listingimages.php
 * Author: Imran Irfan
 * 
 * Controller for the ListingDetail class (model/listing_image.php)
 * 
 * This class provides the following functionality:
 *   1) A function to get a list of listing images based on listingId
 *   2) A function to delete a list of listing images based on listingId
 *   3) A function to upload a list of listing images based on listingId
 * 
 * 
 * Copyright (C) 2016, Imran Irfan
 */

class ListingImages extends Controller{

	//getImages
	//Get Images based on listingID
	public function getImages($listingID){

		$arrayofListingImageObjects = ListingImageResponseCreator::createGetListingImageResponse($listingID);
		
		if ($arrayofListingImageObjects == null){
			
			$errorMessage = "Could not find Listing Images";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		
		}

		else if (!empty($arrayofListingImageObjects)){
			
			$tempHash["arrayofListingImageObjects"] = base64_encode($arrayofListingImageObjects[0]->getImageThumbnail());
			
			require APP . 'view/_templates/header.php';
			require APP . 'view/listings/listing_body.php';
			require APP . 'view/_templates/footer.php';
			
			$returnImage[] = $tempHash;

			echo json_encode($returnImage);
		
		}

	}

	//deleteImages
	//Delete Images based on listing ID
	public function deleteImages($listingID){
		$insertListingImage = ListingImageResponseCreator::createNewListingImageResponse($listingID);

		if (!$insertListingImage){
			$errorMessage = "Could not find Listing";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			//return statement
		}

	}
	//uploadImages
	//Uploads new listing images to listing ID
	public function uploadImages($listingID){
		$listingImageRepo = RepositoryFactory::createRepository("listing_image");
		$newListingImage = new ListingImage();

		if ($arrayofListingImageObjects == null){
			$errorMessage = "Error listing not found.";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			$insertListingImage = ListingImageResponseCreator::createNewListingImageResponse($_POST["listing_image"]);
		}

	}
} 