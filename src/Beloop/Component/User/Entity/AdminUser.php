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

namespace Beloop\Component\User\Entity;

use Symfony\Component\Security\Core\Role\Role;

use Beloop\Component\User\Entity\Abstracts\AbstractUser;
use Beloop\Component\User\Entity\Interfaces\AdminUserInterface;

class AdminUser extends AbstractUser implements AdminUserInterface
{
    /**
     * Admin User roles.
     *
     * @return string[] Roles
     */
    public function getRoles()
    {
        return [
            new Role('ROLE_ADMIN'),
        ];
    }
}