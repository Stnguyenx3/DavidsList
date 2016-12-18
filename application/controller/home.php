<?php

/**
 * Class Home
 * 
 * Controller for the home page.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended)
 *  __construct of the class. This is really weird behaviour, but documented here: 
 * http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index 
     * (which is the default page btw)
     */
    public function index(){

        $newListings = ListingsResponseCreator::createGetAllListingResponse();
        $newListingImages = array();
        foreach($newListings["listings"] as $listing) {

            $image = ListingImageResponseCreator::createGetListingImageResponse($listing->getListingId())[0];

            $newListingImages[] = 
               "data:image/png;base64," . base64_encode($image->getImageThumbNail());
        }
        $size = count($newListings["addresses"])-1;
        // $indexOne = mt_rand(0, $size);
        // $indexTwo = mt_rand(0, $size);
        // $indexThree = mt_rand(0, $size);
        // $indexFour = mt_rand(0, $size);
        // $indexFive = mt_rand(0, $size);
        // $indexSix = mt_rand(0, $size);

        $indexOne = count($newListings["addresses"])-1;
        $indexTwo = count($newListings["addresses"])-2;
        $indexThree = count($newListings["addresses"])-3;
        $indexFour = count($newListings["addresses"])-4;
        $indexFive = count($newListings["addresses"])-5;
        $indexSix = count($newListings["addresses"])-6;
        // load views

        if(isset($_SESSION["email"])) {
            $userRepo = RepositoryFactory::createRepository("user");
            $arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");
            require APP . "view/_templates/logged_in_header.php";
        } else {
            require APP . 'view/_templates/header.php';
        }

        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function rentout() {
        if(!isset($_SESSION["email"])) {
            $_SESSION["previous_url"] = URL . 'home/rentout';
            header('Location: ' . URL . 'home/login/');
        } else {
            $userRepo = RepositoryFactory::createRepository("user");
            $arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");
            require APP . "view/_templates/logged_in_header.php";
            require APP . 'view/listings/rentout.php';
            require APP . 'view/_templates/footer.php';
        }
    }

	public function login() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/login.php';
        require APP . 'view/_templates/footer.php';
	}
	
	public function register() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/register.php';
        require APP . 'view/_templates/footer.php';
	}

}
