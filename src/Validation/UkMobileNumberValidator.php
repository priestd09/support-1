<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:33
 */

namespace Talv\Support\Validation;

/**
 * Class UkMobileNumberValidator
 * @package Talv\Support\Validation
 */
class UkMobileNumberValidator implements ValidatorInterface{

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value ) {
		$value = str_replace( " ", "", $value );

		$pattern = '/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/';
		if( !preg_match( $pattern, $value ) )
		{
			return false;
		}

		return true;
	}
}