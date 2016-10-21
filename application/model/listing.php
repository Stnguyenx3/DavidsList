<?php

class Listing{
	public $id;
	public $listingID;
	public $numberOfBedrooms;
	public $numberOfBathrooms;
	public $internet;
	public $petPolicy;
	public $price;
	public $type;
	public $elevatorAccess;
	public $furnishing;
	public $airConditioning;
	public $address;
	public $description;

	public function __construct() {

	}

	public function getId() {
		return $this->$id;
	}

	public function getListingId() {
		return $this->$listingID;
	}

	public function getNumberOfBedrooms() {
		return $this->$numberOfBedrooms;
	}

	public function getNumberOfBathrooms() {
		return $this->$numberOfBathrooms;
	}

	public function getInternet() {
		return $this->$internet;
	}

	public function getPetPolicy() {
		return $this->$petPolicy;
	}

	public function getPrice() {
		return $this->$price;
	}

	public function getType() {
		return $this->$type;
	}

	public function getElevatorAccess() {
		return $this->$elevatorAccess;
	}

	public function getFurnishing() {
		return $this->$furnishing;
	}

	public function getAirConditioning() {
		return $this->$airConditioning;
	}

	public function getAddress() {
		return $this->$address;
	}

	public function getDescription() {
		return $this->$bio;
	}

	public function setId($newId) {
		$this->$id = $newId;
	}

	public function setListingId($newListingId) {
		$this->$listingID = $newListingId;
	}

	public function setNumberOfBedrooms($numOfBedrooms) {
		$this->$numberOfBedrooms = $numOfBedrooms;
	}

	public function setNumberOfBathrooms($numOfBathrooms) {
		$this->$numberOfBathrooms = $numOfBathrooms;
	}

	public function setInternet($newInternet) {
		$this->$internet = $newInternet;
	}

	public function setPetPolicy($newPetPolicy) {
		$this->$petPolicy = $newPetPolicy;
	}

	public function setPrice($newPrice) {
		$this->$price = $newPrice;
	}

	public function setType($newType) {
		$this->$type = $newType;
	}

	public function setElevatorAccess($newElevatorAccess) {
		$this->$elevatorAccess = $newElevatorAccess;
	}

	public function setFurnishing($newFurnishing) {
		$this->$furnishing = $newFurnishing;
	}

	public function setAirConditioning($newAirConditioning) {
		$this->$airConditioning = $newAirConditioning;
	}

	public function setAddress($newAddress) {
		$this->$address = $newAddress;
	}

	public function setDescription($newDescription) {
		$this->$description = $newDescription;
	}

}