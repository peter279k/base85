<?php

/*
 * This file is part of the Base85 package
 *
 * Copyright (c) 2017 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   https://github.com/tuupola/base85
 *
 */

namespace Tuupola\Base85;

use Tuupola\Base85;

class Base85Test extends \PHPUnit_Framework_TestCase
{

    public function testShouldBeTrue()
    {
        $this->assertTrue(true);
    }

    public function testShouldEncodeAndDecodeRandomBytes()
    {
        $data = random_bytes(128);
        $encoded = PhpEncoder::encode($data);
        $encoded2 = GmpEncoder::encode($data);
        //$encoded3 = BcmathEncoder::encode($data);
        $decoded = PhpEncoder::decode($encoded);
        $decoded2 = GmpEncoder::decode($encoded2);
        //$decoded3 = BcmathEncoder::decode($encoded3);

        $this->assertEquals($decoded2, $decoded);
        //$this->assertEquals($decoded3, $decoded);
        $this->assertEquals($data, $decoded);
        $this->assertEquals($data, $decoded2);
        //$this->assertEquals($data, $decoded3);

        $base85 = new Encoder;
        $encoded4 = $base85->encode($data);
        $decoded4 = $base85->decode($encoded4);
        $this->assertEquals($data, $decoded4);
    }

    public function testShouldEncodeAndDecodeIntegers()
    {
        $data = 4294967295;

        $encoded = PhpEncoder::encode($data);
        $encoded2 = GmpEncoder::encode($data);
        //$encoded3 = BcmathEncoder::encode($data);
        $decoded = PhpEncoder::decode($encoded, true);
        $decoded2 = GmpEncoder::decode($encoded2, true);
        //$decoded3 = BcmathEncoder::decode($encoded2, true);

        $this->assertEquals($decoded2, $decoded);
        //$this->assertEquals($decoded3, $decoded);
        $this->assertEquals($data, $decoded);
        $this->assertEquals($data, $decoded2);
        //$this->assertEquals($data, $decoded3);

        $base85 = new Encoder;
        $encoded4 = $base85->encode($data);
        $decoded4 = $base85->decode($encoded4, true);
        $this->assertEquals($data, $decoded4);
    }

    public function testShouldEncodeAndDecodeWithLeadingZero()
    {
        $data = hex2bin("07d8e31da269bf28");
        $encoded = PhpEncoder::encode($data);
        $encoded2 = GmpEncoder::encode($data);
        //$encoded3 = BcmathEncoder::encode($data);
        $decoded = PhpEncoder::decode($encoded);
        $decoded2 = GmpEncoder::decode($encoded2);
        //$decoded3 = BcmathEncoder::decode($encoded3);

        $this->assertEquals($decoded2, $decoded);
        //$this->assertEquals($decoded3, $decoded);
        $this->assertEquals($data, $decoded);
        $this->assertEquals($data, $decoded2);
        //$this->assertEquals($data, $decoded3);

        $base85 = new Encoder;
        $encoded4 = $base85->encode($data);
        $decoded4 = $base85->decode($encoded4);
        $this->assertEquals($data, $decoded4);
    }

    public function testShouldAutoSelectEncoder()
    {
        $data = random_bytes(128);
        $encoded = Base85::encode($data);
        $decoded = Base85::decode($encoded);

        $this->assertEquals($data, $decoded);
    }
}
