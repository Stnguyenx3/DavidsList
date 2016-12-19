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
 * Copyright (C) 2016, Paul Derugin
 */

class Messages extends Controller{
	
	/**
	 * Creates a message.
	 * 
	 * External data is JSON object containing all attributes of a message
	 */
	public function createMessage(){
		//Get the user session/identification
		$userRepo = RepositoryFactory::createRepository("user");
        $arrayOfUserObjects = $userRepo->find($_SESSION["email"], "email");

        //get recipient from listing
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($_POST["listingId"], "listingId");	

		$messageRepo = RepositoryFactory::createRepository("message");
		$message = new Message();

		//If not the same, then this means the sender is the owner of listing
		if($arrayOfUserObjects[0]->getId() != $_POST["userId"]) {
			$message->setId($_POST["listingId"]);
			$message->setSenderUserId($arrayOfUserObjects[0]->getId());
			$message->setRecipientUserId($_POST["userId"]);
			$message->setMessage($_POST["message"]);
			$message->setClientId($_POST["userId"]);
			$message->setDatetime(date_create()->format('Y-m-d H:i:s'));
		} 
		//This means the sender is the client, ie not the owner of the listing
		else {
			$message->setId($_POST["listingId"]);
			$message->setSenderUserId($arrayOfUserObjects[0]->getId());
			$message->setRecipientUserId($arrayOfListingObjects[0]->getId());
			$message->setMessage($_POST["message"]);
			$message->setClientId($_POST["userId"]);
			$message->setDatetime(date_create()->format('Y-m-d H:i:s'));
		}

		// add the message to the DB
		$messageResponse = $messageRepo->save($message);
		//Send a message back to the front-end whether a message has been sent
		if($messageResponse) {
			echo "Message has successfully sent!";
		} else {
			echo "Message did not send.";
		}
	} // end function createMessage()
	
	/*
	 * This function gets the conversation within the threads
	 * This function should return messages between two users based on userid
	 */
	public function getConversation($listingId, $userId){
		$messageRepo = RepositoryFactory::createRepository("message");
		$arrayOfMessageObjects = $messageRepo->find($listingId, "listingId");

		if (empty($arrayOfMessageObjects)) {
			echo "null";
			return;
		}

		//Used to get the userid of the listing owner.
		$listingRepo = RepositoryFactory::createRepository("listing");
		$arrayOfListingObjects = $listingRepo->find($listingId, "listingId");

		$userRepo = RepositoryFactory::createRepository("user");

		$arrayOfMessages = [];
		$arrayOfUsers[] = $userRepo->find($userId, "userid");

		$listingOwner = $userRepo->find($arrayOfListingObjects[0]->getId(), "userid");
		//$listingOwner = $userRepo->find($arrayOfListingObjects[0]->getId(), "userid");

		$arrayOfUsers[] = $listingOwner; //Add the listing owners userid to array.

		// Need to filter by userId as well
		foreach($arrayOfMessageObjects as $key => $messageObjects) {
			if($messageObjects->getClientId() != $userId) {
				unset($arrayOfMessageObjects[$key]);
			}
		}

		foreach ($arrayOfMessageObjects as $msg) {
			$arrayOfMessages[] = $msg;
		}

		$data = array();
		$data['listingInfo'] = $arrayOfListingObjects;
		$data['messages'] = $arrayOfMessages;
		$data['users'] = $arrayOfUsers;

		echo json_encode($data);

	}

	public function conversation($listingId, $userId) {
		if(isset($_SESSION["email"])) {
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
	//TODO: Need to filter to only show if either sender or receiver is the logged in user
	public function getMessagesThread($listingId){
		$messageRepo = RepositoryFactory::createRepository("message");
		$allMessageObjects = $messageRepo->find($listingId, "listingId");

		// Build temporary array for array_unique
		$tmp = array();
		foreach($allMessageObjects as $k => $v)
		    $tmp[$k] = $v->getClientId();

		//Reverse the array since the newer messages(towards the end) are what we want
		$tmp = array_reverse($tmp);
		$allMessageObjects = array_reverse($allMessageObjects);

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

	public function getAllMessages($userid) {
		if(isset($_SESSION["email"])) {
			$messageRepo = RepositoryFactory::createRepository("message");
			$allMessageObjects = $messageRepo->fetch();

			//Make a temp array to keep listingId of messages
			$tmp = array();
			foreach($allMessageObjects as $k => $v)
				$tmp[$k] = $v->getClientId();

			//Reverse the array since the newer messages(towards the end) are what we want
			$tmp = array_reverse($tmp);
			$allMessageObjects = array_reverse($allMessageObjects);

			// Find duplicates in temporary array
			$tmp = array_unique($tmp);

			// Remove the duplicates from original array
			foreach($allMessageObjects as $k => $v){
			    if (!array_key_exists($k, $tmp))
			        unset($allMessageObjects[$k]);
			}

			//Get additional information about listings.
			$listingRepo = RepositoryFactory::createRepository("listing");
			$listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
			$userRepo = RepositoryFactory::createRepository("user");
			
			$arrayOfListingIDs = [];
			$arrayOfMessages = [];
			$arrayOfListingDetails = [];
			$arrayOfListingBasic = [];
			$arrayOfUsers = [];

			//Store listing ids in an array.
			foreach($allMessageObjects as $item){

				$arrayOfMessages[] = $item; //Store single message into array.
				$arrayOfListingIDs[] = $item->getListingId();

				//Get the user information based on userid associated with this message.
				$msgSender = $userRepo->find($item->getSenderUserId(), "userid");
				$msgReceiver = $userRepo->find($item->getRecipientUserId(), "userid");

				//Do not push to array if user already exists!
				if (!in_array($msgSender, $arrayOfUsers)) {
					$arrayOfUsers[] = $msgSender;
				}

				if (!in_array($msgReceiver, $arrayOfUsers)) {
					$arrayOfUsers[] = $msgReceiver;
				}

			}

			//Get listing details for each listing that has messages.
			foreach ($arrayOfListingIDs as $listingId) {
				$arrayOfListingDetails[] = $listingDetailRepo->find($listingId, "listingId");
				$arrayOfListingBasic[] = $listingRepo->find($listingId, "listingId");
			}

			//Create new array to send back to web client.
			$data = array();
			$data['messages'] = $arrayOfMessages;
			$data['listing_details'] = $arrayOfListingDetails;
			$data['listing'] = $arrayOfListingBasic;
			$data['users'] = $arrayOfUsers;

			echo json_encode($data);
		} else {
			echo "You are not logged in";
		}
	}

	public function allMessages($listingId) {
		if(isset($_SESSION["email"])) {
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

	public function goToMessage($listingID) {

		if(!isset($_SESSION['userid'])){
			$_SESSION["previous_url"] = URL . 'listings/getlisting/' . $listingID;
			echo URL . 'home/login';

		} else {
			echo URL . 'messages/conversation/' . $listingID . '/' . $_SESSION['userid'];
		}

	}
} // end class Messages