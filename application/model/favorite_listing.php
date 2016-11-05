<?php

/*
 * Class that represents a single favorites listing
 * normal plain old PHP object, with the implementation of a JsonSerializable
 * which allows sending this object back to the client side
 */
class FavoriteListing implements JsonSerializable{
	private $userId;
	private $listingId;

	public function __toString() {
		return "{$this->userId}, {$this->listingId}";
	}

	public function jsonSerialize() {
		return array(
			"userid" => $this->userId,
			"listingId" => $this->listingId
		);
	}

}