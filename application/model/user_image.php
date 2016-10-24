<?php

/*
 * Class that represents a single user image
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class UserImage implements JsonSerializable { 
	private $id;
	private $imageThumbnail;
	private $image;

	public function __construct() {

	}

	public function getListingId() {
		return $this->listingID;
	}

	public function getImageThumbNail() {
		return $this->imageThumbnail;
	}

	public function getImage() {
		return $this->image;
	}

	public function setListingId($newListingId) {
		$this->listingID = $newListingId;
	}

	public function setImageThumbNail($newImageThumbnail) {
		$this->imageThumbNail = $newImageThumbnail;
	}

	public function setImage($newImage) {
		$this->image = $newImage;
	}

	public function __toString() {
		return "{$this->id}, {$this->imageThumbnail}, {$this->image}";
	}

	public function jsonSerialize() {
		
	}
}