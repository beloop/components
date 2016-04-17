<?php

/*
 * This file is part of the beloop package.
 *
 * Copyright (c) 2016 beloop Studio B.V.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 */

namespace beloop\Component\Course\Test\Unit\Factory;

use beloop\Component\Core\Test\Unit\Factory\Abstracts\AbstractFactoryTest;

class VideoFactoryTest extends AbstractFactoryTest
{
    private $video;

    public function setUp()
    {
        $this->video = $this->createInstance();
    }
    
    /**
     * Return the factory namespace.
     *
     * @return string Factory namespace
     */
    public function getFactoryNamespace()
    {
        return 'beloop\Component\Course\Factory\VideoFactory';
    }

    /**
     * Return the entity namespace.
     *
     * @return string Entity namespace
     */
    public function getEntityNamespace()
    {
        return 'beloop\Component\Course\Entity\Video';
    }

    public function testDefaultValues() {
        $this->assertEquals(true, $this->video->isEnabled());
        $this->assertEquals('video', $this->video->getType());
        $this->assertEquals(1, $this->video->getPosition());
    }
}