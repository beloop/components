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

namespace Beloop\Bundle\CoreBundle\Test\Functional\Abstracts;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * AbstractBeloopKernel for all Beloop specific Kernels.
 */
abstract class AbstractBeloopKernel extends Kernel
{
    /**
     * Register container configuration.
     *
     * @param LoaderInterface $loader Loader
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $classInfo = new \ReflectionClass($this);
        $dir = dirname($classInfo->getFileName());
        $loader->load($dir . '/config.yml');
    }

    /**
     * Return Cache dir.
     *
     * @return string
     */
    public function getCacheDir()
    {
        return  sys_get_temp_dir() .
            '/Beloop/' .
            $this->getContainerClass() . '/Cache/';
    }

    /**
     * Return log dir.
     *
     * @return string
     */
    public function getLogDir()
    {
        return  sys_get_temp_dir() .
            '/Beloop/' .
            $this->getContainerClass() . '/Log/';
    }
}