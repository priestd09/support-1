<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:24
 */

namespace Talv\Support\Validation;


use Carbon\Carbon;

/**
 * Class UkDate
 * @package Talv\Support\Validation
 */
class UkDate implements ValidatorInterface{


	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value ) {
		$date = Carbon::createFromFormat('d/m/Y', $value );
		return ( $date && ($date->format('d/m/Y') == $value ) );
	}
}