<?php

/*
 * This file is part of the DYB package.
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

namespace DYB\Component\Course\Test\Unit\Factory;

use DYB\Component\Core\Tests\UnitTest\Factory\Abstracts\AbstractFactoryTest;

class QuizFactoryTest extends AbstractFactoryTest
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
        return 'DYB\Component\Course\Factory\QuizFactory';
    }

    /**
     * Return the entity namespace.
     *
     * @return string Entity namespace
     */
    public function getEntityNamespace()
    {
        return 'DYB\Component\Course\Entity\Quiz';
    }

    public function testDefaultValues() {
        $this->assertEquals(true, $this->quiz->isEnabled());
        $this->assertEquals('quiz', $this->quiz->getType());
        $this->assertEquals(1, $this->quiz->getPosition());
    }
}