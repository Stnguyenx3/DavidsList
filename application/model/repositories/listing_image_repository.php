<?php

/*
 * Repository pattern
 * Class that acts as the interface between the app and the Listing Images table
 * Make calls with this class if you need to find rows using one column parameter
 * or need to delete or insert one row
 */
class ListingImageRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($searchParam, $column){
		return $this->db->find($searchParam, 'listingImage', 'ListingImage', $column);
	}

	public function save($listingImage){
		$this->db->save($listingImage, 'listingImage');
	}

	public function remove($listingImage){
		$this->db->remove($listingImage->getListingId(), 'listingImage', 'listingId');
	}

	public function update($listingImage){
		$this->db->update($listingImage, 'listingImage', 
				$listingImage->getListingId(), 'listingId');
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