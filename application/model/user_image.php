<?php

class UserImage{ #document
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

	public function toString() {
		return "{$id}, {$imageThumbnail}, {$image}";
	}

	public function initialize($array) {
		
	}
}