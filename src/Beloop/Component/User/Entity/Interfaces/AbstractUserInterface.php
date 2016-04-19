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

use Symfony\Component\Security\Core\User\UserInterface;

use Beloop\Component\Core\Entity\Interfaces\DateTimeInterface;
use Beloop\Component\Core\Entity\Interfaces\EnabledInterface;
use Beloop\Component\Core\Entity\Interfaces\IdentifiableInterface;

interface AbstractUserInterface
    extends
    IdentifiableInterface,
    UserInterface,
    DateTimeInterface,
    EnabledInterface
{
    /**
     * Sets a hash so it can be used to login once without the need to use the password.
     *
     * @param string $oneTimeLoginHash The hash you want to set for the one time login
     *
     * @return $this Self object
     */
    public function setOneTimeLoginHash($oneTimeLoginHash);

    /**
     * Gets the one time login hash.
     *
     * @return string Login hash
     */
    public function getOneTimeLoginHash();

    /**
     * Set recovery hash.
     *
     * @param string $recoveryHash
     *
     * @return $this Self object
     */
    public function setRecoveryHash($recoveryHash);

    /**
     * Get recovery hash.
     *
     * @return string Recovery Hash
     */
    public function getRecoveryHash();

    /**
     * Sets Firstname.
     *
     * @param string $firstname Firstname
     *
     * @return $this Self object
     */
    public function setFirstname($firstname);

    /**
     * Get Firstname.
     *
     * @return string Firstname
     */
    public function getFirstname();

    /**
     * Sets Lastname.
     *
     * @param string $lastname Lastname
     *
     * @return $this Self object
     */
    public function setLastname($lastname);

    /**
     * Get Lastname.
     *
     * @return string Lastname
     */
    public function getLastname();

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return $this Self object
     */
    public function setEmail($email);

    /**
     * Return email.
     *
     * @return string Email
     */
    public function getEmail();

    /**
     * Get user full name.
     *
     * @return string Full name
     */
    public function getFullName();

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return $this Self object
     */
    public function setPassword($password);

    /**
     * Get Token.
     *
     * @return string Token
     */
    public function getToken();

    /**
     * Sets Token.
     *
     * @param string $token Token
     *
     * @return $this Self object
     */
    public function setToken($token);
}