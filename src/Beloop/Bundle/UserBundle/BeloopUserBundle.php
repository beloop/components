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

namespace Beloop\Bundle\UserBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\KernelInterface;

use Beloop\Bundle\CoreBundle\Abstracts\AbstractBundle;
use Beloop\Bundle\UserBundle\CompilerPass\MappingCompilerPass;
use Beloop\Bundle\UserBundle\DependencyInjection\BeloopUserExtension;

/**
 * BeloopUserBundle Bundle.
 */
class BeloopUserBundle extends AbstractBundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new MappingCompilerPass());
    }

    /**
     * Returns the bundle's container extension.
     *
     * @return ExtensionInterface The container extension
     */
    public function getContainerExtension()
    {
        return new BeloopUserExtension();
    }

    /**
     * Create instance of current bundle, and return dependent bundle namespaces.
     *
     * @param KernelInterface $kernel
     * @return array Bundle instances
     */
    public static function getBundleDependencies(KernelInterface $kernel)
    {
        return [
            'Beloop\Bundle\CoreBundle\BeloopCoreBundle',
        ];
    }
}
