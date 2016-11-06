<?php
// Class ListingImages

class ListingImages extends Controller{
	public function index(){
		require APP . 'view/_templates/header.php';
		require APP . 'view/home/index.php';
		require APP . 'view/_templates/footer.php';
	}

	//getImages
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
	public function uploadImages($listingID){
		//do I want to be navigating to this parameter? Or do I want to use it to set
		//a listing?
		$listingImageRepo = RepositoryFactory::createRepository("listingImage");
		$arrayofListingImageObjects = $listingImageRepo->find($listingID, "listingImage");

		if ($arrayofListingImageObjects == null){
			require APP . 'view/problem/error_page.php';
		}

		else{
			//something to do to upload image?
		}

	}
} 