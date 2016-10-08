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
use PHPUnit_Framework_TestCase;

use Doctrine\Common\Collections\ArrayCollection;

use Beloop\Component\Course\Entity\Course;
use Beloop\Component\Course\Entity\Lesson;
use Beloop\Component\Language\Entity\Language;

/**
 * Class CourseTest.
 */
class CourseTest extends PHPUnit_Framework_TestCase
{
    private $course;

    public function setUp()
    {
        $language = new Language();
        $language->setIso('es');

        $this->course = new Course();
        $this->course->setLessons(new ArrayCollection());
        $this->course->setStartDate(new DateTime());
        $this->course->setEndDate((new DateTime())->add(DateInterval::createFromDateString("6 months")));
        $this->course->setLanguage($language);
    }

    public function testLessonCollection() {
        $this->assertEquals(0, $this->course->getLessons()->count());

        $chapter = new Lesson();
        $this->course->addLesson($chapter);
        $this->assertEquals(1, $this->course->getLessons()->count());
        
        $this->course->addLesson($chapter);
        $this->assertEquals(1, $this->course->getLessons()->count());
        
        $this->course->removeLesson($chapter);
        $this->assertEquals(0, $this->course->getLessons()->count());

        $this->assertEquals($this->course, $chapter->getCourse());
    }
    
    public function testAvailability()
    {
        // Start date is after today
        $this->course->getStartDate()->add(DateInterval::createFromDateString("2 months"));
        $this->assertEquals(false, $this->course->isAvailable());

        // Start date is before today and end date is after today
        $this->course->getStartDate()->sub(DateInterval::createFromDateString("3 months"));
        $this->assertEquals(true, $this->course->isAvailable());

        // Start date and end date are before today
        $this->course->getEndDate()->sub(DateInterval::createFromDateString("8 months"));
        $this->assertEquals(false, $this->course->isAvailable());
    }

    public function testSerialization()
    {
        $language = new Language();
        $language->setIso('es');

        $this->course->setCode('UNIQUE-COURSE');
        $this->course->setName('A course name');
        $this->course->setDescription('Course description');
        $this->course->setLanguage($language);
        $this->course->setDemo(true);
        $this->course->enable();

        $serialized = $this->course->serialize();
        $this->assertEquals(null, $serialized['id']);
        $this->assertEquals('A course name', $serialized['name']);
        $this->assertEquals('UNIQUE-COURSE', $serialized['code']);
        $this->assertEquals('Course description', $serialized['description']);
        $this->assertEquals('es', $serialized['language']);
        $this->assertEquals(true, $serialized['demo']);
        $this->assertEquals(true, $serialized['enabled']);
        $this->assertEquals(0, $serialized['enrolledUsers']);
        $this->assertEquals(0, $serialized['lessons']);
        $this->assertEquals($this->course->getStartDate()->getTimestamp(), $serialized['startDate']);
        $this->assertEquals($this->course->getEndDate()->getTimestamp(), $serialized['endDate']);
    }
}
