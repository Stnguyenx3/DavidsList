<?php

/*
 * THIS FILE IS NOW DEPRECATED
 * THE REASON WHY THIS FILE IS DEPRECATED IS BECAUSE WE DON'T WANT TO EXPOSE
 * USER IMAGES RANDOMLY. IT MUST GO THROUGH A USER TO GET AN IMAGE
 * ALSO ALL CONTROLLERS SHOULD CORRESPOND TO A PAGE
 */

/*
 *  Class: UserImages
 *   File: application/controller/userimages.php
 * Author: Paul Derugin
 *  
 * Controller for the UserImage class (model/user_image.php)
 * 
 * This class provides the following functionality:
 *   1) A function to get user images;
 *   2) A function to delete a user images;
 *   3) A function to upload user images;
 * 
 * Copyright (C) 2016, Paul Derugin
 */

class UserImages extends Controller{
	
	/**
	 * Gets all user associated images, given user ID.
	 * 
	 * @param int $userID
	 * 
	 * Returns an array of UserImage objects in the form of a JSON object
	 * 
	 * @status Appears to be working.
	 */
	public function getUserImages($userID){
        $userImagesRepo = RepositoryFactory::createRepository("user_image");
		$arrayOfUserImages = $userImagesRepo->find($userID, "userid"); // array of UserImage objects; each UserImage object has the following variables: $userid, $imageThmbnail, $image
		
        if ($arrayOfUserImages == null) {
            $errorMessage = "No user images for the specified user were found.";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php"; 
        }
		
		else {
			echo json_encode($arrayOfUserImages);
		} // end else
	} // end function getUserImages

	
	/**
	 * Deletes all of a user's associated images, given user ID.
	 * 
	 * @param int $userID
	 * 
	 * @todo Add validation to the function.
	 * 
	 * @status Tested and working.
	 */
	public function deleteUserImages($userID){
        $userImagesRepo = RepositoryFactory::createRepository("user_image");
		$arrayOfUserImages = $userImagesRepo->find($userID, "userid"); // array of UserImage objects; each UserImage object has the following variables: $userid, $imageThmbnail, $image
		
        if ($arrayOfUserImages == null) {
            $errorMessage = "No user images for the specified user were found.";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php"; 
        }

		else{
			foreach ($arrayOfUserImages as $userImage) {
				$userImagesRepo->remove($userImage);
			}
			
			//TODO - test to make sure all user images were deleted
		} // end else
	} // end function deleteUserImages
	
	
	/**
	 * Uploads a new user image to user, given user ID.
	 * 
	 * @param int $userID
	 * 
	 * External data is JSON object containing the following key-value pairs:
	 *     'userid' => $this->userid,
     *     'imageThumbnail' => $this->imageThumbnail,
	 * 
	 * @todo Some error checking / validation.
	 * 
	 * @status Needs to be tested.
	 */
	public function uploadImage($userID){
		// build the UserImage object using the external JSON data
		$image = explode(",", $_POST["image"]);
		$userImage = new UserImage();
		$userImage->setId($_POST("userid")); //Probably don't need to send $_POST
		$userImage->setImage(ImageResizeUtil::resizeImage($image[1]));
		$userImage->setImage(base64_decode($image[1]));

		// add the UserImage to the DB
        $userImagesRepo = RepositoryFactory::createRepository("user_image");		
		$userImagesRepo->save($userImage);
	} // end function uploadImage

} // end class UserImages
