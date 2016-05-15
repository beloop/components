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

namespace Beloop\Component\Squarespace\Entity;

use Beloop\Component\Course\Entity\Abstracts\ExternalModule;

class Page extends ExternalModule
{
    /**
     * Module type
     */
    const TYPE = 'squarespace_page';

    /**
     * @return mixed
     */
    public function getType()
    {
        return static::TYPE;
    }
}