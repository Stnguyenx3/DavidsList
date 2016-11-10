<?php

/*
 * Class UsersImages
 * 
 * Controller for the UserImage class (model/user_image.php)
 * 
 * This class provides the following functionality:
 *   1) A function to get user images;
 *   2) A function to delete a user images;
 *   3) A function to upload user images;
 * 
 */

class UserImages extends Controller{
	
	/**
	 * Gets all user associated images, given user ID.
	 * 
	 * @param int $userID
	 * 
	 * Returns an array of UserImage objects in the form of a JSON object
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
			
//			D O N ' T  T H I N K  W E  N E E D  T H I S ?
//			
//			foreach ($arrayOfUserImages as $userImage) {
//				$tempHash = $userImage->jsonSerialize();
//				
//				// ===> UPDATE THE CODE FROM HERE
//				$imageThumbnail = $listingImageRepo->find($address->getListingId(), "listingID");
//				if (!empty($imageThumbnail)) {
//					$tempHash["imageThumbnail"] = base64_encode($imageThumbnail[0]->getImageThumbnail());
//				}
//
//				$returnArray[] = $tempHash;
//			}
//			echo json_encode($returnArray);

			// is it OK for the JSON object I return here to be an array of UserImage objects?
			echo json_encode($arrayOfUserImages);
		} // end else
	} // end function getUserImages

	
	/**
	 * Deletes all of a user's associated images, given user ID.
	 * 
	 * @param int $userID
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
	 * [DELETED@param int $userID]
	 * 
	 * External data is JSON object containing the following ket-value pairs:
	 *     'userid' => $this->userid,
     *     'imageThumbnail' => $this->imageThumbnail,
     *     'image' => $this->image
	 * 
	 * @todo Some error checking / validation.
	 */
	public function uploadImage(){
		// build the UserImage object using the external JSON data
		$userImage = new UserImage();
		$userImage->setId($_POST("userid"));
		$userImage->setImage($_POST("imageThumbnail"));
		$userImage->setImage($_POST("image"));
		
		// add the UsserImage to the DB
        $userImagesRepo = RepositoryFactory::createRepository("user_image");		
		$userImagesRepo->save($userImage);
	} // end function uploadImage
} // end class UserImagesController
