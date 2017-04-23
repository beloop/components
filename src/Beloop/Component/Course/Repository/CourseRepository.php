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

use DateTime;
use Doctrine\ORM\EntityRepository;

use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Class CourseRepository.
 */
class CourseRepository extends EntityRepository
{
    /**
     * Find courses. Join with lessons and modules
     *
     * @param UserInterface $user
     *
     * @return array
     */
    public function findByUser(UserInterface $user)
    {
        $qb = $this->createQueryBuilder('c');

        $qb
            ->addSelect('l, e, m')
                ->innerJoin('c.lessons', 'l')
                ->innerJoin('c.enrollments', 'e')
                ->leftJoin('l.modules', 'm')
            ->where('e.user = :user')->setParameter('user', $user)
                ->andWhere('e.endDate >= :now')->setParameter('now', new DateTime())
            ->orderBy('e.enrollmentDate', 'DESC')
                ->addOrderBy('l.position', 'ASC')
                ->addOrderBy('m.position', 'ASC')
        ;

        return $qb->getQuery()->getResult();
    }

    /**
     * Find one course. Join with lessons and modules
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneBy(array $criteria, array $orderBy = null)
    {
        $qb = $this->createQueryBuilder('c');

        $qb
            ->addSelect('l, m')
                ->leftJoin('c.lessons', 'l')
                ->leftJoin('l.modules', 'm')
            ->orderBy('l.position', 'ASC')
                ->addOrderBy('m.position', 'ASC')
        ;

        foreach ($criteria as $key => $value) {
            $qb
                ->andWhere(vsprintf('c.%s = :%s', [$key, $key]))
                ->setParameter($key, $value);
        }

        return $qb->getQuery()->getOneOrNullResult();
    }
}
