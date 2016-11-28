<?php

/*
 * Repository pattern
 * Class that acts as the interface between the app and the Listing Details table
 * Make calls with this class if you need to find rows using one column parameter
 * or need to delete or insert one row
 */
class ListingDetailRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($searchParam, $column){
		return $this->db->find($searchParam, 'listingDetail', 'ListingDetail', $column);
	}

	public function fetch(){
 		return $this->db->fetch('listingDetail', 'ListingDetail');
 	}

	public function save($listingDetail){
		$this->db->save($listingDetail, 'listingDetail');
		return $this->db->save($listingDetail, 'listingDetail');
	}

	public function remove($listingDetail){
		return $this->db->remove($listingDetail->getListingId(), 'listingDetail', 'listingId');
	}

	public function update($listingDetail){
		return $this->db->update($listingDetail, 'listingDetail', 
					$listingDetail->getListingId(), 'listingId');
	}
}