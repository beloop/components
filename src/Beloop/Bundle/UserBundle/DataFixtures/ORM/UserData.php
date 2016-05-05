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

namespace Beloop\Bundle\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

use Beloop\Bundle\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Beloop\Component\Core\Services\ObjectDirector;

/**
 * UserData class.
 *
 * Load fixtures of user entities
 */
class UserData extends AbstractFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var ObjectDirector userDirector
         */
        $userDirector = $this->getDirector('user');

        /**
         * Admin.
         */
        $admin = $userDirector
            ->create()
            ->setPassword('1234')
            ->setEmail('admin@gmail.com')
            ->addRole('ROLE_ADMIN');

        $userDirector->save($admin);
        $this->addReference('admin', $admin);

        /**
         * Teacher.
         */
        $teacher = $userDirector
            ->create()
            ->setPassword('1234')
            ->setEmail('teacher@gmail.com')
            ->addRole('ROLE_TEACHER');

        $userDirector->save($teacher);
        $this->addReference('teacher', $teacher);

        /**
         * User.
         */
        $user = $userDirector
            ->create()
            ->setPassword('1234')
            ->setEmail('user@gmail.com')
            ->addRole('ROLE_USER');

        $userDirector->save($user);
        $this->addReference('user', $user);
    }
}