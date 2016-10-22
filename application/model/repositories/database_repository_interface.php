<?php

interface DatabaseRepositoryInterface{
	public function find($id);
	public function save($object);
	public function remove($object);
}