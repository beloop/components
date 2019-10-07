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

namespace Beloop\Bundle\LanguageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Beloop\Bundle\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Beloop\Component\Core\Services\ObjectDirector;

/**
 * AdminData class.
 *
 * Load fixtures of admin entities
 */
class LanguageData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var ObjectDirector $languageDirector
         */
        $languageDirector = $this->getDirector('language');

        $languageEs = $languageDirector
            ->create()
            ->setIso('es')
            ->setname('Español')
            ->setEnabled(true);

        $languageDirector->save($languageEs);
        $this->addReference('language-es', $languageEs);

        $languageEn = $languageDirector
            ->create()
            ->setIso('en')
            ->setname('English')
            ->setEnabled(true);

        $languageDirector->save($languageEn);
        $this->addReference('language-en', $languageEn);
    }

    public function getOrder()
    {
        return 1;
    }
}
