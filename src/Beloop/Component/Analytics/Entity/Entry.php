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

namespace Beloop\Component\Analytics\Entity;

use DateTime;

use Beloop\Component\Analytics\Entity\Interfaces\EntryInterface;

/**
 * Class Entry.
 */
class Entry implements EntryInterface
{
    /**
     * @var int
     *
     * Identifier
     */
    protected $id;

    /**
     * @var int
     *
     * User
     */
    protected $user;

    /**
     * @var string
     *
     * Event
     */
    protected $event;

    /**
     * @var string
     *
     * Value
     */
    protected $value;

    /**
     * @var string
     *
     * IP address
     */
    protected $ip;

    /**
     * @var DateTime
     *
     * Created at
     */
    protected $createdAt;

    /**
     * Construct.
     *
     * @param int      $user      User
     * @param string   $event     Event
     * @param string   $value     Value
     * @param string   $ip        Ip
     * @param DateTime $createdAt Created At
     */
    public function __construct(
        $user,
        $event,
        $value,
        $ip,
        DateTime $createdAt
    ) {
        $this->user = $user;
        $this->event = $event;
        $this->value = $value;
        $this->ip = $ip;
        $this->createdAt = $createdAt;
    }

    /**
     * Get Id.
     *
     * @return int Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get User.
     *
     * @return int User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get Event.
     *
     * @return string Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Get Value.
     *
     * @return string Value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get IP address.
     *
     * @return string Ip
     */
    public function getIpAddress()
    {
        return $this->ip;
    }

    /**
     * Get CreatedAt.
     *
     * @return DateTime|null CreatedAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}