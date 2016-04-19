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

namespace Beloop\Component\User\Factory;

use DateTime;

use Beloop\Component\Core\Factory\Abstracts\AbstractFactory;
use Beloop\Component\Core\Generator\Interfaces\GeneratorInterface;

/**
 * Class AdminUserFactory.
 */
class AdminUserFactory extends AbstractFactory
{
    /**
     * @var GeneratorInterface
     *
     * Generator
     */
    private $generator;

    /**
     * Token generator.
     *
     * @param GeneratorInterface $generator Token generator
     */
    public function setGenerator(GeneratorInterface $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Creates an instance of an entity.
     *
     * This method must return always an empty instance
     *
     * @return AdminUserInterface Empty entity
     */
    public function create()
    {
        /**
         * @var AdminUserInterface $adminUser
         */
        $classNamespace = $this->getEntityNamespace();
        $adminUser = new $classNamespace();
        $adminUser
            ->setToken($this->generator->generate(2))
            ->setEnabled(true)
            ->setCreatedAt(new DateTime());

        return $adminUser;
    }
}