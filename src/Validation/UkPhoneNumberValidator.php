<?php namespace Talv\Support\Validation;
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:32
 */



/**
 * Class UkPhoneNumberValidator
 * @package Talv\Support\Validation
 */
class UkPhoneNumberValidator implements ValidatorInterface{

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value ) {
		$pattern = '/^((\+44\s?\d{4}|\(?\d{5}\)?)\s?\d{6})|((\+44\s?|0)7\d{3}\s?\d{6})$/D';
		if (!preg_match( $pattern, $value )) {
			return false;
		}

		return true;
	}
}