<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index(){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function search() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/search.php';
        require APP . 'view/_templates/footer.php';
    }

    public function rentout() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/rentout.php';
        require APP . 'view/_templates/footer.php';
    }

    public function about() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/about.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function login() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/login.php';
        require APP . 'view/_templates/footer.php';
	}
	
	public function register() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/register.php';
        require APP . 'view/_templates/footer.php';
	}
}
