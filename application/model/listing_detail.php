<?php

class ListingDetail implements Model {
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

	public function toString() {
		return "{$this->numberOfBedrooms}, {$this->numberOfBathrooms}, {$this->internet}," . 
				" {$this->petPolicy}, {$this->elevatorAccess}, " . 
			    "{$this->furnishing}, {$this->airConditioning}, {$this->description}";
	}
}