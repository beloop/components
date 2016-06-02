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
            ->addSelect('c, u')
            ->leftJoin('i.comments', 'c')
            ->leftJoin('c.user', 'u')
            ->where('i.course IN(:userCourses)')->setParameter('userCourses', $user->getCourses())
            ->orderBy('i.createdAt', 'DESC')
            ->addOrderBy('c.createdAt', 'ASC')
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
