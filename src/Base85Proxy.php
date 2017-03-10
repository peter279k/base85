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

namespace Tuupola;

use Tuupola\Base85;

final class Base85Proxy
{
    public static $options = [
        "characters" => Base85::ASCII85,
        "compress.spaces" => false,
        "compress.zeroes" => true,
        "prefix" => null,
        "suffix" => null,
    ];

    public static function encode($data, $options = [])
    {
        return (new Base85(self::$options))->encode($data);
    }

    public static function decode($data, $integer = false, $options = [])
    {
        return (new Base85(self::$options))->decode($data, $integer);
    }
}
