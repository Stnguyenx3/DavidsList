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
	//Need to redo based on how I implement the three get functions
	public function createMessage(){
		//Get the user session/identification
		$userRepo = RepositoryFactory::createRepository("user");
        $arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");

		$messageRepo = RepositoryFactory::createRepository("message");
		$arrayOfMessageObjects = $messageRepo->find($listingId, "listingId");
		$message = new Message();
		//Check to see if there exists a conversation between the prospective rentee
		//and the person who's renting our the place

		if(empty($arrayOfMessageObjects)) {
			// build the Message object from external JSON data
			$message->setId($_POST["listingId"]);
			//Get senderId from session
			$message->setSenderUserId($arrayOfUserObjects[0]->getId());
			//get recipient from listing
			$listingRepo = RepositoryFactory::createRepository("listing");
			$arrayOfListingObjects = $listingRepo->find($_POST["listingId"], "listingId");	
			$message->setRecipientUserId($arrayOfListingObjects[0]->getId());

			$message->setMessage($_POST["message"]);
		} else {
			//If message exists, use a previous message's information, except change
			//datetime to be null and change the message to be the actual message
			//This allows less headaches in figuring out who's the sender and receiver
			$senderId = $message->getSenderUserId();
			$recipientId = $message->getRecipientUserId();



			$message = $arrayOfMessageObjects[0];
			$message->setMessage($_POST["message"]);
			$message->setSenderUserId($senderId);
			$message->setRecipientUserId($recipientId);
			$message->setDatetime(null);
		}
		
		// add the message to the DB
		$messageRepo->save($message);
		//Send a message back to the front-end whether a message has been sent
	} // end function createMessage()
	
	/*
	 * This function gets the conversation within the threads
	 * This function should return messages between two users based on userid
	 */
	public function getConversation($listingId, $userId){
		$messageRepo = RepositoryFactory::createRepository("message");
		$arrayOfMessageObjects = $messageRepo->find($listingId, "listingId");
		// Need to filter by userId as well
		foreach($arrayOfMessageObjects as $key => $messageObjects) {
			if($messageObjects->getClientId() != $userId) {
				unset($arrayOfMessageObjects[$key]);
			}
		}
		
		//Send back users as well? ie call UserRepository
		echo json_encode($arrayOfMessageObjects);
	}

	public function conversation($listingId, $userId) {
		if(!empty($_SESSION)) {
    		$userRepo = RepositoryFactory::createRepository("user");
        	$arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");

            require APP . "view/_templates/logged_in_header.php";
    	} else {
    		require APP . "view/_templates/header.php";
    	}

    	require APP . 'view/messages/messages.php';
      	require APP . 'view/_templates/footer.php';
	}
	
	/*
	 * This function gets the message thread within the listing
	 * This function should return threads grouped by users
	 */
	public function getMessagesThread($listingId){
		//Need to filter by userid
		$messageRepo = RepositoryFactory::createRepository("message");
		$allMessageObjects = $messageRepo->find($listingId, "listingId");

		// Build temporary array for array_unique
		$tmp = array();
		foreach($allMessageObjects as $k => $v)
		    $tmp[$k] = $v->getClientId();

		//Reverse the array since the newer messages(towards the end) are what we want
		$tmp = array_reverse($tmp);

		// Find duplicates in temporary array
		$tmp = array_unique($tmp);

		// Remove the duplicates from original array
		foreach($allMessageObjects as $k => $v){
		    if (!array_key_exists($k, $tmp))
		        unset($allMessageObjects[$k]);
		}

		//Send back users as well? ie call UserRepository
		echo json_encode($allMessageObjects);
	}

	public function allMessages($listingId) {
		if(!empty($_SESSION)) {
    		$userRepo = RepositoryFactory::createRepository("user");
        	$arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");

            require APP . "view/_templates/logged_in_header.php";
    	} else {
    		require APP . "view/_templates/header.php";
    	}

    	require APP . 'view/messages/all_messages.php';
      	require APP . 'view/_templates/footer.php';
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