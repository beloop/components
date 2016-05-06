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

namespace Beloop\Component\Analytics\Factory;

use DateTime;

use Beloop\Component\Analytics\Entity\Entry;

class EntryFactory
{
    /**
     * Create entry.
     *
     * @param int      $user      User
     * @param string   $event     Event
     * @param string   $uniqueId  Unique id
     * @param string   $ip        Ip address
     * @param DateTime $createdAt Created At
     *
     * @return Entry new entry instance
     */
    public function create(
        $user,
        $event,
        $uniqueId,
        $ip,
        DateTime $createdAt
    ) {
        return new Entry(
            $user,
            $event,
            $uniqueId,
            $ip,
            $createdAt
        );
    }
}