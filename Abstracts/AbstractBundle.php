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

namespace Beloop\Bundle\CoreBundle\Abstracts;

use Symfony\Component\Console\Application;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AbstractBundle extends Bundle
{
    /**
     * Register Commands.
     *
     * Disabled as commands are registered as services.
     *
     * @param Application $application An Application instance
     * @return null
     */
    public function registerCommands(Application $application)
    {
        return null;
    }
}