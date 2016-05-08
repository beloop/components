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

namespace Beloop\Component\Language\Entity\Traits;

use Beloop\Component\Language\Entity\Interfaces\LanguageInterface;

/**
 * Tarit LanguageTrait
 */
trait LanguageTrait
{
    /**
     * @var LanguageInterface
     *
     * Language
     */
    protected $language;

    /**
     * Set language.
     *
     * @param LanguageInterface $language Language value
     *
     * @return $this Self object
     */
    public function setLanguage(LanguageInterface $language)
    {
        $this->language = $language;

        return $this;
    }


    /**
     * Disable.
     *
     * @return $this LanguageInterface Language value
     */
    public function getLanguage()
    {
        return $this->language;
    }
}