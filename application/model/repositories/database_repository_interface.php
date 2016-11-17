<?php

/*
 * Interface for classes (repositories) that make database calls
 * such as retrieving using one search param, saving/inserting, and removing
 */
interface DatabaseRepositoryInterface{
	public function find($searchParam, $column);
	public function fetch();
	public function save($object);
	public function remove($object);
	public function update($object);
}