<?php

/*
 * Class that represents a single user image.
 * Normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class UserImage implements JsonSerializable { 
	private $userid;
	private $image;
	private $imageThumbnail;

	public function __construct() {

	}

	public function getId() {
		return $this->userid;
	}

	public function getImageThumbNail() {
		return $this->imageThumbnail;
	}

	public function getImage() {
		return $this->image;
	}

	public function setId($newId) {
		$this->userid = $newId;
	}

	public function setImageThumbNail($newImageThumbnail) {
		$this->imageThumbnail = $newImageThumbnail;
	}

	public function setImage($newImage) {
		$this->image = $newImage;
	}

	public function __toString() {
		return "{$this->userid}, {$this->image}, {$this->imageThumbnail}";
	}

	public function jsonSerialize() {
		return array(
			'userid' => $this->userid,
			'image' => $this->image,
			'imageThumbnail' => $this->imageThumbnail,
		);
	}
}