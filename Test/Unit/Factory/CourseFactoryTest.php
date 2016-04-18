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

namespace Beloop\Component\Course\Test\Unit\Factory;

use Beloop\Component\Core\Test\Unit\Factory\Abstracts\AbstractFactoryTest;

class CourseFactoryTest extends AbstractFactoryTest
{
    private $course;

    public function setUp()
    {
        $this->course = $this->createInstance();
    }
    
    /**
     * Return the factory namespace.
     *
     * @return string Factory namespace
     */
    public function getFactoryNamespace()
    {
        return 'Beloop\Component\Course\Factory\CourseFactory';
    }

    /**
     * Return the entity namespace.
     *
     * @return string Entity namespace
     */
    public function getEntityNamespace()
    {
        return 'Beloop\Component\Course\Entity\Course';
    }

    public function testDefaultValues() {
        $this->assertEquals(true, $this->course->isEnabled());

        $interval = $this->course->getEndDate()->diff($this->course->getStartDate());
        $this->assertEquals(6, $interval->format('%m'));
    }
}