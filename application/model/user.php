<?php

/*
 * Class that represents a single user
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class User implements JsonSerializable {
	private $userid = null;
	private $email = null;
	private $firstname = null;
	private $lastname = null;
	private $username = null;
	private $studentID = null;
	private $phone = null;
	private $bio = null;
	private $password = null;
	private $verified = null;

	public function __construct() {

	}

	public function getId() {
		return $this->userid;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getUsername() {
		return $this->username;
	}

	public function getFirstname() {
		return $this->firstname;
	}

	public function getLastname() {
		return $this->lastname;
	}

	public function getStudentId() {
		return $this->studentID;
	}

	public function getPhone() {
		return $this->phone;
	}

	public function getBiography() {
		return $this->bio;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getVerified() {
		return $this->verified;
	}

	public function setId($newId) {
		$this->userid = $newId;
	}

	public function setEmail($newEmail) {
		$this->email = $newEmail;
	}

	public function setStudentId($newStudentId) {
		$this->studentID = $newStudentId;
	}

	public function setUsername($newUsername) {
		$this->username = $newUsername;
	}

	public function setFirstname($newFirstname) {
		$this->firstname = $newFirstname;
	}

	public function setLastname($newLastname) {
		$this->lastname = $newLastname;
	}

	public function setPhone($newPhone) {
		$this->phone = $newPhone;
	}

	public function setBiography($newBio) {
		$this->bio = $newBio;
	}

	public function setPassword($newPassword) {
		$this->password = $newPassword;
	}

	public function setVerified($newVerified) {
		$this->verified = $newVerified;
	}

	public function __toString() {
		return "{$this->userid}, {$this->email}, {$this->username}, {$this->password}," . 
				"  {$this->studentID}, {$this->phone}, {$this->bio}, {$this->verified}, {$this->firstname}, {$this->lastname}";
	}
	
	public function jsonSerialize() {
		return array(
			'userid' => $this->userid,
			'email' => $this->email,
			'username' => $this->username,
			'password' => $this->password,
			'studentID' => $this->studentID,
			'phone' => $this->phone,
			'bio' => $this->bio,
			'verified' => $this->verified,
			'firstname' => $this->firstname,
			'lastname' => $this->lastname
		);	
	}
}
