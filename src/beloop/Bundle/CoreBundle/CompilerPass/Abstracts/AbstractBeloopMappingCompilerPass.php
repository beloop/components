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

namespace Beloop\Bundle\CoreBundle\CompilerPass\Abstracts;

use Mmoreram\SimpleDoctrineMapping\CompilerPass\Abstracts\AbstractMappingCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AbstractBeloopMappingCompilerPass extends AbstractMappingCompilerPass
{
    /**
     * Add entity mapping given the entity name, given that all entity
     * definitions are built the same way and given also that the method
     * addEntityMapping exists and is accessible.
     *
     * @param ContainerBuilder $container Container
     * @param array            $entities  Name of the entities
     *
     * @return $this Self object
     */
    protected function addEntityMappings(
        ContainerBuilder $container,
        array $entities
    ) {
        foreach ($entities as $entity) {
            $this
                ->addEntityMapping(
                    $container,
                    'beloop.entity.' . $entity . '.manager',
                    'beloop.entity.' . $entity . '.class',
                    'beloop.entity.' . $entity . '.mapping_file',
                    'beloop.entity.' . $entity . '.enabled'
                );
        }

        return $this;
    }
}