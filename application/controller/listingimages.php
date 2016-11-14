<?php
// Class ListingImages

class ListingImages extends Controller{
	public function index(){
		require APP . 'view/_templates/header.php';
		require APP . 'view/home/index.php';
		require APP . 'view/_templates/footer.php';
	}

	//getImages
	//Get Images based on listingID
	public function getImages($listingID){

		$listingImageRepo = RepositoryFactory::createRepository("listing_image");
		$arrayofListingImageObjects = $listingImageRepo->find($listingID, "listingId");
		
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
		$listingImageRepo = RepositoryFactory::createRepository("listing_image");
		$arrayofListingImageObjects = $listingImageRepo->find($listingID, "listingId");

		if ($arrayofListingImageObjects == null){
			$errorMessage = "Could not find Listing";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			foreach ($arrayofListingImageObjects as $listingImage){
				$listingImageRepo->remove($listingImage);
			}
		}

	}
	//uploadImages
	//Uploads new listing images to listing ID
	public function uploadImages($listingID){
		$listingImageRepo = RepositoryFactory::createRepository("listingImage");
		$arrayofListingImageObjects = $listingImageRepo->find($listingID, "listingId");

		if ($arrayofListingImageObjects == null){
			$errorMessage = "Error listing not found."
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			$arrayofListingImageObjects[0]->setImageThumbNail($_POST["listing_image_thumbnail"]);
			$arrayofListingImageObjects[0]->setImage($_POST["listing_image"]);
		}

	}
} 