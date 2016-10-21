<?php

interface UserImageRepoInterface{
	public function find($id);
	public function save($userImage);
	public function remove($userImage);
}

class UserImageRepo implements UserImageRepoInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($id){
		return $this->db->find($id, 'userImages', 'UserImage');
	}

	public function save($userImage){
		$this->db->save($userImage, 'userImages');
	}

	public function remove($userImage){
		$this->db->remove($userImage, 'userImages');

	}
}

interface AllUserImagesQueryInterface{
	public function fetch($fields);
}

class AllUserImagesQuery implements AllUserImagesQueryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function fetch($fields){
		return $this->db->select($fields)->from('users')->rows();
	}
}