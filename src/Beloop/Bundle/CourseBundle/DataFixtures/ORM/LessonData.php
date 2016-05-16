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
 * LessonData class.
 *
 * Load fixtures of lesson entities
 */
class LessonData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var ObjectDirector lessonDirector
         */
        $lessonDirector = $this->getDirector('lesson');

        /**
         * Lesson.
         */
        $lesson1 = $lessonDirector
            ->create()
            ->setCourse($this->getReference('course-1'))
            ->setName('Photography Basics')
            ->setSlug('photography-basics')
            ->setDescription('<p>Photography Basics lesson description</p>')
            ->setPosition(1)
            ->setStartDate(new DateTime());

        $lessonDirector->save($lesson1);
        $this->addReference('lesson-1', $lesson1);

        /**
         * Lesson.
         */
        $lesson2 = $lessonDirector
            ->create()
            ->setCourse($this->getReference('course-1'))
            ->setName('Food Styling Basics')
            ->setSlug('food-styling-basics')
            ->setDescription('<p>Food Styling Basics lesson description</p>')
            ->setPosition(2)
            ->setStartDate((new DateTime())->add(DateInterval::createFromDateString("2 weeks")));

        $lessonDirector->save($lesson2);
        $this->addReference('lesson-2', $lesson2);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }
}