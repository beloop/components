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

namespace Beloop\Component\Course\Entity;

use Beloop\Component\Course\Entity\Abstracts\Module;

class Page extends Module
{
    private $type = 'page';

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


}