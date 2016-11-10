<?php

/*
 * Class that represents a single Listings
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class Listing implements JsonSerializable{
	private $userId;
	private $listingId;
	private $price;
	private $listingType;
	private $status;

	public function __construct() {

	}

	public function getId() {
		return $this->userId;
	}

	public function getListingId() {
		return $this->listingId;
	}

	public function getPrice() {
		return $this->price;
	}

	public function getType() {
		return $this->listingType;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setId($newId) {
		$this->userId = $newId;
	}

	public function setListingId($newListingId) {
		$this->listingId = $newListingId;
	}

	public function setPrice($newPrice) {
		$this->price = $newPrice;
	}

	public function setType($newType) {
		$this->listingType = $newType;
	}

	public function setStatus($newStatus) {
		$this->status = $newStatus;
	}

	public function __toString() {
		return "{$this->userId}, {$this->listingId}, {$this->price}," . 
				" {$this->listingType}, {$this->status}";
	}

	public function jsonSerialize() {
		return array(
			"userId" => $this->userId,
			"listingId" => $this->listingId,
			"price" => $this->price,
			"listingType" => $this->listingType,
			"status" => $this->status
		);	
	}
}