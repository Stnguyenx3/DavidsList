<?php

/*
 *  Class: UserImageResponseCreator
 *   File: application/model/response_creator/user_image_response_creator.php
 * Author: David Chau
 * 
 * 
 * This class provides back-end logic functionality, to try and ease the amount
 * of computation the controller has to do. It calls upon the UserImage repository
 * and either fetches, creates, updates, or deletes user images and return
 * the responses from each of those actions.
 * 
 * 
 * Copyright (C) 2016, David Chau
 */

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
		$arrayOfUserImages = $userImageRepo->find($userID, "userid");
		$newUserImage = new UserImage();

		$image = explode(",", $userImageInfo["image"]);
		$newUserImage->setId($userID);
		$newUserImage->setImage(base64_decode($image[1]));
		$newUserImage->setImageThumbNail(ImageResizeUtil::resizeImage($image[1]));

		$insertUserImage;
		if(empty($arrayOfUserImages)) {
			$insertUserImage = $userImageRepo->save($newUserImage);
		} else {
			$insertUserImage = $userImageRepo->update($newUserImage);
		}

		return $insertUserImage;
	}
}