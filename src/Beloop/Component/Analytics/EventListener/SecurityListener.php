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

namespace Beloop\Component\Analytics\EventListener;

use DateTime;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

use Beloop\Component\Analytics\Services\AnalyticsManager;

/**
 * Class SecurityListener.
 */
class SecurityListener
{
    private $analyticsManager;
    private $tokenStorage;

    public function __construct(AnalyticsManager $analyticsManager, TokenStorageInterface $tokenStorage)
    {
        $this->analyticsManager = $analyticsManager;
        $this->tokenStorage = $tokenStorage;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $request = $event->getRequest();

        $user = $this->tokenStorage->getToken()->getUser();
        $clientIp = $request->getClientIp();

        $this->analyticsManager->addEntry(
            $user->getId(),
            'login_successful',
            0,
            $clientIp,
            new DateTime()
        );
    }
}