<?php

/**
 * Class User
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class UserProfile extends Controller{
    /**
     * PAGE: all static information pages **/
  
    public function index() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/userProfile/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function favorites() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/userProfile/favorites.php';
        require APP . 'view/_templates/footer.php';
    }

    public function favorites() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/userProfile/listing.php';
        require APP . 'view/_templates/footer.php';
    }

}
