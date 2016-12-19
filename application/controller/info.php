<?php

/**
 * Class Info
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Info extends Controller{
    /**
     * PAGE: all static information pages **/
  
    public function privacy() {
        if(isset($_SESSION["email"])) {
            $userRepo = RepositoryFactory::createRepository("user");
            $arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");
            require APP . "view/_templates/logged_in_header.php";
        } else {
            require APP . 'view/_templates/header.php';
        }

        require APP . 'view/info/privacy.php';
        require APP . 'view/_templates/footer.php';
    }

    public function contact() {
        if(isset($_SESSION["email"])) {
            $userRepo = RepositoryFactory::createRepository("user");
            $arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");
            require APP . "view/_templates/logged_in_header.php";
        } else {
            require APP . 'view/_templates/header.php';
        }

        require APP . 'view/info/contact.php';
        require APP . 'view/_templates/footer.php';
    }

    public function about() {
        if(isset($_SESSION["email"])) {
            $userRepo = RepositoryFactory::createRepository("user");
            $arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");
            require APP . "view/_templates/logged_in_header.php";
        } else {
            require APP . 'view/_templates/header.php';
        }
        
        require APP . 'view/info/about.php';
        require APP . 'view/_templates/footer.php';
    }
}
