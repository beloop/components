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

use DYB\Component\Course\Entity\Course;
use DYB\Component\Course\Entity\Chapter;

/**
 * Class CourseTest.
 */
class CourseTest extends PHPUnit_Framework_TestCase
{
    private $course;

    public function setUp()
    {
        $this->course = new Course();
    }

    public function testDefaultValues() {
        $this->assertEquals(true, $this->course->isEnabled());

        $interval = $this->course->getEndDate()->diff($this->course->getStartDate());
        $this->assertEquals(6, $interval->format('%m'));
    }

    public function testChapterCollection() {
        $this->assertEquals(0, $this->course->getChapters()->count());

        $chapter = new Chapter();
        $this->course->addChapter($chapter);
        $this->assertEquals(1, $this->course->getChapters()->count());
        $this->course->addChapter($chapter);
        $this->assertEquals(1, $this->course->getChapters()->count());
        $this->course->removeChapter($chapter);
        $this->assertEquals(0, $this->course->getChapters()->count());
    }
}
