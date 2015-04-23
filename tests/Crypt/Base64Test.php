<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:54
 */

class Base64Test extends PHPUnit_Framework_TestCase{

	/**
	 * @var \Talv\Support\Crypt\Base64Plus
	 */
	private $crypt;

	public function setUp()
	{
		$this->crypt = new \Talv\Support\Crypt\Base64Plus();
	}

	public function testEncode()
	{
		$response = $this->crypt->encode( 'test' );

		$this->assertEquals( $response, "VZlSXRVVOdnUs50MadEeWVWVWdVVB1TP" );
	}

	public function testDecode()
	{
		$response = $this->crypt->decode( "VZlSXRVVOdnUs50MadEeWVWVWdVVB1TP" );
		$this->assertEquals( $response, 'test' );
	}

}
