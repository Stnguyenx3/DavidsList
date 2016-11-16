<?php
// Class ListingImages

class ListingImages extends Controller{

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
		$listingImageRepo = RepositoryFactory::createRepository("listing_image");
		$newListingImage = new ListingImage();

		if ($arrayofListingImageObjects == null){
			$errorMessage = "Error listing not found.";
			require APP . 'view/_templates/header.php';
			require APP . 'view/problem/error_page.php';
			require APP . 'view/_templates/footer.php';
		}

		else{
			$image = explode(",",$_POST["listing_image"]);
			$newListingImage->setListingId($listingID);
			$newListingImage->setImage(base64_decode($image[1]));
			$newListingImage->setImageThumbNail(ImageResizeUtil::resizeImage($image[1]));

			$listingImageRepo->save($newListingImage);
		}

	}
} 