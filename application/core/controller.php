<?php

class Controller {

	function __construct() {
		//require all the models used in the application
		session_start();
		require APP . "model/response_creator/user_image_response_creator.php";
		require APP . "model/response_creator/user_response_creator.php";
		require APP . "model/response_creator/listing_image_response_creator.php";
		require APP . "model/response_creator/listings_response_creator.php";
		require APP . "model/util/email_validator_util.php";
		require APP . "model/util/image_resize_util.php";
		require APP . "model/repositories/database_repository_interface.php";
		require APP . "model/repositories/listing_image_repository.php";
		require APP . "model/repositories/user_image_repository.php";
		require APP . "model/repositories/listing_repository.php";
		require APP . "model/repositories/message_repository.php";
		require APP . "model/repositories/user_repository.php";
		require APP . "model/repositories/favorite_listing_repository.php";
		require APP . "model/repositories/listing_detail_repository.php";
		require APP . "model/repositories/address_repository.php";

		//Requires all the necessary php files
		foreach (glob(APP . "model/*.php") as $file) {
			require $file;
		}
	}
}
