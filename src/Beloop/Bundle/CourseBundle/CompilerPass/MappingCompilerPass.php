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

namespace Beloop\Bundle\CourseBundle\CompilerPass;

use Symfony\Component\DependencyInjection\ContainerBuilder;

use Beloop\Bundle\CoreBundle\CompilerPass\Abstracts\AbstractBeloopMappingCompilerPass;

/**
 * Class MappingCompilerPass.
 */
class MappingCompilerPass extends AbstractBeloopMappingCompilerPass
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        $this
            ->addEntityMappings(
                $container,
                [
                    'course',
                    'lesson',
                    'abstract_module',
                    'external_module',
                ]
            );
    }
}