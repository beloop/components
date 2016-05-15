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

namespace Beloop\Component\Squarespace\Test\Unit\Factory;

use Beloop\Component\Core\Test\Unit\Factory\Abstracts\AbstractFactoryTest;

class PageFactoryTest extends AbstractFactoryTest
{
    private $page;

    public function setUp()
    {
        $this->page = $this->createInstance();
    }
    
    /**
     * Return the factory namespace.
     *
     * @return string Factory namespace
     */
    public function getFactoryNamespace()
    {
        return 'Beloop\Component\Squarespace\Factory\PageFactory';
    }

    /**
     * Return the entity namespace.
     *
     * @return string Entity namespace
     */
    public function getEntityNamespace()
    {
        return 'Beloop\Component\Squarespace\Entity\Page';
    }

    public function testDefaultValues() {
        $this->assertEquals(true, $this->page->isEnabled());
        $this->assertEquals('squarespace_page', $this->page->getType());
        $this->assertEquals(1, $this->page->getPosition());
    }
}