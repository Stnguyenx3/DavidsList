<?php

class ListingDetailRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($id){
		return $this->db->find($id, 'listingDetail', 'ListingDetail');
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