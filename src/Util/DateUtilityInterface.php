<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 23/04/15
 * Time: 15:12
 */

namespace Talv\Support\Util;


interface DateUtilityInterface {

	/**
	 * @param $date
	 *
	 * @return string
	 */
	public function toUk( $date );

	/**
	 * @param $date
	 *
	 * @return string
	 */
	public function toMySql( $date );

}
