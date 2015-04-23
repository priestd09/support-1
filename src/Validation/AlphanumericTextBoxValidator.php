<?php namespace Talv\Support\Validation;
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:22
 */



/**
 * Class AlphanumericTextBoxValidator
 * @package Talv\Support\Validation
 */
class AlphanumericTextBoxValidator implements ValidatorInterface{

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value )
	{
		$pattern = '/^[a-zA-Z0-9_.-\/-#:,\(\)! ]+$/';
		if (!preg_match( $pattern, $value )) {
			return false;
		}

		return true;
	}

}