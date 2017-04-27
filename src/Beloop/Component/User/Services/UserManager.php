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
        $this->enableExistantUsers($users);
        $this->insertUsers($users);

        return $this->repository->findBy(['email' => $this->extractEmails($users)->toArray()]);
    }

    /**
     * Enable existant users
     *
     * @param Collection $users
     */
    private function enableExistantUsers(Collection $users) {
        $query = $this->manager->createQuery('UPDATE Beloop\Component\User\Entity\User u SET u.enabled=:enabled, u.roles=:roles WHERE u.email IN (:emails)');
        $query->setParameter('enabled', true);
        $query->setParameter('roles', serialize(["ROLE_USER"]));
        $query->setParameter('emails', $this->extractEmails($users)->toArray());
    }

    /**
     * Insert new users
     *
     * @param Collection $users
     */
    private function insertUsers(Collection $users) {
        set_time_limit(60);
        $this->manager->getConnection()->getConfiguration()->setSQLLogger(null);

        // Get existan user from DB
        $existantUsers = $this->repository->findBy(['email' => $this->extractEmails($users)->toArray()]);

        // Create an array of emails
        $existantEmails = array_map(function($user) {
            return strtolower($user->getEmail());
        }, $existantUsers);

        unset($existantUsers);

        // Get not existant users ready to import
        $nonExistantUsers = $users->filter(function($user) use ($existantEmails){
            return !in_array(strtolower($user->getEmail()), $existantEmails);
        });

        unset($existantEmails);

        foreach ($nonExistantUsers as $user) {
            $user->addRole('ROLE_USER');
            $this->manager->persist($user);
        }

        $this->manager->flush();
    }

    /**
     * Extract emails from users
     *
     * @param Collection $users
     * @return Collection
     */
    private function extractEmails(Collection $users) {
        return $users->map(function($user) { return strtolower($user->getEmail()); });
    }
}
