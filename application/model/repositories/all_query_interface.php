<?php

/*
 * Interface for classes that make database calls, fetching rows
 * using multiple fields as search parameters
 */
interface AllQueryInterface{
	public function fetch($fields);
}
