<?php

/*
 *  Class: ListingImageResponseCreator
 *   File: application/model/response_creator/listing_image_response_creator.php
 * Author: David Chau
 * 
 * 
 * This class provides back-end logic functionality, to try and ease the amount
 * of computation the controller has to do. It calls upon the ListingImage repository
 * and either fetches, creates, updates, or deletes listing images and return
 * the responses from each of those actions.
 * 
 * 
 * Copyright (C) 2016, David Chau
 */

class ListingImageResponseCreator {
	public static function createGetListingImageResponse($listingID) {
		$listingImageRepo = RepositoryFactory::createRepository("listing_image");
		$arrayofListingImageObjects = $listingImageRepo->find($listingID, "listingID");

		return $arrayofListingImageObjects;
	}

	public static function createDeleteListingImageResponse($listingID) {
		$listingImageRepo = RepositoryFactory::createRepository("listing_image");
		$arrayofListingImageObjects = $listingImageRepo->find($listingID, "listingID");

		$removedCorrectlyImages = true;
		foreach($arrayofListingImageObjects as $listingImage) {
			$deletedImages = $listingImageRepo->remove($listingImage);
			$removedCorrectlyImages =  $removedCorrectlyImages and $deletedImages;
		}

		return $removedCorrectlyImages;
	}

	public static function createNewListingImageResponse($listingID, $listingImageInfo) {
		$listingImageRepo = RepositoryFactory::createRepository("listing_image");
		$listingImageArray = $listingImageInfo["image"];
		$insertListingImage = true;

		foreach($listingImageArray as $listingImage) {
			$newListingImage = new ListingImage();

			$image = explode(",", $listingImage);
			$newListingImage->setListingId($listingID);
			$newListingImage->setImage(base64_decode($image[1]));
			$newListingImage->setImageThumbNail(ImageResizeUtil::resizeImage($image[1]));
			$insertListingImage = $insertListingImage and $listingImageRepo->save($newListingImage);
		}

		return $insertListingImage;
	}
}