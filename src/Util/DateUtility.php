<?php namespace Talv\Support\Util;
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 23/04/15
 * Time: 15:11
 */
use DateTime;


/**
 * Class DateUtility
 * @package Talv\Support\Util
 */
class DateUtility implements DateUtilityInterface {

	/**
	 * @param $date
	 *
	 * @return string
	 */
	public function toUk( $date ) {
		if ( $date === null ) {
			return '';
		}

		if( $this->isDateEmpty( $date ) )
		{
			return '';
		}

		$format = $this->getDateFormat( $date );
		$dt     = DateTime::createFromFormat( $format, $date );

		return $dt->format( 'd/m/Y' );
	}

	/**
	 * @param $date
	 *
	 * @return string
	 */
	public function toMySql( $date ) {
		if ( $date === null ) {
			return '';
		}

		if( $this->isDateEmpty( $date ) )
		{
			return '';
		}

		$format = $this->getDateFormat( $date );
		$dt     = DateTime::createFromFormat( $format, $date );

		return $dt->format( 'Y-m-d' );
	}

	/**
	 * @param $date
	 *
	 * @return string
	 * @throws \Exception
	 */
	private function getDateFormat( $date ) {
		if ( strpos( $date, '/' ) !== false ) {
			return 'd/m/Y';
		} else if ( strpos( $date, '-' ) !== false ) {
			return 'Y-m-d';
		}

		throw new \Exception( '[' . __METHOD__ . '] Unknown date format for date : ' . $date );
	}

	/**
	 * @param $date
	 *
	 * @return bool
	 */
	private function isDateEmpty( $date ){
		$date = substr( $date, 0, 10 );
		if ( in_array( $date, [ '0000-00-00', '00/00/0000' ] ) || empty( $date ) ) {
			return true;
		}

		return false;
	}
}