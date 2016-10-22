<?php

class Listing implements Model{
	private $id;
	private $listingImagesID;
	private $price;
	private $type;

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

	public function toString() {
		return "{$this->id}, {$this->listingImagesID}, {$this->price}, {$this->type}";
	}
}