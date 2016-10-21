<?php
interface ListingImageRepoInterface{
	public function find($listingID);
	public function save($listingImage);
	public function remove($listingImage);
}

class ListingImageRepo implements ListingImageRepoInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($listingID){
		return $this->db->find($listingID, 'listingImages', 'ListingImage');
	}

	public function save($listingImage){
		$this->db->save($listingImage, 'listingImages');
	}

	public function remove($listingImage){
		$this->db->remove($listingImage, 'listingImages');
	}
}

interface AllListingImagesQueryInterface{
	public funtion fetch($fields);
}

class AllListingImagesQuery implements AllListingImagesQueryInterface{
	protected $db;

	public function __contruct($db){
		$this->db = $db;
	}

	public function fetch($fields){
		return $this->db->select($fields)->from('listingImages')->rows();
	}
}