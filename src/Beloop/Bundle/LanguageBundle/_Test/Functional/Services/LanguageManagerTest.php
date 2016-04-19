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

namespace Beloop\Bundle\LanguageBundle\Test\Functional\Services;

use Beloop\Bundle\CoreBundle\Test\Functional\WebTestCase;

/**
 * Tests LanguageManagerTest class.
 */
class LanguageManagerTest extends WebTestCase
{
    /**
     * Load fixtures of these bundles.
     *
     * @return array Bundles name where fixtures should be found
     */
    protected static function loadFixturesBundles()
    {
        return [
            //'BeloopLanguageBundle',
        ];
    }

    /**
     * Test get languages.
     */
    public function testGetLanguages()
    {
        $languages = $this
            ->get('beloop.manager.language')
            ->getLanguages();

        $this->assertCount(5, $languages);
        $this->assertContainsOnlyInstancesOf(
            'Beloop\Component\Language\Entity\Interfaces\LanguageInterface',
            $languages
        );

        $this->assertEquals(
            'es',
            $languages
                ->first()
                ->getIso()
        );
    }
}