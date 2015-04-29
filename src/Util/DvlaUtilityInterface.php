<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 29/04/15
 * Time: 13:33
 */

namespace Talv\Support\Util;


interface DvlaUtilityInterface {

	/**
	 * add spacing to a dvla number so is formatted as XXXXX YYYYYY XXXXX
	 * @param $dvla
	 *
	 * @return string
	 */
	public function formatDvlaNumber( $dvla );

	/**
	 * generate the first portion of a dvla number based on its title, name and date of birth
	 *
	 * @param $title
	 * @param $firstName
	 * @param $initial
	 * @param $surname
	 * @param $dob
	 *
	 * @return string
	 */
	public function generateDvlaNumber( $title, $firstName, $initial, $surname, $dob );

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
	public function isDvlaNumberValid( $title, $firstName, $initial, $surname, $dob, $dvlaNo );

}