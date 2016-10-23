<?php

class ListingRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($searchParam, $column){
		return $this->db->find($searchParam, 'listing', 'Listing', $column);
	}

	public function save($listing){
		$this->db->save($listing, 'listing');
	}

	public function remove($listing){
		$this->db->remove($listing, 'listing');
	}

}

class AllListingQuery implements AllQueryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function fetch($fields){
		//return $this->db->select($fields)->from('listings')->rows();
	}
}
