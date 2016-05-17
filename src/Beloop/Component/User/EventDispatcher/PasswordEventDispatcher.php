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

namespace Beloop\Component\User\EventDispatcher;

use Beloop\Component\User\BeloopUserEvents;
use Beloop\Component\Core\EventDispatcher\Abstracts\AbstractEventDispatcher;
use Beloop\Component\User\Entity\Interfaces\AbstractUserInterface;
use Beloop\Component\User\Event\PasswordRecoverEvent;
use Beloop\Component\User\Event\PasswordRememberEvent;
use Beloop\Component\User\EventDispatcher\Interfaces\PasswordEventDispatcherInterface;

/**
 * Class PasswordEventDispatcher
 */
class PasswordEventDispatcher extends AbstractEventDispatcher implements PasswordEventDispatcherInterface
{
    /**
     * Dispatch password remember event.
     *
     * @param AbstractUserInterface $user       User
     * @param string                $recoverUrl Recover url
     *
     * @return $this Self object
     */
    public function dispatchOnPasswordRememberEvent(AbstractUserInterface $user, $recoverUrl)
    {
        $event = new PasswordRememberEvent($user, $recoverUrl);
        $this
            ->eventDispatcher
            ->dispatch(
                BeloopUserEvents::PASSWORD_REMEMBER,
                $event
            );
    }
    /**
     * Dispatch password recover event.
     *
     * @param AbstractUserInterface $user User
     *
     * @return $this Self object
     */
    public function dispatchOnPasswordRecoverEvent(AbstractUserInterface $user)
    {
        $event = new PasswordRecoverEvent($user);
        $this
            ->eventDispatcher
            ->dispatch(
                BeloopUserEvents::PASSWORD_RECOVER,
                $event
            );
    }
}