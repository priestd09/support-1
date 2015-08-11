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

if( ! function_exists('date_to_uk_format') )
{
	function date_to_uk_format( $date )
	{
		return (new \Talv\Support\Util\DateUtility())->toUk( $date );
	}
}

if( ! function_exists('date_to_mysql_format') )
{
	function date_to_mysql_format( $date )
	{
		return (new \Talv\Support\Util\DateUtility())->toMySql( $date );
	}
}

if( ! function_exists('format_dvla_number') )
{
    function format_dvla_number( $dvla )
    {
        return (new \Talv\Support\Util\DvlaUtility( new \Talv\Support\Util\DateUtility() ) )->formatDvlaNumber( $dvla );
    }
}