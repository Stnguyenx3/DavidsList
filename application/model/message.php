<?php

/*
 * Class that represents a single message
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class Message implements JsonSerializable{
	private $listingId;
	private $senderUserId;
	private $recipientUserId;
	private $message;
	private $datetime;

	public function __construct() {

	}

	public function getListingId() {
		return $this->listingId;
	}
	
	public function getSenderUserId() {
		return $this->senderUserId;
	}

	public function getRecipientUserId() {
		return $this->recipientUserId;
	}

	public function getMessage() {
		return $this->message;
	}
	
	public function getDateTime() {
		return $this->datetime;
	}

	
	public function setId($listingId) {
		$this->listingId = $listingId;
	}

	public function setSenderUserId($senderUserId) {
		$this->senderUserId = $senderUserId;
	}

	public function setRecipientUserId($recipientUserId) {
		$this->recipientUserId = $recipientUserId;
	}

	public function setMessage($message) {
		$this->message = $message;
	}
	
	public function setDatetime($newDatetime) {
		$this->dateTime = $newDatetime;
	}	

	public function __toString() {
		return "{$this->listingId}, {$this->senderUserId}, {$this->recipientUserId}, " 
				. "{$this->message}, {$this->datetime}";
	}

	public function jsonSerialize() {
		return array(
			'listingId' => $this->listingId,
			'senderUserId' => $this->senderUserId,
			'recipientUserId' => $this->recipientUserId,
			'message' => $this->message,
			'datetime' => $this->datetime,
		);	
	}

}