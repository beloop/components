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

use Symfony\Component\HttpFoundation\File\File;

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

    /**
     * Get biography
     *
     * @return string
     */
    public function getBiography();

    /**
     * Set biography
     *
     * @param string $biography
     */
    public function setBiography($biography);

    /**
     * Set website.
     *
     * @param string $website The Website
     *
     * @return $this Self object
     */
    public function setWebsite($website);

    /**
     * Get website.
     *
     * @return string
     */
    public function getWebsite();

    /**
     * Set instagram user.
     *
     * @param string $instagram Instagram user
     *
     * @return $this Self object
     */
    public function setInstagram($instagram);

    /**
     * Get instagram user.
     *
     * @return string
     */
    public function getInstagram();

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Self
     */
    public function setAvatarFile(File $image = null);

    /**
     * @return File
     */
    public function getAvatarFile();

    /**
     * @param string $avatarName
     *
     * @return Self
     */
    public function setAvatarName($avatarName);

    /**
     * @return string
     */
    public function getAvatarName();

    /**
     * @return Collection
     */
    public function getCourses();
}