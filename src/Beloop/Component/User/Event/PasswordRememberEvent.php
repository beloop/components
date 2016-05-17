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

namespace Beloop\Component\User\Event;

use Symfony\Component\EventDispatcher\Event;

use Beloop\Component\User\Entity\Interfaces\AbstractUserInterface;

/**
 * Class PasswordRememberEvent
 */
final class PasswordRememberEvent extends Event
{
    /**
     * @var AbstractUserInterface
     *
     * User
     */
    private $user;

    /**
     * @var string
     *
     * Remember url
     */
    private $rememberUrl;

    /**
     * Construct method.
     *
     * @param AbstractUserInterface $user        User
     * @param string                $rememberUrl Remember url
     */
    public function __construct(AbstractUserInterface $user, $rememberUrl)
    {
        $this->user = $user;
        $this->rememberUrl = $rememberUrl;
    }

    /**
     * Get user.
     *
     * @return AbstractUserInterface User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get remember url.
     *
     * @return string Remember url
     */
    public function getRememberUrl()
    {
        return $this->rememberUrl;
    }
}