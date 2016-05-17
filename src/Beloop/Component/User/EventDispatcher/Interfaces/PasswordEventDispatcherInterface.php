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

namespace Beloop\Component\User\EventDispatcher\Interfaces;

use Beloop\Component\User\Entity\Interfaces\AbstractUserInterface;

/**
 * Interface PasswordEventDispatcherInterface
 */
interface PasswordEventDispatcherInterface
{
    /**
     * Dispatch password remember event.
     *
     * @param AbstractUserInterface $user       User
     * @param string                $recoverUrl Recover url
     *
     * @return $this Self object
     */
    public function dispatchOnPasswordRememberEvent(
        AbstractUserInterface $user,
        $recoverUrl
    );

    /**
     * Dispatch password recover event.
     *
     * @param AbstractUserInterface $user User
     *
     * @return $this Self object
     */
    public function dispatchOnPasswordRecoverEvent(AbstractUserInterface $user);
}