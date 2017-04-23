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
use Beloop\Component\Course\Entity\CourseEnrolledUser;
use Beloop\Component\Course\Entity\Lesson;
use Beloop\Component\Course\Entity\Page;
use Beloop\Component\Course\Entity\Quiz;
use Beloop\Component\Course\Entity\Video;
use Beloop\Component\User\Entity\User;

/**
 * Class LessonTest.
 */
class LessonTest extends PHPUnit_Framework_TestCase {
    private $course;
    private $enrolment;
    private $lesson;
    private $user;

    public function setUp()
    {
        $this->user = new User();
        $this->user->setId(1);

        $this->enrolment = new CourseEnrolledUser();
        $this->enrolment->setUser($this->user);

        $this->course = $this->getMock('Beloop\Component\Course\Entity\Course', null);
        $this->course = new Course();
        $this->lesson = new Lesson();

        $this->lesson->setCourse($this->course);
        $this->lesson->setModules(new ArrayCollection());

        $this->course->setEnrollments(new ArrayCollection([ $this->enrolment ]));
    }

    public function testModuleCollection() {
        $this->assertEquals(0, $this->lesson->getModules()->count());

        $page = $this->getMockForAbstractClass('Beloop\Component\Course\Entity\Abstracts\AbstractModule');
        $this->lesson->addModule($page);
        $this->assertEquals(1, $this->lesson->getModules()->count());

        $quiz = $this->getMockForAbstractClass('Beloop\Component\Course\Entity\Abstracts\AbstractModule');
        $this->lesson->addModule($quiz);
        $this->assertEquals(2, $this->lesson->getModules()->count());

        $video = $this->getMockForAbstractClass('Beloop\Component\Course\Entity\Abstracts\AbstractModule');
        $this->lesson->addModule($video);
        $this->assertEquals(3, $this->lesson->getModules()->count());

        $this->lesson->addModule($video);
        $this->assertEquals(3, $this->lesson->getModules()->count());
    }

    public function testAvailability()
    {
        // Course and chapter start date is after today
        $this->enrolment->getEnrollmentDate()->add(DateInterval::createFromDateString("2 months"));
        $this->lesson->setOffsetInDays(30);
        $this->assertEquals(false, $this->lesson->isAvailableForUser($this->user));

        // Course is available and chapter start date is after today
        $this->enrolment->getEnrollmentDate()->sub(DateInterval::createFromDateString("3 months"));
        $this->lesson->setOffsetInDays(120);
        $this->assertEquals(false, $this->lesson->isAvailableForUser($this->user));

        // Course is available and chapter start date is before today
        $this->enrolment->getEnrollmentDate()->sub(DateInterval::createFromDateString("2 months"));
        $this->lesson->setOffsetInDays(0);
        $this->assertEquals(true, $this->lesson->isAvailableForUser($this->user));

        // Course is over
        $this->enrolment->getEndDate()->sub(DateInterval::createFromDateString("8 months"));
        $this->assertEquals(false, $this->lesson->isAvailableForUser($this->user));
    }

    public function testSerialization()
    {
        $this->lesson->setName('A lesson name');
        $this->lesson->setSlug('lesson-name');
        $this->lesson->setDescription('Lesson description');
        $this->lesson->enable();

        $serialized = $this->lesson->serialize();
        $this->assertEquals(null, $serialized['id']);
        $this->assertEquals('A lesson name', $serialized['name']);
        $this->assertEquals('Lesson description', $serialized['description']);
        $this->assertEquals(true, $serialized['enabled']);
        $this->assertEquals(0, $serialized['modules']);
    }
}
