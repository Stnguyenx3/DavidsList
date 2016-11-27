<?php

/*
 * Repository pattern
 * Class that acts as the interface between the app and the Users table
 * Make calls with this class if you need to find rows using one column parameter
 * or need to delete or insert one row
 */
class UserRepo implements DatabaseRepositoryInterface {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function find($searchParam, $column) {
        return $this->db->find($searchParam, 'user', 'User', $column);
    }

    public function fetch(){
        return $this->db->fetch('user', 'User');
    }

	public function save($user) {
        $this->db->save($user, 'user');
    }

    public function remove($user) {
        return $this->db->remove($user->getId(), 'user', 'userid');
    }

    public function update($user){
        return $this->db->update($user, 'user', $user->getId(), 'userid');
    }
}