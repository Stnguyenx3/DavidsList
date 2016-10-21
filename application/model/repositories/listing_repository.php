<?php

interface ListingRepoInterface{
	public function find($id);
	public function save($listing);
	public function remove($listing);
}

class ListingRepo implements ListingRepoInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($id){
		return $this->db->find($id, 'listings', 'Listing');
	}

	public function save($listing){
		$this->db->save($listing, 'listings');
	}

	public function remove($listing){
		$this->db->remove($listing, 'listings');
	}

}


interface AllListingQueryInterface{
	public function fetch($fields);
}


class AllListingQuery implements AllListingQueryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function fetch($fields){
		return $this->db->select($fields)->from('listings')->rows();
	}
}
