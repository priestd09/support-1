<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:33
 */

namespace Talv\Support\Validation;

/**
 * Class UkMobileNumber
 * @package Talv\Support\Validation
 */
class UkMobileNumber implements ValidatorInterface{

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value ) {
		$value = str_replace( " ", "", $value );

		$pattern = '/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/';
		$match   = preg_match( $pattern, $value );

		if ($match != false) {
			// We have a valid phone number
			$value = str_replace( '(', '', $value );
			$value = str_replace( ')', '', $value );
			if (starts_with( $value, "07" )) {
				$l     = strlen( $value );
				$new   = substr( $value, 2, $l );
				$value = "+447" . $new;
			}

			return true;
		}

		return false;
	}
}