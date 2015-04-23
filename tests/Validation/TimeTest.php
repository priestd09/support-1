<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 23/04/15
 * Time: 11:40
 */

class TimeTest extends PHPUnit_Framework_TestCase{

	/**
	 * @var \Talv\Support\Validation\ValidatorInterface
	 */
	private $validator;

	public function setUp()
	{
		$this->validator = new \Talv\Support\Validation\TimeValidator;
	}

	public function testValidTime()
	{
		for( $h = 0; $h <= 23; $h++) {

			for( $m = 0; $m <= 59; $m++ ) {
				$h = str_pad($h, 2, 0);
				$m = str_pad($m, 2, 0);

				$response = $this->validator->validate( $h . ':'. $m );
				$this->assertTrue( $response );
			}
		}
	}

	public function testInvalidHour()
	{

		$h = rand(24, 100);
		$m = rand(0, 59);

		$response = $this->validator->validate( $h . ':', $m );
		$this->assertFalse( $response );

	}

	public function testInvalidMinute()
	{
		$h = rand(0, 24);
		$m = rand(60, 100);

		$response = $this->validator->validate( $h . ':', $m );
		$this->assertFalse( $response );
	}

}