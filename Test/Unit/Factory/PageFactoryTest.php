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

class PageFactoryTest extends AbstractFactoryTest
{
    private $lesson;

    public function setUp()
    {
        $this->lesson = $this->createInstance();
    }
    
    /**
     * Return the factory namespace.
     *
     * @return string Factory namespace
     */
    public function getFactoryNamespace()
    {
        return 'Beloop\Component\Course\Factory\PageFactory';
    }

    /**
     * Return the entity namespace.
     *
     * @return string Entity namespace
     */
    public function getEntityNamespace()
    {
        return 'Beloop\Component\Course\Entity\Page';
    }

    public function testDefaultValues() {
        $this->assertEquals(true, $this->lesson->isEnabled());
        $this->assertEquals('page', $this->lesson->getType());
        $this->assertEquals(1, $this->lesson->getPosition());
    }
}