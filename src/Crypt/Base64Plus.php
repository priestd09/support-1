<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:06
 */

namespace Talv\Support\Crypt;

/**
 * Class Base64Plus
 *
 * Base64 encode a string 5 times then reverse it
 *
 * @package Talv\Support\Crypt
 */
class Base64Plus implements CryptInterface{

	/**
	 * @param $str
	 *
	 * @return string
	 */
	public function encode($str){
		for($i=0; $i<5;$i++){
			$str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
		}
		return $str;
	}

	/**
	 * @param $str
	 *
	 * @return string
	 */
	public function decode($str){
		for($i=0; $i<5;$i++)
		{
			$str=base64_decode(strrev($str)); //apply base64 first and then reverse the string}
		}
		return $str;
	}
}