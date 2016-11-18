<?php

class EmailValidatorUtil{
	public static function validateEmail($email) {
		if(strpos($email, '@mail.sfsu.edu') !== false or strpos($email, '@sfsu.edu') !== false ) {
			return 1;
		} else {
			return 0;
		}
	}
}