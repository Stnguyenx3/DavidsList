<?php

class User{
	private $id;
	private $email;
	private $studentID;
	private $phone;
	private $bio;
	
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
}
