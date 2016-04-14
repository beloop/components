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

namespace DYB\Component\Course\Test\Unit\Entity;

use PHPUnit_Framework_TestCase;

use DYB\Component\Course\Entity\Chapter;

/**
 * Class ChapterTest.
 */
class ChapterTest extends PHPUnit_Framework_TestCase {
    private $chapter;

    public function setUp()
    {
        $this->chapter = new Chapter();
    }

    public function testDefaultValues() {
        $this->assertEquals(true, $this->chapter->isEnabled());
        $this->assertEquals(1, $this->chapter->getOrder());
    }
}