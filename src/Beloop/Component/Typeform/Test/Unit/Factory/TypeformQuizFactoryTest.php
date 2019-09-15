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

namespace Beloop\Component\Typeform\Test\Unit\Factory;

use PHPUnit\Framework\TestCase;

use Beloop\Component\Typeform\Factory\TypeformQuizFactory;

class TypeformQuizFactoryTest extends TestCase
{
    private $quiz;

    public function setUp(): void
    {
        $factory = new TypeformQuizFactory();
        $factory->setEntityNamespace('Beloop\Component\Typeform\Entity\TypeformQuiz');
        $this->quiz = $factory->create();
    }

    public function testDefaultValues() {
        $this->assertEquals(true, $this->quiz->isEnabled());
        $this->assertEquals('typeform_quiz', $this->quiz->getType());
        $this->assertEquals(1, $this->quiz->getPosition());
    }
}
