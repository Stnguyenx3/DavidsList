<?php

/*
 * Repository pattern
 * Class that acts as the interface between the app and the Address table
 * Make calls with this class if you need to find rows using one column parameter
 * or need to delete or insert one row
 */
class AddressRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($searchParam, $column){
		return $this->db->find($searchParam, 'address', 'Address', $column);
	}

	public function save($address){
		$this->db->save($address, 'address');
	}

	public function remove($address){
		$this->db->save($address, 'address');
	}
}

class AllAddressQuery implements AllQueryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function fetch($fields){
	}
}