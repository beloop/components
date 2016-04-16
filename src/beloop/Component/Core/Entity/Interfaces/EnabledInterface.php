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

namespace beloop\Component\Core\Entity\Interfaces;

/**
 * Interface EnabledInterface.
 */
interface EnabledInterface
{
    /**
     * Set isEnabled.
     *
     * @param bool $enabled enabled value
     *
     * @return $this Self object
     */
    public function setEnabled($enabled);

    /**
     * Get if entity is enabled.
     *
     * @return bool Enabled
     */
    public function isEnabled();
}
