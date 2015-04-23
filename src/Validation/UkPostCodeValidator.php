<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:32
 */

namespace Talv\Support\Validation;

/**
 * Class UkPostCodeValidator
 * @package Talv\Support\Validation
 */
class UkPostCodeValidator implements ValidatorInterface {

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value ) {
		$value = strtoupper( $value );

		$PC = str_replace( ' ', '', $value ); //remove all spaces

		$pclen    = strlen( $PC );
		$PC1      = substr( $PC, 0, ( $pclen - 3 ) );
		$PC2      = substr( $PC, - 3, $pclen );
		$postcode = $PC1 . ' ' . $PC2;
		$postcode = strtoupper( $postcode );

		if ( preg_match( "((GIR 0AA)|(TDCU 1ZZ)|(ASCN 1ZZ)|(BIQQ 1ZZ)|(BBND 1ZZ)"
		                 . "|(FIQQ 1ZZ)|(PCRN 1ZZ)|(STHL 1ZZ)|(SIQQ 1ZZ)|(TKCA 1ZZ)"
		                 . "|[A-PR-UWYZ]([0-9]{1,2}|([A-HK-Y][0-9]"
		                 . "|[A-HK-Y][0-9]([0-9]|[ABEHMNPRV-Y]))"
		                 . "|[0-9][A-HJKS-UW]) [0-9][ABD-HJLNP-UW-Z]{2})", $postcode ) == false
		) {
			return false;
		}

		return true;
	}
}