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

namespace Beloop\Component\User\Wrapper;

use Beloop\Component\User\Entity\Interfaces\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UserWrapper
{
    /**
     * @var UserInterface
     *
     * User
     */
    private $user;

    /**
     * @var TokenStorageInterface
     *
     * Token storage
     */
    private $tokenStorage;

    /**
     * Construct method.
     *
     * This wrapper loads User from database if this exists and is authenticated.
     * Otherwise, this create new Guest without persisting it
     *
     * @param TokenStorageInterface $tokenStorage    TokenStorageInterface instance
     */
    public function __construct(
        TokenStorageInterface $tokenStorage = null
    ) {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * Get loaded object. If object is not loaded yet, then load it and save it
     * locally. Otherwise, just return the pre-loaded object.
     *
     * @return mixed Loaded object
     */
    public function get()
    {
        if ($this->user instanceof UserInterface) {
            return $this->user;
        }

        $this->user = $this->getUserFromToken();

        return $this->user;
    }

    /**
     * Return the current user from security context.
     *
     * @return UserInterface Current customer in token
     */
    private function getUserFromToken()
    {
        if (!($this->tokenStorage instanceof TokenStorageInterface)) {
            return null;
        }

        $token = $this->tokenStorage->getToken();
        if (!($token instanceof TokenInterface)) {
            return null;
        }

        $user = $token->getUser();
        if (!($user instanceof UserInterface)) {
            return null;
        }

        return $user;
    }
}