<?php

#DO CRUD, OR EAT CRUD

class User{
	public $id;
	public $email;
	public $studentID;
	public $phone;
	public $bio;
	
	
}

class UserImage{ #document
	public $id;
	public $imageThumbnail;
	public $image;
}

class Listing{
	public $id;
	public $listingID;
	public $numberOfBedrooms;
	public $numberOfBathrooms;
	public $internet;
	public $petPolicy;
	public $elevatorAccess;
	public $furnishing;
	public $airConditioning;
	public $address;
	public $description;
}

class ListingImage{	#document
	public $listingID;
	public $imageThumbnail;
	public $image;
}


# CRUD for User Table
##############################################################################
##############################################################################
##############################################################################
interface UserRepoInterface{
	public function find($id);
	public function save($user);
	public function remove($user);
}

class SQLUserRepo implements UserRepoInterface{
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

#CRUD for User Images
##############################################################################
##############################################################################
##############################################################################
interface UserImageRepoInterface{
	public function find($id);
	public function save($userImage);
	public function remove($userImage);
}

class SQLUserImageRepo implements UserImageRepoInterface{
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

class AllUserImagesQuery implements AllUsersQueryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function fetch($fields){
		return $this->db->select($fields)->from('users')->rows();
	}
}

#CRUD for Listing Table
##############################################################################
##############################################################################
##############################################################################
interface ListingRepoInterface{
	public function find($id);
	public function save($listing);
	public function remove($listing);
}

class SQLListingRepo implements ListingRepoInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($id){
		return $this->db->find($id, 'listings', 'Listing');
	}

	public function save($listing){
		$this->db->save($listing, 'listings');
	}

	public function remove($listing){
		$this->db->remove($listing, 'listings');
	}

}


interface AllListingQueryInterface{
	public function fetch($fields);
}


class AllListingQuery implements AllListingQueryInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function fetch($fields){
		return $this->db->select($fields)->from('listings')->rows();
	}
}


#CRUD for Listing Table
##############################################################################
##############################################################################
##############################################################################
interface ListingImageRepoInterface{
	public function find($listingID);
	public function save($listingImage);
	public function remove($listingImage);
}

class SQLListingImageRepo implements ListingImageRepoInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($listingID){
		return $this->db->find($listingID, 'listingImages', 'ListingImage');
	}

	public function save($listingImage){
		$this->db->save($listingImage, 'listingImages');
	}

	public function remove($listingImage){
		$this->db->remove($listingImage, 'listingImages');
	}
}

interface AllListingImagesQueryInterface{
	public funtion fetch($fields);
}

class AllListingImagesQuery implements AllListingImagesQueryInterface{
	protected $db;

	public function __contruct($db){
		$this->db = $db;
	}

	public function fetch($fields){
		return $this->db->select($fields)->from('listingImages')->rows();
	}
}