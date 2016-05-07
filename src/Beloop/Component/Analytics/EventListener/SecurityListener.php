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

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

use Beloop\Component\Analytics\Services\AnalyticsManager;

/**
 * Class SecurityListener.
 */
class SecurityListener implements LogoutSuccessHandlerInterface
{
    private $analyticsManager;
    private $tokenStorage;
    private $router;

    public function __construct(
        AnalyticsManager $analyticsManager,
        TokenStorageInterface $tokenStorage,
        Router $router
    )
    {
        $this->analyticsManager = $analyticsManager;
        $this->tokenStorage = $tokenStorage;
        $this->router = $router;
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

    /**
     * Creates a Response object to send upon a successful logout.
     *
     * @param Request $request
     *
     * @return Response never null
     */
    public function onLogoutSuccess(Request $request)
    {
        $token = $this->tokenStorage->getToken();

        if ($token instanceof TokenInterface) {
            $user = $token->getUser();
            $clientIp = $request->getClientIp();

            $this->analyticsManager->addEntry(
                $user->getId(),
                'logout_successful',
                0,
                $clientIp,
                new DateTime()
            );
        }

        return new RedirectResponse($this->router->generate('beloop_login'));
    }
}