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

namespace Beloop\Component\User\Services;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use Beloop\Component\Core\Generator\Interfaces\GeneratorInterface;
use Beloop\Component\User\Entity\Abstracts\AbstractUser;
use Beloop\Component\User\EventDispatcher\Interfaces\PasswordEventDispatcherInterface;
use Beloop\Component\User\Repository\Interfaces\UserEmaileableInterface;

/**
 * Class PasswordManager
 */
class PasswordManager
{
    /**
     * @var ObjectManager
     *
     * Entity manager
     */
    private $manager;

    /**
     * @var UrlGeneratorInterface
     *
     * Router generator
     */
    private $router;

    /**
     * @var PasswordEventDispatcherInterface
     *
     * Password EventDispatcher
     */
    private $passwordEventDispatcher;

    /**
     * @var GeneratorInterface
     *
     * Recovery hash generator
     */
    private $recoveryHashGenerator;

    /**
     * @param ObjectManager                    $manager                 Manager
     * @param UrlGeneratorInterface            $router                  Router
     * @param PasswordEventDispatcherInterface $passwordEventDispatcher Password Event Dispatcher
     * @param GeneratorInterface               $recoveryHashGenerator   Recovery hash generator
     */
    public function __construct(
        ObjectManager $manager,
        UrlGeneratorInterface $router,
        PasswordEventDispatcherInterface $passwordEventDispatcher,
        GeneratorInterface $recoveryHashGenerator
    ) {
        $this->manager = $manager;
        $this->router = $router;
        $this->passwordEventDispatcher = $passwordEventDispatcher;
        $this->recoveryHashGenerator = $recoveryHashGenerator;
    }

    /**
     * Remember a password from a user, given its email.
     *
     * @param UserEmaileableInterface $userRepository         User repository
     * @param string                  $email                  User email
     * @param string                  $recoverPasswordUrlName Recover password name
     * @param string                  $hashField              Hash
     *
     * @return bool its been found and processed
     */
    public function rememberPasswordByEmail(
        UserEmaileableInterface $userRepository,
        $email,
        $recoverPasswordUrlName,
        $hashField = 'hash'
    ) {
        $user = $userRepository->findOneByEmail($email);

        if (!($user instanceof AbstractUser)) {
            return false;
        }

        $this->rememberPassword($user, $recoverPasswordUrlName, $hashField);

        return true;
    }

    /**
     * Set a user in a remember password mode. Also rises an event
     * to hook when this happens.
     *
     * Recover url must contain these fields with these names
     *
     * @param AbstractUser $user                   User
     * @param string       $recoverPasswordUrlName Recover password name
     * @param string       $hashField              Hash
     *
     * @return $this Self object
     */
    public function rememberPassword(
        AbstractUser $user,
        $recoverPasswordUrlName,
        $hashField = 'hash'
    ) {
        $recoveryHash = $this->recoveryHashGenerator->generate();
        $user->setRecoveryHash($recoveryHash);
        $this->manager->flush($user);

        $recoverUrl = $this
            ->router
            ->generate($recoverPasswordUrlName, [
                $hashField => $recoveryHash,
            ], true);

        $this
            ->passwordEventDispatcher
            ->dispatchOnPasswordRememberEvent(
                $user,
                $recoverUrl
            );

        return $this;
    }
}