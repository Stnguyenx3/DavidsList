<?php

#DO CRUD, OR EAT CRUD

class User{
	public $email;
	public $studentID;
	public $phone;
	public $bio;
	public $image;
	public $renter;
	public $owner;
}

class Listing{
	public $email;
	public $numberOfBedrooms;
	public $numberOfBathrooms;
	public $internet;
	public $petPolicy;
	public $elevatorAccess;
}

interface UserRepoInterface{
	public function find($email);
	public function save(User $user);
	public function remove(User $user);
}

interface ListingRepoInterface{
	public function find($email);
	public function save(Listing $listing);
	public function remove(Listing, $listing);
}


class SQLUserRepo implements UserRepoInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($email){
		return $this->db->find($email, 'users', 'User');
	}

	public function save(User $user){
		$this->db->save($user, 'users');
	}

	public function remove (User $user){
		$this->db->remove($user, 'users');
	}

}

class SQLListingRepo implements ListingRepoInterface{
	protected $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($email){
		return $this->db->find($email, 'listings', 'Listing');
	}

	public function save(Listing $listing){
		$this->db->save($listing, 'listings');
	}

	public function remove(Listing $listing){
		$this->db->remove($listing, 'listings');
	}

}

interface AllUsersQueryInterface{
	public function fetch($fields);
}

interface AllListingQueryInterface{
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

class AllListingQuery implements AllListingQueryInterface{
	protected $db;

	public function __construct(Database $db){
		$this->db = $db;
	}

	public function fetch($fields){
		return $this->db->select($fields)->from('listings')->rows();
	}
}

/*


class Database
{
	/** Constructor
		@param object $db A PDO database connection
	
	function __construct($db){
		try {
			$this->db = $db;
		} catch (PDOException $e){
			exit('Database connection could not be established.');
		}
	}

	/** Create 
	

	public function create($query){

		
	}
}
*/
