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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

class UserManager
{
    /**
     * @var ObjectManager
     *
     * Manager
     */
    private $manager;

    /**
     * @var ObjectRepository
     *
     * Repository
     */
    private $repository;

    /**
     * Construct.
     *
     * @param ObjectManager    $manager    Manager
     * @param ObjectRepository $repository Repository
     */
    public function __construct(
        ObjectManager $manager,
        ObjectRepository $repository
    ) {
        $this->manager = $manager;
        $this->repository = $repository;
    }

    /**
     * Update if user exists or insert if not
     *
     * @param Collection $users
     * @return ArrayCollection
     */
    public function insertOrUpdate(Collection $users)
    {
        $procesedUsers = new ArrayCollection();

        foreach ($users as $user) {
            $userDB = $this->repository->findOneBy(['email' => $user->getEmail()]);

            if (!$userDB) {
                $user->addRole('ROLE_USER');
                $procesedUsers->add($user);
                $this->manager->persist($user);
            } else {
                $userDB->enable();
                $procesedUsers->add($userDB);
                $this->manager->persist($userDB);
            }
        }

        $this->manager->flush();

        return $procesedUsers;
    }
}