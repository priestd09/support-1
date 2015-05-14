<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/05/15
 * Time: 09:49
 */

namespace Talv\Support\Util;


class DebugUtility {

	public static function debug( $var )
	{
		echo"<pre>".print_r($var, true)."</pre>";
	}

}