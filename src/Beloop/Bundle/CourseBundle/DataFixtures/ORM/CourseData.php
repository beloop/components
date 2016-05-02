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

use Doctrine\Common\Persistence\ObjectManager;

use Beloop\Bundle\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Beloop\Component\Core\Services\ObjectDirector;

/**
 * CourseData class.
 *
 * Load fixtures of course entities
 */
class CourseData extends AbstractFixture
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
         * Course.
         */
        $course1 = $courseDirector
            ->create()
            ->setCode('FOOD-EN-20160401')
            ->setName('Food Styling & Photography')
            ->setDescription('<p>Food Styling & Photography course description</p>')
            ->setStartDate(new DateTime())
            ->setEndDate((new DateTime())->add(DateInterval::createFromDateString("6 months")));

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
            ->setStartDate(new DateTime())
            ->setEndDate((new DateTime())->add(DateInterval::createFromDateString("6 months")));

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
            ->setStartDate((new DateTime())->add(DateInterval::createFromDateString("1 month")))
            ->setEndDate((new DateTime())->add(DateInterval::createFromDateString("7 months")));

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
            ->setStartDate((new DateTime())->add(DateInterval::createFromDateString("1 month")))
            ->setEndDate((new DateTime())->add(DateInterval::createFromDateString("7 months")));

        $courseDirector->save($course4);
        $this->addReference('course-4', $course4);
    }
}