<?php

/*
 *  Class: Messages
 *   File: application/controller/messages.php
 * Author: Paul Derugin
 * 
 * Controller for the Message class (model/message.php)
 * 
 * This class provides functions for creating, getting, and deleting messages.
 * 
 * TODO - Create the functions for getting messages and converstions/threads.
 * 
 * Copyright (C) 2016, Paul Derugin
 */

class Messages extends Controller{
	
	/**
	 * Creates a message.
	 * 
	 * External data is JSON object containing all attributes of a message
	 */
	public function createMessage(){
		// build the Message object from external JSON data
		$message = new Message();
		$message->setId($_POST["listingId"]);
		//Get senderId from session
		$message->setSenderUserId($_POST["senderUserId"]);
		//get recipient from listing
		$message->setRecipientUserId($_POST["recipientUserId"]);
		$message->setMessage($_POST["message"]);
		
		// add the message to the DB
		$messageRepo = RepositoryFactory::createRepository("message");
		$messageRepo->save($message);
	} // end function createMessage()
	
	public function getConversation($listingId){
		$messageRepo = RepositoryFactory::createRepository("message");
		$arrayOfMessageObjects = $messageRepo->find($listingId, "listingId");

		if(!empty($_SESSION)) {
    		$userRepo = RepositoryFactory::createRepository("user");
        	$arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");

            require APP . "view/_templates/logged_in_header.php";
    	} else {
    		require APP . "view/_templates/header.php";
    	}

    	require APP . 'view/users/messages.php';
      	require APP . 'view/_templates/footer.php';
	}
	
	public function getMessagesThread(){
		$messageRepo = RepositoryFactory::createRepository("message");
		$allMessageObjects = $messageRepo->fetch();

		// Build temporary array for array_unique
		$tmp = array();
		foreach($allMessageObjects as $k => $v)
		    $tmp[$k] = $v->getListingId();

		//Reverse the array since the newer messages(towards the end) are what we want
		$tmp = array_reverse($tmp);

		// Find duplicates in temporary array
		$tmp = array_unique($tmp);

		// Remove the duplicates from original array
		foreach($allMessageObjects as $k => $v){
		    if (!array_key_exists($k, $tmp))
		        unset($array[$k]);
		}
	}
	
	/**
	 * Deletes a message.
	 * 
	 * External data is JSON object containing the listing id
	 * 
	 * @todo Consider adding some sort of error checking / validaiton inside
	 * this function?
	 */	
	public function deleteMessage(){
		// remove the message from the DB
		$messageRepo = RepositoryFactory::createRepository("message");
		$arrayOfMessageObjects = $messageRepo->find($_POST["listingId"], "listingId");
		$messageRepo->remove($arrayOfMessageObjects[0]);		
	} // end function deleteMessage()
} // end class Messages