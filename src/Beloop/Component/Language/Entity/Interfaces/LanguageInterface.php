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

namespace Beloop\Component\Language\Entity\Interfaces;

use Beloop\Component\Core\Entity\Interfaces\EnabledInterface;
use Beloop\Component\Core\Entity\Interfaces\IdentifiableInterface;

interface LanguageInterface
    extends
    IdentifiableInterface,
    EnabledInterface
{
    /**
     * Set language name.
     *
     * @param string $name Name of the shop
     *
     * @return $this Self object
     */
    public function setName($name);

    /**
     * Get shop name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set iso.
     *
     * @param string $iso Iso
     *
     * @return $this Self object
     */
    public function setIso($iso);
    
    /**
     * Get iso.
     *
     * @return string
     */
    public function getIso();
}