<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:24
 */

namespace Talv\Support\Validation;

/**
 * Interface ValidatorInterface
 * @package Talv\Support\Validation
 */
interface ValidatorInterface {

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function validate( $value );

}