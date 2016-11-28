<?php

/*
 * Repository pattern
 * Class that acts as the interface between the app and the Listings table
 * Make calls with this class if you need to find rows using one column parameter
 * or need to delete or insert one row
 */
class ListingRepo implements DatabaseRepositoryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($searchParam, $column){
		return $this->db->find($searchParam, 'listing', 'Listing', $column);
	}

	public function fetch(){
 		return $this->db->fetch('listing', 'Listing');
 	}

	public function save($listing){
		return $this->db->save($listing, 'listing');
	}

	public function remove($listing){
		return $this->db->remove($listing->getListingId(), 'listing', 'listingId');
	}

	public function update($listing){
		return $this->db->update($listing, 'listing', $listing->getListingId(), 'listingId');
	}

}