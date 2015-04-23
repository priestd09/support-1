<?php namespace Talv\Support\Validation;
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:24
 */



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

		try {
			$date = Carbon::createFromFormat( 'd/m/Y', $value );

			return ( $date && ( $date->format( 'd/m/Y' ) == $value ) );
		}catch ( \Exception $e )
		{
			return false;
		}
	}
}