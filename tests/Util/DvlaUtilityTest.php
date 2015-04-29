<?php
use Talv\Support\Util\DateUtility;
use Talv\Support\Util\DvlaUtility;

/**
 * Created by PhpStorm.
 * User: talv
 * Date: 29/04/15
 * Time: 14:25
 */
class DvlaUtilityTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var DvlaUtility
	 */
	private $dvlaUtility;

	/**
	 *
	 */
	public function setUp() {
		$this->dvlaUtility = new DvlaUtility( new DateUtility() );
	}

	/**
	 * @throws \Talv\Support\Exception\InvalidDvlaNumberException
	 */
	public function testFormat() {
		$input    = 'IFZEF560310Q98BN';
		$expected = 'IFZEF 560310 Q98BN';

		$response = $this->dvlaUtility->formatDvlaNumber( $input );
		$this->assertEquals( $response, $expected );
	}

	/**
	 * @throws \Talv\Support\Exception\InvalidDvlaNumberException
	 * @expectedException \Talv\Support\Exception\InvalidDvlaNumberException
	 */
	public function testFormatInvalidDvlaNo() {
		$input = 'IFZEF56';
		$this->dvlaUtility->formatDvlaNumber( $input );
	}

	/**
	 *
	 */
	public function testGenerateNumberForMaleWithLongSurname() {
		$title   = 'Mr';
		$first   = 'WhoaLookout';
		$initial = 'A';
		$surname = 'LongSurnameIncoming';
		$dob     = '03/10/1980';

		$response = $this->dvlaUtility->generateDvlaNumber( $title, $first, $initial, $surname, $dob );
		$this->assertEquals( $response[0], 'LONGS810030WA' );
	}

	/**
	 *
	 */
	public function testGenerateNumberForFemaleWithLongSurname()
	{
		$title   = 'Ms';
		$first   = 'WhoaLookout';
		$initial = 'A';
		$surname = 'LongSurnameIncoming';
		$dob     = '03/10/1980';

		$response = $this->dvlaUtility->generateDvlaNumber( $title, $first, $initial, $surname, $dob );
		$this->assertEquals( $response[0], 'LONGS860030WA' );
	}

	public function testGenerateNumberForMaleWithShortSurname()
	{
		$title   = 'Mr';
		$first   = 'WhoaLookout';
		$initial = '';
		$surname = 'Ho';
		$dob     = '03/10/1980';

		$response = $this->dvlaUtility->generateDvlaNumber( $title, $first, $initial, $surname, $dob );
		$this->assertEquals( $response[0], 'HO999810030W9' );
	}

	public function testGenerateNumberForFemaleWithShortSurname()
	{
		$title   = 'Mrs';
		$first   = 'WhoaLookout';
		$initial = '';
		$surname = 'Ho';
		$dob     = '03/10/1980';

		$response = $this->dvlaUtility->generateDvlaNumber( $title, $first, $initial, $surname, $dob );
		$this->assertEquals( $response[0], 'HO999860030W9' );
	}

	public function testGenerateNumberForEitherGenderWithShortSurname()
	{
		$title   = 'Dr';
		$first   = 'WhoaLookout';
		$initial = '';
		$surname = 'Ho';
		$dob     = '03/10/1980';

		$response = $this->dvlaUtility->generateDvlaNumber( $title, $first, $initial, $surname, $dob );
		$this->assertEquals( $response[0], 'HO999810030W9' );
		$this->assertEquals( $response[1], 'HO999860030W9' );
	}

	public function testGenerateNumberForEitherGenderWithLongSurname()
	{
		$title   = 'Reverend';
		$first   = 'WhoaLookout';
		$initial = '';
		$surname = 'LongSurnameIncoming';
		$dob     = '03/10/1980';

		$response = $this->dvlaUtility->generateDvlaNumber( $title, $first, $initial, $surname, $dob );
		$this->assertEquals( $response[0], 'LONGS810030W9' );
		$this->assertEquals( $response[1], 'LONGS860030W9' );
	}

	public function testIsDvlaNumberValid()
	{
		$title   = 'Mr';
		$first   = 'WhoaLookout';
		$initial = '';
		$surname = 'Ho';
		$dob     = '03/10/1980';

		$response = $this->dvlaUtility->isDvlaNumberValid( $title, $first, $initial, $surname, $dob, 'HO999810030W99AA');
		$this->assertTrue( $response );
	}

	public function testInvalidDvlaNumber()
	{
		$title   = 'Mr';
		$first   = 'WhoaLookout';
		$initial = '';
		$surname = 'Ho';
		$dob     = '03/10/1980';

		$response = $this->dvlaUtility->isDvlaNumberValid( $title, $first, $initial, $surname, $dob, 'BRO99810030W99AA');
		$this->assertFalse( $response );
	}


}