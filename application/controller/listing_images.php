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

		$listingImageRepo = RepositoryFactory::createRepository("listingImage");
		$arrayofListingImageObjects = $listingImageRepo->find($listingID, "listingImage");
		if ($arrayofListingImageObjects == null){
			require APP . 'view/problem/error_page.php';
		}

		else {
			$returnImage = $arrayofListingImageObjects[0]->getImage();
			imagejpeg($returnImage);

			//free up memory
			imagedestroy($returnImage);
		}

	}

	//deleteImages
	//Delete Images based on listing ID
	public function deleteImages($listingID){
		$listingImageRepo = RepositoryFactory::createRepository("listingImage");
		$arrayofListingImageObjects = $listingImageRepo->find($listingID, "listingImage");

		if ($arrayofListingImageObjects == null){
			require APP . 'view/problem/error_page.php';
		}

		else{
			$destroyImage = $arrayofListingImageObjects[0]->getImage();
			$arrayofListingImageObjects[0]->remove($destroyImage);
		}

	}
	//uploadImages
	//Uploads new listing images to listing ID
	public function uploadImages($listingID){
		$listingImageRepo = RepositoryFactory::createRepository("listingImage");
		$arrayofListingImageObjects = $listingImageRepo->find($listingID, "listingImage");

		if ($arrayofListingImageObjects == null){
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