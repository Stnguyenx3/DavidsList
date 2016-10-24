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
		return $this->db->find($searchParam, 'userImage', 'UserImages', $column);
	}

	public function save($userImage){
		$this->db->save($userImage, 'userImage');
	}

	public function remove($userImage){
		$this->db->remove($userImage, 'userImage');

	}
}

class AllUserImagesQuery implements AllQueryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function fetch($fields){
		//return $this->db->select($fields)->from('users')->rows();
	}
}