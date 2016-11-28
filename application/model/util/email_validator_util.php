<?php

/*
 *  Class: EmailValidatorUtil
 *   File: application/model/util/email_validator_util.php
 * Author: David Chau
 * 
 * 
 * A utility class to check if an email is from SFSU or not. If it is, return 1 being true
 * if not, return 0 for false
 * 
 * 
 * Copyright (C) 2016, David Chau
 */

class EmailValidatorUtil{
	public static function validateEmail($email) {
		if(strpos($email, '@mail.sfsu.edu') !== false or strpos($email, '@sfsu.edu') !== false ) {
			return 1;
		} else {
			return 0;
		}
	}
}