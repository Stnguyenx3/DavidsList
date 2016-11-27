<?php

/*
 * Repository pattern
 * Class that acts as the interface between the app and the Message table
 * Make calls with this class if you need to find rows using one column parameter
 * or need to delete or insert one row
 */
class MessageRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($searchParam, $column){
		return $this->db->find($searchParam, 'message', 'Message', $column);
	}

	public function fetch(){
		return $this->db->fetch('message', 'Message');
	}

	public function save($message){
		return $this->db->save($message, 'message');
	}
	
	public function remove($message){
		return $this->db->remove($message->getListingId(), 'message', 'listingId');
	}
	
	public function update($message){
		return $this->db->update($message, 'message', $message->getListingId(), 'listingId');
	}
}