<?php

/*
 * Repository pattern
 * Class that acts as the interface between the app and the User Images table
 * Make calls with this class if you need to find rows using one column parameter
 * or need to delete or insert one row
 */
class UserImageRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($searchParam, $column){
		return $this->db->find($searchParam, 'userImage', 'UserImage', $column);
	}

	public function fetch(){
 		return $this->db->fetch('userImage', 'UserImage');
 	}

	public function save($userImage){
		return $this->db->save($userImage, 'userImage');
	}

	public function remove($userImage){
		return $this->db->remove($userImage->getId(), 'userImage', 'userid');
	}

	public function update($userImage){
		return $this->db->update($userImage, 'userImage', $userImage->getId(), 'userid');
	}
}