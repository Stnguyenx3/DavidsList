<?php

class ListingImage implements JsonSerializable{	#document
	private $listingID;
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
		return "{$this->listingId}, {$this->imageThumbnail}, {$this->image}";
	}

	public function jsonSerialize() {
		
	}
}