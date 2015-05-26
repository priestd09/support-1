<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 29/04/15
 * Time: 13:45
 */

namespace Talv\Support\Util;


use Talv\Support\Exception\InvalidDvlaNumberException;

class DvlaUtility implements DvlaUtilityInterface {

	/**
	 * @var DateUtility
	 */
	private $dateUtility;


	public function __construct( DateUtility $dateUtility ) {

		$this->dateUtility = $dateUtility;
	}

	/**
	 * add spacing to a dvla number so is formatted as XXXXX YYYYYY XXXXX
	 *
	 * @param $dvla
	 *
	 * @return string
	 * @throws InvalidDvlaNumberException
	 */
	public function formatDvlaNumber( $dvla ) {
		$dvla = trim( strtoupper( str_replace( " ", '', ( $dvla ) ) ) ); //remove all spaces

		if( strlen($dvla) !== 16 )
		{
			throw new InvalidDvlaNumberException();
		}

		$dvla = substr( $dvla, 0, 5 ) . ' ' . substr( $dvla, 5 );
		$dvla = substr( $dvla, 0, 12 ) . ' ' . substr( $dvla, 12 );

		return $dvla;
	}

	/**
	 * generate the first portion of a dvla number based on its title, name and date of birth
	 *
	 * @param $title
	 * @param $firstName
	 * @param $initial
	 * @param $surName
	 * @param $dob
	 *
	 * @return string
	 */
	public function generateDvlaNumber( $title, $firstName, $initial, $surName, $dob ) {
		$title     = trim( strtoupper( $title ) );
		$firstName = trim( strtoupper( $firstName ) );
		$initial   = trim( strtoupper( $initial ) );
		$surName   = trim( strtoupper( $surName ) );
		$dob       = $this->dateUtility->toUk( $dob );
		$dobArr    = explode( '/', $dob );

		$surname            = $this->getSurnamePart( $surName );
		$initial            = $this->getInitial( $initial );
		$firstNameFirstChar = $firstName[0];
		$validDvlaNumbers   = [ ];

		if ( in_array( $title, [ 'MRS', 'MS', 'MISS', 'LADY' ] ) ) { //female
			$dobCalc            = $this->getDobString( $dobArr, true );
			$validDvlaNumbers[] = $this->makeDvlaNo( $surname, $dobCalc, $firstNameFirstChar, $initial );
		} else if ( in_array( $title, [ 'DR', 'REVEREND' ] ) ) { //either gender

			$maleDobCalc        = $this->getDobString( $dobArr, false );
			$validDvlaNumbers[] = $this->makeDvlaNo( $surname, $maleDobCalc, $firstNameFirstChar, $initial );

			$femaleDobCalc      = $this->getDobString( $dobArr, true );
			$validDvlaNumbers[] = $this->makeDvlaNo( $surname, $femaleDobCalc, $firstNameFirstChar, $initial );

		} else { //male

			$dobCalc            = $this->getDobString( $dobArr, false );
			$validDvlaNumbers[] = $this->makeDvlaNo( $surname, $dobCalc, $firstNameFirstChar, $initial );
		}

		return $validDvlaNumbers;

	}

	/**
	 * check if the first 13 chars of a dvla number supplied match the one generated
	 *
	 * @param $title
	 * @param $firstName
	 * @param $initial
	 * @param $surname
	 * @param $dob
	 * @param $dvlaNo
	 *
	 * @return bool
	 *
	 */
	public function isDvlaNumberValid( $title, $firstName, $initial, $surname, $dob, $dvlaNo ) {
		$dvlaNumber = strtoupper( str_replace( ' ', '', $dvlaNo ) );
		if ( strlen( $dvlaNumber ) !== 16 ) {
			return false;
		}

		$proposedDvlaNumber = substr( $dvlaNumber, 0, 13 );
		$validDvlaNumbers   = $this->generateDvlaNumber( $title, $firstName, $initial, $surname, $dob );

		return ( in_array( $proposedDvlaNumber, $validDvlaNumbers ) );
	}

	/**
	 * if there is no 'initial' set its value to 9, or if there is more than one 'initial' only use first letter
	 *
	 * @param $initial
	 *
	 * @return int
	 */
	private function getInitial( $initial ) {
		return ( strlen( $initial ) == 0 ) ? 9 : $initial{0};
	}

	/**
	 * select first 5 characters of dvla from surname
	 * if the surname is less than 5 chars, pad with 9's
	 *
	 * @param $surname
	 *
	 * @return string
	 */
	private function getSurnamePart( $surname ) {

		//$surname = str_replace( ' ', '', $surname ); //some surnames have spaces in apparently? eg: Fehmi "ben abida"
		//remove all non-alphabetic characters from the surname in case they have spaces or hyphens in them
		$surname = preg_replace("/[^A-Za-z]/", '', $surname);
		$length  = strlen( $surname );

		if ( $length >= 5 ) {
			return substr( $surname, 0, 5 );
		}

		return str_pad( $surname, 5, '9' );

	}

	/**
	 * create a date sequence depending on the drivers gender
	 *
	 * @param array $dobArr
	 * @param bool  $isFemale
	 *
	 * @return string
	 */
	private function getDobString( array $dobArr, $isFemale = false ) {
		/**
		 * get third letter of year
		 */

		$thirdCharInDOBYear = $dobArr[2][2];

		/**
		 * get day in DOB
		 */
		$dobDay = $dobArr[0];

		/**
		 * get third letter of year
		 */
		$lastCharInDOBYear = $dobArr[2][3];

		/**
		 * check if female and if female add 5 in first number of DOB month,
		 * if july month is 07 hence it will be  : 57
		 * if dec month is 12, value = 62
		 */
		if ( $isFemale ) {
			$dobMonthFirstchar = (integer) $dobArr[1][0] + 5;
			$dobMonth          = $dobMonthFirstchar . $dobArr[1][1];
		} else {
			$dobMonth = $dobArr[1];
		}

		return $thirdCharInDOBYear . $dobMonth . $dobDay . $lastCharInDOBYear;
	}

	/**
	 * @param $surname
	 * @param $dobCalc
	 * @param $firstNameChar
	 * @param $initial
	 *
	 * @return string
	 * @internal param $firstName
	 */
	private function makeDvlaNo( $surname, $dobCalc, $firstNameChar, $initial ) {
		return strtoupper( $surname . $dobCalc . $firstNameChar . $initial );
	}
}