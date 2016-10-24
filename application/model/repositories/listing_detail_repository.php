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

	public function save($userImage){
		$this->db->save($userImage, 'listingDetail');
	}

	public function remove($userImage){
		$this->db->save($userImage, 'listingDetail');
	}
}

class AllListingDetailQuery implements AllQueryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function fetch($fields){
	}
}