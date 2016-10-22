<?php

class AddressRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($id){
		return $this->db->find($id, 'address', 'Address');
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