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

namespace Beloop\Component\Course\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class CourseRepository.
 */
class CourseRepository extends EntityRepository
{
    public function findOneBy(array $criteria, array $orderBy = null)
    {
        $qb = $this->createQueryBuilder('c');

        $qb
            ->addSelect('l')
            ->innerJoin('c.lessons', 'l')
            ->orderBy('l.position', 'ASC');

        foreach ($criteria as $key => $value) {
            $qb
                ->andWhere(vsprintf('c.%s = :%s', [$key, $key]))
                ->setParameter($key, $value);
        }

        return $qb->getQuery()->getOneOrNullResult();
    }
}
