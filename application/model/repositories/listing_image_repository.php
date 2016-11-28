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

	public function fetch(){
 		return $this->db->fetch('listingImage', 'ListingImage');
 	}

	public function save($listingImage){
		return $this->db->save($listingImage, 'listingImage');
	}

	public function remove($listingImage){
		return $this->db->remove($listingImage->getListingId(), 'listingImage', 'listingID');
	}

	public function update($listingImage){
		return $this->db->update($listingImage, 'listingImage', 
				$listingImage->getListingId(), 'listingID');
	}
}