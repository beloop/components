<?php

/*
 * This file is part of the DYB package.
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

namespace DYB\Component\Core\Entity\Traits;

/**
 * Trait OrderTrait.
 */
trait OrderTrait
{
    /**
     * @var int
     *
     * Order
     */
    protected $order;

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return $this Self object
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }
    
    
}