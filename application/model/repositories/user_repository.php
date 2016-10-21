<?php

interface UserRepoInterface{
	public function find($id);
	public function save($user);
	public function remove($user);
}

class UserRepo implements UserRepoInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($id){
		return $this->db->find($id, 'users', 'User');
	}

	public function save($user){
		$this->db->save($user, 'users');
	}

	public function remove ($user){
		$this->db->remove($user, 'users');
	}

}

interface AllUsersQueryInterface{
	public function fetch($fields);
}

class AllUsersQuery implements AllUsersQueryInterface{
	protected $db;
	
	public function __construct(Database $db){
		$this->db = $db;
	}

	public function fetch($fields){
		return $this->db->select($fields)->from('users')->rows();
	}

}