<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:43
 */

namespace Talv\Support\Validation;

/**
 * Class Time
 * @package Talv\Support\Validation
 */
class Time implements ValidatorInterface{

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value ) {
		list($hour, $minute) = explode( ":", $value );
		if ($hour > -1 && $hour < 24 && $minute > -1 && $minute < 60) {
			return true;
		}

		return false;
	}
}