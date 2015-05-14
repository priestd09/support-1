<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/05/15
 * Time: 09:48
 */

if( ! function_exists('debug') )
{

	function debug( $var )
	{
		return \Talv\Support\Util\DebugUtility::debug( $var );
	}

}