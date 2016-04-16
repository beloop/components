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

namespace beloop\Component\Course\Test\Unit\Entity;

use DateInterval;
use DateTime;
use PHPUnit_Framework_TestCase;

use beloop\Component\Course\Entity\Course;
use beloop\Component\Course\Entity\Lesson;
use beloop\Component\Course\Entity\Video;

class VideoTest extends PHPUnit_Framework_TestCase
{
    private $course;
    private $lesson;
    private $video;

    public function setUp()
    {
        $this->course = new Course();
        $this->lesson = new Lesson();
        $this->video = new Video();

        $this->course->setStartDate(new DateTime());
        $this->course->setEndDate(new DateTime());
        $this->lesson->setStartDate(new DateTime());
        $this->video->setLesson($this->lesson);
        $this->lesson->setCourse($this->course);
    }

    public function testDefaultValues() {
        $this->assertEquals('video', $this->video->getType());
    }

    public function testAvailability()
    {
        // Course and chapter start date is after today
        $this->course->getStartDate()->add(DateInterval::createFromDateString("2 months"));
        $this->lesson->getStartDate()->add(DateInterval::createFromDateString("2 months"));
        $this->assertEquals(false, $this->video->isAvailable());

        // Course is available and chapter start date is after today
        $this->course->getStartDate()->sub(DateInterval::createFromDateString("3 months"));
        $this->assertEquals(false, $this->video->isAvailable());

        // Course is available and chapter start date is before today
        $this->lesson->getStartDate()->sub(DateInterval::createFromDateString("2 months"));
        $this->assertEquals(true, $this->video->isAvailable());

        // Course is over
        $this->course->getEndDate()->sub(DateInterval::createFromDateString("8 months"));
        $this->assertEquals(false, $this->video->isAvailable());
    }
}