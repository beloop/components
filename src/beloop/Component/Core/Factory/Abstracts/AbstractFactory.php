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

namespace beloop\Component\Core\Factory\Abstracts;

use DateTime;

use beloop\Component\Core\Factory\Traits\EntityNamespaceTrait;

/**
 * Class AbstractFactory.
 *
 * Entity factories create a pristine instance for the specified Entity
 *
 * Entity initialization logic should be placed right here.
 *
 * Injected entity namespace should not be duplicated.
 */
abstract class AbstractFactory
{
    use EntityNamespaceTrait;

    /**
     * Get now.
     *
     * @return DateTime Now
     */
    public function now()
    {
        return new DateTime();
    }

    /**
     * Creates an instance of an entity.
     *
     * Queries should be implemented in a repository class
     *
     * This method must always return an empty instance of the related Entity
     * and must initialize it in a consistent state
     *
     * @return object Empty entity
     */
    abstract public function create();
}