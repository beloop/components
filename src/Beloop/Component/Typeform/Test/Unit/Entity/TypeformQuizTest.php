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

namespace Beloop\Component\Typeform\Test\Unit\Entity;

use DateInterval;
use DateTime;
use PHPUnit_Framework_TestCase;

use Beloop\Component\Course\Entity\Course;
use Beloop\Component\Course\Entity\Lesson;
use Beloop\Component\Typeform\Entity\TypeformQuiz;

class TypeFormQuizTest extends PHPUnit_Framework_TestCase
{
    private $course;
    private $lesson;
    private $quiz;

    public function setUp()
    {
        $this->course = new Course();
        $this->lesson = new Lesson();
        $this->quiz = new TypeformQuiz();

        $this->course->setStartDate(new DateTime());
        $this->course->setEndDate(new DateTime());
        $this->course->getEndDate()->add(DateInterval::createFromDateString("2 months"));
        $this->lesson->setStartDate(new DateTime());
        $this->quiz->setLesson($this->lesson);
        $this->lesson->setCourse($this->course);
    }

    public function testDefaultValues() {
        $this->assertEquals('typeform_quiz', $this->quiz->getType());
    }

    public function testAvailability()
    {
        // Course and chapter start date is after today
        $this->course->getStartDate()->add(DateInterval::createFromDateString("2 months"));
        $this->lesson->getStartDate()->add(DateInterval::createFromDateString("2 months"));
        $this->assertEquals(false, $this->quiz->isAvailable());

        // Course is available and chapter start date is after today
        $this->course->getStartDate()->sub(DateInterval::createFromDateString("3 months"));
        $this->assertEquals(false, $this->quiz->isAvailable());

        // Course is available and chapter start date is before today
        $this->lesson->getStartDate()->sub(DateInterval::createFromDateString("2 months"));
        $this->assertEquals(true, $this->quiz->isAvailable());

        // Course is over
        $this->course->getEndDate()->sub(DateInterval::createFromDateString("8 months"));
        $this->assertEquals(false, $this->quiz->isAvailable());
    }
}