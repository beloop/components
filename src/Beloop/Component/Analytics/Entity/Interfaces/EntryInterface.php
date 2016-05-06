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

namespace Beloop\Component\Analytics\Entity\Interfaces;

/**
 * Interface EntryInterface.
 */
interface EntryInterface
{
    /**
     * Get User.
     *
     * @return string User
     */
    public function getUser();

    /**
     * Get Event.
     *
     * @return string Event
     */
    public function getEvent();

    /**
     * Get Value.
     *
     * @return string Value
     */
    public function getValue();

    /**
     * Get IP address.
     *
     * @return string ip
     */
    public function getIpAddress();

    /**
     * Get CreatedAt.
     *
     * @return \DateTime|null CreatedAt
     */
    public function getCreatedAt();
}
