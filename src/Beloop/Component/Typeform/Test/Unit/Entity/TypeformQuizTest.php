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
use PHPUnit\Framework\TestCase;

use Doctrine\Common\Collections\ArrayCollection;

use Beloop\Component\Course\Entity\Course;
use Beloop\Component\Course\Entity\CourseEnrolledUser;
use Beloop\Component\Course\Entity\Lesson;
use Beloop\Component\Typeform\Entity\TypeformQuiz;
use Beloop\Component\User\Entity\User;

class TypeFormQuizTest extends TestCase
{
    private $course;
    private $lesson;
    private $quiz;

    public function setUp(): void
    {
        $this->course = new Course();
        $this->lesson = new Lesson();
        $this->quiz = new TypeformQuiz();

        $this->user = new User();
        $this->user->setId(1);

        $this->enrolment = new CourseEnrolledUser();
        $this->enrolment->setUser($this->user);

        $this->quiz->setLesson($this->lesson);
        $this->lesson->setCourse($this->course);
        $this->course->setEnrollments(new ArrayCollection([ $this->enrolment ]));
    }

    public function testDefaultValues() {
        $this->assertEquals('typeform_quiz', $this->quiz->getType());
    }

    public function testAvailability()
    {
        // Course and chapter start date is after today
        $this->enrolment->getEnrollmentDate()->add(DateInterval::createFromDateString("2 months"));
        $this->lesson->setOffsetInDays(60);
        $this->assertEquals(false, $this->quiz->isAvailableForUser($this->user));

        // Course is available and chapter start date is after today
        $this->enrolment->getEnrollmentDate()->add(DateInterval::createFromDateString("3 months"));
        $this->assertEquals(false, $this->quiz->isAvailableForUser($this->user));

        // Course is available and chapter start date is before today
        $this->enrolment->getEnrollmentDate()->sub(DateInterval::createFromDateString("5 months"));
        $this->lesson->setOffsetInDays(0);
        $this->assertEquals(true, $this->quiz->isAvailableForUser($this->user));

        // Course is over
        $this->enrolment->getEndDate()->sub(DateInterval::createFromDateString("14 months"));
        $this->assertEquals(false, $this->quiz->isAvailableForUser($this->user));
    }
}
