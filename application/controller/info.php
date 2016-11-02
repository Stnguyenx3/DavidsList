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
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/privacy.php';
        require APP . 'view/_templates/footer.php';
    }

    public function contact() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/contact.php';
        require APP . 'view/_templates/footer.php';
    }

    public function about() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/about.php';
        require APP . 'view/_templates/footer.php';
    }
}
