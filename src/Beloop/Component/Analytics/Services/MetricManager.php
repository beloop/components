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

namespace Beloop\Component\Analytics\Services;

use DateTime;
use Doctrine\Common\Persistence\ObjectManager;

use Beloop\Component\Analytics\Factory\EntryFactory;

/**
 * Class MetricManager.
 */
class MetricManager
{
    /**
     * @var EntryFactory
     *
     * Entry factory
     */
    private $entryFactory;

    /**
     * @var ObjectManager
     *
     * Entry object manager
     */
    private $entryObjectManager;

    /**
     * Construct.
     *
     * @param EntryFactory  $entryFactory       Entry Factory
     * @param ObjectManager $entryObjectManager Entry Object Manager
     */
    public function __construct(
        EntryFactory $entryFactory,
        ObjectManager $entryObjectManager
    ) {
        $this->entryFactory = $entryFactory;
        $this->entryObjectManager = $entryObjectManager;
    }

    /**
     * Adds a new entry into database.
     *
     * @param int      $user     User
     * @param string   $event    Token
     * @param string   $uniqueId Unique id
     * @param string   $ip       Ip address
     * @param DateTime $dateTime DateTime
     *
     * @return $this Self Object
     */
    public function addEntry(
        $user,
        $event,
        $uniqueId,
        $ip,
        DateTime $dateTime
    ) {
        $entry = $this
            ->entryFactory
            ->create(
                $user,
                $event,
                $uniqueId,
                $ip,
                $dateTime
            );

        $this->entryObjectManager->persist($entry);
        $this->entryObjectManager->flush($entry);

        return $this;
    }
}