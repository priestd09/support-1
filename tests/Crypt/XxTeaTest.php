<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:54
 */

class XxTeaTest extends PHPUnit_Framework_TestCase{

	/**
	 * @var \Talv\Support\Crypt\Base64
	 */
	private $crypt;

	public function setUp()
	{
		$this->crypt = new \Talv\Support\Crypt\XxTea('testtesttesttest');
	}

	public function testEncode()
	{
		$response = $this->crypt->encode( 'test' );
		$this->assertEquals( base64_encode($response), "8Uegvyek79o=" );
	}

	public function testDecode()
	{

		$response = $this->crypt->decode( base64_decode("8Uegvyek79o=") );
		$this->assertEquals( $response, "test" );
	}

}
