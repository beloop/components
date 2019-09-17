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

namespace Beloop\Bundle\CourseBundle\DataFixtures\ORM;

use DateInterval;
use DateTime;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Beloop\Bundle\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Beloop\Component\Core\Services\ObjectDirector;

/**
 * CourseData class.
 *
 * Load fixtures of course entities
 */
class CourseData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var ObjectDirector courseDirector
         */
        $courseDirector = $this->getDirector('course');

        /**
         * @var ObjectDirector userDirector
         */
        $userEnrollment = $this->getFactory('course_enrolled_user');

        /**
         * Course.
         */
        $course1 = $courseDirector
            ->create()
            ->setCode('FOOD-EN-20160401')
            ->setName('Food Styling & Photography')
            ->setDescription('<p>Food Styling & Photography course description</p>')
            ->setLanguage($this->getReference('language-en'));

        /**
         * Enroll some users
         */
        $enrollment11 = $userEnrollment
            ->create()
            ->setUser($this->getReference('admin'))
            ->setCourse($course1);
        $course1->enrollUser($enrollment11);

        $enrollment12 = $userEnrollment
            ->create()
            ->setUser($this->getReference('teacher'))
            ->setCourse($course1);
        $course1->enrollUser($enrollment12);

        $enrollment13 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user1'))
            ->setCourse($course1);
        $course1->enrollUser($enrollment13);

        $enrollment14 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user2'))
            ->setCourse($course1);
        $course1->enrollUser($enrollment14);

        $enrollment15 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user3'))
            ->setCourse($course1);
        $course1->enrollUser($enrollment15);

        $enrollment16 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user4'))
            ->setCourse($course1);
        $course1->enrollUser($enrollment16);

        $courseDirector->save($course1);
        $this->addReference('course-1', $course1);

        /**
         * Course.
         */
        $course2 = $courseDirector
            ->create()
            ->setCode('FOOD-ES-20160401')
            ->setName('Estilismo y Fotografía Gastronómica')
            ->setDescription('<p>Estilismo y Fotografía Gastronómica descripción del curso</p>')
            ->setLanguage($this->getReference('language-es'));

        /**
         * Enroll some users
         */
        $enrollment21 = $userEnrollment
            ->create()
            ->setUser($this->getReference('admin'))
            ->setCourse($course2);
        $course2->enrollUser($enrollment21);

        $enrollment22 = $userEnrollment
            ->create()
            ->setUser($this->getReference('teacher'))
            ->setCourse($course2);
        $course2->enrollUser($enrollment22);

        $enrollment23 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user4'))
            ->setCourse($course2);
        $course2->enrollUser($enrollment23);

        $enrollment24 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user5'))
            ->setCourse($course2);
        $course2->enrollUser($enrollment24);

        $enrollment25 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user6'))
            ->setCourse($course2);
        $course2->enrollUser($enrollment25);

        $enrollment26 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user7'))
            ->setCourse($course2);
        $course2->enrollUser($enrollment26);

        $courseDirector->save($course2);
        $this->addReference('course-2', $course2);

        /**
         * Course.
         */
        $course3 = $courseDirector
            ->create()
            ->setCode('STILL-EN-20160401')
            ->setName('Composition & Visual Perception')
            ->setDescription('<p>Composition & Visual Perception course description</p>')
            ->setLanguage($this->getReference('language-en'));

        /**
         * Enroll some users
         */
        $enrollment31 = $userEnrollment
            ->create()
            ->setUser($this->getReference('admin'))
            ->setCourse($course3);
        $course3->enrollUser($enrollment31);

        $enrollment32 = $userEnrollment
            ->create()
            ->setUser($this->getReference('teacher'))
            ->setCourse($course3);
        $course3->enrollUser($enrollment32);

        $enrollment33 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user6'))
            ->setCourse($course3);
        $course3->enrollUser($enrollment33);

        $enrollment34 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user7'))
            ->setCourse($course3);
        $course3->enrollUser($enrollment34);

        $enrollment35 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user8'))
            ->setCourse($course3);
        $course3->enrollUser($enrollment35);

        $enrollment36 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user9'))
            ->setCourse($course3);
        $course3->enrollUser($enrollment36);

        $enrollment37 = $userEnrollment
            ->create()
            ->setUser($this->getReference('user10'))
            ->setCourse($course3);
        $course3->enrollUser($enrollment37);

        $courseDirector->save($course3);
        $this->addReference('course-3', $course3);

        /**
         * Course.
         */
        $course4 = $courseDirector
            ->create()
            ->setCode('STILL-ES-20160401')
            ->setName('Composición y Percepción Visual')
            ->setDescription('<p>Composición y Percepción Visual</p>')
            ->setLanguage($this->getReference('language-es'));

        $enrollment41 = $userEnrollment
            ->create()
            ->setUser($this->getReference('admin'))
            ->setCourse($course4);
        $course4->enrollUser($enrollment41);

        $enrollment42 = $userEnrollment
            ->create()
            ->setUser($this->getReference('teacher'))
            ->setCourse($course4);
        $course4->enrollUser($enrollment42);

        $courseDirector->save($course4);
        $this->addReference('course-4', $course4);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }
}
