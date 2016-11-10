<?php

/*
 * Class that represents a single Listings image
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class ListingImage implements JsonSerializable{
	private $listingId;
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
		return "{$this->listingID}, {$this->imageThumbnail}, {$this->image}";
	}

	public function jsonSerialize() {
		return array(
			'listingId' => $this->listingID,
			'imageThumbnail' => $this->imageThumbnail,
			'image' => $this->image
		);
	}
}