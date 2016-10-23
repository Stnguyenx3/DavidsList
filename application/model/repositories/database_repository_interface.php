<?php

interface DatabaseRepositoryInterface{
	public function find($id, $column);
	public function save($object);
	public function remove($object);
}