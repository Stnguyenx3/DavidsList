<?php

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
		$newListingImage = new ListingImage();

		$image = explode(",", $listingImageInfo["image"]);
		$newListingImage->setListingId($listingID);
		$newListingImage->setImage(base64_decode($image[1]));
		$newListingImage->setImageThumbNail(ImageResizeUtil::resizeImage($image[1]));
		$insertListingImage = $listingImageRepo->save($newListingImage);

		return $insertListingImage;
	}
}