<?php

class UserImageResponseCreator {
	public static function createGetUserImageResponse($userID) {
		$userImageRepo = RepositoryFactory::createRepository("user_image");
		$arrayofUserImageObjects = $userImageRepo->find($userID, "userid");

		return $arrayofUserImageObjects;
	}

	public static function createDeleteUserImageResponse($userID) {
		$userImageRepo = RepositoryFactory::createRepository("user_image");
		$arrayOfUserImageObjects = $userImageRepo->find($userID, "userid");

		$removedCorrectlyImages = true;
		foreach($arrayOfUserImageObjects as $userImage) {
			$deletedImages = $userImageRepo->remove($userImage);
			$removedCorrectlyImages =  $removedCorrectlyImages and $deletedImages;
		}

		return $removedCorrectlyImages;
	}

	public static function createNewUserImageResponse($userID, $userImageInfo) {
		$userImageRepo = RepositoryFactory::createRepository("user_image");

		$image = explode(",", $userImageInfo["image"]);
		$newUserImage->setListingId($userID);
		$newUserImage->setImage(base64_decode($image[1]));
		$newUserImage->setImageThumbNail(ImageResizeUtil::resizeImage($image[1]));
		$insertUserImage = $userImageRepo->save($newUserImage);

		return $insertListingImage;
	}
}