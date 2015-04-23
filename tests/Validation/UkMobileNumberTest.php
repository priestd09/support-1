<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 23/04/15
 * Time: 12:07
 */

class UkMobileNumberTest extends PHPUnit_Framework_TestCase{

	/**
	 * @var \Talv\Support\Validation\ValidatorInterface
	 */
	private $validator;

	public function setUp()
	{
		$this->validator = new \Talv\Support\Validation\UkMobileNumber();
	}

	private function generatePhoneNumberTail( $length = 8)
	{
		$tail = '';
		for( $i = 0; $i <= $length; $i++)
		{
			$tail .= rand(0, 9);
		}

		return $tail;
	}

	public function testValidMobileNoWithPlus44Prefix()
	{
		$number = '+447'. $this->generatePhoneNumberTail();
		$response = $this->validator->validate( $number );
		$this->assertTrue( $response );
	}

	public function testValidMobileNoWith07Prefix()
	{
		$number = '07'. $this->generatePhoneNumberTail();
		$response = $this->validator->validate( $number );
		$this->assertTrue( $response );
	}

	public function testInvalidCountryCode()
	{
		$number = '+017'. $this->generatePhoneNumberTail();
		$response = $this->validator->validate( $number );
		$this->assertFalse( $response );
	}

	public function testLengthTooShort()
	{
		$number = '07'. $this->generatePhoneNumberTail(7);
		$response = $this->validator->validate( $number );
		$this->assertFalse( $response );
	}

	public function testLengthTooLong()
	{
		$number = '07'. $this->generatePhoneNumberTail(9);
		$response = $this->validator->validate( $number );
		$this->assertFalse( $response );
	}

	public function testBrackets()
	{
		$number = '(07'. $this->generatePhoneNumberTail(3). ') '.$this->generatePhoneNumberTail(5);
		$response = $this->validator->validate( $number );
		$this->assertFalse( $response );
	}

}