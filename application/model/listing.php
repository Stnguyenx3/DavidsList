<?php

/*
 * Class that represents a single Listings
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class Listing implements JsonSerializable{
	private $id;
	private $listingImagesID;
	private $price;
	private $type;
	private $status;

	public function __construct() {

	}

	public function getId() {
		return $this->id;
	}

	public function getListingImagesId() {
		return $this->listingImagesID;
	}

	public function getPrice() {
		return $this->price;
	}

	public function getType() {
		return $this->type;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setId($newId) {
		$this->id = $newId;
	}

	public function setListingId($newListingImagesId) {
		$this->listingImagesID = $newListingId;
	}

	public function setPrice($newPrice) {
		$this->price = $newPrice;
	}

	public function setType($newType) {
		$this->type = $newType;
	}

	public function setStatus($newStatus) {
		$this->status = $newStatus;
	}

	public function __toString() {
		return "{$this->id}, {$this->listingImagesID}, {$this->price}," . 
				" {$this->type}, {$this->status}";
	}

	public function jsonSerialize() {
		return new array(
			"userid" => $this->id,
			"listingId" => $this->listingImagesID,
			"price" => $this->price,
			"type" => $this->type,
			"status" => $this->status
		);	
	}
}