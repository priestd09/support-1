<?php namespace Talv\Support\Validation;
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:21
 */



/**
 * Class Alphanumeric
 * @package Talv\Support\Validation
 */
class Alphanumeric implements ValidatorInterface{

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value )
	{
		$pattern = '/^[a-zA-Z0-9_.-\/-#:,\(\) ]{1,256}$/D';
		if (!preg_match( $pattern, $value )) {
			return false;
		}

		return true;
	}

}