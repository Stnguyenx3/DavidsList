<?php

class Controller{

    function __construct() {
        //require all the models used in the application
        session_start();

        //Requires all the necessary php files
        foreach(glob(APP . "model/*.php") as $file){
            require $file;
}
    }
}
