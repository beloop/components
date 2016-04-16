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

namespace beloop\Component\Core\Entity\Traits;

/**
 * Trait PositionTrait.
 */
trait PositionTrait
{
    /**
     * @var int
     *
     * Position
     */
    protected $position;

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return $this Self object
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }
}