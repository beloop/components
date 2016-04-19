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

namespace Beloop\Component\Language\Entity;

use Beloop\Component\Core\Entity\Traits\EnabledTrait;
use Beloop\Component\Core\Entity\Traits\IdentifiableTrait;
use Beloop\Component\Language\Entity\Interfaces\LanguageInterface;

/**
 * Class Language.
 */
class Language implements LanguageInterface
{
    use IdentifiableTrait,
        EnabledTrait;
    
    /**
     * @var string
     *
     * Language name
     */
    protected $name;

    /**
     * @var string
     *
     * Language iso
     */
    protected $iso;

    /**
     * Set language name.
     *
     * @param string $name Name of the shop
     *
     * @return $this Self object
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get shop name.
     *
     * @return string Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set iso.
     *
     * @param string $iso Iso
     *
     * @return $this Self object
     */
    public function setIso($iso)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Get iso.
     *
     * @return string Iso
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * To string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getIso();
    }
}