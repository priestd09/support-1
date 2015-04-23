<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 23/04/15
 * Time: 12:00
 */

class UkDateTest extends PHPUnit_Framework_TestCase{

	/**
	 * @var \Talv\Support\Validation\ValidatorInterface
	 */
	private $validator;

	public function setUp()
	{
		$this->validator = new \Talv\Support\Validation\UkDateValidator;
	}

	public function testValidDate()
	{
		$response = $this->validator->validate( '03/01/1986' );
		$this->assertTrue( $response );
	}

	public function testInvalidDate()
	{
		$response = $this->validator->validate( '03-01-1986' );
		$this->assertFalse( $response );
	}

	public function testRealLeapYear()
	{
		$response = $this->validator->validate( '29/02/2012' );
		$this->assertTrue( $response );
	}

	public function testInvalidLeapYear()
	{
		$response = $this->validator->validate( '29/02/1986' );
		$this->assertFalse( $response );
	}

	public function testInvalidDay()
	{
		$response = $this->validator->validate( '52/01/1986' );
		$this->assertFalse( $response );
	}

	public function testInvalidMonth()
	{
		$response = $this->validator->validate( '03/24/1986' );
		$this->assertFalse( $response );
	}

	public function testInvalidFormat()
	{
		$response = $this->validator->validate( '1/1/2015' );
		$this->assertFalse( $response );
	}

}