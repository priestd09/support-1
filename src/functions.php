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

if( ! function_exists('dateToUkFormat') )
{
	function dateToUkFormat( $date )
	{
		return (new \Talv\Support\Util\DateUtility())->toUk( $date );
	}
}

if( ! function_exists('dateToMySqlFormat') )
{
	function dateToMySqlFormat( $date )
	{
		return (new \Talv\Support\Util\DateUtility())->toMySql( $date );
	}
}
