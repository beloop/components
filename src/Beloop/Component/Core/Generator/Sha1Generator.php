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
 * Class Sha1Generator.
 */
class Sha1Generator implements GeneratorInterface
{
    /**
     * @var GeneratorInterface
     *
     * Generator
     */
    private $generator;

    /**
     * Construct.
     *
     * @param GeneratorInterface $generator Generator
     */
    public function __construct(GeneratorInterface $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Generates a random string with entropy.
     *
     * @param int|null $length Length of string generated
     *
     * @return string Result of generation
     */
    public function generate($length = 1)
    {
        return hash(
            'sha1',
            $this
                ->generator
                ->generate($length)
        );
    }
}