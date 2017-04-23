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

namespace Beloop\Component\Instagram\Repository;

use DateTime;

use Doctrine\ORM\EntityRepository;

use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Class InstagramRepository.
 */
class InstagramRepository extends EntityRepository
{
    /**
     * Find images from users on the same course
     *
     * @param UserInterface $user
     *
     * @return array
     */
    public function findByUser(UserInterface $user)
    {
        $qb = $this->createQueryBuilder('i');

        $qb
            ->addSelect('cm, u, cu')
            ->leftJoin('i.comments', 'cm')
            ->leftJoin('cm.user', 'u')
            ->leftJoin('i.course', 'cu')
            ->leftJoin('cu.enrollments', 'e')
            ->where('i.course IN(:userCourses)')
            ->andWhere('e.enrollmentDate <= :today')
            ->andWhere('e.endDate >= :today')
            ->setParameter('userCourses', $user->getCourses())
            ->setParameter('today', new DateTime())
            ->orderBy('i.createdAt', 'DESC')
            ->addOrderBy('cm.createdAt', 'ASC')
        ;

        return $qb->getQuery()->getResult();
    }

    /**
     * Find one image.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneBy(array $criteria, array $orderBy = null)
    {
        $qb = $this->createQueryBuilder('i');

        $qb
            ->addSelect('u, c')
            ->leftJoin('i.comments', 'c')
            ->leftJoin('c.user', 'u')
            ->orderBy('c.createdAt', 'ASC')
        ;

        foreach ($criteria as $key => $value) {
            $qb
                ->andWhere(vsprintf('i.%s = :%s', [$key, $key]))
                ->setParameter($key, $value);
        }

        return $qb->getQuery()->getOneOrNullResult();
    }
}
