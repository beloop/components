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

namespace beloop\Component\Core\Tests\UnitTest\Factory\Abstracts;

use PHPUnit_Framework_TestCase;

/**
 * Class AbstractFactoryTest.
 */
abstract class AbstractFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * Return the factory namespace.
     *
     * @return string Factory namespace
     */
    abstract public function getFactoryNamespace();

    /**
     * Return the entity namespace.
     *
     * @return string Entity namespace
     */
    abstract public function getEntityNamespace();

    /**
     * Get mock of the factory.
     */
    protected function getFactoryMock()
    {
        $factoryNamespace = $this->getFactoryNamespace();

        return $this->getMock($factoryNamespace, [
            'getEntityNamespace',
        ], [], '', false);
    }

    /**
     * Test creation of the.
     */
    public function testCreate()
    {
        $factory = $this->getFactoryMock();

        $factory
            ->method('getEntityNamespace')
            ->will($this->returnValue($this->getEntityNamespace()));

        $instance = $factory->create();
        $this->assertInstanceOf(
            $this->getEntityNamespace(),
            $instance
        );
    }

    public function createInstance()
    {
        $factory = $this->getFactoryMock();

        $factory
            ->method('getEntityNamespace')
            ->will($this->returnValue($this->getEntityNamespace()));

        return $factory->create();
    }
}