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

use Symfony\Component\HttpFoundation\File\File;

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
     * @var string
     *
     * Biography
     */
    protected $biography;

    /**
     * @var string
     *
     * Website URL
     */
    protected $website;

    /**
     * @var string
     *
     * Instagram user
     */
    protected $instagram;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     */
    protected $avatarFile;

    /**
     * @var string
     */
    protected $avatarName;

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

    /**
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    }

    /**
     * @param string $website
     * @return $this
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $instagram
     * @return $this
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;

        return $this;
    }

    /**
     * @return string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Self
     */
    public function setAvatarFile(File $image = null)
    {
        $this->avatarFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getAvatarFile()
    {
        return $this->avatarFile;
    }

    /**
     * @param string $avatarName
     *
     * @return Self
     */
    public function setAvatarName($avatarName)
    {
        $this->avatarName = $avatarName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvatarName()
    {
        return $this->avatarName;
    }

    /**
     * @return Collection
     */
    public function getCourses()
    {
        return $this->courses;
    }
}