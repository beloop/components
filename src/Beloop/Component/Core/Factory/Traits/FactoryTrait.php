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

namespace Beloop\Component\Core\Factory\Traits;

/**
 * Trait FactoryTrait.
 */
trait FactoryTrait
{
    /**
     * @var \Beloop\Component\Core\Factory\Abstracts\AbstractFactory
     *
     * Factory
     */
    private $factory;

    /**
     * Get Factory.
     *
     * @return \Beloop\Component\Core\Factory\Abstracts\AbstractFactory Factory
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * Sets Factory.
     *
     * @param \Beloop\Component\Core\Factory\Abstracts\AbstractFactory $factory Factory
     *
     * @return $this Self object
     */
    public function setFactory(\Beloop\Component\Core\Factory\Abstracts\AbstractFactory $factory)
    {
        $this->factory = $factory;

        return $this;
    }
}