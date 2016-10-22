<?php

class FavoriteListingRepo implements DatabaseRepositoryInterface {
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($id){
		return $this->db->find($id, 'favoriteListing', 'FavoriteListing');
	}

	public function save($favoriteListing){
		$this->db->save($favoriteListing, 'favoriteListing');
	}

	public function remove($favoriteListing){
		$this->db->remove($favoriteListing, 'favoriteListing');
	}
}

class AllFavoriteListingsQuery implements AllQueryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function fetch($fields){
	}
}