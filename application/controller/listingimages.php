<?php
// Class ListingImages

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