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

namespace Beloop\Component\User\Entity\Interfaces;

use Beloop\Component\Language\Entity\Interfaces\LanguageInterface;

interface UserInterface extends AbstractUserInterface
{
    /**
     * Sets Guest.
     *
     * @param bool $guest Guest
     *
     * @return $this Self object
     */
    public function setGuest($guest);

    /**
     * Get Guest.
     *
     * @return bool Guest
     */
    public function isGuest();

    /**
     * Set language.
     *
     * @param LanguageInterface $language The language
     *
     * @return $this Self object
     */
    public function setLanguage(LanguageInterface $language);

    /**
     * Get language.
     *
     * @return LanguageInterface
     */
    public function getLanguage();
}