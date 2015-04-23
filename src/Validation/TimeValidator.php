<?php namespace Talv\Support\Validation;
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:43
 */



/**
 * Class TimeValidator
 * @package Talv\Support\Validation
 */
class TimeValidator implements ValidatorInterface{

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value ) {

		$pattern = '/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/';
		if (!preg_match( $pattern, $value )) {
			return false;
		}

		return true;

	}
}