<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:32
 */

namespace Talv\Support\Validation;

/**
 * Class UkPhoneNumber
 * @package Talv\Support\Validation
 */
class UkPhoneNumber implements ValidatorInterface{

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value ) {
		$value = str_replace( " ", '', $value );
		$pattern = '/^(([0]{1})|([\+][4]{2}))[0-9_.\-: ]{1,256}$/D';
		if (!preg_match( $pattern, $value )) {
			return false;
		}

		return true;
	}
}