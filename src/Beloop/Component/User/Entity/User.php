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

namespace Beloop\Component\User\Entity;

use Symfony\Component\Security\Core\Role\Role;

use Beloop\Component\Language\Entity\Interfaces\LanguageInterface;
use Beloop\Component\User\Entity\Abstracts\AbstractUser;
use Beloop\Component\User\Entity\Interfaces\UserInterface;

class User extends AbstractUser implements UserInterface
{
    /**
     * @var LanguageInterface
     *
     * Language
     */
    protected $language;

    /**
     * @var bool
     *
     * Is guest
     */
    protected $guest;

    /**
     * Sets Guest.
     *
     * @param bool $guest Guest
     *
     * @return $this Self object
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;

        return $this;
    }

    /**
     * Get Guest.
     *
     * @return bool Guest
     */
    public function isGuest()
    {
        return $this->guest;
    }

    /**
     * Set language.
     *
     * @param LanguageInterface $language The language
     *
     * @return $this Self object
     */
    public function setLanguage(LanguageInterface $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return LanguageInterface
     */
    public function getLanguage()
    {
        return $this->language;
    }
}