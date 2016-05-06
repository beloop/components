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

namespace Beloop\Component\Analytics\Repository;

use DateTime;
use Doctrine\ORM\EntityRepository;

use Beloop\Component\Analytics\Entity\Interfaces\EntryInterface;

/**
 * Class EntryRepository.
 */
class EntryRepository extends EntityRepository
{
    /**
     * Load entries from last X days.
     *
     * @param int $days Days
     *
     * @return EntryInterface[] Entries
     */
    public function getEntriesFromLastDays($days)
    {
        $from = new DateTime();
        $from->modify('-' . $days . ' days');

        return $this
            ->createQueryBuilder('e')
            ->where('e.createdAt >= :from')
            ->setParameters([
                'from' => $from,
            ])
            ->getQuery()
            ->getResult();
    }
}