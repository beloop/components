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

namespace Beloop\Component\User\EventListener;

use Beloop\Component\User\Entity\Interfaces\UserInterface;
use Beloop\Component\User\EventListener\Abstracts\AbstractPasswordEventListener;

/**
 * Class UserPasswordEventListener.
 */
class UserPasswordEventListener extends AbstractPasswordEventListener
{
    /**
     * Check entity type.
     *
     * @param $entity Object Entity to check
     *
     * @return bool Entity is ready for being encoded
     */
    public function checkEntityType($entity)
    {
        return $entity instanceof UserInterface;
    }
}