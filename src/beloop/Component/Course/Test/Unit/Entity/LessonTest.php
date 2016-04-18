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

namespace Beloop\Component\Course\Test\Unit\Entity;

use DateInterval;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit_Framework_TestCase;

use Beloop\Component\Course\Entity\Course;
use Beloop\Component\Course\Entity\Lesson;
use Beloop\Component\Course\Entity\Page;
use Beloop\Component\Course\Entity\Quiz;
use Beloop\Component\Course\Entity\Video;

/**
 * Class LessonTest.
 */
class LessonTest extends PHPUnit_Framework_TestCase {
    private $course;
    private $lesson;

    public function setUp()
    {
        $this->course = $this->getMock('Beloop\Component\Course\Entity\Course', null);
        $this->course = new Course();
        $this->lesson = new Lesson();

        $this->course->setStartDate(new DateTime());
        $this->course->setEndDate((new DateTime())->add(DateInterval::createFromDateString("6 months")));
        $this->lesson->setCourse($this->course);
        $this->lesson->setModules(new ArrayCollection());
        $this->lesson->setStartDate(new DateTime());
    }

    public function testModuleCollection() {
        $this->assertEquals(0, $this->lesson->getModules()->count());

        $page = new Page();
        $this->lesson->addModule($page);
        $this->assertEquals(1, $this->lesson->getModules()->count());

        $quiz = new Quiz();
        $this->lesson->addModule($quiz);
        $this->assertEquals(2, $this->lesson->getModules()->count());

        $video = new Video();
        $this->lesson->addModule($video);
        $this->assertEquals(3, $this->lesson->getModules()->count());

        $this->lesson->addModule($video);
        $this->assertEquals(3, $this->lesson->getModules()->count());
    }

    public function testAvailability()
    {
        // Course and chapter start date is after today
        $this->course->getStartDate()->add(DateInterval::createFromDateString("2 months"));
        $this->lesson->getStartDate()->add(DateInterval::createFromDateString("2 months"));
        $this->assertEquals(false, $this->lesson->isAvailable());

        // Course is available and chapter start date is after today
        $this->course->getStartDate()->sub(DateInterval::createFromDateString("3 months"));
        $this->assertEquals(false, $this->lesson->isAvailable());

        // Course is available and chapter start date is before today
        $this->lesson->getStartDate()->sub(DateInterval::createFromDateString("2 months"));
        $this->assertEquals(true, $this->lesson->isAvailable());

        // Course is over
        $this->course->getEndDate()->sub(DateInterval::createFromDateString("8 months"));
        $this->assertEquals(false, $this->lesson->isAvailable());
    }
}