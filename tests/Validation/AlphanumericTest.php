<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:54
 */

class AlphanumericValidation extends PHPUnit_Framework_TestCase{

	/**
	 * @var \Talv\Support\Validation\Alphanumeric
	 */
	private $validator;

	public function setUp()
	{
		$this->validator = new \Talv\Support\Validation\Alphanumeric;
	}

	public function testValid()
	{
		$response = $this->validator->validate( 'Abc.ed/_,:z' );
		$this->assertTrue( $response );
	}

	public function testNumbers()
	{

		for( $i = 0; $i <= 9; $i++ )
		{
			$response = $this->validator->validate( $i );
			$this->assertTrue( $response );
		}
	}

	public function testSpecialChars()
	{
		$response = $this->validator->validate( '&' );
		$this->assertFalse( $response );

		$response = $this->validator->validate( '@' );
		$this->assertFalse( $response );

		$response = $this->validator->validate( '+' );
		$this->assertFalse( $response );
	}

}
