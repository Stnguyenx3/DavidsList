<?php

class FavoriteListing implements Model{
	private $id;
	private $userId;
	private $listingId;

	public function toString() {
		return "{$this->id}, {$this->userId}, {$this->listingId}";
	}
}