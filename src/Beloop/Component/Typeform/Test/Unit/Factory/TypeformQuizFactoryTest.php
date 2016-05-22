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

use Beloop\Component\Core\Test\Unit\Factory\Abstracts\AbstractFactoryTest;

class TypeformQuizFactoryTest extends AbstractFactoryTest
{
    private $quiz;

    public function setUp()
    {
        $this->quiz = $this->createInstance();
    }
    
    /**
     * Return the factory namespace.
     *
     * @return string Factory namespace
     */
    public function getFactoryNamespace()
    {
        return 'Beloop\Component\Typeform\Factory\TypeformQuizFactory';
    }

    /**
     * Return the entity namespace.
     *
     * @return string Entity namespace
     */
    public function getEntityNamespace()
    {
        return 'Beloop\Component\Typeform\Entity\TypeformQuiz';
    }

    public function testDefaultValues() {
        $this->assertEquals(true, $this->quiz->isEnabled());
        $this->assertEquals('typeform_quiz', $this->quiz->getType());
        $this->assertEquals(1, $this->quiz->getPosition());
    }
}