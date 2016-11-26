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
		$message->setId($_POST("listingId"));
		$message->setSenderUserId($_POST("senderUserId"));
		$message->setRecipientUserId($_POST("recipientUserId"));
		$message->setMessage($_POST("message"));
		$message->setDatetime($_POST("datetime"));
		
		// add the message to the DB
		$messageRepo = RepositoryFactory::createRepository("message");
		$messageRepo->save($message);
	} // end function createMessage()
	
	
	/**
	 * TODO - 
	 * two different get functions. One to get threads, and one to get conversations.
	 * threads being, previews of the conversation showing the most recent message.
	 */	
	
	public function getMessage($listingId){
		
	}
	
	
	/**
	 * Deletes a message.
	 * 
	 * External data is JSON object containing all attributes of a message
	 * 
	 * @todo Consider adding some sort of error checking / validaiton inside
	 * this function?
	 */	
	public function deleteMessage(){
		// build the Message object from external JSON data
		$message = new Message();
		$message->setId($_POST("listingId"));
		$message->setSenderUserId($_POST("senderUserId"));
		$message->setRecipientUserId($_POST("recipientUserId"));
		$message->setMessage($_POST("message"));
		$message->setDatetime($_POST("datetime"));
		
		// remove the message from the DB
		$messageRepo = RepositoryFactory::createRepository("message");
		$messageRepo->remove($message);		
	} // end function deleteMessage()
} // end class Messages