<?php

/*
 * This file is part of the Beloop package.
 *
 * Copyright (c) 2016 AHDO Studio B.V.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 */

namespace Beloop\Component\Core\Generator;

use Beloop\Component\Core\Generator\Interfaces\GeneratorInterface;

/**
 * Class RandomGenerator.
 */
class RandomGenerator implements GeneratorInterface
{
    /**
     * Generates a random string with entropy.
     *
     * @param int|null $length Length of string generated
     *
     * @return string Result of generation
     */
    public function generate($length = null)
    {
        $bits = $length * 8;
        
        return bin2hex(openssl_random_pseudo_bytes($bits));
    }
}