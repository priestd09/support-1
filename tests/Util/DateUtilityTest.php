<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 23/04/15
 * Time: 15:21
 */

class DateUtilityTest extends PHPUnit_Framework_TestCase{

	/**
	 * @var \Talv\Support\Util\DateUtility
	 */
	private $dateUtil;

	public function setUp()
	{
		$this->dateUtil = new \Talv\Support\Util\DateUtility();
	}

	public function testValidUkDateWithMysqlDate()
	{
		$response = $this->dateUtil->toUk( '1986-01-03' );
		$this->assertEquals( $response, '03/01/1986');
	}

	public function testValidUkDateWithUkDate()
	{
		$response = $this->dateUtil->toUk('03/01/1986');
		$this->assertEquals( $response, '03/01/1986');
	}

	/**
	 * @expectedException Exception
	 */
	public function testUkGarbageDate()
	{
		$this->dateUtil->toUk('1111111');
	}

	public function testValidMySqlDateWithMysqlDate()
	{
		$response = $this->dateUtil->toMySql('03/01/1986');
		$this->assertEquals( $response, '1986-01-03');
	}

	public function testValidMySqlDateWithUkDate()
	{
		$response = $this->dateUtil->toMySql('1986-01-03');
		$this->assertEquals( $response, '1986-01-03');
	}


	/**
	 * @expectedException Exception
	 */
	public function testMysqlGarbageDate()
	{
		$this->dateUtil->toMySql('1111111');
	}

}