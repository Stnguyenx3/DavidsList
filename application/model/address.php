<?php

/*
 * Class that represents a single address
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class Address implements JsonSerializable{
	private $listingId;
	private $approximateAddress;
	private $streetName;
	private $city;
	private $zipcode;
	private $state;
	private $distance;

	public function __construct() {

	}

	public function getListingId() {
		return $this->listingId;
	}

	public function getApproximateAddress() {
		return $this->approximateAddress;
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

	public function getDistance() {
		return $this->distance;
	}

	public function setId($newId) {
		$this->listingId = $newId;
	}

	public function setApproximateAddress($newApproximateAddress) {
		$this->approximateAddress = $newApproximateAddress;
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

	public function setDistance($newDistance) {
		$this->distance = $newDistance;
	}

	public function __toString() {
		return "{$this->listingId}, {$this->approximateAddress}, {$this->streetName}, " 
				. "{$this->city}, {$this->zipcode}, {$this->state}, {$this->distance}";
	}

	public function jsonSerialize() {
		return array(
			'listingId' => $this->listingId,
			'approximateAddress' => $this->approximateAddress,
			'streetName' => $this->streetName,
			'city' => $this->city,
			'zipcode' => $this->zipcode,
			'state' => $this->state,
			'distance' => $this->distance
		);	
	}

}