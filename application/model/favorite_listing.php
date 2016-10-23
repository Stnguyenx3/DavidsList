<?php

class FavoriteListing implements JsonSerializable{
	private $id;
	private $userId;
	private $listingId;

	public function __toString() {
		return "{$this->id}, {$this->userId}, {$this->listingId}";
	}

	public function jsonSerialize() {
		
	}

}