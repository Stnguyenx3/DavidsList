<?php

class UserResponseCreator {
	public static function createGetUserResponse($userID) {
		$userRepo = RepositoryFactory::createRepository("user");
		$arrayOfUserObjects = $userRepo->find($userID, "userid");

		if(count($arrayOfUserObjects) == 0) {
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

		$deletedUser = $userRepo->remove($arrayOfUserObjects[0]);

		$deletedUserImages = UserImageResponseCreator::createDeleteUserResponse($userID);

		return $deletedUser and $deletedUserImages;
	}

	public static function createEditUserProfileResponse($userID, $newUserInformation) {
		$userRepo = RepositoryFactory::createRepository("user");

		$user = new User();

		$user->setId($userID);
		$user->setEmail($newUserInformation["email"]);
		$user->setUsername($newUserInformation["username"]);
		$user->setFirstname($newUserInformation["firstname"]);
		$user->setLastname($newUserInformation["lastname"]);
		$user->setStudentId($newUserInformation["studentID"]);
		$user->setPhone($newUserInformation["phone"]);
		$user->setBiography($newUserInformation["bio"]);
		$user->setPassword($newUserInformation["password"]);
		$user->setVerified(EmailValidatorUtil::validateEmail($newUserInformation["email"]));
		
		return $userRepo->update($user);
	}

	public static function createNewUserProfileResponse($userInformation) {
		$userRepo = RepositoryFactory::createRepository("user");

		$arrayOfUserObjects = $userRepo->find($userInformation["email"], "email");

		if(count($arrayOfUserObjects) != 0) {
			return null;
		}

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