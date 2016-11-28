<?php

/*
 * Repository pattern
 * Class that acts as the interface between the app and the Favorite Listing table
 * Make calls with this class if you need to find rows using one column parameter
 * or need to delete or insert one row
 */
class FavoriteListingRepo implements DatabaseRepositoryInterface {
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($searchParam, $column){
		return $this->db->find($searchParam, 'favoriteListing', 'FavoriteListing', $column);
	}

	public function fetch(){
 		return $this->db->fetch('favoriteListing', 'FavoriteListing');
 	}

	public function save($favoriteListing){
		return $this->db->save($favoriteListing, 'favoriteListing');
	}

	public function remove($favoriteListing){
		return $this->db->remove($favoriteListing->getListingId(), 'favoriteListing', 'listingid');
	}

	public function update($favoriteListing){
		return $this->db->update($favoriteListing, 'favoriteListing', 
					$favoriteListing->getListingId(), 'listingid');
	}
}
