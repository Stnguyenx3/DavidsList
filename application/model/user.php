<?php

class User{
	private $id;
	private $email;
	private $studentID;
	private $phone;
	private $bio;
	private $listingId;
	private $userImagesId;

	public function __construct() {

	}

	public function getId() {
		return $this->$id;
	}

	public function getEmail() {
		return $this->$email;
	}

	public function getStudentId() {
		return $this->$studentID;
	}

	public function getPhone() {
		return $this->$phone;
	}

	public function getBiography() {
		return $this->$bio;
	}

	public function getListingId() {
		return $this->$listingId;
	}

	public function getUserImagesId() {
		return $this->$userImagesId;
	}

	public function setId($newId) {
		$this->$id = $newId;
	}

	public function setEmail($newEmail) {
		$this->$email = $newEmail;
	}

	public function setStudentId($newStudentId) {
		$this->$studentID = $newStudentId;
	}

	public function setPhone($newPhone) {
		$this->$phone = $newPhone;
	}

	public function setBiography($newBio) {
		$this->$bio = $newBio;
	}

	public function setListingId($newListingId) {
		$this->$listingId = $newListingId;
	}

	public function setUserImagesId($newUserImageId) {
		$this->$userImagesId = $newUserImageId;
	}

	public function toString() {
		return "{$id}, {$email}, {$studentID}, {$phone}, {$bio}, {$listingId}, {$userImagesId}";
	}

	public function initialize($array) {
		
	}
}
