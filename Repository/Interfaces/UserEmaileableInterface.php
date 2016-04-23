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

namespace Beloop\Component\User\Repository\Interfaces;

use Beloop\Component\User\Entity\Interfaces\AbstractUserInterface;

/**
 * Interface UserEmailRecoverableInterface.
 */
interface UserEmaileableInterface
{
    /**
     * Find one Entity given an email.
     *
     * @param string $email Email
     *
     * @return AbstractUserInterface|null User found
     */
    public function findOneByEmail($email);
}