<?php

/*
 * Class that represents a single Listings Detail
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class ListingDetail implements JsonSerializable{
	private $listingId;
	private $numberOfBedrooms;
	private $numberOfBathrooms;
	private $internet;
	private $petPolicy;
	private $elevatorAccess;
	private $furnishing;
	private $airConditioning;
	private $description;

	public function __construct() {

	}

	public function getListingId() {
		return $this->listingId;
	}

	public function getNumberOfBedrooms() {
		return $this->numberOfBedrooms;
	}

	public function getNumberOfBathrooms() {
		return $this->numberOfBathrooms;
	}

	public function getInternet() {
		return $this->internet;
	}

	public function getPetPolicy() {
		return $this->petPolicy;
	}

	public function getElevatorAccess() {
		return $this->elevatorAccess;
	}

	public function getFurnishing() {
		return $this->furnishing;
	}

	public function getAirConditioning() {
		return $this->airConditioning;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setListingId($newListingId) {
		$this->listingId = $newListingId;
	}

	public function setNumberOfBedrooms($numOfBedrooms) {
		$this->numberOfBedrooms = $numOfBedrooms;
	}

	public function setNumberOfBathrooms($numOfBathrooms) {
		$this->numberOfBathrooms = $numOfBathrooms;
	}

	public function setInternet($newInternet) {
		$this->internet = $newInternet;
	}

	public function setPetPolicy($newPetPolicy) {
		$this->petPolicy = $newPetPolicy;
	}

	public function setElevatorAccess($newElevatorAccess) {
		$this->elevatorAccess = $newElevatorAccess;
	}

	public function setFurnishing($newFurnishing) {
		$this->furnishing = $newFurnishing;
	}

	public function setAirConditioning($newAirConditioning) {
		$this->airConditioning = $newAirConditioning;
	}

	public function setDescription($newDescription) {
		$this->description = $newDescription;
	}

	public function __toString() {
		return "{$this->listingId}, {$this->numberOfBedrooms}, {$this->numberOfBathrooms}," . 
				" {$this->internet}, {$this->petPolicy}, {$this->elevatorAccess}, " . 
			    "{$this->furnishing}, {$this->airConditioning}, {$this->description}";
	}

	public function jsonSerialize() {
		return array(
			"listingId" => $this->listingId,
			"numberOfBedrooms" => $this->numberOfBedrooms,
			"numberOfBathrooms" => $this->numberOfBathrooms,
			"internet" => $this->internet,
			"petPolicy" => $this->petPolicy,
			"elevatorAccess" => $this->elevatorAccess,
			"furnishing" => $this->furnishing,
			"airConditioning" => $this->airConditioning,
			"description" => $this->description
		);
	}
}