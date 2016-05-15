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

namespace Beloop\Bundle\SquarespaceBundle\DataFixtures\ORM;

use DateInterval;
use DateTime;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Beloop\Bundle\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Beloop\Component\Core\Services\ObjectDirector;

/**
 * SquarespacePageData class.
 *
 * Load fixtures of course entities
 */
class SquarespacePageData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var ObjectDirector pageDirector
         */
        $pageDirector = $this->getDirector('squarespace_page');

        /**
         * Squarespace page.
         */
        $page1 = $pageDirector
            ->create()
            ->setName('Page 1')
            ->setIcon('external-link')
            ->setUrl('')
            ->setLesson($this->getReference('lesson-1'));

        $pageDirector->save($page1);
        $this->addReference('page-1', $page1);
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