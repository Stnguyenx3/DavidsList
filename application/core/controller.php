<?php

class Controller{

    function __construct() {
        //require all the models used in the application
        session_start();
        require APP . "model/model.php";
        require APP . "model/repositories/database_repository_interface.php";
        require APP . "model/repositories/all_query_interface.php";
        require APP . "model/repositories/listing_image_repository.php";
		require APP . "model/repositories/user_image_repository.php";
		require APP . "model/repositories/listing_repository.php";
		require APP . "model/repositories/user_repository.php";
        require APP . "model/repositories/favorite_listing_repository.php";
        require APP . "model/repositories/listing_detail_repository.php";
        require APP . "model/repositories/address_repository.php";

        //Requires all the necessary php files
        foreach(glob(APP . "model/*.php") as $file){
            if($file != APP . "model/model.php")
                require $file;
		}
    }
}
