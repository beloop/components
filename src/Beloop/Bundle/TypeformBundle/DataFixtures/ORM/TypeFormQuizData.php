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

namespace Beloop\Bundle\TypeformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Beloop\Bundle\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Beloop\Component\Core\Services\ObjectDirector;

/**
 * TypeformQuizData class.
 *
 * Load fixtures of typeform entities
 */
class TypeformQuizData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var ObjectDirector quizDirector
         */
        $quizDirector = $this->getDirector('typeform_quiz');

        /**
         * TypeForm quiz.
         */
        $quiz1 = $quizDirector
            ->create()
            ->setName('TypeForm quiz 1')
            ->setIcon('quiz')
            ->setUrl('https://freetemplate.typeform.com/to/GiClwL')
            ->setLesson($this->getReference('lesson-1'));

        $quizDirector->save($quiz1);
        $this->addReference('typeform-quiz-1', $quiz1);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 5;
    }
}