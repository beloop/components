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

use Beloop\Component\Language\Entity\Interfaces\LocaleInterface;

class Locale implements LocaleInterface
{
    /**
     * @var string
     *
     * Locale iso
     */
    protected $localeIso;

    /**
     * Construct method.
     *
     * @param string $localeIso Locale iso
     */
    public function __construct($localeIso)
    {
        $this->localeIso = $localeIso;
    }

    /**
     * Get Iso.
     *
     * @return string Iso
     */
    public function getIso()
    {
        return $this->localeIso;
    }

    /**
     * Create new instance.
     *
     * @param string $localeIso Locale iso
     *
     * @return self New instance
     */
    public static function create($localeIso)
    {
        return new self($localeIso);
    }
}