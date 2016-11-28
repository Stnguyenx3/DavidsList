<?php

/*
 * Repository pattern
 * Class that acts as the interface between the app and the Address table
 * Make calls with this class if you need to find rows using one column parameter
 * or need to delete, update or insert one row
 */
class AddressRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($searchParam, $column){
		return $this->db->find($searchParam, 'address', 'Address', $column);
	}

	public function fetch(){
		return $this->db->fetch('address', 'Address');
	}

	public function save($address){
		return $this->db->save($address, 'address');
	}

	public function remove($address){
		return $this->db->remove($address->getListingId(), 'address', 'listingId');
	}

	public function update($address){
		return $this->db->update($address, 'address', $address->getListingId(), 'listingId');
	}
}