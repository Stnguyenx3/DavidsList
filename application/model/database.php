<?php

/*
 * Singleton database class that acts as the imemediate layer between
 * the actual database and the application. 
 */

class Database {
	private $db;
	private static $instance;

	/*
	 * constructor to create the database. Made private because
	 * we're using the singleton pattern 
	 */
	private function __construct() {
		$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

		$this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
	}

	/*
	 * Method to return the instance of the database
	 */
	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new Database();
		}
		return self::$instance;
	}

	/*
	 * Method to find the rows with the given id within the given
	 * table, and instantiate it into an object of the given type
	 *
	 * hardcoded right now, need to find a way to make a query
	 * independent of id, just finding by a field or set of fields
	 */
	public function find($id, $table, $object) {
		$preparedStatement = 
			$this->db->prepare("SELECT * FROM " . $table . " WHERE city = :id");
		$preparedStatement->execute(array(':id' => $id));
		$arrayOfResults = $preparedStatement->fetchAll(PDO::FETCH_CLASS, $object);

		return $arrayOfResults;
	}

	/*
	 * Method to save the object into the given table
	 */
	public function save($object, $table) {
		$preparedStatement = 
			$this->db->
				prepare("INSERT INTO " . $table . " VALUES (" . $object->toString() . ")");
		$preparedStatement->execute();
	}

	/*
	 * Method to delete the object into the given table
	 */
	public function remove($object, $table) {
		$preparedStatement = 
			$this->db->
				prepare("DELETE FROM " . $table . "WHERE id = " . $object->getId());
	}

	//Update
}