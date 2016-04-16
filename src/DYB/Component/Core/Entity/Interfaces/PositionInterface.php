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

namespace DYB\Component\Core\Entity\Interfaces;

/**
 * Interface PositionInterface.
 */
interface PositionInterface
{
    /**
     * Set position.
     *
     * @param int $positon position value
     *
     * @return $this Self object
     */
    public function setEnabled($positon);

    /**
     * Get position.
     *
     * @return int Position
     */
    public function getPosition();
}
