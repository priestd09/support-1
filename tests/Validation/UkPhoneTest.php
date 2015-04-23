<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 23/04/15
 * Time: 12:15
 */

class UkPhoneTest extends PHPUnit_Framework_TestCase{

	/**
	 * @var \Talv\Support\Validation\ValidatorInterface
	 */
	private $validator;

	public function setUp()
	{
		$this->validator = new \Talv\Support\Validation\UkPhoneNumberValidator;
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

	public function testLandLine()
	{
		$response = $this->validator->validate( '0121'. $this->generatePhoneNumberTail(6) );
		$this->assertTrue( $response );

	}

	public function testLandLineTooShort()
	{
		$response = $this->validator->validate( '0121'. $this->generatePhoneNumberTail(1) );
		$this->assertFalse( $response );

	}

	public function testMobile()
	{
		$response = $this->validator->validate( '+447'. $this->generatePhoneNumberTail() );
		$this->assertTrue( $response );
	}




}