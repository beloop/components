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

namespace Beloop\Component\User\Entity\Abstracts;

use Beloop\Component\Core\Entity\Traits\DateTimeTrait;
use Beloop\Component\Core\Entity\Traits\EnabledTrait;
use Beloop\Component\Core\Entity\Traits\IdentifiableTrait;
use Beloop\Component\User\Entity\Interfaces\AbstractUserInterface;
use Beloop\Component\User\Exception\InvalidPasswordException;

abstract class AbstractUser implements AbstractUserInterface
{
    use IdentifiableTrait,
        DateTimeTrait,
        EnabledTrait;

    /**
     * @var string
     *
     * Password
     */
    protected $password;

    /**
     * @var string
     *
     * Email
     */
    protected $email;

    /**
     * @var string
     *
     * Token
     */
    protected $token;

    /**
     * @var string
     *
     * Firstname
     */
    protected $firstname;

    /**
     * @var string
     *
     * Lastname
     */
    protected $lastname;

    /**
     * @var string
     *
     * Recovery hash
     */
    protected $recoveryHash;

    /**
     * @var string
     *
     * One time login hash.
     */
    protected $oneTimeLoginHash;

    /**
     * @var array
     *
     * User roles
     */
    protected $roles;

    /**
     * @param array $roles
     * @return $this
     */
    public function setRoles(array $roles)
    {
        $this->roles = [];

        foreach ($roles as $role) {
            $this->addRole($role);
        }

        return $this;
    }

    /**
     * @param $role
     * @return $this
     */
    public function addRole($role)
    {
        $role = strtoupper($role);

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    /**
     * User roles.
     *
     * @return string[] Roles
     */
    public function getRoles()
    {
        return array_unique($this->roles);
    }

    /**
     * User has specific role
     * @param  string  $role Role to find
     * @return boolean
     */
    public function hasRole($role) {
        $role = strtoupper($role);

        return in_array($role, $this->getRoles(), true);
    }

    /**
     * Sets First name.
     *
     * @param string $firstname Firstname
     *
     * @return $this Self object
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get First name.
     *
     * @return string Firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Sets Last name.
     *
     * @param string $lastname Lastname
     *
     * @return $this Self object
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get Last name.
     *
     * @return string Lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return $this Self object
     */
    public function setEmail($email)
    {
        $this->email = strtolower($email);

        return $this;
    }

    /**
     * Return email.
     *
     * @return string Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get Token.
     *
     * @return string Token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Sets Token.
     *
     * @param string $token Token
     *
     * @return $this Self object
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get username.
     *
     * Just for symfony security purposes
     *
     * @return string Username
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Set recovery hash.
     *
     * @param string $recoveryHash
     *
     * @return $this Self object
     */
    public function setRecoveryHash($recoveryHash)
    {
        $this->recoveryHash = $recoveryHash;

        return $this;
    }

    /**
     * Get recovery hash.
     *
     * @return string Recovery Hash
     */
    public function getRecoveryHash()
    {
        return $this->recoveryHash;
    }

    /**
     * Get user full name.
     *
     * @return string Full name
     */
    public function getFullName()
    {
        return trim($this->firstname . ' ' . $this->lastname);
    }

    /**
     * Set password.
     *
     * @param string $password Password
     *
     * @return $this Self object
     */
    public function setPassword($password)
    {
        if (null === $password) {
            return $this;
        }

        if (!is_string($password) || trim($password) == '') {
            throw new InvalidPasswordException('The password is not a valid string');
        }

        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string Password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Gets the one time login hash.
     *
     * @return string Login hash
     */
    public function getOneTimeLoginHash()
    {
        return $this->oneTimeLoginHash;
    }

    /**
     * Sets a hash so it can be used to login once without the need to use the password.
     *
     * @param string $oneTimeLoginHash The hash you want to set for the one time login
     *
     * @return $this Self object
     */
    public function setOneTimeLoginHash($oneTimeLoginHash)
    {
        $this->oneTimeLoginHash = $oneTimeLoginHash;

        return $this;
    }

    /**
     * Part of UserInterface. Dummy.
     *
     * @return string Salt
     */
    public function getSalt()
    {
        return '';
    }

    /**
     * Dummy function, returns empty string.
     *
     * @return string
     */
    public function eraseCredentials()
    {
        return '';
    }

    /**
     * String representation of the Customer.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getFullName();
    }

    /**
     * Sleep implementation for some reason.
     *
     * @link http://asiermarques.com/2013/symfony2-security-usernamepasswordtokenserialize-must-return-a-string-or-null/
     */
    public function __sleep()
    {
        return ['id', 'email'];
    }

}
