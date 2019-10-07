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

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Beloop\Bundle\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Beloop\Component\Core\Services\ObjectDirector;

/**
 * UserData class.
 *
 * Load fixtures of user entities
 */
class UserData extends AbstractFixture implements OrderedFixtureInterface
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
            ->setFirstName('Admin')
            ->setLastName('User')
            ->setPassword('1234')
            ->setEmail('admin@gmail.com')
            ->setLanguage($this->getReference('language-en'))
            ->addRole('ROLE_ADMIN');

        $userDirector->save($admin);
        $this->addReference('admin', $admin);

        /**
         * Teacher.
         */
        $teacher = $userDirector
            ->create()
            ->setFirstName('Teacher')
            ->setLastName('User')
            ->setPassword('1234')
            ->setEmail('teacher@gmail.com')
            ->setLanguage($this->getReference('language-en'))
            ->addRole('ROLE_TEACHER');

        $userDirector->save($teacher);
        $this->addReference('teacher', $teacher);

        $this->createStudents($userDirector);
    }

    /**
     * Create 10 student users
     *
     * @param $userDirector
     */
    private function createStudents($userDirector)
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = $userDirector
                ->create()
                ->setFirstName('Student')
                ->setLastName('User')
                ->setPassword('1234')
                ->setEmail('user' . $i . '@gmail.com')
                ->setLanguage($this->getReference('language-en'))
                ->addRole('ROLE_USER');

            $userDirector->save($user);
            $this->addReference('user' . $i, $user);
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}
