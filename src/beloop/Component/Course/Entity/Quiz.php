<?php

/*
 * This file is part of the beloop package.
 *
 * Copyright (c) 2016 beloop Studio B.V.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 */

namespace beloop\Component\Course\Entity;

use beloop\Component\Course\Entity\Abstracts\Module;

class Quiz extends Module
{
    private $type = 'quiz';

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    
}