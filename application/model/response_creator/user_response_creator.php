<?php

/*
 *  Class: UserResponseCreator
 *   File: application/model/response_creator/user_response_creator.php
 * Author: David Chau
 * 
 * 
 * This class provides back-end logic functionality, to try and ease the amount
 * of computation the controller has to do. It calls upon the User repository
 * and either fetches, creates, updates, or deletes users and return
 * the responses from each of those actions.
 * 
 * Additionally does CRUD calls for user images if applicable.
 * 
 * Copyright (C) 2016, David Chau
 */

class UserResponseCreator {
	public static function createGetUserResponse($userID) {
		$userRepo = RepositoryFactory::createRepository("user");
		$arrayOfUserObjects = $userRepo->find($userID, "userid");

		if(empty($arrayOfUserObjects)) {
			return null;
		}

		return $arrayOfUserObjects[0];
	}

	public static function createGetUserProfileResponse($userID) {
		$user = UserResponseCreator::createGetUserResponse($userID);

		if($user != null) {
			$userImages = UserImageResponseCreator::createGetUserImageResponse($userID);
		
			return array(
				"user" => $user,
				"user_images" => $userImages
			);
		}
	}

	public static function createDeleteUserProfileResponse($userID) {
		$userRepo = RepositoryFactory::createRepository("user");
		$arrayOfUserObjects = $userRepo->find($userID, "userid");

		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($userID, 'userid');

		$favoriteListingRepo = RepositoryFactory::createRepository("favorite_listing");
		$arrayOfFavoriteListingObjects = $favoriteListingRepo->find($userID, 'userid');

		//delete from user table
		$deletedUser = $userRepo->remove($arrayOfUserObjects[0]);

		//delete from user image table
		$deletedUserImages = UserImageResponseCreator::createDeleteUserImageResponse($userID);

		$deletedListings = true;

		//delete from listings table + related tables (address, details, listing images, and messages)
		foreach($arrayOfListingObjects as $listingObject) {
			ListingsResponseCreator::createDeleteListingResponse($listingObject->getListingId());
		}

		//delete from favorites
		//TODO: Need to reimplement removing for favorite listing object
		foreach($arrayOfFavoriteListingObjects as $favoriteListingObjects) {
			// $favoriteListingRepo->remove
		}

		return $deletedUser and $deletedUserImages;
	}

	public static function createEditUserProfileResponse($userID, $newUserInformation) {
		$userRepo = RepositoryFactory::createRepository("user");
		$user = $userRepo->find($userID, "userid")[0];

		// $user->setEmail($newUserInformation["email"]);
		// $user->setUsername($newUserInformation["username"]);
		// $user->setFirstname($newUserInformation["firstname"]);
		// $user->setLastname($newUserInformation["lastname"]);
		// $user->setStudentId($newUserInformation["studentID"]);
		$user->setPhone($newUserInformation["phone"]);
		$user->setBiography($newUserInformation["bio"]);
		// $user->setPassword($newUserInformation["password"]);
		// $user->setVerified(EmailValidatorUtil::validateEmail($newUserInformation["email"]));


		if(array_key_exists("user_image", $newUserInformation)) {
			$userImages = UserImageResponseCreator::createNewUserImageResponse($userID, 
													$newUserInformation["user_image"]);
		}
		
		return $userRepo->update($user);
	}

	public static function createNewUserProfileResponse($userInformation) {
		$userRepo = RepositoryFactory::createRepository("user");

		$arrayOfUserObjects = $userRepo->find($userInformation["email"], "email");

		if(!empty($arrayOfUserObjects)) {
			return null;
		} else {
			$user = new User();

			$user->setEmail($userInformation["email"]);
			$user->setUsername($userInformation["username"]);
			$user->setFirstname($userInformation["firstname"]);
			$user->setLastname($userInformation["lastname"]);
			$user->setStudentId("Nothing");
			$user->setPhone("Nothing");
			$user->setBiography("Nothing yet");
			$user->setPassword(password_hash($userInformation["password"], PASSWORD_DEFAULT));
			$user->setVerified(EmailValidatorUtil::validateEmail($userInformation["email"]));
			
			return $userRepo->save($user);
		}
	}
}