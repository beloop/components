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

namespace beloop\Component\Course\Factory;

use DateInterval;
use DateTime;

use Doctrine\Common\Collections\ArrayCollection;

use beloop\Component\Core\Factory\Abstracts\AbstractFactory;

/**
 * Factory for Page entities.
 */
class PageFactory extends AbstractFactory
{

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
    public function create()
    {
        $now = new DateTime();

        /**
         * @var Page $page
         */
        $classNamespace = $this->getEntityNamespace();
        $page = new $classNamespace();

        $page
            ->setPosition(1)
            ->enable()
            ->setCreatedAt($now);

        return $page;
    }
}