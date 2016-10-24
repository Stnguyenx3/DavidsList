<?php

/*
 * Class that represents a single address
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class Address implements JsonSerializable{
	private $listingId;
	private $streetName;
	private $city;
	private $zipcode;
	private $state;

	public function __construct() {

	}

	public function getListingId() {
		return $this->listingId;
	}

	public function getStreetName() {
		return $this->streetName;
	}

	public function getCity() {
		return $this->city;
	}

	public function getZipcode() {
		return $this->zipcode;
	}

	public function getState() {
		return $this->state;
	}

	public function setId($newId) {
		$this->id = $newId;
	}

	public function setStreetName($newStreetName) {
		$this->streetName = $newStreetName;
	}

	public function setCity($newCity) {
		$this->city = $newCity;
	}

	public function setZipcode($newZipcode) {
		$this->zipcode = $newZipcode;
	}

	public function setState($newState) {
		$this->state = $newState;
	}

	public function __toString() {
		return "{$this->listingId}, {$this->streetName}, " 
				. "{$this->city}, {$this->zipcode}, {$this->state}";
	}

	public function jsonSerialize() {
		return array(
			'listingId' => $this->listingId,
			'streetName' => $this->streetName,
			'city' => $this->city,
			'zipcode' => $this->zipcode,
			'state' => $this->state
		);	
	}

}