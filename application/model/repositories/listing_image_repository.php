<?php

class ListingImageRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($listingID){
		return $this->db->find($listingID, 'listingImage', 'ListingImage');
	}

	public function save($listingImage){
		$this->db->save($listingImage, 'listingImage');
	}

	public function remove($listingImage){
		$this->db->remove($listingImage, 'listingImage');
	}
}

class AllListingImagesQuery implements AllQueryInterface{
	protected $db;

	public function __contruct($db){
		$this->db = $db;
	}

	public function fetch($fields){
		return $this->db->select($fields)->from('listingImages')->rows();
	}
}