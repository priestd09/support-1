<?php
/**
 * Created by PhpStorm.
 * User: talv
 * Date: 14/04/15
 * Time: 10:05
 */

namespace Talv\Support\Crypt;


interface CryptInterface {
    public function encode($str);
    public function decode($str);
}