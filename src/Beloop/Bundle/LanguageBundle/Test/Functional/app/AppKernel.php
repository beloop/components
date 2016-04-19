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

namespace Beloop\Bundle\LanguageBundle\Test\Functional\app;

use Mmoreram\SymfonyBundleDependencies\CachedBundleDependenciesResolver;

use Beloop\Bundle\CoreBundle\Test\Functional\Abstracts\AbstractBeloopKernel;

/**
 * Class AppKernel.
 */
class AppKernel extends AbstractBeloopKernel
{
    use CachedBundleDependenciesResolver;

    /**
     * Register application bundles.
     *
     * @return array Array of bundles instances
     */
    public function registerBundles()
    {
        $instances = $this->getBundleInstances($this, [
            'Beloop\Bundle\CoreBundle\BeloopCoreBundle',
            'Symfony\Bundle\FrameworkBundle\FrameworkBundle',
            'Doctrine\Bundle\DoctrineBundle\DoctrineBundle',
            'Beloop\Bundle\LanguageBundle\BeloopLanguageBundle',
            'Elcodi\Bundle\FixturesBoosterBundle\ElcodiFixturesBoosterBundle',
            'Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle',
        ]);
        var_dump($instances);
        return $instances;
    }

    /**
     * Gets the container class.
     *
     * @return string The container class
     */
    protected function getContainerClass()
    {
        return  $this->name .
                ucfirst($this->environment) .
                'DebugProjectContainerLanguage';
    }
}